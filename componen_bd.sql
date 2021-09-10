-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 09-09-2021 a las 22:19:53
-- Versión del servidor: 10.2.38-MariaDB-cll-lve
-- Versión de PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `componen_bd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `complejidad`
--

CREATE TABLE `complejidad` (
  `id_complegidad` int(11) NOT NULL,
  `complejo` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `complejidad`
--

INSERT INTO `complejidad` (`id_complegidad`, `complejo`) VALUES
(1, 'cardiorrespiratorio'),
(2, 'andrea');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historico`
--

CREATE TABLE `historico` (
  `id_historico` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(20) NOT NULL,
  `revisado` varchar(50) NOT NULL,
  `RandomCode` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelos`
--

CREATE TABLE `modelos` (
  `id_modelo` int(11) NOT NULL,
  `modelo` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `modelos`
--

INSERT INTO `modelos` (`id_modelo`, `modelo`) VALUES
(1, 'a55x'),
(3, 'modelo x86');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

CREATE TABLE `pacientes` (
  `id_paciente` int(11) NOT NULL,
  `documento` int(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id_paciente`, `documento`, `nombre`, `apellido`) VALUES
(1, 1096241229, 'Martin Danilo', 'Almeida Cavanzo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `id` int(11) NOT NULL,
  `patrimonio` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `RandomCode` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Nombre` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NIP` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `CodigoQR` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `FechaRegistro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `revisado` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `complejo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `modelo` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sector` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `tamaño` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `doc_paciente` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`id`, `patrimonio`, `RandomCode`, `Nombre`, `NIP`, `CodigoQR`, `status`, `FechaRegistro`, `revisado`, `complejo`, `modelo`, `sector`, `tamaño`, `doc_paciente`) VALUES
(2, '123124', 'ewC26SRvcNX6YqerzhmwZE6PuHgTAMLfWYpMukYFAoLAR1mIer', 'sadawe21', '232657', 'ewC26SRvcNX6YqerzhmwZE6PuHgTAMLfWYpMukYFAoLAR1mIer', 'Ocupada', '2021-08-14 03:58:07', 'noRevisada', 'cardiorrespiratorio', 'a55x', 'urgencias', '1 persona', 1096241229),
(3, 'sfsdfsfewqr23', '385se8VeVUR8oD2ESspozEh0fkOT8VptmyWjHnOk1b9yOulykX', 'wachu', '4455', '385se8VeVUR8oD2ESspozEh0fkOT8VptmyWjHnOk1b9yOulykX', 'Ocupada', '2021-08-14 04:01:57', 'noRevisada', 'cardiorrespiratorio', 'a55x', 'urgencias', '1 persona', 1096241229);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sectores`
--

CREATE TABLE `sectores` (
  `id_sector` int(11) NOT NULL,
  `sector` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `sectores`
--

INSERT INTO `sectores` (`id_sector`, `sector`) VALUES
(1, 'urgencias'),
(2, 'area 51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tamaño`
--

CREATE TABLE `tamaño` (
  `id_tamaño` int(11) NOT NULL,
  `tamaño` varchar(20) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tamaño`
--

INSERT INTO `tamaño` (`id_tamaño`, `tamaño`) VALUES
(1, '1 persona'),
(2, 'nose');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `clave` varchar(200) CHARACTER SET utf8mb4 NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `usuario`, `clave`, `rol`) VALUES
(22, 'supervisor', '0a113ef6b61820daa5611c870ed8d5ee', 2),
(32, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
(34, 'angie', '202cb962ac59075b964b07152d234b70', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `complejidad`
--
ALTER TABLE `complejidad`
  ADD PRIMARY KEY (`id_complegidad`);

--
-- Indices de la tabla `historico`
--
ALTER TABLE `historico`
  ADD PRIMARY KEY (`id_historico`);

--
-- Indices de la tabla `modelos`
--
ALTER TABLE `modelos`
  ADD PRIMARY KEY (`id_modelo`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id_paciente`);

--
-- Indices de la tabla `registros`
--
ALTER TABLE `registros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sectores`
--
ALTER TABLE `sectores`
  ADD PRIMARY KEY (`id_sector`);

--
-- Indices de la tabla `tamaño`
--
ALTER TABLE `tamaño`
  ADD PRIMARY KEY (`id_tamaño`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `complejidad`
--
ALTER TABLE `complejidad`
  MODIFY `id_complegidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `historico`
--
ALTER TABLE `historico`
  MODIFY `id_historico` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `modelos`
--
ALTER TABLE `modelos`
  MODIFY `id_modelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id_paciente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `registros`
--
ALTER TABLE `registros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sectores`
--
ALTER TABLE `sectores`
  MODIFY `id_sector` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tamaño`
--
ALTER TABLE `tamaño`
  MODIFY `id_tamaño` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
