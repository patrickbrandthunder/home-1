<?php
//error_reporting(E_ALL);
//ini_set('display_errors', '1');

$cachefile = __DIR__.'/'.$tid.'/'.$tid.'.json';
$cachetime = 24*60*5*60; // 24 hours
if (file_exists($cachefile) && (time() - $cachetime < filemtime($cachefile))) {
  $images = json_decode(file_get_contents($cachefile));
} else {
  $images = glob(__DIR__.'/'.$tid.'/*{*.jpeg,*.jpg}', GLOB_BRACE);
  for ($i = 0; $i < sizeof($images); $i++) {
    $images[$i] = basename($images[$i]);  
  }
  $fp = fopen($cachefile, 'w');
  fwrite($fp, json_encode(array_values($images)));
  fclose($fp);
}
$backgroundImage = 'https://home.newtabgallery.com/'.$tid.'/'.$images[array_rand($images)];
$backgroundColor = '#000000';
$backgroundAlign = 'bottom center';
$backgroundRepeat = 'no-repeat';
$backgroundSize = 'cover';
$showGenericAd = true;
$homeIcon = 'home-black.png';
$showGenericBannerAd = true;

// Set device type, will be used elsewhere to display content
include_once("global/inc/Mobile_Detect.php");
$detect = new Mobile_Detect;
$deviceType = ($detect->isMobile() ? ($detect->isTablet() ? 'tablet' : 'phone') : 'computer');

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
    <meta property="og:image" content="https://home.newtabgallery.com/<?=$tid?>/icon256.png" />
    <meta property="og:image:width" content="256" />
    <meta property="og:image:height" content="256" />
    <meta property="og:title" content="<?= $title?> New Tab Page" />
    <meta property="og:url" content="https://home.newtabgallery.com/<?=$tid?>/" />
    <meta property="og:description" content="I use this and love it, thought I’d share it for others to see.  I’m using just one of hundreds of unique new tab page experiences from New Tab Gallery. (Works best on your desktop or laptop.)" />
		<meta property="og:type" content="website"/>
		<link rel="icon" type="image/png" href="https://home.newtabgallery.com/<?=$tid?>/icon32.png">
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


		  if (strpos($backgroundImage, 'url') === false) {
		    $backgroundImage = 'url("'.$backgroundImage.'")';
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

	<script type="text/javascript">
	var addthis_share = {
	   url: "https://home.newtabgallery.com/<?=$tid?>",
	   title: "<?= $title?> New Tab Page"
	}

	</script>
    <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5bb95001324284f3"></script>
   <script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-127110494-1']);
    _gaq.push(['_trackPageview']);

    (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'https://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
  </script>
</head>
<body>
  <div id="body">
	<div id="body-spacer">

	</div>
  <img style="opacity: 0;position: absolute;top:0; left:0"
     src='<?= $backgroundImage?>'>


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
<form action="https://www.my-search.com/search" target="_top" method="get" id="form">
<input type="hidden" name="aid" value="4898">
<input type="hidden" name="zoneid" value="89128928">
<input type="text" id="newsearchinput" placeholder="Search the web" name="q">
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
<?php
if (isset($addlContent))
  echo $addlContent;
?>

</div>
</div>
<?php
if (isset($extensionID) && ($extensionID != '')) {
?>

<style type="text/css">
  #extension-offer a {
	text-decoration: none;
  }
  #extension-offer {
	background-color: black;
	color: rgb(93, 99, 96);
	position: absolute;
	left: 15px;
	bottom: 15px;
	padding: 2px;
	font-size: 15px;
	display: none;
  }
</style>
<script type="text/javascript">
  window.setTimeout(function() {
    let offer = document.getElementById("extension-offer");
	if (!offer.hasAttribute("extension")) {
	 offer.style.display = "block";
	}
  }, 5000);
</script>
<div id="extension-offer">
<a href="https://chrome.google.com/webstore/detail/<?=$extensionID?>" target="blank"><img src="https://home.newtabgallery.com/global/images/chromestore.png"></a>
</div>
<?php
}
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
</body>
</html>
