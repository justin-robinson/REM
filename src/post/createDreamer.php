<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);    
include_once '../config.php';
	if(isset($_REQUEST['name']) && isset($_REQUEST['pwd'])){
	include_once ROOT.'class/Dreamer.php';
		$user = new Dreamer();
		$result=$user->createNew($_REQUEST['name'], $_REQUEST['pwd']);
		/*try{
			$result=$user->createNew($_POST['name'], $_POST['pwd']);
		} catch (Exception $e){
			echo $e->getMessage();
		}*/
		if($result){
			$user = null;
			include_once 'createSession.php';
		}
	}

?>
