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
    <link href="http://localhost/sistema/SB-Admin/dist/css/bootstrap-select.min.css" rel="stylesheet" />
    <script src="http://localhost/sistema/SB-Admin/dist/js/librerias/all.min.js"></script>
</head>

<body class="sb-nav-fixed">

    <!-- Header -->
    <?php include dirname(dirname(__DIR__)) . "\header\header.php"  ?>
    <!-- End Header -->
    <div id="layoutSidenav">
        <!-- Sidenav -->
        <?php include dirname(dirname(__DIR__)) . "\header\sidenav.php"  ?>
        <!-- End Sidenav -->
        <div id="layoutSidenav_content">
            <div class="container-fluid">

                <ol class="breadcrumb mt-3">
                    <li class="breadcrumb-item active text-dark">Agregar Empleado</li>
                </ol>

                <div id="divDatosPersonales">

                    <h3 class="font-weight-normal">Datos Personales</h3>

                    <div class="form-group">

                        <div class="form-row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="txtNombre">Nombre</label>
                                    <input type="text" class="form-control" name="txtNombre" placeholder="Nombre" id="txtNombre" autofocus="autofocus">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="txtApellido">Apellido</label>
                                    <input type="text" class="form-control" name="txtApellido" placeholder="Apellido" id="txtApellido">
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="form-group">

                        <div class="form-row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="txtCalleNumero">Calle y N&uacute;mero</label>
                                    <input type="text" class="form-control" id="txtCalleNumero" name="txtCalleNumero" placeholder="Calle y N&uacute;mero">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="ddlColonia">Colonia</label>
                                    <select class="form-control selectpicker border" name="ddlColonia" id="ddlColonia" data-live-search="true" title="Selecciona una opción">
                                        <!-- 346 colonias -->
                                        <option>12 de Mayo</option>
                                        <option>20 de Noviembre</option>
                                        <option>23 de Noviembre</option>
                                        <option>2a Ampliación Felipe Angeles</option>
                                        <option>2da. Ampliación Valle de Urias</option>
                                        <option>5a. Gaviotas</option>
                                        <option>5ta Chapalita</option>
                                        <option>Alameda</option>
                                        <option>Alfredo V. Bonfil</option>
                                        <option>Ampliación de Urías I</option>
                                        <option>Ampliación de Urías II</option>
                                        <option>Ampliación de Urías III</option>
                                        <option>Ampliación Esperanza</option>
                                        <option>Ampliación Francisco Alarcón (Venadillo II)</option>
                                        <option>Ampliación Valle del Ejido</option>
                                        <option>Ampliación Villa Verde</option>
                                        <option>Ampl. Lico Velarde</option>
                                        <option>Ampl. Lomas del Ébano</option>
                                        <option>Anabella de Gavica</option>
                                        <option>Anáhuac</option>
                                        <option>Ana Paula</option>
                                        <option>Antiguo Aeropuerto</option>
                                        <option>Antonio Toledo Corro</option>
                                        <option>Arboledas I</option>
                                        <option>Arboledas II</option>
                                        <option>Arboledas III</option>
                                        <option>Arboledas INVIES</option>
                                        <option>Azalea</option>
                                        <option>Azteca</option>
                                        <option>Bahía de Mazatlán FOVISSSTE</option>
                                        <option>Bahías</option>
                                        <option>Balcones de Loma Linda</option>
                                        <option>Benito Juárez</option>
                                        <option>Bosques del Arroyo</option>
                                        <option>Brisas del Mar</option>
                                        <option>Brisas del Valle II</option>
                                        <option>Buenos Aires</option>
                                        <option>Bugambilias</option>
                                        <option>Burócrata</option>
                                        <option>Campo Bello</option>
                                        <option>Casa Blanca</option>
                                        <option>Casa Redonda</option>
                                        <option>Casas Económicas</option>
                                        <option>Centro</option>
                                        <option>Cerritos al Mar</option>
                                        <option>Cerritos Resort</option>
                                        <option>Cerro de La Cruz</option>
                                        <option>Cerro del Vigía</option>
                                        <option>Chulavista</option>
                                        <option>Club Real</option>
                                        <option>Colinas del Real</option>
                                        <option>Constitución</option>
                                        <option>Corredor de Abasto</option>
                                        <option>Costa Brava</option>
                                        <option>Costa Brava III</option>
                                        <option>Costa Dorada</option>
                                        <option>Del Bosque</option>
                                        <option>Delfines</option>
                                        <option>Del Valle</option>
                                        <option>Diaz Ordaz</option>
                                        <option>Doña Chonita</option>
                                        <option>Dorados de Villa</option>
                                        <option>Ecológica</option>
                                        <option>Ejidal</option>
                                        <option>Ejidal Francisco Villa</option>
                                        <option>Ejido Rincón de Urías</option>
                                        <option>El Campestre</option>
                                        <option>El Castillo</option>
                                        <option>El Cid</option>
                                        <option>El Conchi</option>
                                        <option>El Conchi II</option>
                                        <option>El Conchi Infonavit</option>
                                        <option>El Dorado</option>
                                        <option>El Encanto</option>
                                        <option>El Palmar</option>
                                        <option>El Pescador</option>
                                        <option>El Secreto</option>
                                        <option>El Toreo</option>
                                        <option>El Toro</option>
                                        <option>El Venadillo</option>
                                        <option>Emiliano Zapata</option>
                                        <option>Esmeralda</option>
                                        <option>Esperanza</option>
                                        <option>Esperanza Fovissste</option>
                                        <option>Estadio</option>
                                        <option>Estero</option>
                                        <option>Ex Hacienda del Conchi</option>
                                        <option>Ex Laguna Las Gaviotas</option>
                                        <option>Federico Velarde</option>
                                        <option>Felicidad</option>
                                        <option>Felipe</option>
                                        <option>Felipe Angeles</option>
                                        <option>Ferrocarrilera</option>
                                        <option>Flamingos</option>
                                        <option>Flores Magón</option>
                                        <option>FOVISSSTE Jabalíes</option>
                                        <option>FOVISSSTE Playa Azul</option>
                                        <option>Francisco Alarcón Infonavit</option>
                                        <option>Francisco I Madero</option>
                                        <option>Francisco Labastida Ochoa</option>
                                        <option>Francisco Solís</option>
                                        <option>Francisco Villa</option>
                                        <option>Fuentes del Valle</option>
                                        <option>Gabriel Leyva</option>
                                        <option>Genaro Estrada Calderón</option>
                                        <option>Gilberto Lopez</option>
                                        <option>Girasoles</option>
                                        <option>Gral. Rafael Buelna</option>
                                        <option>Hacienda del Mar</option>
                                        <option>Hacienda del Seminario</option>
                                        <option>Hacienda del Valle</option>
                                        <option>Hacienda de Urias</option>
                                        <option>Hacienda Las Cruces</option>
                                        <option>Hacienda Los Mangos</option>
                                        <option>Hacienda Victoria</option>
                                        <option>Hogar Pescador</option>
                                        <option>Huerta Grande</option>
                                        <option>Huerta Paraíso</option>
                                        <option>Huertos Familiares</option>
                                        <option>Independencia</option>
                                        <option>INFONAVIT Playas</option>
                                        <option>Insurgentes</option>
                                        <option>Isla de La Piedra</option>
                                        <option>Isla Mazatlán</option>
                                        <option>Isla Residencial</option>
                                        <option>Issstesin</option>
                                        <option>Jabalíes</option>
                                        <option>Jabalines Infonavit</option>
                                        <option>Jacarandas</option>
                                        <option>Jardines de la Riviera</option>
                                        <option>Jardines del Bosque</option>
                                        <option>Jardines del Toreo</option>
                                        <option>Jardines del Valle</option>
                                        <option>Jardines Residencial</option>
                                        <option>Jaripillo</option>
                                        <option>Jesús Garcia</option>
                                        <option>Jesús Kumate</option>
                                        <option>Jesús Osuna</option>
                                        <option>José Gordillo Pinto</option>
                                        <option>José María Pino Suárez</option>
                                        <option>Juan Carrasco</option>
                                        <option>Klein</option>
                                        <option>La Alborada</option>
                                        <option>La Campiña</option>
                                        <option>La Cima Residencial</option>
                                        <option>Ladrillera</option>
                                        <option>La Foresta</option>
                                        <option>La Joya</option>
                                        <option>La Riviera</option>
                                        <option>Las Brisas</option>
                                        <option>Las Gaviotas</option>
                                        <option>La Sirena</option>
                                        <option>Las Malvinas</option>
                                        <option>Las Mañanitas</option>
                                        <option>Las Misiones</option>
                                        <option>Las Olas</option>
                                        <option>Las Palmas</option>
                                        <option>Las Torres</option>
                                        <option>Las Varas</option>
                                        <option>Lázaro Cárdenas</option>
                                        <option>Libertad</option>
                                        <option>Libertad de Expresión</option>
                                        <option>Loma Atravesada</option>
                                        <option>Loma Bonita</option>
                                        <option>Loma Linda</option>
                                        <option>Lomas de Cristo Rey</option>
                                        <option>Lomas de Juárez</option>
                                        <option>Lomas del Bosque</option>
                                        <option>Lomas Del Ébano</option>
                                        <option>Lomas del Mar</option>
                                        <option>Lomas Del Porvenir</option>
                                        <option>Lomas del Valle</option>
                                        <option>Lomas de Mazatlán</option>
                                        <option>Lomas de San Jorge</option>
                                        <option>López Mateos</option>
                                        <option>Los Ángeles (Santa Fe)</option>
                                        <option>Los Caracoles</option>
                                        <option>Los Conchis Sección Arrecifes</option>
                                        <option>Los Laureles</option>
                                        <option>Los Magueyes</option>
                                        <option>Los Mangos I</option>
                                        <option>Los Mangos II</option>
                                        <option>Los Olivos</option>
                                        <option>Los Pinos</option>
                                        <option>Los Portales</option>
                                        <option>Los Robles</option>
                                        <option>Los Sauces</option>
                                        <option>Los Tabachines</option>
                                        <option>Los Venados</option>
                                        <option>Lucio Valverde</option>
                                        <option>Luis Donaldo Colosio</option>
                                        <option>Luis Echeverría Alvarez</option>
                                        <option>Mar de Cortes</option>
                                        <option>María Antonieta</option>
                                        <option>María del Mar</option>
                                        <option>María Elena</option>
                                        <option>María Fernanda</option>
                                        <option>Marina El Cid</option>
                                        <option>Marina Garden</option>
                                        <option>Marina Kelly</option>
                                        <option>Marina Mazatlán</option>
                                        <option>Marina Real</option>
                                        <option>Mazatlan I</option>
                                        <option>Mazatlan II</option>
                                        <option>Mazatlán III</option>
                                        <option>Mediterráneo Club Residencial</option>
                                        <option>Melina</option>
                                        <option>Miguel Hidalgo</option>
                                        <option>Miramar</option>
                                        <option>Mirasol</option>
                                        <option>Misiones 2000</option>
                                        <option>Monte Calvario</option>
                                        <option>Monte Verde</option>
                                        <option>Montuosa</option>
                                        <option>Morelos</option>
                                        <option>Mundialista</option>
                                        <option>Niños Héroes</option>
                                        <option>Nueva Creación</option>
                                        <option>Nuevo Cajeme</option>
                                        <option>Nuevo Milenio</option>
                                        <option>Obrera</option>
                                        <option>Obrera Industrial</option>
                                        <option>Octava Zona Naval (Puerto Mazatlán)</option>
                                        <option>Olímpica</option>
                                        <option>Olimpo Infonavit</option>
                                        <option>Palmas del Sol</option>
                                        <option>Palmeiras Club Residencial</option>
                                        <option>Palos Prietos</option>
                                        <option>Paraíso</option>
                                        <option>Paseo Alameda</option>
                                        <option>Paseo Alameda Dos</option>
                                        <option>Paseo de Las Torres</option>
                                        <option>Paseo Los Olivos</option>
                                        <option>Periodista</option>
                                        <option>Petróleos</option>
                                        <option>Petrolero</option>
                                        <option>Playa Linda</option>
                                        <option>Playas del Sol</option>
                                        <option>Playas del Sur</option>
                                        <option>Plaza Reforma</option>
                                        <option>Plazas San Ignacio</option>
                                        <option>Portomolino</option>
                                        <option>Pradera Dorada I</option>
                                        <option>Pradera Dorada II</option>
                                        <option>Pradera Dorada III</option>
                                        <option>Pradera Dorada IV</option>
                                        <option>Praderas del Sol</option>
                                        <option>Prado Bonito</option>
                                        <option>Prados del Sol</option>
                                        <option>Predio Rancho Las Habas</option>
                                        <option>Primavera</option>
                                        <option>Privanza</option>
                                        <option>Pueblo Nuevo</option>
                                        <option>Puerta al Mar</option>
                                        <option>Puerta del Sol</option>
                                        <option>Puerta Dorada</option>
                                        <option>Puesta del Sol</option>
                                        <option>Punta Diamante</option>
                                        <option>Quinta Real</option>
                                        <option>Quintas del Mar</option>
                                        <option>Raíces</option>
                                        <option>Ramon F Iturbide</option>
                                        <option>Real del Mar</option>
                                        <option>Real del Valle</option>
                                        <option>Real Pacífico</option>
                                        <option>Reforma</option>
                                        <option>Renato Vega</option>
                                        <option>Residencial Flamingos</option>
                                        <option>Residencial Rinconada</option>
                                        <option>Residencial San Marcos</option>
                                        <option>Rinconada Del Valle</option>
                                        <option>Rincón Colonial</option>
                                        <option>Rincón de las Palmas</option>
                                        <option>Rincón de Las Plazas</option>
                                        <option>Rincón de Mazatlán</option>
                                        <option>Romanita de La Peña</option>
                                        <option>Royal Country</option>
                                        <option>Ruben Jaramillo</option>
                                        <option>Sábalo Country Club</option>
                                        <option>Salinas de Gortari</option>
                                        <option>Salvador Allende</option>
                                        <option>San Angel</option>
                                        <option>San Antonio</option>
                                        <option>San Carlos</option>
                                        <option>Sanchez Celis</option>
                                        <option>Sanchez Taboada</option>
                                        <option>San Fernando</option>
                                        <option>San Francisco</option>
                                        <option>San Joaquín</option>
                                        <option>San Marcos</option>
                                        <option>San Nicolás</option>
                                        <option>San Rafael</option>
                                        <option>Santa Cecilia</option>
                                        <option>Santa Elena</option>
                                        <option>Santa Laura</option>
                                        <option>Santa Rita</option>
                                        <option>Santa Rosa</option>
                                        <option>Santa Sofía</option>
                                        <option>Santa Teresa</option>
                                        <option>Santa Virginia</option>
                                        <option>Sembradores de La Amistad</option>
                                        <option>Simon Jimenez Cárdenas</option>
                                        <option>Sinaloa</option>
                                        <option>Telleria</option>
                                        <option>Terranova</option>
                                        <option>Terranova Plus</option>
                                        <option>Tierra y Libertad</option>
                                        <option>Torremolinos</option>
                                        <option>Torremolinos Costa Azul</option>
                                        <option>Tortugas I</option>
                                        <option>Tres Palmas</option>
                                        <option>Trópico de Cáncer</option>
                                        <option>Universidad 94</option>
                                        <option>Universo</option>
                                        <option>Urbivilla del Real</option>
                                        <option>Urias</option>
                                        <option>Valle Bonito</option>
                                        <option>Valle Del Ejido</option>
                                        <option>Valle de Urias</option>
                                        <option>Valle Dorado</option>
                                        <option>Valle Dorado II</option>
                                        <option>Valles del Sol</option>
                                        <option>Venustiano Carranza</option>
                                        <option>Vicente Guerrero</option>
                                        <option>Villa Bonita</option>
                                        <option>Villa Carey</option>
                                        <option>Villa de Jacaro</option>
                                        <option>Villa de las Flores</option>
                                        <option>Villa del Mar</option>
                                        <option>Villa Florida</option>
                                        <option>Villa Galaxia</option>
                                        <option>Villa Marina</option>
                                        <option>Villa Satélite</option>
                                        <option>Villas del Estero</option>
                                        <option>Villas del Rey</option>
                                        <option>Villas Del Sol</option>
                                        <option>Villas de Rueda</option>
                                        <option>Villas Playa Sur</option>
                                        <option>Villa Tranquila</option>
                                        <option>Villa Tutuli</option>
                                        <option>Villa Tutuli II</option>
                                        <option>Villa Verde</option>
                                        <option>Vista del Mar</option>
                                        <option>Viva Progreso</option>
                                        <option>Zafiro</option>
                                        <option>Zona Dorada</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="ddlCp">C.P</label>
                                    <select class="form-control selectpicker border" name="ddlCp" id="ddlCp" data-live-search="true" title="Selecciona una opción">
                                        <option>82000</option>
                                        <option>82007</option>
                                        <option>82008</option>
                                        <option>82010</option>
                                        <option>82013</option>
                                        <option>82014</option>
                                        <option>82015</option>
                                        <option>82016</option>
                                        <option>82017</option>
                                        <option>82018</option>
                                        <option>82019</option>
                                        <option>82020</option>
                                        <option>82028</option>
                                        <option>82030</option>
                                        <option>82035</option>
                                        <option>82037</option>
                                        <option>82038</option>
                                        <option>82040</option>
                                        <option>82043</option>
                                        <option>82047</option>
                                        <option>82048</option>
                                        <option>82050</option>
                                        <option>82059</option>
                                        <option>82060</option>
                                        <option>82070</option>
                                        <option>82080</option>
                                        <option>82089</option>
                                        <option>82090</option>
                                        <option>82099</option>
                                        <option>82100</option>
                                        <option>82102</option>
                                        <option>82103</option>
                                        <option>82110</option>
                                        <option>82112</option>
                                        <option>82113</option>
                                        <option>82118</option>
                                        <option>82120</option>
                                        <option>82123</option>
                                        <option>82124</option>
                                        <option>82125</option>
                                        <option>82126</option>
                                        <option>82127</option>
                                        <option>82128</option>
                                        <option>82129</option>
                                        <option>82130</option>
                                        <option>82132</option>
                                        <option>82133</option>
                                        <option>82134</option>
                                        <option>82136</option>
                                        <option>82137</option>
                                        <option>82138</option>
                                        <option>82139</option>
                                        <option>82140</option>
                                        <option>82143</option>
                                        <option>82144</option>
                                        <option>82146</option>
                                        <option>82147</option>
                                        <option>82148</option>
                                        <option>82149</option>
                                        <option>82150</option>
                                        <option>82153</option>
                                        <option>82154</option>
                                        <option>82155</option>
                                        <option>82156</option>
                                        <option>82157</option>
                                        <option>82158</option>
                                        <option>82159</option>
                                        <option>82160</option>
                                        <option>82163</option>
                                        <option>82164</option>
                                        <option>82165</option>
                                        <option>82170</option>
                                        <option>82180</option>
                                        <option>82183</option>
                                        <option>82185</option>
                                        <option>82186</option>
                                        <option>82187</option>
                                        <option>82188</option>
                                        <option>82190</option>
                                        <option>82195</option>
                                        <option>82196</option>
                                        <option>82197</option>
                                        <option>82198</option>
                                        <option>82199</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="form-group">

                        <div class="form-row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="txtTelefono">Tel&eacute;fono</label>
                                    <input type="text" class="form-control numeric" name="txtTelefono" placeholder="Telefono" id="txtTelefono" maxlength="10">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="ddlEscolaridad">Escolaridad</label>
                                    <select class="form-control selectpicker border" id="ddlEscolaridad" name="ddlEscolaridad" data-live-search="true" title="Selecciona una opción">
                                        <option>Primaria</option>
                                        <option>Secundaria</option>
                                        <option>Preparatoria</option>
                                        <option>Carrera Tecnica</option>
                                        <option>Licenciatura</option>
                                        <option>Maestria</option>
                                        <option>Doctorado</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="form-group">

                        <div class="form-row">

                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="txtCorreo">Correo</label>
                                    <input type="text" class="form-control" name="txtCorreo" placeholder="Correo" id="txtCorreo">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="ddlTipoSangre">Tipo de Sangre</label>
                                    <select class="form-control selectpicker border" name="ddlTipoSangre" id="ddlTipoSangre" data-live-search="true" title="Selecciona una opción">
                                        <option>A+</option>
                                        <option>A-</option>
                                        <option>B+</option>
                                        <option>B-</option>
                                        <option>O+</option>
                                        <option>O-</option>
                                        <option>AB+</option>
                                        <option>AB-</option>
                                    </select>
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="text-right mb-4" id="btnDatosPersonales">
                        <button type="button" id="btnSiguienteDP" class="btn btn-primary">Siguiente</button>
                    </div>

                </div>

                <div id="divDatosFamiliares">

                    <h3 class="font-weight-normal">Datos Familiares</h3>

                    <div class="form-group">

                        <div class="form-row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="txtNombrePadre">Padre</label>
                                    <input type="text" class="form-control" id="txtNombrePadre" name="txtNombrePadre" placeholder="Nombre del Padre" autofocus="autofocus">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="txtTelefonoPadre">Tel&eacute;fono</label>
                                    <input type="text" class="form-control numeric" id="txtTelefonoPadre" name="txtTelefonoPadre" placeholder="Tel&eacute;fono del Padre" maxlength="10">
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="txtNombreMadre">Madre</label>
                                    <input type="text" class="form-control" id="txtNombreMadre" name="txtNombreMadre" placeholder="Nombre de la Madre">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="txtTelefonoMadre">Tel&eacute;fono</label>
                                    <input type="text" class="form-control numeric" id="txtTelefonoMadre" name="txtTelefonoMadre" placeholder="Tel&eacute;fono de la Madre" maxlength="10">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="txtNombreEsposa">Esposo(a)</label>
                                    <input type="text" class="form-control" id="txtNombreEsposa" name="txtNombreEsposa" placeholder="Nombre de la Esposo(a)">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="txtTelefonoEsposa">Tel&eacute;fono</label>
                                    <input type="text" class="form-control numeric" id="txtTelefonoEsposa" name="txtTelefonoEsposa" placeholder="Tel&eacute;fono de la Esposo(a)" maxlength="10">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="txtNombreHijos">Hijos</label>
                                    <textarea class="form-control" id="txtNombreHijos" name="txtNombreHijos" rows="4" placeholder="Nombre de los hijos"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="text-right mb-4" id="btnDatosFamiliares">
                        <button type="button" id="btnRegresarDF" class="btn btn-danger">Regresar</button>
                        <button type="button" id="btnSiguienteDF" class="btn btn-primary">Siguiente</button>
                    </div>

                </div>

                <div id="divInformacionAdicional">

                    <h3 class="font-weight-normal">Información Adicional</h3>

                    <div class="form-group">

                        <div class="form-row">

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="txtTelefonoEmergencias">Tel&eacute;fono de Emergencias</label>
                                    <input type="text" class="form-control numeric" name="txtTelefonoEmergencias" placeholder="Tel&eacute;fono de Emergencias" id="txtTelefonoEmergencias" maxlength="10">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="txtCurp">CURP</label>
                                    <input type="text" class="form-control text-uppercase" name="txtCurp" placeholder="CURP" id="txtCurp">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="txtRfc">RFC</label>
                                    <input type="text" class="form-control text-uppercase" name="txtRfc" placeholder="RFC" id="txtRfc">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="txtImss">IMSS</label>
                                    <input type="text" class="form-control numeric text-uppercase" name="txtImss" placeholder="IMSS" id="txtImss">
                                </div>
                            </div>

                        </div>

                    </div>

                    <h3 class="font-weight-normal">Imagenes</h3>

                    <form method="POST" id="imagenes" enctype="multipart/form-data">

                        <div class="form-group">

                            <div class="form-row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="imgPersonal">Personal</label>
                                        <div class="card">
                                            <input type="file" class="form-control-file" id="imgPersonal" name="imgPersonal" accept="image/jpg, image/jpeg, image/png">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="imgINE">Credencial de Elector</label>
                                        <div class="card">
                                            <input type="file" class="form-control-file" id="imgINE" name="imgINE" accept="image/jpg, image/jpeg, image/png">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="imgDomicilio">Comprobante de Domicilio</label>
                                        <div class="card">
                                            <input type="file" class="form-control-file" id="imgDomicilio" name="imgDomicilio" accept="image/jpg, image/jpeg, image/png">
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="form-group">

                            <div class="form-row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="imgCarta1">Carta de Recomendaci&oacute;n 1</label>
                                        <div class="card">
                                            <input type="file" class="form-control-file" id="imgCarta1" name="imgCarta1" accept="image/jpg, image/jpeg, image/png">
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="imgCarta2">Carta de Recomendaci&oacute;n 2</label>
                                        <div class="card">
                                            <input type="file" class="form-control-file" id="imgCarta2" name="imgCarta2" accept="image/jpg, image/jpeg, image/png">
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                    </form>

                    <h3 class="font-weight-normal">Datos para iniciar sesión</h3>

                    <div class="form-group">

                        <div class="form-row">

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="txtUsuario">Usuario</label>
                                    <input type="text" class="form-control" name="txtUsuario" placeholder="Usuario" id="txtUsuario">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="txtContrasena">Contraseña</label>
                                    <input type="password" class="form-control" name="txtContrasena" placeholder="Contraseña" id="txtContrasena">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="txtConfirmarContrasena">Confirmar Contraseña</label>
                                    <input type="password" class="form-control" name="txtConfirmarContrasena" id="txtConfirmarContrasena" placeholder="Contraseña">
                                </div>
                            </div>

                        </div>

                    </div>

                    <div class="text-right mb-4" id="btnInformacionAdicional">
                        <button type="button" id="btnRegresarIA" class="btn btn-danger">Regresar</button>
                        <button type="submit" id="btnGuardarIA" class="btn btn-success">Guardar</button>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <script src="http://localhost/sistema/SB-Admin/dist/js/librerias/jquery-3.5.1.min.js"></script>
    <script src="http://localhost/sistema/SB-Admin/dist/js/librerias/bootstrap.bundle.min.js"></script>
    <script src="http://localhost/sistema/SB-Admin/dist/js/librerias/scripts.js"></script>
    <script src="http://localhost/sistema/SB-Admin/dist/js/librerias/bootstrap-select.min.js"></script>
    <script src="http://localhost/sistema/SB-Admin/dist/js/librerias/jquery.numeric.min.js"></script>
    <script src="http://localhost/sistema/SB-Admin/dist/js/librerias/sweetalert2.js"></script>
    <script src="http://localhost/sistema/SB-Admin/dist/js/agregarEmpleado.js"></script>
    <script src="http://localhost/sistema/SB-Admin/dist/js/cerrarSesion.js"></script>

</body>

</html>