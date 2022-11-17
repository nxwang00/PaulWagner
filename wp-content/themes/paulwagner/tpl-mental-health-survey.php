<?php
/*Template Name: Mental Health Survey Page */
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
                                <?php the_field('mhsform_text_1'); ?>
                            </div>
                     	</div>
                        
                        <div class="mhsform-in">
                            <div class="mhsform">
                                <?php echo do_shortcode('[gravityform id="10" title="false" description="false" ajax="false"]'); ?>
                            </div>
                        </div>
                    </div>
                    
                </div>
          	</div>
   		</div>
    </div>
</section>

<section class="psection psection-hlpresource">
	<div class="psection-inner">
    	<div class="container">
        	<div class="row">
            	<div class="col-12">
                
                	<div class="hlpresource-wrap">
                    	<div class="hlpresource">
                        	<?php the_field('mhsform_text_2'); ?>
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
