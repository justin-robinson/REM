<?php
	include_once './class/Dream.php';
	
	$dream = new Dream();
	if(isset($_POST['dream_index'])){
		include_once 'Session.php';
		include_once './class/Dreamer.php';
		$dream=unserialize($_SESSION['dreamer'])->getDream($_POST['dream_index']);
		//$dream->loadByID($id);
		$dream->setStory($_POST['story']);
	}else
		$dream->loadByMagic();
	$dream->save();
?>
