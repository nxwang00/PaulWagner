<?php
/**
 *
 * @package   GS_Testimonial
 * @author    GS Plugins <hello@gsplugins.com>
 * @license   GPL-2.0+
 * @link      https://www.gsplugins.com
 * @copyright 2015 GS Plugins
 *
 * @wordpress-plugin
 * Plugin Name:			GS Testimonial Lite
 * Plugin URI:			https://www.gsplugins.com/wordpress-plugins
 * Description:       	Best Responsive Testimonials slider to display client's testimonials / recommendations. Display anywhere at your site using shortcode like [gs_testimonial] / [gs_testimonial theme="gs_style1"] Check more shortcode examples and documention at <a href="http://testimonial.gsplugins.com">GS Testimonial Pro Docs</a> 
 * Version:           	1.9.7
 * Author:       		GS Plugins
 * Author URI:       	https://www.gsplugins.com
 * Text Domain:       	gst
 * License:           	GPL-2.0+
 * License URI:       	http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Defining constants
 */
define( 'GST_VERSION', '1.9.7' );
define( 'GST_MENU_POSITION', 32 );
define( 'GST_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
define( 'GST_PLUGIN_URI', plugins_url( '', __FILE__ ) );
define ( 'GST_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );

/**
 * Initiate Autoloader for Class Load
 * 
 * @since 1.0.0
 */
if ( ! class_exists( '\GSTM\Autoloader' ) ) {
    require GST_PLUGIN_DIR . 'includes/autoloader.php';
    \GSTM\Autoloader::init();
}

/**
 * Activation redirects
 *
 * @since 1.0.0
 */
register_activation_hook( __FILE__, function () {
    add_option( 'gstestimonial_activation_redirect', true );
});

/**
 * Remove reviews metadata on plugin deactivation.
 * 
 * @since 1.0.0
 */
register_deactivation_hook( __FILE__,  function() {
    delete_option( 'gstestimonial_active_time' );
    delete_option( 'gstestimonial_maybe_later' );
    delete_option( 'gsadmin_maybe_later' );
});

if ( ! function_exists( 'gstm' ) ) {
	/**
	 * This function is responsible for running the main plugin.
	 * 
	 * @since  1.0.0
	 * @return object GSTM The plugin instance.
	 */
	function gstm() {
		return GSTM\GSTM::getInstance();
	}

    gstm();
}