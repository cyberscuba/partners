<?php
CAMS, ELIMINA ESTE ARCHIVO.
require_once('config/bd_config.php');
$conectar = new mysql;
$conectar->__construct();


$new_video = $_POST['new_video'];
$url = $_POST['url'];
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];
if ($new_video == "success") {
  
  // some action goes here under php
  echo json_encode(array("success" => 'successfuly registered'));
}else{
  die('ENTRE ELSE');
}

$query = $conectar->_db->query("INSERT INTO mat_apoyo_videos (url, titulo, descripcion) VALUES ('$url' , '$titulo', '$descripcion'");

// $coni = $query->num_rows;
// if($coni >= 0){
//   return true;
// }else {
//   die('NO HIZO NADA');
// }
exit();
?>
<script type="text/javascript">
  window.location = "mat_apoyo";
</script>