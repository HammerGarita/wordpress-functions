<?php
/**
 * Author: Hammer Garita | @hammergarita
 * Change the Admin Title Post
 */
/*------------------------------------*\
	Custom Admin Title Post
\*------------------------------------*/

//Change the placeholder 'Enter title here' in post editor
function change_title_post( $title ){
     $screen = get_current_screen();
     if  ( 'custom_post_type' == $screen->post_type ) { //change custom_post_type by the type of page you want to change the title
          $title = 'Change the title here';
     }
     return $title;
}
add_filter( 'enter_title_here', 'change_title_post' );
