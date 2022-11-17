<?php
/*Template Name: Shop Page */
get_header();
?>

<section class="psection psection-shoptop">
	<div class="psection-inner">
    	<div class="container">
        
        	<div class="row">
            	<div class="col-12">
                	<div class="shoptop-title">
                		<?php the_field('shoppage_title'); ?>
                    </div>
                    <div class="shoptop-text">
                		<?php the_field('shoppage_text'); ?>
                    </div>
                </div>
           	</div>
            
       	</div>
   	</div>
</section>

<section class="psection psection-shopproduct">
	<div class="psection-inner">
    	<div class="container">
        
        	<div class="row">
            	<div class="col-12">
                	<?php the_field('shp_products'); ?>
                </div>
           	</div>
            
       	</div>
   	</div>
</section>
                
              
<?php 
get_footer();
?>
