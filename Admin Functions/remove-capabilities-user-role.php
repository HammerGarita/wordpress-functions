
<?php
/**
 * Author: Hammer Garita | @hammergarita
 * @link https://codex.wordpress.org/Function_Reference/remove_cap
 */
/*------------------------------------*\
	Remove Capabilities For Any User Role
\*------------------------------------*/

function wpsites_remove_editor_capabilities() {

$editor = get_role( 'editor' ); //Get Role

$caps = array(
  'delete_others_pages',
  'delete_others_posts',
  'delete_pages',
  'delete_posts',
  'delete_private_pages',
  'delete_private_posts',
  'delete_published_pages',
  'delete_published_posts',
);

foreach ( $caps as $cap ) {
    $editor->remove_cap( $cap ); //Remove Capabilities
    }
}

add_action( 'init', 'wpsites_remove_editor_capabilities' );
