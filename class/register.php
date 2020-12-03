<?php

require_once "../config/bd_config.php"; 

class Insert extends mysql 
{     
    public function __construct() 
    { 
        parent::__construct(); 
    } 

    public function get_users12l($doc , $username, $name , $ape, $gen, $nac, $dire, $tel ,$pais, $state, $city, $email, $passo, $postal, $Id_Parent, $Creator, $fecha, $rol, $user_calif,$bill,$ques,$answ) 
    { 

$result = $this->_db->query("INSERT INTO `security_users`(`identy_user`, `username`, `name_user`, `ape_user`, `sex_user`, `nac_user`, `dir_user`, `tel_user`, `pais_user`, `dpto_user`, `ciu_user`, `user_login`, `user_psw`,`postal`,`Id_Parent`, `creator`, `user_register`, `user_rol`,`user_calif`,`bill`,`ques`,`answ`) VALUES ('$doc','$username','$name','$ape','$gen','$nac','$dire','$tel','$pais','$state','$city','$email','$passo','$postal','$Id_Parent','$Creator','$fecha','$rol','$user_calif','$bill','$ques','$answ')"); 
        
    } 
    
    
    public function get_users12lppjaja($email, $keys, $vence) 
    { 

$result = $this->_db->query("DELETE FROM `tok_2020` WHERE `status_tok` = '$email'"); 
        
    }
    
    


  public function get_inserta($Creator)
    { 

$result = $this->_db->query("INSERT INTO `comision`(`cedula`, `cedula_otor`, `total_comisiones`,  `concepto`,`fecha`) VALUES ('$Creator','$Creator','23','6',NOW())"); 
        
    } 
 
 
 public function get_users12lpp($email, $keys, $vence) 
    { 

$result = $this->_db->query("INSERT INTO `tok_2020`(`ID`, `tok_20`, `status_tok`, `vence_tok`) VALUES ('','$keys','$email','$vence')"); 
        
    }
 
 public function get_EDI($usuariop , $rutaf) 
    { 

$result = $this->_db->query("UPDATE  `security_users` SET user_photo='$rutaf' WHERE ID = '$usuariop'"); 
        
    } 

 public function get_users12lac($username,$name , $ape,  $tel ,$pais,  $email, $passo, $bill,$bill1,$ques,$answ,$usuariop) 
    { 

$result = $this->_db->query("UPDATE  `security_users` SET username='$username',name_user='$name', ape_user='$ape', tel_user='$tel', pais_user='$pais', user_psw='$passo',bill='$bill',bill1='$bill1',ques='$ques',answ='$answ' WHERE ID = '$usuariop'"); 
        
    } 

 public function get_users12lacc($username,$name , $ape,  $tel ,$pais,  $email, $bill,$bill1,$ques,$answ,$usuariop) 
    { 

$result = $this->_db->query("UPDATE  `security_users` SET username='$username',name_user='$name', ape_user='$ape',user_login = '$email', tel_user='$tel', pais_user='$pais' WHERE ID = '$usuariop'"); 
        
    } 


       
      public function get_userse($titulo,$ruta,$desc) 
    { 
$result = $this->_db->query("INSERT INTO `docus_admin`(`name`, `url`,`desc`) VALUES ('$titulo','$ruta','$desc')"); 
        
    } 

    public function get_users10($sex,$name,$ape,$email,$pass2,$nac,$ip_promo,$passo,$doc) 
    { 
$result = $this->_db->query("INSERT INTO `ps_customer`
               (`id_customer`, `id_shop_group`, `id_shop`, `id_gender`, `id_default_group`, `id_lang`, `id_risk`, `company`, `siret`, `ape`, `firstname`, `lastname`, `email`, `passwd`, `last_passwd_gen`, `birthday`, `newsletter`, `ip_registration_newsletter`, `newsletter_date_add`, `optin`, `website`, `outstanding_allow_amount`, `show_public_prices`, `max_payment_days`, `secure_key`, `note`, `active`, `is_guest`, `deleted`, `date_add`, `date_upd`, `cedula`,`ccosto`) VALUES ('','1','1','$sex','3','1','0','','','','$name','$ape','$email','$pass2',NOW(),'$nac','1','$ip_promo',NOW(),'1','NULL','0.000000','0','0','$passo','NULL','1','0','0',NOW(),NOW(),'$doc','1')"); 
        
    } 

   public function get_users11($id_customer1) 
    { 
$result = $this->_db->query("INSERT INTO `ps_customer_group`(`id_customer`, `id_group`)    VALUES ('$id_customer1','3')"); 
        
    }

 public function get_users12($pais,$nomde,$id_customer1,$nombre_comprador,$last_name,$name_customer,$dir,$postal,$city,$tel,$doc) 
    { 
$result = $this->_db->query("INSERT INTO `ps_address`(`id_address`, `id_country`, `id_state`, `id_customer`, `alias`, `lastname`, `firstname`, `address1`, `postcode`, `city`, `phone_mobile`,  `dni`, `date_add`, `date_upd`, `active`, `deleted`) VALUES ('','$pais','$nomde','$id_customer1','$nombre_comprador','$last_name','$name_customer','$dir','$postal','$city','$tel','$doc',NOW(),NOW(),'1','0')"); 
        
    } 
        
   
}


class Muestra extends mysql 
{     
    public function __construct() 
    { 
        parent::__construct(); 
    } 


 
       public function get_users6a($email) 
    { 
        $result = $this->_db->query("SELECT * FROM security_users WHERE user_login = '$email'"); 
         
       $connom = $result->num_rows; 
         return $connom;  
    }
    
