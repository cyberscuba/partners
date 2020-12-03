<?php
        include("class/files.php");
        require_once("class/" . $conf . "." . $ext);
        require_once("class/" . $ppal . "." . $ext);
        
        
  
        $usuariop = $user;
        $contrl = 1;
        $Muestra = new Muestra();
        include("gen_ref.php");
        //include("bon_resis.php");
        //include("actualiz_plan.php");
       
        require_once($info . "." . $ext);
        $userss = $Muestra->get_users5($usuariop);
        $row = mysqli_fetch_array($userss);
     
        $idps = $row['ID'];
        $user_nam = $row['username'];
        $user_tel = $row['tel_user'];
        $rol =  $row['user_rol']; 
        $lft = $row['lft'];
        $rgt = $row['rgt'];
        $nam = $row['name_user'];
        $apeli = $row['ape_user'];
        $dirus = $row['dir_user'];
        $ciuus = $row['ciu_user'];
        $paisus = $row['pais_user'];
        $estarus = $row['dpto_user'];
        $emails = $row['user_login'];
        $pack = $row['pack'];
        //$pack = $row['points'];
        $clv = $row['user_psw'];
        $ident = $row['identy_user'];
        $photo = $row['user_photo'];
        $bille = $row['bill'];
        if($photo == ''){
              $photo = "assets/img/icons/favicon.png";
              }
        $rol = $row['user_rol'];
        $range = $row['user_calif'];
        $regis = $row['user_register'];
        $part = $row['Id_Parent'];
        $esta = $row['estado'];

        $level = 1;
        
        
        $limid = $row['limit'];
        $hoyo = date("Y-m-d");
        //defino fecha 1
$fo = explode('-',$limid);        
$ano2 = $fo[0];
$mes2 = $fo[1];
$dia2 = $fo[2];

//defino fecha 2
$fo1 = explode('-',$hoyo); 
$ano1 = $fo1[0];
$mes1 = $fo1[1];
$dia1 = $fo1[2];

//calculo timestam de las dos fechas
$timestamp1 = mktime(0,0,0,$mes1,$dia1,$ano1);
$timestamp2 = mktime(4,12,0,$mes2,$dia2,$ano2);

//resto a una fecha la otra
$segundos_diferencia = $timestamp1 - $timestamp2;
//echo $segundos_diferencia;

//convierto segundos en días
$dias_diferencia = $segundos_diferencia / (60 * 60 * 24);

//obtengo el valor absoulto de los días (quito el posible signo negativo)
$dias_diferencia = abs($dias_diferencia);

//quito los decimales a los días de diferencia
$dias_diferencia = floor($dias_diferencia);

