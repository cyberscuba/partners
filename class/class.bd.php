<?php

class conector_bd {

    var $host;
    var $bd;
    var $usuario;
    var $password;
    var $link;
    var $result;

    function __construct() {

        $this->host = DB_HOST;
        $this->bd = DB_NAME;
        $this->usuario = DB_USER;
        $this->password = DB_PASS;

        $this->link = new mysqli($this->host, $this->usuario, $this->password, $this->bd);

        if ($this->link->connect_errno) {
            echo "Fallo al conectar a MySQL: " . $this->_db->connect_error;
            return;
        }

    }

    public function query($sql) {

        $this->result = $this->link->query(utf8_decode($sql));
        if (!$this->result)
            echo $sql;
        return $this->result;
    }

    function get_sequence($table) {
        $sql = "SELECT AUTO_INCREMENT FROM information_schema.`TABLES`
                WHERE `table_schema` = '" . DB_NAME . "' AND `table_name` = '$table'";
        $query = $this->query($sql);
        $row = $query->fetch_row();
        $query = $row[0];
        return $query;
    }

    function consultar($sql) {
        $query = $this->query($sql);
        return $query;
    }

    public function fetch() {
        if ($this->result != null) {
            return $this->result->fetch_assoc();
        }
    }

    function insert($tName, $arrData) {
        $sql = '';
        $sqlC = '';
        $sqlV = '';

        $sql .= 'INSERT INTO ' . $tName;

        foreach ($arrData as $cName => $cValue) {
            $sqlC .= ($sqlC ? ' ,' : ' ') . $cName;

            if (stristr($cValue, 'ARRAY'))
                $sqlV .= ($sqlV ? ' ,' : ' ') . (($cValue != '' or $cValue == 0) ? "" . $cValue . "" : 'null');
            else if (substr($cValue, 0, 7) == '(SELECT')
                $sqlV .= ($sqlV ? ' ,' : ' ') . (($cValue != '' or $cValue == 0) ? "" . $cValue . "" : 'null');
            else
                $sqlV .= ($sqlV ? ' ,' : ' ') . (($cValue != '' or $cValue == 0) ? "'" . $cValue . "'" : 'null');
        }

        $sql .= ' (' . $sqlC . ')values(' . $sqlV . ');';

        return $this->query($sql);
    }

    function delete($tName, $arrIdentifier) {
        $sql = '';
        $sql .= 'DELETE FROM ' . $tName;
        $sql .= $this->identifier($arrIdentifier);
        $sql .= ';';

        return $this->query($sql);
    }

    public function fetch_all($sql, $arrIdentifier = array(), $arrPar = array()) {
        $sql .= $this->identifier($arrIdentifier);
        if (isset($arrPar['groupBy']))
            $sql .= ' GROUP BY ' . $arrPar['groupBy'];
        if (isset($arrPar['orderBy']))
            $sql .= ' ORDER BY ' . $arrPar['orderBy'];
        if (isset($arrPar['limit']))
            $sql .= ' LIMIT ' . $arrPar['limit'];
        if (isset($arrPar['offset']))
            $sql .= ' OFFSET ' . $arrPar['offset'];

        $this->query($sql);

        if ($this->result != null) {
            return pg_fetch_all($this->result);
        }
    }

