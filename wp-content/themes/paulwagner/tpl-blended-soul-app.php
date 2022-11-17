<?php
/*Template Name: Blended Soul App Page */
get_header();
?>



<section class="psection psection-bsap">
	<div class="psection-inner">
    	<div class="container">
        
        	<div class="row">
            	<div class="col-12">
                
                	<div class="bsap-text">
                    	<?php the_field('bsap_top'); ?>
                    </div>
                    
                    <div class="bsap-btns">
                    	<div class="bsap-btn">
                        	<a target="_blank" href="<?php the_field('btngplay_url'); ?>"><img src="<?php the_field('btngplay_image'); ?>" alt="" /></a>
                            <a target="_blank" href="<?php the_field('btnappstore_url'); ?>"><img src="<?php the_field('btnappstore_image'); ?>" alt="" /></a>
                        </div>
                    </div>
                    
                    <div class="bsap-text">
                    	<?php the_field('bsap_btm'); ?>
                    </div>
                    
                </div>
        	</div>
        
        </div>
 	</div>
</section>

<div class="postauthor-wrap postauthor-bsap">
	<div class="container">
        <div class="postauthor-section">
        	<div class="postauthor-inner">
           		<div class="postauthor-row">
             
             		<div class="postauthor-col postauthorcol-img">
                 		<div class="postauthor-img">
                       		<img src="<?php the_field('author_image','option'); ?>" alt="" />
                		</div>
               		</div>
                                
                  	<div class="postauthor-col postauthorcol-text">
               			<div class="postauthor-text">
                      		<p><?php the_field('author_description','option'); ?></p>
                		</div>
              		</div> 
                                
             	</div>
         	</div>
    	</div>
   	</div>
</div>

<section class="psection psection-booksession" style='background-image:url("<?php echo site_url(); ?>/wp-content/uploads/promise.svg");'>
	<div class="psection-inner">
   		<div class="container">
                        
      		<div class="row">
         		<div class="col-12">
                	<div class="booksession">
                    	<h2>I promise that our intuitive sessions together <br>will be fun, eye-opening, and transformative.</h2>
                		<p>Book a personal session with me</p>
                    	<div class="row booksessionsign-row">
                        	<div class="booksessionsign-col">
                            	<div class="booksession-sign">
                          			<img src="<?php echo site_url(); ?>/wp-content/uploads/sign-white.svg" alt="" />
                        		</div>
                      		</div>
                          	<div class="booksessionbtn-col">
                          		<div class="site-btn booksession-btn">
                            		<a href="#">Book Now</a>
                               	</div>
                           	</div>
                     	</div>
              		</div>
           		</div>
       		</div>
                            
       	</div>
 	</div>
</section>

<section class="psection psection-contactpage-pc bsap-pc">
	<div class="psection-inner">
    	<div class="container">
        
        	<div class="contactpage-pc">
          		<a href="#">
               		<img src="<?php echo site_url(); ?>/wp-content/uploads/personality-card-bnr.svg" alt="" />
           		</a>
          	</div>
            
       	</div>
    </div>
</section>

                          
<?php 
get_footer();
?>
