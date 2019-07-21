<?php
/**
 * File for functions and definitions of the theme
 *
 * Contain loding of styles and scripts
 *
 */

function load_bootstrap() {
// Bootstrap stylesheet.
wp_register_style( 'bootstrap-min',get_template_directory_uri() . 
               '/libs/bootstrap/css/bootstrap.min.css', array(), ' ' );
    
wp_enqueue_style( 'bootstrap-min', get_template_directory_uri() . 
               '/libs/bootstrap/css/bootstrap.min.css', array(), ' ' );

//Rewrite bootstrap styles.
wp_register_style( 'styles', get_template_directory_uri() . 
               '/css/styles.css', array(), ' ' );
wp_enqueue_style( 'styles', get_template_directory_uri() . 
               '/css/styles.css', array(), ' ' );

//Bootstrap js
wp_register_script( 'bootstrap-min', '//use.fontawesome.com/releases/v5.0.12/css/all.css', array('jquery'), ' ' );    
wp_enqueue_script( 'bootstrap-min','//use.fontawesome.com/releases/v5.0.12/css/all.css', array('jquery'), ' ' );
}
add_action('wp_enqueue_scripts', 'load_bootstrap');
//Icons
function load_icon(){
wp_register_script( 'icon', get_template_directory_uri() . 
               '/libs/bootstrap/js/bootstrap.min.js', array('jquery'), ' ' );    
wp_enqueue_script( 'icon', get_template_directory_uri() . 
               '/libs/bootstrap/js/bootstrap.min.js', array('jquery'), ' ' );
}
add_action('wp_enqueue_scripts', 'load_icon');

function load_css() {
wp_register_style( 'style', get_stylesheet_uri(),array(), ' ' );
wp_enqueue_style( 'style', get_stylesheet_uri(), ' ' );
}
add_action('wp_enqueue_scripts', 'load_css');

//JQUERY
add_action( 'wp_enqueue_scripts', 'my_scripts_method' );
function my_scripts_method() {
	wp_deregister_script( 'jquery-core' );
	wp_register_script( 'jquery-core', '//ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js',array(), null, true);
	wp_enqueue_script( 'jquery' );
}
//Less
function load_less() {    
wp_register_script( 'less', 
               '//cdnjs.cloudflare.com/ajax/libs/less.js/3.0.2/less.min.js', array('jquery'), null, true);    
wp_enqueue_script( 'less',  
               '//cdnjs.cloudflare.com/ajax/libs/less.js/3.0.2/less.min.js', array('jquery'), null, true );
}
add_action('wp_enqueue_scripts', 'load_less');
//Timeline script
function load_timeline(){
  wp_register_script( 'timeline', get_template_directory_uri() . 
               '/libs/timeline/js/jquery.timelinr-0.9.52.js', array('jquery'), null, true );    
wp_enqueue_script( 'timeline', get_template_directory_uri() . 
               '/libs/timeline/js/jquery.timelinr-0.9.52.js', array('jquery'), null, true );  
}
add_action('wp_enqueue_scripts', 'load_timeline');
function load_js() {
wp_register_script( 'scripts', get_template_directory_uri() . 
               '/js/scripts.js', array('jquery'), ' ' );    
wp_enqueue_script( 'scripts', get_template_directory_uri() . 
               '/js/scripts.js', array('jquery'), ' ' );
}
add_action('wp_enqueue_scripts', 'load_js');


//Add menus
if (function_exists('add_menus')) {
	add_menus('menus');
}

if ( ! function_exists( 'theme_setup' ) ) :

function theme_setup() {
//Add custom logo
add_theme_support( 'custom-logo', array(
		'height'      => 35,
		'width'       => 52,
		'flex-height' => true,
	) );

// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary' => __( 'Primary Menu',      'templ' ),
		'social'  => __( 'Social Links Menu', 'templ' ),
        'tabs'   => __( 'Tabs menu', 'templ' ),
	) );
    
//Add title    
add_theme_support( 'title-tag' );
add_theme_support( 'automatic-feed-links' );
//Add support theme html 5    
add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
	) ); 

//Add post formats
add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link', 'gallery', 'status', 'audio', 'chat',
	) );    

}
endif;
add_action( 'after_setup_theme', 'theme_setup' );
remove_filter('the_content', 'wpautop');


//Add a few file type
function my_myme_types($mime_types){
    $mime_types['svg'] = 'image/svg+xml'; 
    $mime_types['psd'] = 'image/vnd.adobe.photoshop'; 
    $mime_types['dwg'] = 'image/vnd.dwg'; 
    $mime_types['docx'] = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';
    $mime_types['xlsx'] = 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'; 
    $mime_types['ppt'] = 'application/vnd.ms-powerpoint';
    $mime_types['doc'] = 'application/msword';
    $mime_types['pdf'] = 'application/pdf';     
    return $mime_types;
}
add_filter('upload_mimes', 'my_myme_types', 1, 1);

