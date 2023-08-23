<?php 
require_once dirname(__FILE__). '/meta-box-price.php';
if(!function_exists('wb_create_post_type_price_wiki')){
	function wb_create_post_type_price_wiki() {
		if (current_user_can( 'user_aprove_comments' ) ) return;
		$labels = array(
			'name'                  => _x( 'Bảng giá', 'Post Type Name', 'wiki_nhakhoa' ),
			'singular_name'         => _x( 'Bảng giá', 'Post Type Singular Name', 'wiki_nhakhoa' ),
			'menu_name'             => __( 'Bảng giá', 'wiki_nhakhoa' ),
			'name_admin_bar'        => __( 'Bảng giá', 'wiki_nhakhoa' ),
			'archives'              => __( 'Tất cả Bảng giá', 'wiki_nhakhoa' ),
			'parent_item_colon'     => __( 'Parent Item:', 'wiki_nhakhoa' ),
			'all_items'             => __( 'Tất cả Bảng giá', 'wiki_nhakhoa' ),
			'add_new_item'          => __( 'Thêm Bảng giá', 'wiki_nhakhoa' ),
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
			'slug'                  => 'bang-gia',
			'with_front'            => true,
			'pages'                 => true,
			'feeds'                 => true,
		);
		$args = array(
			'label'                 => __( 'Bảng giá', 'wiki_nhakhoa' ),
			'description'           => __( 'Tổng hợp những Bảng giá', 'wiki_nhakhoa' ),
			'labels'                => $labels,
			'supports'              => array( 'title', 'editor', 'author', 'thumbnail', 'comments', 'revisions' ),
			'hierarchical'          => false,
			'public'                => true,
			'show_ui'               => true,
			'show_in_menu'          => true,
			'menu_position'         => 10,
			'menu_icon'             => 'dashicons-money-alt',
			'show_in_admin_bar'     => true,
			'show_in_nav_menus'     => true,
			'can_export'            => true,
			'has_archive'           => true,
			'exclude_from_search'   => false,
			'publicly_queryable'    => true,
			'rewrite'               => $rewrite,
			'capability_type'       => 'post',
		);
		register_post_type( 'price', $args );

	}
	add_action( 'init', 'wb_create_post_type_price_wiki', 0 );
}

