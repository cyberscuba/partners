<?php

include 'include.php';

$inve_tpd = $_POST['inve_tpd'];
$pack = $_POST['inve_dgn'];
$inve_tgo = $_POST['inve_tgo'];
$pak = $_POST['pak'];

if($inve_tgo == 2){
    header("Location: ../../promotional");
}

if($inve_tpd == 1){
    $tip = 0;
}
if($inve_tpd == 2){
    $tip = 1;
}if($inve_tpd == 3){
    $tip = 2;
}



if($pack == 50){
    $peko = 1;
}

if($pack == 50){
    $peko = 1;
}

if($pack == 100){
    $peko = 2;
}

if($pack == 300){
    $peko = 3;
}

if($pack == 600){
    $peko = 4;
}

if($pack == 1000){
    $peko = 5;
}

if($pack == 3000){
    $peko = 6;
}

if($pack == 5000){
    $peko = 7;
}

if($pack == 10000){
    $peko = 8;
}

if($pack == 20000){
    $peko = 9;
}

if($inve_tpd == 2){
    
    if($pak == 50 AND $pack == 1){
        ?>
        <div style="margin-top:10%;" class="alert alert-danger">
  <strong>Alerta!</strong> Ya tienes una inversión de <?php echo $pak ?> USD <a href="../../index" class="alert-link">debes realizar una Renovación Más alta</a>.
</div>

<?php
die();
    }
        
    }
    
    
if($inve_tpd == 3){
 $pakiactual =  $pak;
 $inve_dgno = $peko;
 
  if($pakiactual <= 0){
      ?>
         <div style="margin-top:10%;" class="alert alert-danger">
  <strong>Alerta!</strong> El usuario no tiene una inversión inicial <a href="../../index" class="alert-link">debes realizar una inversión inicial</a>.
</div>
      <?php
      die();
  }
  
  if($pakiactual >= $inve_dgno){
      ?>
         <div style="margin-top:10%;" class="alert alert-danger">
  <strong>Alerta!</strong> Ya tienes una inversión  <a href="../../index" class="alert-link">debes realizar una Upgrade Más alto</a>.
</div>
      <?php
      die();
  }
 
 
 
//Paquete 1
if($inve_dgno == 2 AND $pakiactual == 1){
    $pack = 50;
}
if($inve_dgno == 3 AND $pakiactual == 1){
    $pack = 250;
}
if($inve_dgno == 4 AND $pakiactual == 1){
    $pack = 550;
}
if($inve_dgno == 5 AND $pakiactual == 1){
    $pack = 950;
}
if($inve_dgno == 6 AND $pakiactual == 1){
    $pack = 2950;
}
if($inve_dgno == 7 AND $pakiactual == 1){
    $pack = 4950;
}
if($inve_dgno == 8 AND $pakiactual == 1){
    $pack = 9950;
}
if($inve_dgno == 9 AND $pakiactual == 1){
    $pack = 19950;
}


//paquete 2


if($inve_dgno == 3 AND $pakiactual == 2){
    $pack = 200;
}
if($inve_dgno == 4 AND $pakiactual == 2){
    $pack = 500;
}
if($inve_dgno == 5 AND $pakiactual == 2){
    $pack = 900;
}
if($inve_dgno == 6 AND $pakiactual == 2){
    $pack = 2900;
}
if($inve_dgno == 7 AND $pakiactual == 2){
    $pack = 4900;
}
if($inve_dgno == 8 AND $pakiactual == 2){
    $pack = 9900;
}
if($inve_dgno == 9 AND $pakiactual == 2){
    $pack = 19900;
}




//paquete 3



if($inve_dgno == 4 AND $pakiactual == 3){
    $pack = 300;
}
if($inve_dgno == 5 AND $pakiactual == 3){
    $pack = 700;
}
if($inve_dgno == 6 AND $pakiactual == 3){
    $pack = 2700;
}
if($inve_dgno == 7 AND $pakiactual == 3){
    $pack = 4700;
}
if($inve_dgno == 8 AND $pakiactual == 3){
    $pack = 9700;
}
if($inve_dgno == 9 AND $pakiactual == 3){
    $pack = 19700;
}


//paquete 4


if($inve_dgno == 5 AND $pakiactual == 4){
    $pack = 400;
}
if($inve_dgno == 6 AND $pakiactual == 4){
    $pack = 2400;
}
if($inve_dgno == 7 AND $pakiactual == 4){
    $pack = 4400;
}
if($inve_dgno == 8 AND $pakiactual == 4){
    $pack = 9400;
}
if($inve_dgno == 9 AND $pakiactual == 4){
    $pack = 19400;
}


//paquete 5


if($inve_dgno == 6 AND $pakiactual == 5){
    $pack = 2000;
}
if($inve_dgno == 7 AND $pakiactual == 5){
    $pack = 4000;
}
if($inve_dgno == 8 AND $pakiactual == 5){
    $pack = 9000;
}
if($inve_dgno == 9 AND $pakiactual == 5){
    $pack = 19000;
}


//paquete 6


if($inve_dgno == 7 AND $pakiactual == 6){
    $pack = 2000;
}
if($inve_dgno == 8 AND $pakiactual == 6){
    $pack = 7000;
}
if($inve_dgno == 9 AND $pakiactual == 6){
    $pack = 17000;
}


//paquete 7


if($inve_dgno == 8 AND $pakiactual == 7){
    $pack = 5000;
}
if($inve_dgno == 9 AND $pakiactual == 7){
    $pack = 15000;
}



//paquete 8


if($inve_dgno == 9 AND $pakiactual == 8){
    $pack = 10000;
}

}    
    
