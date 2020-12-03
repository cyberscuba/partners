<?php

include 'include.php';


$bill = "xpub6Bj5HVGvFWAQCf6SfYa6af5Fm7HrqHyDiVkjs3op4i9nrjnmDePeKVd1gpVPJ6Uab8SkygwVGNKLnDP9xLHE3u64NqVPZY2RRwmYNaEyJqa";
 $balance = file_get_contents($blockchain_root . "es/balance?active=" . $bill);
$balan = json_decode($balance, true);
foreach ($balan as $bal) {
      $satoshi = $bal['total_received']; //Satoshi to btc
echo number_format(($satoshi)*(pow(10, -8)), 8, '.', ''); //Returns 0.00005000
  
}


?>