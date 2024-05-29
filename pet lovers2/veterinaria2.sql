-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-04-2024 a las 22:20:22
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `veterinaria2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `idCita` int(11) NOT NULL,
  `Fecha_cita` datetime DEFAULT NULL,
  `Mascota_cita` int(11) NOT NULL,
  `Tipo_cita` varchar(45) DEFAULT NULL,
  `Desc_cita` longtext NOT NULL,
  `Estado_cita` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascotas`
--

CREATE TABLE `mascotas` (
  `idMascota` int(11) NOT NULL,
  `Nom_mascota` varchar(45) DEFAULT NULL,
  `Raza_mascota` varchar(45) DEFAULT NULL,
  `Edad_mascota` int(11) DEFAULT NULL,
  `Rh_mascota` varchar(45) DEFAULT NULL,
  `Dueño_idDueño` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `Id_pedidos` int(11) NOT NULL,
  `Id_usuario` int(11) DEFAULT NULL,
  `descripcion` longtext DEFAULT NULL,
  `valor_total` int(11) DEFAULT NULL,
  `detalles` varchar(100) NOT NULL,
  `estado` int(1) NOT NULL,
  `direccion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProducto` int(11) NOT NULL,
  `Img_producto` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Nom_producto` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Desc_producto` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `Valor_producto` float(10,2) DEFAULT NULL,
  `Estado_producto` int(11) DEFAULT NULL,
  `Cant_producto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `Img_producto`, `Nom_producto`, `Desc_producto`, `Valor_producto`, `Estado_producto`, `Cant_producto`) VALUES
(1, 'pelota.jpg', 'Juguete', 'Juguete es el juguete perfecto para mantener a su perro de la atención durante un largo tiempo de diversión', 2000.00, 1, 3),
(2, 'pedigree.webp', 'Pedigree Adultos 1kg', 'Pedigree - Alimento Para Perro Adulto es un concentrado con fibras naturales para una digestión óptima y heces firmes fáciles de recoger.', 15000.00, 1, 86),
(6, 'casagatos.jpg', 'Casa de gatos', 'Árbol para gatos con diseño de torre de 61 pulgadas para descansar', 100000.00, 1, 3),
(10, 'drontal.webp', 'Drontal Ps Perros Grandes', 'Antipulgas para perros, podrás proteger a tu mascota de Nematodos y la acumulación de protozoos y céstodos', 50000.00, 0, 3),
(11, 'furrinator.webp', 'Deslanador Perro Mediano Pelo Corto', 'Cepillo para perros con borde de eliminación del pelo de acero inoxidable atraviesa la capa externa para eliminar el pelo suelto del manto inferior de forma fácil y segura, sin dañar el manto superior ni cortar la piel', 10000.00, 0, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(11) NOT NULL,
  `Tipo_rol` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `Tipo_rol`) VALUES
(1, 'cliente'),
(2, 'administrador'),
(3, 'veterinario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `Nom_usuario` varchar(45) DEFAULT NULL,
  `Ape_usuario` varchar(30) NOT NULL,
  `Email_usuario` varchar(45) DEFAULT NULL,
  `Contraseña` varchar(45) DEFAULT NULL,
  `Tel_usuario` varchar(45) DEFAULT NULL,
  `Rol_idRol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `Nom_usuario`, `Ape_usuario`, `Email_usuario`, `Contraseña`, `Tel_usuario`, `Rol_idRol`) VALUES
(6, 'Miguel', 'Rodriguez', 'mikycdlm@gmail.com', '96e429111c9eddc38392127c718c740d', '3505225218', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`idCita`),
  ADD KEY `Mascota_cita` (`Mascota_cita`);

--
-- Indices de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD PRIMARY KEY (`idMascota`),
  ADD KEY `Dueño_idDueño` (`Dueño_idDueño`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`Id_pedidos`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `fk_Usuario_Rol` (`Rol_idRol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `idCita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  MODIFY `idMascota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `Id_pedidos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `citas_ibfk_3` FOREIGN KEY (`Mascota_cita`) REFERENCES `mascotas` (`idMascota`);

--
-- Filtros para la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD CONSTRAINT `mascotas_ibfk_1` FOREIGN KEY (`Dueño_idDueño`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `fk_Usuario_Rol` FOREIGN KEY (`Rol_idRol`) REFERENCES `rol` (`idRol`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
