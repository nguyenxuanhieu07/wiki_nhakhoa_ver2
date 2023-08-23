<section class="connect-doctor-top">
    <div class="container">
        <h2 class="heading">ĐÁNH GIÁ & XẾP HẠNG BÁC SĨ NHA KHOA UY TÍN</h2>
        <div class="row">
            <div class="col-md-3">
                <?php 
                    $category_search = get_terms(array(
                        'taxonomy' => 'service_cat',
                        'hide_empty' => false,
                        'meta_query' => '=',
                        'meta_key' => array('in_search_box_service'),
                        'meta_value' => '1',
                    ));
                    $images = rwmb_meta('icon-service_cat', array( 'object_type' => 'term' ), $category_search[0]->term_id );
                    foreach($images as $key => $vl_images){
                        $url_img = $vl_images['full_url'];
                    }    
                ?>
                <ul class="experts-specialist">
                    <li class="item fist-item d-flex d-md-none">
                         <?php if($url_img): ?>
                            <img class="icon" src="<?php echo $url_img; ?>" alt="">
                        <?php endif; ?>
                        <a href="#"><?php echo $category_search[0]->name; ?> </a>
                    </li>
                    <?php
                        foreach ($category_search as $key => $value) { 
                        $images = rwmb_meta('icon-service_cat', array( 'object_type' => 'term' ), $value->term_id );
						foreach($images as $vl_images){
							$url_img = $vl_images['full_url'];
						}
                    ?>
                        <li class="item" data-id="<?php echo $value->term_id; ?>">
                            <?php if($url_img): ?>
                                <img class="icon" src="<?php echo $url_img; ?>" alt="">
                            <?php endif; ?>
                            <a href="#" class="<?php if($key == 0) echo 'active'; ?>"><?php echo $value->name; ?> </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
            <div class="col-md-9 ">
                <a href="<?php echo home_url('/chuyen-gia'); ?>" class="action-more">Xem tất cả &nbsp;<i class="fa fa-angle-double-right"
                        aria-hidden="true"></i></a>
                <div class="row connect-doctor-content">
                    <?php 
                        $args = array(
                            'post_type' => 'doctor',
                            'post_status'   => 'publish',
                            'posts_per_page' => 6,
                            'order'        => 'desc',
                            'orderby'        => 'meta_value_num',
                            'meta_key' => 'total-ratting-post',
                            'meta_query' => array(
                                array(
                                    'taxonomy'  => 'expert-list-service',
                                    'compare'     => 'like',
                                    'value'     => $category_search[0]->term_id,
                                ),
                            ),
                        );
                        $list_post = new WP_Query($args);
                        if($list_post->have_posts()) {
                            $i = 1;
                            while($list_post->have_posts()) : $list_post->the_post();
                            $args = array( 'key' => $i ,'homepage' => true);
                            ?>
                                <div class="col-md-6">
                                    <?php get_template_part('components/post','rank',$args); ?>
                                </div>
                            <?php
                            $i++;
                            endwhile;
                            wp_reset_postdata(); 
                        }
                    ?>
                </div>
                <div class="loader">
                    <li class="ball"></li>
                    <li class="ball"></li>
                    <li class="ball"></li>
                </div>
            </div>
        </div>
    </div>
</section>