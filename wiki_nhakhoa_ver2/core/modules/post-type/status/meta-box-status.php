<?php 
add_filter( 'rwmb_meta_boxes', 'wiki_status_meta_box' );
function wiki_status_meta_box( $meta_boxes ) {
    $meta_boxes[] = array(
		'id'         => 'status-options',
		'title'      => 'Cấu trúc nội dung',
		'post_types' => 'status',
		'context'    => 'normal',
		'priority'   => 'high',
		'fields' => array(
			array(
				'name' => __( '' ),
				'id'     => 'status-general',
				'type'   => 'group',
				'clone'  => true,
				'sort_clone'  => true,
				'collapsible' => true,
				'group_title' => array( 'field' => 'title-status_general' ),
				'save_state' => true,
				'fields' => array(
					array(
						'name' => 'Tiêu đề',
						'id'   => 'title-status_general',
						'type' => 'text',
					),
                    array(
						'name' => 'Mục lục',
						'id'   => 'tab-content-status',
						'type' => 'select',
                        'options' => array(
                            'chon'	=> '---Lựa chọn---',
                            'dinh-nghia'	=> 'Định nghĩa',
                            'nguyen-nhan'	=> 'Nguyên nhân',
                            'dau-hieu'	=> 'Dấu hiệu',
                            'phuong-phap-dieu-tri'	=> 'Phương pháp điều trị',
                            'phong-ngua'	=> 'Phòng ngừa',
                            'chuan-doan'	=> 'Chuẩn đoán',
                            'dia-chi-uy-tin'	=> 'Địa chỉ uy tín',
                            'tac-hai'	=> 'Tác hại',
                            'luu-y'	=> 'Lưu ý',
                            'chi-phi-dieu-tri'	=> 'Chi phí điều trị',
                            'cau-hoi-thuong-gap'	=> 'Câu hỏi thường gặp',
                            'dac-diem'	=> 'Đặc điểm',  
                        ),
                        'desc' => '("Tên mục lục" giống với "Mục lục" vd:Chọn "Định nghĩa" - " Định nghĩa")',
					),
                    array(
						'name' => 'Tên mục lục',
						'id'   => 'name-content-status',
						'type' => 'text',
					),
					array(
						'name' => 'Nội dung',
						'id'   => 'desc-status_general',
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