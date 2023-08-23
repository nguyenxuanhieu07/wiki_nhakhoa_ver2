<?php
/**
 * Class that manage post admin columns.
 *
 * @package Meta Box
 * @subpackage MB Admin Columns
 */

/**
 * Post admin columns class.
 */
class MB_Admin_Columns_Post extends MB_Admin_Columns_Base {

	/**
	 * Save the SQL where condition for meta query.
	 *
	 * @var string
	 */
	protected $meta_where = '';

	/**
	 * Initialization.
	 */
	protected function init() {
		// Actions to show post columns can be executed via normal page request or via Ajax when quick edit.
		// Priority 20 allows us to overwrite WooCommerce settings.
		$priority = 20;
		add_filter( "manage_{$this->object_type}_posts_columns", array( $this, 'columns' ), $priority );
		add_action( "manage_{$this->object_type}_posts_custom_column", array( $this, 'show' ), $priority, 2 );
		add_filter( "manage_edit-{$this->object_type}_sortable_columns", array( $this, 'sortable_columns' ), $priority );

		// Other actions need to run only in Management page.
		add_action( 'load-edit.php', array( $this, 'execute' ) );
	}

	/**
	 * Actions need to run only in Management page.
	 */
	public function execute() {
		if ( ! $this->is_screen() ) {
			return;
		}

		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );
		add_action( 'pre_get_posts', array( $this, 'sort' ) );

		if ( $this->has_searchable_field() ) {
			add_action( 'pre_get_posts', array( $this, 'search' ) );
		}

//		// Debug.
//		add_filter( 'posts_where', function ( $where ) {
//			return $where;
//		} );
	}

	/**
	 * Show column content.
	 *
	 * @param string $column  Column ID.
	 * @param int    $post_id Post ID.
	 */
	public function show( $column, $post_id ) {
		if ( false === ( $field = $this->find_field( $column ) ) ) {
			return;
		}

		$config = array(
			'before' => '',
			'after'  => '',
		);
		if ( is_array( $field['admin_columns'] ) ) {
			$config = wp_parse_args( $field['admin_columns'], $config );
		}
		printf(
			'<div class="mb-admin-columns mb-admin-columns-%s" id="mb-admin-columns-%s">%s%s%s</div>',
			esc_attr( $field['type'] ),
			esc_attr( $field['id'] ),
			$config['before'], // WPCS: XSS OK.
			rwmb_the_value( $field['id'], '', $post_id, false ), // WPCS: XSS OK.
			$config['after'] // WPCS: XSS OK.
		);
	}

	/**
	 * Sort by meta value.
	 *
	 * @param WP_Query $query The query.
	 */
	public function sort( $query ) {
		$orderby = filter_input( INPUT_GET, 'orderby', FILTER_SANITIZE_STRING );
		if ( ! $orderby || false === ( $field = $this->find_field( $orderby ) ) ) {
			return;
		}
		$query->set( 'orderby', in_array( $field['type'], array( 'number', 'slider', 'range' ), true ) ? 'meta_value_num' : 'meta_value' );
		$query->set( 'meta_key', $orderby );
	}

	/**
	 * Search by meta value.
	 *
	 * @param WP_Query $query The query.
	 */
	public function search( $query ) {
		$s = filter_input( INPUT_GET, 's', FILTER_SANITIZE_STRING );
		if ( ! $s ) {
			return;
		}

		$meta_query = $query->get( 'meta_query' );
		if ( empty( $meta_query ) ) {
			$meta_query = array();
		}
		$meta_query['relation'] = 'OR';
		foreach ( $this->fields as $field ) {
			if ( ! is_array( $field['admin_columns'] ) || empty( $field['admin_columns']['searchable'] ) ) {
				continue;
			}
			$meta_query[] = array(
				'key'     => $field['id'],
				'value'   => $s,
				'compare' => 'LIKE',
			);
		}
		$query->set( 'meta_query', $meta_query );

		add_filter( 'posts_search', array( $this, 'add_meta_condition' ), 10, 2 );
	}

	/**
	 * Change the SQL where condition, adding condition for meta query.
	 *
	 * @param string   $search SQL where condition.
	 *
	 * @param WP_Query $query  WordPress query.
	 *
	 * @return string
	 */
	public function add_meta_condition( $search, WP_Query $query ) {
		add_filter( 'get_meta_sql', array( $this, 'change_sql_where' ) );

		// Just run the get_sql function to catch the meta where.
		global $wpdb;
		$query->meta_query->get_sql( 'post', $wpdb->posts, 'ID', $this );

		// Update the SQL where condition.
		$position = strrpos( $search, ')' );
		$search   = substr( $search, 0, $position ) . $this->meta_where . ')';
		return $search;
	}

	/**
	 * Remove the SQL where condition for post meta.
	 * The condition is caught and saved in $this->meta_where and later used in posts_search filter.
	 *
	 * @param array $sql SQL clauses.
	 *
	 * @return array
	 */
	public function change_sql_where( $sql ) {
		$this->meta_where = ' OR ' . substr( $sql['where'], 5 ); // Change 'AND' to 'OR'.
		$sql['where']     = '';
		return $sql;
	}

	/**
	 * Check if we in right page in admin area.
	 *
	 * @return bool
	 */
	private function is_screen() {
		return get_current_screen()->post_type === $this->object_type;
	}

	/**
	 * Check if meta box has at least a searchable field.
	 *
	 * @return boolean
	 */
	private function has_searchable_field() {
		$fields = $this->fields;

		$found = false;

		foreach ( $fields as $field ) {
			if ( empty( $field['admin_columns'] ) ) {
				continue;
			}

			if ( ! empty( $field['admin_columns']['searchable'] ) ) {
				$found = true;
				break;
			}
		}

		return $found;
	}
}
