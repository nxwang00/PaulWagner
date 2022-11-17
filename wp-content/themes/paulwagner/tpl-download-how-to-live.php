<?php
/*Template Name: Download how to live Page */
get_header();
?>

<section class="psection psection-dhtlp">
	<div class="psection-inner">
    	<div class="container">
        	<div class="row">
            	<div class="col-12">
                
                	<div class="dhtlp-cnt">
                    	<?php the_field('dhtlp_cnt1'); ?>
                    </div>
                    
                    <div class="dhtlp-btn">
                    	<div class="site-btn download-btn">
                    		<a target="_blank" href="<?php the_field('dhtlp_btn_url'); ?>"><?php the_field('dhtlp_btn_text'); ?></a>
                        </div>
                    </div>
                    
                    <div class="dhtlp-cnt">
                    	<?php the_field('dhtlp_cnt2'); ?>
                    </div>
                    
                </div>
          	</div>
   		</div>
    </div>
</section>

                         
<?php 
get_footer();
?>
