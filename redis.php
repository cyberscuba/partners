<?php
include("config/bd_config.php");

$conectar = new mysql;  
$conectar->__construct();
$dias = array("7","1","2","3","4","5","6");
$plazi =  $dias[date("w")];

if($plazi != 6 AND $plazi != 7 ){ 

$query = $conectar->_db->query("SELECT ID,pack FROM security_users WHERE estado = '1'");
while($lif = mysqli_fetch_array($query)){

$packio = $lif['pack'];
$hoy = date("Y-m-d");

$ff = $conectar->_db->query("SELECT codigo  FROM  `comision` WHERE cedula = '$lif[ID]' AND concepto  = '4'"); 
$cont = $ff->num_rows;



if($packio <= 0){
$comi = 0;
}
if($packio == 1){
$comi = 500 * 0.004;
}
if($packio == 2){
$comi = 1000 * 0.004;
}
if($packio == 3){
$comi = 3000 * 0.004;
}

 if($comi > 0){
$ff4f = $conectar->_db->query("INSERT INTO `comision`(`codigo`, `cedula`, `cedula_otor`,  `total_comisiones`, `concepto`, `fecha`) VALUES ('','$lif[ID]','$lif[ID]','$comi','4','$hoy')");

  }

}

}


?>