<?php
add_filter( 'mb_settings_pages', 'wiki_homepage_options' );
function wiki_homepage_options( $settings_pages ) {
	if (current_user_can( 'user_aprove_comments' ) ) return;
	$settings_pages[] = array(
		'id'          => 'wiki-homepage-options',
		'option_name' => 'wiki-homepage-options',
		'menu_title'  => 'Trang chủ',
		'parent'      => 'wiki-theme-options',
	);
	return $settings_pages;
}
add_filter( 'rwmb_meta_boxes', 'wiki_home_option_meta_box' );
function wiki_home_option_meta_box( $meta_boxes ) {
	$name_province = wiki_get_province();
	$meta_boxes[] = array(
		'title'  => __('Chủ đề Hot'),
		'settings_pages' => 'wiki-homepage-options',
		'fields' => array(
			array(
				'name' => __( 'Các chủ đề Hot', 'sheis' ),
				'id'     => 'topic-hot-group',
				'type'   => 'group',
				'clone'  => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => array( 'field' => 'topic-group-title' ),
				'save_state' => true,
				'add_button' => 'Thêm chủ đề mới',
				'fields' => array(
					array(
						'name'  => 'Tên chủ đề',
						'id'    => 'topic-group-title',
						'type'  => 'text',
						'size'	=> 80,
					),
					array(
						'name'  => 'Link chủ đề',
						'id'    => 'topic-item-link',
						'type'  => 'text',
						'size'	=> 80,
					),
				),
			),
		),
	);
	$meta_boxes[] = array(
		'title'  => __('Các thương hiệu'),
		'settings_pages' => 'wiki-homepage-options',
		'fields' => array(
			array(
				'name' => __( 'Các thương hiệu nổi bật', 'sheis' ),
				'id'     => 'brand-group',
				'type'   => 'group',
				'clone'  => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => array( 'field' => 'brand-group-title' ),
				'save_state' => true,
				'add_button' => 'Thêm thương hiệu',
				'fields' => array(
					array(
						'name'  => 'Title ảnh',
						'id'    => 'brand-group-title',
						'type'  => 'text',
						'size'	=> 80,
					),
					array(
						'name'  => 'Logo thương hiệu',
						'id'    => 'brand-item-image',
						'type'  => 'image_advanced',
						'max_file_uploads'	=> 1
					),
				),
			),
		),
	);
	$meta_boxes[] = array(
		'title'  => __('Dịch vụ nha khoa'),
		'settings_pages' => 'wiki-homepage-options',
		'fields' => array(
			array(
				'name' => __( 'Các dịch vụ nổi bật', 'wiki_nhakhoa' ),
				'id'     => 'brand-cate-group',
				'type'   => 'group',
				'clone'  => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => array( 'field' => 'brand-cate-title' ),
				'save_state' => true,
				'add_button' => 'Thêm dịch vụ',
				'fields' => array(
					array(
						'name'  => 'Ảnh',
						'id'    => 'brand-icon-image',
						'type'  => 'image_advanced',
						'max_file_uploads'	=> 1
					),
					array(
						'name'  => 'Tiêu đề',
						'id'    => 'brand-cate-title',
						'type'  => 'text',
						'size'	=> 80,
					),
					array(
						'name'  => 'Link đích',
						'id'    => 'brand-cate-link',
						'type'  => 'text',
						'size'	=> 80,
					),
				),
			),
		),
	);
	$meta_boxes[] = array(
		'title'  => __('Giải pháp'),
		'settings_pages' => 'wiki-homepage-options',
		'fields' => array(
			array(
				'name' => __( 'Các giải pháp từ wiki', 'wiki_nhakhoa' ),
				'id'     => 'wiki-solution',
				'type'   => 'group',
				'clone'  => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => array( 'field' => 'wiki-solution-title' ),
				'save_state' => true,
				'add_button' => 'Thêm giải pháp',
				'fields' => array(
					array(
						'name'  => 'Ảnh',
						'id'    => 'wiki-solutio-image',
						'type'  => 'image_advanced',
						'max_file_uploads'	=> 1
					),
					array(
						'name'  => 'Tiêu đề',
						'id'    => 'wiki-solution-title',
						'type'  => 'text',
						'size'	=> 80,
					),
					array(
						'name'  => 'Nội dung',
						'id'    => 'wiki-solution-link',
						'type'  => 'textarea',
						'size'	=> 80,
					),
				),
			),
		),
	);
	$meta_boxes[] = array(
		'title'      => 'Tùy chọn tỉnh thành',
		'settings_pages' => 'wiki-homepage-options',
		'fields' => array(
			array(
				'name'  => 'Lựa chọn tỉnh thành hiển thị',
				'id'    => 'display_province',
				'type'  => 'select',
				'clone'	=> true,
				'options'         => $name_province,
			),
		),
	);
	$meta_boxes[] = array(
		'title'      => 'Tùy chỉnh khác',
		'settings_pages' => 'wiki-homepage-options',
		'fields' => array(
			array(
				'name' => __( 'Đăng ký bác sỹ', 'wiki_nhakhoa' ),
				'id'     => 'wiki-register-doctor',
				'type'   => 'group',
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => array( 'field' => 'wiki-register-title' ),
				'fields' => array(
					array(
						'name'  => 'Ảnh',
						'id'    => 'wiki-register-image',
						'type'  => 'image_advanced',
						'max_file_uploads'	=> 1
					),
					array(
						'name'  => 'Tiêu đề',
						'id'    => 'wiki-register-title',
						'type'  => 'text',
						'size'	=> 80,
					),
					array(
						'name'  => 'Nội dung',
						'id'    => 'wiki-register-desc',
						'type'  => 'textarea',
						'size'	=> 80,
					),
					array(
						'name'  => 'Link',
						'id'    => 'wiki-register-link',
						'type'  => 'text',
						'size'	=> 80,
					),
				),
			),
			array(
				'name' => __( 'Đăng ký Cơ sở', 'wiki_nhakhoa' ),
				'id'     => 'wiki-register-brand',
				'type'   => 'group',
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => array( 'field' => 'wiki-register-brand-title' ),
				'fields' => array(
					array(
						'name'  => 'Ảnh',
						'id'    => 'wiki-register-brand-image',
						'type'  => 'image_advanced',
						'max_file_uploads'	=> 1
					),
					array(
						'name'  => 'Tiêu đề',
						'id'    => 'wiki-register-brand-title',
						'type'  => 'text',
						'size'	=> 80,
					),
					array(
						'name'  => 'Nội dung',
						'id'    => 'wiki-register-brand-desc',
						'type'  => 'textarea',
						'size'	=> 80,
					),
					array(
						'name'  => 'Nội dung',
						'id'    => 'wiki-register-brand-link',
						'type'  => 'text',
						'size'	=> 80,
					),
				),
			),
		),
	);
	return $meta_boxes;
}
