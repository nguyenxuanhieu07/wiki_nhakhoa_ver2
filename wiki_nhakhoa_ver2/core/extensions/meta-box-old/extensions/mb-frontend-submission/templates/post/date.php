<?php
/**
 * The template file for post date.
 *
 * @package    Meta Box
 * @subpackage MB Frontend Submission
 */

$default = $this->post_id ? get_post_field( 'post_date', $this->post_id ) : '';
$field = array(
	'type' => 'datetime',
	'name' => esc_html__( 'Date', 'rwmb-frontend-submission' ),
	'id'   => 'post_date',
	'std'  => $default,
);
$field = RWMB_Field::call( 'normalize', $field );
RWMB_Field::call( $field, 'admin_enqueue_scripts' );
RWMB_Field::call( 'show', $field, false, $this->post_id );
