-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3360
-- Tiempo de generación: 31-07-2023 a las 19:06:03
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `comunidad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acta`
--

CREATE TABLE `acta` (
  `numero_acta` int(11) NOT NULL,
  `asunto_acta` varchar(200) NOT NULL,
  `acuerdo_acta` text DEFAULT NULL,
  `tipo` tinyint(1) DEFAULT NULL,
  `archivo` mediumblob NOT NULL,
  `fecha` datetime DEFAULT NULL,
  `lugar` varchar(200) NOT NULL,
  `dni_usuario` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `acta`
--

INSERT INTO `acta` (`numero_acta`, `asunto_acta`, `acuerdo_acta`, `tipo`, `archivo`, `fecha`, `lugar`, `dni_usuario`) VALUES
(2, 'Contrucción de Iglesia', 'No se pudo', 1, 0x4172636869766f2e706466, '0000-00-00 00:00:00', 'casa comunal pallaccocha', '71609287');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `id_asistencia` int(11) NOT NULL,
  `numero_acta` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `dni` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`id_asistencia`, `numero_acta`, `estado`, `dni`) VALUES
(7, 2, 1, '45677089'),
(8, 2, 1, '70107013'),
(9, 2, 1, '70107014'),
(10, 2, 1, '70145023');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuotas`
--

CREATE TABLE `cuotas` (
  `id_cuota` int(11) NOT NULL,
  `dni` varchar(8) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `monto` float(20,6) NOT NULL,
  `fecha_pago` datetime DEFAULT NULL,
  `descripcion` text NOT NULL,
  `numero_acta` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cuotas`
--

INSERT INTO `cuotas` (`id_cuota`, `dni`, `estado`, `monto`, `fecha_pago`, `descripcion`, `numero_acta`) VALUES
(105, '45677089', 0, 10.000000, '2023-07-30 17:59:00', '10', 2),
(106, '70107013', 0, 10.000000, '2023-07-30 17:59:00', '10', 2),
(107, '70107014', 0, 10.000000, '2023-07-30 17:59:00', '10', 2),
(108, '70145023', 0, 10.000000, '2023-07-30 17:59:00', '10', 2),
(109, '45677089', 1, 10.000000, '2023-07-31 17:59:00', '10', 2),
(110, '70107013', 1, 10.000000, '2023-07-31 17:59:00', '10', 2),
(111, '70107014', 1, 10.000000, '2023-07-31 17:59:00', '10', 2),
(112, '70145023', 1, 10.000000, '2023-07-31 17:59:00', '10', 2),
(113, '45677089', 1, 10.000000, '2023-07-31 13:23:00', '10', 2),
(122, '45677089', 1, 10.000000, '2023-07-31 14:30:00', '10', NULL),
(123, '45677089', 0, 10.000000, '2023-07-31 10:30:00', '10', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `poblador`
--

CREATE TABLE `poblador` (
  `dni` varchar(8) NOT NULL,
  `nombres` varchar(30) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `celular` varchar(9) NOT NULL,
  `estado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `poblador`
--

INSERT INTO `poblador` (`dni`, `nombres`, `apellidos`, `celular`, `estado`) VALUES
('45677089', 'Luis Fernando', 'Caceres Quispe', '934569927', 1),
('70107013', 'Diego', ' Merino Rojas', '934567122', 1),
('70107014', 'Teresa', 'Taype Altamirano', '', 1),
('70145023', 'Samuel', 'Barrios Pariona', '', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `dni` varchar(8) NOT NULL,
  `contrasenia` varchar(256) NOT NULL,
  `rol` varchar(20) NOT NULL,
  `estado` tinyint(1) DEFAULT NULL,
  `nombres` varchar(30) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `celular` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`dni`, `contrasenia`, `rol`, `estado`, `nombres`, `apellidos`, `celular`) VALUES
('71609235', '$2y$10$LnnA/pnNlthvhuGhFLlzfelo9Vwnnj1T6Nu6nWydvUHKxyk18rfnK', 'Sin rol', 1, 'hola1', 'Mendez', '934512366'),
('71609287', '$2y$10$LnnA/pnNlthvhuGhFLlzfelo9Vwnnj1T6Nu6nWydvUHKxyk18rfnK', 'Secretario', 1, 'pepe', '456', '934512111'),
('71609806', '$2y$10$LnnA/pnNlthvhuGhFLlzfelo9Vwnnj1T6Nu6nWydvUHKxyk18rfnK', 'Tesorero', 1, 'andre', 'perez', '934512341');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acta`
--
ALTER TABLE `acta`
  ADD PRIMARY KEY (`numero_acta`),
  ADD KEY `fk_acta` (`dni_usuario`);

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`id_asistencia`),
  ADD KEY `dni` (`dni`),
  ADD KEY `FK_asistencia` (`numero_acta`);

--
-- Indices de la tabla `cuotas`
--
ALTER TABLE `cuotas`
  ADD PRIMARY KEY (`id_cuota`),
  ADD KEY `dni` (`dni`);

--
-- Indices de la tabla `poblador`
--
ALTER TABLE `poblador`
  ADD PRIMARY KEY (`dni`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`dni`),
  ADD UNIQUE KEY `celular` (`celular`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acta`
--
ALTER TABLE `acta`
  MODIFY `numero_acta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `id_asistencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `cuotas`
--
ALTER TABLE `cuotas`
  MODIFY `id_cuota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `acta`
--
ALTER TABLE `acta`
  ADD CONSTRAINT `fk_acta` FOREIGN KEY (`dni_usuario`) REFERENCES `usuario` (`dni`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `FK_asistencia` FOREIGN KEY (`numero_acta`) REFERENCES `acta` (`numero_acta`),
  ADD CONSTRAINT `asistencia_ibfk_1` FOREIGN KEY (`numero_acta`) REFERENCES `acta` (`numero_acta`),
  ADD CONSTRAINT `asistencia_ibfk_2` FOREIGN KEY (`dni`) REFERENCES `poblador` (`dni`);

--
-- Filtros para la tabla `cuotas`
--
ALTER TABLE `cuotas`
  ADD CONSTRAINT `cuotas_ibfk_1` FOREIGN KEY (`dni`) REFERENCES `poblador` (`dni`),
  ADD CONSTRAINT `cuotas_ibfk_2` FOREIGN KEY (`numero_acta`) REFERENCES `acta` (`numero_acta`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
