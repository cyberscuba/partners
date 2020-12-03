	<?php
include("config/bd_config.php");
$conectar = new mysql;
$conectar->__construct();

$query = $conectar->_db->query("SELECT cedula,sum(total_comisiones) comisiones FROM comision WHERE  estado = '0'  GROUP BY cedula");

if($query->num_rows > 0){
    $delimiter = ",";
    $filename = "pagos_" . date('Y-m-d') . ".csv";
   
    //create a file pointer
    $f = fopen('php://memory', 'w');
    

    //output each row of the data, format line as csv and write to file pointer
    while($row = $query->fetch_assoc()){
      if($row['comisiones'] >= 10){  
	$usuariop = $row['cedula'];
	
	$userss1ae = $conectar->_db->query("SELECT bill FROM security_users WHERE ID = '$usuariop'");
        $custe = mysqli_fetch_array($userss1ae);
        $banco = $custe['bill'];
       
        include 'shop/php/include.php';
	$price_in_usd = $row['comisiones'];
	$price_in_btc = file_get_contents($blockchain_root . "tobtc?currency=USD&value=" . $price_in_usd);
	$coin = " ";
        $lineData = array($banco,$price_in_btc.'<br>');
        fputcsv($f, $lineData, $delimiter);
   	}
    } 

    
    
    //move back to beginning of file
    fseek($f, 0);
    
    //set headers to download file rather than displayed
    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="' . $filename . '";');
    
    //output all remaining data on a file pointer
    fpassthru($f);
}
exit;

?>
											
										
