<?php
/** Theme Functions
 * @package PizzaShop
 */

if( ! defined( 'THEME_DIR_PATH' ) ) {
    define( 
        'THEME_DIR_PATH', 
        untrailingslashit( get_template_directory() )     // WP Func: Elimina las barras inclinadas hacia adelante y hacia atrás si existen.
    );
}

require_once THEME_DIR_PATH .'/inc/helpers/global.php';     //  Incluirá todas las definiciones globales para el tema

function pizzashop_register_styles () { 
    wp_enqueue_style( 'main', THEME_DIR_URI. '/assets/build/css/main.css', [], filemtime( THEME_BUILD_CSS_DIR_PATH .'/main.css' ), 'all' );    //  Normalize se concatea a este archivo
    wp_enqueue_style( 'style', get_stylesheet_uri(), [ 'normalize' ], filemtime( untrailingslashit( get_stylesheet_directory() ) .'/style.css' ), 'all' );
}
add_action( 'wp_enqueue_scripts', 'pizzashop_register_styles' );