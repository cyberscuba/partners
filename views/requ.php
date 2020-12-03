<?php
include("views/include.php");
$page = 1;
?>
<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=gb18030">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Pagos - <?php echo $cpny ?></title>
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
      <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="">Mis Pagos</a>
      <?php include("views/nav.php") ?>
    </div>
  </nav>
  <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
      <div class="header-body">
        <!-- Card stats -->
        <div class="row">
          <?
         $userss1pp = $Muestra->get_t1_suma($min_paid);
         $dsr = mysqli_fetch_array($userss1pp);
         $tales = $dsr[0];
         if($tales <= 0){
             $tales = 0;
         }
         ?>

          <div class="col-xl-6 col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0">
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">PENDIENTE POR PAGAR</h5>
                    <span class="h2 font-weight-bold mb-0">
                      <script>

                      </script>

                      <?php echo $tales;
                      ?> usd
                    </span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                      <img src="./assets/img/creferidos.png">
                    </div>
                  </div>
                </div>
              </div>
            </div>
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


            <div class="col-12">

              <div align="center">
                <a href="dash_request_p" class="btn btn-sm btn-success"> Pagos Realizados</a>
                <a class="btn btn-sm btn-danger" target="blank" href="archivo_plain_2020">Exportar Archivo</a>
              </div>

            </div>
            <hr>


          </div>
          <div class="table-responsive">

            <div align="center">
              <div style="display:none;" id="loading_login"><img src="assets/img/icons/loading.gif" /></div>
              <div id="response_login"></div>

            </div>


            <form method="post" id="formu1" name="formu1">
              <center>
                <input class="btn btn-info" type="submit" value="Liquidar Seleccionados">
              </center>
              <hr>



              <table id="dynamic-table" class="table align-items-center table-flush">
                <thead>
                  <tr>
                    <th style="display:none;"  class="center" "><label class=" pos-rel">#</label></th>
                    <th>Usuario</th>
                    <th>Nombre del Usuario</th>
                    <th>Total a Pagar</th>
                    <th>Billetera</th>

                    <script>
                      function checkAll(bx) {
                        var cbs = document.getElementsByTagName('input');
                        for (var i = 0; i < cbs.length; i++) {
                          if (cbs[i].type == 'checkbox') {
                            cbs[i].checked = bx.checked;
                            idListClient = cbs[i].value;
                            checkingWallet(idListClient);
                            $("td:empty").text("Sin billetera!").addClass("alert alert-danger alert-dismissable");
                          }
                        }


                      }
                    </script>
                    <th style="text-align:center;">Liquidar <br> <input type="checkbox" id="liquida" onclick="checkAll(this)"></th>
                  </tr>
                </thead>

                <tbody>
                  <?php
                  $i = 1;
                  $top = 0;
                  $userss1 = $Muestra->get_t1($min_paid);
                  while ($row = mysqli_fetch_array($userss1)) {
                    $usuariop = $row['cedula'];
                    if ($usuariop > 0) {

                      $userss1ae = $Muestra->get_users5($usuariop);
                      foreach ($userss1ae as $custe) {
                        $name_afilia = $custe['name_user'] . " " . $custe['ape_user'];
                        $doc_afilia = $custe['username'];
                        $banco = $custe['bill'];

                        if (empty($banco)) {
                          $sinBilletera = 'noWalletAssign';
                          $row['sinBilletera'] = $sinBilletera;
                        }
                      }
                      if ($row['comisiones'] >= 10) {
                  ?>
                        <tr>
                          <input type="hidden" id="userid_<?php echo $i ?>" value="<?php echo $row['ID'] ?>">
                          <td style="display:none;" class="center"><label class="pos-rel"><?php echo $row['cedula'] ?><span class="lbl"></span></label></td>
                          <td><a><?php echo $doc_afilia ?></a></td>
                          <td><a><?php echo $name_afilia ?></a></td>
                          <td><?php echo utf8_encode($row['comisiones']) ?> usd</td>
                          <td><?php echo utf8_encode($banco) ?></td>

                          <td style="text-align:center;">
                            <input type="hidden" name="noHaveWallet_<?php echo $row['0'] ?>" id="noHaveWallet_<?php echo $row['0'] ?>" . value="<?php echo $row['sinBilletera']; ?>">
                            <input type="hidden" name="icat" id="icat" value="<?php echo $row['cedula']; ?>">
                            <input type="checkbox" name="chk[]" id="checkWallet_<?php echo $row['0'] ?>" value="<?php echo $row['cedula']; ?>">
                          </td>
                        </tr>
                  <?php
                        $top = $row['comisiones'] + $top;
                      }
                    }
                    $i++;
                  } ?>

                </tbody>
              </table>

            </form>

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
        $("#btnChange").text("Ver Pagos Pagadas");
        $("#txtSol").text("Tus Pagos Pendientes");
        $("#est0").removeAttr("hidden");
        $("#est1").attr("hidden", "true");
        $("#formDate").attr("hidden", "true");
      } else {
        $est = 0;
        $("#btnChange").text("Ver Pagos Pendientes");
        $("#txtSol").text("Tus Pagos Pagadas");
        $("#est0").attr("hidden", "true");
        $("#est1").removeAttr("hidden");
        $("#formDate").removeAttr("hidden");
      }

    });


    function checkingWallet(id) {

      if (id == 'on') {
        console.log('Envio ON')
      } else {
        let numberWallet = document.getElementById("noHaveWallet_" + id).value;
        if (numberWallet == 'noWalletAssign') {
          //console.log('NO_WALLET_ID : ' + id);

          document.getElementById("checkWallet_" + id).checked = false;
        }
      }

    }
  </script>

</body>

</html>