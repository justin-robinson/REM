<?php
    include_once '../config.php';
	include ROOT.'lib/Session.php';
	require_login();
	destroy_session();
?>
