<?php

 include("../config/bd_config.php");
function rebuild_tree($Id_Parent=1, $lft=1)
{



$conectar = new mysql;  
$conectar->__construct();


	//El valor "rgt" de este nodo es, por defecto, el valor siguiente a "lft"
	 $rgt = $lft + 1;

        $result = $conectar->_db->query("SELECT *
                FROM `security_users` 
                WHERE parent_id='$Id_Parent'");
             
        while ($row = mysqli_fetch_array($result))
	{
		//Para cada hijo de este nodo tenemos que recorrerlo. El valor "rgt" será incrementado a través de los nodos hijos
		$rgt = rebuild_tree($row['ID'], $rgt);
	}

	//El valor "lft" es el valor que entra como parámetro, y el "rgt" como hemos procesado todos los hijos, también es correcto
	
	
	
	$query = $conectar->_db->query("UPDATE `security_users` SET lft='.$lft.', rgt='.$rgt.' WHERE ID= '$Id_Parent'");

	//Devolvemos el valor de la derecha aumentando 1 su valor, es el nodo contiguo.
	return $rgt + 1;
}


rebuild_tree(0, 1);




?>




             