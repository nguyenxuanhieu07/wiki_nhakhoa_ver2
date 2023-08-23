<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package wiki_nhakhoa
 */

  get_header();
  $user_id = get_the_author_meta('ID');

  $user_info = get_userdata($user_id);
  
  $degree_author = get_user_meta($user_id,'degree-author',true) ? get_user_meta($user_id,'degree-author',true) : '';
  $desc_author = get_user_meta($user_id,'expert-desc',true) ? get_user_meta($user_id,'expert-desc',true) : '';
  $expert_tiktok = get_user_meta($user_id,'expert-tiktok',true) ? get_user_meta($user_id,'expert-tiktok',true) : '';
  $expert_youtobe = get_user_meta($user_id,'expert-youtobe',true) ? get_user_meta($user_id,'expert-youtobe',true) : '';
  $expert_facebook = get_user_meta($user_id,'expert-facebook',true) ? get_user_meta($user_id,'expert-facebook',true) : '';
  $expert_instar = get_user_meta($user_id,'expert-instar',true) ? get_user_meta($user_id,'expert-instar',true) : '';
  $expert_printerest = get_user_meta($user_id,'expert-printerest',true) ? get_user_meta($user_id,'expert-printerest',true) : '';
  $expert_degree = get_user_meta($user_id,'expert-degree',false) ? get_user_meta($user_id,'expert-degree',false) : '';
  $expert_certificate = get_user_meta($user_id,'expert-certificate',false) ? get_user_meta($user_id,'expert-certificate',true) : '';
  $expert_exp = get_user_meta($user_id,'expert-exp',true) ? get_user_meta($user_id,'expert-exp',true) : '';
  $user_avatar_url = get_avatar_url($user_id);
  $user_name = $user_info->data->display_name ?  $user_info->data->display_name : '';
  $title = "";

  if($degree_author){
      if($degree_author == 'kd'){
        $title = "Người kiểm duyệt";
      }elseif ($degree_author == 'btn') {
        $title = "Biên tập viên";
      }else{
        $title = "Tham vấn chuyên môn";
      }
  }
?>
    <main class="author-page">
      <section class="author">
        <div class="container">
          <div class="row">
            <div class="col-md-8">
              <div class="athor-infor">
                <img class="author-avatar" src="<?php echo $user_avatar_url; ?>" alt="" />
                <div class="infor-content">
                  <h3 class="author-name"><?php echo $user_name; ?> <img src="images/check.png" alt="" />
                  </h3>
                  <p class="author-position"><?php echo $title; ?></p>
                  <ul class="author-social">
                    <li class="item">
                      <a href="<?php echo $expert_facebook; ?>"
                        ><img src="<?php echo THEME_URI; ?>/images/icons/facwe.png" alt=""
                      /></a>
                    </li>
                    <li class="item">
                      <a href="<?php echo $expert_youtobe; ?>"
                        ><img src="<?php echo THEME_URI; ?>/images/icons/youtube.png" alt=""
                      /></a>
                    </li>
                    <li class="item">
                      <a href="<?php echo $expert_instar; ?>"
                        ><img src="<?php echo THEME_URI; ?>/images/icons/instar.png" alt=""
                      /></a>
                    </li>
                    <li class="item">
                      <a href="<?php echo $expert_tiktok; ?>"
                        ><img src="<?php echo THEME_URI; ?>/images/icons/tik-tok.png" alt=""
                      /></a>
                    </li>
                    <li class="item">
                      <a href="<?php echo $expert_printerest; ?>"
                        ><img src="<?php echo THEME_URI; ?>/images/icons/pinterest.png" alt=""
                      /></a>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="entry">
                <h2 class="entry-title <?php if(!$desc_author) echo 'd-none'; ?>">Giới thiệu chung</h2>
                <div class="entry-content <?php if(!$desc_author) echo 'd-none'; ?>">
                  <?php echo $desc_author; ?> 
                </div>
                <h2 class="entry-title <?php if(!$expert_degree) echo 'd-none'; ?>">Bằng cấp, chứng chỉ</h2>
                <div class="row list-img <?php if(!$expert_degree) echo 'd-none'; ?>">
                    <?php 
                        if($expert_degree){
                        foreach ($expert_degree as $key => $value) {
                          $image = wp_get_attachment_image_src( $value, 'full', false );
                          ?>
                            <div class="list-item col-md-3">
                              <img class="img-item" src="<?php echo  $image[0];?>" alt=""/>
                            </div>
                          <?php
                        }
                    }
                     ?>
                </div>
                <h2 class="entry-title <?php if(!$expert_certificate) echo 'd-none'; ?>">Quy trình đào tạo</h2>
                <div class="entry-background <?php if(!$expert_certificate) echo 'd-none'; ?>">
                 <?php echo  $expert_certificate ;?>
                </div>
                <h2 class="entry-title <?php if(!$expert_exp) echo 'd-none'; ?>">Kinh nghiệm làm việc</h2>
                <div class="entry-background <?php if(!$expert_exp) echo 'd-none'; ?>">
                  <?php echo $expert_exp; ?>
                </div>
                <?php if($degree_author && $degree_author == 'btn'): ?>
                <h2 class="entry-title">Bài viết tác giả</h2>
                <div class="author-list-post">
                <?php 
                    $args = array(
                        'author'         => $user_id,
                        'post_type'      => 'post',
                        'posts_per_page' => 10, 
                        'post_status'       => 'publish',
                    );

                    $posts_query = new WP_Query($args);
                    if ($posts_query->have_posts()) {
                        while ($posts_query->have_posts()) :
                            $posts_query->the_post();
                ?>
                  <div class="post">
                    <a href="<?php  the_permalink(get_the_ID()); ?>" class="post-thumbnail">
                      <?php the_post_thumbnail(get_the_ID(), 'thumbnail'); ?>
                    </a>
                    <div class="post-content">
                      <h3 class="post-title">
                        <a href="<?php  the_permalink(get_the_ID()); ?>">
                         <?php the_title(); ?>
                        </a>
                      </h3>
                      <p class="post-desc">
                        <?php echo wiki_post_excerpt(50); ?>
                      </p>
                    </div>
                  </div>
                  <?php 
                    endwhile;
                    ?>
                      <div class="load-more d-none">
                      <a href="#" class="load-more-item">
                        <i
                          class="fa fa-angle-double-down fa-2x"
                          aria-hidden="true"
                        ></i>
                        <span>Xem thêm</span>
                      </a>
                    </div>
                    <?php
                    }

                  ?>
                </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
<?php 
get_footer();