<?php 

function wiki_pagination($list_post = ''){
	?>
	<div class="pagination-nav">
		<ul class="pagination" role="navigation">
			<?php
			global $wp_query;
			$big = 999999999;
			echo paginate_links( array(
				'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				'format' => '?paged=%#%',
				'prev_text' => __('« Trước'),
				'next_text' => __('Sau »'),
				'current' => max( 1, get_query_var('paged') ),
				'total' => isset($list_post) ? $list_post->max_num_pages : $wp_query->max_num_pages,
				'prev_next' => true,
			) );
			?>
		</ul>
	</div>
	<?php
}

if(!function_exists('caculate_total_post')){
	function caculate_total_post($type,$post_id){
		switch ($type) {
			case 'doctor':
				$expert_custom_number = get_post_meta( $post_id, 'expert-custom-number', true ) ? get_post_meta( $post_id, 'expert-custom-number', true ) :'' ;
				$expert_custom_number_wiki = get_post_meta( $post_id, 'expert-custom-number-wiki', true ) ? get_post_meta( $post_id, 'expert-custom-number-wiki', true ) : '';
				$exp = get_post_meta( $post_id, 'expert-exp', true ) ? get_post_meta( $post_id, 'expert-exp', true ) : '';
				$total_ratting_wiki = ( (int) $expert_custom_number * 0.4 + (int) $expert_custom_number_wiki * 0.3 + (int) $exp * 0.3 ) / 10 ;
				$total_ratting_customer = get_total_comment_post($post_id);
				$number_star = get_star_post($post_id,true);
				$total_post = $total_ratting_wiki * 0.4 +  ($total_ratting_customer + $number_star ) * 0.6 ;
				$total_post = !is_nan($total_post) ? round($total_post,1) : 0;
				update_post_meta( $post_id, 'total-ratting-post', $total_post );
				break;
			default:
				$list_brand = get_post_meta( $post_id, 'list-address-brand', true ) ? get_post_meta( $post_id, 'list-address-brand', true ) : [];
				$brand_custom_number_wiki = get_post_meta( $post_id, 'brand-custom-number-wiki', true ) ? get_post_meta( $post_id, 'brand-custom-number-wiki', true ) : '';
				$brand_custom_number = get_post_meta( $post_id, 'brand-custom-number', true ) ? get_post_meta( $post_id, 'brand-custom-number', true ) : '';
				$total_ratting_wiki = ( count($list_brand)  * 0.3 + (int) $brand_custom_number * 0.4 + (int) $brand_custom_number_wiki * 0.3 ) / 10 ;
				$total_ratting_customer = get_total_comment_post($post_id);
				$number_star = get_star_post($post_id,true);
				$total_post = $total_ratting_wiki * 0.4 + ($total_ratting_customer+ $number_star) * 0.6;
				$total_post = !is_nan($total_post) ? round($total_post,1) : 0;
				update_post_meta( $post_id, 'total-ratting-post', $total_post );
				break;
		}
	}
}
if(!function_exists('wiki_update_star_comment')){
	function wiki_update_star_comment($type,$number_star,$post_id){
		if($type == 'approved') {
			if( 4 <= $number_star){
				$status = get_post_meta( $post_id, 'comment-good', true ) ? get_post_meta( $post_id, 'comment-good', true ) : 0 ;
				update_post_meta($post_id,'comment-good',$status + 1);
			}elseif($number_star >= 3 && $number_star < 4 ){
				$status = get_post_meta( $post_id, 'comment-rather', true ) ? get_post_meta( $post_id, 'comment-rather', true ) : 0 ;
				update_post_meta($post_id,'comment-rather',$status + 1);
			}else{
				$status = get_post_meta( $post_id, 'comment-bad', true ) ? get_post_meta( $post_id, 'comment-bad', true ) : 0 ;
				update_post_meta($post_id,'comment-bad',$status + 1);
			}
		}
		if($type == 'unapproved' || $type ==  'trash'){
			if( 4 <= $number_star){
				$status = get_post_meta( $post_id, 'comment-good', true ) ? get_post_meta( $post_id, 'comment-good', true ) : 0 ;
				update_post_meta($post_id,'comment-good',$status - 1);
			}elseif($number_star == 3){
				$status = get_post_meta( $post_id, 'comment-rather', true ) ? get_post_meta( $post_id, 'comment-rather', true ) : 0 ;
				update_post_meta($post_id,'comment-rather',$status - 1);
			}else{
				$status = get_post_meta( $post_id, 'comment-bad', true ) ? get_post_meta( $post_id, 'comment-bad', true ) : 0 ;
				update_post_meta($post_id,'comment-bad',$status - 1);
			}
		}
		$post_type = get_post_type($post_id);
		caculate_total_post($post_type,$post_id);
	}
}
if(!function_exists('get_total_comment_post')){
	function get_total_comment_post($post_id){
		 $args = array(
			'post_id' => $post_id,
			'fields'  => 'ids',
			'status' => 'approve',
		);
		$comment_ids = get_comments( $args );
		$count_comment = count($comment_ids);
		$total_ratting = 0;
		foreach ($comment_ids as $key => $value) {
			$point = get_comment_meta($value,'total-ratting-comment',true) ? get_comment_meta($value,'total-ratting-comment',true) : 0;
			$total_ratting += $point;
		}
		if($count_comment > 0) {
			$total_ratting = $total_ratting / $count_comment;
		}
		return $total_ratting;
	}
}

