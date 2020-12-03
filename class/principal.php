<?php

require_once "config/bd_config.php";

class Muestra extends mysql
{
    public function __construct()
    {
        parent::__construct();
    }

    public function get_users7($username, $passo)
    {
        $result = $this->_db->query("SELECT * FROM security_users WHERE user_login = '$username' AND user_psw = '$passo'");

        $conaut = $result->num_rows;

        return $conaut;
    }

    public function get_commi($usuariop, $estado, $dateIn, $dateFin, $limit)
    {
        $result = $this->_db->query("SELECT `cedula`,`cedula_otor`,`fecha`,`concepto`,`total_comisiones`,`ciclo` FROM `comision` WHERE  `cedula` = $usuariop AND `fecha` BETWEEN '$dateIn' AND '$dateFin' AND concepto = '2' ORDER BY fecha DESC");



        $users10 = $result;
        return $users10;
    }


    public function get_commishop($emails)
    {
        $result = $this->_db->query("(SELECT wp.ID,wp.post_date,pm.post_id,oi.order_item_id,oi.order_item_name,pm.meta_value FROM
`stss_postmeta` pm,stss_posts wp,stss_woocommerce_order_items oi WHERE pm.post_id = wp.ID AND pm.post_id = oi.order_id AND
pm.meta_key = '_billing_email' AND pm.meta_value='$emails' AND wp.post_status = 'wc-processing')
UNION (SELECT wp.ID,wp.post_date,pm.post_id,oi.order_item_id,oi.order_item_name,pm.meta_value
FROM `stss_postmeta` pm,stss_posts wp,stss_woocommerce_order_items oi WHERE pm.post_id = wp.ID AND pm.post_id = oi.order_id AND pm.meta_key = '_billing_email'
 AND pm.meta_value='$emails' AND wp.post_status = 'wc-completed')");

        $users10 = $result;
        return $users10;
    }


    public function get_commishopp($emails)
    {
        $result = $this->_db->query("(SELECT wp.ID,wp.post_date,pm.post_id,oi.order_item_id,oi.order_item_name,pm.meta_value FROM
`stss_postmeta` pm,stss_posts wp,stss_woocommerce_order_items oi WHERE pm.post_id = wp.ID AND pm.post_id = oi.order_id AND
pm.meta_key = '_billing_email' AND pm.meta_value='$emails' AND wp.post_status = 'wc-pending')");


        $users10 = $result;
        return $users10;
    }



    public function get_commishopsuma($emails)
    {
        $result = $this->_db->query("(SELECT wp.ID,wp.post_date,pm.post_id,oi.order_item_id,oi.order_item_name,pm.meta_value FROM
`stss_postmeta` pm,stss_posts wp,stss_woocommerce_order_items oi WHERE pm.post_id = wp.ID AND pm.post_id = oi.order_id AND
pm.meta_key = '_billing_email' AND pm.meta_value='$emails' AND wp.post_status = 'wc-processing')
UNION (SELECT wp.ID,wp.post_date,pm.post_id,oi.order_item_id,oi.order_item_name,pm.meta_value
FROM `stss_postmeta` pm,stss_posts wp,stss_woocommerce_order_items oi WHERE pm.post_id = wp.ID AND pm.post_id = oi.order_id AND pm.meta_key = '_billing_email'
 AND pm.meta_value='$emails' AND wp.post_status = 'wc-completed')");


        $users10 = $result;
        return $users10;
    }



    public function get_concept($usuariop)
    {
        $result = $this->_db->query("SELECT `concepto` FROM `concepto` WHERE `ID` = $usuariop");

        $users10 = $result;
        return $users10;
    }
    public function get_name($usuariop)
    {
        $result = $this->_db->query("SELECT `username` FROM `security_users` WHERE `ID` = $usuariop");

        $users10 = $result;
        return $users10;
    }

    public function get_bill_sum($usuariop, $estado)
    {
        $result = $this->_db->query("SELECT SUM(`valor`) AS `valor` FROM `solicit_bill` WHERE `state` = $estado AND `ID_user` = $usuariop");

        $users10 = $result;
        return $users10;
    }

    public function get_bill($usuariop, $estado, $dateIn, $dateFin, $limit)
    {
        $result = $this->_db->query("SELECT afiliado,sum(cuenta) cuenta,periodo FROM `liqui` WHERE `afiliado` = '$usuariop' GROUP BY periodo");


        $users10 = $result;
        return $users10;
    }

    public function get_billco($usuariop, $estado, $dateIn, $dateFin, $limit)
    {
        $result = $this->_db->query("SELECT sum(cuenta) cuenta FROM `liqui` WHERE `afiliado` = '$usuariop'");


        $users10 = $result;
        return $users10;
    }




    public function get_bill2($usuariop, $estado)
    {
        $result = $this->_db->query("SELECT * FROM `solicit_bill` WHERE  `state` = $estado");

        $users10 = $result;
        return $users10;
    }

    public function set_billState($IDBill, $estado)
    {
        $result = $this->_db->query("UPDATE `solicit_bill` SET `state`= '$estado' WHERE `ID` = '$IDBill'");
    }
    public function up_useradmin($userName, $userLogin, $nameUser, $apeUser, $dirUser, $telUser, $ciuUser, $dptoUser, $paisUser, $points, $usuariop)
    {
        $result = $this->_db->query("UPDATE `security_users` SET `username`='$userName',`user_login`='$userLogin',`name_user`='$nameUser',`ape_user`='$apeUser',`dir_user`='$dirUser',`tel_user`='$telUser',`pais_user`='$paisUser',`dpto_user`='$dptoUser',`ciu_user`='$ciuUser', `points` = '$points' WHERE `ID` = '$usuariop'");
    }


