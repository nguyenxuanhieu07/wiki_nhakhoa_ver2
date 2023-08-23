<?php 
add_filter( 'rwmb_meta_boxes', 'wiki_service_meta_box' );
function wiki_service_meta_box( $meta_boxes ) {
    $meta_boxes[] = array(
		'id'         => 'options',
		'title'      => 'Hiện thị thông tin',
		'taxonomies'	 => array('service_cat'),
		'context'    => 'normal',
		'style'      => 'default',
		'priority'   => 'high',
		'fields' => array(
			array(
				'name'  => 'Hiển thị trong box tìm kiếm',
				'id'    => 'in_search_box_service',
				'type'  => 'checkbox',
			),
			array(
				'name' => 'Ảnh Icon',
				'id'   => 'icon-service_cat',
				'type' => 'image_advanced',
				'max_file_uploads'	=> 1,
			),
			array(
				'name' => __( 'Ảnh banner' ),
				'id'     => 'service-cat-banner',
				'type'   => 'group',
				'clone'  => false,
				'sort_clone'  => true,
				'collapsible' => false,
				'group_title' => array( 'field' => 'title-service_cat' ),
				'save_state' => false,
				'fields' => array(
					array(
						'name' => 'Hình ảnh desktop',
						'id'   => 'cat-banner-desktop',
						'type' => 'image_advanced',
						'max_file_uploads'	=> 1,
					),
					array(
						'name' => 'Hình ảnh mobile',
						'id'   => 'cat-banner-mobile',
						'type' => 'image_advanced',
						'max_file_uploads'	=> 1,
					),
				),
			),
			array(
				'type' => 'divider',
			),
			array(
				'name' => __( 'Giới thiệu chung' ),
				'id'     => 'service-cat-general',
				'type'   => 'group',
				'clone'  => false,
				'sort_clone'  => true,
				'collapsible' => false,
				'group_title' => array( 'field' => 'title-service_general' ),
				'save_state' => false,
				'fields' => array(
					array(
						'name' => 'Tiêu đề',
						'id'   => 'title-service_general',
						'type' => 'text',
					),
					array(
						'name' => 'Nội dung',
						'id'   => 'desc-service_general',
						'type'    => 'wysiwyg',
						'raw'     => false,
						'options' => [
							'textarea_rows' => 8,
							'teeny'         => false,
						],
					),
					array(
						'name' => 'Hình ảnh mobile',
						'id'   => 'img-desc-service_general',
						'type' => 'image_advanced',
					),
				),
			),
			array(
				'type' => 'divider',
			),
			array(
				'name' => __( 'Lưu ý trước khi làm dịch vụ ( dùng cho dịch vụ cha)' ),
				'id'     => 'service-cat-note',
				'type'   => 'group',
				'clone'  => false,
				'sort_clone'  => false,
				'collapsible' => false,
				'group_title' => array( 'field' => 'title-service_note' ),
				'save_state' => false,
				'fields' => array(
					array(
						'name' => 'Tiêu đề',
						'id'   => 'title-service_note',
						'type' => 'text',
					),
					array(
						'name' => 'Nội dung',
						'id'   => 'desc-service_note',
						'type'    => 'wysiwyg',
						'raw'     => false,
						'options' => [
							'textarea_rows' => 8,
							'teeny'         => false,
						],
						
					),
					array(
						'name' => __( 'Các lưu ý khác' ),
						'id'     => 'service-cat-note-child',
						'type'   => 'group',
						'clone'  => true,
						'sort_clone'  => true,
						'collapsible' => true,
						'group_title' => array( 'field' => 'title-service_note-child' ),
						'save_state' => true,
						'fields' => array(
							array(
								'name' => 'Tiêu đề',
								'id'   => 'title-service_note-child',
								'type' => 'text',
							),
							array(
								'name' => 'Nội dung',
								'id'   => 'desc-service_note',
								'type'    => 'wysiwyg',
								'raw'     => false,
								'options' => [
									'textarea_rows' => 8,
									'teeny'         => false,
								],
								
							),
							
						),
					),
				),
			),
			array(
				'type' => 'divider',
			),
			array(
				'name' => __( 'Lý do lựa chọn dịch vụ ( dùng cho dịch vụ con)' ),
				'id'     => 'service-cat-reason',
				'type'   => 'group',
				'clone'  => false,
				'sort_clone'  => false,
				'collapsible' => false,
				'group_title' => array( 'field' => 'title-service_reason' ),
				'save_state' => false,
				'fields' => array(
					array(
						'name' => 'Tiêu đề',
						'id'   => 'title-service_reason',
						'type' => 'text',
					),
					array(
						'name' => 'Nội dung',
						'id'   => 'desc-service_reason',
						'type'    => 'text',
						
					),
					array(
						'name' => __( 'Các cột' ),
						'id'     => 'service-cat-reason-child',
						'type'   => 'group',
						'clone'  => true,
						'sort_clone'  => true,
						'collapsible' => true,
						'group_title' => array( 'field' => 'title-service_reason-child' ),
						'save_state' => true,
						'fields' => array(
							array(
								'name' => 'Tiêu đề',
								'id'   => 'title-service_reason-child',
								'type' => 'text',
							),
							array(
								'name' => 'Nội dung',
								'id'   => 'desc-service_reason',
								'type'    => 'text',
								
							),
							array(
								'name' => 'Hình ảnh mobile',
								'id'   => 'img-service_reason-child',
								'type' => 'image_advanced',
								'max_file_uploads'	=> 1,
							),
						),
					),
				),
			),
			array(
				'type' => 'divider',
			),
			array(
				'name' => __( 'Các phương pháp' ),
				'id'     => 'service-cat-method',
				'type'   => 'group',
				'clone'  => false,
				'sort_clone'  => false,
				'collapsible' => false,
				'group_title' => array( 'field' => 'title-service_method' ),
				'save_state' => false,
				'fields' => array(
					array(
						'name' => 'Tiêu đề',
						'id'   => 'title-service_method',
						'type' => 'text',
					),
					array(
						'name' => 'Nội dung',
						'id'   => 'desc-service_method',
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
				'type' => 'divider',
			),
			array(
				'name' => __( 'Quy trình thời gian' ),
				'id'     => 'service-cat-time',
				'type'   => 'group',
				'clone'  => false,
				'sort_clone'  => false,
				'collapsible' => false,
				'group_title' => array( 'field' => 'title-service_time' ),
				'save_state' => false,
				'fields' => array(
					array(
						'name' => 'Tiêu đề',
						'id'   => 'title-service_time',
						'type' => 'text',
					),
					array(
						'name' => 'Nội dung',
						'id'   => 'desc-service_time',
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
				'type' => 'divider',
			),
			array(
				'name' => __( 'Bảng giá' ),
				'id'     => 'service-cat-price',
				'type'   => 'group',
				'clone'  => false,
				'sort_clone'  => false,
				'collapsible' => false,
				'group_title' => array( 'field' => 'title-service_price' ),
				'save_state' => false,
				'fields' => array(
					array(
						'name' => 'Tiêu đề',
						'id'   => 'title-service_price',
						'type' => 'text',
					),
					array(
						'name' => 'Nội dung',
						'id'   => 'desc-service_price',
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
				'type' => 'divider',
			),
			array(
				'name' => __( 'Lưu ý sau khi làm dịch vụ' ),
				'id'     => 'service-cat-note-after',
				'type'   => 'group',
				'clone'  => false,
				'sort_clone'  => false,
				'collapsible' => false,
				'group_title' => array( 'field' => 'title-service_note-after' ),
				'save_state' => false,
				'fields' => array(
					array(
						'name' => 'Tiêu đề',
						'id'   => 'title-service_note-after',
						'type' => 'text',
					),
					array(
						'name' => 'Nội dung',
						'id'   => 'desc-service_note-after',
						'type'    => 'wysiwyg',
						'raw'     => false,
						'options' => [
							'textarea_rows' => 8,
							'teeny'         => false,
						],	
					),
					array(
						'name' => __( 'Các lưu ý khác' ),
						'id'     => 'service-cat-note-after-child',
						'type'   => 'group',
						'clone'  => true,
						'sort_clone'  => true,
						'collapsible' => true,
						'group_title' => array( 'field' => 'title-service_note-after-child' ),
						'save_state' => true,
						'fields' => array(
							array(
								'name' => 'Tiêu đề',
								'id'   => 'title-service_note-after-child',
								'type' => 'text',
							),
							array(
								'name' => 'Nội dung',
								'id'   => 'desc-service_note-after',
								'type'    => 'wysiwyg',
								'raw'     => false,
								'options' => [
									'textarea_rows' => 8,
									'teeny'         => false,
								],
								
							),	
						),
					),
				),
			),
			array(
				'type' => 'divider',
			),
			array(
				'name' => __( 'Câu hỏi thường gặp' ),
				'id'     => 'service-cat-question',
				'type'   => 'group',
				'clone'  => false,
				'sort_clone'  => false,
				'collapsible' => false,
				'group_title' => array( 'field' => 'title-service_question' ),
				'save_state' => false,
				'fields' => array(
					array(
						'name' => 'Câu hỏi',
						'id'   => 'title-service_question',
						'type' => 'text',
					),
					array(
						'name' => 'Nội dung',
						'id'   => 'desc-service_question',
						'type'    => 'wysiwyg',
						'raw'     => false,
						'options' => [
							'textarea_rows' => 8,
							'teeny'         => false,
						],	
					),
				),
			),
		),
	);
    return $meta_boxes;
}