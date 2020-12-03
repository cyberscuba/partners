<?php
include("views/include.php");
$page = 1;
?>
<!DOCTYPE html>
<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Mis Pagos - <?php echo $cpny ?></title>
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
     <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.11/css/jquery.dataTables.css">
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



            <div class="col-xl-6 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Pagado</h5>
                      <span class="h2 font-weight-bold mb-0">
                      $<?php
                      $art = $Muestra->get_billco($usuariop,$estado, $dateIn,$dateFin,$limit);
                      while($tl = mysqli_fetch_array($art)){ if($tl["cuenta"] == ''){$tl["cuenta"] = 0;}echo $tl["cuenta"];}
                      ?> usd</span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                        <img src="assets/img/creferidos.png">
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


                <div class="col-12" style="display: flex;">



                </div>



            </div>
             <div  class="col-md-12">
            <div style="text-align:center;" class="table-responsive">
              <!-- Projects table -->
              <table id="grid"  class="table align-items-center table-flush" >
                <thead class="thead-light">
                  <tr>
                      <th scope="col">#</th>
                      <th scope="col">Nombre Usuario</th>
                      <th scope="col">Valor</th>
                      <th scope="col">Fecha</th>
                  </tr>

                </thead>
                <tbody>
                  <?php

                    if( isset($_POST['datepicker1']) &&
                        isset($_POST['datepicker2'])) {

                        $mDate1 = explode('/', $_POST['datepicker1']);
                        $mDate2 = explode('/', $_POST['datepicker2']);

                    $dateIn = date('Y-m-d', strtotime("$mDate1[2]-$mDate1[0]-$mDate1[1]"));
                    $dateFin = date('Y-m-d', strtotime("$mDate2[2]-$mDate2[0]-$mDate2[1]"));

                    $art = $Muestra->get_bill($user, 0,$dateIn,$dateFin,true);

                    } else {

                    $art = $Muestra->get_bill($user, 0,$dateIn,$dateFin,false);
                    }

                  $index = 0;
                  while($tl = mysqli_fetch_array($art)){ $index++; ?>
                      <tr>
                        <th scope="row">
                          <?php echo $index;?>
                        </th>
                        <td>
                          <?php $art2 = $Muestra->get_name($tl['afiliado']);
                        while($tl2 = mysqli_fetch_array($art2)){echo $tl2['username'];}?>
                        </td>
                        <td>
                          $<?php echo $tl['cuenta'];?> usd
                        </td>
                        <td>
                          <?php echo $tl['periodo'];?>
                        </td>

                      </tr>
                  <?php } ?>
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
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Optional JS -->
  <script src="./assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="./assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="./assets/js/argon.js?v=1.0.0"></script>
   <script type="text/javascript" charset="utf8" src="./assets/js/jquery_datatable.js"></script>
    <script>
        $(document).ready(function() {
            $('#grid').DataTable();
        });
    </script>


</body>

</html>