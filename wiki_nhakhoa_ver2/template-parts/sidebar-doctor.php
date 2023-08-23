<?php 
    $option = get_option('wiki-homepage-options');
    $wiki_register_doctor = isset($option['wiki-register-doctor']) ? $option['wiki-register-doctor'] : '' ;
    if(!empty($wiki_register_doctor)):
        $url = wp_get_attachment_url($wiki_register_doctor['wiki-register-image'][0]);
        $link = $wiki_register_doctor['wiki-register-link'] ? $wiki_register_doctor['wiki-register-link'] : '#';
?>
<div class="inner-sibar-brand">
    <img class="img-sidebar" src="<?php echo $url; ?>" alt="">
    <div class="sibar-brand-content text-center">
        <h3 class="sibar-brand-title"><?php echo $wiki_register_doctor['wiki-register-title']; ?></h3>
        <p class="sibar-brand-desc"><?php echo $wiki_register_doctor['wiki-register-desc']; ?></p>
        <a href="<?php echo $link; ?>" class="btn-register-brand">Đăng ký tại đây </a>
    </div>
</div>
<?php  endif;?>