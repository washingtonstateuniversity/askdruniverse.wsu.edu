<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Add sidebars to Dr. Universe child theme
 *
 * @since 0.0.16
 */
class Dru_Post {

	public function __construct() {

		add_action( 'edit_form_after_title', array( $this, 'add_question_field' ) );

		add_action( 'save_post_post', array( $this, 'save_post' ), 10 );

	} // End __construct


	/**
	 * Register the sidebars with WordPress
	 *
	 * @since 0.0.16
	 */
	public function add_question_field( $post ) {

		$question = get_post_meta( get_the_ID(), '_dr_question_text', true );

		include __DIR__ . '/question-field.php';

	} // add_question_field


	/**
	 * Register the sidebars with WordPress
	 *
	 * @since 0.0.16
	 */
	public function save_post( $post_id ) {

		// If this is an autosave, our form has not been submitted, so we don't want to do anything.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {

			return false;

		} // end if

		// Check the user's permissions.
		if ( ! current_user_can( 'edit_post', $post_id ) ) {

			return false;

		} // end if

		if ( isset( $_REQUEST['dr_question'] ) ) {

			$nonce = $_REQUEST['dr_question'];

			if ( ! wp_verify_nonce( $nonce, 'dr_question_nonce' ) ) {

				die( 'Security check' ); 

			} else {

				$question = wp_kses_post( $_REQUEST['_dr_question_text'] );

				update_post_meta( $post_id, '_dr_question_text', $question );

			} // End if
		} // End if

	} // add_question_field

} // End Dru_Sidebars

$dru_post = new Dru_Post();
