<?php
if (!isset($_GET['tid'])) {
    die();
}
chdir($_GET['tid']);
$welcomePage = true;
include('index.php');
?>
Want more of <?=$title?>? Click <a href="https://chrome.google.com/webstore/detail/<?=$searchExtensionID?>">here</a> to get the search extension!