//IMG_posts
add_theme_support( 'post-thumbnails' );

//Add Navigation mobile
function extra_setup() {
    register_nav_menu ('primary mobile', __( 'Navigation Mobile', 'tmpl' )); 
} 
add_action( 'after_setup_theme', 'extra_setup' );

function set_container_class ($args) { 
    $args['container_class'] = str_replace(' ','-',$args['theme_location']).'-nav'; return $args;
}
add_filter ('wp_nav_menu_args', 'set_container_class');

//Add image-responsibive for all pages&posts
function add_image_responsive_class($content) {
   global $post;
   $pattern ="/<img(.*?)class=\"(.*?)\"(.*?)>/i";
   $replacement = '<img$1class="$2 img-responsive"$3>';
   $content = preg_replace($pattern, $replacement, $content);
   return $content;
}
add_filter('the_content', 'add_image_responsive_class');

//Add custom bg
function true_custom_background_support(){
    add_theme_support( 'custom-background' );
}
add_action('after_setup_theme', 'true_custom_background_support');
//Add custom admin panel logo
add_action('login_head', 'my_custom_login_logo');
function my_custom_login_logo(){
	echo '<style type="text/css">
	h1 a { background-image:url('.get_bloginfo('template_directory').'/images/custom-logo.png) !important; }
	</style>';
}
add_action('add_admin_bar_menus', 'reset_admin_wplogo');
function reset_admin_wplogo(  ){
	remove_action( 'admin_bar_menu', 'wp_admin_bar_wp_menu', 10 ); 
	add_action( 'admin_bar_menu', 'my_admin_bar_wp_menu', 10 ); 
}
function my_admin_bar_wp_menu( $wp_admin_bar ) {
	$wp_admin_bar->add_menu( array(
		'id'    => 'wp-logo',
		'title' => '<span style="font-family:dashicons; font-size:20px;" class="dashicons dashicons-carrot"></span>',    // <img style="max-width:100%;height:auto;" src="'. get_bloginfo('template_directory') .'/images/custom-logo.gif" alt="" >
		'href'  => home_url('/about/'),
		'meta'  => array(
			'title' => 'О моем сайте',
		),
	) );
}
//No core update information
if( ! current_user_can( 'edit_users' ) ){
	add_filter( 'auto_update_core', '__return_false' );  
    add_filter( 'pre_site_transient_update_core', '__return_null' );
}
//Show php errors only for admin
add_action('init', 'enable_errors');
function enable_errors(){
	if( $GLOBALS['user_level'] < 5 )
		return;

	error_reporting(E_ALL ^ E_NOTICE);
	ini_set("display_errors", 1);
}
//More link text
function my_more_link($more_link, $more_link_text) {
    return str_replace($more_link_text, 'Продолжить чтение...', $more_link);
}
add_filter('the_content_more_link', 'my_more_link', 10, 2);

