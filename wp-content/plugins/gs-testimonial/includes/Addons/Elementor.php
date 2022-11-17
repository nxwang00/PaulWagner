<?php

namespace GSTM\Addons;

// if direct access than exit the file.
defined('ABSPATH') || exit;

use \Elementor\Controls_Manager;

/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Elementor extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve oEmbed widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'gs_testimonial';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve oEmbed widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'GS Testimonial', 'gst' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve oEmbed widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'fa fa-comments';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the oEmbed widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'general' ];
	}

	/**
	 * Register oEmbed widget controls.
	 *
	 * Adds different input fields to allow the user to change and customize the widget settings.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Shortcode Settings', 'gst' ),
				'tab'   => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'gs_t_transtion',
			[
				'label'   => __( 'Transition Style', 'gst' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
                    'carousel'   => __( 'Carousel', 'gst' ),
                    'fade'       => __( 'Fade', 'gst' ),
                    'fadeout'    => __( 'FadeOut', 'gst' ),
                    'scrollHorz' => __( 'ScrollHorz', 'gst' ),
                    'scrollVert' => __( 'ScrollVert', 'gst' ),
                    'flipHorz'   => __( 'FlipHorz', 'gst' ),
                    'flipVert'   => __( 'FlipVert', 'gst' ),
                    'shuffle'    => __( 'Shuffle', 'gst' ),
                    'tileSlide'  => __( 'TileSlide', 'gst' )
				],
				'default' => 'carousel',
			]
        );
        

		$this->add_control(
			'gs_sty_thming',
			[
				'label'   => __( 'Select Theme', 'gst' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
                    'gs_style1'  => __( 'Style 1', 'gst' ),
                    'gs_style2'  => __( 'Style 2', 'gst' ),
                    'gs_style3'  => __( 'Style 3', 'gst' ),
                    'gs_style4'  => __( 'Style 4', 'gst' ),
                    'gs_style5'  => __( 'Style 5', 'gst' ),
                    'gs_style6'  => __( 'Style 6', 'gst' ),
                    'gs_style7'  => __( 'Style 7', 'gst' ),
                    'gs_style8'  => __( 'Style 8', 'gst' ),
                    'gs_style9'  => __( 'Style 9', 'gst' ),
                    'none'       => __( 'None', 'gst' ),
                    'gs_style11' => __( 'Style 11', 'gst' ),
                    'gs_style12' => __( 'Style 12', 'gst' ),
                    'gs_style13' => __( 'Style 13', 'gst' ),
                    'gs_style14' => __( 'Style 14', 'gst' ),
                    'gs_style15' => __( 'Style 15', 'gst' ),
                    'gs_style16' => __( 'Style 16', 'gst' ),
                    'gs_style17' => __( 'Style 17', 'gst' )
				],
				'default' => 'gs_style1',
			]
        );
        

		$this->add_control(
			'cats_name',
			[
				'label' => __( 'Category Name', 'gst' ),
				'type'  => Controls_Manager::TEXT,
			]
        );
        
        $this->add_control(
			'speed',
			[
				'label'   => __( 'Speed', 'gst' ),
                'type'    => Controls_Manager::TEXT,
                'default' => '4000',
			]
        );
        
        $this->add_control(
			'readmore_link',
			[
				'label' => __( 'Readmore link', 'gst' ),
				'type'  => Controls_Manager::TEXT,
			]
        );
        
        $this->add_control(
			'img',
			[
				'label'   => __( 'Image', 'gst' ),
				'type'    => Controls_Manager::SELECT,
				'options' => [
                    'gs_square_shadow' => __( 'Square Shadow', 'gst' ),
                    'gs_circle_shadow' => __( 'Circle Shadow', 'gst' ),
                    'gs_radius_shadow' => __( 'Radius Shadow', 'gst' ),
                    'gs_square'        => __( 'Square', 'gst' )
				],
				'default' => 'gs_square',
			]
        );
		$this->end_controls_section();
	}

	/**
	 * Render oEmbed widget output on the frontend.
	 *
	 * Written in PHP and used to generate the final HTML.
	 *
	 * @since 1.0.0
	 * @access protected
	 */
	protected function render() {
		$settings = $this->get_settings_for_display();

		$shortcode = sprintf(
			'[gs_testimonial transition="%s" theme="%s" readmore_link="%s" cat_name="%s" speed="%s" img="%s"]',
			esc_attr($settings['gs_t_transtion']),
			esc_attr($settings['gs_sty_thming']),
			esc_url($settings['readmore_link']),
			esc_attr($settings['cats_name']),
			esc_attr($settings['speed']),
			wp_kses_post($settings['img'])
		);

		echo do_shortcode( $shortcode );
	}

}

