<div class="post-other">
	<p class="related-title">
		Bài viết khác
	</p>
	<div class="row">
		<div class="col-md-6">
			<?php
			$post_not_ids = array();
			$offset_ids = get_query_var('post_not_in');
			$post_id = get_the_ID();
			$terms = get_the_terms( $post_id , 'category', 'string');
			$term_ids = wp_list_pluck($terms,'term_id');
			array_push($offset_ids,$post_id);
			$args_one = array(
				'post_type' => get_post_type( get_the_ID() ),
				'posts_per_page' => 4,
				'orderby' => 'rand',
				'post__not_in'	=> $offset_ids,
				'tax_query' => array(
					array(
						'taxonomy' => 'category',
						'field' => 'id',
						'terms' => $term_ids,
						'operator'=> 'IN' 
					),
				),
			);
			$list_post_one = new WP_Query($args_one);
			if($list_post_one->have_posts()) :
				while ($list_post_one->have_posts()) : $list_post_one->the_post();
					$post_not_ids[] = get_the_ID();
					?>
					<div class="post-right">
						<?php get_template_part('components/post'); ?>
					</div>
				<?php endwhile;
				set_query_var('post_not_ids', $post_not_ids);
				else:
					$args_one = array(
						'post_type' => get_post_type( get_the_ID() ),
						'posts_per_page' => 4,
						'orderby' => 'rand',
						'post__not_in'	=> $offset_ids,
					);
					$list_post_one = new WP_Query($args_one);
					while ($list_post_one->have_posts()) : $list_post_one->the_post();
						$post_not_ids[] = get_the_ID();
						?>
						<div class="post-right">
							<?php get_template_part('components/post'); ?>
						</div>
					<?php endwhile;
					set_query_var('post_not_ids', $post_not_ids);
			endif;
			wp_reset_postdata();
			?>
		</div>
		<div class="col-md-6">
			<?php
			$post_not_ids = get_query_var('post_not_ids');
			$merge_id_post = array_merge($offset_ids, $post_not_ids);
			array_push($merge_id_post,$post_id);
			$args_two = array(
				'post_type' => get_post_type( get_the_ID() ),
				'posts_per_page' => 4,
				'orderby' => 'rand',
				'post__not_in'	=> $merge_id_post,
				'tax_query' => array(
					array(
						'taxonomy' => 'category',
						'field' => 'id',
						'terms' => $term_ids,
						'operator'=> 'IN' 
					),
				),
			);
			$list_post_two = new WP_Query($args_two);
			if($list_post_two->have_posts()) :
				while ($list_post_two->have_posts()) : $list_post_two->the_post();
					?>
					<div class="post-right">
						<?php get_template_part('components/post'); ?>
					</div>
				<?php endwhile;
				else:
					$args_one = array(
						'post_type' => get_post_type( get_the_ID() ),
						'posts_per_page' => 4,
						'orderby' => 'rand',
						'post__not_in'	=> $merge_id_post,
					);
					$list_post_one = new WP_Query($args_one);
					while ($list_post_one->have_posts()) : $list_post_one->the_post();
						$post_not_ids = get_the_ID();
						?>
						<div class="post-right">
							<?php get_template_part('components/post'); ?>
						</div>
					<?php endwhile;
			endif;
			wp_reset_postdata();
			?>
		</div>
	</div>
</div>