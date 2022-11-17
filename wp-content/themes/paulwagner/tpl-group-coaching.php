<?php
/*Template Name: Group Coaching*/
get_header();
?>


<div class="sectionlogobg">
	<section class="psection psection-gtrtopvideo psection-gtrcrtopvideo">
   		<div class="psection-inner">
        	<div class="container">
                
        		<div class="row">
               		<div class="col-12">
                    	<div class="gtr-topvideo">
                     		<?php the_field('gcoachvideo_iframe'); ?>
                    	</div>
                        <div class="site-btn gtrtopvideo-btn">
                        	<a href="<?php the_field('gcoachvideo_btnurl'); ?>"><?php the_field('gcoachvideo_btntext'); ?></a>
                        </div>
                 	</div>
           		</div>
                    
        	</div>
     	</div>
  	</section>
        
 	<section class="psection psection-gcoachbvideo">
   		<div class="psection-inner">
      		<div class="container">
                
          		<div class="row">
               		<div class="col-8 gcpaul-text">
                    	<div class="gcpaultext-in">
                        	<div class="gcpaul-sprtr">
                  				<div class="gcpaulsprtr-in"></div>
                   			</div>
                        	<h2><?php the_field('gcoachbv_title'); ?></h2>
                            <?php the_field('gcoachbv_text'); ?>
                        </div>
                	</div>
                    <div class="col-4 gcpaul-img">
                    	<div class="gcpaulimg-in">
                        	<img src="<?php the_field('gcoachbv_img'); ?>" alt="" />
                		</div>
                	</div>
           		</div>
                    
      		</div>
    	</div>
 	</section>
</div>
                   
<section class="hsection hsection-paul psection-gtrpaul psection-gcaochpaul">
	<div class="hsection-inner">
		<div class="container">
            
            <div class="row">
                <div class="col-7">
                    <div class="hpaulimg-wrap">
                        <div class="hpaulimg-in">
                            <div class="hpaul-img">
                                <img src="<?php the_field('gcoachbpaul_img'); ?>" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
                        
                <div class="col-5">
                    <div class="hpaul-text" style='background-image:url("<?php echo get_stylesheet_directory_uri(); ?>/assets/images/clrfulbg.jpg);'>
                        <h2><?php the_field('gcoachbpaul_title'); ?></h2>
                        <?php the_field('gcoachbpaul_text'); ?>
                        
                    	<div class="gtrpaul-tags">
                        	<?php if( have_rows('gcoachbpaul_tags') ):
                    		// loop through the rows of data
                    		while ( have_rows('gcoachbpaul_tags') ) : the_row(); ?>
                    		<a href="<?php the_sub_field('gcoachbpaul_tagllink'); ?>">#<?php the_sub_field('gcoachbpaul_tagname'); ?></a>
                            <?php endwhile; endif; ?>
                    	</div>
                	</div>
            	</div>
        
   			</div>
            
            <div class="row gcaochpaulbtn-row">
            	<div class="col-12">
                    <div class="site-btn gcaochpaulrow-btn">
                        <a href="<?php the_field('gcoachbpaul_btnurl'); ?>"><?php the_field('gcoachbpaul_btntext'); ?></a>
                    </div>
                </div>
          	</div>
                        
		</div>
	</div>
</section> 

<section class="psection psection-gcoachabovefaq">
	<div class="psection-inner">
    	<div class="container">
        
        	<div class="row">
           		<div class="col-12">
                	<div class="section-title">
                    	<div class="st-sprtr">
                  			<div class="stsprtr-in"></div>
                   		</div>
                    	<h2><?php the_field('gcoachabovefaq_maintitle'); ?></h2>
                    </div>
             	</div>
           	</div>
            
            <?php $i = 1; ?>
            <div class="row gcoachafaq-row">
          	<?php if( have_rows('gcoachabovefaq_columns') ):
            // loop through the rows of data
        	while ( have_rows('gcoachabovefaq_columns') ) : the_row(); ?>
            
           		<div class="col-4 gcoachafaq-col">
                	<div class="gcoachafaqcol-in">
                    	<h2><?php the_sub_field('gcoachabovefaqcol_title'); ?></h2>
                        <?php the_sub_field('gcoachabovefaqcol_text'); ?>
                    </div>
             	</div>
                
           	<?php if($i % 3 == 0) {echo '</div><div class="row gcoachafaq-row">';} ?>
         	<?php $i++; endwhile; endif; ?>
           	</div>
            
            <div class="row gcoachafaqbtn-row">
            	<div class="col-12">
                	<div class="site-btn gcoachafaq-btn">
                    	<a href="<?php the_field('gcoachabovefaq_btnurl'); ?>"><?php the_field('gcoachabovefaq_btntext'); ?></a>
                    </div>
                </div>
            </div>
       
       </div>
  	</div>
</section>

<section class="psection psection-gtrfaq psection-gcoachfaq">
	<div class="psection-inner">
    	<div class="container">
        
        	<div class="row">
           		<div class="col-12">
                	<div class="section-title">
                    	<div class="st-sprtr">
                  			<div class="stsprtr-in"></div>
                   		</div>
                    	<h2><?php the_field('gcoachfaq_maintitle'); ?></h2>
                    </div>
             	</div>
           	</div>
            
            <?php $i = 1; ?>
        	<div class="row gtrfaq-row">
            <?php if( have_rows('gcoachfaq_faqs') ):
            // loop through the rows of data
        	while ( have_rows('gcoachfaq_faqs') ) : the_row(); ?>
        		<div class="col-6">
                	<div class="gtrfaq-col">
                    	<div class="gtrfaqcol-in">
                            <h2><?php the_sub_field('gcoachfaq_title'); ?></h2>
                            <?php the_sub_field('gcoachfaq_text'); ?>
                        </div>
                    </div>
            	</div>
           	<?php if($i % 2 == 0) {echo '</div><div class="row gtrfaq-row">';} ?>
         	<?php $i++; endwhile; endif; ?>
            </div>
            
            <div class="row gtrfaqbtn-row">
           		<div class="col-12">
                	<div class="site-btn gtrfaq-btn">
                    	<a href="<?php the_field('gcoachfaq_btnurl'); ?>"><?php the_field('gcoachfaq_btntext'); ?></a>
                    </div>
             	</div>
           	</div>
        
        </div>
  	</div>
</section>

<section class="psection psection-gtrbuycourse">
	<div class="psection-inner">
    	<div class="container">
        
        	<div class="row">
            	<div class="col-12">
                	<div class="gtrbuycourse">
                    	<div class="gtrbuycourse-in">
                        	<div class="gtrbc-price">
                            	<h2><span>$</span><?php the_field('group_coaching_price'); ?></h2>
                                <div class="gtrbc-belowprice">
                                	<p><?php the_field('gcoach_bcpricetext'); ?></p>
                                </div>
                                <?php the_field('gcoach_bctext'); ?>
                                <div class="site-btn gtrbc-btn">
                                	<a href="<?php the_field('gcoach_btnurl'); ?>"><?php the_field('gcoach_btntext'); ?></a>
                                </div>
                                <div class="gtrbc-btmtext">
                                	<p><?php the_field('gcoach_textbelowbtn'); ?></p>
                                </div>
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
