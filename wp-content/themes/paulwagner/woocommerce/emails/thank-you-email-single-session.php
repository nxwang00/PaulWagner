<?php
 $image_url = "https://www.paulwagner.com/wp-content/themes/paulwagner/woocommerce/emails/";
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Thank You Email Generic Purchase</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    
	</head>
<body style="color:#000000;font-family:'Roboto', sans-serif;font-size:16px;font-weight:400;line-height:22px;padding:0;margin:0;">

	<table align="center" class="wrapper" border="0" cellspacing="0" cellpadding="0" width="624" style="vertical-align:top;padding:0;margin:0 auto;border:none;width:624px;">
    	<tr>
        	<td align="center">
                <table align="center" class="banner" border="0" cellspacing="0" cellpadding="0" width="100%" style="padding:0;padding-bottom:0;width:100%;">
                    <tr>
                        <td><center><img src="<?php the_field('main_top_image_1', 'option'); ?>" alt="" style="display:block;margin:0;" /></center></td>
                    </tr>
                </table>
                <table align="center" class="" border="0" cellspacing="0" cellpadding="0" width="100%" style="background:#ffffff;vertical-align:top;padding-top:20px;padding-bottom:0;padding-left:0;padding-right:0;margin:0;width:100%;">
                	<tr>
                    	<td>
                        	
                            <?php the_field('main_message_1', 'option'); ?>
                        </td>
                    </tr>
                </table>
                <table align="center" class="" border="0" cellspacing="0" cellpadding="0" width="100%" style="background:#ffffff;vertical-align:top;padding-top:10px;padding-bottom:10px;padding-left:0;padding-right:0;margin:0;width:100%;">
                	<tr>
                    	<td>
                        	<h2 style="color:#a619e1;font-size:30px;font-weight:700;line-height:48px;vertical-align:top;padding:0;margin:0;"><img src="<?php echo $image_url; ?>img/plogo.png" alt="" style="display:inline-block;vertical-align:top;margin:0;width:50px;" /> <span style="vertical-align:top;padding-left:10px;"><?php the_field('schedule_title', 'option'); ?></span></h2>
                        </td>
                    </tr>
                </table>
                <table align="center" class="" border="0" cellspacing="0" cellpadding="0" width="100%" style="background:#ffffff;vertical-align:top;padding-top:0px;padding-bottom:0px;padding-left:0;padding-right:0;margin:0;width:100%;">
                	<tr>
                    	<td>
                            <p><?php the_field('schedule_text', 'option'); ?></p>
                        	<p style="text-align:center;padding:0;margin:0;">
                            	<a href="<?php the_field('schedule_my_sessions_link_1', 'option'); ?>" style="color:#fff;font-size:16px;font-weight:400;line-height:22px;text-decoration:none;text-align:center;display:inline-block;background:#6e2880;border-radius:5px;padding:12px 20px;margin:0;width:auto;"><?php the_field('schedule_my_sessions_txt_1', 'option'); ?></a>
                            </p>
                       	</td>
                    </tr>
                </table>
                <table align="center" class="" border="0" cellspacing="0" cellpadding="0" width="100%" style="background:#ffffff;vertical-align:top;padding-top:20px;padding-bottom:40px;padding-left:0;padding-right:0;margin:0;width:100%;">
                	<tr>
                    	<td>
                        	
                            <?php the_field('schedule_line_items', 'option'); ?>

						</td>
                    </tr>
                </table>
                <table align="center" class="" border="0" cellspacing="0" cellpadding="0" width="100%" style="background:#ffffff;vertical-align:top;padding-top:10px;padding-bottom:10px;padding-left:0;padding-right:0;margin:0;width:100%;">
                	<tr>
                    	<td>
                        	<h2 style="color:#a619e1;font-size:30px;font-weight:700;line-height:48px;vertical-align:top;padding:0;margin:0;"><img src="<?php echo $image_url; ?>img/plogo.png" alt="" style="display:inline-block;vertical-align:top;margin:0;width:50px;" /> <span style="vertical-align:top;padding-left:10px;"> <?php the_field('schedule_line_items_12', 'option'); ?></span></h2>
                        </td>
                    </tr>
                </table>
                <table align="center" class="" border="0" cellspacing="0" cellpadding="0" width="100%" style="background:#ffffff;vertical-align:top;padding-top:0px;padding-bottom:0px;padding-left:0;padding-right:0;margin:0;width:100%;">
                	<tr>
                    	<td>
                        	

                            <?php the_field('paragraph_text', 'option'); ?>
                        </td>
                    </tr>
                </table>
                <table align="center" class="" border="0" cellspacing="0" cellpadding="0" width="100%" style="padding:0;padding-bottom:0;width:100%;">
                    <tr>
                        <td><center><img src="<?php echo $image_url; ?>img/logo-sprtr.png" alt="" style="display:block;margin:0;" /></center></td>
                    </tr>
                </table>
                <table align="center" class="" border="0" cellspacing="0" cellpadding="0" width="100%" style="background:#ffffff;vertical-align:top;padding-top:0px;padding-bottom:0;padding-left:0;padding-right:0;margin:0;width:100%;">
                	<tr>
                    	<td>
                        	<p><?php the_field('find_me_online_2', 'option'); ?></p>
						</td>
                    </tr>
                </table>
                <table align="center" class="" border="0" cellspacing="0" cellpadding="0" width="100%" style="background:#ffffff;vertical-align:top;padding-top:0px;padding-bottom:0;padding-left:0;padding-right:0;margin:0;width:100%;">
                	<tr>
                        <td>

                            <?php 
                            // Check rows exists.
                        if( have_rows('social_media') ):

                            // Loop through rows.
                            while( have_rows('social_media') ) : the_row();

                                // Load sub field value.
                                $sub_value_link = get_sub_field('image_social_media');
                                $sub_value_image = get_sub_field('social_media__link');

                                ?>
                           
                                <a href="<?php echo $sub_value_image; ?>" style="margin-left:5px;margin-right:5px;"><img src="<?php echo $sub_value_image; ?>" alt="" style="width:24px;" /></a>
                        <?php 

                            // End loop.
                            endwhile;

                        // No value.
                        else :
                            // Do something...
                        endif; 

                        ?>



                            <a href="https://www.facebook.com/paulwagner1008" style="margin-left:5px;margin-right:5px;"><img src="<?php echo $image_url; ?>/img/fb.png" alt="" style="width:24px;" /></a>
                            <a href="https://www.instagram.com/paulwagner1008/" style="margin-left:5px;margin-right:5px;"><img src="<?php echo $image_url; ?>/img/insta.png" alt="" style="width:24px;" /></a>
                            <a href="https://www.youtube.com/channel/UC72CHLVAWuP4slxP96eP_yA" style="margin-left:5px;margin-right:5px;"><img src="<?php echo $image_url; ?>/img/youtube.png" alt="" style="width:24px;" /></a>
                            <a href="https://www.linkedin.com/in/paulwagner1008" style="margin-left:5px;margin-right:5px;"><img src="<?php echo $image_url; ?>/img/Schedule My Sessions!Schedule My Sessions!Schedule My Sessions!Schedule My Sessions!" alt="" style="width:24px;" /></a>
                            <a href="#" style="margin-left:5px;margin-right:5px;"><img src="<?php echo $image_url; ?>/img/whatsuplink.png" alt="" style="width:24px;" /></a> 
                        </td>
                    </tr>
                </table>
                <table align="center" class="" border="0" cellspacing="0" cellpadding="0" width="100%" style="background:#ffffff;vertical-align:top;padding-top:30px;padding-bottom:20px;padding-left:0;padding-right:0;margin:0;width:100%;">
                	<tr>
                    	<td>
                             <?php the_field('footer_text_2', 'option'); ?>
                        	
						</td>
                    </tr>
                </table>
    		</td>
    	</tr>
    </table>
</body>
</html>