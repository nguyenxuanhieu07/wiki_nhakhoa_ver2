<?php 
function wb_theme_comment($comment, $args, $depth) {
	if ( 'div' === $args['style'] ) {
		$tag       = 'div';
		$add_below = 'comment';
	} else {
		$tag       = 'li';
		$add_below = 'div-comment';
	}
	?>
	<<?php echo $tag." ";  comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID() ?>">
	<?php
	if ( 'div' != $args['style'] ) { ?>
		<div id="div-comment-<?php comment_ID() ?>" class="comment-body"><?php
	} 
	?>
	<div class="comment-author vcard">
		<?php
		if ( $args['avatar_size'] != 0 ) {
			echo get_avatar( $comment, $args['avatar_size'] );
		}
		printf( __( '<b class="fn">%s</b>' ), get_comment_author_link() ); 
		$total = get_comment_meta($comment->comment_ID,'comment-total',true) ? get_comment_meta($comment->comment_ID,'comment-total',true) : '0';
		if($total){
		?>
		<span class="list-star">
			<?php 
				for ($i=1; $i <= 5; $i++) {  
				$class = '';
				if($i <= $total){
					$class = 'active';
				}
			?>
				<i class="fa fa-star <?php echo $class ?>" aria-hidden="true"></i>
			<?php } ?>
		</span>
		<?php } ?>
		<!-- <span class="reply"> -->
			<?php
			// comment_reply_link(
			// 	array_merge(
			// 		$args,
			// 		array(
			// 			'add_below' => $add_below,
			// 			'depth'     => $depth,
			// 			'max_depth' => $args['max_depth'],
			// 			'reply_text' =>'Trả lời',
			// 		)
			// 	)
			// );
			?>
		<!-- </span> -->
		<!-- <span class="like-comment">
			<svg xmlns="http://www.w3.org/2000/svg" width="15.29" height="14.021" viewBox="0 0 15.29 14.021">
				<g id="Group_2" data-name="Group 2" transform="translate(452.696 229.793)">
					<path id="Path_8" data-name="Path 8" d="M-452.7-65.62a1.7,1.7,0,0,1,.334-.685,1.576,1.576,0,0,1,1.193-.558c.955-.012,1.911,0,2.867,0a.431.431,0,0,1,.057.009c0,.047.007.095.007.142q0,3.471,0,6.942a.211.211,0,0,1-.132.216,1.69,1.69,0,0,1-.778.206c-.667,0-1.334.01-2,0a1.531,1.531,0,0,1-1.523-1.189.327.327,0,0,0-.026-.061Z" transform="translate(0 -156.424)"></path>
					<path id="Path_9" data-name="Path 9" d="M-320.323-224.7h.192q1.829,0,3.657,0a1.742,1.742,0,0,1,1.264.478,1.55,1.55,0,0,1,.168,2.064c-.03.04-.06.079-.09.117a1.447,1.447,0,0,1-.365,2.284,1.464,1.464,0,0,1-.645,1.92,1.443,1.443,0,0,1,.119.871,1.447,1.447,0,0,1-1.441,1.188c-.94.006-1.881,0-2.821,0q-1.493,0-2.986,0a4.1,4.1,0,0,1-1.522-.32.168.168,0,0,1-.126-.184c0-2.19,0-4.38.007-6.57a.688.688,0,0,1,.1-.243c.089-.194.179-.388.269-.582.49-1.06.981-2.12,1.466-3.182a.793.793,0,0,0,.067-.314c.006-.632.008-1.264,0-1.9a.432.432,0,0,1,.23-.416,2.251,2.251,0,0,1,.806-.3,1.251,1.251,0,0,1,1.012.3,2.859,2.859,0,0,1,1.115,2.668,9.993,9.993,0,0,1-.423,1.919C-320.286-224.831-320.3-224.775-320.323-224.7Z" transform="translate(-122.68 0)"></path>
				</g>
			</svg>
			Thích
		</span> -->
	</div>
	<?php
	if ( $comment->comment_approved == '0' ) { ?>
		<em class="comment-awaiting-moderation"><?php _e( 'Bình luận của bạn đang được chờ duyệt.' ); ?></em><br/><?php
	} 
	// echo '<pre>';
	// print_r($comment);
	// echo'</pre>';
	?>
	<div class="info">
		<span class="info-item d-none">Hà Nội</span>
		<span class="info-item"><?php echo $comment->comment_date; ?></span>
		<span class="info-item accuracy"><img
				src="<?php echo THEME_URI ?>/images/icons/shield-check.svg" alt=""> Khách hàng đã
			được xác thực</span>
	</div>
	<div class="comment-meta commentmetadata">
		<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
		</a>
		<?php    
		edit_comment_link( __( '(Sửa)' ), '  ', '' );
		?>
	</div>
	<?php 
	comment_text();
	edit_comment_link( __( 'Sửa bình luận', 'wb' ), '<p>', '</p>' );
	if ( 'div' != $args['style'] ){
		echo "</div>";
	}
}

