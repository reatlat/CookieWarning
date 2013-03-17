/////////////////////////////////////////////////////////////
//
// Author Scott Herbert (www.scott-herbert.com)
//
// Version History 
// 1 (10-Feb-2013) Inital release on to GitHub.
//
// 2 (12-Mar-2013) Small modification by Dimitri Kourkoulis.
//    This version of the script, keeps visitors on the web site
//    if they decline the use of cookies. However, in that event,
//    the cookie stored in their browser is named 'jsNoCookieCheck'
//    instead of 'jsCookieCheck'. This can be used by the software
//    and/or CMS of the web site to disable cookie producing content.
//    An example of how this has been used in one case on the Umbraco
//    CMS can be found here: 
//    http://dimitros.net/en/blog/complyingwiththecookielaw    
//
// Download from http://adf.ly/IvElY

function getCookie(c_name) {
    var i, x, y, ARRcookies = document.cookie.split(";");
    for (i = 0; i < ARRcookies.length; i++) {
        x = ARRcookies[i].substr(0, ARRcookies[i].indexOf("="));
        y = ARRcookies[i].substr(ARRcookies[i].indexOf("=") + 1);
        x = x.replace(/^\s+|\s+$/g, "");
        if (x == c_name) {
            return unescape(y);
        }
    }
}


function displayNotification() {

    // this sets the page background to semi-transparent black should work with all browsers
    var message = "<div id='cookiewarning' >";

    // center vert
    message = message + "<div style='text-align:center;margin:0px;padding:10px;width:100%;background:white;color:black;font-size:90%;'>";

    // this is the message displayed to the user.
    message = message + "In order for this site to work correctly, and for us to improve the site we need to store a small file (called a cookie) on your computer.<br/> Most every site in the world does this, however it seems that now, by law, we have to get your permission first.<br/> If you click agree below we will store all needed cookies and you'll notice no diffence, if you click on I don't agree (and while you don't click on I agree) we will not store cookies other than the strictly necessary ones. But in that case you will not be able to post comments, see and use social buttons, etc.<br/>";

    // Displays the I agree/disagree buttons.
    // Feel free to change the address of the I disagree redirection to either a non-cookie site or a Google or the ICO web site 
    message = message + "<br /><INPUT TYPE='button' VALUE='I Agree' onClick='JavaScript:doAccept();' /> <INPUT TYPE='button' VALUE=\"I don't agree\" onClick='JavaScript:doNotAccept();' />";

    // and this closes everything off.
    message = message + "</div></div>";

    document.writeln(message);
}

function doAccept() {
    setCookie("jsCookieCheck", null, 365);
    location.reload(true);
}

function doNotAccept() {
    setCookie("jsNoCookieCheck", null, 365);
    location.reload(true);
}

function setCookie(c_name, value, exdays) {
    var exdate = new Date();
    exdate.setDate(exdate.getDate() + exdays);
    var c_value = escape(value) + ((exdays == null) ? "" : "; expires=" + exdate.toUTCString() + "; path=/");
    document.cookie = c_name + "=" + c_value;    
}

function checkCookie() {

    var cookieName = "jsCookieCheck";
    var cookieNameNo = "jsNoCookieCheck";
    var cookieChk = getCookie(cookieName);
    var cookieChkNo = getCookie(cookieNameNo);
    if (cookieChk != null && cookieChk != "") {
        // the jsCookieCheck cookie exists so we can assume the person has read the notification
        // within the last year and has accepted the use of cookies

        setCookie(cookieName, cookieChk, 365); // set the cookie to expire in a year.
    }
    else if (cookieChkNo != null && cookieChkNo != "") {
        // the jsNoCookieCheck cookie exists so we can assume the person has read the notification
        // within the last year and has declined the use of cookies

        setCookie(cookieNameNo, cookieChkNo, 365); // set the cookie to expire in a year.
    }
    else {
        // No cookie exists, so display the lightbox effect notification.
        displayNotification();
    }
}

checkCookie();