$pocre = (1 / $dias_diferencia) * 100;

        
        if($esta == 1){
            $estatus = "<b style='font-weight: bold;'>ACTIVO</b>";
            $clsd = "success";
        }else{
            $estatus = "<b style='font-weight: bold;'>INACTIVO</b>";
            $clsd = "danger";
        }
       
       
       
       function generarCodigo($longitud) {
      $key = '';
      $pattern = '1234567890abcdefghijklmnopqrstuvwxyz';
      $max = strlen($pattern)-1;
      for($i=0;$i < $longitud;$i++) $key .= $pattern{mt_rand(0,$max)};
      return $key;
      }
  
      $gencod = generarCodigo(8); 

      $anio = date("d");
      $mes = date("m");
      $seg = date("s");
      $cupons = $gencod.$mes.$seg.$anio;
        
        
        //proceso activación
     // $gtos = $Muestra->list_pack_test($user);
      while($silfy = mysqli_fetch_array($gtos)){
      $usist = $silfy['id_user'];
      $usdt =  $silfy['id_pack'];
      $valis =  $silfy['value'];
      $price = $silfy['price_in_btc'];
      $priceusd = $silfy['price_in_usd'];
     $invoice_id = $silfy['invoice_id'];
     $fett = $silfy['fecha'];
      
      
          if($valis >= $price){
         
              if($cupons_on == 1){
                  
                  
     
             //    $actuaders = $Muestra->updat_state_pak($usist,$usdt);
               //  $actuacupon = $Muestra->updat_state_pak_cupon($usist,$cupons);
              //  $dd = $Muestra->updat_state_invos($invoice_id);
             
                  
              }else{
     // $actuaders = $Muestra->updat_state_pak($usist,$usdt);
     //  $dd = $Muestra->updat_state_invos($invoice_id);
   
              }
      
       
          
      }
      
      
      }
      
      $invest = $Muestra->invertion_daf($user);
      $ol = mysqli_fetch_array($invest);
      $prid = $ol['price_in_usd'];
      if($prid <= 0){
          $prid = 0;
      }
      
      $tali = $Muestra->references($usuariop);
      $ii = mysqli_fetch_array($tali);
      if($ii[0] <= 0){
           $ii[0] = 0;
      }
      
      $talibi = $Muestra->referencesbi($usuariop,$lft,$rgt);
      $iibi = mysqli_fetch_array($talibi);
      if($iibi[0] <= 0){
           $iibi[0] = 0;
      }
      
      
        $ti = $Muestra->get_users511_bille($usuariop);
                   $iq = mysqli_fetch_array($ti);
                   
                   $tii = $Muestra->get_users511_billei($usuariop);
                   $iqi = mysqli_fetch_array($tii);
                   
                   $tis = $Muestra->get_users511_bille_b1($usuariop);
                   $iq1 = mysqli_fetch_array($tis);
                   $totsaldo = $iq[0] - $iq1[0];
                   $totsaldol = $iqi[0];
                   if($totsaldo <= '0'){
                       $totsaldo = 0;
                   }
                   if($totsaldol <= '0'){
                       $totsaldol = 0;
                   }
                  $totissaldois = $totsaldo;
                   
                   
                   
                   $tia = $Muestra->get_users511_billea($usuariop);
                   $iqa = mysqli_fetch_array($tia);
                   $totsaldoa = $iqa[0];
                   if($totsaldoa <= '0'){
                       $totsaldoa = 0;
                   }
                   
                   
    $rtyop = $Muestra->selrangepersonal($range);  
    $ppo = mysqli_fetch_array($rtyop);
    $namescalif = $ppo[0];
    if($namescalif == ''){
        $namescalif = "Sin Rango";
    }
    
    
    $bonbina = $Muestra->get_response2($usuariop);
    $gid = mysqli_fetch_array($bonbina);
    $binab = $gid[0];
    
    if($binab <= 0){
        $binab = 0;
    }
    
    
    $bondirsele = $Muestra->get_response23($usuariop);
    $giddir = mysqli_fetch_array($bondirsele);
    $bondir = $giddir[0];
    
    if($bondir <= 0){
        $bondir = 0;
    }
    
    $bondirsele1 = $Muestra->get_response23aa($usuariop);
    $giddir1 = mysqli_fetch_array($bondirsele1);
    $bondir1 = $giddir1[0];
    
    if($bondir1 <= 0){
        $bondir1 = 0;
    }
    
    
    $bondiasele = $Muestra->get_response234($usuariop);
    $giddia = mysqli_fetch_array($bondiasele);
    $bondia = $giddia[0];
    
    if($bondia <= 0){
        $bondia = 0;
    }
    
    $bondiasele1 = $Muestra->get_response234aa($usuariop);
    $giddia1 = mysqli_fetch_array($bondiasele1);
    $bondia1 = $giddia1[0];
    
    if($bondia1 <= 0){
        $bondia1 = 0;
    }
    
    
    $pack_id = $pack; 
    $teti = $Muestra->state_packs($pack_id);
    $rt = mysqli_fetch_array($teti);
    $mony = "$";
    if($usuariop == 1){
        $rt[1] = "Administrador";
        $mony = "";
    }
    
    $montfinal = $rt[1] * 2;
    $balac = $totsaldoa / $montfinal * 100; 
    if($balac < '0'){
        $balac = 0;
    }
    if($balac >= 100){
        $balac = 100;
    }
    
    

   
   if($totsaldo >= $leme AND $usuariop != 1){
       $totsaldo = $leme;
     
       $totsaldol = $leme;
   }
   
   
   if($totsaldol >= $leme AND $usuariop != 1){
       $totsaldol = $leme;
   }
   

   
 
    
    $srtvoi = $Muestra->selvoice($user);
    $rtt = mysqli_fetch_array($srtvoi);
    $invv = $rtt[0] + 1; 
   
    
    
    
    

        
       
           
     
?>