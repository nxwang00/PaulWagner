<?php
/*Template Name: Group Retreats Costa Rica*/
get_header();
?>


    <div class="sectionlogobg">
        <section class="psection psection-gtrtopvideo psection-gtrcrtopvideo">
            <div class="psection-inner">
                <div class="container">
                
                    <div class="row">
                        <div class="col-12">
                            <div class="gtr-topvideo">
                                <?php the_field('gtrcrtvideo_iframe'); ?>
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
                                <h2><?php the_field('gtrcrbv_maintitle'); ?></h2>
                                <?php the_field('gtrcrbv_maintext'); ?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="gtrlcd-row">
                        <div class="row">
                            <?php if( have_rows('gtrcrbv_columns') ):
                            // loop through the rows of data
                            while ( have_rows('gtrcrbv_columns') ) : the_row(); ?>
                            <div class="col-3">
                                <div class="gtrlcd-col">
                                    <div class="gtrlcdcol-in">
                                        <h2><?php the_sub_field('gtrcrbvcol_title'); ?></h2>
                                        <div class="gtrlcdcol-sprtr"></div>
                                        <?php the_sub_field('gtrcrbvcol_text'); ?>
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
                   
<section class="psection psection-gtrbpaul psection-gtrcrbpaul">
	<div class="psection-inner">
    	<div class="container">
        
        	<div class="row">
            	<div class="col-12">
            		<div class="section-title">
                    	<div class="st-sprtr">
                        	<div class="stsprtr-in"></div>
                        </div>
                        <h2><?php the_field('gtrretreats_maintitle'); ?></h2>
                  	</div>
               	</div>
          	</div>
            
            <div class="gtrbpaul-wrap">
                <div class="row">
                    <div class="col-12">
                    
                    	<?php if( have_rows('gtrretreats_columns') ):
                       	// loop through the rows of data
                       	while ( have_rows('gtrretreats_columns') ) : the_row(); ?>
                    	<div class="gtrbpaul-row">
                        	<div class="gtrbpaulimg-col">
                            	<div class="gtrbpaul-img">
                                	<a href="<?php the_sub_field('gtrretreatscol_ghurl'); ?>">
                                		<img src="<?php the_sub_field('gtrretreatscol_img'); ?>" alt="" />
                                    </a>
                                </div>
                            </div>
                            
                            <div class="gtrbpaultext-col">
                            	<div class="gtrbpaul-text">
                                	<div class="gtrbpaul-tag">
                                    	<span class="gp-cat"><?php the_sub_field('gtrretreatscol_title'); ?></span>
                                        <span class="gp-offer"><?php the_sub_field('gtrretreatscol_subtitle'); ?></span>
                                        <span class="gpoffer-sprtr"></span>
                                        <span class="gp-price">$<?php the_sub_field('gtrretreatscol_price'); ?> <span class="gp-oldprice">$<?php the_sub_field('gtrretreatscol_oldprice'); ?></span></span>
                                    </div>
                            	</div>
                                <?php the_sub_field('gtrretreatscol_text'); ?>
                                <div class="gtrbpaul-spoffer">
                                	<p><?php the_sub_field('gtrretreatscol_sptext'); ?></p>
                                </div>
                                <div class="gtrbpaul-link">
                                	<a href="<?php the_sub_field('gtrretreatscol_ghurl'); ?>"><?php the_sub_field('gtrretreatscol_ghtext'); ?></a>
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

<section class="psection psection-gtrfaq">
	<div class="psection-inner">
    	<div class="container">
        
        	<div class="row">
           		<div class="col-12">
                	<div class="section-title">
                    	<div class="st-sprtr">
                  			<div class="stsprtr-in"></div>
                   		</div>
                    	<h2><?php the_field('gtrcrfaq_maintitle'); ?></h2>
                    </div>
             	</div>
           	</div>
            
            <?php $i = 1; ?>
        	<div class="row gtrfaq-row">
            <?php if( have_rows('gtrcr_faq') ):
            // loop through the rows of data
        	while ( have_rows('gtrcr_faq') ) : the_row(); ?>
        		<div class="col-6">
                	<div class="gtrfaq-col">
                    	<div class="gtrfaqcol-in">
                            <h2><?php the_sub_field('gtrcrfaq_title'); ?></h2>
                            <?php the_sub_field('gtrcrfaq_text'); ?>
                        </div>
                    </div>
            	</div>
           	<?php if($i % 2 == 0) {echo '</div><div class="row gtrfaq-row">';} ?>
         	<?php $i++; endwhile; endif; ?>
            </div>
            
            <div class="row gtrfaqbtn-row">
           		<div class="col-12">
                	<div class="site-btn gtrfaq-btn">
                    	<a href="<?php the_field('gtrcrfaq_btnurl'); ?>"><?php the_field('gtrcrfaq_btntext'); ?></a>
                    </div>
             	</div>
           	</div>
        
        </div>
  	</div>
</section>

<section class="psection psection-gtrvideoposts psection-gtrcrvideoposts">
	<div class="psection-inner">
    	<div class="container">
        
        	<?php $i = 1; ?>
        	<div class="row gtrvpost-row">
            <?php if( have_rows('gtrcr_videoposts') ):
            // loop through the rows of data
        	while ( have_rows('gtrcr_videoposts') ) : the_row(); ?>
            
            	<div class="col-6">
                	<div class="gtrv-post">
                    	<div class="gtrv-iframe">
                        	<?php the_sub_field('gtrcrvideopost_iframe'); ?>
                        </div>
                        <div class="gtrv-text">
                        	<div class="gtrvtext-in">
                                <h2>“<?php the_sub_field('gtrcrvideopost_title'); ?>“</h2>
                                <p><?php the_sub_field('gtrcrvideopost_text'); ?></p>
                                <div class="row gtrv-author">
                                    <div class="gtrva-col">
                                        <div class="gtrva-img">
                                        	<?php  if (the_sub_field('gtrcrvideopost_aimg') == NULL || the_sub_field('gtrcrvideopost_aimg') == ""){ ?>
											<?php }else{ ?>
                                            	<img src="<?php the_sub_field('gtrcrvideopost_aimg'); ?>" alt="" />
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="gtrva-col">
                                        <div class="gtrva-name">
                                            <p><?php the_sub_field('gtrcrvideopost_aname'); ?></p>
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

<section class="psection psection-gtrbuycourse">
	<div class="psection-inner">
    	<div class="container">
        
        	<div class="row">
            	<div class="col-12">
                	<div class="gtrbuycourse">
                    	<div class="gtrbuycourse-in">
                        	<div class="gtrbc-price">
                            	<h2><span>$</span><?php the_field('gtrcr_bcprice'); ?></h2>
                                <div class="gtrbc-belowprice">
                                	<p><?php the_field('gtrcr_bcpricetext'); ?></p>
                                </div>
                                <?php the_field('gtrcr_bctext'); ?>
                                <div class="site-btn gtrbc-btn">
                                	<a href="<?php the_field('gtrcrbc_btnurl'); ?>"><?php the_field('gtrcrbc_btntext'); ?></a>
                                </div>
                                <div class="gtrbc-btmtext">
                                	<p><?php the_field('gtrcrbc_textbelowbtn'); ?></p>
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
