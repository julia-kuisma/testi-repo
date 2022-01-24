<?php
/**
 * Tammi Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Tammi_Theme
 */

if ( ! function_exists( 'tammi_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function tammi_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Tammi Theme, use a find and replace
		 * to change 'tammi-theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'tammi-theme', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'tammi-theme' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'tammi_theme_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
		
		//Add support for page excerpts.

		add_post_type_support( 'page', 'excerpt' );
	}
endif;
add_action( 'after_setup_theme', 'tammi_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function tammi_theme_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'tammi_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'tammi_theme_content_width', 0 );


/**
 * Enqueue scripts and styles.
 */
function tammi_theme_scripts() {
	wp_enqueue_style('bootstrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css');

    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Raleway:400,600,700,800', false);

	wp_enqueue_style( 'tammi-theme-style', get_stylesheet_uri() );

	wp_enqueue_script('jquery');
	wp_enqueue_script('tammi-theme-match-height', get_template_directory_uri() . '/js/jquery.matchHeight.js');
	wp_enqueue_script('popper', "https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js");
	wp_enqueue_script('bootstrap', "https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js");

	wp_enqueue_script( 'tammi-theme-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'tammi_theme_scripts' );

// Magnific Popup
add_action('wp_enqueue_scripts', 'enqueue_magnificpopup_styles');
function enqueue_magnificpopup_styles() {
    wp_register_style('magnific_popup_style', get_stylesheet_directory_uri().'/magnific-popup/magnific-popup.css');
    wp_enqueue_style('magnific_popup_style');
}
add_action('wp_enqueue_scripts', 'enqueue_magnificpopup_scripts');
function enqueue_magnificpopup_scripts() {
    wp_register_script('magnific_popup_script', get_stylesheet_directory_uri().'/magnific-popup/jquery.magnific-popup.min.js', array('jquery'));
    wp_enqueue_script('magnific_popup_script');
    wp_register_script('magnific_init_script', get_stylesheet_directory_uri().'/magnific-popup/jquery.magnific-popup-init.js', array('jquery'));
    wp_enqueue_script('magnific_init_script');
}

// Enqueue Slick scripts and styles
add_action( 'wp_enqueue_scripts', 'themeprefix_slick_enqueue_scripts_styles' );
function themeprefix_slick_enqueue_scripts_styles() {
	wp_enqueue_script( 'slickjs', get_stylesheet_directory_uri() . '/slick/slick.min.js', array( 'jquery' ), '1.6.0', true );
	wp_enqueue_script( 'slickjs-init', get_stylesheet_directory_uri(). '/js/slick-init.js', array( 'slickjs' ), '1.6.0', true );
	wp_enqueue_style( 'slickcss', get_stylesheet_directory_uri() . '/slick/slick.css', '1.6.0', 'all');
	wp_enqueue_style( 'slickcsstheme', get_stylesheet_directory_uri(). '/slick/slick-theme.css', '1.6.0', 'all');
}

// Custom login page
function my_login_logo() {
	echo '
		<style type="text/css">
		body {
			background:#f42967;
		}
		#login h1 a, .login h1 a {
    	background-image: url('.get_template_directory_uri().'/images/td-logo.svg);
			height:77px;
			width:300px;
			background-size: 300px 77px;
			background-repeat: no-repeat;
      padding-bottom: 30px;
    }
  </style>
	';
 }
add_action( 'login_head', 'my_login_logo' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title'     => 'Sivuston yleiset asetukset',
        'menu_title'    => 'Sivuston yleiset asetukset',
        'menu_slug'     => 'sivuston-yleiset-asetukset',
        'capability'    => 'edit_posts',
        'redirect'        => false
    ));
}

function tammi_gb_categories( $categories ) {
	return array_merge(
		[
			[
				'slug'  => 'tammi-lohkot',
				'title' => __( 'Tammi lohkot' ),
			],
		],
		$categories
	);
}
add_action( 'block_categories', 'tammi_gb_categories', 10, 2 );

add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types() {

    if( function_exists('acf_register_block_type') ) {
		acf_register_block_type(array(
            'name'              => 'yleinen-lohko',
            'title'             => __('Lohko: Yleinen lohko'),
            'description'       => __('A custom testimonial block.'),
            'render_template'   => 'blocks/yleinen-lohko.php',
            'category'          => 'tammi-lohkot',
            'icon'              => 'admin-comments',
            'keywords'          => array( 'testimonial', 'quote' ),
        ));
    }
}

function create_posttype() {
    register_post_type( 'yleiset-lohkot',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Yleiset lohkot' ),
                'singular_name' => __( 'Yleinen lohko' )
            ),
            'public' => true,
            'has_archive' => true,
            'show_in_rest' => true,
 
        )
    );
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );