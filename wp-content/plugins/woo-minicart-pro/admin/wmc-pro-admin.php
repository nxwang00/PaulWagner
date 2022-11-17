<?php

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( !current_user_can( 'activate_plugins' ) )  {
	wp_die( _e( 'You do not have sufficient permissions to access this page.','woo-minicart-pro' ) );
}

if ( ! empty( $_POST ) && check_admin_referer( 'wmc-afs', 'wmc-admin-nonce' ) ){
	$data = array(
		'enable-minicart'   => (isset($_POST['enable-minicart'])?'1':'0'),
		'minicart-icon'     => sanitize_text_field($_POST['minicart-icon']),
		'minicart-position' => sanitize_text_field($_POST['minicart-position']),
		'wmc-offset'        => absint($_POST['wmc-offset'])
	);
	update_option( 'wmc_options', $data );

	$pro_data = array(
		'custom-cart-icon'  => esc_url($_POST['wmc-cart-url']),
		'wmc-count-bg'      => sanitize_text_field($_POST['wmc-count-bg']),
		'wmc-count-tc'      => sanitize_text_field($_POST['wmc-count-tc']),
		'wmc-hbg'           => sanitize_text_field($_POST['wmc-hbg']),
		'wmc-htc'           => sanitize_text_field($_POST['wmc-htc']),
		'wmc-vcbg'          => sanitize_text_field($_POST['wmc-vcbg']),
		'wmc-vctc'          => sanitize_text_field($_POST['wmc-vctc']),
		'wmc-vchbg'         => sanitize_text_field($_POST['wmc-vchbg']),
		'wmc-vchtc'         => sanitize_text_field($_POST['wmc-vchtc']),
		'wmc-chbg'          => sanitize_text_field($_POST['wmc-chbg']),
		'wmc-chtc'          => sanitize_text_field($_POST['wmc-chtc']),
		'wmc-chhbg'         => sanitize_text_field($_POST['wmc-chhbg']),
		'wmc-chhtc'         => sanitize_text_field($_POST['wmc-chhtc'])
	);
	update_option( 'wmc_pro_options', $pro_data );
}

$current_options = get_option('wmc_options');
$pro_options     = get_option('wmc_pro_options');
//print_r($current_options);

