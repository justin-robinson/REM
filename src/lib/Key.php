<?php
	/*****************
	 **Key Retrieval**
	 *****************/
	 function getREMKey(){
		$filename = "/REM/Key";
		$handle = fopen($filename, "r");
		$contents = fread($handle, filesize($filename));
		fclose($handle);
		return $contents;
	}
?>
