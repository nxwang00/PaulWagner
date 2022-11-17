<?php
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
        array( 'parenthandle' ), 
        wp_get_theme()->get('Version') // this only works if you have Version in the style header
    );
}

// This theme uses wp_nav_menu() in two locations.
	register_nav_menus(
		array(
			'top'    => __( 'Top Menu', 'twentyseventeen' ),
			'header_login_menu' => __( 'Header Login Menu', 'twentyseventeen' ),
			'footer' => __( 'Footer Menu', 'twentyseventeen' ),
			'social' => __( 'Social Links Menu', 'twentyseventeen' ),
		)
	);
	 

/**
 * Global Setting.
 */

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Header Settings',
		'menu_title'	=> 'Header',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Footer Settings',
		'menu_title'	=> 'Footer',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Banner Settings',
		'menu_title'	=> 'Banner',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Site Info Settings',
		'menu_title'	=> 'Site Info',
		'parent_slug'	=> 'theme-general-settings',
	));
	
	acf_add_options_sub_page(array(
		'page_title' 	=> 'Theme Social Menu Settings',
		'menu_title'	=> 'Social Menus',
		'parent_slug'	=> 'theme-general-settings',
	));

  acf_add_options_sub_page(array(
    'page_title'  => 'Courser Detail',
    'menu_title'  => 'Courser Detail',
    'parent_slug' => 'theme-general-settings',
  ));

 acf_add_options_sub_page(array(
    'page_title'  => 'Shop Order Emails',
    'menu_title'  => 'Shop Order Emails',
    'parent_slug' => 'theme-general-settings',
  ));

  acf_add_options_sub_page(array(
    'page_title'  => 'Shop Marketing Emails',
    'menu_title'  => 'Shop Marketing Emails',
    'parent_slug' => 'theme-general-settings',
  )); 
}


// Extra Function :

/* to get the price*/
add_shortcode( 'cl_product_price', 'cl_woo_product_price_shortcode' );
function cl_woo_product_price_shortcode( $atts ) {	
	$atts = shortcode_atts( array(
		'id' => null
	), $atts, 'cl_product_price' ); 
	if ( empty( $atts[ 'id' ] ) ) {
		return '';
	} 
	$product = wc_get_product( $atts['id'] ); 
	if ( ! $product ) {
		return '';
	} 
	return $product->get_price_html();
}

/* to get description*/
add_shortcode( 'product_description', 'display_product_description' );
function display_product_description( $atts ){
    $atts = shortcode_atts( array(
        'id' => get_the_id(),
    ), $atts, 'product_description' );

    global $product;

    if ( ! is_a( $product, 'WC_Product') )
        $product = wc_get_product($atts['id']);

    return $product->get_description();
}

//search form
function shapeSpace_display_search_form() {
	return get_search_form(false);
}
add_shortcode('display_search_form', 'shapeSpace_display_search_form');

// Remove pages from search results
// function exclude_pages_from_search($query) {
//     if ( $query->is_main_query() && is_search() ) {
//         $query->set( 'post_type', 'post' );
//     }
//     return $query;
// }
// add_filter( 'pre_get_posts','exclude_pages_from_search' );



/*function category_single_product() {

    $product_cats = wp_get_post_terms( get_the_ID(), 'product_cat' );

    if ($product_cats && ! is_wp_error ($product_cats )) {

        $single_cat = array_shift( $product_cats );
        echo '<div class="product_category_title"><span>'.$single_cat->name.'</span></div>';

    }
}

add_action( 'woocommerce_before_shop_loop_item_title', 'category_single_product', 25 );*/


add_action('woocommerce_before_shop_loop_item_title', 'wp_store_wrapper_woocommerce_before_shop_loop_item_title1', 20);
add_action('woocommerce_after_shop_loop_item', 'wp_store_wrapper_woocommerce_after_shop_loop_item_title1', 12);
	// start wrap-image-sale div
	function wp_store_wrapper_woocommerce_before_shop_loop_item_title1() {
		echo '<div class="custom-product-wrapper">';
	}

	function wp_store_wrapper_woocommerce_after_shop_loop_item_title1() {
		echo '</div>';
	}
  
  
  /*override checkout fields for virtual products*/

