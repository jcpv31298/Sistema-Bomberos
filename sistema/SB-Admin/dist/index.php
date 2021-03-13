<?php
    session_start();

    if (!isset($_SESSION["usuario"])) {
        header("Location:http://" . $_SERVER["HTTP_HOST"] . "/sistema/");
    }

    $usuario = $_SESSION["usuario"];

    if($usuario != "admin"){
        header("Location:http://" . $_SERVER["HTTP_HOST"] . "/sistema/SB-Admin/dist/src/agregarReporteIncidencia/agregarReporteIncidencia.php");
    }

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Sistema Bomberos</title>
    <link href="http://localhost/sistema/SB-Admin/dist/css/styles.css" rel="stylesheet" />
    <link href="http://localhost/sistema/SB-Admin/dist/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <script src="http://localhost/sistema/SB-Admin/dist/js/librerias/all.min.js"></script>
</head>

<body class="sb-nav-fixed">

    <!-- Header -->
    <?php include 'header/header.php' ?>
    <!-- End Header -->
    <div id="layoutSidenav">
        <!-- Sidenav -->
        <?php include 'header/sidenav.php' ?>
        <!-- End Sidenav -->
        <div id="layoutSidenav_content">
            <div class="container-fluid mt-3">
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active text-dark">Inicio</li>
                </ol>
                <h1 class="text-center">Bienvenido</h1>
                <div class="text-center my-4">
                    <img src="./assets/img/logo.png" alt="Logo Bomberos" class="img-fluid" width="300">
                </div>
            </div>
        </div>
    </div>

    <script src="http://localhost/sistema/SB-Admin/dist/js/librerias/jquery-3.5.1.min.js"></script>
    <script src="http://localhost/sistema/SB-Admin/dist/js/librerias/bootstrap.bundle.min.js"></script>
    <script src="http://localhost/sistema/SB-Admin/dist/js/librerias/scripts.js"></script>
    <script src="http://localhost/sistema/SB-Admin/dist/js/librerias/Chart.min.js"></script>
    <script src="http://localhost/sistema/SB-Admin/dist/js/librerias/jquery.dataTables.min.js"></script>
    <script src="http://localhost/sistema/SB-Admin/dist/js/librerias/dataTables.bootstrap4.min.js"></script>
    <script src="http://localhost/sistema/SB-Admin/dist/assets/demo/datatables-demo.js"></script>
    <script src="http://localhost/sistema/SB-Admin/dist/js/cerrarSesion.js"></script>

</body>

</html>