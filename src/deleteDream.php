<?php
	include_once 'Session.php';
	if(!dreamer_logged_in())
		echo "-1";
	else{
		include './class/Dreamer.php';
	
		if (isset($_POST['id']) && get_dreamer()->deleteDream($_POST['id']))
				echo "Deleted";
		else
			echo 'error';
	}
?>
