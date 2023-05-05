<?php

	include('CryptAES.php');
	$aes = new CryptAES();
	$key = "8HF6K2eloDebD9ikXQmsig==";   // UAT

	$secret=base64_decode($key);
	$aes->set_key($secret);
	// $aes->setKey($secret);
	// $encData = $_REQUEST['encData'];
	if ($_REQUEST['encData'])
	{
	// echo "<Br> Encrypted data = ".$_REQUEST['encData'];
	// echo "<Br> Decrypted data = ". 
		$encData = $aes->decrypt($_REQUEST['encData'], $key);
	
        echo json_encode(array(
            'status' => true,
            'encData' => $encData,
        ));
	} else {
		die("Please try again...");
	}
 ?>
