<?php
	include_once 'Session.php';
	$out = "";
	if(isset($_POST['name']) && isset($_POST['pwd']))
		$out =  login($_POST['name'], $_POST['pwd']);
	echo $out;
?>
