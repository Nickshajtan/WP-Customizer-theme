<?php
/*
 * Template Name: Home page template
 * Template Post Type: page
 * The template for displaying home page of site
 *
 */
?>
<?php get_header(); ?>
<div class="clearfix"></div>
<?php if (have_posts()) :
                     //Start the loop.
                     while (have_posts()): the_post(); ?>
<section id="paralax">
<img src="<?php header_image(); ?>" height="100%"  width='100%' alt="" />   
  <div class="main-title parallax">
    <div class="container">
      <div class="col-sm-12 col-md-6 col-lg-5" itemscope itemtype="http://schema.org/Organization">
        <div class="name-wrapper">
            <p itemprop="name headline" >
              <?php echo bloginfo('name'); ?>
            </p>
            <br />
            <p>  
              <?php echo bloginfo('description'); ?>
            </p>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="clearfix"></div>
<section class="cd-horizontal-timeline">
    <div class="container">
    
    
    <p class="checkcaption">no modal boxes?</p>
<div class="check">
	<input type="checkbox" id="switch1" name="switch1" class="switch" />
	<label for="switch1"></label>
</div>

<div id="timeline">
	<div class="dot" id="one">
		<span></span>
		<date>1280</date>
	</div>
  <div class="dot" id="two">
		<span></span>
		<date>1649</date>
	</div>
  <div class="dot" id="three">
		<span></span>
		<date>1831</date>
	</div>
  <div class="dot" id="four">
		<span></span>
		<date>1992</date>
	</div>
  <div class="inside"></div>
</div>

<!-- Modals -->

<article class='modal one'>
  <date>26/06 - 1280</date>
  <h2>Yo les gars</h2>
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates magnam excepturi laboriosam minima soluta, quae. Sunt repellat totam non, et sed in veniam fuga odio eius! Nesciunt amet optio recusandae? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum sit dolor sint amet, corporis aperiam nihil, quas, accusantium enim suscipit rem non possimus officiis. Recusandae hic at, fugiat eos eveniet.</p>
</article>

<article class='modal two'>
  <date>08/09 - 1649</date>
  <h2>Salut les louzeurs</h2>
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates magnam excepturi laboriosam minima soluta, quae. Sunt repellat totam non, et sed in veniam fuga odio eius! Nesciunt amet optio recusandae? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum sit dolor sint amet, corporis aperiam nihil, quas, accusantium enim suscipit rem non possimus officiis. Recusandae hic at, fugiat eos eveniet.</p>
</article>

<article class='modal three'>
  <date>21/07 - 1831</date>
  <h2>Eat 'em all !</h2>
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates magnam excepturi laboriosam minima soluta, quae. Sunt repellat totam non, et sed in veniam fuga odio eius! Nesciunt amet optio recusandae? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum sit dolor sint amet, corporis aperiam nihil, quas, accusantium enim suscipit rem non possimus officiis. Recusandae hic at, fugiat eos eveniet.</p>
</article>

<article class='modal four'>
  <date>03/02 - 1992</date>
  <h2>Mais pourquoi?</h2>
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptates magnam excepturi laboriosam minima soluta, quae. Sunt repellat totam non, et sed in veniam fuga odio eius! Nesciunt amet optio recusandae? Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsum sit dolor sint amet, corporis aperiam nihil, quas, accusantium enim suscipit rem non possimus officiis. Recusandae hic at, fugiat eos eveniet.</p>
</article>
    
    </div>
</section>
<div class="clearfix"></div>
<section class="box">
    <div class="container">
        <div class="col-sm-12 col-md-6 desctop">
                <?php the_post_thumbnail('medium'); ?>
        </div>
        <div class="col-xs-12 col-sm-5 col-md-6 mobile">
                <?php the_post_thumbnail('thumbnail'); ?>
        </div>
        <div class="col-xs-12 col-sm-7 col-md-6 about_clinic" itemprop="articleBody">
            <main>
                <article>
                    <?php the_content(); ?>
                </article>
            </main>
        </div>
    </div>
</section>
<?php endwhile; endif; ?>
<?php get_footer(); ?>