
<?php
include_once 'Conector/BaseDatos.php';

class Auto extends BaseDatos {
    private $patente;
    private $marca;
    private $NroDni;
    private $modelo;
    private $mensajeOperacion;

    public function __construct() {
        parent::__construct();
        $this->patente = "";
        $this->marca = "";
        $this->modelo = "";
        $this->mensajeOperacion = "";
    }

    public function setear($patente, $marca, $modelo, $dniNuevoDuenio) {
        $this->setPatente($patente);
        $this->setMarca($marca);
        $this->setModelo($modelo);
        $this->setNroDni($dniNuevoDuenio);


    }

    public function getMensajeOperacion() {
        return $this->mensajeOperacion;
    }

    public function setMensajeOperacion($mensajeOperacion) {
        $this->mensajeOperacion = $mensajeOperacion;
    }

    public function getPatente() {
        return $this->patente;
    }

    public function setPatente($patente) {
        $this->patente = $patente;
    }

    public function getMarca() {
        return $this->marca;
    }

    public function setMarca($marca) {
        $this->marca = $marca;
    }

    public function getNroDni() {
        return $this->NroDni;
    }

    public function setNroDni($NroDni) {
        $this->NroDni = $NroDni;
    }

    public function getModelo() {
        return $this->modelo;
    }

    public function setModelo($modelo) {
        $this->modelo = $modelo;
    }
    
    public function cargar() {
        $resp = false;
        $base = new BaseDatos();
        $sql = "SELECT * FROM `auto` WHERE patente = '".$this->getPatente()."'";

        if ($base->Iniciar()) {
            $res = $base->Ejecutar($sql);
            if($res > -1) {
                if($res > 0) {
                    $row = $base->Registro();
                    $this->setear($row['patente'], $row['marca'], $row['modelo'] , $row['DniDuenio']);
                    $resp = true;
                }
            }
        } else {
            $this->setMensajeOperacion("Auto->cargar: ".$base->getError());
        }
        return $resp;
    }

    public function insertar() {
        $resp = false;
        $base = new BaseDatos();
        $sql = "INSERT INTO `auto` (Patente, Marca, Modelo, DniDuenio) VALUES('".$this->getPatente()."', '".$this->getMarca()."', ".$this->getModelo().",'".$this->getNroDni()."');";
        if ($base->Iniciar()) {
           
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("Auto->insertar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("Auto->insertar: ".$base->getError());
        }
        return $resp;
    }

    public function modificar() {
        $resp = false;
        $base = new BaseDatos();
        $sql = "UPDATE `auto` SET marca='{$this->getMarca()}', modelo='{$this->getModelo()}', DniDuenio = {$this->getNroDni()} WHERE patente='{$this->getPatente()}'";
        
        if ($base->Iniciar()) {

            if ($base->Ejecutar($sql)) {
                $resp = true;
                
            } else {
                $this->setMensajeOperacion("Auto->modificar: ".$base->getError());
            }

        } else {
            $this->setMensajeOperacion("Auto->modificar: ".$base->getError());
        }

        return $resp;
    }

    public function eliminar() {
        $resp = false;
        $base = new BaseDatos();
        $sql = "DELETE FROM `auto` WHERE patente='".$this->getPatente()."'";
        
        if ($base->Iniciar()) {
            if ($base->Ejecutar($sql)) {
                $resp = true;
            } else {
                $this->setMensajeOperacion("Auto->eliminar: ".$base->getError());
            }
        } else {
            $this->setMensajeOperacion("Auto->eliminar: ".$base->getError());
        }
        return $resp;
    }

    public function listar($parametro="") {
        
        $arreglo = array();
        $base = new BaseDatos();
        $sql = "SELECT * FROM `auto` ";
        
        if ($parametro != "") {
            $sql .= ' WHERE '.$parametro;
        }
        $res = $base->Ejecutar($sql);
        
        if($res > -1) {
            if($res > 0) {
                while ($row = $base->Registro()) {
                    $obj = new Auto();
                    $obj->setear($row['Patente'], $row['Marca'], $row['Modelo'], $row['DniDuenio']);
                    array_push($arreglo, $obj);
                }
            }
        } else {
            $this->setMensajeOperacion("Auto->listar: ".$base->getError());
        }
        return $arreglo;
    }

    public function __toString() {
        return "Patente: {$this->getPatente()}Marca:{$this->getMarca()}Modelo:{$this->getModelo()} NroDni:{$this->getNroDni()}";
    }
}