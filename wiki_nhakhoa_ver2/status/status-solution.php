<?php
$post_id              = isset($args['post_id']) ? $args['post_id'] : 0;
$solution_title       = rwmb_meta('solution_title', '', $post_id) ? rwmb_meta('solution_title', '', $post_id) : '';
$status_solution_desc = rwmb_meta('status-solution-desc', '', $post_id) ? rwmb_meta('status-solution-desc', '', $post_id) : '';
$solution_service     = rwmb_meta('solution_service', '', $post_id) ? rwmb_meta('solution_service', '', $post_id) : '';
?>
<h2 class="single-title">
	<a href="#" id="giai-phap"></a>
	<?php echo $solution_title; ?>
</h2>
<div class="content-status">
	<?php echo $status_solution_desc; ?>
</div>
<div class="row list-suggest">
	<?php
	foreach ($solution_service as $key => $value) {
		$name       = $value->name;
		$term_image = get_term_meta($value->term_id, 'icon-service_cat', true);
		$url        = wp_get_attachment_url($term_image);
		$link       = get_term_link($value->term_id);
		?>
		<div class="col-md-3 suggest-item">
			<div class="inner">
				<a href="<?php echo $link; ?>" class="inner-img">
					<?php if ($url): ?>
						<img src="<?php echo $url; ?>" alt="">
					<?php endif; ?>
				</a>
				<p class="inner-title"><a href="<?php echo $link; ?>"><?php echo $name; ?></a></p>
			</div>
		</div>
		<?php
	}
	?>
</div>