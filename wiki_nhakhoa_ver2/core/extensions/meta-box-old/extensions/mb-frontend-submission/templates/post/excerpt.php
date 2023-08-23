<?php
/**
 * The template file for post excerpt.
 *
 * @package    Meta Box
 * @subpackage MB Frontend Submission
 */

$excerpt = $this->post_id ? get_post_field( 'post_excerpt', $this->post_id ) : '';
$field   = array(
	'type' => 'textarea',
	'name' => esc_html__( 'Excerpt', 'rwmb-frontend-submission' ),
	'id'   => 'post_excerpt',
	'std'  => $excerpt,
);
$field = RWMB_Field::call( 'normalize', $field );
RWMB_Field::call( $field, 'admin_enqueue_scripts' );
RWMB_Field::call( 'show', $field, false, $this->post_id );
