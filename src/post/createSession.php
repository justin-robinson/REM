<?php
    include_once '../config.php';
	include_once ROOT.'lib/Session.php';
	$out = "";
	if(isset($_POST['name']) && isset($_POST['pwd'])) {
        $out = login($_POST['name'], $_POST['pwd']);
    }
	echo $out;
?>