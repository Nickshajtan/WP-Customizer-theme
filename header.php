<?php 
/**
* The template for displaying the header
*
*Displays fixed top menu of site.
*
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php bloginfo('description'); ?>" />
  <?php wp_enqueue_script("jquery-min"); ?>
  <?php wp_head(); ?>
  <script src="https://use.fontawesome.com/abe05c4a29.js"></script>
  <link rel="stylesheet/less" type="text/css" href="<?php echo bloginfo('template_url'); ?>/css/mine.less" />    
</head>    
<body <?php body_class(); ?> itemscope="itemscope" itemtype="http://schema.org/WebPage">
  <div class="global-wrapper">
    <header itemscope itemtype="http://schema.org/WPHeader">
      <div class="navbar navbar-inverse nav" id="aministration_menu">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <div class="col-sm-1">
                <span class="navbar-brand" itemprop="logo"><?php the_custom_logo();?></span>
            </div>          
          </div>
         <div class="col-sm-8 col-xs-push-2 col-xs-push-0">
          <div class="collapse navbar-collapse" id="navbar-collapse-1">
            <div class="col-sm-<?php echo (is_active_sidebar( 'header-area-first'  )) ?  '8' : '10' ?> header-separator">
        <?php wp_nav_menu(array('menu' => 'primary', 'menu_class' => 'top-menu nav navbar-nav ')); ?> 
            </div>
        </div>
          </div>
           <?php if ( is_active_sidebar( 'header-area-first'  ) ) : ?>

            <div class="col-sm-2 col-xs-pull-8 col-xs-pull-0">
                <div class="header-phone">
                     <span>
                        <?php dynamic_sidebar( 'header-area-first' ); ?>
                     </span>
                </div>
            </div>
          <?php endif; ?>  
       </div>
  </div>
</header>