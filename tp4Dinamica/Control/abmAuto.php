<?php
class AbmAuto{

    // Espera como parámetro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
    public function abm($datos) {
        $resp = false;

        if ($datos['accion'] == 'editar') {
            if ($this->modificacion($datos)) {
                $resp = true;
            }
        }
        if ($datos['accion'] == 'borrar') {
            if ($this->baja($datos)) {
                $resp = true;
            }
        }
        if ($datos['accion'] == 'nuevo') {
            if ($this->alta($datos)) {
                $resp = true;
            }
        }

        return $resp;
    }

    /**
     * Espera como parámetro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto
     * @param array $param
     * @return Auto
     */
    private function cargarObjeto($param) {
        $obj = null;
        if (array_key_exists('patente', $param) && array_key_exists('marca', $param) && array_key_exists('NroDni', $param) && array_key_exists('modelo', $param)) {
            $obj = new Auto();
            $obj->setear($param['patente'], $param['marca'], $param['modelo'], $param['NroDni']);
           
        }
        return $obj;
    }

    /**
     * Espera como parámetro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return Auto
     */
    private function cargarObjetoConClave($param) {
        $obj = null;
        
        if (isset($param['patente'])) {
            $obj = new Auto();
            $obj->setear($param['patente'], null, null, null);
        }
        return $obj;
    }

    /**
     * Corrobora que dentro del arreglo asociativo están seteados los campos claves
     * @param array $param
     * @return boolean
     */
    private function seteadosCamposClaves($param) {
        $resp = false;
        if (isset($param['patente']))
            $resp = true;
        return $resp;
    }

    /**
     * Da de alta un auto
     * @param array $param
     * @return boolean
     */
    public function alta($param) {
        $resp = false;
        //$param['patente'] = null; // Asumiendo que se autogenera o se maneja de otra manera
        $elObjtTabla = $this->cargarObjeto($param);
        if ($elObjtTabla != null && $elObjtTabla->insertar()) {
            $resp = true;
        }
        return $resp;
    }

    /**
     * Permite eliminar un objeto
     * @param array $param
     * @return boolean
     */
    public function baja($param) {
        $resp = false;
        if ($this->seteadosCamposClaves($param)) {
            $elObjtTabla = $this->cargarObjetoConClave($param);
            if ($elObjtTabla != null && $elObjtTabla->eliminar()) {
                $resp = true;
            }
        }

        return $resp;
    }

    /**
     * Permite modificar un objeto
     * @param array $param
     * @return boolean
     */

    public function modificacion($param) {

        $resp = false;


        if ($this->seteadosCamposClaves($param)) {
            $elObjtTabla = $this->cargarObjeto($param);
            if ($elObjtTabla != null && $elObjtTabla->modificar()) {
                $resp = true;
            }
            
        }

        return $resp;
    }

    /**
     * Permite buscar un objeto
     * @param array $param
     * @return array
     */
    public function buscar($param) {
        $where = " true ";
        if ($param <> NULL) {
            if (isset($param['patente']))
                $where .= " and patente ='" . $param['patente'] . "'";
            if (isset($param['marca']))
                $where .= " and marca ='" . $param['marca'] . "'";
            if (isset($param['DniDuenio'])){
               $where .= " and DniDuenio =" . $param['DniDuenio'];
            }
            if (isset($param['modelo']))
                $where .= " and modelo ='" . $param['modelo'] . "'";
        }
        $obj = new Auto();
        $arreglo = $obj->listar($where);
        return $arreglo;
    }

    

    public function obtenerDatos($param){
        $where = " true ";
        if ($param <> NULL) {
            if (isset($param['patente']))
                $where .= " and patente ='" . $param['patente'] . "'";
            if (isset($param['marca']))
                $where .= " and marca ='" . $param['marca'] . "'";
            if (isset($param['DniDuenio'])){
               $where .= " and DniDuenio =" . $param['DniDuenio'];
            }
            if (isset($param['modelo']))
                $where .= " and modelo ='" . $param['modelo'] . "'";
        }
        $obj = new Auto();
        $arreglo = $obj->listar($where);
        $result = [];
        if (!empty($arreglo)) {
            foreach ($arreglo as $auto) {
                $result[] = ["patente" => $auto->getPatente(), "marca" => $auto->getMarca(), "modelo" => $auto->getModelo(), "DniDuenio" => $auto->getNroDni()];
            }
        }
        return $result;
    }
}
?>