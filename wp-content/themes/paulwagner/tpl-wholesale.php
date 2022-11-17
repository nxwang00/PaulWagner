<?php
/*Template Name: Wholesale Page */
get_header();
?>

<section class="psection psection-wholesaletitle">
	<div class="psection-inner">
    	<div class="container">
        
        	<div class="row">
            	<div class="col-12">
                	<div class="section-title">
                  		<h2><?php the_field('wholesale_title'); ?></h2>
                      	<p><?php the_field('wholesaletitle_text'); ?></p>
                	</div>
                </div>
            </div>
            
            <div class="row">
            	<div class="col-12">
                	<div class="wholesale-product">
                  		<?php the_field('wholesale_products'); ?>
                	</div>
                </div>
            </div>
            
       	</div>
    </div>
</section>

                          
<?php 
get_footer();
?>
