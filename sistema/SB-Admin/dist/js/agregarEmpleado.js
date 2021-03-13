$(document).ready(function () {
    $("#divDatosFamiliares").hide();
    $("#divInformacionAdicional").hide();
    $(".numeric").numeric({ decimal: false, negative: false });

    $("#btnSiguienteDP").click(function () {
        if (ValidarDatosPersonales() == false) { return false; }
        $("#divDatosPersonales").hide();
        $("#divDatosFamiliares").show();
        $("#divInformacionAdicional").hide();
    });

    $("#btnSiguienteDF").click(function () {
        if (ValidarDatosFamiliares() == false) { return false; }
        $("#divDatosPersonales").hide();
        $("#divDatosFamiliares").hide();
        $("#divInformacionAdicional").show();
    });

    $("#btnRegresarDF").click(function () {
        $("#divDatosPersonales").show();
        $("#divDatosFamiliares").hide();
        $("#divInformacionAdicional").hide();
    });

    $("#btnRegresarIA").click(function () {
        $("#divDatosPersonales").hide();
        $("#divDatosFamiliares").show();
        $("#divInformacionAdicional").hide();
    });

    $("#btnGuardarIA").click(function () {
        if (ValidarInformacionAdicional() == false) { return false; }
        GuardarEmpleado();
    });
});

function getAbsolutePathHeader() {
    var loc = window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.indexOf('/') + 1);
    var parametro1 = (loc.pathname + loc.search + loc.hash).length;
    var url = loc.href.substring(0, loc.href.length - (parametro1 - pathName.length));
    return url;
}

function ValidarDatosPersonales() {
    var campos = [
        [$("#txtNombre").val(), "Nombre"],
        [$("#txtApellido").val(), "Apellido"],
        [$("#txtCalleNumero").val(), "Calle y Número"],
        [$("#ddlColonia").val(), "Colonia"],
        [$("#ddlCp").val(), "C.P."],
        [$("#txtTelefono").val(), "Teléfono"],
        [$("#ddlEscolaridad").val(), "Escolaridad"],
        [$("#txtCorreo").val(), "Correo"],
        [$("#ddlTipoSangre").val(), "Tipo de Sangre"]
    ];

    for (var i = 0; i < campos.length; i++) {
        if (campos[i][0] == "") {
            Swal.fire({
                icon: "warning",
                title: "Atención",
                text: "El campo " + campos[i][1] + " esta vacío.",
            });
            return false;
        }
    }

    var telefono = $("#txtTelefono").val();
    if (telefono.length < 10) {
        Swal.fire({
            icon: "warning",
            title: "Atención",
            text: "El campo Teléfono debe contener 10 digitos.",
        });
        return false;
    }

    var correo = $("#txtCorreo").val();
    var regex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;

    if (!regex.test(correo)) {
        Swal.fire({
            icon: "warning",
            title: "Atención",
            text: "El campo Correo tiene un formato incorrecto.",
        });
        return false;
    }

}

function ValidarDatosFamiliares() {
    var nombrePadre = $("#txtNombrePadre").val(),
        telefonoPadre = $("#txtTelefonoPadre").val(),
        nombreMadre = $("#txtNombreMadre").val(),
        telefonoMadre = $("#txtTelefonoMadre").val(),
        nombreEsposa = $("#txtNombreEsposa").val(),
        telefonoEsposa = $("#txtTelefonoEsposa").val()

    if ((nombrePadre != "" && telefonoPadre == "") || (nombrePadre == "" && telefonoPadre != "")) {
        Swal.fire({
            icon: "warning",
            title: "Atención",
            text: "Uno de los dos datos del padre esta vacío.",
        });
        return false;
    }

    if (nombrePadre != "" && telefonoPadre.length < 10) {
        Swal.fire({
            icon: "warning",
            title: "Atención",
            text: "El campo Teléfono del padre debe contener 10 digitos.",
        });
        return false;
    }

    if ((nombreMadre != "" && telefonoMadre == "") || (nombreMadre == "" && telefonoMadre != "")) {
        Swal.fire({
            icon: "warning",
            title: "Atención",
            text: "Uno de los dos datos de la madre esta vacío.",
        });
        return false;
    }

    if (nombreMadre != "" && telefonoMadre.length < 10) {
        Swal.fire({
            icon: "warning",
            title: "Atención",
            text: "El campo Teléfono de la madre debe contener 10 digitos.",
        });
        return false;
    }

    if ((nombreEsposa != "" && telefonoEsposa == "") || (nombreEsposa == "" && telefonoEsposa != "")) {
        Swal.fire({
            icon: "warning",
            title: "Atención",
            text: "Uno de los dos datos de la esposa esta vacío.",
        });
        return false;
    }

    if (nombreEsposa != "" && telefonoEsposa.length < 10) {
        Swal.fire({
            icon: "warning",
            title: "Atención",
            text: "El campo Teléfono de la esposa debe contener 10 digitos.",
        });
        return false;
    }
}

