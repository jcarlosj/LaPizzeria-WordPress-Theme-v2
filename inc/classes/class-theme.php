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

        $this -> setup_hooks();
    }

    protected function setup_hooks() {
        /** Actions */
        add_action( 'after_setup_theme', [ $this, 'setup_theme' ] );
    }

    public function setup_theme() {}
        
}