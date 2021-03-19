<?php
/** Register Sidebars
 * @package PizzaShop
 */

namespace THEME\Inc;

use THEME\Inc\Traits\Singleton;

class Sidebars {
    use Singleton;

    protected function __construct() {
        // wp_die( 'Class Sidebars' );

        //  Cargamos Clases.
        $this -> setup_hooks();
    }

    protected function setup_hooks() {
        /** Actions */
        add_action( 'widgets_init', [ $this, 'register_sidebars' ] );
    }

    public function register_sidebars() {
        /* Register the 'primary' sidebar. */
        register_sidebar(
            array(
                'id'            => 'blog-sidebar',
                'name'          => __( 'Blog Sidebar', 'pizzashop' ),
                'description'   => __( 'Main sidebar.' ),
                'before_widget' => '<div id="%1$s" class="widget widget-sidebar %2$s">',
                'after_widget'  => '</div>',
                'before_title'  => '<h3 class="widget-title">',
                'after_title'   => '</h3>'
            )
        );
    }

}