<?php

if ( is_archive() && ( is_category() || is_tag() ) ) {

	$term_id = get_queried_object_id();

	if ( $term_id ) {

		$image_id = get_term_meta( $term_id, 'taxonomy-image-id', true );

		if ( ! empty( $image_id ) ) {

			$image_src = wp_get_attachment_image_src( $image_id, 'full' );

			$src = $image_src[0];

			echo '<figure class="featured-image unbound recto verso" style="background-image: url(' . esc_url( $src ) . ');"><img src="' . esc_url( $src ) . '" alt="" /></figure>';

		} // End if
	} // End if
} elseif ( is_singular() ) {

	// If a background image is assigned to the post, attach it as a background to jacket.
	if ( spine_has_background_image() ) {
		$background_image_src = spine_get_background_image_src();

		?><style> #jacket { background-image: url('<?php echo esc_url( $background_image_src ); ?>'); }</style><?php
	}

	// If a featured image is assigned to the post, output it as a figure with a background image accordingly.
	if ( spine_has_featured_image() ) {
		$featured_image_src = spine_get_featured_image_src();
		$featured_image_position = get_post_meta( get_the_ID(), '_featured_image_position', true );

		if ( ! $featured_image_position || sanitize_html_class( $featured_image_position ) !== $featured_image_position ) {
			$featured_image_position = '';
		}

		?><figure class="featured-image <?php echo $featured_image_position; ?>  unbound recto verso" style="background-image: url('<?php echo esc_url( $featured_image_src ); ?>');"><?php spine_the_featured_image(); ?></figure><?php
	} // End if
} // End if
