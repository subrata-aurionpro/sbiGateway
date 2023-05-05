<?php
    
	include('CryptAES.php');
    $aes = new CryptAES();
    $key = "8HF6K2eloDebD9ikXQmsig==";   // UAT
  
   // $aes->set_key(base64_decode($key));
   // $aes->require_pkcs5();
    $secret=base64_decode($key);
    $aes->set_key($secret);
    if ($_REQUEST['encData'])
    {
        // echo "<Br> Encrypted data = ".$_REQUEST['encData'];
        // echo "<Br> Decrypted data = ". 
        $encData = $aes->decrypt($_REQUEST['encData'], $key);
            
        echo json_encode(array(
            'status' => false,
            'encData' => $encData,
        ));
    } else {
        die("Please try again...");
    }
?>