    public function get_users6aju($email,$usuariop) 
    { 
        $result = $this->_db->query("SELECT * FROM security_users WHERE user_login = '$email' AND ID <> '$usuariop'"); 
         
       $connom = $result->num_rows; 
         return $connom;  
    }
    
        public function crear_matapoyo($nombre, $rutaf) {
 
        $result = $this->_db->query("INSERT INTO `mat_apoyo`(`nombre`, `url`) VALUES ('$nombre', '$rutaf')");
            
    }

    public function get_users6ajuu($username,$usuariop) 
    { 
        $result = $this->_db->query("SELECT * FROM security_users WHERE username = '$username' AND ID <> '$usuariop'"); 
         
       $connom = $result->num_rows; 
         return $connom;  
    }
    
       public function get_users6ary($bill) 
    { 
        $result = $this->_db->query("SELECT * FROM wallet WHERE address = '$bill'"); 
         
       $connom = $result->num_rows; 
         return $connom;  
    }

        public function get_users6ary1($email) 
    { 
        $result = $this->_db->query("SELECT * FROM wallet WHERE email = '$email'"); 
         
       $connom = $result->num_rows; 
         return $connom;  
    }
    public function get_users6ary2($bill) 
    { 
        $result = $this->_db->query("SELECT user_login email FROM security_users WHERE ID = '$bill'"); 
         
        $users10 = $result; 
        return $users10;   
    }

      public function get_users6b($doc) 
    { 
        $result = $this->_db->query("SELECT * FROM security_users WHERE identy_user = '$doc'"); 
         
       $connom = $result->num_rows; 
         return $connom;  
    }
     public function get_users6bf($spon) 
    { 

        $result = $this->_db->query("SELECT * FROM security_users WHERE username = '$spon'"); 
         
       $users10 = $result; 
        return $users10;  
    }
     public function get_users6bh($Id_Parent) 
    { 
        $result = $this->_db->query("SELECT * FROM security_users WHERE Id_Parent = '$Id_Parent'"); 
         
       $connom = $result->num_rows; 
         return $connom;  
    }

     public function get_users6bk($bill,$UscodAc) 
    { 
        $result = $this->_db->query("SELECT * FROM wallet WHERE address = '$bill' AND code = '$UscodAc' AND state = '1'"); 
         
       $connom = $result->num_rows; 
         return $connom;  
    }

      public function get_users6c($username) 
    { 
        $result = $this->_db->query("SELECT * FROM security_users WHERE username = '$username'"); 
         
       $connom = $result->num_rows; 
         return $connom;  
    }

