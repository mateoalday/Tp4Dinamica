<?php
include_once '../configuracion.php';
include_once 'Estructura/Header.php';

$abmPersona = new AbmPersona();


// Obtener todas las personas
$personas = $abmPersona->buscar(null);

    echo "<div class='container contenedor rounded shadow mb-3'>";
    echo "<h1 class='my-4'>Listado de Autos</h1>";
        if (count($personas) > 0) {
            echo "<table class='  table table-bordered'>
                  <thead class='thead-dark'>
                  <tr>
                  <th>Nombre</th>
                  <th>apellido</th>
                  </tr>
                  </thead>
                  <tbody>";         

            foreach ($personas as $persona) {
                
                // Obtener los datos del dueño
                $dniDuenio = $persona->getNroDni();
                $param = ['NroDni' => $dniDuenio];

                $duenio = $abmPersona->buscar($param);

                if (isset($duenio[0])) {
                    $nombreDuenio = $duenio[0]->getNombre();
                    $apellidoDuenio = $duenio[0]->getApellido();
                } else {
                    $nombreDuenio = 'Dueño no encontrado';
                    $apellidoDuenio = 'Dueño no encontrado';
                }

                echo '<tr>';
                echo '<td>' . $nombreDuenio . '</td>';
                echo '<td>' . $apellidoDuenio . '</td>';
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';
            echo "<h2>Buscar auto por persona</h2>";
            echo "<button class='btn-ingrese'><a style='color:white' href='autosPersona.php'>Ingrese aca</a></button>";

        } else {
            echo '<div class="alert alert-danger m-3 w-50" role="alert" >No hay autos cargados en la base de datos.</div>';
        }
    
    echo "</div>";
    

include_once "./Estructura/Footer.php";

?>
    