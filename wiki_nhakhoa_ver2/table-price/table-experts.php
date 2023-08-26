<?php
$title        = $args['title'];
$id_service   = $args['id_service']->term_id;
$name_service = $args['id_service']->name;
$args_post    = array(
	'post_type'      => 'doctor',
	'post_status'    => 'publish',
	'posts_per_page' => 5,
	'order'          => 'desc',
	'orderby'        => 'meta_value_num',
	'meta_key'       => 'total-ratting-post',
	'meta_query'     => array(
		'relation' => 'AND',
		array(
			'key'     => 'expert-list-service',
			'value'   => $id_service,
			'compare' => 'like',
		)
	),
);
$list_post    = new WP_Query($args_post);
?>
<h2 class="single-title"><a href="#" id="experts"></a>
	<?php echo $title; ?>
</h2>
<div class="list-doctors-table">
	<?php
	if ($list_post->have_posts()) {
		$i = 1;
		while ($list_post->have_posts()):
			$list_post->the_post();
			$number_page = $list_post->max_num_pages;
			?>
			<div class="inner">
				<?php
				$args = array(
					'rank' => $i,
				);
				get_template_part('components/post', 'ranks', $args);
				?>
				<?php
				get_template_part('components/point', 'ranks');
				?>
			</div>
			<?php
			$i++;
		endwhile;
	}
	?>
	<?php
	if ($number_page > 1) {
		?>
		<div class="load-more" data-service="<?php echo $id_service; ?>">
			<a href="#" class="load-more-item">
				<i class="fa fa-angle-double-down fa-2x" aria-hidden="true"></i>
				<span>Xem thêm</span>
			</a>
		</div>
	<?php } ?>
	<div class="loader">
		<li class="ball"></li>
		<li class="ball"></li>
		<li class="ball"></li>
	</div>
</div>