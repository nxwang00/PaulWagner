<?php
/*Template Name: Home Page 2 */
get_header();
?>

<section class="hsection hsection-banner dark-section" style='background-image:url("<?php the_field('hbanner_bg'); ?>");'>
	<div class="hsection-inner">
    	<div class="container">
        	<div class="row">
            
            	<div class="col-6 hbanner-text">
                	<div class="hbannercol-in">
                    	<h1><?php the_field('hbanner_title'); ?></h1>
                        <div class="hbanner-btn">
                        	<a href="<?php the_field('hbannerbutton_url'); ?>"><?php the_field('hbannerbutton_text'); ?></a>
                        </div>
                    </div>
                </div>
                
                <div class="col-6 hbanner-video">
                	<div class="hbannercol-in">
                    
                    	<div class="hbannervideo">
                    		<?php the_field('hbanner_video'); ?>
                        </div>
                        
                    	<div class="social-menus">
                        	<ul>
                          		<?php /*?><?php if (get_field('facebook_url', 'option') == NULL || get_field('facebook_url', 'option') == ""){ ?>
                            	<?php }else{ ?>
                                    <li>
                                        <a target="_blank" href="<?php the_field('facebook_url', 'option'); ?>">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                               	<?php } ?><?php */?>
                                
                                <?php if (get_field('instagram_url', 'option') == NULL || get_field('instagram_url', 'option') == ""){ ?>
                            	<?php }else{ ?>
                                	<li>
                                   		<a target="_blank" href="<?php the_field('instagram_url', 'option'); ?>">
                                      		<i class="fa fa-instagram"></i>
                                		</a>
                                  	</li>
                              	<?php } ?>
                                
                                <?php if (get_field('youtube_url', 'option') == NULL || get_field('youtube_url', 'option') == ""){ ?>
                              	<?php }else{ ?>
                              		<li>
                                   		<a target="_blank" href="<?php the_field('youtube_url', 'option'); ?>">
                                       		<i class="fa fa-youtube-play"></i>
                                      	</a>
                                 	</li>
                              	<?php } ?>
                                
                                <?php /*?><?php if (get_field('linkedin_url', 'option') == NULL || get_field('linkedin_url', 'option') == ""){ ?>
                              	<?php }else{ ?>
                              		<li>
                                   		<a target="_blank" href="<?php the_field('linkedin_url', 'option'); ?>">
                                       		<i class="fa fa-linkedin"></i>
                                      	</a>
                                 	</li>
                              	<?php } ?>
                                           
                             	<?php if (get_field('twitter_url', 'option') == NULL || get_field('twitter_url', 'option') == ""){ ?>
                           		<?php }else{ ?>
                                	<li>
                                   		<a target="_blank" href="<?php the_field('twitter_url', 'option'); ?>">
                                        	<i class="fa fa-twitter"></i>
                                 		</a>
                             		</li>
                              	<?php } ?><?php */?>
                                
                         	</ul>
                    	</div>
                        
                    </div>
                </div>
                
    		</div>
    	</div>
    </div>
</section>

<section class="psection psection-bookform">
	<div class="psection-inner">
    	<div class="container">
        
        	<div class="row">
            	<div class="col-12">
                    <div class="bookform">
                    	<div class="bookform-in dark-section">
                        	<div class="bookform-img">
                            	<div class="bookformimg-in">
                            		<img src="<?php the_field('dmfr_book_image'); ?>" alt="">
                                </div>
                            </div>
                            <div class="bookform-text">
                            	<p><?php the_field('dmfr_text'); ?></p>
                                <h2><?php the_field('dmfr_title'); ?></h2>
                            </div>
                            <div class="bookform-feilds">
                            	<div class="getbookbtn-in">
                                	<div class="getbook-btn">
                                    	<a class="popmake-12948" href="javascript:void(0)">
                                        	<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/getbook-btn.png" alt="">
                                        </a>
                                    </div>
                                </div>
                                
                            	<?php echo do_shortcode('[gravityform id="4" title="false" description="false" ajax="true"]') ?>
                            </div>
                    	</div>
                    </div>
                </div>
           	</div>
            
        </div>
   	</div>
</section>

