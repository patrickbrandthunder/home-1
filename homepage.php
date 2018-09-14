<?php
//include("variables.php");
//if(empty($_SERVER['https']) || $_SERVER['https'] == "off"){
//    $redirect = 'https://' . $_SERVER['https_HOST'] . $_SERVER['REQUEST_URI'];
//    header('https/1.1 301 Moved Permanently');
//    header('Location: ' . $redirect);
//    exit();
//}

//$snow = true;

// Not sure if we'll need Apple store stuff, comment out for now
//if (!isset($appID)) {
//  if ($tid != 'bobmarley' &&
//      $tid != 'bobmarley2013' &&
//      $tid != 'blackhawks' &&
//      $tid != 'nfltexans' &&
//      $tid != 'ziggymarley') {
//    $appID = '917512241';
//  }
//}

// Set device type, will be used elsewhere to display content
include_once("global/inc/Mobile_Detect.php");
$detect = new Mobile_Detect;
$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');

// This looks like a Chrome store ID
if (!isset($extensionID)) {
  $extensionID = 'gjgpklibihonndjdhpkkbefifghlknoh';
}

// Can probably get rid of the theme offer (no themes), and shopping
//$chromeShopping = false;


if (!isset($lightboxChromeOnly)) {
  $lightboxChromeOnly = false;
}

if (!isset($alwaysAd)) {
  $alwaysAd = "false";
}
if (!isset($dontShowAd)) {
  $dontShowAd = "false";
}
if (!isset($chromeRating)) {
  $chromeRating = false;
}
if (0) {
$lightboxContent = <<<EOD
<style>
#cboxBottomLeft,
#cboxBottomRight,
#cboxTopRight,
#cboxTopLeft,
#cboxBottomCenter,
#cboxTopCenter,
#cboxRightCenter,
#cboxMiddleRight,
#cboxMiddleLeft,
#cboxLeftCenter {
  display: none;
}
#cboxContent {
    background: none !important;
}
#cboxOverlay {
    opacity: 0 !important;
}
#cboxClose {
  top: 0px !important;
  right: 0px !important;
  background-color: transparent;
}
</style>
EOD;
$lightboxAddlParams = '';
$lightboxOpener = '';
$lightboxCookie = 'sharing_10_2017_'.$tid;
}
$chromecachefile = '../chromestore.json';
//$iecachefile = '../iebuilds.json';
$firefoxcachefile = '../ffxpi.json';
$cachetime = 30*60; // 30 minutes * 60 seconds
if (file_exists($chromecachefile) && (time() - $cachetime < filemtime($chromecachefile))) {
  $chromeStore = json_decode(file_get_contents($chromecachefile));
} else {
  $url = 'https://spreadsheets.google.com/feeds/list/1u9qyFx4gkT3xZbfans0ezFMqUuy8GYG7YP5eFwj517U/1/public/values?alt=json';
  $file= file_get_contents($url);
  $json = json_decode($file);
  $rows = $json->{'feed'}->{'entry'};
  $chromeStore = new stdClass();
  foreach($rows as $row) {
    $chromestoreid = $row->{'gsx$chromestoreid'}->{'$t'};
    if ($chromestoreid && strlen($chromestoreid) != 0) {
      $temptid = $row->{'gsx$tid'}->{'$t'};
      $chromeStore->$temptid = $chromestoreid;
    }
  }
  $fp = fopen($chromecachefile, 'w');
  fwrite($fp, json_encode($chromeStore));
  fclose($fp);
}

