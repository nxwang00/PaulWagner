<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Seventeen
 * @since Twenty Seventeen 1.0
 * @version 1.0
 */

get_header(); ?>

<div class="wrap">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/page/content', 'page' );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div><!-- .wrap -->

<section class="psection psection-booksession" style='background-image:url("<?php echo site_url(); ?>/wp-content/uploads/promise.svg");'>
	<div class="psection-inner">
    	<div class="container">
        
        	<div class="row">
            	<div class="col-12">
                	<div class="booksession">
                    	<h2><?php the_field('fbooknow_title', 'option'); ?></h2>
                        <p><?php the_field('fbooknow_text', 'option'); ?></p>
                        <div class="row booksessionsign-row">
                            <div class="booksessionsign-col">
                                <div class="booksession-sign">
                                    <img src="<?php the_field('fbooknow_sign', 'option'); ?>" alt="" />
                                </div>
                            </div>
                            <div class="booksessionbtn-col">
                                <div class="site-btn booksession-btn">
                                    <a href="<?php the_field('fbooknow_btn_url', 'option'); ?>"><?php the_field('fbooknow_btn_text', 'option'); ?></a>
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
