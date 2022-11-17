<?php
/*Template Name: Story Page */
get_header();
?>

<section class="psection psection-poetstory">
	<div class="psection-inner">
    	<div class="container">
        
        	<div class="row">
            	<div class="col-12">
                
                	<?php if (get_field('poetstory_title') == NULL || get_field('poetstory_title') == ""){ ?>
                   	<?php }else{ ?>
                        <div class="poetstory-title">
                            <h3><?php the_field('poetstory_title'); ?></h3>
                            <p><?php the_field('poetstory_byauthor'); ?></p>
                        </div>
                    <?php } ?>
                    
                	<div class="poetstory-text">
                    	<?php the_field('poetstory_text'); ?>
                    </div>
                </div>
                
           	</div>
            
       	</div>
 	</div>
</section>

<section class="psection psection-ywrp-pc">
	<div class="psection-inner">
    	<div class="container">
        
        	<div class="cntpc-img">
           		<a href="<?php the_field('pccard_url','option'); ?>">
              		<img src="<?php the_field('pccard_img','option'); ?>" alt="" />
            	</a>
      		</div>
            
       	</div>
    </div>
</section>
        
                          
<?php 
get_footer();
?>
