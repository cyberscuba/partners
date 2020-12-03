  <!-- Sidenav -->
  <nav class="navbar navbar-vertical fixed-left navbar-expand-md navbar-light bg-white" id="sidenav-main">
    <div class="container-fluid">
      <div class="Rcpctd">Desarrollo</div>
      <!-- Toggler -->
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Brand -->
      <a class="navbar-brand pt-0" href="./index">
        <img src="./assets/img/brand/footer_logo.png" class="navbar-brand-img" alt="...">
      </a>

      <!-- User -->
      <ul class="nav align-items-center d-md-none">
        <li class="nav-item dropdown">

        </li>

        </li>
      </ul>
      <!-- Collapse -->
      <div class="collapse navbar-collapse" id="sidenav-collapse-main">
        <!-- Collapse header -->
        <div class="navbar-collapse-header d-md-none">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="./index">
                <img src="./assets/img/brand/footer_logo.png">
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#sidenav-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <!-- Form -->
        <form class="mt-4 mb-3 d-md-none">
          <div class="input-group input-group-rounded input-group-merge">
            <div class="alert alert-<?php echo $clsd ?>" role="alert">
              Tú estado es <?php echo $estatus ?>
            </div>

          </div>
        </form>
        <!-- Navigation -->

        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="./index">
              <i class="ni ni-tv-2 text-primary"></i> Panel principal
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="./profile">
              <i class="ni ni-single-02 text-yellow"></i> Mi perfil
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="./myshop">
              <i class="ni ni-cart text-purple"></i> Mis Compras
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="./commissions">
              <i class="ni ni-bullet-list-67 text-red"></i> Comisiones
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="./network">
              <i class="ni ni-vector text-info"></i> Mi red
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./requests">
              <i class="ni ni-send text-pink"></i> Pagos
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./store">
              <i class="ni ni-cart text-purple"></i> Tienda
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="./mat_apoyo">
              <i class="ni ni-hat-3 text-green"></i> Material de apoyo
            </a>
          </li>

          <li class="nav-item">
            <a class="nav-link" target="blank" href="https://t.me/SocialTradingSystem">
              <i class="ni ni-headphones text-blue"></i> Soporte
            </a>
          </li>
          <?php if ($user != 1) { ?>
            <li class="nav-item">
              <a class="nav-link" href="./exit">
                <i class="ni ni-button-power text-red"></i> Cerrar Sesión
              </a>
            </li>
          <?php } ?>
        </ul>
        <!-- Divider -->
        <hr class="my-3">
        <!-- Heading -->
        <?php if ($usuariop == 1) { ?>
          <h6 class="navbar-heading text-muted">Administración</h6>
          <!-- Navigation -->
          <ul class="navbar-nav mb-md-3">
            <li class="nav-item">
              <a class="nav-link" href="dash_users">
                <i class="ni ni-circle-08"></i> Usuarios
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="dash_request">
                <i class="ni ni-send"></i> Pagos
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="dash_requestz">
                <i class="ni ni-curved-next"></i> Ajustes
              </a>
            </li>

            <!-- <li class="nav-item">
            <a class="nav-link" href="cspon">
              <i class="ni ni-vector"></i> Cambiar Patrocinador
            </a>
          </li> -->


            <!--<li class="nav-item">
            <a class="nav-link" href="dash_business">
              <i class="ni ni-chart-pie-35"></i> Mi negocio
            </a>
          </li>-->
            <li class="nav-item">
              <a class="nav-link" href="./exit">
                <i class="ni ni-button-power text-red"></i> Cerrar Sesión
              </a>
            </li>
          </ul>
        <?php } ?>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content">