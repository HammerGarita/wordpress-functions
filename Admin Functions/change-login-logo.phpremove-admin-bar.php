<?php
/**
 * Author: Hammer Garita | @hammergarita
 * @link https://codex.wordpress.org/Function_Reference/show_admin_bar
 */
/*------------------------------------*\
	Remove Admin Bar
\*------------------------------------*/

// Remove Admin bar
function remove_admin_bar()
{
    return false;
}

add_filter('show_admin_bar', 'remove_admin_bar');
