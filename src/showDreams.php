<?php
	include './class/Dream.php';
	include_once 'Session.php';
	require_login();
//	include './class/Dreamer.php';

?>
<!DOCTYPE html>
<html>
<head><?php include_once './head.php'; ?></head>
<body>
	<?php include './navbar.php'; ?>
	<div class="container">
		<div class="well">
		<?php
			$dreamer=unserialize($_SESSION['dreamer']);
			$dreamer->getDreams();
			$dreamer->previewDreams();
			$_SESSION['dreamer']=serialize($dreamer);
		?>
		</div>
	</div>
	<script type="text/javascript" charset="utf-8" src="./js/showDreams.js"></script>
	<?php include_once 'foot.php'; ?>
</body>
</html>
