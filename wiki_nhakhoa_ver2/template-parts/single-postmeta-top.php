<?php 
$author_id = get_post_field ('post_author', get_the_ID());
$display_name = get_the_author_meta( 'display_name' , $author_id );
$post_id = get_the_ID();
$current_comment = get_comments_number($post_id);
?>
<div class="single-post-meta row align-items-center">
	<div class="col-md-6 align-items-center col-8 order-1">
		<div class="avartar">
			<?php echo get_avatar( get_the_author_meta( 'ID' ), 40); ?>
		</div>
		<div class="post-info">
			<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ); ?>" class="author-link" rel="author">
				<?php echo $display_name; ?>
			</a>
			<span class="update-time">
				<?php the_time( 'd/m/Y' ); ?> | <i class="fa fa-comment-o"
				aria-hidden="true"></i>
				<span class="number"> <?php echo $current_comment; ?></span> Bình luận
			</span>
		</div>
	</div>
	<div class="col-md-4 col-12 order-3 order-md-2">
		<div class="review">
			<?php 
			if(function_exists('kk_star_ratings')){
				echo kk_star_ratings();
			}
			?>
		</div>
	</div>
	<div class="col-md-2 col-4 order-2 order-md-3">
		<div class="d-flex post-action justify-content-end">
			<button class="btn btn-like-this">
				<i class="fa fa-bell-o" aria-hidden="true"></i>
			</button>
			<button class="btn btn-bookmark">
				<i class="fa fa-bookmark-o" aria-hidden="true"></i>
			</button>
		</div>
	</div>
</div>