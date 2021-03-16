<?php
/** Footer Template File 
 * @package PizzaShop
 */
?>

    <div class="container file-name">
        <span>
            <?php esc_html_e( basename( __FILE__ ) ); ?>
        </span>
    </div>

    <footer class="site-footer">
        <div class="footer-menu">

            <?php 
                if( has_nav_menu( 'pizzashop-footer-menu' ) ) :
                    $args = [
                        'theme_location'    => 'pizzashop-footer-menu',
                        'container'         => 'nav',
                        'container_id'      => 'menu',
                        'container_class'   => 'menu menu-footer',
                        'after'             => '<span class="separator">|</span>',
                    ];
                    wp_nav_menu( $args );
                endif;
            ?>

            <div class="address">
                <p>Avenida Siempreviva 742, Springfield</p>
                <p>Teléfono: +1-92-456-7890</p>
            </div><!-- .address -->

        </div><!-- .footer-menu -->

    </footer>

    <?php wp_footer(); ?>

</body>
</html>