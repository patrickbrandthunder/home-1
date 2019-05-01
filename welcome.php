<?php
if (!isset($_GET['tid'])) {
    die();
}
$tid = $_GET['tid'];
chdir($tid);
$welcomePage = true;
include('index.php');
?>
<img src="<?=$tid?>/icon256.png">
<h3>
Want more of <?=$title?>? Click <a href="https://chrome.google.com/webstore/detail/<?=$searchExtensionID?>">here</a> to get the search extension!
</h3>
