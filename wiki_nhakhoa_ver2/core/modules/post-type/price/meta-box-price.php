<?php 
add_filter( 'rwmb_meta_boxes', 'wiki_price_meta_box' );
function wiki_price_meta_box( $meta_boxes ) {
    $meta_boxes[] = array(
		'id'         => 'price-options',
		'title'      => 'Các yếu tố ảnh hưởng',
		'post_types' => 'price',
		'context'    => 'normal',
		'priority'   => 'high',
		'fields' => array(
			array(
				'name' => __( '' ),
				'id'     => 'price-general',
				'type'   => 'group',
				'clone'  => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => array( 'field' => 'title-price_general' ),
				'save_state' => true,
				'fields' => array(
					array(
						'name' => 'Tiêu đề',
						'id'   => 'title-price_general',
						'type' => 'text',
					),
                    array(
						'name' => 'Mô tả',
						'id'   => 'note-price_general',
						'type' => 'textarea',
					),
                    array(
						'name' => 'Slide yếu tố',
						'id'   => 'slide-price_general',
                        'type'   => 'group',
						'clone'  => true,
                        'sort_clone'  => true,
                        'collapsible' => true,
                        'group_title' => array( 'field' => 'title-price_slide' ),
                        'save_state' => true,
                        'fields' => array(
                            array(
                                'name' => 'Hình ảnh',
                                'id'   => 'img-price_slide',
                                'type' => 'image_advanced',
                                'max_file_uploads'	=> 1,
                            ),	
                            array(
                                'name' => 'Tên',
                                'id'   => 'title-price_slide',
                                'type' => 'text',
                            ),
                            array(
                                'name' => 'Mô tả',
                                'id'   => 'note-price_slide',
                                'type' => 'textarea',
                            ),
                        ),
					),
					array(
						'name' => 'Nội dung',
						'id'   => 'desc-price_general',
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
    $meta_boxes[] = array(
		'id'         => 'price-table-options',
		'title'      => 'Bảng giá chi tiết',
		'post_types' => 'price',
		'context'    => 'normal',
		'priority'   => 'high',
		'fields' => array(
            array(
                'name' => 'Tiêu đề',
                'id'   => 'title-price_table',
                'type' => 'text',
            ),
            array(
                'name' => 'Nội dung',
                'id'   => 'desc-price_table',
                'type'    => 'wysiwyg',
                'raw'     => false,
                'options' => [
                    'textarea_rows' => 8,
                    'teeny'         => false,
                ],
            ),
        ),
    );
    $meta_boxes[] = array(
		'id'         => 'faq-options',
		'title'      => 'Câu hỏi thường gặp',
		'post_types' => 'price',
		'context'    => 'normal',
		'priority'   => 'high',
		'fields' => array(
            array(
                'name' => 'Tiêu đề',
                'id'   => 'title-price_faq',
                'type' => 'text',
            ),
            array(
                'name' => 'Nội dung',
                'id'   => 'desc-price_faq',
                'type'    => 'wysiwyg',
                'raw'     => false,
                'options' => [
                    'textarea_rows' => 8,
                    'teeny'         => false,
                ],
            ),
            array(
                'name' => 'FAQ',
                'id'   => 'slide-price_faq',
                'type'   => 'group',
                'clone'  => true,
                'sort_clone'  => true,
                'collapsible' => true,
                'group_title' => array( 'field' => 'title-faq_slide' ),
                'save_state' => true,
                'fields' => array(
                    array(
                        'name' => 'Tên',
                        'id'   => 'title-faq_slide',
                        'type' => 'text',
                    ),
                    array(
                        'name' => 'Mô tả',
                        'id'   => 'note-faq_slide',
                        'type' => 'textarea',
                    ),
                ),
            ),
        ),
    );
    return $meta_boxes;
}