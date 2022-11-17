<?php
/*Template Name: Coaching Candidate Page */
get_header();
?>

<section class="psection psection-pqaform mhsction-pqaform">
	<div class="psection-inner">
    	<div class="container">
        	<div class="row">
            	<div class="col-12">
                
                	<div class="mhsform-wrap">
                    	<div class="mhsform-text">
                            <div class="mhsformtext-in">
                               <?php the_field('ccform_text'); ?>
                            </div>
                     	</div>
                        
                        <div class="mhsform-in">
                            <div class="mhsform">
                                <?php 

                                the_content();
                                //echo do_shortcode('[gravityform id="9" title="false" description="false" ajax="false"]'); ?>
                            </div>
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
