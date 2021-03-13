$(document).ready(function () {
    $(".numeric").numeric({ decimal: false, negative: false });
    BuscarEmpleados();

    $(document).on("click", ".btn-consultar", function () {
        var posicionEmpleado = $(this)[0].parentElement.parentElement.parentElement,
            idEmpleado = $(posicionEmpleado).attr("id");
        ConsultarDatosEmpleado(idEmpleado);
    });

    $("#btnRegresarConsultarEmpleado").click(function () {
        $("#tabla").show();
        $("#consultarEmpleado").hide();
    });

    $(document).on("click", ".btn-editar", function () {
        var posicionEmpleado = $(this)[0].parentElement.parentElement.parentElement,
            idEmpleado = $(posicionEmpleado).attr("id");
        $("#hdnEditarEmpleado").val("1");
        $("#idEditar").val(idEmpleado);
        ConsultarDatosEmpleado(idEmpleado);
    });

    $("#btnCancelarEditarEmpleado").click(function () {
        limpiarCamposEditarEmpleado();
        $("#tabla").show();
        $("#editarEmpleado").hide();
    });

    $("#btnEditarEmpleado").click(function () {
        if (ValidarDatosPersonales() == false) { return false; }
        if (ValidarDatosFamiliares() == false) { return false; }
        if (ValidarInformacionAdicional() == false) { return false; }
        EditarEmpleado();
    });

    $(document).on("click", ".btn-eliminar", function () {
        var posicionEmpleado = $(this)[0].parentElement.parentElement.parentElement
        var idEmpleado = $(posicionEmpleado).attr("id");
        Swal.fire({
            title: 'Se dara de baja el empleado seleccionado',
            text: "¿Estas seguro?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: 'green',
            cancelButtonColor: 'red',
            confirmButtonText: 'Si',
            cancelButtonText: 'No',
            reverseButtons: true,
        }).then(function (confirm) {
            if (confirm.isConfirmed) {
                EliminarEmpleado(idEmpleado);
            }
            else {
                return false;
            }
        });

    });

    $("#btnEliminarImgPersonal").click(function () {
        $("#divAgregarImgPersonal").show();
        $("#divEliminarImgPersonal").hide();
    });

    $("#btnEliminarImgINE").click(function () {
        $("#divAgregarImgINE").show();
        $("#divEliminarImgINE").hide();
    });

    $("#btnEliminarImgDomicilio").click(function () {
        $("#divAgregarImgDomicilio").show();
        $("#divEliminarImgDomicilio").hide();
    });

    $("#btnEliminarImgCarta1").click(function () {
        $("#divAgregarImgCarta1").show();
        $("#divEliminarImgCarta1").hide();
    });

    $("#btnEliminarImgCarta2").click(function () {
        $("#divAgregarImgCarta2").show();
        $("#divEliminarImgCarta2").hide();
    });

    $(document).on("click", ".btn-restablecer-contrasena", function () {
        var posicionEmpleado = $(this)[0].parentElement.parentElement.parentElement,
            idEmpleado = $(posicionEmpleado).attr("id");
        $("#hdnRestablecerContrasena").val("1");
        $("#idRestablecerContrasena").val(idEmpleado);
        ConsultarDatosEmpleado(idEmpleado);
    });

    $('#restablecerContrasena').on('hidden.bs.modal', function () {
        $("#txtUsuarioEditar").val("");
        $("#txtContrasenaEditar").val("");
        $("#txtConfirmarContrasenaEditar").val("");
        $("#hdnRestablecerContrasena").val("0");
        $("#idRestablecerContrasena").val("0");
    });

    $("#btnRestablecerContrasena").click(function() {
        if ($("#txtContrasenaEditar").val() == "") {
            Swal.fire({
                icon: "warning",
                title: "Atención",
                text: "El campo Nueva Contraseña esta vacío.",
            });
            return false;
        }

        if ($("#txtConfirmarContrasenaEditar").val() == "") {
            Swal.fire({
                icon: "warning",
                title: "Atención",
                text: "El campo Confirmar Contraseña esta vacío.",
            });
            return false;
        }

        if ($("#txtContrasenaEditar").val() != $("#txtConfirmarContrasenaEditar").val()) {
            Swal.fire({
                icon: "warning",
                title: "Atención",
                text: "La contraseña no coincide.",
            });
            return false;
        }

        var idEmpleado = $("#idRestablecerContrasena").val();
        RestablecerContrasena(idEmpleado);
    });

});

