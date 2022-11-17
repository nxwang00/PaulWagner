<?php
/*Template Name: Contact Page */
get_header();
?>

<section class="psection psection-contactpageform">
	<div class="psection-inner">
    	<div class="container">
        
        	<div class="row">
            	<div class="col-12">
                	<div class="contactpageform">
                    	<div class="contactpageform-in">
                            <div class="section-title">
                                <h2><?php the_field('cf_title'); ?></h2>
                                <p><?php the_field('cf_text'); ?></p>
                            </div>
                            <?php echo do_shortcode('[gravityform id="5" title="false" description="false" ajax="true"]') ?>
                    	</div>
                    </div>
                </div>
            </div>
            
       	</div>
    </div>
</section>

<section class="psection psection-contactpage-pc">
	<div class="psection-inner">
    	<div class="container">
        
        	<div class="contactpage-pc">
          		<a href="<?php the_field('cpc_img_url'); ?>">
               		<img src="<?php the_field('cpc_image'); ?>" alt="" />
           		</a>
          	</div>
            
       	</div>
    </div>
</section>

                          
<?php 
get_footer();
?>
