<?php

      include("../class/files.php");
      include("../class/path.php");
      require_once("../class/register.php");
      $Muestra = new Muestra();
      $Insert = new Insert();
      require_once($info1.".".$ext);

if($user != '' AND $_FILES['archivo1'] != ''){

$return = Array('ok'=>TRUE);
$upload_folder ='photos_nat';
$nombre_archivo = $_FILES['archivo1']['name'];
$tipo_archivo = $_FILES['archivo1']['type'];
$tamano_archivo = $_FILES['archivo1']['size'];
$tmp_archivo = $_FILES['archivo1']['tmp_name'];
$archivador = "../".$upload_folder . '/' . $nombre_archivo;
$rutaf = $upload_folder . '/' . $nombre_archivo;
if (!move_uploaded_file($tmp_archivo, $archivador)) {
	 ?>
        <div class="alert alert-danger">
      <strong>¡Alert!</strong> The resource could not be loaded, try again.
       </div> 
       <?php
       die();
       }

$v_users = $Muestra->get_users6ain_res1($rutaf,$user);

?>
 <div class="alert alert-success">
      <strong>¡Alert!</strong> successful action.
       </div> 
<script>
setTimeout("location.href='acount_user'", 2000);
</script>

<?php
}
?>