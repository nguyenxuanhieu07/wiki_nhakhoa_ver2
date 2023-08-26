<?php
get_header();
$post_id        = get_the_ID();
$introduce      = rwmb_meta('status-desc') ? rwmb_meta('status-desc') : '';
$ensign_title   = rwmb_meta('ensign_title') ? rwmb_meta('ensign_title') : '';
$ensign         = rwmb_meta('status-ensign-desc') ? rwmb_meta('status-ensign-desc') : '';
$solution_title = rwmb_meta('solution_title') ? rwmb_meta('solution_title') : '';
?>
<main class="status-single">
	<div class="breadcrumb-nav">
		<?php get_template_part('components/breadcrumb'); ?>
	</div>
	<section class="toc-top">
		<div class="container">
			<ul class="list-toc">
				<?php if ($introduce): ?>
					<li class="item "><a href="#gioi-thieu" class="smoothScroll">Giới thiệu</a></li>
				<?php endif; ?>
				<?php if ($ensign): ?>
					<li class="item "><a href="#dau-hieu" class="smoothScroll">Dấu hiệu</a></li>
				<?php endif; ?>
				<?php if ($solution_title): ?>
					<li class="item "><a href="#giai-phap" class="smoothScroll">Giải pháp</a></li>
				<?php endif; ?>
			</ul>
		</div>
	</section>
	<section class="status-content">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<h1 class="page-title">
						<?php echo get_the_title(); ?>
					</h1>
					<?php
					get_template_part('template-parts/single-boxauthor', 'top');
					?>
					<a href="#" id="gioi-thieu"></a>
					<?php echo $introduce; ?>
					<?php if ($ensign): ?>
						<h2 class="single-title">
							<a href="#" id="dau-hieu"></a>
							<?php echo $ensign_title; ?>
						</h2>
						<div class="single-signal">
							<?php echo $ensign; ?>
						</div>
					<?php endif; ?>
					<?php
					if ($solution_title):
						$args = array(
							'post_id' => $post_id
						);
						get_template_part('status/status', 'solution', $args);
					endif;
					?>

				</div>
				<div class="col-md-4 sidebar">
					<?php get_sidebar(); ?>
				</div>
			</div>
		</div>
	</section>
</main>
<?php
get_footer();