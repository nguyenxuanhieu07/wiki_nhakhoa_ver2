<?php
$post_id = get_the_ID();
$rank = isset($args['rank']) ? $args['rank'] : 0;
$show_more = isset($args['link']) ? $args['link'] : '';
$home_page = isset($args['homepage']) ? $args['homepage'] : '';
$name = rwmb_meta('brand-fullname') ? rwmb_meta('brand-fullname') : '';
$get_comments_number = get_comments_number($post_id);
$star_post = get_star_post($post_id);
$brand_custom_number = rwmb_meta('brand-custom-number') ? rwmb_meta('brand-custom-number') : 0;
$brand_custom_number_wiki = rwmb_meta('brand-custom-number-wiki') ? rwmb_meta('brand-custom-number-wiki') : 0;
$primary_term = rwmb_meta('brand-list-specical') ? rwmb_meta('brand-list-specical') : '';
$chuyen_khoa = $primary_term[0]->name ? $primary_term[0]->name : '';
if (is_single()) {
    $chuyen_khoa = [];
    foreach ($primary_term as $key => $value) {
        $chuyen_khoa[] = $value->name;
    }
    $chuyen_khoa = implode(", ", $chuyen_khoa);
}
$list_brand = rwmb_meta('list-address-brand') ? rwmb_meta('list-address-brand') : '';
?>
<div class="post-ranks">
    <a href="<?php the_permalink($post_id); ?>" class="post-thumbnail">
        <?php the_post_thumbnail($post_id, 'thumbnail'); ?>
        <?php
        if ($rank) {
        ?>
            <span class="number-rank">#<span class="number"><?php echo $rank; ?></span></span>
        <?php } ?>
    </a>
    <div class="post-meta">
        <h3 class="post-name"><a href="<?php the_permalink($post_id); ?>" class="link"><?php echo $name; ?></a><img src="images/check.png" alt=""></h3>
        <p class="post-academic">
            <?php echo $chuc_vu; ?>
        </p>
        <div class="info">
            <?php if (!$home_page) : ?>
                <p class="post-service"><b>Chuyên khoa: </b>
                    <?php echo $chuyen_khoa; ?>
                </p>
                <p class="post-exp mr-b"><b>Số lượng cơ sở: </b>
                    <?php echo count($list_brand); ?> cơ sở
                </p>
            <?php endif; ?>
            <ul class="list-more">
                <li class="item i-star b-right">
                    <span class="number">
                        <?php echo $star_post; ?>
                    </span>
                    <i class="fa fa-star"></i>
                </li>
                <li class="item">
                    <span class="number">
                        <?php $get_comments_number; ?>
                    </span>
                    <span> Đánh giá</span>
                </li>
                <li class="item">
                    <span class="number">
                        <?php echo $brand_custom_number; ?>
                    </span>
                    <span> Khách hàng sử dụng dịch vụ
                        <?php echo $name_service; ?> mỗi tháng
                    </span>
                </li>
                <li class="item">
                    <span class="number">
                        <?php echo $brand_custom_number_wiki; ?>
                    </span>
                    <span>Khách hàng đặt lịch khám qua Wiki Nha Khoa</span>
                </li>
            </ul>
        </div>
        <?php if ($show_more) : ?>
            <a href="<?php the_permalink($post_id); ?>" class="post-link-more">Xem chi tiết</a>
        <?php endif; ?>
    </div>
</div>