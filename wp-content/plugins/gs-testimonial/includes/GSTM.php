<?php

namespace GSTM;

// if direct access than exit the file.
defined('ABSPATH') || exit;

final class GSTM {

    /**
     * Holds the instance of the plugin currently in use.
     *
     * @since 1.0.0
     *
     * @var GSTM\GSTM
     */
    private static $instance = null;

    /**
     * Main Plugin Instance.
     *
     * Insures that only one instance of the addon exists in memory at any one
     * time. Also prevents needing to define globals all over the place.
     *
     * @since  1.0.0
     * @return GSTM
     */
	public static function getInstance() {
		if ( ! self::$instance ) {
			self::$instance = new self();
		}

		return self::$instance;
	}

    public function __construct() {
        $this->appsero_init_tracker_gs_testimonial();

        add_action( 'do_meta_boxes', [ $this, 'gs_testimonial_change_image_box' ] );
        add_action( 'admin_init', [ $this, 'gstestimonial_redirect' ] );
        add_filter( 'plugin_row_meta', [ $this, 'gs_testimonial_row_meta' ], 10, 2 );

        $this->helpers        = new \GSTM\Helpers;
        $this->assets         = new \GSTM\Assets;
        $this->cpt            = new \GSTM\CPT;
        $this->columns        = new \GSTM\Columns;
        $this->metabox        = new \GSTM\Metabox;
        $this->settingsApi    = new \GSTM\SettingsApi;
        $this->settingsConfig  = new \GSTM\SettingsConfig;
        $this->shortcodes     = new \GSTM\Shortcodes;
        $this->admin          = new \GSTM\Admin;
	    $this->noticed        = new \GSTM\Notices;
        $this->addons         = new \GSTM\Addons\Addons;


	    if ( ! $this->helpers->isProActive() ) {
		    add_filter( 'plugin_action_links_' . GST_PLUGIN_BASENAME, [ $this, 'gstmProLink' ] );
	    }

    }

    public function gs_testimonial_change_image_box() {
        remove_meta_box( 'postimagediv', 'gs_testimonial', 'side' );

        add_meta_box(
            'postimagediv',
            __( 'Testimonial Author Image', 'gst' ),
            'post_thumbnail_meta_box',
            'gs_testimonial',
            'side',
            'low'
        );
    }

    /**
     * Initialize the plugin tracker
     *
     * @return void
     */
    public function appsero_init_tracker_gs_testimonial() {
        if ( ! class_exists( 'AppSero\Insights' ) ) {
            require_once GST_PLUGIN_DIR . '/includes/appsero/src/Client.php';
        }

        $client = new \Appsero\Client( 'efbbfe11-e706-422e-99a3-fb49bce74e2d', 'GS Testimonial Slider', __FILE__ );
        $client->insights()->init();
    }

    /**
     * Redirect to options page
     *
     * @since v1.0.0
     */
    public function gstestimonial_redirect() {
        if ( get_option( 'gstestimonial_activation_redirect', false ) ) {
            delete_option( 'gstestimonial_activation_redirect' );

            if ( ! isset( $_GET[ 'activate-multi' ] ) ) {
                wp_redirect("edit.php?post_type=gs_testimonial&page=gs-testimonial-help");
            }
        }
    }

    public function gs_testimonial_row_meta( $meta_fields, $file ) {
        if ( $file !== 'gs-testimonial/gs-testimonial.php' ) {
            return $meta_fields;
        }

        echo "<style>.gstestimonial-rate-stars { display: inline-block; color: #ffb900; position: relative; top: 3px; }.gstestimonial-rate-stars svg{ fill:#ffb900; } .gstestimonial-rate-stars svg:hover{ fill:#ffb900 } .gstestimonial-rate-stars svg:hover ~ svg{ fill:none; } </style>";

        $plugin_rate   = "https://wordpress.org/support/plugin/gs-testimonial/reviews/?rate=5#new-post";
        $plugin_filter = "https://wordpress.org/support/plugin/gs-testimonial/reviews/?filter=5";
        $svg_xmlns     = "https://www.w3.org/2000/svg";
        $svg_icon      = '';

        for ( $i = 0; $i < 5; $i++ ) {
            $svg_icon .= "<svg xmlns='" . esc_url( $svg_xmlns ) . "' width='15' height='15' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-star'><polygon points='12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2'/></svg>";
        }

        // Set icon for thumbsup.
        $meta_fields[] = '<a href="' . esc_url( $plugin_filter ) . '" target="_blank"><span class="dashicons dashicons-thumbs-up"></span>' . __( 'Vote!', 'gscs' ) . '</a>';

        // Set icon for 5-star reviews. v1.1.22
        $meta_fields[] = "<a href='" . esc_url( $plugin_rate ) . "' target='_blank' title='" . esc_html__( 'Rate', 'gscs' ) . "'><i class='gstestimonial-rate-stars'>" . $svg_icon . "</i></a>"; // already escaped above

        return $meta_fields;
    }

	/**
	 * Add upgrade to pro link to the plugins menu.
	 *
	 * @since 1.0.0
	 */
	public function gstmProLink( $gsTesti_links ) {
		$gsTesti_links[] = '<a class="gs-pro-link" href="https://www.gsplugins.com/product/gs-testimonial-slider" target="_blank">Go Pro!</a>';
		$gsTesti_links[] = '<a href="https://www.gsplugins.com/wordpress-plugins" target="_blank">GS Plugins</a>';
		return $gsTesti_links;
	}
}