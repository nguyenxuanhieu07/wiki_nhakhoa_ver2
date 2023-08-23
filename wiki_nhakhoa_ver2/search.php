<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package wiki_nhakhoa
 */

get_header();
if(isset($_GET['post-type'])) {
	$type = $_GET['post-type'];
	if($type == 'brand') {
		get_template_part('template-parts/search', 'brand'); 
	}else if($type == 'doctor'){
		get_template_part('template-parts/search', 'doctor');
	}
} else { 
	get_template_part('template-parts/content', 'search');
}
get_footer();
