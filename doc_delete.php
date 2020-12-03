<?php
require_once('config/bd_config.php');
//Usamos este if para poder enlazar el llamado a una funcion desde el ajax, si se elimina o se quita no leeria las funciones.
if (function_exists($_GET['f'])) {
  $_GET['f']();
}

function borrarModulo(){
    $conectar = new mysql;
  $conectar->__construct();
  $borrarModulo = $_POST['borraModulo'];
  
  if ($borrarModulo == true) {
    $id = $_POST['idModulo'];
    $query = $conectar->_db->query("DELETE FROM mat_apoyo_videos WHERE id = '$id'");
    $conteo = $conectar->_db->affected_rows;
    if ($conteo > 0) {
      echo json_encode(array('success' => 1));
      exit();
    } else {
      echo json_encode(array('success' => 0));
      exit();
    }
  }

}
function borrarDocumentos(){
  $conectar = new mysql;
  $conectar->__construct();
  $borrarDocumentos = $_POST['borrarDocument'];

  if ($borrarDocumentos == true){
    $id = $_POST['idDocument'];
    $query = $conectar->_db->query("DELETE FROM mat_apoyo WHERE id = '$id'");
    $conteo = $conectar->_db->affected_rows;
      if( $conteo > 0 ){
        echo json_encode(array('success' => 1));
        exit();
      }else{
        echo json_encode(array('success' => 0));
        exit();
      }
    }
}
?>