<?php

namespace GSTM;

// if direct access than exit the file.
defined('ABSPATH') || exit;

/**
 * Handles plugin assets.
 * 
 * @since 1.0.0
 */
class Assets {

	/**
	 * Class constructor.
	 * 
	 * @since 1.0.0
	 */
	public function __construct() {
		add_action( 'wp_enqueue_scripts', [ $this, 'scripts' ] ); 
		add_action( 'wp_enqueue_scripts', [ $this, 'styles' ] );
		add_action( 'admin_enqueue_scripts', [ $this, 'adminScripts' ] );
	}

	/**
	 * Enqueue plugin scripts.
	 * 
	 * @since 1.0.0
	 */
	public function scripts() {
		wp_enqueue_script( 'jquery' );

		wp_register_script(
			'cycle-two',
			GST_PLUGIN_URI .'/assets/js/jquery.cycle2.min.js',
			array( 'jquery' ),
			GST_VERSION,
			true
		);

		wp_register_script(
			'cycle-two-caro',
			GST_PLUGIN_URI .'/assets/js/jquery.cycle2.carousel.js',
			array( 'jquery' ),
			GST_VERSION,
			true
		);

		if ( ! gstm()->helpers->isProActive() ) {
			wp_enqueue_script( 'cycle-two' );
			wp_enqueue_script( 'cycle-two-caro' );
		}
	}

	/**
	 * Enqueue plugin styles.
	 * 
	 * @since 1.0.0
	 */
	public function styles() {
		wp_register_style(
			'gstm-custom-style',
			GST_PLUGIN_URI.'/assets/css/custom.css',
			'',
			GST_VERSION,
			false
		);

		if ( ! gstm()->helpers->isProActive() ) {
			wp_enqueue_style('gstm-custom-style');
		}
	}

	/**
	 * Enqueue plugin admin scripts.
	 * 
	 * @since 1.0.0
	 */
	public function adminScripts() {
		wp_register_style(
			'gs_free_plugins_css',
			GST_PLUGIN_URI.'/assets/css/gs_free_plugins.css',
			'',
			GST_VERSION,
			'all'
		);
		wp_enqueue_style( 'gs_free_plugins_css' );
	}
}