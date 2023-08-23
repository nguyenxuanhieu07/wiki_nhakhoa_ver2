<?php
if(!function_exists('wiki_theme_option_settings_pages')){
    add_filter( 'mb_settings_pages', 'wiki_theme_option_settings_pages' );
    function wiki_theme_option_settings_pages( $settings_pages ){
        $settings_pages[] = array(
            'id'            => 'wiki-theme-options',
            'option_name'   => 'wiki-theme-options',
            'menu_title'    => __( 'Wiki nha khoa', 'wiki_nhakhoa' ),
            'icon_url'      => 'dashicons-admin-generic',
        );
        return $settings_pages;
    }
}
if(!function_exists('wiki_theme_option_meta_box')) {
    add_filter( 'rwmb_meta_boxes', 'wiki_theme_option_meta_box' );
    function wiki_theme_option_meta_box( $meta_boxes ){
        $meta_boxes[] = array(
            'title'  => __( 'Logo' ),
            'settings_pages' => 'wiki-theme-options',
            'fields' => array(
                array(
                    'id'               => 'logo-wiki-desk',
                    'name'             => 'Logo hiển thị trên header',
                    'type'             => 'image_advanced',
                    'force_delete'     => false,
                    'max_file_uploads' => 1,
                    'max_status'       => false,
                    'image_size'       => 'thumbnail',
                ),
                array(
                    'id'               => 'logo-wiki-mb',
                    'name'             => 'Logo hiển thị trên footer',
                    'type'             => 'image_advanced',
                    'force_delete'     => false,
                    'max_file_uploads' => 1,
                    'max_status'       => false,
                    'image_size'       => 'thumbnail',
                ),
            ),
        );
        $meta_boxes[] = array(
            'title'  => __( 'Thông tin chung wiki' ),
            'settings_pages' => 'wiki-theme-options',
            'fields' => array(
                array(
                    'name'  => 'Địa chỉ',
                    'id'    => 'address_wiki',
                    'type'  => 'text',
                    'size'  => 60,
                ),
                array(
                    'name'  => 'Email',
                    'id'    => 'email_wiki',
                    'type'  => 'text',
                    'size'  => 60,
                ),
                array(
                    'name'  => 'Số điện thoại',
                    'id'    => 'numberphone',
                    'type'  => 'text',
                    'size'  => 60,
                ),
                array(
                    'name'  => 'Facebook',
                    'id'    => 'fb_wiki',
                    'type'  => 'text',
                    'size'  => 60,
                ),
                array(
                    'name'  => 'Twitter',
                    'id'    => 'tw_wiki',
                    'type'  => 'text',
                    'size'  => 60,
                ),
                array(
                    'name'  => 'Instagram',
                    'id'    => 'ins_wiki',
                    'type'  => 'text',
                    'size'  => 60,
                ),
                array(
                    'name'  => 'Youtube',
                    'id'    => 'you_wiki',
                    'type'  => 'text',
                    'size'  => 60,
                ),
                array(
                    'name'  => 'Zalo',
                    'id'    => 'zalo_wiki',
                    'type'  => 'text',
                    'size'  => 60,
                ),
            ),
        );
         $meta_boxes[] = array(
            'title'  => __( 'Setting form field' ),
            'settings_pages' => 'wiki-theme-options',
            'fields' => array(
                array(
                    'name'  => 'url',
                    'id'    => 'form_url_action',
                    'type'  => 'text',
                    'size'  => 60,
                ),
                array(
                    'name'  => 'Họ tên',
                    'id'    => 'form_name',
                    'type'  => 'text',
                    'size'  => 60,
                ),
                array(
                    'name'  => 'Số điện thoại',
                    'id'    => 'form_number',
                    'type'  => 'text',
                    'size'  => 60,
                ),
                array(
                    'name'  => 'Email',
                    'id'    => 'form_email',
                    'type'  => 'text',
                    'size'  => 60,
                ),
                array(
                    'name'  => 'Địa chỉ',
                    'id'    => 'form_address',
                    'type'  => 'text',
                    'size'  => 60,
                ),
                array(
                    'name'  => 'Dịch Vụ',
                    'id'    => 'form_service',
                    'type'  => 'text',
                    'size'  => 60,
                ),
                 array(
                    'name'  => 'Chuyên gia',
                    'id'    => 'form_expert',
                    'type'  => 'text',
                    'size'  => 60,
                ),
                array(
                    'name'  => 'Nội dung',
                    'id'    => 'form_content',
                    'type'  => 'text',
                    'size'  => 60,
                ),
                array(
                    'name'  => 'Form',
                    'id'    => 'form_type',
                    'type'  => 'text',
                    'size'  => 60,
                ),
                array(
                    'name'  => 'Url',
                    'id'    => 'form_url',
                    'type'  => 'text',
                    'size'  => 60,
                ),
                array(
                    'name'  => 'Refere Url',
                    'id'    => 'form_refere_url',
                    'type'  => 'text',
                    'size'  => 60,
                ),
            ),
        );
        
        return $meta_boxes;
    }
}

