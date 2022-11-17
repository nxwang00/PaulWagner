<?php
class wf_woocommerce_shipping_pro_method extends WC_Shipping_Method {

	/**
	 * Rules per page to be displayed.
	 */
	public static $rules_per_page = 25;

	function __construct() {
		$plugin_config = wf_plugin_configuration();
		$this->id					= $plugin_config['id']; 
		$this->method_title				= __( $plugin_config['method_title'], 'wf_woocommerce_shipping_pro' );
		$this->method_description			= __( $plugin_config['method_description'], 'wf_woocommerce_shipping_pro' );

		// Include Commom Methods
		if ( !class_exists( 'PH_Shipping_Pro_Common_Methods' ) ) {
			include_once 'class-ph-common-methods.php' ;
		}

		$this->init_settings();
		$this->init_form_fields();
		$this->title 			= isset($this->settings['title']) ? $this->settings['title'] : $this->method_title;
		$this->enabled 			= isset($this->settings['enabled']) ? $this->settings['enabled'] : 'no';

		$this->tax_status	   	= isset($this->settings['tax_status']) ? $this->settings['tax_status'] :  'none';
		$this->rate_matrix	   	= isset($this->settings['rate_matrix']) ? $this->settings['rate_matrix'] : array();
		$this->fixed_base_cost	= (isset($this->settings['fixed_base_cost']) && !empty($this->settings['fixed_base_cost'])) ? (float) $this->settings['fixed_base_cost'] : 0;

		$this->debug 				= (isset($this->settings['debug']) && !empty($this->settings['debug'])) ? $this->settings['debug'] : 'no';
		$this->displayed_columns	= ! empty($this->settings['displayed_columns']) ? $this->settings['displayed_columns'] : array();
		
		$calculation_mode	= $this->get_option('calculation_mode');
		$calc_min_max 		= (isset($this->settings['calc_min_max']) && !empty($this->settings['calc_min_max'])) ? $this->settings['calc_min_max'] : 'max_cost';
		$calc_per 			= (isset($this->settings['calc_per']) && !empty($this->settings['calc_per'])) ? $this->settings['calc_per'] : 'per_order';
		
		if(!empty($calc_per) && !empty($calc_min_max)) {
			$calculation_mode = $calc_per."_".$calc_min_max;
		}

		$this->remove_free_text	   		= (isset($this->settings['remove_free_text']) && !empty($this->settings['remove_free_text'])) ? $this->settings['remove_free_text'] : 'no';
		$this->and_logic 				= (isset($this->settings['and_logic']) && $this->settings['and_logic'] == 'yes') ? true : false;
		$this->strict_and_logic			= (isset($this->settings['strict_and_logic']) && $this->settings['strict_and_logic'] == 'yes') ? true : false;
		
		$this->multiselect_act_class 	 =	'multiselect';
		$this->drop_down_style 			 =	'chosen_select ';			
		$this->drop_down_style 			.=	$this->multiselect_act_class;
		
		if ( !class_exists( 'WF_Calc_Strategy' ) ) {
			include_once 'abstract-wf-calc-strategy.php' ;
		}

		$this->calc_mode_strategy 	=  WF_Calc_Strategy::get_calc_mode($calculation_mode,$this->rate_matrix);
		$this->row_selection_choice = $this->calc_mode_strategy->wf_row_selection_choice();
		
		$this->col_count 			= count($this->displayed_columns)+1;
		$this->shipping_classes 	= WC()->shipping->get_shipping_classes();
		$this->product_category 	= get_terms( 'product_cat', array('fields' => 'id=>name'));

		// Save settings in admin
		add_action( 'woocommerce_update_options_shipping_' . $this->id, array( $this, 'process_admin_options' ) );
		
		if($this->remove_free_text == 'yes'){
			add_filter( 'woocommerce_cart_shipping_method_full_label', array( $this, 'wf_remove_local_pickup_free_label'), 10, 2 );
		}
	}

