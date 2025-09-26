<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    
    <!---CSS--->
    <link rel="stylesheet" href="../../../TP4Dinamica/Vista/Assets/styles.css?v=2.4">
    <!---CSS--->

    <!---BOOSTRAP--->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.5.0/font/bootstrap-icons.min.css">
    <!---BOOSTRAP--->
    
    <!---jquery--->
    <script src="https://code.jquery.com/jquery-3.7.1.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js?v=1.0.2" defer></script>
    <script src="../../../TP4Dinamica/Vista/Assets/validaciones.js?v=5.0.0" defer></script>
    <!---jquery--->
</head>

<body>
    <header>
        <h1 class="my-4 text-center mt-50">TP N° 4 PDO </h1>
        <nav class="navbar navbar-expand-lg navbar-light bg-secondary">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                <ul class="navbar-nav ">
                    <li class="nav-item m-2">
                        <a class="nav-link btn btn-dark mx-1 text-white" href="../../../TP4Dinamica/Vista/Index.php">Home <i
                                class="bi bi-house"></i></a>
                    </li>
                    <li class="nav-item m-2">
                        <a class="nav-link btn btn-dark mx-1 text-white" href="../../../TP4Dinamica/Vista/VerAutos.php">Ver
                            Autos <i class="bi bi-eye"></i></a>
                    </li>
                    <li class="nav-item m-2">
                        <a class="nav-link btn btn-dark mx-1 text-white"
                            href="../../../TP4Dinamica/Vista/buscarAuto.php">Buscar Autos <i class="bi bi-search"></i></a>
                    </li>
                    <li class="nav-item m-2">
                        <a class="nav-link btn btn-dark mx-1 text-white"
                            href="../../../TP4Dinamica/Vista/listaPersona.php">Listar Personas <i
                                class="bi bi-people"></i></a>
                    </li>
                    <li class="nav-item m-2">
                        <a class="nav-link btn btn-dark mx-1 text-white"
                            href="../../../TP4Dinamica/Vista/nuevaPersona.php">Registrar usuario <i
                                class="bi bi-person-plus"></i></a>
                    </li>
                    <li class="nav-item m-2">
                        <a class="nav-link btn btn-dark mx-1 text-white"
                            href="../../../TP4Dinamica/Vista/NuevoAuto.php">Registrar auto <i class="bi bi-plus"></i></i>
                        </a>
                    </li>
                    <li class="nav-item m-2">
                        <a class="nav-link btn btn-dark mx-1 text-white"
                            href="../../../TP4Dinamica/Vista/cambioDuenio.php">Cambio de dueño del auto <i
                                class="bi bi-arrow-left-right"></i></a>
                    </li>
                    <li class="nav-item m-2">
                        <a class="nav-link btn btn-dark mx-1 text-white"
                            href="../../../TP4Dinamica/Vista/buscarPersona.html">Modificar usuario <i
                                class="bi bi-pencil"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
</header>