<?php
if (isset($_GET['ad'])) {
  $alwaysAd = 'true';
}
if ($deviceType == 'tablet' || $deviceType == 'phone') {
  $dontShowAd = 'true';
}
if (isset($mobileAd)) {
  $mobileAd = 'true';
  $dontShowAd = 'false';
} else {
  $mobileAd = 'false';
}
$searchType = $tid;
if ( isset($customSearchCode) ) {
    $searchType = $customSearchCode;
}
?>
<!doctype html>
<html lang="en-US" xmlns="https://www.w3.org/1999/xhtml" xmlns:og="https://ogp.me/ns#"
      xmlns:fb="https://www.facebook.com/2008/fbml">
  <head>
	  <script type="text/javascript">var _sf_startpt=(new Date()).getTime()</script>
      <link rel="stylesheet" type="text/css" href="/fonts/mystart-font/mystart-font.css">
<script type="text/javascript">var _sf_startpt=(new Date()).getTime()</script>
    <meta charset="utf-8">
    <meta https-equiv="X-UA-Compatible" content="IE=edge">
		<title><?= $title ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
<?php
if (isset($facebookImage)) {
?>
    <meta property="og:image" content="<?= $facebookImage?>" />
<?php
} else {
?>
    <meta property="og:image" content="<?= $backgroundImage?>" />
<?php
}
?>
  <meta property="og:image:width" content="277" />
  <meta property="og:image:height" content="200" />
<?php
if (isset($_GET['extension'])) {
?>
    <meta property="og:title" content="<?= $title?> New Tab Page" />
    <meta property="og:url" content="https://home.newtabgallery.com/<?=$tid?>/?extension" />
    <meta property="og:description" content="" />
<?php
} else {
?>
    <meta property="og:title" content="<?= $title?>" />
<?php
}
//  if (isset($appID)) {
?>
  <!-- meta name="apple-itunes-app" content="app-id=< ?$appID?>"/ -->
<?php
//}
?>
		<link rel="icon" type="image/png" href="<?= $icon ?>">
    <link rel="stylesheet" href="https://home.newtabgallery.com/global/css/styles.css" type="text/css">
    <link rel="chrome-webstore-item" href="https://chrome.google.com/webstore/detail/<?=$extensionID?>">

    <?php //css overrides ?>
		<?php

		  //error_reporting(E_ALL); // UNCOMMENT WHEN DEVELOPING
		  //
		  //  Set major page properties
		  //

		  // mobile detect. currently we're just turning off the search as it's built into the browser
		  if($deviceType == 'tablet' || $deviceType == 'phone'){
			?>
			<style>
				#form-holder{ display: none; }
				#newsearch-form-holder{ display: none; }
				#module-search{ display: none; }
			</style>
			<?php
		  }
		  //  If "?align" is set, set the background-position property
		  //  for the "body" background image
		  if (isset($_GET['align'])) {
		    $backgroundAlign = $_GET['align'];
		  } else if (!isset($backgroundAlign)) {
			$backgroundAlign = "center";
		  }

		  //  If $backgroundRepeat is not set in index.php, default it
		  //  to no-repeat
		  if (!isset($backgroundRepeat)) {
		    $backgroundRepeat = 'no-repeat';
		  }

		  //  If $backgroundSize is not set in index.php, default it
		  //  to auto auto
		  if (!isset($backgroundSize)) {
		    $backgroundSize = 'auto auto';
		  }

		  //  If $searchBackground is not set in index.php, default it
		  //  to white at 75% opacity
		  if (!isset($searchBackground)) {
		    $searchBackground = 'rgba(255,255,255,0.75)';
		  }


		  //
		  //  Set RSS feed properties
		  //

		  ////  Default the #feed opacity to 90%
		  //if(!isset($feedreaderAlpha)) {
		  //  $feedreaderAlpha = 90;
		  //}
		  //if(!isset($feedBgColor)) {
		  //  $feedBg = "#EEE";
		  //}
		  //if(!isset($feedTitleColor)) {
		  //  $feedTitleColor = "#222";
		  //}
		  if (strpos($backgroundImage, 'url') === false) {
		    $backgroundImage = 'url("'.$backgroundImage.'")';
		  }
		  if (!isset($boomJSONURL)) {
		    $boomJSONURL = '';
		  }

		?>
    <style>
    	#body {
		  height: 100%;
	      background-color: <?=$backgroundColor?>;
	      background-repeat: <?=$backgroundRepeat?>;
	      background-position: <?=$backgroundAlign?>;
	      background-image: <?=$backgroundImage?>;
	      background-size: <?=$backgroundSize?>;
		}
		body {
	      background-color: <?=$backgroundColor?>;
		}
		#body-spacer {
		  height: 0px;
		  background-color: transparent;
		}
		</style>

    <script type="text/javascript" src="https://home.newtabgallery.com/global/js/jquery.min.js"></script>
    <script type="text/javascript" src="https://home.newtabgallery.com/global/js/jquery.watch.min.js"></script>
    <script type="text/javascript" src="https://home.newtabgallery.com/global/js/jquery-ui.custom.min.js"></script>
    <script type="text/javascript" src="https://home.newtabgallery.com/global/js/colorbox/jquery.colorbox-min.js"></script>
    <script type="text/javascript" src="https://home.newtabgallery.com/global/scripts/toolbar.js"></script>
    <script type="text/javascript" src="https://home.newtabgallery.com/global/scripts/weather.js"></script>
