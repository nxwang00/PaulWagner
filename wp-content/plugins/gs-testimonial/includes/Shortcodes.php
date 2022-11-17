<?php

namespace GSTM;

// if direct access than exit the file.
defined('ABSPATH') || exit;

/**
 * Handles plugin shortcode.
 *
 * @since 1.0.0
 */
class Shortcodes {

	/**
	 * Class constructor
     *
     * @since 1.0.0
	 */
	public function __construct() {
		add_shortcode( 'gs_testimonial', [ $this, 'render' ] );
		add_action( 'wp_head', [ $this, 'gs_testi_slider_trigger' ] );
		add_action( 'wp_head', [ $this, 'gs_t_settings_style' ] );
		add_action( 'wp_footer', [ $this, 'gs_t_slider_trigger' ] );
	}

	/**
     * Render the shortcode.
     *
     * @since 1.0.0
     *
	 * @param  array  $atts Shortcode attributes.
	 * @return string       Shortcode output.
	 */
	public function render( $atts ) {
		$gs_sty_thming          = gstm()->helpers->getOption( 'gs_sty_thming', 'gs_t_advance', 'none' );
		$gs_t_transtion         = gstm()->helpers->getOption( 'gs_t_transtion', 'gs_t_general', 'carousel' );
		$gs_t_company_level     = gstm()->helpers->getOption( 'gs_t_company_level', 'gs_t_advance', 'Company' );
		$gs_t_designation_level = gstm()->helpers->getOption( 'gs_t_designation_level', 'gs_t_advance', 'Designation' );
		$gs_t_slide_speed       = gstm()->helpers->getOption( 'gs_t_slide_speed', 'gs_t_general', 4000 );
		$gs_t_slider_column     = gstm()->helpers->getOption( 'gs_t_slider_column', 'gs_t_advance', 1 );

		extract( shortcode_atts( [
			'order' 	    => '',
			'orderby' 	    => '',
			'posts' 	    => -1,
			'cat_name'	    => '',
			'transition'    => $gs_t_transtion,
			'theme'		    => $gs_sty_thming,
			'speed'         => $gs_t_slide_speed,
			'img'		    => '',
			'readmore_link' =>''
		], $atts ));

		$gs_t_loop = new \WP_Query([
			'post_type'			   => 'gs_testimonial',
			'order' 			   => $order,
			'orderby'			   => $orderby,
			'posts_per_page' 	   => $posts,
			'testimonial_category' => $cat_name,
        ]);

		$gs_t_slider_stop   = gstm()->helpers->getOption( 'gs_t_slider_stop', 'gs_t_general', 'off' );
		$gs_t_slider_stop   = ($gs_t_slider_stop == 'on' ? 'true' : 'false');
		$gs_t_comapny_lebel = gstm()->helpers->getOption( 'gs_t_comapny_lebel', 'gs_t_general', 'on' );
		$gs_t_responsive    = gstm()->helpers->getOption( 'gs_t_responsive', 'gs_t_general', 'on' );
		$gs_t_responsive    = ($gs_t_responsive == 'on' ? 'true' : 'false');
		$gs_t_img_width     = gstm()->helpers->getOption( 'gs_t_img_width', 'gs_t_advance', 86 );
		$gs_t_img_height    = gstm()->helpers->getOption( 'gs_t_img_height', 'gs_t_advance', 86 );
		$gs_t_ratings       = gstm()->helpers->getOption( 'gs_t_ratings', 'gs_t_general', 'off' );
		$gs_t_image         = gstm()->helpers->getOption( 'gs_t_image', 'gs_t_general', 'off' );

		require_once( ABSPATH . 'wp-admin/includes/template.php' );

		$output = '<div class="gs_testimonial_container '. esc_attr($theme) .'">';
		if ( 'gs_style1' === $theme || 'gs_style2' === $theme || $theme == 'gs_style3' || $theme == 'gs_style4' || $theme == 'gs_style8' || $theme == 'none') {
			include GST_PLUGIN_DIR . '/includes/templates/gs_template_one.php';
		}

        if ( gstm()->helpers->isProActive() ) {
	        if ( 'gs_style5' === $theme ) {
		        include GST_PRO_PLUGIN_DIR . '/includes/templates/gs_template_two.php';
	        }
	        if ( 'gs_style6' === $theme ) {
		        include GST_PRO_PLUGIN_DIR . '/includes/templates/gs_template_6.php';
	        }
	        if ( 'gs_style7' === $theme ) {
		        include GST_PRO_PLUGIN_DIR . '/includes/templates/gs_template_7.php';
	        }
	        if ( 'gs_style9' === $theme ) {
		        include GST_PRO_PLUGIN_DIR . '/includes/templates/gs_template_9.php';
	        }
	        if ( 'gs_style11' === $theme ) { // owl slider
		        include GST_PRO_PLUGIN_DIR . '/includes/templates/gs_template_eleven.php';
	        }
	        if ( 'gs_style12' === $theme ) { // slick
		        include GST_PRO_PLUGIN_DIR . '/includes/templates/gs_template_twelve.php';
	        }
	        if ( 'gs_style13' === $theme ) { // filter
		        include GST_PRO_PLUGIN_DIR . '/includes/templates/gs_template_13.php';
	        }
	        if ( 'gs_style14' ===$theme ) { // masonry
		        include GST_PRO_PLUGIN_DIR . '/includes/templates/gs_template_14.php';
	        }
	        if ( 'gs_style15' === $theme ) { // flip
		        include GST_PRO_PLUGIN_DIR . '/includes/templates/gs_template_15.php';
	        }
	        if ( 'gs_style16' === $theme ) {
		        include GST_PRO_PLUGIN_DIR . '/includes/templates/gs_template_16.php';
	        }
	        if ( 'gs_style17' === $theme ) {
		        include GST_PRO_PLUGIN_DIR . '/includes/templates/gs_template_17.php';
	        }
        }
		$output .= '</div>';
		return $output;
	}


