<?php 
include_once "../../configuracion.php";
include_once "../Estructura/Header.php";


echo "<div class='container cont-form'>";

$abm = new AbmPersona();
$datos = data_submitted();

try {
    if(isset($datos) && $datos["NroDni"] !== 'null'){
        if(empty($abm->buscar($datos))){
            $abm->alta($datos);

            echo "<div class='modalDatosCorrectos'>
                Persona creada con éxito🥳
                </div>";

        }else{
            echo "<div class='modalDatosIncorrectos'>
                    El dni ya esta registrado en la base de datos. 😔
                 </div>";
        }  
    }else{
        throw new exception("<div class='modalDatosIncorrectos'>No llegaron los datos.</div>");  
    }

}catch (PDOException $ex) {
  echo "<div class ='modalDatosIncorrectos'>".$ex->getMessage()."</div>";
} catch (Exception $ex) {
    echo $ex->getMessage();
}

echo "</div>";

include_once "../Estructura/Footer.php";

?>