<?php

namespace GSTM\Addons;

// if direct access than exit the file.
defined('ABSPATH') || exit;

class WPBackery {
	public function __construct() {
		// Create gs_logo element for Visual Composer
		add_action( 'vc_before_init', [ $this, 'gstestimonial_integrateWithVC' ] );
	}

	public function gstestimonial_integrateWithVC() {
		vc_map( array(
			'name' => __( 'GS Testimonial ', 'gst' ),
			'base' => 'gs_testimonial',
			'show_settings_on_create' => true,
			'icon' => GST_PRO_PLUGIN_URI. '/img/gs-testimonial-slider.png',
			'category' => __( 'Content', 'gst'),
			'description' => __( 'Best Responsive Testimonials slider.', 'gst' ),
			'params' => array(

				array(
					'type' => 'dropdown',
					'heading' => __( 'Transition Style',  "gst" ),
					'param_name' => 'transition',
					'value' => array(
						__('Carousel','gst')=>'carousel',
						__('Fade','gst')=>'fade',
						__('FadeOut','gst')=>'fadeout',
						__('ScrollHorz','gst')=>'scrollHorz',
						__('ScrollVert','gst')=>'scrollVert',
						__('FlipHorz','gst')=>'flipHorz',
						__('FlipVert','gst')=>'flipVert',
						__('Shuffle','gst')=>'shuffle',
						__('TileSlide','gst')=>'tileSlide'
					),
					"description" => __( "For slider Only.", "gst" ),
					"std" => 'carousel'
				),


				array(
					'type' => 'dropdown',
					'heading' => __( 'Theme',  "gst" ),
					'param_name' => 'theme',
					'value' => array(

						__('Style 1',  'gst'  ) =>'gs_style1',
						__('Style 2',  'gst'  ) =>'gs_style2' ,
						__('Style 3',  'gst'  ) =>'gs_style3' ,
						__('Style 4',  'gst'  ) =>'gs_style4' ,
						__('Style 5',  'gst'  ) =>'gs_style5' ,
						__('Style 6',  'gst'  ) =>'gs_style6' ,
						__('Style 7',  'gst'  ) =>'gs_style7' ,
						__('Style 8',  'gst'  ) =>'gs_style8' ,
						__('Style 9',  'gst'  ) =>'gs_style9' ,
						__('None',  'gst'  ) =>'none' ,
						__('Style 11',  'gst'  ) =>'gs_style11',
						__('Style 12',  'gst'  ) =>'gs_style12',
						__('Style 13',  'gst'  ) =>'gs_style13',
						__('Style 14',  'gst'  ) =>'gs_style14',
						__('Style 15',  'gst'  ) =>'gs_style15',
						__('Style 16',  'gst'  ) =>'gs_style16',
						__('Style 17',  'gst'  ) =>'gs_style17',
					),
					// "description" => __( "Enter description.", "gst" ),
					"std" => "gs_style1"
				),
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => __( "Category Name", "gst" ),
					"param_name" => "cat_name",
					"value" => __( "", "gst" ),
					//"description" => __( "Enter description.", "gst" )
				),
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => __( "Speed", "gst" ),
					"param_name" => "speed",
					"value" => __( 4000, "gst" ),
					//"description" => __( "Enter description.", "gst" )
				),
				array(
					"type" => "textfield",
					"class" => "",
					"heading" => __( "Readmore link", "gst" ),
					"param_name" => "readmore_link",
					"value" => __( 200, "gst" ),
					//"description" => __( "Enter description.", "gst" )
				),

				array(
					'type' => 'dropdown',
					'heading' => __( 'Image',  "gst" ),
					'param_name' => 'img',
					'value' => array(
						__( 'gs_square_shadow',  "gst"  ) => 'gs_square_shadow',
						__( 'gs_circle_shadow',  "gst"  ) => 'gs_circle_shadow',
						__( 'gs_radius_shadow',  "gst"  ) => 'gs_radius_shadow',
						__( 'gs_square',  "gst"  ) => 'gs_square',
					),
					//"description" => __( "Enter description.", "gst" ),
					"std" => 'gs_square'
				)



			)
		) );
	}
}