       public function get_users7($pais) 
    { 
        $result = $this->_db->query("SELECT * FROM dpto_data WHERE ID_country = '$pais' ORDER BY name_dpto asc"); 
         
       $users10 = $result; 
        return $users10;  
    }
        public function get_users7a($id) 
    { 
        $result = $this->_db->query("SELECT * FROM city_data WHERE ID_dpto='$id' ORDER BY  name_city asc"); 
         
       $users10 = $result; 
        return $users10;  
    }
    public function get_users8b1($orden) 
    { 
        
        $result = $this->_db->query("SELECT * FROM ps_order_detail WHERE id_order='$orden'"); 
         
       $users10 = $result; 
        return $users10;  
    }
    public function get_users8b11($produc) 
    { 
       
        $result = $this->_db->query("SELECT * FROM ps_product_lang WHERE id_product='$produc'"); 
         
       $users10 = $result; 
        return $users10;  
    }
     public function get_users6($cref) 
    { 

        $result = $this->_db->query("SELECT * FROM config_data"); 
        $users101 =  $result;
        return $users101;  
    } 
       public function get_users10($identy) 
    { 
        $result = $this->_db->query("SELECT * FROM ps_customer WHERE cedula = '$identy'"); 
         
       $users10 = $result; 
        return $users10;  
    }
    public function get_users12($customer) 
    { 

         $result = $this->_db->query("SELECT  lo.*,po.* FROM ps_loyalty lo,ps_orders po,ps_customer ic WHERE lo.id_order = po.id_order AND po.id_customer = ic.id_customer AND po.id_customer  = '$customer' AND po.valid = '1' AND po.paid = '0' AND ic.ccosto = '1' ORDER BY po.id_order DESC"); 
       $users10 = $result; 
        return $users10;  
    }

public function get_users1244($customer,$finicial,$ffinal) 
    { 
         $result = $this->_db->query("SELECT  lo.*,po.*,ic.cedula FROM ps_loyalty lo,ps_orders po,ps_customer ic WHERE lo.id_order = po.id_order AND po.id_customer = ic.id_customer AND po.id_customer  = '$customer' AND po.valid = '1' AND po.invoice_date BETWEEN '$finicial' AND '$ffinal' AND  ic.ccosto = '1' ORDER BY po.id_order DESC"); 
       $users10 = $result; 
        return $users10;  
    }

public function get_users1244ad($customer,$finicial,$ffinal) 
    { 
         $result = $this->_db->query("SELECT  lo.*,po.*,ic.cedula FROM ps_loyalty lo,ps_orders po,ps_customer ic WHERE lo.id_order = po.id_order AND po.id_customer = ic.id_customer AND po.valid = '1' AND po.invoice_date BETWEEN '$finicial' AND '$ffinal' AND  ic.ccosto = '1' ORDER BY po.id_order DESC"); 
       $users10 = $result; 
        return $users10;  
    }

public function get_users1244sales($customer,$finicial,$ffinal) 
    { 
         $result = $this->_db->query("SELECT  lo.*,po.*,ic.cedula FROM ps_loyalty lo,ps_orders po,ps_customer ic WHERE lo.id_order = po.id_order AND po.id_customer = ic.id_customer AND po.id_customer  = '$customer' AND po.valid = '1' AND po.invoice_date BETWEEN '$finicial' AND '$ffinal' AND  ic.ccosto = '1' ORDER BY po.id_order DESC"); 
       $users10 = $result; 
        return $users10;  
    }

public function get_users1244adsales($customer,$finicial,$ffinal) 
    { 
         $result = $this->_db->query("SELECT  lo.*,po.*,ic.cedula FROM ps_loyalty lo,ps_orders po,ps_customer ic WHERE lo.id_order = po.id_order AND po.id_customer = ic.id_customer AND po.valid = '1' AND po.invoice_date BETWEEN '$finicial' AND '$ffinal' AND  ic.ccosto = '1' ORDER BY po.id_order DESC"); 
       $users10 = $result; 
        return $users10;  
    }
public function get_users1244salescons($customer,$finicial,$ffinal) 
    { 
         $result = $this->_db->query("SELECT  sum(total_paid_tax_incl) total_paid_tax_incl,ic.cedula FROM ps_loyalty lo,ps_orders po,ps_customer ic WHERE lo.id_order = po.id_order AND po.id_customer = ic.id_customer AND po.id_customer  = '$customer' AND po.valid = '1' AND po.invoice_date BETWEEN '$finicial' AND '$ffinal' AND  ic.ccosto = '1' GROUP BY po.id_customer"); 
       $users10 = $result; 
        return $users10;  
    }

public function get_users1244adsalescons($customer,$finicial,$ffinal) 
    { 


         $result = $this->_db->query("SELECT  sum(points) points,sum(total_paid_tax_incl) total_paid_tax_incl,ic.cedula FROM ps_loyalty lo,ps_orders po,ps_customer ic WHERE lo.id_order = po.id_order AND po.id_customer = ic.id_customer AND po.valid = '1' AND po.invoice_date BETWEEN '$finicial' AND '$ffinal' AND  ic.ccosto = '1' GROUP BY po.id_customer"); 
       $users10 = $result; 
        return $users10;  
    }

