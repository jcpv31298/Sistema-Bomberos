<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location:http://" . $_SERVER["HTTP_HOST"] . "/sistema/");
}

$usuario = $_SESSION["usuario"];

if ($usuario == "admin") {
    header("Location:http://" . $_SERVER["HTTP_HOST"] . "/sistema/SB-Admin/dist/index.php");
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
    <title>Reporte de Incidencias</title>
    <link href="http://localhost/sistema/SB-Admin/dist/css/styles.css" rel="stylesheet" />
    <link href="http://localhost/sistema/SB-Admin/dist/css/bootstrap-select.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css" integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw==" crossorigin="anonymous" />
    <script src="http://localhost/sistema/SB-Admin/dist/js/librerias/all.min.js"></script>
    <style>
        .sb-nav-fixed #layoutSidenav #layoutSidenav_content {
            padding-left: 0px;
            top: 56px;
        }
    </style>
</head>

<body class="sb-nav-fixed">

    <!-- Header -->
    <?php include dirname(dirname(__DIR__)) . "\header\header.php"  ?>
    <!-- End Header -->
    <input type="hidden" value="<?php echo $_SESSION["idUsuario"] ?>" id="idUsuario">
    <div id="layoutSidenav">
        <div id="layoutSidenav_content">
            <div class="container-fluid mt-3">
                <!-- <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active text-dark">Reporte de Incidencias</li>
                </ol> -->

                <div id="ReporteDeIncidencia" class="">

                    <!-- <div class="row">
                        <div class="col-md-12 d-flex justify-content-end">
                            <div class="form-group">
                                <label for="txtEstacion">Estacion</label>
                                <input type="text" id="txtEstacion" class="form-control">
                            </div>
                        </div>
                    </div> -->

                    <div class="row mt-3">

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="txtEstacion">Estacion</label>
                                <input type="text" id="txtEstacion" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="txtFecha">Fecha</label>
                                <input type="text" id="txtFecha" class="form-control datepicker">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="txtHoraSalida">Hora de Salida</label>
                                <input type="time" id="txtHoraSalida" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="txtHoraRetorno">Hora de Retorno</label>
                                <input type="time" id="txtHoraRetorno" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="txtTipoServicio">Tipo de Servicio</label>
                                <input type="text" id="txtTipoServicio" class="form-control">
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="txtPropietario">Propietario</label>
                                <input type="text" id="txtPropietario" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="txtInquilino">Inquilino</label>
                                <input type="text" id="txtInquilino" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="form-group">
                                <label for="txtDireccion">Dirección</label>
                                <input type="text" id="txtDireccion" class="form-control">
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="txtEntreCalles">Entre Calles</label>
                                <input type="text" id="txtEntreCalles" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="txtTelefono">Teléfono</label>
                                <input type="text" id="txtTelefono" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="txtNombreNegocio">Nombre del Negocio</label>
                                <input type="text" id="txtNombreNegocio" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="txtCausas">Causas</label>
                                <input type="text" id="txtCausas" class="form-control">
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="txtPerdidas">Pérdidas</label>
                                <input type="text" id="txtPerdidas" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="txtCompañiaAseguradora">Compañia Aseguradora</label>
                                <input type="text" id="txtCompañiaAseguradora" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="txtVictimas">Victimas</label>
                                <input type="text" id="txtVictimas" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="txtVehiculosUtilizados">Vehiculos Utilizados</label>
                                <input type="text" id="txtVehiculosUtilizados" class="form-control">
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ddlEmpleados">Personal que Acudió</label>
                                <select id="ddlEmpleados" class="form-control selectpicker border" data-live-search="true" title="Selecciona una opción" multiple>
                                </select>
                            </div>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="txtDescripcion">Descripción de los Hechos</label>
                                <textarea id="txtDescripcion" cols="30" rows="4" class="form-control"></textarea>
                            </div>
                        </div>

                    </div>

                    <div id="divBotones" class="mb-3 d-flex justify-content-end">
                        <button type="button" class="btn btn-primary mr-2">Limpiar</button>
                        <button type="button" class="btn btn-success">Guardar</button>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script src="http://localhost/sistema/SB-Admin/dist/js/librerias/jquery-3.5.1.min.js"></script>
    <script src="http://localhost/sistema/SB-Admin/dist/js/librerias/bootstrap.bundle.min.js"></script>
    <script src="http://localhost/sistema/SB-Admin/dist/js/librerias/sweetalert2.js"></script>
    <script src="http://localhost/sistema/SB-Admin/dist/js/librerias/bootstrap-select.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js" integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ==" crossorigin="anonymous"></script>
    <script src="http://localhost/sistema/SB-Admin/dist/js/librerias/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/locales/bootstrap-datepicker.es.min.js" integrity="sha512-5pjEAV8mgR98bRTcqwZ3An0MYSOleV04mwwYj2yw+7PBhFVf/0KcE+NEox0XrFiU5+x5t5qidmo5MgBkDD9hEw==" crossorigin="anonymous"></script>
    <script src="http://localhost/sistema/SB-Admin/dist/js/agregarReporteIncidencia.js"></script>
    <script src="http://localhost/sistema/SB-Admin/dist/js/cerrarSesion.js"></script>

</body>

</html>