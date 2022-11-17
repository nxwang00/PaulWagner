<?php
/*Template Name: 5 Questions Answered By Paul Page */
get_header();
?>

<section class="psection psection-contactpage-pc psection-paulquesans">
	<div class="psection-inner">
    	<div class="container">
        
        	<div class="contactpage-pc">
          		<a href="<?php the_field('qabp_url'); ?>">
               		<img src="<?php the_field('qabp_img'); ?>" alt="" />
           		</a>
          	</div>
            
       	</div>
    </div>
</section>

<section class="psection psection-pqaform">
	<div class="psection-inner">
    	<div class="container">
        	<div class="row">
            	<div class="col-12">
                
                	<div class="pqaform-wrap">
                    	<div class="pqaform-in">
                            <div class="pqaform-text">
                                <p>If you’ve paid for your 5 Questions By Email, please continue. Paul will get back to you personally, usually within 48 hours. Thank you! Check out Paul’s course <a href="https://paulwagner.com/course">HERE</a>.</p>
                            </div>
                        
                            <div class="pqaform">
                                <?php echo do_shortcode('[gravityform id="11" title="false" description="true"]'); ?>
                            </div>
                            
                            <div class="pqaform-text">
                                <p>Check out <a href="#">The Personality Cards</a> or <a href="#">Schedule A One-On-One Session With Paul</a>.</p>
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