function getAbsolutePathHeader() {
    var loc = window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.indexOf('/') + 1);
    var parametro1 = (loc.pathname + loc.search + loc.hash).length;
    var url = loc.href.substring(0, loc.href.length - (parametro1 - pathName.length));
    return url;
}

function BuscarEmpleados() {
    var funcion = "BuscarEmpleados";
    funcion = JSON.stringify(funcion);

    $.ajax({
        type: "POST",
        url: getAbsolutePathHeader() + "/sistema/SB-Admin/dist/clases/empleados.php",
        data: { funcion: funcion },
        async: false,
        success: function (respuesta) {
            var empleado = JSON.parse(respuesta);
            if (empleado.length > 0) {
                $("#tablaEmpleados").dataTable().fnClearTable();
                $("#tablaEmpleados").dataTable().fnDestroy();
                var row;
                for (var i = 0; i < empleado.length; i++) {
                    row =
                        '<tr id=' + empleado[i].id + '>' +
                        '<td>' + empleado[i].nombre + '</td>' +
                        '<td>' + empleado[i].direccion + '</td>' +
                        '<td>' + empleado[i].telefono + '</td>' +
                        '<td>' + empleado[i].correo + '</td>' +
                        '<td>' + empleado[i].rfc + '</td>' +
                        '<td class="text-center"><div class="btn-group">' +
                        '<button class="btn btn-primary btn-consultar" title="Consultar Empleado"><i class="fas fa-eye"></i></button>' +
                        '<button class="btn btn-success btn-editar" title="Editar Empleado"><i class="fas fa-edit"></i></button>' +
                        '<button class="btn btn-info btn-restablecer-contrasena" title="Restablecer Contraseña" data-toggle="modal" data-target="#restablecerContrasena"><i class="fas fa-key"></i></button>' +
                        '<button class="btn btn-danger btn-eliminar" title="Eliminar Empleado"><i class="fas fa-trash"></i></button>' +
                        '</div></td>' +
                        '</tr>'
                    $("#tablaEmpleados > tbody:last-child").append(row);
                }
                $("#tablaEmpleados").dataTable({
                    columnDefs: [
                        {
                            "targets": [5],
                            "orderable": false,
                            "searchable": false
                        }
                    ],
                    dom: 'lBfrtip',
                    buttons: [
                        {
                            extend: "pdfHtml5",
                            text: 'PDF <i class="fas fa-file-pdf"></i></i>',
                            className: "btn btn-danger",
                            customize: function (doc) {
                                doc.defaultStyle.alignment = "center";
                                // doc.content[1].table.widths = Array(doc.content[1].table.body[0].length + 1).join('*').split('');
                                var objLayout = {};
                                objLayout['hLineWidth'] = function (i) { return .5; };
                                objLayout['vLineWidth'] = function (i) { return .5; };
                                objLayout['hLineColor'] = function (i) { return '#aaa'; };
                                objLayout['vLineColor'] = function (i) { return '#aaa'; };
                                doc.content[1].layout = objLayout;
                            },
                            title: "Lista de Empleados",
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4]
                            },
                            filename: "Lista de Empleados"

                        }
                    ],
                });

                var btnPDF = $(".dt-buttons > button")[0];
                $("#tablaEmpleados_filter").prepend(btnPDF);
            }
            else {
                $("#tablaEmpleados").hide();
                $("#tabla").append("<h3>No se han encontrado registros aún.</h3>")
            }

        },
        error: function (msj) {
            Swal.fire({
                icon: "error",
                title: "Algo salio mal",
                text: "Hubo un error al obtener los datos. " + msj
            });
        }
    });
}

