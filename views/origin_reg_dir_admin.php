<?php
include("views/include.php");
$page = 1;

$cont1 = $Muestra->conactives($user);
$cont2 = $Muestra->coninactives($user);
?>
<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Administrar Usuario - <?php echo $cpny ?></title>
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
  <?php
//Ojo para el paso a produccion = ALTER TABLE `security_users` ADD `points` INT NOT NULL AFTER `pack`;
  if (
    isset($_POST["username"]) && isset($_POST["user_login"]) &&
    isset($_POST["nameUser"]) && isset($_POST["apeUser"]) &&
    isset($_POST["dirUser"]) && isset($_POST["paisUser"]) &&
    isset($_POST["dptoUser"]) && isset($_POST["ciuUser"]) &&
    isset($_POST["telUser"]) && isset($_POST["user_psw"]) &&
    isset($_POST["points"])
  ) {

    $user_nam = $_POST["username"];
    $emails = $_POST["user_login"];
    $nam = $_POST["nameUser"];
    $apeli = $_POST["apeUser"];
    $user_tel = $_POST["telUser"];
    $dirus = $_POST["dirUser"];
    $ciuus = $_POST["ciuUser"];
    $estarus = $_POST["dptoUser"];
    $paisus = $_POST["paisUser"];
    $points = $_POST["points"];


    if ($_POST["user_psw"] == "") {

      $art = $Muestra->up_useradmin(
        $_POST["username"],
        $_POST["user_login"],
        $_POST["nameUser"],
        $_POST["apeUser"],
        $_POST["dirUser"],
        $_POST["telUser"],
        $_POST["ciuUser"],
        $_POST["dptoUser"],
        $_POST["paisUser"],
        $_POST["points"],
        $_POST["ID"]
      );
    } else {
      $art = $Muestra->up_userPass(
        $_POST["username"],
        $_POST["user_login"],
        md5($_POST["user_psw"]),
        $_POST["nameUser"],
        $_POST["apeUser"],
        $_POST["dirUser"],
        $_POST["telUser"],
        $_POST["ciuUser"],
        $_POST["dptoUser"],
        $_POST["paisUser"],
        $_POST["points"],
        $_POST["ID"]
      );
    }
  } else {
  }
  ?>
  <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
      <!-- Brand -->
      <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="">Administrar Usuario</a>
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
                    <h5 class="card-title text-uppercase text-muted mb-0">Total Usuarios Activos</h5>
                    <span class="h2 font-weight-bold mb-0"><?php echo $cont1 ?></span>
                  </div>
                  <div class="col-auto">git
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

          <div class="col-xl-6 col-lg-6">
            <div class="card card-stats mb-4 mb-xl-0">
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <h5 class="card-title text-uppercase text-muted mb-0">Total Usuarios Inactivos</h5>
                    <span class="h2 font-weight-bold mb-0"><?php echo $cont2 ?></span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
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
            <form action="" method="post" class="row align-items-center">

              <div class="col-12">

              </div>



              <div class="input-group mb-3 col-lg col-sm-12" style="margin-top:7px;">
                <div class="input-group-prepend">
                  <label for="filtUs" class="input-group-text" id="inputGroup-sizing-default">Usuario</label>
                </div>
                <input id="filtUs" type="text" name="filtUs" value="<?php if (isset($_POST["filtUs"])) echo $_POST["filtUs"]; ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
              </div>


              <div class="input-group mb-3 col-lg col-sm-12" style="margin-top:7px;">
                <div class="input-group-prepend">
                  <label for="filtEmail" class="input-group-text" id="inputGroup-sizing-default">Correo</label>
                </div>
                <input type="text" id="filtEmail" name="filtEmail" value="<?php if (isset($_POST["filtEmail"])) echo $_POST["filtEmail"]; ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
              </div>

              <div class="input-group mb-3 col-lg col-sm-12" style="margin-top:7px;">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="filEstado">Estado</label>
                </div>
                <select name="taskOption" class="custom-select" id="filEstado">
                  <option value=""></option>
                  <option value="1" <?php if ($_POST["taskOption"] == '1') echo "selected"; ?>>Activo</option>
                  <option value="0" <?php if ($_POST["taskOption"] == '0') echo "selected"; ?>>Inactivo</option>
                </select>
              </div>
              <button type="submit" class="btn btn-primary mb-2 ">Filtrar</button>


              <!-- <div class="col text-right">
                  <a href="#!" class="btn btn-sm btn-success">Ver Mis Referidos</a>
                  <a href="network" class="btn btn-sm btn-primary">Ver Mi Red Binaria</a>
                </div> -->

            </form>
          </div>
          <div class="col-sm-12">
            <div class="table-responsive ">
              <!-- Projects table -->
              <table id="grid" style="width: 100%;" class="table-striped table-bordered dt-responsive ">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Email</th>
                    <th scope="col">Plan</th>
                    <th scope="col">Puntos</th>
                    <th scope="col">Ver Información</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Bloquear</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $art = $Muestra->refersactus_admin($user);
                  $index = 0;
                  $plani = 0;
                  while ($tl = mysqli_fetch_array($art)) {
                    $index++;
                    $pack_id = $tl['pack'];
                    $pik = $Muestra->state_packs($pack_id);
                    $pk = mysqli_fetch_array($pik);
                    if ($pk[0] <= '0') {
                      $pk[0] = "Sin Plan";
                    }

                    $referidos = $Muestra->references($tl['ID']);
                    $total_referidos = mysqli_fetch_array($referidos);

                    $artss = $Muestra->get_commishop($tl['user_login']);
                    $talsu = 0;
                    while ($tlss = mysqli_fetch_array($artss)) {
                      $rtss = explode(' ', $tlss[order_item_name]);
                      $namsoss = $rtss[1];
                      $talsu = $namsoss + $talsu;
                    }
                    $puntosUsd = (intdiv(1500, 500));
                    $misPuntos = $ii[0] + $talsu;


                    $totalPuntos = $total_referidos['0'] + $misPuntos;

                  ?>
                    <tr>
                      <th scope="row">
                        <?php echo $index; ?>
                      </th>
                      <td>
                        <?php echo $tl["username"]; ?>
                      </td>
                      <td>
                        <?php echo $tl['user_login']; ?>
                      </td>
                      <td>
                        <?php echo $pk[0]; ?>
                      </td>
                      <td style="text-align:center;">
                        <?php echo $tl["points"]; ?>
                      </td>
                      <td style="text-align:center;">

                        <a href="doctus?vt=<?php echo $tl['ID'] ?>" class="blue" title="Ver Información" style="cursor:pointer;">
                          <i class="fa fa-search"></i>
                        </a>

                      </td>

                      <!--<td>
                        <?php echo $varpk1 ?>
                        </td>-->

                      <td>
                        <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#exampleModal<?php echo $tl["ID"]; ?>">
                          Editar
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal<?php echo $tl["ID"]; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Editar Perfil</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form id="form<?php echo $tl["ID"]; ?>" action="" method="post">
                                  <input type="text" name="ID" value="<?php echo $tl["ID"]; ?>" hidden>
                                  <div class="pl-lg-4">
                                    <div class="row">
                                      <div class="col-lg-6">
                                        <div class="form-group">
                                          <label class="form-control-label" for="input-username">Usuario</label>
                                          <input type="text" id="input-username" class="form-control form-control-alternative" name="username" placeholder="Usuario" value="<?php echo $tl["username"]; ?>">
                                        </div>
                                      </div>
                                      <div class="col-lg-6">
                                        <div class="form-group">
                                          <label class="form-control-label" for="input-email">Email</label>
                                          <input type="email" id="input-email" name="user_login" class="form-control form-control-alternative" placeholder="Email" value="<?php echo $tl["user_login"]; ?>">
                                        </div>
                                      </div>
                                      <div class="col-lg-12">
                                        <div class="form-group">
                                          <label class="form-control-label" for="input-first-name">Nueva Contraseña</label>
                                          <input type="text" id="input-first-name" name="user_psw" class="form-control form-control-alternative" placeholder="*****">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-6">
                                        <div class="form-group">
                                          <label class="form-control-label" for="input-first-name">Nombre</label>
                                          <input type="text" id="input-first-name" name="nameUser" class="form-control form-control-alternative" placeholder="Nombre" value="<?php echo $tl["name_user"]; ?>">
                                        </div>
                                      </div>
                                      <div class="col-lg-6">
                                        <div class="form-group">
                                          <label class="form-control-label" for="input-last-name">Apellido</label>
                                          <input type="text" id="input-last-name" name="apeUser" class="form-control form-control-alternative" placeholder="Apellido" value="<?php echo $tl["ape_user"]; ?>">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                  <hr class="my-4" />
                                  <!-- Address -->
                                  <h6 class="heading-small text-muted mb-4">Información de Contacton</h6>
                                  <div class="pl-lg-4">
                                    <div class="row">
                                      <div class="col-md-8">
                                        <div class="form-group">
                                          <label class="form-control-label" for="input-address">Dirección</label>
                                          <input id="input-address" name="dirUser" class="form-control form-control-alternative" placeholder="Home Address" value="<?php echo $tl["dir_user"]; ?>" type="text">
                                        </div>
                                      </div>
                                      <div class="col-md-4">
                                        <div class="form-group">
                                          <label class="form-control-label" for="input-tell">Teléfono</label>
                                          <input id="input-tell" name="telUser" class="form-control form-control-alternative" placeholder="Teléfono" value="<?php echo $tl["tel_user"]; ?>" type="text">
                                        </div>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-lg-4">
                                        <div class="form-group">
                                          <label class="form-control-label" for="input-city">Ciudad</label>
                                          <input type="text" id="input-city" name="ciuUser" class="form-control form-control-alternative" placeholder="Ciudad" value="<?php echo $tl["ciu_user"]; ?>">
                                        </div>
                                      </div>
                                      <div class="col-lg-4">
                                        <div class="form-group">
                                          <label class="form-control-label" for="input-country">Estado</label>
                                          <input type="text" id="input-country" name="dptoUser" class="form-control form-control-alternative" placeholder="Estado" value="<?php echo $tl["dpto_user"]; ?>">
                                        </div>
                                      </div>
                                      <div class="col-lg-4">
                                        <div class="form-group">
                                          <label class="form-control-label" for="input-country">Pais</label>
                                          <input type="text" id="input-postal-code" name="paisUser" class="form-control form-control-alternative" value="<?php echo $tl["pais_user"]; ?>" placeholder="Pais">
                                        </div>
                                      </div>
                                    </div>
                                    <!-- Puntos -->
                                    <hr>
                                    <div class="row">
                                      <div class="col-lg-4">
                                        <div class="form-group">
                                          <label class="form-control-label" for="input-points">Puntos</label>
                                          <input type="number" id="input-points" name="points" class="form-control form-control-alternative" placeholder="10" value="<?php echo $tl["points"]; ?>">
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </form>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                <button id="btnEdit<?php echo $tl["ID"]; ?>" type="button" class="btn btn-primary">Guardar Perfil</button>
                                <script>
                                  $("#btnEdit<?php echo $tl["ID"]; ?>").click(function() {
                                    $("#form<?php echo $tl["ID"]; ?>").submit();

                                  });
                                </script>

                              </div>
                            </div>
                          </div>
                        </div>
                      </td>

                      <?php if ($tl[ID] != 1) { ?><td>
                          <form method="POST" action="blkok_admin_user">
                            <input type="hidden" name="us_actva" id="us_actva" value="<? echo $tl[ID] ?>" require="true">
                            <input type="submit" class="btn btn-sm btn-danger" value="Eliminar"></form><?php } ?>
                        </td>
                    </tr>
                  <?php $plani = $plani + $pk[1];
                  } ?>
                </tbody>
                <h2 align="center">Total Gestionado:
                  <? echo number_format($plani) ?> USD</h2><br>
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



  Argon JS
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

    $("#btnFiltrar").click(function() {

      var mDate = $("#datepicker1")[0].value.split("/");
      var dateDesde = new Date(mDate[2], mDate[0] - 1, mDate[1]);

      var mDate = $("#datepicker2")[0].value.split("/");
      var dateHasta = new Date(mDate[2], mDate[0] - 1, mDate[1]);

      for (i = 1; i < $("#demo")[0].rows.length; i++) {
        var mDate = $("#demo")[0].rows[i].cells[3].innerText.split("-");
        var fecha = new Date(mDate[0], mDate[1] - 1, mDate[2]);
        if (fecha.getTime() < dateDesde.getTime() ||
          fecha.getTime() > dateHasta.getTime())
          $("#demo")[0].rows[i].hidden = 1;
        else $("#demo")[0].rows[i].hidden = 0;
      }
    });
  </script>


</body>

</html>