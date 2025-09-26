<?php include './Estructura/Header.php';?>

<div class="container contenedor rounded shadow mb-3">

    <form action="Action/accionCambioDuenio.php" method="post" id="formulario">
        <div class="form-group">
            <h2 class="mb-4">Cambio de dueño del auto</h2>
            <label for="patente" style="color: #2196F3;font-size: 20px;" >Ingrese el numero de patente del auto</label>
            <div><input type="text" class="form-control" id="patente" name="patente"></div>

            <label for="NroDni" style="color: #2196F3;font-size: 20px;">Ingrese el numero de documento de una persona</label>
            <div><input type="text" class="form-control" id="NroDni" name="NroDni"></div>

        </div>
        <button type="submit" class="btn btn-primary mt-4">Guardar <i class="bi bi-save"></i></button>
    </form>
</div>


<?php include "./Estructura/Footer.php";?>