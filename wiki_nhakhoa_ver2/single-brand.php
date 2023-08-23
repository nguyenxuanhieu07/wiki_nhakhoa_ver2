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
    $brand_desc = rwmb_meta('brand-desc') ? rwmb_meta('brand-desc') : '';
    $time_work = rwmb_meta('brand-time-work') ? rwmb_meta('brand-time-work') : '';
    $list_brand = rwmb_meta('list-address-brand') ? rwmb_meta('list-address-brand') : '';
    $license = rwmb_meta('brand-degree') ? rwmb_meta('brand-degree') : '';
    $brand_certification = rwmb_meta('brand-certification') ? rwmb_meta('brand-certification') : '';
    $list_service = rwmb_meta('brand-list-service') ? rwmb_meta('brand-list-service') : '';
    $list_basis = rwmb_meta('brand-degree-basis') ? rwmb_meta('brand-degree-basis') : '';
    $brand_insurance_group = rwmb_meta('brand-insurance-group') ? rwmb_meta('brand-insurance-group') : '';
    $list_brand_utilities = rwmb_meta('list-brand-utilities') ? rwmb_meta('list-brand-utilities') : '';
    $list_service_utilities = rwmb_meta('list-service-utilities') ? rwmb_meta('list-service-utilities') : '';
    $total_ratting_comment = get_post_meta( $post_id, 'total-ratting-post', true ) ? get_post_meta( $post_id, 'total-ratting-post', true ) : 0;
    $args = array(
        'post_type'	=> 'doctor',
        'post_status'	=> 'publish',
        'order'        => 'desc',
        'posts_per_page' => 10,
        'meta_query' => array(
            array(
                'key' => 'expert-brand',
                'value' => get_the_ID(),
                'compare' => '=',
            ),
        ),
    );
    $list_doctor = new WP_Query($args);
    $number_post = $list_doctor->max_num_pages;
    $args_brand = array('single' => true);
