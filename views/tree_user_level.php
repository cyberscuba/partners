<?php
include("views/include.php");
include("class/tree_organizate.php");

$delt = $Muestra->gert($usuariop);
$tp = mysqli_fetch_array($delt);
if ($tp[0] <= '0') {
  $tp[0] = 0;
}
if ($tp[1] <= '0') {
  $tp[1] = 0;
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Mi Red - <?php echo $cpny ?></title>
  <!-- Favicon -->
  <link href="./assets/img/icons/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="./assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="./assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="./assets/css/argon.css?v=1.0.0" rel="stylesheet">
  <link type="text/css" href="./assets/css/style_tree_level.css" rel="stylesheet">

</head>

<style>
  .fa {
    line-height: inherit !important;
  }

  .mCustomScrollBox {
    height: inherit;
  }

  .jstree-anchor {
    height: auto !important;
    white-space: normal !important;
  }
</style>

<body>
  <?php include("views/menu.php") ?>
  <!-- Header -->
  <!-- Top navbar -->
  <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
      <!-- Brand -->
      <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="./index">Mi Red</a>
      <?php include("views/nav.php") ?>
    </div>
  </nav>

  <div class="header bg-gradient-primary pb-8 pt-5 pt-md-8">
    <div class="container-fluid">
      <div class="header-body">
        <!-- Card stats -->
        <div class="row">



        </div>
      </div>
    </div>
  </div>
  <!-- Page content -->
  <div class="container-fluid mt--7">

    <div class="row mt-5">
      <div class="col-xl-12 mb-5 mb-xl-0">
        <div class="card shadow">
          <div class="card-header border-0">
            <div class="row align-items-center">

              <div class="col text-right">
                <a href="referrals" class="btn btn-sm btn-success">Referidos Directos</a>

              </div>
            </div>
          </div>

          <style>
            #tree-container {
              /* text-transform: lowercase; */
              font-size: 14px;
              /* color: black; */
            }

            .jstree-node {
              font-size: 15px;
              color: #11C7F1;
            }

            #tree-container::first-letter {
              text-transform: capitalize
            }
          </style>
          <div class="col-md-12">

            <div class="form-group has-feedback">
              <label for="search" class="sr-only">Buscar Afiliado</label>
              <input type="text" class="form-control" id="plugins4_q" placeholder="Buscar Afiliado">
              <span class="glyphicon glyphicon-search form-control-feedback"></span>
            </div>

            <div class="table-responsive">


              <!-- Projects table -->

              <div id="tree-container"></div><br>


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
  <link rel="stylesheet" href="dist/style.min.css" />
  <script src="assets/js/jstree.min.js"></script>


  <script type="text/javascript">
    $(document).ready(function() {
      //fill data to tree  with AJAX call
      $('#tree-container').jstree({

        'plugins': ["checkbox", "search", "types"],

        'core': {
          'data': {
            "url": "response.php",
            "dataType": "json", // needed only if you do not supply JSON headers
          },
          "themes": {
            "variant": "large"
          },
        },
        'types': {
          'selectable': {
            
            'icon': 'assets/img/user-31.png'
          },
          'default': {
            
            'icon': 'assets/img/user-31.png'
          },
        },

      });

      var to = false;
      $('#plugins4_q').keyup(function() {
        if (to) {
          clearTimeout(to);
        }
        to = setTimeout(function() {
          var v = $('#plugins4_q').val();
          $('#tree-container').jstree(true).search(v);
        }, 250);
      });
    });
  </script>

</body>

</html>