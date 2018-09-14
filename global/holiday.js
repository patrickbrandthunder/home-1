/*
Snow Fall 1 - no images - Java Script
Visit http://rainbow.arch.scriptmania.com/scripts/
  for this script and many more
*/

// Set the number of snowflakes (more than 30 - 40 not recommended)
var snowmax=35

// Set the colors for the snow. Add as many colors as you like
var snowcolor=new Array("#aaaacc","#ddddff","#ccccdd","#f3f3f3","#f0ffff")

// Set the fonts, that create the snowflakes. Add as many fonts as you like
var snowtype=new Array("Times","Arial","Times","Verdana")

// Set the letter that creates your snowflake (recommended: * )
var snowletter="*"

// Set the speed of sinking (recommended values range from 0.3 to 2)
var sinkspeed=0.6

// Set the maximum-size of your snowflakes
var snowmaxsize=30

// Set the minimal-size of your snowflakes
var snowminsize=8

// Set the snowing-zone
// Set 1 for all-over-snowing, set 2 for left-side-snowing
// Set 3 for center-snowing, set 4 for right-side-snowing
var snowingzone=1

///////////////////////////////////////////////////////////////////////////
// CONFIGURATION ENDS HERE
///////////////////////////////////////////////////////////////////////////


// Do not edit below this line
var snow=new Array()
var marginbottom
var marginright
var timer
var i_snow=0
var x_mv=new Array();
var crds=new Array();
var lftrght=new Array();
var browserinfos=navigator.userAgent
var ie5=document.all&&document.getElementById&&!browserinfos.match(/Opera/)
var ns6=document.getElementById&&!document.all
var opera=browserinfos.match(/Opera/)
var browserok=ie5||ns6||opera
var snowing = true;

function randommaker(range) {
        rand=Math.floor(range*Math.random())
    return rand
}

function initsnow() {
        createSnowFlakes();
        snowing = true;
        if (ie5 || opera) {
                marginbottom = document.body.scrollHeight
                marginright = document.body.clientWidth-15
        }
        else if (ns6) {
                marginbottom = document.body.scrollHeight
                marginright = window.innerWidth-15
        }
        var snowsizerange=snowmaxsize-snowminsize
        for (i=0;i<=snowmax;i++) {
                crds[i] = 0;
            lftrght[i] = Math.random()*15;
            x_mv[i] = 0.03 + Math.random()/10;
                snow[i]=document.getElementById("s"+i)
                snow[i].style.fontFamily=snowtype[randommaker(snowtype.length)]
                snow[i].size=randommaker(snowsizerange)+snowminsize
                snow[i].style.fontSize=snow[i].size+'px';
                snow[i].style.color=snowcolor[randommaker(snowcolor.length)]
                snow[i].style.zIndex=1000
                snow[i].sink=sinkspeed*snow[i].size/5
                if (snowingzone==1) {snow[i].posx=randommaker(marginright-snow[i].size)}
                if (snowingzone==2) {snow[i].posx=randommaker(marginright/2-snow[i].size)}
                if (snowingzone==3) {snow[i].posx=randommaker(marginright/2-snow[i].size)+marginright/4}
                if (snowingzone==4) {snow[i].posx=randommaker(marginright/2-snow[i].size)+marginright/2}
                snow[i].posy=randommaker(2*marginbottom-marginbottom-2*snow[i].size)
                snow[i].style.left=snow[i].posx+'px';
                snow[i].style.top=snow[i].posy+'px';
        }
        movesnow()
}

var snowTimer;

function movesnow() {
    if (!snowing)
      return;
        for (i=0;i<=snowmax;i++) {
                crds[i] += x_mv[i];
                snow[i].posy+=snow[i].sink
                snow[i].style.left=snow[i].posx+lftrght[i]*Math.sin(crds[i])+'px';
                snow[i].style.top=snow[i].posy+'px';

                if (snow[i].posy>=marginbottom-2*snow[i].size || parseInt(snow[i].style.left)>(marginright-3*lftrght[i])){
                        if (snowingzone==1) {snow[i].posx=randommaker(marginright-snow[i].size)}
                        if (snowingzone==2) {snow[i].posx=randommaker(marginright/2-snow[i].size)}
                        if (snowingzone==3) {snow[i].posx=randommaker(marginright/2-snow[i].size)+marginright/4}
                        if (snowingzone==4) {snow[i].posx=randommaker(marginright/2-snow[i].size)+marginright/2}
                        snow[i].posy=0
                }
        }
        snowTimer = setTimeout("movesnow()",50)
}

function stopsnow() {
    clearTimeout(snowTimer);
    snowing = false;
    snow = [];
    deleteSnowFlakes();
}

function createSnowFlakes() {
  for (i=0;i<=snowmax;i++) {
    var flake = document.createElement("span");
    flake.setAttribute("id", "s" + i);
    flake.setAttribute("class", "snowflake");
    flake.setAttribute("style", "position:absolute;top:-"+snowmaxsize+ "px");
    flake.textContent = snowletter;
    document.body.appendChild(flake);
  }
}

function deleteSnowFlakes() {
  var flakes = document.querySelectorAll(".snowflake");
  for (var i=0; i < flakes.length; i++) {
    document.body.removeChild(flakes[i]);
  }
}

if (browserok) {
        window.onload= function() {startSnow()};
        window.setTimeout(showHolidayMessage, 100);
}