<?php
if (!isset($noShare)) {
?>

	<script type="text/javascript">
	var addthis_share = {
	   url: "https://home.newtabgallery.com/<?=$tid?>/?extension",
	   title: "<?= $title?> New Tab Page"
	}

	</script>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=mgrowth" async="async"></script>
<?php
}
?>

        <link rel="stylesheet" href="https://home.home.newtabgallery.com.com/global/css/toolbar.css" type="text/css">

    <!--?php if (isset($snow) || isset($_GET['snow'])) { ?-->
        <!--script type="text/javascript" id="holiday-script" deviceType="< ?=$deviceType?>" src="https://home.newtabgallery.com/global/holiday.js"></script-->
<!-- ? } ? -->

  <script type="text/javascript">
    var _gaq = _gaq || [];
<?php
if (isset($_GET['extension'])) {
?>
    _gaq.push(['_setAccount', '']);
<?
} else {
?>
    _gaq.push(['_setAccount', '']);
<?
}
?>
    _gaq.push(['_trackPageview']);

    (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'https://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
  </script>

    <script type="text/javascript">
    function createCookie(name,value,days) {
    if (days) {
      var date = new Date();
      date.setTime(date.getTime()+(days*24*60*60*1000));
      var expires = "; expires="+date.toGMTString();
    } else {
      var expires = "";
    }
    document.cookie = name+"="+value+expires+"; path=/";
  }

  function readCookie(name) {
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
<?php
  if (0) {
?>

$(document).ready(function() {
	window.setTimeout(function() {
	  var cookie = readCookie("${lightboxCookie}");
	  if (cookie) {
		return;
	  }
	_gaq.push(['_trackEvent', 'Sharing Ad', 'View', '{$tid}']);
    $.fn.colorbox({
            onLoad: showLightboxContent,
            onCleanup: hideLightboxContent,
                onClosed: function() {
                  createCookie("${lightboxCookie}", "false", 365);
                },
            scrolling: false,
            inline:true,
            overlayClose: false,
            href:"#lightbox-content"
      });
	}, 1500);
});
<?php
  }
?>

<?php
  if (isset($_GET['extension']) || isset($_GET['mywebholiday'])) {
?>
  $(document).ready(function() {
    if (("mynewtab" in window) && mynewtab.tid == "<?= $tid ?>") {
      return;
    }
<?php
  if ($deviceType == 'tablet' || $deviceType == 'phone') {
?>
	window.setTimeout(function() {
      $.fn.colorbox({
              onLoad: showLightboxContent,
              onCleanup: hideLightboxContent,
              scrolling: false,
              inline:true,
              overlayClose: false,
              href:"#lightbox-content"
      });
	  _gaq.push(['_trackEvent', 'Extension Install Mobile', 'View', '<?= $tid ?>']);
	}, 2000);
<?php
  } else {
?>

<?php
  }
?>
  });
<?php
  }
?>

  </script>

  <script type="text/javascript">
      var shareTid = "<?=$tid?>";

    // Used for Facebook and footer
    var d = new Date();
    var TWENTY_FOUR_HOURS_MILLIS = 60 * 60 * 24 * 1000;
    //var TWENTY_FOUR_HOURS_MILLIS = 0;

    function setcookie(engine) {
      if (typeof(localStorage) != "undefined")
        localStorage["searchengine"] = engine;
    }
    function closeMenu() {
      var menu = document.getElementById("navbar-menu");
      menu.style.display = "none";
      window.setTimeout(function() {
        menu.style.display = "";
      }, 100);
    }
  </script>


</head>
<body>
  <div id="body">
	<div id="body-spacer">

	</div>
  <img style="opacity: 0;position: absolute;top:0; left:0"
     src="<?= $backgroundImage?>">
<?php
  if (!function_exists('apache_request_headers')) {
    function apache_request_headers() {
      foreach ($_SERVER as $key => $value) {
        if (substr($key, 0, 5) == "https_") {
          $key = str_replace(" ", "-", ucwords(strtolower(str_replace("_", " ", substr($key, 5)))));
          $out[$key] = $value;
        } else {
          $out[$key] = $value;
        }
      }
      return $out;
    }
  }

?>


  <!-- Leave, not shown if not needed -->
  <div id="fb-root"></div>

    <!-- **************************** -->
  <!--    NEW FACEBOOK LOGIN        -->
  <!-- **************************** -->

  <?php if(isset($fbEnabled) && $fbEnabled) { ?>

    <link rel="stylesheet" href="/global/css/facebook.css" type="text/css">
    <link rel="stylesheet" href="/global/css/modal.css" type="text/css">
    <script src="https://home.newtabgallery.com//www.parsecdn.com/js/parse-1.2.16.min.js"></script>
    <script type="text/javascript" src="https://home.newtabgallery.com/global/scripts/facebook_connect.js"></script>

    <?php include_once("global/inc/fb_connect.php"); ?>

  <?php } ?>

      <div id="wrapper">
      <div class="container">
        <div id="header">
        <?php if(isset($icon)): ?>
          <a href="#" id="logo">
            <img src="<?= $icon ?>" style="display: none" alt="" />
          </a>
		<?php endif; ?>

        </div><!-- /header -->

<?php if (isset($extraafter)) { echo $extraafter; } ?>
        <?php /*<a target="_top" href="https://ww2.weatherbug.com/aff/default.asp?zcode=z6702"><img src="https://home.newtabgallery.com/images/weather.png"></a> */ ?>
      </div><!-- /social-buttons -->

<div id="module-search">
<?php if (isset($testSearch)) { ?>
<form action="https://searchroute-1560352588.us-west-2.elb.amazonaws.com/api/mlscnscohext/search" target="_top" method="get" id="form">
<input type="text" id="newsearchinput" placeholder="Search the web" name="p">
<input name="subid" id="subid" type="hidden" value="101">
<?php } else if (isset($testSearch2)) { ?>
<form action="https://myfirsttab.com/api/redirect-search" target="_top" method="get" id="form">
<input type="text" id="newsearchinput" placeholder="Search the web" name="t">
<input name="sid" id="sid" type="hidden" value="3025">
<?php } else if (isset($testSearch3)) { ?>
<form action="https://bt.fastsearch.me/" target="_top" method="get" id="form">
<input type="text" id="newsearchinput" placeholder="Search the web" name="q">
<?php } else { ?>
<form action="https://mgrowth.fastsearch.me/" target="_top" method="get" id="form">
<input type="text" id="newsearchinput" placeholder="Search the web" name="q">
<!--input name="gd" id="gd" type="hidden" value="SY1000885"-->
<?php } ?>
            <div id="btn-search"></div>
</form>
</div>

      </div><!-- /container -->

    </div><!-- /wrapper -->




<script type="text/javascript">
  var tid = document.getElementById("tid");
  if (tid && tid.value == "btpersonas") {
    var ev = document.createEvent('Events');
    ev.initEvent('mgrowthEvent', true, false);
    tid.dispatchEvent(ev);
  }
  try {
    document.getElementById("searchTerm").focus();
  } catch (e) {}
  try {
    document.getElementById("newsearchinput").focus();
  } catch (e) {}
</script>
<div id="upperleft">
<div id="homepage">
    <img id="content" src="https://home.newtabgallery.com/images/<?=$homeIcon?>">
</div>
</div>
<script>
if (typeof(localStorage) == "undefined")
  document.getElementById("navbar").style.display = "none";
if ("behavior" in document.getElementById("content").style) {
  var homepage = document.getElementById("homepage");
  homepage.style.display = "inline-block";
  if (homepage.addEventListener) {
    homepage.addEventListener("click", function(event) {event.target.setHomePage(document.location.href)})
  } else {
    homepage.attachEvent("click", function(event) {event.target.setHomePage(document.location.href)})
  }
}
</script>
<?php
if (isset($addlContent))
  echo $addlContent;
?>
<?
if (isset($game)) {
?>
<img id="game-close" onclick="onGame(event)" style="cursor:pointer;position: absolute;top: 5px; right: 5px;" class="addlContent" src="<?=$protocol?>://home.newtabgallery.com/images/games-close.png">
<img id="game-play" onclick="onGame(event)" style="cursor:pointer;position: absolute;top: 5px; right: 5px;" class="addlContent" src="<?=$protocol?>://home.newtabgallery.com/images/games-play.png">
<script type="text/javascript">
  var gamecookie = readCookie("<?=$tid?>_display");
  if (gamecookie) {
	document.getElementById("game").style.display = gamecookie;
    updateGameButton(gamecookie);
  } else {
    updateGameButton("block");
  }
  function onGame(event) {
	  var game = document.getElementById("game");
	  var display = game.style.display;
	  game.style.display = (display == "none" ? "block" : "none");
	  createCookie("<?=$tid?>_display", game.style.display, 365*10);
	  updateGameButton(game.style.display);
  }
  function updateGameButton(state) {
	  var play = document.getElementById("game-play");
	  var close = document.getElementById("game-close");
	  if (state == "none") {
      close.style.display = "none";
      play.style.display = "block";
    } else {
      close.style.display = "block";
	    play.style.display = "none";
	  }
  }
</script>
<?
}
?>
<?
if (isset($specialContent)) {
?>
<img id="special_content-close" onclick="onGame(event)" style="cursor:pointer;position: absolute;top: 5px; right: 5px;" class="addlContent" src="<?=$protocol?>://home.newtabgallery.com/images/video-close.png">
<img id="special_content-play" onclick="onGame(event)" style="cursor:pointer;position: absolute;top: 5px; right: 5px;" class="addlContent" src="<?=$protocol?>://home.newtabgallery.com/images/video-play.png">
<script type="text/javascript">
  var special_contentcookie = readCookie("<?=$tid?>_display");
  if (special_contentcookie) {
	document.getElementById("special_content").style.display = special_contentcookie;
    updateGameButton(special_contentcookie);
  } else {
    updateGameButton("block");
  }
  function onGame(event) {
	  var special_content = document.getElementById("special_content");
	  var display = special_content.style.display;
	  special_content.style.display = (display == "none" ? "block" : "none");
	  createCookie("<?=$tid?>_display", special_content.style.display, 365*10);
	  updateGameButton(special_content.style.display);
  }
  function updateGameButton(state) {
	  var play = document.getElementById("special_content-play");
	  var close = document.getElementById("special_content-close");
	  if (state == "none") {
      close.style.display = "none";
      play.style.display = "block";
    } else {
      close.style.display = "block";
	    play.style.display = "none";
	  }
  }
</script>
<?
}
?>
<?
if (isset($video)) {
?>
<img id="video-close" onclick="onVideo(event)" style="cursor:pointer;position: absolute;top: 5px; right: 5px;" class="addlContent" src="<?=$protocol?>://home.newtabgallery.com/images/video-close.png">
<img id="video-play" onclick="onVideo(event)" style="cursor:pointer;position: absolute;top: 5px; right: 5px;" class="addlContent" src="<?=$protocol?>://home.newtabgallery.com/images/video-play.png">
<script type="text/javascript">
  var videocookie = readCookie("<?=$tid?>_video");
  if (videocookie) {
	  document.getElementById("video").style.display = videocookie;
    updateVideoButton(videocookie);
  } else {
    var start_state = "<?=( $video == false ? 'none' : 'block' ) ?>";
    var video = document.getElementById("video");
    var display = video.style.display;
    video.style.display = start_state;
    updateVideoButton(start_state);
//    updateVideoButton("block");
  }
  function onVideo(event) {
	  var video = document.getElementById("video");
	  var display = video.style.display;
	  video.style.display = (display == "none" ? "block" : "none");
	  createCookie("<?=$tid?>_video", video.style.display, 365*10);
	  updateVideoButton(video.style.display);
  }
  function updateVideoButton(state) {
    var play = document.getElementById("video-play");
    var close = document.getElementById("video-close");
    if (state == "none") {
      close.style.display = "none";
      play.style.display = "block";
    } else {
      close.style.display = "block";
      play.style.display = "none";
    }
  }
</script>
<?
}
?>
<?php
if (isset($disclosure)) {
?>
<img src="<?=$protocol?>://home.newtabgallery.com/images/<?=$disclosure?>" style="position:absolute;bottom:0px;right:0px;">
<?php
}
?>
<?php
if (isset($madonnasig)) {
?>
<img src="<?=$protocol?>://home.newtabgallery.com/images/<?=$madonnasig?>" style="position:absolute;bottom:0px;left:0px;">
<?php
}
?>
<?php if (isset($backgroundVideo)) { ?>
<div id="video-controls" style="position: absolute; top: 5px;right:5px;cursor: pointer;">
    <img id="muteunmute" src="<?=$protocol?>://home.newtabgallery.com/images/speaker.png">
</div>
<script src="https://www.youtube.com/player_api"></script>
<script>
  var player;

  function onYouTubeIframeAPIReady() {
    var cookie = readCookie("backgroundvideo");
    player = new YT.Player("ytvideo", {
      height: '100%',
      width: '100%',
      playerVars: {
        controls: 0,
        showinfo: 0,
        autohide: 1,
        modestbranding: 1,
        disablekb: 1,
        iv_load_policy: 3,
        start: Math.round(cookie),
        list: '<?=$backgroundVideo?>',
        listType: 'playlist'
      },
      videoId: '<?=$backgroundVideo?>',
      events: {
        "onReady": onPlayerReady,
        "onStateChange": onPlayerStateChange
      }
    });
  };

  function onPlayerStateChange(event) {
    if (event.data == 0) {
      player.seekTo(0);
      player.play();
    }
  }
  function onPlayerReady(event) {
//	event.target.mute();
	event.target.playVideo();
	window.setInterval(function() {
      var playerState = player.getPlayerState();
      if (playerState == 1) {
        createCookie("backgroundvideo", player.getCurrentTime(), 1);
      } else {
        createCookie("backgroundvideo", 0, 1);

      }
    }, 1000)
  }
  function playerMuteUnmute() {
    if (player.isMuted()) {
      player.unMute();
      document.getElementById("muteunmute").src = "/images/speaker.png";
    } else {
      player.mute();
      document.getElementById("muteunmute").src = "/images/mute.png";
    }
  }
  document.getElementById("video-controls").addEventListener("click", function(event) {
    playerMuteUnmute();
  }, false);
</script>
<div style="position: absolute; left: 0; top: 0; z-index: -99; width: 100%; height: 100%">
  <div id="ytvideo">
</div>
<?php } ?>
<?php if (isset($brandSearch) || (isset($_GET['search']))) {
  if (!isset($brandSearchURL)) {
	$brandSearchURL = 'https://search.yahoo.com/search?ei=utf-8&fr=tightropetb&type=btsyc&p='.$title;
  }
?>
<div class="addlContent" style="position: absolute; right: 25px; top: 25px;">
<a onclick="_gaq.push(['_trackEvent', 'Brand Search', 'Click', tid]);" target="_top" href="<?=$brandSearchURL?>">
<img style="position: absolute; right: 128px; top: 15px;" src="<?=$icon?>">
<img border="none" src="https://home.newtabgallery.com/images/latest-news-btn.png">
</a>
</div>
<?php } ?>
<?php
  if (isset($lightboxContent)) {
    if ($lightboxChromeOnly) {
	    $checkChrome = 'if (!("chrome" in window)) return;';
	  } else {
	    $checkChrome = '';
	  }

    if (!isset($lightboxCookie)) {
      $lightboxCookie = $tid.'_lightbox';
    }
    if (!isset($lightboxTimeout)) {
      $lightboxTimeout = 365;
    }
    if (!isset($lightboxAddlParams))
      $lightboxAddlParams = '';

    if (!isset($lightboxOpener))
      $lightboxOpener = '<img src="https://home.newtabgallery.com/images/play-button25.png">';
    echo <<<EOD

    <link rel="stylesheet" type="text/css" href="/global/lightbox.css" />

    <style type="text/css">
      #lightbox-opener {
        position: absolute;
        top: 10px;
        right: 10px;
        cursor: pointer;

      }
    </style>

    <script type="text/javascript">
    $(document).ready(function() {
	  $checkChrome
	  $checkMyWeb
      var lbCookie = readCookie("${lightboxCookie}");
      if (${dontShowAd}) {
        return;
      }
      if (!lbCookie || ${alwaysAd}) {
        $.fn.colorbox({
                onLoad: showLightboxContent,
                onClosed: function() {
                  createCookie("${lightboxCookie}", "false", $lightboxTimeout);
                  document.getElementById("newsearchinput").focus();
                },
                onCleanup: hideLightboxContent,
                scrolling: false,
                inline:true,
                ${lightboxAddlParams}
                href:"#lightbox-content"
        });
      } else {
        document.getElementById("lightbox-opener").hidden = false;
      }
      $("#lightbox-opener").colorbox({
              onLoad: showLightboxContent,
              onCleanup: hideLightboxContent,
              scrolling: false,
              inline:true,
              ${lightboxAddlParams}
              href:"#lightbox-content"
      });
    });
    function showLightboxContent() {
      document.getElementById("lightbox-content").hidden = false;
      document.getElementById("lightbox-opener").hidden = true;
    }
    function hideLightboxContent() {
      document.getElementById("lightbox-content").hidden = true;
      document.getElementById("lightbox-opener").hidden = false;
    }
    function createCookie(name,value,days) {
      if (days) {
        var date = new Date();
        date.setTime(date.getTime()+(days*24*60*60*1000));
        var expires = "; expires="+date.toGMTString();
      } else {
        var expires = "";
      }
      document.cookie = name+"="+value+expires+"; path=/";
    }

    </script>
    <div id="lightbox-content" hidden="true">
    $lightboxContent
    </div>
    <div id="lightbox-opener" hidden="true">
    $lightboxOpener
    </div>
EOD;

  }
?>

<?php
  if (isset($mlbstoreurl)) {
?>
<?php
  }
?>

<?php if (isset($adimage) || isset($adcontent)) { ?>
<style type="text/css">
#background {
  padding-top: 10px;
  padding-bottom: 5px;
  text-align: center;
  width: 320px;
  margin: auto;
  border-bottom-right-radius: 10px;
  border-bottom-left-radius: 10px;
background: #ffffff; /* Old browsers */
background: -moz-linear-gradient(top,  #ffffff 0%, #e5e5e5 100%); /* FF3.6+ */
background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ffffff), color-stop(100%,#e5e5e5)); /* Chrome,Safari4+ */
background: -webkit-linear-gradient(top,  #ffffff 0%,#e5e5e5 100%); /* Chrome10+,Safari5.1+ */
background: -o-linear-gradient(top,  #ffffff 0%,#e5e5e5 100%); /* Opera 11.10+ */
background: -ms-linear-gradient(top,  #ffffff 0%,#e5e5e5 100%); /* IE10+ */
background: linear-gradient(to bottom,  #ffffff 0%,#e5e5e5 100%); /* W3C */
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#e5e5e5',GradientType=0 ); /* IE6-9 */

}
</style>
<div style="text-align: center;width=100%">
<div id="background">
<?php if (isset($adcontent)) { ?>
<?php if (isset($showGenericAd) && $showGenericAd == true) { ?>
<div style="text-align: right;font-size: xx-small;">
<a style="color: rgb(152, 152, 152);text-decoration: none;" target="_blank" href="https://newtabgallery.com/websearch/">About this ad</a>
</div>
<?php } ?>
<?=$adcontent?>
<?php } else { ?>
<?php if (isset($adurl)) { ?>
  <a id="ad" hidden="true" href="<?=$adurl?>">
<?php } else { ?>
  <a id="ad" hidden="true">
<?php } ?>
<img border="0" style="background-color: transparent; margin-bottom: -3px;padding-right: 10px;padding-left: 10px;" src="<?=$adimage?>"></a>
<?php } ?>
<div style="text-align: center">
<div style="display: inline-block;width: 320px">
<?php if (isset($adclosedtext)) { ?>
<button id="now" href="#" onclick="showAd();"><?=$adclosedtext?></button>
<?php } ?>
<button id="later" href="#" onclick="hideAd();"><?=$adopenedtext?></button></div></div>
</div>
<script type="text/javascript">
function hideAd() {
  if (document.getElementById("ad")) {
    document.getElementById("ad").style.display = "none";
    document.getElementById("later").style.display = "none";
    <?php if (isset($adclosedtext)) { ?>
      document.getElementById("now").style.display = "inline-block";
    <?php } else { ?>
      document.getElementById("background").style.display = "none";
    <?php } ?>
  }
  else
    document.getElementById("background").style.display = "none";
<?php if (isset($adcookie)) { ?>
  <?php if (isset($cookieduration)) { ?>
    var now = new Date();
    var time = now.getTime();
    time += <?=$cookieduration?> * 60 *60 * 1000;
    now.setTime(time);
    document.cookie = "<?=$adcookie?>=false; expires=" + now.toGMTString();
  <?php } else { ?>
    document.cookie = "<?=$adcookie?>=false; expires=Fri, 31 Dec 9999 23:59:59 GMT";
  <?php } ?>
<?php } else { ?>
  document.cookie = "bt_ntp_ad=false";
<?php } ?>
}
function showAd() {
  if (document.getElementById("ad")) {
    document.getElementById("ad").style.display = "block";
    document.getElementById("later").style.display = "inline-block";
    document.getElementById("now").style.display = "none";
  }
<?php if (isset($adcookie)) { ?>
  <?php if (isset($cookieduration)) { ?>
    var now = new Date();
    var time = now.getTime();
    time += <?=$cookieduration?> * 60 *60 * 1000;
    now.setTime(time);
    document.cookie = "<?=$adcookie?>=true; expires=" + now.toGMTString();
  <?php } else { ?>
    document.cookie = "<?=$adcookie?>=true; expires=Fri, 31 Dec 9999 23:59:59 GMT";
  <?php } ?>
<?php } else { ?>
  document.cookie = "bt_ntp_ad=true";
<?php } ?>
}
  var doShowAd = true;
  var cookies = document.cookie.split("; ");
  for (var i=0; i < cookies.length; i++) {
    var cookie = cookies[i].split("=");
<?php if (isset($adcookie)) { ?>
    if (cookie[0] == "<?=$adcookie?>" && cookie[1] == "false") {
<?php } else { ?>
    if (cookie[0] == "bt_ntp_ad" && cookie[1] == "false") {
<?php } ?>
      doShowAd = false;
    }
  }
  if (doShowAd)
    showAd();
  else
    hideAd();
<?php } ?>
</script>

<?php
  if (isset($feedURL)) {
?>


  <!--[if !IE 7]>
  <style type="text/css">
    #wrap {display:table;height:100%}
  </style>
  <![endif]-->

  <style type="text/css">
    /*Opera Fix*/
    body:before {
        content:"";
        height:100%;
        float:left;
        width:0;
        margin-top:-32767px;
    }
    * {
        margin:0;
        padding:0;
    }
    .hidden {
        display:none;
    }
    #wrap {
        min-height: 100%;
    }
    #main {
        overflow:auto;
        padding-bottom: 165px;
    }
    #footer {
        position: absolute;
    	left: 0px;
        bottom: 0px;
        width: 100%;
    	clear:both;
    }
      #footer_inner {
        /*width: 728px;*/
        width: auto;
        text-align: center;
        margin: 0 auto;
      }
      #feed_title {
        background-color: #666;
        color: #EEE;
        font-size: 11px;
        -webkit-border-top-left-radius: 5px;
        -webkit-border-top-right-radius: 5px;
        -moz-border-radius-topleft: 5px;
        -moz-border-radius-topright: 5px;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        margin: 0 15px 0 0;
        padding: 3px 7px;
        float: right;
      }
      #close_feed {
          font-family: sans-serif;
          text-decoration: none;
          color: #EEE !important;
          font-weight: bold;
      }
      #feed {
          background-color: #EEE;
          height: 35px;
          padding: 12px 10px 3px 10px;
          clear:both;
          border-top: 1px solid #AAA;
          border-bottom: 1px solid #DDD;
          overflow: hidden;
<?php
if (!isset($feedreaderAlpha))
  $feedreaderAlpha = 90;
?>
           -moz-opacity: <?= ($feedreaderAlpha / 100) ?>;
          opacity: <?= ($feedreaderAlpha / 100) ?>;
          -ms-filter:"progid:DXImageTransform.Microsoft.Alpha"(Opacity=<?= $feedreaderAlpha ?>);
      }
      #feed:hover {
