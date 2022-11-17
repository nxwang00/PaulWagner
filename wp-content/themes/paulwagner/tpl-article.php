<?php
/*Template Name: Articles Page */
get_header();
?>

<section class="psection psection-articlepage">
	<div class="psection-inner">
    	<div class="container">
        
        	<div class="row">
            	<div class="col-12">
                	<div class="apf-posts">
                    	<?php echo do_shortcode('[searchandfilter fields="search,post_types" post_types="post"]'); ?>
                		<?php echo do_shortcode('[pgaf_post_filter exclude_cat="47,48,49"]'); ?>
                    </div>
                </div>
           	</div>
            
       	</div>
   	</div>
</section>
                     
                
<?php 
get_footer();
?>
