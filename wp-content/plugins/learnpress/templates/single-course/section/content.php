<?php
/**
 * Template for displaying content and items of section in single course.
 *
 * This template can be overridden by copying it to yourtheme/learnpress/single-course/section/content.php.
 *
 * @author   ThimPress
 * @package  Learnpress/Templates
 * @version  3.0.0
 */

/**
 * Prevent loading this file directly
 */
defined( 'ABSPATH' ) || exit();

if ( ! isset( $section ) ) {
	return;
}

$user = LP_Global::user();

?>

<?php if ( $items = $section->get_items() ) { ?>

    <ul  ccc class="section-content">

		<?php foreach ( $items as $item ) { 

			//print_r($item); die();

			?>

			<?php echo $item->get_class; ?>


			<?php

			$lesson_img_1 = get_field('preview_image',$item->get_id());

			if( $lesson_img_1 != ''){
				$lesson_img = get_field('preview_image',$item->get_id());
			}else{
				$lesson_img =  site_url().'/wp-content/uploads/2020/08/Untitled-1.jpg';
			}


			if(get_field('lesson_content',$item->get_id()) == "Video"){

				$frame_color ="gold";

			}else{
				$frame_color ="perpule";
			}

			
			if(get_field('is_free_course') == "Yes"){

				$is_free_course ="is_free_course";

			}else{
				$is_free_course ="is_free_course_no";
			}





			?>


            <li style="background-image: url(<?php echo $lesson_img; ?>); " class="<?php  echo $frame_color.' '.$is_free_course;  ?> <?php echo join( ' ', $item->get_class() ); ?>">
				<?php
				if ( $item->is_visible() ) {
					/**
					 * @since 3.0.0
					 */
					do_action( 'learn-press/begin-section-loop-item', $item );

					if ( $user->can_view_item( $item->get_id() )  || !(is_user_logged_in())) {

						if (in_array("item-locked", $item->get_class())){

							$link ="javascript:void(0)";

							if($is_free_course == "is_free_course") {
								$title = "<span class='lock_msg'>This Is Free! Please Scroll To The Bottom And Click The ENROLL Button!</span>";
							}else{
								$title = "<span class='lock_msg'>Thank you for looking! To unlock the content, please purchase the course. We'd love to have you join us!</span>";
							}

							
						}else{

							$link = $item->get_permalink();
							$title ="";
						}

						?>
						<?php echo $title; ?>
                        <a class="section-item-link" href="<?php echo $link; ?>">
							<?php learn_press_get_template( 'single-course/section/content-item.php', array(
								'item'    => $item,
								'section' => $section
							) ); ?>
                        </a>
                         
					<?php } else { ?>

                        <div class="section-item-link">
							<?php learn_press_get_template( 'single-course/section/content-item.php', array(
								'item'    => $item,
								'section' => $section
							) ); ?>
                        </div>
					<?php } ?>

					<?php
					/**
					 * @since 3.0.0
					 */
					do_action( 'learn-press/end-section-loop-item', $item );
				}
				?>

            </li>

		<?php } ?>

    </ul>

<?php } else { ?>

	<?php learn_press_display_message( __( 'No items in this section', 'learnpress' ) ); ?>

<?php } ?>