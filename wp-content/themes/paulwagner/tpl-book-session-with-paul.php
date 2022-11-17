<?php
/*Template Name: Book Session With Paul */
get_header();
?>

<section class="psection psection-bswp">
	<div class="psection-inner">
    	<div class="container">
        
        	<?php if( have_rows('book_seesions') ):
          	// loop through the rows of data
           	while ( have_rows('book_seesions') ) : the_row(); ?>
        	<div class="bswp-wrap">
            	<div class="row bswptitle-row">
                    <div class="col-12">
                        <div class="bswp-title">
                            <div class="bswp-img">
                                <img src="<?php the_sub_field('bswp_image'); ?>" alt="" />
                            </div>
                            <div class="bswp-text">
                                <h2><?php the_sub_field('bswp_title'); ?></h2>
                            </div>
                        </div>
                    </div>
                </div>
                
				<?php if( have_rows('book_session_content') ):
          		// loop through the rows of data
           		while ( have_rows('book_session_content') ) : the_row(); ?>
                <div class="row bswpcnt-row">
                    <div class="col-9">
                        <h4><?php the_sub_field('bswpcnt_title'); ?></h4>
                        <?php the_sub_field('bswpcnt_text'); ?>
                    </div>
                    <div class="col-3">
                        <div class="site-btn">
                            <a target="_blank" href="<?php the_sub_field('bswpcnt_btn_url'); ?>"><?php the_sub_field('bswpcnt_btn_text'); ?></a>
                        </div>
                    </div>
                </div>
                <?php endwhile; endif; ?>
             
           	</div>
            <?php endwhile; endif; ?>
            
        </div>
   	</div>
</section>

<section class="psection psection-bswp-pc">
	<div class="psection-inner">
    	<div class="container">
        
        	<div class="bswp-pc">
          		<a href="<?php the_field('bswppc_img_url'); ?>">
               		<img src="<?php the_field('bswppc_image'); ?>" alt="" />
           		</a>
          	</div>
            
       	</div>
    </div>
</section>
         
                
                
<?php 
get_footer();
?>
