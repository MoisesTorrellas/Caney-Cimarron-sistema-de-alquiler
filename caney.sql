-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-06-2024 a las 20:35:09
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.1.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
-- Estructura de tabla para la tabla `area`
--

CREATE TABLE `area` (
  `numarea` int(255) NOT NULL,
  `nombrearea` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL,
  `horarioarea` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bienes`
--

CREATE TABLE `bienes` (
  `codBien` int(3) NOT NULL,
  `nomBien` varchar(30) NOT NULL,
  `cantBien` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `cedulaCliente` varchar(8) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombreCliente` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellidoCliente` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `direccionCliente` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefonoCliente` varchar(15) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajador`
--

CREATE TABLE `trabajador` (
  `cedulaTrabajador` varchar(8) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombreTrabajador` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellidoTrabajador` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `direccionTrabajador` varchar(100) COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefonoTrabajador` varchar(15) COLLATE utf8mb4_spanish_ci NOT NULL,
  `cargoTrabajador` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(255) NOT NULL,
  `cedulaUsuario` varchar(8) COLLATE utf8mb4_spanish_ci NOT NULL,
  `nombreUsuario` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellidoUsuario` varchar(30) COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefonoUsuario` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `usuario` varchar(15) COLLATE utf8mb4_spanish_ci NOT NULL,
  `contraseña` varchar(15) COLLATE utf8mb4_spanish_ci NOT NULL,
  `tipoUsuario` varchar(30) COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `cedulaUsuario`, `nombreUsuario`, `apellidoUsuario`, `telefonoUsuario`, `usuario`, `contraseña`, `tipoUsuario`) VALUES
(1, '0000000', 'Administrador', 'Administrador', '0000-0000000', 'administrador', '123456', 'Administrador'),
(4, '29506932', 'Moises', 'Torrellas', '0412-0565231', 'moises25', '654321', 'Usuario'),
(13, '27737458', 'Ricardo', 'Hernández', '0000-0000000', 'ricardo27', '123456', 'Usuario'),
(14, '31550201', 'Santiago', 'Oviedo', '0000-0000000', 'santiago31', '123456', 'Usuario'),
(15, '29517871', 'Leonardo', 'Medina', '0000-0000000', 'leonardo29', '123456', 'Usuario'),
(16, '29623228', 'Yonjarman', 'Peréz', '0000-0000000', 'yonjarman29', '123456', 'Usuario'),
(17, '3453445', 'etrtret', 'retret', '0000-0000000', 'hhhhh', 'hhhh', 'Usuario'),
(18, '22222222', 'deddd', 'dddddd', '0000-0000000', 'dddddd', 'dddddd', 'Usuario'),
(19, '44444444', 'ggggg', 'ggggg', '0000-0000000', 'ggggg', 'ggggg', 'Usuario'),
(20, '5555555', 'ggggg', 'gggggh', '0000-0000000', 'hhhhhhh', 'hhhhh', 'Usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `area`
--
ALTER TABLE `area`
  ADD PRIMARY KEY (`numarea`);

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
-- Indices de la tabla `trabajador`
--
ALTER TABLE `trabajador`
  ADD PRIMARY KEY (`cedulaTrabajador`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
