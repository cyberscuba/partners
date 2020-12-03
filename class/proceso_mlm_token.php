<?php
      include("../class/files.php");
      require_once("../class/register.php");
      $Muestra = new Muestra();
      $Insert = new Insert();
      require_once($info1.".".$ext);

      if($_POST['email'] != ''){

      $email = $_POST['email'];
      $bill = $_POST['dir_bill'];
      function generarCodigo($longitud) {
      $key = '';
      $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
      $max = strlen($pattern)-1;
      for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
      return $key;
      }
  
      $gencod = generarCodigo(8); // genera un codigo de 6 caracteres de longitud.

      $anio = date("d");
      $mes = date("m");
      $seg = date("s");
      $cadena = $gencod.$mes.$seg.$anio;
      $keys = md5($cadena);

$fecha = date('Y-m-d');
$nuevafecha = strtotime ( '+1 day' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m-d' , $nuevafecha );
$vence =  $nuevafecha." 21:59:00";
       
      $i_usersDEL = $Insert->get_users12lppjaja($email, $keys, $vence);
      $i_users = $Insert->get_users12lpp($email , $keys, $vence);


 
 //envio de correos
 
 

   $losemails.=($_POST['email'].", "); 
  

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
$asunto='Código de activación Social Trading System'; 
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
							

							<table width= 100%  border= 0  align= center  bgcolor= #ffffff  style= color:#353e4a;font-family:Arial,sans-serif;font-size:15px;margin:auto >
								<tbody>
								<tr>
									<td style= padding-right:15px;padding-left:15px;padding-bottom:5px;padding-top:20px >
										<table width= 100%  border= 0  align= center  bgcolor= #ffffff  style= color:#353e4a;font-family:Arial,sans-serif;font-size:15px;margin:auto;border-top:1px solid #ddd >
											<tbody>
												
												<tr>
													<td style= width:100%;padding-top:5px;padding-bottom:15px >
														
														<table width= 400  border= 0  align= left  cellpadding= 0  cellspacing= 0 >
															<tbody>
																<tr>
																	<td style= color:#353e4a;font-size:15px;line-height:19px >
																		<a>Ingresa el código en el formulario de registro para completar tu ingreso a la plataforma Social Trading System .</a>
<h4>Código de activación:</h4>
'.$keys.'<br>
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
 <tbody>
<tr><td style= font-weight:bold;padding-top:8px;padding-left:17px;padding-right:17px;font-size:15px ><i>Cordialmente,</i></td></tr>
								<tr><td style= font-weight:bold;padding-top:8px;padding-left:17px;padding-right:17px;font-size:15px ><i>Social Trading System</i></td></tr>
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

<script>

                      setTimeout(function() {
                    $("#oculto1").fadeOut(1000);
                          },2000); 
 
</script>
<div id="oculto1" class="alert alert-success">
      <strong>¡Envio Exitoso!</strong> En un momento llegara el código de activación a tu correo.
       </div>

<?php

}else{
?>
<script>

                      setTimeout(function() {
                    $("#oculto1").fadeOut(1000);
                          },2000); 
 
</script>

<div  id="oculto1" class="alert alert-danger">
      <strong>¡Alerta!</strong> El email es obligatorio.
       </div>
<?php
}
?>