function startSnow(state, event) {
  if (event) {
    event.preventDefault();
  }
  if (!document.getElementById("mgrowth_snow")) {
    createSnow();
  }
  if (state) {
    var tid = document.getElementById("tid");
    if (tid) {
      _gaq.push(['_trackEvent', 'Snow', state, tid.value]);
    }
  }
  if (!state) {
    state = localStorage["holiday2014Snow"];
    if (!state) {
      state = "light";
    }
    var snowselect = document.getElementById("snowselect");
    if (snowselect) {
      document.getElementById("snowselect").value = state;
    }
  }
  if (state != "facebook" && state != "twitter" )
    localStorage["holiday2014Snow"] = state;
  switch (state) {
        case "off":
                stopsnow();
                break;
        case "light":
                stopsnow();
                snowmax=35;
                snowmaxsize=30;
                snowminsize=8;
                sinkspeed=0.6;
                initsnow();
                break;
        case "steady":
                stopsnow();
                snowmax=150;
                snowmaxsize=30;
                snowminsize=8;
                sinkspeed=0.8;
                initsnow();
                break;
        case "heavy":
                stopsnow();
                snowmax=400;
                snowmaxsize=40;
                snowminsize=20;
                sinkspeed=1;
                initsnow();
                break;
  }
}

function showHolidayMessage() {
  return;
    var holidayScript = document.getElementById("holiday-script");
    var deviceType = holidayScript.getAttribute("deviceType");
    if (deviceType == "tablet" || deviceType == "phone") {
      return;
    }
    var cookie = readCookieHoliday(shareTid + "_holiday2014MessageShown");
    if (0) {
      var searchbox = document.getElementById("searchbox");
      if (!searchbox) {
        searchbox = document.getElementById("form-holder");
      }
      var holidaymessage = document.createElement("div");
      holidaymessage.style.cssText = "position: relative;z-index:1;background-repeat:no-repeat;text-align: center;margin-top: 50px;width: 458px;height:441px;margin-left: auto;margin-right: auto;background-image: url('http://home.mgrowth.com/global/holiday-box-noicons.png');";
      searchbox.parentNode.appendChild(holidaymessage);
      var img = document.createElement("img");
      img.setAttribute("src", "/images/facebook64.png");
      img.setAttribute("width", "32");
      img.setAttribute("height", "32");
      img.style.cssText = "padding-top: 360px;cursor: pointer;position: relative;margin-left: 10px;margin-right:10px;";
      img.addEventListener("click", facebookPost, false);
      holidaymessage.appendChild(img);
      var img = document.createElement("img");

      img.setAttribute("src", "/images/twitter64.png");
      img.setAttribute("width", "32");
      img.setAttribute("height", "32");
      img.style.cssText = "padding-top: 360px;cursor: pointer;position: relative;margin-left: 10px;margin-right:10px;";
      img.addEventListener("click", handleIntent, false);
      holidaymessage.appendChild(img);
      createCookieHoliday(shareTid + "_holiday2014MessageShown", "true", 365*10); // Ten year cookie
    }
}

function createSnow() {
  var style = document.createElement("style");
  style.setAttribute("type", "text/css");
  style.textContent = "" +
"#mgrowth_snow {" +
  "z-index:99999;position: absolute;right:50px;top:20px;" +
  "line-height: 1.2;font-family: Helvetica,Arial,sans-serif;" +
"}" +
"#mgrowth_snow #snow {" +
  "margin: 0px;" +
"}" +
"#mgrowth_snow #snow ul {" +
  "padding-left: 0px;" +
"}" +
"#mgrowth_snow ul li {" +
  "list-style: none;" +
"}" +
"#mgrowth_snow ul li a {" +
	"display: block;" +
	"padding: 3px 8px;" +
	"text-decoration: none;" +
"}" +
 "#mgrowth_snow ul li ul {" +
	"display: none;" +
"}" +
 "#mgrowth_snow ul li:hover ul {" +
	"display: block;" +
  "border: 1px solid black;" +
"}" +
"#mgrowth_snow ul li:hover li a {" +
	"background-color: white;" +
  "color: red;" +
"}" +
"#mgrowth_snow ul li li a:hover {" +
	"background-color: green;" +
	"color: white;" +
"}" +
"#mgrowth_snow #mgrowth_snowbutton {" +
  "background-image: url('http://home.mgrowth.com/images/setsnow-btn-white.png');" +
  "min-width: 129px;" +
  "height: 45px;" +
  "background-repeat: no-repeat;" +
  "background-position: center right;" +
"}";
  var snow = document.createElement("div");
  snow.setAttribute("id", "mgrowth_snow");
  snow.setAttribute("class", "addlContent");
  snow.innerHTML = "" +
"  <ul id=\"snow\">" +
"	<li><div id=\"mgrowth_snowbutton\"></div><ul>" +
"		<li><a onclick=\"startSnow('off', event);\" href=\"#\">Snow OFF</a></li>" +
"		<li><a onclick=\"startSnow('light', event);\" href=\"#\">Light Snow</a></li>" +
"		<li><a onclick=\"startSnow('steady', event);\" href=\"#\">Steady Snow</a></li>" +
"		<li><a onclick=\"startSnow('heavy', event);\" href=\"#\">Heavy Snow</a></li>" +
"	</li>" +
"</ul>";

  document.body.appendChild(snow);
  document.body.appendChild(style);
}

function createCookieHoliday(name,value,days) {
  if (days) {
    var date = new Date();
    date.setTime(date.getTime()+(days*24*60*60*1000));
    var expires = "; expires="+date.toGMTString();
  } else {
    var expires = "";
  }
  document.cookie = name+"="+value+expires+"; path=/";
}
  
function readCookieHoliday(name) {
	if (!name) {
	  return null;
	}
  var nameEQ = name + "=";
  var ca = document.cookie.split(';');
  for(var i=0;i < ca.length;i++) {
    var c = ca[i];
    while (c.charAt(0)==' ') c = c.substring(1,c.length);
      if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
  }
  return null;
}

window.addEventListener("blur", function() {stopsnow();})
window.addEventListener("focus", function() {startSnow();})
