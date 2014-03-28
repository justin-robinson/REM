<?php
	include_once '/var/www/REM/src/lib/Session.php';
	include_once 'head.php';
?>
</head>
<body>
	<?php include 'navbar.php'; ?>
	<div class="container fill">
		<div class="form-horizontal">
			<div class="form-group">
				<label class="col-sm-1 control-label" for="input_name">Name</label>
				<div class="col-sm-10"><input type="text" class="form-control" id="input_name" placeholder="Name"></div>
			</div>
			<div class="form-group">
				<label class="col-sm-1 control-label" for="input_pwd">Password</label>
				<div class="col-sm-10"><input type="password" class="form-control" id="input_pwd" placeholder="Password"></div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-1 col-sm-10">
					<button class="btn btn-primary btn-lg" id="login">Login</button>
				</div>
			</div>
		</div>
		<a href="./register.php">Need to register?<a>
	</div>
	
	<?php include_once 'foot.php'; ?>
	<script type="text/javascript" charset="utf-8" src="./js/login.js"></script>
</body>
</html>