    public function up_user($userName, $userLogin, $nameUser, $apeUser, $dirUser, $telUser, $ciuUser, $dptoUser, $paisUser, $billUser, $usuariop)
    {
        $result = $this->_db->query("UPDATE `security_users` SET `username`='$userName',`user_login`='$userLogin',`name_user`='$nameUser',`ape_user`='$apeUser',`dir_user`='$dirUser',`tel_user`='$telUser',`pais_user`='$paisUser',`dpto_user`='$dptoUser',`ciu_user`='$ciuUser',bill='$billUser'  WHERE `ID` = '$usuariop'");
    }



    public function up_userPass($userName, $userLogin, $pass, $nameUser, $apeUser, $dirUser, $telUser, $ciuUser, $dptoUser, $paisUser, $points, $usuariop)
    {
        $result = $this->_db->query("UPDATE `security_users` SET `username`='$userName',`user_login`='$userLogin',`user_psw`='$pass',`name_user`='$nameUser',`ape_user`='$apeUser',`dir_user`='$dirUser',`tel_user`='$telUser',`pais_user`='$paisUser',`dpto_user`='$dptoUser',`ciu_user`='$ciuUser', `points` = '$points' WHERE `ID` = '$usuariop'");
    }

    public function get_userefss($usuariop, $lft, $rgt)
    {
        $result = $this->_db->query("SELECT ID FROM security_users WHERE lft BETWEEN '$lft' AND '$rgt' AND activo_tree = '1' AND ID <> '$usuariop'");

        $conaut = $result->num_rows;

        return $conaut;
    }

    public function get_usc1($uso)
    {
        $result = $this->_db->query("SELECT ID FROM security_users WHERE username = '$uso'");

        $conaut = $result->num_rows;

        return $conaut;
    }

    public function get_usc2($uso)
    {
        $result = $this->_db->query("SELECT ID FROM security_users_f2 WHERE username = '$uso'");

        $conaut = $result->num_rows;

        return $conaut;
    }

    public function get_usc3($uso)
    {
        $result = $this->_db->query("SELECT ID FROM security_users_f3 WHERE username = '$uso'");

        $conaut = $result->num_rows;

        return $conaut;
    }

    public function get_userefs1s($usuariop)
    {
        $result = $this->_db->query("SELECT ID FROM security_users WHERE creator = '$usuariop'");

        $conaut = $result->num_rows;

        return $conaut;
    }

    public function get_users5($usuariop)
    {
        $result = $this->_db->query("SELECT * FROM security_users WHERE ID = '$usuariop'");

        $users10 = $result;
        return $users10;
    }

    public function get_otor($otor)
    {
        $result = $this->_db->query("SELECT * FROM security_users WHERE ID = '$otor'");

        $users10 = $result;
        return $users10;
    }

    public function get_users5h($usuariop)
    {
        $result = $this->_db->query("SELECT COUNT(ID) as ID FROM security_users WHERE ID = '$usuariop'");

        $users10 = $result;
        return $users10;
    }



    public function get_users51($lft, $rgt)
    {
        $result = $this->_db->query("SELECT * FROM security_users WHERE lft BETWEEN  '$lft' AND  '$rgt' AND user_rol <> '8'  ORDER BY lft");
        $users11 = $result;
        return $users11;
    }

    public function get_users51jj($lft, $rgt, $usuariop)
    {
        $result = $this->_db->query("SELECT * FROM security_users WHERE creator = '$usuariop' AND activo_tree = '1' AND estado = '1'  ORDER BY ID");
        $users11 = $result;
        return $users11;
    }



    public function get_users51jj11O($lft, $rgt, $usuariop)
    {
        $result = $this->_db->query("SELECT * FROM security_users WHERE recompra = '0'  AND activo_tree = '1' ORDER BY ID");
        $users11 = $result;
        return $users11;
    }

    public function get_users51jjll($lft1, $rgt1, $usuariop)
    {
        $result = $this->_db->query("SELECT * FROM security_users WHERE activo_tree = '1'  ORDER BY lft");
        $users11 = $result;
        return $users11;
    }

    public function get_users51o($lft1, $rgt1)
    {
        $result = $this->_db->query("SELECT * FROM security_users WHERE lft1 BETWEEN  '$lft1' AND  '$rgt1' AND activo_tree = '1'  ORDER BY lft");
        $users11 = $result;
        return $users11;
    }

    public function get_users51h($lft, $rgt, $usuariop)
    {
        $result = $this->_db->query("SELECT * FROM security_users WHERE lft BETWEEN  '$lft' AND  '$rgt' AND ID <> '$usuariop' AND activo_tree = '1' ORDER BY lft");
        $users11 = $result;
        return $users11;
    }

    public function get_users51a($user)
    {
        $result = $this->_db->query("SELECT name_user,ape_user,pais_user,user_login,pack FROM security_users WHERE Id_Parent =   '$user' AND activo_tree = '1' ORDER BY ID DESC LIMIT 10");
        $users11 = $result;
        return $users11;
    }

    public function get_users51ab($lft, $rgt, $usuariop)
    {
        $result = $this->_db->query("SELECT COUNT(ID) as ID FROM security_users WHERE lft BETWEEN  '$lft' AND  '$rgt' AND ID <> '$usuariop' AND activo_tree = '1'");
        $users11 = $result;
        return $users11;
    }

    public function get_users51abt($lft, $rgt)
    {
        $result = $this->_db->query("SELECT COUNT(ID) as ID FROM security_users WHERE lft BETWEEN  '$lft' AND  '$rgt' AND user_rol = '3' AND activo_tree = '1'");
        $users11 = $result;
        return $users11;
    }

    public function get_users51abtt($lft, $rgt)
    {
        $result = $this->_db->query("SELECT COUNT(ID) as ID FROM security_users WHERE lft BETWEEN  '$lft' AND  '$rgt' AND user_rol = '2' AND activo_tree = '1'");
        $users11 = $result;
        return $users11;
    }

    public function get_users51abg($lft, $rgt)
    {
        $result = $this->_db->query("SELECT COUNT(ID) as ID FROM security_users WHERE lft BETWEEN  '$lft' AND  '$rgt' AND estado = '0' AND activo_tree = '1'");
        $users11 = $result;
        return $users11;
    }

