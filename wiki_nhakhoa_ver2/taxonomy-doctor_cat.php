<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package wiki_nhakhoa
 */

get_header();

?>
<main class="specialist">
    <div class="breadcrumb-nav">
        <?php get_template_part('components/breadcrumb'); ?>
        <section class="specialist-content">
            <div class="container">
                <div class="entry">
                    <?php 
                        $term_id = get_queried_object()->term_id;
                        $term = get_term( $term_id, 'doctor_cat' );
                        $list_service = rwmb_get_value( 'doctor-cat-list-service', ['object_type' => 'term'],  $term_id );
                    ?>
                    <h1 class="page-title">Chuyên khoa <span class="span"><?php echo single_cat_title('' , true ); ?></span></h1>
                    <div class="entry-content">
                        <h2 class="entry-title">Giới thiệu</h2>
                        <p>
                          <?php echo $term->description; ?>
                        </p>
                    </div>
                    <div class="entry-content">
                        <h2 class="entry-title">Dịch vụ nha <?php echo single_cat_title('' , true ); ?></h2>
                            <div class="row list-service">
                        <?php 
                            foreach ($list_service as $key => $value) {
                                $images = rwmb_meta('icon-service_cat', array( 'object_type' => 'term' ), $value->term_id );
                                $link = get_term_link($value->term_id);
                                foreach($images as $vl_images){
                                    $url_img = $vl_images['full_url'];
                                }
                        ?>
                            <div class="col-md-4">
                                <div class="inner">
                                    <a href="<?php echo $link; ?>" class="service-link <?php if(!$url_img) echo 'd-none'; ?>">
                                        <img class="img" src="<?php echo $url_img; ?>" alt=""></a>
                                    <a href="<?php echo $link; ?>" class=""><h3 class="title"><?php echo $value->name; ?></h3></a>
                                </div>
                            </div>
                        <?php
                            }
                        ?>
                            </div>
                    </div>
                    <div class="entry-content">
                        <h2 class="entry-title ">Danh sách bác sĩ <?php echo single_cat_title('' , true ); ?></h2>
                        <div class="row list-doctor">
                            <?php 
                                $args = array(
                                    'post_type' => 'doctor',
                                    'post_status'   => 'publish',
                                    'posts_per_page' => 10,
                                    'order'        => 'desc',
                                    'orderby'        => 'date',
                                    'tax_query' => array(
                                        array(
                                            'taxonomy'  => 'doctor_cat',
                                            'field'     => 'id',
                                            'terms'     => $term_id,
                                        ),
                                    ),
                                );
                                $list_post = new WP_Query($args);
                                if($list_post->have_posts()) {
                                while($list_post->have_posts()) : $list_post->the_post();
                                ?>
                                    <div class="col-md-6">
                                        <?php get_template_part('components/post','ranks'); ?>
                                    </div>
                                <?php
                                endwhile;
                                wp_reset_postdata(); 
                            }
                            ?>
                        </div>
                    </div>            
                    <div class="entry-content">
                        <h2 class="entry-title">Danh sách cơ sở nha khoa chỉnh hình</h2>
                        <div class="row list-brand">
                            <?php 
                                $args = array(
                                    'post_type' => 'brand',
                                    'post_status'   => 'publish',
                                    'posts_per_page' => 10,
                                    'order'        => 'desc',
                                    'orderby'        => 'date',
                                    'meta_query' => array(
                                        array(
                                            'key'  => 'brand-list-specical',
                                            'compare'  => 'LIKE',
                                            'value'     => $term_id,
                                        ),
                                    ),
                                );
                                $list_post = new WP_Query($args);
                                if($list_post->have_posts()) {
                                while($list_post->have_posts()) : $list_post->the_post();
                                ?>
                                    <div class="col-md-3 brand-item">
                                        <?php get_template_part('components/post-ranks','brand'); ?>
                                    </div>
                                <?php
                                endwhile;
                                wp_reset_postdata(); 
                            }
                            ?>
                        </div>
                    </div>        
                </div>
            </div>
        </section>
    </div>
</main>
<?php get_footer();
