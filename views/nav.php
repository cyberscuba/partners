<!-- Form -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<!-- <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
          <div class="form-group mb-0">


                 <div class="alert alert-<?php echo $clsd ?>" role="alert">
 Tú estado es <?php echo $estatus ?>
</div>

          </div>
        </form>-->
<!-- User -->
<ul class="navbar-nav align-items-center d-none d-md-flex">
  <!--<li class="nav-item dropdown">
          <a class="nav-link nav-link-icon" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="ni ni-bell-55"></i>
          </a>
          <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right" aria-labelledby="navbar-default_dropdown_1">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li> -->

  <li style="margin-right: 80px;" class="nav-item dropdown">
    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      <div class="media align-items-center">
        <div style="margin-right:30%;" class="media-body ml-2 d-none d-lg-block">
          <span style="text-transform: uppercase;font-size:10px;" class="mb-0 text-sm  font-weight-bold"><?php echo $user_nam ?><p style="margin-top:10px;" class="alert alert-<?php echo $clsd ?>"><?php echo $estatus ?></p></span>
        </div>

        <span class="avatar avatar-sm rounded-circle avatar-no-resize precarga">
          <img id="upPhotoUsNav" style="width: 95px; height:95px;" alt="<?php echo $user_nam ?>">

          <script language="javascript" type="text/javascript">
            var d = new Date();
            document.getElementById("upPhotoUsNav").src = "photos/<?php echo $user; ?>.jpg?ver=" + d.getTime();

            window.onload = function() {
              if ($("#upPhotoUsNav")[0].naturalHeight == 0) {
                $("#upPhotoUsNav")[0].src = "assets/img/icons/tuFotoAqui.png";
              } else {}
            }
          </script>
          </script>
        </span>

      </div>
    </a>
    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-right">
      <div class=" dropdown-header noti-title">
        <h6 class="text-overflow m-0">Bienvenido!</h6>
      </div>
      <a href="./profile" class="dropdown-item">
        <i class="ni ni-single-02"></i>
        <span>Mi perfil</span>
      </a>
      <!-- <a href="./account" class="dropdown-item">
                <i class="ni ni-settings-gear-65"></i>
                <span>Configurarción</span>
              </a>
              <a href="./activity" class="dropdown-item">
                <i class="ni ni-calendar-grid-58"></i>
                <span>Actividad</span>
              </a>
              <a href="./support" class="dropdown-item">
                <i class="ni ni-support-16"></i>
                <span>Soporte</span>
              </a>-->
      <div class="dropdown-divider"></div>
      <a href="./exit" class="dropdown-item">
        <i class="ni ni-user-run"></i>
        <span>Cerrar Sesión</span>
      </a>
    </div>
  </li>
</ul>