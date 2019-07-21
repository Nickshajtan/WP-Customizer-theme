<?php
/**
 * The theme part for single page
 *
 */

get_header(); ?>
<div class="clearfix"></div>
<?php if (have_posts()) :
                     //Start the loop.
                     while (have_posts()): the_post(); ?>
<section class="pg-header">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
               <div class="row">
                <div class="col-sm-1">
                    <form>
                         <button class="btn btn-lg">
                <a href="#" onclick="history.back();return false;">❮ <span class="back-mobile">Назад</span></a>
                         </button>
                    </form>
                </div>
                <div class="col-sm-10">
                <?php if ( is_single() ) :
                the_title( '<center><h2 class="entry-title single-post">', '</h2></center>' );
                else :
                the_title( sprintf( '<center><h2 class="entry-title">', esc_url( get_permalink() ) ), '</h2></center>' );
                endif; ?>     
                </div>
                <div class="col-sm-1"></div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="clerfix"></div>
<section class="fix">
     <div class="container">
<div class="page-box" itemprop="articleBody" itemscope itemtype="http://schema.org/Article">
            <div class="col-sm-12 content-box single" style="">
                    <main>
                        <article>
                            <div class="col-sm-12 one-news">  
                                <?php the_content();  ?>
                            </div>
                        </article>
                    </main>                     
                </div>
            </div>
        </div>
</section>
<?php endwhile; endif; ?>
<?php get_footer(); ?>