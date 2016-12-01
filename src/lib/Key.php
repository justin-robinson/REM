<?php
	/*****************
	 **Key Retrieval**
	 *****************/
	 function getKey(){
		$filename = ROOT . "../rem.key";
		$handle = fopen($filename, "r");
		$contents = fread($handle, filesize($filename));
		fclose($handle);
		return $contents;
	}
?>
