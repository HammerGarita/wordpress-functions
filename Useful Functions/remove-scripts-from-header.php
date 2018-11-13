<?php

// Remove scripts from head.
function move_scripts_from_head_to_footer() {
    remove_action( 'wp_head', 'wp_print_scripts' );
    remove_action( 'wp_head', 'wp_print_head_scripts', 9 );
    remove_action( 'wp_head', 'wp_enqueue_scripts', 1 );
 
    add_action( 'wp_footer', 'wp_print_scripts', 5);
    add_action( 'wp_footer', 'wp_enqueue_scripts', 5);
    add_action( 'wp_footer', 'wp_print_head_scripts', 5);
}
add_action('wp_enqueue_scripts', 'move_scripts_from_head_to_footer');

?>
