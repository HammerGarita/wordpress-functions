<?php

/**
 * Author: Hammer Garita | @hammergarita
 * Custom functions, support, custom post types and more.
 */
/*------------------------------------*\
	Template Custom Post Type
\*------------------------------------*/

// Register Custom Post Typw
  function custom_post_type() {

  	$labels = array(
  		'name'                  => _x( 'Custom Post Type', 'Post Type General Name', 'my_theme' ),
  		'singular_name'         => _x( 'Custom Post Type', 'Post Type Singular Name', 'my_theme' ),
  		'menu_name'             => __( 'Custom Post Types', 'my_theme' ),
  		'name_admin_bar'        => __( 'Custom Post Type', 'my_theme' ),
  		'archives'              => __( 'Archivo de Custom Post Types', 'my_theme' ),
  		'attributes'            => __( 'Atributos del Custom Post Type', 'my_theme' ),
  		'parent_item_colon'     => __( 'Custom Post Type Padre:', 'my_theme' ),
  		'all_items'             => __( 'Todos los Custom Post Type', 'my_theme' ),
  		'add_new_item'          => __( 'Añadir nuevo Custom Post Type', 'my_theme' ),
  		'add_new'               => __( 'Añadir nuevo Custom Post Type', 'my_theme' ),
  		'new_item'              => __( 'Nuevo Custom Post Type', 'my_theme' ),
  		'edit_item'             => __( 'Editar Custom Post Type', 'my_theme' ),
  		'update_item'           => __( 'Actualizar Custom Post Type', 'my_theme' ),
  		'view_item'             => __( 'Ver Custom Post Type', 'my_theme' ),
  		'view_items'            => __( 'Ver Custom Post Types', 'my_theme' ),
  		'search_items'          => __( 'Buscar Custom Post Type', 'my_theme' ),
  		'not_found'             => __( 'No se encontro Custom Post Type', 'my_theme' ),
  		'not_found_in_trash'    => __( 'No se encontro en la Papelera', 'my_theme' ),
  		'featured_image'        => __( 'Imagen Principal', 'my_theme' ),
  		'set_featured_image'    => __( 'Establecer imagen destacada', 'my_theme' ),
  		'remove_featured_image' => __( 'Eliminar imagen destacada', 'my_theme' ),
  		'use_featured_image'    => __( 'Usar como imagen destacada', 'my_theme' ),
  		'insert_into_item'      => __( 'Insertar dentro de Custom Post Type', 'my_theme' ),
  		'uploaded_to_this_item' => __( 'Agregado a Custom Post Types', 'my_theme' ),
  		'items_list'            => __( 'Lista de Custom Post Types', 'my_theme' ),
  		'items_list_navigation' => __( 'Navegación de Custom Post Types', 'my_theme' ),
  		'filter_items_list'     => __( 'Filtrar Custom Post Types', 'my_theme' ),
      'parent_item_colon' => '',
  	);
    $rewrite = array(
      'slug'                       => 'custom-post-type',
      'with_front'                 => false,
      'pages'                      => true,
  		'feeds'                      => true,
    );
  	$args = array(
  		'label'                 => __( 'Custom Post Type', 'my_theme' ),
  		'description'           => __( 'Datos del Custom Post Type', 'my_theme' ),
  		'labels'                => $labels,
  		'supports'              => array( 'title', 'editor', 'thumbnail'),
  		'hierarchical'          => true,
  		'public'                => true,
  		'show_ui'               => true,
  		'show_in_menu'          => true,
  		'menu_position'         => 5,
  		'menu_icon'             => 'dashicons-store',
  		'show_in_admin_bar'     => true,
  		'show_in_nav_menus'     => true,
  		'can_export'            => true,
  		'has_archive'           => true,
  		'exclude_from_search'   => false,
  		'publicly_queryable'    => true,
  		'capability_type'       => 'page',
      'rewrite'               => $rewrite,
  	);
  	register_post_type( 'custom_post_type', $args );
  }
  add_action( 'init', 'custom_post_type', 0 );
