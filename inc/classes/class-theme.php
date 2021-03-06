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
        Sidebars :: get_instance();
        Filters :: get_instance();

        $this -> setup_hooks();
    }

    protected function setup_hooks() {
        /** Actions */
        $this -> setup_theme();
    }

    public function setup_theme() {
        add_action( 'after_setup_theme', [ $this, 'support_settings_for_gutenberg' ] );
        add_action( 'after_setup_theme', [ $this, 'register_theme_color_palette' ] );
        add_action( 'after_setup_theme', [ $this, 'register_image_support' ] );
    }

    public function support_settings_for_gutenberg() {
        //  Soporte de hoja de estilos por defecto para Gutenberg
        add_theme_support( 'wp-block-styles' );
    }

    public function register_image_support() {
        //  Agrega soporte imagen destacada en las publicaciones
        add_theme_support( 'post-thumbnails' );          

        //  Registra un nuevos tamaños de imagen soportados por el Theme
        add_image_size( 'us', 437, 291, true );                                 //  con cropping activo
        add_image_size( 'specialties-landscape', 768, 515, true );              //  con cropping activo
        add_image_size( 'specialties-portrait', 435, 526, true );               //  con cropping activo
    }

    public function register_theme_color_palette() {
        //  Deshabilita la seleccion de colores personalizados
        add_theme_support( 'disable-custom-colors' );

        //  Agrega soporte paleta de colores del tema
        add_theme_support( 'editor-color-palette', [
            [
                'name'  => __( 'Red', 'pizzashop' ),
                'slug'  => 'red',
                'color' => '#A61206'
            ],
            [
                'name'  => __( 'Orange', 'pizzashop' ),
                'slug'  => 'orange',
                'color' => '#F19F30'
            ],
            [
                'name'  => __( 'Green', 'pizzashop' ),
                'slug'  => 'green',
                'color' => '#124727'
            ],
            [
                'name'  => __( 'White', 'pizzashop' ),
                'slug'  => 'white',
                'color' => '#FFFFFF'
            ],
            [
                'name'  => __( 'Black', 'pizzashop' ),
                'slug'  => 'black',
                'color' => '#000000'
            ]
        ] );
    }
        
}