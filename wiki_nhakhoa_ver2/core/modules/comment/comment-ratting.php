<?php
if( !function_exists('wiki_add_value_ratting')){
	function wiki_add_value_ratting( $comment_ID, $comment_approved ) {
		$post_id = $_POST['comment_post_ID'];
		if(isset($_POST['check_ratting']) && $_POST['check_ratting']){
			$type = $_POST['check_ratting'];
			$option = get_option($_POST['check_ratting'].'_setting');
			$evaluation = $option[$_POST['check_ratting'].'-evaluation-criteria'];
			$star = 0;
			$number_star = count($evaluation);
			foreach ($evaluation as $key => $value) {
				$star += (int) $_POST['criteria-'.$key];
				update_comment_meta($comment_ID,'criteria-'.$key,$_POST['criteria-'.$key]);
			}

			$total_star = ($star / $number_star);
			$total = $total_star * 10;
			update_comment_meta($comment_ID,'comment-total',$total_star);
			update_comment_meta($comment_ID,'total-ratting-comment',$total);
			if($comment_approved){
				wiki_update_star_comment('approved',$total_star,$post_id);
			}
		}
	}
}
add_action( 'comment_post', 'wiki_add_value_ratting', 10, 2 );

add_action('transition_comment_status', 'my_approve_comment_callback', 10, 3);
function my_approve_comment_callback($new_status, $old_status, $comment) {
	$post_id = $comment->comment_post_ID;
	$comment_id = $comment->comment_ID;
	$total_star = get_comment_meta( $comment_id, 'comment-total', true ) ? get_comment_meta( $comment_id, 'comment-total', true ) : 0 ;
	wiki_update_star_comment($new_status,$total_star,$post_id);
}