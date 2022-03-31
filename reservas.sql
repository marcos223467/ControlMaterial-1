-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-03-2022 a las 13:29:52
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `material`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `cantidad_y_material` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL,
  `id_user` int(11) NOT NULL,
  `archivado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id`, `fecha_inicio`, `hora_inicio`, `hora_fin`, `cantidad_y_material`, `id_user`, `archivado`) VALUES
(8, '2022-03-22', '12:00:00', '14:00:00', '[{\"id\":\"1\",\"cant\":\"10\"},{\"id\":\"2\",\"cant\":\"6\"}]', 1, 0),
(9, '2022-03-27', '12:00:00', '14:00:00', '[{\"id\":\"1\",\"cant\":\"4\"}]', 3, 0),
(11, '2022-03-27', '12:00:00', '14:00:00', '[{\"id\":\"19\",\"cant\":\"1\"}]', 3, 0),
(12, '2022-03-28', '13:00:00', '15:00:00', '[{\"id\":\"20\",\"cant\":\"4\"},{\"id\":\"19\",\"cant\":\"3\"}]', 1, 0),
(13, '2022-03-30', '12:00:00', '16:00:00', '[{\"id\":\"21\",\"cant\":\"1\"},{\"id\":\"2\",\"cant\":\"9\"}]', 1, 0),
(14, '2022-03-31', '14:50:00', '18:50:00', '[{\"id\":\"20\",\"cant\":\"5\"}]', 1, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
