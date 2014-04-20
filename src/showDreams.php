<?php
    include_once 'config.php';
	include ROOT.'class/Dream.php';
	include_once ROOT.'lib/Session.php';
	require_login();
	include_once 'head.php';
	$dreamer=unserialize($_SESSION['dreamer']);
	$dreamer->getDreams();
?>
</head>
<body>
	<?php include 'navbar.php'; ?>

	<div class="container">
		<div class="col-md-2">
			<div class="panel panel-info">
				<div class="panel-heading"><h4>Keywords</h4></div>
				<table class="table table-condensed">
					<?php
						$keywords = $dreamer->getKeywords();
						foreach ( $keywords as $word=>$count): ?>
							<tr><td><?php echo ucfirst($word); ?></td><td><?php echo $count; ?></tr>
						<?php endforeach
					?>
				</table>
			</div>
		</div>
		<div class="col-md-10">
		<div class="well">
		<?php
			$dreamer->previewDreams();
			$_SESSION['dreamer']=serialize($dreamer);
		?>
		</div>
		</div>
	</div>
	
	<script type="text/javascript" charset="utf-8" src="./js/showDreams.js"></script>
	<?php include_once 'foot.php'; ?>
</body>
</html>
