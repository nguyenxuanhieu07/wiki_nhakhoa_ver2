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
                        <h1 class="page-title">ĐỘI NGŨ BÁC SĨ NHA KHOA TRÊN TOÀN QUỐC</h1>
                        <p class="page-desc">Danh sách bác sĩ nha khoa uy tín trên toàn quốc, đáp ứng các tiêu chuẩn tín
                            nhiệm được đặt ra bởi đội ngũ chuyên gia từ
                            Wiki Nha Khoa và được đánh giá cao bởi khách hàng</p>
                        <p class="link-more-detail">Xem chi tiết về <a href="#" class="link-more">Tiêu chí xếp hạng cơ
                                sở
                                nha khoa</a></p>
                        <div class="doctor-title">
                            <h2 class="title">Danh sách bác sĩ</h2>
                            <?php $arrange = isset($_GET['arrange']) ? $_GET['arrange'] : ''; ?>
                            <select name="" id="arrange" class="form-control select-arrange">
                                <option value="" <?php if($arrange == ''){ echo 'selected'; } ?> >Sắp xếp theo</option>
                                <option value="desc" <?php if($arrange == 'desc'){echo 'selected';} ?>>Điểm đánh giá cao đến thấp</option>
                                <option value="asc" <?php if($arrange == 'asc'){echo 'selected';} ?>>Điểm đánh giá thấp đến cao</option>
                                <option value="new" <?php if($arrange == 'new'){echo 'selected';} ?>>Bác sĩ mới cập nhật</option>
                            </select>
                        </div>
                        <div class="list-doctors">
                            <?php if ( have_posts() ) : ?>
                                <?php
                                    global $wp_query;
                                    $total_pages = $wp_query->max_num_pages;
                                    $number_post = wp_count_posts('doctor')->publish;
                                    $class_loadmore = '';
                                    if($number_post < 10){
                                        $class_loadmore = 'd-none';
                                    }
                                    $i = 1;
                                    while ( have_posts() ) : the_post();
                                    $args = array( 'key' => $i );
                                ?>
                            <div class="item-doctor">
                                <?php get_template_part('components/post','rank',$args); ?>
                                <?php
                                    $post_id = get_the_ID(); 
                                    $total_ratting_comment = get_post_meta( $post_id, 'total-ratting-post', true ) ? get_post_meta( $post_id, 'total-ratting-post', true ) : 0;
                                    $status_good = get_post_meta( $post_id, 'comment-good', true ) ? get_post_meta( $post_id, 'comment-good', true ) : 0 ;
                                    $status_rather = get_post_meta( $post_id, 'comment-rather', true ) ? get_post_meta( $post_id, 'comment-rather', true ) : 0 ;
                                    $status_bad = get_post_meta( $post_id, 'comment-bad', true ) ? get_post_meta( $post_id, 'comment-bad', true ) : 0 ;
                                ?>
                                <div class="inner-rank">
                                    <span class="rank-point">Điểm đánh giá : <?php echo $total_ratting_comment; ?></span>
                                    <ul class="list-status">
                                        <li class="item good" data-status="good"><i class="fa fa-circle" aria-hidden="true" ></i>Tốt <span
                                                class="number">(<?php echo $status_good; ?>)</span>
                                        </li>
                                        <li class="item rather" data-status="rather"><i class="fa fa-circle" aria-hidden="true" ></i>khá <span
                                                class="number">(<?php echo $status_rather; ?>)</span>
                                        </li>
                                        <li class="item bad"  data-status="bad"><i class="fa fa-circle" aria-hidden="true"></i>Cần cải
                                            thiện <span class="number">(<?php echo $status_bad; ?>)</span></li>
                                        <input type="text"  class="post-id-cmt" value="<?php echo $post_id; ?>" hidden>
                                    </ul>
                                </div>
                            </div>
                            <?php 
                                    $i++; 
                                endwhile; 
                                wp_reset_postdata();
                            ?>

                            <div class="load-more <?php echo $class_loadmore ; ?>" data-number="<?php echo $total_pages;?>" data-load="1">
                                <a href="#" class="load-more-item">
                                    <i class="fa fa-angle-double-down fa-2x" aria-hidden="true" ></i>
                                    <span>Xem thêm</span>
                                </a>
                            </div>
                            <?php   endif;  ?>
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
    <div class="modal fade" id="modal-show-comment" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Danh sách bình luận</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
<?php get_footer(); ?>