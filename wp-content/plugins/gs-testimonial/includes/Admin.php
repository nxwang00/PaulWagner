<?php

namespace GSTM;

// if direct access than exit the file.
defined('ABSPATH') || exit;

/*
 * Handles plugins admin area.
 *
 * @since 1.0.0
 */

class Admin {

	/*
	 * Plugin constructor
	 *
	 * @since 1.0.0
	 */
    public function __construct() {
		// initialize settings api.
        $this->settings_api = new \GSTM\SettingsApi;
        add_action( 'admin_menu', [ $this, 'admin_menu' ] );
        add_action( 'admin_init', [ $this, 'admin_init' ] );
	}

	/**
	 * Registering admin menus.
	 *
	 * @since 1.0.0
	 */
    public function admin_menu() {
		add_submenu_page(
            'edit.php?post_type=gs_testimonial',
            __( 'Testimonial Settings', 'gst' ),
            __( 'Settings', 'gst' ),
            'delete_posts',
            'testimonial-settings',
            [ $this, 'displayPluginSettingsPage' ]
        );

	    if ( gstm()->helpers->isProActive() ) {
		    add_submenu_page(
			    'edit.php?post_type=gs_testimonial',
			    __( 'GS Testimonial License', 'gst' ),
			    __( 'License', 'gst' ),
			    'manage_options',
			    GS_TESTIMONIAL_LICENSE_PAGE,
			    [ 'GSTM_Pro\License\Manager', 'gs_testimonial_license_page' ]
		    );
	    }

	    add_submenu_page(
		    'edit.php?post_type=gs_testimonial',
		    __( 'GS Pro Plugins', 'gst' ),
		    __( 'Pro Plugins', 'gst' ),
		    'manage_options',
		    'gs-add-ons',
		    [ $this, 'displayPluginMainPage' ]
	    );

	    add_submenu_page(
		    'edit.php?post_type=gs_testimonial',
		    __( 'GS Free Plugins', 'gst' ),
		    __( 'Free Plugins', 'gst' ),
		    'manage_options',
		    'gs-plugins-free',
		    [ $this, 'displayFreeItemsPage' ]
	    );

	    add_submenu_page(
		    'edit.php?post_type=gs_testimonial',
		    __( 'Help & Usage', 'gst' ),
		    __( 'Help', 'gst' ),
		    'manage_options',
		    'gs-testimonial-help',
		    [ $this, 'displayHelpPage' ]
	    );
    }

	/**
	 * Initializing settings api.
	 *
	 * @since  1.0.0
	 * @return void
	 */
    public function admin_init() {
        //set the settings
        $this->settings_api->set_sections( gstm()->settingsConfig->get_settings_sections() );
        $this->settings_api->set_fields( gstm()->settingsConfig->get_settings_fields() );

        //initialize settings
        $this->settings_api->admin_init();
    }

	/**
	 * Displays plugin settings page.
	 *
	 * @since 1.0.0
	 */
    public function displayPluginSettingsPage() {
        include GST_PLUGIN_DIR . 'views/Settings.php';
    }

	/**
	 * Displays plugin main page.
	 *
	 * @since 1.0.0
	 */
    public function displayPluginMainPage() {
		gstm()->helpers->display_remote_page( '://gsplugins.com/gs_plugins_list/index.php' );
    }

	/**
	 * Displays plugin free items page.
	 *
	 * @since 1.0.0
	 */
    public function displayFreeItemsPage() {
        include GST_PLUGIN_DIR . 'views/Free.php';
    }

	/**
	 * Displays plugin help page.
	 *
	 * @since 1.0.0
	 */
    public function displayHelpPage() {
        include GST_PLUGIN_DIR . 'views/Help.php';
    }
}