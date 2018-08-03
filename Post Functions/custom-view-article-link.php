<?php

/**
 * Author: Hammer Garita | @hammergarita
 * Create a custom view article link to post
 */
 
/*------------------------------------*\
	Custom View Article Link
\*------------------------------------*/

// Custom View Article link to Post
function my_theme_view_article($more)
{
    global $post;
    return '... <a class="view-article" href="' . get_permalink($post->ID) . '">' . __('View Article', 'my_theme') . '</a>';
} 

add_filter('excerpt_more', 'my_theme_view_article'); // Add 'View Article' button instead of [...] for Excerpts
