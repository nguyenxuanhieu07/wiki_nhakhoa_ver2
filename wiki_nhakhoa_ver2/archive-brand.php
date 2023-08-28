<?php get_header(); ?>
<main class="brands">
    <?php get_template_part('components/search-location'); ?>
    <div class="breadcrumb-nav">
        <?php get_template_part('components/breadcrumb'); ?>
    </div>
    <section class="doctor-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h1 class="page-title">CƠ SỞ NHA KHOA TRÊN TOÀN QUỐC</h1>
                    <p class="page-desc">Danh sách cơ sở nha khoa uy tín trên toàn quốc, đáp ứng các tiêu chuẩn tín nhiệm được đặt ra bởi đội ngũ chuyên gia từ Wiki Nha Khoa và được đánh giá cao bởi khách hàng</p>
                    <p class="link-more-detail">Xem chi tiết về <a href="#" class="link-more">Tiêu chí xếp hạng cơ
                            sở
                            nha khoa</a></p>
                    <div class="doctor-title">
                        <h2 class="title">Danh sách cơ sở</h2>
                        <?php $arrange = $_GET['arrange'] ? $_GET['arrange'] : ''; ?>
                        <select name="" id="arrange" class="form-control select-arrange">
                            <option value="" <?php if ($arrange == '') {
                                                    echo 'selected';
                                                } ?>>Sắp xếp theo</option>
                            <option value="desc" <?php if ($arrange == 'desc') {
                                                        echo 'selected';
                                                    } ?>>Điểm đánh giá cao đến thấp</option>
                            <option value="asc" <?php if ($arrange == 'asc') {
                                                    echo 'selected';
                                                } ?>>Điểm đánh giá thấp đến cao</option>
                            <option value="new" <?php if ($arrange == 'new') {
                                                    echo 'selected';
                                                } ?>>Cơ sở mới cập nhật</option>
                        </select>
                    </div>
                    <div class="list-doctors">
                        <?php if (have_posts()) : ?>
                            <?php
                            $i = 1;
                            global $wp_query;
                            $total_pages = $wp_query->max_num_pages;
                            $number_post = wp_count_posts('doctor')->publish;
                            $class_loadmore = '';
                            if ($number_post < 10) {
                                $class_loadmore = 'd-none';
                            }
                            while (have_posts()) : the_post();
                                $args = array('key' => $i);
                            ?>
                                <div class="item-doctor">
                                    <?php
                                    get_template_part('components/post-ranks', 'brand', $args);
                                    get_template_part('components/point', 'ranks');
                                    ?>
                                </div>
                            <?php $i++;
                            endwhile; ?>
                            <div class="load-more <?php echo $class_loadmore; ?>" data-number="<?php echo $total_pages; ?>" data-load="1">
                                <a href="#" class="load-more-item">
                                    <i class="fa fa-angle-double-down fa-2x" aria-hidden="true"></i>
                                    <span>Xem thêm</span>
                                </a>
                            </div>
                        <?php endif; ?>
                        <div class="loader">
                            <li class="ball"></li>
                            <li class="ball"></li>
                            <li class="ball"></li>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 sidebar">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </section>
</main>
<?php get_footer(); ?>