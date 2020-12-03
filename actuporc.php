<?php
include("config/bd_config.php");
   
$conectar = new mysql;
$conectar->__construct();

$IO = $_POST['pdic'];
$pdicy = $_POST['pdicy'];
   
  
    $ropisouu = $conectar->_db->query("UPDATE config_data SET zoom = '$IO',youtube='$pdicy'");
    
    
    $return = Array('ok'=>TRUE);
$upload_folder ='banner';
$nombre_archivo = $_FILES['archivo']['name'];
if($nombre_archivo != ''){
$tipo_archivo = $_FILES['archivo']['type'];
$tamano_archivo = $_FILES['archivo']['size'];
$tmp_archivo = $_FILES['archivo']['tmp_name'];
$archivador = "./".$upload_folder . '/' . $nombre_archivo;
$rutaf = $upload_folder . '/' . $nombre_archivo;
if (!move_uploaded_file($tmp_archivo, $archivador)) {
?>
        <div class="alert alert-danger">
      <strong>¡lerta!</strong> La imagen no pudo ser subida.
       </div> 
       
       <?php
       die();
       }

$ropisouus = $conectar->_db->query("UPDATE config_data SET doc_pdf = '$rutaf'");
}

  ?>
 <b style="color:green;">Actualización exitosa....</b> 
   <script>
setTimeout("location.href='dash_requestz'", 1000);
</script>