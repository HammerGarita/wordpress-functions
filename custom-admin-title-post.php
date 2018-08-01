<?php
/**
 * Author: Hammer Garita | @hammergarita
 * 
 */
/*------------------------------------*\
	Custom Admin Title Post
\*------------------------------------*/

//Change the Title Admin Post
function change_title_post( $title ){
     $screen = get_current_screen();
     if  ( 'custom_post_type' == $screen->post_type ) {
          $title = 'Change the title here';
     }
     return $title;
}
add_filter( 'enter_title_here', 'change_title_post' );
