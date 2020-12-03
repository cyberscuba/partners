<?php
ini_set("error_reporting", (E_ERROR | E_WARNING | E_PARSE | E_COMPILE_ERROR | E_NOTICE | E_COMPILE_WARNING | E_RECOVERABLE_ERROR | E_CORE_ERROR | E_ALL));
ini_set('display_errors', '1');

define('EMPRESA_EMAIL_REMITENTE', 'fourpools');
define('EMPRESA_EMAIL_CORREO', 'hashminingclub@gmail.com');
define('EMPRESA_EMAIL_PASSWORD', 'hashminingclu2017@@45');
define('COPIA_EMAIL', 'jonathan.cruz89@gmail.com');

if (isset($_POST) && count($_POST) > 0 && isset($_POST['callback'])) {
    include_once '../class/class.principal.php';
    $function = $_POST['callback'];
    unset($_POST['callback']);

    $function($_POST);
} else {
    include_once('../../includes/phpmailer5.2/class.mailer.php');
}

function generarCodigo($longitud)
{
    $key = '';
    $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
    $max = strlen($pattern) - 1;
    for ($i = 0; $i < $longitud; $i++)
        $key .= $pattern{
        mt_rand(0, $max)};
    return $key;
}

function getToken($frm)
{
    $persona = new security_users($frm['id']);
    $gencod = generarCodigo(8); // genera un codigo de 6 caracteres de longitud.

    $anio = date("d");
    $mes = date("m");
    $seg = date("s");
    $cadena = $gencod . $mes . $seg . $anio;
    $keys = md5($cadena);

    $fec_actual = date('Y-m-d H:i:s');
    $nuevafecha = strtotime('+1 hour', strtotime($fec_actual));
    $nuevafecha = date('Y-m-d H:i:s', $nuevafecha);

    $datos = array();
    $datos['ID'] = $persona->codigo;
    $datos['token'] = $keys;
    $datos['fec_expira_token'] = $nuevafecha;
    $persona->modificar($datos);

    $uniqueid = uniqid('np');

    //indicamos las cabeceras del correo
    $headers = "MIME-Version: 1.0\r\n";
    $headers .= "From: Fourpools \r\n";
    $headers .= "Subject: Token Wallet\r\n";
    //lo importante es indicarle que el Content-Type
    //es multipart/alternative para indicarle que existirá
    //un contenido alternativo
    $headers .= "Content-Type: multipart/alternative;boundary=" . $uniqueid . "\r\n";

    $message = "";

    $message .= "\r\n\r\n--" . $uniqueid . "\r\n";
    $message .= "Content-type: text/html;charset=utf-8\r\n\r\n";
    $message .= '

       
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>My form - Formoid form html</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
    </head>
    <body class="blurBg-false" style="background-color:#EBEBEB">

        <form class="formoid-default-skyblue" style="background-color:#FFFFFF;font-size:14px;font-family:\'Open Sans\',\'Helvetica Neue\',\'Helvetica\',Arial,Verdana,sans-serif;color:#666666;max-width:480px;min-width:150px" method="post">
            <div class="title">
                <h2>
                    Token
                </h2>
                <p>
                    A new token has been generated, remember that it has a validity of 1 hour.
                </p>
            </div>
            <div class="element-textarea">
                <label class="title">
                    Token: <span style="font-weight:  700; color: blue;">' . $keys . '</span>
                </label>
            </div>
            <div class="element-textarea">
                <label class="title">
                    Date Expired: <span style="font-weight: 700; color: blue;">' . $nuevafecha . '</span>
                </label>
            </div>
            <div class="title">
                <p>
                    Cordially team fourpools
                </p>
            </div>
        </form>
    </body>
</html>



';

    $message .= "\r\n\r\n--" . $uniqueid . "--";

    mail($persona->user_login, 'Message Submitted', $message, $headers);
    mail('jonathan.cruz89@gmail.com', 'Message Submitted', $message, $headers);
    mail('gerenciaworktic@gmail.com', 'Message Submitted', $message, $headers);
    //    mail($persona->user_login, 'Message Submitted', $message, $headers);


}

