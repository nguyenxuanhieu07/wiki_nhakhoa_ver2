<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package sheis_vn
 */
get_header();
?>
<?php get_template_part('components/adsense', 'header'); ?>
<main class="page-archive">
    <div class="breadcrumb-nav">
        <?php get_template_part('components/breadcrumb'); ?>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1 class="archive-title"><?php echo single_cat_title('' , true ); ?></h1>
                <div class="post-category">
                    <?php
                    if(have_posts()) :
                        while(have_posts()) : the_post();
                            echo '<div class="post-right">';
                            get_template_part('components/post');
                            echo '</div>';
                        endwhile;
                    else :
                        get_template_part( 'template-parts/content', 'none' );
                    endif;
                    wp_reset_postdata();
                    ?>
                </div>
                <?php wiki_pagination(); ?>
            </div>
            <div class="col-md-4 d-none d-md-block d-sm-none sidebar">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</main>
<?php get_footer();
