-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3308
-- Tiempo de generación: 04-05-2023 a las 19:08:58
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
  `tcategoria_id` int(10) NOT NULL,
  `tcategoria_nombre` varchar(50) NOT NULL,
  `tcategoria_ubicacion` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `givz_tproducto`
--

CREATE TABLE `givz_tproducto` (
  `tproducto_id` int(20) NOT NULL,
  `tproducto_codigo` varchar(40) NOT NULL,
  `tproducto_nombre` varchar(70) NOT NULL,
  `tproducto_precio` decimal(30,2) NOT NULL,
  `tproducto_stock` int(25) NOT NULL,
  `tproducto_foto` varchar(30) NOT NULL,
  `tusuario_id` int(10) NOT NULL,
  `tcategoria_id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `givz_tproveedor`
--

CREATE TABLE `givz_tproveedor` (
  `tproveedor_id` int(20) NOT NULL,
  `tproveedor_tipoidentificacion` varchar(70) NOT NULL,
  `tproveedor_cedularuc` int(20) NOT NULL,
  `tproveedor_nombre` varchar(70) NOT NULL,
  `tproveedor_direccion` varchar(100) NOT NULL,
  `tproveedor_ciudad` varchar(70) NOT NULL,
  `tproveedor_telefono` int(15) NOT NULL,
  `tproveedor_mail` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `givz_trbodega`
--

CREATE TABLE `givz_trbodega` (
  `tproducto_id` int(20) NOT NULL,
  `tproveedor_id` int(20) NOT NULL,
  `trbodega_stock` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `givz_trprodvta`
--

CREATE TABLE `givz_trprodvta` (
  `tventa_id` int(20) NOT NULL,
  `tproducto_id` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `givz_tusuario`
--

CREATE TABLE `givz_tusuario` (
  `tusuario_id` int(10) NOT NULL,
  `tusuario_nombre` varchar(40) NOT NULL,
  `tusuario_apellido` varchar(40) NOT NULL,
  `tusuario_usuario` varchar(20) NOT NULL,
  `tusuario_clave` int(200) NOT NULL,
  `tusuario_email` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------
--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `givz_tusuario` (`tusuario_id`, `tusuario_nombre`, `tusuario_apellido`, `tusuario_usuario`, `tusuario_clave`, `tusuario_email`) VALUES
(1, 'Administrador', 'Principal', 'Administrador', '$2y$10$EPY9LSLOFLDDBriuJICmFOqmZdnDXxLJG8YFbog5LcExp77DBQvgC', '');

--
-- Índices para tablas volcadas
--

--
-- Estructura de tabla para la tabla `givz_tventa`
--

CREATE TABLE `givz_tventa` (
  `tventa_id` int(20) NOT NULL,
  `tventa_cliente` varchar(70) NOT NULL,
  `tventa_fecha` date NOT NULL,
  `tventa_codigo` varchar(40) NOT NULL,
  `tventa_cantidad` int(25) NOT NULL,
  `tventa_precio` decimal(30,2) NOT NULL
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
-- Indices de la tabla `givz_tproducto`
--
ALTER TABLE `givz_tproducto`
  ADD PRIMARY KEY (`tproducto_id`),
  ADD KEY `tusuario_id` (`tusuario_id`),
  ADD KEY `tcategoria_id` (`tcategoria_id`);

--
-- Indices de la tabla `givz_tproveedor`
--
ALTER TABLE `givz_tproveedor`
  ADD PRIMARY KEY (`tproveedor_id`);

--
-- Indices de la tabla `givz_trbodega`
--
ALTER TABLE `givz_trbodega`
  ADD KEY `tproducto_id` (`tproducto_id`),
  ADD KEY `tproveedor_id` (`tproveedor_id`);

--
-- Indices de la tabla `givz_trprodvta`
--
ALTER TABLE `givz_trprodvta`
  ADD KEY `tventa_id` (`tventa_id`),
  ADD KEY `tproducto_id` (`tproducto_id`);

--
-- Indices de la tabla `givz_tusuario`
--
ALTER TABLE `givz_tusuario`
  ADD PRIMARY KEY (`tusuario_id`);

--
-- Indices de la tabla `givz_tventa`
--
ALTER TABLE `givz_tventa`
  ADD PRIMARY KEY (`tventa_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `givz_tcategoria`
--
ALTER TABLE `givz_tcategoria`
  MODIFY `tcategoria_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `givz_tproducto`
--
ALTER TABLE `givz_tproducto`
  MODIFY `tproducto_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `givz_tproveedor`
--
ALTER TABLE `givz_tproveedor`
  MODIFY `tproveedor_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `givz_tusuario`
--
ALTER TABLE `givz_tusuario`
  MODIFY `tusuario_id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `givz_tventa`
--
ALTER TABLE `givz_tventa`
  MODIFY `tventa_id` int(20) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `givz_tproducto`
--
ALTER TABLE `givz_tproducto`
  ADD CONSTRAINT `givz_tproducto_ibfk_1` FOREIGN KEY (`tcategoria_id`) REFERENCES `givz_tcategoria` (`tcategoria_id`),
  ADD CONSTRAINT `givz_tproducto_ibfk_2` FOREIGN KEY (`tusuario_id`) REFERENCES `givz_tusuario` (`tusuario_id`);

--
-- Filtros para la tabla `givz_trbodega`
--
ALTER TABLE `givz_trbodega`
  ADD CONSTRAINT `givz_trbodega_ibfk_1` FOREIGN KEY (`tproveedor_id`) REFERENCES `givz_tproveedor` (`tproveedor_id`),
  ADD CONSTRAINT `givz_trbodega_ibfk_2` FOREIGN KEY (`tproducto_id`) REFERENCES `givz_tproducto` (`tproducto_id`);

--
-- Filtros para la tabla `givz_trprodvta`
--
ALTER TABLE `givz_trprodvta`
  ADD CONSTRAINT `givz_trprodvta_ibfk_1` FOREIGN KEY (`tproducto_id`) REFERENCES `givz_tproducto` (`tproducto_id`),
  ADD CONSTRAINT `givz_trprodvta_ibfk_2` FOREIGN KEY (`tventa_id`) REFERENCES `givz_tventa` (`tventa_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