/*            -moz-opacity: 1.0;
          opacity: 1.0;
          -ms-filter:"progid:DXImageTransform.Microsoft.Alpha"(Opacity=100); */
      }
      #feed #feed_controls {
          float: right;
          width: 60px;
          padding-top: 2px;
          padding-right: 50px;
          text-align: right;
      }
          #feed #feed_controls img {
              -moz-opacity: 0.40;
              opacity: 0.40;
              -ms-filter:"progid:DXImageTransform.Microsoft.Alpha"(Opacity=40);
          }
          #feed #feed_controls img:hover {
              -moz-opacity: 1.0;
              opacity: 1.0;
              -ms-filter:"progid:DXImageTransform.Microsoft.Alpha"(Opacity=100);
          }
      #feed .feed_item {
          text-align: center;
          margin-right: 60px;
          width: auto;
      }
      #feed a {
          color: #222;
          font-size: 16px;
      }
      #feed a:hover {
          text-decoration: none;
      }
      #feed_ad {
          background-color: transparent;
      }
      #btlogo {
        z-index: 1000;
      }
  </style>

<?php
  require_once('../php/autoloader.php');

  // Extract URL values (eg. ?url=xxxxx)
  $url = $feedURL;

  $feed = new SimplePie();
  $feed->set_cache_location('/var/www/subdomains/home/cache');
  // Set cache location when using locally
  if ($_SERVER['REMOTE_ADDR'] == '127.0.0.1') {
    $feed->set_cache_location('../cache');
  }
  $feed->set_feed_url($url);
