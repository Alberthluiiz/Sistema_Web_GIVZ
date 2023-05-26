-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-05-2023 a las 05:50:26
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `givz_dbinventario`
--
CREATE DATABASE IF NOT EXISTS `givz_dbinventario` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `givz_dbinventario`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `givz_tcategoria`
--

CREATE TABLE `givz_tcategoria` (
  `tcategoria_id` int(11) NOT NULL,
  `tcategoria_nombre` varchar(50) NOT NULL,
  `tcategoria_ubicacion` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `givz_tcategoria`
--

INSERT INTO `givz_tcategoria` (`tcategoria_id`, `tcategoria_nombre`, `tcategoria_ubicacion`) VALUES
(20, 'Pinturas', 'Percha 1'),
(22, 'Plasticos', 'Percha 2'),
(23, 'Pliegos', 'Percha 3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `givz_tcliente`
--

CREATE TABLE `givz_tcliente` (
  `tcliente_id` int(11) NOT NULL,
  `tcliente_identificacion` varchar(15) NOT NULL,
  `tcliente_nombre` varchar(100) NOT NULL,
  `tcliente_direccion` varchar(200) NOT NULL,
  `tcliente_ciudad` varchar(100) NOT NULL,
  `tcliente_telefono` varchar(15) NOT NULL,
  `tcliente_email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `givz_tcliente`
--

INSERT INTO `givz_tcliente` (`tcliente_id`, `tcliente_identificacion`, `tcliente_nombre`, `tcliente_direccion`, `tcliente_ciudad`, `tcliente_telefono`, `tcliente_email`) VALUES
(1, '1727525584', 'Luis Guillen', 'Chillogallo', 'Quito', '0979238796', 'punk29luis@gmail.com'),
(2, '1727525584', 'Luis Alberto Guillen Yaucan', 'Chillogallo', 'Quito', '0979238796', 'luisguillen290301@gmail.com'),
(3, '1727525568', 'Silvana', 'Chillogallo', 'Quito', '0979238796', 'silvanaestefania@gmail.com'),
(4, '1727525568', 'Silvana Estefania Casilla CApuz', 'Chillogallo', 'Quito', '0979238796', 'silvanacasillas@gmail.com'),
(5, '17275255623', 'Estefania Casillas', 'La Buena Aventura', 'Quito', '0961380728', 'estefaniacasillas29@gmail.com'),
(6, '1755513692', 'Andy Totasig', 'Chillogallo', 'Quito', '0979562648', 'andy.totasig26@gmail.com'),
(7, '1500564230', 'Boris Pilpe', 'La Armenia', 'Conocoto', '097856452635', 'donboriseventos@hotmail.com'),
(8, '1561465456464', 'Luis Guillen', 'Chillogallo', 'Quito', '09795362315', 'luisguillen2001@gmail.com'),
(9, '17275664', 'Maria Teresa Yaucan Buñay', 'La armenia', 'Quito', '0956254359', 'teresitayaucan14@gmail.com'),
(10, '125468456', 'Prueba numero', 'Prueba nueva', 'Prueba', '065125465', 'prueba@gmail.com'),
(11, '1727525584', 'Luis Yaucan', 'Chillogallo12', 'Riobamba', '0979238796', 'luisprueba@gmail.com'),
(12, '1542586654', 'Aylin Elizabeth Totasig Yaucan', 'Av. Moran Valverde - Pasaje Oe5-S30', 'Quito', '0962162814', 'aylin.elizabeth29@gmail.com'),
(13, '1542586654', 'Luis Alberto Guillen Yaucan', 'Charles Darwin y Cesar Davila', 'Quito La armenia', '0652354658', 'luisguillen29032001@gmail.com'),
(14, '1727525584', 'Luis Alberto Guillen Yaucan', 'Charles Darwin - Cesar Davila', 'La armenia - Conocoto', '0254125682', 'errodeemail@gmail.com'),
(15, '1727525585', 'Luis Alberto Guillen Yaucan', 'La armenia - puente 8', 'Quito - Ecuador', '0254125986', 'identificacion@gmail.com'),
(16, '1727525588', 'Luis Alberto Guillen', 'Av. Moran Valderde - Oe852', 'Ambato - Quito', '02514259654', 'quito@gmail.com'),
(17, '1727525581', 'Silvana Estefania Casilla Capuz', 'Chillogallo', 'Quito', '0652542659', 'estefania.silvana@gmail.com'),
(18, '1714449238', 'Vinicio Vásconez', 'Turubamba Alto', 'Quito', '0995572257', 'usuario@usuario.com'),
(19, '1727525584001', 'Luis Alberto Guillen Yaucan', 'Av. Charles Darwin - Cesar Davila', 'Quito - Conocoto', '0979238796', 'cliente1@gmail.com'),
(20, '1727525584001', 'Luis Alberto Guillen Yaucan', 'Chillogallo', 'Quito', '0979238796', 'cliente2@gmail.com'),
(21, '1478523698521', 'Saul Montes', 'Carapungo', 'Machala', '102547896', 'mail@mail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `givz_tproducto`
--

CREATE TABLE `givz_tproducto` (
  `tproducto_id` int(11) NOT NULL,
  `tproducto_codigo` varchar(200) NOT NULL,
  `tproducto_nombre` varchar(70) NOT NULL,
  `tproducto_precio` decimal(30,2) NOT NULL,
  `tproducto_stock` int(11) NOT NULL,
  `tproducto_foto` varchar(200) NOT NULL,
  `tusuario_id` int(11) NOT NULL,
  `tcategoria_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `givz_tproducto`
--

INSERT INTO `givz_tproducto` (`tproducto_id`, `tproducto_codigo`, `tproducto_nombre`, `tproducto_precio`, `tproducto_stock`, `tproducto_foto`, `tusuario_id`, `tcategoria_id`) VALUES
(22, 'pintura001', 'Pintura norma x12', '6.50', 12, 'Pintura_norma_x12_42.jpg', 1, 20),
(23, 'pintura002', 'Pintura norma x24', '12.50', 12, 'Pintura_norma_x24_50.jpg', 1, 20),
(24, 'pintura003', 'Pintura norma jumbo x12', '17.50', 12, 'Pintura_norma_jumbo_x12_44.jpg', 1, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `givz_trprodvta`
--

CREATE TABLE `givz_trprodvta` (
  `tprodvta_id` int(11) NOT NULL,
  `tprodvta_cantidad` int(11) NOT NULL,
  `tprodvta_precio` decimal(30,2) NOT NULL,
  `tventa_id` int(11) NOT NULL,
  `tproducto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `givz_tusuario`
--

CREATE TABLE `givz_tusuario` (
  `tusuario_id` int(11) NOT NULL,
  `tusuario_nombre` varchar(40) NOT NULL,
  `tusuario_apellido` varchar(40) NOT NULL,
  `tusuario_usuario` varchar(20) NOT NULL,
  `tusuario_clave` varchar(200) NOT NULL,
  `tusuario_email` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `givz_tusuario`
--

INSERT INTO `givz_tusuario` (`tusuario_id`, `tusuario_nombre`, `tusuario_apellido`, `tusuario_usuario`, `tusuario_clave`, `tusuario_email`) VALUES
(1, 'Administrador', 'Principal', 'Administrador', '$2y$10$EPY9LSLOFLDDBriuJICmFOqmZdnDXxLJG8YFbog5LcExp77DBQvgC', ''),
(41, 'Luis', 'Guillen', 'AlberthLuiiz', '$2y$10$viDv1cTgtoCApg6AIEJws.c6.AyDEm65vW284HZAenZj0gu1gWhZq', 'luisguillen290301@gmail.com'),
(42, 'Vinicio', 'Vásconez', 'Lobito6k', '$2y$10$Z9i6kBzCWMv9lAzy7GmDsuOuNYPrpvIWbEuZl.iN4rOijvYF3Izh6', 'mail@mail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `givz_tventa`
--

CREATE TABLE `givz_tventa` (
  `tventa_id` int(11) NOT NULL,
  `tventa_fecha` datetime NOT NULL,
  `tventa_total` decimal(30,2) NOT NULL,
  `tusuario_id` int(11) NOT NULL,
  `tcliente_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `givz_tcategoria`
--
ALTER TABLE `givz_tcategoria`
  ADD PRIMARY KEY (`tcategoria_id`);

--
-- Indices de la tabla `givz_tcliente`
--
ALTER TABLE `givz_tcliente`
  ADD PRIMARY KEY (`tcliente_id`);

--
-- Indices de la tabla `givz_tproducto`
--
ALTER TABLE `givz_tproducto`
  ADD PRIMARY KEY (`tproducto_id`),
  ADD KEY `tusuario_id` (`tusuario_id`),
  ADD KEY `tcategoria_id` (`tcategoria_id`),
  ADD KEY `tusuario_id_2` (`tusuario_id`),
  ADD KEY `tcategoria_id_2` (`tcategoria_id`);

--
-- Indices de la tabla `givz_trprodvta`
--
ALTER TABLE `givz_trprodvta`
  ADD PRIMARY KEY (`tprodvta_id`),
  ADD KEY `tventa_id` (`tventa_id`),
  ADD KEY `tproducto_id` (`tproducto_id`),
  ADD KEY `tventa_id_2` (`tventa_id`),
  ADD KEY `tproducto_id_2` (`tproducto_id`);

--
-- Indices de la tabla `givz_tusuario`
--
ALTER TABLE `givz_tusuario`
  ADD PRIMARY KEY (`tusuario_id`);

--
-- Indices de la tabla `givz_tventa`
--
ALTER TABLE `givz_tventa`
  ADD PRIMARY KEY (`tventa_id`),
  ADD KEY `tusuario_id` (`tusuario_id`),
  ADD KEY `tcliente_id` (`tcliente_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `givz_tcategoria`
--
ALTER TABLE `givz_tcategoria`
  MODIFY `tcategoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `givz_tcliente`
--
ALTER TABLE `givz_tcliente`
  MODIFY `tcliente_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `givz_tproducto`
--
ALTER TABLE `givz_tproducto`
  MODIFY `tproducto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `givz_trprodvta`
--
ALTER TABLE `givz_trprodvta`
  MODIFY `tprodvta_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `givz_tusuario`
--
ALTER TABLE `givz_tusuario`
  MODIFY `tusuario_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `givz_tventa`
--
ALTER TABLE `givz_tventa`
  MODIFY `tventa_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `givz_tproducto`
--
ALTER TABLE `givz_tproducto`
  ADD CONSTRAINT `givz_tproducto_ibfk_1` FOREIGN KEY (`tusuario_id`) REFERENCES `givz_tusuario` (`tusuario_id`),
  ADD CONSTRAINT `givz_tproducto_ibfk_2` FOREIGN KEY (`tcategoria_id`) REFERENCES `givz_tcategoria` (`tcategoria_id`);

--
-- Filtros para la tabla `givz_trprodvta`
--
ALTER TABLE `givz_trprodvta`
  ADD CONSTRAINT `givz_trprodvta_ibfk_1` FOREIGN KEY (`tproducto_id`) REFERENCES `givz_tproducto` (`tproducto_id`),
  ADD CONSTRAINT `givz_trprodvta_ibfk_2` FOREIGN KEY (`tventa_id`) REFERENCES `givz_tventa` (`tventa_id`);

--
-- Filtros para la tabla `givz_tventa`
--
ALTER TABLE `givz_tventa`
  ADD CONSTRAINT `givz_tventa_ibfk_1` FOREIGN KEY (`tusuario_id`) REFERENCES `givz_tusuario` (`tusuario_id`),
  ADD CONSTRAINT `givz_tventa_ibfk_2` FOREIGN KEY (`tcliente_id`) REFERENCES `givz_tcliente` (`tcliente_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
