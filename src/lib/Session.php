<?php
	if(session_status() !=2)
		session_start();
	
	date_default_timezone_set('UTC');
	

	function dreamer_logged_in(){
		$out = FALSE;
		if(isset($_SESSION['dreamer']) && sessionValid())
			$out = TRUE;
		return $out;
	}

	function get_dreamer(){
		if(dreamer_logged_in())
			return unserialize($_SESSION['dreamer']);
	}
	
	function save_dreamer($dreamer){
		$_SESSION['dreamer']=serialize($dreamer);
		$_SESSION['expire_time']=time();
	}

	function destroy_session(){
		session_destroy();
	}

	function login($name, $pwd){
        include_once '../config.php';
		@include_once ROOT.'class/Dreamer.php';
		try{
			$dreamer = new Dreamer();
			$dreamer->loadByCredentials($name, $pwd);
		} catch (Exception $e){
			echo $e->getMessage();
		}
		$out="";
		if($dreamer != NULL){
			save_dreamer($dreamer);
			$out=1;
		}
		return $out;
	}
	function logout(){
		unset($_SESSION['dreamer']);
	}
	function require_login(){
		if(!dreamer_logged_in())
			header( 'Location: http://www.jrobcomputers.com/REM/login.php' );
	}
	function setExpireTime(){
		$_SESSION['expire_time']=time();
	}
	function sessionValid(){
		$out=FALSE;
		$diff = time() - $_SESSION['expire_time'];
		if ($diff < 86400 ){ //24 hours
			$out=TRUE;
			setExpireTime();
		}
		
		return $out;
	}
?>
