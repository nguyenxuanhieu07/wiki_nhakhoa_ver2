<?php
add_filter('rwmb_meta_boxes', 'wiki_status_meta_box');
function wiki_status_meta_box($meta_boxes)
{
	$meta_boxes[] = array(
		'id'         => 'status-options',
		'title'      => 'Cấu trúc nội dung',
		'post_types' => 'status',
		'context'    => 'normal',
		'priority'   => 'high',
		'tabs'       => array(
			'general'  => array(
				'label' => 'Thông tin chung',
				'icon'  => 'dashicons-email',
			),
			'ensign'   => array(
				'label' => 'Dấu hiệu',
				'icon'  => 'dashicons-edit-page',
			),
			'solution' => array(
				'label' => 'Giải pháp',
				'icon'  => 'dashicons-edit-page',
			),
		),
		'tab_style'  => 'box',
		'fields'     => array(
			array(
				'name'        => 'Chọn tham vấn',
				'id'          => 'user-advise',
				'type'        => 'user',
				'field_type'  => 'select_advanced',
				'placeholder' => 'Chọn tham vấn',
				'tab'         => 'general',
				'query_args'  => array(
					'meta_query' => array(
						'relation' => 'AND',
						array(
							'key'     => 'degree-author',
							'value'   => 'tvcm',
							'compare' => '=',
						),
					),
				),
			),
			array(
				'name'        => 'Chọn Kiểm duyệt',
				'id'          => 'user-censorship',
				'type'        => 'user',
				'field_type'  => 'select_advanced',
				'placeholder' => 'Chọn kiểm duyệt',
				'tab'         => 'general',
				'query_args'  => array(
					'meta_query' => array(
						'relation' => 'AND',
						array(
							'key'     => 'degree-author',
							'value'   => 'kd',
							'compare' => '=',
						),
					),
				),
			),
			array(
				'name'    => 'Giới thiệu',
				'id'      => 'status-desc',
				'type'    => 'wysiwyg',
				'raw'     => false,
				'options' => [
					'textarea_rows' => 8,
					'teeny'         => false,
				],
				'tab'     => 'general',
			),
			array(
				'name' => 'Tiêu đề',
				'id'   => 'ensign_title',
				'type' => 'text',
				'size' => 80,
				'tab'  => 'ensign'
			),
			array(
				'name'    => 'Giới thiệu',
				'id'      => 'status-ensign-desc',
				'type'    => 'wysiwyg',
				'raw'     => false,
				'options' => [
					'textarea_rows' => 8,
					'teeny'         => false,
				],
				'tab'     => 'ensign',
			),
			array(
				'name' => 'Tiêu đề',
				'id'   => 'solution_title',
				'type' => 'text',
				'size' => 80,
				'tab'  => 'solution'
			),
			array(
				'name'    => 'Giới thiệu',
				'id'      => 'status-solution-desc',
				'type'    => 'wysiwyg',
				'raw'     => false,
				'options' => [
					'textarea_rows' => 8,
					'teeny'         => false,
				],
				'tab'     => 'solution',
			),
			array(
				'name'        => 'Dịch vụ',
				'id'          => 'solution_service',
				'type'        => 'taxonomy_advanced',
				'field_type'  => 'select_advanced',
				'placeholder' => 'Lựa chọn',
				'ajax'        => true,
				'multiple'    => true,
				'taxonomy'    => 'service_cat',
				'query_args'  => array(
					'parent' => 0
				),
				'tab'         => 'solution',
			),
		),
	);
	return $meta_boxes;
}