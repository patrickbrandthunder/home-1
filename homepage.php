<?php
  if (isset($welcomePage)) {
	return;
  }

  include_once("search.php");

/* Update to test push */
/*
if (strlen($_SERVER['REQUEST_URI']) > 1 || isset($_GET['tid'])) {
  $newtabgallery = json_decode(file_get_contents('http://home.newtabgallery.com/newtabgallery.php'));
  if (isset($_GET['tid'])) {
	$tid = $_GET['tid'];
  } else {
    $tid = trim($_SERVER['REQUEST_URI'], "/");
  }
  if (property_exists($newtabgallery, $tid)) {
	$title = $newtabgallery->$tid->name;
	$extensionID = $newtabgallery->$tid->extensionID;
  }
}
*/

// Function to get the client ip address
function get_client_ip_server() {
    $ipaddress = '';
    if (array_key_exists('HTTP_CLIENT_IP', $_SERVER))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if (array_key_exists('HTTP_X_FORWARDED_FOR', $_SERVER))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if (array_key_exists('HTTP_X_FORWARDED', $_SERVER))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if (array_key_exists('HTTP_FORWARDED_FOR', $_SERVER))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if (array_key_exists('HTTP_FORWARDED', $_SERVER))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if (array_key_exists('REMOTE_ADDR', $_SERVER))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    // for testing
    if ($ipaddress == '127.0.0.1') {
      $ipaddress = '104.54.208.204';
    }
    return $ipaddress;
}

$baseURL = 'http://brandthunder_tiles.tiles.ampfeed.com/tiles?v=1.2&partner=brandthunder_tiles&sub1=10004&sub2=newtabgallery&results=20&ip='.get_client_ip_server().'&ua='.urlencode($_SERVER['HTTP_USER_AGENT']).'&rfr='.urlencode('https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
$contents = file_get_contents($baseURL);
$json = json_decode($contents);
ini_set('log_errors_max_len', 0);
if (!is_object($json)) {
  error_log('Bad tiles1: '.$contents, 0);
  error_log("Base URL: " . $baseURL);
} else {
  if (property_exists($json, 'tiles')) {
    $tiles = $json->{'tiles'};
    if (!is_array($tiles)) {
      error_log('Bad tiles2: '.$contents, 0);
    }
  }
}
$banner_url = 'https://bit.ly/33fmlzb';
$banner_image = '../global/images/ads/avg.jpg';
$bannerURL = 'http://brandthunder_banner_api.tiles.ampfeed.com/tiles?partner=brandthunder_banner_api&sub1=10071&sub2=newtabgallery&v=1.3&ip='.get_client_ip_server().'&ua='.urlencode($_SERVER['HTTP_USER_AGENT']).'&rfr='.urlencode('https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']);
$contents = file_get_contents($bannerURL);
$json = json_decode($contents);
if (!is_object($json)) {
  error_log('Bad banners: '.$contents, 0);
  error_log("Base URL: " . $baseURL);
} else {
  if (property_exists($json, 'tiles')) {
    $banner_url = $json->{'tiles'}[0]->{'click_url'};
    $banner_image = $json->{'tiles'}[0]->{'image_url'};
  }
}
?>
<?php
//error_reporting(E_ALL);
//ini_set('display_errors', '1');

