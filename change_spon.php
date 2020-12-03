<?php
require_once('config/bd_config.php');
$conectar = new mysql;  
$conectar->__construct();


$up = $_POST['uplin'];
$dw = $_POST['downl'];
if($up != '' AND $dw != ''){

$query = $conectar->_db->query("SELECT ID FROM  security_users WHERE username = '$up'");
$coni = $query->num_rows;




$query1 = $conectar->_db->query("SELECT ID FROM  security_users WHERE username = '$dw'");
$coni1 = $query1->num_rows;



if($coni <= 0){
    
    
    ?>
    <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Alerta!</h4>
                        El Sponsor no se encuentra registrado en la base de datos.
                  </div>
    
    <?php
    die();
}



if($coni1 <= 0){
    
    
    ?>
    
    <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Alerta!</h4>
                        El Hijo no se encuentra registrado en la base de datos.
                  </div>
    
    <?php
    die();
}



$sil = mysqli_fetch_array($query);
$sil1 = mysqli_fetch_array($query1);

$idup = $sil['ID'];
$iddw = $sil1['ID'];



$quer = $conectar->_db->query("UPDATE  security_users SET parent_id='$idup',Id_Parent='$idup',creator='$idup' WHERE ID = '$iddw'");


include("./class/tree_organizate.php");

?>


<div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-check"></i> Alerta!</h4>
                    Cambio de Up Line
                  </div>
                  
                  <script>
setTimeout("location.href='cspon'", 2000);
</script>
                  
                  
<?php

}else{
    
    ?>
    
    <script>
setTimeout("location.href='cspon'", 1000);
</script>
    
    <?php
}
?>