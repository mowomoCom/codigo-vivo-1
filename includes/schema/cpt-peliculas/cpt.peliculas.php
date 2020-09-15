<?php

/**
 * Inclusión de archivos relacionados con la estructura del Custom Post Type "Películas"
 */
include plugin_dir_path( __FILE__ ) . 'cf.peliculas.php';

/**
 * Creamos un nuevo tipo de post llamado "Películas"
 */
add_action( 'init', 'codigo_vivo_register_post_type_peliculas' );
function codigo_vivo_register_post_type_peliculas() {

    $labels = array(
        'name' => __( 'Películas', 'codigo_vivo' ),
        'singular_name' => __( 'Película', 'codigo_vivo' ),
        'menu_name' => __( 'Películas', 'codigo_vivo' ),
        'name_admin_bar' => __( 'Película', 'codigo_vivo' ),
        'add_new'       => __( 'Añadir nueva', 'codigo_vivo' ),
        'add_new_item'       => __( 'Añadir nueva película', 'codigo_vivo' ),
    );

    $argumentos = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'show_in_rest'       => true,
        'hierarchical'       => false,
        'supports'           => array( 'title', 'editor',  'excerpt' ),
    );

    register_post_type( 'peliculas', $argumentos );

}
