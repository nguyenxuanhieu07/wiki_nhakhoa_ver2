<?php 
require_once dirname(__FILE__). '/meta-box-toplist.php';
if(!function_exists('wb_create_post_type_toplist_wiki')){
	function wb_create_post_type_toplist_wiki() {
		if (current_user_can( 'user_aprove_comments' ) ) return;
		$labels = array(
			'name'                  => _x( 'Toplist', 'Post Type Name', 'wiki_nhakhoa' ),
			'singular_name'         => _x( 'Toplist', 'Post Type Singular Name', 'wiki_nhakhoa' ),
			'menu_name'             => __( 'Toplist', 'wiki_nhakhoa' ),
			'name_admin_bar'        => __( 'Toplist', 'wiki_nhakhoa' ),
			'archives'              => __( 'Tất cả Toplist', 'wiki_nhakhoa' ),
			'parent_item_colon'     => __( 'Parent Item:', 'wiki_nhakhoa' ),
			'all_items'             => __( 'Tất cả Toplist', 'wiki_nhakhoa' ),
			'add_new_item'          => __( 'Thêm Toplist', 'wiki_nhakhoa' ),
			'add_new'               => __( 'Thêm mới', 'wiki_nhakhoa' ),
			'new_item'              => __( 'New Event', 'wiki_nhakhoa' ),
			'edit_item'             => __( 'Edit Item', 'wiki_nhakhoa' ),
			'update_item'           => __( 'Update Item', 'wiki_nhakhoa' ),
			'view_item'             => __( 'View Item', 'wiki_nhakhoa' ),
			'search_items'          => __( 'Search Item', 'wiki_nhakhoa' ),
			'not_found'             => __( 'Not found', 'wiki_nhakhoa' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'wiki_nhakhoa' ),
			'featured_image'        => __( 'Featured Image', 'wiki_nhakhoa' ),
			'set_featured_image'    => __( 'Set featured image', 'wiki_nhakhoa' ),
			'remove_featured_image' => __( 'Remove featured image', 'wiki_nhakhoa' ),
			'use_featured_image'    => __( 'Use as featured image', 'wiki_nhakhoa' ),
			'insert_into_item'      => __( 'Insert into item', 'wiki_nhakhoa' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'wiki_nhakhoa' ),
			'items_list'            => __( 'Items list', 'wiki_nhakhoa' ),
			'items_list_navigation' => __( 'Items list navigation', 'wiki_nhakhoa' ),
			'filter_items_list'     => __( 'Filter items list', 'wiki_nhakhoa' ),
		);
		$rewrite = array(
			'slug'                  => 'toplist',
			'with_front'            => true,
			'pages'                 => true,
			'feeds'                 => true,
		);
		$args = array(
			'label'                 => __( 'Toplist', 'wiki_nhakhoa' ),
			'description'           => __( 'Tổng hợp những Toplist', 'wiki_nhakhoa' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'comments', 'revisions' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 10,
			'menu_icon'             => 'dashicons-businessperson',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'rewrite'               => $rewrite,
			'capability_type'       => 'post',
		);
		register_post_type( 'toplist', $args );

	}
}
add_action( 'init', 'wb_create_post_type_toplist_wiki', 0 );

// Register Custom Taxonomy
if(!function_exists('wb_create_toplist_cat_wiki')){

	function wb_create_toplist_cat_wiki() {
		$labels = array(
			'name'                       => _x( 'Chủ đề toplist', 'Taxonomy General Name', 'wiki_nhakhoa' ),
			'singular_name'              => _x( 'Chủ đề toplist', 'Taxonomy Singular Name', 'wiki_nhakhoa' ),
			'menu_name'                  => __( 'Chủ đề toplist', 'wiki_nhakhoa' ),
			'all_items'                  => __( 'Tất cả Chủ đề toplist', 'wiki_nhakhoa' ),
			'parent_item'                => __( 'Chuyên mục cha', 'wiki_nhakhoa' ),
			'parent_item_colon'          => __( 'Chuyên mục cha', 'wiki_nhakhoa' ),
			'new_item_name'              => __( 'Thêm chuyên mục', 'wiki_nhakhoa' ),
			'add_new_item'               => __( 'Thêm mới Chủ đề toplist', 'wiki_nhakhoa' ),
			'edit_item'                  => __( 'Chỉnh sửa', 'wiki_nhakhoa' ),
			'update_item'                => __( 'Cập nhập', 'wiki_nhakhoa' ),
			'view_item'                  => __( 'Xem chuyên mục', 'wiki_nhakhoa' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'wiki_nhakhoa' ),
			'add_or_remove_items'        => __( 'Add or remove items', 'wiki_nhakhoa' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'wiki_nhakhoa' ),
			'popular_items'              => __( 'Popular Items', 'wiki_nhakhoa' ),
			'search_items'               => __( 'Search Items', 'wiki_nhakhoa' ),
			'not_found'                  => __( 'Not Found', 'wiki_nhakhoa' ),
			'no_terms'                   => __( 'No items', 'wiki_nhakhoa' ),
			'items_list'                 => __( 'Items list', 'wiki_nhakhoa' ),
			'items_list_navigation'      => __( 'Items list navigation', 'wiki_nhakhoa' ),
		);
		$rewrite = array(
			'slug'                       => 'chu-de-toplist',
			'with_front'                 => true,
			'hierarchical'               => true,
		);
		$args = array(
			'labels'                     => $labels,
			'hierarchical'               => true,
			'public'                     => true,
			'show_ui'                    => true,
			'show_admin_column'          => true,
			'show_in_nav_menus'          => true,
			'show_tagcloud'              => true,
			'rewrite'                    => $rewrite,
		);
		register_taxonomy( 'toplist-cat', array( 'toplist' ), $args );

	}
	add_action( 'init', 'wb_create_toplist_cat_wiki', 0 );
}