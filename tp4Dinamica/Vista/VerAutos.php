<?php 
include_once "../configuracion.php";
include_once "./Estructura/Header.php"; 

$abmAuto = new AbmAuto();
$abmPersona = new AbmPersona();

// Obtener todos los autos

echo "<div class='container contenedor rounded shadow mb-3'>";
echo "<h1 class='my-4'>Listado de Personas.</h1>";

$autos = $abmAuto->obtenerDatos(null);

if (count($autos) > 0) {
    echo "<table class='table table-bordered'>
          <thead class='thead-dark'>
          <tr>
          <th>Patente</th>
          <th>Marca</th>
          <th>Modelo</th>
          <th>Dueño</th>
          </tr>
          </thead>
          <tbody>";

    foreach ($autos as $auto) {
        $datos['NroDni'] = $auto['DniDuenio'];

        $duenio = $abmPersona->obtenerDatos($datos);
        if (!empty($duenio)) {
            $duenio = $duenio[0];
            echo "<tr>";
            echo "<td>" . $auto['patente'] . "</td>";
            echo "<td>" . $auto['marca'] . "</td>";
            echo "<td>" . $auto['modelo'] . "</td>";
            echo "<td>" . $duenio['Nombre'] . " " . $duenio['Apellido'] . "</td>";
            echo "</tr>";
        }
    }

    echo "</tbody></table>";
} else {
    echo '<div class="alert alert-danger m-3 w-50" role="alert">No hay autos cargados en la base de datos.</div>';
}

echo "</div>";

include_once "./Estructura/Footer.php";






        // if (count($autos) > 0) {
        //     echo "<table class='  table table-bordered'>
        //           <thead class='thead-dark'>
        //           <tr>
        //           <th>Patente</th>
        //           <th>Marca</th>
        //           <th>Modelo</th>
        //           <th>Dueño</th>
        //           </tr>
        //           </thead>
        //           <tbody>";         

        //     foreach ($autos as $auto) {
                
        //         // Obtener los datos del dueño
        //         $dniDuenio = $auto->getNroDni();
        //         $param = ['NroDni' => $dniDuenio];
        //         $duenio = $abmPersona->buscar($param);

        //         if (isset($duenio[0])) {
        //             $nombreDuenio = $duenio[0]->getNombre() . ' ' . $duenio[0]->getApellido();
        //         } else {
        //             $nombreDuenio = 'Dueño no encontrado';
        //         }

        //         echo '<tr>';
        //         echo '<td>' . $auto->getPatente() . '</td>';
        //         echo '<td>' . $auto->getMarca() . '</td>';
        //         echo '<td>' . $auto->getModelo() . '</td>';
        //         echo '<td>' . $nombreDuenio . '</td>';
        //         echo '</tr>';
        //     }

        //     echo '</tbody>';
        //     echo '</table>';
        // } else {
        //     echo '<div class="alert alert-danger m-3 w-50" role="alert" >No hay autos cargados en la base de datos.</div>';
        // }


?>