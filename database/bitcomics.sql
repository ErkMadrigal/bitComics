-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-09-2020 a las 05:50:41
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bitcomics`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `idInventario` int(11) NOT NULL,
  `inventario` int(11) NOT NULL,
  `sucursal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`idInventario`, `inventario`, `sucursal`) VALUES
(1, 82967, 1),
(2, 82965, 1),
(3, 82870, 1),
(4, 1220, 1),
(5, 1003, 1),
(6, 1994, 1),
(7, 428, 2),
(8, 384, 2),
(9, 1308, 2),
(10, 323, 3),
(11, 2088, 2),
(12, 1886, 2),
(13, 291, 2),
(14, 1332, 3),
(15, 331, 3),
(16, 376, 3),
(17, 3627, 3),
(18, 183, 3),
(19, 1158, 3),
(20, 1749, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puestos`
--

CREATE TABLE `puestos` (
  `idPuesto` int(11) NOT NULL,
  `Puesto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `puestos`
--

INSERT INTO `puestos` (`idPuesto`, `Puesto`) VALUES
(1, 'vendedorT1'),
(2, 'vendedorT2'),
(3, 'vendedorP'),
(4, 'gerente'),
(5, 'distrital');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `idSucursal` int(11) NOT NULL,
  `nombreSucursal` text NOT NULL,
  `direccionSucursal` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`idSucursal`, `nombreSucursal`, `direccionSucursal`) VALUES
(1, 'BitComics Toluca Centro', 'Teluca Lerdo, Calles: esquina Rayon y Independencia'),
(2, 'BitComics Metepec', 'Metepec Av. Leona Vicario Plaza Rubi'),
(3, 'BitComics Galerias Toluca', 'Toluca Lerdo, Av. Primero de Mayo y Tollocan');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `nombreUsuario` text NOT NULL,
  `apellidosUsuario` text NOT NULL,
  `puesto` int(1) NOT NULL,
  `avatar` text NOT NULL,
  `telefono` text NOT NULL,
  `correo` text NOT NULL,
  `password` text NOT NULL,
  `sucursal` int(1) NOT NULL,
  `status` int(1) NOT NULL,
  `nombreUser` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `nombreUsuario`, `apellidosUsuario`, `puesto`, `avatar`, `telefono`, `correo`, `password`, `sucursal`, `status`, `nombreUser`) VALUES
(8, 'erick', 'madrigal', 5, 'img/img-perfiles/1.jpg', '1234567890', 'erk@gmail.com', '$argon2i$v=19$m=128,t=4,p=2$UWRSUUNFdGJwYklHanZpZw$eIjYu6uUZgeblM/8rCIJVRcefjRzXh82wRI0pAZtfw8', 2, 1, 'erk1006'),
(20, 'administrador ', 'administrador ', 5, 'img/img-perfiles/user3-128x128.jpg', '7220001112', 'admin@bit.com', '$argon2i$v=19$m=128,t=4,p=2$Tk0vNTlpS3Z3MXh4Ujg5dQ$rSlYZrLz/zWmVqI7/qDTLYzbGh6f0vsix68VJ7sV2js', 2, 1, 'admin000');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD PRIMARY KEY (`idInventario`),
  ADD KEY `sucursal` (`sucursal`);

--
-- Indices de la tabla `puestos`
--
ALTER TABLE `puestos`
  ADD PRIMARY KEY (`idPuesto`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`idSucursal`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `sucursal` (`sucursal`),
  ADD KEY `puesto` (`puesto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
  MODIFY `idInventario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `puestos`
--
ALTER TABLE `puestos`
  MODIFY `idPuesto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `idSucursal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`sucursal`) REFERENCES `sucursal` (`idSucursal`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`puesto`) REFERENCES `puestos` (`idPuesto`),
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`sucursal`) REFERENCES `sucursal` (`idSucursal`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
