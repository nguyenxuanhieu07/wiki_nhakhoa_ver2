<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package wiki_nhakhoa
 */
get_header();
?>
<?php
$post_id = get_the_ID();
$expert_desc = rwmb_meta('expert-desc') ? rwmb_meta('expert-desc') : '';
$expert_degree = rwmb_meta('expert-degree') ? rwmb_meta('expert-degree') : [];
$expert_certificate = rwmb_meta('expert-certificate') ? rwmb_meta('expert-certificate') : '';
$expert_exp_specialize = rwmb_meta('expert-exp-specialize') ? rwmb_meta('expert-exp-specialize') : '';
$total_ratting_comment = get_post_meta($post_id, 'total-ratting-post', true) ? get_post_meta($post_id, 'total-ratting-post', true) : 0;
$expert_brand = rwmb_meta('expert-brand') ? rwmb_meta('expert-brand') : '';
?>
<main class="doctor-detail">
    <div class="breadcrumb-nav">
        <?php get_template_part('components/breadcrumb'); ?>
    </div>
    <section class="quick-info">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <?php get_template_part('components/post', 'ranks', $args_doctor); ?>
                </div>
                <div class="col-md-5">
                    <div class="doctor-point">
                        <div class="inner">
                            <span class="point">
                                <?php echo $total_ratting_comment; ?>
                            </span>
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
    <section class="toc-top">
        <div class="container">
            <ul class="list-toc">
                <?php if ($expert_desc) : ?>
                    <li class="item "><a href="#gioi-thieu" class="smoothScroll">Giới thiệu</a></li>
                <?php endif; ?>
                <?php if (empty($expert_degree)) : ?>
                    <li class="item "><a href="#bang-cap" class="smoothScroll">Bằng cấp chứng chỉ</a></li>
                <?php endif; ?>
                <?php if ($expert_certificat) : ?>
                    <li class="item "><a href="#qua-trinh-dao-tao" class="smoothScroll">Quá trình đào tạo</a></li>
                <?php endif; ?>
                <?php if ($expert_exp_specialize) : ?>
                    <li class="item "><a href="#kinh-nghiem" class="smoothScroll">Kinh nghiệm làm việc</a></li>
                <?php endif; ?>
                <?php if ($expert_brand) : ?>
                    <li class="item "><a href="#noi-cong-tac" class="smoothScroll">Nơi công tác</a></li>
                <?php endif; ?>
                <li class="item"><a href="#danh-gia" class="smoothScroll">Đánh giá khách hàng</a></li>
            </ul>
        </div>
    </section>
    <section class="info-doctor">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="entry">
                        <?php if ($expert_desc) : ?>
                            <h2 class="entry-title"><a href="#" id="gioi-thieu"></a>Giới thiệu chung về bác sĩ</h2>
                            <?php echo $expert_desc; ?>
                        <?php endif; ?>
                        <?php if (empty($expert_degree)) : ?>
                            <h2 class="entry-title"><a href="#" id="bang-cap"></a>Bằng cấp, chứng chỉ</h2>
                            <div class="row doctor-list-img">
                                <?php
                                foreach ($expert_degree as $key => $value) {
                                ?>
                                    <div class="col-md-3 img-item">
                                        <img class="" src="<?php echo $value['full_url']; ?>" alt="">
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($expert_certificate) : ?>
                            <h2 class="entry-title"><a href="#" id="qua-trinh-dao-tao"></a>Quy trình đào tạo</h2>
                            <div class="entry-content">
                                <?php echo $expert_certificate; ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($expert_exp_specialize) : ?>
                            <h2 class="entry-title"><a href="#" id="kinh-nghiem"></a>Kinh nghiệm làm việc</h2>
                            <div class="entry-content ">
                                <?php echo $expert_exp_specialize; ?>
                            </div>
                        <?php endif; ?>
                        <?php if ($expert_brand): ?>
                        <h2 class="entry-title "><a href="#" id="noi-cong-tac"></a>Nơi công tác</h2>
                        <div class="list-brand">
                            <?php
                            $args = array(
                                'post_type' => 'brand',
                                'post_status' => 'publish',
                                'order' => 'desc',
                                'post__in' => $expert_brand,
                            );
                            $list_brand = new WP_Query($args);
                            if ($list_brand->have_posts()) :
                                while ($list_brand->have_posts()) :
                                    $list_brand->the_post();
                                    get_template_part('components/post-ranks', 'brand');
                                endwhile;
                                wp_reset_postdata();
                            endif;
                            ?>
                        </div>
                        <?php endif; ?>
                        <h2 class="entry-title"><a href="#" id="danh-gia"></a>Đánh giá của khách hàng</h2>
                        <?php
                        // If comments are open or we have at least one comment, load up the comment template.
                        if (comments_open() || get_comments_number()) :
                            comments_template();
                        endif;
                        ?>
                    </div>
                </div>
                <div class="col-md-4 sidebar">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
get_footer();
