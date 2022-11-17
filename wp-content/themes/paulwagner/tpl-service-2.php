<?php
/*Template Name: Services Page 2 */
get_header();
?>

<section class="hsection paulsofferring-section">
    <div class="hsection-inner psection-inner">
        <div class="container">
            
        
            
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <div class="st-sprtr">
                            <div class="stsprtr-in"></div>
                        </div>
                        <h2><?php the_field('paulsoffering_maintitle'); ?></h2>
                        <p><?php the_field('description_srv'); ?></p>
                    </div>
                </div>
            </div>
            
            <div class="paulsofferring-wrap">
            
                <?php if( have_rows('pauls_offering') ):
                // loop through the rows of data
                while ( have_rows('pauls_offering') ) : the_row(); ?>
                <div class="row paulsofferring-row">
                    <div class="col-3">
                        <div class="paulsofferring-img">
                            <a href="<?php the_sub_field('learnmore_linkurl'); ?>">
                                <img src="<?php the_sub_field('paulsoffering_image'); ?>" alt="" />
                            </a>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="paulsofferring-text">
                            <h2><a href="<?php the_sub_field('learnmore_linkurl'); ?>"><?php the_sub_field('paulsoffering_title'); ?></a></h2>
                            <?php the_sub_field('paulsoffering_text'); ?>
                            <div class="paulsofferring-btn">
                                <a href="<?php the_sub_field('learnmore_linkurl'); ?>">Learn More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile; endif; ?>
                
            </div>
            
        </div>
    </div>

        <div class="row">
                <div class="col-12">
                    <div class="morepaulabout-btn">
                        <a target="_blank" href="<?php the_field('paulsoffering_btnurl'); ?>"><?php the_field('paulsoffering_btntext'); ?></a>
                    </div>
                </div>
            </div>
</section>

<section class="psection psection-sproduct">
	<div class="psection-inner">
    	<div class="container">
        
        	<div class="row">
            	<div class="col-12">
                    <div class="section-title">
                    	<div class="st-sprtr">
                        	<div class="stsprtr-in"></div>
                        </div>
                        <h2><?php the_field('hsessions_title'); ?></h2>
                        <p><?php the_field('hsessions_text'); ?></p>
                    </div>
                </div>
           	</div>
            
        	<?php /*?><div class="row sproduct-row">
            
            	<?php if( have_rows('service_sessions') ):
            	// loop through the rows of data
           		while ( have_rows('service_sessions') ) : the_row(); ?>
            	<div class="col-4">
                	<div class="sproduct">
                    	<div class="sproduct-in">
                            <div class="sproduct-img">
                                <div class="sproductimg-in">
                                    <a href="<?php the_sub_field('ssession_url'); ?>">
                                        <img src="<?php the_sub_field('ssession_image'); ?>" alt="" />
                                    </a>
                                </div>
                            </div>
                            <div class="sproduct-text">
                                <h2><a href="<?php the_sub_field('ssession_url'); ?>"><?php the_sub_field('ssession_title'); ?></a></h2>
                                <div class="sproduct-cart"><?php the_sub_field('ssession_shortcode'); ?></div>
                            </div>
                        </div>
                   	</div>
        		</div>
                <?php endwhile; endif; ?>
                
            </div><?php */?>
            
            <div class="row serproduct-row">
            	<div class="serproduct-col">
                	<div class="serproductcol-in">
                    	<?php 

                         $service_1 = get_field('service_1');

                         $service_2 = get_field('service_2');

                         $service_3 = get_field('service_3');

                         if($service_1 != NUll){

                            echo do_shortcode('[product id="'.$service_1.'"]'); 
                        }   

                        ?>
                	</div>
                	<div class="serproductcol-in">
                    	<?php 

                        if($service_2 != NUll){
                           echo do_shortcode('[product id="'.$service_2.'"]');  
                        }


                        ?>
                	</div>
                	<div class="serproductcol-in">
                    	<?php 

                    if($service_3 != NUll){
                        echo do_shortcode('[product id="'.$service_3.'"]');  
                    }

                        ?>
                	</div>
                </div>
            </div>
            
    	</div>
   	</div>
</section>

<section class="psection psection-inpcards">
	<div class="psection-inner">
    	<div class="container">
        
        	<div class="page-inpcards">
          		<a href="<?php the_field('inpagepcards_url'); ?>">
               		<img src="<?php the_field('inpage_pcards'); ?>" alt="" />
           		</a>
          	</div>
       
       </div>
   	</div>
</section>

<section class="hsection hsection-paul psection-paul service-paul">
	<div class="hsection-inner psection-inner">
    	<div class="container">

            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <div class="st-sprtr">
                            <div class="stsprtr-in"></div>
                        </div>
                        <h2><?php the_field('title_above_service'); ?></h2>
                        <p><?php the_field('service_description_2'); ?></p>
                    </div>
                </div>
            </div>

        
        	<div class="row">
            	<div class="col-8">
                	<div class="hpaulimg-wrap">
                    	<div class="hpaulimg-in">
                        	<div class="hpaul-img">
                            	<img src="<?php the_field('aservice_image'); ?>" alt="" />
                			</div>
                		</div>
                        <div class="hpaulimg-text">
                       		<p><?php the_field('aservice_caption'); ?></p>
                        </div>
                   	</div>
                </div>
                
                <div class="col-4">
                	<div class="hpaul-text" style='background-image:url("<?php echo site_url(); ?>/wp-content/uploads/2020/10/commongraphic-bg.jpg");'>
                    	<h2><?php the_field('aservice_title'); ?></h2>
                        <?php the_field('aservice_text'); ?>
                        <div class="site-btn hpaul-btn">
                        	<a href="<?php the_field('aservice_btn_url'); ?>"><?php the_field('aservice_btn_text'); ?></a>
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