<div class="hsproduct-curve">
    <section class="hsection hsection-product">
        <div class="hsection-inner">
            <div class="container">
            	
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <div class="st-sprtr">
                                <div class="stsprtr-in"></div>
                            </div>
                            <h2><?php the_field('hproducts_maintitle'); ?></h2>
                         </div>
                    </div>
                </div>
            
                <div class="row">
                	<?php if( have_rows('hpro_service') ):
                    // loop through the rows of data
                    while ( have_rows('hpro_service') ) : the_row(); ?>
                    <div class="col-4">
                        <div class="hproduct">
                            <div class="hproduct-in">
                                <div class="hproduct-title">
                                    <h2><?php the_sub_field('hproservice_title'); ?></h2>
                                    <p><?php the_sub_field('hproservice_text'); ?></p>
                                </div>
                                <div class="hproduct-img">
                                    <div class="hproductimg-in">
                                        <a href="<?php the_sub_field('hproduct_service_url'); ?>">
                                            <img src="<?php the_sub_field('hproduct_service_image'); ?>" alt="" />
                                            <div class="hproduct-bs">
                                                <div class="hproductbs-in">
                                                    <img src="<?php echo site_url() ?>/wp-content/uploads/best-seller.png" alt="">
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="hproduct-text">
									<div class="hproducttext-in">
										<?php if(get_sub_field('enable_quick_view') == 'yes') { ?>
                                            <div class="hpquick">
                                                <div class="hpquick-in">
                                                    <a href="<?php the_sub_field('hproduct_service_url'); ?>">
                                                        <i class="fa fa-arrow-down"></i>
                                                        <p>Quick<br>View</p>
                                                    </a>
                                                </div>
                                            </div>
                                    	<?php } ?>
                                        <h2><a href="<?php the_sub_field('hproduct_service_url'); ?>"><?php the_sub_field('hproduct_service_title'); ?></a></h2>
                                        <p><?php the_sub_field('hproduct_service_text'); ?></p>
                                    </div>
                                    <div class="hproduct-cart">
                                        <?php the_sub_field('hproduct_service_shortcode'); ?>

                                       <?php if(get_sub_field('learn_more_text') != '' || get_sub_field('learn_more_text') != NULL ) { ?>
                                        <div class="hproduct-learnmore">
                                        	<a href="<?php echo get_sub_field('learn_more_link'); ?>"><?php echo get_sub_field('learn_more_text'); ?></a>
                                        </div>
                                    	<?php } ?>
                                    </div>
                                </div>
                                <div class="site-btn hproduct-btn">
                                    <a href="<?php the_sub_field('hproduct_service_btn_url'); ?>"><?php the_sub_field('hproduct_service_btn_text'); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; endif; ?>
                </div>
                
            </div>
        </div>
    </section>
    
    <section class="hsection hsection-paul hsection-paulnothome">
        <div class="hsection-inner">
            <div class="container">
            
            	<div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <div class="st-sprtr">
                                <div class="stsprtr-in"></div>
                            </div>
                            <h2><?php the_field('myintuitive_maintitle'); ?></h2>
                         </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-7">
                        <div class="hpaulimg-wrap">
                            <div class="hpaulimg-in">
                                <div class="hpaul-img">
                                    <img src="<?php the_field('myintuitive_image'); ?>" alt="" />
                                </div>
                            </div>
                            <div class="hpaulimg-text">
                                <p><?php the_field('myintuitive_caption'); ?></p>
                            </div>
                        </div>
                        
                    </div>
                    
                    <div class="col-5">
                        <div class="hpaul-text" style='background-image:url("<?php echo get_stylesheet_directory_uri(); ?>/assets/images/commongraphic-bg.jpg");'>
                            <h2><?php the_field('myintuitive_title'); ?></h2>
                            <?php the_field('myintuitive_text'); ?>
                            <div class="site-btn hpaul-btn">
                                <a href="<?php the_field('myintuitive_btn_url'); ?>"><?php the_field('myintuitive_btn_text'); ?></a>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
</div>

<section class="hsection hsection-pcards">
	<div class="hsection-inner">
    	<div class="container">
        
        	<div class="hpage-pcards">
          		<a href="<?php the_field('hpagepcards_url'); ?>">
               		<img src="<?php the_field('hpage_pcards'); ?>" alt="" />
           		</a>
          	</div>
       
       </div>
   	</div>
</section>
 
