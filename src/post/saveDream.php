<?php
    include_once '../config.php';
	@include_once ROOT.'lib/Session.php';
	if(!dreamer_logged_in())
		echo "-1";
	else{
		@include_once ROOT.'class/Dream.php';
		
		$dream = new Dream();
		if(isset($_POST['dream_index'])){
			include_once ROOT.'class/Dreamer.php';
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
