<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tammi_Theme
 */

get_header(); ?>

<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<div class="content">
				<?php if ( have_posts() ) :
					while ( have_posts() ) : the_post();
						the_content();
						echo "Testi";
					endwhile;
				endif; ?>
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
    
<?php get_footer();
