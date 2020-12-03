<?php 
include("config/bd_config.php");
   
$conectar = new mysql;
$conectar->__construct();

$inve_dgno = $_POST['inve_dgno'];
$us_actva = $_POST['us_actva'];

if($inve_dgno == 1){
    $valtis = 100;
}

if($inve_dgno != '' AND $us_actva != ''){
  $ropiso = $conectar->_db->query("SELECT COUNT(iv.invoice_id) contis FROM orders od,invoices iv WHERE od.invoice_id = iv.invoice_id AND iv.id_user = '$us_actva'");
  $tal = mysqli_fetch_array($ropiso);
  $pol = $tal['0'];
  if($pol >= 1){
      $rein = 1;
  }else{
      $rein = 0;
  }
    
  $too1 = $conectar->_db->query("UPDATE  security_users SET estado = '1',pack='$inve_dgno' WHERE ID = '$us_actva' "); 
  $too1up = $conectar->_db->query("UPDATE  comision SET estado = '1' WHERE cedula = '$us_actva' AND estado = '0'");
  
  $srty = $conectar->_db->query("SELECT invoice_id FROM invoices ORDER BY invoice_id DESC LIMIT 1");
  $cii = mysqli_fetch_array($srty);
  $newfactur = $cii[0] + 1; 
  
  $inso = $conectar->_db->query("INSERT INTO `invoices`(`invoice_id`, `price_in_usd`, `price_in_btc`,  `id_user`, `id_pack`, `fecha`, tipe_transacc) VALUES ('$newfactur','$valtis','$valtis','$us_actva','$inve_dgno',NOW(),'$rein')");
  
  $insofa = $conectar->_db->query("INSERT INTO `orders`(`transaction_hash`, `value`, `invoice_id`) VALUES ('admin','$valtis','$newfactur')");
}

?>

<script type="text/javascript">
window.location="dash_users";
</script>