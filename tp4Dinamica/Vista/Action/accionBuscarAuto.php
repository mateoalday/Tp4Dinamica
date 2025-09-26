<?php 
include_once "../../configuracion.php";
include_once "../Estructura/Header.php";


$abm = new AbmAuto();
$datos = data_submitted();

echo "<div class='container cont-form'>";

try{
    if($datos['patente'] == 'null'){
        throw new Exception("<h2>Debe ingresar una patente</h2>");
    }
    if($auto = $abm->obtenerDatos($datos)){
        $auto = $auto[0];

        echo "<div class='modalDatos
        '><h2>Auto encontrado</h2>";
        echo "<p>Patente: ".$auto['patente']."</p>";
        echo "<p>Marca: ".$auto['marca']."</p>";
        echo "<p>Modelo: ".$auto['modelo']."</p>";
        echo "<p>DNI del dueño: ".$auto['DniDuenio']."</p>";
        echo "</div>";



    }else{
        echo "<div class='modalDatos Incorrectos'>No se encontraron datos</div>";
    }
}catch(PDOException $ex){
    echo "<div class='modalDatosIncorrectos' style='font-weight: bold;'>Hubo un error en la base de datos:" . $ex->getMessage()."</div>";
}catch(Exception $ex){
    echo "<div class='modalDatosIncorrectos' style='font-weight: bold;'>".$ex->getMessage()."</div>";
}

echo "</div>";

include_once "../Estructura/Footer.php"

?>
