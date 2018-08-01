<?php

/**
 * Author: Hammer Garita | @hammergarita
 * Custom functions, support, custom post types and more.
 */

/*------------------------------------*\
	External Modules/Files
\*------------------------------------*/

// Load any external files you have here
requiere_once ('folder/archivo.php');

/*------------------------------------*\
	Theme Support
\*------------------------------------*/

// Define the width of the embedded elements (for example youtube videos)
if (!isset($content_width))
{
    $content_width = 800;
}

//Add theme support (menu, thumbnails, RSS, HTML5, translate)
if (function_exists('add_theme_support'))
{
    // Add Menu Support
    add_theme_support('menus');

    // Add Thumbnail Theme Support
    add_theme_support('post-thumbnails');
    add_image_size('large', 700, '', true); // Large Thumbnail
    add_image_size('medium', 250, '', true); // Medium Thumbnail
    add_image_size('small', 120, '', true); // Small Thumbnail
    add_image_size('custom-size', 700, 200, true); // Custom Thumbnail Size call using the_post_thumbnail('custom-size');

    // Enables post and comment RSS feed links to head
    add_theme_support('automatic-feed-links');
    
    // Enable HTML5 support.
    add_theme_support( 'html5', array( 'gallery', 'caption' ) );

    // Localisation Support
    load_theme_textdomain('my_theme', get_template_directory() . '/languages');
}

/*------------------------------------*\
	Functions
\*------------------------------------*/

// Theme navigation
function my_theme_nav() {
    wp_nav_menu(
    array(
        'theme_location'  => 'header-menu',
        'menu'            => '',
        'container'       => 'div',
        'container_class' => 'menu-{menu slug}-container',
        'container_id'    => '',
        'menu_class'      => 'menu',
        'menu_id'         => '',
        'echo'            => true,
        'fallback_cb'     => 'wp_page_menu',
        'before'          => '',
        'after'           => '',
        'link_before'     => '',
        'link_after'      => '',
        'items_wrap'      => '<ul>%3$s</ul>',
        'depth'           => 0,
        'walker'          => '',
        )
    );
}

// Load Theme scripts (header.php)
function my_theme_header_scripts() {
    if ( $GLOBALS['pagenow'] != 'wp-login.php' && ! is_admin() ) {
        // jQuery
        wp_deregister_script( 'jquery' );
        wp_register_script( 'jquery', get_template_directory_uri() . '/js/lib/jquery.js', array(), '1.11.1' );
        // Custom scripts
        wp_register_script( 'mythemescripts', get_template_directory_uri() . '/js/scripts.js', array( 'jquery' ), '1.0.0' );
        // Enqueue Scripts
        wp_enqueue_script( 'mythemescripts' );
    }
} add_action('init', 'my_theme_header_scripts'); // Add Custom Scripts to wp_head

// Load Theme styles
function my_theme_styles() {
    // normalize-css
    wp_register_style( 'normalize', get_template_directory_uri() . '/css/lib/normalize.css', array(), '7.0.0' );
    wp_enqueue_style( 'normalize' ); // Enqueue it!
    // Custom CSS
    wp_register_style( 'script', get_template_directory_uri() . '/style.css', array( 'normalize' ), '1.0' );
    wp_enqueue_style( 'script' ); // Enqueue it!
} add_action('wp_enqueue_scripts', 'my_theme_styles'); // Add Theme Stylesheet

// Register Theme Navigation
function register_my_theme_menu()
{
    register_nav_menus(array( // Using array to specify more menus if needed
        'header-menu' => __('Header Menu', 'my_theme'), // Main Navigation
        //'sidebar-menu' => __('Sidebar Menu', 'my_theme'), // Sidebar Navigation
        //'extra-menu' => __('Extra Menu', 'my_theme') // Extra Navigation if needed (duplicate as many as you need!)
    ));
} add_action('init', 'register_my_theme_menu'); // Add HTML5 Blank Menu

// Remove the <div> surrounding the dynamic navigation to cleanup markup
function my_wp_nav_menu_args($args = '')
{
    $args['container'] = false;
    return $args;
} add_filter('wp_nav_menu_args', 'my_wp_nav_menu_args'); // Remove surrounding <div> from WP Navigation

// Remove Injected classes, ID's and Page ID's from Navigation <li> items
function my_css_attributes_filter($var)
{
    return is_array($var) ? array() : '';
} add_filter('nav_menu_css_class', 'my_css_attributes_filter', 100, 1); // Remove Navigation <li> injected classes

// Remove invalid rel attribute values in the categorylist
function remove_category_rel_from_category_list($thelist)
{
    return str_replace('rel="category tag"', 'rel="tag"', $thelist);
} add_filter('the_category', 'remove_category_rel_from_category_list'); // Remove invalid rel attribute