<section class="hsection hsection-posts">
	<div class="hsection-inner">
    	<div class="container">
        
        	<div class="row">
            	<div class="col-12">
                    <div class="section-title">
                    	<div class="st-sprtr">
                        	<div class="stsprtr-in"></div>
                        </div>
                        <h2><?php the_field('hlatest_articles_title'); ?></h2>
                     </div>
                </div>
           	</div>
            
        	<div class="hposts">
            	<div class="row bxslider">
               		<?php
						$args = array(
						'post_type' => 'post',
						//'category_name' => 'alchemy-gemstones-essentialoils-magic',
						'post_status' => 'publish',
						'posts_per_page' => 12
						// Several more arguments could go here. Last one without a comma.
						);
				
						$arr_posts = new WP_Query( $args );
					?>
            
                    <?php while ($arr_posts->have_posts()) : $arr_posts->the_post(); ?>
                        
                  	<div class="hpost-item">
                   		<div class="hpost-col">
                     		<div class="hpost-img">
                           		<div class="hpostimg-in">
                              		<a href="<?php echo get_the_permalink(); ?>">
    									<?php
                                        //echo get_the_post_thumbnail_url();die();
                                         if( get_the_post_thumbnail_url() != "" ){ ?>
        									<img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" />
                                        <?php }else{ ?>
                                        	<img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/post-img.jpg" alt="" />
                                        <?php } ?>    
                           			</a>
                              	</div>
                           	</div>
                           	<div class="hpost-title">
                           		<h2>
                            		<a href="<?php echo get_the_permalink(); ?>"><?php if(strlen(get_the_title())>40){ echo substr(get_the_title(),0,40),"...";} else{ echo get_the_title(); } ?></a>
                        		</h2>
                         	</div>
                      	</div>
                    </div>
                                
                	<?php $i++; endwhile; wp_reset_postdata(); ?>
                </div>
            </div>
            
        </div>
    </div>
</section>    

<section class="hsection hsection-pisession">
 	<div class="hsection-inner">
  		<div class="container">
            
      		<div class="row">
        		<div class="col-12">
               		<div class="section-title">
                		<div class="st-sprtr">
               				<div class="stsprtr-in"></div>
                  		</div>
               			<h2><?php the_field('pis_title'); ?></h2>
                   		<p><?php the_field('pis_text'); ?></p>
            		</div>
             	</div>
       		</div>
                
          	<div class="row">
                
         		<?php if( have_rows('pis_cols') ):
               	// loop through the rows of data
                while ( have_rows('pis_cols') ) : the_row(); ?>
             	<div class="col-12 pisession-col">
            		<div class="pisessioncol-in">
          				<div class="pisessioncol-img">
                    		<a href="<?php the_sub_field('piscol_url'); ?>">
                           		<img src="<?php the_sub_field('piscol_image'); ?>" alt="" />
                        	</a>
                 		</div>
                		<div class="pisessioncol-text">
                			<h2><a href="<?php the_sub_field('piscol_url'); ?>"><?php the_sub_field('piscol_title'); ?></a></h2>
                   		</div>
                 	</div>
               	</div>
               	<?php endwhile; endif; ?>
                    
       		</div>
                
        	<div class="row">
         		<div class="col-12">
             		<div class="site-btn pisession-btn">
                   		<a href="<?php the_field('pis_button_url'); ?>"><?php the_field('pis_button_text'); ?></a>
              		</div>
        		</div>
        	</div>
                
   		</div>
   	</div>
</section>

<?php /*?><section class="hsection hsection-minintuitive dark-section">
	<div class="hsection-inner">
    	<div class="container">
        	<div class="row">
            	<div class="col-12">
                	<div class="minintuitive" style='background-image:url("<?php the_field('minintuitive_bg'); ?>");'>
                    	<div class="minintuitive-in">
                        	<div class="minintuitive-text">
                        		<h2><a href="<?php the_field('minintuitive_btn_url'); ?>"><?php the_field('minintuitive_title'); ?></a></h2>
                        		<p><?php the_field('minintuitive_text'); ?></p>
                            </div>
                            <div class="minintuitive-price">
                        		<h3><a href="<?php the_field('minintuitive_btn_url'); ?>"><?php the_field('minintuitive_price'); ?></a></h3>
                        	</div>
                            <div class="site-btn minintuitive-btn">
                        		<a href="<?php the_field('minintuitive_btn_url'); ?>"><?php the_field('minintuitive_btn_text'); ?></a>
                        	</div>
                        </div>
                	</div>
                </div>
           	</div>
        </div>
    </div>
</section><?php */?>

                
              
<?php 
get_footer();
?>
