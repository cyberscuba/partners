<?php  $user = 4 ?><?php  

include("../class/files.php");
require_once("../config/bd_config.php");
require_once("../class/register.php");



            $Muestra = new Muestra();
	     	$usuariop = $user; 
	     	$isd = $usuariop;
			require_once($info1.".".$ext);
			$userss = $Muestra->get_users5($usuariop);
            $row = mysqli_fetch_array($userss);
            $lft = $row[lft];
            $rgt = $row[rgt]; 
            $name_user = $row[name_user]. " ".$row[ape_user]; 
            $rol =  $row[user_rol]; 
            $emails = $row[user_login];
            $clv = $row[user_psw];
            $ident = $row[identy_user];
            $photo = $row[user_photo];
            $usern = $row[username]; 

 
  $country = $Muestra->get_users8($ident);
  
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Registro de nuevos usuarios">
  <meta name="author" content="Creative Tim">
  <title>Registro de usuarios - Victorius Network</title>
  <!-- Favicon -->
  <link href="../assets/img/icons/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="../assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="../assets/css/argon.css?v=1.0.0" rel="stylesheet">
</head>

<body class="bg-default">
  <div class="main-content">
    <!-- Navbar -->
    <nav style="background:#333;" class="navbar navbar-top navbar-horizontal navbar-expand-md navbar-dark">
      <div class="container px-4">
        <a class="navbar-brand" href="">
          <img src="../assets/img/brand/logo.png" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbar-collapse-main">
          <!-- Collapse header -->
          <div class="navbar-collapse-header d-md-none">
            <div class="row">
              <div class="col-6 collapse-brand">
                <a href="">
                  <img src="../assets/img/brand/logo.png">
                </a>
              </div>
              <div class="col-6 collapse-close">
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar-collapse-main" aria-controls="sidenav-main" aria-expanded="false" aria-label="Toggle sidenav">
                  <span></span>
                  <span></span>
                </button>
              </div>
            </div>
          </div>
          <!-- Navbar items -->
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="">
                <i class="ni ni-single-02"></i>
                <span class="nav-link-inner--text">Invitador por: <b style="font-size:20px;"><?php echo $name_user ?></b></span>
              </a>
            </li>
            
            <li class="nav-item">
              <a class="nav-link nav-link-icon" href="../login">
                <i class="ni ni-key-25"></i>
                <span class="nav-link-inner--text">Posición Derecha</span>
              </a>
            </li>
            
          </ul>
        </div>
      </div>
    </nav>
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8">
      <div class="container">
        <div class="header-body text-center mb-7">
          <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6">
              <h1 class="text-white">Bienvenido!</h1>
              <p class="text-lead text-light">VICTORIUS NETWORK una compañía de Network
Marketing basada en los negocios
mas rentables de este siglo.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <!-- Table -->
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-8">
          <div class="card bg-secondary shadow border-0">
           
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small>Registra tú cuenta</small>
              </div>
              <form role="form" id="rgist">
              <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-badge"></i></span>
                    </div>
                    <input class="form-control" minlength="5" id="documento" name="documento" placeholder="No. de Documento" type="text" required="true">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div>
                    <input class="form-control" minlength="3" id="nombre" name="nombre" placeholder="Ingresa tú Nombre" type="text" required="true">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-atom"></i></span>
                    </div>
                    <input class="form-control" minlength="3" id="ape" name="ape" placeholder="Ingresa tú Apellido" type="text" required="true">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                    </div>
                    <input class="form-control" minlength="6" id="username" name="username" placeholder="Ingresa un Usuario" type="text" required="true">
                  </div>
                </div>
                <div class="form-group">
                 <input type="hidden" name="promotor" id="promotor" value="<?php echo $usern ?>">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control"  id="email" name="email" placeholder="Ingresa tú Email" type="email" required="true">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                  <input type="hidden" id="posicion" name="posicion" value="Derecha">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-bell-55"></i></span>
                    </div>
                    <input class="form-control" minlength="10" id="cel" name="cel" placeholder="Ingresa tú No. de Teléfono" type="tel" required="true">
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-world"></i></span>
                    </div>
                    <select class="form-control" id="pais" name="pais" required="true">
                    <option value="">Selecciona un país</option>
                    <?php while($list = mysqli_fetch_array($country)){ ?>
                    <option value="<?php echo $list[ID] ?>"><?php echo $list[	name_country] ?></option>
                    <?php } ?>
                    </select>
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-world-2"></i></span>
                    </div>
                    <input class="form-control" minlength="3" id="departamento" name="departamento" placeholder="Estado o Departamento" type="text" required="true">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-pin-3"></i></span>
                    </div>
                    <input class="form-control" minlength="3" id="ciudad" name="ciudad" placeholder="Ingresa Ciudad de residencia" type="text" required="true">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-building"></i></span>
                    </div>
                    <input class="form-control" minlength="5" id="dir" name="dir" placeholder="Ingresa tú Dirección" type="text" required="true">
                  </div>
                </div>
                
              
                   
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" minlength="8" placeholder="Ingresa tú contraseña" type="password" id="pass" name="pass" required="true">
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" minlength="8" id="cpass" name="cpass" placeholder="Confirmar Contraseña" type="password" required="true">
                  </div>
                </div>
               
                <div class="row my-4">
                  <div class="col-12">
                    <div class="custom-control custom-control-alternative custom-checkbox">
                      <input class="custom-control-input" id="customCheckRegister" name="customCheckRegister" type="checkbox" required="treu">
                      <label class="custom-control-label" for="customCheckRegister">
                        <span class="text-muted">Estoy de acuerdo con la <a href="#!">política de privacidad</a></span>
                      </label>
                    </div>
                  </div>
                </div>
              
                <div align="center">
                        <div  style="display:none;" id="loading_login"><img src="../assets/img/icons/loading.gif"/></div>
                        <div id="response_login"></div>

                    </div>
                
                <div class="text-center">
                  <button type="submit" class="btn btn-primary mt-4">Crear cuenta</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
 <footer class="py-5">
    <div class="container">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6">
          <div class="copyright text-center text-xl-left text-muted">
            &copy; <?php echo date("Y") ?> <a href="https://www.victoriusnetwork.com" class="font-weight-bold ml-1" target="_blank">VICTORIUS NETWORK</a>
          </div>
        </div>
        <div class="col-xl-6">
          <ul class="nav nav-footer justify-content-center justify-content-xl-end">
            <li class="nav-item">
              <a href="victoriusnetwork.com" class="nav-link" target="_blank">¿Por qué invertir?</a>
            </li>
            <li class="nav-item">
              <a href="victoriusnetwork.com" class="nav-link" target="_blank">Quienes Somos</a>
            </li>
            <li class="nav-item">
              <a href="http://blog.creative-tim.com" class="nav-link" target="_blank">Plan de Negocios</a>
            </li>
          
          </ul>
        </div>
      </div>
    </div>
  </footer>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Argon JS -->
  <script src="../assets/js/argon.js?v=1.0.0"></script>
 
</body>

</html>
