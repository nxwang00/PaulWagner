<?php
/*Template Name: Free Couese Page - New*/
get_header();
?>


<section class="psection psection-frstiframe">
	<div class="psection-inner">
    	<div class="container">
        	<div class="row frstiframe-row">
            	<div class="col-12 frstiframe-col">
                	<div class="frstiframe">
                    	<?php the_field('frst_iframe'); ?>
                    </div>
                </div>
            </div>
        </div>
   	</div>
</section>

<section class="psection psection-fscols psection-fscolstop psection-fscolstopnew">
	<div class="psection-inner">
    	<div class="container">
        
        	<div class="row">
            	<div class="col-12">
                    <div class="section-title">
                    	<div class="st-sprtr">
                        	<div class="stsprtr-in"></div>
                        </div>
                        <h2><?php the_field('freeresourcesncnt_title'); ?></h2>
                     </div>
                </div>
           	</div>
        
        	<?php $i = 1; ?>
        	<div class="row fscols-row">
            
            <?php if( have_rows('freeresourcesn_cnt') ):
            // loop through the rows of data
        	while ( have_rows('freeresourcesn_cnt') ) : the_row(); ?>
            
            	<div class="col-6 frscol">
                	<div class="fscolimg-in">
                    	<div class="fscol-img">
                        	<a href="<?php the_sub_field('frsn_btn_url'); ?>"><img src="<?php the_sub_field('frsn_image'); ?>" alt="" /></a>
        				</div>
        			</div>
                    <div class="fscol-title">
                    	<div class="st-sprtr">
                       		<div class="stsprtr-in"></div>
                       	</div>
                       	<h2><?php the_sub_field('frsn_title'); ?></h2>
        			</div>
                        
                   	<div class="fscol-price">
                    	<span>$ <?php the_sub_field('frsn_price'); ?></span>
        			</div>

                	<div  class="site-btn fscol-btn">
                    	<a href="<?php the_sub_field('frsn_btn_url'); ?>"><?php the_sub_field('frsn_btn_text'); ?></a>
        			</div>
                </div>
                
            <?php if($i % 2 == 0) {echo '</div><div class="row fscols-row">';} ?>
         	<?php $i++; endwhile; endif; ?>
        	</div>
        
    	</div>
  	</div>
</section>
            
<section class="psection psection-fsys psection-fsysnew">
	<div class="psection-inner">
    	<div class="container">
               
            <div class="row fsys-row">
            	<div class="col-12">
                	<div class="fsys-img">
                        <a target="_blank" href="<?php the_field('frsn_bannerlink'); ?>">
                            <img src="<?php the_field('frsn_bannerimg'); ?>" alt="" />
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
