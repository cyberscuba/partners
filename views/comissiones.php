<?php
include("views/include.php");

$leveo = 1;
$bondirseled = $Muestra->get_response23aabb($usuariop,$leveo);
    $giddird = mysqli_fetch_array($bondirseled);
    $bondird = $giddird[0];
    
    if($bondird <= 0){
        $bondird = 0;
    }
    
    
    $leveo = 2;
$bondirseled2 = $Muestra->get_response23aabb($usuariop,$leveo);
    $giddird2 = mysqli_fetch_array($bondirseled2);
    $bondird2 = $giddird2[0];
    
    if($bondird2 <= 0){
        $bondird2 = 0;
    }
    
    $leveo = 3;
$bondirseled3 = $Muestra->get_response23aabb($usuariop,$leveo);
    $giddird3 = mysqli_fetch_array($bondirseled3);
    $bondird3 = $giddird3[0];
    
    if($bondird3 <= 0){
        $bondird3 = 0;
    }
    
    $leveo = 4;
$bondirseled4 = $Muestra->get_response23aabb($usuariop,$leveo);
    $giddird4 = mysqli_fetch_array($bondirseled4);
    $bondird4 = $giddird4[0];
    
    if($bondird4 <= 0){
        $bondird4 = 0;
    }
    
    
    
    

$page = 1;
?>
<!DOCTYPE html>
<html>

<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Comisiones - <?php echo $cpny ?></title>
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="">Mis Comisiones</a>
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
                      <h5 class="card-title text-uppercase text-muted mb-0">PRIMER NIVEL</h5>
                      <span class="h2 font-weight-bold mb-0">$<?php echo $bondird ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                  <img src="./assets/img/comisiones.png">
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    
                  </p>
                </div>
              </div>
            </div>
            
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">SEGUNDO NIVEL</h5>
                      <span class="h2 font-weight-bold mb-0">$<?php echo $bondird2 ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                       <img src="./assets/img/comisiones.png">
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                   
                  </p>
                </div>
              </div>
            </div>
            
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">TERCER NIVEL</h5>
                      <span class="h2 font-weight-bold mb-0">$<?php echo $bondird3 ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                     <img src="./assets/img/comisiones.png">
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                   
                  </p>
                </div>
              </div>
            </div>
            
            <div class="col-xl-3 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">CUARTO NIVEL</h5>
                      <span class="h2 font-weight-bold mb-0">$<?php echo $bondird4 ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                       <img src="./assets/img/comisiones.png">
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                   
                  </p>
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
              <form action="#" method="post" class="row align-items-center">
                <div  class="col-xl-3">
                 
                </div>
                <?php
                
                $query_date = date("Y/m/d"); 
                    
                $dateIn = date('Y-m-01', strtotime($query_date));
                $dateFin = date('Y-m-t', strtotime($query_date));
                $dateInP = date('m/01/Y', strtotime($query_date));
                $dateFinP = date('m/t/Y', strtotime($query_date));
                
                ?>
                
                
              </form>
            </div>
             <div  class="col-md-12">
            <div style="text-align:center;" class="table-responsive">
              <!-- Projects table -->
              <table id="grid"  class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Fecha de Pago</th>
                    <th scope="col">Comisión Diaria</th>
                    <th scope="col">Nivel</th>
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
                    
                    
                    $art = $Muestra->get_commi($user, 0,$dateIn,$dateFin,true);
                    
                    } else {
                    $art = $Muestra->get_commi($user, 0,$dateIn,$dateFin,false); }
                    
                    
                  $index = 0;
                  while($tl = mysqli_fetch_array($art)){ $index++; ?>
                      <tr>
                        <th scope="row">
                          <?php echo $index;?>
                        </th>
                       
                        <td>
                          <?php $art2 = $Muestra->get_name($tl['cedula_otor']); 
                          while($tl2 = mysqli_fetch_array($art2)){
                              echo $tl2["username"];}?>
                        </td>
                        <td>
                          <?php echo $tl['fecha'];?>
                        </td>
                      
                        <td>
                          <?php echo $tl['total_comisiones'];?>
                        </td>
                        <td>
                          <?php echo $tl['ciclo'];?>
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
  
  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  
   Argon JS 
  <script src="./assets/js/argon.js?v=1.0.0"></script>
   <script type="text/javascript" charset="utf8" src="./assets/js/jquery_datatable.js"></script>
    <script>
        $(document).ready(function() {
            $('#grid').DataTable();
        });
    </script>
    <script>
    
    $( document ).ready(function() {
    
                    $('#datepicker1').datepicker({uiLibrary: 'bootstrap4'});
                    $('#datepicker2').datepicker({uiLibrary: 'bootstrap4'});
                    $('[role="wrapper"]')[0].prepend($("#m1")[0]);
                    $('[role="wrapper"]')[1].prepend($("#m2")[0]);
                    $('[role="wrapper"]')[0].style="";
                    $('[role="wrapper"]')[1].style=""
});
    
        var date = new Date();
        var firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
        var lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);
        //$("#datepicker1").val((firstDay.getMonth()+1) + "/" + firstDay.getDate() + "/" + firstDay.getFullYear());
        //$("#datepicker2").val((lastDay.getMonth()+1) + "/" + lastDay.getDate() + "/" + lastDay.getFullYear());
  
    $( "#btnFiltrar" ).click(function() {
        
        var mDate = $("#datepicker1")[0].value.split("/");
        var dateDesde = new Date(mDate[2], mDate[0] - 1, mDate[1]);
        
        var mDate = $("#datepicker2")[0].value.split("/");
        var dateHasta = new Date(mDate[2], mDate[0] - 1, mDate[1]);
        
        for (i = 1; i < $("#demo")[0].rows.length; i++) {
            var mDate = $("#demo")[0].rows[i].cells[3].innerText.split("-");
            var fecha = new Date(mDate[0], mDate[1] - 1, mDate[2]);
            if (fecha.getTime()<dateDesde.getTime() || 
            fecha.getTime()>dateHasta.getTime())
                $("#demo")[0].rows[i].hidden=1;
            else $("#demo")[0].rows[i].hidden=0;
        }
    });
        
    </script>
  
  
</body>

</html>