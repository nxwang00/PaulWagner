<?php
/**
 * Plugin Name:       WooCommerce Minicart Pro
 * Plugin URI:        https://ahmadshyk.com/item/woocommerce-minicart-pro/
 * Description:       The simple plugin to add Minicart on your WooCommerce website. This is pro version.
 * Version:           1.2.4
 * Author:            Ahmad Shyk
 * Author URI:        https://ahmadshyk.com
 * Text Domain:       woo-minicart-pro
*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 */
define( 'WOO_MINICART_PRO_VERSION', '1.2.4' );

/**
 * Activation Hook.
 */
register_activation_hook( __FILE__, 'wmc_pro_activate' );
function wmc_pro_activate(){

	$default = array(
		'enable-minicart'        => 1,
		'minicart-icon'          => 'wmc-icon-1',
		'minicart-position'      => 'wmc-top-right',
		'wmc-offset'             => 150
	);
	add_option( 'wmc_options', $default, '', 'yes' );

	$pro_default = array(
		'custom-cart-icon'       => '',
		'wmc-count-bg'           => '#333',
		'wmc-count-tc'           => '#fff',
		'wmc-hbg'                => '#333',
		'wmc-htc'                => '#fff',
		'wmc-vcbg'               => '#333',
		'wmc-vctc'               => '#fff',
		'wmc-vchbg'              =>'#333',
		'wmc-vchtc'              => '#fff',
		'wmc-chbg'               => '#333',
		'wmc-chtc'               => '#fff',
		'wmc-chhbg'              =>'#333',
		'wmc-chhtc'              => '#fff',
	);
	add_option( 'wmc_pro_options', $pro_default, '', 'yes' );
}

/**
 * Admin notice if WooCommerce not installed and activated.
 */
function wmc_pro_no_free_version(){ ?>
		<div class="error">
				<p><?php _e( 'WooCommerce Minicart Pro Plugin is activated but not effective. It requires <a href="'.admin_url('/plugin-install.php?s=woo-minicart&tab=search&type=term').'">WooCommerce Minicart</a> free version in order to work.', 'woo-minicart-pro' ); ?></p>
			</div>
<?php	
}

/**
 *  Main Class
 */
if ( in_array( 'woo-minicart/woo-minicart.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {
	require plugin_dir_path( __FILE__ ) . 'class-woo-minicart-pro.php';
	new WMC_PRO_Main_Class();

}

else{
	add_action( 'admin_notices', 'wmc_pro_no_free_version' );
}

//Add settings link on plugin page
function wmc_pro_settings_link($links) { 
  $settings_link = '<a href="admin.php?page=woo-minicart-pro">'.
  __( 'Settings', 'woo-minicart-pro' ).'
  </a>'; 
  array_unshift($links, $settings_link); 
  return $links; 
}
 
$plugin = plugin_basename(__FILE__); 
add_filter("plugin_action_links_$plugin", 'wmc_pro_settings_link' );

require 'plugin-update-checker/plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://ahmadshyk.com/plugin-update-jsons/wmc.json',
	__FILE__, //Full path to the main plugin file or functions.php.
	'woo-minicart-pro'
);

add_action( 'init', 'woo_minicart_pro_load_textdomain' );
  
/**
 * Load plugin textdomain.
 */
function woo_minicart_pro_load_textdomain() {
  load_plugin_textdomain( 'woo-minicart-pro', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
}