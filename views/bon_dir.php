<?php
$rop = $conectar->_db->query("SELECT od.*,iv.* FROM orders od,invoices iv WHERE od.invoice_id = iv.invoice_id AND iv.paid_1 = '0'");
while($ter = mysqli_fetch_array($rop)){
$usist = $ter['id_user'];
      $usdt =  $ter['id_pack'];
      $valis =  $ter['value'];
      $price = $ter['price_in_btc'];
      $priceusd = $ter['price_in_usd'];
     $invoice_id = $ter['invoice_id'];
     $fett = $ter['fecha']; 
     $tiptrans = $ter['tipe_transacc'];


$qerr = $conectar->_db->query("SELECT e1.ID, e1.pack
FROM security_users AS e1
JOIN security_users AS e2
WHERE e1.lft1 < e2.lft1
AND e1.rgt1 > e2.rgt1
AND e2.ID =  '$usist'
ORDER BY e1.ID DESC");


$key = 1;
while($sty = mysqli_fetch_array($qerr)){
    
    

if($key == 1){
    
$paid = $priceusd * 0.15;
if($tiptrans == 2){
$paid1 = $priceusd * 0.15;
$paid = $paid1 / 2;
}

$oiu = $conectar->_db->query("SELECT codigo FROM comision WHERE cedula = '$sty[ID]' AND cedula_otor = '$usist' AND fecha = '$fett'");
$conti = $oiu->num_rows;

        
if($conti <= 0){
 $oiu2 = $conectar->_db->query("INSERT INTO `comision`(`codigo`, `cedula`, `cedula_otor`, `total_puntos`, `total_comisiones`,  `concepto`, `fecha`, `ciclo`) VALUES ('','$sty[ID]','$usist','$point','$paid','1','$fett','$key')");
} 

}

if($key == 2){
    
$paid = $priceusd * 0.03;
if($tiptrans == 2){
$paid1 = $priceusd * 0.03;
$paid = $paid1 / 2;
}

$oiu = $conectar->_db->query("SELECT codigo FROM comision WHERE cedula = '$sty[ID]' AND cedula_otor = '$usist' AND fecha = '$fett'");
$conti = $oiu->num_rows;

        
if($conti <= 0){
 $oiu2 = $conectar->_db->query("INSERT INTO `comision`(`codigo`, `cedula`, `cedula_otor`, `total_puntos`, `total_comisiones`,  `concepto`, `fecha`, `ciclo`) VALUES ('','$sty[ID]','$usist','$point','$paid','1','$fett','$key')");
} 

}

if($key == 3){
    
$paid = $priceusd * 0.01;
if($tiptrans == 2){
$paid1 = $priceusd * 0.01;
$paid = $paid1 / 2;
}

$oiu = $conectar->_db->query("SELECT codigo FROM comision WHERE cedula = '$sty[ID]' AND cedula_otor = '$usist' AND fecha = '$fett'");
$conti = $oiu->num_rows;

        
if($conti <= 0){
 $oiu2 = $conectar->_db->query("INSERT INTO `comision`(`codigo`, `cedula`, `cedula_otor`, `total_puntos`, `total_comisiones`,  `concepto`, `fecha`, `ciclo`) VALUES ('','$sty[ID]','$usist','$point','$paid','1','$fett','$key')");
} 

}

if($key == 4){
    
$paid = $priceusd * 0.01;
if($tiptrans == 2){
$paid1 = $priceusd * 0.01;
$paid = $paid1 / 2;
}

$oiu = $conectar->_db->query("SELECT codigo FROM comision WHERE cedula = '$sty[ID]' AND cedula_otor = '$usist' AND fecha = '$fett'");
$conti = $oiu->num_rows;

        
if($conti <= 0){
 $oiu2 = $conectar->_db->query("INSERT INTO `comision`(`codigo`, `cedula`, `cedula_otor`, `total_puntos`, `total_comisiones`,  `concepto`, `fecha`, `ciclo`) VALUES ('','$sty[ID]','$usist','$point','$paid','1','$fett','$key')");
} 

}


$key++;
}


}





//Puntos del binario


$dhgf = $conectar->_db->query("SELECT ID FROM security_users where estado = '1' AND activo_tree = '1'");
while($ser = mysqli_fetch_array($dhgf)){



$con = $conectar->_db->query("SELECT ID,coloca FROM security_users WHERE parent_id = '$ser[ID]'  ORDER BY ID ASC LIMIT 2");


while($are = mysqli_fetch_array($con)){

$ids = $are['ID'];
$dars = $conectar->_db->query("SELECT lft,rgt FROM security_users WHERE ID = '$ids'");
$ff = mysqli_fetch_array($dars);
$lft = $ff['lft'];
$rgt = $ff['rgt']; 

$tyu = $conectar->_db->query("SELECT ID FROM security_users WHERE lft BETWEEN '$lft' AND '$rgt' AND activo_tree = '1' AND estado = '1'");
$rt =  $tyu->num_rows;

$total_desc = $rt;


$acdt = $conectar->_db->query("UPDATE security_users SET cdec = '$total_desc' WHERE ID='$ids'");


$query = $conectar->_db->query("SELECT ap.ID,ap.identy_user
         FROM  `security_users` ap
         WHERE   ap.lft BETWEEN '$lft' and '$rgt' AND ap.activo_tree = '1'");


$pagog = 0;
while($ads = mysqli_fetch_array($query)){

 $rt92 = $conectar->_db->query("SELECT ID FROM security_users WHERE Id_Parent = '$ads[ID]' AND coloca = 'I' AND estado = '1'");
     $tt2 = $rt92->num_rows;

     $rt921 = $conectar->_db->query("SELECT ID FROM security_users WHERE Id_Parent = '$ads[ID]' AND coloca = 'D' AND estado = '1'");
     $tt21 = $rt921->num_rows;

   

 $adse1 = $conectar->_db->query("SELECT od.*,iv.* FROM orders od,invoices iv WHERE od.invoice_id = iv.invoice_id  AND id_user = '$ads[ID]' AND paid_1 = '0'");
   $sd1 = mysqli_fetch_array($adse1);
   $tiptransos = $sd1['tipe_transacc'];
  
   $paid = $sd1['price_in_usd'];
    if($tiptransos == 1){
     $paid = $sd1['price_in_usd'] / 2;  
   }
   
   if($tiptransos == 2){
     $paid = $sd1['price_in_usd'] / 2;  
   }
   $invoid = $sd1['invoice_id'];
   $comision = $paid; 
   $fecha = $sd1['fecha'];
  

     

  
$pagog = $pagog + $paid;
    

   }

if($pagog > 0){
if($are['coloca'] == 'I'){

$too1s4 = $conectar->_db->query("SELECT * FROM afil_binario WHERE iduser = '$ser[ID]'");
$io4 = mysqli_fetch_array($too1s4);
$valori4 = $io4['valori']; 

$pago = $pagog + $valori4;

$adsfe = $conectar->_db->query("SELECT iduser  FROM afil_binario WHERE iduser = '$ser[ID]'");
$ad = $adsfe->num_rows;

if($ad >'0'){
 $actua = $conectar->_db->query("UPDATE afil_binario SET valori = '$pago', cdeci = '$total_desc' WHERE iduser = '$ser[ID]'");
 
}elseif($ad <= '0'){
 $inse = $conectar->_db->query("INSERT INTO afil_binario (iduser,valori,cdeci) VALUES ('$ser[ID]','$pago','$total_desc')");
}


}elseif($are['coloca'] == 'D'){

$adsfe = $conectar->_db->query("SELECT iduser  FROM afil_binario WHERE iduser = '$ser[ID]'");
$ad = $adsfe->num_rows;


$too1s4 = $conectar->_db->query("SELECT * FROM afil_binario WHERE iduser = '$ser[ID]'");
$io4 = mysqli_fetch_array($too1s4);
$valori4 = $io4['valord']; 

$pago = $pagog + $valori4;



if($ad >'0'){

 $actua = $conectar->_db->query("UPDATE afil_binario SET valord = '$pago', cdecd = '$total_desc' WHERE iduser = '$ser[ID]'");
}elseif($ad >= '0'){
 $inse = $conectar->_db->query("INSERT INTO afil_binario (iduser,valord,cdecd) VALUES ('$ser[ID]','$pago','$total_desc')");
}

}

}



}

}


$oiugg = $conectar->_db->query("UPDATE invoices SET paid_1  = '1' WHERE paid_1 = '0'");  

//fin de la primera fase del proceso


?>

