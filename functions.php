<?php
/**
 * GeneratePress child theme functions and definitions.
 *
 * Add your custom PHP in this file.
 * Only edit this file if you have direct access to it on your server (to fix errors if they happen).
 */

 /* Load custom fonts to the customiser */
 add_filter( 'generate_typography_default_fonts', function( $fonts ) {
    $fonts[] = 'Fira Sans Condensed';
    return $fonts;
} );

// Gutenberg custom stylesheet
add_theme_support('editor-styles');
add_editor_style( 'style.css' );
add_editor_style( 'editor-style.css' );

add_filter( 'pre_get_posts', 'exclude_category_home' );

// Remove "Archive:", "Category:" etc.
add_filter( 'get_the_archive_title', function ($title) {
      if ( is_category() ) {
              $title = single_cat_title( '', false );
          } elseif ( is_tag() ) {
              $title = single_tag_title( '', false );
          } elseif ( is_author() ) {
              $title = '<span class="vcard">' . get_the_author() . '</span>' ;
          } elseif ( is_tax() ) { //for custom post types
              $title = sprintf( __( '%1$s' ), single_term_title( '', false ) );
          } elseif (is_post_type_archive()) {
              $title = post_type_archive_title( '', false );
          }
      return $title;
  });

// Add support for custom colour pallette in Gutenberg.
add_theme_support( 'editor-color-palette', array(
	array(
		'name' => __( 'dark-blue', 'themeLangDomain' ),
		'slug' => 'dark-blue',
		'color' => '#112154',
	),
  array(
		'name' => __( 'mid-blue', 'themeLangDomain' ),
		'slug' => 'mid-blue',
		'color' => '#2778ba',
	),
  array(
		'name' => __( 'light-blue', 'themeLangDomain' ),
		'slug' => 'light-blue',
		'color' => '#dbe5ee',
	),
  array(
		'name' => __( 'accent-light-blue', 'themeLangDomain' ),
		'slug' => 'accent-light-blue',
		'color' => '#c7d4e0',
	),
  array(
		'name' => __( 'pink', 'themeLangDomain' ),
		'slug' => 'pink',
		'color' => '#ba0076',
	),
) );

// Increase scroll to top speed
add_filter( 'generate_back_to_top_scroll_speed', 'tu_back_to_top_scroll_speed' );
function tu_back_to_top_scroll_speed() {
    return 50; // milliseconds
}

// Add shortcode for reply via mail link
add_shortcode( 'mailto_title', 'mailto_title' );

function mailto_title( $atts ) {
    return esc_attr( get_the_title( get_the_ID() ) );
}

/** * Completely Remove jQuery From WordPress */
function my_init() {
    if (!is_admin()) {
        wp_deregister_script('jquery');
        wp_register_script('jquery', false);
    }
}
add_action('init', 'my_init');
