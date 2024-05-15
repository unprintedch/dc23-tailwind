<?php
// Custom functions
require_once(get_template_directory().'/functions/dc23-blocks-variation.php');
require_once(get_template_directory().'/functions/dc23-blocks-register.php');
require_once(get_template_directory().'/functions/dc23-reusable-blocks-menu.php');
require_once(get_template_directory().'/functions/dc23-functions.php');
// require_once(get_template_directory().'/functions/dc23-customizer.php');
require_once(get_template_directory().'/functions/dc23-editor-styles.php'); 



remove_theme_support( 'core-block-patterns' );

/**
 * Theme setup.
 */
function dc23_setup() {
	

	add_theme_support( 'title-tag' );

	register_nav_menus(
		array(
			'primary' => __( 'Primary Menu', 'dc23' ),
			'offcanvas' => __( 'Offcanvas Menu', 'dc23' )
		)
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);

	add_image_size( 'wide', 1920 );

    add_theme_support( 'custom-logo' );
	add_theme_support( 'post-thumbnails' );

	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );

	remove_theme_support( 'core-block-patterns' );

	add_theme_support( 'editor-styles' );
	add_editor_style();
}

add_action( 'after_setup_theme', 'dc23_setup' );

/**
 * Enqueue theme assets.
 */
function dc23_enqueue_scripts() {
	$theme = wp_get_theme();

	wp_enqueue_style( 'dc23-styles', get_stylesheet_directory_uri().'/css/app.css', array(), $theme->get( 'Version' ) );
	wp_enqueue_script( 'dc23-scripts', get_stylesheet_directory_uri().'/js/app.js' , array('jquery'), $theme->get( 'Version' ) );
}

add_action( 'wp_enqueue_scripts', 'dc23_enqueue_scripts' );


function enqueue_slick_slider() {
    // Enqueue Slick CSS
    wp_enqueue_style('slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');

    // Enqueue Slick Theme CSS (optional, for default styling)
	//wp_enqueue_style('slick-theme-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css');

    // Enqueue Slick JavaScript
    wp_enqueue_script('slick-js', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array('jquery'), null, true);
    
    // Enqueue your custom script to initialize the slider
   wp_enqueue_script('slick-init', get_stylesheet_directory_uri() . '/js/slick-init.js', array('slick-js'), null, true);
}
add_action('wp_enqueue_scripts', 'enqueue_slick_slider');



/**
 * Adds option 'li_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The curren item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function dc23_nav_menu_add_li_class( $classes, $item, $args, $depth ) {
	if ( isset( $args->li_class ) ) {
		$classes[] = $args->li_class;
	}

	if ( isset( $args->{"li_class_".$depth} ) ) {
		$classes[] = $args->{"li_class_".$depth};
	}

	return $classes;
}

add_filter( 'nav_menu_css_class', 'dc23_nav_menu_add_li_class', 10, 4 );

/**
 * Adds option 'submenu_class' to 'wp_nav_menu'.
 *
 * @param string  $classes String of classes.
 * @param mixed   $item The curren item.
 * @param WP_Term $args Holds the nav menu arguments.
 *
 * @return array
 */
function dc23_nav_menu_add_submenu_class( $classes, $args, $depth ) {
	if ( isset( $args->submenu_class ) ) {
		$classes[] = $args->submenu_class;
	}

	if ( isset( $args->{"submenu_class_".$depth} ) ) {
		$classes[] = $args->{"submenu_class_".$depth};
	}

	return $classes;
}

add_filter( 'nav_menu_submenu_css_class', 'dc23_nav_menu_add_submenu_class', 10, 3 );


