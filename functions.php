<?php
/** Theme Functions
 * @package PizzaShop
 */

if( ! defined( 'PATH_LOGO' ) ) {
    define( 'PATH_LOGO', get_template_directory_uri() .'/assets/build/images/logo.svg' );
}

if( ! defined( 'THEME_DIR_URI' ) ) {
    define( 
        'THEME_DIR_URI', 
        untrailingslashit( get_template_directory_uri() )     // WP Func: Elimina las barras inclinadas hacia adelante y hacia atrás si existen.
    );
}

function pizzashop_register_styles () { 
    wp_enqueue_style( 'normalize', THEME_DIR_URI. '/assets/build/css/normalize.css', [], '8.0.1', 'all' );
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Open+Sans&family=Raleway:wght@400;700;900&display=swap', [], '1.0.0' ); 
    wp_enqueue_style( 'style', get_stylesheet_uri(), [ 'normalize' ], filemtime( untrailingslashit( get_stylesheet_directory() ) .'/style.css' ), 'all' );
}
add_action( 'wp_enqueue_scripts', 'pizzashop_register_styles' );