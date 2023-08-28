<section class="info-doctor info-brand">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="entry">
                    <?php get_template_part('single-brand/content-info'); ?>
                    <?php get_template_part('single-brand/content-license'); ?>
                    <?php get_template_part('single-brand/brand-certification'); ?>
                    <?php get_template_part('single-brand/list-service'); ?>
                    <?php get_template_part('single-brand/list-table-price'); ?>
                    <?php get_template_part('single-brand/list-basis'); ?>
                    <?php get_template_part('single-brand/list-insurance'); ?>
                    <?php get_template_part('single-brand/list-experst'); ?>
                    <?php get_template_part('single-brand/list-utilities'); ?>
                    
                    <h2 class="entry-title"><a href="#" id="danh-gia"></a>Đánh giá của khách hàng</h2>
                    <?php
                    // If comments are open or we have at least one comment, load up the comment template.
                    if (comments_open() || get_comments_number()) :
                        comments_template();
                    endif;
                    ?>
                </div>
            </div>
            <div class="col-md-4 sidebar">
                <?php get_sidebar(); ?>
            </div>
        </div>
    </div>
</section>