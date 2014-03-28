<?php
	include '/var/www/REM/src/lib/Session.php';
	require_login();
	destroy_session();
?>
