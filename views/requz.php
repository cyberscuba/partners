<?php
include("views/include.php");
$page = 1;
?>
<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Ajustes - <?php echo $cpny ?></title>
  <!-- Favicon -->
  <link href="./assets/img/icons/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="./assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="./assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="./assets/css/argon.css?v=1.0.0" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
  <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <?php include("views/menu.php") ?>
  <!-- Header -->
  <!-- Top navbar -->
  <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
      <!-- Brand -->
      <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="">Ajustes</a>
      <?php include("views/nav.php") ?>
    </div>
  </nav>
  <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
      <div class="header-body">
        <!-- Card stats -->
        <div class="row">


          <div class="col-xl-12 col-lg-6">

          </div>


        </div>
      </div>
    </div>
  </div>
  <!-- Page content -->
  <div class="container-fluid mt--7">
    <div class="row">
      <div class="col-xl-12 mb-5 mb-xl-0">
        <div class="card shadow">
          <div class="card-header border-0">

            <form action="#" method="post" class="row align-items-center">
              <div class="col-12" style="display: flex;">

                <!--- <a href="" class="btn btn-sm btn-info" style="margin-left:10px">Actualizar</a> -->
              </div>
              <div class="col-xl-3 " style="padding:5px">

              </div>


            </form>

          </div>
          <div class="col-md-12">
            <div class="table-responsive">
              <!-- Projects table -->
              <div align="center">
                <form id="infimis" enctype="multipart/form-data">

                  <label>Ingresa el enlace de zoom:</label><input type="cel" class="form-control" id="pdic" name="pdic" value="<?php echo $zoom ?>" />
                  <hr>

                  <label>Ingresa el enlace de youtube:</label><input type="cel" class="form-control" id="pdicy" name="pdicy" value="<?php echo $youtube ?>" />
                  <hr>

                  <label>Banner panel principal:</label><input type="file" class="form-control" id="archivo" name="archivo" />
                  <hr>

                  <input type="submit" class="btn btn-sm btn-success" value="Guardar"><br><br>

                </form><b id="response_loginr1b"></b>
              </div>

            </div>
          </div>
          <br />
          <div class="col-md-12">
            <div class="table-responsive">
              <div align="center">
                <h3>Cambiar Patrocinador</h3>
                <form id="log_change">

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <div class="input-group mb-">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-vector"></i></span>
                          </div>
                          <input class="form-control" name="uplin" id="uplin" placeholder="Ingrese el usuario Up Line" type="text" required="true">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <div class="input-group mb-4">
                          <div class="input-group-prepend">
                            <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                          </div>
                          <input class="form-control" id="downl" name="downl" style="width:50%;" placeholder="Ingrese el usuario Down Line" type="text" required="true">
                        </div>
                      </div>
                    </div>

                    <div class="col-md-12">
                      <div class="form-group" align="center">


                        <input class="btn btn-success" type="submit" value="Actualizar información">
                        <hr>

                        <div align="center">
                          <div style="display:none;" id="loading_login">Loading... <img src="assets/img/icons/loading.gif" /></div>
                          <div id="response_login"></div>
                        </div>

                      </div>
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>

    <!-- Footer -->
    <?php include("views/footer.php") ?>
  </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Optional JS -->
  <script src="./assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="./assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="./assets/js/argon.js?v=1.0.0"></script>
  <script>
    $est = 0;
    $("#btnChange").click(function() {
      if ($est == 0) {
        $est = 1;
        $("#btnChange").text("Ver solicitudes Pagadas");
        $("#txtSol").text("Tus solicitudes Pendientes");
        $("#est0").removeAttr("hidden");
        $("#est1").attr("hidden", "true");
        $("#formDate").attr("hidden", "true");
      } else {
        $est = 0;
        $("#btnChange").text("Ver solicitudes Pendientes");
        $("#txtSol").text("Tus solicitudes Pagadas");
        $("#est0").attr("hidden", "true");
        $("#est1").removeAttr("hidden");
        $("#formDate").removeAttr("hidden");
      }

    });
  </script>

</body>

</html>