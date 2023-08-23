<?php
/**
 * The template file for post content.
 *
 * @package    Meta Box
 * @subpackage MB Frontend Submission
 */

$content = $this->post_id ? get_post_field( 'post_content', $this->post_id ) : '';
$field   = array(
	'type' => 'wysiwyg',
	'name' => esc_html__( 'Content', 'rwmb-frontend-submission' ),
	'id'   => 'post_content',
	'std'  => $content,
);
$field = RWMB_Field::call( 'normalize', $field );
RWMB_Field::call( $field, 'admin_enqueue_scripts' );
RWMB_Field::call( 'show', $field, false, $this->post_id );
