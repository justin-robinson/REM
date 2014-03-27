<?php
	/*****************
	 **Encryption*****
	 *****************/
	include 'Key.php';
	function Encrypt($sValue){
		return EncryptK($sValue, getKey());		
	}

	function EncryptK($sValue, $sSecretKey){
		if($sValue==null || $sSecretKey==null)
			return null;
		else
			return trim(base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256,$sSecretKey, $sValue, MCRYPT_MODE_ECB, mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB), MCRYPT_RAND))));
	}

    function Decrypt($sValue){
    	return DecryptK($sValue, getKey());
	}

	function DecryptK($sValue, $sSecretKey){
		if($sValue==null || $sSecretKey==null)
			return null;
		else
			return trim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256,$sSecretKey,base64_decode($sValue),MCRYPT_MODE_ECB,mcrypt_create_iv(mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256,MCRYPT_MODE_ECB),MCRYPT_RAND)));

	}
?>