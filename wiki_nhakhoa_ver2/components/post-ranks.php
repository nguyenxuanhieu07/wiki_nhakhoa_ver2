<?php
$rank = isset($args['rank']) ? $args['rank'] : 0;
$name_service = isset($args['id_service']) ? $args['id_service']->name : '';
$show_more = isset($args['link']) ? $args['link'] : '';
if (!$name_service) {
	$primary_service = rwmb_meta('expert-list-service') ? rwmb_meta('expert-list-service') : '';
	$name_service = $primary_service ? $primary_service[0]->name : '';
}
$post_id = get_the_ID();
$name = rwmb_meta('expert-name') ? rwmb_meta('expert-name') : get_the_title();
$chuc_vu = rwmb_meta('expert-office') ? rwmb_meta('expert-office') : [];
$chuc_vu = implode(",", $chuc_vu);
$exp = rwmb_meta('expert-exp') ? rwmb_meta('expert-exp') : '';
$expert_custom_number = rwmb_meta('expert-custom-number') ? rwmb_meta('expert-custom-number') : '';
$expert_custom_number_wiki = rwmb_meta('expert-custom-number-wiki') ? rwmb_meta('expert-custom-number-wiki') : '';
$get_comments_number = get_comments_number($post_id);
$star_post = get_star_post($post_id);
?>
<div class="post-ranks">
	<a href="<?php the_permalink($post_id); ?>" class="post-thumbnail">
		<?php the_post_thumbnail($post_id, 'thumbnail'); ?>
		<?php
		if ($rank) {
		?>
			<span class="number-rank">#<span class="number">
					<?php echo $rank; ?>
				</span></span>
		<?php } ?>
	</a>
	<div class="post-meta">
		<?php
		if (is_singular('doctor')) :
		?>
			<h1 class="post-name"><a href="<?php the_permalink($post_id); ?>" class="link"><?php echo $name; ?></a></h1>
		<?php
		else :
		?>
			<h3 class="post-name">
				<a href="<?php the_permalink($post_id); ?>" class="link"><?php echo $name; ?></a>
				<?php if (is_archive()) : ?>
					<img src="<?php echo THEME_URI; ?>/images/check.png" alt="">
				<?php endif; ?>
			</h3>
		<?php endif; ?>
		<p class="post-academic">
			<?php echo $chuc_vu; ?>
		</p>
		<div class="info">
			<p class="post-service"><b>Dịch vụ: </b>
				<?php echo $name_service; ?>
			</p>
			<p class="post-exp mr-b"><b>Kinh nghiệm: </b>
				<?php echo $exp; ?>
			</p>
			<ul class="list-more">
				<li class="item i-star b-right">
					<span class="number">
						<?php echo $star_post; ?>
					</span>
					<i class="fa fa-star"></i>
				</li>
				<li class="item">
					<span class="number">
						<?php $get_comments_number; ?>
					</span>
					<span> Đánh giá</span>
				</li>
				<li class="item">
					<span class="number">
						<?php echo $expert_custom_number; ?>
					</span>
					<span> Khách hàng sử dụng
						<?php echo $name_service; ?> mỗi tháng
					</span>
				</li>
				<li class="item">
					<span class="number">
						<?php echo $expert_custom_number_wiki; ?>
					</span>
					<span> Khách hàng đặt lịch khám qua Wiki Nha Khoa</span>
				</li>
			</ul>
		</div>
		<?php if ($show_more) : ?>
			<a href="<?php the_permalink($post_id); ?>" class="post-link-more">Xem chi tiết</a>
		<?php endif; ?>
	</div>
</div>