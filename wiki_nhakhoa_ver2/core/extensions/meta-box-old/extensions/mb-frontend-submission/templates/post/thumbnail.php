<?php
/**
 * The template file for post thumbnail.
 *
 * @package    Meta Box
 * @subpackage MB Frontend Submission
 */

$default      = array();
$thumbnail_id = $this->post_id ? get_post_thumbnail_id( $this->post_id ) : '';
if ( $thumbnail_id ) {
	$default = array( $thumbnail_id );
}
$field = array(
	'type'             => 'image',
	'name'             => esc_html__( 'Thumbnail', 'rwmb-frontend-submission' ),
	'id'               => '_thumbnail_id',
	'max_file_uploads' => 1,
	'std'              => $default,
);
$field = RWMB_Field::call( 'normalize', $field );
RWMB_Field::call( $field, 'admin_enqueue_scripts' );
RWMB_Field::call( 'show', $field, false, $this->post_id );