	function get_inner_sections()
	{
		if(empty($_REQUEST['inner_section'])) $_REQUEST['inner_section']='default';
		$current_tab=$_REQUEST['inner_section'];
		?>
		<ul class="nav-tab-wrapper">
			<li></li>
			<li>
				<a href="admin.php?page=wc-settings&tab=shipping&section=wf_woocommerce_shipping_pro" class="nav-tab <?php echo $current_tab=="default"?"nav-tab-active":''; ?>">Shipping Rules</a>
			</li>
			<li>
				<a href="admin.php?page=wc-settings&tab=shipping&section=wf_woocommerce_shipping_pro&inner_section=settings" class="nav-tab <?php echo $current_tab=="settings"?"nav-tab-active":''; ?>">Settings</a>
			</li>
			<li>
				<a href="admin.php?page=wc-settings&tab=shipping&section=wf_woocommerce_shipping_pro&inner_section=import_export" class="nav-tab <?php echo $current_tab=="import_export"?"nav-tab-active":''; ?>">Import/Export</a>
			</li>
		</ul>
		<?php
	}

	function admin_options() {
		?>
		<h2><?php _e($this->method_title,'woocommerce'); ?></h2>
		<?php echo $this->method_description; ?>
		<br/><br/> 
		<?php  $this->get_inner_sections(); ?>
		<div class="clear"></div>
		<br/>
		<table class="form-table">
			<?php $this->generate_settings_html(); ?>
		</table>
		<?php
	}

	/**
	 * Initialise Settings Form Fields
	 */
	function init_form_fields() {
		if(empty($_REQUEST['inner_section'])) $_REQUEST['inner_section']='default';
		switch ($_REQUEST['inner_section']) {

			case 'default':
			$this->form_fields  = array(
				'rate_matrix' => array('type' => 'rate_matrix'),									
			);					
			break;

			case 'settings':
			$this->form_fields  = PH_Shipping_Pro_Common_Methods::get_settings_page_fields( $this->settings );
			break;

			case 'import_export':
			$this->form_fields  = array(
				'impexpbtn' => array('type' => 'import_export_btn'),   
			);					
			break;

		}

	} // End init_form_fields()
	function generate_import_export_btn_html()
	{
		?>
		<style> .woocommerce-save-button{display:none !important;} </style>
		<a href="<?php echo admin_url( 'admin.php?import=shippingpro_rate_matrix_csv' ); ?>" class="button"><?php _e( 'Import CSV', 'wf_woocommerce_shipping_pro' ); ?></a>
		<span style=" text-align: center; vertical-align: middle; ">	  <?php _e( 'From here you can import rules from a csv file.', 'wf_woocommerce_shipping_pro' ); ?></span></br></br>
		<a href="<?php echo admin_url( 'admin.php?wf_export_shippingpro_rate_matrix_csv=true' ); ?>" class="button"><?php _e( 'Export CSV', 'wf_woocommerce_shipping_pro' ); ?></a>
		<span style=" text-align: center; vertical-align: middle; ">	  <?php _e( 'Download all rules in csv format', 'wf_woocommerce_shipping_pro' ); ?></span></br></br>

		<?php
	}

	public function wf_remove_local_pickup_free_label($full_label, $method){
		if( strpos($method->id, $this->id) !== false) $full_label = str_replace(' (Free)','',$full_label);
		return $full_label;
	}

	public function generate_rate_matrix_html() {
		include_once('settings/html-rate-marix.php');
	}

