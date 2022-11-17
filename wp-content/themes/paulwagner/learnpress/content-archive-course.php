        <div class="banner-wrap">
       		<div class="banner-cnt" style='background-image:url("<?php the_field('background_images', 'option'); ?>");'>
            	<div class="banner-inner">
                	<div class="banner-text">
                    	<?php if (get_field('page_title_course_page') == NULL || get_field('page_title_course_page') == ""){ ?>
                            <h1><?php echo the_field('page_title_course_page','option'); ?></h1>
                        <?php }else{ ?>
                            <h1><?php echo the_field('page_title_course_page','option'); ?></h1>
                        <?php } ?>
                    </div>
            	</div>
          	</div>
      	</div>
<div class="frssectionmain-wrapper">
    <section class="psection psection-frstiframe">
        <div class="psection-inner">
            <div class="container">
                <div class="row frstiframe-row">
                    <div class="col-12 frstiframe-col">
                        <div class="frstiframe">
                            <?php the_field('frst_iframe','option'); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="psection psection-fscols psection-fscolstop psection-fscolstopnew">
        <div class="psection-inner">
            <div class="container">
            
                <div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <div class="st-sprtr">
                                <div class="stsprtr-in"></div>
                            </div>
                            <h2><?php the_field('freeresourcesncnt_title','option'); ?></h2>
                         </div>
                    </div>
                </div>
            
                <?php $i = 1; ?>
                <div class="row fscols-row">
                
                <?php if( have_rows('freeresourcesn_cnt','option') ):
                // loop through the rows of data
                while ( have_rows('freeresourcesn_cnt','option') ) : the_row(); ?>
                
                    <div class="col-6 frscol">
                        <div class="fscolimg-in">
                            <div class="fscol-img">
                                <a href="<?php the_sub_field('frsn_btn_url','option'); ?>"><img src="<?php the_sub_field('frsn_image','option'); ?>" alt="" /></a>
                            </div>
                        </div>
                        <div class="fscol-title">
                            <div class="st-sprtr">
                                <div class="stsprtr-in"></div>
                            </div>
                            <h2><?php the_sub_field('frsn_title','option'); ?></h2>
                        </div>
                            
                        <?php /*?><div class="fscol-price">
                            <span>$ <?php the_sub_field('frsn_price','option'); ?></span>
                        </div><?php */?>
                        
                        <div class="fscol-subtitle">
                            <h3><?php the_sub_field('frsn_subtitle','option'); ?></h3>
                        </div>
                        
                        <div class="fscol-text">
                            <?php the_sub_field('frsn_description','option'); ?>
                        </div>
    
                        <div  class="site-btn fscol-btn">
                            <a href="<?php the_sub_field('frsn_btn_url','option'); ?>"><?php the_sub_field('frsn_btn_text','option'); ?></a>
                        </div>
                    </div>
                    
                <?php if($i % 2 == 0) {echo '</div><div class="row fscols-row">';} ?>
                <?php $i++; endwhile; endif; ?>
                </div>
                
                <?php /*?><div class="row">
                    <div class="col-12">
                        <div class="section-title">
                            <div class="st-sprtr">
                                <div class="stsprtr-in"></div>
                            </div>
                            <h2><?php the_field('freeresourcesncnt2_title','option'); ?></h2>
                         </div>
                    </div>
                </div><?php */?>
                
                <?php $i = 1; ?>
                <div class="row fscols-row">
                
                <?php if( have_rows('freeresourcesn2_cnt','option') ):
                // loop through the rows of data
                while ( have_rows('freeresourcesn2_cnt','option') ) : the_row(); ?>
                
                    <div class="col-6 frscol">
                        <div class="fscolimg-in">
                            <div class="fscol-img">
                                <a href="<?php the_sub_field('frsn2_btn_url','option'); ?>"><img src="<?php the_sub_field('frsn2_image','option'); ?>" alt="" /></a>
                            </div>
                        </div>
                        <div class="fscol-title">
                            <div class="st-sprtr">
                                <div class="stsprtr-in"></div>
                            </div>
                            <h2><?php the_sub_field('frsn2_title','option'); ?></h2>
                        </div>
                            
                        <?php /*?><div class="fscol-price">
                            <span>$ <?php the_sub_field('frsn_price','option'); ?></span>
                        </div><?php */?>
                        
                        <div class="fscol-subtitle">
                            <h3><?php the_sub_field('frsn2_subtitle','option'); ?></h3>
                        </div>
                        
                        <div class="fscol-text">
                            <?php the_sub_field('frsn2_description','option'); ?>
                        </div>
    
                        <div  class="site-btn fscol-btn">
                            <a href="<?php the_sub_field('frsn2_btn_url','option'); ?>"><?php the_sub_field('frsn2_btn_text','option'); ?></a>
                        </div>
                    </div>
                    
                <?php if($i % 2 == 0) {echo '</div><div class="row fscols-row">';} ?>
                <?php $i++; endwhile; endif; ?>
                </div>
            
            </div>
        </div>
    </section>
                
    <section class="psection psection-fsys psection-fsysnew">
        <div class="psection-inner">
            <div class="container">
                   
                <div class="row fsys-row">
                    <div class="col-12">
                        <div class="fsys-img">
                            <a target="_blank" href="<?php the_field('frsn_bannerlink','option'); ?>">
                                <img src="<?php the_field('frsn_bannerimg','option'); ?>" alt="" />
                            </a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
 
</div>