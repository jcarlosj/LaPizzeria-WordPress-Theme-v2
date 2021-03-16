<?php
/** Home Template File (Blog)
 * @package PizzaShop
 */

    get_header();
    
    $blog_page_id = get_option( 'page_for_posts' );     //  El valor de 'page_for_posts' puede consultarse en: http://localhost:8080/wp-admin/options.php 
    $featured_image_id = get_post_thumbnail_id( $blog_page_id );
    $image_source = wp_get_attachment_image_src( $featured_image_id, 'full' ) [ 0 ];

    // var_dump( $image_source );
?>
 
<div class="container file-name">
    <span>
        <?php esc_html_e( basename( __FILE__ ) ); ?>
    </span>
</div>

<header 
        class="hero"
        <?php if( $featured_image_id) : ?>
            style="background-image: url( <?php echo $image_source; ?> );"
        <?php else: ?>
            
        <?php endif; ?>
>
    <div class="hero-content">
        <h1><?php echo get_the_title( $blog_page_id ); ?></h1>
    </div>
</header>

<section class="section container">
    <main class="main-content">

        <?php while ( have_posts() ) : the_post(); ?>

            <h1><?php the_title(); ?></h1>
            <?php the_content(); ?>
            
        <?php endwhile; ?>

    </main>
</section>

<?php 
    get_footer();
