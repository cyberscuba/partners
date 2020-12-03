<?php
include("views/include.php");
$page = 1;
$dias = array("7", "1", "2", "3", "4", "5", "6");
$plazi =  $dias[date("w")];
$artss = $Muestra->get_commishop($emails);
$talsu = 0;

while ($tlss = mysqli_fetch_array($artss)) {
    $rtss = explode(' ', $tlss[order_item_name]);
    $namsoss = $rtss[1];
    $talsu = $namsoss + $talsu;
}

$assignedPoints = $Muestra->getTotalAsignedPoints($idps);
while ($totalPointsAssigned = mysqli_fetch_array($assignedPoints)) {
    $totalPointsAdminAssigned = $totalPointsAssigned['points'];
}

$misPuntos = $Muestra->getTotalPoints($ii[0], $rt[1], $totalPointsAdminAssigned);


?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Panel Principal - <?php echo $cpny ?></title>
  <?php echo $user_nam ?>
  <!-- Favicon -->
  <link href="./assets/img/icons/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="./assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="./assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="./assets/css/argon.css?v=1.0.0" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css">
</head>

<body>
  <?php include("views/menu.php") ?>
  <!-- Header -->
  <!-- Top navbar -->
  <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
      <!-- Brand -->
      <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index">Panel Principal DEVELOPMENT</a>

      <?php include("views/nav.php") ?>
    </div>
  </nav>

  <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
      <div class="header-body">
        <!-- Card stats -->
        <div class="row">
          <div class="col-xl-3 col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0">
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">EN GESTIÓN</h5>
                    <span class="h2 font-weight-bold mb-0"><?php echo $mony . "" . $rt[1] ?></span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                      <img src="assets/img/gestion.png">
                    </div>
                  </div>
                </div>
                <!--<a> <p class="mt-3 mb-0 text-muted text-sm">
                    <span class="text-warning mr-2"><i class="fas fa-arrow-right"></i></span>
                    <span class="text-nowrap">Ver Detalles</span>
                  </p></a>-->
              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0">
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0"> REFERIDOS</h5>
                    <span class="h2 font-weight-bold mb-0"><?php echo $ii[0] ?></span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                      <img src="assets/img/referidos.png">
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0">
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">COMISIÓN</h5>
                    <span class="h2 font-weight-bold mb-0">$<?php echo number_format($bondir1, 2, ',', ' '); ?></span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                      <img src="assets/img/creferidos.png">
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>

          <div class="col-xl-3 col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0">
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0"> RÉDITOS</h5>
                    <span class="h2 font-weight-bold mb-0">$<?php echo number_format($bondia1, 2, ',', ' ');  ?></span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                      <img src="assets/img/réditos.png">
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
      <div class="col-xl-8 mb-5 mb-xl-0">
        <div class="card bg-gradient-default shadow">
          <div class="card-header bg-transparent">
            <div class="row align-items-center">
              <div align="center" class="col">


              </div>
              <div class="col">

                <script>
                  function copiarAlPortapapeles1(id_elemento) {
                    alert("Copied");
                    var aux = document.createElement("input");
                    aux.setAttribute("value", document.getElementById(id_elemento).innerHTML);
                    document.body.appendChild(aux);
                    aux.select();
                    document.execCommand("copy");
                    document.body.removeChild(aux);
                  }
                </script>


                <!-- <b style="display:none;"><u id="p2"><?php //echo $web . '/' . $ofic . '/user/' . $user_nam;?></u></b> -->
                <b style="display:none;"><u id="p2"><?php echo $web . '/tienda?patrocinador='. $user_nam; ?></u></b>


              </div>
            </div>
          </div>


          <div class="card-body">
            <!-- Chart -->
            <div class="container" align="center">

              <img class="image-responsive" style="width:100%;height:270px;" src="<?php echo $pdf ?>">



            </div>

            <div class="chart_principal">
              <!-- Chart wrapper -->



              <br>
              <div align="center">
                <h2 class="text-white mb-0">Vencimiento Plan Actual -
                  <?php echo $limid ?>
                </h2>
                <h4 class="text-white mb-0">Faltan
                  <?php echo $dias_diferencia ?> Días</h4>
              </div><br>

              <div align="center">

                <h2 class="text-white mb-0">GANANCIAS GENERALES</h2>
                <h2 style="color:#fff;"><i class="fas fa-wallet"></i> $<?php echo number_format($bondir1 + $bondia1, 2, ',', ' ');  ?></h2>
              </div>
              <br>

              <div align="center">
                <h6 class="text-uppercase text-light ls-1 mb-1">Link para Referir</h6>
                <!-- <a align="center" style="color:#fff;" href="<?php //echo $web . '/' . $ofic . '/user/' . $user_nam;
                                                                  ?>"><?php //echo $web . '/' . $ofic . '/user/' . $user_nam;
                                                                                                                              ?>
                </a> -->
                <a align="center" style="color:#fff;" href="<?php echo $web . '/tienda/?patrocinador=' . $user_nam; ?>"><?php echo $web . '/tienda?patrocinador=' . $user_nam; ?>
                </a>
                </b><br>
                <div><br><a style="color:#fff;" class="btn btn-info btn-lg" onclick="copiarAlPortapapeles1('p2')"><i class="fa fa-link"></i> Copy Referral Link</a></div>

                <br>
              </div>

            </div>
          </div>
        </div>
      </div>
      <div class="col-xl-4">
        <div class="card shadow">
          <div class="card-header bg-transparent">
            <div class="row align-items-center">
              <div class="col">

                <h2 align="center" class="mb-0">SALDO ACUMULADO</h2>
              </div>
            </div>
          </div>
          <div class="card-body">
            <!-- Chart -->
            <div class="chart">
              <h1 align="center">$ <?php echo number_format($bondia, 2, ',', ' '); ?></h1>
              <h5 align="center">Réditos Díarios</h5>
              <hr>
              <h1 align="center">$ <?php echo number_format($bondir, 2, ',', ' '); ?></h1>
              <h5 align="center">Comisión Díaria por Referidos</h5>
              <hr>
              <h1 align="center">$ <?php echo number_format($bondir + $bondia, 2, ',', ' '); ?></h1>
              <h5 align="center">Acumulado Semanal</h5>
            </div>
          </div>
        </div>
        <!-- -->
        <br />
        <div class="card shadow">
          <div class="card-header bg-transparent">
            <div class="row align-items-center">
              <div class="col">

                <h2 align="center" class="mb-0">MIS PUNTOS</h2>
              </div>
            </div>
          </div>
          <div class="card-body">
            <!-- Chart -->
            <div class="">
              <h1 align="center"><?php echo $misPuntos; ?></h1>
              <hr>

            </div>
          </div>
        </div>
        <!-- -->
      </div>



    </div>
    <div class="row mt-5">
      <div class="col-xl-12 mb-5 mb-xl-0">
        <div class="card shadow">
          <div class="card-header border-0">
            <div class="row align-items-center">
              <div class="col">
                <h3 class="mb-0">Últimos Afiliados en mi Red</h3>
              </div>
              <div class="col text-right">
                <a href="network" class="btn btn-sm btn-primary">Ver Detalles</a>
              </div>
            </div>
          </div>

          <div class="col-md-12">
            <div style="text-align:center;" class="table-responsive">
              <!-- Projects table -->
              <table id="grid" class="table table-striped table-bordered dt-responsive nowrap">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Plan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $asd = $Muestra->get_users51a($user);
                  while ($og = mysqli_fetch_array($asd)) {
                      $pack_id = $og['pack'];
                      $pik = $Muestra->state_packs($pack_id);
                      $pk = mysqli_fetch_array($pik);
                      if ($pk[0] <= '0') {
                          $pk[0] = "Sin Plan";
                      }
                      $pais = $og['pais_user'];
                      $coyn = $Muestra->get_respon27($pais);
                      $ry = mysqli_fetch_array($coyn); ?>
                    <tr>
                      <th scope="row">
                        <?php echo $og[name_user] . " " . $og[ape_user]; ?>
                      </th>
                      <td>
                        <?php echo $og[user_login]; ?>
                      </td>

                      <td>
                        <?php echo $pk[0] ?>
                      </td>
                    </tr>
                  <?php
                  } ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>
    <!-- Footer -->
    <?php include("views/footer.php") ?>
  </div>
  </div>
  <!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="modelIdb2" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form action="shop/php/index.php" id="solicitar" method="POST">
          <div class="modal-header">
            <h3 align="center" class="modal-title">Realiza tu inversión</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <div class="container-fluid">
              <div class="row">
                <div class="form-group col-12">
                  <label for="">Elige tipo de inversión</label>
                  <select name="inve_tpd" id="inve_tpd" class="form-control" required>
                    <option value="">Selecciona una opción</option>

                    <option SELECTED value="1">Inversión Inicial</option>
                    <option value="2">Renovación</option>
                    <!-- <option value="3">Upgrade</option>-->

                  </select>
                </div>
                <input type="hidden" name="pak" id="pak" value="<?php echo $pack ?>">
                <input type="hidden" name="invo_icop" id="invo_icop" value="<?php echo $invv ?>">
                <input type="hidden" name="usuaris" id="usuaris" value="<?php echo $user ?>">

                <div class="form-group col-12">
                  <label for="">Valor de tu inversión</label>
                  <select name="inve_dgn" id="inve_dgn" class="form-control" required>
                    <option value="">Selecciona una inversión</option>
                    <?php

                    $list_pack = $Muestra->list_pack($user);
                    while ($tif = mysqli_fetch_array($list_pack)) {
                        ?>
                      <option value="<?php echo $tif[val_usd] ?>"><?php echo $tif[name_pack] ?></option>
                    <?php
                    } ?>
                  </select>
                </div>

                <div class="form-group col-12">
                  <label for="">Elige un Tipo de Pago</label>
                  <select name="inve_tgo" id="inve_tgo" class="form-control" required>
                    <option value="">Selecciona un Tipo de Pago</option>
                    <option selected value="1">Bitcoin</option>
                    <option value="2">Código Promocional</option>
                  </select>
                </div>
              </div>

            </div>


          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Realizar Inversión</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form id="sol">
          <div class="modal-header">
            <h3 class="modal-title">Solicitar Retiro</h3>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <div class="container-fluid">
              <div class="row">
                <div class="form-group col-12">
                  <label for="">Billetera de Destino</label>
                  <input type="text" name="billi" id="billi" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-12">
                  <label for="">Monto del Retiro</label>
                  <input type="text" name="monto" id="monto" class="form-control" placeholder="" aria-describedby="helpId">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-12">
                  <label for="">Codigo de Autentificacion</label>
                  <input type="text" name="codeaut" id="codeaut" class="form-control" placeholder="" aria-describedby="helpId">
                  <h5 class="text-center my-2"><a href="#" id="solcod" class="btn btn-info">Solicitar Codigo</a></h5>
                </div>
              </div>
              <div id="notipetcode">
              </div>
            </div>


          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Solicitar</button>
          </div>
        </form>
      </div>
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

  <script src="./assets/js/inicio.js"></script>
  <script type="text/javascript" charset="utf8" src="./assets/js/jquery_datatable.js"></script>
  <script>
    $(document).ready(function() {
      $('#grid').DataTable({
        language: {
          "lengthMenu": "Mostrando _MENU_ registros por página",
          "zeroRecords": "Nada encontrado - lo siento",
          "info": "Mostrando página _PAGE_ de _PAGES_",
          "infoEmpty": "No hay registros disponibles.",
          "infoFiltered": "(filtrado de _MAX_ registros totales)",
          "loadingRecords": "Cargando...",
          "processing": "Procesando...",
          "search": "Buscar:",
          "paginate": {
            "first": "Primera",
            "last": "Ultima",
            "next": "Siguiente",
            "previous": "Anterior"
          },
        }
      });
    });
  </script>
</body>

</html>