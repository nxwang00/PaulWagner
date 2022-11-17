<?php

namespace GSTM;

// if direct access than exit the file.
defined('ABSPATH') || exit;

/*
 * Handle plugins admin notices.
 *
 * @since 1.0.0
 */
class Notices {

	/**
	 * Constructor of the class.
     *
     * @since 1.0.0
	 */
    public function __construct() {
        //add_action('admin_notices', 'gst_get_free');
        //add_action('network_admin_notices', 'gst_get_free');
        // add_action( 'admin_init', 'gsadmin_signup_notice' );
        // add_action('admin_notices', 'gs_admin_tickr_notice');
        // add_action('admin_init', 'gstickr_nag_ignore');

        add_action( 'admin_init', [ $this, 'gstestimonial_review_notice' ] );
	    if ( ! defined( 'GST_PRO_PLUGIN_DIR' ) ) {
		    add_action( 'admin_notices', [ $this, 'gstestimonial_admin_notice' ] );
        }
        add_action( 'admin_init', [ $this, 'gstestimonial_nag_ignore' ] );
    }

    /**
     * @review_dismiss()
     * @gstestimonial_review_pending()
     * @gsteam_review_notice_message()
     * Make all the above functions working.
     *
     * @since 1.0.0
     */
    public function gstestimonial_review_notice(){
        $this->gstestimonial_review_dismiss();
        $this->gstestimonial_review_pending();

        $activation_time  = get_site_option( 'gstestimonial_active_time' );
        $review_dismissal = get_site_option( 'gstestimonial_review_dismiss' );
        $maybe_later      = get_site_option( 'gstestimonial_maybe_later' );

        if ( 'yes' === $review_dismissal ) {
            return;
        }

        if ( ! $activation_time ) {
            add_site_option( 'gstestimonial_active_time', time() );
        }

        $daysinseconds = 259200; // 3 Days in seconds.    
        if ( 'yes' == $maybe_later ) {
            $daysinseconds = 604800 ; // 7 Days in seconds.
        }

        if ( time() - $activation_time > $daysinseconds ) {
            add_action( 'admin_notices' , [ $this, 'gstestimonial_review_notice_message' ] );
        }
    }

    /**
     * Admin notice for Free
     *
     * @since 1.0.0
     */
    public function gst_get_free() { ?>
        <?php ob_start(); ?>
        <div class="update-nag">
            <h3><?php _e( 'Upgrade to PRO GS Testimonial Slider for free!!', 'gst' ); ?></h3>
            <p><?php _e( 'Dear GS Testimonial Slider User', 'gst' ); ?> --<br>
            <?php _e( 'Great News!', 'gst' ); ?> <br>
            <?php _e( 'Upgrade your existing one to PRO version, it\'s 100% free !!
            As we are lunching, offering you to download GS Testimonial slider wordpress PRO plugin completely free till 15th March\'15. Hurry up & grab your copy.', 'gst' ); ?> <br>

            <?php _e( 'Download here', 'gst' ); ?><a href="http://goo.gl/6SrINy" target="_blank"><?php _e( 'Download PRO version', 'gst' ); ?></a></p>
            <p><?php _e( 'GS Testimonial Slider Team', 'gst' ); ?></p>
        </div>
        <?php echo ob_get_clean();
    }

    /**
     * For the notice preview.
     *
     * @since 1.0.0
     */
    public function gstestimonial_review_notice_message(){
        $server_uri = sanitize_text_field( $_SERVER['REQUEST_URI'] );
        $scheme      = parse_url( $server_uri, PHP_URL_QUERY ) ? '&' : '?';
        $url         = $server_uri . $scheme . 'gstestimonial_review_dismiss=yes';
        $dismiss_url = wp_nonce_url( $url, 'gstestimonial-review-nonce' );
        $_later_link = $server_uri . $scheme . 'gstestimonial_review_later=yes';
        $later_url   = wp_nonce_url( $_later_link, 'gstestimonial-review-nonce' );
        ?>
        <div class="gsteam-review-notice">
            <div class="gsteam-review-thumbnail">
                <img src="<?php echo GST_PLUGIN_URI . '/assets/img/gs-testimonial-slider.png'; ?>" alt="">
            </div>
            <div class="gsteam-review-text">
                <h3><?php _e( 'Leave A Review?', 'gst' ) ?></h3>
                <p><?php _e( 'We hope you\'ve enjoyed using GS Testimonial Slider! Would you consider leaving us a review on WordPress.org?', 'gst' ) ?></p>
                <ul class="gsteam-review-ul">
                    <li>
                        <a href="https://wordpress.org/support/plugin/gs-testimonial/reviews/?filter=5" target="_blank">
                            <span class="dashicons dashicons-external"></span>
                            <?php _e( 'Sure! I\'d love to!', 'gst' ) ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url($dismiss_url); ?>">
                            <span class="dashicons dashicons-smiley"></span>
                            <?php _e( 'I\'ve already left a review', 'gst' ) ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url($later_url); ?>">
                            <span class="dashicons dashicons-calendar-alt"></span>
                            <?php _e( 'Maybe Later', 'gst' ) ?>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.gsplugins.com/support" target="_blank">
                            <span class="dashicons dashicons-sos"></span>
                            <?php _e( 'I need help!', 'gst' ) ?>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo esc_url($dismiss_url); ?>">
                            <span class="dashicons dashicons-dismiss"></span>
                            <?php _e( 'Never show again', 'gst' ) ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <?php
    }

