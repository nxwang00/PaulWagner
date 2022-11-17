<?php

namespace GSTM;

// if direct access than exit the file.
defined('ABSPATH') || exit;

class SettingsApi {

    /**
     * settings sections array
     *
     * @var array
     */
    private $settings_sections = array();

    /**
     * Settings fields array
     *
     * @var array
     */
    private $settings_fields = array();

    /**
     * Singleton instance
     *
     * @var object
     */
    private static $_instance;

    public function __construct() {
        add_action( 'admin_enqueue_scripts', array( $this, 'admin_enqueue_scripts' ) );
    }

    /**
     * Enqueue scripts and styles
     */
    function admin_enqueue_scripts( $hook ) {

        if ( $hook != 'gs_testimonial_page_testimonial-settings' ) return;

        wp_enqueue_style( 'wp-color-picker' );
        wp_enqueue_script( 'wp-color-picker' );
        
        // Custom script by Golam Samdani
        wp_register_script( 'gstRangesliderJs', GST_PLUGIN_URI . '/settings/js/gst.rangeslider.min.js', array( 'jquery' ), GST_VERSION, false );
        wp_register_script( 'gstSwitchButtonJs', GST_PLUGIN_URI . '/settings/js/gst.jquery.switchButton.js', array( 'jquery' ), GST_VERSION, false );
        
        wp_enqueue_script( 'jquery-ui' );
        wp_enqueue_script( 'jquery-effects-core' );

        wp_enqueue_script('gstRangesliderJs');
        wp_enqueue_script('gstSwitchButtonJs');

        // Custom style by Golam Samdani
        wp_register_style( 'gstSwitchButtonStyle', GST_PLUGIN_URI . '/settings/css/gst.jquery.switchButton.css', '', GST_VERSION );
        wp_register_style( 'gstRangesliderStyle', GST_PLUGIN_URI . '/settings/css/gst.rangeslider.css', '', GST_VERSION );
        
        wp_enqueue_style('gstSwitchButtonStyle');
        wp_enqueue_style('gstRangesliderStyle');
    }

    /**
     * Set settings sections
     *
     * @param array   $sections setting sections array
     */
    function set_sections( $sections ) {
        $this->settings_sections = $sections;

        return $this;
    }

    /**
     * Add a single section
     *
     * @param array   $section
     */
    function add_section( $section ) {
        $this->settings_sections[] = $section;

        return $this;
    }

    /**
     * Set settings fields
     *
     * @param array   $fields settings fields array
     */
    function set_fields( $fields ) {
        $this->settings_fields = $fields;

        return $this;
    }

    function add_field( $section, $field ) {
        $defaults = array(
            'name' => '',
            'label' => '',
            'desc' => '',
            'type' => 'text'
        );

        $arg = wp_parse_args( $field, $defaults );
        $this->settings_fields[$section][] = $arg;

        return $this;
    }

    /**
     * Initialize and registers the settings sections and fileds to WordPress
     *
     * Usually this should be called at `admin_init` hook.
     *
     * This function gets the initiated settings sections and fields. Then
     * registers them to WordPress and ready for use.
     */
    function admin_init() {
        // register settings sections
        foreach ( $this->settings_sections as $section ) {
            if ( false == get_option( $section['id'] ) ) {
                add_option( $section['id'] );
            }

            if ( isset($section['desc']) && !empty($section['desc']) ) {
                $section['desc'] = '<div class="inside">'.$section['desc'].'</div>';
                
                $callback = function() use ($section) { echo str_replace( '"', '\"', esc_html($section['desc']) ); };
            } else {
                $callback = '__return_false';
            }

            add_settings_section( $section['id'], $section['title'], $callback, $section['id'] );
        }

        //register settings fields
        foreach ( $this->settings_fields as $section => $field ) {
            foreach ( $field as $option ) {

                $type = isset( $option['type'] ) ? $option['type'] : 'text';

                $args = array(
                    'id' => $option['name'],
                    'desc' => isset( $option['desc'] ) ? $option['desc'] : '',
                    'name' => $option['label'],
                    'section' => $section,
                    'size' => isset( $option['size'] ) ? $option['size'] : null,
                    'options' => isset( $option['options'] ) ? $option['options'] : '',
                    'std' => isset( $option['default'] ) ? $option['default'] : '',
                    'sanitize_callback' => isset( $option['sanitize_callback'] ) ? $option['sanitize_callback'] : '',
                    'range_min' => isset( $option['range_min'] ) ? $option['range_min'] : '',
                    'range_max' => isset( $option['range_max'] ) ? $option['range_max'] : '',
                    'range_step' => isset( $option['range_step'] ) ? $option['range_step'] : '',
                    'min' => isset( $option['min'] ) ? $option['min'] : '',
                    'max' => isset( $option['max'] ) ? $option['max'] : '',
                    'switch_default' => isset( $option['switch_default'] ) ? $option['switch_default'] : '',
                );
                add_settings_field( $section . '[' . $option['name'] . ']', $option['label'], array( $this, 'callback_' . $type ), $section, $section, $args );
            }
        }

        // creates our settings in the options table
        foreach ( $this->settings_sections as $section ) {
            register_setting( $section['id'], $section['id'], array( $this, 'sanitize_options' ) );
        }
    }

