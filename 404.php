<?php
/**
 * The message of error about no content
 *
 */
get_header(); ?>
<div class="clearfix"></div>
    <section class="pg-header">
        <div class="container">
              <div class="col-sm-12">
                <div class="row">
                    <div class="col-sm-1">
                        <button class="btn btn-lg">
                            <a href="#" onclick="history.back();return false;">❮<span class="back-mobile">Назад</span></a>
                        </button>
                    </div>
                    <div class="col-sm-10">
                        <center>
                           <h2 class="entry-title">Ууупс!</h2>
                        </center>
                    </div>
                </div>
              </div>  
        </div>
    </section>
    <div class="clerfix"></div>
    <section class="fix">
        <div class="container">
            <div class="page-box">
                <div class="col-sm-12 content-box single" >
                    <p><center>
                        <?php echo('<h3>Такої сторінки не існує</h3>'); ?>
                    </center></p>
                </div>
            </div>
        </div>
</section>
<?php get_footer(); ?>