function simplify_checkout_virtual( $fields ) {
    
   $only_virtual = true;
    
   foreach( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
      if (!$cart_item['data']->is_virtual())
      $only_virtual = false;   
   }
     
    if( $only_virtual ) {
       /*unset( $fields['billing']['billing_company'] );
       unset( $fields['billing']['billing_address_1'] );
       unset( $fields['billing']['billing_address_2'] );
       unset( $fields['billing']['billing_city'] );
       unset( $fields['billing']['billing_postcode'] );
       unset( $fields['billing']['billing_country'] );
       unset( $fields['billing']['billing_state'] );
       unset( $fields['billing']['billing_phone'] );*/

       unset( $fields['billing']['billing_company'] );
      // unset( $fields['billing']['billing_country']);
       unset( $fields['billing']['billing_phone'] );

     } else {
       unset( $fields['billing']['billing_company'] );
      // unset( $fields['billing']['billing_country']);
       unset( $fields['billing']['billing_phone'] );
     }
     
     return $fields;
}

 add_filter( 'woocommerce_checkout_fields' , 'simplify_checkout_virtual' );

/**
 * Remove related products output
 */
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20 );

/* cart empty message */
add_filter( 'wc_empty_cart_message', 'custom_wc_empty_cart_message' );
function custom_wc_empty_cart_message() {
  return '<span class="emptycart">Let\'s buy something fun.<br/> How about The Personality Cards! <a href="'.get_site_url().'/shop" class="toshop">CLICK HERE</a> to visit the store.</span>';
}

/*additional terms on particular product */
add_action( 'woocommerce_review_order_before_submit', 'bbloomer_add_checkout_per_product_terms', 9 );
    
function bbloomer_add_checkout_per_product_terms() {
  
$product_ids = array( 3921, 3939, 3940, 10255,10254,10051,7026,7061,7527,7525,7529,10118,9);
$is_in_cart = false;

// Iterating through cart items and check
foreach( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
    if( in_array( $cart_item['data']->get_id(), $product_ids ) ) {
        $is_in_cart = true; 
        break; 
    }
}

  
if ( $is_in_cart ) {
  
?>
<!-- <p class="form-row terms wc-terms-and-conditions validate-required w-100">
<label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
<input type="checkbox" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" name="terms-1" <?php checked( apply_filters( 'woocommerce_terms_is_checked_default', isset( $_POST['terms-1'] ) ), true ); ?> id="terms-1"> <span>I agree to this site's <a href="<?php echo home_url('privacy-policy');?>" class="woocommerce-privacy-policy-link" target="_blank">Privacy Policy</a>, <a href="<?php echo home_url('terms-and-conditions');?>" class="woocommerce-privacy-policy-link" target="_blank">Terms and Conditions</a>.</span> <span class="required">*</span>
</label>
<input type="hidden" name="terms-1-field" value="true">
</p> -->

<p class="form-row terms wc-terms-and-conditions validate-required w-100">
<label class="woocommerce-form__label woocommerce-form__label-for-checkbox checkbox">
<input type="checkbox" class="woocommerce-form__input woocommerce-form__input-checkbox input-checkbox" name="terms-2" <?php checked( apply_filters( 'woocommerce_terms_is_checked_default', isset( $_POST['terms-2'] ) ), true ); ?> id="terms-2"> <span>I agree to this site's <a href="<?php echo home_url('consent-and-waiver');?>" class="woocommerce-privacy-policy-link" target="_blank">Consent and Waiver</a></span><a class="arrow" href="javascript:void(0)"></a> <span class="required">*</span>
</label>
<input type="hidden" name="terms-2-field" value="true">
</p>

<div class="consent-and-waiver" style="max-height: 200px; overflow: auto; display: none;">
  <?php echo get_field( "consent_and_waiver_details", 'option' ); ?>
</div>
   
<?php
 }
}


   
// Show notice if customer does not tick either terms
  
add_action( 'woocommerce_checkout_process', 'bbloomer_not_approved_terms_1' );
   
function bbloomer_not_approved_terms_1() {
    /*if ( $_POST['terms-1-field'] == true ) {
      if ( empty( $_POST['terms-1'] ) ) {
           wc_add_notice( __( 'Please agree to Privacy Policy' ), 'error' );         
      }
   }*/

   if ( $_POST['terms-2-field'] == true ) {
      if ( empty( $_POST['terms-2'] ) ) {
           wc_add_notice( __( 'Please agree to Consent and Waiver' ), 'error' );         
      }
   }

}


add_filter( 'woocommerce_product_tabs', 'woo_remove_product_tabs', 98 );

function woo_remove_product_tabs( $tabs ) {

    unset( $tabs['description'] );      	// Remove the description tab
    unset( $tabs['additional_information'] );  	// Remove the additional information tab

    return $tabs;

}

/**
 * Register a custom menu page.
 */
add_action( 'admin_menu', 'register_my_custom_menu_page' );
function register_my_custom_menu_page() {
  // add_menu_page( $page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position );
  add_menu_page( 'Old Site Suscriber', 'Old Site Suscriber', 'manage_options', 'old_site.php', 'old_site_data', 'dashicons-welcome-widgets-menus', 90 );
}


