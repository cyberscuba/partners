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
  <title>Material de Apoyo - <?php echo $cpny ?></title>
  <!-- Favicon -->
  <link href="./assets/img/icons/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="./assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="./assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="./assets/css/argon.css?v=1.0.0" rel="stylesheet">
  <link type="text/css" href="/assets/css/argon.min.css" rel="stylesheet">

  <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
  <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  <style>
    .sizeReduce {
      height: 29px;
      text-align: end;
    }
  </style>
</head>

<body>
  <?php include("views/menu.php") ?>
  <!-- Header -->
  <!-- Top navbar -->
  <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
    <div class="container-fluid">
      <!-- Brand -->
      <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="">Material de Apoyo</a>
      <?php include("views/nav.php") ?>
    </div>
  </nav>
  <!-- Inicia primera row -->
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
                    <h5 class="card-title text-uppercase text-muted mb-0">Clases Online</h5>
                    <a style="color: #23c7f1;font-size:14px;" href="<?php
                                                                    $fd = $Muestra->totcoddis123($user);
                                                                    $fdq = mysqli_fetch_array($fd);
                                                                    echo $fdq['zoom'];
                                                                    ?>" target="_blank"><?php
                                                                                        $fd = $Muestra->totcoddis123($user);
                                                                                        $fdq = mysqli_fetch_array($fd);
                                                                                        echo $fdq['zoom'];
                                                                                        ?></a>
                    <span class="h2 font-weight-bold mb-0"><?php echo $tuu[0] ?></span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                      <img src="assets/img/zoom.png"> </div>
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
                    <h5 class="card-title text-uppercase text-muted mb-0">Link de Youtube</h5>
                    <a style="color: #23c7f1;font-size:14px;" href="<?php
                                                                    $fd = $Muestra->totcoddis123($user);
                                                                    $fdq = mysqli_fetch_array($fd);
                                                                    echo $fdq['youtube'];
                                                                    ?>" target="_blank"><?php
                                                                                        $fd = $Muestra->totcoddis123($user);
                                                                                        $fdq = mysqli_fetch_array($fd);
                                                                                        echo $fdq['youtube'];
                                                                                        ?></a>
                    <span class="h2 font-weight-bold mb-0"><?php echo $tuun[0] ?></span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                      <img src="assets/img/youtube.png">
                    </div>
                  </div>
                </div>
                <p class="mt-3 mb-0 text-muted text-sm">

                </p>
              </div>
            </div>
          </div>


        </div>
        <!-- end row -->

      </div>
    </div>
  </div>
  <!-- FIN PRIMERA ROW -->
  <!-- Page content -->
  <div class="container-fluid mt--7">
    <div class="row">
      <div class="col-xl-12 mb-5 mb-xl-0">
        <div class="card shadow">
          <div class="card-header border-0 " style="border-radius: 15px;">
            <div class="row align-items-center">
              <!-- CARD PRINCIPAL -->
              <div class="cards-material col-xl-12 mb-5 mb-xl-0">
                <!--CARD 1 -->
                <div class="card-material">
                  <div class="header">
                    <h3 class="card-title text-uppercase text-muted mb-0">MODULOS</h3>
                  </div>
                  <div class="body no-background">

                    <div class="vid-list-container">
                      <ol id="vid-list">
                        <?php
                        $videos = $Muestra->getMatApoyoVideos($user);
                        $i = 0;
                        while ($li = mysqli_fetch_array($videos)) {
                          $i++;

                        ?><li>
                            <a class="video-btn" data-toggle="modal" href="#modalVideo" data-src="https://youtube.com/embed/<?php echo $li['url'] ?>">
                              <span class="vid-thumb"><img width="200" src="https://img.youtube.com/vi/<?php echo $li['url'] ?>/default.jpg" /></span>
                              <div class="tittle">
                                <?php echo $li['titulo'] ?>
                                <br />
                                <div class="desc"><?php echo $li['descripcion'] ?> </div>
                              </div>
                            </a>
                          </li>
                          <?php if ($rol == 1) { ?>
                            <li></li>
                            <li class="sizeReduce">
                              <div>
                                
                                <a class="btn-delete-module" style="color: #23c7f1;font-size:14px;" href="#" style="cursor:pointer;" data-title="<?php echo $li['titulo'] ?>" data-id="<?php echo $li['id']; ?>" id="eliminaModulo_<?php echo $li['id']; ?>">
                                  <i class="ace-icon fa fa-download light-green bigger-200"></i> Eliminar
                                </a>
                              </div>
                              <div></div>
                            </li>
                          <?php } ?>

                        <?php
                        }
                        ?>
                      </ol>
                    </div>

                  </div>
                  <?php if ($rol == 1) { ?>
                    <div class="footer no-background">
                      <button type="button" id="documentosMaterialApoyo" class="btn btn-block btn-primary mb-3" data-toggle="modal" data-target="#modal-modulos">Agregar Material de Modulos</button>
                    </div>
                  <?php } ?>
                </div>
                <!-- END CARD 1 -->
                <!-- CARD 2 -->
                <div class="card-material">
                  <div class="header">
                    <h3 class="card-title text-uppercase text-muted mb-0">DOCUMENTOS Y HERRAMIENTAS</h3>
                  </div>
                  <div class="body no-background">

                    <div class="table-responsive">
                      <table id="demo" class="table align-items-center table-flush">
                        <?php
                        $art = $Muestra->refersactus_copuns123($user);
                        $index = 0;
                        while ($tl = mysqli_fetch_array($art)) {
                          $index++;
                        ?>
                          <tr>
                            <td><input type="hidden" id="id_<?php echo $i ?>" value="<?php echo $tl['ID']; ?>"></td>
                            <td><?php echo $tl['nombre']; ?></td>
                            <td><a style="color: #23c7f1;font-size:14px;" href="<?php echo $tl['url'] ?>" download="<?php echo $row['nombre'] ?>">
                                <i title="Descargar" class="ace-icon fa fa-download light-green bigger-200"></i> Descargar
                              </a></td>
                            <? if($rol == 1){ ?>
                            <td><a class="btn-delete-document" style="color: #23c7f1;font-size:14px;" href="#" style="cursor:pointer;" data-id-document="<?php echo $tl['ID']; ?>" data-title-document="<?php echo $tl['nombre']; ?>" id="elim_<?php echo $i ?>">
                                <i class="ace-icon fa fa-download light-green bigger-200"></i> Eliminar
                              </a></td>
                            <? } ?>
                          </tr>
                        <?php $i++;
                        } ?>

                      </table>
                    </div>

                  </div>
                  <? if($rol == 1){ ?>
                  <div class="card-footer no-background">
                    <br />
                    <button type="button" id="documentosVideosApoyo" class="btn btn-block btn-primary mb-3" data-toggle="modal" data-target="#modal-apoyo">Agregar Material de Apoyo</button>
                  </div>
                  <? } ?>
                </div>
                <!-- END CARD 2 -->
              </div>
              <!-- END CARD PRINCIPAL -->

              <div class="row">
                <!-- Modal material modulos -->
                <div class="modal fade" id="modal-modulos" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                  <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                    <div class="modal-content">

                      <div class="modal-header">
                        <h2 class="modal-title" id="modal-title-default">Agregar Material de Modulos</h2>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>

                      <div class="modal-body">
                        <form id="add_material_modulos" enctype=multipart/form-data> <div class="form-group">
                          <label for="url" class="form-control-label">https://youtube.com/embed/</label>
                          <input class="form-control" type="text" id="url" name="url">
                          <label for="titulo" class="form-control-label">Titulo</label>
                          <input class="form-control" type="text" id="titulo" name="titulo">
                          <label for="descripcion" class="form-control-label">Descripción</label>
                          <input class="form-control" type="text" id="descripcion" name="descripcion">

                      </div>
                      <button type="submit" class="btn btn-primary">Agregar</button>
                      <br>
                      <div align="center" style="display:none;" id="loading_material_moulos">Cargando... <img src="assets/img/ajax-loader.gif" />
                      </div>
                      <div id="response_material_moulos">
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Modal material modulos -->
              <!-- Modal material apoyo -->
              <div class="modal fade" id="modal-apoyo" tabindex="-1" role="dialog" aria-labelledby="modal-default" aria-hidden="true">
                <div class="modal-dialog modal- modal-dialog-centered modal-" role="document">
                  <div class="modal-content">

                    <div class="modal-header">
                      <h2 class="modal-title" id="modal-title-default">Agregar Material de Apoyo</h2>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>

                    <div class="modal-body">
                      <form id="add_resourm" enctype=multipart/form-data> <div class="form-group">
                        <label for="example-text-input" class="form-control-label">Nombre</label>
                        <input class="form-control" type="text" id="nombre" name="nombre">
                    </div>
                    <div class="form-group">
                      <label for="example-text-input" class="form-control-label">Subir Archivo</label>
                      <input type="file" id="archivo" name="archivo" lang="es" required="true">
                    </div>
                    <button type="submit" class="btn btn-primary">Agregar</button><br>
                    <div align="center" style="display:none;" id="loading_loginso">Cargando... <img src="assets/img/ajax-loader.gif" /></div>
                    <div id="response_loginso"></div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <!-- End Modal material apoyo -->
          </div>
          <!--</div> -->
        </div>
      </div>

      <div class="row" id="response_login1">
        <div align="center" style="display:none;" id="loading_login1">Cargando... <img src="assets/img/ajax-loader.gif" />
        </div>
      </div>
      <!-- Modal video-->
      <div class="modal fade " id="modalVideo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog video-modulos-dialog" role="document">
          <div class="modal-content">
            <div class="modal-body video-modulos-body">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <!-- 16:9 aspect ratio -->
              <div class="embed-responsive embed-responsive-16by9">
                <iframe class="embed-responsive-item" src="" id="video" allowscriptaccess="always" allow="autoplay"></iframe>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- End Modal video -->
      <!-- Footer -->
    </div>
    <?php include("views/footer.php") ?>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="./assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="./assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="/assets/js/argon.min.js"></script>
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
  <script>
    /*JS FOR SCROLLING THE ROW OF THUMBNAILS*/
    $(document).ready(function() {
      $('.vid-item').each(function(index) {
        $(this).on('click', function() {
          var current_index = index + 1;
          $('.vid-item .thumb').removeClass('active');
          $('.vid-item:nth-child(' + current_index + ') .thumb').addClass('active');
        });
      });
    });
  </script>


  <script>
    $(document).ready(function() {
      // Gets the video src from the data-src on each button
      var $videoSrc;
      $('.video-btn').click(function() {
        $videoSrc = $(this).data("src");
      });
      console.log($videoSrc);
      // when the modal is opened autoplay it  
      $('#modalVideo').on('shown.bs.modal', function(e) {
        // set the video src to autoplay and not to show related video. Youtube related video is like a box of chocolates... you never know what you're gonna get
        $("#video").attr('src', $videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0");
      })
      // stop playing the youtube video when I close the modal
      $('#modalVideo').on('hide.bs.modal', function(e) {
        // a poor man's stop video
        $("#video").attr('src', $videoSrc);
      })
      // document ready  
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
      $(".btn-delete-document").click(function(e) {
        e.preventDefault();
        let idDocument = $(this).data('id-document');
        let titleDocument = $(this).data('title-document');
        let borrarDocument = 'true';

        swal({
            title: "Estas seguro?",
            text: "Una vez eliminado, no podrá recuperar este documento!",
            icon: "warning",
            buttons: ["No borrar!", "Confirmo el borrado!"],
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              $.ajax({
                type: "POST",
                url: "doc_delete.php?f=borrarDocumentos",
                data: {
                  idDocument: idDocument,
                  borrarDocument: borrarDocument,
                  titleDocument: titleDocument,
                },
                dataType: "html",
                success: function(response) {
                  var jsonData = JSON.parse(response);
                  console.warn(jsonData);
                  if (jsonData.success == "1") {
                    //swal("¡Listo!", "¡Se eliminó correctamente!", "success");
                    swal("¡Se eliminó correctamente!", {
                      icon: "success",
                    });
                    setTimeout("location.href='mat_apoyo'", 2000);
                  } else {
                    swal("¡Error al eliminar!", "Vuelve a intentarlo", "error");
                  }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                  swal("¡Error al eliminar!", "Vuelve a intentarlo", "error");
                }
              });
            } else {
              swal("Su documento no será borrado!");
            }
          });
      });
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
      $(".btn-delete-module").click(function(e) {
        e.preventDefault();
        let idModulo = $(this).data('id');
        let title = $(this).data('title');
        let borraModulo = 'true';

        swal({
            title: "Estas seguro?",
            text: "Una vez eliminado, no podrá recuperar este modulo!",
            icon: "warning",
            //buttons: true,
            buttons: ["No borrar!", "Confirmo el borrado!"],
            dangerMode: true,
          })
          .then((willDelete) => {
            if (willDelete) {
              $.ajax({
                type: "POST",
                url: "doc_delete.php?f=borrarModulo",
                data: {

                  idModulo: idModulo,
                  borraModulo: borraModulo,
                  title: title,
                },
                dataType: "html",
                success: function(response) {
                  var jsonData = JSON.parse(response);
                  console.warn(jsonData);
                  if (jsonData.success == "1") {
                    //swal("¡Listo!", "¡Se eliminó correctamente!", "success");
                    swal("¡Se eliminó correctamente!", {
                      icon: "success",
                    });
                    setTimeout("location.href='mat_apoyo'", 2000);
                  } else {
                    swal("¡Error al eliminar!", "Vuelve a intentarlo", "error");
                  }
                },
                error: function(xhr, ajaxOptions, thrownError) {
                  swal("¡Ocurrio un error al eliminar!", "Vuelve a intentarlo", "error");
                }
              });
            } else {
              swal("Su modulo no será borrado!");
            }
          });





        // confirmar = confirm("¿Desea Eliminar el modulo : " + title + "?");
        // if (!confirmar) {
        //   return false;
        // }

      });
    });
  </script>
</body>

</html>