//  $feed->set_useragent('SimplePie');
// Added to allow Temple to work. I don't remember why I added SimplePie as the user agent
  $feed->set_useragent('Firefox');
  $feed->force_feed(true);
  $feed->init();

  // Retrive feed items
  $items = $feed->get_items();
?>
<script type="text/javascript">
var currentfeed = [
            <?php
                    // Iterate through each item, hiding all but the first
                    foreach ($items as $item) {
                        echo getFeedItemHTMLNew($item);
                    }
                ?>
]
</script>
<?php
  }
?>

</div>
</div>
<?php
if (isset($showGenericBannerAd) && $showGenericBannerAd == true) {
$genericBannerAd = <<<EOD
<style type="text/css">
#banner_ad {
  position: absolute;
  bottom: 0;
  left: 50%;
  transform: translate(-50%, 0);
  -webkit-transform: translate(-50%, 0);
}
</style>
<div id="banner_ad" class="addlContent">
 <script type="text/javascript"><!--

                e9 = new Object();

 e9.size = "728x90,300x250";

//--></script>

<script type="text/javascript" src="https://tags.expo9.exponential.com/tags/mgrowthcom/ROS/tags.js"></script>
</div>
EOD;
echo $genericBannerAd;
}
?>

  <!-- Facebook Pixel Code -->
  <script>
  !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
  n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
  n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
  t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
  document,'script','//connect.facebook.net/en_US/fbevents.js');

  fbq('init', '229313004074638');
  fbq('track', "PageView");</script>
  <noscript><img height="1" width="1" style="display:none"
  src="https://www.facebook.com/tr?id=229313004074638&ev=PageView&noscript=1"
  /></noscript>
  <!-- End Facebook Pixel Code -->

