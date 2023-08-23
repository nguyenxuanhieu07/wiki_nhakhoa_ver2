<?php
add_filter( 'rwmb_meta_boxes', 'wiki_toplist_meta_box' );
function wiki_toplist_meta_box( $meta_boxes ) {
    $name_province = wiki_get_province();
    $meta_boxes[] = array(
		'id'         => 'toplist-post-meta',
		'title'      => 'Cài đặt toplist',
		'post_types' => 'toplist',
		'context'    => 'normal',
		'priority'   => 'high',
		'fields' => array(
			array(
				'id'   => 'form_status',
				'type' => 'switch',
				'name' => 'Trạng thái',
				'style'     => 'rounded',
				'on_label'  => 'ON',
				'off_label' => 'OFF',
				'std'  => 1,
				'admin_columns' => 'before title',
			),
            array(
                'name'  => 'Title toplist',
                'id'    => 'toplist-title-main',
                'type'  => 'text',
            ),
			array(
				'name'  => 'Lựa chọn post-type',
				'id'    => 'toplist-type',
				'type'  => 'select_advanced',
				'options'         => array(
                    ''  => 'Lựa chọn',
                    'doctor'  => 'Chuyên gia',
                    'brand'   => 'Cơ sở'
                ),
			),
			array(
				'name'        => 'Dịch vụ',
				'id'          => 'toplist-service',
				// 'multiple'    => true,
				'type'       => 'taxonomy_advanced',
				'field_type'  => 'select_advanced',
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
				'type'  => 'select_advanced',
                'multiple'        => true,
				'ajax'       => true,
				'tab'  => 'general',
				'options'         => $name_province,
			),
			array(
				'name'  => 'Lựa chọn quận huyện',
				'id'    => 'doctor_district',
				'type'  => 'select_advanced',
                'multiple'        => true,
				'ajax'       => true,
				'tab'  => 'general',
				'placeholder' => 'Lựa chọn',
			),
			array(
                'name'  => 'Số lượng hiển thị',
                'id'    => 'show-number-post',
                'type'  => 'text',
				'std'   => 10
            ),
			array(
                'name'  => 'Số khách hàng sử dụng dịch vụ mỗi tháng',
                'id'    => 'toplist-customer',
                'type'  => 'text',
				'std'   => 10
            ),
			array(
                'name'  => 'Số khách hàng đặt lịch khám qua Wiki Nha Khoa',
                'id'    => 'toplist-customer-wiki',
                'type'  => 'text',
				'std'   => 10
            ),
            array(
				'name' => 'Giới thiệu',
				'id'   => 'toplist-desc',
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
				'name' => __( 'FAQ' ),
				'id'     => 'toplist-faq',
				'type'   => 'group',
				'clone'  => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => array( 'field' => 'toplist-title' ),
				'add_button' => 'Thêm tiện ích',
				'fields' => array(
					array(
						'name'  => 'Title',
						'id'    => 'toplist-title',
						'type'  => 'text',
					),
                    array(
						'name'  => 'Nội dung',
						'id'    => 'toplist-content',
						'type'  => 'textarea',
					),
				),
			),
			array(
				'name' => 'Nội dung bên dưới',
				'id'   => 'toplist-desc-last',
				'type'    => 'wysiwyg',
				'raw'     => false,
				'options' => [
					'textarea_rows' => 8,
					'teeny'         => false,
				],
				'class'  => 'entry-desc',
				'tab'  => 'general',
			),
		),
	);
   
    return $meta_boxes;
}