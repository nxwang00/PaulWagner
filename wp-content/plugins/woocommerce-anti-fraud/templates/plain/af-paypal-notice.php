<?php
/**
 * Admin notice Email Plan
 *
 * @author        WooThemes
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
} // Exit if accessed directly

echo $email_heading . "\n\n";

printf( __(get_option('wc_settings_anti_fraud_email_body') ) ) . "\r\n\r\n";
printf( __( '%1$sClick here to view the order.%2$s.', 'woocommerce-anti-fraud' ), '<a href="' . $url . '">', '</a>' ) . "\r\n\r\n";

echo "\n****************************************************\n\n";

echo apply_filters( 'woocommerce_email_footer_text', get_option( 'woocommerce_email_footer_text' ) );
