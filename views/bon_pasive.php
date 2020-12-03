<?php


$conectar = new mysql;  
$conectar->__construct();

$query = $conectar->_db->query("SELECT ID,pack FROM security_users WHERE estado = '1' AND activo_tree = '1'");
while($lif = mysqli_fetch_array($query)){

$packio = $lif['pack'];
$start = 100;
$hoy = date("Y-m-d");

$ff = $conectar->_db->query("SELECT codigo  FROM  `comision` WHERE cedula = '$lif[ID]' AND concepto  = '4'"); 
$cont = $ff->num_rows;

if($cont <= $start){

if($packio == 1){
$comi = "1";
}
if($packio == 2){
$comi = "2";
}
if($packio == 3){
$comi = "6";
}
if($packio == 4){
$comi = "12";
}
if($packio == 5){
$comi = "20";
}
if($packio == 6){
$comi = "60";
}
if($packio == 7){
$comi = "100";
}
if($packio == 8){
$comi = "200";
}
if($packio == 9){
$comi = "400";
}

 if($comi > 0){

$sipi = $tipe;
$valores = $comi;



if($ASS <= 0){ 
$ff4f = $conectar->_db->query("INSERT INTO `comision`(`codigo`, `cedula`, `cedula_otor`,  `total_comisiones`, `concepto`, `fecha`) VALUES ('','$lif[ID]','$lif[ID]','$comi','4','$hoy')");
}


  }

}

}

?>