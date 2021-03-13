<?php
session_start();
require_once dirname(__DIR__) . "\conexion\conexion.php";

class Empleados extends ConexionBD
{
    private $db;

    public function __construct()
    {
        $this->db = ConexionBD::conexion();
    }

    public function GuardarEmpleado()
    {
        $datos = json_decode($_POST["datos"]);
        $consulta = "INSERT INTO empleados(nombre_empleado, apellido_empleado, calle_numero, colonia, codigo_postal, telefono, escolaridad, correo, tipo_sangre, nombre_padre, telefono_padre, nombre_madre, telefono_madre, nombre_esposa, telefono_esposa, nombre_hijos, telefono_emergencia, curp, rfc, imss, img_personal, img_ine, img_domicilio, img_carta1, img_carta2, usuario, contrasena,estatus) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,1)";
        $ejecutar = $this->db->prepare($consulta);
        $resultado = false;
        foreach ($datos as $dato) {
            $ejecutar->bindParam(1, $dato->{"nombre"});
            $ejecutar->bindParam(2, $dato->{"apellido"});
            $ejecutar->bindParam(3, $dato->{"calleNumero"});
            $ejecutar->bindParam(4, $dato->{"colonia"});
            $ejecutar->bindParam(5, $dato->{"cp"});
            $ejecutar->bindParam(6, $dato->{"telefono"});
            $ejecutar->bindParam(7, $dato->{"escolaridad"});
            $ejecutar->bindParam(8, $dato->{"correo"});
            $ejecutar->bindParam(9, $dato->{"tipoSangre"});
            $ejecutar->bindParam(10, $dato->{"nombrePadre"});
            $ejecutar->bindParam(11, $dato->{"telefonoPadre"});
            $ejecutar->bindParam(12, $dato->{"nombreMadre"});
            $ejecutar->bindParam(13, $dato->{"telefonoMadre"});
            $ejecutar->bindParam(14, $dato->{"nombreEsposa"});
            $ejecutar->bindParam(15, $dato->{"telefonoEsposa"});
            $ejecutar->bindParam(16, $dato->{"hijos"});
            $ejecutar->bindParam(17, $dato->{"telefonoEmergencias"});
            $ejecutar->bindParam(18, $dato->{"curp"});
            $ejecutar->bindParam(19, $dato->{"rfc"});
            $ejecutar->bindParam(20, $dato->{"imss"});
            $ejecutar->bindParam(21, $dato->{"imgPersonal"});
            $ejecutar->bindParam(22, $dato->{"imgINE"});
            $ejecutar->bindParam(23, $dato->{"imgDomicilio"});
            $ejecutar->bindParam(24, $dato->{"imgCarta1"});
            $ejecutar->bindParam(25, $dato->{"imgCarta2"});
            $ejecutar->bindParam(26, $dato->{"usuario"});
            $contrasena = $dato->{"contrasena"};
            $contrasenaEncriptada = password_hash($contrasena, PASSWORD_DEFAULT);
            $ejecutar->bindParam(27, $contrasenaEncriptada);
            $resultado = $ejecutar->execute();
        }

        if (!$resultado) {
            return "Hubo un error al hacer la consulta";
        }

        $consultaEmpleado = "SELECT MAX(id) AS id FROM empleados";
        $ejecutarEmpleado = $this->db->prepare($consultaEmpleado);
        $ejecutarEmpleado->execute();
        $idEmpleado = array();
        while ($row = $ejecutarEmpleado->fetch((PDO::FETCH_ASSOC))) {
            $idEmpleado[] = array(
                "id" => $row["id"]
            );
        }
        echo json_encode($idEmpleado);
    }

    public function BuscarEmpleados()
    {
        $consulta = "SELECT id, CONCAT_WS(' ',nombre_empleado,apellido_empleado) AS nombre, CONCAT_WS(' ',calle_numero,colonia) AS direccion, telefono, correo,rfc FROM empleados WHERE estatus=1 AND usuario!='admin'";
        $ejecutar = $this->db->prepare($consulta);
        $ejecutar->execute();

        if (!$ejecutar) {
            return "Hubo un error al consultar los datos.";
        }

        $empleado = array();
        while ($row = $ejecutar->fetch(PDO::FETCH_ASSOC)) {
            $empleado[] = array(
                "id" => $row["id"],
                "nombre" => $row["nombre"],
                "direccion" => $row["direccion"],
                "telefono" => $row["telefono"],
                "correo" => $row["correo"],
                "rfc" => $row["rfc"]
            );
        }

        echo json_encode($empleado);
    }

