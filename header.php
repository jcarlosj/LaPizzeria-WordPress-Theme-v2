<?php
/** Header Template File 
 * @package PizzaShop
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body>

    <div class="file-name container">
        <span>
            <?php esc_html_e( basename( __FILE__ ) ); ?>
        </span>
    </div>

    <header class="site-header container">
        <div class="logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <img src="<?php echo PATH_LOGO; ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
            </a>
        </div>
        <div class="info-site">
            <div class="social">
                <?php 

                    if( has_nav_menu( 'pizzashop-social-menu' ) ):
                        $args = [
                            'theme_location'    => 'pizzashop-social-menu',
                            'container'         => 'nav',
                            'container_id'      => 'menu',
                            'container_class'   => 'menu menu-social',
                            'link_before'       => '<span class="sr-text">',
                            'link_after'        => '</span>'
                        ];
                        wp_nav_menu( $args );
                    endif;
                ?>
            </div><!--  .social -->
            <div class="address">
                <p>Avenida Siempreviva 742, Springfield</p>
                <p>Teléfono: +1-92-456-7890</p>
            </div><!-- .address -->
        </div>
    </header>

    <div class="main-menu">
        <div class="container">
            
            <div class="navbar">
                
                <?php if( has_nav_menu( 'pizzashop-header-menu' ) ): ?>

                    <div class="navbar-toggler">
                        <div id="menu-icon" class="menu menu-icon">
                            <div class="menu-icon__bar-1"></div>
                            <div class="menu-icon__bar-2"></div>
                            <div class="menu-icon__bar-3"></div>
                        </div>
                    </div>
                    
                    <?php 
                        $args = [
                            'theme_location'    => 'pizzashop-header-menu',
                            'container'         => 'nav',
                            'container_id'      => 'menu',
                            'container_class'   => 'menu menu-header not-display'
                        ];
                        wp_nav_menu( $args );
                    ?>
                
                <?php endif; ?>

            </div>
            
        </div>
    </div>