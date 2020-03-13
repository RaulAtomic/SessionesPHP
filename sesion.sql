-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-03-2020 a las 11:26:06
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sesion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `ID_ALUMNO` int(11) NOT NULL,
  `MATRICULA` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `NOMBRE` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `APELLIDO` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `ESPECIALIDAD` int(11) NOT NULL,
  `GRADO` int(11) NOT NULL,
  `FECHA_ADD` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `ID_AREA` int(11) NOT NULL,
  `AREA` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `ID_ESPECIALIDAD` int(11) NOT NULL,
  `ESPECIALIDAD` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE `grado` (
  `ID_GRADO` int(11) NOT NULL,
  `GRADO` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status_ticket`
--

CREATE TABLE `status_ticket` (
  `ID_STATUS` int(11) NOT NULL,
  `STATUS` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket_alumnos`
--

CREATE TABLE `ticket_alumnos` (
  `ID_TICKET` int(11) NOT NULL,
  `ID_ALUMNO` int(11) NOT NULL,
  `MAQUINA_IP` int(11) NOT NULL,
  `DESCRIPCION` varchar(100) NOT NULL,
  `COMPONENTE` varchar(100) NOT NULL,
  `ID_STATUS` int(11) NOT NULL,
  `FECHA` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket_genericos`
--

CREATE TABLE `ticket_genericos` (
  `ID_TICKET` int(11) NOT NULL,
  `ID_AREA` int(11) NOT NULL,
  `ASUNTO` varchar(100) NOT NULL,
  `DESCRIPCION` varchar(100) NOT NULL,
  `ID_STATUS` int(11) DEFAULT NULL,
  `FECHA` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuarios` int(11) NOT NULL,
  `nombre` varchar(20) DEFAULT NULL,
  `apellido` varchar(20) DEFAULT NULL,
  `usuario` varchar(20) DEFAULT NULL,
  `passwd` varchar(20) DEFAULT NULL,
  `rol` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `nombre`, `apellido`, `usuario`, `passwd`, `rol`) VALUES
(1, 'Gustavo', 'Hernandez', 'gustavo', '12345', 'administrador'),
(2, 'Manuel', 'Aguilar', 'manuel', '12345', 'gerente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`ID_ALUMNO`),
  ADD KEY `ESPECIALIDAD` (`ESPECIALIDAD`),
  ADD KEY `GRADO` (`GRADO`);

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`ID_AREA`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`ID_ESPECIALIDAD`);

--
-- Indices de la tabla `grado`
--
ALTER TABLE `grado`
  ADD PRIMARY KEY (`ID_GRADO`);

--
-- Indices de la tabla `status_ticket`
--
ALTER TABLE `status_ticket`
  ADD PRIMARY KEY (`ID_STATUS`);

--
-- Indices de la tabla `ticket_alumnos`
--
ALTER TABLE `ticket_alumnos`
  ADD PRIMARY KEY (`ID_TICKET`),
  ADD KEY `ID_ALUMNO` (`ID_ALUMNO`),
  ADD KEY `ID_STATUS` (`ID_STATUS`);

--
-- Indices de la tabla `ticket_genericos`
--
ALTER TABLE `ticket_genericos`
  ADD PRIMARY KEY (`ID_TICKET`),
  ADD KEY `ID_AREA` (`ID_AREA`),
  ADD KEY `ID_STATUS` (`ID_STATUS`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `ID_ALUMNO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `ID_AREA` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `ID_ESPECIALIDAD` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grado`
--
ALTER TABLE `grado`
  MODIFY `ID_GRADO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `status_ticket`
--
ALTER TABLE `status_ticket`
  MODIFY `ID_STATUS` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ticket_alumnos`
--
ALTER TABLE `ticket_alumnos`
  MODIFY `ID_TICKET` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ticket_genericos`
--
ALTER TABLE `ticket_genericos`
  MODIFY `ID_TICKET` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`ESPECIALIDAD`) REFERENCES `especialidad` (`ID_ESPECIALIDAD`),
  ADD CONSTRAINT `alumno_ibfk_2` FOREIGN KEY (`GRADO`) REFERENCES `grado` (`ID_GRADO`);

--
-- Filtros para la tabla `ticket_alumnos`
--
ALTER TABLE `ticket_alumnos`
  ADD CONSTRAINT `ticket_alumnos_ibfk_1` FOREIGN KEY (`ID_ALUMNO`) REFERENCES `alumno` (`ID_ALUMNO`),
  ADD CONSTRAINT `ticket_alumnos_ibfk_2` FOREIGN KEY (`ID_STATUS`) REFERENCES `status_ticket` (`ID_STATUS`);

--
-- Filtros para la tabla `ticket_genericos`
--
ALTER TABLE `ticket_genericos`
  ADD CONSTRAINT `ticket_genericos_ibfk_1` FOREIGN KEY (`ID_AREA`) REFERENCES `areas` (`ID_AREA`),
  ADD CONSTRAINT `ticket_genericos_ibfk_2` FOREIGN KEY (`ID_STATUS`) REFERENCES `status_ticket` (`ID_STATUS`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
