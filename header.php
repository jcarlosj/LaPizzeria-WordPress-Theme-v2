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
    <title>La Pizzería</title>
</head>
<body>

    <div class="container file-name">
        <span>
            <?php esc_html_e( basename( __FILE__ ) ); ?>
        </span>
    </div>

    <header class="site-header">
        <div class="logo">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" alt="<?php echo get_bloginfo( 'name' ); ?>">
            </a>
        </div>
        <div class="info-site">
            <div class="social">
                <!-- TODO: Agregar Menú Redes Sociales -->
            </div><!--  .social -->
            <div class="address">
                <p>Avenida Siempreviva 742, Springfield</p>
                <p>Teléfono: +1-92-456-7890</p>
            </div><!-- .address -->
        </div>
    </header>