<?php
    include("./config/bd_config.php");
      $conectar = new mysql;
      $conectar->__construct();
echo '<pre>';
print_r($_POST["chk"]);
echo '</pre>';
die('Igniweb Rules..');

    if(!empty($_POST["chk"])){
       foreach($_POST['chk'] as $chk){
            $hdiy = $conectar->_db->query("INSERT INTO `liqui`(`afiliado`,  `cuenta`) SELECT `cedula`, `total_comisiones` FROM `comision` WHERE cedula = '$chk' AND estado = '0'");
            $querys126 = $conectar->_db->query("UPDATE `comision` SET `estado`='1' where cedula ='$chk'");
            $querys12611 = $conectar->_db->query("UPDATE `liqui` SET `periodo`=NOW() WHERE periodo = '0000-00-00' AND afiliado='$chk'");
        }
    }else{
        ?>
        <div class="alert alert-danger alert-dismissable"><h4>Alerta!</h4>Seleccione un usuario al menos para liquidar.</div>
        <?
        die();
    }

?>
    <div class="alert alert-success alert-dismissable">
                    <h4>Alerta!</h4>Liquidación Exitosa.</div>
<script>
    setTimeout("location.href='./dash_request'", 1500);
</script>