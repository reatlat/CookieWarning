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
	?>
	<script language="JavaScript" type="text/javascript" >
	
/////////////////////////////////////////////////////////////
//
// Cookie warning script by Scott Herbert (scott-herbert.com)
//
// Download it from http://adf.ly/IvElY


	function getCookie(c_name)
{
var i,x,y,ARRcookies=document.cookie.split(";");
for (i=0;i<ARRcookies.length;i++)
  {
  x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
  y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
  x=x.replace(/^\s+|\s+$/g,"");
  if (x==c_name)
    {
    return unescape(y);
    }
  }
}


function displayNotification()
{

// this sets the page background to semi-transparent black should work with all browsers
var message = "<?php echo get_option('sh_cookieWarningMessage'); ?>";

var answer = confirm(message)
	if (answer){
		setCookie("jsCookieCheck",null,365);
	}
	else{
		window.location = "http://www.google.com/";
	}
}

function setCookie(c_name,value,exdays)
{
var exdate=new Date();
exdate.setDate(exdate.getDate() + exdays);
var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
document.cookie=c_name + "=" + c_value;

// set cookiewarning to hidden.
var cw = document.getElementById("cookiewarning");
cw.innerHTML = "";
}

function checkCookie()
{

var cookieName="jsCookieCheck";
var cookieChk=getCookie(cookieName);
if (cookieChk!=null && cookieChk!="")
  {
  // the jsCookieCheck cookie exists so we can assume the person has read the notification
  // within the last year
  
  setCookie(cookieName,cookieChk,365);	// set the cookie to expire in a year.
  }
else 
  {
  // No cookie exists, so display the pop-up notification.
  displayNotification();	
  }
}

checkCookie();
	</script>
	<?php
	}

}





function sh_cookieWarning_body(){


	if(get_option('sh_cookieWarningStyle')=="1"){
	?>
	<script language="JavaScript" type="text/javascript" >
/////////////////////////////////////////////////////////////
//
// Cookie warning script by Scott Herbert (scott-herbert.com)
//
// Download it from http://adf.ly/IvElY


function getCookie(c_name)
{
var i,x,y,ARRcookies=document.cookie.split(";");
for (i=0;i<ARRcookies.length;i++)
  {
  x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
  y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
  x=x.replace(/^\s+|\s+$/g,"");
  if (x==c_name)
    {
    return unescape(y);
    }
  }
}


function displayNotification()
{

// this sets the page background to semi-transparent black should work with all browsers
var message = "<div id='cookiewarning' ><div style='z-index:999; position:absolute; width:100%;height:100%;background: rgb(0, 0, 0) transparent;background: rgba(0, 0, 0, 0.6);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000);-ms-filter: \"progid:DXImageTransform.Microsoft.gradient(startColorstr=#99000000, endColorstr=#99000000)\"'>";

// center vert
message = message + "<div style='margin:19%;padding:10px;width:62%;height:62%;background:white;color:black'>";

// this is the message displayed to the user.
message = message + "<?php echo nl2br(get_option('sh_cookieWarningMessage')) ; ?>";
	
	
// Displays the I agree/disagree buttons.
// Feel free to change the address of the I disagree redirection to either a non-cookie site or a Google or the ICO web site 
message = message + "<INPUT TYPE='button' VALUE='I Agree' onClick='JavaScript:setCookie(\"jsCookieCheck\",null,365);' /> <INPUT TYPE='button' VALUE=\"I don't agree\" onClick='JavaScript:window.location = \"http://www.google.com/\"' />";

	
// and this closes everything off.
message = message + "</div></div></div>";


document.writeln(message);


}

function setCookie(c_name,value,exdays)
{
var exdate=new Date();
exdate.setDate(exdate.getDate() + exdays);
var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
document.cookie=c_name + "=" + c_value;

// set cookiewarning to hidden.
var cw = document.getElementById("cookiewarning");
cw.innerHTML = "";
}

function checkCookie()
{

var cookieName="jsCookieCheck";
var cookieChk=getCookie(cookieName);
if (cookieChk!=null && cookieChk!="")
  {
  // the jsCookieCheck cookie exists so we can assume the person has read the notification
  // within the last year
  
  setCookie(cookieName,cookieChk,365);	// set the cookie to expire in a year.
  }
else 
  {
  // No cookie exists, so display the lightbox effect notification.
  displayNotification();	
  }
}

checkCookie();


	
	</script>
	<?php
	} elseif(get_option('sh_cookieWarningStyle')=="2") {
	?>
	<script language="JavaScript" type="text/javascript" >
/////////////////////////////////////////////////////////////
//
// Cookie warning script
//
// Download it from http://adf.ly/IvElY

function getCookie(c_name)
{
var i,x,y,ARRcookies=document.cookie.split(";");
for (i=0;i<ARRcookies.length;i++)
  {
  x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
  y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
  x=x.replace(/^\s+|\s+$/g,"");
  if (x==c_name)
    {
    return unescape(y);
    }
  }
}


function displayNotification()
{

// this sets the page background to semi-transparent black should work with all browsers
var message = "<div id='cookiewarning' >";

// center vert
message = message + "<div style='margin:0px;padding:30px;width:100%;height:100px;background:red;color:white'>";

// this is the message displayed to the user.
message = message + "<?php echo nl2br(get_option('sh_cookieWarningMessage')); ?>";
	
	
// Displays the I agree/disagree buttons.
// Feel free to change the address of the I disagree redirection to either a non-cookie site or a Google or the ICO web site 
message = message + "<INPUT TYPE='button' VALUE='I Agree' onClick='JavaScript:setCookie(\"jsCookieCheck\",null,365);' /> <INPUT TYPE='button' VALUE=\"I don't agree\" onClick='JavaScript:window.location = \"http://www.google.com/\"' />";

	
// and this closes everything off.
message = message + "</div></div>";


document.writeln(message);


}

function setCookie(c_name,value,exdays)
{
var exdate=new Date();
exdate.setDate(exdate.getDate() + exdays);
var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
document.cookie=c_name + "=" + c_value;

// set cookiewarning to hidden.
var cw = document.getElementById("cookiewarning");
cw.innerHTML = "";
}

function checkCookie()
{

var cookieName="jsCookieCheck";
var cookieChk=getCookie(cookieName);
if (cookieChk!=null && cookieChk!="")
  {
  // the jsCookieCheck cookie exists so we can assume the person has read the notification
  // within the last year
  
  setCookie(cookieName,cookieChk,365);	// set the cookie to expire in a year.
  }
else 
  {
  // No cookie exists, so display the lightbox effect notification.
  displayNotification();	
  }
}

checkCookie();

	</script>
	<?php
	}
}


