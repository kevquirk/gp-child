
Skip to content
Pull requests
Issues
Marketplace
Explore
@kevquirk
kevquirk /
gp-child
Private

1
0

    0

Code
Issues
Pull requests
Actions
Projects
Security
Insights

    Settings

gp-child/archive-notes.php /
@kevquirk
kevquirk kl;
Latest commit 613b4a7 25 days ago
History
1 contributor
82 lines (64 sloc) 1.52 KB
<?php
/**
 * The template for displaying Archive pages.
 *
 * @package GeneratePress
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

	<div id="primary" <?php generate_do_element_classes( 'content' ); ?>>
		<main id="main" <?php generate_do_element_classes( 'main' ); ?>>
			<?php
			/**
			 * generate_before_main_content hook.
			 *
			 * @since 0.1
			 */
			do_action( 'generate_before_main_content' );

			if ( generate_has_default_loop() ) {
				if ( have_posts() ) :

					/**
					 * generate_archive_title hook.
					 *
					 * @since 0.1
					 *
					 * @hooked generate_archive_title - 10
					 */
           ?>
					<h1 class="archive-title">Newsletter Archive</h1>

          <p>Welcome to my newsletter archive. Here you will find a list of all previous issues of my newsletter, <b>The Meta Letter</b>.</p>

          <?php
					while ( have_posts() ) :

						the_post();

						generate_do_template_part( 'archive' );

					endwhile;

					/**
					 * generate_after_loop hook.
					 *
					 * @since 2.3
					 */
					do_action( 'generate_after_loop', 'archive' );

				else :

					generate_do_template_part( 'none' );

				endif;
			}

			/**
			 * generate_after_main_content hook.
			 *
			 * @since 0.1
			 */
			do_action( 'generate_after_main_content' );
			?>
		</main>
	</div>

	<?php
	/**
	 * generate_after_primary_content_area hook.
	 *
	 * @since 2.0
	 */
	do_action( 'generate_after_primary_content_area' );

	generate_construct_sidebars();

	get_footer();

    © 2021 GitHub, Inc.
    Terms
    Privacy
    Security
    Status
    Docs

    Contact GitHub
    Pricing
    API
    Training
    Blog
    About

Loading complete
