<?php
/** Index Template File 
 * @package PizzaShop
 */

    get_header();
?>

    <div class="container file-name">
        <span>
            <?php esc_html_e( basename( __FILE__ ) ); ?>
        </span>
    </div>

<?php 
    get_footer();