	/**
	 * Admin notice for sign up.
     *
     * @since 1.0.0
	 */
    public function gsadmin_signup_notice(){
        gsadmin_signup_pending() ;
        $activation_time    = get_site_option( 'gsadmin_active_time' );
        $maybe_later        = get_site_option( 'gsadmin_maybe_later' );
    
        if ( ! $activation_time ) {
            add_site_option( 'gsadmin_active_time', time() );
        }
        
        if ( 'yes' == $maybe_later ) {
            $daysinseconds = 604800 ; // 7 Days in seconds.
            if ( time() - $activation_time > $daysinseconds ) {
                add_action( 'admin_notices' , 'gsadmin_signup_notice_message' );
            }
        } else{
            add_action( 'admin_notices' , 'gsadmin_signup_notice_message' );
        }
    
    }

    /**
     * For the notice signup.
     *
     * @since 1.0.0
     */
    public function gsadmin_signup_notice_message(){
        $server_uri  = sanitize_text_field( $_SERVER['REQUEST_URI'] );
        $scheme      = parse_url( $server_uri, PHP_URL_QUERY ) ? '&' : '?';
        $_later_link = $server_uri . $scheme . 'gsadmin_signup_later=yes';
        $later_url   = wp_nonce_url( $_later_link, 'gsadmin-signup-nonce' );
        ?>
        <div class=" gstesti-admin-notice updated gsteam-review-notice">
            <div class="gsteam-review-text">
                <h3><?php _e( 'GS Plugins Affiliate Program is now LIVE!', 'gst' ) ?></h3>
                <p><?php _e( 'Join GS Plugins affiliate program. Share our 80% OFF lifetime bundle deals or any plugin with your friends/followers and earn up to 50% commission.', 'gst' ); ?>><a href="https://www.gsplugins.com/affiliate-registration/?utm_source=wporg&utm_medium=admin_notice&utm_campaign=aff_regi" target="_blank">Click here to sign up.</a></p>
                <ul class="gsteam-review-ul">
                    <li style="display: inline-block;margin-right: 15px;">
                        <a href="<?php echo esc_url($later_url); ?>" style="display: inline-block;color: #10738B;text-decoration: none;position: relative;">
                            <span class="dashicons dashicons-dismiss"></span>
                            <?php _e( 'Hide Now', 'gst' ) ?>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <?php
    }

    /**
     * For Maybe Later signup.
     *
     * @since 1.0.0
     */
    public function gsadmin_signup_pending() {
        if ( ! is_admin() ||
            ! current_user_can( 'manage_options' ) ||
            ! isset( $_GET['_wpnonce'] ) ||
            ! wp_verify_nonce( sanitize_key( wp_unslash( $_GET['_wpnonce'] ) ), 'gsadmin-signup-nonce' ) ||
            ! isset( $_GET['gsadmin_signup_later'] ) ) {

            return;
        }
        // Reset Time to current time.
        update_site_option( 'gsadmin_active_time', time() );
        update_site_option( 'gsadmin_maybe_later', 'yes' );
    }

    /**
     * For Dismiss!
     *
     * @since 1.0.0
     */
    public function gstestimonial_review_dismiss(){
        if ( ! is_admin() ||
            ! current_user_can( 'manage_options' ) ||
            ! isset( $_GET['_wpnonce'] ) ||
            ! wp_verify_nonce( sanitize_key( wp_unslash( $_GET['_wpnonce'] ) ), 'gstestimonial-review-nonce' ) ||
            ! isset( $_GET['gstestimonial_review_dismiss'] ) ) {

            return;
        }
        add_site_option( 'gstestimonial_review_dismiss', 'yes' ); 
    }

