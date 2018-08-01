<?php

/**
 * Author: Hammer Garita | @hammergarita
 * Create Custom Excerpts
 */

/*------------------------------------*\
	Custom Excerpt
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
