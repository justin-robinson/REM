<?php
    include_once '../config.php';
	if(isset($_POST['name']) && isset($_POST['pwd'])){
		include_once ROOT.'class/Dreamer.php';
		$user = new Dreamer();
		$result=$user->createNew($_POST['name'], $_POST['pwd']);
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