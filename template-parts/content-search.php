<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tammi_Theme
 */

?>
<div class="container searchresults">
	<div class="row">
		<div class="col-md-12">
			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>

					<?php if ( 'post' === get_post_type() ) : ?>
					<div class="entry-meta">
						<!-- <?php
						tammi_theme_posted_on();
						tammi_theme_posted_by();
						?> -->
					</div><!-- .entry-meta -->
					<?php endif; ?>

				<?php tammi_theme_post_thumbnail(); ?>

				<div class="entry-summary">
					<?php the_excerpt(); ?>
				</div><!-- .entry-summary -->

			</article><!-- #post-<?php the_ID(); ?> -->
		</div>
	</div>
</div>