	/**
	 * Validate rate_matrix fields.
	 */
	public function validate_rate_matrix_field( $key ) {
		
		$rules_per_page 			= self::$rules_per_page;
		$rate_matrix 				= ! empty($this->rate_matrix) ? $this->rate_matrix : array();		// All rate matrix before saving
		$current_page_rate_matrix	= isset( $_POST['rate_matrix'] ) ? $_POST['rate_matrix'] : array();	// Current page rate matrix being saved
		$current_page 				= ! empty($_GET['paged']) ? $_GET['paged'] : 1;						// Page number of pagination
		$new_rate_matrix 			= array();
		
		// Rate matrix of previous pages
		if( $current_page > 1 ) {
			$new_rate_matrix = array_slice( $rate_matrix, 0, ( ( $current_page - 1 ) * $rules_per_page) ) ;
		}

		$new_rate_matrix = array_merge( $new_rate_matrix, $current_page_rate_matrix);

		// Rate matrix of all the next pages
		$rate_matrix_after_current_page = array_slice( $rate_matrix, ( $current_page ) * $rules_per_page ) ;

		if( ! empty($rate_matrix_after_current_page) ) {
			$new_rate_matrix = array_merge( $new_rate_matrix, $rate_matrix_after_current_page );
		}
		
		//Register shipping method name for WPML translation.
		foreach ($new_rate_matrix as $key => $rule) {
			do_action( 'wpml_register_single_string', 'wf_woocommerce_shipping_pro', 'shipping-method-title_'.$rule['shipping_name'], $rule['shipping_name'] );
		}
		
		return $new_rate_matrix;
	}

	function calculate_shipping( $package = array() ) {

		do_action( 'ph_woocommerce_shipping_pro_before_shipping_calculation');

		$zones = PH_Shipping_Pro_Common_Methods::ph_find_zone($package);

		$destination_country 	= $package['destination']['country'];
		$destination_state 		= $package['destination']['state'];
		$destination_city		= $package['destination']['city'];
		$destination_postcode	= $package['destination']['postcode'];
		$shipping_classes 		= $this->calc_mode_strategy->wf_find_shipping_classes($package);
		$product_categories 	= $this->calc_mode_strategy->wf_find_product_category($package);

		$rules = PH_Shipping_Pro_Common_Methods::ph_filter_rules( $zones, $destination_country, $destination_state, $destination_city, $destination_postcode, $shipping_classes, $product_categories, $package, $this->calc_mode_strategy, $this->settings );

		$costs = PH_Shipping_Pro_Common_Methods::ph_calc_cost( $rules, $package, $this->calc_mode_strategy, $this->row_selection_choice, $this->title );

		if (!empty($this->fixed_base_cost)) {

			$costs = PH_Shipping_Pro_Common_Methods::add_fixed_base_cost( $costs, $this->fixed_base_cost );
		}

		$this->wf_add_rate(apply_filters( 'wf_woocommerce_shipping_pro_shipping_costs', $costs),$package);

		do_action( 'ph_woocommerce_shipping_pro_after_shipping_calculation');
		
	}

	function wf_add_rate($costs,$package) {
		if ( sizeof($costs) > 0) {
			$grouped_package = $this->calc_mode_strategy->wf_get_grouped_package($package);
			foreach ($costs as $method_group => $method_cost) {
				if($this->wf_check_all_item_exists($method_cost['cost'],$grouped_package)){
					if(isset($method_cost['shipping_name']) && isset($method_cost['cost'])){

						$method_id = sanitize_title( $method_group . $method_cost['shipping_name'] );
						$method_id = preg_replace( '/[^A-Za-z0-9\-]/', '', $method_id ); //Omit unsupported charectors
						
						$this->add_rate(
							array(
								'id'			=> $this->id . ':' . $method_id,
								'label'			=> apply_filters( 'ph_wc_shipping_pro_rate_label', $method_cost['shipping_name'] ),
								'cost'			=> $method_cost['cost'],
								'taxes'			=> '',
								'calc_tax'		=> $this->calc_mode_strategy->wf_calc_tax(),
								'meta_data' 	=> array(
									'_ph_shipping_pro_method'	=>	array(
										'id'						=>	$this->id . ':' . $method_id,
										'method_title'				=>	apply_filters( 'ph_wc_shipping_pro_rate_label', $method_cost['shipping_name'] ),
									),
								),
							)
						);

					}
				}								
			}
		}
	}

	function wf_check_all_item_exists($costs,$package_content){
		return count(array_intersect_key($costs,$package_content)) == count($package_content);
	}
	
}