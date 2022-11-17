<?php

/**

 * Template for displaying overview tab of single course.

 *

 * This template can be overridden by copying it to yourtheme/learnpress/single-course/tabs/overview.php.

 *

 * @author  ThimPress

 * @package  Learnpress/Templates

 * @version  3.0.0

 */



/**

 * Prevent loading this file directly

 */

defined( 'ABSPATH' ) || exit();

?>



<?php $course = LP_Global::course();

	//echo $course->get_id();

	//echo get_field( "learn_more_link_cs", $course->get_id());
?>



<div class="course-description" id="learn-press-course-description">






	<?php

	/**

	 * @deprecated

	 */

	do_action( 'learn_press_begin_single_course_description' );



	/**

	 * @since 3.0.0

	 */

	do_action( 'learn-press/before-single-course-description' );


	 do_action( 'learn-press/before-purchase-form' ); 

	 echo $course->get_content();

	 if ( ! $price = $course->get_price_html() ) {
			return;
		}

	if ( ! isset( $course ) ) {
		$course = learn_press_get_course();
	}	

	 ?>
<div id="hide_after_purchase" class="main_price_box hide_after_purchase">
<div class="course-price">

	<?php if ( $course->has_sale_price() ) { ?>


        <span class="origin-price"> <?php echo $course->get_origin_price_html(); ?></span>


	<?php } ?>

    <span class="price"><?php 

    if($price == "Free"){

    echo get_field( "free_button_text", 'options' );// "FREE YAY!"; 
	$payment_text = "";

    }else{
    	echo $price; 
    	$payment_text = "One time payment by MasterCard/Visa/Paypal";
    }
	?>
    </span>

<span class="one_time_class"><?php echo $payment_text; ?></span>
</div>


<div class="lp-course-buttons">



	<?php do_action( 'learn-press/before-course-buttons' ); ?>

	<?php

	/**

	 * @see learn_press_course_purchase_button - 10

	 * @see learn_press_course_enroll_button - 10

	 * @see learn_press_course_retake_button - 10

	 */

	do_action( 'learn-press/course-buttons' );

	?>
	<?php if(get_field( "learn_more_link_cs", $course->get_id() ) != "" || get_field( "learn_more_link_cs", $course->get_id() ) != NULL ) { ?>
	<div class="learn_more_btn">
    		<a target="_blank" href="<?php echo get_field( "learn_more_link_cs", $course->get_id() );  ?>" >Learn More</a>
	</div>
	<?php } ?>

	<?php do_action( 'learn-press/after-course-buttons' ); ?>



</div>

<?php do_action( 'learn-press/after-purchase-form' ); 



	


	/**

	 * @since 3.0.0

	 */

	do_action( 'learn-press/after-single-course-description' );



	/**

	 * @deprecated

	 */

	do_action( 'learn_press_end_single_course_description' );

	?>



</div>