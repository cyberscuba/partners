<?php
session_start();

ini_set("error_reporting",(E_ERROR | E_WARNING | E_PARSE | E_COMPILE_ERROR | E_NOTICE | E_COMPILE_WARNING | E_RECOVERABLE_ERROR | E_CORE_ERROR | E_ALL | E_STRICT| E_ALL));
ini_set('display_errors','1');

require('common.funciones_ajax.php');
require("../../class/class.principal.php");
include("../../server/server.php");




$ajax->processRequests();
?>