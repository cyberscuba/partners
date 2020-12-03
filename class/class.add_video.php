<?php

require_once("../class/register.php");
$Muestra = new Muestra();
//$Insert = new Insert();

$url = $_POST['url'];
$titulo = $_POST['titulo'];
$descripcion = $_POST['descripcion'];

$insert_data_modulo = $Muestra->crear_matapoyo_modulo($url, $titulo, $descripcion);

?>
<script type="text/javascript">
  window.location = "mat_apoyo";
</script>