$cachefile = __DIR__.'/'.$tid.'/'.$tid.'.json';
$images = [];
$cachetime = 24*60*5*60; // 24 hours
if (file_exists($cachefile) && (time() - $cachetime < filemtime($cachefile))) {
  $contents = file_get_contents($cachefile);
  if ($contents) {
    $images = json_decode($contents);
  } else {
	error_log('Open read failed for:'.$cachefile);
  }
}
if (empty($images)) {
  $diskimages = glob(__DIR__.'/'.$tid.'/*{*.jpeg,*.jpg,*.JPG,*.JPEG,*.png,*.PNG}', GLOB_BRACE);
  for ($i = 0; $i < sizeof($diskimages); $i++) {
	$imagename = basename($diskimages[$i]);
	if ($imagename == 'icon256.png' ||
    $imagename == 'icon128.png' ||
		$imagename == 'icon32.png') {
      continue;
    }
	array_push($images, $imagename);
  }
  $fp = fopen($cachefile, 'w');
  if ($fp) {
    fwrite($fp, json_encode(array_values($images)));
    fclose($fp);
  } else {
	error_log('Open write failed for:'.$cachefile);
  }
}
$backgroundImage = 'https://home.newtabgallery.com/'.$tid.'/'.$images[array_rand($images)];
$backgroundColor = '#000000';
$backgroundAlign = 'bottom center';
$backgroundRepeat = 'no-repeat';
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
    <link rel="stylesheet" href="https://home.newtabgallery.com/global/css/auto-complete.css" type="text/css">
    <link rel="stylesheet" href="https://home.newtabgallery.com/global/css/simpleLightbox.css">
    <link rel="chrome-webstore-item" href="https://chrome.google.com/webstore/detail/<?=$extensionID?>">
	<script src="https://home.newtabgallery.com/global/js/auto-complete.js"></script>
	<script src="https://home.newtabgallery.com/global/js/simpleLightbox.js"></script>

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
		    $backgroundSize = 'cover';
		  }

		  //  If $searchBackground is not set in index.php, default it
		  //  to white at 75% opacity
		  if (!isset($searchBackground)) {
		    $searchBackground = 'rgba(255,255,255,0.75)';
		  }

		?>
    <style type="text/css">
    	#body {
		  height: 100%;
	      background-color: <?=$backgroundColor?>;
	      background-repeat: <?=$backgroundRepeat?>;
	      background-position: <?=$backgroundAlign?>;
	      background-image: url("<?=$backgroundImage?>");
	      background-size: <?=$backgroundSize?>;
		}
		body {
	      background-color: <?=$backgroundColor?>;
		}
		#body-spacer {
		  height: 0px;
		  background-color: transparent;
		}
		.tile {
		  margin-left: 5px;
		  margin-right: 5px;
		}
		#buttons {
		  margin-top: 10px;
		  margin-bottom: 10px;
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
   <style type="text/css">
	.autocomplete-suggestion img.logo {
		display: inline-block;
		vertical-align: middle;
		margin-right: 10px;
		margin-top: 5px;
		margin-bottom: 5px;
		width: 32px;
		height: 32px;
	}
	.autocomplete-suggestion a {
		text-decoration: none;
		color: inherit;
	}
   </style>
</head>
<body>
  <img width="100" height="100" style="position: absolute; left: 10px; top: 10px" src="../global/images/newtabgallery.png">
  <div id="body">
	<div id="body-spacer">

	</div>

      <div id="wrapper">
      <div class="container">

        <div id="header">
<div style="display: flex; justify-content: center;">
	<a target="_blank" href="<?=$banner_url?>">
      <img style="position: absolute; bottom: 0; margin-left: auto; margin-right: auto;left: 0;right: 0;" src="<?=$banner_image?>">
	</a>
</div>
        <?php if(isset($icon)): ?>
          <a href="#" id="logo">
            <img src="<?= $icon ?>" style="display: none" alt="" />
          </a>
		<?php endif; ?>

        </div><!-- /header -->
<?php if (isset($extraafter)) { echo $extraafter; } ?>
        <?php /*<a target="_blank" href="https://ww2.weatherbug.com/aff/default.asp?zcode=z6702"><img src="https://home.newtabgallery.com/images/weather.png"></a> */ ?>
      </div><!-- /social-buttons -->
