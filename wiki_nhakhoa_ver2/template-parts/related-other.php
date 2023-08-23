<div class="related-other">
	<div class="container">
		<p class="related-title">
			Bài viết liên quan
		</p>
		<div class="row">
			<?php
			$post_not_in = array();
			$current_post_id = get_the_ID();
			$terms = get_the_terms( $current_post_id , 'category', 'string');
			$term_ids = wp_list_pluck($terms,'term_id');
			$post_not_in[] = $current_post_id;
			$args = array(
				'post_type' => get_post_type( get_the_ID() ),
				'post__not_in' => $post_not_in,
				'posts_per_page' => 4,
				'ignore_sticky_posts' => 1,
				'orderby' => 'rand',
				'tax_query' => array(
					array(
						'taxonomy' => 'category',
						'field' => 'id',
						'terms' => $term_ids,
						'operator'=> 'IN' 
					),
				),
			);
			$second_query = new WP_Query($args);
			if($second_query->have_posts() && isset($second_query)) {
				while ($second_query->have_posts() ) : $second_query->the_post();
					$post_not_id[] = get_the_ID();
					?>
					<div class="col-md-3 col-6">
						<div class="post-grid">
							<?php get_template_part('components/post'); ?>
						</div>
					</div>
				<?php endwhile;
				set_query_var('post_not_in', $post_not_id);
			}
			else{
				$args = array(
					'post_type' => get_post_type( get_the_ID() ),
					'post__not_in' => $post_not_in,
					'posts_per_page' => 4,
					'ignore_sticky_posts' => 1,
					'orderby' => 'rand',
				);
				$second_query = new WP_Query($args);
				while ($second_query->have_posts() ) : $second_query->the_post();
					$post_not_id[] = get_the_ID();
					?>
					<div class="col-md-3 col-6">
						<div class="post-grid">
							<?php get_template_part('components/post'); ?>
						</div>
					</div>
				<?php endwhile;
				set_query_var('post_not_in', $post_not_id);
			}
			wp_reset_postdata();
			?>
		</div>
	</div>
</div>