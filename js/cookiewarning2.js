/////////////////////////////////////////////////////////////
//
// Author Scott Herbert (www.scott-herbert.com)
//
// Version History 
// 1 (19-June-2011) Inital release on to Google code.
//
//
//


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
message = message + "In order for this site to work correctly, and for us to improve the site we need to store a small file (called a cookie) on your computer.<br/> Most every site in the world does this, however since the 25th of May 2011, by law we have to get your permission first.<br/> If you click agree below we will store cookies and you'll notice no diffence, if you click on I don't agree then this site won't work so we'll re-direct you to Google<br/>";
	
	
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

