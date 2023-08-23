<?php 
add_filter( 'rwmb_meta_boxes', 'wiki_users_meta_box' );
if(!function_exists('wiki_users_meta_box')){
    function wiki_users_meta_box( $meta_boxes ) {
        if (current_user_can('manage_options')) {
            $meta_boxes[] = array(
                'id'         => 'expert-post-meta',
                'title'      => 'Hồ sơ thành viên',
                'type' => 'user',
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
                ),
                'tab_style' => 'box',
                'tab_wrapper' => true,
                'fields' => array(
                    array(
                        'name' => 'Chức vụ',
                        'placeholder' => 'Lựa chọn',
                        'id'   => 'degree-author',
                        'type' => 'select_advanced',
                        'options'  => array(
                            'btn' => 'Biên tập viên',
                            'kd'  => 'Người kiểm duyệt',
                            'tvcm'  => 'Tham vấn chuyên môn'
                        ),
                        'size'=> 50,
                        'tab'  => 'general',
                    ),
                    array(
                        'name' => 'Hiển thị ở trang chủ',
                        'id'   => 'show_user_home',
                        'type' => 'checkbox',
                        'std'  => 0,
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
                        'tab'  => 'general',
                    ),
                    array(
                        'name' => 'Tiktok',
                        'id'   => 'expert-tiktok',
                        'type' => 'text',
                        'size'=> 50,
                        'tab'  => 'social',
                    ),
                    array(
                        'name' => 'Youtobe',
                        'id'   => 'expert-youtobe',
                        'type' => 'text',
                        'size'=> 50,
                        'tab'  => 'social',
                    ),
                    array(
                        'name' => 'Facebook',
                        'id'   => 'expert-facebook',
                        'type' => 'text',
                        'size'=> 50,
                        'tab'  => 'social',
                    ),
                    array(
                        'name' => 'Instagram',
                        'id'   => 'expert-instar',
                        'type' => 'text',
                        'size'=> 50,
                        'tab'  => 'social',
                    ),
                    array(
                        'name' => 'Printerest',
                        'id'   => 'expert-printerest',
                        'type' => 'text',
                        'size'=> 50,
                        'tab'  => 'social',
                    ),
                    array(
                        'name'    => 'Kinh nghiệm chuyên môn',
                        'id'      => 'expert-exp',
                        'type'    => 'wysiwyg',
                        'raw'     => false,
                        'options' => [
                            'textarea_rows' => 8,
                            'teeny'         => true,
                        ],
                        'tab'  => 'exp',
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
                        'name' => 'Bằng cấp / chứng chỉ',
                        'id'   => 'expert-degree',
                        'type' => 'image_advanced',
                        'tab'  => 'degree',
                    ),	
                )
            );
        }
        return $meta_boxes;
    }
}
if(!function_exists('user_nhakhoa_scripts')){
    function user_nhakhoa_scripts(){
        wp_enqueue_script('user', get_template_directory_uri() . '/core/modules/users-profile/user.js', array(), '20121215', true);
    }
}
add_action( 'wp_enqueue_scripts', 'user_nhakhoa_scripts' );

if(!function_exists('wiki_ajax_get_author')){
    function wiki_ajax_get_author(){
        $value = isset($_POST['data']) ? $_POST['data'] : '';
        if($value){
            $args = array(
            'meta_query' => array(
                'relation' => 'AND',
                array(
                    'key'   => 'show_user_home',
                    'value' => 1,
                    'compare'  => '=',
                ),
                array(
                    'key'   => 'degree-author',
                    'value' => $value,
                    'compare'  => '=',
                ),
            ),
            );
            $data = get_users($args);
            if(!empty($data)){
                ob_start();
                foreach ($data as $key => $value) {
                    $id_user = $value->ID;
                    $name = $value->display_name;
                    $chuc_vu = get_user_meta($id_user,'expert-office',true) ? get_user_meta($id_user,'expert-office',true) : '';
                    $desc = get_user_meta($id_user,'expert-desc',true) ? get_user_meta($id_user,'expert-desc',true) : '';
                    $degree_author = get_user_meta($id_user,'degree-author',true) ? get_user_meta($id_user,'degree-author',true) : '';
                    if($degree_author){
                        if($degree_author == 'kd'){
                            $title = "Người kiểm duyệt";
                        }elseif ($degree_author == 'btn') {
                            $title = "Biên tập viên";
                        }else{
                            $title = "Tham vấn chuyên môn";
                        }
                    }
                    ?>
                        <div class="item-author col-md-3">
                            <div class="post">
                            <a href="#" class="post-thumbnail">
                                <?php echo get_avatar( $id_user); ?>
                            </a>
                            <div class="post-content">
                                <h3 class="post-name text-center"><?php echo $name; ?> <img src="<?php echo THEME_URI; ?>/images/check.png" alt=""></h3>
                                <p class="post-academic text-center"><?php echo $title; ?></p>
                                <div class="post-desc">
                                <?php echo $desc; ?>
                            </div>
                            </div>
                            </div>
                        </div>
                    <?php
                }
                $html = ob_get_clean();
            }else{
                $html = '<div class="item-author col-md-3 text-center"><b>Nội dung đang được cập nhật!</b>';
            }
            wp_send_json_success($html);
        }
    }
}
add_action( 'wp_ajax_nopriv_wiki_ajax_get_author', 'wiki_ajax_get_author' );
add_action( 'wp_ajax_wiki_ajax_get_author', 'wiki_ajax_get_author' );