?>
<div class="wrap wmc-wrap">
	<h1 class="hidden-h1"></h1>
	<?php if ( isset( $_POST['wmc_option_submit'] ) ){ ?>
		<div class="notice notice-success"> 
			<p><strong><?php _e( 'Settings saved', 'woo-minicart-pro' ); ?>.</strong></p>
		</div>
	<?php } ?>
	<div class="wmc-admin-page-title">
		<h1 class="wmc-admin-title"><?php echo get_admin_page_title(); ?></h1>
		<span class="wmc-version"><?php echo $this->plugin_version; ?></span>
	</div>
	<form method="POST" class="options-form">

		<?php wp_nonce_field( 'wmc-afs', 'wmc-admin-nonce' ); ?>

		<div class="block">
			<fieldset>
				<legend class="screen-reader-text"><span>
					<?php _e( 'Enable Minicart', 'woo-minicart-pro' ); ?>
				</span></legend>
				<label for="enable-minicart">
					<input name="enable-minicart" type="checkbox" <?php if( $current_options['enable-minicart'] == 1 ) : ?> checked <?php endif; ?> />
					<span><?php _e( 'Enable Minicart', 'woo-minicart-pro' ); ?></span>
				</label>
			</fieldset>
		</div>

		<h3><?php _e( 'Minicart Icon', 'woo-minicart-pro' ); ?></h3>

		<div class="block">
			<fieldset>
				<legend class="screen-reader-text"><span><?php _e( 'Cart Icons', 'woo-minicart-pro' ) ?></span></legend>
				<label>
					<input type="radio" name="minicart-icon" value="wmc-icon-1" data-class="minicart-1" <?php if( $current_options['minicart-icon'] == 'wmc-icon-1' ) : echo 'checked'; endif; ?> />
					<span>
						<img class="minicart-1 <?php if( $current_options['minicart-icon'] == 'wmc-icon-1' ) : echo 'cart-active'; endif; ?>" src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'assets/graphics/wmc-icon-1.png' ?>" alt="Mini Cart" width="30" height="30" >
					</span>
				</label>
				<label>
					<input type="radio" name="minicart-icon" value="wmc-icon-2" data-class="minicart-2" <?php if( $current_options['minicart-icon'] == 'wmc-icon-2' ) : echo 'checked'; endif; ?> />
					<img class="minicart-2 <?php if( $current_options['minicart-icon'] == 'wmc-icon-2' ) : echo 'cart-active'; endif; ?>" src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'assets/graphics/wmc-icon-2.png' ?>" alt="Mini Cart" width="30" height="30" >
				</label>
				<label>
					<input type="radio" name="minicart-icon" value="wmc-icon-3" data-class="minicart-3" <?php if( $current_options['minicart-icon'] == 'wmc-icon-3' ) : echo 'checked'; endif; ?> />
					<img class="minicart-3 <?php if( $current_options['minicart-icon'] == 'wmc-icon-3' ) : echo 'cart-active'; endif; ?>" src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'assets/graphics/wmc-icon-3.png' ?>" alt="Mini Cart" width="30" height="30" >
				</label>
				<label>
					<input type="radio" name="minicart-icon" value="wmc-icon-4" data-class="minicart-4" <?php if( $current_options['minicart-icon'] == 'wmc-icon-4' ) : echo 'checked'; endif; ?> />
					<img class="minicart-4 <?php if( $current_options['minicart-icon'] == 'wmc-icon-4' ) : echo 'cart-active'; endif; ?>" src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'assets/graphics/wmc-icon-4.png' ?>" alt="Mini Cart" width="30" height="30" >
				</label>
				<label>
					<input type="radio" name="minicart-icon" value="wmc-icon-5" data-class="minicart-5" <?php if( $current_options['minicart-icon'] == 'wmc-icon-5' ) : echo 'checked'; endif; ?> />
					<img class="minicart-5 <?php if( $current_options['minicart-icon'] == 'wmc-icon-5' ) : echo 'cart-active'; endif; ?>" src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'assets/graphics/wmc-icon-5.png' ?>" alt="Mini Cart" width="30" height="30" >
				</label>

				<label title="<?php _e( 'Custom Icon', 'woo-minicart-pro' ); ?>">
					<input type="radio" name="minicart-icon" value="wmc-icon-custom" data-class="minicart-custom" <?php if( $current_options['minicart-icon'] == 'wmc-icon-custom' ) : echo 'checked'; endif; ?> />
					<img class="minicart-custom <?php if( $current_options['minicart-icon'] == 'wmc-icon-custom' ) : echo 'cart-active'; endif; ?>" src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 'assets/graphics/wmc-icon-custom.png' ?>" alt="Mini Cart" width="30" height="30" >
				</label>
			</fieldset>
			<br>
			<fieldset>
				<label>
					<strong>
						<?php _e( 'Custom Cart Icon URL', 'woo-minicart-pro' ); ?>
					</strong>
					<input type="url" name="wmc-cart-url" <?php if( $pro_options['custom-cart-icon'] ) : ?>value="<?php echo $pro_options['custom-cart-icon']; ?>" <?php endif; ?>>
				</label>
			</fieldset>
		</div>

		<div class="block">
			<h3><?php _e( 'Minicart Position', 'woo-minicart-pro' ); ?></h3>

			<fieldset>
				<legend class="screen-reader-text"><span><?php _e( 'Minicart Position', 'woo-minicart-pro' ) ?></span></legend>
				<label title='g:i a'>
					<input type="radio" name="minicart-position" value="wmc-top-left" <?php if( $current_options['minicart-position'] == 'wmc-top-left' ) : echo 'checked'; endif; ?> />
					<span>
						<?php _e( 'Top Left', 'woo-minicart-pro' ) ?>
					</span>
				</label>
				<label title='g:i a'>
					<input type="radio" name="minicart-position" value="wmc-top-right" <?php if( $current_options['minicart-position'] == 'wmc-top-right' ) : echo 'checked'; endif; ?> />
					<span>
						<?php _e( 'Top Right', 'woo-minicart-pro' ) ?>
					</span>
				</label>
				<label title='g:i a'>
					<input type="radio" name="minicart-position" value="wmc-bottom-left" <?php if( $current_options['minicart-position'] == 'wmc-bottom-left' ) : echo 'checked'; endif; ?> />
					<span>
						<?php _e( 'Bottom Left', 'woo-minicart-pro' ) ?>
					</span>
				</label>
				<label title='g:i a'>
					<input type="radio" name="minicart-position" value="wmc-bottom-right" <?php if( $current_options['minicart-position'] == 'wmc-bottom-right' ) : echo 'checked'; endif; ?> />
					<span>
						<?php _e( 'Bottom Right', 'woo-minicart-pro' ) ?>
					</span>
				</label>
				
			</fieldset>
		</div>

		<div class="block">
			<h3><?php _e( 'Offset', 'woo-minicart-pro' ); ?></h3>
			<p><?php _e( 'Position from top, only applicable if Minicart position is either Top Left or Top Right.', 'woo-minicart-pro' ) ?></p>
			<input type="number" name="wmc-offset" value="<?php echo $current_options['wmc-offset']; ?>" /> px
		</div>
		<div class="block wmc-styling">
			<h3><?php _e( 'Style', 'woo-minicart-pro' ); ?></h3>
			<label>
				<span><strong><?php _e( 'Minicart Count Background color', 'woo-minicart-pro' ) ?></strong></span>
				<input type="text" name="wmc-count-bg" <?php if($pro_options['wmc-count-bg']) : ?>value="<?php echo $pro_options['wmc-count-bg']; ?>"<?php endif; ?>>
			</label>
			<br>
			<label>
				<span><strong><?php _e( 'Minicart Count Text color', 'woo-minicart-pro' ); ?></strong></span>
				<input type="text" name="wmc-count-tc" <?php if($pro_options['wmc-count-tc']) : ?>value="<?php echo $pro_options['wmc-count-tc']; ?>"<?php endif; ?>>
			</label>
			<br>
			<label>
				<span><strong><?php _e( 'Minicart Header Background Color', 'woo-minicart-pro' ); ?></strong></span>
				<input type="text" name="wmc-hbg" <?php if($pro_options['wmc-hbg']) : ?>value="<?php echo $pro_options['wmc-hbg']; ?>"<?php endif; ?>>
			</label>
			<br>
			<label>
				<span><strong><?php _e( 'Minicart Header Text Color', 'woo-minicart-pro' ); ?></strong></span>
				<input type="text" name="wmc-htc" <?php if($pro_options['wmc-htc']) : ?>value="<?php echo $pro_options['wmc-htc']; ?>"<?php endif; ?>>
			</label>
			<br>
			<label>
				<span><strong><?php _e( 'Minicart View Cart Button Background Color', 'woo-minicart-pro' ); ?></strong></span>
				<input type="text" name="wmc-vcbg" <?php if($pro_options['wmc-vcbg']) : ?>value="<?php echo $pro_options['wmc-vcbg']; ?>"<?php endif; ?>>
			</label>
			<br>
			<label>
				<span><strong><?php _e( 'Minicart View Cart Button Text Color', 'woo-minicart-pro' ); ?></strong></span>
				<input type="text" name="wmc-vctc" <?php if($pro_options['wmc-vctc']) : ?>value="<?php echo $pro_options['wmc-vctc']; ?>"<?php endif; ?>>
			</label>
			<br>
			<label>
				<span><strong><?php _e( 'Minicart View Cart Button Hover Background Color', 'woo-minicart-pro' ); ?></strong></span>
				<input type="text" name="wmc-vchbg" <?php if($pro_options['wmc-vchbg']) : ?>value="<?php echo $pro_options['wmc-vchbg']; ?>"<?php endif; ?>>
			</label>
			<br>
			<label>
				<span><strong><?php _e( 'Minicart View Cart Button Hover Text Color', 'woo-minicart-pro' ); ?></strong></span>
				<input type="text" name="wmc-vchtc" <?php if($pro_options['wmc-vchtc']) : ?>value="<?php echo $pro_options['wmc-vchtc']; ?>"<?php endif; ?>>
			</label>
			<br>
			<label>
				<span><strong><?php _e( 'Minicart Checkout Button Background Color', 'woo-minicart-pro' ); ?></strong></span>
				<input type="text" name="wmc-chbg" <?php if($pro_options['wmc-chbg']) : ?>value="<?php echo $pro_options['wmc-chbg']; ?>"<?php endif; ?>>
			</label>
			<br>
			<label>
				<span><strong><?php _e( 'Minicart Checkout Button Text Color', 'woo-minicart-pro' ); ?></strong></span>
				<input type="text" name="wmc-chtc" <?php if($pro_options['wmc-chtc']) : ?>value="<?php echo $pro_options['wmc-chtc']; ?>"<?php endif; ?>>
			</label>
			<label>
				<br>
				<span><strong><?php _e( 'Minicart Checkout Button Hover Background Color', 'woo-minicart-pro' ); ?></strong></span>
				<input type="text" name="wmc-chhbg" <?php if($pro_options['wmc-chbg']) : ?>value="<?php echo $pro_options['wmc-chbg']; ?>"<?php endif; ?>>
			</label>
			<br>
			<label>
				<span><strong><?php _e( 'Minicart Checkout Button Hover Text Color', 'woo-minicart-pro' ); ?></strong></span>
				<input type="text" name="wmc-chhtc" <?php if($pro_options['wmc-chhtc']) : ?>value="<?php echo $pro_options['wmc-chhtc']; ?>"<?php endif; ?>>
			</label>
		</div>
		<div class="block">
			<h3><?php _e( 'Shortcode', 'woo-minicart-pro' ); ?></h3>
			<p><?php _e( '<strong style="font-size:18px;">[woo-minicart]</strong> Use this shortcode to display minicart anywhere.', 'woo-minicart-pro' ) ?></p>
		</div>
		<input class="button-primary wmc-submit" type="submit" name="wmc_option_submit" value="<?php esc_attr_e( __( 'Save Changes', 'woo-minicart-pro' ), 'wmc-options-submit' ); ?>" />

	</form>
	<div class="support-notice">
		<a href="mailto:a.hassan@ahmadshyk.com">
			<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . '/assets/graphics/support-sign.jpg'; ?>" alt="Get Support at a.hassan@ahmadshyk.com">
		</a>
		<h4>
			<strong>
				Support:
			</strong>
			In case of any problem, question, idea or any WordPress related work, reach me at <a href="mailto:a.hassan@ahmadshyk.com">a.hassan@ahmadshyk.com</a>
		</h4>

</div>
</div>