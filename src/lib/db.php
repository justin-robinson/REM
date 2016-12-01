<?php
	/*****************
	*****Database*****
	*****************/
	include 'cryption.php';
	
	function connectToDB(){
		//address, username, password, database name
		list($name, $pwd) = getDBCredentials();
		$name=Decrypt($name);
		$pwd=Decrypt($pwd);
		$dbc = new mysqli('localhost', $name, $pwd, 'rem');
		if ($dbc->connect_error) {
			die('Connect Error (' . $dbc->connect_errno . ') '
					. $dbc->connect_error);
		}
		return $dbc;
	}
	
	function getDBCredentials(){
		$filename = "/REM/db";
		$handle = fopen($filename, "r") or die("Error opening {$filename}");
		$credentials=fscanf($handle, "%s\t%s\n");
		fclose($handle);
		return $credentials;
	}
?>