if (isset($_GET['extension'])) {
//if (file_exists($iecachefile) && (time() - $cachetime < filemtime($iecachefile))) {
//  $ieBuilds = json_decode(file_get_contents($iecachefile));
//} else {
//  $url = 'https://spreadsheets.google.com/feeds/list/1u9qyFx4gkT3xZbfans0ezFMqUuy8GYG7YP5eFwj517U/1/public/values?alt=json';
//  $file= file_get_contents($url);
//  $json = json_decode($file);
//  $rows = $json->{'feed'}->{'entry'};
//  $ieBuilds = new stdClass();
//  foreach($rows as $row) {
//    $ie = $row->{'gsx$ie'}->{'$t'};
//    if ($ie && strlen($ie) != 0) {
//      $temptid = $row->{'gsx$tid'}->{'$t'};
//      $ieBuilds->$temptid = true;
//    }
//  }
//  $fp = fopen($iecachefile, 'w');
//  fwrite($fp, json_encode($ieBuilds));
//  fclose($fp);
//}

if (file_exists($firefoxcachefile) && (time() - $cachetime < filemtime($firefoxcachefile))) {
  $ffXPIs = json_decode(file_get_contents($firefoxcachefile));
} else {
  $url = 'https://spreadsheets.google.com/feeds/list/1u9qyFx4gkT3xZbfans0ezFMqUuy8GYG7YP5eFwj517U/1/public/values?alt=json';
  $file= file_get_contents($url);
  $json = json_decode($file);
  $rows = $json->{'feed'}->{'entry'};
  $ffXPIs = new stdClass();
  foreach($rows as $row) {
    $xpiurl = $row->{'gsx$xpiurl'}->{'$t'};
    if ($xpiurl && strlen($xpiurl) != 0) {
      $temptid = $row->{'gsx$tid'}->{'$t'};
      $ffXPIs->$temptid = $xpiurl;
    }
  }
  $fp = fopen($firefoxcachefile, 'w');
  fwrite($fp, json_encode($ffXPIs));
  fclose($fp);
}

  $chromeShopping = false;
  $dontShowAd = "true";
  $appleStoreURL = 'https://itunes.apple.com/us/app/my-web/id917512241?mt=8';
  $playStoreURL = '';
  $extensionID = '';
  if (array_key_exists($tid, $chromeStore)) {
	$extensionID = $chromeStore->$tid;
  }
  //if (array_key_exists($tid, $ieBuilds)) {
  //  $ieURL = 'https://downloads.mgrowth.com/ie/setup-'.$tid.'persona.exe';
  //} else {
  //  $ieURL = '';
  //}
//  $xpiURL = 'https://downloads.mgrowth.com/'.$tid.'persona.xpi';
  if (!isset($xpiURL)) {
    if (array_key_exists($tid, $ffXPIs)) {
      $xpiURL = $ffXPIs->$tid;
    } else {
      $xpiURL = 'https://addons.mozilla.org/firefox/downloads/latest/myweb-new-tab/addon-687563-latest.xpi?src=extra-'.$tid;
    }
  }
  if ($deviceType == 'tablet' || $deviceType == 'phone') {
//    $lightboxContent = <<<EOD
//    <script type="text/javascript">
//      function onExtensionClick() {
//        _gaq.push(['_trackEvent', 'Extension Install Mobile', 'Click', '{$tid}']);
//        createCookie('setnewtab', '${tid}', 1);
//		var iOS = /iPad|iPhone|iPod/.test( navigator.userAgent );
//		if (iOS) {
//		  document.location.href = "{$appleStoreURL}";
//		} else {
//		  document.location.href = "{$playStoreURL}";
//		}
//        $.fn.colorbox.close();
//      }
//    </script>
//  <div id="extensiontext" style="text-align: center; padding: 10px; width: 300px; height: 125px; color: black;">
//<p style="font-size: 100%;margin:0px;padding:0px;line-height: 1.2;
//font-family: Helvetica,Arial,sans-serif;">Do you want to see this page when you open a new tab?</p><br/>
//<a href="#" onclick="onExtensionClick();"><img src="/images/yes_button.png"></a>
//  </div>
//EOD;

  } else {
//    $holiday_temp =(isset($holiday) && !isset($_GET['extension'])) ? 'true' : 'false';
//    $lightboxContent = <<<EOD
//    <script type="text/javascript">
//      function onExtensionClick() {
//        _gaq.push(['_trackEvent', 'Extension Install', 'Click', '{$tid}']);
//        createCookie('setnewtab', '${tid}');
//        if (!("mynewtab" in window)) {
//          if ("chrome" in window) {
//            if ("webstore" in window.chrome) {
//              chrome.webstore.install("https://chrome.google.com/webstore/detail/$extensionID", function() {}, function(e) {console.log(e)});
//            } else {
//        document.getElementById("extensiontext").innerHTML = "<p style='line-height: 1.5'>Go to Settings and " +
//        "set your homepage to</p><div style='margin-top: 10px;margin-bottom:10px;font-size: 12px;'><b>https://home.mgrowth.com/{$tid}</b></div>"
//    window.setTimeout(function() {
//      $.fn.colorbox({
//            onLoad: showLightboxContent,
//            onCleanup: hideLightboxContent,
//            scrolling: false,
//            inline:true,
//            overlayClose: false,
//            href:"#lightbox-content"
//          });
//        }, 500);
//            }
//          } else if (navigator.userAgent.toLowerCase().indexOf('firefox') > -1) {
//            if (!("mynewtab" in window)) {
//              var params = {
//                "My Web": { URL: "{$xpiURL}",
//                       toString: function () { return this.URL; }
//                }
//              };
//              InstallTrigger.install(params);
//            }
//          } else if ((navigator.userAgent.indexOf("MSIE") > -1 || navigator.userAgent.indexOf("Trident") > -1)) {
//            if ("{$ieURL}") {
//              document.location.href = "{$ieURL}"
//            } else {
//              document.getElementById("extensiontext").innerHTML = "<p style='line-height: 1.5'>Go to Internet Options. " +
//                  "Set your Home page to: </p><div style='margin-top: 10px;margin-bottom:10px;font-size: 12px;'><b>https://home.mgrowth.com/{$tid}</b></div>" +
//                  "<p>Click Tabs. Set it to open your first home page when a new tab is opened.</p>"
//              window.setTimeout(function() {
//                $.fn.colorbox({
//                      onLoad: showLightboxContent,
//                      onCleanup: hideLightboxContent,
//                      scrolling: false,
//                      inline:true,
//                      overlayClose: false,
//                      href:"#lightbox-content"
//                    });
//                  }, 500);
//            }
//		  } else if (navigator.userAgent.indexOf("Safari") > -1) {
//            document.getElementById("extensiontext").innerHTML = "<p style='line-height: 1.5'>Go to Safari->Preferences and " +
//            "set your homepage to</p><div style='margin-top: 10px;margin-bottom:10px;font-size: 12px;'><b>https://home.mgrowth.com/{$tid}</b></div><p>on the General tab.</p>"
//		    window.setTimeout(function() {
//		      $.fn.colorbox({
//                onLoad: showLightboxContent,
//                onCleanup: hideLightboxContent,
//                scrolling: false,
//                inline:true,
//                overlayClose: false,
//                href:"#lightbox-content"
//              });
//            }, 500);
//		  }
//        }
//        $.fn.colorbox.close();
//      }
//    </script>
//  <div id="extensiontext" style="text-align: center; padding: 10px; width: 300px; height: 130px; color: black;">
//<p id="whee" style="font-size: 100%;margin:0px;padding:0px;line-height: 1.2;
//font-family: Helvetica,Arial,sans-serif;">Do you want to see this page when you open a new tab?</p><br/>
//<a href="#" onclick="onExtensionClick();"><img id="extension-button" src="/images/yes_button.png"></a>
//<p style="font-size: smaller" id="firefoxtext"></p>
//  </div>
//  <script type="text/javascript">
//  if (navigator.userAgent.toLowerCase().indexOf('firefox') > -1 && '{$tid}' != 'puppies2015') {
////    document.getElementById("firefoxtext").textContent = "Firefox Exclusive: Includes a theme!";
//  } else if (("chrome" in window) && ("webstore" in window.chrome)) {
//    var button = document.getElementById("extension-button");
//    button.src = "/images/chrome_yes_button.png";
//    button.style.marginTop = "20px";
//    if ({$holiday_temp}) {
//      button.src = "/images/myweb-holiday-small-box.jpg";
//      button.style.marginTop = "";
//      document.getElementById("extensiontext").style.width = "796px";
//      document.getElementById("extensiontext").style.height = "586px";
//      document.getElementById("extensiontext").style.padding = "0";
//      document.getElementById("whee").style.display = "none";
//    }
//    
//  }
//  </script>
//EOD;
  }
  $lightboxOpener = '';
  // NEED TO TURN OFF AD AS WELL
}
include('homepage.new.php');
exit();
