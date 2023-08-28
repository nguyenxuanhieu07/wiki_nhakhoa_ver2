<?php
$args = array(
    'post_type'    => 'doctor',
    'post_status'    => 'publish',
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
if ($number_post) :
?>
    <h2 class="entry-title"><a href="#" id="expert"></a>Đội ngũ chuyên gia</h2>
    <div class="list-doctor-brand">
        <?php
        if ($list_doctor->have_posts()) :
            while ($list_doctor->have_posts()) : $list_doctor->the_post();
                $total_pages = $list_doctor->max_num_pages;
                get_template_part('components/post-ranks');
            endwhile;
            wp_reset_postdata();
        ?>
            <?php if ($total_pages > 1) : ?>
                <div class="load-more">
                    <a href="#" class="load-more-item">
                        <i class="fa fa-angle-double-down fa-2x" aria-hidden="true"></i>
                        <span>Xem thêm</span>
                    </a>
                </div>
            <?php endif; ?>
        <?php
        endif;
        ?>
    </div>
<?php endif; ?>