<?php
/**
 * Author: Hammer Garita | @hammergarita
 */
 
/*------------------------------------*\
	Remove Default Image Links in Posts
\*------------------------------------*/

function remove_imagelink_post() {
    $image_set = get_option( 'image_default_link_type' );
     
    if ($image_set !== 'none') {
        update_option('image_default_link_type', 'none');
    }
}
add_action('admin_init', 'remove_imagelink_post', 10);
