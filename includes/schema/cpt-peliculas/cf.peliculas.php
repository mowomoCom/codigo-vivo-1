<?php

/**
 * Creación de meta box para las películas
 */
add_action( 'add_meta_boxes', 'codigo_vivo_add_meta_box_peliculas' );
function codigo_vivo_add_meta_box_peliculas() {
    add_meta_box( 'meta-box-informacion-adicional', __( 'Información adicional', 'codigo_vivo' ), 'codigo_vivo_meta_box_informacion_adicional_callback', 'peliculas', 'side' );
}

/**
 * Agregamos custom fields para introducir información adicional acerca de las películas
 */
function codigo_vivo_meta_box_informacion_adicional_callback() {

    global $post;

    $_peliculas_valoracion = get_post_meta( $post->ID, '_peliculas_valoracion', true );

    ?>
        <label for="_peliculas_valoracion"><strong>Valoración:</strong></label>
        <br>
        <input name="_peliculas_valoracion" type="number" min="0" max="5" value="<?php echo $_peliculas_valoracion; ?>">
        <br>
        <small>Especifica la valoración de la película</small>
    <?php
}

/**
 * Guardamos la información especificada anteriormente en el metabox
 */
function codigo_vivo_save_post_peliculas( $post_id, $post, $update ) {
 
    if ( isset( $_POST[ '_peliculas_valoracion' ] ) ) {
        update_post_meta( $post_id, '_peliculas_valoracion', $_POST[ '_peliculas_valoracion' ] );
    }
 
}
add_action( 'save_post', 'codigo_vivo_save_post_peliculas', 10, 3 );
