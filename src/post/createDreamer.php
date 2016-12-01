<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);    
include_once '../config.php';
	if(isset($_REQUEST['name']) && isset($_REQUEST['pwd'])){
	include_once ROOT.'class/Dreamer.php';
		$user = new \DB\Rem\Dreamers($_REQUEST);
		$saved = $user->save();
		if($result){
			$user = null;
			include_once 'createSession.php';
		}
	}

?>
