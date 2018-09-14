<?
$displayLogo = true;
$title = 'MGROWTH';
$backgroundImage = '';
$backgroundAlign = 'bottom left';
$backgroundColor = '#ffffff';
$icon = 'http://mgrowth.com/wp/wp-content/uploads/2013/07/favicon.png';
if (isset($_GET['image'])) {
  $backgroundImage = $_GET['image'];
}
if (isset($_GET['backgroundColor'])) {
  $backgroundColor = '#'.$_GET['backgroundColor'];
}
if (isset($_GET['align'])) {
  $backgroundAlign = $_GET['align'];
}
if (isset($_GET['title'])) {
  $title = $_GET['title'];
}
if (isset($_GET['displayLogo'])) {
  if ($_GET['displayLogo'] == "false") {
    $displayLogo = false;
  }
}

$tid='btpersonas';
$homeIcon = 'home-black.png';
$adcookie = $tid;
$cookieduration = "24"; // In hours
$adopenedtext = "Close Ad";
$showGenericAd = true;
$addlContent = <<<EOD
<div id="spot-im-root"></div><script>!function(t,e,o){function p(){var t=e.createElement("script");t.type="text/javascript",t.async=!0,t.src=("http:"==e.location.protocol?"http":"http")+":"+o,e.body.appendChild(t)}t.spotId="4fb2e92be3842feb1c9c58a2e69254a2",t.spotName="",t.allowDesktop=!0,t.allowMobile=!1,t.containerId="spot-im-root",p()}(window.SPOTIM={},document,"//www.spot.im/embed/scripts/launcher.js");</script>
EOD;
$boomJSONURL = "http://mgrowth.com/personas/generic/generic.json";
if (isset($_GET['video'])) {
  $backgroundVideo = $_GET['video'];
  $showGenericAd = false;
}
if (isset($_GET['fedex'])) {
$addlContent .= <<<EOD
<iframe style="width: 350px;position:absolute;top:250px; left: 50%;transform: translate(-50%, 0);-webkit-transform: translate(-50%, 0);"
        src="http://home.mgrowth.com/tracking"></iframe>
EOD;
}

include('../homepage.php');
?>



