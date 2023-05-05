<?php
$key = "8HF6K2eloDebD9ikXQmsig==";   // UAT
$requestParameter = isset($_POST['requestParameter']) ? $_POST['requestParameter'] : "";
$billingDtls = isset($_POST['billingDtls']) ? $_POST['billingDtls'] : "";
$shippingDtls = isset($_POST['shippingDtls']) ? $_POST['shippingDtls'] : "";

//Paymentdetails
$PaymentDtls = isset($_POST['PaymentDtls']) ? $_POST['PaymentDtls'] : "";

include('Crypt/AES.php');
$aes = new Crypt_AES();

// include('CryptAES.php');
// $aes = new CryptAES();

$secret=base64_decode($key);
// $aes->set_key($secret);
$aes->setKey($secret);

$EncryptTrans =base64_encode($aes->encrypt($requestParameter));
$EncryptbillingDetails =base64_encode($aes->encrypt($billingDtls));
$EncryptshippingDetais  = base64_encode($aes->encrypt($shippingDtls));	
$EncryptpaymentDetails  = base64_encode($aes->encrypt($PaymentDtls));

echo json_encode(array(
	'flag' => 1,
	'EncryptTrans' => $EncryptTrans,
	'EncryptbillingDetails' => $EncryptbillingDetails,
	'EncryptshippingDetais' => $EncryptshippingDetais,
	'EncryptpaymentDetails' => $EncryptpaymentDetails,
));

?>