<!-- Twitter universal website tag code -->
<script src="//platform.twitter.com/oct.js" type="text/javascript"></script>
<script type="text/javascript">twttr.conversion.trackPid('nusm3', { tw_sale_amount: 0, tw_order_quantity: 0 });</script>
<noscript>
<img height="1" width="1" style="display:none;" alt="" src="https://analytics.twitter.com/i/adsct?txn_id=nusm3&p_id=Twitter&tw_sale_amount=0&tw_order_quantity=0" />
<img height="1" width="1" style="display:none;" alt="" src="//t.co/i/adsct?txn_id=nusm3&p_id=Twitter&tw_sale_amount=0&tw_order_quantity=0" />
</noscript>
<!-- End Twitter universal website tag code -->
<?php
if (array_key_exists($tid, $chromeStore)) {
?>
<style type="text/css">
  #btn-rate {
    position: absolute;
    left: 50px;
    bottom: 50px;
    text-decoration: inherit;
    color: inherit;
    opacity: 0.75;
    visibility: hidden;
  }
  #btn-rate:hover {
    opacity: 1;
  }
  #btn-rate:before {
    display: inline-block;
    content: '\e88e';
    font-family: "mystart-font";
    font-style: normal;
    font-variant: normal;
    font-weight: normal;
    speak: none;
    text-decoration: inherit;
    text-transform: none;
    vertical-align: baseline;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    font-size: 26px;
}
</style>
<a title="Rate this app" href="https://chrome.google.com/webstore/detail/<?=$chromeStore->$tid?>/reviews" id="btn-rate"></a>
<script type="text/javascript">
if ("chrome" in window) {
  if ("myweb" in window){
    document.getElementById("btn-rate").setAttribute("href", "https://chrome.google.com/webstore/detail/cnbiadnhebmicjcbpgajglfemclnlagh/reviews");
  }
  document.getElementById("btn-rate").style.visibility = "visible";
}
</script>
<?php
}
?>
<?php
if (!isset($noLegal)) {
?>

<style type="text/css">
  #legal a {
	text-decoration: none;
	color: rgb(93, 99, 96);
  }
  #legal a:hover {
	color: white;
  }
  #legal {
	background-color: black;
	color: rgb(93, 99, 96);
	position: absolute;
	right: 0px;
	bottom:0px;
	padding: 2px;
	font-size: 10px;
  }
