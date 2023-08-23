<?php 
/*
*	Template Name: Trang chủ
*/
?>
<?php get_header(); ?>
<main class="homepage">
	<?php 
	get_template_part('homes/hero', 'content');
	get_template_part('homes/service', 'top');
	get_template_part('homes/wiki', 'solution');
	get_template_part('homes/wiki', 'numbers');
	get_template_part('homes/connect', 'experts');
	get_template_part('homes/connect', 'brand');
	get_template_part('homes/connect', 'user');
	get_template_part('homes/box-banner', 'home');
	get_template_part('homes/home-box', 'value');
	get_template_part('homes/home', 'brand');
	?>
</main>
<?php get_footer(); ?>