-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2017 a las 00:12:30
-- Versión del servidor: 10.1.21-MariaDB
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `viajesdygi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacora`
--

CREATE TABLE `bitacora` (
  `id` int(11) NOT NULL,
  `idViaje` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `mensaje` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bitacora`
--

INSERT INTO `bitacora` (`id`, `idViaje`, `idUsuario`, `mensaje`, `created_at`, `updated_at`) VALUES
(1, 17, 1, 'Yassir Genero un nuevo contrato a la viilita navideña', '2017-11-24 04:50:06', '0000-00-00 00:00:00'),
(2, 17, 1, 'Yassir Pinzón Flores recibió un abono para Maruata Valle encantado', '2017-11-24 11:15:04', '2017-11-24 11:15:04'),
(3, 25, 1, 'Yassir Pinzón Flores agregó un nuevo contrato a La villa navideña', '2017-11-24 11:17:12', '2017-11-24 11:17:12'),
(4, 25, 1, 'Yassir Pinzón Flores recibió un abono para La villa navideña', '2017-11-24 11:29:04', '2017-11-24 11:29:04'),
(5, 25, 1, 'Yassir Pinzón Flores modificó el viaje a La villa navideña', '2017-11-24 12:02:47', '2017-11-24 12:02:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boletos`
--

CREATE TABLE `boletos` (
  `id` int(11) NOT NULL,
  `idViaje` int(11) NOT NULL,
  `tipoBoleto` varchar(200) NOT NULL,
  `Costo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `boletos`
--

INSERT INTO `boletos` (`id`, `idViaje`, `tipoBoleto`, `Costo`) VALUES
(9, 18, 'General', 500),
(10, 18, 'menores a 5 a;os', 0),
(40, 20, 'General', 380),
(41, 20, 'niño', 200),
(42, 21, 'General', 380),
(43, 21, 'niño', 200),
(44, 24, 'General', 152),
(45, 22, 'General', 500),
(46, 17, 'nueva', 250),
(47, 17, 'paseo', 350),
(48, 17, 'normal', 360),
(49, 17, 'uno mas', 1356),
(50, 25, 'General', 650),
(51, 25, 'Niños menores a 5 años', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `telefono` varchar(50) DEFAULT 'S/N',
  `celular` varchar(50) NOT NULL DEFAULT 'S/N',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `direccion` varchar(150) NOT NULL DEFAULT 'S/D',
  `email` varchar(100) NOT NULL DEFAULT 'S/E',
  `ultimoViaje` varchar(200) NOT NULL DEFAULT 'Sin Viajes.' COMMENT 'Nombre del ultimo viaje al que fué',
  `idUsuario` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1' COMMENT '0 casual, 1 constante, 3 poco interes, 9 eliminado'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `telefono`, `celular`, `created_at`, `updated_at`, `direccion`, `email`, `ultimoViaje`, `idUsuario`, `status`) VALUES
(1, 'Yassir Pinzón Flores', '4271240185', '4271240184', '2017-11-05 01:21:08', '0000-00-00 00:00:00', 'Andador San luis potosí #17 colonia mexico', 'y.pinzonf@gmail.com', 'Sin Viajes.', 1, 1),
(2, 'Rosa Giovana Gonzalez Arredondo', '4271240184', '4272626226', '2017-11-06 04:18:50', '2017-11-06 04:18:50', 'corregidora #150 Esquina con abasolo San juan del rio Queretaro', 'ros.giovana@gmail.com', 'Sin Viajes.', 1, 1),
(3, 'Perrito Cantor Ladrido', NULL, '4421240184', '2017-11-11 05:04:08', '2017-11-11 05:04:08', 'la que sea', 'perri@234.xm', 'Sin Viajes.', 1, 1),
(4, 'Gatito Manchadito', 'S/N', '1240184', '2017-11-10 23:55:06', '2017-11-22 06:53:07', 'S/D', 'email@gato.net', 'Sin Viajes.', 1, 1),
(5, 'gatito pinzon', '1234566', '123456', '2017-11-14 13:07:41', '2017-11-14 13:07:41', '123osco cosita b', 'correo@cirreo.com', 'Sin Viajes.', 1, 1),
(6, 'andres cubo rukbic', '213452', '12345623', '2017-11-14 13:10:52', '2017-11-14 13:27:24', 'direccion asi bien tocha', 'cliente@hotmail.com', 'Sin Viajes.', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configuracion`
--

CREATE TABLE `configuracion` (
  `id` int(11) NOT NULL,
  `NombreEmpresa` varchar(100) NOT NULL,
  `Url` text NOT NULL,
  `CorreoContacto` text NOT NULL,
  `ColorTheme` varchar(100) NOT NULL,
  `HeaderTheme` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `configuracion`
--

INSERT INTO `configuracion` (`id`, `NombreEmpresa`, `Url`, `CorreoContacto`, `ColorTheme`, `HeaderTheme`) VALUES
(0, 'ViajesDygi', 'http://localhost/viajeslv', 'ros.giovana@gmail.com', 'themes/spring.css', '1');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `lista_viajes_realizados`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `lista_viajes_realizados` (
`id` int(11)
,`destino` varchar(250)
,`horaSalida` time
,`fechaSalida` date
,`horaRegreso` time
,`fechaRegreso` date
,`asientosDisponibles` int(11)
,`descripcion` text
,`status` int(11)
,`created_at` timestamp
,`updated_at` timestamp
,`idUsuario` int(11)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idVenta` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `comentario` varchar(500) DEFAULT NULL,
  `restan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id`, `idUsuario`, `idVenta`, `cantidad`, `created_at`, `updated_at`, `comentario`, `restan`) VALUES
(1, 1, 10, 500, '2017-11-15 13:02:25', '2017-11-15 13:02:25', 'Nota de verificacion', 0),
(2, 1, 11, 500, '2017-11-16 00:48:01', '2017-11-16 00:48:01', NULL, 0),
(3, 1, 12, 50, '2017-11-16 03:06:29', '2017-11-16 03:06:29', NULL, 450),
(6, 1, 12, 100, '2017-11-21 10:54:33', '2017-11-21 10:54:33', NULL, 350),
(7, 1, 12, 100, '2017-11-21 10:54:40', '2017-11-21 10:54:40', NULL, 250),
(8, 1, 4, 500, '2017-11-21 11:20:03', '2017-11-21 11:20:03', 'Todo', 3810),
(9, 1, 4, 300, '2017-11-21 11:20:20', '2017-11-21 11:20:20', 'otro pago', 3510),
(10, 1, 9, 800, '2017-11-21 11:22:03', '2017-11-21 11:22:03', 'pago', 600),
(11, 1, 9, 300, '2017-11-21 11:22:55', '2017-11-21 11:22:55', NULL, 300),
(12, 1, 4, 2000, '2017-11-21 11:31:52', '2017-11-21 11:31:52', 'Dejo el segundo abono', 1510),
(13, 1, 12, 150, '2017-11-21 11:33:36', '2017-11-21 11:33:36', NULL, 100),
(14, 1, 4, 1510, '2017-11-21 11:37:56', '2017-11-21 11:37:56', 'liquidado', 0),
(15, 1, 5, 500, '2017-11-21 12:52:30', '2017-11-21 12:52:30', NULL, 1260),
(16, 1, 8, 350, '2017-11-21 13:06:58', '2017-11-21 13:06:58', NULL, 597),
(17, 1, 13, 200, '2017-11-22 00:12:14', '2017-11-22 00:12:14', 'Pidio descuento de 10% por el detalle asignado en el anterior viaje', 970),
(18, 1, 5, 500, '2017-11-22 00:28:31', '2017-11-22 00:28:31', 'El primo vino a dejar el dinero.', 760),
(19, 1, 14, 250, '2017-11-22 06:54:54', '2017-11-22 06:54:54', NULL, 3000),
(20, 1, 8, 600, '2017-11-22 10:50:26', '2017-11-22 10:50:26', NULL, -3),
(21, 1, 15, 5000, '2017-11-22 13:00:05', '2017-11-22 13:00:05', NULL, 15000),
(22, 1, 16, 50, '2017-11-22 13:02:50', '2017-11-22 13:02:50', NULL, 2450),
(23, 1, 5, 500, '2017-11-24 11:12:50', '2017-11-24 11:12:50', 'un pago mas', 260),
(24, 1, 5, 100, '2017-11-24 11:14:40', '2017-11-24 11:14:40', 'piquito', 160),
(25, 1, 5, 100, '2017-11-24 11:15:04', '2017-11-24 11:15:04', 'piquito', 60),
(26, 1, 17, 500, '2017-11-24 11:17:12', '2017-11-24 11:17:12', NULL, 1200),
(27, 1, 17, 300, '2017-11-24 11:29:04', '2017-11-24 11:29:04', 'Sin anotaciones de momento', 900);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegios`
--

CREATE TABLE `privilegios` (
  `id` int(11) NOT NULL,
  `padre` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `privilegios`
--

INSERT INTO `privilegios` (`id`, `padre`, `nombre`) VALUES
(0, 0, 'PANEL DE CONTROL (Uso unicamente Admin)'),
(1, 0, 'USUARIO'),
(2, 1, 'Crear Usuarios'),
(3, 1, 'Modificar Usuarios'),
(4, 1, 'Eliminar Usuarios del sistema'),
(5, 1, 'Ver lista de usuarios'),
(6, 1, 'Suspender a usuario'),
(7, 1, 'Asignar Privilegios a Usuarios (Importante!)'),
(8, 0, 'CLIENTES'),
(9, 8, 'Ver Clientes de la BD'),
(10, 8, 'Agregar Clientes'),
(11, 8, 'Modificar Clientes'),
(12, 8, 'Eliminar Clientes'),
(13, 0, 'VIAJES'),
(14, 13, 'Ver lista viajes'),
(15, 13, 'Agregar nuevos Viajes'),
(16, 13, 'Modificar Viajes'),
(17, 13, 'Modificar Status del Viaje'),
(18, 13, 'Eliminar Viajes'),
(19, 0, 'VENTAS'),
(20, 19, 'Ver todos los contratos'),
(21, 19, 'Generar nuevo Contrato'),
(22, 19, 'Modificar Contrato'),
(23, 19, 'Cancelar Contrato');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rel_usuario_clientes`
--

CREATE TABLE `rel_usuario_clientes` (
  `id` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp(1) NOT NULL DEFAULT '0000-00-00 00:00:00.0',
  `bajalogica` int(11) NOT NULL DEFAULT '1' COMMENT '0 baja, 1 alta'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rel_usuario_clientes`
--

INSERT INTO `rel_usuario_clientes` (`id`, `idCliente`, `idUsuario`, `created_at`, `updated_at`, `bajalogica`) VALUES
(1, 1, 1, '2017-11-05 01:23:59', '0000-00-00 00:00:00.0', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rel_usuario_privilegio`
--

CREATE TABLE `rel_usuario_privilegio` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idPrivilegio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rel_usuario_privilegio`
--

INSERT INTO `rel_usuario_privilegio` (`id`, `idUsuario`, `idPrivilegio`) VALUES
(21, 6, 2),
(22, 6, 3),
(23, 6, 4),
(109, 2, 2),
(110, 2, 3),
(111, 2, 4),
(112, 2, 5),
(113, 2, 6),
(114, 2, 7),
(191, 1, 0),
(192, 1, 2),
(193, 1, 3),
(194, 1, 4),
(195, 1, 5),
(196, 1, 6),
(197, 1, 7),
(198, 1, 9),
(199, 1, 10),
(200, 1, 11),
(201, 1, 12),
(202, 1, 14),
(203, 1, 15),
(204, 1, 16),
(205, 1, 17),
(206, 1, 18),
(207, 1, 20),
(208, 1, 21),
(209, 1, 22),
(210, 1, 23);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `ultimos_viajes`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `ultimos_viajes` (
`id` int(11)
,`destino` varchar(250)
,`horaSalida` time
,`fechaSalida` date
,`horaRegreso` time
,`fechaRegreso` date
,`asientosDisponibles` int(11)
,`descripcion` text
,`status` int(11)
,`created_at` timestamp
,`updated_at` timestamp
,`idUsuario` int(11)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `pass` text NOT NULL,
  `bajalogica` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1 Alta actualmente, 0 dado de baja',
  `Updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nombre` varchar(100) NOT NULL DEFAULT 'Sin Nombre',
  `telefono` varchar(25) NOT NULL DEFAULT 'S/N',
  `direccion` varchar(200) NOT NULL DEFAULT 'Sin dirección asignada'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `correo`, `usuario`, `pass`, `bajalogica`, `Updated_at`, `Created_at`, `nombre`, `telefono`, `direccion`) VALUES
(1, 'y.pinzonf@gmail.com', 'yassir', 'eyJpdiI6ImxNOXZtOUNwd01qSFJ1amQ4XC8wUlhnPT0iLCJ2YWx1ZSI6IjNHckRhcEN1NTdLZGRPNUpwNlFkT0E9PSIsIm1hYyI6ImYyM2JkNWZiNWIyNjZkOWNiOTYyMWNkMjY1MjcxZWJlOGY2M2I3Y2ZlMWIwMDUwNGNiNTczYzcxZDI3Mjk4MmMifQ==', 1, '2017-11-05 12:06:56', '2017-10-24 04:32:43', 'Yassir Pinzón Flores', '4271240184', 'And. San luis potosí #17 Colonia mexico, san juan del rio queretaro'),
(2, 'y.pinzonf@gmail.com22', '12345', 'eyJpdiI6IjNhNFBBa25kUTgyYm1yZnZ0UFwvR21BPT0iLCJ2YWx1ZSI6Ijh0RlJVcEJ5SDJxdVg0SlpLQUYxNmc9PSIsIm1hYyI6ImJkYjc0OWVhZjA1ZTYxMDdkNjA3ZTg0NTA4MmJjYmM1YWM0YjRmMTU3MjQyZjNlOWU1NTlkZWVkN2UyMzM5MGYifQ==', 0, '2017-11-05 08:56:33', '2017-10-30 10:50:00', 'Sin nombre asignado', 'sin num', ''),
(4, 'y.pinzonf@gmail.com2', '159159', 'eyJpdiI6IlwvWmVmV0YzMm5LZFJvV2ZXb1Nxb0RRPT0iLCJ2YWx1ZSI6Imp5U0NRemlFZ2UwWGllTHFBTzZkXC9RPT0iLCJtYWMiOiI3Mjk5YWI5YjU5NGFjMTUzMzE1OGNjNTZkMjUzOGI1MWIwMzgxMWRkYjhmNDM1MjdkYmYzNzllOWQwNDVkYThkIn0=', 3, '2017-10-31 02:49:26', '2017-10-30 10:52:57', 'Sin nombre asignado', 'sin num', ''),
(5, 'y.pinzonf@gmail.com23', '1591598', 'eyJpdiI6IlBzVHJTMExBWjdwNVFSV1U3Q3llUGc9PSIsInZhbHVlIjoiYlBNUkY5clI5WFVET2dlZzAxNDh5UT09IiwibWFjIjoiZWFlZjY2ZTRiODEyNjBkN2M2Y2JjNDFkNmU3MTQ2MThjY2UxNjE2NThmNWIxMmNkYzhmOGIwNTFkM2ZjNDAyMyJ9', 3, '2017-10-31 02:52:48', '2017-10-30 10:56:08', 'Sin nombre asignado', 'sin num', ''),
(6, 'ros.giovana@gmail.com', 'rosagiovana', 'eyJpdiI6Imx2em54cWhrTEhkNk04WHd3R3Nxc1E9PSIsInZhbHVlIjoiY1pTakJEOGhsdUtkWGNQa1gxZEpTZz09IiwibWFjIjoiY2FhYzBkMTRlMzQ3ZTlkYTNjNjNjMTI2ZTFjOTc2MDliZTAzOWY2NTBiYTMwMjc4Mzc3NDYzMWU0ZWY5NGQ4ZiJ9', 1, '2017-11-01 05:03:27', '2017-10-31 06:06:11', 'Sin nombre asignado', 'sin num', ''),
(7, 'y.pinzonf@gmail.com3', 'yass', 'eyJpdiI6IllpTzk1YU1NV0dORmxsZWtVbVJWR3c9PSIsInZhbHVlIjoiRGNiRmJoVzZISUtBcVhVT0JrU05Hdz09IiwibWFjIjoiNGY5NmQ0YmIyNTlhOTA1MzA0NGQ5Mjg5MjI2NWFlZDljZmU5NWExZDEzNDZjYzBjMmY4YmI4MmUwNzk0NWQxMyJ9', 1, '2017-11-01 11:21:03', '2017-10-31 06:29:07', 'Sin nombre asignado', 'sin num', ''),
(8, 'roar@roar.net', 'perrito', 'eyJpdiI6IllKVk1mWG1Tb08zZ3VZVUl5bnBGNWc9PSIsInZhbHVlIjoiY0pUbXppWFpVS241QVdiMmpZOTd6UT09IiwibWFjIjoiZGY1M2VhZmVlZWI5ODliOGI2NDRlMmNlYzQ2YjMzZWU3N2Y1NDk4ODI3M2Q1ZmFmYzgxMGFiYjAzZTNmNTUwNCJ9', 1, '2017-11-05 12:51:22', '2017-11-05 12:51:22', 'perrito', '455455455', 'guaw perro perro'),
(9, 'ros.giovana@gmail.com2', 'rosita', 'eyJpdiI6InF3b1laS0swZjBsVzB1akNtSXp2MHc9PSIsInZhbHVlIjoibDdpdHk5aEJ3S3pmVDg4cVdka0doQT09IiwibWFjIjoiYTIxN2RmNDNkZDA5YzBmODhkM2UwZWEyYmI1YTkyOTIzOTI3MWU2NGU2ZjM0OWNlZmRjYjRlNjc3ODhiOTQ0MCJ9', 1, '2017-11-24 00:36:15', '2017-11-24 00:35:32', 'rosaGonzalez', '1424242', 'corregidora #150 Esquina con abasolo San juan del rio Queretaro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idViaje` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `numeroPersonas` int(11) NOT NULL,
  `subTotal` int(11) NOT NULL,
  `descuento` int(11) NOT NULL,
  `totalPagar` int(11) NOT NULL,
  `restanActualmente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `idUsuario`, `idCliente`, `idViaje`, `status`, `created_at`, `updated_at`, `numeroPersonas`, `subTotal`, `descuento`, `totalPagar`, `restanActualmente`) VALUES
(1, 1, 1, 17, 2, '2017-11-15 09:33:49', '2017-11-21 11:28:52', 2, 1744, 0, 1744, 0),
(2, 1, 1, 17, 2, '2017-11-15 09:36:03', '2017-11-21 11:30:31', 3, 2616, 0, 2616, 0),
(3, 1, 1, 18, 2, '2017-11-15 09:56:17', '2017-11-21 11:31:18', 6, 3000, 0, 3000, 0),
(4, 1, 1, 17, 2, '2017-11-15 10:06:13', '2017-11-21 11:37:56', 5, 4360, 0, 4360, 0),
(5, 1, 2, 17, 1, '2017-11-15 12:16:37', '2017-11-24 11:15:04', 6, 1810, 0, 1810, 60),
(6, 1, 2, 17, 1, '2017-11-15 12:20:52', '2017-11-15 12:20:52', 8, 2410, 0, 2410, 2360),
(7, 1, 2, 17, 1, '2017-11-15 12:22:19', '2017-11-15 12:22:19', 7, 2160, 0, 2160, 2110),
(8, 1, 1, 18, 2, '2017-11-15 12:27:12', '2017-11-22 10:50:26', 2, 1000, 3, 997, -3),
(9, 1, 1, 17, 1, '2017-11-15 12:32:57', '2017-11-21 11:22:55', 5, 1450, 0, 1450, 300),
(10, 1, 5, 17, 1, '2017-11-15 13:02:24', '2017-11-15 13:02:24', 10, 3020, 0, 3020, 2520),
(11, 1, 1, 17, 1, '2017-11-16 00:48:01', '2017-11-16 00:48:01', 6, 1820, 0, 1820, 1320),
(12, 1, 1, 17, 1, '2017-11-16 03:06:29', '2017-11-21 11:33:36', 2, 500, 0, 500, 100),
(13, 1, 6, 25, 1, '2017-11-22 00:12:13', '2017-11-22 00:12:13', 3, 1300, 130, 1170, 970),
(14, 1, 4, 25, 1, '2017-11-22 06:54:54', '2017-11-22 06:54:54', 5, 3250, 0, 3250, 3000),
(15, 1, 1, 18, 1, '2017-11-22 13:00:05', '2017-11-22 13:00:05', 42, 21000, 1000, 20000, 15000),
(16, 1, 5, 18, 1, '2017-11-22 13:02:50', '2017-11-22 13:02:50', 5, 2500, 0, 2500, 2450),
(17, 1, 5, 25, 1, '2017-11-24 11:17:12', '2017-11-24 11:29:04', 4, 1950, 250, 1700, 900);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viajantes`
--

CREATE TABLE `viajantes` (
  `id` int(11) NOT NULL,
  `idViaje` int(11) NOT NULL COMMENT 'unicamente para conocer de forma facil la cantidad de personas que viajan',
  `idVenta` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `costoUnitario` int(11) NOT NULL,
  `costoTotal` int(11) NOT NULL,
  `IdBoleto` int(11) NOT NULL COMMENT 'La comparacion se hace segun el nombre en el momento del boleto.',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `viajantes`
--

INSERT INTO `viajantes` (`id`, `idViaje`, `idVenta`, `cantidad`, `costoUnitario`, `costoTotal`, `IdBoleto`, `created_at`, `updated_at`) VALUES
(1, 17, 7, 3, 250, 750, 46, '2017-11-15 12:22:19', '2017-11-15 12:22:19'),
(2, 17, 7, 3, 350, 1050, 47, '2017-11-15 12:22:19', '2017-11-15 12:22:19'),
(3, 17, 7, 1, 360, 360, 48, '2017-11-15 12:22:20', '2017-11-15 12:22:20'),
(4, 18, 8, 2, 500, 1000, 9, '2017-11-15 12:27:12', '2017-11-15 12:27:12'),
(5, 17, 9, 3, 250, 750, 46, '2017-11-15 12:32:57', '2017-11-15 12:32:57'),
(6, 17, 9, 2, 350, 700, 47, '2017-11-15 12:32:57', '2017-11-15 12:32:57'),
(7, 17, 10, 5, 250, 1250, 46, '2017-11-15 13:02:24', '2017-11-15 13:02:24'),
(8, 17, 10, 3, 350, 1050, 47, '2017-11-15 13:02:24', '2017-11-15 13:02:24'),
(9, 17, 10, 2, 360, 720, 48, '2017-11-15 13:02:25', '2017-11-15 13:02:25'),
(10, 17, 11, 3, 250, 750, 46, '2017-11-16 00:48:01', '2017-11-16 00:48:01'),
(11, 17, 11, 1, 350, 350, 47, '2017-11-16 00:48:01', '2017-11-16 00:48:01'),
(12, 17, 11, 2, 360, 720, 48, '2017-11-16 00:48:01', '2017-11-16 00:48:01'),
(13, 17, 12, 2, 250, 500, 46, '2017-11-16 03:06:29', '2017-11-16 03:06:29'),
(14, 25, 13, 2, 650, 1300, 50, '2017-11-22 00:12:14', '2017-11-22 00:12:14'),
(15, 25, 13, 1, 0, 0, 51, '2017-11-22 00:12:14', '2017-11-22 00:12:14'),
(16, 25, 14, 5, 650, 3250, 50, '2017-11-22 06:54:54', '2017-11-22 06:54:54'),
(17, 18, 15, 42, 500, 21000, 9, '2017-11-22 13:00:05', '2017-11-22 13:00:05'),
(18, 18, 16, 5, 500, 2500, 9, '2017-11-22 13:02:50', '2017-11-22 13:02:50'),
(19, 25, 17, 3, 650, 1950, 50, '2017-11-24 11:17:12', '2017-11-24 11:17:12'),
(20, 25, 17, 1, 0, 0, 51, '2017-11-24 11:17:12', '2017-11-24 11:17:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viajes`
--

CREATE TABLE `viajes` (
  `id` int(11) NOT NULL,
  `destino` varchar(250) NOT NULL,
  `horaSalida` time NOT NULL,
  `fechaSalida` date NOT NULL,
  `horaRegreso` time NOT NULL,
  `fechaRegreso` date NOT NULL,
  `asientosDisponibles` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `idUsuario` int(11) NOT NULL DEFAULT '99',
  `lugarSalida` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `viajes`
--

INSERT INTO `viajes` (`id`, `destino`, `horaSalida`, `fechaSalida`, `horaRegreso`, `fechaRegreso`, `asientosDisponibles`, `descripcion`, `status`, `created_at`, `updated_at`, `idUsuario`, `lugarSalida`) VALUES
(17, 'Maruata Valle encantado', '03:21:15', '2017-12-01', '03:21:15', '2017-12-01', 85, 'Salimos el dia tal, regresamos a las tal , todo va a estar bien2', 5, '2017-11-22 06:31:09', '2017-11-22 12:31:09', 1, NULL),
(18, 'Valle nevado 96', '01:37:30', '2017-11-16', '01:37:30', '2017-11-19', 55, 'lo que sea', 6, '2017-11-22 22:42:54', '2017-11-23 04:42:54', 1, NULL),
(19, 'Cervantino', '06:00:00', '2017-11-28', '23:04:00', '2017-11-28', 42, 'Lo que sea', 1, '2017-11-10 02:08:20', '2017-11-10 02:08:20', 1, NULL),
(22, 'Toluca', '14:13:15', '2017-11-08', '14:13:15', '2017-11-29', 50, '2134', 6, '2017-11-22 22:42:54', '2017-11-23 04:42:54', 1, NULL),
(23, 'otro', '14:13:15', '2017-11-30', '14:13:15', '2017-11-29', 50, '2134', 1, '2017-11-10 02:15:02', '2017-11-10 02:15:02', 1, NULL),
(24, 'no pos wau', '14:13:15', '2017-11-30', '14:13:15', '2017-11-29', 85, 'sadf', 1, '2017-11-09 20:16:42', '2017-11-10 02:16:42', 1, NULL),
(25, 'La villa navideña', '00:08:00', '2017-11-22', '10:05:30', '2017-11-22', 35, 'Sin informacion al respecto', 1, '2017-11-24 06:02:46', '2017-11-24 12:02:46', 1, 'Centro Historico San juan del rio');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `view_ventas_actuales`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `view_ventas_actuales` (
`id` int(11)
,`idUsuario` int(11)
,`idCliente` int(11)
,`idViaje` int(11)
,`status` int(1)
,`created_at` timestamp
,`numeroPersonas` int(11)
,`subTotal` int(11)
,`descuento` int(11)
,`totalPagar` int(11)
,`restanActualmente` int(11)
,`destino` varchar(250)
);

-- --------------------------------------------------------

--
-- Estructura para la vista `lista_viajes_realizados`
--
DROP TABLE IF EXISTS `lista_viajes_realizados`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `lista_viajes_realizados`  AS  select `viajes`.`id` AS `id`,`viajes`.`destino` AS `destino`,`viajes`.`horaSalida` AS `horaSalida`,`viajes`.`fechaSalida` AS `fechaSalida`,`viajes`.`horaRegreso` AS `horaRegreso`,`viajes`.`fechaRegreso` AS `fechaRegreso`,`viajes`.`asientosDisponibles` AS `asientosDisponibles`,`viajes`.`descripcion` AS `descripcion`,`viajes`.`status` AS `status`,`viajes`.`created_at` AS `created_at`,`viajes`.`updated_at` AS `updated_at`,`viajes`.`idUsuario` AS `idUsuario` from `viajes` where ((`viajes`.`fechaSalida` < (curdate() - interval 1 day)) and (`viajes`.`status` <> 0) and (`viajes`.`status` <> 6) and (`viajes`.`status` <> 4)) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `ultimos_viajes`
--
DROP TABLE IF EXISTS `ultimos_viajes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ultimos_viajes`  AS  select `viajes`.`id` AS `id`,`viajes`.`destino` AS `destino`,`viajes`.`horaSalida` AS `horaSalida`,`viajes`.`fechaSalida` AS `fechaSalida`,`viajes`.`horaRegreso` AS `horaRegreso`,`viajes`.`fechaRegreso` AS `fechaRegreso`,`viajes`.`asientosDisponibles` AS `asientosDisponibles`,`viajes`.`descripcion` AS `descripcion`,`viajes`.`status` AS `status`,`viajes`.`created_at` AS `created_at`,`viajes`.`updated_at` AS `updated_at`,`viajes`.`idUsuario` AS `idUsuario` from `viajes` where ((`viajes`.`status` <> 0) and (`viajes`.`fechaSalida` > (curdate() - interval 5 day))) order by `viajes`.`fechaSalida` desc ;

-- --------------------------------------------------------

--
-- Estructura para la vista `view_ventas_actuales`
--
DROP TABLE IF EXISTS `view_ventas_actuales`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_ventas_actuales`  AS  select `ventas`.`id` AS `id`,`ventas`.`idUsuario` AS `idUsuario`,`ventas`.`idCliente` AS `idCliente`,`ventas`.`idViaje` AS `idViaje`,`ventas`.`status` AS `status`,`ventas`.`created_at` AS `created_at`,`ventas`.`numeroPersonas` AS `numeroPersonas`,`ventas`.`subTotal` AS `subTotal`,`ventas`.`descuento` AS `descuento`,`ventas`.`totalPagar` AS `totalPagar`,`ventas`.`restanActualmente` AS `restanActualmente`,`viajes`.`destino` AS `destino` from (`viajes` join `ventas`) where ((`viajes`.`fechaSalida` > (curdate() - interval 7 day)) and (`viajes`.`id` = `ventas`.`idViaje`)) order by `viajes`.`fechaSalida` ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD PRIMARY KEY (`id`),
  ADD KEY `relViajeBitacora` (`idViaje`),
  ADD KEY `relUsuarioBitacora` (`idUsuario`);

--
-- Indices de la tabla `boletos`
--
ALTER TABLE `boletos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agenteAsignado` (`idUsuario`);

--
-- Indices de la tabla `configuracion`
--
ALTER TABLE `configuracion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `relVenta` (`idVenta`),
  ADD KEY `RelpagoUsuario` (`idUsuario`);

--
-- Indices de la tabla `privilegios`
--
ALTER TABLE `privilegios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `DefinicionPadresExistentes` (`padre`);

--
-- Indices de la tabla `rel_usuario_clientes`
--
ALTER TABLE `rel_usuario_clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fcliente` (`idCliente`),
  ADD KEY `fusuario` (`idUsuario`);

--
-- Indices de la tabla `rel_usuario_privilegio`
--
ALTER TABLE `rel_usuario_privilegio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clvForaneausuario` (`idUsuario`),
  ADD KEY `clvForaneaprivilegio` (`idPrivilegio`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `RelUsuario` (`idUsuario`),
  ADD KEY `RelCliente` (`idCliente`),
  ADD KEY `RelViaje` (`idViaje`);

--
-- Indices de la tabla `viajantes`
--
ALTER TABLE `viajantes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `relIdViaje` (`idViaje`),
  ADD KEY `RelVentas` (`idVenta`),
  ADD KEY `RelBoletos` (`IdBoleto`);

--
-- Indices de la tabla `viajes`
--
ALTER TABLE `viajes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `relUsuarioViaje` (`idUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bitacora`
--
ALTER TABLE `bitacora`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `boletos`
--
ALTER TABLE `boletos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `privilegios`
--
ALTER TABLE `privilegios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT de la tabla `rel_usuario_clientes`
--
ALTER TABLE `rel_usuario_clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `rel_usuario_privilegio`
--
ALTER TABLE `rel_usuario_privilegio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `viajantes`
--
ALTER TABLE `viajantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `viajes`
--
ALTER TABLE `viajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bitacora`
--
ALTER TABLE `bitacora`
  ADD CONSTRAINT `relUsuarioBitacora` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `relViajeBitacora` FOREIGN KEY (`idViaje`) REFERENCES `viajes` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `agenteAsignado` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `RelpagoUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `relVenta` FOREIGN KEY (`idVenta`) REFERENCES `ventas` (`id`);

--
-- Filtros para la tabla `privilegios`
--
ALTER TABLE `privilegios`
  ADD CONSTRAINT `DefinicionPadresExistentes` FOREIGN KEY (`padre`) REFERENCES `privilegios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rel_usuario_clientes`
--
ALTER TABLE `rel_usuario_clientes`
  ADD CONSTRAINT `fcliente` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fusuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `rel_usuario_privilegio`
--
ALTER TABLE `rel_usuario_privilegio`
  ADD CONSTRAINT `clvForaneaprivilegio` FOREIGN KEY (`idPrivilegio`) REFERENCES `privilegios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clvForaneausuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `RelCliente` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `RelUsuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `RelViaje` FOREIGN KEY (`idViaje`) REFERENCES `viajes` (`id`);

--
-- Filtros para la tabla `viajantes`
--
ALTER TABLE `viajantes`
  ADD CONSTRAINT `RelVentas` FOREIGN KEY (`idVenta`) REFERENCES `ventas` (`id`),
  ADD CONSTRAINT `relIdViaje` FOREIGN KEY (`idViaje`) REFERENCES `viajes` (`id`);

--
-- Filtros para la tabla `viajes`
--
ALTER TABLE `viajes`
  ADD CONSTRAINT `relUsuarioViaje` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
