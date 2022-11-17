<?php
/*Template Name: Blended Soul - Videos */
get_header();
?>


<section class="psection psection-pcbsavideo">
	<div class="psection-inner">
    	<div class="container">
        
        	<?php $i = 1; ?>
        	<div class="row pcbsavideo-row">
            	<?php if( have_rows('pcbsavideo') ):
            	// loop through the rows of data
           		while ( have_rows('pcbsavideo') ) : the_row(); ?>
            	<div class="col-4">
                	<div class="pcbsavideo">
                    	<div class="pcbsavideo-in">
                        	<div class="pcbsavideo-iframe">
                        		<?php the_sub_field('pcbsavideo_iframe'); ?>
                            </div>
                            <div class="pcbsavideo-title">
								<h4><?php the_sub_field('pcbsavideo_title'); ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
           
           	<?php if($i % 3 == 0) {echo '</div><div class="row pcbsavideo-row">';} ?>
         	<?php $i++; endwhile; endif; ?>
        	</div>
        
        </div>
 	</div>
</section>


                          
<?php 
get_footer();
?>
