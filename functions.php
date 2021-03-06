<?php

include_once __DIR__ . '/includes/dru-shortcodes.php'; // Handle custom shortcodes for Ucomm.

include_once __DIR__ . '/includes/dru-sidebars.php'; // Handle custom sidebars for Ucomm.

include_once __DIR__ . '/includes/post/dru-post.php'; // Handle custom sidebars for Ucomm.

include_once __DIR__ . '/includes/taxonomy/dru-taxonomy.php'; // Handle taxonomy features.

include_once __DIR__ . '/includes/wsuwp-json/dru-post.php'; // Handle shortcode overrides.

add_action( 'wp_enqueue_scripts', 'dru_child_enqueue_scripts');
/**
* Enqueue custom scripting in child theme.
*/
function dru_child_enqueue_scripts() {
	//wp_enqueue_script( 'drutypekit', 'https://use.typekit.net/lss5xzj.js', true );
	//wp_enqueue_script( 'drutrycache', get_stylesheet_directory_uri() . '/js/trytypekit.js', array( 'jquery' ), spine_get_script_version(), true );
	wp_enqueue_style( 'dradobetykie-bg', 'https://use.typekit.net/lss5xzj.css', array(), '0.0.1' );
	wp_enqueue_script( 'dr-public', get_stylesheet_directory_uri() . '/js/drjs-public.js', array( 'jquery' ), '0.0.1', true );
}

add_action( 'after_setup_theme', 'dru_theme_setup' );
/**
 * Process various tasks when setting up the theme.
 */
function dru_theme_setup() {
	add_theme_support( 'html5', array( 'search-form' ) );
}

/**
 * Get post title for Dr post
 *
 * @since 0.0.22
 *
 * @param int $post_id Current post id
 */
function dr_get_post_title( $post_id ) {

	$question = get_post_meta( get_the_ID(), '_dr_question_text', true );

	if ( $question ) {

		return $question;

	} else {

		return get_the_title( $post_id );

	} // End if

} // End dr_get_post_title


/**
 * Clean tags from excerpt with more tag
 *
 * @since 0.0.22
 *
 * @param string $excerpt Current excerpt
 */
function dr_get_clean_excerpt( $excerpt ) {

	$excerpt = wpautop( wp_strip_all_tags( $excerpt ) );

	return $excerpt;

} // End dr_get_clean_excerpt

/**
 * Add page footer widget area.
 *
 * @since 1.0.0
 */
function dr_add_above_footer_content( $context ) {

	if ( ! is_front_page() ) {

		if ( is_active_sidebar( 'before-footer' ) ) {

			echo '<div class="before-footer-widget-area">';
			dynamic_sidebar( 'before-footer' );
			echo '</div>';
		} // End if
	} // End if

} // End add_above_footer_content

add_action( 'spine_theme_template_before_footer', 'dr_add_above_footer_content' );

/**
 * Add page footer sidebar.
 *
 * @since 1.0.0
 */
function dr_add_before_footer() {
	register_sidebar(
		array(
			'name'          => 'Before Footer',
			'id'            => 'before-footer',
			'description'   => 'Widgets in this area will be shown on all posts and pages.',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'      => '</div>',
			'before_title'      => '<h2 class="widgettitle">',
			'after_title'       => '</h2>',
		)
	);
}

add_action( 'widgets_init', 'dr_add_before_footer' );
