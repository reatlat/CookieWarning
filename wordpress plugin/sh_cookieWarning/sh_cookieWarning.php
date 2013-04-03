<?php
/*
Plugin Name: sh_cookieWarning
Plugin URI: http://adf.ly/IvElY
Description: Automatically generates tag's for new and updated posts
Version: 1.2
Author: Scott herbert
Author URI: http://scott-herbert.com
*/

if ( is_admin() ){
// Add the admin action
add_action('admin_menu', 'sh_cookieWarning_admin_menu');
}
add_action('cookie_header', 'sh_cookieWarning_header');
add_action('cookie_body', 'sh_cookieWarning_body');
add_action( 'admin_init', 'register_cookieWarningsetting' );

function register_cookieWarningsetting() {
	register_setting( 'cookieWarning_options', 'sh_cookieWarningMessage'); 
	register_setting( 'cookieWarning_options', 'sh_cookieWarningStyle'); 
} 


function sh_cookieWarning_admin_menu() {
add_options_page('Cookie Warning', 'Cookie warning settings', 'administrator',
'sh_cookieWarning-slug', 'sh_cookieWarning_html_page');
}

function sh_cookieWarning_html_page() {
if (!current_user_can('manage_options'))  {
	wp_die( __('You do not have sufficient permissions to access this page.') );
} else {
?>
<form method="post" action="options.php">
<?php wp_nonce_field('update-options'); ?>
<?php settings_fields('cookieWarning_options'); ?>
<table width="510">
<tr valign="top">
<th width="192" scope="row">Warning Message</th>
<td width="406">
<textarea name="sh_cookieWarningMessage" id="sh_cookieWarningMessage" rows="10" cols="50" class="large-text code"><?php echo get_option('sh_cookieWarningMessage'); ?></textarea>
</td>
</tr>
<tr valign="top">
<th width="192" scope="row">Select the style</th>
<td width="406">

<input type="radio" name="sh_cookieWarningStyle" value="1" <?PHP if(get_option('sh_cookieWarningStyle')=="1") echo"checked"; ?>/> <img src="<?php
	echo get_option('siteurl') . '/wp-content/plugins/' . basename(dirname(__FILE__)) . '/1.jpg';
?>" /></br>
<input type="radio" name="sh_cookieWarningStyle" value="2" <?PHP if(get_option('sh_cookieWarningStyle')=="2") echo"checked"; ?>/> <img src="<?php
	echo get_option('siteurl') . '/wp-content/plugins/' . basename(dirname(__FILE__)) . '/2.jpg';
?>" /></br>
<input type="radio" name="sh_cookieWarningStyle" value="3" <?PHP if(get_option('sh_cookieWarningStyle')=="3") echo"checked"; ?>/> <img src="<?php
	echo get_option('siteurl') . '/wp-content/plugins/' . basename(dirname(__FILE__)) . '/3.jpg';
?>" /></br>
<input type="radio" name="sh_cookieWarningStyle" value="4" <?PHP if(get_option('sh_cookieWarningStyle')=="4") echo"checked"; ?>/> <img src="<?php
	echo get_option('siteurl') . '/wp-content/plugins/' . basename(dirname(__FILE__)) . '/4.jpg';
?>" /></br>
</td>
</tr>
</table>

<input type="hidden" name="action" value="update" />
<input type="hidden" name="page_options" value="sh_cookieWarningMessage" />
<input type="hidden" name="page_options" value="sh_cookieWarningStyle" />
<p>
<input type="submit" value="<?php _e('Save Changes') ?>" />
</p>

</form>

<?Php
	}
}

function sh_cookieWarning_header(){
	if(get_option('sh_cookieWarningStyle')=="3"){
		echo "<script language=\"JavaScript\" type=\"text/javascript\" src=\"".get_option('siteurl') . "/wp-content/plugins/" . basename(dirname(__FILE__)) . "/js/cookiewarning3.js\"></script>";
	} elseif(get_option('sh_cookieWarningStyle')=="4") {
		echo "<script language=\"JavaScript\" type=\"text/javascript\" src=\"".get_option('siteurl') . "/wp-content/plugins/" . basename(dirname(__FILE__)) . "/js/cookiewarning4.js\"></script>";

	}

}





function sh_cookieWarning_body(){
	if(get_option('sh_cookieWarningStyle')=="1"){
		echo "<script language=\"JavaScript\" type=\"text/javascript\" src=\"".get_option('siteurl') . "/wp-content/plugins/" . basename(dirname(__FILE__)) . "/js/cookiewarning.js\"></script>";
	} elseif(get_option('sh_cookieWarningStyle')=="2") {
		echo "<script language=\"JavaScript\" type=\"text/javascript\" src=\"".get_option('siteurl') . "/wp-content/plugins/" . basename(dirname(__FILE__)) . "/js/cookiewarning2.js\"></script>";

	}
}


