<?php 
error_reporting(0);
session_start();

$user = $_SESSION['user'];
$clvs = $_SESSION['clv'];

if($user == ''){
header('Location: login');
}

?>