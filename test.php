<?php
header("Access-Control-Allow-Origin: *");
// get request method
$method = $_SERVER['REQUEST_METHOD'];
if ($method == 'GET') {
    echo json_encode(array(
        'flag' => 0,
        'msg' => "THIS IS A GET REQUEST"
    ));
}
if ($method == 'POST') {
	echo "THIS IS A POST REQUEST";
}
if ($method == 'PUT') {
	echo "THIS IS A PUT REQUEST";
}
if ($method == 'DELETE') {
	echo "THIS IS A DELETE REQUEST";
}




// echo '<b>Encrypted EncryptTrans:-</b>'.$EncryptTrans.'<br/><br/>';
// echo '<b>Encrypted EncryptbillingDetails:-</b> '.$EncryptbillingDetails.'<br/><br/>';
// echo '<b>Encrypted EncryptshippingDetais:-</b>'.$EncryptshippingDetais.'<br/><br/>';
// echo '<b>Encrypted EncryptpaymentDetails:-</b>'.$EncryptpaymentDetails.'<br/><br/>';
// echo "<br/>Action URL:https://test.sbiepay.sbi/secure/AggregatorHostedListener"; 