<div id="module-search"><?php if (isset($bingSearch)) {
$searchURL = 'https://www.bing.com/search?q=';
?>
<form action="https://www.bing.com/search" target="_top" method="get" id="form">
<?php } else if (isset($testSearch2)) {
$searchURL = 'https://devisedata.com/devise?n='.$testSearch2.'&devise=5de98704b1505568e9f9a9d2&q=';
?>
<form action="https://devisedata.com/devise" target="_top" method="get" id="form">
  <input type="hidden" name="devise" value="5de98704b1505568e9f9a9d2">
  <input type="hidden" name="n" value="<?=$testSearch2?>">
<?php } else if (isset($testSearch3)) {
$searchURL = 'https://www.my-search.com/search?zoneid=89128928&q=';
?>
<form action="https://www.my-search.com/search" target="_top" method="get" id="form">
  <input type="hidden" name="zoneid" value="89128928">
<?php } else if (isset($testSearch4)) {
$searchURL = 'https://www.surfittoday.com/results.aspx?n='.$testSearch4.'&gd=SY1001840&searchsource=69&q=';
?>
<form action="https://www.surfittoday.com/results.aspx" target="_top" method="get" id="form">
  <input type="hidden" name="gd" value="SY1001840">
  <input type="hidden" name="searchsource" value="69">
  <input type="hidden" name="n" value="<?=$testSearch4?>">
<?php } else if (isset($testSearch5)) {
$searchURL = 'http://www.bing.com/search?PC=ATBT&FORM=BTBR01&q=';
?>
<form action="http://www.bing.com/search" target="_top" method="get" id="form">
  <input type="hidden" name="PC" value="ATBT">
  <input type="hidden" name="FORM" value="BTBR01">
<?php } else {
$searchURL = 'https://search.newtabgallery.com/'.$tid.'?newtab=true&q=';
?>
<form action="https://search.newtabgallery.com/<?=$tid?>" target="_top" method="get" id="form"><?php } ?>
<input type="hidden" name="newtab" value="true">
<input type="text" id="newsearchinput" placeholder="Search the web" name="q" autocomplete="off">
</form>
</div>

<script type="text/javascript">
let baseURL = "https://home.newtabgallery.com/global/inc/suggestions.php";
var xhr;
new autoComplete({
    selector: 'input[name="q"]',
	minChars: 1,
    source: function(term, response){
		if (xhr) {
          try { xhr.abort(); xhr=null;} catch(e){}
        }
		xhr = new XMLHttpRequest();
		xhr.responseType = 'json';
		xhr.onload = function() {
			let organic_suggestions = xhr.response.organic_suggestions;
			let paid_suggestions = xhr.response.paid_suggestions;
			let data = [];
			if (paid_suggestions) {
			   for (let i=0; i < 1; i++) {
				  let item = {};
				  item.term = paid_suggestions[i].term;
				  item.click_url = paid_suggestions[i].click_url;
				  item.image_url = paid_suggestions[i].image_url;
				  item.impression_url = paid_suggestions[i].impression_url;
				  data.push(item);
			   }
			}
			if (organic_suggestions) {
			   for (let i=0; i < organic_suggestions.length; i++) {
				  let item = {};
				  item.term = organic_suggestions[i].term;
				  item.click_url = "<?=$searchURL?>" + organic_suggestions[i].term;
				  data.push(item);
			   }
			}
			response(data);
		};
		xhr.open("GET", baseURL + "?" + "q=" + term, true);
		xhr.send();
    },
    renderItem: function (item, search){
		if (item.image_url) {
			return '<div class="autocomplete-suggestion"><img class="logo" src="'+item.image_url+'"><a href="'+item.click_url+'">'+item.term+'</a><img src="'+item.impression_url+'"></div>';
        } else {
			return '<div class="autocomplete-suggestion"><a href="'+item.click_url+'">'+item.term+'</a></div>';
		}
    },
    onSelect: function(e, term, item){
		let efValue = document.getElementById("newsearchinput").value;
		if (!efValue) {
			e.preventDefault();
			document.location.href = item.querySelector('a').href;
        }
    }
});
</script>

