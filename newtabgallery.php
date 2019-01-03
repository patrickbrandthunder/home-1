<?php
$cachefile = 'newtabgallery.json';
$cachetime = 30*60; // 30 minutes * 60 seconds
if (file_exists($cachefile) && (time() - $cachetime < filemtime($cachefile))) {
  $json = file_get_contents($cachefile);
} else {
  $url = 'https://spreadsheets.google.com/feeds/list/1St6zr660jiBl3u2rcZ9Vlboc_KnzmRfGfm6jnD5ZBo4/1/public/values?alt=json';
  $file= file_get_contents($url);
  $json = json_decode($file);
  $rows = $json->{'feed'}->{'entry'};

  $data = new stdClass();

  class NewTab {
    public $name = "";
    public $extensionID = "";
  }

  foreach($rows as $row) {
    $nt = new NewTab();
    $tid = $row->{'gsx$tid'}->{'$t'};
    $nt->name = $row->{'gsx$name'}->{'$t'};    
    $extensionID = $row->{'gsx$extensionid'}->{'$t'};
    if ($extensionID && strlen($extensionID) != 0) {
      $nt->extensionID = $extensionID;
    }
    $data->$tid = $nt;
  }
  $json = json_encode($data);
  $fp = fopen($cachefile, 'w');
  fwrite($fp, $json);
  fclose($fp);
}
echo $json;
?>
