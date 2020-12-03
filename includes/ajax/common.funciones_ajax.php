<?php
define ('XAJAX_DEFAULT_CHAR_ENCODING', 'utf-8');
require_once("xajax.inc.php");

$ajax = new xajax("includes/ajax/server.funciones_ajax.php");

if(!empty($funciones_ajax))
{
    for($i=0;$i<count($funciones_ajax);$i++)
    {
            $ajax->registerFunction($funciones_ajax[$i]);
    }
}

if(isset($_POST['xajax']))
{
   $ajax->registerFunction($_POST['xajax']);
}
?>