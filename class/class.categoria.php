<?php

class categoria {

    public $codigo;
    public $nombre;

    public function __construct($id = 0) {
        if ($id)
            $this->consultar($id);
    }

    function consultar($id = 0) {
        if ($id != 0) {
            $sql = "SELECT * FROM tb_categoria WHERE id_categoria=" . $id;

            $conector_bd = new conector_bd();
            $conector_bd->query($sql);
            $consulta = $conector_bd->fetch();
            
            if (is_array($consulta) && !empty($consulta)) {
                $this->codigo       = $consulta['id_categoria'];
                $this->nombre       = utf8_encode($consulta['nombre']);
//                $this->nombre       = html_entity_decode($consulta['nombre'], ENT_QUOTES | ENT_HTML401, "UTF-8");
            }
        }
    }

    function crear($datos, $trc = false) {
        $bd = new conector_bd();
        return $bd->insert('tb_categoria', $datos, $trc);
    }

    function modificar($datos) {
        $bd = new conector_bd();
        $arrId['id_categoria'] = $datos['id_categoria'];
        return $bd->update('tb_categoria', $datos, $arrId);
    }

    function eliminar($datos, $trc = false) {
        $bd = new conector_bd();
        $arrId['id_categoria'] = $datos;
        return $bd->delete('tb_categoria', $arrId, $trc);
    }

}

?>