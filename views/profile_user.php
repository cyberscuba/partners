<?php
include("views/include.php");

if (
  isset($_POST["username"]) && isset($_POST["user_login"]) &&
  isset($_POST["nameUser"]) && isset($_POST["apeUser"]) &&
  isset($_POST["dirUser"]) && isset($_POST["paisUser"]) &&
  isset($_POST["dptoUser"]) && isset($_POST["ciuUser"]) &&
  isset($_POST["telUser"]) && isset($_POST["dirBill"])
) {
    $user_nam = $_POST["username"];
    $emails = $_POST["user_login"];
    $nam = $_POST["nameUser"];
    $apeli = $_POST["apeUser"];
    $user_tel = $_POST["telUser"];
    $dirus = $_POST["dirUser"];
    $ciuus = $_POST["ciuUser"];
    $estarus = $_POST["dptoUser"];
    $paisus = $_POST["paisUser"];


    $art = $Muestra->up_user(
        $_POST["username"],
        $_POST["user_login"],
        $_POST["nameUser"],
        $_POST["apeUser"],
        $_POST["dirUser"],
        $_POST["telUser"],
        $_POST["ciuUser"],
        $_POST["dptoUser"],
        $_POST["paisUser"],
        $_POST["dirBill"],
        $user
    );
} else {
}
$antes = md5($_POST["anewPass"]);
$newpas = md5($_POST["newPass"]);
if ($_POST["newPass"] != '' and $_POST["anewPass"] != '') {

  //Seleccionar para ver si el password existe
    $acturt = $Muestra->selpas($antes, $user);
    if ($acturt >= 1) {
        //si existe actualizar los datos
        $darup = $Muestra->updateestapass($newpas, $user);
    } else {
        echo "<script>alert('La contraseña anterior no es correcta');
                        window.location='profile';
                        </script>";
    }
}

$conectar = new mysql;
$conectar->__construct();

$ropiso = $conectar->_db->query("SELECT bill FROM security_users WHERE ID = '$user'");
$tal = mysqli_fetch_array($ropiso);
$billeteras = $tal['bill'];

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Mi Perfil - <?php echo $cpny ?></title>
  <!-- Favicon -->
  <link href="./assets/img/icons/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="./assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="./assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="./assets/css/argon.css?v=1.0.0" rel="stylesheet">
</head>

