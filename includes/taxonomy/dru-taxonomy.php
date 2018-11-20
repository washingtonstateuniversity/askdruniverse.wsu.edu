<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Handle taxonomy related code
 *
 * @since 0.0.22
 */
class Dru_Taxonomy {

	public function __construct() {

		add_action( 'category_edit_form_fields', array( $this, 'add_taxonomy_image' ), 10, 2 );

		add_action( 'edited_category', array( $this, 'update_taxonomy_image' ), 10, 2 );

		add_action( 'admin_enqueue_scripts', array( $this, 'load_media_scripts' ) );

	} // End __construct


	/**
	 * Add category media input fields
	 *
	 * @since 0.0.22
	 *
	 * @param WP_Term $term Current term object
	 * @param string $taxonomy Current taxonomy
	 */
	public function add_taxonomy_image( $term, $taxonomy ) {

		$image_id = get_term_meta( $term->term_id, 'taxonomy-image-id', true );

		include __DIR__ . '/display/media-field.php';

	} // End update_taxonomy_image


	/**
	 * Save category image
	 * 
	 * @since 0.0.22
	 * 
	 * @param int $term_id ID of current term
	 */
	public function update_taxonomy_image( $term_id, $tt_id ) {

		if ( isset( $_REQUEST['taxonomy_media'] ) ) {

			if ( wp_verify_nonce( $_REQUEST['taxonomy_media'], 'add-taxonomy-media' ) ) {

				if ( isset( $_REQUEST['taxonomy-image-id'] ) ) {

					$image = sanitize_text_field( $_REQUEST['taxonomy-image-id'] );

					update_term_meta( $term_id, 'taxonomy-image-id', $image );

				} // End if
			} // End if
		} // End if

	} // End updated_taxonomy_image


	/**
	 * Load the media uploader scripts
	 *
	 * @since 0.0.22
	 */
	public function load_media_scripts( $hook ) {

		// Limit this to term pages only
		if ( 'term.php' === $hook ) {

			wp_enqueue_media();

			wp_enqueue_script( 'dr-upload-media', get_stylesheet_directory_uri() . '/js/upload-taxonomy-media.js', array( 'jquery' ), '0.0.1', true );

		} // End if

	} // End load_media


} // End Dru_Sidebars

$dru_taxonomy = new Dru_Taxonomy();
