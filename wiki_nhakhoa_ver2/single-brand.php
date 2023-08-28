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
?>
<main class="doctor-detail brand-deatail">
    <div class="breadcrumb-nav">
        <?php get_template_part('components/breadcrumb'); ?>
    </div>
    <?php get_template_part('single-brand/quick-info'); ?>
    <?php
    $args = array(
        'number_post ' => $number_post
    );
    get_template_part('single-brand/single', 'toc', $args);
    ?>
    <?php
    get_template_part('single-brand/single', 'content', $args);
    ?>
</main>
<?php
get_footer();
