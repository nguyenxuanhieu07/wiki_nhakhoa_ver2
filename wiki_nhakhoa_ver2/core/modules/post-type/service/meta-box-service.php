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
		),
	);
    return $meta_boxes;
}