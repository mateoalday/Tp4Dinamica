<?php include_once "./Estructura/Header.php";?>

<div class="container contenedor rounded shadow mb-3">

    <form id="formulario" method="post" action="../Vista/Action/accionCrearPersona.php">

            <h2 class="mb-4">Registrar usuario</h2>
            <div class="form-group mt-2">
                <label for="Nombre" style="color: #2196F3;font-size: 20px;">Ingrese un nombre</label>
                <div><input type="text" name="Nombre" id="Nombre" class="form-control" require></div>
            </div>
            
            <div class="form-group mt-4">
                <label for="Apellido" style="color: #2196F3;font-size: 20px;">Ingrese un apellido</label>
                <div><input type="text" name="Apellido" id="Apellido" class="form-control" require></div>
            </div>
            
            <div class="form-group mt-4">
                <label for="NroDni" style="color: #2196F3;font-size: 20px;">Ingrese un DNI</label>
                <div><input type="number" name="NroDni" id="NroDni" class="form-control" require></div>
            </div>
            
            <div class="form-group mt-4">
                <label for="fechaNac" style="color: #2196F3;font-size: 20px;">Ingrese una fecha de nacimiento</label>
                <div><input type="date" name="fechaNac" id="fechaNac" class="form-control" require></div>
            </div>
            
            <div class="form-group mt-4">
                <label for="Telefono" style="color: #2196F3;font-size: 20px;">Ingrese un teléfono</label>
                <div><input type="number" name="Telefono" id="Telefono" class="form-control" require></div>
            </div>

            <div class="form-group mt-4">
                <label for="Domicilio" style="color: #2196F3;font-size: 20px;">Ingrese un domicilio</label>
                <div><input type="text"  name="Domicilio" id="Domicilio" class="form-control" require></div>
            </div>

            <button type="submit" class="btn btn-primary btn-block mt-4">
                Crear <i class="bi bi-pencil"></i>
            </button>
            
    </form>
</div>

<?php include_once "./Estructura/Footer.php";?>