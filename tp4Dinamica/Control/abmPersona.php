<?php

/*include '../Modelo/Persona.php';*/

class AbmPersona{
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
     * @return Persona
     */
    private function cargarObjeto($param) {
        $obj = null;

        if (array_key_exists('NroDni', $param) && array_key_exists('Nombre', $param) && array_key_exists('Apellido', $param) &&
            array_key_exists('fechaNac', $param) && array_key_exists('Telefono', $param) && array_key_exists('Domicilio', $param)) {
            $obj = new Persona();
            $obj->setear($param['NroDni'], $param['Nombre'], $param['Apellido'], $param['fechaNac'], $param['Telefono'], $param['Domicilio']);
        }
        return $obj;
    }

    /**
     * Espera como parámetro un arreglo asociativo donde las claves coinciden con los nombres de las variables instancias del objeto que son claves
     * @param array $param
     * @return Persona
     */
    private function cargarObjetoConClave($param) {
        $obj = null;

        if (isset($param['NroDni'])) {
            $obj = new Persona();
            $obj->setear($param['NroDni'], null, null, null, null, null);
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
        if (isset($param['NroDni']))
            $resp = true;
        return $resp;
    }

    /**
     * Da de alta una persona
     * @param array $param
     * @return boolean
     */
    public function alta($param) {
        $resp = false;
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
            if (isset($param['NroDni']))
                $where .= " and NroDni =" . $param['NroDni'];
            if (isset($param['Nombre']))
                $where .= " and nombre ='" . $param['Nombre'] . "'";
            if (isset($param['Apellido']))
                $where .= " and apellido ='" . $param['Apellido'] . "'";
            if (isset($param['fechaNac']))
                $where .= " and fechaNac ='" . $param['fechaNac'] . "'";
            if (isset($param['Telefono']))
                $where .= " and telefono ='" . $param['Telefono'] . "'";
            if (isset($param['Domicilio']))
                $where .= " and domicilio ='" . $param['Domicilio'] . "'";
        }
        $obj = new Persona();
        $arreglo = $obj->listar($where);
        return $arreglo;
    }

    public function obtenerDatos($param){
        $where = " true ";
        if ($param <> NULL) {
            if (isset($param['NroDni']))
                $where .= " and NroDni = " . $param['NroDni'];
            if (isset($param['Nombre']))
                $where .= " and nombre = '" . $param['Nombre'] . "'";
            if (isset($param['Apellido']))
                $where .= " and apellido = '" . $param['Apellido'] . "'";
            if (isset($param['fechaNac']))
                $where .= " and fechaNac = '" . $param['fechaNac'] . "'";
            if (isset($param['Telefono']))
                $where .= " and telefono = '" . $param['Telefono'] . "'";
            if (isset($param['Domicilio']))
                $where .= " and domicilio = '" . $param['Domicilio'] . "'";
        }
        
        $obj = new Persona();
        
        $arreglo = $obj->listar($where);
        $result = [];
        if (!empty($arreglo)) {
            foreach ($arreglo as $persona) {
            $result[] = ['NroDni' => $persona->getNroDni(),'Nombre' => $persona->getNombre(),'Apellido' => $persona->getApellido(),'fechaNac' => $persona->getFechaNac(),'Telefono' => $persona->getTelefono(),'Domicilio' => $persona->getDomicilio()];
            }
        }
        return $result;
    }
}
?>