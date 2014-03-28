<?php
	if(isset($_POST['name']) && isset($_POST['pwd'])){
		include_once '/var/www/REM/src/class/Dreamer.php';
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