    public function ConsultarEmpleado()
    {
        $id = $_POST["id"];
        $consulta = "SELECT id,nombre_empleado, apellido_empleado, calle_numero, colonia, codigo_postal, telefono, escolaridad, correo, tipo_sangre, nombre_padre, telefono_padre, nombre_madre, telefono_madre, nombre_esposa, telefono_esposa, nombre_hijos, telefono_emergencia, curp, rfc, imss, img_personal, img_ine, img_domicilio, img_carta1, img_carta2, usuario FROM empleados WHERE id=$id";
        $ejecutar = $this->db->prepare($consulta);
        $ejecutar->execute();

        if (!$ejecutar) {
            return "Hubo un error al consultar los datos.";
        }

        $empleado = array();
        $row = $ejecutar->fetch(PDO::FETCH_ASSOC);
        $empleado[] = array(
            "id" => $row["id"],
            "nombre_empleado" => $row["nombre_empleado"],
            "apellido_empleado" => $row["apellido_empleado"],
            "calle_numero" => $row["calle_numero"],
            "colonia" => $row["colonia"],
            "codigo_postal" => $row["codigo_postal"],
            "telefono" => $row["telefono"],
            "escolaridad" => $row["escolaridad"],
            "correo" => $row["correo"],
            "tipo_sangre" => $row["tipo_sangre"],
            "nombre_padre" => $row["nombre_padre"],
            "telefono_padre" => $row["telefono_padre"],
            "nombre_madre" => $row["nombre_madre"],
            "telefono_madre" => $row["telefono_madre"],
            "nombre_esposa" => $row["nombre_esposa"],
            "telefono_esposa" => $row["telefono_esposa"],
            "nombre_hijos" => $row["nombre_hijos"],
            "telefono_emergencia" => $row["telefono_emergencia"],
            "curp" => $row["curp"],
            "rfc" => $row["rfc"],
            "imss" => $row["imss"],
            "img_personal" => $row["img_personal"],
            "img_ine" => $row["img_ine"],
            "img_domicilio" => $row["img_domicilio"],
            "img_carta1" => $row["img_carta1"],
            "img_carta2" => $row["img_carta2"],
            "usuario" => $row["usuario"]
        );

        echo json_encode($empleado);
    }

    public function EliminarEmpleado()
    {
        $id = $_POST["id"];
        $consulta = "UPDATE empleados SET estatus=0 WHERE id=$id";
        $ejecutar = $this->db->prepare($consulta);
        $resultado = false;
        $resultado = $ejecutar->execute();

        if (!$resultado) {
            return "Hubo un error al eliminar al empleado.";
        }

        echo $resultado;
    }