if(!function_exists('wiki_post_excerpt')){
	function wiki_post_excerpt($number_word){
		$post_excerpt = get_the_content();
		if(str_word_count($post_excerpt) > $number_word){
			$post_excerpt = wp_trim_words($post_excerpt,$number_word,'...');
		}
		return $post_excerpt;
	}
}


function random_post_view(){
	$views = mt_rand(1000, 50000);
	return $views;
}
function wb_set_post_view($postID) {
	$count_key = 'wb-post-views';
	$count = get_post_meta($postID, $count_key, true);
	if($count==''){
		$count = 0;
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, random_post_view());
	}else{
		$count++;
		update_post_meta($postID, $count_key, $count);
	}
}
function wb_get_post_view($postID){
	$count_key = 'wb-post-views';
	$count = get_post_meta($postID, $count_key, true);
	if($count==''){
		delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '2');
		return "2";
	}
	return $count;
}
if(!function_exists('get_star_post')){
	function get_star_post($post_id,$caculate = false){
		$comments = get_comments(array(
	        'post_id' => $post_id,
	        'status' => 'all', // Lấy cả comment đã xuất bản và chưa xuất bản
	    ));
	    $total = 0;
	    // Xóa các comment của bài viết
	    if ($comments) {
	        foreach ($comments as $comment) {
	            $comment_ID = $comment->comment_ID;
	            $number_star =  get_comment_meta($comment_ID,'comment-total',true) ? get_comment_meta($comment_ID,'comment-total',true) : 0;
	            if(!$caculate){
		           $total += $number_star;
	            }else{
	            	if($number_star == 5){
	            		$total += 2;
	            	}elseif($number_star == 4){
	            		$total += 1;
	            	}elseif($number_star == 3){
	            		$total += 0;
	            	}elseif($number_star == 2){
	            		$total -=  1;	
	            	}else{
	            		$total -=  2;	
	            	}
	            }
	        }
	    }
	    if($total > 0){
	    	if(!$caculate){
	    		$total = round($total / count($comments), 1);
	    	}
	    }
	    return $total;
	}
}

if(!function_exists('reset_post_meta')){
	function reset_post_meta(){
		$args = array(
		    'post_type' => 'doctor', // Thay 'custom_post_type' bằng tên post type custom của bạn
		    'posts_per_page' => -1, // Lấy tất cả các bài viết
		);

		$custom_posts = get_posts($args);
		foreach ($custom_posts as $post) {
			$post_id = $post->ID;
			caculate_total_post('doctor',$post_id);
			update_post_meta($post_id,'comment-good',0);
			update_post_meta($post_id,'comment-rather',0);
			update_post_meta($post_id,'comment-bad',0);
			$comments = get_comments(array(
			    'post_id' => $post_id,
			    'status' => 'all', // Lấy cả comment đã xuất bản và chưa xuất bản
			));

			// Xóa các comment của bài viết
			if ($comments) {
			    foreach ($comments as $comment) {
			        wp_delete_comment($comment->comment_ID, true); // Tham số thứ hai là true để xóa vĩnh viễn, false để chuyển comment vào thùng rác
			    }
			}
		}
	}
	// reset_post_meta();
}

