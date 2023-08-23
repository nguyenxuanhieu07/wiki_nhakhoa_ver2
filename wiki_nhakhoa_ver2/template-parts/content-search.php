<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wiki_nhakhoa
 */

?>

<main class="page-archive">
	<div class="breadcrumb-nav">
		<?php get_template_part('components/breadcrumb'); ?>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<h1 class="archive-title"><?php printf( esc_html__( 'Kết quả tìm kiếm từ khóa: "%s"', 'wiki_nhakhoa' ), '<span>' . get_search_query() . '</span>' ); ?></h1>
				<?php 
				$allsearch = new WP_Query("s=$s&showposts=0");
				$number_post = $allsearch->found_posts;
				?>
				<div class="result-search">Có <strong><?php echo $number_post; ?> kết quả</strong> tìm thấy</div>
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
				<?php wiki_pagination($allsearch); ?>
			</div>
			<div class="col-md-4 d-none d-md-block d-sm-none sidebar">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</main>
