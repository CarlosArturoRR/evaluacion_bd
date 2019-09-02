-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-09-2019 a las 20:26:14
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `evaluacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `fecha_final` date DEFAULT NULL,
  `hora_final` time DEFAULT NULL,
  `dia_completo` tinyint(1) DEFAULT NULL,
  `fk_id` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `titulo`, `fecha_inicio`, `hora_inicio`, `fecha_final`, `hora_final`, `dia_completo`, `fk_id`) VALUES
(1, 'cine', '2019-11-01', '11:00:00', '2019-11-01', '14:00:00', 0, 'usarios1@hotmail.com'),
(2, 'gimnasio', '2019-11-02', '11:00:00', '2019-11-01', '14:00:00', 0, 'usarios1@hotmail.com'),
(3, 'auditoria', '2019-11-02', '15:00:00', '2019-11-01', '16:00:00', 1, 'usarios2@hotmail.com'),
(4, 'gimnasio', '2019-11-05', '11:00:00', '2019-11-05', '14:00:00', 0, 'usarios2@hotmail.com'),
(5, 'gimnasio', '2019-11-06', '11:00:00', '2019-11-06', '14:00:00', 0, 'usarios3@hotmail.com'),
(6, 'football', '2019-11-05', '09:00:00', '2019-11-05', '10:00:00', 1, 'usarios3@hotmail.com'),
(8, '12312234', '2019-11-16', '00:00:00', '0000-00-00', '00:00:00', 0, 'usarios1@hotmail.com'),
(9, 'a', '2019-08-05', '07:00:00', '2019-08-05', '07:00:00', 0, 'usarios1@hotmail.com'),
(10, 'dddf', '2019-08-05', '07:00:00', '2019-08-05', '07:00:00', 0, 'usarios1@hotmail.com'),
(11, 'test', '2019-08-06', '00:00:00', '0000-00-00', '00:00:00', 0, 'usarios1@hotmail.com'),
(12, 'ccc', '2019-08-08', '00:00:00', '0000-00-00', '00:00:00', 1, 'usarios1@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `email` varchar(40) NOT NULL,
  `nombre` varchar(40) DEFAULT NULL,
  `pwd` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`email`, `nombre`, `pwd`, `fecha`) VALUES
('usarios1@hotmail.com', 'usuarios1', '$2y$10$ciVK/Olpaz0DH6./6NczNugnKm7JidIxLtglXThGhPixFCu/8YhKG', '2016-07-28'),
('usarios2@hotmail.com', 'usuarios2', '$2y$10$CMe8SH7.sAhoTObbpxXwnuYC3bOoXX7fibJ.1AnnHUQP.Wd4sk/Fe', '2016-08-28'),
('usarios3@hotmail.com', 'usuarios3', '$2y$10$nnDHaZ9wRIKtlxDaZ9vj6efVsKoXQkrUw628meHPiOOub9/GUOb1m', '2016-09-28');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
