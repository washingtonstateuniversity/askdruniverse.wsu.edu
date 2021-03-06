<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Handle mods to WSUWP_JSON Shortcode
 *
 * @since 0.0.23
 */
class Dru_WSUWP_JSON {

	public function __construct() {

		add_filter( 'wsuwp_content_syndicate_json_output', array( $this, 'get_shortcode_output' ), 10, 3 );

		add_action( 'rest_api_init', array( $this, 'add_question_api' ) );

		add_filter( 'wsu_content_syndicate_host_data', array( $this, 'add_question_to_response' ), 10, 3 );

	} // End __construct


	/**
	 * Add question to content syndicate object
	 *
	 * @since 0.0.24
	 *
	 * @param array $subset Array of objects containing post data.
	 * @param object $post WordPress REST API response data for given post.
	 * @param array $atts Shortcode attributes
	 *
	 * @return array Array of custom objects for display.
	 */
	public function add_question_to_response( $subset, $post, $atts ) {

		if ( isset( $post->question ) ) {

			$subset->question = $post->question;

		} // End if

		return $subset;

	} // End add_question_to_response

	/**
	 * Change shortcode output if is set to drunivers
	 *
	 * @since 0.0.23
	 *
	 * @param bool|string $html Html output.
	 * @param array $new_data Array of post objects.
	 * @param array $atts Array of shortcode atts.
	 *
	 * @return string|bool Html for shortcode or false in ignore.
	 */
	public function get_shortcode_output( $html, $new_data, $atts ) {

		if ( 'druniverse' === $atts['output'] ) {

			ob_start();

			include __DIR__ . '/display/full.php';

			$html = ob_get_clean();

		} // End if

		return $html;

	} // End get_shortcode_output


	/**
	 * Add data to REST API response.
	 *
	 * @since 0.0.23
	 */
	public function add_question_api() {

		register_rest_field(
			'post',
			'question',
			array(
				'get_callback'  => array( $this, 'get_question_post_meta_for_api' ),
				'schema'        => null,
			)
		);

	} // End add_question_api


	/**
	 * Get data for response
	 *
	 * @since 0.0.23
	 *
	 * @param object $object Current post object.
	 *
	 * @return string Value of question meta data.
	 */
	public function get_question_post_meta_for_api( $object ) {

		//get the id of the post object array
		$post_id = $object['id'];

		//return the post meta
		return get_post_meta( $post_id, '_dr_question_text', true );

	} //End get_question_post_meta_for_api


} // End Dru_WSUWP_JSON

$dru_wsuwp_json = new Dru_WSUWP_JSON();
