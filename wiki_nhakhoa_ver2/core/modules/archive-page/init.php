<?php

function wiki_archive_query($query) {
    if (!is_admin() && is_archive() && $query->is_main_query() && isset($query->query['post_type']) && ($query->query['post_type'] == 'doctor' || $query->query['post_type'] == 'brand' )) {
    	$arrange = isset($_GET['arrange']) ? $_GET['arrange'] : 'DESC';
        $query->set('posts_per_page', 10);
		$query->set('meta_key', 'total-ratting-post');
		$query->set('orderby', 'meta_value_num');
        if($arrange == 'new'){
        	$query->set('orderby', 'date');
        	$arrange = 'desc';
        }
        $query->set('order', $arrange);
    }
}
add_action('pre_get_posts', 'wiki_archive_query');

if(!function_exists('wiki_ajax_get_post')){
	function wiki_ajax_get_post(){
		if( isset($_POST['post-type']) && $_POST['post-type'] != '' && ($_POST['post-type'] == 'doctor' || $_POST['post-type'] == 'brand' )){
			$arrange = isset($_POST['arrange']) ? $_POST['arrange'] : 'desc';
			$post_type = $_POST['post-type'];
			$posts_per_page = $_POST['posts_per_page'] ? $_POST['posts_per_page'] : 1;
			$number_page = $_POST['number_page'] ? $_POST['number_page'] : 1;
			$posts_per_page_new = $posts_per_page + 10;
			$page_load =  $_POST['page_load'] ? $_POST['page_load'] : 1;
			$page_load_new = $page_load + 1;
			$order_by = 'meta_value_num';
			if($arrange == 'new'){
				$order_by = 'date';
			}
			$args = array(
				'post_type'	=> $post_type,
				'post_status'	=> 'publish',
				'order'        => $arrange,
				'orderby'        => $order_by,
				'posts_per_page' => $posts_per_page_new,
 				'meta_key' => 'total-ratting-post',
			);
			$list_doctor = new WP_Query($args);
			ob_start();
			?>
				<?php if ( $list_doctor->have_posts() ) : ?>
                    <?php 
					$i = 1;
					
					while ( $list_doctor->have_posts() ) : $list_doctor->the_post();
					$args = array( 'key' => $i );
					?>

                <div class="item-doctor">
					<?php if($post_type == 'doctor'): ?>
					<?php get_template_part('components/post','rank',$args); ?>
					<?php else: ?>
					<?php get_template_part('components/post','brand',$args); ?>
					<?php endif; ?>
					<?php
						$post_id = get_the_ID(); 
						$total_ratting_comment = get_post_meta( $post_id, 'total-ratting-post', true ) ? get_post_meta( $post_id, 'total-ratting-post', true ) : 0;
						$status_good = get_post_meta( $post_id, 'comment-good', true ) ? get_post_meta( $post_id, 'comment-good', true ) : 0 ;
						$status_rather = get_post_meta( $post_id, 'comment-rather', true ) ? get_post_meta( $post_id, 'comment-rather', true ) : 0 ;
						$status_bad = get_post_meta( $post_id, 'comment-bad', true ) ? get_post_meta( $post_id, 'comment-bad', true ) : 0 ;
					?>
					<div class="inner-rank">
						<span class="rank-point">Điểm đánh giá : <?php echo $total_ratting_comment; ?></span>
						<ul class="list-status">
							<li class="item good" data-status="good"><i class="fa fa-circle" aria-hidden="true" ></i>Tốt <span
									class="number">(<?php echo $status_good; ?>)</span>
							</li>
							<li class="item rather" data-status="rather"><i class="fa fa-circle" aria-hidden="true" ></i>khá <span
									class="number">(<?php echo $status_rather; ?>)</span>
							</li>
							<li class="item bad"  data-status="bad"><i class="fa fa-circle" aria-hidden="true"></i>Cần cải
								thiện <span class="number">(<?php echo $status_bad; ?>)</span></li>
							<input type="text"  class="post-id-cmt" value="<?php echo $post_id; ?>" hidden>
						</ul>
					</div>
				</div>
				
                <?php 
					$i++; 
				endwhile; 
				wp_reset_postdata();
				?>
                <div class="load-more <?php if($list_doctor->max_num_pages == 1) echo 'd-none'; ?>" data-number="<?php echo $number_page;?>" data-load="<?php echo $page_load_new; ?>">
                    <a href="#" class="load-more-item">
                        <i class="fa fa-angle-double-down fa-2x" aria-hidden="true"></i>
                        <span>Xem thêm</span>
                    </a>
                </div>
                <div class="loader">
                  <li class="ball"></li>
                  <li class="ball"></li>
                  <li class="ball"></li>
                </div>
                <?php endif; ?>
			<?php
			$html = ob_get_clean();
			wp_send_json_success($html);

		}
	}
}
add_action( 'wp_ajax_nopriv_wiki_ajax_get_post', 'wiki_ajax_get_post' );
add_action( 'wp_ajax_wiki_ajax_get_post', 'wiki_ajax_get_post' );
if(!function_exists('wiki_ajax_get_comment')){
	function wiki_ajax_get_comment(){
		$id = $_POST['post-id'];
		$status = $_POST['status'];
		$meta_key = ['relation' => 'AND'];
		if($status == 'good'){
			$meta_key[] = array(
				'key'   => 'comment-total',
				'value' => 4,
				'compare'  => '>=',
			);
		}elseif($status == 'bad'){
			$meta_key[] = array(
				'key'   => 'comment-total',
				'value' => 2,
				'compare'  => '<=',
			);
		}else{
			$meta_key[] = array(
				'key'   => 'comment-total',
				'value' => 3,
				'compare'  => '>=',
			);
			$meta_key[] = array(
				'key'   => 'comment-total',
				'value' => 4,
				'compare'  => '<=',
			);
			
		}
		$args = array(
		    'post_id' => $id, // ID của bài viết
		    'order'  => 'asc',
  			'meta_query' => $meta_key,
		    'status' => 'approve',
		);
		$comments_query = new WP_Comment_Query( $args );
		$comments = $comments_query->get_comments();
		ob_start();
		if ($comments) {
			?> 
			<ol class="comment-list">
			<?php
				foreach ($comments as $key => $comment) {
					$avarta = get_avatar( $comment, $args['avatar_size'] );
					$commet_content = $comment->comment_content;
					$total = get_comment_meta($comment->comment_ID,'comment-total',true) ? get_comment_meta($comment->comment_ID,'comment-total',true) : '0';
					?>
						<li class="comment">
							<div class="comment-body">
								<div class="comment-author vcard">
									<?php echo $avarta; ?>
									<?php printf( __( '<b class="fn">%s</b>' ), get_comment_author_link($comment->comment_ID) ); ?>
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
									<div class="info">
										<span class="info-item">Hà Nội</span>
										<span class="info-item">2022 - 04 - 04</span>
										<span class="info-item accuracy"><img
												src="<?php echo THEME_URI ?>/images/icons/shield-check.svg" alt=""> Khách hàng đã
											được xác thực</span>
									</div>
								</div>
								<p class="comment-content">
									<?php echo $commet_content; ?>
								</p>
							</div>
						</li>
					<?php
				}
			?>
			</ol>
			<?php
			$html = ob_get_clean();
		}else{
			$html = "<b>Không có dữ liệu liên quan !</b>";
		}
		wp_send_json_success($html);
	}
}
add_action( 'wp_ajax_nopriv_wiki_ajax_get_comment', 'wiki_ajax_get_comment' );
add_action( 'wp_ajax_wiki_ajax_get_comment', 'wiki_ajax_get_comment' );

if(!function_exists('archive_nhakhoa_scripts')){
    function archive_nhakhoa_scripts(){
        wp_enqueue_script('archive-custom', get_template_directory_uri() . '/core/modules/archive-page/archive_custom.js', array(), '20121345', true);
    }
}
add_action( 'wp_enqueue_scripts', 'archive_nhakhoa_scripts' );