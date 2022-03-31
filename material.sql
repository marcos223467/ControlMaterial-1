-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-03-2022 a las 13:29:39
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
-- Estructura de tabla para la tabla `material`
--

CREATE TABLE `material` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `categoria` varchar(200) NOT NULL,
  `imagen` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `material`
--

INSERT INTO `material` (`id`, `descripcion`, `cantidad`, `categoria`, `imagen`) VALUES
(22, 'PRIMUX', 8, 'ordenador_portatil', '6ncm0xi0v5g.jpg'),
(23, 'TOSHIBA', 7, 'ordenador_portatil', '9n1559v5ve.jpg'),
(24, 'HP', 6, 'ordenador_portatil', 'default.png'),
(25, 'NEGRAS', 10, 'tablet', 'xtrccs1v5k.jpg'),
(26, 'BLANCAS PEQUEÑAS', 6, 'tablet', '4n558f8k63.jpg'),
(27, 'BLANCAS GRANDES', 6, 'tablet', 'ft9q1m31h9.jpg'),
(28, 'VIRUS', 1, 'juegos_logica', 'xh7gfnrr2c.jpg'),
(29, 'IQ FIT', 2, 'juegos_logica', 'bcobc0xzki.jpg'),
(30, 'GALAXY TRUCKER', 1, 'juegos_logica', '5c1j8h5lld.jpg'),
(31, 'BERRIDOS', 1, 'juegos_logica', 'cdnlnv24zi.jpg'),
(32, 'BEAST OF BALANCE', 2, 'juegos_logica', 'yfpc7trkgc.jpg'),
(33, 'ROBOT TURTLES', 1, 'juegos_logica', '0h38bfqsol.jpg'),
(34, 'DIXIT', 1, 'juegos_logica', 'ww6h68f7eef.jpg'),
(35, 'MOUSE MANIA', 1, 'juegos_logica', 'bwlxnpyzoy.jpg'),
(36, 'BITS & BYTES', 1, 'juegos_logica', 'dko5oe6oo5.jpg'),
(37, 'SUPER 3D PUZZLE', 1, 'juegos_logica', 'stp0tmasw9.jpg'),
(38, 'MINECRAFT BUILDERS', 1, 'juegos_logica', '8inrytxnof.jpg'),
(39, 'QUADRILLION', 1, 'juegos_logica', '130f0nbf6p.jpg'),
(40, 'MISION ESPACIAL', 1, 'juegos_logica', 'koornvbfeu.jpg'),
(41, 'ESCAPE PODS', 1, 'juegos_logica', '7ycvif4c1p.jpg'),
(42, 'WALKING ON THE MOON', 1, 'juegos_logica', 't169fuecry.jpg'),
(43, 'ROBOT MOUSE', 4, 'juegos_logica', 'k4vbhjl26n.jpeg'),
(44, 'VEX IQ', 6, 'robot', 'kyqni4ivt4.jpg'),
(45, 'VEX GO', 7, 'robot', '0f4p6q1d04.jpg'),
(46, 'VEX 123', 1, 'robot', '4lavrq9a7m.jpg'),
(47, 'LEGO WEDO', 8, 'robot', 'e30lz53d46.jpg'),
(48, 'MBOT', 12, 'robot', '6tf2trwlpi.jpg'),
(49, 'MICROBIT', 13, 'robot', '0gh2y6akjm.jpg'),
(50, 'CODE ROCKY', 4, 'robot', '4erjb0dm0v.jpg'),
(51, 'SPHERO', 6, 'robot', 'mljb4746qi.jpg'),
(52, 'EDISON', 13, 'robot', '6ahlzb2s1v.jpg'),
(53, 'ROBITS PET', 9, 'robot', 'q6x8jg00zjg.jpg'),
(54, 'BOTLEY', 1, 'robot', '1c6zcm0e92.jpeg'),
(55, 'ZOWY', 1, 'robot', 'qflcu7l0qkk.jpeg'),
(56, 'GUSANO ROBOT', 2, 'robot', 'buyhg5czafi.jpg'),
(57, 'CAJA LEGO', 5, 'legos', 'hsumgnexj2.jpg'),
(58, 'LEGO TRAIN', 1, 'legos', '1rn6nrnb5h.jpg'),
(59, 'LEGO BINGO', 1, 'legos', 'g07g9eengmf.jpg'),
(60, 'LEGO DUPLO', 3, 'legos', 'emymahqj4v.jpg'),
(61, 'PLANCHAS DE LEGO', 40, 'legos', '5d4pjyx4mb.jpg'),
(62, 'ENGRANAJES', 1, 'varios', 'ufy3w7tgwd.jpg'),
(63, 'ATORNILLAR', 2, 'varios', 'z59do8kjg.jpg'),
(64, 'MAKEY MAKEY', 2, 'varios', 'egyrdwpkqh.jpeg'),
(65, 'PIEZAS LEGO TECNIC', 2, 'kit_robotica', '8pxiq70038.jpg'),
(66, 'PIEZAS MBOT', 1, 'kit_robotica', 'fcex5in9wf.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `material`
--
ALTER TABLE `material`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
