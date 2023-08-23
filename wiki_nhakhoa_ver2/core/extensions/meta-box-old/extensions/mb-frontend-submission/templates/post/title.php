<?php
/**
 * The template file for post title.
 *
 * @package    Meta Box
 * @subpackage MB Frontend Submission
 */

$title = $this->post_id ? get_post_field( 'post_title', $this->post_id ) : '';
$field = array(
	'type' => 'text',
	'name' => esc_html__( 'Title', 'rwmb-frontend-submission' ),
	'id'   => 'post_title',
	'std'  => $title,
);
$field = RWMB_Field::call( 'normalize', $field );
RWMB_Field::call( $field, 'admin_enqueue_scripts' );
RWMB_Field::call( 'show', $field, false, $this->post_id );
