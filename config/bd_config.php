<?php  
require_once "config.php"; 

class mysql 
{ 
    public $_db; 

    public function __construct() 
    { 
        $this->_db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME); 

        if ( $this->_db->connect_errno ) 
        { 
            echo "Fallo al conectar a MySQL: ". $this->_db->connect_error; 
            return;     
        } 

        mysqli_set_charset($this->_db, 'utf8'); //linea a colocar
    } 
} 
?> 