	public function gs_cycle_switcher($theme, $transition, $gs_t_slider_stop, $gs_t_responsive, $speed, $gs_t_slider_column) {

		if( $theme == 'gs_style1' || $theme == 'gs_style2' || $theme == 'gs_style3' || $theme == 'gs_style4' || $theme == 'gs_style5' || $theme == 'gs_style8' || $theme == 'none')
		{
			return $this->with_cycle($theme, $transition, $gs_t_slider_stop, $gs_t_responsive, $speed, $gs_t_slider_column);
		}

		if ($theme == 'gs_style9') {
			return $this->without_cycle($theme);
		}
	}

	public function with_cycle($theme, $transition, $gs_t_slider_stop, $gs_t_responsive, $speed, $gs_t_slider_column) {

		$output = '';
		$output .= '<div class="cycle-slideshow composite-example"
					data-cycle-fx="'. esc_attr($transition) .'"
					data-cycle-pause-on-hover="'. esc_attr($gs_t_slider_stop) .'"
					data-cycle-carousel-fluid="'. esc_attr($gs_t_responsive) .'"
					data-cycle-center-horz="true"
					data-cycle-center-vert="true"
					data-cycle-carousel-visible="'. esc_attr($gs_t_slider_column).'"
					data-cycle-slides="> div"
					data-cycle-next="#next"
					data-cycle-prev="#prev"
					data-cycle-speed="'. esc_attr($speed) .'"
					data-cycle-pager="#custom-pager"
					data-cycle-pager-template="<a>{{slideNum}}</a>"
					data-cycle-timeout="'. esc_attr($speed) .'"
					data-cycle-log="false"
					>';
		return $output;
	}

	public function without_cycle($theme) {
		$output = '';
		$output .= '<div class="without-cycle">';
		return $output;
	}

	public function gs_testi_slider_trigger(){ ?>
        <script type="text/javascript">
            jQuery.noConflict();
            jQuery(document).ready(function($){

                $('.cycle-slideshow').each(function(){
                    var p = this.parentNode;
                    var nextBtn=$(this).parent().find('#next');
                    var prevBtn=$(this).parent().find('#prev');
                    $(this).cycle({
                        next: nextBtn,
                        prev:prevBtn,
                        pager:  $('#custom-pager', p),

                    })
                })
            });
        </script>
		<?php
	}