    public function GuardarImagenes()
    {
        $imgPersonal = "";
        $ruta_imgPersonal = "";
        $ruta_imgPersonal_db = "";

        $imgINE = "";
        $ruta_imgINE = "";
        $ruta_imgINE_db = "";

        $imgDomicilio = "";
        $ruta_imgDomicilio = "";
        $ruta_imgDomicilio_db = "";

        $imgCarta1 = "";
        $ruta_imgCarta1 = "";
        $ruta_imgCarta1_db = "";

        $imgCarta2 = "";
        $ruta_imgCarta2 = "";
        $ruta_imgCarta2_db = "";

        $nombre = $_POST["nombre"] . " " . $_POST["apellido"];
        $resultado = false;

        // $ruta_carpeta= "https://".$_SERVER["HTTP_HOST"]."/sistema/SB-Admin/dist/Imagenes";
        $ruta_db = "http://" . $_SERVER["HTTP_HOST"] . "/sistema/SB-Admin/dist/imagenes";
        $ruta_carpeta = dirname(__DIR__) . "/imagenes";

        if (!file_exists($ruta_carpeta)) {
            mkdir($ruta_carpeta, 0777, true);
        }

        $ruta_carpeta_empleado_db = $ruta_db . "/" . $nombre;
        $ruta_carpeta_empleado = $ruta_carpeta . "/" . $nombre;

        if (!file_exists($ruta_carpeta_empleado)) {
            mkdir($ruta_carpeta_empleado, 0777, true);
        }

        if (!empty($_FILES["imgPersonal"]["name"])) {
            $imgPersonal = new SplFileInfo($_FILES["imgPersonal"]["name"]);
            $imgPersonalGuardar = $_FILES["imgPersonal"]["tmp_name"];
            $nombreImgPersonal = "img-Personal_" . date("dHis") . "." . $imgPersonal->getExtension();
            $ruta_imgPersonal = $ruta_carpeta_empleado . "/" . $nombreImgPersonal;
            $ruta_imgPersonal_db = $ruta_carpeta_empleado_db . "/" . $nombreImgPersonal;
            if (move_uploaded_file($imgPersonalGuardar, $ruta_imgPersonal)) {
                $resultado = true;
            } else {
                $resultado = false;
            }
        }

        if (!empty($_FILES["imgINE"]["name"])) {
            $imgINE = new SplFileInfo($_FILES["imgINE"]["name"]);
            $imgINEGuardar = $_FILES["imgINE"]["tmp_name"];
            $nombreImgINE = "img-INE_" . date("dHis") . "." . $imgINE->getExtension();
            $ruta_imgINE = $ruta_carpeta_empleado . "/" . $nombreImgINE;
            $ruta_imgINE_db = $ruta_carpeta_empleado_db . "/" . $nombreImgINE;
            if (move_uploaded_file($imgINEGuardar, $ruta_imgINE)) {
                $resultado = true;
            } else {
                $resultado = false;
            }
        }

        if (!empty($_FILES["imgDomicilio"]["name"])) {
            $imgDomicilio = new SplFileInfo($_FILES["imgDomicilio"]["name"]);
            $imgDomicilioGuardar = $_FILES["imgDomicilio"]["tmp_name"];
            $nombreImgDomicilio = "img-Domicilio_" . date("dHis") . "." . $imgDomicilio->getExtension();
            $ruta_imgDomicilio = $ruta_carpeta_empleado . "/" . $nombreImgDomicilio;
            $ruta_imgDomicilio_db = $ruta_carpeta_empleado_db . "/" . $nombreImgDomicilio;
            if (move_uploaded_file($imgDomicilioGuardar, $ruta_imgDomicilio)) {
                $resultado = true;
            } else {
                $resultado = false;
            }
        }

        if (!empty($_FILES["imgCarta1"]["name"])) {
            $imgCarta1 = new SplFileInfo($_FILES["imgCarta1"]["name"]);
            $imgCarta1Guardar = $_FILES["imgCarta1"]["tmp_name"];
            $nombreImgCarta1 = "img-Carta1_" . date("dHis") . "." . $imgCarta1->getExtension();
            $ruta_imgCarta1 = $ruta_carpeta_empleado . "/" . $nombreImgCarta1;
            $ruta_imgCarta1_db = $ruta_carpeta_empleado_db . "/" . $nombreImgCarta1;
            if (move_uploaded_file($imgCarta1Guardar, $ruta_imgCarta1)) {
                $resultado = true;
            } else {
                $resultado = false;
            }
        }

        if (!empty($_FILES["imgCarta2"]["name"])) {
            $imgCarta2 = new SplFileInfo($_FILES["imgCarta2"]["name"]);
            $imgCarta2Guardar = $_FILES["imgCarta2"]["tmp_name"];
            $nombreImgCarta2 = "img-Carta2_" . date("dHis") . "." . $imgCarta2->getExtension();
            $ruta_imgCarta2 = $ruta_carpeta_empleado . "/" . $nombreImgCarta2;
            $ruta_imgCarta2_db = $ruta_carpeta_empleado_db . "/" . $nombreImgCarta2;
            if (move_uploaded_file($imgCarta2Guardar, $ruta_imgCarta2)) {
                $resultado = true;
            } else {
                $resultado = false;
            }
        }

        $id = $_POST["id"];
        $consulta = "UPDATE empleados SET img_personal='$ruta_imgPersonal_db',img_ine='$ruta_imgINE_db',img_domicilio='$ruta_imgDomicilio_db',img_carta1='$ruta_imgCarta1_db',img_carta2='$ruta_imgCarta2_db' WHERE id=$id";
        $ejecutar = $this->db->prepare($consulta);
        $resultadoConsulta = $ejecutar->execute();
        if ($resultadoConsulta) {
            $resultado = true;
        } else {
            $resultado = false;
        }

        echo $resultadoConsulta;
    }

