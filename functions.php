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

  // Add "Archive" to the end of archive titles
  add_filter( 'get_the_archive_title', function ( $title ) {
	$title_postfix = ' Archive';
	$title .=  $title_postfix;
	return $title;
},50);
