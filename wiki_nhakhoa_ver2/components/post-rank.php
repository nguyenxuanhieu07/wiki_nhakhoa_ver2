<?php
    $post_id = get_the_ID();
    $name = rwmb_meta('expert-name') ? rwmb_meta('expert-name') : '';
    $chuc_vu = rwmb_meta('expert-office') ? rwmb_meta('expert-office') : [];
    $chuc_vu = implode(",", $chuc_vu);
    $exp = rwmb_meta('expert-exp') ? rwmb_meta('expert-exp') : '';
    $primary_service = rwmb_meta('expert-list-service') ? rwmb_meta('expert-list-service') : '';
    $primary_service = $primary_service ? $primary_service[0]->name : '';
    $expert_custom_number = rwmb_meta('expert-custom-number') ? rwmb_meta('expert-custom-number') : '';
    $expert_custom_number_wiki = rwmb_meta('expert-custom-number-wiki') ? rwmb_meta('expert-custom-number-wiki') : '';
    $get_comments_number = get_comments_number($post_id);
    $primary_term = wp_get_object_terms($post_id,'doctor_cat');
    $check_page = isset($args['homepage']) ? $args['homepage'] : '';
    $chuyen_khoa = $primary_term ? $primary_term[0]->name : '';
    $rank = isset($args['key']) ? $args['key'] : '';
    $class_li = '';
    $class_btn = 'd-none';
    if($check_page == 'homepage'):
        $class_li = 'd-none';
        $class_btn = '';
    endif;
    $star_post = get_star_post($post_id);
    $check_single = isset($args['single']) ? $args['single'] : '';
?>
<div class="post-rank">
    <a href="<?php  the_permalink($post_id); ?>" class="post-thumbnail">
        <?php the_post_thumbnail($post_id, 'thumbnail'); ?>
        <?php if(!empty($args) && $rank): ?>
             <span class="rank"><span class="letter">#</span><?php echo $args['key'];  ?></span>
        <?php endif; ?>
    </a>
    <div class="post-content">
        <?php if($check_single ): ?>
        <h1 class="post-name"><?php echo $name; ?></h1>
        <?php else: ?>
        <h3 class="post-name"><a href="<?php  the_permalink($post_id); ?>" class="link"><?php echo $name; ?></a></h3>
        <?php endif; ?>
        <p class="post-academic"><?php echo $chuc_vu; ?></p>
        <p class="post-item post-specialist <?php if(is_tax()) echo 'd-none'; ?>"><b>Chuyên khoa: </b><?php echo $chuyen_khoa; ?></p>
        <p class="post-item post-service <?php echo $class_li; ?>"><b>Dịch vụ chính: </b><?php echo $primary_service; ?></p>
        <p class="post-item post-exp post-last"><b>Kinh nghiệm: </b><?php echo $exp; ?> năm</p>
        <ul class="review">
            <li class="review-item line-r">
                <span class="first-item item"><?php echo $star_post; ?></span>
                <i class="fa fa-star"></i>
            </li>
            <li class="review-item line-r">
                <span class="first-item item"><?php echo $get_comments_number; ?></span>
                <span class="item">Đánh giá</span>
            </li>
            <li class="review-item ">
                <span class="first-item item"><?php echo $expert_custom_number; ?></span>
                <span class="item">Khách hàng sử dụng dịch vụ <?php echo $chuyen_khoa; ?> mỗi
                    tháng</span>
            </li>
            <li class="review-item <?php echo $class_li; ?>">
                <span class="first-item item"><?php echo $expert_custom_number_wiki; ?></span>
                <span class="item">Khách hàng đặt lịch khám qua Wiki Nha Khoa</span>
            </li>
        </ul>
        <a href="<?php  the_permalink($post_id); ?>" class="link-more <?php echo $class_btn; ?>">Xem chi tiết</a>
    </div>
</div>