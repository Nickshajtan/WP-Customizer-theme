<?php
/*
 * Template Name: Accordion page template
 * Template Post Type: page
 * The template for dinamic secession page 
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
<section class="fix">
  <div class="container">
   <div class="page-box">
    <div class="container" itemprop="articleBody">
      <div class="panel-group" id="accordion">
         <? $args = array(
  'numberposts' => '',
  'category'    => 4,
  'orderby'     => '',
  'order'       => '',
  'include'     => array(),
  'exclude'     => array(),
  'meta_key'    => '',
  'meta_value'  =>'',
  'post_type'   => 'post',
  'suppress_filters' => true, 
);
$countitile = 0;          
$countcontent = 0;                
$posts = get_posts( $args );?>
          <?php foreach($posts as $post) :
           setup_postdata($post); ?>  
          <div class="panel panel-default">
              <div class="panel-heading "  data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $countitile++; ?>">
                  <div class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $countitile; ?>">
                        <?php the_title(); ?>    
                      </a>
                      <i class="fa fa-angle-down" aria-hidden="true"></i>
                  </div>
              </div>
              <div id="collapse<?php echo $countcontent++; ?>" class="panel-collapse collapse">
                  <div class="panel-body">
                      <?php the_content(); ?>
                  </div>
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