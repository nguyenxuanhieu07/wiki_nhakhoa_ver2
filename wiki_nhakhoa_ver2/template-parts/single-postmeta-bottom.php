<div class="single-post-meta-bottom">
	<div class="row align-items-center">
		<div class="col-md-6">
			<div class="update-time">
				Cập nhật lúc <?php echo get_the_modified_time('h:i - d/m/Y'); ?>
			</div>
		</div>
		<div class="col-md-6">
			<div class="list-social-page ml-auto">
				<span>Chia sẻ:</span>
				<ul class="">
					<li><a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"><i class="fa fa-facebook-official" aria-hidden="true"></i>
					</a></li>
					<li><a href="https://twitter.com/intent/tweet?status='<?php the_permalink(); ?>" target="_blank"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
					<li><a href="https://pinterest.com/pin/create/button?url=<?php the_permalink();?>&description=<?php the_title();?>" target="_blank"><i class="fa fa-pinterest-square" aria-hidden="true"></i>
					</a></li>
					<li><a href=""><i class="fa fa-instagram" aria-hidden="true"></i> </a></li>
					<li><a href=""><i class="fa fa-youtube-play" aria-hidden="true"></i> </a></li>
				</ul>
			</div>
		</div>
	</div>
</div>