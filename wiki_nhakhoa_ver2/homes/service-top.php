<?php 
    $option = get_option('wiki-homepage-options');
    $list_serive = isset($option['brand-cate-group']) ? $option['brand-cate-group'] : [];
    if(!empty($list_serive)){
?>
<section class="service-top">
    <div class="container">
        <h2 class="heading">Đánh giá dịch vụ nha khoa</h2>
        <div class="list-service row">
            <?php 
                foreach ($list_serive as $key => $value) { 
                $url = wp_get_attachment_url($value['brand-icon-image'][0]);
            ?>
                <div class="col item-service">
                    <div class="inner">
                        <a href="<?php echo $value['brand-cate-link']; ?>" class="icon">
                            <img src="<?php echo $url; ?>" alt="">
                        </a>
                        <h3 class="title-service"><a href="<?php echo $value['brand-cate-link']; ?>"><?php echo $value['brand-cate-title']; ?></a></h3>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>
<?php
}