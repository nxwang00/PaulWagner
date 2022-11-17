<?php
/*Template Name: Your download is ready Page */
get_header();
?>

<section class="psection psection-ywrp">
	<div class="psection-inner">
    	<div class="container">
        
        	<div class="row">
            	<div class="col-12">
                	<div class="ywrp-img">
                  		<img src="<?php the_field('ywrp_image'); ?>" alt="" />
                	</div>
                    <div class="site-btn">
                    	<a href="<?php the_field('ywrp_btn_url'); ?>"><?php the_field('ywrp_btn_text'); ?></a>
                    </div>
                </div>
            </div>
            
       	</div>
    </div>
</section>

                          
<?php 
get_footer();
?>