  public function get_users13($custom) 
    { 
        $result = $this->_db->query("SELECT * FROM ps_customer WHERE id_customer = '$custom'"); 
         
        $users10 = $result; 
        return $users10; 
    }
      public function get_users14($cedus) 
    { 
        $result = $this->_db->query("SELECT * FROM security_users WHERE identy_user = '$cedus'"); 
         
        $users10 = $result; 
        return $users10; 
    }

     public function get_users15($userid,$apass) 
    { 
        $result = $this->_db->query("SELECT * FROM security_users WHERE ID = '$userid' AND  user_psw = '$apass'"); 
         
      $connom = $result->num_rows; 
         return $connom;
    }
     public function get_users15u($userid,$passo) 
    { 
        $result = $this->_db->query("UPDATE  security_users SET user_psw = '$passo' WHERE ID = '$userid'"); 
         
   
    }
        public function get_users15oa($userid) 
    { 
        $result = $this->_db->query("SELECT * FROM security_users WHERE ID = '$userid'"); 
         
     $users10 = $result; 
        return $users10;  
    }

     public function get_users15pi($identy,$passot) 
    { 
        $result = $this->_db->query("UPDATE  ps_customer SET user_psw = '$passot' WHERE cedula = '$identy'"); 
         
   
    }
     public function get_usersd($dato) 
    { 

      
        $result = $this->_db->query("SELECT * FROM docus_admin ORDER BY ID DESC");  
        $users11 = $result; 
        return $users11; 
    }

      public function get_usersdel($id) 
    { 

      
        $result = $this->_db->query("DELETE FROM docus_admin WHERE ID = '$id'");  
    }

