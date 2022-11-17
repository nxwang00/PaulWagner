<?php

namespace GSTM;

// if direct access than exit the file.
defined('ABSPATH') || exit;

/**
 * Registers meta boxes for the testimonial
 * 
 * @since 1.0.0
 */
class Metabox {

	/**
	 * Class constructor.
	 * 
	 * @since 1.0.0
	 */
	public function __construct() {
		add_action( 'add_meta_boxes', [ $this, 'gs_testimonial_add_meta_box' ] );
		add_action( 'save_post', [ $this, 'gs_testimonial_save_meta_box_data' ] );

		if ( ! defined( 'GST_PRO_PLUGIN_DIR' ) ) {
			add_action( 'add_meta_boxes', [ $this, 'gs_testimonial_pro_add_meta_box' ] );
			add_action( 'add_meta_boxes', [ $this, 'gs_testimonial_pro_sidebar_add_meta_box' ] );
        }
	}

	/**
	 * Adds a box to the main column on the Post and Page edit screens.
	 * 
	 * @since 1.0.0
	 */
	public function gs_testimonial_add_meta_box() {
		add_meta_box(
			'gs_testimonial_sectionid',
			__( "Testimonial Author Details" , 'gst' ),
			[ $this, 'gs_testimonial_meta_box_callback' ],
			'gs_testimonial'
		);
	}

	/**
	 * Prints the box content.
	 * 
	 * @since 1.0.0
	 * @param WP_Post $post The object for the current post/page.
	 */
	public function gs_testimonial_meta_box_callback( $post ) {
		// Add an nonce field so we can check for it later.
		wp_nonce_field( 'gs_testimonial_meta_box', 'gs_testimonial_meta_box_nonce' );
		?>
		<p>
			<label for="gs_t_client_company"><b><?php _e('Company Name', 'gst'); ?></b></label>
		</p>
		<p>
			<input
				class="large-text"
				type="text"
				name="gs_t_client_company"
				id="gs_t_client_company"
				value="<?php echo esc_attr( get_post_meta($post->ID, 'gs_t_client_company', true) ); ?>"
			/>
		</p>
		<p>
			<label for="gs_t_client_design"><b><?php _e('Designation:', 'gst'); ?></b></label>
		</p>
		<p>
			<input
				class="large-text"
				type="text"
				name="gs_t_client_design"
				id="gs_t_client_design"
				value="<?php echo esc_attr( get_post_meta($post->ID, 'gs_t_client_design', true) ); ?>"
			/>
		</p>
		<?php
        do_action( 'add_gstm_metabox', $post );
	}

	/**
	 * When the post is saved, saves our custom data.
	 * 
	 * @since 1.0.0
	 * @param int $post_id The ID of the post being saved.
	 */
	public function gs_testimonial_save_meta_box_data( $post_id ) {
		// Check if our nonce is set.
		if ( ! isset( $_POST['gs_testimonial_meta_box_nonce'] ) ) {
			return;
		}

		// Verify that the nonce is valid.
		if ( ! wp_verify_nonce( $_POST['gs_testimonial_meta_box_nonce'], 'gs_testimonial_meta_box' ) ) {
			return;
		}

		// If this is an autosave, our form has not been submitted, so we don't want to do anything.
		if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
			return;
		}

