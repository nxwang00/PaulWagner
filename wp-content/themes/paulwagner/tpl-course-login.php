<?php
/*Template Name: Course-login Page */
get_header();
?>

<section class="psection psection-courselogin">
	<div class="psection-inner">
    	<div class="container">
        
        	<div class="row">
            	<div class="col-12">
                	<div class="courselogin-form">
                    	<div class="courseloginform-in">
                            <div class="section-title">
                            	<div class="st-sprtr">
                                    <div class="stsprtr-in"></div>
                                </div>
                                <h2><?php the_field('courseloginform_maintitle'); ?></h2>
                            </div>
                            <div class="site-btn courselogin-btn">
                            	<a href="<?php the_field('courseloginform_btnurl'); ?>"><?php the_field('courseloginform_btntext'); ?></a>
                            </div>
                            <div class="courseloginform-subtitle">
                            <h3><?php the_field('courseloginform_subtitle'); ?></h3>
                            </div>
                            <?php 

                            the_content();
                            // echo do_shortcode('[wp_login_form redirect="https://www.paulwagner.com/courses/personal-expansion-freedom/"]') ?>
                    	</div>
                    </div>
                </div>
            </div>
            
       	</div>
    </div>
</section>

                          
<?php 
get_footer();
?>
