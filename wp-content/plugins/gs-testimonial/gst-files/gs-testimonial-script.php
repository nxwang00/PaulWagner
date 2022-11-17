<?php

// function gs_testimonial_jquery() {
// 	wp_enqueue_script('jquery');
// }
// add_action('init', 'gs_testimonial_jquery');


function gs_testimonial_scripts() {

	if ( ! is_admin() ) {
		wp_enqueue_script('jquery');
		wp_register_script( 'cycle-two', GST_FILES_URI .'/assets/js/jquery.cycle2.min.js', array('jquery'), GST_VERSION, true );
		wp_register_script( 'cycle-two-caro', GST_FILES_URI .'/assets/js/jquery.cycle2.carousel.js', array('jquery'), GST_VERSION, true );
		wp_enqueue_script( 'cycle-two' );
		wp_enqueue_script( 'cycle-two-caro' );
	}

}
add_action( 'wp_enqueue_scripts', 'gs_testimonial_scripts' ); 

function gs_testimonial_style() {
	if ( ! is_admin() ) {
		wp_register_style('custom-style', GST_FILES_URI.'/assets/css/custom.css','', GST_VERSION, false);
		wp_enqueue_style('custom-style');
	}
}
add_action( 'wp_enqueue_scripts', 'gs_testimonial_style' );


function gs_testimonial_enqueue_admin_script() {
	$media='all';
	wp_register_style( 'gs_free_plugins_css', GST_FILES_URI.'/assets/css/gs_free_plugins.css', '', GST_VERSION, $media );
    wp_enqueue_style( 'gs_free_plugins_css' );
}
add_action( 'admin_enqueue_scripts', 'gs_testimonial_enqueue_admin_script' );