    public function get_users51abgf($lft, $rgt)
    {
        $result = $this->_db->query("SELECT COUNT(ID) as ID FROM security_users WHERE lft BETWEEN  '$lft' AND  '$rgt' AND estado = '1' AND activo_tree = '1'");
        $users11 = $result;
        return $users11;
    }

    public function get_users51a2($rol)
    {
        $result = $this->_db->query("SELECT * FROM profile WHERE id_profile = '$rol'");
        $users11 = $result;
        return $users11;
    }

    public function get_usersa($usuario)
    {
        $result = $this->_db->query("SELECT * FROM security_users WHERE user_login = '$usuario'");
        $users10 = $result;
        return $users10;
    }

    public function get_response($usuario)
    {
        $result = $this->_db->query("SELECT sum(total_comisiones) total_comisiones FROM comision WHERE cedula = '$usuario' AND estado = '0'");
        $users10 = $result;
        return $users10;
    }

    public function get_response_admin($usuario)
    {
        $result = $this->_db->query("SELECT sum(total_comisiones) total_comisiones FROM comision WHERE  estado = '0'");
        $users10 = $result;
        return $users10;
    }

    public function get_response_admin2($usuario)
    {
        $result = $this->_db->query("SELECT sum(valor) comp FROM paid_efecty WHERE ID_user = '$usuario' AND state = '1'");
        $users10 = $result;
        return $users10;
    }

    public function get_response1($usuariop)
    {
        $result = $this->_db->query("SELECT sum(total_puntos) total_puntos FROM comision WHERE cedula = '$usuariop' AND estado = '0'");
        $users10 = $result;
        return $users10;
    }

    public function get_response_admin12($usuariop)
    {
        $result = $this->_db->query("SELECT sum(valor) comp FROM paid_efecty WHERE   state = '1'");
        $users10 = $result;
        return $users10;
    }

    public function get_response_admin1($usuariop)
    {
        $result = $this->_db->query("SELECT sum(total_puntos) total_puntos FROM comision WHERE  estado = '0'");
        $users10 = $result;
        return $users10;
    }

    public function get_response2($usuariop)
    {
        $result = $this->_db->query("SELECT sum(total_comisiones) total_comisiones FROM comision WHERE cedula = '$usuariop' AND concepto = '2'");
        $users10 = $result;
        return $users10;
    }

    public function get_response23($usuariop)
    {
        $result = $this->_db->query("SELECT sum(total_comisiones) total_comisiones FROM comision WHERE cedula = '$usuariop' AND concepto = '2' AND  estado = '0'");
        $users10 = $result;
        return $users10;
    }

    public function get_response23aa($usuariop)
    {
        $result = $this->_db->query("SELECT sum(total_comisiones) total_comisiones FROM comision WHERE cedula = '$usuariop' AND concepto = '2' AND  estado = '1'");
        $users10 = $result;
        return $users10;
    }

    public function get_response23aabb($usuariop, $leveo)
    {
        $result = $this->_db->query("SELECT sum(total_comisiones) total_comisiones FROM comision WHERE cedula = '$usuariop' AND concepto = '2'  AND ciclo = '$leveo'");
        $users10 = $result;
        return $users10;
    }


    public function get_response234($usuariop)
    {
        $result = $this->_db->query("SELECT sum(total_comisiones) total_comisiones FROM comision WHERE cedula = '$usuariop' AND concepto = '4' AND estado = '0'");
        $users10 = $result;
        return $users10;
    }

