<?php
/*Template Name: Course Page */
get_header();
?>

<div class="scoursepage-wrap">
    <section class="psection psection-scrsptop dark-section">
        <div class="psection-inner">
            <div class="container">
                <div class="row">
                
                    <div class="col-6 scrsptvideo-col">
                        <div class="scrsptvideo-in">
                            <div class="scrsptvideo-iframe">
                                <?php the_field('courseptop_iframe'); ?>
                            </div>
                            <div class="site-btn scrsptvideo-btn">
                                <a href="<?php the_field('courseptop_btnurl'); ?>"><?php the_field('courseptop_btntext'); ?></a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-6 scrspttext-col">
                        <div class="scrspttext-in">
                            <?php the_field('courseptop_txtabovelist'); ?>
                            <ul>
                            	<?php if( have_rows('courseptop_list') ):
                    			// loop through the rows of data
                    			while ( have_rows('courseptop_list') ) : the_row(); ?>
                                	<li><?php the_sub_field('courseptop_listitem'); ?></li>
                                <?php endwhile; endif; ?>
                            </ul>
                            <?php the_field('courseptop_txtbelowlist'); ?>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    
    <section class="psection psection-scrsplist">
        <div class="psection-inner">
            <div class="container">
            
                <div class="row">
                    <div class="col-12 scrsplist-title">
                        <div class="scrsplisttitle-in scrsptitle">
                            <h2><?php the_field('courseplists_maintitle'); ?></h2>
                            <div class="scrsptitle-sprtr"><span></span></div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-6 scrsplist-col">
                        <div class="scrsplist-in">
                            <ul>
                            	<?php if( have_rows('courseplists_left') ):
                    			// loop through the rows of data
                    			while ( have_rows('courseplists_left') ) : the_row(); ?>
                                	<li><?php the_sub_field('courseplistsleft_item'); ?></li>
                               	<?php endwhile; endif; ?>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-6 scrsplist-col">
                        <div class="scrsplist-in">
                            <ul>
                            	<?php if( have_rows('courseplists_right') ):
                    			// loop through the rows of data
                    			while ( have_rows('courseplists_right') ) : the_row(); ?>
                                	<li><?php the_sub_field('courseplistsright_item'); ?></li>
                                <?php endwhile; endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    
    <section class="psection psection-scrspwrksheet dark-section">
        <div class="psection-inner">
            <div class="container">
                <div class="row">
                
                    <div class="col-12 scrspwrksheet-col">
                        <div class="scrspwrksheet-in">
                            <h2><?php the_field('courseplwrksheet_title'); ?></h2>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </section>
    
    <section class="psection psection-scrspques">
        <div class="psection-inner">
            <div class="container">
                <div class="row">
                
                	<?php if( have_rows('question_columns') ):
                   	// loop through the rows of data
                   	while ( have_rows('question_columns') ) : the_row(); ?>
                     <div class="col-4 scrspques-col">
                        <div class="scrspquescol-in">
                            <div class="scrspquescol-icon">
                                <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/clock-icon.png" alt="" />
                            </div>
                            <h2><?php the_sub_field('coursepques_title'); ?></h2>
                            <?php the_sub_field('coursepques_text'); ?>
                        </div>
                    </div>
                    <?php endwhile; endif; ?>
                    
                </div>
            </div>
        </div>
    </section>
    
    <section class="psection psection-scrsppaulword dark-section">
        <div class="psection-inner">
            <div class="container">
            
                <div class="row">
                    <div class="col-12">
                        <div class="scrsppaulword-title scrsptitle">
                            <h2><?php the_field('courseppw_maintitle'); ?></h2>
                            <div class="scrsptitle-sprtr"><span></span></div>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-6 scrsppaulwordtext-col">
                        <div class="scrsppaulwordcoltext-in">
                            <img src="<?php the_field('courseppw_paulimg'); ?>" alt="" />
                            <?php the_field('courseppw_text'); ?>
                        </div>
                    </div>
                    
                    <div class="col-6 scrsppaulwordimg-col">
                        <div class="scrsppaulwordcolimg-in">
                            <img src="<?php the_field('courseppw_img'); ?>" alt="" />
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    
    <section class="psection psection-scrspycpayoption">
        <div class="psection-inner">
            <div class="container">
            
                <div class="row">
                    <div class="col-12">
                        <div class="scrspycpayoption-title">
                            <h2><?php the_field('courseppay_maintitle'); ?></h2>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
    
    <section class="psection psection-scrsplastpay">
        <div class="psection-inner">
            <div class="container">
            
                <div class="row">
                    <div class="col-12">
                        <div class="scrsplastpay">
                            <div class="scrsplastpay-in">
                                <div class="scrsplastpay-title">
                                    <h2>$<?php the_field('courseppay_price'); ?></h2>
                                </div>
                                <?php the_field('courseppay_text'); ?>
                                <div class="site-btn scrsplastpay-btn">
                                    <a href="<?php the_field('courseppay_btnurl'); ?>"><?php the_field('courseppay_btntext'); ?></a>
                                </div>
                                <div class="scrsplastpay-btmtext">
                                    <?php the_field('courseppay_textbtm'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
</div>
            

                          
<?php 
get_footer();
?>
