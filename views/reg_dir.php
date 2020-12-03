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
  <title>Mis Referidos - <?php echo $cpny ?></title>
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
        <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="">Mis Referidos</a>
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
                      <h5 class="card-title text-uppercase text-muted mb-0">Total Referidos Directos</h5>
                      <span class="h2 font-weight-bold mb-0"><?php echo $ii[0] ?></span>
                    </div>
                    <div class="col-auto">
                      <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                        <img src="assets/img/referidos.png">
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
                  <h3 class="mb-0">Mis Referidos</h3>
                </div>
                
                <div class="col text-right">
                  
                  <a href="network" class="btn btn-sm btn-primary">Árbol de Referidos</a>
                </div>
               
              </div>
            </div>
             <div  class="col-md-12">
            <div style="text-align:center;" class="table-responsive">
              <!-- Projects table -->
              <table id="grid" class="table align-items-center table-flush">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Email</th>
                    <th scope="col">Plan</th>
                  </tr>
                </thead>
                <tbody>
                  <?php 
                
                    $art = $Muestra->refersactus($user); 
                  $index = 0;
                  while($tl = mysqli_fetch_array($art)){ $index++;
                  $pack_id = $tl['pack']; 
                        $pik = $Muestra->state_packs($pack_id);
                        $pk = mysqli_fetch_array($pik);
                        if($pk[0] <= '0'){
                            $pk[0] = "Sin Plan";
                        }
                  
                  ?>
                      <tr>
                        <th scope="row">
                          <?php echo $index;?>
                        </th>
                        <td>
                          <?php  echo $tl["username"]; ?>
                        </td>
                        <td>
                          <?php echo $tl["ape_user"]; ?>
                        </td>
                        <td>
                          <?php echo $tl['user_login'];?>
                        </td>
                        <td>
                          <?php echo $pk[0];?>
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