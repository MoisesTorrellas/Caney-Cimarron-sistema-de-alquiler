-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-06-2024 a las 01:20:31
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

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
CREATE DATABASE IF NOT EXISTS `caney` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;
USE `caney`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(255) NOT NULL,
  `cedulaUsuario` varchar(8) NOT NULL,
  `nombreUsuario` varchar(30) NOT NULL,
  `apellidoUsuario` varchar(30) NOT NULL,
  `telefonoUsuario` varchar(20) NOT NULL,
  `usuario` varchar(15) NOT NULL,
  `contraseña` varchar(15) NOT NULL,
  `tipoUsuario` varchar(30) DEFAULT NULL
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
(16, '29623228', 'Yonjarman', 'Peréz', '0000-0000000', 'yonjarman29', '123456', 'Usuario');

--
-- Índices para tablas volcadas
--

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
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
