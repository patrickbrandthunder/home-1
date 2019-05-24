<?php
if (!isset($_GET['theme_id'])) {
    die();
}
$tid = $_GET['theme_id'];
chdir('../'.$tid);
$welcomePage = true;
include('index.php');
?>
<!doctype html>
<html lang="en-US" xmlns="https://www.w3.org/1999/xhtml">
  <head>
    <link rel="stylesheet" href="https://home.newtabgallery.com/global/css/simpleLightbox.css">
	<script src="https://home.newtabgallery.com/global/js/simpleLightbox.js"></script>
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
.closeBtn {
  display: none;
}
</style>
<body>
<script type="text/javascript">
SimpleLightbox.open({
    content: '<div id="search_popup"><a onclick="setCookie();" href="https://chrome.google.com/webstore/detail/<?=$extensionID?>">Want <?=$title?> on your new tab?<br/><img height="256" width="256" class="image" src="../<?=$tid?>/icon256.png"><br/>Click here.</a></div>',
    closeOnOverlayClick: false,
    closeBtnClass: 'closeBtn',
});
</script>
</body>
</html>
