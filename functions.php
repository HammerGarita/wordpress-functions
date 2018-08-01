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
	Remove feeds and wordpress-specific content that is generated on the wp_head hook.
\*------------------------------------*/

// Remove Actions
remove_action('wp_head', 'feed_links_extra', 3); // Display the links to the extra feeds such as category feeds
remove_action('wp_head', 'feed_links', 2); // Display the links to the general feeds: Post and Comment Feed
remove_action('wp_head', 'rsd_link'); // Display the link to the Really Simple Discovery service endpoint, EditURI link
remove_action('wp_head', 'wlwmanifest_link'); // Display the link to the Windows Live Writer manifest file.
remove_action('wp_head', 'index_rel_link'); // Index link
remove_action('wp_head', 'parent_post_rel_link', 10, 0); // Prev link
remove_action('wp_head', 'start_post_rel_link', 10, 0); // Start link
remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0); // Display relational links for the posts adjacent to the current post.
remove_action('wp_head', 'wp_generator'); // Display the XHTML generator that is generated on the wp_head hook, WP version
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
remove_action('wp_head', 'rel_canonical');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0);

/*------------------------------------*\
	Functions
\*------------------------------------*/

// Theme navigation, call using my_theme_nav();
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

// If Dynamic Sidebar Exists
if (function_exists('register_sidebar'))
{
    // Define Sidebar Widget Area 1
    register_sidebar(array(
        'name' => __('Widget Area 1', 'my_theme'),
        'description' => __('Description for this widget-area...', 'my_theme'),
        'id' => 'widget-area-1',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));

    // Define Sidebar Widget Area 2
    register_sidebar(array(
        'name' => __('Widget Area 2', 'my_theme'),
        'description' => __('Description for this widget-area...', 'my_theme'),
        'id' => 'widget-area-2',
        'before_widget' => '<div id="%1$s" class="%2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>'
    ));
}

// Remove wp_head() injected Recent Comment styles
function my_remove_recent_comments_style()
{
    global $wp_widget_factory;
    remove_action('wp_head', array(
        $wp_widget_factory->widgets['WP_Widget_Recent_Comments'],
        'recent_comments_style'
    ));
} add_action('widgets_init', 'my_remove_recent_comments_style'); // Remove inline Recent Comment Styles from wp_head()

// Pagination for paged posts, Page 1, Page 2, Page 3, with Next and Previous Links, No plugin
function my_theme_pagination()
{
    global $wp_query;
    $big = 999999999;
    echo paginate_links(array(
        'base' => str_replace($big, '%#%', get_pagenum_link($big)),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages
    ));
} add_action('init', 'my_theme_pagination'); // Add our HTML5 Pagination


// Remove 'text/css' from our enqueued stylesheet
function my_theme_style_remove($tag)
{
    return preg_replace('~\s+type=["\'][^"\']++["\']~', '', $tag);
} add_filter('style_loader_tag', 'my_theme_style_remove'); // Remove 'text/css' from enqueued stylesheet

// Remove thumbnail width and height dimensions that prevent fluid images in the_thumbnail
function remove_thumbnail_dimensions( $html )
{
    $html = preg_replace('/(width|height)=\"\d*\"\s/', "", $html);
    return $html;
} 
add_filter('post_thumbnail_html', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to thumbnails
add_filter('image_send_to_editor', 'remove_thumbnail_dimensions', 10); // Remove width and height dynamic attributes to post images

/*------------------------------------*\
	Special Functions
\*------------------------------------*/

// Custom Excerpts
function excerpt_lenght($length) // Create 20 Word Callback for Excerpts, call using my_theme_custom_excerpt('excerpt_lenght');
{
    return 20;
}

// Create the Custom Excerpts callback
function my_theme_custom_excerpt($length_callback = '', $more_callback = '')
{
    global $post;
    if (function_exists($length_callback)) {
        add_filter('excerpt_length', $length_callback);
    }
    if (function_exists($more_callback)) {
        add_filter('excerpt_more', $more_callback);
    }
    $output = get_the_excerpt();
    $output = apply_filters('wptexturize', $output);
    $output = apply_filters('convert_chars', $output);
    $output = '<p>' . $output . '</p>';
    echo $output;
}

// Custom View Article link to Post
function my_theme_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'my_theme') . '</a>';
} add_filter('excerpt_more', 'my_theme_view_article'); // Add 'View Article' button instead of [...] for Excerpts

// Remove Admin bar
function remove_admin_bar()
{
    return false;
} add_filter('show_admin_bar', 'remove_admin_bar'); // Remove Admin bar

// Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
} add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
