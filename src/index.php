<?php
//	include './class/Dream.php';
/*	include './class/Dreamer.php';
	
	$dreamer = new Dreamer();
	if(session_status() != 2)
		session_start();

	$_SESSION['dreamer']=$dreamer;*/
//	print($dreamer->getName());
//	$dream = new Dream();
	include_once 'Session.php';
	require_login();
?>
<!DOCTYPE html>
<html>
<head>
	<?php include_once'head.php'; ?>
</head>
<body>
	<?php include './navbar.php'; ?>
	<div class="container fill">
		<div class="form-group fill">
			<textarea name="story" class="form-control" rows="25"></textarea>
		</div>
		<div class="form-group">
			<button class="btn btn-primary btn-lg" id="save">Save</button>
		</div>
	</div>
	
	<?php include_once 'foot.php'; ?>
	<script type="text/javascript" charset="utf-8" src="./js/index.js"></script>
</body>
</html>