		// Check the user's permissions.
		if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
			if ( ! current_user_can( 'edit_page', $post_id ) ) {
				return;
			}
		} else {
			if ( ! current_user_can( 'edit_post', $post_id ) ) {
				return;
			}
		}

		// Testimonial author Name
		if( isset( $_POST['gs_t_client_company'] ) ) {
			update_post_meta( $post_id, 'gs_t_client_company', sanitize_text_field( $_POST['gs_t_client_company'] ) );
		}

		// Testimonial author Designation
		if( isset( $_POST['gs_t_client_design'] ) ) {
			update_post_meta( $post_id, 'gs_t_client_design', sanitize_text_field( $_POST['gs_t_client_design'] ) );
		}
	}

	/**
	 * Upgrade to the pro version notice.
	 * 
	 * @since 1.0.0
	 */
	public function gs_testimonial_pro_add_meta_box() {
		add_meta_box(
			'gs_testimonial_sectionid_pro',
			__( "GS Testimonial Slider - PRO" , 'gst' ),
			[ $this, 'gs_testimonial_meta_box_pro' ],
			'gs_testimonial'
		);
	}

	/**
	 * Upgrade to the pro version notice callback.
	 * 
	 * @since 1.0.0
	 */
	public function gs_testimonial_meta_box_pro() {  ?>
		<p>
			<h3 style="padding-left:0"><?php _e( 'Available features at GS Testimonial Slider - PRO', 'gst' ); ?></h3>
			<ol>
				<li><?php _e( '9 different Transitions', 'gst' ); ?></li>
				<li><?php _e( '9 different Themes / Styles', 'gst' ); ?></li>
				<li><?php _e( '6 Different Author image styles', 'gst' ); ?></li>
				<li><?php _e( 'Tons of shortcode parameters', 'gst' ); ?></li>
				<li><?php _e( 'Category wise Testimonials', 'gst' ); ?></li>
				<li><?php _e( 'Great Settings Panel', 'gst' ); ?></li>
				<li><?php _e( 'Enable / Disable - Stop on Hover', 'gst' ); ?></li>
				<li><?php _e( 'On / Off Navigation Arrow', 'gst' ); ?></li>
				<li><?php _e( 'Control Sliding Speed', 'gst' ); ?></li>
				<li><?php _e( 'On / Off Pagination', 'gst' ); ?></li>
				<li><?php _e( 'Unlimited Colors & Font styling', 'gst' ); ?></li>
				<li><?php _e( 'Google fonts', 'gst' ); ?></li>
				<li><?php _e( 'Different Theming', 'gst' ); ?></li>
				<li><?php _e( 'Author Image size control', 'gst' ); ?></li>
				<li><?php _e( 'Works with any WordPress Theme.', 'gst' ); ?></li>
				<li><?php _e( 'Build with HTML5 & CSS3.', 'gst' ); ?></li>
				<li><?php _e( 'Responsive. Work on any device.', 'gst' ); ?></li>
				<li><?php _e( 'Easy and user-friendly setup.', 'gst' ); ?></li>
				<li><?php _e( 'Well documentation and support.', 'gst' ); ?></li>
				<li><?php _e( 'And many more.', 'gst' ); ?></li>
			</ol>
		</p>
		<p>
			<a
			class="button button-primary button-large"
			href="https://www.gsplugins.com/product/gs-testimonial-slider" target="_blank"><?php _e( 'Go for PRO', 'gst' ); ?></a>
		</p>
	<?php
	}

	/**
	 * Upgrade to the pro version sidebar notice.
	 * 
	 * @since 1.0.0
	 */
	public function gs_testimonial_pro_sidebar_add_meta_box() {
		add_meta_box(
			'gs_testimonial_sectionid_pro_sidebar',
			__( "Other Info" , 'gst' ),
			[ $this, 'gs_testimonial_meta_box_pro_sidebar' ],
			'gs_testimonial',
			'side',
			'low'
		);
	}

	/**
	 * Upgrade to the pro version sidebar notice callback.
	 * 
	 * @since 1.0.0
	 */
	public function gs_testimonial_meta_box_pro_sidebar() { ?>
		<a href="http://logo.gsplugins.com" target="_blank" style="text-decoration: none;width:97%;overflow:hidden;margin:5px;background: #ffffff;border: 1px solid #eeeeee;display: block;float: left;text-align: center;-webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px; outline: 0!important;" ><h3 style="margin: 0px;background: #eeeeee;-webkit-border-top-left-radius: 3px;-webkit-border-top-right-radius: 3px;-moz-border-radius-topleft: 3px;-moz-border-radius-topright: 5px;border-top-left-radius: 3px;border-top-right-radius: 3px;padding:5px;text-decoration: none;color:#333"><?php _e( 'GS Logo Slider - DEMO', 'gst'); ?></h3><img style="max-width: 100%;height:auto; border-radius: 50%; margin: 5px 0 2px;" src="<?php echo GST_PLUGIN_URI . '/assets/img/gsl.png'; ?>" /></a>
		<a href="http://testimonial.gsplugins.com" target="_blank" style="text-decoration: none;width:97%;overflow:hidden;margin:5px;background: #ffffff;border: 1px solid #eeeeee;display: block;float: left;text-align: center;-webkit-border-radius: 4px;-moz-border-radius: 4px;border-radius: 4px; outline: 0!important;"><h3 style="margin: 0px;background: #eeeeee;-webkit-border-top-left-radius: 3px;-webkit-border-top-right-radius: 3px;-moz-border-radius-topleft: 3px;-moz-border-radius-topright: 5px;border-top-left-radius: 3px;border-top-right-radius: 3px;padding:5px;text-decoration: none;color:#333"><?php _e( 'GS Testimonial Slider - DEMO', 'gst' ); ?></h3><img style="max-width: 100%;height:auto; border-radius: 50%; margin: 5px 0 2px;" src="<?php echo GST_PLUGIN_URI . '/assets/img/gs-testimonial-slider.png'; ?>" /></a>
		<div style="clear:both"></div>
	<?php
	}
}
