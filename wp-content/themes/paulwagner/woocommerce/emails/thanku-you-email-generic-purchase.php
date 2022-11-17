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
                        <td><center><img src="<?php the_field('main_top_image_3', 'option'); ?>" alt="" style="display:block;margin:0;" /></center></td>
                    </tr>
                </table>
                <table align="center" class="" border="0" cellspacing="0" cellpadding="0" width="100%" style="background:#ffffff;vertical-align:top;padding-top:20px;padding-bottom:20px;padding-left:0;padding-right:0;margin:0;width:100%;">
                	<tr>
                    	<td>
                        	<?php the_field('main_message_3', 'option'); ?>
                        </td>
                    </tr>
                </table>
                <table align="center" class="" border="0" cellspacing="0" cellpadding="0" width="100%" style="background:#ffffff;vertical-align:top;padding-top:0;padding-bottom:20px;padding-left:0;padding-right:0;margin:0;width:100%;">
                    <tr>
                        <td>
                            <table align="center" class="" border="0" cellspacing="0" cellpadding="0" width="100%" style="vertical-align:top;padding:0;">
                                <tr>
                                    <td align="left" style="width:40%;text-align:left;color:#ffffff;line-height:0;">
                                        <img src="<?php the_field('banner_image_4', 'option'); ?>" alt="" style="display:inline-block;margin:0;" />
                                    </td>
                                    <td align="left" style="width:60%;padding-left:15px;">
                                        <h2 style="color:#a619e1;font-size:24px;font-weight:700;line-height:28px;padding:0 0 15px 0;margin:0;">The Blended Soul App</h2>
                                        <p style="font-size:16px;font-weight:400;line-height:22px;padding:0 0 20px 0;margin:0;">Use the app for personal exploration or as a spiritual tool to improve your life, relationships, and career. All free!</p>
                                        <p style="padding:0;margin:0;">
                                        	<a href="<?php the_field('ios_app_url', 'option'); ?>"><img src="<?php echo $image_url; ?>img/ios.png" alt="" style="width:120px;" /></a>
                                            <a href="<?php the_field('android_app_url', 'option'); ?>"><img src="<?php echo $image_url; ?>img/android.png" alt="" style="width:120px;" /></a>
                                        </p>
                                  	</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table align="center" class="" border="0" cellspacing="0" cellpadding="0" width="100%" style="background:#ffffff;vertical-align:top;padding-top:30px;padding-bottom:0;padding-left:0;padding-right:0;margin:0;width:100%;">
                    <tr>
                        <td>
                            <table align="center" class="" border="0" cellspacing="0" cellpadding="0" width="100%" style="vertical-align:top;padding:0;">
                                <tr>
                                    <td align="left" style="width:40%;text-align:left;color:#ffffff;line-height:0;">
                                        <img src="<?php the_field('free_yourself_images', 'option'); ?>" alt="" style="display:inline-block;margin:0;" />
                                    </td>
                                    <td align="left" style="width:60%;padding-left:15px;">
                                        <h2 style="color:#a619e1;font-size:24px;font-weight:700;line-height:28px;padding:0 0 15px 0;margin:0;">Free Resources You’ll Love</h2>
                                       <?php the_field('line_items_34', 'option'); ?>
                                  	</td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table align="center" class="" border="0" cellspacing="0" cellpadding="0" width="100%" style="background:#ffffff;vertical-align:top;padding-top:20px;padding-bottom:0px;padding-left:0;padding-right:0;margin:0;width:100%;">
                	<tr>
                    	<td>
                        	<?php the_field('paragraph_text_2', 'option'); ?>

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
                        	<p><?php the_field('find_me_online_3', 'option'); ?></p>
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
                        </td>
                    </tr>
                </table>
                <table align="center" class="" border="0" cellspacing="0" cellpadding="0" width="100%" style="background:#ffffff;vertical-align:top;padding-top:30px;padding-bottom:20px;padding-left:0;padding-right:0;margin:0;width:100%;">
                	<tr>
                    	<td>
                        	<?php the_field('footer_text_3', 'option'); ?>
						</td>
                    </tr>
                </table>
    		</td>
    	</tr>
    </table>
</body>
</html>