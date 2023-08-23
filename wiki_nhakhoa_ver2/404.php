<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package wiki_nhakhoa
 */

get_header();
?>
<main class="page-notfound">
	<div class="container">
		<div class="notfound-wrap">
			<img src="<?php echo THEME_URI; ?>/images/banner/not-found.png" alt="Không tìm thấy trang">
			<h2 class="notif-404">Lỗi 404 không tìm thấy trang</h2>
			<div class="text-center">
				<a href="<?php echo get_home_url(); ?>" class="btn go-to-home">
					<svg xmlns="http://www.w3.org/2000/svg" width="17.559" height="14.357"
					viewBox="0 0 17.559 14.357">
					<path id="turn-right"
					d="M18.324,13.143l-3.991,3.991A.8.8,0,0,1,13.2,16l2.629-2.629H6.188A5.188,5.188,0,0,1,6.188,3H9.779a.8.8,0,0,1,0,1.6H6.188a3.592,3.592,0,1,0,0,7.183h9.646L13.206,9.151a.8.8,0,0,1,1.129-1.129l3.991,3.991a.8.8,0,0,1,0,1.129Z"
					transform="translate(-1 -3)" fill="#fff" />
				</svg>
			Trở về trang chủ</a>
		</div>
	</div>
</div>
</main>
<?php
get_footer();
