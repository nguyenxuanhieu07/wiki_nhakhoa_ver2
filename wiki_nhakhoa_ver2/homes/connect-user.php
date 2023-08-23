<?php 
  $args = array(
    'meta_query' => array(
        'relation' => 'AND',
        array(
          'key'   => 'show_user_home',
          'value' => 1,
          'compare'  => '=',
        ),
        array(
          'key'   => 'degree-author',
          'value' => 'tvcm',
          'compare'  => '=',
        ),
    ),
  );
  $data = get_users($args);
  if(!empty($data)):

?>
<section class="home-team-experts">
  <div class="container">
    <h2 class="heading">Đội ngũ chuyên gia</h2>
    <p class="text-center team-experts-desc">Đội ngũ Tham vấn chuyên môn, Kiểm duyệt đánh giá & Biên tập viên từ
      Wiki Nha Khoa chịu
      trách nhiệm đảm bảo
      mang tới
      thông tin chính xác, khách quan nhất cho người dùng</p>
    <ul class="list-experts-title">
      <li class="item active">
        <a href="#" class="link" data-value = "tvcm">Tham vấn chuyên môn</a>
      </li>
      <li class="item">
        <a href="#" class="link" data-value = "kd">Kiểm duyệt đánh giá</a>
      </li>
      <li class="item ">
        <a href="#" class="link" data-value = "btn">Biên tập viên</a>
      </li>
    </ul>
    <div class="row home-list-author">
      <?php
          foreach ($data as $key => $value) {
            $id_user = $value->ID;
            $name = $value->display_name;
            $chuc_vu = get_user_meta($id_user,'expert-office',true) ? get_user_meta($id_user,'expert-office',true) : '';
            $desc = get_user_meta($id_user,'expert-desc',true) ? get_user_meta($id_user,'expert-desc',true) : '';
            $link = get_author_posts_url( $id_user );
            $degree_author =  get_user_meta($id_user,'degree-author',true) ? get_user_meta($id_user,'degree-author',true) : '';
            if($degree_author){
                if($degree_author == 'kd'){
                  $title = "Người kiểm duyệt";
                }elseif ($degree_author == 'btn') {
                  $title = "Biên tập viên";
                }else{
                  $title = "Tham vấn chuyên môn";
                }
            }
            // $desc = wp_trim_words( $desc, 20, '...' );
      ?>
      <div class="item-author col-md-3">
        <div class="post">
          <a href="<?php echo $link; ?>" class="post-thumbnail">
            <?php echo get_avatar( $id_user); ?>
          </a>
          <div class="post-content">
            <h3 class="post-name text-center"><a href="<?php echo $link; ?>" class="link"><?php echo $name; ?> <img src="<?php echo THEME_URI; ?>/images/check.png" alt=""></a></h3>
            <p class="post-academic text-center"><?php echo $title; ?></p>
            <div class="post-desc">
              <?php echo $desc; ?>
          </div>
          </div>
        </div>
      </div>
      <?php }?>
    </div>
  </div>
</section>
<?php
  endif ; 
?>