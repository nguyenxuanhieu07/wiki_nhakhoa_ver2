<main class="category-page category-brand category-experts">
	<?php get_template_part('components/search-location'); ?>
	<div class="breadcrumb-nav mb-5">
		<?php get_template_part('components/breadcrumb'); ?>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-8">
				<?php 
				$id_province = $_GET['name-province'];
				$id_district = $_GET['name-district'];
				$id_cate = $_GET['name-category'] ? $_GET['name-category'] : $_GET['name-category-specical'];
				$type = $_GET['post-type'];
				$meta_key = ['relation' => 'AND'];
				$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
				if($id_province){
					$meta_key[] = array(
						'key'   => 'doctor_province',
						'value' => $id_province,
						'compare'  => '=',
					);
				}
				if($id_district){
					$meta_key[] = array(
						'key'   => 'doctor_district',
						'value' => $id_district,
						'compare'  => '=',
					);
				}
				if($id_cate){
					$meta_key[] = array(
						'key'   => 'brand-list-specical',
						'value' => $id_cate,
						'compare'  => 'like',
					);
				}
				$args = array(
					'post_type' => $type,
					'post_status'   => 'publish',
					'orderby'   => 'date',
					'posts_per_page' => 10,
					'meta_query' => $meta_key,
					'paged'          => $paged,
					
				);
				$list_post = new WP_Query($args);
				if($list_post->have_posts()) {
					$count = $list_post->found_posts;
					echo '<h1 class="archive-title">Có <span>'. $count .'</span> Cơ sở phù hợp</h1>';
					while($list_post->have_posts()) : $list_post->the_post();
						get_template_part('components/post-brand');
					endwhile;
					wiki_pagination($list_post);
					wp_reset_postdata(); 
				}else{
					get_template_part('template-parts/content', 'none');
				}
				
				?>
			</div>
			<div class="col-md-4  sidebar">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</main>