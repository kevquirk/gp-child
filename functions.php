<?php
/**
 * GeneratePress child theme functions and definitions.
 *
 * Add your custom PHP in this file.
 * Only edit this file if you have direct access to it on your server (to fix errors if they happen).
 */

 /* Load custom fonts to the customiser */
 add_filter( 'generate_typography_default_fonts', function( $fonts ) {
    $fonts[] = 'PT Sans Narrow';
    $fonts[] = 'Fira Sans Condensed';

    return $fonts;
} );

// Gutenberg custom stylesheet
add_theme_support('editor-styles');
add_editor_style( 'style.css' );
add_editor_style( 'editor-style.css' );

add_filter( 'pre_get_posts', 'exclude_category_home' );

// Notes custom post type
function notes_posttype() {

    register_post_type( 'notes',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Notes' ),
                'singular_name' => __( 'Notes' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'notes'),
            'show_in_rest' => true,
            'menu_icon'   => 'dashicons-welcome-write-blog',

        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'notes_posttype' );
