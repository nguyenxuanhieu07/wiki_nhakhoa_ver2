<?php 
add_filter( 'rwmb_meta_boxes', 'wiki_brand_meta_box' );
function wiki_brand_meta_box( $meta_boxes ) {
    $name_province = wiki_get_province();
    $meta_boxes[] = array(
		'id'         => 'brand-post-meta',
		'title'      => 'Thông tin cơ sở',
		'post_types' => 'brand',
		'context'    => 'normal',
		'priority'   => 'high',
		'tabs'      => array(
			'general' => array(
				'label' => 'Thông tin chung',
				'icon'  => 'dashicons-email',
			),
			'list-brand'    => array(
				'label' => 'Danh sách cơ sở',
				'icon'  => 'dashicons-awards',
			),
			'exp'    => array(
				'label' => 'Giấy phép hoạt động',
				'icon'  => 'dashicons-list-view',
			),
			'certification'    => array(
				'label' => 'Chứng nhận',
				'icon'  => 'dashicons-awards',
			),
			'brand-insurance'    => array(
				'label' => 'Bảo hành',
				'icon'  => 'dashicons-awards',
			),
			'brand-utilities'    => array(
				'label' => 'Tiện ích',
				'icon'  => 'dashicons-awards',
			),
			'brand-other'    => array(
				'label' => 'Thông tin khác',
				'icon'  => 'dashicons-awards',
			),
		),
		'tab_style' => 'box',
		'tab_wrapper' => true,
		'fields' => array(
			array(
				'name' => 'Tên cơ sở',
				'id'   => 'brand-fullname',
				'type' => 'text',
				'size'=> 50,
				'tab'  => 'general',
			),
			array(
				'name' => 'Thời gian làm việc',
				'id'   => 'brand-time-work',
				'type' => 'text',
				'size'=> 50,
				'tab'  => 'general',
			),
			array(
				'name'        => 'Chuyên khoa',
				'id'          => 'brand-list-specical',
				'multiple'    => true,
				'type'       => 'taxonomy_advanced',
				'field_type'  => 'select_advanced',
				'tab'         => 'general',
				'ajax'       => true,
				'placeholder' => 'Lựa chọn',
				'taxonomy' => 'doctor_cat',
				'query_args'  => array(
					'parent'  => 0
				),
			),
            array(
				'name' => 'Cơ sở vật chất',
				'id'   => 'brand-degree-basis',
				'type' => 'image_advanced',
				'tab'  => 'general',
			),
			array(
				'name' => 'Giới thiệu ngắn',
				'id'   => 'brand-desc',
				'type'    => 'wysiwyg',
				'raw'     => false,
				'options' => [
					'textarea_rows' => 8,
					'teeny'         => false,
				],
				'tab'  => 'general',
			),
			array(
				'name'        => 'Dịch vụ',
				'id'          => 'brand-list-service',
				'multiple'    => true,
				'type'       => 'taxonomy_advanced',
				'field_type'  => 'select_advanced',
				'tab'         => 'general',
				'ajax'       => true,
				'placeholder' => 'Lựa chọn',
				'taxonomy' => 'service_cat',
				'query_args'  => array(
					'parent'  => 0
				),
			),
            array(
				'name'  => 'Lựa chọn tỉnh thành',
				'id'    => 'doctor_province',
				'multiple'        => true,
				'type'  => 'select_advanced',
				'tab'  => 'general',
				'options'         => $name_province,
			),
			array(
				'name'  => 'Lựa chọn quận huyện',
				'id'    => 'doctor_district',
				'type'  => 'select_advanced',
				'tab'  => 'general',
				'multiple'        => true,
				'options'         => [
					'chon'	=> '---Lựa chọn---',
				],
			),
			array(
				'name' => 'Chứng nhận',
				'id'   => 'brand-certification',
				'type' => 'image_advanced',
				'tab'  => 'certification',
			),
			array(
				'name' => __( 'Danh sách cơ sở' ),
				'id'     => 'list-address-brand',
				'type'   => 'group',
				'clone'  => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => array( 'field' => 'title-address-brand' ),
				'add_button' => 'Thêm địa chỉ mới',
                'tab'       => 'list-brand',
				'fields' => array(
					array(
						'name'  => 'Địa chỉ',
						'id'    => 'title-address-brand',
						'type'  => 'text',
						'size'	=> 80,
					),
				),
			),
			array(
				'name' => __( 'Thông tin bảo hành' ),
				'id'     => 'brand-insurance-group',
				'type'   => 'group',
				'clone'  => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => array( 'field' => 'brand-insurance-title' ),
				'add_button' => 'Thêm khách hàng mới',
                'tab'       => 'brand-insurance',
				'fields' => array(
					array(
						'name'  => 'Tên bảo hành',
						'id'    => 'brand-insurance-title',
						'type'  => 'text',
						'size'	=> 80,
					),
					array(
						'name'  => 'Hình ảnh bảo hành',
						'id'    => 'brand-insurance-img',
						'type'  => 'image_advanced',
					),
                    array(
						'name'  => 'Nội dung',
						'id'    => 'brand-insurance-text',
						'type'  => 'text',
						'size'	=> 80,
					),
				),
			),
			array(
				'name' => 'Giấy phép',
				'id'   => 'brand-degree',
				'type' => 'image_advanced',
				'tab'  => 'exp',
			),
			array(
				'name'            => 'Cơ sở',
				'id'              => 'list-brand-utilities',
				'type'            => 'checkbox_list',
				'tab'       => 'brand-utilities',
				'options' => [
					'dau-xe'       => 'Bãi đậu xe',
					'wc' => 'Nhà vệ sinh',
					'hieu-thuoc'        => 'Hiệu thuốc tại chỗ',
					'phong-cho'     => 'Phòng chờ',
					'phong-nghi-duong'     => 'Phòng nghỉ dưỡng',
				],
			),
			array(
				'name'            => 'Dịch vụ',
				'id'              => 'list-service-utilities',
				'type'            => 'checkbox_list',
				'tab'       => 'brand-utilities',
				'options' => [
					'dat-lich'       => 'Đặt lịch trực tuyến',
					'tu-van' => 'Tư vấn trực tuyến',
					'mo-cua'        => 'Mở cửa cuối tuần',
					'cham-soc'     => 'Chăm sóc sau khám chữa',
					'ho-so'     => 'Hồ sơ bệnh nhân điện tử',
					'ho-tro'     => 'Hỗ trợ đi lại',
				],
			),
			array(
				'name' => 'Trung bình số lượng khách hàng thực hiện dịch vụ mỗi tháng',
				'id'   => 'brand-custom-number',
				'type' => 'text',
				'size'=> 50,
				'tab'  => 'brand-other',
			),
			array(
				'name' => 'Số lượng khách hàng đặt lịch qua wikinhakhoa',
				'id'   => 'brand-custom-number-wiki',
				'type' => 'text',
				'size'=> 50,
				'tab'  => 'brand-other',
			),	
		)
	);
    return $meta_boxes;
}