</style>
<div id="legal">
<a href="https://newtabgallery.com/privacy/" target="blank">Privacy</a> <a href="https://newtabgallery.com/contact/" target="blank">Contact</a> MGROWTH &copy;2018
</div>
<?php
}
?>
<?php
if (isset($alertTitle) && isset($alertText) && strlen($alertText) > 0) {
?>
<style type="text/css">
  #alert {
	position: absolute;
	right: 5px;
	bottom: 5px;
	background-color: grey;
	color: white;
	border-radius: 10px;
	width: 300px;
	padding: 10px;
	text-align: center;
  }
</style>
<div id="alert">
<h3><?=$alertTitle?></h3>
<div>
<?=$alertText?>
</div>
</div>
<?php
}
?>
<script type="text/javascript">
var _sf_async_config={uid:3241,domain:"home.newtabgallery.com",useCanonical:true};
(function(){
  function loadChartbeat() {
    window._sf_endpt=(new Date()).getTime();
    var e = document.createElement('script');
    e.setAttribute('language', 'javascript');
    e.setAttribute('type', 'text/javascript');
    e.setAttribute('src', '//static.chartbeat.com/js/chartbeat.js');
    document.body.appendChild(e);
  }
  var oldonload = window.onload;
  window.onload = (typeof window.onload != 'function') ?
     loadChartbeat : function() { oldonload(); loadChartbeat(); };
})();
</script>
</body>
</html>

<?php
  //
  // Helper functions
  //

  function getFeedItemHTMLNew($item)
  {
    // Extract data (https://simplepie.org/api/class-SimplePie_Item.html)
    $title = $item->get_title();
    $desc  = $item->get_description();
    $link  = $item->get_link();

    // Truncate title to less than 80 chars
    if (strlen($title) > 80) {
      $title = substr($title, 0, 78) . "...";
    }

    // Build item HTML
    $title = str_replace('"', '\"', $title);
    $title = str_replace('&amp;', '&', $title);
    $title = $title = trim(preg_replace('/\s+/', ' ', $title));
    $link = str_replace('&amp;', '&', $link);
    $html = '{title: "'.$title.'", url: "'.$link.'"},';
    return $html;
  }

?>
