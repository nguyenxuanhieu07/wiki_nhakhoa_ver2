<?php 
if(!is_single()):
	?>
	<div class="action-mobile d-flex d-sm-none d-md-none">
		<ul class="nav justify-content-between">
			<li class="nav-item btn-popular">
				<a class="nav-link" href="<?php echo get_home_url();?>">
					<i class="fa fa-home" aria-hidden="true"></i>
					<span>Trang chủ</span>
				</a>
			</li>
			<li class="nav-item btn-notif">
				<a href="/category/tin-tuc" class="button-wrap">
					<i class="fa fa-bell" aria-hidden="true"></i>
					<span>Tin tức</span>
				</a>
			</li>
			<li class="nav-item button-toggler-cat">
				<a class="nav-link" href="#">
					<i class="fa fa-bars" aria-hidden="true"></i>
					<span>Danh mục</span>
				</a>
			</li>
			<li class="nav-item extension">
				<span class="button-wrap btn-to-top">
					<i class="fa fa-angle-double-up" aria-hidden="true"></i>
					<span>Top</span>
				</span>
			</li>
		</ul>
	</div>
	<?php 
endif;
?>
<?php 
if(is_single()):
	?>
	<div class="action-share">
		<ul>
			<li class="facebook">
				<a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>" target="_blank">
					<span class="icon">
						<i class="fa fa-facebook" aria-hidden="true"></i>
					</span>Chia sẻ Facebook
				</a>
			</li>
			<li class="zalo">
				<a href="#">
					<span class="icon">
						<img src="<?php echo WIKI_URI;?>/images/icons/zalo_wicon.svg" alt="">
					</span>Chia sẻ Zalo
				</a>
			</li>
		</ul>
	</div>
	<div class="action-desktop d-none d-sm-block d-md-block">
		<ul class="nav justify-content-between">
			<li class="nav-item btn-home">
				<a class="nav-link" href="<?php echo get_home_url();?>">
					<i class="fa fa-home" aria-hidden="true"></i>
					<span>Trang chủ</span>
				</a>
			</li>
			<li class="nav-item btn-facebook">
				<a class="nav-link" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo get_the_permalink(); ?>" target="_blank">
					<i class="fa fa-facebook" aria-hidden="true"></i>
					<span>Chia sẻ</span>
				</a>
			</li>
			<li class="nav-item btn-comments">
				<a class="nav-link" href="#comments">
					<i class="fa fa-comments" aria-hidden="true"></i>
					<span>Bình luận</span>
					<?php 
					$current_post_id = get_the_ID();
					$comment_number  = get_comments_number( $current_post_id);
					echo '<span class="number">'.$comment_number.'</span>'
					?>
					
				</a>
			</li>
			<li class="nav-item extension">
				<span class="button-wrap btn-to-top">
					<i class="fa fa-angle-double-up" aria-hidden="true"></i>
					<span>Top</span>
				</span>
			</li>
		</ul>
	</div>
	<div class="action-mobile d-flex d-sm-none d-md-none">
		<ul class="nav justify-content-between">
			<li class="nav-item btn-share">
				<a class="nav-link" href="#">
					<i class="fa fa-share-alt" aria-hidden="true"></i>
					<span>Chia sẻ</span>
				</a>
			</li>
			<li class="nav-item btn-comments">
				<a class="nav-link" href="#comments">
					<i class="fa fa-comments" aria-hidden="true"></i>
					<span>Bình luận</span>
					<?php 
					$current_post_id = get_the_ID();
					$comment_number  = get_comments_number( $current_post_id);
					echo '<span class="number">'.$comment_number.'</span>'
					?>
				</a>
			</li>
			<li class="nav-item btn-notif">
				<a href="/category/tin-tuc" class="button-wrap">
					<i class="fa fa-bell" aria-hidden="true"></i>
					<span>Tin tức</span>
				</a>
			</li>
			<li class="nav-item button-support">
				<a class="nav-link" href="#">
					<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					<span>Tư vấn</span>
				</a>
			</li>
		</ul>
	</div>
	<?php
endif;
?>