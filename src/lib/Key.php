<?php
	/*****************
	 **Key Retrieval**
	 *****************/
	 function getKey(){
		$filename = "/REM/Key";
		$handle = fopen($filename, "r");
		$contents = fread($handle, filesize($filename));
		fclose($handle);
		return $contents;
	}
?>
