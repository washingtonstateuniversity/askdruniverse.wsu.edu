<?php

include_once( 'includes/dru-shortcodes.php' ); // Handle custom shortcodes for Ucomm.

add_action( 'wp_enqueue_scripts', 'dru_child_enqueue_scripts');
/**
* Enqueue custom scripting in child theme.
*/
function dru_child_enqueue_scripts() {
    wp_enqueue_script( 'drutypekit', 'https://use.typekit.net/lss5xzj.js', true );
    wp_enqueue_script( 'drutrycache', get_stylesheet_directory_uri() . '/js/trytypekit.js', array( 'jquery' ), spine_get_script_version(), true );

}

add_action( 'after_setup_theme', 'dru_theme_setup' );
/**
 * Process various tasks when setting up the theme.
 */
function dru_theme_setup() {
    add_theme_support( 'html5', array( 'search-form' ) );
}