    /**
     * Displays a text field for a settings field
     *
     * @param array   $args settings field args
     */
    function callback_text( $args ) {
        $value = esc_attr( $this->get_option( $args['id'], $args['section'], $args['std'] ) );
        $size = isset( $args['size'] ) && !is_null( $args['size'] ) ? $args['size'] : 'regular';
        printf( '<input type="text" class="%1$s-text" id="%2$s[%3$s]" name="%2$s[%3$s]" value="%4$s"/>', esc_attr($size), esc_attr($args['section']), esc_attr($args['id']), esc_attr($value) );
        printf( '<span class="description"> %s</span>', wp_kses_post($args['desc']) );
    }
    
    
    /**
     * Displays a number field for a settings field
     *
     * @param array   $args settings field args
     */
    function callback_number( $args ) {
        $value = $this->get_option( $args['id'], $args['section'], $args['std'], $args['min'], $args['max'] );
        printf( '<input type="number" class="%1$s" id="%2$s[%3$s]" name="%2$s[%3$s]" value="%4$s" min="%5$s" max="%6$s"/>', 'gs_number_type', esc_attr($args['section']), esc_attr($args['id']), esc_attr($value), esc_attr($args['min']), esc_attr($args['max']) );
        printf( '<span class="description"> %s</span>', wp_kses_post($args['desc']) );
    }
    
   
    /**
     * Displays a range field for a settings field
     *
     * @param array   $args settings field args
     */
    function callback_range( $args ) {
        $value = $this->get_option( $args['id'], $args['section'], $args['std'], $args['range_min'], $args['range_max'], $args['range_step'] );
        printf( '<output class="wpb_output"></output><input type="range" min="%1$s" max="%5$s" step="%6$s" value="%4$s" class="wpb-range" id="%2$s[%3$s]" name="%2$s[%3$s]"/><br />', esc_attr($args['range_min']), esc_attr($args['section']), esc_attr($args['id']), esc_attr($value), esc_attr($args['range_max']), esc_attr($args['range_step']) );
        printf( '<span class="range_description description"> %s</span>', wp_kses_post($args['desc']) );
    }
    
    /**
     * Displays a checkbox for a settings field
     *
     * @param array   $args settings field args
     */
    function callback_checkbox( $args ) {
        $value = $this->get_option( $args['id'], $args['section'], $args['std'] );
        printf( '<input type="hidden" name="%1$s[%2$s]" value="off" />', esc_attr($args['section']), esc_attr($args['id']) );
        printf( '<input type="checkbox" class="checkbox" id="wpuf-%1$s[%2$s]" name="%1$s[%2$s]" value="on"%4$s />', esc_attr($args['section']), esc_attr($args['id']), esc_attr($value), checked( $value, 'on', false ) );
        printf( '<label for="wpuf-%1$s[%2$s]"> %3$s</label>', esc_attr($args['section']), esc_attr($args['id']), wp_kses_post($args['desc']) );
    }
    
    
    /**
     * Displays a switch for a settings field
     *
     * @param array   $args settings field args
     */
    function callback_switch( $args ) {
        $value = $this->get_option( $args['id'], $args['section'], $args['std'] );
        $switch_default = ($args['switch_default'] == 'on' ? 'checked' : '');
        printf( '<input type="hidden" name="%1$s[%2$s]" value="off" />', esc_attr($args['section']), esc_attr($args['id']) );
        printf( '<input type="checkbox" class="wpb_switch" id="wpuf-%1$s[%2$s]" name="%1$s[%2$s]" value="on"%4$s %5$s/>', esc_attr($args['section']), esc_attr($args['id']), esc_attr($value), checked( $value, 'on', false ), esc_attr($switch_default) );
        printf( '<label class="gst_switch_label" for="wpuf-%1$s[%2$s]"> %3$s</label>', esc_attr($args['section']), esc_attr($args['id']), wp_kses_post($args['desc']) );
    }

