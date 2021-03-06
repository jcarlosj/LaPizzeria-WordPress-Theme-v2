<?php
/** Entry Content Template File (Blog)
 * @package PizzaShop
 */
?>          
  
<?php if( is_page() || is_single() ) : ?>

    <section class="section container">
        <main class="main-content">
            <?php the_content(); ?>
        </main>
    </section>

<?php elseif( is_home() ) : ?>

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

<?php endif; ?>

