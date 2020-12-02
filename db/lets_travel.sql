-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2020 a las 21:23:17
-- Versión del servidor: 10.4.13-MariaDB
-- Versión de PHP: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `lets_travel`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activity`
--

CREATE TABLE `activity` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `price` float DEFAULT 0,
  `image` varchar(255) NOT NULL DEFAULT 'https://conocedores.com/wp-content/uploads/2019/09/10-destinos-visitar-colombia-26092019.jpg',
  `categoryId` int(11) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `activity`
--

INSERT INTO `activity` (`id`, `title`, `description`, `price`, `image`, `categoryId`, `createdAt`) VALUES
(21, 'Visita las sierras de Tandil', 'Visita a las sierras de Tandil', 5001, 'https://media-cdn.tripadvisor.com/media/photo-s/0d/3c/ec/c4/las-cabanas-en-la-sierra.jpg', 16, '2020-11-30 05:23:12'),
(22, 'Visita a el Lago del Fuerte', 'Visita a el Lago del Fuerte', 200, 'https://www.welcomeargentina.com/paseos/lago-dique-del-fuerte/lago-dique-del-fuerte-3.jpg', 16, '2020-12-01 07:57:43'),
(23, 'Visita al Centinela', 'Visita al Centinela', 100, 'https://cdn.eleco.com.ar/media/2020/05/Villa-del-lago-3-1024x699.jpg', 17, '2020-12-01 07:58:48'),
(24, 'Juegos de Mesa en el Calvario', 'Juegos de Mesa en el Calvario', 500, 'uploads/img/5fc7214f6a5ce3.97273701.jpeg', 15, '2020-12-02 04:35:05'),
(25, 'Dia en las mejores playas de Mar del Plata', 'Dia en las mejores playas de Mar del Plata\r\nDia en las mejores playas de Mar del Plata', 10000, 'uploads/img/5fc71a77a29248.88452425.jpg', 15, '2020-12-02 04:39:19'),
(26, 'Recorrida en la Univ. de Arte y participación en show de Teatro', 'Recorrida en la Univ. de Arte y participación en show de Teatro', 6000, 'uploads/img/5fc71b2bd0c426.54048525.gif', 16, '2020-12-02 04:42:19'),
(27, 'Tarde de Pezca en el Lago del Fuerte', 'Tarde de Pezca en el Lago del Fuerte', 300, 'uploads/img/5fc72186ba3478.27604895.jpg', 17, '2020-12-02 04:46:33'),
(28, 'Visita las afuera de Tandil', 'Visita las afuera de Tandil', 800, 'uploads/img/5fc7276c8c9839.96762549.jpeg', 16, '2020-12-02 05:34:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(15, 'Actividades', 'Diversas actividades y guias'),
(16, 'Tour', 'Paseos y visitas a hermosos lugares'),
(17, 'Guias', 'Los mejores recorridos con guias locales'),
(18, 'Paseo en vehiculo', 'Paseo en vehiculo por lugares fantasticos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `isAdmin`) VALUES
(16, 'Gaston Muñoz', 'gaston@area51.com', '$2y$10$87Ags6vcfQ0ClaiIny1F6ODoBbyq3/TBPEzOj6/sIx1Sl7QTgSSVW', 1),
(17, 'Tomas', 'tomas@nasa.com', '$2y$10$ryW3OQIYZ8JnjPs3rMxR4.BZ/yUQxMYsPKdWi0UMnhE9m9oLLuwZe', 1),
(18, 'Jazmin', 'jazmin@nasa.com', '$2y$10$gWZYpal..mPcT3sigjCNl.shda6aqUNllJmxT0/C.UpIuLGxIRqGK', 0),
(22, 'victoria', 'vicky@nasa.com', '$2y$10$Ox6B58/kADmLNhvrgQ3O8.rNlMOhFcvw9vaEZYPSMyvT0QfhossEa', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `activity`
--
ALTER TABLE `activity`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoryId` (`categoryId`);

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `activity`
--
ALTER TABLE `activity`
  ADD CONSTRAINT `activity_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `category` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
