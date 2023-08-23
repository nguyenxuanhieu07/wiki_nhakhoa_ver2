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
    $type = rwmb_meta('toplist-type') ? rwmb_meta( 'toplist-type') : '';
    $status = rwmb_meta('form_status') ? rwmb_meta( 'form_status') : '';
    if($status):
?>
<main class="toplist-doctors">
    <div class="breadcrumb-nav">
        <?php get_template_part('components/breadcrumb'); ?>
    </div>
    <section class="toc-top">
        <div class="container">
            <ul class="list-toc">
                <li class="item"><a href="#gioi-thieu" class="smoothScroll">Giới thiệu</a></li>
                <?php if($type == 'doctor'): ?>
                <li class="item"><a href="#top-bacsi" class="smoothScroll">Top bác sĩ nha khoa</a></li>
                <?php elseif ($type == 'brand'): ?>
                    <li class="item"><a href="#top-coso" class="smoothScroll">Top cơ sở nha khoa</a></li>
                <?php endif; ?> 
                <li class="item"><a href="#faq" class="smoothScroll">FAQ</a></li>

            </ul>
        </div>
    </section>
    <?php 
        if($type == 'doctor'){
            get_template_part('toplist/toplist', 'doctor'); 
        }else{
            get_template_part('toplist/toplist', 'brand'); 
        }
    ?>
    <?php get_template_part('components/content', 'faq'); ?>
</main>
<?php
else :
    $id_post = get_the_ID();
    wb_set_post_view($id_post);
    ?>
        <main class="page-single">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="main-content-inner">
                            <div class="breadcrumb-nav">
                                <?php get_template_part('components/breadcrumb'); ?>
                            </div>
                            <h1 class="single-page-title"><?php the_title(); ?></h1>
                            <?php get_template_part('template-parts/single-postmeta', 'top'); ?>
                            <div class="entry" data-id="<?php echo get_the_ID(); ?>">
                                <?php the_content(); ?>
                            </div>
                            <?php 
                            get_template_part('template-parts/single-postmeta', 'bottom');
                            get_template_part('template-parts/single-boxauthor');
                            ?>
                        </div>
                        <?php if( comments_open() && (get_comments_number() > 0) ): ?>
                        <div class="comment-wrap" id="comment-top">
                            <?php comments_template(); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-4 sidebar">
                        <?php get_sidebar(); ?>
                    </div>
                </div>
            </div>
            <?php get_template_part('template-parts/related', 'other'); ?>
            <div class="container">
                <?php if( comments_open() && (get_comments_number() == 0) ): ?>
                <div class="comment-wrap" id="comment-top">
                    <?php comments_template(); ?>
                </div>
                <?php endif; ?>
                <?php get_template_part('template-parts/post', 'other'); ?>
            </div>
        </main>
    <?php
endif;
get_footer();