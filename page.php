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

<header 
    class="hero"
    style="background-image: url( <?php echo get_the_post_thumbnail_url(); ?> );"
>
    <div class="hero-content">
        <h1><?php the_title(); ?></h1>
    </div>
</header>

<section class="section container">
    <main class="main-content">
        <?php the_content(); ?>
    </main>
</section>

<?php endwhile; ?>

<?php 
    get_footer();
