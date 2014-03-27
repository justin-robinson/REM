<?php
	/*****************
	 **Key Generation*
	 *****************/
	function uniqueKey(){
		$dbc=connectToDB();
		do{
			$key = keyGen();
			$stored = Encrypt($key);
			$row = $dbc->query("SELECT `user_key` FROM `dreamers` where `user_key`='{$stored}'")->fetch_assoc();
		}while($row['user_key'] != null);
		$dbc->close();
		return $key;
	}
	function keyGen(){
		$key = "";
		for($i=0; $i<32; $i++){		
			$key .= chr(mt_rand(0,255));}
		return $key;
	}
?>