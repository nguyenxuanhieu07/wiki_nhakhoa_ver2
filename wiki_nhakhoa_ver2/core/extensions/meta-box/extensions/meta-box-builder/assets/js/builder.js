( function ( $, angular, hljs, document ) {
	'use strict';

	// Define module and dependencies
	// All directives store in `directives.js`
	var app = angular.module( 'Builder', ['builderDirectives', 'tg.dynamicDirective', 'ui.sortable', 'ui.bootstrap.collapse', 'ngAnimate', 'checklist-model', 'ui.codemirror'] );

	/**
	 * Create array from range. Useful for loop.
	 * For example, range | 9 will return array[1..9]
	 *
	 * @param  int total Range
	 * @return array array from range.
	 */
	app.filter('range', function () {
		return function (input, total) {
			total = parseInt(total);
			for (var i = 0; i < total; i++)
				input.push(i);

			return input;
		};
	});

	/**
	 * Add focus=callback() directive
	 *
	 * @param  callback Callback function
	 * @return callback
	 */
	app.factory('focus', function ($rootScope, $timeout) {
		return function (name) {
			$timeout(function () {
				$rootScope.$broadcast('focusOn', name);
			});
		}
	});

	function noSubmitOnEnter() {
		$( '#post-body-content input' ).on( 'keypress', function( e ) {
			return e.which !== 13;
		} );
	}

	function enableSubmitButtons() {
		$( '.publishing-action' ).find( 'button' ).prop( 'disabled', false );
	}

	function initColorPicker() {
		var options = {
			change: function ( event ) {
				setTimeout( function() {
					var e = document.createEvent( 'HTMLEvents' );
					e.initEvent( 'change', true, false );
					event.target.dispatchEvent( e );
				}, 100 );
			}
		};
		$( '.mbb-color' ).wpColorPicker( options );
	}

	/**
	 * Builder Controller. Which contains all method for builder
	 * @see https://docs.angularjs.org/guide/controller
	 */
	app.controller( 'BuilderController', function ( $scope, $window, focus ) {
		/**
		 * Default Meta Box value
		 */
		$scope.meta = {
			title: $window.i18n.defaultTitle,
			id: 'untitled-field-group',
			post_types: ['post'],
			context: 'normal',
			priority: 'high',
			status: 'publish',
			autosave: 'false',
			attrs: [],
			fields: [],
			tab_style: 'default',
			tab_wrapper: 'true',
			is_id_modified: false,
			for: 'post_types'
		};

		/**
		 * Configs for ui-sortable
		 * @type {Object}
		 */
		$scope.sortableOptions = {
			connectWith: '.apps-container',
			placeholder: 'ui-state-highlight',
			items: '.menu-item,.mbb-group-container',
			handle: '.menu-item-handle',
			dropOnEmpty: false,
			helper : 'clone',
			start: function ( event, ui ) {
				// Make the placeholder has the same height as dragged item
				ui.placeholder.height( ui.item.outerHeight() );
			}
		};

		// Shortcut for access fields
		$scope.fields = $scope.meta.fields;

		// Store current editing item
		$scope.active = {};

		// Store all default field value
		$scope.attrs = {};

		/**
		 * When remove item from object. For example. Remove option from select,
		 * the current editing field will lost focus. So we have to use this variable
		 * to force the builder keep editing that field
		 * @type {Boolean}
		 */
		$scope.shouldContinue = true;

		/**
		 * Store all post types in array so user can select in frontend
		 * @type {Array}
		 */
		$scope.post_types = [];

		$scope.tabExists = false;
		/**
		 * Available fields for Conditional Logic
		 *
		 * @type {Array}
		 * @todo  Write PHP code to list all available fields
		 */
		$scope.available_fields = ['post_format', 'title', 'post_category', 'parent_id', 'menu_order', 'post_status'];

		$scope.pane = 'general';

		$scope.searchKeyword = '';

		$scope.group_subfield = [];

		/**
		 * Initial method. Run when the page loaded
		 */
		$scope.init = function () {
			// When load a saved meta box. Use old collection.
			if (typeof $window.meta != 'undefined')
				$scope.meta = $window.meta;

			$scope.attrs          = $window.attrs;
			$scope.addons         = $window.addons;
			$scope.post_types     = $window.post_types;
			$scope.taxonomies     = $window.taxonomies;
			$scope.settings_pages = $window.settings_pages;
			$scope.posts          = $window.posts;
			$scope.templates      = $window.templates;
			$scope.align          = $window.align;
			$scope.icons          = $window.icons;

			if (typeof $scope.meta.fields[0] != 'undefined' && $scope.meta.fields[0].type === 'tab') {
				$scope.tabExists = true;
			}

			$scope.setAvailableFields();

			$scope.$watch( 'meta', enableSubmitButtons, true );
		};

		$scope.replace_slug = function( str, sep ) {
			sep = sep || '-';
			str = str.replace(/^\s+|\s+$/g, ''); // trim
			str = str.toLowerCase();

			// remove accents, swap ñ for n, etc
			var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
			var to   = "aaaaeeeeiiiioooouuuunc------";
			for (var i=0, l=from.length ; i<l ; i++) {
				str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
			}

			str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
			.replace(/\s+/g, sep) // collapse whitespace and replace by -
			.replace(/-+/g, '-'); // collapse dashes

			return str;
		}
		$scope.onchangetitle = function() {
			if ( $scope.meta.is_id_modified != true ) {
				$scope.meta.id = $scope.replace_slug( $scope.meta.title, '-' );
			}
		}

		$scope.setAvailableFields = function () {
			$scope.available_fields = [];
			$scope.group_subfield = [];
			$scope.meta.fields.forEach( $scope.addAvailableField );
		};
		$scope.addAvailableField = function ( field ) {
			if ( ! field.id ) {
				return;
			}
			if ( -1 === $scope.available_fields.indexOf( field.id ) ) {
				$scope.available_fields.push( field.id );
			}
			if ( -1 === $scope.group_subfield.indexOf( field.id ) ) {
				$scope.group_subfield.push( field.id );
			}
			if ( 'group' === field.type ) {
				field.fields.forEach( $scope.addAvailableField );
			}
		};

		$scope.transformChoiceOptions = function ( fields ) {
			var choiceTypes = ['select', 'select_advanced', 'radio', 'checkbox_list', 'button_group'];
			fields.forEach( function ( field, index ) {
				if ( -1 === choiceTypes.indexOf( field.type ) || ! Array.isArray( field.options ) ) {
					return;
				}
				fields[index].options = field.options.map( function( option ) {
					return option.key + ':' + option.value;
				} ).join( "\n" );

				if ( 'group' === field.type ) {
					$scope.transformChoiceOptions( field.fields );
				}
			} );
		};

		$scope.getPosts = function() {
			return $window.posts.filter( function( post ) {
				return -1 !== $scope.meta.post_types.indexOf( post.post_type );
			} );
		};

		$scope.isPostTypeHierarchical = function() {
			return $window.post_types.filter( function( post_type ) {
				return -1 !== $scope.meta.post_types.indexOf( post_type.slug );
			} ).reduce( function( result, post_type ) {
				return result || post_type.hierarchical;
			}, false );
		};

		$scope.getTemplates = function( post_type ) {
			var post_types = post_type ? [post_type] : $scope.meta.post_types;
			return $window.templates.filter( function( template ) {
				return -1 !== post_types.indexOf( template.post_type );
			} );
		};

		$scope.getTaxonomyTerms = function( taxonomy ) {
			return $window.terms.filter( function( term ) {
				return term.taxonomy === taxonomy;
			} );
		};

		$scope.setTerms = function( field ) {
			if ( field.taxonomy ) {
				field.terms = $scope.getTaxonomyTerms( field.taxonomy );
			}
		};

		$scope.getView = function ( item ) {
			return 'nestable_item.html';
		};

		/**
		 * Action when use click on each field on sidebar,
		 * add default field value to `meta` collection
		 *
		 * @param string type Field Type
		 */
		$scope.addField = function ( type, $event ) {
			// Must copy to angular object before process
			var field = angular.copy( $scope.attrs[type] ),
				count = $scope.meta.fields.length;

			$scope.meta.fields.forEach( function ( field ) {
				if ( 'tab' === field.type ) {
					$scope.tabExists = true;
				}
			} );

			if ( 'tab' === type && !$scope.tabExists ) {
				$scope.meta.fields.unshift( field );
				$scope.tabExists = true;
			} else {
				$scope.meta.fields.push( field );
			}
			if ( typeof field.id !== 'undefined' ) {
				field.id = type + '_' + (count + 1);
			}

			// For autocomplete in Conditional Logic
			// Todo: Remove non-form fields. For example: Tab, Heading, Group...
			$scope.available_fields.push( field.id );
			$scope.group_subfield.push( field.id );
			if ( 'taxonomy' === type || 'taxonomy_advanced' === type ) {
				$scope.meta.fields[count].terms = $scope.getTaxonomyTerms( field.taxonomy );
			}

			$scope.pane = 'divider' === field.type ? 'appearance' : 'general';
			$scope.toggleEdit( field, $event );
		};

		$scope.cloneField = function ( field, event ) {
			event.preventDefault();
			event.stopPropagation();

			var clone = angular.copy( field );
			clone.id += '_copy';

			$scope.meta.fields.push( clone );

			// For autocomplete in Conditional Logic
			$scope.available_fields.push(clone.id);
			$scope.group_subfield.push( clone.id );
		};

		$scope.removeField = function ( field, event ) {
			event.preventDefault();
			event.stopPropagation();

			var tabCount = 0;

			if (field.type === 'tab' && $scope.meta.fields.indexOf(field) === 0) {
				angular.forEach($scope.meta.fields, function (field) {
					if (field.type === 'tab')
						tabCount++;
				});

				if (tabCount > 1) {
					alert('You cannot delete the first tab until the rest are deleted!');
					return;
				}
			}

			$scope.findAndRemove($scope.meta.fields, field);

			if (tabCount === 1)
				$scope.tabExists = false;

			// Todo: Remove field from autocomplete
		};

		$scope.findAndRemove = function (fields, field) {

			var index = fields.indexOf(field);

			if ( index >= 0 ) {
				fields.splice(index, 1);
			} else {
				angular.forEach(fields, function (f) {
				   if (typeof f.fields != 'undefined')
					   $scope.findAndRemove(f.fields, field);
				});
			}
		};

		/**
		 * Set active field for edit
		 * @param  Object $field Field object
		 * @param  Event $event Event to check
		 */
		$scope.editField = function ($field, $event) {
			$scope.active = $field;

			// Todo: When edit field, change conditional logic array
		};

		/**
		 * Return to view mode
		 */
		$scope.unEdit = function ($event) {
			if ($scope.shouldContinue)
				$scope.active = {};
			else
				$scope.shouldContinue = true;
		};

		/**
		 * Toggle Edit Field
		 *
		 * @param  object $field Meta Box Field
		 * @param  Event $event JS Event
		 */
		$scope.toggleEdit = function ($field, $event) {
			if ($scope.active == $field)
				$scope.unEdit();
			else
				$scope.editField($field, $event);
		};

		/**
		 * Clear all other checked values but current checkbox if is not multiple select or checkboxlist
		 *
		 * @param  int $index Index of array options
		 */
		$scope.toggleSelect = function ($index) {
			if (!( $scope.active.multiple || $scope.active.type === 'checkbox_list' )) {
				angular.forEach($scope.active.options, function (option, index) {
					if ($index !== index)
						$scope.active.options[index].selected = false;
				});
			}
		};

		/**
		 * Clear all checked values when switching from multiple select to single select
		 */
		$scope.toggleMultiple = function () {
			if (!$scope.active.multiple
				&& typeof $scope.active.multiple !== 'undefined'
				&& $scope.active.options.length > 0
			)
				$scope.toggleSelect(-1); // little trick ;)
		};

		/**
		 * When user typing value, auto fill to key if it not set
		 *
		 * @param  int $index Index of item in options
		 */
		$scope.autoFillValue = function ($index) {
			var option = $scope.active.options[$index];

			if (option.value === option.key.substr(0, option.key.length - 1))
				$scope.active.options[$index].value = option.key;
		};

		/**
		 * Add Conditional Logic to the given target
		 *
		 * @param {String} $target Target to add. 'active' or 'meta'
		 */
		$scope.addConditionalLogic = function ($target) {
			$target = $target || 'active';

			if (typeof $scope[$target].logic == 'undefined') {
				$scope[$target].logic = {};
				$scope[$target].logic.visibility = 'visible';
				$scope[$target].logic.relation = 'and';
			}

			if (typeof $scope[$target].logic.when == 'undefined')
				$scope[$target].logic.when = [];

			$scope[$target].logic.when.push(['', '=', '']);
		};

		/**
		 * Remove Conditional Logic from a given target
		 *
		 * @param  {Int} $index  Index of Conditional Logic
		 * @param  {Boolean} $target 'active' or 'meta'
		 *
		 * @return {void}
		 */
		$scope.removeConditionalLogic = function ($index, $target) {
			$target = $target || 'active';

			$scope[$target].logic.when.splice($index, 1);

			$scope.shouldContinue = false;
		};

		/**
		 * Clear unused data from fields
		 * @param  object $field Meta box field
		 */
		$scope.sanitize = function ($field) {

		};

		/**
		 * Add key:value object
		 *
		 * @param string prop The collection property to add
		 */
		$scope.addObject = function (prop) {
			if (typeof $scope.active[prop] === 'undefined')
				$scope.active[prop] = [];

			var object = {
				key: '',
				value: ''
			};

			var focusOn = '_key_';

			if (prop === 'options') {
				object.selected = false;
				//focusOn 		= '_value_';
			}

			$scope.active[prop].push(object);

			var length = $scope.active[prop].length - 1;

			focus($scope.active.id + focusOn + length);
		};

		/**
		 * Add Custom Attribute for Meta Box
		 *
		 * @since  2.0
		 */
		$scope.addMetaBoxAttribute = function () {
			if (typeof $scope.meta.attrs === 'undefined')
				$scope.meta.attrs = [];

			$scope.meta.attrs.push({
				key: '',
				value: ''
			});

			var length = $scope.meta.attrs.length - 1;
			focus('metabox_key_' + length);
		};

		/**
		 * Remove Custom Attribute from Meta Box
		 * @param  {Integer} $index Index of current attribute
		 * @return {void}
		 */
		$scope.removeMetaBoxAttribute = function ($index) {
			if (typeof $scope.meta.attrs !== 'undefined' && $scope.meta.attrs.length > 0) {
				$scope.meta.attrs.splice($index, 1);
				$scope.shouldContinue = false;
			}
		};

		/**
		 * Remove object from collection
		 *
		 * @param  string prop   Collection property
		 * @param  int $index Index of property to remove
		 */
		$scope.removeObject = function (prop, $index) {
			if (typeof $scope.active[prop] !== 'undefined' && $scope.active[prop].length > 0) {
				$scope.active[prop].splice($index, 1);
				$scope.shouldContinue = false;
			}
		};

		$scope.setActivePane = function (pane) {
			$scope.pane = pane;
		};

		$( function () {
			$( '.mbb-select2' ).select2( {
				width: 'resolve'
			} );

			// Set available fields for autocomplete
			$( '.menu' ).on( 'change', '.field-id', $scope.setAvailableFields );

			// Copy to clipboard.
			var icon = '<svg class="mbb-icon--copy" aria-hidden="true" role="img"><use href="#mbb-icon-copy" xlink:href="#icon-copy"></use></svg> ',
				clipboard = new ClipboardJS( '.mbb-button--copy', {
					target: function ( trigger ) {
						return trigger.previousElementSibling;
					}
				} );
			clipboard.on( 'success', function( e ) {
				e.clearSelection();
				e.trigger.innerHTML = icon + 'Copied';
				setTimeout(function() {
					e.trigger.innerHTML = icon + 'Copy';
				}, 3000);
			} );
			clipboard.on( 'error', function() {
				alert( 'Press Ctrl-C to copy' );
			} );

			// click tab
			$( '.nav-tab-js' ).on( 'click', function( e ) {
				e.preventDefault();
				var fields = $( this ).data('tab');
				$('.nav-tab-js').removeClass('nav-tab-active');
				$('.builder-code-tab').removeClass('metabox-tab-show');
				if (! $( this ).hasClass('nav-tab-active')) {
					$( this ).addClass('nav-tab-active');
					$( '.builder-code-tab--' + fields ).addClass('metabox-tab-show');
				}
			} );

			tippy( document.body, {
				target: '.mbb-tooltip',
				placement: 'top-start',
				arrow: true,
				animation: 'fade'
			} );

			noSubmitOnEnter();
			initColorPicker();
		} );
	} );

	hljs.initHighlightingOnLoad();
} )( jQuery, angular, hljs, document );