    /**
     * Displays a multicheckbox a settings field
     *
     * @param array   $args settings field args
     */
    function callback_multicheck( $args ) {
        $value = $this->get_option( $args['id'], $args['section'], $args['std'] );
        foreach ( $args['options'] as $key => $label ) {
            $checked = isset( $value[$key] ) ? $value[$key] : '0';
            printf( '<input type="checkbox" class="checkbox" id="wpuf-%1$s[%2$s][%3$s]" name="%1$s[%2$s][%3$s]" value="%3$s"%4$s />', esc_attr($args['section']), esc_attr($args['id']), sanitize_key($key), checked( $checked, sanitize_key($key), false ) );
            printf( '<label for="wpuf-%1$s[%2$s][%4$s]"> %3$s</label><br>', esc_attr($args['section']), esc_attr($args['id']), esc_attr($label), sanitize_key($key) );
        }
        printf( '<span class="description"> %s</label>', wp_kses_post($args['desc']) );
    }

    /**
     * Displays a multicheckbox a settings field
     *
     * @param array   $args settings field args
     */
    function callback_radio( $args ) {
        $value = $this->get_option( $args['id'], $args['section'], $args['std'] );
        foreach ( $args['options'] as $key => $label ) {
            printf( '<input type="radio" class="radio" id="wpuf-%1$s[%2$s][%3$s]" name="%1$s[%2$s]" value="%3$s"%4$s />', esc_attr($args['section']), esc_attr($args['id']), sanitize_key($key), checked( $value, $key, false ) );
            printf( '<label for="wpuf-%1$s[%2$s][%4$s]"> %3$s</label><br>', esc_attr($args['section']), esc_attr($args['id']), esc_attr($label), sanitize_key($key) );
        }
        printf( '<span class="description"> %s</label>', wp_kses_post($args['desc']) );
    }

    /**
     * Displays a selectbox for a settings field
     *
     * @param array   $args settings field args
     */
    function callback_select( $args ) {

        $value = $this->get_option( $args['id'], $args['section'], $args['std'] );
        printf( '<select class="%1$s" name="%2$s[%3$s]" id="%2$s[%3$s]">', 'gs_select_type', esc_attr($args['section']), esc_attr($args['id']) );
        foreach ( $args['options'] as $key => $label ) {
            printf( '<option value="%s"%s>%s</option>', sanitize_key($key), selected( $value, $key, false ), esc_html($label) );
        }
        printf( '</select>' );
        printf( '<span class="gs_select_desc"> %s</span>', wp_kses_post($args['desc']) );
    }

    /**
     * Displays a textarea for a settings field
     *
     * @param array   $args settings field args
     */
    function callback_textarea( $args ) {
        $value = $this->get_option( $args['id'], $args['section'], $args['std'] );
        $size = isset( $args['size'] ) && !is_null( $args['size'] ) ? $args['size'] : 'regular';
        printf( '<textarea rows="5" cols="55" class="%1$s-text" id="%2$s[%3$s]" name="%2$s[%3$s]">%4$s</textarea>', esc_attr($size), esc_attr($args['section']), esc_attr($args['id']), esc_textarea($value) );
        printf( '<br><span class="description"> %s</span>', wp_kses_post($args['desc']) );
    }

    /**
     * Displays a textarea for a settings field
     *
     * @param array   $args settings field args
     */
    function callback_html( $args ) {
        echo wp_kses_post( $args['desc'] );
    }

    /**
     * Displays a rich text textarea for a settings field
     *
     * @param array   $args settings field args
     */
    function callback_wysiwyg( $args ) {

        $value = $this->get_option( $args['id'], $args['section'], $args['std'] );
        $size = isset( $args['size'] ) && !is_null( $args['size'] ) ? $args['size'] : '500px';

        echo '<div style="width: ' . esc_attr($size) . ';">';

        wp_editor( wp_kses_post($value), sanitize_key($args['section']) . '-' . sanitize_key($args['id']) . '', array( 'teeny' => true, 'textarea_name' => sanitize_key($args['section']) . '[' . sanitize_key($args['id']) . ']', 'textarea_rows' => 10 ) );

        echo '</div>';

        echo sprintf( '<br><span class="description"> %s</span>', wp_kses_post($args['desc']) );
    }

