-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-06-2024 a las 17:29:35
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `caney`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alquiler`
--

CREATE TABLE `alquiler` (
  `numAlquiler` int(255) NOT NULL,
  `fechaAlquiler` date NOT NULL,
  `cantPersonaAlquiler` varchar(255) NOT NULL,
  `montoAlquiler` varchar(255) NOT NULL,
  `cedulaCliente` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `numArea` int(255) NOT NULL,
  `nombreArea` varchar(50) NOT NULL,
  `horarioArea` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `area`
--

INSERT INTO `area` (`numArea`, `nombreArea`, `horarioArea`) VALUES
(1, 'Piscina', '9am a 6pm'),
(2, 'Caney', '9am a 6pm'),
(3, 'Caney Completo', '9am a 6pm');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignararea`
--

CREATE TABLE `asignararea` (
  `numArea` int(255) NOT NULL,
  `numAlquiler` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignarbienalquiler`
--

CREATE TABLE `asignarbienalquiler` (
  `codBien` int(255) NOT NULL,
  `numAlquiler` int(255) NOT NULL,
  `cantidadBienAlquiler` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignarbienreservacion`
--

CREATE TABLE `asignarbienreservacion` (
  `codBien` int(255) NOT NULL,
  `numReservacion` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignartrabajador`
--

CREATE TABLE `asignartrabajador` (
  `cedulaTrabajador` varchar(8) NOT NULL,
  `numAlquiler` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bienes`
--

CREATE TABLE `bienes` (
  `codBien` int(255) NOT NULL,
  `nomBien` varchar(30) NOT NULL,
  `cantBien` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `bienes`
--

INSERT INTO `bienes` (`codBien`, `nomBien`, `cantBien`) VALUES
(1, 'Mesas', 30),
(2, 'Sillas', 50),
(3, 'Cavas', 10),
(4, 'Toldos', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `cedulaCliente` varchar(8) NOT NULL,
  `nombreCliente` varchar(30) NOT NULL,
  `apellidoCliente` varchar(30) NOT NULL,
  `direccionCliente` varchar(100) NOT NULL,
  `telefonoCliente` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`cedulaCliente`, `nombreCliente`, `apellidoCliente`, `direccionCliente`, `telefonoCliente`) VALUES
('27737458', 'Ricardo', 'Hernandez', 'Barquisimeto', '0424-5411424'),
('29506932', 'Moises', 'Torrellas', 'El Tocuyo', '0000-0000000'),
('31550201', 'Santiago', 'Oviedo', 'Barquisimeto', '0412-3791486');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservacion`
--

CREATE TABLE `reservacion` (
  `numReservacion` int(255) NOT NULL,
  `fechaReservacion` date NOT NULL,
  `cantPersonaReservacion` varchar(255) NOT NULL,
  `horaReservacion` time NOT NULL,
  `cedulaCliente` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajador`
--

CREATE TABLE `trabajador` (
  `cedulaTrabajador` varchar(8) NOT NULL,
  `nombreTrabajador` varchar(30) NOT NULL,
  `apellidoTrabajador` varchar(30) NOT NULL,
  `direccionTrabajador` varchar(100) NOT NULL,
  `telefonoTrabajador` varchar(12) NOT NULL,
  `cargoTrabajador` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `trabajador`
--

INSERT INTO `trabajador` (`cedulaTrabajador`, `nombreTrabajador`, `apellidoTrabajador`, `direccionTrabajador`, `telefonoTrabajador`, `cargoTrabajador`) VALUES
('29517871', 'Leonardo', 'Medina', 'Barquisimeto', '0000-0000000', 'Mesonero'),
('29623228', 'Yonjarman', 'Perez', 'Quibor', '0412-2979103', 'Cocinero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(255) NOT NULL,
  `cedulaUsuario` varchar(8) NOT NULL,
  `nombreUsuario` varchar(30) NOT NULL,
  `apellidoUsuario` varchar(30) NOT NULL,
  `telefonoUsuario` varchar(12) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `contraseña` varchar(30) NOT NULL,
  `tipoUsuario` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `cedulaUsuario`, `nombreUsuario`, `apellidoUsuario`, `telefonoUsuario`, `usuario`, `contraseña`, `tipoUsuario`) VALUES
(2, '0000000', 'Administrador', 'Administrador', '0000-0000000', 'administrador', '123456', 'Administrador'),
(3, '29506932', 'Moises', 'Torrellas', '0412-0565231', 'moises25', '123456', 'Usuario'),
(4, '27737458', 'Ricardo', 'Hernandez', '0424-5411424', 'ricardo27', '123456', 'Usuario'),
(5, '31550201', 'Santiago', 'Oviedo', '0412-3791486', 'santiago31', '123456', 'Usuario'),
(6, '29517871', 'Leonardo', 'Medina', '0426-6589382', 'leonardo29', '123456', 'Usuario'),
(7, '29623228', 'Yonjarman', 'Perez', '0412-2979103', 'yonjarman29', '123456', 'Usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alquiler`
--
ALTER TABLE `alquiler`
  ADD PRIMARY KEY (`numAlquiler`),
  ADD KEY `alquiler_ibfk_1` (`cedulaCliente`);

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`numArea`);

--
-- Indices de la tabla `asignararea`
--
ALTER TABLE `asignararea`
  ADD KEY `numArea` (`numArea`),
  ADD KEY `numAlquiler` (`numAlquiler`);

--
-- Indices de la tabla `asignarbienalquiler`
--
ALTER TABLE `asignarbienalquiler`
  ADD KEY `codBien` (`codBien`),
  ADD KEY `numAlquiler` (`numAlquiler`);

--
-- Indices de la tabla `asignarbienreservacion`
--
ALTER TABLE `asignarbienreservacion`
  ADD KEY `codBien` (`codBien`),
  ADD KEY `numReservacion` (`numReservacion`);

--
-- Indices de la tabla `asignartrabajador`
--
ALTER TABLE `asignartrabajador`
  ADD KEY `cedulaTrabajador` (`cedulaTrabajador`),
  ADD KEY `numAlquiler` (`numAlquiler`);

--
-- Indices de la tabla `bienes`
--
ALTER TABLE `bienes`
  ADD PRIMARY KEY (`codBien`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cedulaCliente`);

--
-- Indices de la tabla `reservacion`
--
ALTER TABLE `reservacion`
  ADD PRIMARY KEY (`numReservacion`),
  ADD KEY `reservacion_ibfk_1` (`cedulaCliente`);

--
-- Indices de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  ADD PRIMARY KEY (`cedulaTrabajador`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alquiler`
--
ALTER TABLE `alquiler`
  ADD CONSTRAINT `alquiler_ibfk_1` FOREIGN KEY (`cedulaCliente`) REFERENCES `cliente` (`cedulaCliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `asignararea`
--
ALTER TABLE `asignararea`
  ADD CONSTRAINT `asignararea_ibfk_1` FOREIGN KEY (`numArea`) REFERENCES `area` (`numArea`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asignararea_ibfk_2` FOREIGN KEY (`numAlquiler`) REFERENCES `alquiler` (`numAlquiler`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `asignarbienalquiler`
--
ALTER TABLE `asignarbienalquiler`
  ADD CONSTRAINT `asignarbienalquiler_ibfk_1` FOREIGN KEY (`codBien`) REFERENCES `bienes` (`codBien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asignarbienalquiler_ibfk_2` FOREIGN KEY (`numAlquiler`) REFERENCES `alquiler` (`numAlquiler`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `asignarbienreservacion`
--
ALTER TABLE `asignarbienreservacion`
  ADD CONSTRAINT `asignarbienreservacion_ibfk_1` FOREIGN KEY (`codBien`) REFERENCES `bienes` (`codBien`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asignarbienreservacion_ibfk_2` FOREIGN KEY (`numReservacion`) REFERENCES `reservacion` (`numReservacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `asignartrabajador`
--
ALTER TABLE `asignartrabajador`
  ADD CONSTRAINT `asignartrabajador_ibfk_1` FOREIGN KEY (`cedulaTrabajador`) REFERENCES `trabajador` (`cedulaTrabajador`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asignartrabajador_ibfk_2` FOREIGN KEY (`numAlquiler`) REFERENCES `alquiler` (`numAlquiler`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reservacion`
--
ALTER TABLE `reservacion`
  ADD CONSTRAINT `reservacion_ibfk_1` FOREIGN KEY (`cedulaCliente`) REFERENCES `cliente` (`cedulaCliente`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
