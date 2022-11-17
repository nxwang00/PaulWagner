<?php
/*Template Name: The Empath Oath */
get_header();
?>

<section class="psection psection-empathoath">
	<div class="psection-inner">
    	<div class="container">
        	<div class="row">
            	<div class="col-12">
                
                	<div class="empathoath-wrap">
                    	<div class="empathoath-text">
                            <div class="empathoath-logo">
                              	<img src="<?php the_field('empathoathtext_logo'); ?>" alt="" />
                            </div>
                            <div class="empathoath-textin">
                               <h4><?php the_field('empathoath_title'); ?></h4>
                            </div>
                     	</div>
                        
                        <div class="empathoathform-in">
                            <div class="empathoathform">
                            	<div class="empathoathform-text">
                                	<?php the_field('empathoath_formtext'); ?>
                                </div>
                                <div class="empathoathform-form">
                                	<?php echo do_shortcode('[gravityform id="1" title="false" description="false" ajax="false"]'); ?>
                                </div>
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
