<?php
	include './class/Dreamer.php';
	if(session_status() != 2)
		session_start();

	if (isset($_POST['id']) && isset($_SESSION['dreamer']))
		if( unserialize($_SESSION['dreamer'])->deleteDream($_POST['id']))
			echo "Deleted";
	else
		echo 'error';
?>