function ConsultarDatosEmpleado(id) {
    var funcion = "ConsultarEmpleado";
    funcion = JSON.stringify(funcion);
    id = JSON.stringify(id);
    $.ajax({
        type: "POST",
        url: getAbsolutePathHeader() + "/sistema/SB-Admin/dist/clases/empleados.php",
        data: { id: id, funcion: funcion },
        async: false,
        success: function (respuesta) {
            var empleado = JSON.parse(respuesta);
            if (empleado.length > 0) {
                if ($("#hdnEditarEmpleado").val() == "1") {
                    LlenarCamposEditar(empleado);
                }
                else {
                    if ($("#hdnRestablecerContrasena").val() == "1") {
                        $("#txtUsuarioEditar").val(empleado[0].usuario);
                    }
                    else {
                        LlenarCamposConsultar(empleado);
                    }
                }
                $("#hdnEditarEmpleado").val("0");
            }
            else {
                Swal.fire({
                    icon: "error",
                    title: "Algo salio mal",
                    text: "Hubo un error al obtener los datos.",
                });
            }
        },
        error: function (msj) {
            Swal.fire({
                icon: "error",
                title: "Algo salio mal",
                text: "Hubo un error al obtener los datos. " + msj
            });
        }
    });
}

function LlenarCamposConsultar(empleado) {
    $("#txtNombre").val(empleado[0].nombre_empleado);
    $("#txtApellido").val(empleado[0].apellido_empleado);
    $("#txtCalleNumero").val(empleado[0].calle_numero);
    $("#txtColonia").val(empleado[0].colonia);
    $("#txtCp").val(empleado[0].codigo_postal);
    $("#txtTelefono").val(empleado[0].telefono);
    $("#txtEscolaridad").val(empleado[0].escolaridad);
    $("#txtCorreo").val(empleado[0].correo);
    $("#txtTipoSangre").val(empleado[0].tipo_sangre);
    $("#txtNombrePadre").val(empleado[0].nombre_padre);
    $("#txtTelefonoPadre").val(empleado[0].telefono_padre);
    $("#txtNombreMadre").val(empleado[0].nombre_madre);
    $("#txtTelefonoMadre").val(empleado[0].telefono_madre);
    $("#txtNombreEsposa").val(empleado[0].nombre_esposa);
    $("#txtTelefonoEsposa").val(empleado[0].telefono_esposa);
    $("#txtNombreHijos").val(empleado[0].nombre_hijos);
    $("#txtTelefonoEmergencias").val(empleado[0].telefono_emergencia);
    $("#txtCurp").val(empleado[0].curp);
    $("#txtRfc").val(empleado[0].rfc);
    $("#txtImss").val(empleado[0].imss);
    $("#txtUsuario").val(empleado[0].usuario);
    $("#img_personal").empty();
    $("#img_ine").empty();
    $("#img_domicilio").empty();
    $("#img_carta1").empty();
    $("#img_carta2").empty();

    if (empleado[0].img_personal == "") {
        var img = "No se a guardado una imagen.";
        $("#img_personal").append(img);
    }
    else {
        var img = "<img src='" + empleado[0].img_personal + "' class='img-fluid' alt='Imagen Personal'>"
        $("#img_personal").append(img);
    }

    if (empleado[0].img_ine == "") {
        var img = "No se a guardado una imagen.";
        $("#img_ine").append(img);
    }
    else {
        var img = "<img src='" + empleado[0].img_ine + "' class='img-fluid' alt='Imagen INE'>"
        $("#img_ine").append(img);
    }

    if (empleado[0].img_domicilio == "") {
        var img = "No se a guardado una imagen.";
        $("#img_domicilio").append(img);
    }
    else {
        var img = "<img src='" + empleado[0].img_domicilio + "' class='img-fluid' alt='Imagen Domicilio'>"
        $("#img_domicilio").append(img);
    }

    if (empleado[0].img_carta1 == "") {
        var img = "No se a guardado una imagen.";
        $("#img_carta1").append(img);
    }
    else {
        var img = "<img src='" + empleado[0].img_carta1 + "' class='img-fluid' alt='Imagen Carta 1'>"
        $("#img_carta1").append(img);
    }

    if (empleado[0].img_carta2 == "") {
        var img = "No se a guardado una imagen.";
        $("#img_carta2").append(img);
    }
    else {
        var img = "<img src='" + empleado[0].img_carta2 + "' class='img-fluid' alt='Imagen Carta 2'>"
        $("#img_carta2").append(img);
    }

    $("#consultarEmpleado").show();
    $("#tabla").hide();
}