$invo_icop = $_POST['invo_icop'];
$pak = $_POST['pak'];
$invoice_id = $invo_icop;
$product_url = 'nutbolt.jpg';
$price_in_usd = $pack;
$id_user = $_POST['usuaris']; 
$price_in_btc = file_get_contents($blockchain_root . "tobtc?currency=USD&value=" . $price_in_usd);




$db = new mysqli($mysql_host, $mysql_username, $mysql_password) or die(__LINE__ . ' Invalid connect: ' . mysqli_error());

$db->select_db($mysql_database) or die( "Unable to select database. Run setup first.");

//Add the invoice to the database
$stmt = $db->prepare("replace INTO invoices (invoice_id, price_in_usd, price_in_btc, product_url,tipe_transacc) values(?,?,?,?,?)");
$stmt->bind_param("iddsd",$invoice_id, $price_in_usd, $price_in_btc, $product_url, $tip);
$result = $stmt->execute();


$query = $db->prepare("UPDATE invoices SET id_user = ?,id_pack = ?  WHERE invoice_id = ?");
$query->bind_param("sdi", $id_user,$peko,$invoice_id);
$result1 = $query->execute();



if (!$result) {
    die(__LINE__ . ' Invalid query: ' . mysqli_error($db));
}

?>

<html>
<head>
    
   <link rel="icon" type="image/png" href="../../icons/favicon.png">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
    <script type="text/javascript" src="<?php echo $blockchain_root ?>Resources/js/pay-now-button-v2.js"></script>
    
    <script type="text/javascript">
	$(document).ready(function() {
		$('.stage-paid').on('show', function() {
			window.location.href = './order_status.php?invoice_id=<?php echo $invoice_id; ?>';
		});
	});
	</script>
	
	
	
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Realizar Inversión - Social Trading System</title>
		<link rel="icon" type="image/png" href="../.././assets/img/icons/favicon.png" />
		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="../.././assets/css/argon.css?v=1.0.0" />

	
		
		
</head>
   
<body class="no-skin">
    <div class="container">
	<div class="row">
	    <div class="col-md-12">
     <div align="left"><a href="../../index"><br><input type="button" class="btn btn-primary" value="Volver al panel"></a></div>
    	<div class="panel">
    	    
                    <div align="center"><img style="width:200px;" src="https://www.socialtradingsystem.com/partners/assets/img/brand/logo.png"> </div>
                    <hr>
                    
                    <?php if($pak >= 1 AND $inve_tpd == 1){ ?>
                    <div style="margin-top:10%;" class="alert alert-danger">
  <strong>Alert!</strong> Ya tienes tu inversión inicial <a href="../../index" class="alert-link">debes realizar una Renovación</a>.
</div>
                    
                    <?php die(); } ?>
                    
                    
                    <?php if($pak <= 0 AND $inve_tpd == 2){ ?>
                    <div style="margin-top:10%;" class="alert alert-danger">
  <strong>Alert!</strong> No tienes una inversión inicial aun <a href="../../index" class="alert-link">debes realizar una Inversión Inicial</a>.
</div>
                    
                    <?php die(); } ?>
                
       <h1 style="margin-top:2%;color:#6d6ae4;" align="center">SELECCIONASTE UNA INVERSIÓN DE  <?php echo number_format($pack) ?> USD</h1>
        <div class="blockchain-btn" style="margin-bottom:10%;" style="width:auto" data-create-url="create.php?invoice_id=<?php echo $invoice_id; ?>"> <hr>
            <div align="center"  class="blockchain stage-begin">
                <b>Clic en el Botón Aceptamos Bitcoin para realizar la compra<br></b><br><img style="width:200px;" src="./pay_now_64.png">
            </div>
            <div class="blockchain stage-loading" style="text-align:center">
                <img src="<?php echo $blockchain_root; ?>Resources/loading-large.gif">
            </div>
            <div class="blockchain stage-ready" style="text-align:center">

                <div class="alert alert-info">
  <strong>Alerta!</strong> El monto a depositar debe ser exacto para que su activación sea efectiva.  <h3>EL MONTO A PAGAR
: <?php echo $price_in_btc; ?> BTC</h3> <b>[[address]]</b>
</div> 
                <div class='qr-code'></div>
            </div>
            <div class="blockchain stage-paid">
               Pago realizado <b>[[value]] BTC</b>. Gracias por su pago.
            </div>
            <div class="blockchain stage-error">
                <font color="red">[[error]]</font>
            </div>
        </div>
        
      </div>
      </div>
      </div>
      
      <script>
           window.oncontextmenu = function () {
            return false;
        }
        $(document).keydown(function (event) {
            if (event.keyCode == 123) {
                return false;
            }
            else if ((event.ctrlKey && event.shiftKey && event.keyCode == 73) || (event.ctrlKey && event.shiftKey && event.keyCode == 74)) {
                return false;
            }
        });
      </script>
      
    </body>
</html>