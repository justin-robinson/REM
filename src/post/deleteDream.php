<?php
    include_once '../config.php';
	include_once ROOT.'lib/Session.php';
	if(!dreamer_logged_in())
		echo "-1";
	else{
		include ROOT.'class/Dreamer.php';
		if (isset($_POST['id'])){
			if (get_dreamer()->deleteDream($_POST['id']))
				echo "Deleted";
			else
				echo 'Error deleting dream';
		}
	}
?>