function my_more_link_second($more_link, $more_link_text) {
    $more_link = preg_replace( '|#more-[0-9]+|', '', $more_link );
    return $more_link;
}
add_filter('the_content_more_link', 'my_more_link_second', 10, 2);
//Exept segment settings
function segmet_length ($length) {
    return 10;
}
add_filter('excerpt_length', 'segment_length');
add_filter('excerpt_more', function($more) {
	return '...';
});
//Sidebars
//Header part
register_sidebar( array(
        'name' => __( 'Header sidebar', '' ),
        'id' => 'header-area-first',
        'description' => __( 'header', '' ),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );
//Footer part
register_sidebar( array(
        'name' => __( 'Footer sidebar first', '' ),
        'id' => 'footer-area-first',
        'description' => __( 'footer', '' ),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );
register_sidebar( array(
        'name' => __( 'Footer sidebar second', '' ),
        'id' => 'footer-area-second',
        'description' => __( 'footer', '' ),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );

register_sidebar( array(
        'name' => __( 'Footer sidebar third', '' ),
        'id' => 'footer-area-third',
        'description' => __( 'footer', '' ),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );
//Content part
register_sidebar( array(
        'name' => __( 'Left sidebar', '' ),
        'id' => 'left',
        'description' => __( 'left', '' ),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );
register_sidebar( array(
        'name' => __( 'Right sidebar', '' ),
        'id' => 'right',
        'description' => __( 'right', '' ),
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );
//Customize settings
function true_customizer_init( $wp_customize ) {
	$true_transport = 'postMessage';
	$wp_customize->add_section(
		'true_display_options', 
		array(
			'title'     => 'Отображение',
			'priority'  => 200, 			      'description' => 'Настройте внешний вид вашего сайта' 
		)
	);
    //Color scheme
	$wp_customize->add_setting(
		'true_color_scheme', 
		array(
			'default'   => 'normal',
			'transport' => $true_transport
		)
	);
	$wp_customize->add_control(
		'true_color_scheme',
		array(
			'section'  => 'true_display_options', 
			'label'    => 'Цветовая схема',
			'type'     => 'radio', 
			'choices'  => array( 
				'normal'    => 'Светлая', 
				'inverse'   => 'Темная',
                'transpaent' => 'Прозрачная'
			)
		)
	);
 
	// fonts
	$wp_customize->add_setting(
		'true_font', 		array(
			'default'   => 'circle', 
			'type'      => 'theme_mod',
			'transport' => $true_transport
		)
	);
	$wp_customize->add_control(
		'true_font',
		array(
			'section'  => 'true_display_options', 			    'label'    => 'Шрифт',
			'type'     => 'select', 
			'choices'  => array( 
				'circle'   => 'Circle',
				'roboto'   => 'Roboto',
                'opensans' => 'Open Sans'
			)
		)
	);
}
add_action( 'customize_register', 'true_customizer_init' );
 
function true_sanitize_copyright( $value ) {
	return strip_tags( stripslashes( $value ) ); 
}
 function true_customizer_css() { 
	echo '<style>';
	echo 'body {font-family:';
	switch( get_theme_mod( 'true_font' ) ) { 
		case 'circle':
			echo 'Circle, sans-serif;';
			break;
		case 'roboto':
			echo 'Roboto;';
			break;
        case 'opensans':
            echo 'Open Sans;';
		default:
			echo 'Circle, sans-serif;'; 
			break;
	}
	if ( 'inverse' == get_theme_mod( 'true_color_scheme' ) ) { 
        echo 'background-color:#000;color:#fff;'; 
	}
    elseif( 'transpaent' == get_theme_mod( 'true_color_scheme' ) ) {
        echo 'background-color:#fff;color:#000;';    
    }
    else {
		echo 'background-color:#efefef;color:#383838;'; 
	}
	echo '}';
    echo 'section.box{';
    if ( 'inverse' == get_theme_mod( 'true_color_scheme' ) ) { 
    echo 'background-color:rgba(255, 255, 255, 0.7);color:#000;';
    }
    elseif( 'transpaent' == get_theme_mod( 'true_color_scheme' ) ) {
        echo 'background-color:rgba(0, 0, 0, 0.7);color:#000;';    
    }
    else {
		echo 'background-color:#0eb075;color:#fff;background-image:linear-gradient(-45deg, #0eb075 0%, #0dd28a 100%)'; 
	} 
    echo '}'; 
    echo 'section.pg-header{';
    if ( 'inverse' == get_theme_mod( 'true_color_scheme' ) ) { 
    echo 'background-color:rgba(255, 255, 255, 0.7);color:#000;';
    }
    elseif( 'transpaent' == get_theme_mod( 'true_color_scheme' ) ) {
        echo 'background-color:rgba(0, 0, 0, 0.7);color:#000;';    
    }
    else {
		echo 'background-color:#0eb075;color:#fff;background-image:linear-gradient(-45deg, #0eb075 0%, #0dd28a 100%)'; 
	} 
    echo '}';
    echo 'footer{';
    if ( 'inverse' == get_theme_mod( 'true_color_scheme' ) ) { 
    echo 'background-color:rgba(255, 255, 255, 0.7);color:#000;';
    }
    elseif( 'transpaent' == get_theme_mod( 'true_color_scheme' ) ) {
        echo 'background-color:rgba(0, 0, 0, 0.7);color:#fff;';    
    }
    else {
		echo 'background-color:#fff;color:#000;'; 
	} 
    echo '}';
    echo '.navbar{';
    if ( 'inverse' == get_theme_mod( 'true_color_scheme' ) ) { 
    echo 'background-color:rgba(255, 255, 255, 0.7);color:#000;';
    }
    elseif( 'transpaent' == get_theme_mod( 'true_color_scheme' ) ) {
        echo 'background-color:rgba(0, 0, 0, 0.7);color:#fff;';    
    }
    else {
		echo 'background-color:#fff;color:#000;'; 
	} 
    echo '}';  
	echo '</style>';
}
add_action( 'wp_head', 'true_customizer_css' ); 

function true_customizer_live() {
	wp_enqueue_script(
		'true-theme-customizer', 
		get_stylesheet_directory_uri() . '/js/theme-customizer.js', 
		array( 'jquery', 'customize-preview' ),
		null,
		true 
	);
}
add_action( 'customize_preview_init', 'true_customizer_live' );
//Support thumbnails
add_theme_support( 'post-thumbnails' ); 
//Custom header bg
function true_custom_header_support(){
	add_theme_support( 'custom-header' );
}
add_action('after_setup_theme', 'true_custom_header_support');