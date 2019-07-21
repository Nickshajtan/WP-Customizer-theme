<?php
/*
 * Template Name: Tabs page template
 * Template Post Type: page
 * The template for dinamic vacancy table
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
    <div class="table-tabs">
        <div class="navbar">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-2" aria-expanded="false" id="button-tabs-mobile">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
        </div>
            <ul class="nav nav-tabs collapse navbar-collapse" id="navbar-collapse-2">
<? $args = array(
  'numberposts' => '',
  'category'    => 11,
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
                <li>
                    <a data-toggle="tab" href="#panel<?php echo $countitile++; ?>">
                        <?php the_title(); ?>
                    </a>
                </li>
            <?php endforeach; ?>        
            </ul>
            <div class="tab-content">
                <?php foreach($posts as $post) :
                setup_postdata($post); ?>
                   <div id="panel<?php echo $countcontent++; ?>" class="tab-pane fade">
                       <?php the_content(); ?>
                   </div> 
                <?php endforeach; ?>  
            </div>
    </div>
      </div>
    </div>
</section>    
<?php endwhile; endif; ?>
<?php get_footer(); ?>