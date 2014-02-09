<?php
	include_once 'Session.php';
?>
<!DOCTYPE html>
<html>
<head>
	<?php include_once './head.php'; ?>
</head>
<body>
	<?php include './navbar.php'; ?>
	<div class="container fill">
		<div class="form-group">
			<label for="input_name">Name</label>
			<input type="text" class="form-control" id="input_name" placeholder="Name">
		</div>
		<div class="form-group">
			<label for="input_pwd">Password</label>
			<input type="password" class="form-control" id="input_pwd" placeholder="Password">
		</div>
		<div class="form-group">
			<button class="btn btn-primary btn-lg" id="login">Login</button>
		</div>
	</div>

	<script type="text/javascript" charset="utf-8" src="./js/login.js"></script>
</body>
</html>
