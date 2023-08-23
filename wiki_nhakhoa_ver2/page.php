<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wiki_nhakhoa
 */

get_header();
?>
<main class="page-single">
	<div class="breadcrumb-nav">
		<?php get_template_part('components/breadcrumb'); ?>
	</div>
	<div class="container">
		<div class="row">
			<div class="main-content-inner col-md-8">
				<h1 class="single-page-title"><?php the_title(); ?></h1>
				<?php get_template_part('template-parts/single-postmeta', 'top'); ?>
				<div class="entry">
					<?php the_content(); ?>
				</div>
				<?php 
					get_template_part('template-parts/single-postmeta', 'bottom');
					get_template_part('template-parts/single-boxauthor');
				?>
			</div>
			<div class="col-md-4 sidebar">
				<?php get_sidebar(); ?>
			</div>
		</div>
		
	</div>
</main>

<?php
get_footer();
