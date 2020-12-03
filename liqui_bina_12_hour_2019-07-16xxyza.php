<?php
     include("config/bd_config.php");

$conectar = new mysql;
$conectar->__construct();

$too1 = $conectar->_db->query("SELECT * FROM security_users WHERE estado = '1' ");

while ($gil1 = mysqli_fetch_array($too1)) {
    $packi = $gil1['pack'];
    if ($packi >= 1) {
        $porciss = "0.08";
        /*
        if($packi == 1){
             $porciss = "0.08";
        }


        if($packi == 2){
            $porciss = "0.08";
        }

        if($packi == 3){
            $porciss = "0.08";
        }

        if($packi == 4){
            $porciss = "0.08";
        }

        if($packi == 5){
            $porciss = "0.10";
        }

        if($packi == 6){
            $porciss = "0.10";
        }

        if($packi == 7){
            $porciss = "0.10";
        }

        if($packi == 8){
            $porciss = "0.10";
        }

        if($packi == 9){
            $porciss = "0.10";
        }

        */





        $too1s = $conectar->_db->query("SELECT * FROM afil_binario WHERE iduser = '$gil1[ID]'");
        $io = mysqli_fetch_array($too1s);
        $valori = $io['valori'];
        $valord = $io['valord'];

        $comi2 = 0;

        if ($valori > $valord) {
            $comi2 = $valord;
            $comi3 = $valord * $porciss;
            $comi1 = $valori - $valord;

            if ($comi2 > 0) {
                $ff4f = $conectar->_db->query("INSERT INTO `comision`(`codigo`, `cedula`, `cedula_otor`,`pointi`,`poind`, `total_puntos`, `total_comisiones`, `concepto`, `fecha`) VALUES ('','$gil1[ID]','$gil1[ID]','$comi1','0','$comi2','$comi3','2',NOW())");
            }

            $ff4fd = $conectar->_db->query("UPDATE afil_binario SET valori='$comi1', valord='0' WHERE iduser = '$gil1[ID]'");
        } elseif ($valori < $valord) {
            $comi2 = $valori;
            $comi3 = $valori * $porciss;
            $comi1 = $valord - $valori;
            if ($comi2 > 0) {
                $ff4f = $conectar->_db->query("INSERT INTO `comision`(`codigo`, `cedula`, `cedula_otor`,`pointi`,`poind`, `total_puntos`, `total_comisiones`, `concepto`, `fecha`) VALUES ('','$gil1[ID]','$gil1[ID]','0','$comi1','$comi2','$comi3','2',NOW())");
            }

            $ff4fd = $conectar->_db->query("UPDATE afil_binario SET valori='0', valord='$comi1' WHERE iduser = '$gil1[ID]'");
        } elseif ($valori == $valord) {
            $comi2 = $valord;
            $comi1 = $valori - $valord;
            $comi3 = $valord * $porciss;


            if ($comi2 > 0) {
                $ff4f = $conectar->_db->query("INSERT INTO `comision`(`codigo`, `cedula`, `cedula_otor`,`pointi`,`poind`, `total_puntos`, `total_comisiones`, `concepto`, `fecha`) VALUES ('','$gil1[ID]','$gil1[ID]','0','$comi1','$comi2','$comi3','2',NOW())");
            }

            $ff4fd = $conectar->_db->query("UPDATE afil_binario SET valori='0', valord='0' WHERE iduser = '$gil1[ID]'");
        }
    }
}

    $selcto1 = $conectar->_db->query("UPDATE comision SET estado = '1' WHERE estado  = '0'");
    echo "Exitosa....";
