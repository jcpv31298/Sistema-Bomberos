<?php
    session_start();

    if (isset($_SESSION["usuario"])) {
        $usuario = $_SESSION["usuario"];
    
        if($usuario == "admin"){
            header("Location:http://" . $_SERVER["HTTP_HOST"] . "/sistema/SB-Admin/dist/index.php");
        }
        else{
            header("Location:http://" . $_SERVER["HTTP_HOST"] . "/sistema/SB-Admin/dist/src/agregarReporteIncidencia/agregarReporteIncidencia.php");
        }
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
    <title>Iniciar Sesión</title>
    <link href="http://localhost/sistema/SB-Admin/dist/css/styles.css" rel="stylesheet" />
    <script src="http://localhost/sistema/SB-Admin/dist/js/librerias/all.min.js"></script>
</head>

<body class="bg-dark">

    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-5">
                        <div class="card shadow-lg border-0 rounded-lg mt-5">
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Iniciar Sesión</h3>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="form-group">
                                        <label class="mb-1" for="txtUsuario">Usuario</label>
                                        <input class="form-control py-4" id="txtUsuario" type="text" placeholder="Escribe tu usuario" />
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-1" for="txtContrasena">Contraseña</label>
                                        <input class="form-control py-4" id="txtContrasena" type="password" placeholder="Escribe tu contraseña" />
                                    </div>
                                    <div class="text-center mb-0 mt-4">
                                        <button type="submit" class="btn btn-primary btn-block" id="btnEntrar">Entrar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>H. Cuerpo de Bomberos Mazatlán</div>
                        <div class="text-muted">Copyright &copy; Your Website 2020</div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="http://localhost/sistema/SB-Admin/dist/js/librerias/jquery-3.5.1.min.js"></script>
    <script src="http://localhost/sistema/SB-Admin/dist/js/librerias/bootstrap.bundle.min.js"></script>
    <script src="http://localhost/sistema/SB-Admin/dist/js/librerias/sweetalert2.js"></script>
    <script src="http://localhost/sistema/SB-Admin/dist/js/librerias/scripts.js"></script>
    <script>
        $("#btnEntrar").click(function(e) {
            e.preventDefault();
            if ($("#txtUsuario").val() == "") {
                Swal.fire({
                    icon: "warning",
                    title: "Atención",
                    text: "El campo Usuario esta vacío. "
                });
                return false;
            }

            if ($("#txtContrasena").val() == "") {
                Swal.fire({
                    icon: "warning",
                    title: "Atención",
                    text: "El campo Contraseña esta vacío. "
                });
                return false;
            }

            IniciarSesion();
        });

        function IniciarSesion() {
            var funcion = "IniciarSesion",
                usuario = $("#txtUsuario").val(),
                contrasena = $("#txtContrasena").val();
            funcion = JSON.stringify(funcion);

            $.ajax({
                type: "POST",
                url: getAbsolutePathHeader() + "/sistema/SB-Admin/dist/clases/empleados.php",
                data: { usuario: usuario, contrasena: contrasena, funcion: funcion },
                async: false,
                success: function(respuesta) {
                    if(respuesta == ""){
                        Swal.fire({
                            icon: "warning",
                            title: "Atención",
                            text: "El usuario ingresado no existe."
                        });
                        return false;
                    }

                    if(respuesta == 0){
                        Swal.fire({
                            icon: "warning",
                            title: "Atención",
                            text: "La contraseña es incorrecta."
                        });
                        return false;
                    }

                    if(respuesta != ""){
                        window.location.href = getAbsolutePathHeader() + "/sistema/";
                    }
                },
                error: function(msj) {
                    Swal.fire({
                        icon: "error",
                        title: "Algo salio mal",
                        text: "Hubo un error al iniciar sesión. " + msj
                    });
                }
            });
        }

        function getAbsolutePathHeader() {
            var loc = window.location;
            var pathName = loc.pathname.substring(0, loc.pathname.indexOf('/') + 1);
            var parametro1 = (loc.pathname + loc.search + loc.hash).length;
            var url = loc.href.substring(0, loc.href.length - (parametro1 - pathName.length));
            return url;
        }
    </script>

</body>

</html>