    /**
     * For Maybe Later Update.
     *
     * @since 1.0.0
     */
    public function gstestimonial_review_pending() {
        if ( ! is_admin() ||
            ! current_user_can( 'manage_options' ) ||
            ! isset( $_GET['_wpnonce'] ) ||
            ! wp_verify_nonce( sanitize_key( wp_unslash( $_GET['_wpnonce'] ) ), 'gstestimonial-review-nonce' ) ||
            ! isset( $_GET['gstestimonial_review_later'] ) ) {
            return;
        }
        // Reset Time to current time.
        update_site_option( 'gstestimonial_active_time', time() );
        update_site_option( 'gstestimonial_maybe_later', 'yes' );
    }

    /**
     * Admin Notice
     *
     * @since 1.0.0
     */
    public function gstestimonial_admin_notice() {
        if ( current_user_can( 'install_plugins' ) ) {
            global $current_user;
            $user_id = $current_user->ID;

            /* Check that the user hasn't already clicked to ignore the message */
            if ( ! get_user_meta($user_id, 'gstesti_ignore_notice279') ) {
                echo '<div class="gstesti-admin-notice updated" style="display: flex; align-items: center; padding-left: 0; border-left-color: #EF4B53"><p style="width: 32px;">';
                echo '<img style="width: 100%; display: block;"  src="' . GST_PLUGIN_URI . '/assets/img/gs-testimonial-slider.png' . '" ></p><p> ';
                printf(__('<strong>GS Testimonial Slider</strong> now powering huge websites. Use the coupon code <strong>ENJOY25P</strong> to redeem a <strong>25&#37; </strong> discount on Pro. <a href="https://www.gsplugins.com/product/gs-testimonial-slider" target="_blank" style="text-decoration: none;"><span class="dashicons dashicons-smiley" style="margin-left: 10px;"></span> Apply Coupon</a>
                <a href="%1$s" style="text-decoration: none; margin-left: 10px;"><span class="dashicons dashicons-dismiss"></span> I\'m good with free version</a>'),  admin_url( 'edit.php?post_type=gs_testimonial&page=testimonial-settings&gstestimonial_nag_ignore=0' ));
                echo "</p></div>";
            }
        }
    }

    /**
     * Nag Ignore
     *
     * @since 1.0.0
     */
    public function gstestimonial_nag_ignore() {
        global $current_user;
        $user_id = $current_user->ID;
        /* If user clicks to ignore the notice, add that to their user meta */
        if ( isset($_GET['gstestimonial_nag_ignore']) && '0' == $_GET['gstestimonial_nag_ignore'] ) {
            add_user_meta($user_id, 'gstesti_ignore_notice279', 'true', true);
        }
    }

	/**
	 * Displays ticker notice.
     *
     * @since 1.0.0
	 */
    public function gs_admin_tickr_notice() {
        global $current_user ;
        $user_id = $current_user->ID;
        if ( ! get_user_meta( $user_id, 'gstickr_nag_ignore' ) ) { ?>
            <div class="notice notice-info" style="position: relative;">
            <?php
                gstm()->helpers->display_remote_page( '://gsplugins.com/gs_plugins_list/admin_notice.php' );
                printf(__('<a href="%1$s" style="text-decoration: none; background: #fff;right:6px;top: 10px; float:right;position: absolute;"><span class="dashicons dashicons-dismiss"></span> </a>'),  admin_url( 'index.php?&gstickr_nag_ignore=0' ));
            ?>
            </div>
            <?php 
        }
    }

	/**
	 * Ticker nag ignore.
     *
     * @since 1.0.0
	 */
    public function gstickr_nag_ignore() {
        global $current_user;
        $user_id = $current_user->ID;
            /* If user clicks to ignore the notice, add that to their user meta */
            if ( isset( $_GET['gstickr_nag_ignore'] ) && '0' == $_GET['gstickr_nag_ignore'] ) {
                add_user_meta( $user_id, 'gstickr_nag_ignore', 'true', true );
                add_site_option( 'gstickr_active_time', time() );
            }

            $daysinseconds   = 259200; // 3 Days in seconds.
            $activation_time = get_site_option( 'gstickr_active_time' );

            if ( time() - $activation_time > $daysinseconds ) {
                delete_option( 'gstickr_active_time' );
                delete_user_meta( $user_id, 'gstickr_nag_ignore' );
            }
    }

}