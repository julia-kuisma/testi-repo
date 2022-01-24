<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Tammi_Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link href="https://fonts.googleapis.com/css?family=Asap:400,500,700&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/3fa32d0f23.js" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://use.typekit.net/gkv8nsg.css">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<header id="masthead" class="site-header">
	<div class="container">
		<div class="row">
			<div class="col-12">
				
			</div>
		</div>
	</div>
</header><!-- #masthead -->
<div class="nav-bar">
	<div class="container">
		<?php wp_nav_menu( array( 'theme_location' => 'menu-1', 'container_class' => 'main-menu' ) ); ?>
	</div>
</div>

<div id="content" class="site-content">
