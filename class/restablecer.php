  <?php
	require_once "../class/files.php";
	require_once "../class/security.php";
	require_once('../class/recaptchalib.php');

	#  foreach ($_POST as $key => $value) {
	#   echo '<p><strong>' . $key.':</strong> '.$value.'</p>';
	# }



	$Muestra = new Muestra();



	if ($_POST['email_reset'] != '') {
		$email = $_POST['email_reset'];

		$adee = $Muestra->contamos($email);

		if ($adee <= 0) {
	?>
  		<div style="margin-top:3%;" class="alert alert-danger contento">
  			<strong>Alerta!</strong> El email no se encuentra registrado en la base de datos.
  		</div>

  		<script type="text/javascript">
  			$(document).ready(function() {
  				setTimeout(function() {
  					$(".contento").fadeOut(1500);
  					clearResetPassword();

  				}, 3000);
  			});
  		</script>
  	<?php
			die();
		}


		function generarCodigo($longitud)
		{
			$key = '';
			$pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
			$max = strlen($pattern) - 1;
			for ($i = 0; $i < $longitud; $i++) $key .= $pattern{
				mt_rand(0, $max)};
			return $key;
		}

		$gencod = generarCodigo(8);

		$anio = date("d");
		$mes = date("m");
		$seg = date("s");
		$cadena = $gencod . $mes . $seg . $anio;
		$keys = md5($cadena);
		$COOKIE_K = $cookie;
		$pass1 = $COOKIE_K . $cadena;
		$passot = md5($pass1);


		$dfste = $Muestra->actua_cont($email, $keys);
		$username = $Muestra->get_username($email);


		?>


  	<div style="margin-top:3%;" class="alert alert-success contento">
  		<strong>Contraseña restaurada exitosamente!</strong> Le hemos enviado un correo electrónico con las instrucciones para restablecer su contraseña.
  	</div>

  	<script type="text/javascript">
  		$(document).ready(function() {
  			setTimeout(function() {
  				$(".contento").fadeOut(1500);
  				clearResetPassword();
  			}, 3000);
  		});
  	</script>


  <?php

		//Inicio Envio Correos


		$row_Tabla['email'] = $email;
		$losemails .= ($row_Tabla['email'] . ", ");


		$largo = strlen($losemails);
		if ($largo > 2) {
			//quitamos ultimos ", "
			$losemails = substr($losemails, 0, $largo - 2);
		}


		// se definen los argumentos de mail( ):
		$asunto = 'Restablecimiento de contraseña Social Trading System';
		$mensaje = '<html>
<head>
   <title>Titulo de la Pagina</title>
</head>
<body>
<table bgcolor= #ececec  align= center  style= width:100%!important;table-layout:fixed >
		<tbody><tr>
			<td width= 100% >
				<table cellspacing= 0  cellpadding= 0  border= 0  style= max-width:600px;margin:auto  align= center >
					<tbody><tr>
						<td align= center  style= padding-top:20px;padding-bottom:20px;text-align:center  width= 100% >
							<a href= https://www.socialtradingsystem.com>
								<b>
								</b>
								<img src= https://socialtradingsystem.com/partners/assets/img/brand/footer_logo.png  alt= Victorius  border= 0  style= width:200px;padding-bottom:8px;color:#0071bc;font-size:15px;letter-spacing:0px  class= CToWUd >
							</a>
						</td>
					</tr>

					<tr>
						<td>
							<table width= 100%  border= 0  align= center  bgcolor= #ffffff  style= color:#353e4a;font-family:Arial,sans-serif;margin:auto;background-color:#ffffff  cellpadding= 0  cellspacing= 0 >
								<tbody><tr>
									<td style= color:#1e82c4;font-size:29px;padding-top:25px;padding-right:15px;padding-bottom:20px;padding-left:15px >Restablecimiento de contraseña correcto</td>
								</tr>
								<tr>
									<td style= line-height:25px;padding-right:15px;padding-left:15px;font-size:16px > Inicie sesión con su contraseña temporal y <strong>actualice</strong> desde su oficina virtual con una contraseña personal. </b></td>
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
																	</td>
																</tr>
															</tbody>
														</table>
														<table width= 400  border= 0  align= left  cellpadding= 0  cellspacing= 0 >
															<tbody>
																<tr>
																	<td style= color:#353e4a;font-size:15px;line-height:19px >
																	<h4>Su correo electronico registrado:</h4>
																	' . $email . '<br>
																	<h4>Recuerde ingresar con su usuario :</h4>
																	' . $username . '<br>
																	<h4>Su contraseña temporal es:</h4>
																	' . $cadena . '<br>
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
									<td style= color:#717175;font-size:12px;padding-top:10px;padding-bottom:10px >Este correo electrónico ha sido generado automáticamente. Por favor, no respondas a este correo electrónico. Si tiene alguna pregunta o necesita ayuda, por favor haga clic en <a href= https://www.socialtradingsystem.com >Help</a>.</td>
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

		$envia = 'Social Trading System';
		$remite = 'info@socialtradingsystem.com';

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








	}  ?>