<?php
/**
 * Author: Hammer Garita | @hammergarita
 * @link https://developer.wordpress.org/reference/functions/get_the_category/
 * @linl https://developer.wordpress.org/reference/functions/get_the_terms/
 */
/*------------------------------------*\
	Get the terms of the taxonomy that are attached to the post.
\*------------------------------------*/

// Get Custom Taxonomies from Post
function get_the_category($category_name){
  $taxonomies = "";
  $terms = get_the_terms( $post->ID, $category_name );
  if ( $terms && ! is_wp_error( $terms ) ) :
    $taxonomies = array();
    foreach ( $terms as $term ) {
        $taxonomies[] = $term->name;
    }
    $taxonomies = implode(", ", $taxonomies );
  endif;
  return $taxonomies;
}

// Call using get_the_category('taxonomie_name');
// Replace taxonomie_name with the name of your taxonomy


/*------------------------------------*\
	Example of use
\*------------------------------------*/

$custom_category = get_the_category('custom_category'); //Call the function
if(!empty($custom_category)):
	echo '<p>'. $custom_category .'</p>';
endif;