/**
 * @snippet       Add Cc: or Bcc: Recipient @ WooCommerce Completed Order Email
 * @how-to        Get CustomizeWoo.com FREE
 * @author        Rodolfo Melogli
 * @compatible    WooCommerce 3.8
 * @donate $9     https://businessbloomer.com/bloomer-armada/
 */
 
add_filter( 'woocommerce_email_headers', 'bbloomer_order_completed_email_add_cc_bcc', 9999, 3 );
 
function bbloomer_order_completed_email_add_cc_bcc( $headers, $email_id, $order ) {
    if ( 'customer_completed_order' == $email_id ) {
       
        $headers .= "Bcc: Test For Recipient <bhaskardhote7@gmail.com>" . "\r\n"; // del if not needed
    }
    return $headers;
}

function old_site_data(){
	include('old_site.php');
}




function download_resourse(){ 

  $download_resourse_form .= '<div class="hbook-graphic">
          <div class="hbookgraphic-container">
               <div class="hbookgraphic-inner">
                  <div class="hbookgraphic-row">
                      <div class="hbookgraphic-col hbookgraphic-book">
                          <div class="hbookgraphicbook-in">
                              <img src="'.site_url().'/wp-content/uploads/book-graphic.png" alt="How to live an exuberant life" />
                            </div>
                    </div>
                        
                        <div class="hbookgraphic-col hbookgraphic-text">
                          <div class="hbookgraphictext-in">
                              <p>Download My Free Report</p>
                                <h2>“How To Live An Exuberant Life”</h2>
                            </div>
                    </div>';
                        
                         $download_resourse_form .= '<div class="hbookgraphic-col hbookgraphic-form">';
                          $download_resourse_form .= '<div class="hbookgraphicform-in">';
                               $download_resourse_form .= do_shortcode('[gravityform id="4" title="false" description="false" ajax="true"]'); 
                             $download_resourse_form .='</div>
                    </div>
                  </div>
                 </div>
            </div>
        </div>';

     return $download_resourse_form;   
}
add_shortcode('download_resourse_form','download_resourse');


function personality_card(){
   return '<a href=""><img src="<?php echo site_url() ?>/wp-content/uploads/article-pc.jpg" alt="" width="275" height="397" class="alignright size-full" /></a>';
}
add_shortcode('personality_card','personality_card');

function one_hour_session(){
   return '<a href=""><img src="<?php echo site_url() ?>/wp-content/uploads/article-author.jpg" alt="" width="271" height="398" class="alignleft size-full" /></a>';
}
add_shortcode('one_hour_session','one_hour_session');

function reading_vedic_report(){
   return '<a href=""><img src="<?php echo site_url() ?>/wp-content/uploads/article-intuitivereading.jpg" alt="" width="274" height="400" class="alignright size-full" /></a>';
}
add_shortcode('reading_vedic_report','reading_vedic_report');



/**
 * Auto Complete all WooCommerce orders.
 */
add_action( 'woocommerce_thankyou', 'custom_woocommerce_auto_complete_order' );
function custom_woocommerce_auto_complete_order( $order_id ) { 
    if ( ! $order_id ) {
        return;
    }

    $order = wc_get_order( $order_id );
    $order->update_status( 'completed' );
}

// Review add quickly
add_filter('comment_flood_filter', '__return_false');

remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
 
// ---------------------------
// 2. Echo Upsells In Another Position
 
add_action( 'woocommerce_after_single_product_summary', 'bbloomer_woocommerce_output_upsells', 5 );
 
function bbloomer_woocommerce_output_upsells() {
  woocommerce_upsell_display( 3,3 ); // Display max 3 products, 3 per row
}

// Custom Code featured image thumbnails in WordPress RSS Feeds
function wplogout_post_thumbnails_in_feeds( $content ) {
    global $post;
    if( has_post_thumbnail( $post->ID ) ) {
        $content = '<p>' . get_the_post_thumbnail( $post->ID ) . '</p>' . $content;
    }
    return $content;
}
add_filter( 'the_excerpt_rss', 'wplogout_post_thumbnails_in_feeds' );
add_filter( 'the_content_feed', 'wplogout_post_thumbnails_in_feeds' );


add_filter('woocommerce_get_availability_text', 'themeprefix_change_soldout', 10, 2 );

/**
* Change Sold Out Text to Something Else
*/
function themeprefix_change_soldout ( $text, $product) {
if ( !$product->is_in_stock() ) {
		$text = '<div class="apply_now_btn"><a href="https://www.paulwagner.com/session-questionnaire/">Apply Now</a></div>';
	}
	return $text;
}

