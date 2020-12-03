<?php
include("views/include_login.php");
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Inciar Sesión - Social Trading System</title>
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

<body class="bg-default" style="background: #f5f5f5 url('./assets/img/bg.png') left top repeat;">
  <div class="main-content">

    <!-- Header -->
    <div class="header  py-7 py-lg-8">
      <div class="container">

      </div>

    </div>
    <div class="Rcpctd">Desarrollo</div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary shadow border-0">

            <div class="card-body px-lg-5 py-lg-5">
              <div align="center"> <img src="./assets/img/brand/logo.png" /></div>
              <div class="text-center text-muted mb-4">

                <small>iniciar sesión con credenciales</small>
              </div>
              <form role="form" id="log">
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                    </div>
                    <input class="form-control" name="email_user_login" placeholder="Usuario" type="text" required="true">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" name="password_user_login" placeholder="Contraseña" type="password" required="true">
                  </div>
                </div>

                <div class="form-group">

                  <div align="center" class="g-recaptcha" id="responses" name="responses" data-sitekey="6Lf2qOoUAAAAAMWShn6aPaVNJZLiTPKfmBy3-_pE"></div>

                </div>


                <div align="center">
                  <div style="display:none;" id="loading_login"><img src="assets/img/icons/loading.gif" /></div>
                  <div id="response_login"></div>

                </div>

                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4">Iniciar Sesión</button>
                </div>
              </form>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-6">
              <a style="color:#000;" href="#modelIdb2" role="button" class="text-light" data-toggle="modal"><small><b>Olvido su contraseña?</b></small></a>
            </div>
            <!-- Modal -->
            <!-- Modal -->
            <div class="modal fade" id="modelIdb2" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <form id="solicitar_rest">
                    <div class="modal-header">
                      <h3 align="center" class="modal-title">Restablecer Contrasñea</h3>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">

                      <div class="container-fluid">
                        <div class="row">
                          <div class="form-group col-12">
                            <label for="">Ingresa el Email que registraste en la plataforma</label>
                            <input type="email" name="email_reset" id="email_reset" class="form-control" placeholder="Ingresa tú email" required>

                          </div>

                        </div>

                      </div>

                      <div align="center">
                        <div style="display:none;" id="loading_loginr"><img src="assets/img/icons/loading.gif" /></div>
                        <div id="response_loginr"></div>

                      </div>


                    </div>



                    <div class="modal-footer">
                      <span class="btn btn-danger" onclick="clearResetPassword();" data-dismiss="modal" aria-label="Close">Cerrar</span>

                      <button type="submit" class="btn btn-primary">Enviar</button>
                    </div>
                  </form>
                </div>
              </div>
            </div>

            <div class="col-6 text-right">
              <a style="color:#fff;" href="https://socialtradingsystem.com" class="text-light"><small><b>Ir a la web</b></small></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

  <script src="./assets/js/argon.js?v=1.0.0"></script>
  <script src="https://www.google.com/recaptcha/api.js" async defer></script>
  <!-- Argon JS -->
  <script>
    $(document).ready(function() {
      $(".modal").on("hidden.bs.modal", function() {
        $(".modal-body1").html("Where did he go?!?!?!");
      });
    });
  </script>



</body>

</html>