-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-02-2018 a las 00:41:57
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_volley`
--

drop DATABASE bd_volley;
CREATE DATABASE IF NOT EXISTS bd_volley;
USE bd_volley;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `Id_Categoria` int(11) NOT NULL,
   `Imagen_Categoria` varchar(99) not null, 
  `Nombre_Categoria` varchar(99) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`Id_Categoria`, `Imagen_Categoria`, `Nombre_Categoria`) VALUES
(1,'fontaneros.jpg', 'Fontaneros'),
(2,'electricidad.jpg', 'Electricidad'),
(3,'jardineria.jpg', 'Jardineria'),
(4,'pintor.jpg','Pintor'),
(5,'impresoras.jpg', 'Impresoras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `Id_Producto` int(11) NOT NULL,                                  
  `Nombre_Producto` varchar(99) COLLATE utf8_spanish_ci NOT NULL,    
  `Precio_Producto` int(11) NOT NULL,								
  `Descripcion_Producto` varchar(299) COLLATE utf8_spanish_ci NOT NULL,	
  `diminutivo_producto` varchar(99) COLLATE utf8_spanish_ci NOT NULL,
  `stock_producto` int(11) NOT NULL,
  `imagen_producto` varchar(99) COLLATE utf8_spanish_ci NOT NULL,
  `Id_Categoria` int(11) NOT NULL									
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`Id_Producto`, `Nombre_Producto`, `Precio_Producto`, `Descripcion_Producto`, `diminutivo_producto`, `stock_producto`, `imagen_producto`, `Id_Categoria`) VALUES
(1, 'MORTADELA', 4, 'GRAN VARIEDAD DE EMBUTIDOS', 'mortadela', 20, 'mortadela.jpg', 4),
(2, 'HOT DOG DE POLLO', 4, 'GRAN VARIEDAD DE EMBUTIDOS', 'hotdogpollo', 20, 'hotdogpollo.jpg', 4),
(3, 'PAN CIABATTA', 1, 'NUESTRA PANISTERIA SURTIDA Y DELICIOSA', 'ciabatta', 20, 'ciabatta.jpg', 5),
(4, 'PAN INTEGRAL', 1, 'NUESTRA PANISTERIA SURTIDA Y DELICIOSA', 'panintegral', 20, 'panintegral.jpg', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Id_Usuario` int(11) NOT NULL primary key auto_increment,
  `Usuario` varchar(99) COLLATE utf8_spanish_ci NOT NULL,
  `Password` varchar(99) COLLATE utf8_spanish_ci NOT NULL,
  `Activo` int(11) NOT NULL
) ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Id_Usuario`, `Usuario`, `Password`, `Activo`) VALUES
(null, 'PSARAVIA', '123', 1),
(null, 'CGOMEZ', '123', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `id_venta` int(11) NOT NULL,
  `codigo_venta` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `importe_total` decimal(7,2) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`Id_Categoria`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`Id_Producto`),
  ADD KEY `Id_Categoria` (`Id_Categoria`);

--
-- Indices de la tabla `usuario`
--


--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_producto` (`id_producto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `Id_Categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `Id_Producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `Id_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`Id_Categoria`) REFERENCES `categoria` (`Id_Categoria`);

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`Id_Usuario`),
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`Id_Producto`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
