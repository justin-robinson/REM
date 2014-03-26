<?php
	include_once 'Session.php';
	require_login();
	include_once 'head.php';
?>
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