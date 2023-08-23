<?php
    $name = rwmb_meta('brand-fullname') ? rwmb_meta('brand-fullname') : '';
    $list_brand = rwmb_meta('list-address-brand') ? rwmb_meta('list-address-brand') : '';
    $primary_term = wp_get_object_terms(get_the_ID(),'doctor_cat');
    $primary_term = wp_get_object_terms(get_the_ID(),'doctor_cat');
?>
<div class="post">
    <a href="<?php  the_permalink(get_the_ID()); ?>" class="post-thumbnail">
        <?php the_post_thumbnail(get_the_ID(), 'thumbnail'); ?>
         <?php if(!empty($args) && isset($args['key']) && !empty($args['key'])): ?>
             <span class="rank"><span class="letter">#</span><?php echo $args['key'];  ?></span>
        <?php endif; ?>
    </a>
    <div class="post-content">
        <div class="info-brand">
            <h3 class="post-name"><a href="<?php  the_permalink(get_the_ID()); ?>" class="link"><?php echo $name; ?></a></h3>
            <p class="post-item post-exp"><b>Số lượng cơ sở: </b><?php echo count($list_brand); ?> cơ sở</p>
        </div>
        <ul class="review">
            <li class="review-item line-r">
                <span class="item first-item">5.0</span>
                <i class="fa fa-star"></i>
            </li>
            <li class="review-item line-r">
                <span class="item first-item">20</span>
                <span class="item">Đánh giá</span>
            </li>
            <li class="review-item">
                <span class="item first-item">1k</span>
                <span class="item">Khách hàng sử dụng dịch vụ mỗi tháng</span>
            </li>
            <li class="review-item">
                <span class="item first-item">500</span>
                <span class="item">Khách hàng đặt lịch khám qua Wiki Nha Khoa</span>
            </li>
        </ul>
    </div>
</div>