    public function get_response234aa($usuariop)
    {
        $result = $this->_db->query("SELECT sum(total_comisiones) total_comisiones FROM comision WHERE cedula = '$usuariop' AND concepto = '4' AND estado = '1'");
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

    public function get_users6($cref)
    {
        $result = $this->_db->query("SELECT * FROM config_data");
        $users101 = $result;
        return $users101;
    }

    public function get_users33($lft, $rgt)
    {
        $result = $this->_db->query("SELECT * FROM security_users WHERE lft BETWEEN  '$lft' AND  '$rgt'  ORDER BY lft");
        $connom = $result->num_rows;
        return $connom;
    }

    public function get_users33o($lft1, $rgt1)
    {
        $result = $this->_db->query("SELECT * FROM security_users WHERE lft1 BETWEEN  '$lft1' AND  '$rgt1' AND activo_tree = '1'  ORDER BY lft");
        $connom = $result->num_rows;
        return $connom;
    }

    public function get_users35($usuariop)
    {
        $result = $this->_db->query("SELECT * FROM security_users WHERE creator = '$usuariop'");

        $users10 = $result;
        return $users10;
    }

    public function get_users35g($calif)
    {
        $result = $this->_db->query("SELECT * FROM califications WHERE codigo = '$calif'");

        $users10 = $result;
        return $users10;
    }

    public function get_users8($ident)
    {
        $result = $this->_db->query("SELECT * FROM country_data ORDER BY name_country asc");

        $users10 = $result;
        return $users10;
    }

    public function get_users8tre($ident)
    {
        $result = $this->_db->query("SELECT * FROM dpto_data ORDER BY name_dpto asc");

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

    public function get_users10($identy)
    {
        $result = $this->_db->query("SELECT * FROM ps_customer WHERE cedula = '$identy'");

        $users10 = $result;
        return $users10;
    }

    public function get_users11($customer)
    {
        $result = $this->_db->query("SELECT  lo.*,po.* FROM ps_loyalty lo,ps_orders po,ps_customer ic WHERE lo.id_order = po.id_order AND po.id_customer = ic.id_customer AND po.id_customer  = '$customer' AND po.valid = '1' AND po.paid = '0' AND ic.ccosto = '1' ORDER BY po.id_order DESC");

        $users10 = $result;
        return $users10;
    }

    public function get_users11s($customer)
    {
        $result = $this->_db->query("SELECT SUM(lo.points) punto FROM ps_loyalty lo,ps_orders od WHERE lo.id_order = od.id_order AND od.valid = '1' AND od.paid = '0' AND  lo.id_customer = '$customer'");

        $users10 = $result;
        return $users10;
    }

    public function get_users11sa($customer)
    {
        $result = $this->_db->query("SELECT id_customer,sum(total_paid) paid FROM `ps_orders` WHERE id_customer = '$customer' AND   valid='1' AND paid = '0'");

        $users10 = $result;
        return $users10;
    }

    public function get_users12($customer)
    {
        $result = $this->_db->query("SELECT  lo.*,po.* FROM ps_loyalty lo,ps_orders po,ps_customer ic WHERE lo.id_order = po.id_order AND po.id_customer = ic.id_customer AND   po.valid = '1' AND po.paid = '0' AND ic.ccosto = '1' ORDER BY po.id_order DESC");

        $users10 = $result;
        return $users10;
    }

    public function get_users12s($customer)
    {
        $result = $this->_db->query("SELECT SUM(lo.points) punto FROM ps_loyalty lo,ps_orders od,ps_customer pc WHERE lo.id_order = od.id_order  AND od.id_customer = pc.id_customer AND od.valid = '1' AND od.paid = '0' AND pc.ccosto = '1'");

        $users10 = $result;
        return $users10;
    }

    public function get_users12sa($customer)
    {
        $result = $this->_db->query("SELECT SUM( po.total_paid ) paid FROM ps_orders po, ps_customer pc WHERE po.id_customer = pc.id_customer AND po.valid =  '1' AND po.paid =  '0' AND pc.ccosto =  '1'");

        $users10 = $result;
        return $users10;
    }

    public function get_users12a($customer)
    {
        $result = $this->_db->query("SELECT  sum(total_paid) total FROM ps_orders WHERE id_customer = '$customer' AND valid = '1' AND paid = '0'");

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

    public function get_users51c($lft, $rgt)
    {
        $result = $this->_db->query("SELECT * FROM security_users WHERE lft BETWEEN  '$lft' AND  '$rgt' AND estado = '1' ORDER BY lft");
        $users11 = $result;
        return $users11;
    }

    public function get_users51ch($lft, $rgt)
    {
        $result = $this->_db->query("SELECT ID, CONCAT(name_user, ' ', ape_user) as text, Id_Parent FROM security_users WHERE lft BETWEEN  '$lft' AND  '$rgt' ORDER BY lft");
        $users11 = $result;
        return $users11;
    }

    public function get_users51d($custom)
    {
        $result = $this->_db->query("SELECT SUM(lo.points) punto FROM ps_loyalty lo,ps_orders od WHERE lo.id_order = od.id_order AND od.valid = '1' AND od.paid = '0' AND  lo.id_customer = '$custom'");
        $users11 = $result;
        return $users11;
    }

    public function get_users51e($custom)
    {
        $result = $this->_db->query("SELECT SUM(lo.points) punto FROM ps_loyalty lo,ps_orders od,ps_customer pc WHERE lo.id_order = od.id_order  AND od.id_customer = pc.id_customer AND od.valid = '1' AND od.paid = '0' AND pc.ccosto = '1' ");
        $users11 = $result;
        return $users11;
    }

    public function get_usersd($dato)
    {
        $result = $this->_db->query("SELECT * FROM docus_admin ORDER BY ID DESC");
        $users11 = $result;
        return $users11;
    }

    public function get_userspro($id, $identy)
    {
        $result = $this->_db->query("UPDATE security_users SET user_psw = '$identy' WHERE ID = '$id' AND ID <> '1'");
    }

    public function get_userspro1($customer, $pass)
    {
        $result = $this->_db->query("UPDATE ps_customer  SET passwd = '$pass',secure_key = '$pass' WHERE id_customer  = '$customer'");
    }

    public function get_userspro12($id)
    {
        $result = $this->_db->query("SELECT e1.ID, e1.identy_user, e1.lft, e1.rgt
FROM security_users AS e1
JOIN security_users AS e2
WHERE e1.lft < e2.lft
AND e1.rgt > e2.rgt
AND e2.ID =  '$id'
AND e1.estado = '1'
");

        $users10 = $result;
        return $users10;
    }

    public function get_userspro12bc($id_rec, $id_otor, $total_puntos, $total_comis, $total_bill)
    {
        $result = $this->_db->query("INSERT INTO `comision`(`cedula`, `cedula_otor`,`total_puntos`, `total_comisiones`, `total_billetera`,`concepto`) VALUES ('$id_rec','$id_otor','$total_puntos','$total_comis','$total_bill','1')");
    }

    public function get_userspro12bch($u)
    {
        $result = $this->_db->query("DELETE FROM comision WHERE concepto = '1' AND estado = '0'");
    }

    public function get_users2r($usuariop)
    {
        $result = $this->_db->query("SELECT SUM(total_puntos) puntosd FROM comision WHERE cedula = '$usuariop' AND concepto = '1' AND estado = '0'");
        $users11 = $result;
        return $users11;
    }

    public function get_users2ra($usuariop)
    {
        $result = $this->_db->query("SELECT SUM(total_puntos) puntosd FROM comision WHERE  concepto = '1' AND estado = '0'");
        $users11 = $result;
        return $users11;
    }

    public function get_users2r1($usuariop)
    {
        $result = $this->_db->query("SELECT SUM(total_billetera) billetera FROM comision WHERE cedula = '$usuariop' AND concepto = '1' AND estado = '0'");
        $users11 = $result;
        return $users11;
    }

    public function get_users2ra1($usuariop)
    {
        $result = $this->_db->query("SELECT SUM(total_billetera) billetera FROM comision WHERE  concepto = '1' AND estado = '0'");
        $users11 = $result;
        return $users11;
    }

    public function get_users2r11($usuariop)
    {
        $result = $this->_db->query("SELECT SUM(total_comisiones) banco FROM comision WHERE cedula = '$usuariop' AND concepto = '1' AND estado = '0'");
        $users11 = $result;
        return $users11;
    }

    public function get_users2ra11($usuariop)
    {
        $result = $this->_db->query("SELECT SUM(total_comisiones) banco FROM comision WHERE  concepto = '1' AND estado = '0'");
        $users11 = $result;
        return $users11;
    }

    public function get_users2ra11p($customer)
    {
        $result = $this->_db->query("SELECT orf.product_id
FROM `ps_orders` ord
inner join ps_order_detail orf
on orf.id_order = ord.id_order
WHERE `id_customer` ='$customer' AND  ord.valid='1' AND orf.product_id = '110'  AND ord.paid = '0'   order by id_customer");
        $users11 = $result;
        return $users11;
    }

    public function get_users2ra11pp($usuariop)
    {
        $result = $this->_db->query("UPDATE `security_users` SET `user_rol`='2' WHERE ID = '$usuariop'");
    }

    public function get_users2ra11ppp($customer)
    {
        $result = $this->_db->query("UPDATE ps_customer_group SET id_group = '7' WHERE id_customer = '$customer'");
    }

    public function get_users2ra11pppp($customer)
    {
        $result = $this->_db->query("UPDATE ps_customer_group SET id_group = '3' WHERE id_customer = '$customer'");
    }

    public function get_users2ra11ppppp($usuariop)
    {
        $result = $this->_db->query("UPDATE `security_users` SET `estado`='1' WHERE ID = '$usuariop'");
    }

    public function get_users2ra11pppppp($usuariop)
    {
        $result = $this->_db->query("UPDATE `security_users` SET `estado`='0' WHERE ID = '$usuariop'");
    }

    public function get_usersttr($ident)
    {
        $result = $this->_db->query("SELECT * FROM periodo");

        $users10 = $result;
        return $users10;
    }

    public function get_users51_comis($usuariop)
    {
        $result = $this->_db->query("SELECT * FROM comision WHERE cedula = '$usuariop'");

        $users10 = $result;
        return $users10;
    }

    public function get_users51_comisau($usuariop)
    {
        $result = $this->_db->query("SELECT * FROM paid_efecty WHERE ID_user = '$usuariop' AND state = '1'");

        $users10 = $result;
        return $users10;
    }

    public function get_users511_comis($usuariop)
    {
        $result = $this->_db->query("SELECT  `cedula`, `cedula_otor`, `total_bonos`, `total_puntos`, `total_comisiones`, `total_billetera`, `concepto`, `estado`, `fecha`, `ciclo`, `level`,disscount FROM comision WHERE  estado = '0'");

        $users10 = $result;
        return $users10;
    }

    public function get_ser($usuariop, $lft, $rgt)
    {
        $result = $this->_db->query("SELECT * FROM security_users WHERE creator = '$usuariop' AND activo_tree = '1'");

        $connom = $result->num_rows;
        return $connom;
    }

    public function get_sar($usuariop)
    {
        $result = $this->_db->query("SELECT * FROM security_users_c2 WHERE ID = '$usuariop'");

        $connom = $result->num_rows;
        return $connom;
    }

    public function get_sir($usuariop)
    {
        $result = $this->_db->query("SELECT * FROM security_users_c3 WHERE ID = '$usuariop'");

        $connom = $result->num_rows;
        return $connom;
    }

    public function get_yar($conce)
    {
        $result = $this->_db->query("SELECT * FROM concepto WHERE ID = '$conce'");

        $connom = $result->num_rows;
        $users10 = $result;
        return $users10;
    }

    public function get_users5_a($usuariop)
    {
        $result = $this->_db->query("SELECT * FROM security_users_c2 WHERE ID = '$usuariop'");

        $users10 = $result;
        return $users10;
    }

    public function get_usersjaja($usuariop)
    {
        $result = $this->_db->query("SELECT * FROM paid_efecty WHERE ID_user = '$usuariop' ORDER BY fecha_activa DESC");

        $users10 = $result;
        return $users10;
    }

    public function get_users51_a($lft, $rgt)
    {
        $result = $this->_db->query("SELECT * FROM security_users_c2 WHERE lft BETWEEN  '$lft' AND  '$rgt' ORDER BY lft");
        $users11 = $result;
        return $users11;
    }

    public function get_users33_a($lft, $rgt)
    {
        $result = $this->_db->query("SELECT * FROM security_users_c2 WHERE lft BETWEEN  '$lft' AND  '$rgt' ORDER BY lft");
        $connom = $result->num_rows;
        return $connom;
    }

    public function get_users8mm($lft, $rgt, $usuariop)
    {
        $result = $this->_db->query("SELECT * FROM security_users WHERE lft BETWEEN  '$lft' AND  '$rgt' AND ID <> '$usuariop' AND activo_tree = '1' ORDER BY ID DESC LIMIT 5");
        $users11 = $result;
        return $users11;
    }

    public function get_respon27($pais)
    {
        $result = $this->_db->query("SELECT	name_country FROM `country_data` WHERE ID = '$pais'");
        $users11 = $result;
        return $users11;
    }

    public function get_country($ident)
    {
        $result = $this->_db->query("SELECT `ID`, `name_country` FROM `country_data1`");
        $users11 = $result;
        return $users11;
    }

    public function get_users51_act($lft)
    {
        $result = $this->_db->query("SELECT * FROM `paid_efecty` WHERE state = '0' ORDER BY fecha ASC");
        $users11 = $result;
        return $users11;
    }

    public function get_users51_act_apr($lft)
    {
        $result = $this->_db->query("SELECT * FROM `paid_efecty` WHERE state = '1' ORDER BY fecha ASC");
        $users11 = $result;
        return $users11;
    }


    public function get_userefssgg($lft, $rgt, $usuariop)
    {
        $result = $this->_db->query("SELECT name_user,ape_user,username,value,fecha,qpak,estado FROM  security_users sq,invoices ic,orders od WHERE sq.ID = ic.id_user AND ic.invoice_id = od.invoice_id AND lft between '$lft' AND '$rgt' ORDER BY fecha DESC LIMIT 10");
        $users11 = $result;
        return $users11;
    }

    public function get_userefssgg_ref($lft, $rgt, $usuariop)
    {
        $result = $this->_db->query("SELECT name_user,ape_user,username,pais_user  FROM  security_users sq WHERE lft between '$lft' AND '$rgt' ORDER BY ID DESC LIMIT 10");
        $users11 = $result;
        return $users11;
    }


    public function gert($usuariop)
    {
        $result = $this->_db->query("SELECT valori,valord FROM `afil_binario` WHERE iduser = '$usuariop'");
        $users11 = $result;
        return $users11;
    }

    public function gert1($usuariop)
    {
        $result = $this->_db->query("SELECT * FROM `afil_binario` WHERE iduser = '$usuariop'");
        $users11 = $result;
        return $users11;
    }

    public function get_users51_comis_bill($usuariop)
    {
        $result = $this->_db->query("SELECT * FROM `solicit_bill` WHERE ID_user = '$usuariop'");
        $users11 = $result;
        return $users11;
    }
    public function donates($usuariop)
    {
        $result = $this->_db->query("SELECT sum(value) resut FROM `orders` WHERE id_user = '$usuariop'");
        $users11 = $result;
        return $users11;
    }

    public function get_response_admin2ss($usuariop)
    {
        $result = $this->_db->query("SELECT sum(total_puntos) comis FROM `comision` WHERE cedula = '$usuariop' AND estado = '0' AND concepto = '3'");
        $users11 = $result;
        return $users11;
    }

    public function get_users511_bille($usuariop)
    {
        $result = $this->_db->query("SELECT sum(total_comisiones) comis FROM `comision` WHERE cedula = '$usuariop' AND concepto <> '3' AND estado = '0'");
        $users11 = $result;
        return $users11;
    }

    public function get_users511_billei($usuariop)
    {
        $result = $this->_db->query("SELECT sum(total_comisiones) comis FROM `comision` WHERE cedula = '$usuariop' AND concepto <> '3' AND estado = '1'");
        $users11 = $result;
        return $users11;
    }

    public function get_users511_billea($usuariop)
    {
        $result = $this->_db->query("SELECT sum(total_comisiones) comis FROM `comision` WHERE cedula = '$usuariop' AND concepto <> '3' AND estado = '0'");
        $users11 = $result;
        return $users11;
    }

    public function get_users511_bille_b1($usuariop)
    {
        $result = $this->_db->query("SELECT sum(total_comisiones) comis FROM `comision` WHERE cedula = '$usuariop' AND concepto = '4' AND estado = '0'");
        $users11 = $result;
        return $users11;
    }



    public function get_users51_act_transa($lft)
    {
        $result = $this->_db->query("SELECT * FROM `solicit_bill` WHERE state = '0'");
        $users11 = $result;
        return $users11;
    }

    public function get_users51_act_transa1($lft)
    {
        $result = $this->_db->query("SELECT * FROM `solicit_bill` WHERE state = '1'");
        $users11 = $result;
        return $users11;
    }

    public function get_useref($part)
    {
        $result = $this->_db->query("SELECT * FROM `security_users` WHERE ID = '$part'");
        $users11 = $result;
        return $users11;
    }

    /*
     * Obtener las categorias
     */
    public function getCategorias()
    {
        $query = $this->_db->query("SELECT * FROM tb_categoria");
        $result = array();
        while ($row = mysqli_fetch_array($query)) {
            $result[] = $row;
        }
        return $result;
    }

    /*
     * Insertar una categoria
     */
    public function setCategoria($nombre)
    {
        $result = $this->_db->query("INSERT INTO tb_categoria (`nombre`) VALUES ('$nombre')");
        return $result;
    }

    /*
     * Borrar una categoria
     */
    public function removeCategoria($id_categoria)
    {
        $result = $this->_db->query("DELETE FROM tb_categoria WHERE id_categoria = $id_categoria");
        return $result;
    }

    /*
     * Obtener todos los productos
     */
    public function getAllProductos()
    {
        $result = $this->_db->query("SELECT * FROM tb_producto");
        return $result;
    }

    /*
     * Obtener todos los productos por categoria
     * param $string producto
     */
    public function getProducto($id_categoria)
    {
        $result = $this->_db->query("SELECT * FROM tb_producto  where id_categoria = $id_categoria order by nombre");
        return $result;
    }

    /*
     * Insertar un producto
     */
    public function setProducto($id_categoria, $nombre, $url)
    {
        $sql = "INSERT INTO tb_producto (`id_categoria`, `nombre`, `url`) VALUES (`$id_categoria`,`$nombre`,`$url`)";
        $result = $this->_db->query($sql);
        return $result;
    }

    /*
     * Eliminar producto
     */
    public function removeProducto($id_producto)
    {
        $result = $this->_db->query("DELETE FROM tb_producto WHERE id_producto = $id_producto");
        return $result;
    }

    public function get_usd($tif)
    {
        $result = $this->_db->query("SELECT ID FROM security_users WHERE creator = '$tif' AND estado = '1'");
        $connom = $result->num_rows;
        return $connom;
    }

    public function get_usd1($tif)
    {
        $result = $this->_db->query("SELECT ID FROM security_users_f2 WHERE ID = '$tif'");
        $connom = $result->num_rows;
        return $connom;
    }

    public function get_usd2($tif)
    {
        $result = $this->_db->query("SELECT ID FROM security_users_f3 WHERE ID = '$tif'");
        $connom = $result->num_rows;
        return $connom;
    }

    public function get_usd3($tif)
    {
        $result = $this->_db->query("SELECT ID FROM security_users_f4 WHERE ID = '$tif'");
        $connom = $result->num_rows;
        return $connom;
    }
    public function get_usdpp($tif)
    {
        $result = $this->_db->query("SELECT sum(total_comisiones) donation FROM `comision` WHERE cedula = '$tif'");
        $users11 = $result;
        return $users11;
    }

    public function payo_admin($usuariop)
    {
        $result = $this->_db->query("SELECT od.*,iv.* FROM orders od,invoices iv WHERE od.invoice_id = iv.invoice_id GROUP BY iv.id_user");
        $users11 = $result;
        return $users11;
    }

    public function list_pack_test($user)
    {
        $result = $this->_db->query("SELECT od.*,iv.* FROM orders od,invoices iv WHERE od.invoice_id = iv.invoice_id AND iv.paid = '0'");
        $users11 = $result;
        return $users11;
    }

    public function invertion_daf($user)
    {
        $result = $this->_db->query("SELECT sum(iv.price_in_usd) price_in_usd FROM orders od,invoices iv WHERE od.invoice_id = iv.invoice_id AND iv.id_user = '$user'");
        $users11 = $result;
        return $users11;
    }

    public function consul_us($usuariop)
    {
        $result = $this->_db->query("SELECT username FROM security_users WHERE ID = '$usuariop'");
        $users11 = $result;
        return $users11;
    }

    public function gto_comi($usuariop)
    {
        $result = $this->_db->query("SELECT sum(total_comisiones) total_comis FROM comision WHERE cedula = '$usuariop' AND concepto = '1' AND estado = '0'");
        $users11 = $result;
        return $users11;
    }

    public function gto_comi_totis($usuariop)
    {
        $result = $this->_db->query("SELECT sum(total_comisiones) total_comis FROM comision WHERE cedula = '$usuariop'  AND estado = '1'");
        $users11 = $result;
        return $users11;
    }



    public function gto_comi_bina($usuariop)
    {
        $result = $this->_db->query("SELECT sum(total_comisiones) total_comis FROM comision WHERE cedula = '$usuariop' AND concepto = '3' AND estado = '0'");
        $users11 = $result;
        return $users11;
    }

    public function consul_pais($pais)
    {
        $result = $this->_db->query("SELECT *  FROM country_data WHERE ID = '$pais'");
        $users11 = $result;
        return $users11;
    }


    public function get_datos($liop)
    {
        $result = $this->_db->query("SELECT *  FROM security_users WHERE ID = '$liop'");
        $users11 = $result;
        return $users11;
    }

    public function get_users51_comis_pis($usuariop)
    {
        $result = $this->_db->query("SELECT * FROM solicit_bill WHERE ID_user = '$usuariop' order  by fecha desc");

        $users10 = $result;
        return $users10;
    }

    public function get_users51_comis_tot($usuariop)
    {
        $result = $this->_db->query("SELECT sum(total_comisiones) comis FROM comision WHERE cedula = '$usuariop' AND estado = '1' AND paid = '0'");

        $users10 = $result;
        return $users10;
    }

    public function reft($usuariop)
    {
        $result = $this->_db->query("SELECT * FROM afil_binario WHERE iduser = '$usuariop'");

        $users10 = $result;
        return $users10;
    }

    public function list_pack($user)
    {
        $result = $this->_db->query("SELECT * FROM `pack` ORDER BY ID DESC");

        $users10 = $result;
        return $users10;
    }


    public function updat_state_pak($usist, $usdt)
    {
        $result = $this->_db->query("UPDATE security_users SET estado = '1',	pack='$usdt'  WHERE ID = '$usist'");
    }




    public function updat_state_invos($invoice_id)
    {
        $result = $this->_db->query("UPDATE invoices SET paid  = '1' WHERE invoice_id = '$invoice_id'");
    }

    public function state_packs($pack_id)
    {
        $result = $this->_db->query("SELECT name_pack,	val_usd FROM `pack` WHERE ID = '$pack_id'");
        $users10 = $result;
        return $users10;
    }


    public function references($usuariop)
    {
        $result = $this->_db->query("SELECT COUNT(ID) ID FROM `security_users` WHERE Id_Parent  = '$usuariop' AND activo_tree = '1'");
        $users10 = $result;

        return $users10;
    }

    public function refersactus($user)
    {
        $result = $this->_db->query("SELECT name_user,ape_user,username,pack,user_login,tel_user FROM `security_users` WHERE Id_Parent  = '$user' AND activo_tree = '1'");
        $users10 = $result;
        return $users10;
    }

    public function refersactus_admin($user, $usdep, $corre)
    {
        $result = $this->_db->query("SELECT ID,name_user,ape_user,username,pack,user_login,tel_user,dir_user,ciu_user,dpto_user,pais_user,points FROM `security_users` WHERE  activo_tree = '1' AND username LIKE '%$usdep%' AND user_login LIKE '%$corre%'");
        $users10 = $result;
        return $users10;
    }

    public function refersactus_adminEmail($user, $emailUser, $usUser, $estUser)
    {
        $result = $this->_db->query("SELECT ID,name_user,ape_user,username,pack,user_login,tel_user,dir_user,ciu_user,dpto_user,pais_user FROM `security_users` WHERE  activo_tree = '1' AND user_login LIKE '%$emailUser%' AND username LIKE '%$usUser%' AND estado LIKE '%$estUser%'");
        $users10 = $result;
        return $users10;
    }



    public function referencesbi($usuariop, $lft, $rgt)
    {
        $result = $this->_db->query("SELECT COUNT(ID) ID FROM `security_users` WHERE lft BETWEEN '$lft' AND '$rgt' AND ID  <> '$usuariop' AND activo_tree = '1'");
        $users10 = $result;
        return $users10;
    }

    public function selrangepersonal($range)
    {
        $result = $this->_db->query("SELECT  `nombre`, `points_cover` FROM `categorias` WHERE id_categoria   = '$range'");
        $users10 = $result;
        return $users10;
    }

    public function refersactus_copuns($user)
    {
        $result = $this->_db->query("SELECT * FROM `wpk_cponsshif` WHERE `user_idfir` = '$user'");
        $users10 = $result;
        return $users10;
    }

    public function refersactus_copuns123($user)
    {
        $result = $this->_db->query("SELECT * FROM mat_apoyo");
        $users10 = $result;
        return $users10;
    }
    /**
     * Funcion para traer todos los videos cargados en el sistema.
     * Carlos Andrés Agosto 5 2020
     */
    public function getMatApoyoVideos($user)
    {
        $result = $this->_db->query("SELECT * FROM mat_apoyo_videos");
        $users10 = $result;
        return $users10;
    }


    public function selvoice($user)
    {
        $result = $this->_db->query("SELECT invoice_id FROM `invoices` ORDER BY invoice_id DESC");
        $users10 = $result;
        return $users10;
    }


    public function totcoddis($user)
    {
        $result = $this->_db->query("SELECT COUNT(ID_cupons) ID FROM `wpk_cponsshif` WHERE `user_idfir` = $user AND `stateshif` = 0");
        $users10 = $result;
        return $users10;
    }

    public function totcoddis123($user)
    {
        $result = $this->_db->query("SELECT zoom, youtube FROM config_data");
        $users10 = $result;
        return $users10;
    }

    public function totcoddisn($user)
    {
        $result = $this->_db->query("SELECT COUNT(ID_cupons) ID FROM `wpk_cponsshif` WHERE `user_idfir` = $user AND `stateshif` = 1");
        $users10 = $result;
        return $users10;
    }

    public function prentid($usist)
    {
        $result = $this->_db->query("SELECT Id_Parent FROM `security_users` WHERE `ID` = $usist");
        $users10 = $result;
        return $users10;
    }

    public function concult_comisns($usist, $part, $fett)
    {
        $result = $this->_db->query("SELECT COUNT(codigo) codi FROM `comision` WHERE `cedula` = '$part' AND cedula_otor = '$usist' AND concepto = '1' AND  fecha = '$fett'");
        $users10 = $result;
        return $users10;
    }



    public function updat_state_pak_cupon($usist, $cupons)
    {
        $result = $this->_db->query("INSERT INTO `wpk_cponsshif`(`ID_cupons`, `Cuponshift`,user_idfir,valcupons,dashif) VALUES ('','$cupons','$usist','50',NOW())");
    }

    public function insertin_comisns($usist, $part, $fett, $comisis)
    {
        $result = $this->_db->query("INSERT INTO `comision`(`codigo`, `cedula`, `cedula_otor`,  `total_comisiones`, `concepto`, `fecha`) VALUES ('','$part','$usist','$comisis','1','$fett')");
    }
    public function conactives($user)
    {
        $result = $this->_db->query("SELECT ID FROM security_users WHERE estado = '1' AND ID <> '1'");

        $connom = $result->num_rows;
        return $connom;
    }
    public function coninactives($user)
    {
        $result = $this->_db->query("SELECT ID FROM security_users WHERE estado = '0' AND ID <> '1'");

        $connom = $result->num_rows;
        return $connom;
    }

    public function selpas($antes, $user)
    {
        $result = $this->_db->query("SELECT ID FROM security_users WHERE user_psw = '$antes' AND ID = '$user'");

        $connom = $result->num_rows;
        return $connom;
    }

    public function updateestapass($newpas, $user)
    {
        $result = $this->_db->query("UPDATE  security_users SET user_psw = '$newpas' WHERE ID = '$user'");
    }

    public function updateestestaa($user)
    {
        $result = $this->_db->query("UPDATE  security_users SET estado = '0' WHERE  ID = '$user'");
    }


    public function up_billState($varis)
    {
        $result = $this->_db->query("UPDATE  solicit_bill SET state = '1' WHERE  ID = '$varis'");
    }

    public function get_t1aaa($min_paid)
    {
        $result = $this->_db->query("SELECT cedula,sum(total_comisiones) comisiones FROM comision WHERE  estado = '1'  GROUP BY cedula");

        $users10 = $result;
        return $users10;
    }



    public function get_t1($min_paid)
    {
        $result = $this->_db->query("SELECT cedula,sum(total_comisiones) comisiones FROM comision WHERE  estado = '0'  GROUP BY cedula");

        $users10 = $result;
        return $users10;
    }

    public function get_t1_suma($min_paid)
    {
        $result = $this->_db->query("SELECT sum(total_comisiones) comisiones FROM comision WHERE  estado = '0'");

        $users10 = $result;
        return $users10;
    }

    public function get_t1_sumaaa($min_paid)
    {
        $result = $this->_db->query("SELECT sum(total_comisiones) comisiones FROM comision WHERE  estado = '1'");

        $users10 = $result;
        return $users10;
    }

    public function update_info_new_buy($idUser)
    {
        //actualizar fecha de vencimiento
        $new_date = $this->_db->query("UPDATE `security_users` SET `limit` = DATE_FORMAT(DATE_ADD(NOW(),INTERVAL 336 DAY),'%Y-%m-%d') WHERE `security_users`.`ID` = $idUser");
        $new_plan ='';
    }
    /**
    *
    * Get total points
    *
    * @param    int $totalRefers
    * @param    int $packValue
    * @return      array
    *
    */
    public function getTotalPoints($totalRefers, $packValue, $totalPointsAdminAssigned)
    {
        $base = 500;
        if (($packValue % $base) == 0) {
            $pointByUsd = ($packValue / 1000);
            $myPoints = $totalRefers + $pointByUsd + $totalPointsAdminAssigned;
        } else {
            $myPoints = $totalRefers + $totalPointsAdminAssigned;
        }
        return $myPoints;
    }
    /**
    *
    * Get admin asigned points
    *
    * @param    int $idps
    * @return      array
    *
    */
    public function getTotalAsignedPoints($usuariop=null)
    {
        $result = $this->_db->query("SELECT points FROM security_users WHERE ID = '$usuariop'");
        $totalAsignedPoints = $result;

        return $totalAsignedPoints;
    }
}
