<?php
$post_id = get_the_ID();
$total_ratting_comment = get_post_meta($post_id, 'total-ratting-post', true) ? get_post_meta($post_id, 'total-ratting-post', true) : 0;
?>
<section class="quick-info">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <?php get_template_part('components/post-ranks', 'brand'); ?>
            </div>
            <div class="col-md-5">
                <div class="doctor-point">
                    <div class="inner">
                        <span class="point"><?php echo $total_ratting_comment; ?></span>
                        <span class="point-desc">Điểm đánh giá từ Wiki Nha Khoa và khách hàng đã sử dụng
                            dịch vụ của bác sĩ</span>
                    </div>
                    <div class="doctor-link">
                        <a href="#show-list-comment" class="link-item more-rate smoothScroll">
                            <img src="<?php echo THEME_URI; ?>/images/icons/Show.svg" alt="">
                            Xem đánh giá
                        </a>
                        <a href="#" class="link-item edit-rate">
                            <img src="<?php echo THEME_URI; ?>/images/icons/edit-text.svg" alt="">
                            Viết đánh giá
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>