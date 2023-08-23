<?php
require_once dirname(__FILE__). '/option-page.php';
require_once dirname(__FILE__). '/homepage-option.php';

if(!function_exists('wiki_ajax_get_doctor')){
    function wiki_ajax_get_doctor(){
        $id = $_POST['id'];
        $args = array(
            'post_type' => 'doctor',
            'post_status'   => 'publish',
            'posts_per_page' => 6,
            'order'        => 'desc',
            'orderby'        => 'meta_value_num',
            'meta_key' => 'total-ratting-post',
            'meta_query' => array(
                array(
                    'taxonomy'  => 'expert-list-service',
                    'compare'     => 'like',
                    'value'     => $id,
                ),
            ),
        );
        $list_post = new WP_Query($args);
        ob_start();
        if($list_post->have_posts()) {
            $i = 1;
            while($list_post->have_posts()) : $list_post->the_post();
            $args = array( 'key' => $i ,'homepage' => true);
            ?>
                <div class="col-md-6">
                    <?php get_template_part('components/post','rank',$args); ?>
                </div>
            <?php
            $i++;
            endwhile;
            wp_reset_postdata(); 
        }
        $html = ob_get_clean();
        wp_send_json_success($html);
    }
}
add_action( 'wp_ajax_nopriv_wiki_ajax_get_doctor', 'wiki_ajax_get_doctor' );
add_action( 'wp_ajax_wiki_ajax_get_doctor', 'wiki_ajax_get_doctor' );

if(!function_exists('wiki_ajax_get_brand')){
    function wiki_ajax_get_brand(){
        $id = $_POST['id'];
        $args = array(
            'post_type' => 'brand',
            'post_status'   => 'publish',
            'posts_per_page' => 6,
            'order'        => 'desc',
            'orderby'        => 'meta_value_num',
            'meta_key' => 'total-ratting-post',
            'meta_query' => array(
                array(
                    'meta_key'  => 'doctor_province',
                    'value'     => $id,
                    'compare'  => '=',
                ),
            ),
        );
        $list_post = new WP_Query($args);
        ob_start();
        if($list_post->have_posts()) {
            $i = 1;
            while($list_post->have_posts()) : $list_post->the_post();
            $args = array( 'key' => $i );
            ?>
                <div class="col-md-6">
                    <?php get_template_part('components/post','brand',$args); ?>
                </div>
            <?php
            $i++;
            endwhile;
            wp_reset_postdata(); 
        }
        $html = ob_get_clean();
        wp_send_json_success($html);
    }
}
add_action( 'wp_ajax_nopriv_wiki_ajax_get_brand', 'wiki_ajax_get_brand' );
add_action( 'wp_ajax_wiki_ajax_get_brand', 'wiki_ajax_get_brand' );


if(!function_exists('questions_form')){
    function questions_form(){
        $entry = "entry.";
		$option_name = 'wiki-theme-options';
		$google_action = rwmb_meta( 'form_url_action', array( 'object_type' => 'setting' ), $option_name );
		$entry_fullname = $entry . rwmb_meta( 'form_name', array( 'object_type' => 'setting' ), $option_name );
		$entry_numberphone = $entry . rwmb_meta( 'form_number', array( 'object_type' => 'setting' ), $option_name );
		$entry_email = $entry . rwmb_meta( 'form_email', array( 'object_type' => 'setting' ), $option_name );
		$entry_content = $entry . rwmb_meta( 'form_content', array( 'object_type' => 'setting' ), $option_name );
		$entry_address = $entry . rwmb_meta( 'form_address', array( 'object_type' => 'setting' ), $option_name );
		$entry_service = $entry . rwmb_meta( 'form_service', array( 'object_type' => 'setting' ), $option_name );
        $entry_type = $entry . rwmb_meta( 'form_type', array( 'object_type' => 'setting' ), $option_name );
		$entry_chuyengia = $entry . rwmb_meta( 'form_expert', array( 'object_type' => 'setting' ), $option_name );
		$entry_data_url = $entry . rwmb_meta( 'form_url', array( 'object_type' => 'setting' ), $option_name );
		$entry_data_url_refer = $entry . rwmb_meta( 'form_refere_url', array( 'object_type' => 'setting' ), $option_name );
		$fields = array(
			$entry_fullname => isset( $_POST["fullname"] ) ? $_POST["fullname"] : '',
			$entry_numberphone => isset( $_POST["phone"] ) ? $_POST["phone"] : '',
			$entry_email => isset( $_POST["email"] ) ? $_POST["email"] : '',
			$entry_address => isset( $_POST["address"] )? $_POST["address"] : '',
			$entry_service => isset( $_POST["service"] ) ? $_POST["service"] : '',
			$entry_chuyengia => isset( $_POST["chuyengia"] ) ? $_POST["chuyengia"] : '',
            $entry_type => isset( $_POST["chuyengia"] ) ? $_POST["chuyengia"] : '',
			$entry_content => isset( $_POST["note"] ) ? $_POST["content"] : '',
			$entry_data_url => $_POST["data_url"],
			$entry_data_url_refer => $_POST["referer"],
		);
		$fields_string = http_build_query($fields);
		$url = $google_action;
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_POST, true);
		curl_setopt($curl, CURLOPT_POSTFIELDS, $fields_string);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
		curl_exec($curl);
		curl_close($curl);
		header("Refresh:0");
		die();
    }
}
add_action( 'wp_ajax_nopriv_questions_form', 'questions_form' );
add_action( 'wp_ajax_questions_form', 'questions_form' );

if(!function_exists('home_nhakhoa_scripts')){
    function home_nhakhoa_scripts(){
        wp_enqueue_script('homepgae-custom', get_template_directory_uri() . '/core/modules/theme-options/homepage-custom.js', array(), '20121217', true);
    }
}
add_action( 'wp_enqueue_scripts', 'home_nhakhoa_scripts' );