<?php
    $title = rwmb_meta('toplist-title-main') ? rwmb_meta( 'toplist-title-main') : '';
    $type = rwmb_meta('toplist-type') ? rwmb_meta( 'toplist-type') : '';
    $content = rwmb_meta('toplist-desc') ? rwmb_meta('toplist-desc') : '';
    $content_last = rwmb_meta('toplist-desc-last') ? rwmb_meta('toplist-desc-last') : '';
    $doctor_province = rwmb_meta('doctor_province') ? rwmb_meta('doctor_province') : '';
    $doctor_district = rwmb_meta('doctor_district') ? rwmb_meta('doctor_district') : '';
    $posts_per_page = rwmb_meta('show-number-post') ? rwmb_meta('show-number-post') : 10;
    $toplist_customer = rwmb_meta('toplist-customer') ? rwmb_meta('toplist-customer') : 0;
    $toplist_customer_wiki = rwmb_meta('toplist-customer-wiki') ? rwmb_meta('toplist-customer-wiki') : 0;
    global $post;
    $author_id = $post->post_author;
    $author_name = get_the_author_meta('display_name', $author_id);
    $author_url = get_author_posts_url($author_id);
    $author_avatar = get_avatar($author_id, 96);
    $toplist_service = rwmb_meta('toplist-service') ? rwmb_meta('toplist-service') : '';
    $id_service = 0;
    if($toplist_service != ''){
       $id_service = $toplist_service->term_id;
    }
?>
<section class="toplist-doctor">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <a href="<?php echo $author_url; ?>" class="infor-editor">
                    <div class="avatar">
                        <?php echo $author_avatar; ?>
                    </div>
                    <div class="infor-content">
                        <p class="name"><?php echo $author_name; ?><img src="<?php echo THEME_URI; ?>/images/icons/check.png" alt=""></p>
                        <p class="capility">Người kiểm duyệt</p>
                    </div>
                </a>
                <h1 class="page-title"><?php echo get_the_title(); ?></h1>
                <a href="#" id="gioi-thieu"></a>
                <?php echo $content; ?>
                <p class="link-more-detail">Xem chi tiết về <a href="#" class="link-more">Tiêu chí xếp hạng cơ sở nha khoa</a></p>
                <div class="list-toplist">
                    <a href="#" id="gioi-bacsi"></a>
                    <h2 class="list-title"><?php echo $title; ?></h2>
                    <?php 
                        $meta_key = ['relation' => 'AND'];
                        if($doctor_province){
                            $meta_key[] = array(
                                'key'   => 'doctor_province',
                                'value' => $doctor_province,
                                'compare'  => '=',
                            );
                        }
                        if($doctor_district){
                            $meta_key[] = array(
                                'key'   => 'doctor_district',
                                'value' => $doctor_district,
                                'compare'  => '=',
                            );
                        }
                        if($toplist_service){
                            $meta_key[] = array(
                                'key'   => 'expert-list-service',
                                'value' => $id_service,
                                'compare'  => 'like',
                            );
                        }
                        if($toplist_customer){
                            $meta_key[] = array(
                                'key'   => 'expert-custom-number',
                                'value' => $toplist_customer,
                                'compare'  => '>=',
                                'type' => 'NUMERIC'
                            );
                        }
                        if($toplist_customer_wiki){
                            $meta_key[] = array(
                                'key'   => 'expert-custom-number-wiki',
                                'value' => $toplist_customer_wiki,
                                'compare'  => '>=',
                                'type' => 'NUMERIC'
                            );
                        }
                        $args = array(
                        'post_type' => $type,
                        'post_status'   => 'publish',
                        'posts_per_page' => $posts_per_page,
                        'order'        => 'desc',
                        'orderby'        => 'meta_value_num',
                        'meta_key' => 'total-ratting-post',
                        'meta_query' => $meta_key,
                    );
                    $list_post = new WP_Query($args);
                    if($list_post->have_posts()) {
                        $i = 1;
                        while ( $list_post->have_posts() ) : $list_post->the_post();
                        $args = array( 'rank' => $i );
                        $post_id = get_the_ID();
                        $total_ratting_comment = get_post_meta( $post_id, 'total-ratting-post', true ) ? get_post_meta( $post_id, 'total-ratting-post', true ) : 0;
                        $expert_desc = rwmb_meta('expert-desc') ? rwmb_meta('expert-desc') : '';
                        $expert_degree = rwmb_meta('expert-degree') ? rwmb_meta('expert-degree') : '';
                        $expert_certificate = rwmb_meta('expert-certificate') ? rwmb_meta('expert-certificate') : '';
                        $expert_exp_specialize = rwmb_meta('expert-exp-specialize') ? rwmb_meta('expert-exp-specialize') : '';
                    ?>
                    <div class="toplist-item">
                        <?php get_template_part('components/post','ranks',$args); ?>
                        <div class="row toplist-point">
                            <div class="col-md-6 mb-2">
                                <div class="point-doctor">
                                    <span class="point"><?php echo $total_ratting_comment; ?></span>
                                    <div class="content">
                                        <span class="point-title">Điểm xếp hạng</span>
                                        <span class="point-desc">từ khách hàng & Wiki Nha Khoa</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <a href="<?php  the_permalink(get_the_ID()); ?>#danh-gia" class="doctor-rate-link">
                                    <img src="<?php echo THEME_URI; ?>/images/icons/icon-rate.png" alt="">
                                    Đánh giá bác sĩ
                                </a>
                            </div>
                        </div>
                        <div class="entry">
                            <h4 class="doctor-title <?php if(!$expert_desc) echo 'd-none'; ?>"></a>Giới thiệu chung về bác sĩ</h4>
                            <?php echo $expert_desc; ?>
                            <h4 class="doctor-title <?php if(!$expert_degree) echo 'd-none'; ?>"></a>Bằng cấp , chứng chỉ</h4>
                            <?php 
                                $class_degree = '';
                                if(count($expert_degree) > 3) $class_degree = 'doctor-list-img';
                            ?>
                            <div class="row <?php echo $class_degree; ?>  mb-3 <?php if(!$expert_degree) echo 'd-none'; ?>">
                                <?php
                                    foreach ($expert_degree as $key => $value) {
                                ?>
                                    <div class="img-item col-md-3">
                                        <img class="" src="<?php echo $value['full_url']; ?>" alt="">
                                    </div>
                                <?php
                                    }
                                ?>
                            </div>
                            <h4 class="doctor-title <?php if(!$expert_certificate) echo 'd-none'; ?>"><a href="#" id="qua-trinh-dao-tao"></a>Quy trình đào tạo</h4>
                            <div class="entry-content <?php if(!$expert_certificate) echo 'd-none'; ?>">
                               <?php echo $expert_certificate; ?>
                               <a href="#" class="item-more link-more">Xem thêm</a>
                            </div>
                            
                            <h4 class="doctor-title <?php if(!$expert_exp_specialize) echo 'd-none'; ?>"><a href="#" id="kinh-nghiem"></a>Kinh nghiệm làm việc</h4>
                            <div class="entry-content <?php if(!$expert_exp_specialize) echo 'd-none'; ?>">
                                <?php echo $expert_exp_specialize; ?>
                                <a href="#" class="item-more link-more">Xem thêm</a>
                            </div>
                            
                        </div>
                    </div>
                    <?php 
                        $i++;
                        endwhile;
                        wp_reset_postdata();
                        } 
                    ?>
                </div>
                <?php echo $content_last; ?>
            </div>
            <div class="col-md-4 sidebar">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</section>