<?php
require_once dirname(__FILE__) . '/meta-box-brand.php';
if (!function_exists('wb_create_post_type_brand_wiki')) {
	function wb_create_post_type_brand_wiki()
	{
		if (current_user_can('user_aprove_comments'))
			return;
		$labels  = array(
			'name'                  => _x('Cơ sở', 'Post Type Name', 'wiki_nhakhoa'),
			'singular_name'         => _x('Cơ sở', 'Post Type Singular Name', 'wiki_nhakhoa'),
			'menu_name'             => __('Cơ sở', 'wiki_nhakhoa'),
			'name_admin_bar'        => __('Cơ sở', 'wiki_nhakhoa'),
			'archives'              => __('Tất cả Cơ sở', 'wiki_nhakhoa'),
			'parent_item_colon'     => __('Parent Item:', 'wiki_nhakhoa'),
			'all_items'             => __('Tất cả Cơ sở', 'wiki_nhakhoa'),
			'add_new_item'          => __('Thêm Cơ sở', 'wiki_nhakhoa'),
			'add_new'               => __('Thêm mới', 'wiki_nhakhoa'),
			'new_item'              => __('New Event', 'wiki_nhakhoa'),
			'edit_item'             => __('Edit Item', 'wiki_nhakhoa'),
			'update_item'           => __('Update Item', 'wiki_nhakhoa'),
			'view_item'             => __('View Item', 'wiki_nhakhoa'),
			'search_items'          => __('Search Item', 'wiki_nhakhoa'),
			'not_found'             => __('Not found', 'wiki_nhakhoa'),
			'not_found_in_trash'    => __('Not found in Trash', 'wiki_nhakhoa'),
			'featured_image'        => __('Featured Image', 'wiki_nhakhoa'),
			'set_featured_image'    => __('Set featured image', 'wiki_nhakhoa'),
			'remove_featured_image' => __('Remove featured image', 'wiki_nhakhoa'),
			'use_featured_image'    => __('Use as featured image', 'wiki_nhakhoa'),
			'insert_into_item'      => __('Insert into item', 'wiki_nhakhoa'),
			'uploaded_to_this_item' => __('Uploaded to this item', 'wiki_nhakhoa'),
			'items_list'            => __('Items list', 'wiki_nhakhoa'),
			'items_list_navigation' => __('Items list navigation', 'wiki_nhakhoa'),
			'filter_items_list'     => __('Filter items list', 'wiki_nhakhoa'),
		);
		$rewrite = array(
			'slug'       => 'co-so',
			'with_front' => true,
			'pages'      => true,
			'feeds'      => true,
		);
		$args    = array(
			'label'               => __('Cơ sở', 'wiki_nhakhoa'),
			'description'         => __('Tổng hợp những Cơ sở', 'wiki_nhakhoa'),
			'labels'              => $labels,
			'supports'            => array('title', 'editor', 'author', 'thumbnail', 'comments', 'revisions'),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 10,
			'menu_icon'           => 'dashicons-index-card',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'rewrite'             => $rewrite,
			'capability_type'     => 'post',
		);
		register_post_type('brand', $args);

	}
	add_action('init', 'wb_create_post_type_brand_wiki', 0);
}
function wiki_addjs_brand()
{
	wp_register_script('brand-admin', get_template_directory_uri() . '/core/modules/post-type/brand/brand-admin.js', array(), '202212102', true);
	wp_enqueue_script('brand-admin');
	wp_localize_script(
		'brand-admin',
		'brand_option',
		array('ajaxurl' => admin_url('admin-ajax.php'))
	);
}
add_action('admin_enqueue_scripts', 'wiki_addjs_brand');

if (!function_exists('get_post_table')) {
	function get_post_table()
	{

		if (isset($_POST['id_service']) && $_POST['id_service'] != '') {
			$data    = get_post_meta($_POST['post_id'], 'brand-table', true) ? get_post_meta($_POST['post_id'], 'brand-table', true) : [];
			$id      = $_POST['id_service'];
			$post_id = 0;
			if ($data) {
				foreach ($data as $key => $value) {
					if ($value['brand_table_service'] == $id) {
						$post_id = $value['brand_table_price'];
					}
				}
			}
			$args      = array(
				'post_type'      => 'table_price',
				'post_status'    => 'publish',
				'posts_per_page' => -1,
				'meta_query'     => array(
					array(
						'key'     => 'table_service',
						'value'   => $id,
						'compare' => '='
					)
				),
			);
			$list_post = new WP_Query($args);
			$option    = '<option value="">Lựa chọn của bạn</option>';
			if ($list_post->have_posts()) {
				while ($list_post->have_posts()):
					$list_post->the_post();
					$option .= '<option value="' . get_the_ID() . '"' . selected($post_id, get_the_ID()) . '>' . get_the_title() . '</option>';
				endwhile;
			}
			echo $option;
			die();
		}
	}
}

add_action('wp_ajax_get_post_table', 'get_post_table');
add_action('wp_ajax_nopriv_get_post_table', 'get_post_table');