    public function EditarEmpleado()
    {
        $datos = json_decode($_POST["datos"]);
        $consulta = "UPDATE empleados SET nombre_empleado=?, apellido_empleado=?, calle_numero=?, colonia=?, codigo_postal=?, telefono=?, escolaridad=?, correo=?, tipo_sangre=?, nombre_padre=?, telefono_padre=?, nombre_madre=?, telefono_madre=?, nombre_esposa=?, telefono_esposa=?, nombre_hijos=?, telefono_emergencia=?, curp=?, rfc=?, imss=? WHERE id=?";
        $ejecutar = $this->db->prepare($consulta);
        $resultado = false;
        foreach ($datos as $dato) {
            $ejecutar->bindParam(1, $dato->{"nombre"});
            $ejecutar->bindParam(2, $dato->{"apellido"});
            $ejecutar->bindParam(3, $dato->{"calleNumero"});
            $ejecutar->bindParam(4, $dato->{"colonia"});
            $ejecutar->bindParam(5, $dato->{"cp"});
            $ejecutar->bindParam(6, $dato->{"telefono"});
            $ejecutar->bindParam(7, $dato->{"escolaridad"});
            $ejecutar->bindParam(8, $dato->{"correo"});
            $ejecutar->bindParam(9, $dato->{"tipoSangre"});
            $ejecutar->bindParam(10, $dato->{"nombrePadre"});
            $ejecutar->bindParam(11, $dato->{"telefonoPadre"});
            $ejecutar->bindParam(12, $dato->{"nombreMadre"});
            $ejecutar->bindParam(13, $dato->{"telefonoMadre"});
            $ejecutar->bindParam(14, $dato->{"nombreEsposa"});
            $ejecutar->bindParam(15, $dato->{"telefonoEsposa"});
            $ejecutar->bindParam(16, $dato->{"hijos"});
            $ejecutar->bindParam(17, $dato->{"telefonoEmergencias"});
            $ejecutar->bindParam(18, $dato->{"curp"});
            $ejecutar->bindParam(19, $dato->{"rfc"});
            $ejecutar->bindParam(20, $dato->{"imss"});
            $ejecutar->bindParam(21, $dato->{"id"});
            $resultado = $ejecutar->execute();
        }

        if (!$resultado) {
            return "Hubo un error al hacer la consulta";
        }

        echo json_encode($resultado);
    }

