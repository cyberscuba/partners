<?php
require_once('../config/bd_config.php');

$conectar = new mysql;  
$conectar->__construct();



//recibe los parámetros POST
//recibe los parámetros POST
$creator1 = $_POST['promotor'];
$politica = $_POST['politica'];
$cedula_inscrito = $_POST['documento'];
$parentid = $_POST['promotor'];
$nombre = $_POST['nombre'];
$ape = $_POST['ape'];
$gene = $_POST['gene'];
$nace = $_POST['nace'];
$cel = $_POST['cel'];
$dir = $_POST['dir'];
$email = $_POST['email'];
$local = $_POST['local'];
$departamento = $_POST['departamento']; 
$ciudad = $_POST['ciudad'];
$bill = $_POST['UsBill'];
$pais1 = $_POST['pais'];
$pass1 = md5($_POST['pass']);
$fecha = date("Y-m-d");
$paquete = 0;
$names = $nombre." ".$ape;
$codes = $_POST['cverif'];
$ncomprato = $_POST['ncompa'];


$username = $_POST['username'];
$cha = $_POST['cha'];



$qerHk = $conectar->_db->query("SELECT ID
FROM security_users 
WHERE username ='$creator1'");
$CCIk = mysqli_fetch_array($qerHk);
$creative = $CCIk[0];

if($creative != ''){
$queryt1 = $conectar->_db->query("SELECT ID,username FROM security_users WHERE ID = '$creative'");
$row_cnt1 = $queryt1->num_rows;

 if($row_cnt1 <=  '0'){

?>
        <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Alerta!</h4>
                        El Posicionamiento es incorrecto, el usuario ingresado no es valido.
                  </div>
<?php
          die();
}
$cor =mysqli_fetch_array($queryt1);
$parentidspo = $cor[0];
$parentid = $cor[0];

}else{
 ?>
        <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Alerta!</h4>
                        El Posicionamiento es incorrecto, el usuario posicionamiento es obligatorio.
                  </div>
<?php
          die();   
    
}


 
  
  
 
$query = $conectar->_db->query("SELECT identy_user FROM security_users WHERE identy_user = '$cedula_inscrito'");
$row_cnt = $query->num_rows;


$query1 = $conectar->_db->query("SELECT user_login FROM security_users WHERE user_login = '$email'");
$row_cnt1 = $query1->num_rows;
//se registra el nivel inicial
    if($row_cnt1 > '0'){

?>
        <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Alerta!</h4>
                        El Email ya se encuentra registrado.
                  </div>
<?php
          die();
}



$query15 = $conectar->_db->query("SELECT user_login FROM security_users WHERE username = '$username'");
$row_cnt15 = $query15->num_rows;
//se registra el nivel inicial
    if($row_cnt15 > '0'){

?>
        <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Alerta!</h4>
                        El Usuario ya se encuentra registrado.
                  </div>
<?php
          die();
}





$rop = $conectar->_db->query("SELECT wp.ID,wp.post_date,pm.post_id,oi.order_item_name,pm.meta_value FROM `stss_postmeta` pm,stss_posts wp,stss_woocommerce_order_items oi WHERE pm.post_id = wp.ID AND pm.post_id = oi.order_id AND pm.meta_key = '_billing_email' AND pm.meta_value='$email' AND wp.post_status = 'wc-processing' AND paid = '0' GROUP BY wp.ID");
$contii = $rop->num_rows;
if($contii <= 0){
    ?>
    <div class="alert alert-danger alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Alerta!</h4>
                        No hay ningun No. de orden para este registro.
                  </div>
    
    <?
    
    die();
}
$ter = mysqli_fetch_array($rop);
    $customer = $ter['meta_value'];
    $datos = $ter['post_date'];
    $ids = $ter['ID'];
    $rt = explode(' ',$ter[order_item_name]);
    $namso = $rt[1];
    $pakis = 0;
    
    
    $ser = explode(' ',$datos);
    $fet = $ser[0]; 
    $fecha = $fet;
$nuevafecha = strtotime ( '+336 day' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m-d' , $nuevafecha );
    
    if($namso == 500){
        $pakis = 1;
    }
    if($namso == 1000){
        $pakis = 2;
    }
    if($namso == 3000){
        $pakis = 3;
    }


 $oipp = $conectar->_db->query("UPDATE stss_posts SET paid='1' WHERE ID = '$ids'");



$qerrr1 = $conectar->_db->query("SELECT count(t2.ID) cont
FROM security_users AS t1
LEFT JOIN security_users AS t2 ON t2.parent_id=t1.ID
WHERE t1.ID='$parentid'");
$asd = mysqli_fetch_array($qerrr1);
$level1 = $asd[cont]; 

$qerrr2 = $conectar->_db->query("SELECT count(t3.ID) cont
FROM security_users AS t1
LEFT JOIN security_users AS t2 ON t2.parent_id=t1.ID
LEFT JOIN security_users AS t3 ON t3.parent_id=t2.ID
WHERE t1.ID='$parentid'");
$asd1 = mysqli_fetch_array($qerrr2);
$level2 = $asd1[cont];






$ancho = 3*1;
$ancho1 = 3 * $ancho;



 $sql8 = $conectar->_db->query("INSERT INTO `security_users`(`identy_user`, `username`, `name_user`, `ape_user`,sex_user,dir_user,tel_user, pais_user,dpto_user	,ciu_user, `user_login`, `user_psw`, `parent_id`, `Id_Parent`, `creator`, `Nivel`, `activo_tree`, `coloca`,`user_register`, `user_rol`,bill,pack,`limit`,estado) VALUES ('$cedula_inscrito','$username','$nombre','$ape','$gene','$dir','$cel','$pais1','$departamento','$ciudad','$email','$pass1','$parentid','$parentid','$parentid','$nivelac','1','I',NOW(),'2','$bill','$pakis','$nuevafecha','1')");
 
 $telco = $conectar->_db->query("SELECT user_login FROM security_users WHERE ID = '$parentid'");
 $tor = mysqli_fetch_array($telco);
 $email_patro = $tor['user_login'];
 

//envio de correos

$Tabla = $conectar->_db->query("SELECT user_login  as email FROM  `security_users` WHERE user_login = '$email'");
//elaboramos cadena de emails 
  $losemails=""; 
  while ($row_Tabla=mysqli_fetch_assoc($Tabla)) { 
   $losemails.=($row_Tabla['email'].", "); 
   } 

  $largo=strlen($losemails); 
   if ($largo>2) 
{ 
   //quitamos ultimos ", " 
   $losemails=substr($losemails,0,$largo-2); 
} 
else 
{ 
   echo "No hay destinatarios!"; 
   die(); 
}; 

// se definen los argumentos de mail( ): 
$asunto='Bienvenid@ a Social Trading System'; 
$mensaje='<html> 
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
   <title>Titulo de la Pagina</title> 
</head> 
<body> 
<table bgcolor= #ececec  align= center  style= width:100%!important;table-layout:fixed >
		<tbody><tr>
			<td width= 100% >
				<table cellspacing= 0  cellpadding= 0  border= 0  style= max-width:600px;margin:auto  align= center >
					<tbody>
					
					<tr>
						<td>
							<table width= 100%  border= 0  align= center  bgcolor= #ffffff  style= color:#353e4a;font-family:Arial,sans-serif;margin:auto;background-color:#ffffff  cellpadding= 0  cellspacing= 0 >
								<tbody><tr>
									<td style= color:#1e82c4;font-size:29px;padding-top:25px;padding-right:15px;padding-bottom:20px;padding-left:15px >Bienvenid@ a Social Trading System</td>
								</tr>
								<tr>
									<td style= line-height:25px;padding-right:15px;padding-left:15px;font-size:16px > <b>'.$nombre.'  '.$ape.'</b></td>
								</tr>
								<tr>
									<td style= line-height:25px;padding-right:15px;padding-left:15px;font-size:15px;padding-top:20px ><h3><a>Tu cuenta ha sido creada con éxito!</a></h3></td>
								</tr>
							</tbody></table>


							<table width= 100%  border= 0  align= center  bgcolor= #ffffff  style= color:#353e4a;font-family:Arial,sans-serif;font-size:15px;margin:auto >
								<tbody>
								<tr>
									<td style= padding-right:15px;padding-left:15px;padding-bottom:5px;padding-top:20px >
										<table width= 100%  border= 0  align= center  bgcolor= #ffffff  style= color:#353e4a;font-family:Arial,sans-serif;font-size:15px;margin:auto;border-top:1px solid #ddd >
											<tbody>
												
												<tr>
													<td style= width:100%;padding-top:5px;padding-bottom:15px >
														<table width= 155  border= 0  align= left  cellpadding= 0  cellspacing= 0 >
															<tbody>
																<tr>
																	<td style= margin:0px  border= 0 >
																	<img src=https://socialtradingsystem.com/partners/assets/img/brand/footer_logo.png  width= 100%  border= 0  style= margin:0;max-width:140px  alt= 5 preguntas ponderadas  class= CToWUd ></td>
																</tr>
															</tbody>
														</table>
														<table width= 400  border= 0  align= left  cellpadding= 0  cellspacing= 0 >
															<tbody>
																<tr>
																	<td style= color:#353e4a;font-size:15px;line-height:19px >
																		<a>Puedes acceder a tu servicio dando click en el enlace Ir a la Oficina Virtual .</a>
<h4>Datos de Acceso</h4>
Usuario: '.$username.'<br>
Clave: '.$_POST[pass].'
</td>
																</tr>
																<tr>
																	<td style= padding-top:5px >
																		<a href= https://socialtradingsystem.com/partners >Ir a la Oficina Virtual</a>
																	</td>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
							</tbody></table>

							<table width= 100%  border= 0  align= center  bgcolor= #ffffff  style= color:#353e4a;font-family:Arial,sans-serif;margin:auto;background-color:#ffffff  cellpadding= 0  cellspacing= 0 >
 <tbody><tr><td style= line-height:25px;padding-top:15px;padding-left:17px;padding-right:17px;font-size:15px ></td>
				                </tr>
<tr><td style= font-weight:bold;padding-top:8px;padding-left:17px;padding-right:17px;font-size:15px ><i>Cordialmente,</i></td></tr>
								<tr><td style= font-weight:bold;padding-top:8px;padding-left:17px;padding-right:17px;font-size:15px ><i>El equipo de Social Trading System</i></td></tr>
								<tr><td style= height:15px  height= 15 > </td></tr>
							</tbody></table>

						</td>
					</tr>

					<tr>
						<td style= background-color:#ececec >
							<table width= 100%  border= 0  align= center  style= color:#353e4a;font-family:Arial,sans-serif;font-size:14px;margin:auto;padding-bottom:10px >
								<tbody><tr>
									<td style= color:#717175;font-size:12px;padding-top:10px;padding-bottom:10px >Este e-mail se ha generado automáticamente. Por favor, no conteste a este e-mail. Si tiene alguna pregunta o necesita ayuda, por favor haga click en <a href= https://socialtradingsystem.com/ >Ayuda</a>.</td>
								</tr>
							</tbody></table>
						</td>
					</tr>
				</tbody></table>
			</td>
		</tr>
	</tbody></table>
</body> 
</html>'; 

/* 
Aquí debe poner su email en formato HTML 
*/ 

$envia='Social Trading System'; 
$remite='info@socialtradingsystem.com'; 

/* 
Enviante: Nombre del enviante 
Email_remitente: email que desea mostrar como remitente. 
*/ 

/// Envío del email: 

mail(null, $asunto, $mensaje, "MIME-Version: 1.0 
Content-type: text/html; charset=utf-8 
From: $envia <$remite> 
Bcc: $losemails" . "\r\n") or die("Error al Enviar el Email");                    

   
//Fin de envio de correos




//envio de correos

$Tabla = $conectar->_db->query("SELECT user_login  as email FROM  `security_users` WHERE user_login = '$email_patro'");
//elaboramos cadena de emails 
  $losemails=""; 
  while ($row_Tabla=mysqli_fetch_assoc($Tabla)) { 
   $losemails.=($row_Tabla['email'].", "); 
   } 

  $largo=strlen($losemails); 
   if ($largo>2) 
{ 
   //quitamos ultimos ", " 
   $losemails=substr($losemails,0,$largo-2); 
} 
else 
{ 
   echo "No hay destinatarios!"; 
   die(); 
}; 

// se definen los argumentos de mail( ): 
$asunto='Felicitaciones tienes un nuevo referido en Social Trading System'; 
$mensaje='<html> 
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"> 
   <title>Titulo de la Pagina</title> 
</head> 
<body> 
<table bgcolor= #ececec  align= center  style= width:100%!important;table-layout:fixed >
		<tbody><tr>
			<td width= 100% >
				<table cellspacing= 0  cellpadding= 0  border= 0  style= max-width:600px;margin:auto  align= center >
					<tbody>
					
					<tr>
						<td>
						


						<table width= 100%  border= 0  align= center  bgcolor= #ffffff  style= color:#353e4a;font-family:Arial,sans-serif;font-size:15px;margin:auto;border-top:1px solid #ddd >
											<tbody>
												
												<tr>
													<td style= width:100%;padding-top:5px;padding-bottom:15px >
														<table width= 155  border= 0  align= left  cellpadding= 0  cellspacing= 0 >
															<tbody>
																<tr>
																	<td style= margin:0px  border= 0 >
																	<img src=https://socialtradingsystem.com/partners/assets/img/brand/footer_logo.png  width= 100%  border= 0  style= margin:0;max-width:140px  alt= 5 preguntas ponderadas  class= CToWUd ></td>
																</tr>
															</tbody>
														</table>
														<table width= 400  border= 0  align= left  cellpadding= 0  cellspacing= 0 >
															<tbody>
																<tr>
																	<td style= color:#353e4a;font-size:15px;line-height:19px >
																		<a>Felicitaciones tienes un nuevo referido .</a>
<h4>Tú nuevo usuario referido es:</h4>
Usuario: '.$username.'
</td>
																</tr>
																<tr>
																	<td style= padding-top:5px >
																		<a href= https://socialtradingsystem.com/partners >Ir a la Oficina Virtual</a>
																	</td>
																</tr>
															</tbody>
														</table>
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>
							</tbody></table>

							<table width= 100%  border= 0  align= center  bgcolor= #ffffff  style= color:#353e4a;font-family:Arial,sans-serif;margin:auto;background-color:#ffffff  cellpadding= 0  cellspacing= 0 >
 <tbody><tr><td style= line-height:25px;padding-top:15px;padding-left:17px;padding-right:17px;font-size:15px ></td>
				                </tr>
<tr><td style= font-weight:bold;padding-top:8px;padding-left:17px;padding-right:17px;font-size:15px ><i>Cordialmente,</i></td></tr>
								<tr><td style= font-weight:bold;padding-top:8px;padding-left:17px;padding-right:17px;font-size:15px ><i>El equipo de Social Trading System</i></td></tr>
								<tr><td style= height:15px  height= 15 > </td></tr>
							</tbody></table>

						</td>
					</tr>

					<tr>
						<td style= background-color:#ececec >
							<table width= 100%  border= 0  align= center  style= color:#353e4a;font-family:Arial,sans-serif;font-size:14px;margin:auto;padding-bottom:10px >
								<tbody><tr>
									<td style= color:#717175;font-size:12px;padding-top:10px;padding-bottom:10px >Este e-mail se ha generado automáticamente. Por favor, no conteste a este e-mail. Si tiene alguna pregunta o necesita ayuda, por favor haga click en <a href= https://socialtradingsystem.com/ >Ayuda</a>.</td>
								</tr>
							</tbody></table>
						</td>
					</tr>
				</tbody></table>
			</td>
		</tr>
	</tbody></table>
</body> 
</html>'; 

/* 
Aquí debe poner su email en formato HTML 
*/ 

$envia='Social Trading System'; 
$remite='info@socialtradingsystem.com'; 

/* 
Enviante: Nombre del enviante 
Email_remitente: email que desea mostrar como remitente. 
*/ 

/// Envío del email: 

mail(null, $asunto, $mensaje, "MIME-Version: 1.0 
Content-type: text/html; charset=utf-8 
From: $envia <$remite> 
Bcc: $losemails" . "\r\n") or die("Error al Enviar el Email");                    

   
//Fin de envio de correos
 

      
                 ?>

                 <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4>	<i class="icon fa fa-check"></i> Aprobado!</h4>
                    La afiliación se realizo con éxito.
                  </div>

                 
       <script>
setTimeout("location.href='https://socialtradingsystem.com/partners/'", 1000);
</script>

                     