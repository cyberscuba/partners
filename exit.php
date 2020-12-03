<?php
session_start();

require_once("class/path.php");


unset($_SESSION[user]);
unset($_SESSION[clv]);



$_SESSION = array();



session_unset();
session_destroy();

?>     
  <script type="text/javascript">

 window.location.href ="login";

 </script>
?>