<?php
function wiki_change_location() {
	wp_register_script('location', get_template_directory_uri().'/core/modules/get-location/location-admin.js', array(), '20221202', true);
	wp_enqueue_script('location');
	wp_enqueue_style('admin-styles', get_stylesheet_directory_uri().'/css/admin.css');
	wp_localize_script('location', 'vmajax', 
		array('ajaxurl' => admin_url('admin-ajax.php'))
	);
}
add_action('admin_enqueue_scripts', 'wiki_change_location');

function wiki_change_location_frontend() {
	wp_register_script('location-frontend', get_template_directory_uri().'/core/modules/get-location/location-frontend.js', array(), '20221203', true);
	wp_enqueue_script('location-frontend');
	wp_localize_script('location-frontend', 'vmajax', 
		array('ajaxurl' => admin_url('admin-ajax.php'))
	);
}
add_action('wp_enqueue_scripts', 'wiki_change_location_frontend');

if(!function_exists('wiki_get_province')){
	function wiki_get_province(){
		$province_file = get_template_directory() . '/assets/location/tinh_tp.json';
		$json_province = file_get_contents($province_file);
		$data_province = json_decode($json_province, true);
		$name_province = array();

		foreach($data_province as $value_province){
			$code = $value_province['code'];
			$name_province[$code] = $value_province['name'];
		}
		return $name_province;
	}
}
if(!function_exists('wiki_district')){
	function wiki_district(){
		$district_file = get_template_directory() . '/assets/location/quan_huyen.json';
		$json_district = file_get_contents($district_file);
		$data_district = json_decode($json_district, true);
		$name_district = array();

		foreach($data_district as $value_district){
			$code = $value_district['code'];
			$name_district[$code] = $value_district['name'];
		}
		return $name_district;
	}
}
add_action('wp_ajax_wiki_get_district', 'wiki_get_district');
add_action('wp_ajax_nopriv_wiki_get_district', 'wiki_get_district');


if (!function_exists('wiki_get_district')) {
	function wiki_get_district(){
		$op = '';
		$ids = $_POST['id_province'];
		$post_id = (int)$_POST['post_id'];
		$values = get_post_meta( $post_id,'doctor_district',  false ) ? get_post_meta( $post_id,'doctor_district',  false ) : [];
		foreach($ids as $value){
			$idss = $value;
			$arr = get_district_by_id_province($idss);
			foreach($arr as $value_temp) {
				if(in_array($value_temp['code'], $values)){
					$op .= '<option value="'.$value_temp['code'].'" selected="selected" >'.$value_temp['name'].'</option>';
				}else{
					$op .= '<option value="'.$value_temp['code'].'">'.$value_temp['name'].'</option>';
				}
			}
		}
		echo $op;
		die();
	}
}

add_action('wp_ajax_wiki_get_district_fd', 'wiki_get_district_fd');
add_action('wp_ajax_nopriv_wiki_get_district_fd', 'wiki_get_district_fd');


if (!function_exists('wiki_get_district_fd')) {
	function wiki_get_district_fd(){
		$op = '<option value="">Chọn quận huyện</option>';
		$ids = $_POST['id_province'];
		$arr = get_district_by_id_province($ids);
		foreach($arr as $value_temp) {
			$op .= '<option value="'.$value_temp['code'].'">'.$value_temp['name'].'</option>';
		}
		echo $op;
		die();
	}
}

if(!function_exists('get_district_by_id_province')){
	function get_district_by_id_province($id){
		$district_file = get_template_directory() . '/assets/location/quan_huyen.json';
		$json_district = file_get_contents($district_file);
		$data_district = json_decode($json_district, true);
		$arr_district = array();
		foreach($data_district as $value_district) {
			if($id == $value_district['parent_code']){
				$arr_district[] = $value_district;
			}
		}
		return $arr_district;
	}
}

if(!function_exists('check_district')){
	function check_district(){
		$op = '';
		$idd = $_POST['id'];
		$post_id = (int)$_POST['post_id'];
		$values = get_post_meta( $post_id,'doctor_district',  false );
		foreach($idd as $value){
			$idss = $value;
			$arr = get_district_by_id_province($idss);
			foreach($arr as $value_temp) {
				if(in_array($value_temp['code'], $values)){
					$op .= '<option value="'.$value_temp['code'].'" selected="selected" >'.$value_temp['name'].'</option>';
				}else{
					$op .= '<option value="'.$value_temp['code'].'">'.$value_temp['name'].'</option>';
				}
			}
		}
		echo $op;
		die();
	}
}
add_action('wp_ajax_check_district', 'check_district');
add_action('wp_ajax_nopriv_check_district', 'check_district');

add_action( 'save_post', 'save_doctor_district' );
function save_doctor_district( $post_id ) {
	if( isset($_POST['doctor_district']) && !empty($_POST['doctor_district'])){
		foreach ($_POST['doctor_district'] as $key => $value) {
			add_post_meta($post_id,'doctor_district',$value,false);
		}
	}
}