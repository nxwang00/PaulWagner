<?php
/**
 * Template for displaying Enroll button in single course.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/single-course/buttons/enroll.php.
 *
 * @author  ThimPress
 * @package  Learnpress/Templates
 * @version  3.0.0
 */

/**
 * Prevent loading this file directly
 */
defined( 'ABSPATH' ) || exit();

if ( ! isset( $course ) ) {
    $course = learn_press_get_course();
} ?>

<?php do_action( 'learn-press/before-purchase-form' ); ?>

    <form action="/cart/" name="purchase-course" class="purchase-course" method="post" enctype="multipart/form-data">

        <?php do_action( 'learn-press/before-purchase-button' ); ?>

        <input type="hidden" name="purchase-course" value="<?php echo esc_attr( $course->get_id() ); ?>"/>
        <input type="hidden" name="purchase-course-nonce"
               value="<?php echo esc_attr( LP_Nonce_Helper::create_course( 'purchase' ) ); ?>"/>

        <button id="custom_enroll_button" class="lp-button button button-purchase-course">
            <?php echo esc_html( apply_filters( 'learn-press/purchase-course-button-text', __( 'Get this course', 'learnpress' ) ) ); ?>
        </button>

        <?php do_action( 'learn-press/after-purchase-button' ); ?>

    </form>
<span style="money_back_class">30 day money back guarantee * for any reason.</span>
</div>



<?php do_action( 'learn-press/after-purchase-form' ); ?>