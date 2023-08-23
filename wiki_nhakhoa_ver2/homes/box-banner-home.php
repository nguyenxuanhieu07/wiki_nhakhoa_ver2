<?php 
    $options = get_option('wiki-homepage-options');
    $args = array(
        'post_type' => 'post',
        'posts_per_page'    => 2,
        'post_status'       => 'publish',
        'orderby'           => 'date',
    );
    $list_post_one = new WP_Query($args);
?>
<section class="box-banner-home">
    <div class="container">
        <h2 class="heading">Kiến thức nha khoa</h2>
        <div class="row">
            <div class="order-2 order-md-1 col-md-9">
                <div class="list-post-top">
                    <div class="row">
                        <?php 
                            if($list_post_one->have_posts()) : 
                            $i = 1;
                            while($list_post_one->have_posts()) : $list_post_one->the_post();
                            $author_id=$post->post_author;
                            $name_author = get_the_author_meta('display_name', $author_id);
                            $post_not_id[] = get_the_ID();
                            $views = wb_get_post_view(get_the_ID());
                            if ($i == 1) {
                        ?>
                        <div class="col-md-8">
                            <div class="post post-left">
                                <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                                    <?php the_post_thumbnail('large'); ?>
                                </a>
                                <div class="post-content">
                                    <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <div class="post-meta">
                                        <span class="post-date"><?php echo get_the_date( 'd/m/y' ); ?></span>
                                        <span class="post-view"><i class="fa fa-eye" aria-hidden="true"></i> <?php echo $views; ?> lượt xem
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php }elseif ($i == 2) {?>
                        <div class="col-md-4">
                            <div class="post post-right">
                                <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                                    <?php the_post_thumbnail('thumbnail'); ?>
                                </a>
                                <div class="post-content">
                                    <h3 class="post-title title-right"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h3>
                                    <div class="post-meta">
                                        <span class="post-date"><?php echo get_the_date( 'd/m/y' ); ?></span>
                                        <span class="post-view"><i class="fa fa-eye" aria-hidden="true"></i> <?php echo $views; ?> lượt xem
                                        </span>
                                    </div>
                                    <p class="post-excerpt d-none d-md-block"><?php echo wiki_post_excerpt(50); ?></p>
                                    <a href="<?php the_permalink(); ?>" class="post-more d-block d-md-none">Xem thêm</a>
                                </div>
                            </div>
                        </div>
                        <?php 
                        }
                         $i++;
                            endwhile;
                        endif;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
                <div class="list-post-bottom">
                    <div class="row js-list-post">
                        <?php
                        $args_two = array(
                            'post_type' => 'post',
                            'posts_per_page'    => 6,
                            'post_status'       => 'publish',
                            'orderby'           => 'date',
                            'post__not_in'      => $post_not_id,
                        );
                        $list_post_two = new WP_Query($args_two);
                        ?>
                        <?php 
                        if($list_post_two->have_posts()) : 
                            while($list_post_two->have_posts()) : $list_post_two->the_post();
                                $author_id=$post->post_author;
                                $name_author = get_the_author_meta('display_name', $author_id);
                                $viewss = wb_get_post_view(get_the_ID());
                                ?>
                                <div class="col-md-4 post-grid ">
                                    <a href="<?php the_permalink(); ?>" class="post-thumbnail">
                                        <?php the_post_thumbnail('thumbnail'); ?>
                                    </a>
                                    <div class="post-content">
                                        <h3 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title() ?></a>
                                        </h3>
                                        <div class="post-meta">
                                            <span class="post-date"><?php echo get_the_date( 'd/m/y' ); ?></span>
                                            <span class="post-view"><i class="fa fa-eye" aria-hidden="true"></i> <?php echo $viewss; ?> lượt xem
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile;
                        endif;
                        wp_reset_postdata();
                        ?>
                    </div>
                </div>
            </div>
            <div class="order-1 order-md-2 col-md-3">
                <div class="topic-hot">
                    <h3 class="topic-title">Chủ đề được quan tâm</h3>
                    <?php 
                        if (isset($options['topic-hot-group']) && !empty($options['topic-hot-group'])) {
                            $home_top_list = $options['topic-hot-group'];
                    ?>
                    <ul class="list-topic">
                        <?php 
                            foreach ($home_top_list as $key => $value) { ?>
                            <li class="item"><a href="<?php echo $value['topic-item-link'] ?>" class="link"><?php echo $value['topic-group-title'] ?></a></li>
                        <?php } ?>
                    </ul>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>