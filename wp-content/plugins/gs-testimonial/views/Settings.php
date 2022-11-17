<?php
    echo '<div class=" gs_t_wrap" style="width: 845px; float: left;">';
        $this->settings_api->show_navigation();
        $this->settings_api->show_forms();
    echo '</div>';
?> 
<div class="gswps-admin-sidebar" style="width: 277px; float: left; margin-top: 50px;">
    <div class="postbox">
        <h3 class="hndle"><span><?php _e( 'Support / Report a bug', 'gst' ) ?></span></h3>
        <div class="inside centered">
            <p><?php _e( 'Please feel free to let us know if you have any bugs to report. Your report / suggestion can make the plugin awesome!', 'gst' ); ?></p>
            <p><a href="https://www.gsplugins.com/support" target="_blank" class="button button-primary"><?php _e( 'Get Support', 'gst' ); ?></a></p>
        </div>
    </div>
    <div class="postbox">
        <h3 class="hndle"><span><?php _e( 'Buy me a coffee', 'gst' ) ?></span></h3>
        <div class="inside centered">
            <p><?php _e( 'If you like the plugin, please buy me a coffee to inspire me to develop further.', 'gst' ); ?></p>
            <p><a href='https://www.2checkout.com/checkout/purchase?sid=202460873&quantity=1&product_id=1' class="button button-primary" target="_blank"><?php _e( 'Donate', 'gst' ); ?></a></p>
        </div>
    </div>

    <div class="postbox">
        <h3 class="hndle"><span><?php _e( 'Subscribe to NewsLetter', 'gst' ) ?></span></h3>
        <div class="inside centered">
            <p><?php _e( 'Sign up today & be the first to get notified on new plugin updates. Your information will never be shared with any third party.', 'gst' ); ?></p>
            <link href="//cdn-images.mailchimp.com/embedcode/slim-081711.css" rel="stylesheet" type="text/css">
            <style type="text/css">
                #mc_embed_signup{background:#fff; clear:left; font:13px "Open Sans",sans-serif; }
            </style>
            <div id="mc_embed_signup">
            <form action="//gsamdani.us11.list-manage.com/subscribe/post?u=92f99db71044540329de15732&amp;id=2600f1ae0f" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate style="padding: 0;">
                <div id="mc_embed_signup_scroll">
                
                <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="Enter your Email address" required style="width: 100%; border:1px solid #E2E1E1; text-align: center;">
                <div style="position: absolute; left: -5000px;"><input type="text" name="b_92f99db71044540329de15732_2600f1ae0f" tabindex="-1" value=""></div>
                <div class="clear" style="text-align: center; display: block;">
                    <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button button-primary" style="display: inline; margin: 0; background: #00a0d2; font-size: 13px;">
                </div>
                </div>
            </form>
            </div>
            <!--End mc_embed_signup-->
        </div>
    </div>

    <div class="postbox">
        <h3 class="hndle"><span><?php _e( 'Join GS Plugins on facebook', 'gst' ) ?></span></h3>
        <div class="inside centered">
            <iframe src="//www.facebook.com/plugins/likebox.php?href=https://www.facebook.com/gsplugins&amp;width&amp;height=258&amp;colorscheme=dark&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false&amp;appId=723137171103956" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:250px; height:220px;" allowTransparency="true"></iframe>
        </div>
    </div>

    <div class="postbox">
        <h3 class="hndle"><span><?php _e( 'Follow GS Plugins on twitter', 'gst' ) ?></span></h3>
        <div class="inside centered">
            <a href="https://twitter.com/gsplugins" target="_blank" class="button button-secondary"><?php _e( 'Follow', 'gst' ); ?> @gsplugins<span class="dashicons dashicons-twitter" style="position: relative; top: 3px; margin-left: 3px; color: #0fb9da;"></span></a>
        </div>
    </div>
</div>