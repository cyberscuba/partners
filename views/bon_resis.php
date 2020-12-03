<?php
$rop1 = $conectar->_db->query("SELECT ID,pack,parent_id FROM security_users WHERE estado = '1'  AND ID <> '1'");
while($ter1 = mysqli_fetch_array($rop1)){
if($ter1[pack] == 1){    
$priceusd1 = 500;
}

if($ter1[pack] == 2){    
$priceusd1 = 1000;
}

if($ter1[pack] == 3){    
$priceusd1 = 3000;
}

$padre1 = $ter1[parent_id];

$qerr1 = $conectar->_db->query("SELECT parent_id
FROM security_users WHERE ID =  '$padre1'");
$sty1 = mysqli_fetch_array($qerr1);
$padre2 = $sty1[parent_id]; 


$qerr12 = $conectar->_db->query("SELECT parent_id
FROM security_users WHERE ID =  '$padre2'");
$sty12 = mysqli_fetch_array($qerr12);
$padre3 = $sty12[parent_id];


$qerr13 = $conectar->_db->query("SELECT parent_id
FROM security_users WHERE ID =  '$padre3'");
$sty13 = mysqli_fetch_array($qerr13);
$padre4 = $sty13[parent_id];


 $hoyoi = date("Y-m-d");
 $ssss = $conectar->_db->query("SELECT codigo 
FROM comision WHERE cedula = '$padre1' AND cedula_otor = '$ter1[ID]' AND fecha = '$hoyoi'");
$quent  = $ssss->num_rows;

if($quent <= 0){
$paid1 = ($priceusd1 * 0.04) / 100;

 $oiu21 = $conectar->_db->query("INSERT INTO `comision`(`codigo`, `cedula`, `cedula_otor`, `total_comisiones`,  `concepto`, `fecha`, `ciclo`) VALUES ('','$padre1','$ter1[ID]','$paid1','2','$hoyoi','1')");



$paid1 = ($priceusd1 * 0.032) / 100;

if($padre2 > 0){
 $oiu21 = $conectar->_db->query("INSERT INTO `comision`(`codigo`, `cedula`, `cedula_otor`, `total_comisiones`,  `concepto`, `fecha`, `ciclo`) VALUES ('','$padre2','$ter1[ID]','$paid1','2','$hoyoi','2')");

}
$paid1 = ($priceusd1 * 0.02) / 100;

if($padre3 > 0){
 $oiu21 = $conectar->_db->query("INSERT INTO `comision`(`codigo`, `cedula`, `cedula_otor`, `total_comisiones`,  `concepto`, `fecha`, `ciclo`) VALUES ('','$padre3','$ter1[ID]','$paid1','2','$hoyoi','3')");
}

$paid1 = ($priceusd1 * 0.008) / 100;

if($padre4 > 0){
    
$oiu21 = $conectar->_db->query("INSERT INTO `comision`(`codigo`, `cedula`, `cedula_otor`, `total_comisiones`,  `concepto`, `fecha`, `ciclo`) VALUES ('','$padre4','$ter1[ID]','$paid1','2','$hoyoi','4')");
}

$oiuggqwe = $conectar->_db->query("UPDATE security_users SET marcado  = '1' WHERE ID = '$ter1[ID]'"); 
}
}



