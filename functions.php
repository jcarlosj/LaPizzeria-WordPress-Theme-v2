<?php
/** Theme Functions
 * @package PizzaShop
 */

function pizzashop_register_styles () {
    wp_enqueue_style( 'style', get_stylesheet_uri(), [], filemtime( untrailingslashit( get_stylesheet_directory() ) .'/style.css' ), 'all' );
}
add_action( 'wp_enqueue_scripts', 'pizzashop_register_styles' );