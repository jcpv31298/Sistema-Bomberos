$(document).ready(function () {
    $("#btnCerrarSesion").click(function () {
        CerrarSesion();
    });
});

function getAbsolutePathHeader() {
    var loc = window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.indexOf('/') + 1);
    var parametro1 = (loc.pathname + loc.search + loc.hash).length;
    var url = loc.href.substring(0, loc.href.length - (parametro1 - pathName.length));
    return url;
}

function CerrarSesion() {
    var funcion = "CerrarSesion";
    funcion = JSON.stringify(funcion);

    $.ajax({
        type: "POST",
        url: getAbsolutePathHeader() + "/sistema/SB-Admin/dist/clases/empleados.php",
        data: { funcion: funcion },
        async: false,
        success: function (respuesta) {
            if (respuesta) {
                window.location.href = getAbsolutePathHeader() + "/sistema/";
            }
        },
        error: function (msj) {
            Swal.fire({
                icon: "error",
                title: "Algo salio mal",
                text: "Hubo un error al cerrar sesión. " + msj
            });
        }
    });
}