<div id="buttons" style="width: 100%; text-align: center">
  <?php
    echo '<a href="http://redirect.viglink.com?key=8860b76d9d55e5e067640b5beb7354ca&u=http%3A%2F%2Fwww.walmart.com "><img class="tile" height="50" width="50" alt="Walmart" title="Walmart" src="https://home.newtabgallery.com/global/images/walmart.png"></a>';
    echo '<a href="http://redirect.viglink.com?key=8860b76d9d55e5e067640b5beb7354ca&u=http%3A%2F%2Fwww.parachutehome.com"><img class="tile" height="50" width="50" alt="Parachute Home" title="Parachute Home" src="https://home.newtabgallery.com/global/images/parachute.png"></a>';
    if (isset($tiles) && !empty($tiles)) {
        function outputTile($tile) {
            if (property_exists($tile, 'image_url')) {
              echo '<a href="'.$tile->{'click_url'}.'"><img class="tile" height="50" width="50" alt="'.$tile->{'name'}.'" title="'.$tile->{'name'}.'" src="'.$tile->{'image_url'}.'"></a>';
              echo '<img src="'.$tile->{'impression_url'}.'">';
            }
        }
        $stickyArray = array_filter(
            $tiles,
            function ($e) {
                return ($e->{'name'} == "Amazon" || $e->{'name'} == "Samsung - Performics");
            }
        );
        function my_sort($a,$b)
        {
        if ($a->{'name'}==$b->{'name'}) return 0;
        return ($a->{'name'}<$b->{'name'})?-1:1;
        }
        usort($stickyArray, 'my_sort');

        foreach ($stickyArray as $tile) {
          outputTile($tile);
        }
        $count = min(sizeof($tiles), 8);

        $rand_keys = [0];
        if ($count > 1) {
          $rand_keys = array_rand($tiles, $count);
        }

        for ($i = 0; $i < $count; $i++) {
          $tile = $tiles[$rand_keys[$i]];
          if ($tile->{'name'} != "Amazon" &&
            $tile->{'name'} != "Samsung - Performics") {
            outputTile($tile);
          }
        }
    }
  ?>
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
</script><?php
if (isset($addlContent))
  echo $addlContent;
?>

</div>
</div><?php
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
</div><?php
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
    right: 20px;
    bottom: 20px;
    padding: 2px;
    font-size: 12px;
  }
</style>
<div id="legal" style="text-align: center">
&nbsp;<a href="https://newtabgallery.com/license/" target="blank">License</a> | <a href="https://newtabgallery.com/privacy/" target="blank">Privacy</a> | <a href="https://newtabgallery.com/contact/" target="blank">Contact</a>&nbsp;<br/>&copy;<?=date("Y");?> NewTabGallery
</div><?php
if (isset($searchExtensionID) && $searchExtensionID != '' && !isset($_COOKIE["searchoffer_062019"])) {
  ?>
<style type="text/css">
#search_popup {
  background-color: black;
  text-align: center;
  padding: 5px;
}
#search_popup a, #search_popup a:visited {
  text-decoration: none;
  color: white;
  line-height: 1.5;
}
</style>

<script type="text/javascript">
function setCookie() {
  createCookie("searchoffer_062019", "true", 365);
}
function createCookie(name,value,days) {
  if (days) {
    var date = new Date();
    date.setTime(date.getTime()+(days*24*60*60*1000));
    var expires = "; expires="+date.toGMTString();
  } else {
    var expires = "";
  }
  document.cookie = name+"="+value+expires+"; path=/<?=$tid?>";
}
SimpleLightbox.open({
//    content: '<div id="search_popup"><a onclick="setCookie();" href="https://chrome.google.com/webstore/detail/<?=$searchExtensionID?>">Want more of <?=$title?>?<br/><img height="128" width="128" class="image" src="icon256.png"><br/>Click here to search with <?=$title?> all day.</a></div>',
    content: '<div id="search_popup"><a onclick="setCookie();" href="https://chrome.google.com/webstore/detail/<?=$searchExtensionID?>"><div><img src="/global/images/searchoffer.jpg"><div style="color:black;position: absolute;left: 15px;top:10px;text-transform: uppercase;"><img style="vertical-align: middle; margin: 10px;" src="icon32.png"><b>Search with <?=$title?></b></div><img style="position: absolute;right: 60px;top:35px;" height="128" width="128" class="image" src="icon256.png"></a></div>',
    elementClass: 'slbContentEl',
    beforeClose: function() {createCookie("searchoffer_062019", "true", 365);},
    closeOnOverlayClick: false,
});
</script><?php
}
?>
</body>
</html>
