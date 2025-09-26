<?php include_once "./Estructura/Header.php";?>
    <div class="container cont-form">
   
        <div class="contenedor-form">
        
        <form action="./Action/accionBuscarAuto.php" id="formulario" method="post">
        
              <div class="form-group ">
                <label style="color: #2196F3;font-size: 20px;"> <i class="bi bi-car-front"></i> Ingresá la Patente del auto </label>
                <label for="patente"></label>
                <div><input  type="text" name="patente" id="patente" class="form-control mt-2" placeholder="ABC 123"></div>
              <button type="submit" class="btn btn-primary btn-block mt-4">Buscar. <i class="bi bi-search"></i></button>
              </div>
       </form>
        </div>
    </div>
<?php include_once "./Estructura/Footer.php"?>