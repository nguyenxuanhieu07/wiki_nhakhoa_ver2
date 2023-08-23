<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package wiki_nhakhoa
 */
$primary_service = rwmb_meta('expert-list-service') ? rwmb_meta('expert-list-service') : '';
if($primary_service == ''){
	$primary_service = get_terms(
		array(
			'taxonomy' => 'service_cat',
			'hide_empty' => false,
			'parent'   => 0,
		),
	);
}
$type = get_post_type();
if($type == 'doctor'){
	$id_post = get_the_ID();
	$content = get_post( $id_post );
}
?>
<form action="" class="form-register-sidebar">
	<img class="img-sidebar" src="<?php echo THEME_URI; ?>/images/background/img-form-sidebar.png" alt="">
	<h2 class="form-title text-center">Đặt lịch khám chữa <p class="title-item">tại cơ sở</p>
	</h2>
	<div class="form-row form-row-custom">
		<div class="form-group form-group-custom col-md-12">
			<input type="text" name="fullname" class="form-control form-control-custom"
			placeholder="Họ và tên" required>
		</div>
		<div class="form-group form-group-custom col-md-12">
			<input type="text" name="numberphone" class="form-control form-control-custom"
			pattern="(\+84|0){1}(9|8|7|5|3){1}[0-9]{8}" placeholder="Số điện thoại"
			required>
		</div>
		<div class="form-group form-group-custom col-md-12">
			<input type="email" name="numberphone" class="form-control form-control-custom"
			placeholder="email" required>
		</div>
		<div class="form-group form-group-custom col-md-12">
			<input type="text" name="address" class="form-control form-control-custom"
			placeholder="Địa chỉ" >
		</div>
		<input type="text" class="<?php if($type != 'doctor') echo 'd-none'; ?>" name="expert" value="<?php echo $content->post_title; ?>" hidden>
		<div class="form-group form-group-custom col-md-12">
			<select name="list-service" class="form-control form-control-custom">
				<option value="">Lựa chọn dịch vụ</option>
				<?php foreach ($primary_service as $key => $value) {
					?>
					<option value="<?php echo $value->name ?>"><?php echo $value->name ?></option>
				<?php }?>
			</select>
		</div>
		<div class="form-group form-group-custom m-20 col-md-12">
			<textarea name="note" class="form-control form-control-custom" rows="5"
			placeholder="Bạn gặp vấn đề gì"></textarea>
		</div>
		<button class="btn btn-register-sibar">Đặt lịch khám</button>
	</div>
</form>
<?php 
if($type == 'brand'):
	get_template_part('template-parts/sidebar','brand');
else:
	get_template_part('template-parts/sidebar','doctor');
endif;

?>
<?php
$enable_ads_sidebar = rwmb_meta('enable_ads_sidebar');
if($enable_ads_sidebar == ''){
	$enable_ads_sidebar = true;
}
if($enable_ads_sidebar){
	echo do_shortcode('[ads_sidebar]');
}
?>

