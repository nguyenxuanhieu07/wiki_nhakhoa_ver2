<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wiki_nhakhoa
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>
<div id="comments" class="comments-area clearfix  ">
<?php

if ( ! comments_open() && '0' != get_comments_number() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
<p class="no-comments"><?php _e( 'Comments are closed.', '_mbbasetheme' ); ?></p>
<?php endif; ?>
<?php
ob_start();
?>
	<h3 class="comment-title">Đánh giá trải nghiệm khám chữa của bạn với bác sĩ</h3>
	<?php get_template_part('components/rateting'); ?>
	<textarea class="form-control" id="comment" name="comment"
		placeholder="Mô tả chi tiết về trải nghiệm của bạn tại nha khoa" rows="5"
		aria-required="true"></textarea>
	
<?php 
$html = ob_get_clean();
$args = array(
	'fields' => apply_filters(
		'comment_form_default_fields', array(
			'author' =>'<div class="form-row">
				<div class="col-md-6">
					<input type="text" class="form-control ip-custom" placeholder="Họ tên *"
						name="author" required>
				</div>'
			,
			'numberphone' =>'<div class="col-md-6">
				<input type="text" class="form-control ip-custom"
					placeholder="Số điện thoại *" name="numberphone" required>
			</div>'
			,
			'email'  => '<div class="col-md-6">
				<input type="email" class="form-control ip-custom" placeholder="Email *"
					name="email" required>
			</div>',
			'address'  => '<div class="col-md-6">
				<input type="email" class="form-control ip-custom" placeholder="Địa chỉ *"
						name="address" required>
				</div>
			</div>',
			
		)
	),
	'comment_field' => $html,
	'comment_notes_after' => '',
	'title_reply' => '',
	'label_submit' => 'Gửi đánh giá',
	'title_reply_to'    => __( 'Trả lời %s' ),
	'cancel_reply_link' => __( 'Hủy trả lời' ),
);

comment_form($args);
?>
<?php if ( have_comments() ) : ?>
		<?php 
		$current_post_id = get_the_ID();
		$comment_number  = get_comments_number( $current_post_id);
		?>
		<h3 class="comment-section-title">Bình luận (<span style="color:#e54807;"><?php echo $comment_number; ?></span>)</h3>
		<a href="#" id="show-list-comment"></a>
		<ol class="comment-list">
			<?php
			wp_list_comments( array(
				'type'=>'comment',
				'style'      => 'ol',
				'short_ping' => true,
				'reply_text' =>'Trả lời',
				'callback' => 'wb_theme_comment',
				'avatar_size' =>50
			) );
			?>
		</ol><!-- .comment-list -->

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="comment-nav-below" class="comment-navigation" role="navigation">
			<h4 class="screen-reader-text"><?php _e( 'Xem thêm bình luận', '_mbbasetheme' ); ?></h4>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Bình luận cũ hơn', '_mbbasetheme' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Bình luận mới nhất &rarr;', '_mbbasetheme' ) ); ?></div>
		</nav>
	<?php endif;  ?>
<?php else: ?>
	<p class="response-none">Trở thành người đầu tiên bình luận cho bài viết này!</p>
<?php endif;  ?>
</div><!-- #comments -->