<body>
  <?php include("views/menu.php") ?>
  <!-- Header -->
  <!-- Top navbar -->
  <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
      <!-- Brand -->
      <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index">Mi Perfil</a>
      <?php include("views/nav.php") ?>
    </div>
  </nav>
  <!-- Header -->
  <div class="header bg-gradient-primary  pt-5 pt-md-8">
    <!-- Mask -->

    <!-- Header container -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-7 col-md-10">
          <h1 class="display-2 text-white">Hola <?php echo $user_nam ?></h1>
          <p class="text-white mt-0 mb-5">Aquí puedes administrar los datos de tu cuenta.<br>
            Recuerda que tu billetera de BITCOIN debe ser única e intransferible.
            <br />
            <br />
            <br />
            <br />
            <?php


            if (move_uploaded_file($_FILES['inpFilePhoto']['tmp_name'], "photos/$user.jpg")) {
            } else {
            }
            ?>


          </p>
        </div>
      </div>
    </div>
  </div>
  <!-- Page content -->
  <div class="container-fluid mt--7">
    <div class="row">
      <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
        <div class="card card-profile shadow">
          <div class="row justify-content-center">
            <div class="col-lg-3 order-lg-2">
              <div class="card-profile-image">

                <img id="upPhotoUs" width="180" height="180" class="rounded-circle logo-no-resize" style="cursor: pointer;">
                <form enctype="multipart/form-data" id="formImg" action="" method="post">
                  <input type="file" name="inpFilePhoto" id="inpFilePhoto" accept=".jpg,.jpeg,.png" hidden>
                </form>
                <script language="javascript" type="text/javascript">
                  var d = new Date();
                  document.getElementById("upPhotoUs").src =
                    "photos/<?php echo $user; ?>.jpg?ver=" +
                    d.getTime();
                </script>

              </div>
            </div>
          </div>
          <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4" style="padding-bottom: 5.5rem !important;">

          </div>
          <div class="card-body pt-0 pt-md-4">



            <div class="text-center">
              <h3>
                <?php echo $nam . " " . $apeli ?>
              </h3>
              <div class="h5 mt-4">
                <i class="ni business_briefcase-24 mr-2"></i>Patrocinador:
              </div>
              <div>
                <i class="ni education_hat mr-2"></i>
                <?php
                $art2 = $Muestra->get_name($part);
                while ($tl2 = mysqli_fetch_array($art2)) {
                    echo $tl2['username'];
                } ?>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-8 order-xl-1">
        <div class="card bg-secondary shadow">
          <div class="card-header bg-white border-0">
            <div class="row align-items-center">
              <div class="col-8">
                <h3 class="mb-0">Mi cuenta</h3>
              </div>


            </div>
          </div>
          <div class="card-body">
            <form action="" method="post">
              <h6 class="heading-small text-muted mb-4">Mi Perfil</h6>

              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-username">Usuario</label>
                      <input disabled type="text" id="input-username" class="form-control form-control-alternative" placeholder="Usuario" value="<?php echo $user_nam ?>">
                      <input hidden type="text" id="input-username" class="form-control form-control-alternative" name="username" placeholder="Usuario" value="<?php echo $user_nam ?>">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-email">Email</label>
                      <input disabled type="email" id="input-email" class="form-control form-control-alternative" placeholder="Email" value="<?php echo $emails ?>">
                      <input hidden type="email" id="input-email" name="user_login" class="form-control form-control-alternative" placeholder="Email" value="<?php echo $emails ?>">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-first-name">Nombre</label>
                      <input type="text" id="input-first-name" name="nameUser" class="form-control form-control-alternative" placeholder="Nombre" value="<?php echo $nam ?>">
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-last-name">Apellido</label>
                      <input type="text" id="input-last-name" name="apeUser" class="form-control form-control-alternative" placeholder="Apellido" value="<?php echo $apeli ?>">
                    </div>
                  </div>
                </div>
              </div>
              <hr class="my-4" />
              <!-- Address -->
              <h6 class="heading-small text-muted mb-4">Información de Billetera</h6>
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-md-8">
                    <div class="form-group">
                      <label class="form-control-label" for="input-address">Billetera Bitcoin Personal</label>
                      <input id="input-address" name="dirBill" class="form-control form-control-alternative" placeholder="Billetera de Bitcoin Personal" value="<?php echo $billeteras ?>" type="text">
                    </div>
                  </div>

                </div>
              </div>
              <hr class="my-4" />
              <!-- Address -->
              <h6 class="heading-small text-muted mb-4">Información de Contacto</h6>
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-md-8">
                    <div class="form-group">
                      <label class="form-control-label" for="input-address">Dirección</label>
                      <input id="input-address" name="dirUser" class="form-control form-control-alternative" placeholder="Home Address" value="<?php echo $dirus ?>" type="text">
                    </div>
                  </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label class="form-control-label" for="input-tell">Teléfono</label>
                      <input id="input-tell" name="telUser" class="form-control form-control-alternative" placeholder="Teléfono" value="<?php echo $user_tel; ?>" type="text">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label" for="input-city">Ciudad</label>
                      <input type="text" id="input-city" name="ciuUser" class="form-control form-control-alternative" placeholder="Ciudad" value="<?php echo $ciuus ?>">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label" for="input-country">Estado</label>
                      <input type="text" id="input-country" name="dptoUser" class="form-control form-control-alternative" placeholder="Estado" value="<?php echo $estarus ?>">
                    </div>
                  </div>
                  <div class="col-lg-4">
                    <div class="form-group">
                      <label class="form-control-label" for="input-country">Pais</label>
                      <input type="text" id="input-postal-code" name="paisUser" class="form-control form-control-alternative" value="<?php echo $paisus; ?>" placeholder="Pais">
                    </div>
                  </div>
                </div>
              </div>

              <!-- Address -->
              <h6 class="heading-small text-muted mb-4">Información de Contraseña</h6>
              <div class="pl-lg-4">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-address">Nueva Contraseña</label>
                      <input id="input-password" name="newPass" class="form-control form-control-alternative" placeholder="****" value="" type="password">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label class="form-control-label" for="input-address">Anterior Contraseña</label>
                      <input id="input-cpassword" name="anewPass" class="form-control form-control-alternative" placeholder="****" value="" type="password">
                    </div>
                  </div>

                </div>

              </div>

              <input type="submit" class="btn btn-info" style="float: right;" value="Guardar Perfil">
            </form>
          </div>
        </div>
      </div>
    </div>
    <script>
      window.onload = function() {
        $("#upPhotoUs").click(function() {
          $("#inpFilePhoto").click();
        });
        $("#inpFilePhoto").change(function() {
          $("#formImg").submit();
        });
        if ($("#upPhotoUs")[0].naturalHeight == 0) {
          var d = new Date();
          $("#upPhotoUs")[0].src = "assets/img/icons/tuFotoAqui.png";
          $("#upPhotoUsNav")[0].src = "assets/img/icons/fatuFotoAquivicon.png";
        }
      }
    </script>
    <!-- Footer -->
    <?php include("views/footer.php") ?>
  </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Argon JS -->


</body>

</html>