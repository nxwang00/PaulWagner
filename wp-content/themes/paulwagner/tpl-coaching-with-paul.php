<?php
/*Template Name: Coaching With Paul Page */
get_header();
?>

<section class="psection psection-fst">
	<div class="psection-inner">
    	<div class="container">
        
        	<div class="row">
            	<div class="col-12">
                	<div class="fst-wrap dark-section">
                    	<a href="#">
                            <div class="fst-row">
                                <div class="fst-col fstcol-img">
                                    <div class="fstcol-in">
                                        <div class="fstpaul-img">
                                            <img src="<?php echo site_url(); ?>/wp-content/uploads/paulimage.svg" alt="" />
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="fst-col fstcol-text">
                                    <div class="fstcol-in">
                                        <h2>Book an intuitive <br>Session with Paul</h2>
                                    </div>
                                </div>
                                
                                <div class="fst-col fstcol-sign">
                                    <div class="fstcol-in">
                                        <div class="fstpaul-sign">
                                            <img src="<?php echo site_url(); ?>/wp-content/uploads/signature.svg" alt="" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                	</div>
                </div>
            </div>
          
       	</div>
   	</div>
</section>

<section class="psection psection-cwptop">
	<div class="psection-inner">
    	<div class="container">
        
        	<div class="row">
            	<div class="col-12">
                
                	<div class="cwptop-title">
                    	<h3><strong><?php the_field('cwpp_title'); ?></strong></h3>
        			</div>
                    <div class="cwptop-text">
                    	<?php the_field('cwpp_text'); ?>
                    </div>
                    
                </div>
        	</div>
        
        </div>
 	</div>
</section>

<div class="postauthor-wrap cwpauthor-wrap">
	<div class="container">
        <div class="postauthor-section">
        	<div class="postauthor-inner">
           		<div class="postauthor-row">
             
             		<div class="postauthor-col postauthorcol-img">
                 		<div class="postauthor-img">
                       		<img src="<?php the_field('cwpauthor_image'); ?>" alt="" />
                		</div>
               		</div>
                                
                  	<div class="postauthor-col postauthorcol-text">
               			<div class="postauthor-text">
                        	<?php the_field('cwpauthor_text'); ?>
                            
                            <div class="site-btn">
                            	<a href="<?php the_field('cwpauthor_btn_url'); ?>"><?php the_field('cwpauthor_btn_text'); ?></a>
                            </div>
                		</div>
              		</div>
                                
             	</div>
         	</div>
    	</div>
   	</div>
</div>       

<section class="hsection hsection-paul psection-paul psection-cwpaul">
	<div class="hsection-inner psection-inner">
    	<div class="container">
        
        	<div class="row">
            	<div class="col-12">
                    <div class="section-title">
                    	<div class="st-sprtr">
                        	<div class="stsprtr-in"></div>
                        </div>
                        <h2><?php the_field('cwpabout_htitle'); ?></h2>
                        <p><?php the_field('cwpabout_htext'); ?></p>
                    </div>
                </div>
           	</div>
        
        	<div class="row">
            	<div class="col-7">
                	<div class="hpaulimg-wrap">
                    	<div class="hpaulimg-in">
                        	<div class="hpaul-img">
                            	<img src="<?php the_field('cwpabout_image'); ?>" alt="" />
                			</div>
                		</div>
                   	</div>
                </div>
                
                <div class="col-5">
                	<div class="hpaul-text" style='background-image:url("<?php echo site_url(); ?>/wp-content/uploads/2020/10/commongraphic-bg.jpg");'>
                    	<?php the_field('cwpabout_text'); ?>
                    </div>
                </div>
           	</div>
            
        </div>
    </div>
</section>

<section class="psection psection-booksession" style='background-image:url("<?php echo site_url(); ?>/wp-content/uploads/promise.svg");'>
	<div class="psection-inner">
    	<div class="container">
        
        	<div class="row">
            	<div class="col-12">
                	<div class="booksession">
                    	<h2><?php the_field('cwpbook_title'); ?></h2>
                        <p><?php the_field('cwpbook_text'); ?></p>
                        <div class="row booksessionsign-row">
                            <div class="booksessionsign-col">
                                <div class="booksession-sign">
                                    <img src="<?php the_field('cwpbook_sign'); ?>" alt="" />
                                </div>
                            </div>
                            <div class="booksessionbtn-col">
                                <div class="site-btn booksession-btn">
                                    <a href="<?php the_field('cwpbook_btn_url'); ?>"><?php the_field('cwpbook_btn_text'); ?></a>
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
