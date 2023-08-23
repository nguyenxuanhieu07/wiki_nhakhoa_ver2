<?php
    $post_id = get_the_ID();
    $name = rwmb_meta('brand-fullname') ? rwmb_meta('brand-fullname') : '';
    $list_brand = rwmb_meta('list-address-brand') ? rwmb_meta('list-address-brand') : '';
    $primary_term = rwmb_meta('brand-list-specical') ? rwmb_meta('brand-list-specical') : '';
    $chuyen_khoa = $primary_term[0]->name ? $primary_term[0]->name : '';
    if(is_single()){
        $chuyen_khoa = [];
        foreach ($primary_term as $key => $value) {
            $chuyen_khoa[] = $value->name;
        }
        $chuyen_khoa = implode(", ", $chuyen_khoa);
    }
    $check_page = $args['homepage'] ? $args['homepage'] : '';
    $brand_custom_number = rwmb_meta('brand-custom-number') ? rwmb_meta('brand-custom-number') : 0;
    $brand_custom_number_wiki = rwmb_meta('brand-custom-number-wiki') ? rwmb_meta('brand-custom-number-wiki') : 0;
    $rank = $args['key'] ? $args['key'] : '';
    $check_single = isset($args['single']) ? $args['single'] : '';
    $get_comments_number = get_comments_number($post_id);
    $class_li = '';
    $class_btn = 'd-none';
    if($check_page == 'homepage'):
        $class_li = 'd-none';
        $class_btn = '';
    endif;
    $star_post = get_star_post($post_id);
    
?>
<div class="post-rank">
    <a href="<?php  the_permalink($post_id); ?>" class="post-thumbnail">
        <?php the_post_thumbnail($post_id, 'thumbnail'); ?>
         <?php if(!empty($args) && $rank): ?>
             <span class="rank"><span class="letter">#</span><?php echo $rank;  ?></span>
        <?php endif; ?>
    </a>
    <div class="post-content">
        <?php if($check_single): ?>
        <h1 class="post-name mb-1"><?php echo $name; ?></h1>
        <?php else: ?>
            <h3 class="post-name mb-1"><a href="<?php  the_permalink($post_id); ?>" class="link"><?php echo $name; ?></a></h3>
        <?php  endif; ?>
        <div class="info-brand <?php echo $class_li; ?>">
            <p class="post-item <?php if(is_archive()) echo 'd-none'; ?>"><b>Chuyên khoa: </b><?php echo $chuyen_khoa; ?></p>
            <p class="post-item post-exp post-last"><b>Số lượng cơ sở: </b><?php echo count($list_brand); ?> cơ sở</p>
        </div>
        <ul class="review">
            <li class="review-item line-r">
                <span class="item first-item"><?php echo $star_post; ?></span>
                <i class="fa fa-star"></i>
            </li>
            <li class="review-item line-r">
                <span class="item first-item"><?php echo $get_comments_number; ?></span>
                <span class="item">Đánh giá</span>
            </li>
            <li class="review-item">
                <span class="item first-item"><?php echo $brand_custom_number; ?></span>
                <span class="item">Khách hàng sử dụng dịch vụ mỗi tháng</span>
            </li>
            <li class="review-item <?php echo $class_li; ?>">
                <span class="item first-item "><?php echo $brand_custom_number_wiki; ?></span>
                <span class="item">Khách hàng đặt lịch khám qua Wiki Nha Khoa</span>
            </li>
        </ul>
        <a href="<?php  the_permalink($post_id); ?>" class="link-more <?php echo $class_btn; ?>">Xem chi tiết</a>
    </div>
</div>