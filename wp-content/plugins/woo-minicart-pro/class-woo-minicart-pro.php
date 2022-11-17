<?php
    // If this file is called directly, abort.
    if ( ! defined( 'WPINC' ) ) {
        die;
    }
    
    class WMC_PRO_Main_Class{
    
        public $wmc_options;
        public $pro_options;
    
        public function __construct(){
            if ( defined( 'WOO_MINICART_PRO_VERSION' ) ) {
              $this->plugin_version = WOO_MINICART_PRO_VERSION;
          } 
          else {
              $this->plugin_version = '1.0';
          }
          $this->wmc_options = get_option( 'wmc_options' );
          $this->pro_options = get_option( 'wmc_pro_options' );
          add_action( 'admin_menu', array( $this, 'wmc_admin_menu' ), 20 );
          add_action( 'admin_enqueue_scripts', array( $this, 'admin_scripts' ) );
          add_action( 'wp_head', array( $this, 'dynamic_css' ) );
          add_action( 'admin_init', array( $this, 'redirect_admin_page' ) );
      }
    
      public function admin_scripts($hook){
        if($hook != 'toplevel_page_woo-minicart-pro') {
         return;
     }
     wp_enqueue_style( 'wmc-admin-css', plugins_url('/assets/css/admin.css', __FILE__), '', $this->plugin_version );
     wp_enqueue_script( 'wmc-admin-js', plugins_url('/assets/js/admin.js', __FILE__), 'jQuery', $this->plugin_version, true );
    }
    
    public function dynamic_css(){
        $minicart_position = $this->wmc_options['minicart-position']; 
        $wmc_offset        = $this->wmc_options['wmc-offset'];
        $wmc_count_bg      = $this->pro_options['wmc-count-bg'];
        $wmc_count_tc      = $this->pro_options['wmc-count-tc'];
        $wmc_hbg           = $this->pro_options['wmc-hbg'];
        $wmc_htc           = $this->pro_options['wmc-htc'];
        $wmc_vcbg          = $this->pro_options['wmc-vcbg'];
        $wmc_vctc          = $this->pro_options['wmc-vctc'];
        $wmc_vchbg         = $this->pro_options['wmc-vchbg'];
        $wmc_vchtc         = $this->pro_options['wmc-vchtc'];
        $wmc_chbg          = $this->pro_options['wmc-chbg'];
        $wmc_chtc          = $this->pro_options['wmc-chtc'];
        $wmc_chhbg         = $this->pro_options['wmc-chhbg'];
        $wmc_chhtc         = $this->pro_options['wmc-chhtc'];
        ?>
<style type="text/css">
    .wmc-count{
    background-color: <?php echo $wmc_count_bg; ?> !important;
    }
    .wmc-count{
    color: <?php echo $wmc_count_tc; ?> !important;
    }
    .wmc-content h3{
    background-color: <?php echo $wmc_hbg; ?> !important;
    color: <?php echo $wmc_htc; ?> !important;
    }
    a.wmc-view-cart{
    background-color: <?php echo $wmc_vcbg; ?> !important;
    color: <?php echo $wmc_vctc; ?> !important;
    }
    a.wmc-view-cart:hover{
    background-color: <?php echo $wmc_vchbg; ?> !important;
    color: <?php echo $wmc_vchtc; ?> !important;
    }
    a.wmc-checkout{
    background-color: <?php echo $wmc_chbg; ?> !important;
    color: <?php echo $wmc_chtc; ?> !important;
    }
    a.wmc-checkout:hover{
    background-color: <?php echo $wmc_chhbg; ?> !important;
    color: <?php echo $wmc_chhtc; ?> !important;
    }
    <?php if( $minicart_position == 'wmc-top-left' ) : ?>
    .wmc-cart-wrapper{
    left: 50px;
    top: <?php echo $wmc_offset; ?>px;
    }
    .wmc-cart{
    left: 10px;
    }
    <?php elseif( $minicart_position == 'wmc-top-right' ) : ?>
    .wmc-cart-wrapper{
    right: 50px;
    top: <?php echo $wmc_offset; ?>px;
    }
    .wmc-cart{
    right: 10px;
    }
    <?php elseif( $minicart_position == 'wmc-bottom-left' ) : ?>
    .wmc-cart-wrapper{
    left: 50px;
    bottom: 100px;
    }
    .wmc-cart{
    left: 10px;
    }
    .wmc-content{
    position: fixed;
    bottom: 100px;
    top: unset;
    right: unset;
    }
    <?php elseif( $minicart_position == 'wmc-bottom-right' ) : ?>
    .wmc-cart-wrapper{
    right: 50px;
    bottom: 100px;
    }
    .wmc-cart{
    right: 10px;
    }
    .wmc-content{
    position: fixed;
    bottom: 100px;
    top: unset;
    }
    <?php endif; ?>
</style>
<?php }
public function wmc_admin_menu(){
remove_menu_page('woo-minicart');
add_menu_page(
__( 'Minicart Pro Options', 'woo-minicart-pro' ),
__( 'Woo Minicart Pro', 'woo-minicart-pro' ),
'manage_options',
'woo-minicart-pro',
array( $this, 'wmc_admin_menu_callback' ),
'dashicons-admin-generic',
59
);
}
public function wmc_admin_menu_callback(){
require plugin_dir_path( __FILE__ ) . '/admin/wmc-pro-admin.php';
}
public function redirect_admin_page(){
$is_minicart_page = isset( $_GET['page'] ) ? $_GET['page'] : '' ;
if( $is_minicart_page == 'woo-minicart' ){
wp_redirect( admin_url('/admin.php?page=woo-minicart-pro' ) );
exit;
}
}
}