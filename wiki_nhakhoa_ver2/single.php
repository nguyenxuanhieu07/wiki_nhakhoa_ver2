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
$id_post = get_the_ID();
wb_set_post_view($id_post);

?>
<main class="page-single">
	<div class="breadcrumb-nav">
		<?php get_template_part('components/breadcrumb'); ?>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<div class="main-content-inner">
					<?php
					$enable_ads_top_post = rwmb_meta('enable_ads_top_post');
					if($enable_ads_top_post == ''){
						$enable_ads_top_post = true;
					}
					if($enable_ads_top_post){
						if(shortcode_exists('ads_top_post')){
							echo do_shortcode('[ads_top_post]');
						}
					}
					?>
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
				<?php
				$enable_ads_after_post = rwmb_meta('enable_ads_after_post');
				if($enable_ads_after_post == ''){
					$enable_ads_after_post = true;
				}
				if($enable_ads_after_post){
					if(shortcode_exists('ads_after_post')){
						echo do_shortcode('[ads_after_post]');
					}
				}

				?>
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
<?php //get_template_part('template-parts/post', 'other'); ?>
</div>
</main>
<?php
get_footer();
