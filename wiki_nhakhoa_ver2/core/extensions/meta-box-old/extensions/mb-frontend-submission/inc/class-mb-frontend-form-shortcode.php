<?php
/**
 * Register form shortcode.
 *
 * @package    Meta Box
 * @subpackage MB Frontend Form Submission
 */

/**
 * Shortcode class.
 */
class MB_Frontend_Form_Shortcode {
	/**
	 * Initialization.
	 */
	public function init() {
		add_shortcode( 'mb_frontend_form', array( $this, 'shortcode' ) );
		if ( filter_input( INPUT_POST, 'rwmb_submit', FILTER_SANITIZE_STRING ) ) {
			add_action( 'template_redirect', array( $this, 'process' ) );
		}
	}

	/**
	 * Output the submission form in the frontend.
	 *
	 * @param array $atts Form parameters.
	 *
	 * @return string
	 */
	public function shortcode( $atts ) {
		$form = $this->get_form( $atts );
		if ( false === $form ) {
			return '';
		}
		ob_start();
		$form->render();

		return ob_get_clean();
	}

	/**
	 * Handle the form submit.
	 */
	public function process() {
		// @codingStandardsIgnoreLine
		$config = isset( $_POST['rwmb_form_config'] ) ? $_POST['rwmb_form_config'] : '';
		if ( empty( $config ) ) {
			return;
		}
		$form = $this->get_form( $config );
		if ( false === $form ) {
			return;
		}

		// Make sure to include the WordPress media uploader functions to process uploaded files.
		if ( ! function_exists( 'media_handle_upload' ) ) {
			require_once ABSPATH . 'wp-admin/includes/image.php';
			require_once ABSPATH . 'wp-admin/includes/file.php';
			require_once ABSPATH . 'wp-admin/includes/media.php';
		}

		$form->process();

		wp_safe_redirect( add_query_arg( 'rwmb-form-submitted', $config['id'] ) );
		die;
	}

	/**
	 * Get the form.
	 *
	 * @param array $args Form configuration.
	 *
	 * @return bool|MB_Frontend_Form Form object or false.
	 */
	private function get_form( $args ) {
		$args = shortcode_atts( array(
			// Meta Box ID.
			'id'            => '',

			// Post fields.
			'post_type'     => '',
			'post_id'       => 0,
			'post_status'   => 'publish',
			'post_fields'   => '',

			// Appearance options.
			'submit_button' => __( 'Submit', 'mb-frontend-submission' ),
			'confirmation'  => __( 'Your post has been successfully submitted. Thank you.', 'mb-frontend-submission' ),
		), $args );

		$meta_box = rwmb_get_registry( 'meta_box' )->get( $args['id'] );
		if ( false === $meta_box ) {
			return false;
		}
		$meta_box->set_object_id( $args['post_id'] );

		if ( ! $args['post_type'] ) {
			$post_types        = $meta_box->post_types;
			$args['post_type'] = reset( $post_types );
		}
		$post = new MB_Frontend_Post( $args['post_type'], $args['post_id'], $args );

		return new MB_Frontend_Form( $meta_box, $post, $args );
	}
}
