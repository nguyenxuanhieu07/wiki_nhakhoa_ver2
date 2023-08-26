<?php
get_header();
$post_id             = get_the_ID();
$name_post           = rwmb_meta('table-price-name') ? rwmb_meta('table-price-name') : get_the_title();
$introduce           = rwmb_meta('table-price-desc') ? rwmb_meta('table-price-desc') : '';
$service_table       = rwmb_meta('table_service') ? rwmb_meta('table_service') : [];
$table_price         = rwmb_meta('table-price-group') ? rwmb_meta('table-price-group') : [];
$title_table         = rwmb_meta('table_title') ? rwmb_meta('table_title') : '';
$factor_table        = rwmb_meta('factors-group') ? rwmb_meta('factors-group') : [];
$factor_title        = rwmb_meta('factors_title') ? rwmb_meta('factors_title') : '';
$table_brands        = rwmb_meta('table_brands') ? rwmb_meta('table_brands') : '';
$table_brands_title  = rwmb_meta('brands_title') ? rwmb_meta('brands_title') : '';
$table_experts_title = rwmb_meta('experts_title') ? rwmb_meta('experts_title') : '';
$content_bottom      = rwmb_meta('table-price-bottom') ? rwmb_meta('table-price-bottom') : '';
$faq                 = rwmb_meta('toplist-faq') ? rwmb_meta('toplist-faq') : [];
?>
<main class="table-price-single">
	<div class="breadcrumb-nav">
		<?php get_template_part('components/breadcrumb'); ?>
	</div>
	<section class="toc-top">
		<div class="container">
			<ul class="list-toc">
				<?php if ($introduce): ?>
					<li class="item "><a href="#gioi-thieu" class="smoothScroll">Giới thiệu</a></li>
				<?php endif; ?>
				<?php if (!empty($table_price)): ?>
					<li class="item "><a href="#bang-gia" class="smoothScroll">Bảng giá</a></li>
				<?php endif; ?>
				<?php if (!empty($factor_table)): ?>
					<li class="item "><a href="#yeu-to" class="smoothScroll">Các yếu tố</a></li>
				<?php endif; ?>
				<?php if (!empty($table_brands)): ?>
					<li class="item "><a href="#bang-gia-co-so" class="smoothScroll">Bảng giá các cơ sở</a></li>
				<?php endif; ?>
				<?php if ($table_experts_title): ?>
					<li class="item "><a href="#experts" class="smoothScroll">Danh sách bác sĩ</a></li>
				<?php endif; ?>
				<?php if (!empty($faq)): ?>
					<li class="item "><a href="#faq" class="smoothScroll">FAQ</a></li>
				<?php endif; ?>
			</ul>
		</div>
	</section>
	<section class="page-content">
		<div class="container">
			<div class="row">
				<div class="col-md-8">
					<h1 class="page-title">
						<?php echo $name_post; ?>
					</h1>
					<div class="entry-tableprice">
						<a href="#" id="gioi-thieu"></a>
						<?php echo $introduce; ?>
						<?php
						if (!empty($table_price)):
							$args = array(
								'data'  => $table_price,
								'name'  => $service_table,
								'title' => $title_table
							);
							get_template_part('table-price/table', 'price', $args);
						endif;
						?>
						<?php
						if (!empty($factor_table)):
							$args = array(
								'data'  => $factor_table,
								'title' => $factor_title
							);
							get_template_part('table-price/table', 'factors', $args);
						endif;
						?>
						<?php
						if (!empty($table_brands)):
							$args = array(
								'data'       => $table_brands,
								'title'      => $table_brands_title,
								'id_service' => $service_table
							);
							get_template_part('table-price/table', 'brands', $args);
						endif;
						?>
						<?php
						if ($table_experts_title):
							$args = array(
								'title'      => $table_experts_title,
								'id_service' => $service_table
							);
							get_template_part('table-price/table', 'experts', $args);
						endif;
						?>
						<?php
						if ($content_bottom) {
							?>
							<div class="content-bottom">
								<?php echo $content_bottom; ?>
							</div>
						<?php } ?>
						<?php
						if (!empty($faq)) {
							$args = array(
								'data'      => $faq,
							);
							get_template_part('components/content', 'faq', $args);
						}
						?>
					</div>
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