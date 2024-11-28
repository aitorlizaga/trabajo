-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2024 a las 20:36:03
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
-- Base de datos: `aitor_tienda`
--
-- Base de datos: `aitor_tienda`
--
CREATE DATABASE IF NOT EXISTS `aitor_tienda` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `aitor_tienda`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `producto` varchar(256) NOT NULL,
  `usuario` varchar(256) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id`, `producto`, `usuario`, `usuario_id`, `producto_id`, `cantidad`, `total`) VALUES
(97, 'Applaws 100% Natural Comida Húmeda', 'admin', 10, 2, 2, 24.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `producto` varchar(255) NOT NULL,
  `canitdad_carrito` int(11) NOT NULL,
  `precio_total` decimal(10,2) NOT NULL,
  `fecha_compra` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id`, `id_cliente`, `id_producto`, `producto`, `canitdad_carrito`, `precio_total`, `fecha_compra`) VALUES
(1, 8, 0, 'Applaws Comida Seca Completa Natural de Pollo con Salmón', 2, 148.00, '2024-11-27 19:13:01'),
(2, 8, 2, 'Applaws 100% Natural Comida Húmeda', 5, 300.00, '2024-11-27 19:13:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `precio` int(11) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `imagen`, `descripcion`) VALUES
(0, 'Applaws Comida Seca Completa Natural de Pollo con Salmón', 37, 'https://m.media-amazon.com/images/I/7149a+DSZqL._AC_SX425_.jpg', 'Para Gatos Adultos - Bolsa Resellable de 7.5 kg, 1 unidad'),
(2, 'Applaws 100% Natural Comida Húmeda', 12, 'https://m.media-amazon.com/images/I/713IOnPkG3L._AC_SX425_PIbundle-4,TopRight,0,0_SH20_.jpg', 'Para Gatos Adultos Selección de Pollo en Caldo - Paquete de 12 latas de 70g'),
(3, 'Cat s Best - Arena para gatos ', 16, 'https://m.media-amazon.com/images/I/61Xz9KZKdXL._AC_SY550_.jpg', '20 l / 8,6 kg - el embalaje puede diferir');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `contraseña` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `contraseña`) VALUES
(8, 'Aitor', '$2y$10$9lp3qTJw1CCZpM/X20h4HuP.WB2cj4vU6Qy5byaCtVc8yjuV7kNX6'),
(9, '123qwe', '$2y$10$Q0a5DRPEinCi2DTdWv5Qt.73phzJOYpBmADBN8FG0TYxYo.kpVf7a'),
(10, 'admin', '$2y$10$rV22LiVVEJ9T9FLXiXvIVu1ODYWnEFXd.lRFYqvPZ5zUPLOBGGFGa'),
(11, 'rocio', '$2y$10$T7qOFepTmQBearAg5VYXcuZP2jRjL9qk6hzeLOb9zzwGY/Xrw4.km'),
(12, 'google', '$2y$10$0LtAsgcipDPku3OAnUM6Ee3TEGlZpXIvHzGRQEZbfWngHDJy6RbE2'),
(13, 'pito', '$2y$10$9dbfi.EepipLTHA9GLC0Ku1ZEGWBnOGoUSP4ydIqxYMAUMXJoTCp6');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cliente` (`id_cliente`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`);

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
