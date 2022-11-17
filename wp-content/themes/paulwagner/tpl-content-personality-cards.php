<?php
/*Template Name: Content and Personality cards */
get_header();
?>

<section class="psection psection-ywrp">
	<div class="psection-inner">
    	<div class="container">
        
        	<div class="row">
            	<div class="col-12">
                	<div class="cntpc-text">
                  		<?php the_field('cntpc_text'); ?>
                	</div>
                </div>
            </div>
   		
        </div>
    </div>
</section>

<section class="psection psection-ywrp-pc">
	<div class="psection-inner">
    	<div class="container">
        
        	<div class="cntpc-img">
           		<a href="<?php the_field('pccard_url','option'); ?>">
              		<img src="<?php the_field('pccard_img','option'); ?>" alt="" />
            	</a>
      		</div>
            
       	</div>
    </div>
</section>

                          
<?php 
get_footer();
?>