function ValidarInformacionAdicional() {
    var campos = [
        [$("#txtTelefonoEmergencias").val(), "Teléfono de Emergencias"],
        [$("#txtCurp").val(), "CURP"],
        [$("#txtRfc").val(), "RFC"],
        [$("#txtImss").val(), "IMSS"],
        [$("#txtUsuario").val(), "Usuario"],
        [$("#txtContrasena").val(), "Contraseña"],
        [$("#txtConfirmarContrasena").val(), "Confirmar Contraseña"]
    ];

    for (var i = 0; i < campos.length; i++) {
        if (campos[i][0] == "") {
            Swal.fire({
                icon: "warning",
                title: "Atención",
                text: "El campo " + campos[i][1] + " esta vacío.",
            });
            return false;
        }
    }

    if ($("#txtTelefonoEmergencias").val().length < 10) {
        Swal.fire({
            icon: "warning",
            title: "Atención",
            text: "El campo Teléfono de Emergencias debe contener 10 digitos.",
        });
        return false;
    }

    var curp = $("#txtCurp").val(),
        rfc = $("#txtRfc").val(),
        imss = $("#txtImss").val(),
        regexCURP = /^([A-Z]{4}([0-9]{2})(0[1-9]|1[0-2])(0[1-9]|1[0-9]|2[0-9]|3[0-1])[HM](AS|BC|BS|CC|CL|CM|CS|CH|DF|DG|GT|GR|HG|JC|MC|MN|MS|NT|NL|OC|PL|QT|QR|SP|SL|SR|TC|TS|TL|VZ|YN|ZS|NE)[A-Z]{3}[0-9A-Z]\d)$/i,
        regexRFC = /^(([A-ZÑ&]{3,4}) ?(?:- ?)?(\d{2}(?:0[1-9]|1[0-2])(?:0[1-9]|[12]\d|3[01])) ?(?:- ?)?([A-Z\d]{2})([A\d]))$/i,
        regexIMSS = /^((\d{2})(\d{2})(\d{2}(\d{5})))$/i;

    if (!regexCURP.test(curp)) {
        Swal.fire({
            icon: "warning",
            title: "Atención",
            text: "El campo CURP tiene un formato incorrecto.",
        });
        return false;
    }

    if (!regexRFC.test(rfc)) {
        Swal.fire({
            icon: "warning",
            title: "Atención",
            text: "El campo RFC tiene un formato incorrecto.",
        });
        return false;
    }

    if (!regexIMSS.test(imss)) {
        Swal.fire({
            icon: "warning",
            title: "Atención",
            text: "El campo IMSS tiene un formato incorrecto.",
        });
        return false;
    }

    if ($("#txtContrasena").val() != $("#txtConfirmarContrasena").val()) {
        Swal.fire({
            icon: "warning",
            title: "Atención",
            text: "La contraseña no coincide.",
        });
        return false;
    }

}

function GuardarEmpleado() {
    var datos = [
        {
            // Datos Personales
            nombre: $("#txtNombre").val(),
            apellido: $("#txtApellido").val(),
            calleNumero: $("#txtCalleNumero").val(),
            colonia: $("#ddlColonia").val(),
            cp: $("#ddlCp").val(),
            telefono: $("#txtTelefono").val(),
            escolaridad: $("#ddlEscolaridad").val(),
            correo: $("#txtCorreo").val(),
            tipoSangre: $("#ddlTipoSangre").val(),
            // Datos Familiares
            nombrePadre: $("#txtNombrePadre").val(),
            telefonoPadre: $("#txtTelefonoPadre").val(),
            nombreMadre: $("#txtNombreMadre").val(),
            telefonoMadre: $("#txtTelefonoMadre").val(),
            nombreEsposa: $("#txtNombreEsposa").val(),
            telefonoEsposa: $("#txtTelefonoEsposa").val(),
            hijos: $("#txtNombreHijos").val(),
            // Informacion Adicional
            telefonoEmergencias: $("#txtTelefonoEmergencias").val(),
            curp: $("#txtCurp").val(),
            rfc: $("#txtRfc").val(),
            imss: $("#txtImss").val(),
            // Datos para iniciar sesión
            usuario: $("#txtUsuario").val(),
            contrasena: $("#txtContrasena").val()
        }
    ],
        funcion = "GuardarEmpleado";

    datos = JSON.stringify(datos);
    funcion = JSON.stringify(funcion);

    $.ajax({
        type: "POST",
        url: getAbsolutePathHeader() + "/sistema/SB-Admin/dist/clases/empleados.php",
        data: { datos: datos, funcion: funcion },
        async: false,
        success: function (respuesta) {
            if (respuesta) {
                var resultado = JSON.parse(respuesta);
                resultado = parseInt(resultado[0].id);
                GuardarImagenes(resultado);
            }
        },
        error: function (msj) {
            Swal.fire({
                icon: "error",
                title: "Algo salio mal",
                text: "Hubo un error al guardar los datos. " + msj
            });
        }
    });
}

function GuardarImagenes(idEmpleado) {
    var datos = new FormData();
    datos.append("id", idEmpleado);
    datos.append("nombre", $("#txtNombre").val());
    datos.append("apellido", $("#txtApellido").val());
    datos.append("imgPersonal", $("#imgPersonal")[0].files[0]);
    datos.append("imgINE", $("#imgINE")[0].files[0]);
    datos.append("imgDomicilio", $("#imgDomicilio")[0].files[0]);
    datos.append("imgCarta1", $("#imgCarta1")[0].files[0]);
    datos.append("imgCarta2", $("#imgCarta2")[0].files[0]);
    datos.append("funcion", "GuardarImagenes");

    $.ajax({
        type: "POST",
        url: getAbsolutePathHeader() + "/sistema/SB-Admin/dist/clases/empleados.php",
        data: datos,
        async: false,
        contentType: false,
        processData: false,
        success: function (respuesta) {
            if (respuesta == 1) {
                Swal.fire({
                    icon: "success",
                    title: "Exito",
                    text: "Los datos se han guardado correctamente.",
                }).then(function () {
                    window.location = getAbsolutePathHeader() + "/sistema/SB-Admin/dist/index.php";
                });
            }
            else {
                console.log(respuesta);
            }
        },
        error: function (msj) {
            Swal.fire({
                icon: "error",
                title: "Algo salio mal",
                text: "Hubo un error al guardar los datos. " + msj
            });
        }
    });
}