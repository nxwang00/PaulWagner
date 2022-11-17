<?php
/**
 * Admin new order email
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/emails/admin-new-order.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates\Emails\HTML
 * @version 3.7.0
 */

defined( 'ABSPATH' ) || exit;

/*
 * @hooked WC_Emails::email_header() Output the email header
 */

foreach ( $order->get_items() as $item_id => $item ) {
	
   $product_id = $item->get_product_id();


   if($product_id == 9821 || $product_id == 3938 ){

   	 include('thank-you-email-session-cards.php');

   }elseif($product_id == 3940) {

   	include('thank-you-email-single-session.php');

   }elseif($product_id == 7061) { 

   	include('thanku-you-email-master-class-bundle-and-3-session-package.php');

   }else{

   	include('thanku-you-email-generic-purchase.php');
   }

}

?>
