<?php
	include_once '/var/www/REM/src/lib/Session.php';
	$out = "";
	if(isset($_POST['name']) && isset($_POST['pwd']))
		$out = login($_POST['name'], $_POST['pwd']);
	echo $out;
?>