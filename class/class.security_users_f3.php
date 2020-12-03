<?php

class security_users_f3 {

    public $codigo;
    public $type_doc;
    public $identy_user;
    public $username;
    public $name_user;
    public $ape_user;
    public $sex_user;
    public $nac_user;
    public $dir_user;
    public $tel_user;
    public $pais_user;
    public $dpto_user;
    public $ciu_user;
    public $user_login;
    public $user_psw;
    public $user_photo;
    public $postal;
    public $login;
    public $logou;
    public $user_active;
    public $parent_id;
    public $Id_Parent;
    public $creator;
    public $Nivel;
    public $lft;
    public $rgt;
    public $lft1;
    public $rgt1;
    public $activo_tree;
    public $coloca;
    public $estado;
    public $user_register;
    public $user_rol;
    public $user_calif;
    public $change;
    public $bill;
    public $bill1;
    public $ques;
    public $answ;
    public $start;
    public $limit;
    public $dias;
    public $pack;
    public $cdec;
    public $cali;
    public $date_califica;

    public function __construct($id = 0) {
        if ($id)
            $this->consultar($id);
    }

    function consultar($id = 0) {
        if ($id != 0) {
            $sql = "SELECT * FROM security_users_f3 WHERE ID = " . $id;

            $conector_bd = new conector_bd();
            $conector_bd->query($sql);
            $consulta = $conector_bd->fetch();

            if (is_array($consulta) && !empty($consulta)) {
                $this->codigo           = $consulta['ID'];
                $this->type_doc         = $consulta['type_doc'];
                $this->identy_user      = $consulta['identy_user'];
                $this->username         = $consulta['username'];
                $this->name_user        = $consulta['name_user'];
                $this->ape_user = $consulta['ape_user'];
                $this->sex_user = $consulta['sex_user'];
                $this->nac_user = $consulta['nac_user'];
                $this->dir_user = $consulta['dir_user'];
                $this->tel_user = $consulta['tel_user'];
                $this->pais_user = $consulta['pais_user'];
                $this->dpto_user = $consulta['dpto_user'];
                $this->ciu_user = $consulta['ciu_user'];
                $this->user_login = $consulta['user_login'];
                $this->user_psw = $consulta['user_psw'];
                $this->user_photo = $consulta['user_photo'];
                $this->postal = $consulta['postal'];
                $this->login = $consulta['login'];
                $this->logou = $consulta['logou'];
                $this->user_active = $consulta['user_active'];
                $this->parent_id = $consulta['parent_id'];
                $this->Id_Parent = $consulta['Id_Parent'];
                $this->creator = $consulta['creator'];
                $this->Nivel = $consulta['Nivel'];
                $this->lft = $consulta['lft'];
                $this->rgt = $consulta['rgt'];
                $this->lft1 = $consulta['lft1'];
                $this->rgt1 = $consulta['rgt1'];
                $this->activo_tree = $consulta['activo_tree'];
                $this->coloca = $consulta['coloca'];
                $this->estado = $consulta['estado'];
                $this->user_register = $consulta['user_register'];
                $this->user_rol = $consulta['user_rol'];
                $this->user_calif = $consulta['user_calif'];
                $this->change = $consulta['change'];
                $this->bill = $consulta['bill'];
//                $this->bill1 = $consulta['bill1'];
                $this->ques = $consulta['ques'];
                $this->answ = $consulta['answ'];
                $this->start = $consulta['start'];
                $this->limit = $consulta['limit'];
                $this->dias = $consulta['dias'];
                $this->pack = $consulta['pack'];
                $this->cdec = $consulta['cdec'];
                $this->cali = $consulta['cali'];
//                $this->date_califica = $consulta['date_califica'];
            }
        }
    }

    function crear($datos, $trc = false) {
        $bd = new conector_bd();
        return $bd->insert('security_users', $datos, $trc);
    }

    function modificar($datos) {
        $bd = new conector_bd();
        $arrId['ID'] = $datos['ID'];
        return $bd->update('security_users', $datos, $arrId);
    }

    function eliminar($datos, $trc = false) {
        $bd = new conector_bd();
        $arrId['ID'] = $datos;
        return $bd->delete('security_users', $arrId, $trc);
    }

}

?>