<?php
include("views/include.php");
$page = 1;
?>
<!DOCTYPE html>
<html>
<style>
  .comprar {
    box-shadow: 0px 15px 14px -7px #b39e85;
    background: linear-gradient(to bottom, #ffa940 5%, #fb9e25 100%);
    background-color: #ffa940;
    border-radius: 42px;
    display: inline-block;
    cursor: pointer;
    color: #5c5a5c;
    font-family: Arial;
    font-size: 20px;
    font-weight: bold;
    padding: 10px 20px;
    text-decoration: none;
    text-shadow: 0px 1px 0px #cc9f52;
  }

  .comprar:hover {
    background: linear-gradient(to bottom, #fb9e25 5%, #ffa940 100%);
    background-color: #11C7F1;
  }

  .comprar:active {
    position: relative;
    top: 1px;
  }

  .card.card-stats.col-md-4 {
    border: none;
  }

  .card-footer.text-center {
    border: none;
  }

  .card-footer.no-border {
    border: none;
  }

  .col-md-10.text-center.border-blue {
    border-radius: 15px;
    border: #11c7f1 3px solid;
  }
</style>

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
      <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="">Tienda</a>
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
          </div>
          <!-- Tienda pruebas -->
          <div class="cards-store">
            <div class="col"></div>
            <div class="card-store card_center">
              <div class="body">
                <img class="card-img-top img-fluid" src="assets/img/500.png" alt="STS 500" width="150">
              </div>
              <div class="footer no-background">
                <a title="comprar" href="https://dev.socialtradingsystem.com/tienda/?emailUrl=<?php echo $emails ?>&add-to-cart=65"><img src="assets/img/button_comprar.jpg" alt="comprar" class="button_store " /></a>
              </div>
            </div>
            <div class="col"></div>
            <div class="card-store card_center">
              <div class="body">
                <img class="card-img-top img-fluid" src="assets/img/1000.png" alt="STS 1000" width="150">
              </div>
              <div class="footer no-background">
                <a title="comprar" href="https://dev.socialtradingsystem.com/tienda/?emailUrl=<?php echo $emails ?>&add-to-cart=117"><img src="assets/img/button_comprar.jpg" alt="comprar" class="button_store " /></a>
              </div>
            </div>
            <div class="col"></div>
            <div class="card-store card_center">
              <div class="body">
                <img class="card-img-top img-fluid" src="assets/img/3000.png" alt="STS 3000" width="150">
              </div>
              <div class="footer no-background">
                <a title="comprar" href="https://dev.socialtradingsystem.com/tienda/?emailUrl=<?php echo $emails ?>&add-to-cart=118"><img src="assets/img/button_comprar.jpg" alt="comprar" class="button_store " /></a>
              </div>
            </div>
            <div class="col"></div>
          </div>

          <div class="cards-store col-xl-12 mb-5 mb-xl-0">
            <div class="cmt--7 ">
              <div class="card-store card_center">
                <div class="header card-border">
                  <p style="font-size:16px; color:#1F618D; margin: 0.5em;"><b><strong><br />
                        Adquiriendo cualquiera de estos planes, incrementa el Plan STS que tienes en gestión actualmente. Tambien incrementan tus réditos diarios a partir del siguiente dìa hábil de tu compra.<br /><br />

                        El incremento del plan en gestión actual no tiene ningún otro beneficio en el Plan Educativo.
                      </strong><b /></p>
                </div>
                <div class="footer no-background ">
                  <p style="font-size: 9px; margin: 0.5em;">
                    DECLARACIÓN DE RIESGO<br />
                    Cualquier tipo de inversión, operación o gestión en mercados financieros conlleva un riesgo y puede no ser apropiado para todos. Le recomendamos que, analice detenidamente los objetivos de su participación, su nivel de experiencia y su tolerancia al riesgo. A pesar de nuestro amplio conocimiento, el trading en los mercados financieros es riesgoso y es posible perder parte o la totalidad del capital. Por lo que le recomendamos que no participe con dinero que sea de vital importancia para usted. Debe conocer todos los riesgos asociados con las operaciones en divisas y criptomonedas; si tiene alguna duda, comuníquese con su sponsor, contacte directamente con nosotros o solicite orientación de un asesor financiero independiente.
                  </p>
                </div>
              </div>
            </div>
          </div>
          <!-- Fin tienda pruebas -->
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


</body>

</html>