<?php
	/*****************
	*****Database*****
	*****************/
	include 'crypt.php';
	include 'Key.php';
	
	function connectToDB(){
		//address, username, password, database name
		list($name, $pwd) = getDBCredentials($perms);
		$key=getREMKey();
		$name=Decrypt($name, $key);
		$pwd=Decrypt($pwd, $key);
		$dbc = new mysqli('localhost', $name, $pwd, 'rem');
		if ($dbc->connect_error) {
			die('Connect Error (' . $dbc->connect_errno . ') '
					. $dbc->connect_error);
		}
		return $dbc;
	}
	
	function getDBCredentials(){
		$filename = "/REM/db";
		$handle = fopen($filename, "r") or die('Error opening file!');
		$credentials=fscanf($handle, "%s\t%s\n");
		fclose($handle);
		return $credentials;
	}
?>
