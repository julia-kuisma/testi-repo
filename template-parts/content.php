<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Tammi_Theme
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

		<h1><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h1>

</article><!-- #post-<?php the_ID(); ?> -->
