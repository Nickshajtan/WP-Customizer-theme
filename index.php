<?php
/*
* Main site template
*
*/
get_header();?>
<?php if (have_posts()) :
                     //Start the loop.
                     while (have_posts()): the_post(); ?>
<section>
    <div class="col-sm-12 slider-box">
        <?php
 $args = array(
  'numberposts' => '',
  'category'    => 3,
  'orderby'     => '',
  'order'       => '',
  'include'     => array(),
  'exclude'     => array(),
  'meta_key'    => '',
  'meta_value'  =>'',
  'post_type'   => 'post',
  'suppress_filters' => true, 
);

$posts = get_posts( $args );
?>        
       <div class="row">
           <div class="slick-slider">
               <?php  foreach($posts as $post) :
                setup_postdata($post); ?>
                   <div class="item active col-sm-4 single-slider-wrapper"> 
                      <div class="col-sm-12">
                          <div class="col-sm-1"></div>
                          <div class="col-sm-10 slider-panel">
                          </div>
                          <div class="col-sm-1"></div>
                          <div class="col-sm-12">
                               <div class="col-sm-1"></div>
                               <div class="col-sm-10">
                                   <button class="btn btn-lg events-button more-info" >
                            <a href="<?php the_permalink(); ?>">
                            <span class="mayak-more">ДІЗНАТИСЬ БІЛЬШЕ</span></a>
                                    </button>   
                               </div>
                               <div class="col-sm-1"></div>   
                          </div>
                      </div> 
                   </div>
               <?php endforeach; ?>
           </div>
       </div>
    </div>                     
</section>
<section>
    <div class="clearfix"></div>
    <div class="col-sm-12 order-box">
        <h2>
            Накази
            <hr>
        </h2>
        <h3><?php echo get_cat_name('4'); ?></h3>
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

$posts = get_posts( $args );?>
       <div class="col-sm-12">
            <div class="slick-mobile">
                <?php foreach($posts as $post) :
                setup_postdata($post); ?>
                <div class="col-sm-4 single-order-wrapper"> 
                    <div class="col-sm-12">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-10 orders-panel">
                          <p>
                            <a href="<?php the_permalink($post); ?>"> 
                                <?php the_post_thumbnail("thumbnail"); ?>                                   </a>
                          </p>
                          <?php echo '<p class="order-file-name"><a itemprop="articleTitle" href="' . get_permalink( $post ) . '">' .  $post->post_title  . '</a></p>'; ?>
                          <?php the_meta(); ?>
                          <?php the_excerpt(); ?>   
                        </div>
                        <div class="col-sm-1"></div>
                        <div class="col-sm-12">
                            <div class="col-sm-1"></div>
                            <div class="col-sm-10">
                              <form>
                                <button class="btn btn-lg events-button">   
                                   <?php pdf24Plugin_link('ВІДКРИТИ');?>
                                </button>     
                               </form>
                            </div>
                            <div class="col-sm-1"></div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>   
       </div>  
    </div>
</section>
    <div class="col-sm-12 events-box">
        <h2>
            <?php echo get_cat_name('5'); ?>
             <hr>
        </h2>   
    </div>
    <div class="slick-mobile">
      <? $args = array(
  'numberposts' => '',
  'category'    => 5,
  'orderby'     => '',
  'order'       => '',
  'include'     => array(),
  'exclude'     => array(),
  'meta_key'    => '',
  'meta_value'  =>'',
  'post_type'   => 'post',
  'suppress_filters' => true, 
);

$posts = get_posts( $args );

foreach($posts as $post) :
    setup_postdata($post); ?>
    <div class="col-sm-4 single-news-wrapper"> 
        <div class="col-sm-12">
            <div class="col-sm-1"></div>
            <div class="col-sm-10 news-panel">
                 <a href="<?php the_permalink($post); ?>"> 
                    <?php the_post_thumbnail("thumbnail"); ?>                                    
                 </a>
                 <p><?php echo $post->post_title; ?></p>    
            </div>
            <div class="col-sm-1"></div>
            <div class="col-sm-12">
                <div class="col-sm-1"></div>
                <div class="col-sm-10">
                  <form>
                    <button class="btn btn-lg events-button more-info" >
                        <a href="<?php the_permalink(); ?>">
                           <span class="mayak-more">ДІЗНАТИСЬ БІЛЬШЕ</span>
                        </a>
                    </button>   
                  </form>
                </div>
                <div class="col-sm-1"></div>
        </div>
    </div>
    <?php endforeach; ?>   
    </div>
<section>
    
</section>
<?php endwhile; endif; ?>
<?php get_footer(); ?>