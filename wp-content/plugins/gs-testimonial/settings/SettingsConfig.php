<?php

namespace GSTM;

// if direct access than exit the file.
defined('ABSPATH') || exit;

class SettingsConfig {

    public function get_settings_sections() {
        $sections = [
	        [
		        'id' 	=> 'gs_t_general',
		        'title' => __( 'General Settings', 'gst' )
	        ],
	        [
		        'id'    => 'gs_t_style',
		        'title' => __( 'Style Settings', 'gst' )
	        ],
	        [
		        'id' 	=> 'gs_t_advance',
		        'title' => __( 'Advance Settings', 'gst' )
	        ]
        ];
        return $sections;
    }

    /**
     * Returns all the settings fields
     *
     * @return array settings fields
     */
    public function get_settings_fields() {
        $settings_fields = [
            'gs_t_general' => [
                // Transition Style
                [
                    'name'      => 'gs_t_transtion',
                    'label'     => __( 'Transition Style', 'gst' ),
                    'desc'      => __( 'Select Transition Style to slide Testimonials', 'gst' ),
                    'type'      => 'select',
                    'default'   => 'carousel',
                    'options'   => [
                        'carousel'   => __( 'Carousel', 'gst' ),
                        'fade'       => __( 'Fade (Pro)', 'gst' ),
                        'fadeout'    => __( 'FadeOut (Pro)', 'gst' ),
                        'scrollHorz' => __( 'ScrollHorz (Pro)', 'gst' ),
                        'scrollVert' => __( 'ScrollVert (Pro)', 'gst' ),
                        'flipHorz'   => __( 'FlipHorz (Pro)', 'gst' ),
                        'flipVert'   => __( 'FlipVert (Pro)', 'gst' ),
                        'shuffle'    => __( 'Shuffle (Pro)', 'gst' ),
                        'tileSlide'  => __( 'TileSlide (Pro)', 'gst' )
                    ]
                ],
                // Slider Stop on mouse hover
               [
                    'name'           => 'gs_t_slider_stop',
                    'label'          => __( 'Stop on hover', 'gst' ),
                    'desc'           => __( 'NavigationSlider stop on mouseover. Default Off', 'gst' ),
                    'type'           => 'switch',
                    'switch_default' => 'OFF'
                ],
                 // Navigation Arrow
               [
                    'name'           => 'gs_t_nav_arrow',
                    'label'          => __( 'Navigation Arrow', 'gst' ),
                    'desc'           => __( 'Navigation arrow will show the left & right side on hover state.<br>&nbspIf you don\'t wish to show the arrow, just turn the switch off! Default ON', 'gst' ),
                    'type'           => 'switch',
                    'switch_default' => 'ON'
                ],
                // Slider auto play
               [
                    'name'              => 'gs_t_slide_speed',
                    'label'             => __( 'Sliding Speed', 'gst' ),
                    'desc'              => __( 'You can increase / decrease sliding speed.<br> Set the speed in millisecond. Default 4000. To disable autoplay just set the speed <b>0</b>', 'gst' ),
                    'type'              => 'range',
                    'sanitize_callback' => 'intval',
                    'range_min'         => 0,
                    'range_max'         => 10000,
                    'range_step'        => 100,
                    'default'           => 4000,
                ],
                //Responsiveness
               [
                    'name'           => 'gs_t_responsive',
                    'label'          => __( 'Responsiveness', 'gst' ),
                    'desc'           => __( 'Turn off to disable responsiveness! Default On', 'gst' ),
                    'type'           => 'switch',
                    'switch_default' => 'ON'
                ],
                // Pagination
               [
                    'name'           => 'gs_t_pagination',
                    'label'          => __( 'Pagination', 'gst' ),
                    'desc'           => __( 'Pagination control below the Testimonial slider. Default OFF <b> ( Pro Feature ) </b>', 'gst' ),
                    'type'           => 'switch',
                    'switch_default' => 'OFF'
                ],

                // company and designation level show /hide
               [
                    'name'           => 'gs_t_comapny_lebel',
                    'label'          => __( 'Company & Designation', 'gst' ),
                    'desc'           => __( 'Company & Designation Label show / hide. Default ON', 'gst' ),
                    'type'           => 'switch',
                    'switch_default' => 'ON'
                ],
                 // Display Ratings
               [
                    'name'           => 'gs_t_ratings',
                    'label'          => __( 'Ratings', 'gst' ),
                    'desc'           => __( 'Show / Hide Ratings . Default OFF <b> ( Pro Feature ) </b>', 'gst' ),
                    'type'           => 'switch',
                    'switch_default' => 'OFF'
                ],
                // Display Author Image
               [
                    'name'           => 'gs_t_image',
                    'label'          => __( 'Image', 'gst' ),
                    'desc'           => __( 'Show / Hide Image . Default OFF', 'gst' ),
                    'type'           => 'switch',
                    'switch_default' => 'OFF'
                ],
            ],
            // GS Testimonial Style settings
            'gs_t_style' => [
                // Testimonial Text Color
		        [
                    'name'    => 'gs_t_text_color',
                    'label'   => __( 'Testimonial Color', 'gst' ),
                    'desc'    => __( 'Select color for <b>Testimonial Texts</b>.', 'gst' ),
                    'type'    => 'color',
                    'default' => '#000'
                ],
                // Author Name Color
                [
                    'name'    => 'gs_t_name_color',
                    'label'   => __( 'Author Name Color', 'gst' ),
                    'desc'    => __( 'Select color for <b>Author Name</b>.', 'gst' ),
                    'type'    => 'color',
                    'default' => '#8224e3'
                ],
                // Testimonial Text font size
		        [
                    'name'    => 'gs_t_text_font_size',
                    'label'   => __( 'Font Size', 'gst' ),
                    'desc'    => __( 'Set font size for <b>Testimonial Texts</b>, Default 16px <b> ( Pro Feature ) </b>', 'gst' ),
                    'type'    => 'number',
                    'default' => 16,
                    'min'     => 0,
                    'max'     => 20,
                ],
                // Testimonial Text Line Height
		        [
                    'name'    => 'gs_t_text_line_h',
                    'label'   => __( 'Line Height', 'gst' ),
                    'desc'    => __( 'Set Line Height for <b>Testimonial Texts</b>, Default 20px <b> ( Pro Feature ) </b>', 'gst' ),
                    'type'    => 'number',
                    'default' => 20,
                    'min'     => 0,
                    'max'     => 25,
                ],
                // content font weight
		        [
                    'name'    => 'gs_t_fntw',
                    'label'   => __( 'Font Weight', 'gst' ),
                    'desc'    => __( 'Select Font Weight for <b>Testimonial Texts</b> <b> ( Pro Feature ) </b>', 'gst' ),
                    'type'    => 'select',
                    'default' => 'normal',
                    'options' => [
                        'normal'  => 'Normal',
                        'bold'    => 'Bold',
                        'lighter' => 'Lighter'
                    ]
                ],
                // Navigation Arrow color
		        [
                    'name'    => 'gs_t_nav_arrow_color',
                    'label'   => __( 'Navigation Arrow Color', 'gst' ),
                    'desc'    => __( 'Set color for Nav Arrow. Applicable for <b>Flipster Theme</b> <b> ( Pro Feature )</b>' ),
                    'type'    => 'color',
                    'default' => '#b5b5b5'
                ],
                // Rating color
		        [
                    'name'    => 'gs_t_rating_color',
                    'label'   => __( 'Ratings Color', 'gst' ),
                    'desc'    => __( 'Select color for Rating <b>( Pro Feature )</b>' ),
                    'type'    => 'color',
                    'default' => '#0074A2'
                ],
                // Author Name font size
		        [
                    'name'    => 'gs_t_au_font_size',
                    'label'   => __( 'Font Size', 'gst' ),
                    'desc'    => __( 'Set font size for <b>Author Name</b>, Default 20px <b> ( Pro Feature ) </b>', 'gst' ),
                    'type'    => 'number',
                    'default' => 20,
                    'min'     => 10,
                    'max'     => 30,
                ],
                // Author Name font weight
		        [
                    'name'    => 'gs_t_au_fntw',
                    'label'   => __( 'Font Weight', 'gst' ),
                    'desc'    => __( 'Select Font Weight for <b>Author Name</b> <b> ( Pro Feature ) </b>', 'gst' ),
                    'type'    => 'select',
                    'default' => 'normal',
                    'options' => [
                        'normal'  => 'Normal',
                        'bold'    => 'Bold',
                        'lighter' => 'Lighter'
                    ]
                ],
                // Author Margin
		        [
                    'name'    => 'gs_t_au_mar',
                    'label'   => __( 'Margin', 'gst' ),
                    'desc'    => __( 'Set Margin for <b>Author Name</b>, Default 3px <b> ( Pro Feature ) </b>', 'gst' ),
                    'type'    => 'number',
                    'default' => 3,
                    'min'     => 0,
                    'max'     => 10,
                ],
                // Label Color
		        [
                    'name'    => 'gs_t_label_color',
                    'label'   => __( 'Label Color', 'gst' ),
                    'desc'    => __( 'Select color for <b>Labels</b> <b> ( Pro Feature ) </b>.', 'gst' ),
                    'type'    => 'color',
                    'default' => '#717171'
                ],
                // Label font size
		        [
                    'name'    => 'gs_t_label_font_size',
                    'label'   => __( 'Font Size', 'gst' ),
                    'desc'    => __( 'Set font size for <b>Labels</b>, Default 16px <b> ( Pro Feature ) </b>', 'gst' ),
                    'type'    => 'number',
                    'default' => 16,
                    'min'     => 10,
                    'max'     => 30,
                ],
                // Name & Designation Color
		        [
                    'name'    => 'gs_t_nm_desig_color',
                    'label'   => __( 'Name & Designation Color', 'gst' ),
                    'desc'    => __( 'Select color for <b>Name & Designation</b> <b> ( Pro Feature )</b>. ', 'gst' ),
                    'type'    => 'color',
                    'default' => '#717171'
                ],
                // Name & Designation font size
		        [
                    'name'    => 'gs_t_nm_desig_font_size',
                    'label'   => __( 'Font Size', 'gst' ),
                    'desc'    => __( 'Set font size for <b>Name & Designation</b>, Default 16px <b> ( Pro Feature ) </b>', 'gst' ),
                    'type'    => 'number',
                    'default' => 16,
                    'min'     => 10,
                    'max'     => 30,
                ],
                 // Name & Designation font weight
		        [
                    'name'    => 'gs_t_nm_desig_fntw',
                    'label'   => __( 'Font Weight', 'gst' ),
                    'desc'    => __( 'Select Font Weight for <b>Name & Designation</b>. Default Normal <b> ( Pro Feature ) </b>', 'gst' ),
                    'type'    => 'select',
                    'default' => 'normal',
                    'options' => [
                        'normal'  => 'Normal',
                        'bold'    => 'Bold',
                        'lighter' => 'Lighter'
                    ]
                ],
                // Name & Designation font style
		        [
                    'name'    => 'gs_t_nm_desig_style',
                    'label'   => __( 'Font Style', 'gst' ),
                    'desc'    => __( 'Select Font Style for <b>Name & Designation</b>. Default Normal <b> ( Pro Feature ) </b>', 'gst' ),
                    'type'    => 'select',
                    'default' => 'normal',
                    'options' => [
                        'normal' => 'Normal',
                        'italic' => 'Italic'
                    ]
                ],
		        [
                    'name'    => 'gs_t_filter_cat_pos',
                    'label'   => __( 'Filter Category Position', 'gst' ),
                    'desc'    => __( 'Select Filter Category Position. Applicable for Filter Theme <b> ( Pro Feature ) </b>', 'gst' ),
                    'type'    => 'select',
                    'default' => 'center',
                    'options' => [
                        'left'   => 'Left',
                        'center' => 'Center',
                        'right'  => 'Right'
                    ]
                ],

            ],
			// GS Testimonial advance settings
            'gs_t_advance' => [
                // Primary Font Family
	            [
                    'name'    => 'gs_t_fnt_name',
                    'label'   => __( ' Font Family', 'gst' ),
                    'desc'    => __( 'Select  Font Family for Testimonials Name <b> ( Pro Feature ) </b>', 'gst' ),
                    'type'    => 'checkbox',
                    'default' => 'on',
                    
                ],
                // Img width
	            [
                    'name'    => 'gs_t_img_width',
                    'label'   => __( 'Image Width', 'gst' ),
                    'desc'    => __( 'Author image size in width. Default 86 PX. Max 125 PX <b> ( Pro Feature ) </b>', 'gst' ),
                    'type'    => 'number',
                    'default' => 86,
                    'min'     => 0,
                    'max'     => 125,
                ],
                // Image Height
	            [
                    'name'    => 'gs_t_img_height',
                    'label'   => __( 'Image Height', 'gst' ),
                    'desc'    => __( 'Author image size in height. Default 86 PX. Max 125 PX<br>Note : Use same size height & width to display <b>Round</b> image<b> ( Pro Feature ) </b>', 'gst' ),
                    'type'    => 'number',
                    'default' => 86,
                    'min'     => 0,
                    'max'     => 125,
                ],
                // company level
	            [
                    'name'    => 'gs_t_company_level',
                    'label'   => __( 'Company Label', 'gst' ),
                    'desc'    => __( 'Company Label <b> ( Pro Feature ) </b>', 'gst' ),
                    'type'    => 'text',
                    'default' => 'Company'
                ],
                // des level
	            [
                    'name'    => 'gs_t_designation_level',
                    'label'   => __( 'Designation Label', 'gst' ),
                    'desc'    => __( 'Designation Label <b> ( Pro Feature ) </b>', 'gst' ),
                    'type'    => 'text',
                    'default' => 'Designation'
                ],
                // Border Color
	            [
                    'name'    => 'gs_t_img_b_color',
                    'label'   => __( 'Author Image Border', 'gst' ),
                    'desc'    => __( 'Select color for Author Image Border <b> ( Pro Feature ) </b>.', 'gst' ),
                    'type'    => 'color',
                    'default' => '#ddd'
                ],
                // Img border thikness
	            [
                    'name'    => 'gs_t_img_thikness',
                    'label'   => __( 'Border Thickness', 'gst' ),
                    'desc'    => __( 'Author image Border Thickness. Default 3 PX. Max 10 PX <b> ( Pro Feature ) </b>', 'gst' ),
                    'type'    => 'number',
                    'default' => 3,
                    'min'     => 0,
                    'max'     => 10,
                ],
                // Img border style
	            [
                    'name'    => 'gs_t_img_sty',
                    'label'   => __( 'Border Style', 'gst' ),
                    'desc'    => __( 'Select Border Style around Author image <b> ( Pro Feature ) </b>', 'gst' ),
                    'type'    => 'select',
                    'default' => 'solid',
                    'options' => [
                        'dashed' => __( 'Dashed', 'gst' ),
                        'dotted' => __( 'Dotted', 'gst' ),
                        'double' => __( 'Double', 'gst' ),
                        'solid'  => __( 'Solid', 'gst' ),
                        'none'   => __( 'None', 'gst' )
                    ]
                ],
                // Style & Theming
	            [
                    'name'    => 'gs_sty_thming',
                    'label'   => __( 'Style & Theming', 'gst' ),
                    'desc'    => __( 'Select preferred Style & Theme', 'gst' ),
                    'type'    => 'select',
                    'default' => 'none',
                    'options' => [
                        'none' => 'None',
                        'gs_style1'  => __( 'Style 1 (Free)', 'gst' ),
                        'gs_style2'  => __( 'Style 2 (Free)', 'gst' ),
                        'gs_style3'  => __( 'Style 3 (Free)', 'gst' ),
                        'gs_style4'  => __( 'Style 4 (Free)', 'gst' ),
                        'gs_style8'  => __( 'Style 8 (Free)', 'gst' ),
                        'gs_style5'  => __( 'Style 5 (Pro)', 'gst' ),
                        'gs_style6'  => __( 'Style 6 (Pro)', 'gst' ),
                        'gs_style7'  => __( 'Style 7 (Pro)', 'gst' ),
                        'gs_style9'  => __( 'Style 9 (Pro)', 'gst' ),
                        'gs_style11' => __( 'Style 11 (Pro)', 'gst' ),
                        'gs_style12' => __( 'Style 12 (Pro)', 'gst' ),
                        'gs_style13' => __( 'Style 13 (Pro)', 'gst' ),
                        'gs_style14' => __( 'Style 14 (Pro)', 'gst' ),
                        'gs_style15' => __( 'Style 15 (Pro)', 'gst' ),
                        'gs_style16' => __( 'Style 16 (Pro)', 'gst' ),
                        'gs_style17' => __( 'Style 17 (Pro)', 'gst' )
                    ]
                ],
                // Column option
                [
                    'name'    => 'gs_t_slider_column',
                    'label'   => __( 'Column/s', 'gst' ),
                    'desc'    => __( 'Select preferred Column/s (1 to 4). Applicable for gs_style1, 2, 3, 4 & 8', 'gst' ),
                    'type'    => 'number',
                    'default' => 1,
                    'min'     => 1,
                    'max'     => 4,
                ]
            ]
        ];

        return $settings_fields;
    }

}