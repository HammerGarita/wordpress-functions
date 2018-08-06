<?php
/**
 * Author: Hammer Garita | @hammergarita
 * @link https://codex.wordpress.org/Function_Reference/wp_is_mobile
 */
/*------------------------------------*\
	Detects when a user is on a mobile device 
  and allows you to display content accordingly
\*------------------------------------*/

if( wp_is_mobile() ) :
echo 'Visit our website on your desktop for a richer user experience'
endif
