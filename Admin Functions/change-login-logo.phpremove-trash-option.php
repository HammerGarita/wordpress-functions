<?php
/**
 * Author: Hammer Garita | @hammergarita
 * @link https://developer.wordpress.org/reference/hooks/page_row_actions-6/
 */
/*------------------------------------*\
	Remove Trash Option
\*------------------------------------*/

//Remove Trash Option from Admin
function remove_trash_option( $actions )
{
     if( get_post_type() === 'custom_post_type' ) //indicate the type of page on which the option will be removed
         unset( $actions['trash'] );
      return $actions;
}

add_filter( 'page_row_actions', 'remove_trash_options', 10, 1 );
