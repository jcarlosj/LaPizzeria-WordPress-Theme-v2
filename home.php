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

<section class="section container sidebar">
    <main class="main-content">

        <?php while ( have_posts() ) : the_post(); ?>

            <article class="blog-entry">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail( 'specialties-landscape' ); ?>
                </a>

                <header class="entry-info">
                    
                    <time class="entry-date" datetime="<?php the_time( 'Y-m-d' ); ?>">
                        <?php the_time( 'd' ); ?>
                        <span><?php the_time( 'M' ); ?><span>
                    </time>
                    
                    <h2 class="entry-title"><?php the_title(); ?></h2>
                    
                    <p class="entry-author">
                        <?php _e( 'Written by: ', 'pizzashop' ); ?>
                        <span><?php the_author(); ?></span>
                    </p>

                    <p class="entry-excerpt">
                        <?php if( has_excerpt() ): ?>
                            <?php echo get_the_excerpt(); ?>
                        <?php else: ?>
                            <?php echo wp_trim_words( get_the_content(), 30, '..' ); ?>
                        <?php endif; ?>
                    </p>

                    <a class="btn btn-primary" href="<?php the_permalink(); ?>">
                        <?php _e( 'Read more', 'pizzashop' ); ?>
                    </a>

                </header>

                <footer></footer>
            </article>

            <?php # the_content(); ?>
            
        <?php endwhile; ?>

    </main>

    <?php get_sidebar() ?>

</section>

<?php 
    get_footer();
