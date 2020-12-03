<?php
require_once('../config/bd_config.php');
require_once('../class/path.php');

$conectar = new mysql;  
$conectar->__construct();


$usrtt = $user;
$cod_765 = $_POST['cod_765'];

if($usrtt != '' AND $cod_765 != ''){
    
    $queryso = $conectar->_db->query("SELECT ID_cupons FROM wpk_cponsshif WHERE 	Cuponshift = '$cod_765' AND stateshif = '0'");
     $ci = $queryso->num_rows;
     if($ci <= '0'){
         ?>
         <div class="alert alert-danger">
  <strong>Alerta!</strong> El Código no existe o No esta disponible.
</div>

         <?php
         die();
     }
     
     
     $quh = $conectar->_db->query("SELECT pack FROM security_users WHERE 	ID = '$usrtt'");
     $rtt = mysqli_fetch_array($quh);
     $pihh = $rtt['pack']; 
     
     if($pihh > 0){
         ?>
          <div class="alert alert-danger">
  <strong>Alerta!</strong> El usuario ya tiene una inversión en la plataforma.
</div>
         <?php
         die();
     }
     
     
     $quhkk = $conectar->_db->query("UPDATE  security_users SET estado = '1', pack = '1' WHERE ID = '$usrtt'");
     
     
     $qufdd = $conectar->_db->query("UPDATE `wpk_cponsshif` SET `stateshif`='1' WHERE Cuponshift = '$cod_765'");
    
    
}else{
    ?>
    <div class="alert alert-danger">
  <strong>Alerta!</strong> Datos Incorrectos.
</div>
    <?php
}

 ?>