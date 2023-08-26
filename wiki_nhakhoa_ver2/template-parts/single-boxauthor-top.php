<?php
$id_user_advise       = rwmb_meta('user-advise') ? rwmb_meta('user-advise') : '';
$data_user_advise     = get_userdata($id_user_advise)->data;
$id_user_censorship   = rwmb_meta('user-censorship') ? rwmb_meta('user-censorship') : '';
$data_user_censorship = get_userdata($id_user_censorship)->data;
?>
<div class="post-athour-top row">
	<div class="col-md-6">
		<div class="show-author">
			<a href="<?php echo get_edit_user_link($id_user_advise); ?>" class="author-img">
				<?php echo get_avatar($id_user_advise); ?>
			</a>
			<div class="author-content">
				<p class="item item-title">Nội dung được tham vấn bởi:</p>
				<p class="item item-name"><a href="<?php echo get_edit_user_link($id_user_advise); ?>"
						class="link"><?php echo $data_user_advise->display_name; ?></a></p>
			</div>
		</div>
	</div>
	<div class="col-md-6">
		<div class="show-author">
			<a href="<?php echo get_edit_user_link($id_user_censorship); ?>" class="author-img">
				<?php echo get_avatar($id_user_censorship); ?>
			</a>
			<div class="author-content">
				<p class="item item-title">NĐánh giá được kiểm duyệt bởi:</p>
				<p class="item item-name"><a href="<?php echo get_edit_user_link($id_user_censorship); ?>"
						class="link"><?php echo $data_user_censorship->display_name; ?></a></p>
			</div>
		</div>
	</div>
</div>