<?php
/** Enqueue Theme Filters
 * @package Aquila
 */

namespace THEME\Inc;

use THEME\Inc\Traits\Singleton;

class Filters {
    use Singleton;

    protected function __construct() {
        // wp_die( 'Class Filters' );

        //  Cargamos Clases.
        $this -> setup_hooks();
    }

    protected function setup_hooks() {
        /** Filters */
        add_filter( 'next_posts_link_attributes', [ $this, 'change_pagination_element_classes' ] );
        add_filter( 'previous_posts_link_attributes', [ $this, 'change_pagination_element_classes' ] );
    }

    public function change_pagination_element_classes() {
        return 'class="btn btn-secondary"';
    }

}