    private function identifier($arrIdentifier = array()) {
        $sql = '';
        $sqlFiltro = '';
        if (sizeof($arrIdentifier) > 0) {
            $strW = "";
            $arrTempFiltro = array();
            $arrFiltro = array();

            $arrFiltroSpecial = array(
                'like' => "like", //LIKE
                'dif' => "dif", //"<>"
                'menor' => 'menor', //"<",
                'menorI' => 'menorI', //,"<=",
                'mayor' => 'mayor', //">",
                'mayorI' => 'mayorI', //">=",
                'in' => 'in', //"IN",
                'notIn' => 'notIn', //"NOT IN",
                'isTrue' => 'isTrue', //"IS TRUE",
                'isNotTrue' => 'isNotTrue', //"IS NOT TRUE",
                'isNull' => 'isNull', //"IS NULL",
                'isNotNull' => 'isNotNull', //"IS NOT NOLL",
            );
            foreach ($arrIdentifier as $cName => $cValue) {
                if (!in_array($cName, $arrFiltroSpecial)) {
                    $str = $cName . "='" . $cValue . "'";
                    array_push($arrFiltro, $str);
                } else {
                    $arrTempFiltro[$cName] = $cValue;
                    unset($arrIdentifier[$cName]);
                }
                $str = "";
            }

            if (sizeof($arrTempFiltro) > 0)
                foreach ($arrTempFiltro as $sName => $sValue) {
                    if ($sName == "like")
                        foreach ($sValue as $cName => $cValue) {
                            array_push($arrFiltro, $cName . " LIKE '" . $cValue . "'");
                        } elseif ($sName == "dif")
                        foreach ($sValue as $cName => $cValue) {
                            array_push($arrFiltro, $cName . " <> '" . $cValue . "'");
                        } elseif ($sName == "menor")
                        foreach ($sValue as $cName => $cValue) {
                            array_push($arrFiltro, $cName . " < '" . $cValue . "'");
                        } elseif ($sName == "menorI")
                        foreach ($sValue as $cName => $cValue) {
                            array_push($arrFiltro, $cName . " <= '" . $cValue . "'");
                        } elseif ($sName == "mayor")
                        foreach ($sValue as $cName => $cValue) {
                            array_push($arrFiltro, $cName . " > '" . $cValue . "'");
                        } elseif ($sName == "mayorI")
                        foreach ($sValue as $cName => $cValue) {
                            array_push($arrFiltro, $cName . " >= '" . $cValue . "'");
                        } elseif ($sName == "in")
                        foreach ($sValue as $cName => $cValue) {
                            array_push($arrFiltro, $cName . " IN " . $cValue);
                        } elseif ($sName == "notIn")
                        foreach ($sValue as $cName => $cValue) {
                            array_push($arrFiltro, $cName . " NOT IN " . $cValue);
                        } elseif ($sName == "isTrue")
                        foreach ($sValue as $cName => $cValue) {
                            array_push($arrFiltro, $cName . " IS TRUE ");
                        } elseif ($sName == "isNotTrue")
                        foreach ($sValue as $cName => $cValue) {
                            array_push($arrFiltro, $cName . " IS NOT TRUE ");
                        } elseif ($sName == "isNull")
                        foreach ($sValue as $cName => $cValue) {
                            array_push($arrFiltro, $cName . " IS NULL ");
                        } elseif ($sName == "isNotNull")
                        foreach ($sValue as $cName => $cValue) {
                            array_push($arrFiltro, $cName . " IS NOT NULL ");
                        }
                }

            $strW = implode(" AND ", $arrFiltro);
            $sqlFiltro = ' WHERE ' . $strW;
        }

        return $sqlFiltro;
    }

    function update($tName, $arrData, $arrIdentifier) {
        $sql = '';
        $sqlC = '';
        $sqlW = '';

        $sql .= 'UPDATE ' . $tName . ' SET ';

        foreach ($arrData as $cName => $cValue) {
            $sqlC .= ($sqlC ? ' ,' : ' ') . (($cValue == '' or $cValue == null or $cValue == NULL) ? $cName . '= null ' : $cName . '=\'' . $cValue . '\'');
        }

        $sql .= $sqlC;
        $sql .= $this->identifier($arrIdentifier);
        $sql .= ';';

        return $this->query($sql);
    }

