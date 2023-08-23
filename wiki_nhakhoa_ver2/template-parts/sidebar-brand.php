<?php 
    $option = get_option('wiki-homepage-options');
    $wiki_register_brand = isset($option['wiki-register-brand']) ? $option['wiki-register-brand'] : '' ;
    if(!empty($wiki_register_brand)):
        $url = wp_get_attachment_url($wiki_register_brand['wiki-register-brand-image'][0]);
        $link = $wiki_register_brand['wiki-register-brand-link'] ? $wiki_register_brand['wiki-register-brand-link'] : '#';
?>
<div class="inner-sibar-brand">
    <img class="img-sidebar" src="<?php echo $url; ?>" alt="">
    <div class="sibar-brand-content text-center">
        <h3 class="sibar-brand-title"><?php echo $wiki_register_brand['wiki-register-brand-title']; ?></h3>
        <p class="sibar-brand-desc"><?php echo $wiki_register_brand['wiki-register-brand-desc']; ?></p>
        <a href="<?php echo $link; ?>" class="btn-register-brand">Đăng ký tại đây </a>
    </div>
</div>
<?php  endif;?>