$(document).ready(function() {
    $("#hrefInicio").hide();
    $("#sidebarToggle").hide();
    $("#hrefUsuario").show();

    BuscarEmpleados();

    $('#txtFecha').datepicker({
        format: 'dd/mm/yyyy',
        language: 'es',
        orientation: 'bottom',
        autoclose: true,
        endDate: new Date()
    });

    var fecha = new Date();
    var year = fecha.getFullYear();
    var mes = fecha.getMonth()+1;
    var dia = fecha.getDate();
    var today =dia+"/"+mes+"/"+year;

    $("#txtFecha").datepicker("setDate", today);
    
});

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
            var option;
            for(var i = 0; i < empleado.length; i++) {
                option = "<option>" + empleado[i].nombre + "</option>";
                $("#ddlEmpleados").append(option);
                $("#ddlEmpleados").selectpicker("refresh");
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