    /**
     * Displays a file upload field for a settings field
     *
     * @param array   $args settings field args
     */
    function callback_file( $args ) {
        $value = $this->get_option( $args['id'], $args['section'], $args['std'] );
        $size = isset( $args['size'] ) && !is_null( $args['size'] ) ? $args['size'] : 'regular';
        printf( '<input type="text" class="%1$s-text wpsa-url" id="%2$s[%3$s]" name="%2$s[%3$s]" value="%4$s"/>', esc_attr($size), esc_attr($args['section']), esc_attr($args['id']), esc_attr($value) );
        echo '<input type="button" class="button wpsa-browse" value="'.__( 'Browse' ).'" />';
        sprintf( '<span class="description"> %s</span>', wp_kses_post($args['desc']) );
    }

    /**
     * Displays a password field for a settings field
     *
     * @param array   $args settings field args
     */
    function callback_password( $args ) {
        $value = $this->get_option( $args['id'], $args['section'], $args['std'] );
        $size = isset( $args['size'] ) && !is_null( $args['size'] ) ? $args['size'] : 'regular';
        printf( '<input type="password" class="%1$s-text" id="%2$s[%3$s]" name="%2$s[%3$s]" value="%4$s"/>', esc_attr($size), esc_attr($args['section']), esc_attr($args['id']), esc_attr($value) );
        printf( '<span class="description"> %s</span>', wp_kses_post($args['desc']) );
    }

    /**
     * Displays a color picker field for a settings field
     *
     * @param array   $args settings field args
     */
    function callback_color( $args ) {
        $value = $this->get_option( $args['id'], $args['section'], $args['std'] );
        $size = isset( $args['size'] ) && !is_null( $args['size'] ) ? $args['size'] : 'regular';
        printf( '<input type="text" class="%1$s-text wp-color-picker-field" id="%2$s[%3$s]" name="%2$s[%3$s]" value="%4$s" data-default-color="%5$s" />', esc_attr($size), esc_attr($args['section']), esc_attr($args['id']), esc_attr($value), esc_attr($args['std']) );
        printf( '<span class="description" style="display:block;"> %s</span>', wp_kses_post($args['desc']) );
    }

    /**
     * Sanitize callback for Settings API
     */
    function sanitize_options( $options ) {
        foreach( $options as $option_slug => $option_value ) {
            $sanitize_callback = $this->get_sanitize_callback( $option_slug );

            // If callback is set, call it
            if ( $sanitize_callback ) {
                $options[ $option_slug ] = call_user_func( $sanitize_callback, $option_value );
                continue;
            }
        }

        return $options;
    }

    /**
     * Get sanitization callback for given option slug
     *
     * @param string $slug option slug
     *
     * @return mixed string or bool false
     */
    function get_sanitize_callback( $slug = '' ) {
        if ( empty( $slug ) ) {
            return false;
        }

        // Iterate over registered fields and see if we can find proper callback
        foreach( $this->settings_fields as $section => $options ) {
            foreach ( $options as $option ) {
                if ( $option['name'] != $slug ) {
                    continue;
                }

                // Return the callback name
                return isset( $option['sanitize_callback'] ) && is_callable( $option['sanitize_callback'] ) ? $option['sanitize_callback'] : false;
            }
        }

        return false;
    }

    /**
     * Get the value of a settings field
     *
     * @param string  $option  settings field name
     * @param string  $section the section name this field belongs to
     * @param string  $default default text if it's not found
     * @return string
     */
    function get_option( $option, $section, $default = '' ) {

        $options = get_option( $section );

        if ( isset( $options[$option] ) ) {
            return $options[$option];
        }

        return $default;
    }

    /**
     * Show navigations as tab
     *
     * Shows all the settings section labels as tab
     */
    function show_navigation() {
        echo '<h2 class="nav-tab-wrapper">';
        foreach ( $this->settings_sections as $tab ) {
            printf( '<a href="#%1$s" class="nav-tab" id="%1$s-tab">%2$s</a>', esc_attr($tab['id']), esc_attr($tab['title']) );
        }
        echo '</h2>';
    }

