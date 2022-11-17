<?php
/**
* Plugin Name: Change Password Protected Message
* Plugin URI: https://www.pipdig.co/
* Description: Change the message displayed on content which is Password Protected.
* Author: pipdig
* Author URI: https://www.pipdig.co/
* Version: 2.1.0
*/

if (!defined('ABSPATH')) die;

// Remove "Protected: " from title
function pipdig_cppm_remove_protected_title() {
	return '%s';
}
add_filter('private_title_format', 'pipdig_cppm_remove_protected_title');
add_filter('protected_title_format', 'pipdig_cppm_remove_protected_title');


// Filter the markup of the form on password pages
function pipdig_cppm_filter_text($output) {
	
	$options = get_option('pipdig_pw_text');
	$post_specific_msg = get_post_meta(get_the_ID(), 'override_password_text', true);
	
	// Check if a custom field is set for this page
	if ($post_specific_msg) {
		$message = $post_specific_msg;
	} elseif (!empty($options['text_value'])) {
		$message = $options['text_value'];
	} else {
		return $output;
	}
	
	// Get the first <p> tag
	$first_paragraph = '';
	if (class_exists('DomDocument')) {
		$doc = new DOMDocument();
		$doc->loadHTML($output);
		foreach ($doc->getElementsByTagName('p') as $paragraph) {
			$first_paragraph = $paragraph->textContent;
			break;
		}
	}
	
	// remove first <p> tag contents, then clear up left over empty <p> tags.
	if ($first_paragraph) {
		$output = str_replace($first_paragraph, '', $output);
		$output = str_replace('<p class="post-password-message"></p>', '', $output);
		$output = str_replace('<p></p>', '', $output);
	}
	
	if (!empty($options['password_label'])) {
		$new_label = esc_html($options['password_label']);
		$output = str_replace('Password', $new_label, $output);
	}
	
	return '<div id="cppm_message_'.get_the_ID().'" class="cppm_message post-password-message">'.wp_kses_post(wpautop($message)).'</div>'.$output;
}
add_filter('the_password_form', 'pipdig_cppm_filter_text', 999999);


// Add settings link to plugins page
function pipdig_cppm_settings_link($links) {
	$links[] = '<a href="'.get_admin_url(null, 'options-reading.php#pipdig_cppm').'">'.__('Settings').'</a>';
	return $links;
}
add_filter('plugin_action_links_'.plugin_basename(__FILE__), 'pipdig_cppm_settings_link');


// Register and define the settings
function pipdig_cppm_settings() {
	
	register_setting(
		'reading',
		'pipdig_pw_text',
		'pipdig_cppm_settings_validate'
	);
	
	add_settings_field(
		'text_value',
		'Password Protected message',
		'pipdig_cppm_message_input',
		'reading',
		'default'
	);
	
	add_settings_field(
		'password_label',
		'Password label',
		'pipdig_cppm_password_input',
		'reading',
		'default'
	);

}
add_action('admin_init', 'pipdig_cppm_settings');


function pipdig_cppm_message_input() {
	
	$options = get_option('pipdig_pw_text');
	
	$value = __('This content is password protected. To view it please enter your password below:');
	
	if (!empty($options['text_value'])) {
		$value = wp_kses_post($options['text_value']);
	}
	
	echo '<div id="pipdig_cppm"></div>';
	
	$editor_args = array(
		'tinymce' => array(
			'toolbar1' => 'fontsizeselect,fontselect,bold,italic,underline,forecolor,bullist,numlist,alignleft,aligncenter,alignright,link,unlink',
			'toolbar2' => '',
			'toolbar3' => '',
		),
		'media_buttons' => false,
		'textarea_name' => 'pipdig_pw_text[text_value]',
	);
	
	wp_editor($value, 'pipdig_pw_text', $editor_args);
	
	//echo '<p class="description">Have you found <a href="https://wordpress.org/plugins/change-password-protected-message/" target="_blank" rel="noopener">this plugin</a> useful? You might like to <a href="https://wordpress.org/support/plugin/change-password-protected-message/reviews/#new-post" target="_blank" rel="noopener">add a quick review</a>. If you have a feature request or need any help please post in the <a href="https://wordpress.org/support/plugin/change-password-protected-message/" target="_blank" rel="noopener">support forum</a> :)</p>';
	
	echo '<p class="description">This will replace the text shown above the password field on Password Protected pages.</p>';
	
}

function pipdig_cppm_password_input() {
	
	$options = get_option('pipdig_pw_text');
	
	$value = '';
	
	if (!empty($options['password_label'])) {
		$value = sanitize_text_field($options['password_label']);
	}
	
	?>
	<div id="pipdig_cppm"></div>
	<input type="text" id="password_label" name="pipdig_pw_text[password_label]" class="large-text" value="<?php echo $value; ?>" placeholder="Password">
	<p class="description">This will replace the label for the password field. Like <a href="https://pipdigz.co.uk/other/password_input_label.png" target="_blank" rel="noopener">this example</a>.</p>
	<?php
}

function pipdig_cppm_settings_validate($input) {
	return array(
		'text_value' => wp_kses_post($input['text_value']),
		'password_label' => wp_kses_post($input['password_label']),
	);
}


/*
function pipdig_cppm_footer_script() {
	?>
	<script>
	jQuery(document).ready(function($) {
		$('.post-password-form').find('label').html('hey');
	});
	</script>
	<?php
}
add_action('wp_footer', 'pipdig_cppm_footer_script', 99999);
*/