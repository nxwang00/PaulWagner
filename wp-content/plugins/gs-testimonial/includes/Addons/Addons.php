<?php

namespace GSTM\Addons;

// if direct access than exit the file.
defined('ABSPATH') || exit;

/**
 * Handles plugin addons.
 *
 * @since 1.0.0
 */
class Addons {

	/**
	 * Class constructor
	 *
	 * @since 1.0.0
	 */
	public function __construct() {
		add_action( 'elementor/init', [ $this, 'gstest_widgets_registered' ] );
		add_action( 'widgets_init', [ $this, 'register_tes_widget' ] );


		if ( $this->isWPBackeryActive() ) {
			$this->wpbackery = new \GSTM\Addons\WPBackery;
		}
	}

	/**
	 * Registers elememtor widgets.
	 *
	 * @since 1.0.0
	 */
	public function gstest_widgets_registered() {
		if ( $this->isElementorActivated() ) {
			\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \GSTM\Addons\Elementor );
		}
	}

	/**
	 * Registers wp widget.
	 *
	 * @since 1.0.0
	 */
	public function register_tes_widget() {
		register_widget( '\GSTM\Addons\Widget' );
	}

	/**
	 * We check if the WPBackery plugin has been installed / activated.
	 *
	 * @since  1.0.0
	 * @return bool
	 */
	public function isWPBackeryActive() {
		return defined( 'WPB_VC_VERSION' );
	}

	/**
	 * We check if the Elementor plugin has been installed / activated.
	 *
	 * @return bool
	 */
	public function isElementorActivated() {
		return defined('ELEMENTOR_PATH') && class_exists('Elementor\Widget_Base');
	}
}