add_filter( 'mb_settings_pages', function ( $settings_pages ) {
    $settings_pages[] = [
        'id'          => 'brand-setting',
        'option_name' => 'brand_setting',
        'menu_title'  => 'Cài đặt cơ sở',
        'parent'      => 'edit.php?post_type=brand',
    ];
    return $settings_pages;
} );

if(!function_exists('wiki_brand_setting')) {
    add_filter( 'rwmb_meta_boxes', 'wiki_brand_setting' );
    function wiki_brand_setting( $meta_boxes ){
		$meta_boxes[] = array(
            'title'  => __('Tiêu chí đánh giá'),
            'settings_pages' => 'brand-setting',
            'fields' => array(
                array(
                    'name' => __( 'Tiêu chí' ),
                    'id'     => 'brand-evaluation-criteria',
                    'type'   => 'group',
                    'clone'  => true,
                    'sort_clone'  => true,
                    'collapsible' => true,
                    'group_title' => 'Tiêu chí',
                    'save_state' => true,
                    'add_button' => 'Thêm tiêu chí',
                    'fields' => array(
                        array(
                            'id'       => 'brand-criteria-item',
                            'type'     => 'text',
                            'size'     => 50,
                            'placeholder'   => 'Nhập tiêu chí đánh giá của bác sĩ',
                        ),
                    ),
                ),
            ),
        );
		return $meta_boxes;
	}
}