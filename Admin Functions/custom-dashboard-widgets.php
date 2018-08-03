<?php
/**
 * Author: Hammer Garita | @hammergarita
 * Add custom dashboard widget with support information
 */
/*------------------------------------*\
	Create custom dashboard widget
\*------------------------------------*/

//Register new Widget, replace 'Theme Support' with your title
function custom_dashboard_widgets() {
  global $wp_meta_boxes;
  wp_add_dashboard_widget('custom_help_widget', 'Theme Support', 'custom_dashboard_help');
}

//Add content to the Widget
function custom_dashboard_help() {
  // Content of the Widget here
  echo '<p>Welcome to Custom Blog Theme! Need help? Contact the developer <a href="mailto:yourusername@gmail.com">here</a>.</p>';
}

add_action('wp_dashboard_setup', 'custom_dashboard_widgets');
