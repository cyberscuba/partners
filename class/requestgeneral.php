<?php
include("../class/files.php");
require_once("../config/bd_config.php");
require_once("../class/path.php");
require_once("../class/register.php"); 
$soursepeti= new Muestra();
 function sanit($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
function generarCodigo($longitud) {
    $key = '';
    $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
    $max = strlen($pattern)-1;
    for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
    return $key;
    }
  
if($_POST["request"]=="createcode"){
$searemail=$soursepeti->getimail($user)["data"][0];
;
$gencod = generarCodigo(8); 
$anio = date("d");
$mes = date("m");
$seg = date("s");
$code = $gencod.$user.$mes.$seg.$anio;
$nombre=$searemail["`ape_user`"]." ".$searemail["name_user"];
    $subject = "Petición de código de retiro de fondo";
    $message = "
    <html> 
<head> 
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
									<td style= color:#1e82c4;font-size:29px;padding-top:25px;padding-right:15px;padding-bottom:20px;padding-left:15px ></td>
								</tr>
								<tr>
									<td style= line-height:25px;padding-right:15px;padding-left:15px;font-size:20px color:bluee > <b>$nombre</b></td>
								</tr>
								<tr>
									<td style= line-height:25px;padding-right:15px;padding-left:15px;font-size:15px;padding-top:20px ><h3><a href='https://www.victoriusnetwork.com'> Gracias Por invertir de forma inteligente con   Victorius Network </a></h3></td>
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
														
														</table>
														<table width= 400  border= 0  align= left  cellpadding= 0  cellspacing= 0 >
															<tbody>
																<tr>
																	<td style= color:#353e4a;font-size:15px;line-height:19px >
																		<a>Su código de retiro de ganancias es  Codigo: \n $code</a>
																</tr>
																<tr>
																	
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
				                </tr>
<tr><td style= font-weight:bold;padding-top:8px;padding-left:17px;padding-right:17px;font-size:15px ><i>Cordialmente,</i></td></tr>
								<tr><td style= font-weight:bold;padding-top:8px;padding-left:17px;padding-right:17px;font-size:15px ><i>El equipo de victorius Network.</i></td></tr>
								<tr><td style= height:15px  height= 15 > </td></tr>
							</tbody></table>

						</td>
					</tr>

					<tr>
						<td style= background-color:#ececec >
							<table width= 100%  border= 0  align= center  style= color:#353e4a;font-family:Arial,sans-serif;font-size:14px;margin:auto;padding-bottom:10px >
								<tbody><tr>
									<td style= color:#717175;font-size:12px;padding-top:10px;padding-bottom:10px >Este e-mail se ha generado autom├íticamente. Por favor, no conteste a este e-mail. Si tiene alguna pregunta o necesita ayuda, por favor haga click en <a href=https://www.victoriusnetwork.com/ >Ayuda</a>.</td>
								</tr>
							</tbody></table>
						</td>
					</tr>
				</tbody></table>
			</td>
		</tr>
	</tbody></table>
</body> 
</html>
    ";
    $retorno=[];
    $saveconfir=$soursepeti->createCodePeticion($user,$code) ;
    if($saveconfir["error"]["code"]=="0"){
           mail($searemail["user_login"],$subject, $message , "MIME-Version: 1.0 
Content-type: text/html; charset=utf-8 
From:   admin@victoriusnetwork.com.
Bcc: $losemails" . "\r\n") or $retorno["error"]=["code"=>"1","mej"=>"Fallo al enviar la notificación,  inténtelo nuevamente mas tarde"]; 
$retorno["error"]=["code"=>"0","mej"=>"Su código fue enviado a su correo"];
}else{
        $retorno["error"]=["code"=>"2","mej"=>"Fallo en el procesamiento interno del código, inténtelo nuevamente mas tarde"];
    };
  echo json_encode($retorno);
} 

if($_POST["request"]=="createSol"){
   $code=sanit($_POST["codeaut"]);
   $bill=sanit($_POST["billi"]);;
   $monto=sanit($_POST["monto"]);
   $codeaalma=$soursepeti->getCodeAlma($user)["data"]["0"]["token"];
   $minmonto=$soursepeti->getMinMont()["data"]["0"]["minretiro"];
   $maxmon=$soursepeti->getMaxMont()["data"]["0"]["maxretiro"];
   $petipen=$soursepeti->getPetiPend($user)["data"]["0"]["cuenta"];
   $saldocomision=$soursepeti->saldocomision($user);
   $val1=1;
   $val2=1;
   $val3=1;
   $val4=1;
   $val5=1;
  if($codeaalma!=$code){
      $val1=0;
     echo json_encode(["error"=>["code"=>"1","mej"=>"El código de solicitud no corresponde"]]);
   die();
  }
  if($petipen>0){
	$val1=0;
   echo json_encode(["error"=>["code"=>"1","mej"=>"Su usuario  ya tiene una petición pendiente"]]);
 die();
}
  if($monto>$maxmon){
	$val4=0;
   echo json_encode(["error"=>["code"=>"1","mej"=>"El monto solicitado es mayor al monto permitidó"]]);
 die();
}
  if($monto<$minmonto){
    $val2=0;
    echo json_encode(["error"=>["code"=>"1","mej"=>"El monto solicitado es menor al monto permitidó"]]);
    die();
  }
  if($monto>$saldocomision){
    $val3=0;
    echo json_encode(["error"=>["code"=>"1","mej"=>"Fondos insuficiente para esta solicitud "]]);
    die();
  }

  if($val1==1&&$val2==1&&$val3==1&&$val4==1&&$val5==1){
      $fet=date("Y-m-d");
      $addsol=$soursepeti->AaddSolBill($user,$bill, $monto,"0", $fet,"0","0");
      $soursepeti->createCodePeticion($user,"") ;
      echo json_encode($addsol);
  }else{
    echo json_encode($retorno["error"]=["code"=>"1","mej"=>"No se pudo procesar la petición, por favor intentelo nuevamente mas tarde"]);
  }
}

if($_POST["request"]=="returnBill"){
    $retorno =$searemail=$soursepeti->getiBillUser($user);
    echo json_encode($retorno);
} 
//
?>