<?php

/**

 * Template for displaying buttons of single course.

 *

 * This template can be overridden by copying it to yourtheme/learnpress/single-course/buttons.php.

 *

 * @author  ThimPress

 * @package  Learnpress/Templates

 * @version  3.0.0

 */



/**

 * Prevent loading this file directly

 */

defined( 'ABSPATH' ) || exit();

$course = LP_Global::course();

// print_r($course);

?>



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