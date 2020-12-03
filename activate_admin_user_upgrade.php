<?php 
include("config/bd_config.php");
   
$conectar = new mysql;
$conectar->__construct();

$inve_dgno = $_POST['inve_dgno'];
$us_actva = $_POST['us_actva'];


$srtyf = $conectar->_db->query("SELECT pack FROM security_users WHERE ID = '$us_actva' AND estado = '1'");
  $ciif = mysqli_fetch_array($srtyf);
   $pakiactual = $ciif['0']; 
  
  if($pakiactual <= 0){
      ?>
      <script type="text/javascript">
       alert("El usuario no tiene una inversión Inicial");
       window.location="dash_users";
      </script>
      <?php
      die();
  }
  
  if($pakiactual >= $inve_dgno){
      ?>
      <script type="text/javascript">
       alert("Debe realizar una inversión superior para validar el upgrade");
       window.location="dash_users";
      </script>
      <?php
      die();
  }



//Paquete 1
if($inve_dgno == 2 AND $pakiactual == 1){
    $valtis = 50;
}
if($inve_dgno == 3 AND $pakiactual == 1){
    $valtis = 250;
}
if($inve_dgno == 4 AND $pakiactual == 1){
    $valtis = 550;
}
if($inve_dgno == 5 AND $pakiactual == 1){
    $valtis = 950;
}
if($inve_dgno == 6 AND $pakiactual == 1){
    $valtis = 2950;
}
if($inve_dgno == 7 AND $pakiactual == 1){
    $valtis = 4950;
}
if($inve_dgno == 8 AND $pakiactual == 1){
    $valtis = 9950;
}
if($inve_dgno == 9 AND $pakiactual == 1){
    $valtis = 19950;
}


//paquete 2


if($inve_dgno == 3 AND $pakiactual == 2){
    $valtis = 200;
}
if($inve_dgno == 4 AND $pakiactual == 2){
    $valtis = 500;
}
if($inve_dgno == 5 AND $pakiactual == 2){
    $valtis = 900;
}
if($inve_dgno == 6 AND $pakiactual == 2){
    $valtis = 2900;
}
if($inve_dgno == 7 AND $pakiactual == 2){
    $valtis = 4900;
}
if($inve_dgno == 8 AND $pakiactual == 2){
    $valtis = 9900;
}
if($inve_dgno == 9 AND $pakiactual == 2){
    $valtis = 19900;
}




//paquete 3



if($inve_dgno == 4 AND $pakiactual == 3){
    $valtis = 300;
}
if($inve_dgno == 5 AND $pakiactual == 3){
    $valtis = 700;
}
if($inve_dgno == 6 AND $pakiactual == 3){
    $valtis = 2700;
}
if($inve_dgno == 7 AND $pakiactual == 3){
    $valtis = 4700;
}
if($inve_dgno == 8 AND $pakiactual == 3){
    $valtis = 9700;
}
if($inve_dgno == 9 AND $pakiactual == 3){
    $valtis = 19700;
}


//paquete 4


if($inve_dgno == 5 AND $pakiactual == 4){
    $valtis = 400;
}
if($inve_dgno == 6 AND $pakiactual == 4){
    $valtis = 2400;
}
if($inve_dgno == 7 AND $pakiactual == 4){
    $valtis = 4400;
}
if($inve_dgno == 8 AND $pakiactual == 4){
    $valtis = 9400;
}
if($inve_dgno == 9 AND $pakiactual == 4){
    $valtis = 19400;
}


//paquete 5


if($inve_dgno == 6 AND $pakiactual == 5){
    $valtis = 2000;
}
if($inve_dgno == 7 AND $pakiactual == 5){
    $valtis = 4000;
}
if($inve_dgno == 8 AND $pakiactual == 5){
    $valtis = 9000;
}
if($inve_dgno == 9 AND $pakiactual == 5){
    $valtis = 19000;
}


//paquete 6


if($inve_dgno == 7 AND $pakiactual == 6){
    $valtis = 2000;
}
if($inve_dgno == 8 AND $pakiactual == 6){
    $valtis = 7000;
}
if($inve_dgno == 9 AND $pakiactual == 6){
    $valtis = 17000;
}


//paquete 7


if($inve_dgno == 8 AND $pakiactual == 7){
    $valtis = 5000;
}
if($inve_dgno == 9 AND $pakiactual == 7){
    $valtis = 15000;
}



//paquete 8


if($inve_dgno == 9 AND $pakiactual == 8){
    $valtis = 10000;
}


if($inve_dgno != '' AND $us_actva != ''){
  
    
  $too1 = $conectar->_db->query("UPDATE  security_users SET estado = '1',pack='$inve_dgno' WHERE ID = '$us_actva' "); 
  
  $srty = $conectar->_db->query("SELECT invoice_id FROM invoices ORDER BY invoice_id DESC LIMIT 1");
  $cii = mysqli_fetch_array($srty);
  $newfactur = $cii[0] + 1; 
  
  $inso = $conectar->_db->query("INSERT INTO `invoices`(`invoice_id`, `price_in_usd`, `price_in_btc`,  `id_user`, `id_pack`, `fecha`, tipe_transacc) VALUES ('$newfactur','$valtis','$valtis','$us_actva','$inve_dgno',NOW(),'2')");
  
  $insofa = $conectar->_db->query("INSERT INTO `orders`(`transaction_hash`, `value`, `invoice_id`) VALUES ('admin','$valtis','$newfactur')");
}

?>

<script type="text/javascript">
window.location="dash_users";
</script>