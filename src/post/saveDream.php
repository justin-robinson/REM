<?php
	@include_once '/var/www/REM/src/lib/Session.php';
	if(!dreamer_logged_in())
		echo "-1";
	else{
		@include_once '/var/www/REM/src/class/Dream.php';
		
		$dream = new Dream();
		if(isset($_POST['dream_index'])){
			include_once '/var/www/REM/src/class/Dreamer.php';
			$n = $_POST['dream_index'];
			$dreamer=get_dreamer();
			$dream=$dreamer->getDream($n);
			$dream->setStory($_POST['story']);
			$dreamer->setDream($n, $dream);
			save_dreamer($dreamer);
		}else
			$dream->loadByMagic();
		$dream->save();
	}
?>