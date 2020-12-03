<?php

class util {
    
   function __construct() {
       
   }
            
    function existen_registros($tabla, $filtro = '') {
        if (!empty($filtro))
            $sql = "select count(*) from " . trim($tabla) . " where {$filtro}";
        else
            $sql = "select count(*) from " . trim($tabla);
        
        $bd = new conector_bd();
        $query = $bd->consultar($sql);
        $row = $query->fetch_row();
        if ($row[0] > 0)
            return true;
        else
            return false;
    }
}
?>