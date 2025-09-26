<?php 
include_once "../../configuracion.php";
include_once "../Estructura/Header.php";
     
$abmPersona = new AbmPersona();
$abmAuto = new AbmAuto();

$datos = data_submitted();

echo "<div class='container cont-form'>";
try{
    if($datos['patente'] !== "null" && $datos['NroDni'] !== 'null'){
        if(!empty($auto = $abmAuto->obtenerDatos($datos)) && !empty($abmPersona->buscar($datos) && $datos['NroDni'] !== $auto[0]['DniDuenio'])){
            $auto = $auto[0];
            $datos['accion'] = 'editar';
            $datos['marca'] = $auto['marca'];
            $datos['modelo'] = $auto['modelo'];
    
            if($abmAuto->abm($datos)){
                echo "<div class = cambioDatos contenedorItems>Se cambio el dueño del auto</div>";
            }else{
                echo "<div class='NocambioDatos contenedorItems'>No se pudo cambiar el dueño del auto</div>";
            }
        } else {
            echo "<div class=personaNoEncontrada contenedorItems>No se encontro el auto o la persona</div>";
        }
    }else{
        throw new Exception("<div class =' modalDatosIncorrectos'  style='font-weight: bold;'> No se ingresaron correctamente los datos</div>");
    }

}catch(PDOException $ex){
    echo "<div class='modalDatosIncorrectos' style='font-weight: bold;'>" . $ex->getMessage() . "</div>";
}catch(Exception $ex){
    echo $ex->getMessage();
}


echo "</div>";

include_once "../Estructura/Footer.php";
?>