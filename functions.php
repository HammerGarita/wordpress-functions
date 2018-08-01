<?php

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
    load_theme_textdomain('my_theme_textdomain', get_template_directory() . '/languages');
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
}



