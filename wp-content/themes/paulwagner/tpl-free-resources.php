<?php
/*Template Name: Free Resources Page */
get_header();
?>


<section class="psection psection-fscols psection-fscolstop">
	<div class="psection-inner">
    	<div class="container">
        
        	<?php $i = 1; ?>
        	<div class="row fscols-row">
            
            <?php if( have_rows('freeresources_cnt1') ):
            // loop through the rows of data
        	while ( have_rows('freeresources_cnt1') ) : the_row(); ?>
            
            	<div class="col-6 frscol">
                	<div class="fscolimg-in">
                    	<div class="fscol-img">
                        	<a href="<?php the_sub_field('frs1_btn_url'); ?>"><img src="<?php the_sub_field('frs1_image'); ?>" alt="" /></a>
        				</div>
        			</div>
                    <div class="fscol-title">
                    	<div class="st-sprtr">
                       		<div class="stsprtr-in"></div>
                       	</div>
                       	<h2><?php the_sub_field('frs1_title'); ?></h2>
        			</div>
                        
                   	<div class="fscol-text">
                    	<?php the_sub_field('frs1_text'); ?>
        			</div>

                <?php if($i !=1 ){ ?>

                   	<div  class="site-btn fscol-btn">
                    	<a href="<?php the_sub_field('frs1_btn_url'); ?>"><?php the_sub_field('frs1_btn_text'); ?></a>
        			      </div>
                 <?php }else{?>

                    <div class="fscol-andiosbtn">
                    	<div class="andiosbtn-btn">
                        	<a target="_blank" href="https://apps.apple.com/us/app/the-me-app/id1139224451"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/ios.svg" alt="" /></a>
                            <a target="_blank" href="https://play.google.com/store/apps/details?id=tv.creativelab.meapp"><img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/android.svg" alt="" /></a>
                        </div>
                    </div> 
                 
                 <?php }?>   
        		</div>
                
            <?php if($i % 2 == 0) {echo '</div><div class="row fscols-row">';} ?>
         	<?php $i++; endwhile; endif; ?>
        	</div>
        
    	</div>
  	</div>
</section>
            
<section class="psection psection-fscols">
	<div class="psection-inner">
    	<div class="container">
        
        	<?php $i = 1; ?>
        	<div class="row fscols-row">
            
            <?php if( have_rows('freeresources_cnt2') ):
            // loop through the rows of data
        	while ( have_rows('freeresources_cnt2') ) : the_row(); ?>
            
            	<div class="col-6 frscol">
                	<div class="fscolimg-in">
                    	<div class="fscol-img">
                        	<a href="<?php the_sub_field('frs2_btn_url'); ?>"><img src="<?php the_sub_field('frs2_image'); ?>" alt="" /></a>
        				</div>
        			</div>
                    <div class="fscol-title">
                    	<div class="st-sprtr">
                       		<div class="stsprtr-in"></div>
                       	</div>
                       	<h2><?php the_sub_field('frs2_title'); ?></h2>
        			</div>
                        
                   	<div class="fscol-text">
                    	<?php the_sub_field('frs2_text'); ?>
        			</div>
                   	<div class="site-btn fscol-btn">
                    	<a href="<?php the_sub_field('frs2_btn_url'); ?>"><?php the_sub_field('frs2_btn_text'); ?></a>
        			</div>
        		</div>
                
            <?php if($i % 2 == 0) {echo '</div><div class="row fscols-row">';} ?>
         	<?php $i++; endwhile; endif; ?>
        	</div>
        
    	</div>
  	</div>
</section>

<section class="psection psection-fsys">
	<div class="psection-inner">
    	<div class="container">
               
            <div class="row fsys-row">
            	<div class="col-12">
                	<div class="fsys-img">
                        <a target="_blank" href="<?php the_field('frs_bannerlink'); ?>">
                            <img src="<?php the_field('frs_bannerimg'); ?>" alt="" />
                        </a>
                    </div>
                </div>
            </div>
            
     	</div>
  	</div>
</section>
                
                          
<?php 
get_footer();
?>
