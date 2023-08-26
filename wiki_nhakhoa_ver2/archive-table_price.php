<?php get_header(); ?>
<?php
$options = get_option('table_setting');
?>
<main class="page-archive table-price">
	<section class="archive-banner d-none d-md-block">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-text">
					<h1 class="archive-title">
						<span class="title-child">Tổng hợp và so sánh</span>
						CHI PHÍ dịch vụ nha khoa
					</h1>
				</div>
			</div>
		</div>
	</section>
	<div class="breadcrumb-nav">
		<?php get_template_part('components/breadcrumb'); ?>
	</div>
	<section class="archive-content">
		<div class="container">
			<h2 class="single-title">
				<?php echo $options['table_setting_title']; ?>
			</h2>
			<div class="entry-archive">
				<?php echo $options['table-setting-desc']; ?>
			</div>
			<div class="list-tableprice row">
				<?php
				$args      = array(
					'post_type'      => 'table_price',
					'post_status'    => 'publish',
					'posts_per_page' => -1,
					'order'          => 'desc',
				);
				$list_post = new WP_Query($args);
				if ($list_post->have_posts()) {
					while ($list_post->have_posts()):
						$list_post->the_post();
						$post_id   = get_the_ID();
						$introduce = rwmb_meta('table-price-desc') ? rwmb_meta('table-price-desc') : '';
						$name_post = rwmb_meta('table-price-name') ? rwmb_meta('table-price-name') : get_the_title();
						?>
						<div class="col-md-4 tableprice-item">
							<div class="inner">
								<a href="<?php the_permalink($post_id); ?>" class="inner-img">
									<?php the_post_thumbnail($post_id, 'thumbnail'); ?>
								</a>
								<h3 class="inner-title text-center"><a href="#" class="title-link">
										<?php echo $name_post; ?>
									</a></h3>
								<div class="inner-desc">
									<?php echo $introduce; ?>
								</div>
								<div class="inner-btn">
									<a href="<?php the_permalink($post_id); ?>" class="link-more">Xem chi tiết</a>
								</div>
							</div>
						</div>
						<?php
					endwhile;
				} else {
					get_template_part('template-parts/content', 'none');
				}
				?>
			</div>
		</div>
	</section>
</main>
<?php get_footer(); ?>