      public function get_usersdelal($id) 
    { 

      
        $result = $this->_db->query("ALTER TABLE docus_admin AUTO_INCREMENT  = 1");  
    }
   public function get_users12b($doc) 
    { 

     
        $result = $this->_db->query("SELECT MAX(id_customer) AS id FROM ps_customer");  
        $users11 = $result; 
        return $users11; 
    }
  public function get_users12b1($id_customer) 
    { 

      
   $result = $this->_db->query("SELECT id_customer,firstname,lastname
   FROM  `ps_customer` 
   WHERE  id_customer =   '$id_customer'");  
   
    $users11 = $result; 
    return $users11;
    }

   public function get_users12b2($state) 
    { 

      
   $result = $this->_db->query("SELECT * FROM ps_state WHERE id_state = '$state'");  
   $users11 = $result; 
   return $users11;
    }

    public function get_users5($usuariop) 
    { 
        $result = $this->_db->query("SELECT * FROM security_users WHERE ID = '$usuariop'"); 
         
        $users10 = $result; 
        return $users10; 
    }

 public function get_users5_a($usuariop) 
    { 
        $result = $this->_db->query("SELECT * FROM security_users_c2 WHERE ID = '$usuariop'"); 
         
        $users10 = $result; 
        return $users10; 
    }

public function get_users5_b($usuariop) 
    { 
        $result = $this->_db->query("SELECT * FROM security_users_c2 WHERE ID = '$usuariop'"); 
         
        $users10 = $result; 
        return $users10; 
    }

public function get_users5ide($usuariop) 
    { 
        $result = $this->_db->query("SELECT * FROM security_users WHERE identy_user = '$usuariop'"); 
         
        $users10 = $result; 
        return $users10; 
    }

          public function get_users8($ident) 
    { 
        $result = $this->_db->query("SELECT * FROM country_data ORDER BY name_country asc"); 
         
       $users10 = $result; 
        return $users10;  
    }

    public function get_users9($ident) 
    { 
        $result = $this->_db->query("SELECT * FROM required_register WHERE ID = '1'"); 
         
       $users10 = $result; 
        return $users10;  
    }
   public function get_users9a($ident) 
    { 
        $result = $this->_db->query("SELECT * FROM required_register WHERE ID = '2'"); 
         
       $users10 = $result; 
        return $users10;  
    }

   public function get_users9b($ident) 
    { 
        $result = $this->_db->query("SELECT * FROM required_register WHERE ID = '3'"); 
         
       $users10 = $result; 
        return $users10;  
    }

          public function get_users9c($ident) 
    { 
        $result = $this->_db->query("SELECT * FROM required_register WHERE ID = '4'"); 
         
       $users10 = $result; 
        return $users10;  
    }

          public function get_users9d($ident) 
    { 
        $result = $this->_db->query("SELECT * FROM required_register WHERE ID = '5'"); 
         
       $users10 = $result; 
        return $users10;  
    }

          public function get_users9e($ident) 
    { 
        $result = $this->_db->query("SELECT * FROM required_register WHERE ID = '6'"); 
         
       $users10 = $result; 
        return $users10;  
    }

          public function get_users9f($ident) 
    { 
        $result = $this->_db->query("SELECT * FROM required_register WHERE ID = '7'"); 
         
       $users10 = $result; 
        return $users10;  
    }

          public function get_users9g($ident) 
    { 
        $result = $this->_db->query("SELECT * FROM required_register WHERE ID = '8'"); 
         
       $users10 = $result; 
        return $users10;  
    }

          public function get_users9h($ident) 
    { 
        $result = $this->_db->query("SELECT * FROM required_register WHERE ID = '9'"); 
         
       $users10 = $result; 
        return $users10;  
    }


          public function get_users9i($ident) 
    { 
        $result = $this->_db->query("SELECT * FROM required_register WHERE ID = '10'"); 
         
       $users10 = $result; 
        return $users10;  
    }

          public function get_users9j($ident) 
    { 
        $result = $this->_db->query("SELECT * FROM required_register WHERE ID = '11'"); 
         
       $users10 = $result; 
        return $users10;  
    }

          public function get_users9k($ident) 
    { 
        $result = $this->_db->query("SELECT * FROM required_register WHERE ID = '12'"); 
         
       $users10 = $result; 
        return $users10;  
    }

    
          public function get_users9l($ident) 
    { 
        $result = $this->_db->query("SELECT * FROM required_register WHERE ID = '13'"); 
         
       $users10 = $result; 
        return $users10;  
    }

          public function get_users9m($ident) 
    { 
        $result = $this->_db->query("SELECT * FROM required_register WHERE ID = '14'"); 
         
       $users10 = $result; 
        return $users10;  
    }

          public function get_users9o($ident) 
    { 
        $result = $this->_db->query("SELECT * FROM required_register WHERE ID = '15'"); 
         
       $users10 = $result; 
        return $users10;  
    }

          public function get_users9p($ident) 
    { 
        $result = $this->_db->query("SELECT * FROM required_register WHERE ID = '16'"); 
         
       $users10 = $result; 
        return $users10;  
    }

          public function get_users9q($ident) 
    { 
        $result = $this->_db->query("SELECT * FROM required_register WHERE ID = '17'"); 
         
       $users10 = $result; 
        return $users10;  
    }

          public function get_users9r($ident) 
    { 
        $result = $this->_db->query("SELECT * FROM required_register WHERE ID = '18'"); 
         
       $users10 = $result; 
        return $users10;  
    }

          public function get_users9s($ident) 
    { 
        $result = $this->_db->query("SELECT * FROM required_register WHERE ID = '19'"); 
         
       $users10 = $result; 
        return $users10;  
    }

          public function get_users9t($ident) 
    { 
        $result = $this->_db->query("SELECT * FROM required_register WHERE ID = '20'"); 
         
       $users10 = $result; 
        return $users10;  
    }

          public function get_users9u($ident) 
    { 
        $result = $this->_db->query("SELECT * FROM required_register WHERE ID = '21'"); 
         
       $users10 = $result; 
        return $users10;  
    }

          public function get_users9v($ident) 
    { 
        $result = $this->_db->query("SELECT * FROM required_register WHERE ID = '22'"); 
         
       $users10 = $result; 
        return $users10;  
    }

       public function get_usersliqui($identy,$finicial) 
    { 
      
        $result = $this->_db->query("SELECT * FROM liqui WHERE afiliado = '$identy' AND periodo = '$finicial'"); 
         
       $users10 = $result; 
        return $users10;  
    }
      public function get_usersliquiad($identy,$finicial) 
    { 
      
        $result = $this->_db->query("SELECT * FROM liqui WHERE periodo = '$finicial'"); 
         
       $users10 = $result; 
        return $users10;  
    }

       public function get_usersliquicons($identy,$finicial) 
    { 
      
        $result = $this->_db->query("SELECT afiliado,periodo,sum(cuenta) cuenta,sum(billetera) billetera,sum(puntos) puntos FROM liqui WHERE afiliado = '$identy' AND periodo = '$finicial' GROUP BY afiliado"); 
         
       $users10 = $result; 
        return $users10;  
    }
      public function get_usersliquiadcons($identy,$finicial) 
    { 
     
        $result = $this->_db->query("SELECT afiliado,periodo,sum(cuenta) cuenta,sum(billetera) billetera,sum(puntos) puntos FROM liqui WHERE periodo = '$finicial' AND afiliado <> '0' GROUP BY afiliado");  
         
       $users10 = $result; 
        return $users10;  
    }

  public function get_response($usuario) 
    { 
         
        $result = $this->_db->query("SELECT sum(total_comisiones) total_comisiones FROM comision WHERE cedula = '$usuario' AND concepto = '1'"); 
        $users10 = $result; 
        return $users10; 
    } 
     public function get_response1($usuario) 
    { 
         
        $result = $this->_db->query("SELECT sum(total_comisiones) total_comisiones FROM comision WHERE cedula = '$usuario' AND concepto = '2'"); 
        $users10 = $result; 
        return $users10; 
    } 
        public function get_response2($usuario) 
    { 
         
        $result = $this->_db->query("SELECT sum(total_comisiones) total_comisiones FROM comision WHERE cedula = '$usuario' AND concepto = '3'"); 
        $users10 = $result; 
        return $users10; 
    } 

     public function get_response23($usuario) 
    { 
         
        $result = $this->_db->query("SELECT sum(total_comisiones) total_comisiones FROM comision WHERE cedula = '$usuario' AND concepto = '5'"); 
        $users10 = $result; 
        return $users10; 
    } 


  public function get_response234($usuario) 
    { 
         
        $result = $this->_db->query("SELECT sum(total_comisiones) total_comisiones FROM comision WHERE cedula = '$usuario' AND concepto = '4'"); 
        $users10 = $result; 
        return $users10; 
    } 


  public function get_response2345($usuario) 
    { 
         
        $result = $this->_db->query("SELECT sum(total_comisiones) total_comisiones FROM comision WHERE cedula = '$usuario' AND concepto = '6'"); 
        $users10 = $result; 
        return $users10; 
    } 

 public function get_response23456($usuario) 
    { 
         
        $result = $this->_db->query("SELECT sum(total_comisiones) total_comisiones FROM comision WHERE cedula = '$usuario' AND concepto = '7'"); 
        $users10 = $result; 
        return $users10; 
    } 

 public function get_users51($lft,$rgt) 
    { 

      
        $result = $this->_db->query("SELECT * FROM security_users WHERE lft BETWEEN  '$lft' AND  '$rgt' AND activo_tree = '1' ORDER BY lft");  
        $users11 = $result; 
        return $users11; 
    }

 public function get_users8mm($lft,$rgt,$usuariop) 
    { 

      
        $result = $this->_db->query("SELECT * FROM security_users WHERE lft BETWEEN  '$lft' AND  '$rgt' AND ID <> '1' AND activo_tree = '1' ORDER BY lft");  
        $users11 = $result; 
        return $users11; 
    }

 public function get_users51_a($lft,$rgt) 
    { 

      
        $result = $this->_db->query("SELECT * FROM security_users_c2 WHERE lft BETWEEN  '$lft' AND  '$rgt' AND activo_tree = '1' ORDER BY lft");  
        $users11 = $result; 
        return $users11; 
    }

public function get_users51_b($lft,$rgt) 
    { 

      
        $result = $this->_db->query("SELECT * FROM security_users_c3 WHERE lft BETWEEN  '$lft' AND  '$rgt' AND activo_tree = '1' ORDER BY lft");  
        $users11 = $result; 
        return $users11; 
    }

 public function get_users33($lft,$rgt) 
    { 
        $result = $this->_db->query("SELECT * FROM security_users WHERE lft BETWEEN  '$lft' AND  '$rgt' AND activo_tree = '1' ORDER BY lft"); 
         $connom = $result->num_rows; 
         return $connom; 
    } 

public function get_users33_a($lft,$rgt) 
    { 
        $result = $this->_db->query("SELECT * FROM security_users_c2 WHERE lft BETWEEN  '$lft' AND  '$rgt' AND activo_tree = '1' ORDER BY lft"); 
         $connom = $result->num_rows; 
         return $connom; 
    } 

public function get_users33_b($lft,$rgt) 
    { 
        $result = $this->_db->query("SELECT * FROM security_users_c3 WHERE lft BETWEEN  '$lft' AND  '$rgt' AND activo_tree = '1' ORDER BY lft"); 
         $connom = $result->num_rows; 
         return $connom; 
    } 
    
public function get_users6ain_res($rutaf,$user) 
    { 
        $result = $this->_db->query("UPDATE security_users SET user_photo = '$rutaf' WHERE ID = '$user'"); 
    }
    
    
    public function get_users6ain_res1($rutaf,$user) 
    { 
        $result = $this->_db->query("UPDATE security_users SET user_photo_national = '$rutaf' WHERE ID = '$user'"); 
    }
   

    public function getimail($user) 
    { 
     $retorno=[];
    $dat=[];
    $cont=0;
    
    $qr="SELECT `ID`,`identy_user`,`ape_user`,`name_user`,`user_login` FROM `security_users` WHERE `ID`='$user'"; 
    if($resul=$this->_db->query($qr)){
        while($row=mysqli_fetch_array($resul, MYSQLI_ASSOC)){
            $dat[$cont]=$row;
            $cont++; 
        }  
        $retorno["data"]=$dat;
        $error=["code"=>"0","mej"=>"Informacion cargada con exito"];
        $retorno["error"]=$error;
        }else{
        $retorno=["error"=>["code"=>"1","mej"=>"Fallo al crear el grupo","msqlierror"=>$this->_db->error]]; 
        } 
        $resul=null;
        return  $retorno;  
    
    } 
    public function getiBillUser($user) 
    { 
     $retorno=[];
    $dat=[];
    $cont=0;
    $qr="SELECT `bill` FROM `security_users` WHERE `ID`='$user'"; 
    if($resul=$this->_db->query($qr)){
        while($row=mysqli_fetch_array($resul, MYSQLI_ASSOC)){
            $dat[$cont]=$row;
            $cont++; 
        }  
        $retorno["data"]=$dat;
        $error=["code"=>"0","mej"=>"Informacion cargada con exito"];
        $retorno["error"]=$error;
        }else{
        $retorno=["error"=>["code"=>"1","mej"=>"Fallo al crear el grupo","msqlierror"=>$this->_db->error]]; 
        } 
        $resul=null;
        return  $retorno;  
    } 
    public function getCodeAlma($user) 
    { 
    $retorno=[];
    $dat=[];
    $cont=0;
    $qr="SELECT `token`FROM `security_users` WHERE `ID`='$user';";
    if($resul=$this->_db->query($qr)){
        while($row=mysqli_fetch_array($resul, MYSQLI_ASSOC)){
            $dat[$cont]=$row;
            $cont++; 
        }  
        $retorno["data"]=$dat;
        $error=["code"=>"0","mej"=>"Informacion cargada con exito"];
        $retorno["error"]=$error;
        }else{
        $retorno=["error"=>["code"=>"1","mej"=>"Fallo al crear el grupo","msqlierror"=>$this->_db->error]]; 
        } 
        $resul=null;
        return  $retorno;  
    
    }
    public function getMinMont() 
    { 
    $retorno=[];
    $dat=[];
    $cont=0;
    $qr="SELECT `minretiro` FROM `config_data` WHERE `ID`='1'";
    if($resul=$this->_db->query($qr)){
        while($row=mysqli_fetch_array($resul, MYSQLI_ASSOC)){
            $dat[$cont]=$row;
            $cont++; 
        }  
        $retorno["data"]=$dat;
        $error=["code"=>"0","mej"=>"Informacion cargada con exito"];
        $retorno["error"]=$error;
        }else{
        $retorno=["error"=>["code"=>"1","mej"=>"Fallo al crear el grupo","msqlierror"=>$this->_db->error]]; 
        } 
        $resul=null;
        return  $retorno;  
    
    }
    public function getMaxMont() 
    { 
    $retorno=[];
    $dat=[];
    $cont=0;
    $qr="SELECT  `maxretiro` FROM `config_data` WHERE `ID`='1'";
    if($resul=$this->_db->query($qr)){
        while($row=mysqli_fetch_array($resul, MYSQLI_ASSOC)){
            $dat[$cont]=$row;
            $cont++; 
        }  
        $retorno["data"]=$dat;
        $error=["code"=>"0","mej"=>"Informacion cargada con exito"];
        $retorno["error"]=$error;
        }else{
        $retorno=["error"=>["code"=>"1","mej"=>"Fallo al crear el grupo","msqlierror"=>$this->_db->error]]; 
        } 
        $resul=null;
        return  $retorno;  
    
    }
    public function getPetiPend($user) 
    { 
    $retorno=[];
    $dat=[];
    $cont=0;
    $qr="SELECT COUNT(`ID`) cuenta FROM `solicit_bill` WHERE `ID_user`='1' AND `state`='0'";
    if($resul=$this->_db->query($qr)){
        while($row=mysqli_fetch_array($resul, MYSQLI_ASSOC)){
            $dat[$cont]=$row;
            $cont++; 
        }  
        $retorno["data"]=$dat;
        $error=["code"=>"0","mej"=>"Informacion cargada con exito"];
        $retorno["error"]=$error;
        }else{
        $retorno=["error"=>["code"=>"1","mej"=>"Fallo al crear el grupo","msqlierror"=>$this->_db->error]]; 
        } 
        $resul=null;
        return  $retorno;  
    
    }
    public function createCodePeticion($user,$code) 
    { 
     $retorno=[];
    $dat=[];
    $cont=0;
    
    $qr="UPDATE `security_users` SET `token`='$code'WHERE `ID`='$user'"; 
    if($resul=$this->_db->query($qr)){
      
        $retorno["data"]="";
        $error=["code"=>"0","mej"=>"Informacion cargada con exito"];
        $retorno["error"]=$error;
        }else{
        $retorno=["error"=>["code"=>"1","mej"=>"Fallo al crear el grupo","msqlierror"=>$this->_db->error]]; 
        } 
        $resul=null;
        return  $retorno;  
    
    } //
    
    public function saldocomision($user) 
    { 
     $retorno;
    $comispag;
    $comissol;
    $cont=0;
    $qr="SELECT SUM(`total_comisiones`) sumacomi FROM `comision` WHERE `cedula`='$user' AND `concepto`<>'3'";
    if($resul=$this->_db->query($qr)){
        while($row=mysqli_fetch_array($resul, MYSQLI_ASSOC)){
            $comispag=$row["sumacomi"];

        }  
    }
    $qr2="SELECT SUM(`total_comisiones`) sumacomi FROM `comision` WHERE `cedula`='$user1' AND `concepto`=='3'";
    if($resul2=$this->_db->query($qr2)){
        while($row=mysqli_fetch_array($resul2, MYSQLI_ASSOC)){
            $comissol=$row["sumacomi"];
        } 
    } 
    $retorno=intval($comispag)-intval($comissol);
    return($retorno);
    
 }
 public function AaddSolBill($user,$bill,$minmonto,$state, $feha,$fee,$fetact)
    { 
     $retorno=[];
    $dat=[];
    $cont=0;
    
    $qr="INSERT INTO `solicit_bill`( `ID_user`, `BILL_user`, `valor`, `state`, `fecha`, `fee`, `fecha_activa`) VALUES ('$user','$bill','$minmonto','$state', '$feha','$fee','$fetact')"; 
    $qrsa="INSERT INTO `comision`(`codigo`, `cedula`, `cedula_otor`, `total_comisiones`,`concepto`, `estado`, `fecha`) VALUES ('','$user','$user','$minmonto','3','0',NOW())";
    $resul=$this->_db->query($qrsa);
    if($resul=$this->_db->query($qr)){
      
        $retorno["data"]="";
        $error=["code"=>"0","mej"=>"Solicitud de retiro de ganancia creada correctamente"];
        $retorno["error"]=$error;
        }else{
        $retorno=["error"=>["code"=>"1","mej"=>"No se pudo procesar la petición, por favor intentelo nuevamente mas tarde","msqlierror"=>$this->_db->error]]; 
        } 
        $resul=null;
        return  $retorno;  
    
    }
    /**
     * Ingreso las nuevas funciones para mejorar el sistema
     * Agosto 6 de 2020
     * Carlos Andres Martinez
     */
    /**
     *  Funcion que se encarga de adicionar las url de los videos.
     */
    public function crear_matapoyo_modulo($url, $titulo, $descripcion)
    {
        //DELETE FROM `mat_apoyo_videos` WHERE `mat_apoyo_videos`.`id` = 8"
        $result = $this->_db->query("INSERT INTO mat_apoyo_videos (url, titulo, descripcion) VALUES ('$url' , '$titulo', '$descripcion')");
        $connom = $result->num_rows;
        return $connom;
    }
    /**
     *  Funcion que se encarga de eliminar las url de los videos.
     */
    public function eliminar_matapoyo_modulos($id)
    {
        $result = $this->_db->query("DELETE FROM `mat_apoyo_videos` WHERE `mat_apoyo_videos`.`id` = $id");
        $connom = $result->num_rows;
        return $connom;
    }
   
} 

?>