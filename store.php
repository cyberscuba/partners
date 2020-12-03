<?php

require_once("class/files.php");
function autoload($clase){
  include("class/".$clase.".php");
}

spl_autoload_register('autoload');
Body::mostrar($store.$pat.$ext);
?>