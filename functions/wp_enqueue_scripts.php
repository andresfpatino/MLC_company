<?php 

function enqueue_child_styles() {			
	// CSS
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css');
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css');	
	wp_enqueue_style( 'slick', get_stylesheet_directory_uri() . '/assets/slick/slick.css', array(), "1.8.1", 'all' );
	wp_enqueue_style( 'slicktheme', get_stylesheet_directory_uri() . '/assets/slick/slick-theme.css', array(), "1.8.1", 'all' );
	wp_enqueue_style( 'sweetalert-css', get_stylesheet_directory_uri() . '/assets/sweetalert/sweetalert.css', array(), "2.0", 'all' );	
	wp_enqueue_style( 'theme-css', get_stylesheet_directory_uri() . '/assets/css/main.css');
	
	// JS
	wp_enqueue_script( 'slick', get_stylesheet_directory_uri() . '/assets/slick/slick.min.js', array('jquery'), "1.8.1", true );
	wp_enqueue_script( 'sweetalert-js', get_stylesheet_directory_uri() . '/assets/sweetalert/sweetalert.min.js', array( 'jquery' ), "2.0", true ); 
	wp_enqueue_script( 'theme-js', get_stylesheet_directory_uri() . '/assets/js/main.js', array('jquery'), "1.0", true );	
}
add_action( 'wp_enqueue_scripts', 'enqueue_child_styles' );