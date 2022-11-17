r<?php
/*Template Name: Personality cards giveaway */
get_header();
?>

<section class="psection psection-pcgtoptext">
	<div class="psection-inner">
    	<div class="container">
        
        	<div class="row">
            	<div class="col-12">
                	<div class="pcgtoptext">
                    	<?php the_field('pcgp_belowbanner'); ?>
                    </div>
                </div>
            </div>
            
       	</div>
    </div>
</section>

<section class="psection psection-pcgfirst">
	<div class="psection-inner">
    	<div class="container">
        
        	<div class="row">
            	<div class="col-8">
                	<div class="pcgfirst-img">
                    	<img src="<?php the_field('pcgpcard1_image'); ?>" alt="" />
                	</div>
                </div>
                <div class="col-4">
                	<div class="pcgfirstcol-text" style='background-image:url("<?php echo site_url(); ?>/wp-content/uploads/bg.svg");'>
                    	<?php the_field('pcgpcard1_text'); ?>
                	</div>
                </div>
            </div>
            
       	</div>
    </div>
</section>

<section class="psection psection-pcgmiddle">
	<div class="psection-inner">
    	<div class="container">
        
        	<div class="row">
            	<div class="col-6">
                	<div class="pcgmiddle-in">
                    	<div class="pcgmiddle-title">
                        	<div class="st-sprtr">
                                <div class="stsprtr-in"></div>
                            </div>
                        	<h2><?php the_field('pcgpcard2_title'); ?></h2>
        				</div>
                    	<div class="pcgmiddle-text">
                        	<p><?php the_field('pcgpcard2_text'); ?></p>
        				</div>
                        <div class="site-btn pcgmiddle-btn">
                        	<a target="_blank" href="<?php the_field('pcgpcard2_btn_url'); ?>"><?php the_field('pcgpcard2_btn_text'); ?></a>
        				</div>
        			</div>
                </div>
                <div class="col-6">
                	<div class="pcgmiddle-img">
                    	<img src="<?php the_field('pcgpcard2_image'); ?>" alt="" />
                    </div>
                </div>
            </div>
            
       	</div>
    </div>
</section>

<section class="psection psection-pcgbtm">
	<div class="psection-inner">
    	<div class="container">
        
        	<div class="row">
            	<div class="col-12">
               		<?php the_field('pcgp_btm_text'); ?>
                </div>
            </div>
            
       	</div>
    </div>
</section>

                          
<?php 
get_footer();
?>
