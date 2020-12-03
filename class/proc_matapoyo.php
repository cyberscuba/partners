<?php

      require_once("../class/register.php");
      $Muestra = new Muestra();
      $Insert = new Insert();

$return = Array('ok'=>TRUE);
$upload_folder ='archivos';
$nombre_archivo = $_FILES['archivo']['name'];
$tipo_archivo = $_FILES['archivo']['type'];
$tamano_archivo = $_FILES['archivo']['size'];
$tmp_archivo = $_FILES['archivo']['tmp_name'];
$archivador = "../".$upload_folder . '/' . $nombre_archivo;
$rutaf = $upload_folder . '/' . $nombre_archivo;
if (!move_uploaded_file($tmp_archivo, $archivador)) {
?>
        <div class="alert alert-danger">
      <strong>¡Alerta!</strong> La imagen no pudo ser subida.
       </div> 
       <script>
        setTimeout("location.href='./mat_apoyo'", 2000);
        </script>
       <?php
       die();
       }
            $nombre = $_POST['nombre'];
$v_users = $Muestra->crear_matapoyo($nombre, $rutaf);
?>
<div class="alert alert-success">
      <strong>¡Alerta!</strong> Subida de Material de Apoyo Exitoso.
       </div>

<script>
setTimeout("location.href='./mat_apoyo'", 2000);
</script>

<?php
?>