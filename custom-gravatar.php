
<?php
/**
 * Author: Hammer Garita | @hammergarita
 * Create Custom Excerpts
 */
/*------------------------------------*\
	Custom Gravatar
\*------------------------------------*/

// Custom Gravatar in Settings > Discussion
function my_theme_gravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
} 

add_filter('avatar_defaults', 'my_theme_gravatar'); // Custom Gravatar in Settings > Discussion
