<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package wiki_nhakhoa
 */

?>
<section class="npage-notfound">
	<div class="container">
		<div class="notfound-wrap">
			<h1 class="notif-404">Nội dung đang được cập nhật</h1>
			<div class="page-content">
				<p>Có vẻ như chúng tôi không thể tìm thấy những gì bạn đang tìm kiếm. Có lẽ tìm kiếm có thể giúp
					ích.
				</p>
				<form role="search" method="get" class="search-form search-form-nothing" action="<?php echo get_home_url(); ?>">
					<div class="form-group">
						<input type="search" class="search-field form-control" placeholder="Tìm kiếm…" value=""
						name="s">
					</div>
					<button type="submit" class="search-submit search-submit-nothing">
						<i class="fa fa-search" aria-hidden="true"></i>
					</button>
				</form>
			</div>
		</div>
	</div>
</section>