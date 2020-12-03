<?php 
include("config/bd_config.php");
   
$conectar = new mysql;
$conectar->__construct();

$us_actva = $_POST['us_actva'];

if($us_actva != ''){
   
  $too1 = $conectar->_db->query("DELETE FROM  security_users  WHERE ID = '$us_actva' "); 
 
}

?>

<script type="text/javascript">
alert("Usuario Eliminado con Exito");
window.location="dash_users";
</script>