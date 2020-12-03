<?php
include("config/bd_config.php");

$conectar = new mysql;
$conectar->__construct();
$dias = array("7","1","2","3","4","5","6");
$plazi =  $dias[date("w")];

if ($plazi != 6 and $plazi != 7) {
    $query = $conectar->_db->query("SELECT ID,pack FROM security_users WHERE estado = '1' AND activo_tree = '1' ");
    $contador = 0;
    foreach ($query as $lif2) {
        $contador ++;
        $packio = $lif2['pack'];
        $hoy = date("Y-m-d");

        $ff = $conectar->_db->query("SELECT codigo  FROM  `comision` WHERE cedula = '$lif2[ID]' AND concepto  = '4'");
        $cont = $ff->num_rows;

        //Ojo estos bonos era la forma inicial, ahora hay que traer el valor nuevo de cada bono.
        if ($packio <= 0) {
            $comi = 0;
        }
        //Codigo para obtenere el valor del pack
        if ($packio > 0) {
            $query = $conectar->_db->query("SELECT id,val_usd  FROM pack WHERE id = '$packio'");
            foreach ($query as $result) {
                $valor_usd = $result['val_usd'];
                $valor_usd = floatval($valor_usd);
            }

            $comi = $valor_usd  * 0.004;
        }

        if ($comi > 0) {
            //print_r($contador);
            //echo' = ';
            //print_r($lif2[ID]);
            //echo',';
            //print_r($comi);
            //echo',';
            //print_r($hoy);
            //echo'<br>';
            $ff4f = $conectar->_db->query("INSERT INTO `comision`(`codigo`, `cedula`, `cedula_otor`,  `total_comisiones`, `concepto`, `fecha`) VALUES ('','$lif2[ID]','$lif2[ID]','$comi','4','$hoy')");
        }
    }


    // while ($lif = mysqli_fetch_array($query)) {
    //     $packio = $lif['pack'];
    //     $hoy = date("Y-m-d");
    //     print_r($packio);

    //     $ff = $conectar->_db->query("SELECT codigo  FROM  `comision` WHERE cedula = '$lif[ID]' AND concepto  = '4'");
    //     $cont = $ff->num_rows;

    //     //Ojo estos bonos era la forma inicial, ahora hay que traer el valor nuevo de cada bono.
    //     if ($packio <= 0) {
    //         $comi = 0;
    //     }
    //     /*
    //     if($packio == 1){
    //         $comi = 500 * 0.004;
    //     }
    //     if($packio == 2){
    //         $comi = 1000 * 0.004;
    //     }
    //     if($packio == 3){
    //         $comi = 3000 * 0.004;
    //     }*/

    //     //Codigo para obtenere el valor del pack
    //     if ($packio > 0) {
    //         $query = $conectar->_db->query("SELECT id,val_usd  FROM pack WHERE id = '$packio'");
    //         foreach ($query as $result) {
    //             $valor_usd = $result['val_usd'];
    //             $valor_usd = floatval($valor_usd);
    //         }

    //         $comi = $valor_usd  * 0.004;
    //     }

    //     if ($comi > 0) {
    //         $ff4f = $conectar->_db->query("INSERT INTO `comision`(`codigo`, `cedula`, `cedula_otor`,  `total_comisiones`, `concepto`, `fecha`) VALUES ('','$lif[ID]','$lif[ID]','$comi','4','$hoy')");
    //     }
    // }


    //segunda fase de bonos
    $rop1 = $conectar->_db->query("SELECT ID , pack, parent_id FROM security_users WHERE estado = '1'  AND ID <> '1'");
    /*
    //CODIGO NUEVO SEGUNDA FASE DE BONOS
    foreach($rop1 as $ter1){

         //Codigo para obtenere el valor del pack
        $query = $conectar->_db->query("SELECT id,val_usd  FROM pack WHERE id = '$ter1[pack]'");
        foreach ($query as $result) {
            $valor_usd = $result['val_usd'];
            $priceusd1 = floatval($valor_usd);
        }

        $padre1 = $ter1[parent_id];
        $qerr1 = $conectar->_db->query("SELECT parent_id FROM security_users WHERE ID =  '$padre1'");
        $sty1 = mysqli_fetch_array($qerr1);
        $padre2 = $sty1[parent_id];


        $qerr12 = $conectar->_db->query("SELECT parent_id FROM security_users WHERE ID =  '$padre2'");
        $sty12 = mysqli_fetch_array($qerr12);
        $padre3 = $sty12[parent_id];

        $qerr13 = $conectar->_db->query("SELECT parent_id FROM security_users WHERE ID =  '$padre3'");
        $sty13 = mysqli_fetch_array($qerr13);
        $padre4 = $sty13[parent_id];

        $hoyoi = date("Y-m-d");
        $ssss = $conectar->_db->query("SELECT codigo FROM comision WHERE cedula = '$padre1' AND cedula_otor = '$ter1[ID]' AND fecha = '$hoyoi'");
        $quent  = $ssss->num_rows;




        if ($quent <= 0) {

            $paid1 = ($priceusd1 * 0.04) / 100;
            $oiu21 = $conectar->_db->query("INSERT INTO `comision`(`codigo`, `cedula`, `cedula_otor`, `total_comisiones`,  `concepto`, `fecha`, `ciclo`) VALUES ('','$padre1','$ter1[ID]','$paid1','2','$hoyoi','1')");
            $paid1 = ($priceusd1 * 0.032) / 100;

            if ($padre2 > 0) {
                $oiu21 = $conectar->_db->query("INSERT INTO `comision`(`codigo`, `cedula`, `cedula_otor`, `total_comisiones`,  `concepto`, `fecha`, `ciclo`) VALUES ('','$padre2','$ter1[ID]','$paid1','2','$hoyoi','2')");
            }
            $paid1 = ($priceusd1 * 0.02) / 100;

            if ($padre3 > 0) {
                $oiu21 = $conectar->_db->query("INSERT INTO `comision`(`codigo`, `cedula`, `cedula_otor`, `total_comisiones`,  `concepto`, `fecha`, `ciclo`) VALUES ('','$padre3','$ter1[ID]','$paid1','2','$hoyoi','3')");
            }

            $paid1 = ($priceusd1 * 0.008) / 100;

            if ($padre4 > 0) {
                $oiu21 = $conectar->_db->query("INSERT INTO `comision`(`codigo`, `cedula`, `cedula_otor`, `total_comisiones`,  `concepto`, `fecha`, `ciclo`) VALUES ('','$padre4','$ter1[ID]','$paid1','2','$hoyoi','4')");
            }

            echo'ejecuto update';
            //$oiuggqwe = $conectar->_db->query("UPDATE security_users SET marcado  = '1' WHERE ID = '$ter1[ID]'");
        }


    }*/


    while ($ter1 = mysqli_fetch_array($rop1)) {
        //echo'<pe>';
        //print_r($ter1);
        //echo'</pre>';

        //Codigo para obtenere el valor del pack
        $query = $conectar->_db->query("SELECT id,val_usd  FROM pack WHERE id = '$ter1[pack]'");
        foreach ($query as $result) {
            $valor_usd = $result['val_usd'];
            $priceusd1 = floatval($valor_usd);
        }

        /*
        if($ter1[pack] == 1){
            $priceusd1 = 500;
        }
        if($ter1[pack] == 2){
            $priceusd1 = 1000;
        }
        if($ter1[pack] == 3){
            $priceusd1 = 3000;
        }
        */



        $padre1 = $ter1[parent_id];
        $qerr1 = $conectar->_db->query("SELECT parent_id FROM security_users WHERE ID =  '$padre1'");
        $sty1 = mysqli_fetch_array($qerr1);
        $padre2 = $sty1[parent_id];

        $qerr12 = $conectar->_db->query("SELECT parent_id FROM security_users WHERE ID =  '$padre2'");
        $sty12 = mysqli_fetch_array($qerr12);
        $padre3 = $sty12[parent_id];

        $qerr13 = $conectar->_db->query("SELECT parent_id FROM security_users WHERE ID =  '$padre3'");
        $sty13 = mysqli_fetch_array($qerr13);
        $padre4 = $sty13[parent_id];

        $hoyoi = date("Y-m-d");
        $ssss = $conectar->_db->query("SELECT codigo FROM comision WHERE cedula = '$padre1' AND cedula_otor = '$ter1[ID]' AND fecha = '$hoyoi'");
        $quent  = $ssss->num_rows;

        if ($quent <= 0) {
            $paid1 = ($priceusd1 * 0.04) / 100;
            $oiu21 = $conectar->_db->query("INSERT INTO `comision`(`codigo`, `cedula`, `cedula_otor`, `total_comisiones`,  `concepto`, `fecha`, `ciclo`) VALUES ('','$padre1','$ter1[ID]','$paid1','2','$hoyoi','1')");
            $paid1 = ($priceusd1 * 0.032) / 100;

            if ($padre2 > 0) {
                $oiu21 = $conectar->_db->query("INSERT INTO `comision`(`codigo`, `cedula`, `cedula_otor`, `total_comisiones`,  `concepto`, `fecha`, `ciclo`) VALUES ('','$padre2','$ter1[ID]','$paid1','2','$hoyoi','2')");
            }
            $paid1 = ($priceusd1 * 0.02) / 100;

            if ($padre3 > 0) {
                $oiu21 = $conectar->_db->query("INSERT INTO `comision`(`codigo`, `cedula`, `cedula_otor`, `total_comisiones`,  `concepto`, `fecha`, `ciclo`) VALUES ('','$padre3','$ter1[ID]','$paid1','2','$hoyoi','3')");
            }

            $paid1 = ($priceusd1 * 0.008) / 100;

            if ($padre4 > 0) {
                $oiu21 = $conectar->_db->query("INSERT INTO `comision`(`codigo`, `cedula`, `cedula_otor`, `total_comisiones`,  `concepto`, `fecha`, `ciclo`) VALUES ('','$padre4','$ter1[ID]','$paid1','2','$hoyoi','4')");
            }

            echo'ejecuto update';
            $oiuggqwe = $conectar->_db->query("UPDATE security_users SET marcado  = '1' WHERE ID = '$ter1[ID]'");
        }
    }
}
