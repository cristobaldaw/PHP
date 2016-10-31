-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-10-2016 a las 17:17:38
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `jobyesterdaydb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_ofertas`
--

CREATE TABLE `tbl_ofertas` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(150) COLLATE utf8_spanish_ci NOT NULL,
  `persona_contacto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefono_contacto` varchar(13) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `poblacion` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codigo_postal` varchar(5) COLLATE utf8_spanish_ci DEFAULT NULL,
  `provincia` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` char(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_creacion` date DEFAULT NULL,
  `fecha_comunicacion` date DEFAULT NULL,
  `psicologo_encargado` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `candidato_seleccionado` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `otros_datos_candidato` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_ofertas`
--

INSERT INTO `tbl_ofertas` (`id`, `descripcion`, `persona_contacto`, `telefono_contacto`, `email`, `direccion`, `poblacion`, `codigo_postal`, `provincia`, `estado`, `fecha_creacion`, `fecha_comunicacion`, `psicologo_encargado`, `candidato_seleccionado`, `otros_datos_candidato`) VALUES
(417, 'Descripcion 1', 'Persona de contacto 1', 'Teléfono 1', 'Correo 1', NULL, NULL, NULL, 'Provincia 1', NULL, '2016-10-30', NULL, NULL, NULL, NULL),
(420, 'Descripcion 4', 'Persona de contacto 4', 'Teléfono 4', 'Correo 4', NULL, NULL, NULL, 'Provincia 4', NULL, '2016-10-30', NULL, NULL, NULL, NULL),
(422, 'Descripcion 6', 'Persona de contacto 6', 'Teléfono 6', 'Correo 6', NULL, NULL, NULL, 'Provincia 6', NULL, '2016-10-30', NULL, NULL, NULL, NULL),
(424, 'Descripcion 8', 'Persona de contacto 8', 'Teléfono 8', 'Correo 8', NULL, NULL, NULL, 'Provincia 8', NULL, '2016-10-30', NULL, NULL, NULL, NULL),
(425, 'Descripcion 9', 'Persona de contacto 9', 'Teléfono 9', 'Correo 9', NULL, NULL, NULL, 'Provincia 9', NULL, '2016-10-30', NULL, NULL, NULL, NULL),
(426, 'Descripcion 10', 'Persona de contacto 10', 'Teléfono 10', 'Correo 10', NULL, NULL, NULL, 'Provincia 10', NULL, '2016-10-30', NULL, NULL, NULL, NULL),
(427, 'Descripcion 11', 'Persona de contacto 11', 'Teléfono 11', 'Correo 11', NULL, NULL, NULL, 'Provincia 11', NULL, '2016-10-30', NULL, NULL, NULL, NULL),
(428, 'Descripcion 12', 'Persona de contacto 12', 'Teléfono 12', 'Correo 12', NULL, NULL, NULL, 'Provincia 12', NULL, '2016-10-30', NULL, NULL, NULL, NULL),
(430, 'Descripcion 14', 'Persona de contacto 14', 'Teléfono 14', 'Correo 14', NULL, NULL, NULL, 'Provincia 14', NULL, '2016-10-30', NULL, NULL, NULL, NULL),
(431, 'Descripcion 15', 'Persona de contacto 15', 'Teléfono 15', 'Correo 15', NULL, NULL, NULL, 'Provincia 15', NULL, '2016-10-30', NULL, NULL, NULL, NULL),
(432, 'Descripcion 16', 'Persona de contacto 16', 'Teléfono 16', 'Correo 16', NULL, NULL, NULL, 'Provincia 16', NULL, '2016-10-30', NULL, NULL, NULL, NULL),
(433, 'Descripcion 17', 'Persona de contacto 17', 'Teléfono 17', 'Correo 17', NULL, NULL, NULL, 'Provincia 17', NULL, '2016-10-30', NULL, NULL, NULL, NULL),
(434, 'Descripcion 18', 'Persona de contacto 18', 'Teléfono 18', 'Correo 18', NULL, NULL, NULL, 'Provincia 18', NULL, '2016-10-30', NULL, NULL, NULL, NULL),
(435, 'Descripcion 19', 'Persona de contacto 19', 'Teléfono 19', 'Correo 19', NULL, NULL, NULL, 'Provincia 19', NULL, '2016-10-30', NULL, NULL, NULL, NULL),
(436, 'Descripcion 20', 'Persona de contacto 20', 'Teléfono 20', 'Correo 20', NULL, NULL, NULL, 'Provincia 20', NULL, '2016-10-30', NULL, NULL, NULL, NULL),
(437, 'Descripcion 21', 'Persona de contacto 21', 'Teléfono 21', 'Correo 21', NULL, NULL, NULL, 'Provincia 21', NULL, '2016-10-30', NULL, NULL, NULL, NULL),
(438, 'Descripcion 22', 'Persona de contacto 22', 'Teléfono 22', 'Correo 22', NULL, NULL, NULL, 'Provincia 22', NULL, '2016-10-30', NULL, NULL, NULL, NULL),
(439, 'Descripcion 23', 'Persona de contacto 23', 'Teléfono 23', 'Correo 23', NULL, NULL, NULL, 'Provincia 23', NULL, '2016-10-30', NULL, NULL, NULL, NULL),
(440, 'Descripcion 24', 'Persona de contacto 24', 'Teléfono 24', 'Correo 24', NULL, NULL, NULL, 'Provincia 24', NULL, '2016-10-30', NULL, NULL, NULL, NULL),
(441, 'Descripcion 25', 'Persona de contacto 25', 'Teléfono 25', 'Correo 25', NULL, NULL, NULL, 'Provincia 25', NULL, '2016-10-30', NULL, NULL, NULL, NULL),
(442, 'Descripcion 26', 'Persona de contacto 26', 'Teléfono 26', 'Correo 26', NULL, NULL, NULL, 'Provincia 26', NULL, '2016-10-30', NULL, NULL, NULL, NULL),
(443, 'Descripcion 27', 'Persona de contacto 27', 'Teléfono 27', 'Correo 27', NULL, NULL, NULL, 'Provincia 27', NULL, '2016-10-30', NULL, NULL, NULL, NULL),
(444, 'Descripcion 28', 'Persona de contacto 28', 'Teléfono 28', 'Correo 28', NULL, NULL, NULL, 'Provincia 28', NULL, '2016-10-30', NULL, NULL, NULL, NULL),
(445, 'Descripcion 29', 'Persona de contacto 29', 'Teléfono 29', 'Correo 29', NULL, NULL, NULL, 'Provincia 29', NULL, '2016-10-30', NULL, NULL, NULL, NULL),
(446, 'Descripcion 30', 'Persona de contacto 30', 'Teléfono 30', 'Correo 30', NULL, NULL, NULL, 'Provincia 30', NULL, '2016-10-30', NULL, NULL, NULL, NULL),
(447, 'Descripcion 31', 'Persona de contacto 31', 'Teléfono 31', 'Correo 31', NULL, NULL, NULL, 'Provincia 31', NULL, '2016-10-30', NULL, NULL, NULL, NULL),
(448, 'Descripcion 32', 'Persona de contacto 32', 'Teléfono 32', 'Correo 32', NULL, NULL, NULL, 'Provincia 32', NULL, '2016-10-30', NULL, NULL, NULL, NULL),
(449, 'Descripcion 33', 'Persona de contacto 33', 'Teléfono 33', 'Correo 33', NULL, NULL, NULL, 'Provincia 33', NULL, '2016-10-30', NULL, NULL, NULL, NULL),
(450, 'Descripcion 34', 'Persona de contacto 34', 'Teléfono 34', 'Correo 34', NULL, NULL, NULL, 'Provincia 34', NULL, '2016-10-30', NULL, NULL, NULL, NULL),
(451, 'Descripcion 35', 'Persona de contacto 35', 'Teléfono 35', 'Correo 35', NULL, NULL, NULL, 'Provincia 35', NULL, '2016-10-30', NULL, NULL, NULL, NULL),
(452, 'Descripcion 36', 'Persona de contacto 36', 'Teléfono 36', 'Correo 36', NULL, NULL, NULL, 'Provincia 36', NULL, '2016-10-30', NULL, NULL, NULL, NULL),
(453, 'Descripcion 37', 'Persona de contacto 37', 'Teléfono 37', 'Correo 37', NULL, NULL, NULL, 'Provincia 37', NULL, '2016-10-30', NULL, NULL, NULL, NULL),
(454, 'Descripcion 38', 'Persona de contacto 38', 'Teléfono 38', 'Correo 38', NULL, NULL, NULL, 'Provincia 38', NULL, '2016-10-30', NULL, NULL, NULL, NULL),
(455, 'Descripcion 39', 'Persona de contacto 39', 'Teléfono 39', 'Correo 39', NULL, NULL, NULL, 'Provincia 39', NULL, '2016-10-30', NULL, NULL, NULL, NULL),
(456, 'Descripcion 40', 'Persona de contacto 40', 'Teléfono 40', 'Correo 40', NULL, NULL, NULL, 'Provincia 40', NULL, '2016-10-30', NULL, NULL, NULL, NULL),
(457, 'Descripcion 41', 'Persona de contacto 41', 'Teléfono 41', 'Correo 41', NULL, NULL, NULL, 'Provincia 41', NULL, '2016-10-30', NULL, NULL, NULL, NULL),
(458, 'Descripcion 42', 'Persona de contacto 42', 'Teléfono 42', 'Correo 42', NULL, NULL, NULL, 'Provincia 42', NULL, '2016-10-30', NULL, NULL, NULL, NULL),
(459, 'Descripcion 43', 'Persona de contacto 43', 'Teléfono 43', 'Correo 43', NULL, NULL, NULL, 'Provincia 43', NULL, '2016-10-30', NULL, NULL, NULL, NULL),
(460, 'Descripcion 44', 'Persona de contacto 44', 'Teléfono 44', 'Correo 44', NULL, NULL, NULL, 'Provincia 44', NULL, '2016-10-30', NULL, NULL, NULL, NULL),
(461, 'Descripcion 45', 'Persona de contacto 45', 'Teléfono 45', 'Correo 45', NULL, NULL, NULL, 'Provincia 45', NULL, '2016-10-30', NULL, NULL, NULL, NULL),
(462, 'Descripcion 46', 'Persona de contacto 46', 'Teléfono 46', 'Correo 46', NULL, NULL, NULL, 'Provincia 46', NULL, '2016-10-30', NULL, NULL, NULL, NULL),
(463, 'Descripcion 47', 'Persona de contacto 47', 'Teléfono 47', 'Correo 47', NULL, NULL, NULL, 'Provincia 47', NULL, '2016-10-30', NULL, NULL, NULL, NULL),
(464, 'Descripcion 48', 'Persona de contacto 48', 'Teléfono 48', 'Correo 48', NULL, NULL, NULL, 'Provincia 48', NULL, '2016-10-30', NULL, NULL, NULL, NULL),
(465, 'Descripcion 49', 'Persona de contacto 49', 'Teléfono 49', 'Correo 49', NULL, NULL, NULL, 'Provincia 49', NULL, '2016-10-30', NULL, NULL, NULL, NULL),
(466, 'Descripcion 50', 'Persona de contacto 50', 'Teléfono 50', 'Correo 50', NULL, NULL, NULL, 'Provincia 50', NULL, '2016-10-30', NULL, NULL, NULL, NULL),
(467, 'aa', 'aa', '1111', 'aaa@hotmail.com', 'aa', 'aa', '11115', '18', 'R', '2016-10-31', '2016-11-01', '', '', '');

--
-- Disparadores `tbl_ofertas`
--
DELIMITER $$
CREATE TRIGGER `TriggerFechaCreacion` BEFORE INSERT ON `tbl_ofertas` FOR EACH ROW set new.fecha_creacion = curdate()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_provincias`
--

CREATE TABLE `tbl_provincias` (
  `cod` char(2) NOT NULL DEFAULT '00' COMMENT 'Código de la provincia de dos digitos',
  `nombre` varchar(50) NOT NULL DEFAULT '' COMMENT 'Nombre de la provincia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Provincias de españa; 99 para seleccionar a Nacional';

--
-- Volcado de datos para la tabla `tbl_provincias`
--

INSERT INTO `tbl_provincias` (`cod`, `nombre`) VALUES
('15', 'A Coruña'),
('01', 'Alava'),
('02', 'Albacete'),
('03', 'Alicante'),
('04', 'Almería'),
('33', 'Asturias'),
('05', 'Ávila'),
('06', 'Badajoz'),
('08', 'Barcelona'),
('09', 'Burgos'),
('10', 'Cáceres'),
('11', 'Cádiz'),
('39', 'Cantabria'),
('12', 'Castellón'),
('51', 'Ceuta'),
('13', 'Ciudad Real'),
('14', 'Córdoba'),
('16', 'Cuenca'),
('17', 'Girona'),
('18', 'Granada'),
('19', 'Guadalajara'),
('20', 'Guipzcoa'),
('21', 'Huelva'),
('22', 'Huesca'),
('07', 'Islas Baleares'),
('23', 'Jaén'),
('26', 'La Rioja'),
('35', 'Las Palmas'),
('24', 'León'),
('25', 'Lleida'),
('27', 'Lugo'),
('28', 'Madrid'),
('29', 'Málaga'),
('52', 'Melilla'),
('30', 'Murcia'),
('31', 'Navarra'),
('32', 'Ourense'),
('34', 'Palencia'),
('36', 'Pontevedra'),
('38', 'S. Cruz de Tenerife'),
('37', 'Salamanca'),
('40', 'Segovia'),
('41', 'Sevilla'),
('42', 'Soria'),
('43', 'Tarragona'),
('44', 'Teruel'),
('45', 'Toledo'),
('46', 'Valencia'),
('47', 'Valladolid'),
('48', 'Vizcaya'),
('49', 'Zamora'),
('50', 'Zaragoza');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_ofertas`
--
ALTER TABLE `tbl_ofertas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_provincias`
--
ALTER TABLE `tbl_provincias`
  ADD PRIMARY KEY (`cod`),
  ADD KEY `nombre` (`nombre`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_ofertas`
--
ALTER TABLE `tbl_ofertas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=468;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
