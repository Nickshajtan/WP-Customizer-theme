<?php
/**
 * The template for displaying pages
 *
 *
 *
 */

get_header(); ?>
    <div class="clerfix"></div>
    <section class="pg-header">
           <div class="container">
            <?php if (have_posts()) :   
            //Start the loop.
                     while (have_posts()): the_post(); ?>
                          <?php if ( is_single() ) :
                            the_title( '<center><h2 class="entry-title">', '</h2></center>' );
                          else :
                            the_title( sprintf( '<center><h1 class="entry-title-page">', esc_url( get_permalink() ) ), '</h1></center>' ); 
                          endif; ?>
            </div>
    </section>
    <div class="clerfix"></div>
    <section class="fix">
       <div class="container">
          <div class="page-box" itemprop="articleBody" itemscope itemtype="http://schema.org/Article">
           <main>
              <?php if ( is_active_sidebar( 'left'  ) ) : ?>
               <div class="col-sm-3">
                   <aside>
                       <?php dynamic_sidebar( 'left' ); ?>
                   </aside>
               </div>
               <?php endif; ?>
               <div class="single content-box col-sm-<?php if( (is_active_sidebar( 'left'  ) ) && (is_active_sidebar( 'right'  ) ) )  :
                echo '6';
                elseif( (is_active_sidebar( 'left'  ) ) || (is_active_sidebar( 'right'  ) ) ) :
                echo '8';
                else : 
                echo '12'; 
                endif; ?>">
                   <article>
                       <p><?php the_content(); ?></p>
                   </article>
               </div>   
               <?php if ( is_active_sidebar( 'right'  ) ) : ?>
               <div class="col-sm-3">
                   <aside>
                       <?php dynamic_sidebar( 'right' ); ?>
                   </aside>
               </div>
               <?php endif; ?>
           </main>
           </div>
        </div>
    </section>                
                     <?php //End the loop
                     endwhile; ?>
            <?php endif; ?>   
<?php get_footer(); ?>