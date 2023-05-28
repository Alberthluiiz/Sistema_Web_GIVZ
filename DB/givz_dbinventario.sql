-- phpMyAdmin SQL Dump

-- version 5.2.0

-- https://www.phpmyadmin.net/

--

-- Servidor: 127.0.0.1

-- Tiempo de generación: 28-05-2023 a las 03:10:02

-- Versión del servidor: 10.4.27-MariaDB

-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */

;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */

;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */

;

/*!40101 SET NAMES utf8mb4 */

;

--

-- Base de datos: `givz_dbinventario`

--

CREATE DATABASE
    IF NOT EXISTS `givz_dbinventario` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE `givz_dbinventario`;

-- --------------------------------------------------------

--

-- Estructura de tabla para la tabla `givz_tcategoria`

--

CREATE TABLE
    `givz_tcategoria` (
        `tcategoria_id` int(11) NOT NULL,
        `tcategoria_nombre` varchar(50) NOT NULL,
        `tcategoria_ubicacion` varchar(60) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--

-- Estructura de tabla para la tabla `givz_tcliente`

--

CREATE TABLE
    `givz_tcliente` (
        `tcliente_id` int(11) NOT NULL,
        `tcliente_identificacion` varchar(15) NOT NULL,
        `tcliente_nombre` varchar(100) NOT NULL,
        `tcliente_direccion` varchar(200) NOT NULL,
        `tcliente_ciudad` varchar(100) NOT NULL,
        `tcliente_telefono` varchar(15) NOT NULL,
        `tcliente_email` varchar(100) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--

-- Estructura de tabla para la tabla `givz_tproducto`

--

CREATE TABLE
    `givz_tproducto` (
        `tproducto_id` int(11) NOT NULL,
        `tproducto_codigo` varchar(200) NOT NULL,
        `tproducto_nombre` varchar(70) NOT NULL,
        `tproducto_precio` decimal(30, 2) NOT NULL,
        `tproducto_stock` int(11) NOT NULL,
        `tproducto_foto` varchar(200) NOT NULL,
        `tusuario_id` int(11) NOT NULL,
        `tcategoria_id` int(11) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--

-- Estructura de tabla para la tabla `givz_trprodvta`

--

CREATE TABLE
    `givz_trprodvta` (
        `tprodvta_id` int(11) NOT NULL,
        `tprodvta_cantidad` int(11) NOT NULL,
        `tprodvta_precio` decimal(30, 2) NOT NULL,
        `tventa_id` int(11) NOT NULL,
        `tproducto_id` int(11) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--

-- Estructura de tabla para la tabla `givz_tusuario`

--

CREATE TABLE
    `givz_tusuario` (
        `tusuario_id` int(11) NOT NULL,
        `tusuario_nombre` varchar(40) NOT NULL,
        `tusuario_apellido` varchar(40) NOT NULL,
        `tusuario_usuario` varchar(20) NOT NULL,
        `tusuario_clave` varchar(200) NOT NULL,
        `tusuario_email` varchar(70) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--

-- Volcado de datos para la tabla `givz_tusuario`

--

INSERT INTO
    `givz_tusuario` (
        `tusuario_id`,
        `tusuario_nombre`,
        `tusuario_apellido`,
        `tusuario_usuario`,
        `tusuario_clave`,
        `tusuario_email`
    )
VALUES (
        1,
        'Administrador',
        'Principal',
        'Administrador',
        '$2y$10$EPY9LSLOFLDDBriuJICmFOqmZdnDXxLJG8YFbog5LcExp77DBQvgC',
        ''
    );

-- --------------------------------------------------------

--

-- Estructura de tabla para la tabla `givz_tventa`

--

CREATE TABLE
    `givz_tventa` (
        `tventa_id` int(11) NOT NULL,
        `tventa_fecha` datetime NOT NULL,
        `tventa_total` decimal(30, 2) NOT NULL,
        `tusuario_id` int(11) NOT NULL,
        `tcliente_id` int(11) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

--

-- Índices para tablas volcadas

--

--

-- Indices de la tabla `givz_tcategoria`

--

ALTER TABLE `givz_tcategoria` ADD PRIMARY KEY (`tcategoria_id`);

--

-- Indices de la tabla `givz_tcliente`

--

ALTER TABLE `givz_tcliente` ADD PRIMARY KEY (`tcliente_id`);

--

-- Indices de la tabla `givz_tproducto`

--

ALTER TABLE `givz_tproducto`
ADD
    PRIMARY KEY (`tproducto_id`),
ADD
    KEY `tusuario_id` (`tusuario_id`),
ADD
    KEY `tcategoria_id` (`tcategoria_id`),
ADD
    KEY `tusuario_id_2` (`tusuario_id`),
ADD
    KEY `tcategoria_id_2` (`tcategoria_id`);

--

-- Indices de la tabla `givz_trprodvta`

--

ALTER TABLE `givz_trprodvta`
ADD
    PRIMARY KEY (`tprodvta_id`),
ADD
    KEY `tventa_id` (`tventa_id`),
ADD
    KEY `tproducto_id` (`tproducto_id`),
ADD
    KEY `tventa_id_2` (`tventa_id`),
ADD
    KEY `tproducto_id_2` (`tproducto_id`);

--

-- Indices de la tabla `givz_tusuario`

--

ALTER TABLE `givz_tusuario` ADD PRIMARY KEY (`tusuario_id`);

--

-- Indices de la tabla `givz_tventa`

--

ALTER TABLE `givz_tventa`
ADD PRIMARY KEY (`tventa_id`),
ADD
    KEY `tusuario_id` (`tusuario_id`),
ADD
    KEY `tcliente_id` (`tcliente_id`);

--

-- AUTO_INCREMENT de las tablas volcadas

--

--

-- AUTO_INCREMENT de la tabla `givz_tcategoria`

--

ALTER TABLE
    `givz_tcategoria` MODIFY `tcategoria_id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 28;

--

-- AUTO_INCREMENT de la tabla `givz_tcliente`

--

ALTER TABLE
    `givz_tcliente` MODIFY `tcliente_id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 22;

--

-- AUTO_INCREMENT de la tabla `givz_tproducto`

--

ALTER TABLE
    `givz_tproducto` MODIFY `tproducto_id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 27;

--

-- AUTO_INCREMENT de la tabla `givz_trprodvta`

--

ALTER TABLE
    `givz_trprodvta` MODIFY `tprodvta_id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 6;

--

-- AUTO_INCREMENT de la tabla `givz_tusuario`

--

ALTER TABLE
    `givz_tusuario` MODIFY `tusuario_id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 48;

--

-- AUTO_INCREMENT de la tabla `givz_tventa`

--

ALTER TABLE
    `givz_tventa` MODIFY `tventa_id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 6;

--

-- Restricciones para tablas volcadas

--

--

-- Filtros para la tabla `givz_tproducto`

--

ALTER TABLE `givz_tproducto`
ADD
    CONSTRAINT `givz_tproducto_ibfk_1` FOREIGN KEY (`tusuario_id`) REFERENCES `givz_tusuario` (`tusuario_id`),
ADD
    CONSTRAINT `givz_tproducto_ibfk_2` FOREIGN KEY (`tcategoria_id`) REFERENCES `givz_tcategoria` (`tcategoria_id`);

--

-- Filtros para la tabla `givz_trprodvta`

--

ALTER TABLE `givz_trprodvta`
ADD
    CONSTRAINT `givz_trprodvta_ibfk_1` FOREIGN KEY (`tproducto_id`) REFERENCES `givz_tproducto` (`tproducto_id`),
ADD
    CONSTRAINT `givz_trprodvta_ibfk_2` FOREIGN KEY (`tventa_id`) REFERENCES `givz_tventa` (`tventa_id`);

--

-- Filtros para la tabla `givz_tventa`

--

ALTER TABLE `givz_tventa`
ADD
    CONSTRAINT `givz_tventa_ibfk_1` FOREIGN KEY (`tusuario_id`) REFERENCES `givz_tusuario` (`tusuario_id`),
ADD
    CONSTRAINT `givz_tventa_ibfk_2` FOREIGN KEY (`tcliente_id`) REFERENCES `givz_tcliente` (`tcliente_id`);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */

;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */

;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */

;