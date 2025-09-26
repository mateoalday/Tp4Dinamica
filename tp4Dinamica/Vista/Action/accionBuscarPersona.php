<?php 
include_once "../../configuracion.php";
include_once '../Estructura/Header.php';


$abmPersona = new AbmPersona();
$datos = data_submitted();
$persona = $abmPersona->obtenerDatos($datos);



try {
   if (is_numeric($datos['NroDni'])) {


      if ($persona = $abmPersona->obtenerDatos($datos)) {
         $persona = $persona[0];
         echo "<form action='../Action/ActualizarDatosPersona.php' id='formulario' method='post' class='contenedor cont-form'>";
         echo "<div class='form-group'>";
            echo "<h2>Modificar datos de la persona</h2>";
            echo "<input type='hidden' name='NroDni' value='".$persona['NroDni']."' class='form-control'>";
            echo "<label for='Nombre'>Nombre</label>";
            echo "<input type='text' name='Nombre' value='".$persona['Nombre']."'class='form-control'>";
            echo "<label for='Apellido'>Apellido</label>";
            echo "<input type='text' name='Apellido' value='".$persona['Apellido']."'class='form-control'>";
            echo "<label for='fechaNac'>Fecha de nacimiento</label>";
            echo "<input type='date' name='fechaNac' value='".$persona['fechaNac']."'class='form-control'>";
            echo "<label for='Telefono'>Telefono</label>";
            echo "<input type='text' name='Telefono' value='".$persona['Telefono']."'class='form-control'>";
            echo "<label for='Domicilio'>Domicilio</label>";
            echo "<input type='text' name='Domicilio' value='".$persona['Domicilio']."'class='form-control'>";
            echo "<button type='submit' class='btn btn-primary'>
                     <i class='bi bi-arrow-clockwise'></i> Actualizar.
                  </button>";
                  
         echo "</div>";
         echo "</form>";
      } else {
         throw new Exception("<div class='modalDatosIncorrectos'>no existe esta persona</div>");
      }

   } else {
      throw new Exception("<div class='modalDatosIncorrectos'>El dni debe ser un numero</div>");
   }


} catch (PDOException $ex) {
   echo "<div class ='modalDatosIncorrectos'".$ex->getMessage()."</div>";
} catch (Exception $ex) {
   echo $ex->getMessage();
}

echo "</div>";

include_once "../Estructura/Footer.php";

?>