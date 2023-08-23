<?php 
add_filter( 'rwmb_meta_boxes', 'wiki_doctor_meta_box' );
function wiki_doctor_meta_box( $meta_boxes ) {
	$options = get_option('doctor_setting');
	$name_province = wiki_get_province();
	$arr_position = [];
	if(isset($options['doctor-position-group']) && !empty($options['doctor-position-group'])){
		$position = $options['doctor-position-group'];
		$doctor_position = array();
		foreach($position as $vl_position){
			$doctor_position[$vl_position['doctor-position-item']] = $vl_position['doctor-position-item'];
		}
		$arr_position = $doctor_position;
	}
	$meta_boxes[] = array(
		'id'         => 'doctor-options',
		'title'      => 'Tùy chọn hiển thị',
		'post_types' => 'doctor',
		'taxonomies'	 => array('doctor_cat'),
		'context'    => 'normal',
		'priority'   => 'high',
		'fields' => array(
			array(
				'name'  => 'Hiển thị trong box tìm kiếm',
				'id'    => 'in_search_box',
				'type'  => 'checkbox',
			),
			array(
				'name' => 'Kết nối với Bác sĩ',
				'id'   => 'doctor_cat-id',
				'type' => 'checkbox',
			),
			array(
				'name' => 'Ảnh Icon',
				'id'   => 'icon-doctor_cat',
				'type' => 'image_advanced',
				'max_file_uploads'	=> 1,
			),
			array(
				'name'        => 'Dịch vụ',
				'id'          => 'doctor-cat-list-service',
				'multiple'    => true,
				'type'       => 'taxonomy_advanced',
				'field_type'  => 'select_advanced',
				'ajax'       => true,
				'placeholder' => 'Lựa chọn',
				'taxonomy' => 'service_cat',
				'query_args'  => array(
					'parent'  => 0
				),
			),
		),
	);
	$meta_boxes[] = array(
		'id'         => 'expert-post-meta',
		'title'      => 'Hồ sơ bác sĩ / chuyên gia',
		'post_types' => 'doctor',
		'context'    => 'normal',
		'priority'   => 'high',
		'tabs'      => array(
			'general' => array(
				'label' => 'Thông tin chung',
				'icon'  => 'dashicons-email',
			),
			'degree'    => array(
				'label' => 'Bằng cấp chứng chỉ',
				'icon'  => 'dashicons-awards',
			),
			'training'    => array(
				'label' => 'Quá trình đào tạo',
				'icon'  => 'dashicons-awards',
			),
			'exp'    => array(
				'label' => 'Kinh nghiệm',
				'icon'  => 'dashicons-list-view',
			),
			'social'  => array(
				'label' => 'Mạng xã hội',
				'icon'  => 'dashicons-share', 
			),
			'other'  => array(
				'label' => 'Thông tin khác',
				'icon'  => 'dashicons-share', 
			),
		),
		'tab_style' => 'box',
		'tab_wrapper' => true,
		'fields' => array(
			array(
				'name' => 'Họ tên',
				'id'   => 'expert-name',
				'type' => 'text',
				'size'=> 50,
				'tab'  => 'general',
			),
			array(
				'name' => 'Số năm kinh nghiệm',
				'id'   => 'expert-exp',
				'type' => 'text',
				'size'=> 50,
				'tab'  => 'general',
			),
			array(
				'name' => 'Học hàm / học vị',
				'placeholder' => 'Lựa chọn',
				'id'   => 'expert-office',
				'type' => 'select_advanced',
				'multiple'        => true,
				'options'  => $arr_position,
				'size'=> 50,
				'tab'  => 'general',
			),
			array(
				'name'        => 'Nơi công tác',
				'id'          => 'expert-brand',
				'type'        => 'post',
				'field_type'  => 'select_advanced',
				'multiple'        => true,
				'tab'  => 'general',
				'placeholder' => 'Lựa chọn',
				'query_args'  => [
					'post_status'    => 'publish',
					'posts_per_page' => -1,
					'post_type'   => 'brand',
				],
			),
			array(
				'name'        => 'Dịch vụ',
				'id'          => 'expert-list-service',
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
				'name' => 'Giới thiệu ngắn',
				'id'   => 'expert-desc',
				'type'    => 'wysiwyg',
				'raw'     => false,
				'options' => [
					'textarea_rows' => 8,
					'teeny'         => false,
				],
				'class'  => 'entry-desc',
				'tab'  => 'general',
			),
			array(
				'name' => 'Giờ làm việc',
				'id'   => 'expert-time-work',
				'type' => 'text',
				'size'=> 50,
				'tab'  => 'general',
			),
			array(
				'name'  => 'Lựa chọn tỉnh thành',
				'id'    => 'doctor_province',
				'multiple'        => true,
				'type'  => 'select_advanced',
				'ajax'       => true,
				'tab'  => 'general',
				'options'         => $name_province,
			),
			array(
				'name'  => 'Lựa chọn quận huyện',
				'id'    => 'doctor_district',
				'multiple'        => true,
				'type'  => 'select_advanced',
				'ajax'       => true,
				'tab'  => 'general',
				'placeholder' => 'Lựa chọn',
			),
			array(
				'name' => 'Facebook',
				'id'   => 'expert-facebook',
				'type' => 'text',
				'size'=> 50,
				'tab'  => 'social',
			),
			array(
				'name' => 'Zalo',
				'id'   => 'expert-zalo',
				'type' => 'text',
				'size'=> 50,
				'tab'  => 'social',
			),
			array(
				'name' => 'Instagram',
				'id'   => 'expert-instagram',
				'type' => 'text',
				'size'=> 50,
				'tab'  => 'social',
			),
			array(
				'name' => 'Tiktok',
				'id'   => 'expert-tiktok',
				'type' => 'text',
				'size'=> 50,
				'tab'  => 'social',
			),
			array(
				'name'    => 'Kinh nghiệm chuyên môn',
				'id'      => 'expert-exp-specialize',
				'type'    => 'wysiwyg',
				'raw'     => false,
				'options' => [
					'textarea_rows' => 8,
					'teeny'         => true,
				],
				'tab'  => 'exp',
			),
			array(
				'name' => 'Thành tựu',
				'id'   => 'expert-research',
				'type'    => 'wysiwyg',
				'raw'     => false,
				'options' => [
					'textarea_rows' => 8,
					'teeny'         => true,
				],
				'tab'  => 'research',
			),
			array(
				'name' => 'Quá trình đào tạo',
				'id'   => 'expert-certificate',
				'type'    => 'wysiwyg',
				'raw'     => false,
				'options' => [
					'textarea_rows' => 8,
					'teeny'         => true,
				],
				'tab'  => 'training',
			),
			 array(
				'id'               => 'expert-degree',
				'name'             => 'Bằng cấp / chứng chỉ',
				'type'             => 'image_advanced',
				'force_delete'     => false,
				'max_status'       => false,
				'image_size'       => 'thumbnail',
				'tab'  => 'degree',
			),
			array(
				'name' => 'Trung bình số lượng khách hàng thực hiện dịch vụ mỗi tháng',
				'id'   => 'expert-custom-number',
				'type' => 'text',
				'size'=> 50,
				'tab'  => 'other',
			),
			array(
				'name' => 'Số lượng khách hàng đặt lịch qua wikinhakhoa',
				'id'   => 'expert-custom-number-wiki',
				'type' => 'text',
				'size'=> 50,
				'tab'  => 'other',
			),		
		)
	);
    return $meta_boxes;
}

