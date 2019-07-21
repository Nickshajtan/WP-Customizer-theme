<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the content parts.
 *
 */
?>
        <footer  itemscope="itemscope" itemtype="http://schema.org/WPFooter">
            <div class="container footer-container">
              <?php if ( is_active_sidebar( 'footer-area-first'  ) ) : ?>
                <div class="col-sm-4">
                    <?php dynamic_sidebar( 'footer-area-first' ); ?>
                </div>
              <?php endif; ?>
              <?php if (is_active_sidebar( 'footer-area-second'  ) ) : ?>
                <div class="col-sm-4">
                    <?php dynamic_sidebar( 'footer-area-second' ); ?>
                </div>
              <?php endif; ?>
              <?php if ( is_active_sidebar( 'footer-area-third'  ) ) : ?>
                <div class="col-sm-4"> 
                    <?php dynamic_sidebar( 'footer-area-third' ); ?>
                </div>
              <?php endif; ?>
            </div>
        </footer>
        <?php wp_footer(); ?>
    </body>
</html>