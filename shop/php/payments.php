<?php
include 'include.php';


$guid="91d65a89-d74f-49f7-af2b-ea2560078345";
$firstpassword="magicbtc2018appNEW";
$secondpassword="beltranjuanmagic2018APPn";
$price_in_usd = 10;
$amounta  = file_get_contents($blockchain_root . "tobtc?currency=USD&value=" . $price_in_usd);

$bill = "xpub6Bj5HVGvFWAQ3GurBFbXfV4FMqw4tZU8wAp8mHr3JGyewVzq5Tqrp3QNFrnWKFGmMfTvx7JWmjdf483kYz2G1xZFZJJtGQ6vBTUFXPhT25g";
 $balance = file_get_contents($blockchain_root . "es/balance?active=" . $bill);
$balan = json_decode($balance, true);
foreach ($balan as $bal) {
  
  $satoshi = $bal['final_balance']; //Satoshi to btc
echo number_format(($satoshi)*(pow(10, -8)), 8, '.', ''); //Returns 0.00005000
}

?>