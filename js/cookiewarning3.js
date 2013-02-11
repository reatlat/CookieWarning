/////////////////////////////////////////////////////////////
//
// @author Scott Herbert (www.scott-herbert.com)
//
// Version History 
// (10-Feb-2013) Inital release on to GitHub
//
// Download from http://adf.ly/IvElY


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
var message = "In order for this site to work correctly, and for us to improve the site we need to store a small file (called a cookie) on your computer. Most every site in the world does this, however since the 25th of May 2011, by law we have to get your permission first. If you click agree below we will store cookies and you'll notice no diffence, if you click on I don't agree then this site won't work so we'll re-direct you to Google";

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

