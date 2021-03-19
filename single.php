<?php
/** Single Template File 
 * @package PizzaShop
 */

    get_header();
?>

<?php while ( have_posts() ) : the_post(); ?>

    <div class="container file-name">
        <span>
            <?php esc_html_e( basename( __FILE__ ) ); ?>
        </span>
    </div>

    <?php 
        get_template_part( 'template-parts/entry', 'header' ); 
        get_template_part( 'template-parts/entry', 'content' ); 
    ?>

<?php endwhile; ?>

<?php 
    get_footer();