	// GS Testimonial getting value form setting
	public function gs_t_settings_style(){
		$gs_t_text_color = esc_attr( gstm()->helpers->getOption( 'gs_t_text_color', 'gs_t_style', '#000' ) );
		$gs_t_text_font_size = esc_attr( gstm()->helpers->getOption( 'gs_t_text_font_size', 'gs_t_style', '16' ) );
		$gs_t_text_line_h = esc_attr( gstm()->helpers->getOption( 'gs_t_text_line_h', 'gs_t_style', '20' ) );
		$gs_t_fntw = esc_attr( gstm()->helpers->getOption( 'gs_t_fntw', 'gs_t_style', 'normal' ) );
		$gs_t_name_color = esc_attr( gstm()->helpers->getOption( 'gs_t_name_color', 'gs_t_style', '#8224e3' ) );
		$gs_t_nav_arrow_color = esc_attr( gstm()->helpers->getOption( 'gs_t_nav_arrow_color', 'gs_t_style', '#b5b5b5' ) );
		$gs_t_rating_color = esc_attr( gstm()->helpers->getOption( 'gs_t_rating_color', 'gs_t_style', '#0074A2' ) );
		$gs_t_au_font_size = esc_attr( gstm()->helpers->getOption( 'gs_t_au_font_size', 'gs_t_style', '20' ) );
		$gs_t_au_fntw = esc_attr( gstm()->helpers->getOption( 'gs_t_au_fntw', 'gs_t_style', 'normal' ) );
		$gs_t_au_mar = esc_attr( gstm()->helpers->getOption( 'gs_t_au_mar', 'gs_t_style', '3' ) );
		$gs_t_label_color = esc_attr( gstm()->helpers->getOption( 'gs_t_label_color', 'gs_t_style', '#717171' ) );
		$gs_t_label_font_size = esc_attr( gstm()->helpers->getOption( 'gs_t_label_font_size', 'gs_t_style', '16' ) );
		$gs_t_nm_desig_color = esc_attr( gstm()->helpers->getOption( 'gs_t_nm_desig_color', 'gs_t_style', '#717171' ) );
		$gs_t_nm_desig_font_size = esc_attr( gstm()->helpers->getOption( 'gs_t_nm_desig_font_size', 'gs_t_style', '16' ) );
		$gs_t_nm_desig_fntw = esc_attr( gstm()->helpers->getOption( 'gs_t_nm_desig_fntw', 'gs_t_style', 'normal' ) );
		$gs_t_nm_desig_style = esc_attr( gstm()->helpers->getOption( 'gs_t_nm_desig_style', 'gs_t_style', 'normal' ) );
		$gs_t_filter_cat_pos = esc_attr( gstm()->helpers->getOption( 'gs_t_filter_cat_pos', 'gs_t_style', 'center' ) );
		$gs_t_pagination = esc_attr( gstm()->helpers->getOption( 'gs_t_pagination', 'gs_t_general', 'off' ) );
		$gs_t_pagination = ($gs_t_pagination == 'on' ? 'block' : 'none');
		$gs_t_img_width = esc_attr( gstm()->helpers->getOption( 'gs_t_img_width', 'gs_t_advance', 86 ) );
		$gs_t_img_height = esc_attr( gstm()->helpers->getOption( 'gs_t_img_height', 'gs_t_advance', 86 ) );
		$gs_t_img_b_color = esc_attr( gstm()->helpers->getOption( 'gs_t_img_b_color', 'gs_t_advance', '#ddd' ) );
		$gs_t_img_thikness = esc_attr( gstm()->helpers->getOption( 'gs_t_img_thikness', 'gs_t_advance', 3 ) );
		$gs_t_img_sty = esc_attr( gstm()->helpers->getOption( 'gs_t_img_sty', 'gs_t_advance', 'solid' ) );
		$gs_t_fnt_name = esc_attr( gstm()->helpers->getOption( 'gs_t_fnt_name', 'gs_t_advance', 'on' ) );
		if($gs_t_fnt_name=='on'){
			$font_family='Homemade Apple';
		}
		else{
			$font_family='inherit';
		}

		echo "<style type='text/css'>
			.cycle-slideshow .cycle-carousel-wrap .cycle-slide .testimonial-box .box-content,
			.cycle-slideshow .cycle-slide .testimonial-box .box-content,
			.cycle-slide .testimonial-box .box-content p,
			.gs_style6 .box-content p, 
			.gs_style7 .box-content p,
			.gs_style9 .box-content p,.gs_style11 .box-content p,
			.gs_style13 .box-content p { 
				color : $gs_t_text_color;
				font-size: {$gs_t_text_font_size}px;
				line-height: {$gs_t_text_line_h}px;
				font-weight: $gs_t_fntw;
			}
			.cycle-slide .testimonial-box .box-title,
			.gs_style6 .box-title,
			.gs_style7 .box-title,
			.gs_style9 .box-title,.gs_style15 .box-title,
			.gs_style14 .box-title,.gs_style13 .box-title {
				font-family:$font_family;
				color: $gs_t_name_color;
				font-size: {$gs_t_au_font_size}px;
				font-weight: $gs_t_au_fntw;
				margin: {$gs_t_au_mar}px;
			}
			.cycle-slide .testimonial-box .box-label,
			.gs_style6 .box-label,
			.gs_style7 .box-label,
			.gs_style9 .box-label {
				color: $gs_t_label_color;
				font-size: {$gs_t_label_font_size}px !important;
			}
			.cycle-slide .testimonial-box .box-com-name,
			.cycle-slide .testimonial-box .box-design-name,
			.gs_style6 .box-com-name,
			.gs_style6 .box-design-name,
			.gs_style7 .box-com-name,
			.gs_style7 .box-design-name,
			.gs_style9 .box-com-name,
			.gs_style9 .box-design-name {
				color: $gs_t_nm_desig_color;
				font-size: {$gs_t_nm_desig_font_size}px;
				font-weight: $gs_t_nm_desig_fntw;
				font-style: $gs_t_nm_desig_style;
			}
			.gs_testimonial_container .cycle-pager {
				display: $gs_t_pagination;
			}
			.cycle-slideshow .cycle-carousel-wrap .cycle-slide .testimonial-box .box-image, 
			.cycle-slideshow .testimonial-box .box-image {
				width: {$gs_t_img_width}px;
				height: {$gs_t_img_height}px;
				margin: 5px auto;
			}
			.cycle-slideshow .cycle-carousel-wrap .cycle-slide .testimonial-box .box-image img, 
			.cycle-slideshow .testimonial-box .box-image img {
				border: {$gs_t_img_thikness}px $gs_t_img_sty $gs_t_img_b_color;
			}
			.cycle-nav i,button.flipster__button.flipster__button--prev,button.flipster__button.flipster__button--next{
				color:$gs_t_nav_arrow_color;
			}
			.star-rating .star{
				color:$gs_t_rating_color;
			}
			.gs_style11 .owl-theme .owl-dots .owl-dot span {
				background: transparent;
				border: solid 1px $gs_t_rating_color;
			}
			.gs_style11 .owl-theme .owl-dots .owl-dot.active span, .owl-theme .owl-dots .owl-dot:hover span {
				background: $gs_t_rating_color;
			}
			.gs_style13 ul.button-group.filters-button-group { text-align: $gs_t_filter_cat_pos; }
		</style>";
	}

	// GS Testimonial slider trigger scripts
	public function gs_t_slider_trigger(){
		$gs_t_nav_arrow = gstm()->helpers->getOption( 'gs_t_nav_arrow', 'gs_t_general', 'on' );
		$gs_t_nav_arrow = ($gs_t_nav_arrow == 'off' ? 'none' : 'block');
		?>

        <script type="text/javascript">
            jQuery(document).ready(function(){
                jQuery( ".cycle-slideshow, .cycle-nav" ).on( "mouseenter", function() {
                    jQuery(".cycle-nav").css("display", "<?php echo esc_attr($gs_t_nav_arrow); ?>");
                }).on( "mouseleave", function() {
                    jQuery(".cycle-nav").css("display", "none");
                });

                jQuery(".cycle-nav").css("display", "<?php echo esc_attr($gs_t_nav_arrow); ?>");
            });
        </script>
		<?php
	}
}