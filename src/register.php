<?php
	include_once '/var/www/REM/src/lib/Session.php';
	include_once 'head.php';
	$field_groups = array(
		array(
			array("input_name", "Name", "Name", "text", "col-sm-9"),
		),
		array(
			array("input_pwd", "Password", "Password", "password", "col-sm-9")
		),
		array(
			array("input_pwd_confirm", "Confirm Password", "Confirm Password", "password", "col-sm-9")
		)
	);
?>
<title>EBR Register</title>
</head>
<body>
	<?php include 'navbar.php'; ?>
	<div class="container fill">
		<div class="form-horizontal">
			<?php
				foreach ( $field_groups as $fields) : ?>
					<div class="form-group">
						<?php foreach ($fields as $field) : ?>
							<?php if ($field[1] != null) : ?>
								<label class="col-sm-2 control-label" for="<?php echo $field[0]?>"><?php echo $field[1]?></label>
							<?php endif ?>
						<div class="<?php echo $field[4]?>"><input type="<?php echo $field[3]?>" class="form-control" id="<?php echo $field[0]?>" placeholder="<?php echo $field[2]?>"></div>
					<?php endforeach ?>
					</div>
				<?php endforeach ?>
			<div class="form-group">
				<div class="col-sm-offset-2 col-sm-10">
					<button class="btn btn-primary btn-lg" id="register">Register</button>
				</div>
			</div>
		</div>
	</div>
	
	<?php include 'foot.php'; ?>

	<script type="text/javascript" charset="utf-8" src="./js/register.js"></script>
</body>
</html>