function LlenarCamposEditar(empleado) {
    $("#txtNombreEditar").val(empleado[0].nombre_empleado);
    $("#txtApellidoEditar").val(empleado[0].apellido_empleado);
    $("#txtCalleNumeroEditar").val(empleado[0].calle_numero);
    $("#ddlColoniaEditar").selectpicker("val", empleado[0].colonia);
    $("#ddlCpEditar").selectpicker("val", empleado[0].codigo_postal);
    $("#txtTelefonoEditar").val(empleado[0].telefono);
    $("#ddlEscolaridadEditar").selectpicker("val", empleado[0].escolaridad);
    $("#txtCorreoEditar").val(empleado[0].correo);
    $("#ddlTipoSangreEditar").selectpicker("val", empleado[0].tipo_sangre);
    $("#txtNombrePadreEditar").val(empleado[0].nombre_padre);
    $("#txtTelefonoPadreEditar").val(empleado[0].telefono_padre);
    $("#txtNombreMadreEditar").val(empleado[0].nombre_madre);
    $("#txtTelefonoMadreEditar").val(empleado[0].telefono_madre);
    $("#txtNombreEsposaEditar").val(empleado[0].nombre_esposa);
    $("#txtTelefonoEsposaEditar").val(empleado[0].telefono_esposa);
    $("#txtNombreHijosEditar").val(empleado[0].nombre_hijos);
    $("#txtTelefonoEmergenciasEditar").val(empleado[0].telefono_emergencia);
    $("#txtCurpEditar").val(empleado[0].curp);
    $("#txtRfcEditar").val(empleado[0].rfc);
    $("#txtImssEditar").val(empleado[0].imss);
    $("#hdnImgPersonalEditar").val(empleado[0].img_personal);
    $("#hdnImgINEEditar").val(empleado[0].img_ine);
    $("#hdnImgDomicilioEditar").val(empleado[0].img_domicilio);
    $("#hdnImgCarta1Editar").val(empleado[0].img_carta1);
    $("#hdnImgCarta2Editar").val(empleado[0].img_carta2);

    if (empleado[0].img_personal == "") {
        $("#divAgregarImgPersonal").show();
        $("#divEliminarImgPersonal").hide();
    }
    else {
        $("#divEliminarImgPersonal").show();
        $("#divAgregarImgPersonal").hide();
    }

    if (empleado[0].img_ine == "") {
        $("#divAgregarImgINE").show();
        $("#divEliminarImgINE").hide();
    }
    else {
        $("#divEliminarImgINE").show();
        $("#divAgregarImgINE").hide();
    }

    if (empleado[0].img_domicilio == "") {
        $("#divAgregarImgDomicilio").show();
        $("#divEliminarImgDomicilio").hide();
    }
    else {
        $("#divEliminarImgDomicilio").show();
        $("#divAgregarImgDomicilio").hide();
    }

    if (empleado[0].img_carta1 == "") {
        $("#divAgregarImgCarta1").show();
        $("#divEliminarImgCarta1").hide();
    }
    else {
        $("#divEliminarImgCarta1").show();
        $("#divAgregarImgCarta1").hide();
    }

    if (empleado[0].img_carta2 == "") {
        $("#divAgregarImgCarta2").show();
        $("#divEliminarImgCarta2").hide();
    }
    else {
        $("#divEliminarImgCarta2").show();
        $("#divAgregarImgCarta2").hide();
    }

    $("#editarEmpleado").show();
    $("#tabla").hide();
}

