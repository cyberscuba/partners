<?php

include 'include.php';

$invoice_id = intval($_GET['invoice_id']);
$product_url = '';
$price_in_usd = 0;
$price_in_btc = 0;
$amount_paid_btc = 0;
$amount_pending_btc = 0;

$db = new mysqli($mysql_host, $mysql_username, $mysql_password) or die(__LINE__ . ' Invalid connect: ' . mysqli_error());
$db->select_db($mysql_database) or die( "Unable to select database. Run setup first.");
$stmt = $db->prepare("select price_in_usd, product_url, price_in_btc, address,	id_user from invoices where invoice_id = ?");
$stmt->bind_param("i",$invoice_id);
$success = $stmt->execute();

if (!$success) {
    die(__LINE__ . ' Invalid query: ' . mysql_error());
}

$result = $stmt->get_result();
while($row = $result->fetch_array()) {
	$product_url = $row['product_url'];
	$price_in_usd = $row['price_in_usd'];
	$price_in_btc = $row['price_in_btc'];
	$value_in_btc = $row['price_in_btc'];
	$address = $row['address'];
	$usnup = $row['id_user'];
}
$transaction_hash = $address;
if($price_in_btc != ''){
$stmt = $db->prepare("replace INTO orders (invoice_id,transaction_hash, value) values(?, ?, ?)");
  $stmt->bind_param("isd", $invoice_id, $transaction_hash, $value_in_btc);
  $stmt->execute();
  
  
  $query = $db->prepare("UPDATE comision SET estado = '1' WHERE cedula = ? AND estado = '0'");
$query->bind_param("s", $usnup);
$result1 = $query->execute();
}

$result->close();
$stmt->close(); 



$stmt = $db->prepare("select value from pending_invoice_payments where invoice_id = ?");
$stmt->bind_param("i",$invoice_id);
$success = $stmt->execute();

if (!$success) {
    die(__LINE__ . ' Invalid query: ' . mysql_error());
}
$result = $stmt->get_result();
while($row = $result->fetch_array()){
	 $amount_pending_btc += $row['value'];   
}

$result->close();
$stmt->close(); 

//find the confirmed amount paid
$stmt = $db->prepare("select value from invoice_payments where invoice_id = ?");
$stmt->bind_param("i",$invoice_id);
$success = $stmt->execute();

if (!$success) {
    die(__LINE__ . ' Invalid query: ' . mysql_error());
}
$result = $stmt->get_result();
         
while($row = $result->fetch_array()){
	$amount_paid_btc += $row['value']; 
}
$result->close();
$stmt->close(); 
?>

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Realizar Inversión - Victorius Network</title>
		<link rel="icon" type="image/png" href="../.././assets/img/icons/favicon.png" />
		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="../.././assets/css/argon.css?v=1.0.0" />


<div class="container">
	<div class="row">
		
        <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
    			<div class="receipt-header">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="receipt-left">
							<img class="img-responsive" alt="Fourpools" src="https://www.victoriusnetwork.com/partners/assets/img/brand/logo.png" style="width: 71px;">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 text-right">
						<div class="receipt-right">
							<h5>Victorius Network</h5>
							<p>info@victoriusnetwork.com <i class="fa fa-envelope-o"></i></p>
							<p>https://www.victoriusnetwork.com <i class="fa fa-location-arrow"></i></p>
						</div>
					</div>
				</div>
            </div>
			
			<div class="row">
				<div class="receipt-header receipt-header-mid">
					<div class="col-xs-8 col-sm-8 col-md-8 text-left">
						<div class="receipt-right">
							<h5>Valor del Pago <small> <?php echo $price_in_btc ?> BTC</small></h5>
							<h5>Pago Confirmado <small> <?php echo $amount_paid_btc ?> BTC</small></h5>
						</div>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4">
						<div class="receipt-left">
						</div>
					</div>
				</div>
            </div>
			
            <div>
               
            </div>
			
			<div class="row">
				<div class="receipt-header receipt-header-mid receipt-footer">
					<div class="col-xs-8 col-sm-8 col-md-8 text-left">
						<div class="receipt-right">
							<p><b>Fecha :</b> <?php echo date("Y-m-d"); ?></p>
							<h5 style="color: rgb(140, 140, 140);">La confirmación del pago puede tardar hasta 1 hora!</h5>
						</div>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4">
						<div class="receipt-left">
							<h1>Muchas Gracias por su pago</h1>
						</div>
					</div>
				</div>
            </div>
			 <div align="center"></div><a href="http://www.victoriusnetwork.com/partners"><input type="button" class="btn btn-primary" value="FINALIZAR ACTIVACIÓN"></a></div>
        </div>   
        
      
	</div>
</div>



