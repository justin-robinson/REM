<?php
	include_once '/var/www/REM/src/lib/Session.php';
	if(!dreamer_logged_in())
		echo "-1";
	else{
		include '/var/www/REM/src/class/Dreamer.php';
		if (isset($_POST['id'])){
			if (get_dreamer()->deleteDream($_POST['id']))
				echo "Deleted";
			else
				echo 'Error deleting dream';
		}
	}
?>
