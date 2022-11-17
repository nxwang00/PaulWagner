<?php
/*Template Name: Group Retreats */
get_header();
?>

<div class="sectionbg-curve1">
    <div class="sectionlogobg">
        <section class="psection psection-gtrtopvideo">
            <div class="psection-inner">
                <div class="container">
                
                    <div class="row">
                        <div class="col-12">
                            <div class="gtrtlogo">
                                <div class="gtrtlogoin">
                                    <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/plogo.png" alt="" />
                                </div>
                            </div>
                            
                            <div class="gtr-topvideo">
                                <?php the_field('gtrtvideo_iframe'); ?>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
        
        <section class="psection psection-gtrlcd">
            <div class="psection-inner">
                <div class="container">
                
                    <div class="row">
                        <div class="col-12">
                            <div class="section-title">
                                <div class="st-sprtr">
                                    <div class="stsprtr-in"></div>
                                </div>
                                <h2><?php the_field('gtrbv_maintitle'); ?></h2>
                                <?php the_field('gtrbv_maintext'); ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="gtrlcd-row">
                        <div class="row">
                            <?php if( have_rows('gtrbv_columns') ):
                            // loop through the rows of data
                            while ( have_rows('gtrbv_columns') ) : the_row(); ?>
                            <div class="col-3">
                                <div class="gtrlcd-col">
                                    <div class="gtrlcdcol-in">
                                        <h2><?php the_sub_field('gtrbvcol_title'); ?></h2>
                                        <div class="gtrlcdcol-sprtr"></div>
                                        <?php the_sub_field('gtrbvcol_text'); ?>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile; endif; ?>
                        </div>
                    </div>
                    
                </div>
            </div>
        </section>
    </div>
    
    <section class="hsection hsection-paul psection-gtrpaul">
        <div class="hsection-inner">
            <div class="container">
            
                <div class="row">
                    <div class="col-7">
                        <div class="hpaulimg-wrap">
                            <div class="hpaulimg-in">
                                <div class="hpaul-img">
                                    <img src="<?php the_field('gtrpaul_paulimg'); ?>" alt="" />
                                </div>
                            </div>
                            <div class="hpaulimg-text">
                                <p><?php the_field('gtrpaul_paulimgcaption'); ?></p>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="col-5">
                        <div class="hpaul-text" style='background-image:url("<?php echo get_stylesheet_directory_uri(); ?>/assets/images/darkleave.jpg");'>
                            <div class="hpaul-tagtxt"><p><?php the_field('gtrpaul_subtitle'); ?></p></div>
                            <h2><?php the_field('gtrpaul_title'); ?></h2>
                            <div class="hpaultext-sprtr">
                                <div class="hptsprtr"></div>
                            </div>
                            <?php the_field('gtrpaul_text'); ?>
                            <div class="site-btn hpaul-btn">
                                <a href="<?php the_field('gtrpaul_btn_url'); ?>"><?php the_field('gtrpaul_btn_text'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
</div>

<section class="psection psection-gtrbpaul">
	<div class="psection-inner">
    	<div class="container">
        
        	<div class="row">
            	<div class="col-12">
            		<div class="section-title">
                    	<div class="st-sprtr">
                        	<div class="stsprtr-in"></div>
                        </div>
                        <h2><?php the_field('gtrbelowpaul_maintitle'); ?></h2>
                  	</div>
               	</div>
          	</div>
            
            <div class="gtrbpaul-wrap">
                <div class="row">
                    <div class="col-12">
                    
                    	<?php if( have_rows('gtrbelowpaul_columns') ):
                       	// loop through the rows of data
                       	while ( have_rows('gtrbelowpaul_columns') ) : the_row(); ?>
                    	<div class="gtrbpaul-row">
                        	<div class="gtrbpaulimg-col">
                            	<div class="gtrbpaul-img">
                                	<a href="<?php the_sub_field('gtrbelowpaulcol_url'); ?>">
                                		<img src="<?php the_sub_field('gtrbelowpaulcol_image'); ?>" alt="" />
                                    </a>
                                </div>
                            </div>
                            
                            <div class="gtrbpaultext-col">
                            	<div class="gtrbpaul-text">
                                	<div class="gtrbpaul-tag">
                                    	<span class="gp-cat"><?php the_sub_field('gtrbelowpaulcol_title'); ?></span>
                                        <span class="gp-offer"><?php the_sub_field('gtrbelowpaulcol_subtitle'); ?></span>
                                        <span class="gpoffer-sprtr"></span>
                                        <span class="gp-price">$<?php the_sub_field('gtrbelowpaulcol_price'); ?> <span class="gp-oldprice">$<?php the_sub_field('gtrbelowpaulcol_oldprice'); ?></span></span>
                                    </div>
                            	</div>
                                <?php the_sub_field('gtrbelowpaulcol_text'); ?>
                                <div class="gtrbpaul-spoffer">
                                	<p><?php the_sub_field('gtrbelowpaulcol_sptext'); ?></p>
                                </div>
                                <div class="gtrbpaul-link">
                                	<a href="<?php the_sub_field('gtrbelowpaulcol_url'); ?>"><?php the_sub_field('gtrbelowpaulcol_ghtext'); ?></a>
                                </div>
                            </div>
                       	</div>
                        <?php endwhile; endif; ?>
                        
                    </div>
                </div>
            </div>
            
       	</div>
   	</div>
</section> 

<section class="psection psection-gtrvideoposts">
	<div class="psection-inner">
    	<div class="container">
        
        	<?php $i = 1; ?>
        	<div class="row gtrvpost-row">
            <?php if( have_rows('gtr_videoposts') ):
            // loop through the rows of data
        	while ( have_rows('gtr_videoposts') ) : the_row(); ?>
            
            	<div class="col-6">
                	<div class="gtrv-post">
                    	<div class="gtrv-iframe">
                        	<?php the_sub_field('gtrvideopost_iframe'); ?>
                        </div>
                        <div class="gtrv-text">
                        	<div class="gtrvtext-in">
                                <h2>“<?php the_sub_field('gtrvideopost_title'); ?>“</h2>
                                <p><?php the_sub_field('gtrvideopost_text'); ?></p>
                                <div class="row gtrv-author">
                                    <div class="gtrva-col">
                                        <div class="gtrva-img">
                                        	<?php  if (the_sub_field('gtrvideopost_aimg') == NULL || the_sub_field('gtrvideopost_aimg') == ""){ ?>
											<?php }else{ ?>
                                            	<img src="<?php the_sub_field('gtrvideopost_aimg'); ?>" alt="" />
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="gtrva-col">
                                        <div class="gtrva-name">
                                            <p><?php the_sub_field('gtrvideopost_aname'); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
           	<?php if($i % 2 == 0) {echo '</div><div class="row gtrvpost-row">';} ?>
         	<?php $i++; endwhile; endif; ?>
            </div>
       
       	</div>
   	</div>
</section>

<section class="psection psection-gtrbtmvideo">
	<div class="psection-inner">
    	<div class="container">
        
        	<div class="row">
            	<div class="col-12">
                	<div class="gtrbtmvideo">
                    	<?php the_field('gtrbtm_video'); ?>
                    </div>
                </div>   
           	</div>
            
       	</div>
   	</div>
</section>

                          
<?php 
get_footer();
?>
