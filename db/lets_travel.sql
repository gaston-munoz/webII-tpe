-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-10-2020 a las 07:46:37
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
(1, 'Juego', 'Realizacion de diferentes juegos en el Parque de \"El Centinela\"', 50000, 'https://encolombia.com/wp-content/uploads/2019/02/Lugares-Visitar-Turquia-Turismo-696x398.jpg', 1, '0000-00-00 00:00:00'),
(4, 'Paseo en aerosillas en el cerro', 'Viaje a travez del cerro el centinela en sus famosas aerosillas', 1000, 'https://conocedores.com/wp-content/uploads/2019/09/10-destinos-visitar-colombia-26092019.jpg', 6, '2020-10-11 20:22:11'),
(5, 'Paseo de las 7 cascadas', 'Recorrido guiado en el cerro de la cascada, visitando las 7 legendarias fuentes de agua', 950, 'https://encolombia.com/wp-content/uploads/2019/02/Lugares-Visitar-Turquia-Turismo-696x398.jpg', 1, '2020-10-12 07:54:51'),
(6, 'Aprender nuevo lenguaje de programacion', 'sdfbdfbdfb', 10, 'https://conocedores.com/wp-content/uploads/2019/09/10-destinos-visitar-colombia-26092019.jpg', 1, '2020-10-14 06:35:40'),
(7, 'Gaston the Trust 2', 'reghaehtth', 90, 'https://conocedores.com/wp-content/uploads/2019/09/10-destinos-visitar-colombia-26092019.jpg', 1, '2020-10-14 06:37:35'),
(14, 'Gaston the Trust', 'tjrwtyjrtwj', 10, 'https://i.pinimg.com/originals/45/20/cd/4520cdcd019971b5fd49d95aef03764b.jpg', 2, '2020-10-14 21:56:24'),
(16, 'Gaston the Trustqq', 'verfebvgerb', 100, 'ebrer', 5, '2020-10-15 02:22:33'),
(17, 'Gaston the Trustrrrrrrrrrrrrrr', 'rberbrfe', 100, 'https://i.pinimg.com/originals/45/20/cd/4520cdcd019971b5fd49d95aef03764b.jpg', 2, '2020-10-15 02:22:58'),
(18, 'Viaje a sierra de la Ventana y Bahia Blanca', 'Increible viaje por la sierra y la bahia', 10000, 'https://i.pinimg.com/originals/45/20/cd/4520cdcd019971b5fd49d95aef03764b.jpg', 2, '2020-10-15 05:07:37'),
(19, 'Facebook', 'Juego en facebook', 10, 'https://i.pinimg.com/originals/45/20/cd/4520cdcd019971b5fd49d95aef03764b.jpg', 13, '2020-10-15 05:36:58'),
(20, 'Excursion por museo de programacion', 'Excursion por museo de programacion', 90, 'https://i0.wp.com/mactorrents.io/wp-content/uploads/2019/09/apple-mac-torrents-io-icons-4.png?fit=512%2C512&ssl=1', 12, '2020-10-15 05:38:18');

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
(1, 'Tour', 'Visita guiada, con guia cubierto en la tarifa'),
(2, 'Paseo recreativo', 'Dependiendo de cada producto pueden ser diferentes actividades recreativas'),
(5, 'Excursion', 'Actividad recreativa con paseo sobre lugar exotico'),
(6, 'Visita', 'Entarda a lugar turistico o exotico'),
(12, 'Entrada', 'Entrada para el ingreso se un show o evento'),
(13, 'Viaje Lejano', 'Viaje fuera de la provincia\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`) VALUES
(1, 'Gaston', 'gaston@area51.com', '$2y$10$/PVXMfscXYzZTUY/tZuhHul4Qvon2GeiJp6tBITPq2UGIsF5yBWbS');

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
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `activity`
--
ALTER TABLE `activity`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