add_filter( 'mb_settings_pages', function ( $settings_pages ) {
    $settings_pages[] = [
        'id'          => 'doctor-setting',
        'option_name' => 'doctor_setting',
        'menu_title'  => 'Cài đặt chuyên gia',
        'parent'      => 'edit.php?post_type=doctor',
    ];
    return $settings_pages;
} );

if(!function_exists('wiki_doctor_setting')) {
    add_filter( 'rwmb_meta_boxes', 'wiki_doctor_setting' );
    function wiki_doctor_setting( $meta_boxes ){
		$meta_boxes[] = array(
            'title'  => __('Cài đặt chuyên gia'),
            'settings_pages' => 'doctor-setting',
            'fields' => array(
                array(
                    'name' => __( 'Thông tin chức vụ/học hàm' ),
                    'id'     => 'doctor-position-group',
                    'type'   => 'group',
                    'clone'  => true,
                    'sort_clone'  => true,
                    'collapsible' => true,
                    'group_title' => 'Chức vụ/học hàm',
                    'save_state' => true,
                    'add_button' => 'Thêm chức vụ',
                    'fields' => array(
                        array(
                            'id'       => 'doctor-position-item',
                            'type'     => 'text',
                            'size'     => 50,
                            'placeholder'   => 'Nhập chức vụ, học hàm chuyên gia',
                        ),
                    ),
                ),
            ),
        );
		$meta_boxes[] = array(
            'title'  => __('Tiêu chí đánh giá'),
            'settings_pages' => 'doctor-setting',
            'fields' => array(
                array(
                    'name' => __( 'Tiêu chí' ),
                    'id'     => 'doctor-evaluation-criteria',
                    'type'   => 'group',
                    'clone'  => true,
                    'sort_clone'  => true,
                    'collapsible' => true,
                    'group_title' => 'Tiêu chí',
                    'save_state' => true,
                    'add_button' => 'Thêm tiêu chí',
                    'fields' => array(
                        array(
                            'id'       => 'doctor-criteria-item',
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