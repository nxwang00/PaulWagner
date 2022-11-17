<?php

namespace GSTM;

// if direct access than exit the file.
defined('ABSPATH') || exit;

/**
 * Registers custom post type for the testimonial.
 * 
 * @since 1.0.0
 */
class CPT {

	/**
	 * Class constructor.
	 * 
	 * @since 1.0.0
	 */
	public function __construct() {
		add_action( 'init', [ $this, 'GS_Testimonial_Slider' ] );
		add_action( 'after_setup_theme', [ $this, 'gs_testimonial_theme_support' ] );
	}

	/**
	* Registers a new post type
	* @uses $wp_post_types Inserts new post type object into the list
	*
	* @param string  Post type key, must not exceed 20 characters
	* @param array|string  See optional args description above.
	* @return object|WP_Error the registered post type object, or an error object
	*/
	public function GS_Testimonial_Slider() {
		$labels = [
			'name'               => _x( 'Testimonials', 'gst' ),
			'singular_name'      => _x( 'Testimonial', 'gst' ),
			'menu_name'          => _x( 'GS Testimonials', 'admin menu', 'gst' ),
			'name_admin_bar'     => _x( 'GS Testimonial', 'add new on admin bar', 'gst' ),
			'add_new'            => _x( 'Add New', 'testimonial', 'gst' ),
			'add_new_item'       => __( 'Add New Testimonial', 'gst' ),
			'new_item'           => __( 'New Testimonial', 'gst' ),
			'edit_item'          => __( 'Edit Testimonial', 'gst' ),
			'view_item'          => __( 'View Testimonial', 'gst' ),
			'all_items'          => __( 'All Testimonials', 'gst' ),
			'search_items'       => __( 'Search Testimonials', 'gst' ),
			'parent_item_colon'  => __( 'Parent Testimonials:', 'gst' ),
			'not_found'          => __( 'No testimonials found.', 'gst' ),
			'not_found_in_trash' => __( 'No testimonials found in Trash.', 'gst' ),
		];

		$args = [
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => [ 'slug' => 'gs_testimonials' ],
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => 5,
			'menu_icon'          => 'dashicons-editor-quote',
			'supports'           => [ 'title', 'editor','thumbnail' ]
		];

		register_post_type( 'gs_testimonial', $args );
	}

	/**
	 * Add post type theme support.
	 * 
	 * @since 1.0.0
	 */
	public function gs_testimonial_theme_support()  {
		// TODO: check if the pro is not enabled
		add_theme_support( 'post-thumbnails', [ 'gs_testimonial' ] );
		add_filter('widget_text', 'do_shortcode');

		do_action( 'gstm_theme_supports' );
	}
}