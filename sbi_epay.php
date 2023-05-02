<?php
/*
	Sample SBI EPay 
*/
// echo "<b><center>Billing, Shipping and Payment Model</center></b><br/><br/>";

include('Crypt/AES.php');

//encryption key
// $key = "wImKoNvsqbSswM/bO0FT4A==";
$key = "8HF6K2eloDebD9ikXQmsig==";   // UAT
// $key = "fBc5628ybRQf88f/aqDUOQ==";   // UAT
//requestparameter 
// $requestParameter  ="1000003|DOM|IN|INR|2|Other|https://SbiEpay/sbi_mcrypt_lib/sbi_epay/sucess.php|https://SbiEpay/sbi_mcrypt_lib/sbi_epay/fail.php|SBIEPAY|DP123|2|NB|ONLINE|ONLINE";
// $requestParameter  ="1000003|DOM|IN|INR|25|other|http://103.82.144.234:8080/afc/payment-result-processor/sucess|http://103.82.144.234:8080/afc/payment-result-processor/failure|SBIEPAY|23835593|23835593|NB|ONLINE|ONLINE";
$requestParameter = isset($_POST['requestParameter']) ? $_POST['requestParameter'] : "";
// echo '<b>Requestparameter:-</b> '.$requestParameter.'<br/><br/>';
//Billingdetails
// $billingDtls ="BillerName|Mumbai|Maharastra|403706|India|+91|222|1234567|9892456281|biller@gmail.com|N";
$billingDtls = isset($_POST['billingDtls']) ? $_POST['billingDtls'] : "";

// echo '<b>Billingdetails:-</b> '.$billingDtls.'<br/><br/>';
//Shippingdetails
// $shippingDtls ="ShipperName|Mayuresh Enclave, Sector 20, Plat A-211, Nerul(w),Navi-Mumbai,403706|Mumbai|Maharastra|India|403706|+91|222|30988373|981234567";
$shippingDtls = isset($_POST['shippingDtls']) ? $_POST['shippingDtls'] : "";
// echo '<b>Shippingdetails:-</b> '.$shippingDtls.'<br/><br/>';

//Paymentdetails
$PaymentDtls = isset($_POST['PaymentDtls']) ? $_POST['PaymentDtls'] : "";
// $PaymentDtls="aggGtwmapID| | | | | | |";
// echo '<b>Paymentdetails:-</b> '.$PaymentDtls.'<br/><br/>';

$aes = new Crypt_AES();
$secret=base64_decode($key);
$aes->setKey($secret);

$EncryptTrans =base64_encode($aes->encrypt($requestParameter));
$EncryptbillingDetails =base64_encode($aes->encrypt($billingDtls));
$EncryptshippingDetais  = base64_encode($aes->encrypt($shippingDtls));	
$EncryptpaymentDetails  = base64_encode($aes->encrypt($PaymentDtls));

// echo '<b>Encrypted EncryptTrans:-</b>'.$EncryptTrans.'<br/><br/>';
// echo '<b>Encrypted EncryptbillingDetails:-</b> '.$EncryptbillingDetails.'<br/><br/>';
// echo '<b>Encrypted EncryptshippingDetais:-</b>'.$EncryptshippingDetais.'<br/><br/>';
// echo '<b>Encrypted EncryptpaymentDetails:-</b>'.$EncryptpaymentDetails.'<br/><br/>';
// echo "<br/>Action URL:https://test.sbiepay.sbi/secure/AggregatorHostedListener"; 

echo json_encode(array(
	'flag' => 1,
	'EncryptTrans' => $EncryptTrans,
	'EncryptbillingDetails' => $EncryptbillingDetails,
	'EncryptshippingDetais' => $EncryptshippingDetais,
	'EncryptpaymentDetails' => $EncryptpaymentDetails,
));

?>