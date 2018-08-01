
<?php
/**
 * Author: Hammer Garita | @hammergarita
 * Create Custom Excerpts
 */
/*------------------------------------*\
	Custom Gravatar
\*------------------------------------*/

// Custom Gravatar in Settings > Discussion
function html5blankgravatar ($avatar_defaults)
{
    $myavatar = get_template_directory_uri() . '/img/gravatar.jpg';
    $avatar_defaults[$myavatar] = "Custom Gravatar";
    return $avatar_defaults;
} 

add_filter('avatar_defaults', 'html5blankgravatar'); // Custom Gravatar in Settings > Discussion