    public function GuardarImagenesEditar()
    {
        $imgPersonal = "";
        $ruta_imgPersonal = "";
        $ruta_imgPersonal_db = "";

        $imgINE = "";
        $ruta_imgINE = "";
        $ruta_imgINE_db = "";

        $imgDomicilio = "";
        $ruta_imgDomicilio = "";
        $ruta_imgDomicilio_db = "";

        $imgCarta1 = "";
        $ruta_imgCarta1 = "";
        $ruta_imgCarta1_db = "";

        $imgCarta2 = "";
        $ruta_imgCarta2 = "";
        $ruta_imgCarta2_db = "";

        $nombre = $_POST["nombre"] . " " . $_POST["apellido"];
        $resultado = false;

        // $ruta_carpeta= "https://".$_SERVER["HTTP_HOST"]."/sistema/SB-Admin/dist/Imagenes";
        $ruta_db = "http://" . $_SERVER["HTTP_HOST"] . "/sistema/SB-Admin/dist/imagenes";
        $ruta_carpeta = dirname(__DIR__) . "/imagenes";

        if (!file_exists($ruta_carpeta)) {
            mkdir($ruta_carpeta, 0777, true);
        }

        $ruta_carpeta_empleado_db = $ruta_db . "/" . $nombre;
        $ruta_carpeta_empleado = $ruta_carpeta . "/" . $nombre;

        if (!file_exists($ruta_carpeta_empleado)) {
            mkdir($ruta_carpeta_empleado, 0777, true);
        }

        if (!empty($_FILES["imgPersonal"]["name"])) {
            $imgPersonal = new SplFileInfo($_FILES["imgPersonal"]["name"]);
            $imgPersonalGuardar = $_FILES["imgPersonal"]["tmp_name"];
            $nombreImgPersonal = "img-Personal_" . date("dHis") . "." . $imgPersonal->getExtension();
            $ruta_imgPersonal = $ruta_carpeta_empleado . "/" . $nombreImgPersonal;
            $ruta_imgPersonal_db = $ruta_carpeta_empleado_db . "/" . $nombreImgPersonal;
            if (move_uploaded_file($imgPersonalGuardar, $ruta_imgPersonal)) {
                $resultado = true;
            } else {
                $resultado = false;
            }
        }

        if (!empty($_POST["imgPersonal"]) && $_POST["imgPersonal"] != "undefined") {
            $ruta_imgPersonal_db = $_POST["imgPersonal"];
        }

        if (!empty($_FILES["imgINE"]["name"])) {
            $imgINE = new SplFileInfo($_FILES["imgINE"]["name"]);
            $imgINEGuardar = $_FILES["imgINE"]["tmp_name"];
            $nombreImgINE = "img-INE_" . date("dHis") . "." . $imgINE->getExtension();
            $ruta_imgINE = $ruta_carpeta_empleado . "/" . $nombreImgINE;
            $ruta_imgINE_db = $ruta_carpeta_empleado_db . "/" . $nombreImgINE;
            if (move_uploaded_file($imgINEGuardar, $ruta_imgINE)) {
                $resultado = true;
            } else {
                $resultado = false;
            }
        }

        if (!empty($_POST["imgINE"]) && $_POST["imgINE"] != "undefined") {
            $ruta_imgINE_db = $_POST["imgINE"];
        }

        if (!empty($_FILES["imgDomicilio"]["name"])) {
            $imgDomicilio = new SplFileInfo($_FILES["imgDomicilio"]["name"]);
            $imgDomicilioGuardar = $_FILES["imgDomicilio"]["tmp_name"];
            $nombreImgDomicilio = "img-Domicilio_" . date("dHis") . "." . $imgDomicilio->getExtension();
            $ruta_imgDomicilio = $ruta_carpeta_empleado . "/" . $nombreImgDomicilio;
            $ruta_imgDomicilio_db = $ruta_carpeta_empleado_db . "/" . $nombreImgDomicilio;
            if (move_uploaded_file($imgDomicilioGuardar, $ruta_imgDomicilio)) {
                $resultado = true;
            } else {
                $resultado = false;
            }
        }

        if (!empty($_POST["imgDomicilio"]) && $_POST["imgDomicilio"] != "undefined") {
            $ruta_imgDomicilio_db = $_POST["imgDomicilio"];
        }

        if (!empty($_FILES["imgCarta1"]["name"])) {
            $imgCarta1 = new SplFileInfo($_FILES["imgCarta1"]["name"]);
            $imgCarta1Guardar = $_FILES["imgCarta1"]["tmp_name"];
            $nombreImgCarta1 = "img-Carta1_" . date("dHis") . "." . $imgCarta1->getExtension();
            $ruta_imgCarta1 = $ruta_carpeta_empleado . "/" . $nombreImgCarta1;
            $ruta_imgCarta1_db = $ruta_carpeta_empleado_db . "/" . $nombreImgCarta1;
            if (move_uploaded_file($imgCarta1Guardar, $ruta_imgCarta1)) {
                $resultado = true;
            } else {
                $resultado = false;
            }
        }

        if (!empty($_POST["imgCarta1"]) && $_POST["imgCarta1"] != "undefined") {
            $ruta_imgCarta1_db = $_POST["imgCarta1"];
        }

        if (!empty($_FILES["imgCarta2"]["name"])) {
            $imgCarta2 = new SplFileInfo($_FILES["imgCarta2"]["name"]);
            $imgCarta2Guardar = $_FILES["imgCarta2"]["tmp_name"];
            $nombreImgCarta2 = "img-Carta2_" . date("dHis") . "." . $imgCarta2->getExtension();
            $ruta_imgCarta2 = $ruta_carpeta_empleado . "/" . $nombreImgCarta2;
            $ruta_imgCarta2_db = $ruta_carpeta_empleado_db . "/" . $nombreImgCarta2;
            if (move_uploaded_file($imgCarta2Guardar, $ruta_imgCarta2)) {
                $resultado = true;
            } else {
                $resultado = false;
            }
        }

        if (!empty($_POST["imgCarta2"]) && $_POST["imgCarta2"] != "undefined") {
            $ruta_imgCarta2_db = $_POST["imgCarta2"];
        }

        $id = $_POST["id"];
        $consulta = "UPDATE empleados SET img_personal='$ruta_imgPersonal_db',img_ine='$ruta_imgINE_db',img_domicilio='$ruta_imgDomicilio_db',img_carta1='$ruta_imgCarta1_db',img_carta2='$ruta_imgCarta2_db' WHERE id=$id";
        $ejecutar = $this->db->prepare($consulta);
        $resultadoConsulta = $ejecutar->execute();
        if ($resultadoConsulta) {
            $resultado = true;
        } else {
            $resultado = false;
        }

        echo $resultadoConsulta;
    }