?>
<main class="doctor-detail brand-deatail">
    <div class="breadcrumb-nav">
        <?php get_template_part('components/breadcrumb'); ?>
    </div>
    <section class="quick-info">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <?php get_template_part('components/post','brand',$args_brand); ?>
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
    <section class="toc-top">
        <div class="container">
            <ul class="list-toc">
                <li class="item <?php if(!$brand_desc) echo 'd-none'; ?>"><a href="#gioi-thieu" class="smoothScroll">Giới thiệu</a></li>
                <li class="item <?php if(!$license) echo 'd-none'; ?>"><a href="#giay-phep" class="smoothScroll">Giấy phép</a></li>
                <li class="item <?php if(!$brand_certification) echo 'd-none'; ?>"><a href="#chung-nhan" class="smoothScroll">Chứng nhận</a></li>
                <li class="item <?php if(!$list_service) echo 'd-none'; ?>"><a href="#dich-vu" class="smoothScroll">Dịch vụ</a></li>
                <li class="item <?php if(!$list_basis) echo 'd-none'; ?>"><a href="#co-so-vc" class="smoothScroll">Cơ sở vật chất</a></li>
                <li class="item <?php if(!$brand_insurance_group) echo 'd-none'; ?>"><a href="#bao-hanh" class="smoothScroll">Bảo hành</a></li>
                <li class="item <?php if(!$number_post) echo 'd-none'; ?>"><a href="#expert" class="smoothScroll">Đội ngũ chuyên gia</a></li>
                <li class="item"><a href="#tien-ich" class="smoothScroll">Tiện ích</a></li>
                <li class="item"><a href="#danh-gia" class="smoothScroll">Đánh giá khách hàng</a></li>
            </ul>
        </div>
    </section>
    <section class="info-doctor info-brand">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="entry">
                            <h2 class="entry-title <?php if(!$brand_desc) echo 'd-none'; ?>"><a href="#" id="gioi-thieu"></a>Giới thiệu chung về Cơ sở</h2>
                            <?php echo $brand_desc; ?>
                            <div class="time-work <?php if(!$list_brand) echo 'd-none'; ?>">
                                <p class="time"><b>Thời gian làm việc:</b> <?php echo $time_work; ?></p>
                                <span class="title-brand"><b>Danh sách cơ sở</b></span>
                                <ul class="list-address">
                                    <?php
                                    if($list_brand){
                                    foreach ($list_brand as $key => $value) { 
                                        $class = '';
                                        if($key > 2){
                                            $class = 'd-none';
                                        }
                                    ?>
                                        <li class="item <?php echo $class; ?>"><?php echo $value['title-address-brand']; ?></li>
                                    <?php } } ?>
                                </ul>
                                <a href="#" class="entry-link link-more <?php if(count($list_brand) <= 2) echo 'd-none'; ?>">Xem thêm</a>
                            </div>
                            <h2 class="entry-title <?php if(!$license) echo 'd-none'; ?>"><a href="#" id="giay-phep"></a>Giấy phép hoạt động</h2>
                            <div class="row doctor-list-img <?php if(!$license) echo 'd-none'; ?>">
                                <?php 
                                if($license){
                                    foreach ($license as $key => $value) { 
                                ?>
                                    <div class=" img-item col-md-3">
                                        <img class="" src="<?php echo $value['full_url'] ?>" alt="">
                                    </div>
                                <?php 
                                    } 
                                }
                                ?>
                            </div>
                            <h2 class="entry-title <?php if(!$brand_certification) echo 'd-none'; ?>"><a href="#" id="chung-nhan"></a>Chứng nhận</h2>
                            <div class="row list-img-certificate <?php if(!$brand_certification) echo 'd-none'; ?>">
                                <?php 
                                if($brand_certification){
                                    foreach ($brand_certification as $key => $value) {
                                ?>
                                    <div class=" img-item col-md-3">
                                        <img class="" src="<?php echo $value['full_url'] ?>" alt="">
                                    </div>
                                <?php 
                                    } 
                                }
                                ?>
                            </div>
                            <h2 class="entry-title <?php if(!$list_service) echo 'd-none'; ?>"><a href="#" id="dich-vu"></a>Dịch vụ</h2>
                            <div class="row list-service-brand <?php if(!$list_service) echo 'd-none'; ?>">
                                <?php 
                                if($list_service){
                                    foreach ($list_service as $key => $value) {
                                        $term_image = get_term_meta($value->term_id, 'icon-service_cat', true); 
                                        $url = wp_get_attachment_url( $term_image );
                                        $link = get_term_link($value->term_id);
                                ?>
                                    <div class="col-md-6">
                                        <a href="<?php echo $link; ?>" class="inner">
                                            <img class="img <?php if(!$url) echo 'd-none'; ?>" src="<?php echo $url; ?>" alt="">
                                            <h3 class="inner-title"><?php echo $value->name; ?></h3>
                                        </a>
                                    </div>
                                <?php 
                                    } 
                                }
                                ?>
                            </div>
                            <h2 class="entry-title <?php if(!$list_basis) echo 'd-none'; ?>"><a href="#" id="co-so-vc"></a>Cơ sở vật chất</h2>
                            <div class="list-img-basis  <?php if(!$list_basis) echo 'd-none'; ?>">
                                <?php 
                                if($list_basis){
                                    $i = 1;
                                    foreach ($list_basis as $key => $value) {
                                    if($i == 1){
                                        ?>
                                            <img class="item item-top" src="<?php echo $value['full_url'] ?>" alt="">
                                            <div class="row inner">
                                        <?php
                                    }else{
                                ?>
                                    <div class="item item-top col-md-3">
                                        <img class="" src="<?php echo $value['full_url'] ?>" alt="">
                                    </div>                                    
                                <?php
                                    }
                                    $i++;
                                    }
                                    ?>
                                        </div>
                                    <?php 
                                }
                                ?>
                            </div>
                            <h2 class="entry-title <?php if(!$brand_insurance_group) echo 'd-none'; ?>"><a href="#" id="bao-hanh"></a>Bảo hành</h2>
                            <div class="row list-warrant <?php if(!$brand_insurance_group) echo 'd-none'; ?>">
                                <?php 
                                if($brand_insurance_group){
                                    foreach ($brand_insurance_group as $key => $value) { 
                                        $url = wp_get_attachment_url( $value['brand-insurance-img'][0] );
                                        $title = $value['brand-insurance-title'];
                                        $desc = $value['brand-insurance-text'];
                                ?>
                                    <div class="col-md-4">
                                        <div class="inner">
                                            <img class="img" src="<?php echo $url; ?>" alt="">
                                            <div class="content">
                                                <p class="item title"><?php echo $title; ?></p>
                                                <p class="item desc"><?php echo $desc; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php 
                                    } 
                                }
                                ?>
                            </div>
                            <h2 class="entry-title <?php if(!$number_post) echo 'd-none'; ?>"><a href="#" id="expert"></a>Đội ngũ chuyên gia</h2>
                            <div class="list-doctor-brand <?php if(!$number_post) echo 'd-none'; ?>">
                                <?php 
                                    if ( $list_doctor->have_posts() ) :
                                        while ( $list_doctor->have_posts() ) : $list_doctor->the_post();
                                            $total_pages = $list_doctor->max_num_pages;
                                            get_template_part('components/post-rank');
                                        endwhile;
                                        wp_reset_postdata();
                                        ?>
                                            <div class="load-more <?php if($total_pages <= 1) echo 'd-none'; ?>">
                                                <a href="#" class="load-more-item">
                                                    <i class="fa fa-angle-double-down fa-2x" aria-hidden="true"></i>
                                                    <span>Xem thêm</span>
                                                </a>
                                            </div>
                                        <?php
                                    endif;
                                ?>
                            </div>
                            <h2 class="entry-title"><a href="#" id="tien-ich"></a>Tiện ích tại nha khoa</h2>
                            <p><b>Cơ sở</b></p>
                            <div class="row">
                                <div class="col-6 col-md-4">
                                    <ul class="list-utilities">
                                        <li class="item <?php if(!in_array('dau-xe',$list_brand_utilities)) echo 'item-not'; ?>">Bãi đậu xe</li>
                                        <li class="item <?php if(!in_array('wc',$list_brand_utilities)) echo 'item-not'; ?>">Nhà vệ sinh</li>
                                        <li class="item <?php if(!in_array('hieu-thuoc',$list_brand_utilities)) echo 'item-not'; ?>">Hiệu thuốc tại chỗ</li>
                                    </ul>
                                </div>
                                <div class="col-6 col-md-4">
                                    <ul class="list-utilities">
                                        <li class="item <?php if(!in_array('phong-cho',$list_brand_utilities)) echo 'item-not'; ?>">Phòng chờ</li>
                                        <li class="item <?php if(!in_array('phong-nghi-duong',$list_brand_utilities)) echo 'item-not'; ?>">Phòng nghỉ dưỡng</li>
                                    </ul>
                                </div>
                            </div>
                            <p><b>Dịch vụ phòng khám</b></p>
                            <div class="row">
                                <div class="col-6 col-md-4">
                                    <ul class="list-utilities">
                                        <li class="item <?php if(!in_array('dat-lich',$list_service_utilities)) echo 'item-not'; ?>">Đặt lịch trực tuyến</li>
                                        <li class="item <?php if(!in_array('tu-van',$list_service_utilities)) echo 'item-not'; ?>">Tư vấn trực tuyến</li>
                                        <li class="item <?php if(!in_array('mo-cua',$list_service_utilities)) echo 'item-not'; ?>">Mở cửa cuối tuần</li>
                                    </ul>
                                </div>
                                <div class="col-6 col-md-4">
                                    <ul class="list-utilities">
                                        <li class="item <?php if(!in_array('cham-soc',$list_service_utilities)) echo 'item-not'; ?>">Chăm sóc sau khám chữa</li>
                                        <li class="item <?php if(!in_array('ho-so',$list_service_utilities)) echo 'item-not'; ?>">Hồ sơ bệnh nhân điện tử</li>
                                    </ul>
                                </div>
                                <div class="col-6 col-md-4">
                                    <ul class="list-utilities">
                                        <li class="item <?php if(!in_array('ho-tro',$list_service_utilities)) echo 'item-not'; ?>">Hỗ trợ đi lại</li>
                                    </ul>
                                </div>
                            </div>
                            <h2 class="entry-title"><a href="#" id="danh-gia"></a>Đánh giá của khách hàng</h2>
                            <?php 
                                // If comments are open or we have at least one comment, load up the comment template.
                                if ( comments_open() || get_comments_number() ) :
                                    comments_template();
                                endif;
                            ?>
                        </div>
                    </div>
                    <div class="col-md-4 sidebar">
                       <?php get_sidebar(); ?>
                        <!-- <div class="inner-sibar-brand">
                            <img class="img-sidebar" src="images/doctors/doctor-sidebar.png" alt="">
                            <div class="sibar-brand-content text-center">
                                <h3 class="sibar-brand-title">Đăng ký kết nối bác sĩ</h3>
                                <p class="sibar-brand-desc">Gia tăng uy tín & cùng chia sẻ các thông tin hữu ích</p>
                                <a href="#" class="btn-register-brand">Đăng ký tại đây </a>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </section>
</main>
<?php
get_footer();