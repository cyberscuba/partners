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
  <title>Códigos Promocionales - <?php echo $cpny ?></title>
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="">Códigos Promocionales</a>
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
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Códigos Disponibles</h5>
                      <?php
                      $fd = $Muestra->totcoddis($user);
                      $fdq = mysqli_fetch_array($fd);
                      $tuu = $fdq['0']; 
                      ?>
                      <span class="h2 font-weight-bold mb-0"><?php echo $tuu[0] ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <i class="fas fa-archive"></i>
                      </div>
                    </div>
                  </div>
                  <p class="mt-3 mb-0 text-muted text-sm">
                    
                  </p>
                </div>
              </div>
            </div>
            
            <div class="col-xl-6 col-lg-6">
              <div class="card card-stats mb-4 mb-xl-0">
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Códigos No Disponibles</h5>
                      <?php
                      $fdn = $Muestra->totcoddisn($user);
                      $fdqn = mysqli_fetch_array($fdn);
                      $tuun = $fdqn['0']; 
                      ?>
                      <span class="h2 font-weight-bold mb-0"><?php echo $tuun[0] ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                        <i class="fas fa-archive"></i>
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
              <div class="row align-items-center">
                <div class="col">
                  <h3 class="mb-0">Códigos Promocionales</h3>
                </div>
                
                
               
              </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table id="demo" class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Cógio promocional</th>
                    <th scope="col">Fecha</th>
                    <th scope="col">Estado</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                
                    $art = $Muestra->refersactus_copuns($user); 
                  $index = 0;
                  while($tl = mysqli_fetch_array($art)){ $index++;
                  
                        if($tl[stateshif] <= '0'){
                            $tl[stateshif] = "Disponible";
                        }
                        
                        if($tl[stateshif] <= '1'){
                            $tl[stateshif] = "No Disponible";
                        }
                  
                  ?>
                      <tr>
                        <th scope="row">
                          <?php echo $index;?>
                        </th>
                        <td>
                          <?php  echo $tl[Cuponshift]; ?>
                        </td>
                        <td>
                          <?php echo $tl[dashif]; ?>
                        </td>
                        <td>
                          <?php echo $tl[stateshif];?>
                        </td>
                        
                      </tr>
                  <?php } ?>
                </tbody>
              </table>
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