    public function RestablecerContrasena()
    {
        $id = $_POST["id"];
        $contrasena = $_POST["contrasena"];
        $contrasenaEncriptada = password_hash($contrasena, PASSWORD_DEFAULT);
        $consulta = "UPDATE empleados SET contrasena=? WHERE id=?";
        $ejecutar = $this->db->prepare($consulta);
        $ejecutar->bindParam(1, $contrasenaEncriptada);
        $ejecutar->bindParam(2, $id);
        $resultado = false;
        $resultado = $ejecutar->execute();

        if (!$resultado) {
            return "Hubo un error al eliminar al empleado.";
        }

        echo $resultado;
    }

    public function IniciarSesion()
    {
        $usuario = $_POST["usuario"];
        $contrasena = $_POST["contrasena"];

        $verificarUsuario = "SELECT id FROM empleados WHERE usuario=?";
        $ejecutarVerificarUsuario = $this->db->prepare($verificarUsuario);
        $ejecutarVerificarUsuario->bindParam(1, $usuario);
        $ejecutarVerificarUsuario->execute();

        $idEmpleado = "";
        $row = $ejecutarVerificarUsuario->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $idEmpleado = $row["id"];
            $verificarContrasena = "SELECT contrasena FROM empleados WHERE id=?";
            $ejecutarVefiricarContrasena = $this->db->prepare($verificarContrasena);
            $ejecutarVefiricarContrasena->bindParam(1, $idEmpleado);
            $ejecutarVefiricarContrasena->execute();

            $rowContrasena = $ejecutarVefiricarContrasena->fetch(PDO::FETCH_ASSOC);
            $contrasena_db = $rowContrasena["contrasena"];

            if (password_verify($contrasena, $contrasena_db)) {
                $_SESSION["usuario"] = $usuario;
                $_SESSION["idUsuario"] = $idEmpleado;
                if($usuario == "admin"){
                    header("Location:http://" . $_SERVER["HTTP_HOST"] . "/sistema/SB-Admin/dist/");
                }
                else {
                    header("Location:http://" . $_SERVER["HTTP_HOST"] . "/sistema/SB-Admin/dist/src/agregarReporteIncidencia/agregarReporteIncidencia.php");

                }
            } else {
                echo 0;
            }
        } else {
            echo $idEmpleado;
        }
    }

    public function CerrarSesion()
    {
        session_start();
        session_destroy();

        header("Location:http://" . $_SERVER["HTTP_HOST"] . "/sistema/");
    }
}

if (empty(json_decode($_POST["funcion"]))) {
    $funcion = $_POST["funcion"];
} else {
    $funcion = json_decode($_POST["funcion"]);
}
$clase = new Empleados();
$clase->$funcion();
