<?php
/*Template Name: Blended Soul - FAQ */
get_header();
?>



<section class="psection psection-bsapdaq">
	<div class="psection-inner">
    	<div class="container">
        
        	<div class="row">
            	<div class="col-12">
                	<div class="bsapfaq-top bsapfaqcmn-text">
                    	<?php the_field('bsapfaq_top'); ?>
                    </div>
                    
                	<?php if( have_rows('bsap_faq') ):
            		// loop through the rows of data
           			while ( have_rows('bsap_faq') ) : the_row(); ?>
                	<div class="bsap-faq">
                    	<div class="bsapfaq-in">
                        	<div class="bsapfaqin-title">
                        		<h5><?php the_sub_field('bsapfaq_title'); ?></h5>
                            </div>
							<?php the_sub_field('bsapfaq_text'); ?>
                        </div>
                    </div>
                    <?php endwhile; endif; ?>
                
                </div>
        	</div>
        
        </div>
 	</div>
</section>


<section class="psection psection-bsapfaqbtm">
	<div class="psection-inner">
    	<div class="container">
        
        	<div class="bsapfaq-btm bsapfaqcmn-text">
          		<?php the_field('bsapfaq_btm'); ?>
          	</div>
            
       	</div>
    </div>
</section>

                          
<?php 
get_footer();
?>
