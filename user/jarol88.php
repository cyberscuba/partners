<?php  $user = 22 ?><?php  

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
            if($isd == 1){
                $usern = "";
            }

 
  $country = $Muestra->get_users8($ident);
  
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Registro de nuevos usuarios">
  <meta name="author" content="Creative Tim">
  <title>Registro de usuarios - Social Trading System</title>
  <!-- Favicon -->
  <link href="../assets/img/icons/favicon.png" rel="icon" type="image/png">
  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- Icons -->
  <link href="../assets/vendor/nucleo/css/nucleo.css" rel="stylesheet">
  <link href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link type="text/css" href="../assets/css/argon.css?v=1.0.0" rel="stylesheet">
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/css/intlTelInput.css">
  
   <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
                <script>
 $(function(){
    $("#rgist").submit(function(){

        $.ajax({
        
            type:"POST",
            url:"../class/proceso_mlm.php",
            dataType:"html",
            data:$(this).serialize(),
            beforeSend:function(){
              $("#loading_login").show();
         },
          success:function(response){
              $("#response_login").html(response);
              $("#loading_login").hide();



          }
        })
        return false;
    })
});


                $(document).ready(function()
{
$("#sub").click(function()

{


var dataString = "email="+$("#email").val();


$.ajax
({
type: "POST",
url: "../class/proceso_mlm_token.php",
data: dataString,
cache: false,
beforeSend:function(){
              $("#loading_login_a").show();
         },
success: function(html)
{

$("#response_login_a").html(html);
$("#loading_login_a").hide();

} 
});

});


});


function sn(e)
{
	var key = window.Event ? e.which : e.keyCode
	return ((key >= 48 && key <= 57) || (key==8))
}


function sl(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = "8-37-39-46";

    tecla_especial = false;
    for (var i in especiales) {
      if (key == especiales[i]) {
        tecla_especial = true;
        break;
      }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
      return false;
    }
  }
  
  function slp(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = "8-37-39-46";

    tecla_especial = false;
    for (var i in especiales) {
      if (key == especiales[i]) {
        tecla_especial = true;
        break;
      }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
      return false;
    }
  }
  
    function slu(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "áéíóúabcdefghijklmnñopqrstuvwxyz1234567890";
    especiales = "8-37-39-46";

    tecla_especial = false;
    for (var i in especiales) {
      if (key == especiales[i]) {
        tecla_especial = true;
        break;
      }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
      return false;
    }
  }
  
      function cor(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "._@-abcdefghijklmnñopqrstuvwxyz1234567890";
    especiales = "8-37-39-46";

    tecla_especial = false;
    for (var i in especiales) {
      if (key == especiales[i]) {
        tecla_especial = true;
        break;
      }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
      return false;
    }
  }
  
  function idet(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "abcdefghijklmnñopqrstuvwxyz1234567890";
    especiales = "8-37-39-46";

    tecla_especial = false;
    for (var i in especiales) {
      if (key == especiales[i]) {
        tecla_especial = true;
        break;
      }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
      return false;
    }
  }
  
  
    function telef(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "1234567890";
    especiales = "8-37-39-46";

    tecla_especial = false;
    for (var i in especiales) {
      if (key == especiales[i]) {
        tecla_especial = true;
        break;
      }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
      return false;
    }
  }
  
  
  function pass(e) {
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "abcdefghijklmnñopqrstuvwxyz1234567890#!.:*";
    especiales = "8-37-39-46";

    tecla_especial = false;
    for (var i in especiales) {
      if (key == especiales[i]) {
        tecla_especial = true;
        break;
      }
    }

    if (letras.indexOf(tecla) == -1 && !tecla_especial) {
      return false;
    }
  }
                </script>


</head>

<body class="bg-default" style="background: #f5f5f5 url(../assets/img/bg.png) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;">
  <div class="main-content">
  
    <!-- Header -->
    <div class="header  py-7 py-lg-8">
      <div class="container">
        
      </div>
      
    </div>
   
    <!-- Page content -->
    <div class="container mt--8 pb-5">
      <!-- Table -->
      <div  class="row justify-content-center">
        <div  class="col-lg-5 col-md-7">
          <div  class="card bg-secondary shadow border-0">
           
            <div class="card-body px-lg-5 py-lg-5">
           <div align="center"><img style="width:150px;" src="../assets/img/brand/logo.png" /><br>
             <span class="nav-link-inner--text">Invitador por:<br> <b style="font-size:20px;"><?php echo $name_user ?></b></span></div>
              <div class="text-center text-muted mb-4">
              </div>
              <form role="form" id="rgist" autocomplete="off">
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                    </div>
                    <input class="form-control" minlength="3" id="nombre" name="nombre" placeholder="Ingresa tú Nombre" type="text" onkeypress="return sl(event)" required="true">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-atom"></i></span>
                    </div>
                    <input class="form-control" minlength="3" id="ape" name="ape" placeholder="Ingresa tú Apellido" onkeypress="return slp(event)" type="text" required="true">
                  </div>
                </div>
                
                 <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-circle-08"></i></span>
                    </div>
                    
                    
                    <input class="form-control" minlength="3" maxlength="8" id="username" name="username" placeholder="Usuario" type="text" onkeypress="return idet(event)"  required="true">
                  </div>
                </div>
                
                <div class="form-group">
           
                  <div class="input-group input-group-alternative mb-3">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                    </div>
                    <input class="form-control"  id="email" name="email" placeholder="Ingresa tú Email" type="email" onkeypress="return cor(event)" required="true">
                    <!--<a style="color:#fff;" class="btn btn-info" id="sub" name="sub">Generar código</a>-->
                  </div>
                  
                </div>
                <div align="center">
                        <div  style="display:none;" id="loading_login_a"><img src="../assets/img/icons/loading.gif"/></div>
                        <div id="response_login_a"></div>

                    </div>
                    
                <div class="form-group">
                    <div class="input-group input-group-alternative">
                     <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-mobile-button"></i></span>
                    </div>
                    
                    <input  class="form-control" minlength="8"  type="tel"  name="cel" required="true" placeholder="Ingresa No. de Telefono">
  
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-badge"></i></span>
                    </div>
                    
                    
                    <input class="form-control" minlength="3" id="promotor" name="promotor" placeholder="Patrocinador" type="text" onkeypress="return idet(event)" value="<? echo $usern ?>" required="true">
                  </div>
                </div>
                
               
    
             
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control form-control-alternative" minlength="8" placeholder="Ingresa tú contraseña" type="password" id="pass" name="pass" placeholder="*****" required="true" >
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" minlength="8" id="cpass" name="cpass" placeholder="Confirmar Contraseña" type="password" placeholder="*****" required="true">
                  </div>
                </div>
                
                
                <div class="row my-4">
                  <div class="col-12">
                    <div class="custom-control custom-control-alternative custom-checkbox">
                      <input class="custom-control-input" id="customCheckRegister" name="customCheckRegister" type="checkbox" required="treu">
                      <label class="custom-control-label" for="customCheckRegister">
                        <span class="text-muted">Estoy de acuerdo con la <a download="politica_de_privacidad_Social_Trading_System" href="../assets/docs/politicas_socialtrading.pdf">política de privacidad</a></span>
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
  
                 
                
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.7/js/intlTelInput.js"></script>
<script id="rendered-js">
$("#telif").intlTelInput({
  utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/8.4.6/js/utils.js" });
//# sourceURL=pen.js
    </script>
  
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    
  <!-- Argon JS -->

  

  

 
</body>

</html>
