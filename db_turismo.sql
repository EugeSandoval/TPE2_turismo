-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2021 a las 02:00:42
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_turismo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `atraccion`
--

CREATE TABLE `atraccion` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(400) DEFAULT NULL,
  `id_provincia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `atraccion`
--

INSERT INTO `atraccion` (`id`, `nombre`, `descripcion`, `id_provincia`) VALUES
(9, 'Quebrada de Humahuaca', 'La Quebrada de Humahuaca1​ se ubica al noroeste de Argentina, en la Provincia de Jujuy. Es un valle andino de 155 kilómetros de extensión, flanqueado por altas cadenas montañosas y cavado laboriosamente por el río Grande, ubicado a más de 2000 metros de altura.', 2),
(11, 'Bariloche', 'muchas cosas', 2),
(12, 'Ruta del Pehuén', 'sdjalsdjla', 13),
(55, 'Purmamarca', 'aaaaaaaaa', 4),
(173, 'Piedra Movediza', 'aaaaaaaaa', 3),
(174, 'Gualeguaychú', 'aaaaaaaaa', 10),
(175, 'Villa Carlos Paz', 'aaaaaaaaa', 16),
(178, 'Villa General Belgrano', 'aaaaaaaaa', 16),
(179, 'Monte Calvario', 'dsds', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id_comentario` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `opinion` varchar(500) NOT NULL,
  `puntaje` int(1) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_atraccion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id_comentario`, `email`, `opinion`, `puntaje`, `id_usuario`, `id_atraccion`) VALUES
(187, 'maugeality@gmail.com', 'Me encantó la experiencia', 5, 4, 9),
(188, 'maugeality@gmail.com', 'Volvería a ir sin dudas', 4, 4, 11),
(189, 'maugeality@gmail.com', 'Podría haber sido mejor', 2, 4, 173),
(190, 'maugeality@gmail.com', 'No me gustó nada', 1, 4, 179),
(191, 'eugenia.sandoval@tsoftlatam.com', 'Quiero volver !!', 5, 7, 175),
(192, 'eugenia.sandoval@tsoftlatam.com', 'El servicio dejó mucho que desear', 1, 7, 12),
(193, 'Mau', 'Estuvo lindo', 4, 19, 55);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `id_prov` int(11) NOT NULL,
  `nombre_prov` varchar(100) DEFAULT NULL,
  `region` varchar(100) NOT NULL,
  `cant_poblacion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`id_prov`, `nombre_prov`, `region`, `cant_poblacion`) VALUES
(1, 'Misiones', 'Mesopotamia', 0),
(2, 'Río Negro', 'Patagonia', 0),
(3, 'Buenos Aires', 'Pampeana', 0),
(4, 'Jujuy', 'Noroeste', 0),
(10, 'Entre Ríos', 'sdad', 2),
(12, 'Catamarca', 'Cuyo', 5),
(13, 'Neuquén', 'Patagonia', 0),
(16, 'Córdoba', 'Pampeana', 213123),
(17, 'Tierra del Fuego', 'Patagonia', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `administrador` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `email`, `password`, `administrador`) VALUES
(4, 'maugeality@gmail.com', '$2y$10$ltsL./ur3HMyWVRPg8UQfOn6D97WRELEWbX43cRgdgosxJeMwBI0.', 1),
(7, 'eugenia.sandoval@tsoftlatam.com', '$2y$10$IBa.2trjjKp/OswnGNIlgesyst4bdvRmlqyF8R2NNiUmAuRTY6Gni', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `atraccion`
--
ALTER TABLE `atraccion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_provincia` (`id_provincia`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_atraccion` (`id_atraccion`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`id_prov`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `atraccion`
--
ALTER TABLE `atraccion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=194;

--
-- AUTO_INCREMENT de la tabla `provincia`
--
ALTER TABLE `provincia`
  MODIFY `id_prov` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `atraccion`
--
ALTER TABLE `atraccion`
  ADD CONSTRAINT `atraccion_ibfk_1` FOREIGN KEY (`id_provincia`) REFERENCES `provincia` (`id_prov`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`id_atraccion`) REFERENCES `atraccion` (`id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `comentario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
