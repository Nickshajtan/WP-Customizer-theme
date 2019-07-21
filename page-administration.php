<?php
/*
 * Template Name: Administration page template
 * Template Post Type: page
 * The template for administration page 
 *
 */
?>
<?php get_header(); ?>
<div class="clearfix"></div>
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
<section>
 <div class="page-box">
  <div class="container">
    <div class="container" itemprop="articleBody">
      <div class="doctors-panel-wrapper">
         <? $args = array(
  'numberposts' => '',
  'category'    => 6,
  'orderby'     => '',
  'order'       => '',
  'include'     => array(),
  'exclude'     => array(),
  'meta_key'    => '',
  'meta_value'  =>'',
  'post_type'   => 'post',
  'suppress_filters' => true, 
);           
$posts = get_posts( $args );?>
          <?php foreach($posts as $post) :
           setup_postdata($post); ?>  
            <div class="col-sm-12 col-md-6 col-lg-4 single-post-wrapper"> 
                <div class="col-sm-12 doctors-panel">
                     <a href="<?php the_permalink($post); ?>"> 
                        <?php the_post_thumbnail("thumbnail"); ?>                                      </a>
                     <br /> 
                     <?php echo '<a itemprop="articleTitle" href="' . get_permalink( $post ) . '">' .  $post->post_title  . '</a>'; ?>  
                     <?php the_content(); ?>
                     <?php the_meta(); ?>
                </div>
            </div>
           <?php endforeach; ?>
            </div>
        </div>
    </div>
    </div>
</section>
<?php endwhile; endif; ?>
<?php get_footer(); ?>