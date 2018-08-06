<?php
/**
 * Author: Hammer Garita | @hammergarita
 * @link https://codex.wordpress.org/Plugin_API/Filter_Reference/login_errors
 */
/*------------------------------------*\
	Hide Login Errors
\*------------------------------------*/

function no_wordpress_errors(){
  return 'Something is wrong!';
}
add_filter( 'login_errors', 'no_wordpress_errors' );
