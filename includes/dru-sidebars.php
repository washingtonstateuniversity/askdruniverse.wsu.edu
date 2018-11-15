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
class Dru_Sidebars {

	public function __construct() {

		add_action( 'widgets_init', array( $this, 'register_sidebars' ) );

	} // End __construct


	/**
	 * Register the sidebars with WordPress
	 *
	 * @since 0.0.16
	 */
	public function register_sidebars() {

		register_sidebar(
			array(
				'name'          => 'Site Footer',
				'id'            => 'site_footer',
				'description'   => 'Widgets in this area will be shown on all posts and pages.',
				'before_widget' => '<div id="%1$s" class="widget widget-site-footer %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widgettitle">',
				'after_title'   => '</h2>',
			)
		);

		register_sidebar(
			array(
				'name'          => 'Site Header',
				'id'            => 'site_header',
				'description'   => 'Widgets in this area will be shown on all posts and pages.',
				'before_widget' => '<div id="%1$s" class="widget widget-site-header %2$s">',
				'after_widget'  => '</div>',
				'before_title'  => '<h2 class="widgettitle">',
				'after_title'   => '</h2>',
			)
		);

	}

} // End Dru_Sidebars

$dru_sidebars = new Dru_Sidebars();
