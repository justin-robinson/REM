<?php
	/*****************
	 **Encryption*****
	 *****************/
	function Encrypt($sValue, $sSecretKey){
		if($sValue==null)
			return null;
		else
			return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256,$sSecretKey, $sValue, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))));
	}

    function Decrypt($sValue, $sSecretKey){
		if($sValue==null)
			return null;
		else
			return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,$sSecretKey,base64_decode($sValue),MCRYPT_MODE_ECB,mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256,MCRYPT_MODE_ECB),MCRYPT_RAND)));
	}		
?>