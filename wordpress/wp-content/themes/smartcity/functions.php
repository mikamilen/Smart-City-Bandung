<?php 

//load script
function load_file_css(){
	wp_enqueue_style('headerstyle', get_template_directory_uri() . '/asset/css/header.css');
	wp_enqueue_style('homestyle', get_template_directory_uri() . '/asset/css/home.css');
	wp_enqueue_style('profilstyle', get_template_directory_uri() . '/asset/css/profil.css');
	wp_enqueue_style('listpost', get_template_directory_uri() . '/asset/css/listpost.css');
	wp_enqueue_style('blogpost', get_template_directory_uri() . '/asset/css/blogpost.css');
	wp_enqueue_style('kontak', get_template_directory_uri() . '/asset/css/kontak.css');
	wp_enqueue_style('footerstyle', get_template_directory_uri() . '/asset/css/footer.css');
	wp_enqueue_style('bootstrap', get_template_directory_uri() . '/asset/bootstrap/css/bootstrap.min.css');
	wp_enqueue_style('fontawesome', get_template_directory_uri() . '/asset/font-awesome/css/font-awesome.min.css');


	wp_enqueue_script('jquery');
	wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/asset/bootstrap/js/bootstrap.min.js', array(), false, false);
	wp_enqueue_script('customjs', get_stylesheet_directory_uri() . '/asset/js/scroll.js', array('jquery'), false, false);
}

add_action( 'wp_enqueue_scripts', 'load_file_css');

//the excerpt
function get_excerpt_length(){
	return 20;
}

function return_excerpt_text(){
	return ' ';
}

add_filter( 'excerpt_more', 'return_excerpt_text');
add_filter( 'excerpt_length', 'get_excerpt_length');

function init_setup(){
	register_nav_menus(array(
	'main_menu' => 'Menu Utama',
	'footer_menu' => 'Menu Footer'
 ));

//add featured image
add_theme_support( 'post-thumbnails' );
add_image_size( 'small_thumb', 250, 150, true);
add_image_size( 'big_thumb', 450, 250, true);

add_theme_support( 'post-formats', array('aside', 'gallery') );
} 

add_action( 'after_setup_theme', 'init_setup');

function widget_setup(){
	register_sidebar(array(
		'name'          => 'Sidebar pertama',
		'id'            => 'sidebar1',
	));	

	register_sidebar(array(
		'name'          => 'Sidebar kedua',
		'id'            => 'sidebar2',
	));	
}

add_action('widgets_init', 'widget_setup');




 ?>