    /**
     * Show the section settings forms
     *
     * This function displays every sections in a different form
     */
    function show_forms() {
        ?>
        <div class="metabox-holder">
            <div class="postbox">
                <?php foreach ( $this->settings_sections as $form ) { ?>
                    <div id="<?php echo esc_attr( $form['id'] ); ?>" class="group">
                        <form method="post" action="options.php">

                            <?php do_action( 'wsa_form_top_' . $form['id'], $form ); ?>
                            <?php settings_fields( $form['id'] ); ?>
                            <?php do_settings_sections( $form['id'] ); ?>
                            <?php do_action( 'wsa_form_bottom_' . $form['id'], $form ); ?>

                            <div style="padding-left: 10px">
                                <?php submit_button(); ?>
                            </div>
                        </form>
                    </div>
                <?php } ?>
            </div>
        </div>
        <?php
        $this->script();
    }

    /**
     * Tabbable JavaScript codes & Initiate Color Picker
     *
     * This code uses localstorage for displaying active tabs
     */
    function script() {

        ?>

        <script>

            jQuery(function($) {

                // Initiate Color Picker
                $('.wp-color-picker-field').wpColorPicker();

                // Switches option sections
                $('.group').hide();

                var activetab = '';
                
                if ( typeof(localStorage) != 'undefined' ) {
                    activetab = localStorage.getItem("activetab");
                }

                if ( activetab != '' && $(activetab).length ) {
                    $(activetab).fadeIn();
                } else {
                    $('.group:first').fadeIn();
                }

                $('.group .collapsed').each(function(){

                    $(this).find('input:checked').parent().parent().parent().nextAll().each( function() {
                        if ( $(this).hasClass('last') ) {
                            $(this).removeClass('hidden');
                            return false;
                        }
                        $(this).filter('.hidden').removeClass('hidden');
                    });

                });

                if ( activetab != '' && $(activetab + '-tab').length ) {
                    $(activetab + '-tab').addClass('nav-tab-active');
                } else {
                    $('.nav-tab-wrapper a:first').addClass('nav-tab-active');
                }

                $('.nav-tab-wrapper a').on( 'click', function(evt) {
                    
                    evt.preventDefault();

                    $('.nav-tab-wrapper a').removeClass('nav-tab-active');
                    $(this).addClass('nav-tab-active').blur();
                    
                    var clicked_group = $(this).attr('href');

                    if ( typeof(localStorage) != 'undefined' ) {
                        localStorage.setItem("activetab", $(this).attr('href'));
                    }

                    $('.group').hide();
                    $(clicked_group).fadeIn();

                });

                var file_frame = null;

                $('.wpsa-browse').on('click', function (event) {
                    event.preventDefault();

                    var self = $(this);

                    // If the media frame already exists, reopen it.
                    if ( file_frame ) {
                        file_frame.open();
                        return false;
                    }

                    // Create the media frame.
                    file_frame = wp.media.frames.file_frame = wp.media({
                        title: self.data('uploader_title'),
                        button: {
                            text: self.data('uploader_button_text'),
                        },
                        multiple: false
                    });

                    file_frame.on('select', function () {
                        attachment = file_frame.state().get('selection').first().toJSON();

                        self.prev('.wpsa-url').val(attachment.url);
                    });

                    // Finally, open the modal
                    file_frame.open();
                });

                // for slider
                var $document   = $(document),
                    $inputRange = $('input[type="range"]');
                
                // Example functionality to demonstrate a value feedback
                function valueOutput(element) {
                    var value = element.value,
                        output = element.parentNode.getElementsByTagName('output')[0];
                    output.innerHTML = value;
                }
                for (var i = $inputRange.length - 1; i >= 0; i--) {
                    valueOutput($inputRange[i]);
                };
                $document.on('change', 'input[type="range"]', function(e) {
                    valueOutput(e.target);
                });
                // end
                
                $inputRange.rangeslider({
                    polyfill: false 
                });
                
                // for switch
                $('.wpb_switch').switchButton({
                    width: 50,
                    height: 20,
                    button_width: 25
                });

            });
        
        </script>

        <style type="text/css">
            .form-table th { padding: 20px 10px; }
            #wpbody-content .metabox-holder { padding-top: 5px; }
        </style>

        <?php

    }

}