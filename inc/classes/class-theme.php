<?php
/** Boostraps the Theme
 * @package PizzaShop
 */

namespace THEME\Inc;

use THEME\Inc\Traits\Singleton;

class Theme {
    use Singleton;

    protected function __construct() {
        // wp_die( "Theme!"  );

        /** Carga clases */
        Assets :: get_instance();
        Menus :: get_instance();

        $this -> setup_hooks();
    }

    protected function setup_hooks() {
        /** Actions */
        $this -> setup_theme();
    }

    public function setup_theme() {
        add_action( 'after_setup_theme', [ $this, 'register_image_support' ] );
    }

    public function register_image_support() {
        //  Agrega soporte imagen destacada en las publicaciones
        add_theme_support( 'post-thumbnails' );          

        //  Registra un nuevos tamaños de imagen soportados por el Theme
        add_image_size( 'us', 437, 291, true );                                 //  con cropping activo
        add_image_size( 'specialties-landscape', 768, 515, true );              //  con cropping activo
        add_image_size( 'specialties-portrait', 435, 526, true );               //  con cropping activo
    }
        
}