// To change add to cart text on single product page
add_filter( 'woocommerce_product_single_add_to_cart_text', 'woocommerce_custom_single_add_to_cart_text' ); 
function woocommerce_custom_single_add_to_cart_text() {


    if(has_term( 4517, 'product_cat' )){
            return __( 'Buy Now', 'woocommerce' );
        }else{
           return __( 'ADD TO CART', 'woocommerce' );
        }

     
}

// To change add to cart text on product archives(Collection) page
add_filter( 'woocommerce_product_add_to_cart_text', 'woocommerce_custom_product_add_to_cart_text' );  
function woocommerce_custom_product_add_to_cart_text($text) {

	if( 'Read more' == $text ) {
        return __( 'Apply Now', 'woocommerce' );
    }else{

        if(has_term( 4517, 'product_cat' )){
            return __( 'Learn More', 'woocommerce' );
        }else{
            return __( 'Buy Now', 'woocommerce' );
        }
    	
	}
}

// Alter WooCommerce View Cart Text
add_filter( 'gettext', function( $translated_text ) {
    if ( 'View cart' === $translated_text ) {
        $translated_text = 'ADDED TO CART';
    }
    return $translated_text;
} );

add_filter( 'woocommerce_product_add_to_cart_url', 'out_of_stock_read_more_url', 50, 2 );
function out_of_stock_read_more_url( $link, $product  ) {
    // Only for "Out of stock" products
    if( $product->get_stock_status() == 'outofstock' ){

        // Here below we change the link
        $link = home_url("/session-questionnaire/");
    }
    return $link;
}

add_filter( 'woocommerce_loop_add_to_cart_link', 'ts_replace_add_to_cart_button', 10, 2 );
function ts_replace_add_to_cart_button( $button, $product ) {
//if (is_product_category() || is_shop()) {
            $button_text = __("View Product", "woocommerce");
            $button_link = $product->get_permalink();

            $button = '<a href="'.$button_link.'" class="button product_type_simple add_to_cart_button " rel="nofollow" data-wpel-link="internal">Buy Now</a>';

          //  $button = '<a class="button" href="' . $button_link . '">' . $button_text . '</a>';
            return $button;
//}
}

/** 
*  Set product title as link to product page
**/
// define the woocommerce_shop_loop_item_title callback 
remove_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_title', 10, 2 ); 

if ( ! function_exists( 'codeless_woocommerce_template_loop_product_title' ) ) { 
    /**
     * Show the product title in the product loop. By default this is an H2.
     */
    function codeless_woocommerce_template_loop_product_title() {
        global $product;

        $link = apply_filters( 'woocommerce_template_loop_product_title', get_the_permalink(), $product );

        

        echo '<a href="' . esc_url( $link ) . '"><h2 class="' . esc_attr( apply_filters( 'woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title' ) ) . '">' . get_the_title() . '</h2></a>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    } 
}; 
         
// add the action 
add_action( 'woocommerce_shop_loop_item_title', 'codeless_woocommerce_template_loop_product_title', 10, 2 ); 


/**
 * WooCommerce Product Reviews Shortcode
 */
 
add_shortcode( 'product_reviews', 'silva_product_reviews_shortcode' );
 
function silva_product_reviews_shortcode( $atts ) {
    
   if ( empty( $atts ) ) return '';
 
   if ( ! isset( $atts['id'] ) ) return '';
       
   $comments = get_comments( 'post_id=' . $atts['id'] );
    
   if ( ! $comments ) return '';


   // echo count($comments);
    
   $html .= '<div class="home_page_review"><div class="star-rating" role="img" aria-label="Rated 5.00 out of 5"><span style="width:100%">Rated <strong class="rating">5.00</strong> out of 5 based on <span class="rating">'.count($comments).'</span> customer ratings</span></div><div class="preview">
                                <a href="#reviews" class="woocommerce-review-link" rel="nofollow">(<span class="count">'.count($comments).'</span> Reviews)</a>
                        </div></div>';
    
   /*foreach ( $comments as $comment ) {   
      $rating = intval( get_comment_meta( $comment->comment_ID, 'rating', true ) );
      $html .= '<li class="review">';
      $html .= get_avatar( $comment, '60' );
      $html .= '<div class="comment-text">';
      if ( $rating ) $html .= wc_get_rating_html( $rating );
      $html .= '<p class="meta"><strong class="woocommerce-review__author">';
      $html .= get_comment_author( $comment );
      $html .= '</strong></p>';
      $html .= '<div class="description">';
      $html .= $comment->comment_content;
      $html .= '</div></div>';
      $html .= '</li>';
   }*/
    
 //  $html .= '</ol></div></div>';
    
   return $html;
}