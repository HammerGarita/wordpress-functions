<?php
/**
 * Author: Hammer Garita | @hammergarita
 * Create Custom Excerpts
 */
/*------------------------------------*\
	Custom Taxonomy
\*------------------------------------*/

// Register Custom Taxonomy
  function custom_taxonomy() {

  	$labels = array(
  		'name'                       => _x( 'Custom Taxonomy', 'Taxonomy General Name', 'Taxonomy' ),
  		'singular_name'              => _x( 'Custom Taxonomy', 'Taxonomy Singular Name', 'Taxonomy' ),
  		'menu_name'                  => __( 'Custom Taxonomys', 'Taxonomy' ),
  		'all_items'                  => __( 'Todos los Custom Taxonomys', 'Taxonomy' ),
  		'parent_item'                => __( 'Custom Taxonomy Padre', 'Taxonomy' ),
  		'parent_item_colon'          => __( 'Custom Taxonomy Padre:', 'Taxonomy' ),
  		'new_item_name'              => __( 'Nuevo Custom Taxonomy', 'Taxonomy' ),
  		'add_new_item'               => __( 'Añadir nuevo Custom Taxonomy', 'Taxonomy' ),
  		'edit_item'                  => __( 'Editar Custom Taxonomy', 'Taxonomy' ),
  		'update_item'                => __( 'Actualizar Custom Taxonomy', 'Taxonomy' ),
  		'view_item'                  => __( 'Ver Custom Taxonomy', 'Taxonomy' ),
  		'separate_items_with_commas' => __( 'Separar Custom Taxonomys por coma', 'Taxonomy' ),
  		'add_or_remove_items'        => __( 'Agregar o eliminar Custom Taxonomys', 'Taxonomy' ),
  		'choose_from_most_used'      => __( 'Más usadas', 'Taxonomy' ),
  		'popular_items'              => __( 'Custom Taxonomys populares', 'Taxonomy' ),
  		'search_items'               => __( 'Buscar Custom Taxonomys', 'Taxonomy' ),
  		'not_found'                  => __( 'No se encontraron Custom Taxonomys', 'Taxonomy' ),
  		'no_terms'                   => __( 'Sin Custom Taxonomys', 'Taxonomy' ),
  		'items_list'                 => __( 'Lista de Custom Taxonomys', 'Taxonomy' ),
  		'items_list_navigation'      => __( 'Navegación de Custom Taxonomys', 'Taxonomy' ),
  	);
  	$rewrite = array(
  		'slug'                       => 'custom-taxonomy', //url for the taxonomy
  		'with_front'                 => true, //example: /custom-taxonomy/new-url/
  		'hierarchical'               => false,
  	);
  	$args = array(
  		'labels'                     => $labels,
  		'hierarchical'               => true, // true = categorys, false = tags
  		'public'                     => true,
  		'show_ui'                    => true,
  		'show_admin_column'          => true,
  		'show_in_nav_menus'          => true,
  		'show_tagcloud'              => true,
  		'rewrite'                    => $rewrite,
  	);
  	register_taxonomy( 'custom_taxonomy', array( 'custom_post_type' ), $args );
  }
  add_action( 'init', 'custom_taxonomy', 0 );
