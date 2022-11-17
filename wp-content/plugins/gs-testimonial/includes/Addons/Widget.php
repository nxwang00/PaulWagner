<?php

namespace GSTM\Addons;

// if direct access than exit the file.
defined('ABSPATH') || exit;


class Widget extends \WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'foo_widget', // Base ID
			esc_html__( 'GS Testimonial Widget', '' ), // Name
			array( 'description' => esc_html__( 'Display Testimonials Widget area', '' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo wp_kses_post( $args['before_widget'] );

		if ( ! empty( $instance['title'] ) ) {
			echo wp_kses_post( $args['before_title'] ) . apply_filters( 'widget_title', $instance['title'] ) . wp_kses_post( $args['after_title'] );
		}
		$theme = ! empty( $instance['theme'] ) ? $instance['theme'] : esc_html__( 'gs_style3 ', '' );
		$transition = ! empty( $instance['transition'] ) ? $instance['transition'] : esc_html__( ' ', '' );
		echo do_shortcode( '[gs_testimonial theme='. esc_attr($theme) .' transition='. esc_attr($transition) .']' );
		echo wp_kses_post( $args['after_widget'] );
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Testimonials', '' );
		$theme = ! empty( $instance['theme'] ) ? $instance['theme'] : esc_html__( ' ', '' ); 
		$transition = ! empty( $instance['transition'] ) ? $instance['transition'] : esc_html__( ' ', '' ); 
		?>
		<p>
		<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>"><?php esc_attr_e( 'Title:', '' ); ?></label> 
		<input class="widefat" id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>">
		</p>
		<p>
	      <label for="<?php echo esc_attr( $this->get_field_id('theme') ); ?>">Select Theme: 
	        <select class='widefat' id="<?php echo esc_attr( $this->get_field_id('theme') ); ?>"
	                name="<?php echo esc_attr( $this->get_field_name('theme') ); ?>" type="text">
	          <option value='gs_style1'<?php echo ($theme=='gs_style1')?'selected':''; ?>>
	            Widget Style 1
	          </option>
	          <option value='gs_style5'<?php echo ($theme=='gs_style5')?'selected':''; ?>>
	            Widget Style 2
	          </option>
	          <option value='gs_style8'<?php echo ($theme=='gs_style8')?'selected':''; ?>>
	            Widget Style 3
	          </option>
	         
	        </select>                
	      </label>
     	</p>
     	<p>
	      <label for="<?php echo esc_attr( $this->get_field_id('transition') ); ?>">Select transition: 
	        <select class='widefat' id="<?php echo esc_attr( $this->get_field_id('transition') ); ?>"
	                name="<?php echo esc_attr( $this->get_field_name('transition') ); ?>" type="text">
	          <option value='carousel'<?php echo ($transition=='carousel')?'selected':''; ?>>
	            Carousel
	          </option>
	          <option value='fade'<?php echo ($transition=='fade')?'selected':''; ?>>
	            Fade
	          </option>
	          <option value='fadeout'<?php echo ($transition=='fadeout')?'selected':''; ?>>
	            Fadeout
	          </option>
	          <option value='scrollHorz'<?php echo ($transition=='scrollHorz')?'selected':''; ?>>
	            ScrollHorz
	          </option>
	          <option value='scrollVert'<?php echo ($transition=='scrollVert')?'selected':''; ?>>
	            ScrollVert
	          </option>
	          <option value='flipHorz'<?php echo ($transition=='flipHorz')?'selected':''; ?>>
	            FlipHorz
	          </option>
	          <option value='flipVert'<?php echo ($transition=='flipVert')?'selected':''; ?>>
	            FlipVert
	          </option>
	          <option value='shuffle'<?php echo ($transition=='shuffle')?'selected':''; ?>>
	            Shuffle
	          </option>
	          <option value='tileSlide'<?php echo ($transition=='tileSlide')?'selected':''; ?>>
	            TileSlide
	          </option>
	         
	        </select>                
	      </label>
     	</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
		$instance['theme'] = $new_instance['theme'];
		$instance['transition'] = $new_instance['transition'];

		return $instance;
	}

}