<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Tammi_Theme
 */

get_header();
?>
<div class="single-site-content">
    <?php if ( have_posts() ) : 
        while ( have_posts() ) : the_post();
            the_content(); 
        endwhile; 
    endif; ?>
</div>
<?php get_footer();
