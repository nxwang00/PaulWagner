<?php
/**
 * Template for displaying tab nav of single course.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/single-course/tabs/tabs.php.
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

<?php $tabs = learn_press_get_course_tabs(); ?>

<?php if ( empty( $tabs ) ) {
	return;
} ?>

<div id="learn-press-course-tabs" class="course-tabs">

	<?php foreach ( $tabs as $key => $tab ) { ?>

        <div class="custom_tab_bd">
			<?php

			call_user_func( $tab['callback'], $key, $tab );
			do_action( 'learn-press/course-tab-content', $key, $tab );
			
			?>

        </div>

	<?php } ?>

</div>