    function consultar_todo($nomClase, $arrPar = array()) {
        $tb = "";
        $sql = "";
        $n = 0;
        $arrPar['aliasTb'] = (isset($arrPar['aliasTb'])) ? $arrPar['aliasTb'] : '';
        $arrPar['join'] = (isset($arrPar['join'])) ? $arrPar['join'] : '';
        $arrPar['filtro'] = (isset($arrPar['filtro'])) ? $arrPar['filtro'] : '';
        $arrPar['orderBy'] = (isset($arrPar['orderBy'])) ? $arrPar['orderBy'] : '';
        $arrPar['limit'] = (isset($arrPar['limit'])) ? $arrPar['limit'] : '';
        $retornos = array();

        $tb = "tb_{$nomClase} {$arrPar['aliasTb']}";
        $sql = "SELECT " . ($arrPar['aliasTb'] ? $arrPar['aliasTb'] . ".id_" . $nomClase : "id_" . $nomClase) . " FROM {$tb} ";
        $sql .= " " . ($arrPar['join'] != '' ? $arrPar['join'] : '');
        $sql .= ($arrPar['filtro'] != '' ? " WHERE " . $arrPar['filtro'] : '');
        $sql .= " ORDER BY " . ($arrPar['orderBy'] != '' ? $arrPar['orderBy'] : " id_{$nomClase} ");
        $sql .= " " . ($arrPar['limit'] != '' ? $arrPar['limit'] : 'LIMIT 2500 OFFSET 0');

        $query = $this->consultar($sql);

        while ($row = $query->fetch_row()) {
            $retornos[] = new $nomClase($row[0]);
            $n++;
        }

        return array('elementos' => $retornos, 'n' => $n);
    }

    function consultar_todo_sin_tb($nomClase, $arrPar = array()) {
        $tb = "";
        $sql = "";
        $n = 0;
        $arrPar['aliasTb'] = (isset($arrPar['aliasTb'])) ? $arrPar['aliasTb'] : '';
        $arrPar['join'] = (isset($arrPar['join'])) ? $arrPar['join'] : '';
        $arrPar['filtro'] = (isset($arrPar['filtro'])) ? $arrPar['filtro'] : '';
        $arrPar['orderBy'] = (isset($arrPar['orderBy'])) ? $arrPar['orderBy'] : '';
        $arrPar['limit'] = (isset($arrPar['limit'])) ? $arrPar['limit'] : '';
        $retornos = array();

        $tb = "{$nomClase} {$arrPar['aliasTb']}";
        $sql = "SELECT " . ($arrPar['aliasTb'] ? $arrPar['aliasTb'] . ".id": "id") . " FROM {$tb} ";
        $sql .= " " . ($arrPar['join'] != '' ? $arrPar['join'] : '');
        $sql .= ($arrPar['filtro'] != '' ? " WHERE " . $arrPar['filtro'] : '');
        $sql .= " ORDER BY " . ($arrPar['orderBy'] != '' ? $arrPar['orderBy'] : "id");
        $sql .= " " . ($arrPar['limit'] != '' ? $arrPar['limit'] : 'LIMIT 2500 OFFSET 0');

        $query = $this->consultar($sql);

        while ($row = $query->fetch_row()) {
            $retornos[] = new $nomClase($row[0]);
            $n++;
        }

        return array('elementos' => $retornos, 'n' => $n);
    }

    function id_elemn($arrPar) {
        $id = $arrPar['id'];
        $tName = $arrPar['tb'];
        $sql = 'SELECT ' . $id . ' id FROM ' . $tName;
        //prin_r($sql);exit;
        if (isset($arrPar['filtro']) AND ! empty($arrPar['filtro'])) {
            $sql .= ' WHERE ' . $arrPar['filtro'];
        }
        if (isset($arrPar['orderBy']) AND ! empty($arrPar['orderBy'])) {
            $sql .= ' ORDER BY ' . $arrPar['orderBy'];
        }

        $sql .= ' limit 1;';
//         print ('el sql es '.$sql);
        $this->query($sql);
        $objId = $this->fetch();

        return (is_array($objId) && count($objId) > 0) ? $objId['id'] : '';
    }

    function existen_registros($tabla, $filtro = '') {
        if (!empty($filtro))
            $sql = "select count(*) from " . trim($tabla) . " where {$filtro}";
        else
            $sql = "select count(*) from " . trim($tabla);

        $query = $this->consultar($sql);
        $row = $query->fetch_row();
        if ($row[0] > 0)
            return true;
        else
            return false;
    }

}

?>