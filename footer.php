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
        <?php 
            $args = [
                'theme_location'    => 'pizzashop-footer-menu',
                'container'         => 'nav',
                'container_id'      => 'menu',
                'container_class'   => 'menu menu-footer not-display',
                'after'             => '<span class="separator">|</span>',
            ];
            wp_nav_menu( $args );
        ?>

        <div class="address">
            <p>Avenida Siempreviva 742, Springfield</p>
            <p>Teléfono: +1-92-456-7890</p>
        </div><!-- .address -->

    </footer>

    <?php wp_footer(); ?>

</body>
</html>