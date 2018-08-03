<?php
/**
 * Author: Hammer Garita | @hammergarita
 * @link https://codex.wordpress.org/Function_Reference/remove_role
 */
/*------------------------------------*\
	Remove User Roles
\*------------------------------------*/

//Remove User roles
add_action( 'admin_init', function () {
  remove_role( 'editor' );
  remove_role( 'author' );
  remove_role( 'contributor' );
  remove_role( 'subscriber' );
});
