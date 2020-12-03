<?php
include("../class/files.php");
require_once("../class/register.php");
require_once("../class/path.php");
$Muestra = new Muestra();
$Insert = new Insert();
require_once($info1 . "." . $ext);
$usuariop = $user;
$doc = $_POST['UsDoc'];
$email = $_POST['UsEmail'];
$name = $_POST['UsName'];
$nac = $_POST['UsDate'];
$ape = $_POST['UsApe'];
$gen = $_POST['UsGen'];
$username = $_POST['UsUrl'];
$profesi = $_POST['UsProf'];
$pais = $_POST['UsContry'];
$state = $_POST['UsState'];
$bill = $_POST['UsBill'];
$bill1 = $_POST['UsBill1'];
$ques = $_POST['UsSeg'];
$answ = $_POST['UsRes'];
$city = $_POST['UsCity'];
$dir = $_POST['UsDir'];
$tel = $_POST['UsCel'];
$face = $_POST['UsFace'];
$twi = $_POST['UsTwi'];
$gmai = $_POST['UsGmai'];
$banco = $_POST['UsBanco'];
$postal = $_POST['UsPostal'];
$ncuenta = $_POST['UsNcuenta'];
$tcuenta = $_POST['UsTcuenta'];
$user_calif = 1;
$Creator = $_POST['cref'];
$fecha = date("Y-m-d H:i:s");
$setcookie = _COOKIE_KEY_;
$passo = md5($_POST['UsPass']);
$rol = 3;

if (isset($_POST['IdPersona']) && !empty($_POST['IdPersona'])) {
    $usuariop = $_POST['IdPersona'];
}

$v_users = $Muestra->get_users6aju($email, $usuariop);
if ($v_users > 0) {
    ?>
    <div class="alert alert-danger">
        <strong>¡Alerta!</strong> El Email ya se encuentra registrado en la base de datos.
    </div>


    <?php
    die();
}


$v_users = $Muestra->get_users6ajuu($username, $usuariop);
if ($v_users > 0) {
    ?>
    <div class="alert alert-danger">
        <strong>¡Alerta!</strong> El Username ya se encuentra registrado en la base de datos.
    </div>


    <?php
    die();
}

function generarCodigo($longitud) {
    $key = '';
    $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
    $max = strlen($pattern) - 1;
    for ($i = 0; $i < $longitud; $i++)
        $key .= $pattern{mt_rand(0, $max)};
    return $key;
}

$gencod = generarCodigo(20); // genera un codigo de 6 caracteres de longitud.

$anio = date("d");
$mes = date("m");
$seg = date("s");
$cadena = $gencod . $mes . $seg . $anio;
$keys = md5($cadena);

if ($_POST['UsPass'] != '') {
    $i_users = $Insert->get_users12lac($username, $name, $ape, $tel, $pais, $email, $passo, $bill, $bill1, $ques, $answ, $usuariop);
} else {
    $i_users = $Insert->get_users12lacc($username, $name, $ape, $tel, $pais, $email, $bill, $bill1, $ques, $answ, $usuariop);
}


if (isset($_POST['IdPersona']) && !empty($_POST['IdPersona'])) {
    ?>
    <div class="alert alert-success">
        <strong>¡Successful update!</strong> The data update has been successfully performed .
    </div>

    <script>
        setTimeout("location.href='user_admin'", 2000);
    </script>
    <?php
    die();
}

?>
<div class="alert alert-success">
    <strong>¡Successful update!</strong> The data update has been successfully performed .
</div>

<script>
    setTimeout("location.href='acount_user'", 2000);
</script>