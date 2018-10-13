<?php
$tid = 'mexicanfood';
$title = 'Mexican Food';
$boomJSONURL = "https://brandthunder.com/personas/3party/".$tid."/".$tid.".json";
$cachefile = $tid.'.json';
$cachetime = 24*60*5*60; // 24 hours
if (file_exists($cachefile) && (time() - $cachetime < filemtime($cachefile))) {
  $images = json_decode(file_get_contents($cachefile));
} else {
  $images = array_diff(scandir('images', SCANDIR_SORT_NONE), array('.','..'));
  $fp = fopen($cachefile, 'w');
  fwrite($fp, json_encode(array_values($images)));
  fclose($fp);
}
$backgroundImage = 'https://home.brandthunder.com/'.$tid.'/images/'.$images[array_rand($images)];
$backgroundColor = '#000000';
$backgroundAlign = 'bottom center';
$backgroundRepeat = 'no-repeat';
$backgroundSize = 'cover';
$showGenericAd = true;
$homeIcon = 'home-black.png';
$icon = 'https://home.brandthunder.com/'.$tid.'/site_icon.png';
$showGenericBannerAd = true;
//$overlayBanner = true;
//$extensionID = '';
//$xpiURL = '<URL FROM AMO BUTTON>?src=extra-'.$tid;
include('../homepage.php');
?>