if (!function_exists('get_table_price')) {
	function get_table_price()
	{
		if (isset($_POST['id_table']) && $_POST['id_table'] != '' || isset($_POST['id_service']) && $_POST['id_service'] != '') {
			$data       = get_post_meta($_POST['post_id'], 'brand-table', true) ? get_post_meta($_POST['post_id'], 'brand-table', true) : '';
			$id         = isset($_POST['id_table']) ? $_POST['id_table'] : 0;
			$id_service = isset($_POST['id_service']) ? $_POST['id_service'] : 0;
			$index      = isset($_POST['key']) ? $_POST['key'] : 0;
			$selected   = '';
			if ($data) {
				foreach ($data as $key => $value) {
					if ($value['brand_table_service'] == $id_service) {
						$id       = $value['brand_table_price'];
						$selected = $value['option-table'][$index]['option_table_type'];
					}
				}
			}
			$table_price = rwmb_meta('table-price-group', '', $id) ? rwmb_meta('table-price-group', '', $id) : '';
			$option      = '<option value="">Lựa chọn của bạn</option>';
			if ($table_price) {
				foreach ($table_price as $key => $value) {
					$option .= '<option value="' . $value['table-name-category'] . '"' . selected($selected, $value['table-name-category']) . '>' . $value['table-name-category'] . '</option>';
				}
			}
			echo $option;
			die();
		}
	}
}

add_action('wp_ajax_get_table_price', 'get_table_price');
add_action('wp_ajax_nopriv_get_table_price', 'get_table_price');

if (!function_exists('get_post_brands_table')) {
	function get_post_brands_table()
	{
		$id_service = isset($_POST['id_service']) ? $_POST['id_service'] : 0;
		$args       = array(
			'post_type'      => 'brand',
			'post_status'    => 'publish',
			'posts_per_page' => -1,
			'order'          => 'desc',
			'meta_query'     => array(
				'key'     => 'brand-list-service',
				'value'   => $id_service,
				'compare' => 'LIKE',
			),
		);
		$list_post  = new WP_Query($args);
		$option     = '<option value="">Lựa chọn của bạn</option>';
		if ($list_post->have_posts()) {
			while ($list_post->have_posts()):
				$list_post->the_post();
				$option .= '<option value="' . get_the_ID() . '">' . get_the_title() . '</option>';
			endwhile;
		}
		echo $option;
		die();
	}
}
if (!function_exists('get_post_brands')) {
	function get_post_brands($id_service)
	{
		$args      = array(
			'post_type'   => 'brand',
			'post_status' => 'publish',
			'meta_query'  => array(
				'relation' => 'AND',
				array(
					'key'     => 'brand-list-service',
					'value'   => $id_service,
					'compare' => 'like',
				)
			),
		);
		$list_post = new WP_Query($args);
		$option    = array();
		if ($list_post->have_posts()) {
			while ($list_post->have_posts()):
				$list_post->the_post();
				$option[get_the_ID()] = get_the_title();
			endwhile;
		}
		return $option;
	}
}

add_action('wp_ajax_get_post_brands_table', 'get_post_brands_table');
add_action('wp_ajax_nopriv_get_post_brands_table', 'get_post_brands_table');

if (!function_exists('get_posts_experts')) {
	function get_posts_experts()
	{
		$id_service     = $_POST['id_service'] ? $_POST['id_service'] : 0;
		$posts_per_page = $_POST['number_post'] ? $_POST['number_post'] : 0;
		$posts_per_page = $posts_per_page + 5;
		$args_post      = array(
			'post_type'      => 'doctor',
			'post_status'    => 'publish',
			'posts_per_page' => $posts_per_page,
			'order'          => 'desc',
			'orderby'        => 'meta_value_num',
			'meta_key'       => 'total-ratting-post',
			'meta_query'     => array(
				'relation' => 'AND',
				array(
					'key'     => 'expert-list-service',
					'value'   => $id_service,
					'compare' => 'like',
				)
			),
		);
		$list_post      = new WP_Query($args_post);
		$html           = '';
		ob_start();
		if ($list_post->have_posts()) {
			$i = 1;
			while ($list_post->have_posts()):
				$list_post->the_post();
				$number_page = $list_post->max_num_pages;
				?>
				<div class="inner">
					<?php
					$args = array(
						'rank' => $i,
					);
					get_template_part('components/post', 'ranks', $args);
					?>
					<?php
					get_template_part('components/point', 'ranks');
					?>
				</div>
				<?php
				$i++;
			endwhile;
		}
		?>
		<?php
		if ($number_page > 1) {
			?>
			<div class="load-more" data-service="<?php echo $id_service; ?>">
				<a href="#" class="load-more-item">
					<i class="fa fa-angle-double-down fa-2x" aria-hidden="true"></i>
					<span>Xem thêm</span>
				</a>
			</div>
		<?php } ?>
		<div class="loader">
			<li class="ball"></li>
			<li class="ball"></li>
			<li class="ball"></li>
		</div>
		<?php
		$html = ob_get_clean();
		wp_send_json_success($html);
	}
}
add_action('wp_ajax_get_posts_experts', 'get_posts_experts');
add_action('wp_ajax_nopriv_get_posts_experts', 'get_posts_experts');

function save_table_brands($post_id)
{
	if (isset($_POST['table_brands']) && !empty($_POST['table_brands'])) {
		//add_post_meta($post_id, 'table_brands', $_POST['table_brands']);
		foreach ($_POST['table_brands'] as $key => $value) {
			add_post_meta($post_id, 'table_brands', $value, false);
		}
	}
}
add_action('save_post', 'save_table_brands');