function ValidarDatosPersonales() {
    var campos = [
        [$("#txtNombreEditar").val(), "Nombre"],
        [$("#txtApellidoEditar").val(), "Apellido"],
        [$("#txtCalleNumeroEditar").val(), "Calle y Número"],
        [$("#ddlColoniaEditar").val(), "Colonia"],
        [$("#ddlCpEditar").val(), "C.P."],
        [$("#txtTelefonoEditar").val(), "Teléfono"],
        [$("#ddlEscolaridadEditar").val(), "Escolaridad"],
        [$("#txtCorreoEditar").val(), "Correo"],
        [$("#ddlTipoSangreEditar").val(), "Tipo de Sangre"]
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

    var telefono = $("#txtTelefonoEditar").val();
    if (telefono.length < 10) {
        Swal.fire({
            icon: "warning",
            title: "Atención",
            text: "El campo Teléfono debe contener 10 digitos.",
        });
        return false;
    }

    var correo = $("#txtCorreoEditar").val();
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
    var nombrePadre = $("#txtNombrePadreEditar").val(),
        telefonoPadre = $("#txtTelefonoPadreEditar").val(),
        nombreMadre = $("#txtNombreMadreEditar").val(),
        telefonoMadre = $("#txtTelefonoMadreEditar").val(),
        nombreEsposa = $("#txtNombreEsposaEditar").val(),
        telefonoEsposa = $("#txtTelefonoEsposaEditar").val()

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
        [$("#txtTelefonoEmergenciasEditar").val(), "Teléfono de Emergencias"],
        [$("#txtCurpEditar").val(), "CURP"],
        [$("#txtRfcEditar").val(), "RFC"],
        [$("#txtImssEditar").val(), "IMSS"]
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

    if ($("#txtTelefonoEmergenciasEditar").val().length < 10) {
        Swal.fire({
            icon: "warning",
            title: "Atención",
            text: "El campo Teléfono de Emergencias debe contener 10 digitos.",
        });
        return false;
    }

    var curp = $("#txtCurpEditar").val(),
        rfc = $("#txtRfcEditar").val(),
        imss = $("#txtImssEditar").val(),
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

}

function EditarEmpleado() {
    var datos = [
        {
            // Datos Personales
            nombre: $("#txtNombreEditar").val(),
            apellido: $("#txtApellidoEditar").val(),
            calleNumero: $("#txtCalleNumeroEditar").val(),
            colonia: $("#ddlColoniaEditar").val(),
            cp: $("#ddlCpEditar").val(),
            telefono: $("#txtTelefonoEditar").val(),
            escolaridad: $("#ddlEscolaridadEditar").val(),
            correo: $("#txtCorreoEditar").val(),
            tipoSangre: $("#ddlTipoSangreEditar").val(),
            // Datos Familiares
            nombrePadre: $("#txtNombrePadreEditar").val(),
            telefonoPadre: $("#txtTelefonoPadreEditar").val(),
            nombreMadre: $("#txtNombreMadreEditar").val(),
            telefonoMadre: $("#txtTelefonoMadreEditar").val(),
            nombreEsposa: $("#txtNombreEsposaEditar").val(),
            telefonoEsposa: $("#txtTelefonoEsposaEditar").val(),
            hijos: $("#txtNombreHijosEditar").val(),
            // Informacion Adicional
            telefonoEmergencias: $("#txtTelefonoEmergenciasEditar").val(),
            curp: $("#txtCurpEditar").val(),
            rfc: $("#txtRfcEditar").val(),
            imss: $("#txtImssEditar").val(),
            // id
            id: $("#idEditar").val()
        }
    ],
        funcion = "EditarEmpleado";

    datos = JSON.stringify(datos);
    funcion = JSON.stringify(funcion);

    $.ajax({
        type: "POST",
        url: getAbsolutePathHeader() + "/sistema/SB-Admin/dist/clases/empleados.php",
        data: { datos: datos, funcion: funcion },
        async: false,
        success: function (respuesta) {
            if (respuesta) {
                var idEmpleado = $("#idEditar").val();
                GuardarImagenes(idEmpleado);
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
    datos.append("nombre", $("#txtNombreEditar").val());
    datos.append("apellido", $("#txtApellidoEditar").val());
    datos.append("imgPersonal", $("#divAgregarImgPersonal").is(":visible") ? $("#imgPersonalEditar")[0].files[0] : $("#hdnImgPersonalEditar").val());
    datos.append("imgINE", $("#divAgregarImgINE").is(":visible") ? $("#imgINEEditar")[0].files[0] : $("#hdnImgINEEditar").val());
    datos.append("imgDomicilio", $("#divAgregarImgDomicilio").is(":visible") ? $("#imgDomicilioEditar")[0].files[0] : $("#hdnImgDomicilioEditar").val());
    datos.append("imgCarta1", $("#divAgregarImgCarta1").is(":visible") ? $("#imgCarta1Editar")[0].files[0] : $("#hdnImgCarta1Editar").val());
    datos.append("imgCarta2", $("#divAgregarImgCarta2").is(":visible") ? $("#imgCarta2Editar")[0].files[0] : $("#hdnImgCarta2Editar").val());
    datos.append("funcion", "GuardarImagenesEditar");

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
                    text: "Los datos se han actualizado correctamente.",
                }).then(function () {
                    $("#editarEmpleado").hide();
                    BuscarEmpleados();
                    $("#tabla").show();
                });

                limpiarCamposEditarEmpleado();
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

function EliminarEmpleado(id) {
    var funcion = "EliminarEmpleado";
    funcion = JSON.stringify(funcion);
    id = JSON.stringify(id);

    $.ajax({
        type: "POST",
        url: getAbsolutePathHeader() + "/sistema/SB-Admin/dist/clases/empleados.php",
        data: { id: id, funcion: funcion },
        async: false,
        success: function (respuesta) {
            if (respuesta) {
                BuscarEmpleados();
            }
        },
        error: function (msj) {
            Swal.fire({
                icon: "error",
                title: "Algo salio mal",
                text: "Hubo un error al eliminar el empleado. " + msj
            });
        }
    });
}

function RestablecerContrasena(idEmpleado) {
    var funcion = "RestablecerContrasena";
    funcion = JSON.stringify(funcion);
    // id = JSON.stringify(idEmpleado);
    // contrasena = JSON.stringify($("#txtContrasenaEditar").val());
    id = idEmpleado;
    contrasena = $("#txtContrasenaEditar").val();

    $.ajax({
        type: "POST",
        url: getAbsolutePathHeader() + "/sistema/SB-Admin/dist/clases/empleados.php",
        data: { id: id, contrasena: contrasena, funcion: funcion },
        async: false,
        success: function (respuesta) {
            if (respuesta) {
                Swal.fire({
                    icon: "success",
                    title: "Exito",
                    text: "La contraseña se ha restablecido correctamente. "
                }).then(function() {
                    $('#restablecerContrasena').modal('hide');
                    BuscarEmpleados();
                });
            }
        },
        error: function (msj) {
            Swal.fire({
                icon: "error",
                title: "Algo salio mal",
                text: "Hubo un error al restablecer la contraseña. " + msj
            });
        }
    });
}

function limpiarCamposEditarEmpleado() {
    $("#txtNombreEditar").val("");
    $("#txtApellidoEditar").val("");
    $("#txtCalleNumeroEditar").val("");
    $("#ddlColoniaEditar").selectpicker("val","");
    $("#ddlCpEditar").selectpicker("val","");
    $("#txtTelefonoEditar").val("");
    $("#ddlEscolaridadEditar").selectpicker("val","");
    $("#txtCorreoEditar").val("");
    $("#ddlTipoSangreEditar").selectpicker("val","");
    $("#txtNombrePadreEditar").val("");
    $("#txtTelefonoPadreEditar").val("");
    $("#txtNombreMadreEditar").val("");
    $("#txtTelefonoMadreEditar").val("");
    $("#txtNombreEsposaEditar").val("");
    $("#txtTelefonoEsposaEditar").val("");
    $("#txtNombreHijosEditar").val("");
    $("#txtTelefonoEmergenciasEditar").val("");
    $("#txtCurpEditar").val("");
    $("#txtRfcEditar").val("");
    $("#txtImssEditar").val("");
    $("#imgPersonalEditar").val("");
    $("#imgINEEditar").val("");
    $("#imgDomicilioEditar").val("");
    $("#imgCarta1Editar").val("");
    $("#imgCarta2Editar").val("");
}