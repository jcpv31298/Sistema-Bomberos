-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-03-2021 a las 01:44:44
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bomberos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` int(11) NOT NULL,
  `nombre_empleado` varchar(255) NOT NULL,
  `apellido_empleado` varchar(255) NOT NULL,
  `calle_numero` varchar(255) NOT NULL,
  `colonia` varchar(255) NOT NULL,
  `codigo_postal` varchar(255) NOT NULL,
  `telefono` varchar(255) NOT NULL,
  `escolaridad` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `tipo_sangre` varchar(255) NOT NULL,
  `nombre_padre` varchar(255) DEFAULT NULL,
  `telefono_padre` varchar(255) DEFAULT NULL,
  `nombre_madre` varchar(255) DEFAULT NULL,
  `telefono_madre` varchar(255) DEFAULT NULL,
  `nombre_esposa` varchar(255) DEFAULT NULL,
  `telefono_esposa` varchar(255) DEFAULT NULL,
  `nombre_hijos` varchar(255) DEFAULT NULL,
  `telefono_emergencia` varchar(255) NOT NULL,
  `curp` varchar(255) NOT NULL,
  `rfc` varchar(255) NOT NULL,
  `imss` varchar(255) NOT NULL,
  `img_personal` varchar(255) DEFAULT NULL,
  `img_ine` varchar(255) DEFAULT NULL,
  `img_domicilio` varchar(255) DEFAULT NULL,
  `img_carta1` varchar(255) DEFAULT NULL,
  `img_carta2` varchar(255) DEFAULT NULL,
  `usuario` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `estatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
