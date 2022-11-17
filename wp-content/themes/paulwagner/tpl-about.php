<?php
/*Template Name: About Page */
get_header();
?>

<section class="psection psection-abouttop">
	<div class="psection-inner">
    	<div class="container">
        
        	<div class="row">
            	<div class="col-6">
                	<div class="abouttop-img">
                    	<div class="abouttopimg-in">
                    		<img src="<?php the_field('apt_image'); ?>" alt="" />
                        </div>
                        <div class="abouttopimg-caption">
                        	<p><?php the_field('apt_caption'); ?></p>
                        </div>
                    </div>
                    <div class="abouttop-ques">
                    	<div class="abouttopques-in">
                        	<?php the_field('apt_question'); ?>
                    	</div>
                    </div>
                	
                </div>
                
                <div class="col-6">
                	<div class="abputtop-text">
                    	<?php the_field('apt_text'); ?>
                    </div>
                </div>
            </div>
            
            <div class="row">
            	<div class="col-12">
                	<div class="site-btn abputtop-btn">
                    	<a href="<?php the_field('apt_btn_url'); ?>"><?php the_field('apt_btn_text'); ?></a>
                	</div>
                </div>
           	</div>
            
       	</div>
    </div>
</section>

<section class="hsection hsection-paul psection-paul">
	<div class="hsection-inner psection-inner">
    	<div class="container">
        
        	<div class="row">
            	<div class="col-12">
                    <div class="section-title">
                    	<div class="st-sprtr">
                        	<div class="stsprtr-in"></div>
                        </div>
                        <h2><?php the_field('aboutpaul_heading_title'); ?></h2>
                        <p><?php the_field('aboutpaul_heading_text'); ?></p>
                    </div>
                </div>
           	</div>
        
        	<div class="row">
            	<div class="col-7">
                	<div class="hpaulimg-wrap">
                    	<div class="hpaulimg-in">
                        	<div class="hpaul-img">
                            	<img src="<?php the_field('aboutpaul_img'); ?>" alt="" />
                			</div>
                		</div>
                   	</div>
                </div>
                
                <div class="col-5">
                	<div class="hpaul-text" style='background-image:url("<?php echo site_url(); ?>/wp-content/uploads/2020/10/commongraphic-bg.jpg");'>
                    	<h2><?php the_field('aboutpaul_title'); ?></h2>
                        <?php the_field('aboutpaul_text'); ?>
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
                    	<h2><?php the_field('booknow_title'); ?></h2>
                        <p><?php the_field('booknow_text'); ?></p>
                        <div class="row booksessionsign-row">
                            <div class="booksessionsign-col">
                                <div class="booksession-sign">
                                    <img src="<?php the_field('booknow_sign'); ?>" alt="" />
                                </div>
                            </div>
                            <div class="booksessionbtn-col">
                                <div class="site-btn booksession-btn">
                                    <a href="<?php the_field('booknow_btn_url'); ?>"><?php the_field('booknow_btn_text'); ?></a>
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
