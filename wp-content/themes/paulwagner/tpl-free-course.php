<?php
/*Template Name: Free Course Page */
get_header();
?>

<section class="psection psection-freecoursetop">
	<div class="psection-inner">
    	<div class="container">
        
        	<div class="row">
            
            	<div class="col-4 freecoursetopform-col">
                	<div class="freecoursetopform">
                    	<h4><?php the_field('freecourseform_title'); ?></h4>
                    	<?php echo do_shortcode('[gravityform id="13" title="false" description="false" ajax="true"]') ?>
                	</div>
                </div>
                
                <div class="col-8 freecoursetoptext-col">
                	<div class="freecoursetoptext">
                    	<div class="freecoursetoptext-img">
                        	<img src="<?php the_field('freecoursetext_img'); ?>" alt="">
                        </div>
                        <?php the_field('freecoursetext_text'); ?>
                	</div>
                </div>
                	
            </div>
            
        </div>
    </div>
</section>

<section class="psection psection-freecoursetesti">
	<div class="psection-inner">
    	<div class="container">
        
        	<div class="row">
            	<div class="col-12">
                    <div class="section-title">
                        <div class="st-sprtr">
                            <div class="stsprtr-in"></div>
                        </div>
                        <h2><?php the_field('freecoursetesti_maintitle'); ?></h2>
                    </div>
                </div>
            </div>
        
        	<?php $i = 1; ?>
        	<div class="row freecoursetesti-row">
            <?php if( have_rows('freecourse_testimonials') ):
            // loop through the rows of data
        	while ( have_rows('freecourse_testimonials') ) : the_row(); ?>
            
            	<div class="col-6 freecoursetesti-col">
                	<div class="freecoursetesti">
                    	<?php the_sub_field('freecoursetesti_text'); ?>
                        <div class="freecoursetesti-author">
                        	<p>- <?php the_sub_field('freecoursetesti_author'); ?></p>
                        </div>
                	</div>
                </div>
            <?php if($i % 2 == 0) {echo '</div><div class="row freecoursetesti-row">';} ?>
         	<?php $i++; endwhile; endif; ?>
            </div>
            
        </div>
   	</div>
</section>



                
<?php 
get_footer();
?>
