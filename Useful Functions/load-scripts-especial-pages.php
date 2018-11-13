<?php

function my_theme_header_scripts() {
    if ( $GLOBALS['pagenow'] != 'wp-login.php' && ! is_admin() ) {
        
        if( is_page( array( 'about-us', 'contacto', 'management' ) ) ){
            wp_register_script('googlemapscript', 'https://maps.googleapis.com/maps/api/js?v=3.exp&amp;sensor=false', array(), true);
            wp_register_script( 'mapscripts', get_template_directory_uri() . '/js/map.js', array( 'jquery', 'googlemapscript' ), '1.0.0', true );
            wp_enqueue_script( 'googlemapscript' );
            wp_enqueue_script( 'mapscripts' );
        }
    }
} add_action('init', 'my_theme_header_scripts'); // Add Custom Scripts to wp_head

?>
