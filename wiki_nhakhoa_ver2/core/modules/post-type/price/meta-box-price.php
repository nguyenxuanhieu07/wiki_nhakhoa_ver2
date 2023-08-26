<?php 
add_filter( 'rwmb_meta_boxes', 'wiki_price_meta_box' );
function wiki_price_meta_box( $meta_boxes ) {
	$id_service = rwmb_meta('table_service','',$_GET['post']) ? rwmb_meta('table_service', '', $_GET['post']) : '';
	if($id_service){
		$data = get_post_brands($id_service);
	}
    $meta_boxes[] = array(
		'id'         => 'price-options',
		'title'      => 'Thông tin bảng giá',
		'post_types' => 'table_price',
		'context'    => 'normal',
		'priority'   => 'high',
        'tabs'      => array(
			'general' => array(
				'label' => 'Thông tin chung',
				'icon'  => 'dashicons-email',
			),
			'table' => array(
				'label' => 'Bảng giá',
				'icon'  => 'dashicons-money-alt',
			),
			'factors' => array(
				'label' => 'Yếu tố',
				'icon'  => 'dashicons-editor-ul',
			),
			'brands' => array(
				'label' => 'Cơ sở',
				'icon'  => 'dashicons-admin-multisite',
			),
			'experts' => array(
				'label' => 'Bác sĩ',
				'icon'  => 'dashicons-admin-users',
			),
			'faq' => array(
				'label' => 'FAQ',
				'icon'  => 'dashicons-buddicons-activity',
			),
		),
		'tab_style' => 'box',
		'tab_wrapper' => true,
		'fields' => array(
            array(
				'name' => 'Tên bảng giá',
				'id'   => 'table-price-name',
				'type' => 'text',
				'size'=> 50,
				'tab'  => 'general',
			),
            array(
				'name' => 'Giới thiệu',
				'id'   => 'table-price-desc',
				'type'    => 'wysiwyg',
				'raw'     => false,
				'options' => [
					'textarea_rows' => 8,
					'teeny'         => false,
				],
				'tab'  => 'general',
			),
			array(
				'name' => 'Nội dung cuối bài',
				'id'   => 'table-price-bottom',
				'type'    => 'wysiwyg',
				'raw'     => false,
				'options' => [
					'textarea_rows' => 8,
					'teeny'         => false,
				],
				'tab'  => 'general',
			),
			array(
				'name' => 'Tiêu đề bảng',
				'id'   => 'table_title',
				'type' => 'text',
				'size' => 80,
				'tab'       => 'table'
			),
			array(
				'name'        => 'Dịch vụ',
				'id'          => 'table_service',
				'type'        => 'taxonomy_advanced',
				'field_type'  => 'select_advanced',
				'placeholder' => 'Lựa chọn',
				'ajax'        => true,
				'taxonomy'    => 'service_cat',
				'tab'       => 'table',
				'query_args'  => array(
					'parent' => 0
				),
			),
            array(
				'name' => __( 'Thông tin bảng giá' ),
				'id'     => 'table-price-group',
				'type'   => 'group',
				'clone'  => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => array( 'field' => 'table-name-category' ),
				'add_button' => 'Thêm hạng mục mới',
                'tab'       => 'table',
				'fields' => array(
					array(
						'name'  => 'Tên hạng mục',
						'id'    => 'table-name-category',
						'type'  => 'text',
						'size'	=> 80,
					),
                    array(
						'name'  => 'Giá tối thiểu',
						'id'    => 'table-price-expected',
						'type'  => 'text',
						'size'	=> 80,
					),
                    array(
						'name'  => 'Giá tối đa',
						'id'    => 'table-price-expected1',
						'type'  => 'text',
						'size'	=> 80,
					),
				),
			),
			array(
				'name' => 'Tiêu đề',
				'id'   => 'brands_title',
				'type' => 'text',
				'size' => 80,
				'tab'  => 'brands'
			),
			array(
				'name' => 'Tiêu đề',
				'id'   => 'experts_title',
				'type' => 'text',
				'size' => 80,
				'tab'  => 'experts'
			),
			array(
				'name'     => 'Các cơ sở',
				'id'       => 'table_brands',
				'type'     => 'select_advanced',
				'tab'      => 'brands',
				'multiple' => true,
				'options'  => $data,
			),
			array(
				'name' => 'Tiêu đề Yếu tố',
				'id'   => 'factors_title',
				'type' => 'text',
				'size' => 80,
				'tab'  => 'factors'
			),
			array(
				'name'        => __('Các yếu tố'),
				'id'          => 'factors-group',
				'type'        => 'group',
				'clone'       => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => array('field' => 'factors-title'),
				'add_button'  => 'Thêm hạng mục mới',
				'tab'         => 'factors',
				'fields'      => array(
					array(
						'name' => 'Tiêu đề',
						'id'   => 'factors-title',
						'type' => 'text',
						'size' => 80,
					),
					array(
						'name'    => 'Nội dung',
						'id'      => 'factors-desc',
						'type'    => 'wysiwyg',
						'raw'     => false,
						'options' => [
							'textarea_rows' => 8,
							'teeny'         => false,
						],
					),
				),
			),
			array(
				'name'        => __('FAQ'),
				'id'          => 'toplist-faq',
				'type'        => 'group',
				'clone'       => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => array('field' => 'toplist-title'),
				'add_button'  => 'Thêm tiện ích',
				'tab'  => 'faq',
				'fields'      => array(
					array(
						'name' => 'Title',
						'id'   => 'toplist-title',
						'type' => 'text',
					),
					array(
						'name' => 'Nội dung',
						'id'   => 'toplist-content',
						'type' => 'textarea',
					),
				),
			),
		),
	);
    return $meta_boxes;
}

add_filter('mb_settings_pages', function ($settings_pages) {
	$settings_pages[] = [
		'id'          => 'table-setting',
		'option_name' => 'table_setting',
		'menu_title'  => 'Cài đặt bảng giá',
		'parent'      => 'edit.php?post_type=table_price',
	];
	return $settings_pages;
});

if (!function_exists('wiki_table_setting')) {
	add_filter('rwmb_meta_boxes', 'wiki_table_setting');
	function wiki_table_setting($meta_boxes)
	{
		$meta_boxes[] = array(
			'title'          => __('Cài đặt chuyên gia'),
			'settings_pages' => 'table-setitng',
			'fields'         => array(
				array(
					'name' => 'Tiêu đề',
					'id'   => 'table_setting_title',
					'type' => 'text',
					'size' => 80,
				),
				array(
					'name'    => 'Nội dung',
					'id'      => 'table-setting-desc',
					'type'    => 'wysiwyg',
					'raw'     => false,
					'options' => [
						'textarea_rows' => 8,
						'teeny'         => false,
					],
				),
			),
		);
		return $meta_boxes;
	}
}