<?php
/** Page Template File 
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
    
    <h1><?php the_title(); ?></h1>
    <?php the_content(); ?>

<?php endwhile; ?>

<?php 
    get_footer();
