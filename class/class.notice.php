<?php

class notice {

    public $codigo;
    public $nombre;
    public $descripcion;

    public function __construct($id = 0) {
        if ($id)
            $this->consultar($id);
    }

    function consultar($id = 0) {
        if ($id != 0) {
            $sql = "SELECT * FROM tb_notice WHERE id_notice=" . $id;

            $conector_bd = new conector_bd();
            $conector_bd->query($sql);
            $consulta = $conector_bd->fetch();
            
            if (is_array($consulta) && !empty($consulta)) {
                $this->codigo       = $consulta['id_notice'];
                $this->nombre       = utf8_encode($consulta['nombre']);
                $this->descripcion  = $consulta['descripcion'];
            }
        }
    }

    function crear($datos, $trc = false) {
        $bd = new conector_bd();
        return $bd->insert('tb_notice', $datos, $trc);
    }

    function modificar($datos) {
        $bd = new conector_bd();
        $arrId['id_notice'] = $datos['id_notice'];
        return $bd->update('tb_notice', $datos, $arrId);
    }

    function eliminar($datos, $trc = false) {
        $bd = new conector_bd();
        $arrId['id_notice'] = $datos;
        return $bd->delete('tb_notice', $arrId, $trc);
    }

}

?>