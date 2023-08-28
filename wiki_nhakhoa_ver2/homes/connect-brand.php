<?php
$option = get_option('wiki-homepage-options');
$option_themes = get_option('wiki-theme-options');
$display_province = isset($option['display_province']) ? $option['display_province'] : [];
$name_province = wiki_get_province();
$result_array = array_intersect_key($name_province, array_flip(array_values($display_province)));
$number_phone = isset($option_themes['numberphone']) ? $option_themes['numberphone'] : '#';

?>
<section class="brand-top">
    <div class="container">
        <?php if (!empty($display_province)) { ?>
            <h2 class="heading">Top Thương hiệu nha khoa uy tín</h2>
            <div class="brand-top-content">
                <ul class="list-address">
                    <?php
                    $i = 1;
                    foreach ($result_array as $key => $value) {
                        $class = '';
                        if ($i == 1)
                            $class = 'active';
                        ?>
                        <li class="item <?php echo $class; ?>" data-id="<?php echo $key; ?>"><?php echo $value; ?></li>
                        <?php
                        $i++;
                    }
                    ?>
                </ul>
                <div class="row list-brand">
                    <?php
                    $args = array(
                        'post_type' => 'brand',
                        'post_status' => 'publish',
                        'posts_per_page' => 6,
                        'order' => 'desc',
                        'orderby' => 'meta_value_num',
                        'meta_key' => 'total-ratting-post',
                        'meta_query' => array(
                            array(
                                'meta_key' => 'doctor_province',
                                'value' => $display_province[0],
                                'compare' => '=',
                            ),
                        ),
                    );
                    $list_post = new WP_Query($args);
                    if ($list_post->have_posts()) {
                        $i = 1;
                        while ($list_post->have_posts()):
                            $list_post->the_post();
                            $args = array(
                                'rank' => $i,
                                'link' => true,
                                'homepage' => true,
                            );
                            ?>
                            <div class="col-md-6">
                                <?php get_template_part('components/post-ranks', 'brand', $args); ?>
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
        <?php } ?>
        <?php
        get_template_part('homes/connect', 'boxhome');
        ?>
    </div>
</section>