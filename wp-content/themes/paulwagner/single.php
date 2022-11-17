<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since Twenty Seventeen 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="container">
	<div class="row singlepage-row">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
    
                <?php
                // Start the Loop.
                while ( have_posts() ) :
                    the_post();
    
                    get_template_part( 'template-parts/post/content', get_post_format() );
    
                endwhile; // End the loop.
                ?>
    
    		</main><!-- #main -->
        </div><!-- #primary -->
        <?php //get_sidebar(); ?>
	</div><!-- .row -->
</div><!-- .container -->

<div class="postnav-wrap">
	<div class="container">
    	<?php
			the_post_navigation(
				array(
					'prev_text' => '<span class="screen-reader-text">' . __( 'Previous Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Previous', 'twentyseventeen' ) . '</span> <span class="nav-title"><span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-left' ) ) . '</span>%title</span>',
						'next_text' => '<span class="screen-reader-text">' . __( 'Next Post', 'twentyseventeen' ) . '</span><span aria-hidden="true" class="nav-subtitle">' . __( 'Next', 'twentyseventeen' ) . '</span> <span class="nav-title">%title<span class="nav-title-icon-wrapper">' . twentyseventeen_get_svg( array( 'icon' => 'arrow-right' ) ) . '</span></span>',
				)
			);
		?>
  	</div>
</div>

<div class="postauthor-wrap">
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

<section class="psection psection-bookform">
	<div class="psection-inner">
    	<div class="container">
        
        	<div class="row">
            	<div class="col-12">
                    <div class="bookform">
                    	<div class="bookform-in dark-section">
                        	<div class="bookform-img">
                            	<div class="bookformimg-in">
                            		<img src="<?php echo site_url(); ?>/wp-content/uploads/2020/10/book-graphic.png" alt="">
                                </div>
                            </div>
                            <div class="bookform-text">
                            	<p>Download My Free Report</p>
                                <h2>“How To Live An Exuberant Life”</h2>
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
                            		<a href="https://www.paulwagner.com/services/">Book Now</a>
                               	</div>
                           	</div>
                     	</div>
              		</div>
           		</div>
       		</div>
                            
       	</div>
 	</div>
</section>

<section class="psection psection-contactpage-pc">
	<div class="psection-inner">
    	<div class="container">
        
        	<div class="contactpage-pc">
          		<a href="https://www.paulwagner.com/product/the-personality-cards-divine-inspiration-for-life-love-relationships/">
               		<img src="<?php echo site_url(); ?>/wp-content/uploads/personality-card-bnr.svg" alt="" />
           		</a>
          	</div>
            
       	</div>
    </div>
</section>

<section class="psection psection-commentform">
	<div class="psection-inner">
   		<div class="container">
                        
      		<div class="row">
         		<div class="col-12">
                	<div class="commentform-wrap">
						<?php 
                            // If comments are open or we have at least one comment, load up the comment template.
                           // if ( comments_open() || get_comments_number() ) :
                               // comments_template();
                           // endif;
                        ?>
        			</div>
           		</div>
       		</div>
            
        </div>
     </div>
</section>

<?php
get_footer();
