<?php
	if(session_status() !=2)
		session_start();

	function dreamer_logged_in(){
		$out = FALSE;
		if(isset($_SESSION['dreamer']))
			$out = TRUE;
		return $out;
	}

	function get_dreamer(){
		if(dreamer_logged_in())
			return $_SESSION['dreamer'];
	}

	function destroy_session(){
		session_destroy();
	}

	function login($name, $pwd){
		include_once './class/Dreamer.php';
		try{
			$dreamer = new Dreamer($name, $pwd);
		} catch (Exception $e){
			echo $e->getMessage();
		}
		$out="";
		if($dreamer != NULL){
			$_SESSION['dreamer']=serialize($dreamer);
			$out=1;
		}
		return $out;	
	}
	function logout(){
		unset($_SESSION['dreamer']);
	}
	function require_login(){
		if(!dreamer_logged_in())
			header( 'Location: http://rem.jrobcomputers.com/login.php' );
	}
?>
