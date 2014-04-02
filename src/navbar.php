<?php
	$page_name= basename($_SERVER['PHP_SELF']);
	include_once '/var/www/REM/src/class/Dreamer.php';
	include_once '/var/www/REM/src/lib/Session.php';
?>
<nav class="navbar navbar-inverse" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-1">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="http://rem.jrobcomputers.com"><img src="https://s910eq.by3302.livefilestore.com/y2pBz_sF0A07HzyzQCYRapn6gayukjgRP1V1r5X0jjo8KONh_oXa_DR4lVLM1AKxC_RJ9nWdtLqDOf-ioePEnAjDMSujiUfvtcB9CSViuqalo4/rem-logo-small.png?psid=1"></a>
		</div>
		<div class="collapse navbar-collapse" id="navbar-collapse-1">
			<ul class="nav navbar-nav">
			<?php if(dreamer_logged_in()) : ?>
				<li 
				<?php if ($page_name=="showDreams.php")
					echo "class=\"active\""?>
				><a href="showDreams.php">Dreams</a></li>
			<?php endif; ?>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<?php if(dreamer_logged_in()) : ?>
				<li><a href="#"><?php print(unserialize($_SESSION['dreamer'])->getName()); ?></a></li>
				<li><a id="logout" href="#"><span class="glyphicon glyphicon-log-out"></span></a></li>
				<?php else : ?>
				<li><a href="login.php">Login</a></li>
				<?php endif; ?>
			</ul>
		</div>
	</div>
</nav>
