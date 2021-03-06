<?php
/** Register Menus
 * @package PizzaShop
 */

namespace THEME\Inc;

use THEME\Inc\Traits\Singleton;

class Menus {
    use Singleton;

    protected function __construct() {
        // wp_die( 'Class Menus' );

        //  Cargamos Clases.
        $this -> setup_hooks();
    }

    protected function setup_hooks() {
        /** Actions */
        add_action( 'init', [ $this, 'register_menus'] );
    }

    public function register_menus() {
        register_nav_menus([
            'pizzashop-header-menu' => esc_html__( 'Header Menu', 'pizzashop' ),
            'pizzashop-social-menu' => esc_html__( 'Social Menu', 'pizzashop' ),
            'pizzashop-footer-menu' => esc_html__( 'Footer Menu', 'pizzashop' )
        ]);
    }

}