function updateWallet($frm)
{
    $persona = new security_users($frm['id']);
    $modifico = 0;
    $fecha_actual = date('Y-m-d H:i:s');

    if ($persona->token != $frm['tokenWall']) {
        ?>
        <script>
            toastr.error('The token is incorrect.');
        </script>
    <?php
            die();
        }

        if ($fecha_actual > $persona->fec_expira_token) {
            ?>
        <script>
            toastr.error('The token is expired. Try again new token.');
        </script>
    <?php
            die();
        }

        $datos = array();
        $datos['ID'] = $frm['id'];
        $datos['bill'] = $frm['addWall'];
        $datos['name_wll'] = $frm['nameWall'];

        $modifico = $persona->modificar($datos);

        if ($modifico) {
            ?>
        <script>
            toastr.success('Update success');
            $("#nameWall").val('<?= $frm['nameWall'] ?>');
            $("#addWall").val('<?= $frm['addWall'] ?>');
            $("#tokenWall").val('');
        </script>
    <?php
        }
    }

    function setProducto($frm)
    {
        $r = new xajaxResponse();
        $bd = new conector_bd();
        $obj_producto = new producto();
        $creo = 0;
        $html = '';

        if (!isset($frm['optCategoria']) || $frm['optCategoria'] == 0) {
            $r->addScript('toastr.warning("Por favor seleccione la categoria");');
            return $r;
        }

        if (!isset($frm['name']) || $frm['name'] == '') {
            $r->addScript("toastr.warning('Por favor ingrese un nombre para el producto');");
            return $r;
        }

        if (!isset($frm['fileNewProduct']) || $frm['fileNewProduct'] == '') {
            $r->addScript("toastr.warning('Por favor seleccione un producto');");
            return $r;
        }

        if (!isset($frm['fileProduct']) || $frm['fileProduct'] == '') {
            $r->addScript("toastr.warning('Parece que hubo un error al cargar el producto intentelo nuevamente');");
            return $r;
        }

        $nombre_producto = uploadFile($frm['fileNewProduct'], DIR . 'products_promotion/', $frm['fileProduct']);

        $datos['id_categoria'] = $frm['optCategoria'];
        $datos['nombre'] = $frm['name'];
        $datos['url'] = 'products_promotion/' . $nombre_producto;

        $creo = $obj_producto->crear($datos);

        if ($creo) {
            $r->addScript("toastr.success('Se creó correctamente');");

            $categorias = $bd->consultar_todo('categoria');
            $n_categorias = $categorias['n'];
            $categorias = $categorias['elementos'];

            if ($n_categorias > 0) {
                $html .= '  
                <div align="center">
                    <button class="btn btn-default filter-button" data-filter="all">All</button>
                    ';

                foreach ($categorias as $value) {
                    $html .= '<button class="btn btn-default filter-button" data-filter="' . $value->codigo . '">' . $value->nombre . '</button>';
                }


                $html .= '</div><br/>
                ';
            }

            $productos = $bd->consultar_todo('producto');
            $n_productos = $productos['n'];
            $productos = $productos['elementos'];

            if ($n_productos > 0) {
                foreach ($productos as $value) {
                    $html .= '
                    <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter ' . $value->id_categoria . ' image-upload">
                        ';
                    $extension = explode('.', $value->url);
                    $extension = array_pop($extension);
                    if ($extension == 'pdf') {
                        $html .= '<div class="row">
                            <div style="text-align: center; height: 300px;" class="col-md-12 margin-top">';
                        $html .= '<img style="width: 250px; " src="http://cgthonduras.org/wp-content/uploads/2016/05/pdf-logo1.png" rel="' . $value->nombre . '">';
                        $html .= '</div>
                        </div>
                        <div class="row" style="margin-top: 10px;">
                            <div style="text-align: center" class="col-md-12 margin-top">';
                        $html .= '<a style="margin-right: 10px;" class="btn btn-flat btn-primary margin-bottom" href="' . $value->url . '" target="_blank">View</a>';
                        $html .= '<a style="margin-left: 10px;" class="btn btn-flat btn-primary margin-bottom" download="' . $value->nombre . '" href="' . $value->url . '" target="_blank">Download</a>';
                        $html .= '</div>';
                        $html .= '</div>';
                    } else {
                        $html .= '<div class="row">
                            <div style="text-align: center; height: 300px;" class="col-md-12 margin-top">';
                        $html .= '<img src="' . $value->url . '" class="img-responsive" rel="' . $value->nombre . '">';
                        $html .= '</div>
                        </div>
                        <div class="row" style="margin-top: 10px;">
                            <div style="text-align: center" class="col-md-12 margin-top">';
                        $html .= '<a class="btn btn-flat btn-primary margin-bottom" download="' . $value->nombre . '" href="' . $value->url . '" target="_blank">Download</a>';
                        $html .= '</div>';
                        $html .= '</div>';
                    }

                    $html .= '<button  onclick="if(confirm(\'Está seguro de eliminar el producto ' . $value->nombre . '\')){xajax_deleteProducto(' . $value->codigo . ');}" class="btn btn-danger glyphicon glyphicon-remove" type="button" ></button>
                    </div>
                ';
                }
            }

            $r->addAssign('galery', 'innerHTML', $html);
            $script = '
            $(".filter-button").click(function () {
                var value = $(this).attr(\'data-filter\');

                if (value == "all") {
                    $(\'.filter\').show(\'1000\');
                } else {
                    $(".filter").not(\'.\' + value).hide(\'3000\');
                    $(\'.filter\').filter(\'.\' + value).show(\'3000\');
                }
            });

            if ($(".filter-button").removeClass("active")) {
                $(this).removeClass("active");
            }
            $(this).addClass("active");
            ';
            $r->addScript($script);
        } else {
            $r->addScript("toastr.error('hubo un error en la creación');");
        }

        return $r;
    }

    function deleteProducto($id_producto)
    {
        $r = new xajaxResponse();
        $bd = new conector_bd();
        $obj_producto = new producto($id_producto);
        $eliminar = 0;

        $eliminar = $obj_producto->eliminar($id_producto);
        unlink(DIR . $obj_producto->url);

        if ($eliminar) {
            $r->addScript("toastr.success('Se ha eliminado correctamente el producto');");

            $html = '';

            $categorias = $bd->consultar_todo('categoria');
            $n_categorias = $categorias['n'];
            $categorias = $categorias['elementos'];

            if ($n_categorias > 0) {
                $html .= '  
                <div align="center">
                    <button class="btn btn-default filter-button" data-filter="all">All</button>
                    ';

                foreach ($categorias as $value) {
                    $html .= '<button class="btn btn-default filter-button" data-filter="' . $value->codigo . '">' . $value->nombre . '</button>';
                }


                $html .= '</div><br/>
                ';
            }


            $productos = $bd->consultar_todo('producto');
            $n_productos = $productos['n'];
            $productos = $productos['elementos'];

            if ($n_productos > 0) {
                foreach ($productos as $value) {
                    $html .= '
                    <div class="gallery_product col-lg-4 col-md-4 col-sm-4 col-xs-6 filter ' . $value->id_categoria . ' image-upload">
                        ';
                    $extension = explode('.', $value->url);
                    $extension = array_pop($extension);
                    if ($extension == 'pdf') {
                        $html .= '<div class="row">
                            <div style="text-align: center; height: 300px;" class="col-md-12 margin-top">';
                        $html .= '<img style="width: 250px; " src="http://cgthonduras.org/wp-content/uploads/2016/05/pdf-logo1.png" rel="' . $value->nombre . '">';
                        $html .= '</div>
                        </div>
                        <div class="row" style="margin-top: 10px;">
                            <div style="text-align: center" class="col-md-12 margin-top">';
                        $html .= '<a style="margin-right: 10px;" class="btn btn-flat btn-primary margin-bottom" href="' . $value->url . '" target="_blank">View</a>';
                        $html .= '<a style="margin-left: 10px;" class="btn btn-flat btn-primary margin-bottom" download="' . $value->nombre . '" href="' . $value->url . '" target="_blank">Download</a>';
                        $html .= '</div>';
                        $html .= '</div>';
                    } else {
                        $html .= '<div class="row">
                            <div style="text-align: center; height: 300px;" class="col-md-12 margin-top">';
                        $html .= '<img src="' . $value->url . '" class="img-responsive" rel="' . $value->nombre . '">';
                        $html .= '</div>
                        </div>
                        <div class="row" style="margin-top: 10px;">
                            <div style="text-align: center" class="col-md-12 margin-top">';
                        $html .= '<a class="btn btn-flat btn-primary margin-bottom" download="' . $value->nombre . '" href="' . $value->url . '" target="_blank">Download</a>';
                        $html .= '</div>';
                        $html .= '</div>';
                    }

                    $html .= '<button  onclick="if(confirm(\'Está seguro de eliminar el producto ' . $value->nombre . '\')){xajax_deleteProducto(' . $value->codigo . ');}" class="btn btn-danger glyphicon glyphicon-remove" type="button" ></button>
                    </div>
                ';
                }
            }

            $r->addAssign('galery', 'innerHTML', $html);
            $script = '
            $(".filter-button").click(function () {
                var value = $(this).attr(\'data-filter\');

                if (value == "all") {
                    $(\'.filter\').show(\'1000\');
                } else {
                    $(".filter").not(\'.\' + value).hide(\'3000\');
                    $(\'.filter\').filter(\'.\' + value).show(\'3000\');
                }
            });

            if ($(".filter-button").removeClass("active")) {
                $(this).removeClass("active");
            }
            $(this).addClass("active");
            ';
            $r->addScript($script);
        } else {
            $r->addScript("toastr.error('Se ha presentado in inconveniente');");
        }

        return $r;
    }

    function getProducto($id_categoria)
    {
        $r = new xajaxResponse();
        $bd = new conector_bd();

        $arrPar = array();

        $arrPar['orderBy'] = 'nombre';
        if ($id_categoria != 0) {
            $arrPar['filtro'] = "id_categoria = $id_categoria";
        }

        $elementos = $bd->consultar_todo($nomClase, $arrPar);
    }

    function uploadFile($nombre, $path, $file)
    {
        $extension = explode('.', $nombre);
        $extension = array_pop($extension);

        $nom_file = date('YmdHisu') . '.' . $extension;
        $base_to_php = explode(',', $file);
        $data = base64_decode($base_to_php[1]);
        file_put_contents($path . $nom_file, $data);

        return $nom_file;
    }

    function enviarEmail($frm)
    {
        $r = new xajaxResponse();

        if (!isset($frm['name']) || $frm['name'] == '') {
            $r->addScript("toastr.warning('Debe ingresar su nombre');");
            return $r;
        }

        if (!isset($frm['email']) || $frm['email'] == '') {
            $r->addScript("toastr.warning('Debe ingresar su email');");
            return $r;
        }

        if (!isset($frm['message']) || $frm['message'] == '') {
            $r->addScript("toastr.warning('Debe ingresar mensaje');");
            return $r;
        }

        if (!validar_email($frm['email'])) {
            $r->addScript("toastr.warning('Ingrese un email valido');");
            return $r;
        }

        $datos_email = array();
        $datos_email['email_remitente'] = EMPRESA_EMAIL_CORREO;
        $datos_email['nombre_remitente'] = EMPRESA_EMAIL_REMITENTE;
        $datos_email['passwd_remitente'] = EMPRESA_EMAIL_PASSWORD;

        $destinatarios = array();
        $destinatarios[] = array('oculto' => false, 'email_destinatario' => $frm['email'], 'nombre_destinatario' => $frm['name']);

        $datos_email['destinatarios'] = $destinatarios;
        $datos_email['mensaje_alternativo'] = 'Message Submitted';
        $datos_email['asunto'] = 'Message Submitted';

        //creamos un identificador único
        //para indicar que las partes son idénticas
        $uniqueid = uniqid('np');

        //indicamos las cabeceras del correo
        $headers = "MIME-Version: 1.0\r\n";
        $headers .= "From: Foo \r\n";
        $headers .= "Subject: Test mail\r\n";
        //lo importante es indicarle que el Content-Type
        //es multipart/alternative para indicarle que existirá
        //un contenido alternativo
        $headers .= "Content-Type: multipart/alternative;boundary=" . $uniqueid . "\r\n";

        $message = "";

        $message .= "\r\n\r\n--" . $uniqueid . "\r\n";
        $message .= "Content-type: text/html;charset=utf-8\r\n\r\n";
        $message .= '

       
<html >
    <head>
        <title>plantillasoporte.png</title>

    </head>
    <body bgcolor="#ffffff">
        <table style="display: inline-table;" border="0" cellpadding="0" cellspacing="0" width="593">

  <tr style="background-color: #ececfb">
   <td colspan="3"></td>
 
  </tr>
  <tr style="background-color: #ececfb">
   <td style="width: 130px">Name:</td>
   <td >' . $frm['name'] . '</td>
   <td ></td>
 
  </tr>
  <tr style="background-color: #ececfb">
   <td>Email:</td>
   <td>' . $frm['email'] . '</td>
   <td></td>
 
  </tr>
  <tr style="background-color: #ececfb">
   <td>Message</td>
   <td style="padding-top: 10px; vertical-align: top"> ' . $frm['message'] . '</td>
   <td></td>
 
  </tr>
  <tr>
   <td colspan="3"></td>
 
  </tr>
</table>


    </body>

</html>

';

        $message .= "\r\n\r\n--" . $uniqueid . "--";

        //con la función mail de PHP enviamos el mail.
        mail($frm['email'], 'Message Submitted', $message, $headers);
        mail($frm['email'], 'Message Submitted', $message, $headers);
        mail(COPIA_EMAIL, 'Message Submitted', $message, $headers);
        mail('jonathan.cruz89@gmail.com', 'Message Submitted', $message, $headers);

        //    $datos_email['adjunto']=$arr_adjunto;
        $datos_email['mensaje_html'] = $message;

        /*
      Aquí debe poner su email en formato HTML
     */


        /*
      Enviante: Nombre del enviante
      Email_remitente: email que desea mostrar como remitente.
     */

        /// Envío del email:
        //    mail($frm['email'], 'Message Submitted', $message, "MIME-Version: 1.0
        //        Content-type: text/html; charset=utf-8") or die("Error al Enviar el Email");
        //    mail(COPIA_EMAIL, 'Message Submitted', $message, "MIME-Version: 1.0
        //        Content-type: text/html; charset=utf-8") or die("Error al Enviar el Email");
        //    $envia = EMPRESA_EMAIL_REMITENTE;
        //    $remite = EMPRESA_EMAIL_CORREO;
        //
        //    $mensaje = 'Usted a realizado un pedido';
        //    $contenido = 'Este es el contenido';
        //
        //    $headers = "MIME-Version: 1.0
        //        Content-type: text/html; charset=utf-8
        //        From: $envia <$remite>
        //        Bcc: jonathan.cruz89@gmail.com" . "\r\n";
        //    $objMailer = new Mailer();
        //    $envio = $objMailer->sendEmail($datos_email);

        $r->addScript("toastr.success('Se ha registrado correctamente')");
        $r->addScript("document.getElementById('contactForm').reset();");

        return $r;
    }

    function validar_email($mail)
    {
        if (preg_match('/^[_a-zA-Z0-9-]+(\.[_a-zA-Z0-9-]+)*@+([_a-zA-Z0-9-]+\.)*[a-zA-Z0-9-]{2,200}\.[a-zA-Z]{2,6}$/', $mail))
            return true;
        return false;
    }

    function setNotice($frm)
    {
        $r = new xajaxResponse();
        $bd = new conector_bd();
        $obj_producto = new notice();
        $creo = 0;
        $html = '';

        if (!isset($frm['name']) || $frm['name'] == '') {
            $r->addScript("toastr.warning('Por favor ingrese un nombre de la noticia');");
            return $r;
        }

        if (!isset($frm['message']) || $frm['message'] == '') {
            $r->addScript("toastr.warning('Por favor diligencie el mensaje');");
            return $r;
        }


        $datos['nombre'] = $frm['name'];
        $datos['descripcion'] = $frm['message'];

        $creo = $obj_producto->crear($datos);

        if ($creo) {
            $r->addScript("toastr.success('Se creó correctamente la noticia');");
            $r->addScript("window.location.href = 'notices'");
        } else {
            $r->addScript("toastr.error('Se presentó un error');");
        }

        return $r;
    }

    function deleteNotice($id_notice)
    {
        $r = new xajaxResponse();
        $bd = new conector_bd();
        $obj_notice = new notice($id_notice);
        $eliminar = 0;

        $eliminar = $obj_notice->eliminar($id_notice);

        if ($eliminar) {
            $r->addScript("toastr.success('Se ha eliminado correctamente la noticia');");
            $r->addScript("window.location.href = 'notices'");
        } else {
            $r->addScript("toastr.error('Se ha presentado un incoveniente');");
        }
        return $r;
    }

    function getTree($id_parent, $id_principal, $tipo_arbol = '')
    {
        //    $id_parent = $data['a'];
        //    $id_principal = $data['b'];
        //    $tipo_arbol = $data['c'];

        $r = new xajaxResponse();
        $bd = new conector_bd();
        $arr_tree = array();
        $botones_direccion = '<a onclick="xajax_getTree(' . $id_principal . ', ' . $id_principal . ', ' . $tipo_arbol . ');" ><img class="boton-tree-inicio" src="assets/img/home_binary.png"></a>';
        if ($id_parent != $id_principal) {
            $obj_arriba = new security_users($id_parent);
            $botones_direccion .= '<a  onclick="xajax_getTree(' . $obj_arriba->parent_id . ', ' . $id_principal . ', ' . $tipo_arbol . ');" ><img class="boton-tree-up" src="assets/img/above_binary.png"></a>';
        }
        $html = '';

        $arr_calificacion['']['0'] = 'assets/img/13.png';
        $arr_calificacion['']['1'] = 'assets/img/13.png';

        if ($tipo_arbol == '1') {
            $arr_calificacion['M']['0'] = 'assets/img/13.png';
            $arr_calificacion['M']['1'] = 'assets/img/13.png';
            $arr_calificacion['F']['0'] = 'assets/img/13.png';
            $arr_calificacion['F']['1'] = 'assets/img/13.png';
        }

        $arr_pack['1'] = 'Mining Earth';
        $arr_pack['2'] = 'Mining Water';
        $arr_pack['3'] = 'Mining Wind';
        $arr_pack['4'] = 'Mining Fire';
        $arr_pack['5'] = 'Mining Cloud';
        $arr_pack['6'] = 'Mining Star';
        $arr_pack['0'] = 'Sin Paquete';

        $arr_estado['1'] = 'Activo';
        $arr_estado['0'] = 'Inactivo';

        $tipo_arbol = 1;
        $obj_security = 'security_users' . $tipo_arbol;
        //sponsor

        $obj_parent = new $obj_security($id_parent);
        if (empty($obj_parent->codigo)) {
            return $r;
        }
        $obj_promotor = new $obj_security($obj_parent->Id_Parent);


        $nams = $obj_promotor->name_user . ' ' . $obj_promotor->ape_user;
        $html .= "
    <div id='myModal{$obj_parent->username}' class='modal fade' role='dialog'>
        <div class='modal-dialog'>
            <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                    <h4 class='modal-title'>INFORMATION OF THE REFEREE</h4>
                </div>
                <div class='modal-body'>

                    <div class='container-fluid well span6'>
                        <div class='row-fluid'>
                            <div class='span2' >
                                <img src='{$arr_calificacion[$obj_parent->sex_user][$obj_parent->estado]}' style='width:150px;height:150px;' class='img-circle center'>
                            </div>

                            <div class='span8'>
                                <h3 class='center'>{$obj_parent->name_user} {$obj_parent->ape_user}</h3>
                                <table class='table' style='text-align:left;'>
                                    <tbody>    
                                        <tr class='success'>
                                            <td><b>Email:</b> {$obj_parent->user_login}</td>
                                            <td><b>Admission date:</b> {$obj_parent->user_register}</td>
                                        </tr>
                                        <tr class='warning'>
                                            <td><b>Status:</b> {$arr_estado[$obj_parent->estado]}</td>
                                            <td><b>User:</b> {$obj_parent->username}</td>
                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>";

        $nombre = (strlen($obj_parent->username) > 20) ? substr($obj_parent->username, 0, 20) . '...' : $obj_parent->username;
        $obj_parent = '<img class="center pointer" data-toggle="modal"  src="' . $arr_calificacion[$obj_parent->sex_user][$obj_parent->estado] . '"><h6 align="center">' . $nombre . '</h6>';

        //primer nivel
        $primer_nivel = getHijos($id_parent, $tipo_arbol);

        $imgPrimerNivel = array();
        foreach ($primer_nivel as $value) {
            $obj_promotor = new $obj_security($value->Id_Parent);
            $nams = $obj_promotor->name_user . ' ' . $obj_promotor->ape_user;
            $html .= "
            <div id='myModal{$value->codigo}' class='modal fade' role='dialog'>
        <div class='modal-dialog'>
        <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                    <h4 class='modal-title'>INFORMATION OF THE REFEREE</h4>
                </div>
                <div class='modal-body'>

                    <div class='container-fluid well span6'>
                        <div class='row-fluid'>
                            <div class='span2' >
                                <img src='{$arr_calificacion[$value->sex_user][$value->estado]}' style='width:150px;height:150px;' class='img-circle center'>
                            </div>

                            <div class='span8'>
                                <h3 class='center'>{$value->name_user} {$value->ape_user}</h3>
                                <table class='table' style='text-align:left;'>
                                    <tbody>    
                                        <tr class='success'>
                                            <td><b>Email:</b> {$value->user_login}</td>
                                            <td><b>Admission date:</b> {$value->user_register}</td>
                                        </tr>
                                        <tr class='warning'>
                                            <td><b>Status:</b> {$arr_estado[$value->estado]}</td>
                                            <td><b>User:</b> {$value->username}</td>
                                        </tr>
                                        <tr class='warning'>
                                            <td><b>Sponsor:</b> $nams</td>
                                           
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                </div>
            </div>";
            $nombre = (strlen($value->username) > 20) ? substr($value->username, 0, 8) . '...' : $value->username;
            $a = ($arr_calificacion[$value->sex_user][$value->estado] == 'img/icons/blok.png') ? 'Available' : '<a onclick="xajax_getTree(' . $value->codigo . ', ' . $id_principal . ')" style="cursor:pointer;color:green;"><span class="glyphicon glyphicon-tree-deciduous"></span></a>';
            $imgPrimerNivel[$value->parent_id][$value->codigo] = '<img imagen-responsive onclick="xajax_getTree(' . $value->codigo . ', ' . $id_principal . ',' . $tipo_arbol . ')" class="center pointer" data-toggle="modal" src="' . $arr_calificacion[$value->sex_user][$value->estado] . '"><h6 align="center">' . $nombre . '</h6>';
        }

        //Segundo nivel
        $segundo_nivel = array();
        foreach ($imgPrimerNivel as $value) {
            foreach ($value as $key => $val) {
                $segundo_nivel[$key] = getHijos($key, $tipo_arbol);
            }
        }

        $imgSegundoNivel = array();
        foreach ($segundo_nivel as $hijos) {
            foreach ($hijos as $value) {
                $obj_promotor = new $obj_security($value->Id_Parent);
                $nams = $obj_promotor->name_user . ' ' . $obj_promotor->ape_user;
                $html .= "
            <div id='myModal{$value->codigo}' class='modal fade' role='dialog'>
        <div class='modal-dialog'>
        <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                    <h4 class='modal-title'>INFORMATION OF THE REFEREE</h4>
                </div>
                <div class='modal-body'>

                    <div class='container-fluid well span6'>
                        <div class='row-fluid'>
                            <div class='span2' >
                                <img src='{$arr_calificacion[$value->sex_user][$value->estado]}' style='width:150px;height:150px;' class='img-circle center'>
                            </div>

                            <div class='span8'>
                                <h3 class='center'>{$value->name_user} {$value->ape_user}</h3>
                                <table class='table' style='text-align:left;'>
                                    <tbody>    
                                        <tr class='success'>
                                            <td><b>Email:</b> {$value->user_login}</td>
                                            <td><b>Admission date:</b> {$value->user_register}</td>
                                        </tr>
                                        <tr class='warning'>
                                            <td><b>Status:</b> {$arr_estado[$value->estado]}</td>
                                            <td><b>User:</b> {$value->username}</td>
                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                </div>
            </div>";
                $nombre = (strlen($value->username) > 20) ? substr($value->username, 0, 20) . '...' : $value->username;
                $a = ($arr_calificacion[$value->sex_user][$value->estado] == 'img/icons/blok.png') ? 'Available' : '<a onclick="xajax_getTree(' . $value->codigo . ', ' . $id_principal . ')" style="cursor:pointer;color:green;"><span class="glyphicon glyphicon-tree-deciduous"></span></a>';
                $imgSegundoNivel[$value->parent_id][$value->codigo] = '<img class="center pointer" onclick="xajax_getTree(' . $value->codigo . ', ' . $id_principal . ', ' . $tipo_arbol . ')" data-toggle="modal" src="' . $arr_calificacion[$value->sex_user][$value->estado] . '"><h6 align="center">' . $nombre . '</h6>';
            }
        }



        //Tercer nivel
        $tercer_nivel = array();
        foreach ($imgSegundoNivel as $value) {
            foreach ($value as $key => $val) {
                $tercer_nivel[$key] = getHijos($key, $tipo_arbol);
            }
        }

        $imgTercerNivel = array();
        foreach ($tercer_nivel as $hijos) {
            foreach ($hijos as $value) {
                $obj_promotor = new $obj_security($value->Id_Parent);
                $nams = $obj_promotor->name_user . ' ' . $obj_promotor->ape_user;
                $html .= "
            <div id='myModal{$value->username}' class='modal fade' role='dialog'>
        <div class='modal-dialog'>
        <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                    <h4 class='modal-title'>INFORMATION OF THE REFEREE</h4>
                </div>
                <div class='modal-body'>

                    <div class='container-fluid well span6'>
                        <div class='row-fluid'>
                            <div class='span2' >
                                <img src='{$arr_calificacion[$value->sex_user][$value->estado]}' style='width:150px;height:150px;' class='img-circle center'>
                            </div>

                            <div class='span8'>
                                <h3 class='center'>{$value->name_user} {$value->ape_user}</h3>
                                <table class='table' style='text-align:left;'>
                                    <tbody>    
                                        <tr class='success'>
                                            <td><b>Email:</b> {$value->user_login}</td>
                                            <td><b>Admission date:</b> {$value->user_register}</td>
                                        </tr>
                                        <tr class='warning'>
                                            <td><b>Status:</b> {$arr_estado[$value->estado]}</td>
                                            <td><b>User:</b> {$value->username}</td>
                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                </div>
            </div>";
                $nombre = (strlen($value->username) > 20) ? substr($value->username, 0, 20) . '...' : $value->username;
                $a = ($arr_calificacion[$value->sex_user][$value->estado] == 'img/icons/blok.png') ? 'Available' : '<a onclick="xajax_getTree(' . $value->codigo . ', ' . $id_principal . ')" style="cursor:pointer;color:green;"><span class="glyphicon glyphicon-tree-deciduous"></span></a>';
                $imgTercerNivel[$value->parent_id][$value->codigo] = '<img class="center pointer" onclick="xajax_getTree(' . $value->codigo . ', ' . $id_principal . ', ' . $tipo_arbol . ')" data-toggle="modal" src="' . $arr_calificacion[$value->sex_user][$value->estado] . '"><h6 align="center">' . $nombre . '</h6>';
            }
        }
        
        
        
        
        
        
         //Cuarto nivel
        $cuarto_nivel = array();
        foreach ($imgTercerNivel as $value) {
            foreach ($value as $key => $val) {
                $cuarto_nivel[$key] = getHijos($key, $tipo_arbol);
            }
        }

        $imgCuartoNivel = array();
        foreach ($cuarto_nivel as $hijos) {
            foreach ($hijos as $value) {
                $obj_promotor = new $obj_security($value->Id_Parent);
                $nams = $obj_promotor->name_user . ' ' . $obj_promotor->ape_user;
                $html .= "
            <div id='myModal{$value->username}' class='modal fade' role='dialog'>
        <div class='modal-dialog'>
        <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                    <h4 class='modal-title'>INFORMATION OF THE REFEREE</h4>
                </div>
                <div class='modal-body'>

                    <div class='container-fluid well span6'>
                        <div class='row-fluid'>
                            <div class='span2' >
                                <img src='{$arr_calificacion[$value->sex_user][$value->estado]}' style='width:150px;height:150px;' class='img-circle center'>
                            </div>

                            <div class='span8'>
                                <h3 class='center'>{$value->name_user} {$value->ape_user}</h3>
                                <table class='table' style='text-align:left;'>
                                    <tbody>    
                                        <tr class='success'>
                                            <td><b>Email:</b> {$value->user_login}</td>
                                            <td><b>Admission date:</b> {$value->user_register}</td>
                                        </tr>
                                        <tr class='warning'>
                                            <td><b>Status:</b> {$arr_estado[$value->estado]}</td>
                                            <td><b>User:</b> {$value->username}</td>
                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                </div>
            </div>";
                $nombre = (strlen($value->username) > 20) ? substr($value->username, 0, 20) . '...' : $value->username;
                $a = ($arr_calificacion[$value->sex_user][$value->estado] == 'img/icons/blok.png') ? 'Available' : '<a onclick="xajax_getTree(' . $value->codigo . ', ' . $id_principal . ')" style="cursor:pointer;color:green;"><span class="glyphicon glyphicon-tree-deciduous"></span></a>';
                $imgCuartoNivel[$value->parent_id][$value->codigo] = '<img class="center pointer" onclick="xajax_getTree(' . $value->codigo . ', ' . $id_principal . ', ' . $tipo_arbol . ')" data-toggle="modal" src="' . $arr_calificacion[$value->sex_user][$value->estado] . '"><h6 align="center">' . $nombre . '</h6>';
            }
        }
        
        
        
        
        
         //Quinto nivel
        $quinto_nivel = array();
        foreach ($imgCuartoNivel as $value) {
            foreach ($value as $key => $val) {
                $quinto_nivel[$key] = getHijos($key, $tipo_arbol);
            }
        }

        $imgQuintoNivel = array();
        foreach ($quinto_nivel as $hijos) {
            foreach ($hijos as $value) {
                $obj_promotor = new $obj_security($value->Id_Parent);
                $nams = $obj_promotor->name_user . ' ' . $obj_promotor->ape_user;
                $html .= "
            <div id='myModal{$value->username}' class='modal fade' role='dialog'>
        <div class='modal-dialog'>
        <div class='modal-content'>
                <div class='modal-header'>
                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                    <h4 class='modal-title'>INFORMATION OF THE REFEREE</h4>
                </div>
                <div class='modal-body'>

                    <div class='container-fluid well span6'>
                        <div class='row-fluid'>
                            <div class='span2' >
                                <img src='{$arr_calificacion[$value->sex_user][$value->estado]}' style='width:150px;height:150px;' class='img-circle center'>
                            </div>

                            <div class='span8'>
                                <h3 class='center'>{$value->name_user} {$value->ape_user}</h3>
                                <table class='table' style='text-align:left;'>
                                    <tbody>    
                                        <tr class='success'>
                                            <td><b>Email:</b> {$value->user_login}</td>
                                            <td><b>Admission date:</b> {$value->user_register}</td>
                                        </tr>
                                        <tr class='warning'>
                                            <td><b>Status:</b> {$arr_estado[$value->estado]}</td>
                                            <td><b>User:</b> {$value->username}</td>
                                        </tr>
                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                </div>
            </div>";
                $nombre = (strlen($value->username) > 20) ? substr($value->username, 0, 20) . '...' : $value->username;
                $a = ($arr_calificacion[$value->sex_user][$value->estado] == 'img/icons/blok.png') ? 'Available' : '<a onclick="xajax_getTree(' . $value->codigo . ', ' . $id_principal . ')" style="cursor:pointer;color:green;"><span class="glyphicon glyphicon-tree-deciduous"></span></a>';
                $imgQuintoNivel[$value->parent_id][$value->codigo] = '<img class="center pointer" onclick="xajax_getTree(' . $value->codigo . ', ' . $id_principal . ', ' . $tipo_arbol . ')" data-toggle="modal" src="' . $arr_calificacion[$value->sex_user][$value->estado] . '"><h6 align="center">' . $nombre . '</h6>';
            }
        }




        $node_structure = '{
                    innerHTML: \'' . $obj_parent . '\',
                    children: [';

        foreach ($imgPrimerNivel as $hijosPrimerNivel) {
            foreach ($hijosPrimerNivel as $keyPN => $valuePN) {
                $node_structure .= '{innerHTML: \'' . $valuePN . '\',';

                $node_structure .= 'children: [';

                if (isset($imgSegundoNivel[$keyPN])) {
                    foreach ($imgSegundoNivel[$keyPN] as $keySN => $valueSN) {
                        $node_structure .= '{innerHTML: \'' . $valueSN . '\',';

                        $node_structure .= 'children: [';

                        if (isset($imgTercerNivel[$keySN])) {
                            foreach ($imgTercerNivel[$keySN] as $keyTN => $valueTN) {
                                $node_structure .= '{innerHTML: \'' . $valueTN . '\',';

                                $node_structure .= 'children: [';

                                if (isset($imgCuartoNivel[$keyTN])) {
                                    foreach ($imgCuartoNivel[$keyTN] as $keyCN => $valueCN) {
                                        $node_structure .= '{innerHTML: \'' . $valueCN . '\',';

                                        $node_structure .= 'children: [';
                                        $node_structure .= ']},';
                                    }
                                }

                                $node_structure .= ']},';
                            }
                        }

                        $node_structure .= ']},';
                    }
                }
                $node_structure .= ']},';
            }
        }

        $node_structure .= ']
                }';

        $script = '
        chart_config = {
                chart: {
                    container: "#collapsable-example",

                    animateOnInit: true,

                    node: {
                        collapsable: false
                    },
                    animation: {
                        nodeAnimation: "easeOutBounce",
                        nodeSpeed: 700,
                        connectorsAnimation: "bounce",
                        connectorsSpeed: 700
                    },
                    connectors: {
                        type: \'step\',
                       
                    },
                    scrollbar : "fancy",
                    padding : 15,
                    levelSeparation : 70,
                    siblingSeparation : 70,
                },
                nodeStructure: ' . $node_structure . '
            };
            ';

        $r->addScript($script);
        $r->addScript('tree = new Treant(chart_config);');
        $r->addAssign('inner_html', 'innerHTML', $html);
        $r->addAssign('botones_direccion', 'innerHTML', $botones_direccion);

        return $r;
        ?>
    <script>
        <?= $script ?>
        tree = new Treant(chart_config);
        document.getElementById('inner_html').innerHTML = '<?= $html ?>';
        document.getElementById('botones_direccion').innerHTML = '<?= $botones_direccion ?>';
    </script>
<?php
}

function getHijos($id_parent, $tipo_arbol)
{

    $arr_arbol['1'] = '';
    $arr_arbol['2'] = '_f2';
    $arr_arbol['3'] = '_f3';
    $arr_arbol['4'] = '_f4';
    $arr_arbol['5'] = '_f5';

    $tipo_arbol = $arr_arbol[$tipo_arbol];

    $bd = new conector_bd();
    $arr_tree = array();

    $sql = "SELECT ID FROM security_users$tipo_arbol where parent_id = '$id_parent' ORDER BY coloca DESC";
    $result = $bd->consultar($sql);
    $obj_security_users = "security_users$tipo_arbol";
    while ($row = mysqli_fetch_array($result)) {
        $obj_security_user = new $obj_security_users($row[0]);
        $arr_tree[] = $obj_security_user;
    }
    return $arr_tree;
}

function getUserPreRegister($opciones, $divresult, $input, $hidden, $infousuario)
{
    $r = new xajaxResponse();
    $bd = new conector_bd();
    $filtro = '';
    $html = '';

    if (isset($opciones['get_username']) && !empty($opciones['get_username'])) {
        $filtro .= ($filtro) ? "OR username LIKE '%{$opciones['get_username']}%'" : " username LIKE '%{$opciones['get_username']}%' ";
    }

    if (isset($opciones['get_name']) && !empty($opciones['get_name'])) {
        $filtro .= ($filtro) ? "OR name_user LIKE '%{$opciones['get_name']}%'" : " name_user LIKE '%{$opciones['get_name']}%' ";
    }

    if (isset($opciones['get_ape']) && !empty($opciones['get_ape'])) {
        $filtro .= ($filtro) ? "OR ape_user LIKE '%{$opciones['get_ape']}%'" : " ape_user LIKE '%{$opciones['get_ape']}%' ";
    }

    $arrPar = array();
    $arrPar['filtro'] = $filtro;

    $elementos = $bd->consultar_todo_sin_tb('security_users', $arrPar);
    $n = $elementos['n'];
    $elementos = $elementos['elementos'];

    $html .= '<table style="width: 100%;">';
    if ($n > 0) {
        $html .= "<tr>";
        $html .= "<th>Identy</th>";
        $html .= "<th>Username</th>";
        $html .= "<th>Name</th>";
        $html .= "<th>Last Name</th>";
        $html .= "<th></th>";
        $html .= "</tr>";
        foreach ($elementos as $elemento) {
            $html .= "<tr>";
            $html .= "<td>{$elemento->identy_user}</td>";
            $html .= "<td>{$elemento->username}</td>";
            $html .= "<td>{$elemento->name_user}</td>";
            $html .= "<td>{$elemento->ape_user}</td>";
            $html .= "<td><input type=\"button\" value=\"select sponsor\" onclick=\"$('#$input').val('{$elemento->name_user} {$elemento->ape_user}');$('#$hidden').val('{$elemento->codigo}');$(this.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode.parentNode).modal('hide');$(this.parentNode.parentNode.parentNode).hide(); \"></td>";
            $html .= "</tr>";
        }
    }
    $html .= '</table>';
    $r->addAssign($divresult, 'innerHTML', $html);
    return $r;
}

function getInfoUsuario($persona, $promotor, $posicion)
{
    $r = new xajaxResponse();
    $obj_user = new security_users_pre_register($persona);
    $obj_user = json_encode($obj_user);
    //    $r->addScript("ajaxActivar('$obj_user', $promotor, $posicion);");
    $r->addScript("ajaxActivar('$obj_user', '$promotor', '$posicion');");
    //    $r->addScript("ajaxActivar('$obj_user', $promotor, $posicion);");
    //    $r->addAssign($div, 'innerHTML', json_encode($obj_user));
    return $r;
}

function deleteRegister($id_register)
{
    $r = new xajaxResponse();
    $obj_security_user_pre_register = new security_users_pre_register();
    $elimino = 0;

    $elimino = $obj_security_user_pre_register->eliminar($id_register);

    if ($elimino) {
        $r->addScript("toastr.success('Se ha eliminado satisfactoriamente')");
    } else {
        $r->addScript("toastr.error('Surgió un problema lo sentimos')");
    }

    return $r;
}

function crearSolicitudAllcoin($frm)
{
    $r = new xajaxResponse();
    $bd = new conector_bd();

    if (!isset($_SESSION['user'])) {
        $r->addScript("toastr.error('Faltan datos');");
        return $r;
    }

    if (!isset($frm['name']) || $frm['name'] == '') {
        $r->addScript("toastr.warning('Debe ingresar su nombre');");
        return $r;
    }

    if (!isset($frm['email']) || $frm['email'] == '') {
        $r->addScript("toastr.warning('Debe ingresar su email');");
        return $r;
    }

    if (!isset($frm['wallet']) || $frm['wallet'] == '') {
        $r->addScript("toastr.warning('Debe ingresar una wallet');");
        return $r;
    }

    if (!validar_email($frm['email'])) {
        $r->addScript("toastr.warning('Ingrese un email valido');");
        return $r;
    }

    $obj_security_user = new security_users($_SESSION['user']);
    if ($bd->existen_registros('paid_efecty', "id_user = {$obj_security_user->codigo} AND state = 1")) {
        $arrPar = array();
        $arrPar['filtro'] = "id_user = {$obj_security_user->codigo} AND state = 1";
        $elementos = $bd->consultar_todo_sin_tb('paid_efecty', $arrPar);
        $n = $elementos['n'];
        $elementos = $elementos['elementos'];

        if ($n > 0) {
            $obj_ticket_allcoin = new ticket_allcoin();
            foreach ($elementos as $paid_efecty) {
                if (!$bd->existen_registros('ticket_allcoin', "id_user = {$obj_security_user->codigo} AND id_paid_efecty = {$paid_efecty->codigo}")) {
                    $datos = array();
                    $datos['id_user'] = $obj_security_user->codigo;
                    $datos['nombre'] = $frm['name'];
                    $datos['email'] = $frm['email'];
                    $datos['wallet'] = $frm['wallet'];
                    $datos['id_pack'] = $paid_efecty->id_pack;
                    $datos['nombre_pack'] = $paid_efecty->membresi;
                    $datos['id_paid_efecty'] = $paid_efecty->codigo;

                    $creo = $obj_ticket_allcoin->crear($datos);

                    if ($creo) {
                        //creamos un identificador único
                        //para indicar que las partes son idénticas
                        $uniqueid = uniqid('np');

                        //indicamos las cabeceras del correo
                        $headers = "MIME-Version: 1.0\r\n";
                        $headers .= "From: Foo \r\n";
                        $headers .= "Subject: Test mail\r\n";
                        //lo importante es indicarle que el Content-Type
                        //es multipart/alternative para indicarle que existirá
                        //un contenido alternativo
                        $headers .= "Content-Type: multipart/alternative;boundary=" . $uniqueid . "\r\n";

                        $message = "";

                        $message .= "\r\n\r\n--" . $uniqueid . "\r\n";
                        $message .= "Content-type: text/html;charset=utf-8\r\n\r\n";
                        $message .= '
                            <strong>Se ha creado un ticket para allcoins</strong>
                            ';

                        $message .= "\r\n\r\n--" . $uniqueid . "--";

                        //con la función mail de PHP enviamos el mail.
                        mail($frm['email'], 'Solicitud Allcoins', $message, $headers);
                        //                        mail($frm['email'], 'Message Submitted', $message, $headers);
                        //                        mail(COPIA_EMAIL, 'Message Submitted', $message, $headers);
                        mail('Vidaultra777@gmail.com', 'Solicitud Allcoins', $message, $headers);
                        mail('jonathan.cruz89@gmail.com', 'Solicitud Allcoins', $message, $headers);

                        $r->addScript("toastr.success('Se ha enviado la solicitud correctamente');");
                    } else {
                        $r->addScript("toastr.success('Se ha presentado un error');");
                    }
                } else {
                    $r->addScript("toastr.warning('Ya ha solicitado allcoins para los paquetes registrados');");
                }
            }
        }
    } else {
        $r->addScript("toastr.error('No tienes paquetes habilitados para solicitar allcoins');");
    }

    $r->addScript("document.getElementById('contactForm').reset();");

    return $r;
}

function aprobarTicket($id)
{
    $r = new xajaxResponse();
    $obj_ticket_allcoin = new ticket_allcoin();
    $modificar = 0;

    $datos = array();
    $datos['estado_ticket'] = 2;
    $datos['id'] = $id;

    $modificar = $obj_ticket_allcoin->modificar($datos);

    if ($modificar) {
        $r->addScript("toastr.success('Se ha actualizado correctamente');");
        $r->addScript("window.location.href = 'allcoins'");
    } else {
        $r->addScript("toastr.error('Se ha presentado un incoveniente');");
    }


    return $r;
}
?>