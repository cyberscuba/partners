<?php

class producto {

    public $codigo;
    public $id_categoria;
    public $nombre;
    public $url;

    public function __construct($id = 0) {
        if ($id)
            $this->consultar($id);
    }

    function consultar($id = 0) {
        if ($id != 0) {
            $sql = "SELECT * FROM tb_producto WHERE id_producto=" . $id;

            $conector_bd = new conector_bd();
            $conector_bd->query($sql);
            $consulta = $conector_bd->fetch();
            
            if (is_array($consulta) && !empty($consulta)) {
                $this->codigo       = $consulta['id_producto'];
                $this->id_categoria = $consulta['id_categoria'];
                $this->nombre       = utf8_encode($consulta['nombre']);
                $this->url          = $consulta['url'];
            }
        }
    }

    function crear($datos, $trc = false) {
        $bd = new conector_bd();
        return $bd->insert('tb_producto', $datos, $trc);
    }

    function modificar($datos) {
        $bd = new conector_bd();
        $arrId['id_producto'] = $datos['id_producto'];
        return $bd->update('tb_producto', $datos, $arrId);
    }

    function eliminar($datos, $trc = false) {
        $bd = new conector_bd();
        $arrId['id_producto'] = $datos;
        return $bd->delete('tb_producto', $arrId, $trc);
    }

}

?>