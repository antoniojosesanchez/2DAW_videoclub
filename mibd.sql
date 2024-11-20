-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Tiempo de generación: 20-11-2024 a las 13:45:02
-- Versión del servidor: 11.5.2-MariaDB-ubu2404
-- Versión de PHP: 8.2.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mibd`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `idPel` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `nota` tinyint(4) NOT NULL DEFAULT 0,
  `poster` varchar(255) DEFAULT NULL,
  `argumento` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pelicula`
--

INSERT INTO `pelicula` (`idPel`, `titulo`, `nota`, `poster`, `argumento`) VALUES
(1, 'Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc.', 1, 'http://dummyimage.com/250x250.png/dddddd/000000', 'Mauris lacinia sapien quis libero. Nullam sit amet turpis elementum ligula vehicula consequat. Morbi a ipsum.'),
(2, 'Nunc nisl.', 4, 'http://dummyimage.com/250x250.png/dddddd/000000', 'In hac habitasse platea dictumst. Aliquam augue quam, sollicitudin vitae, consectetuer eget, rutrum at, lorem. Integer tincidunt ante vel ipsum. Praesent blandit lacinia erat. Vestibulum sed magna at nunc commodo placerat. Praesent blandit. Nam nulla. Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.'),
(3, 'Aenean sit amet justo.', 3, NULL, 'In est risus, auctor sed, tristique in, tempus sit amet, sem. Fusce consequat. Nulla nisl. Nunc nisl. Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus.'),
(4, 'Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc.', 2, 'http://dummyimage.com/250x250.png/5fa2dd/ffffff', 'Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci.'),
(5, 'Integer pede justo, lacinia eget, tincidunt eget, tempus vel, pede.', 5, 'http://dummyimage.com/250x250.png/ff4444/ffffff', 'Duis mattis egestas metus. Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh. Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros. Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue. Aliquam erat volutpat.'),
(6, 'Phasellus in felis.', 4, NULL, 'Donec dapibus. Duis at velit eu est congue elementum. In hac habitasse platea dictumst. Morbi vestibulum, velit id pretium iaculis, diam erat fermentum justo, nec condimentum neque sapien placerat ante. Nulla justo. Aliquam quis turpis eget elit sodales scelerisque. Mauris sit amet eros. Suspendisse accumsan tortor quis turpis.'),
(7, 'Pellentesque eget nunc.', 2, NULL, 'Proin risus. Praesent lectus. Vestibulum quam sapien, varius ut, blandit non, interdum in, ante. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Duis faucibus accumsan odio.'),
(8, 'Duis bibendum.', 4, NULL, 'Pellentesque viverra pede ac diam. Cras pellentesque volutpat dui. Maecenas tristique, est et tempus semper, est quam pharetra magna, ac consequat metus sapien ut nunc. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Mauris viverra diam vitae quam. Suspendisse potenti. Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum. Aliquam non mauris. Morbi non lectus. Aliquam sit amet diam in magna bibendum imperdiet.'),
(9, 'In hac habitasse platea dictumst.', 5, NULL, 'Nullam porttitor lacus at turpis. Donec posuere metus vitae ipsum.'),
(10, 'Morbi non quam nec dui luctus rutrum.', 1, 'http://dummyimage.com/250x250.png/cc0000/ffffff', 'Integer non velit. Donec diam neque, vestibulum eget, vulputate ut, ultrices vel, augue.'),
(11, 'Maecenas tincidunt lacus at velit.', 1, NULL, 'Etiam vel augue.'),
(12, 'Phasellus sit amet erat.', 2, 'http://dummyimage.com/250x250.png/ff4444/ffffff', 'Aliquam erat volutpat. In congue. Etiam justo. Etiam pretium iaculis justo.'),
(13, 'Curabitur at ipsum ac tellus semper interdum.', 4, NULL, 'Vivamus tortor. Duis mattis egestas metus. Aenean fermentum. Donec ut mauris eget massa tempor convallis. Nulla neque libero, convallis eget, eleifend luctus, ultricies eu, nibh. Quisque id justo sit amet sapien dignissim vestibulum. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Nulla dapibus dolor vel est. Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros. Vestibulum ac est lacinia nisi venenatis tristique. Fusce congue, diam id ornare imperdiet, sapien urna pretium nisl, ut volutpat sapien arcu sed augue.'),
(14, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit.', 5, 'http://dummyimage.com/250x250.png/5fa2dd/ffffff', 'Donec odio justo, sollicitudin ut, suscipit a, feugiat et, eros.'),
(15, 'Ut tellus.', 5, 'http://dummyimage.com/250x250.png/ff4444/ffffff', 'Etiam vel augue. Vestibulum rutrum rutrum neque.'),
(16, 'Nam tristique tortor eu pede.', 2, 'http://dummyimage.com/250x250.png/dddddd/000000', 'Duis consequat dui nec nisi volutpat eleifend. Donec ut dolor. Morbi vel lectus in quam fringilla rhoncus. Mauris enim leo, rhoncus sed, vestibulum sit amet, cursus id, turpis. Integer aliquet, massa id lobortis convallis, tortor risus dapibus augue, vel accumsan tellus nisi eu orci.'),
(17, 'Donec vitae nisi.', 2, 'http://dummyimage.com/250x250.png/dddddd/000000', 'Nulla nisl. Nunc nisl. Duis bibendum, felis sed interdum venenatis, turpis enim blandit mi, in porttitor pede justo eu massa. Donec dapibus. Duis at velit eu est congue elementum. In hac habitasse platea dictumst.'),
(18, 'Duis ac nibh.', 5, NULL, 'Ut at dolor quis odio consequat varius. Integer ac leo. Pellentesque ultrices mattis odio. Donec vitae nisi. Nam ultrices, libero non mattis pulvinar, nulla pede ullamcorper augue, a suscipit nulla elit ac nulla. Sed vel enim sit amet nunc viverra dapibus. Nulla suscipit ligula in lacus. Curabitur at ipsum ac tellus semper interdum. Mauris ullamcorper purus sit amet nulla. Quisque arcu libero, rutrum ac, lobortis vel, dapibus at, diam.'),
(19, 'Nunc purus.', 1, 'http://dummyimage.com/250x250.png/dddddd/000000', 'Morbi non quam nec dui luctus rutrum. Nulla tellus. In sagittis dui vel nisl. Duis ac nibh. Fusce lacus purus, aliquet at, feugiat non, pretium quis, lectus. Suspendisse potenti. In eleifend quam a odio.'),
(20, 'Morbi odio odio, elementum eu, interdum eu, tincidunt in, leo.', 3, 'http://dummyimage.com/250x250.png/5fa2dd/ffffff', 'Nullam orci pede, venenatis non, sodales sed, tincidunt eu, felis. Fusce posuere felis sed lacus. Morbi sem mauris, laoreet ut, rhoncus aliquet, pulvinar sed, nisl. Nunc rhoncus dui vel sem. Sed sagittis. Nam congue, risus semper porta volutpat, quam pede lobortis ligula, sit amet eleifend pede libero quis orci. Nullam molestie nibh in lectus. Pellentesque at nulla. Suspendisse potenti.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataforma`
--

CREATE TABLE `plataforma` (
  `idPla` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `enlace` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `plataforma`
--

INSERT INTO `plataforma` (`idPla`, `nombre`, `enlace`) VALUES
(1, 'Netflix', NULL),
(2, 'Disney +', NULL),
(3, 'Amazon Prime Video', NULL),
(4, 'Max', NULL),
(5, 'Sky Showtime', NULL),
(6, 'Filmin', NULL),
(7, 'Movistar +', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataforma_pelicula`
--

CREATE TABLE `plataforma_pelicula` (
  `idPla` int(11) NOT NULL,
  `idPel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Volcado de datos para la tabla `plataforma_pelicula`
--

INSERT INTO `plataforma_pelicula` (`idPla`, `idPel`) VALUES
(2, 2),
(4, 3),
(6, 4),
(7, 4),
(4, 7),
(2, 8),
(4, 9),
(5, 12),
(3, 13),
(5, 13),
(7, 13),
(4, 14),
(3, 16),
(6, 16),
(7, 16),
(1, 17),
(4, 17),
(2, 18),
(3, 20),
(6, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plataforma_usuario`
--

CREATE TABLE `plataforma_usuario` (
  `idPla` int(11) NOT NULL,
  `idUsu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_uca1400_ai_ci;

--
-- Volcado de datos para la tabla `plataforma_usuario`
--

INSERT INTO `plataforma_usuario` (`idPla`, `idUsu`) VALUES
(1, 3),
(4, 3),
(6, 3),
(1, 4),
(3, 4),
(5, 4),
(1, 6),
(5, 7),
(2, 8),
(3, 8),
(6, 8),
(2, 9),
(3, 9),
(1, 10),
(7, 11),
(4, 18),
(2, 19),
(5, 20);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsu` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `foto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsu`, `email`, `clave`, `nombre`, `apellido`, `foto`) VALUES
(1, 'ehouldin0@xrea.com', '12345678', 'Em', 'Houldin', 'http://dummyimage.com/250x250.png/5fa2dd/ffffff'),
(2, 'mpluthero1@miibeian.gov.cn', '12345678', 'Margaretha', 'Pluthero', NULL),
(3, 'faveyarz2@yale.edu', '12345678', 'Ford', 'Aveyard', 'http://dummyimage.com/250x250.png/dddddd/000000'),
(4, 'vazema3@wisc.edu', '12345678', 'Vania', 'Azema', 'http://dummyimage.com/250x250.png/ff4444/ffffff'),
(5, 'astebbings4@yellowbook.com', '12345678', 'Anastassia', 'Stebbings', 'http://dummyimage.com/250x250.png/5fa2dd/ffffff'),
(6, 'sjoney5@nsw.gov.au', '12345678', 'Syd', 'Joney', NULL),
(7, 'zgibson6@marriott.com', '12345678', 'Zora', 'Gibson', 'http://dummyimage.com/250x250.png/cc0000/ffffff'),
(8, 'fchicchelli7@chicagotribune.com', '12345678', 'Florri', 'Chicchelli', NULL),
(9, 'klabuschagne8@mit.edu', '12345678', 'Kacey', 'Labuschagne', 'http://dummyimage.com/250x250.png/ff4444/ffffff'),
(10, 'bgotliffe9@nasa.gov', '12345678', 'Bradan', 'Gotliffe', 'http://dummyimage.com/250x250.png/ff4444/ffffff'),
(11, 'jfolkertsa@columbia.edu', '12345678', 'Jourdan', 'Folkerts', 'http://dummyimage.com/250x250.png/ff4444/ffffff'),
(12, 'mjeannonb@linkedin.com', '12345678', 'Madonna', 'Jeannon', NULL),
(13, 'mriedigerc@paginegialle.it', '12345678', 'Mick', 'Riediger', 'http://dummyimage.com/250x250.png/5fa2dd/ffffff'),
(14, 'alomasneyd@bigcartel.com', '12345678', 'Adel', 'Lomasney', NULL),
(15, 'balesoe@craigslist.org', '12345678', 'Byrom', 'Aleso', 'http://dummyimage.com/250x250.png/cc0000/ffffff'),
(16, 'eaxtellf@illinois.edu', '12345678', 'Eliot', 'Axtell', NULL),
(17, 'msanchisg@wordpress.org', '12345678', 'Manda', 'Sanchis', 'http://dummyimage.com/250x250.png/5fa2dd/ffffff'),
(18, 'mmuglestonh@tumblr.com', '12345678', 'May', 'Mugleston', NULL),
(19, 'nbroszkiewiczi@redcross.org', '12345678', 'Nicolis', 'Broszkiewicz', 'http://dummyimage.com/250x250.png/cc0000/ffffff'),
(20, 'mcadwaladrj@google.ca', '12345678', 'Marcos', 'Cadwaladr', 'http://dummyimage.com/250x250.png/dddddd/000000');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`idPel`);

--
-- Indices de la tabla `plataforma`
--
ALTER TABLE `plataforma`
  ADD PRIMARY KEY (`idPla`);

--
-- Indices de la tabla `plataforma_pelicula`
--
ALTER TABLE `plataforma_pelicula`
  ADD PRIMARY KEY (`idPla`,`idPel`),
  ADD KEY `fk_plataforma_pelicula_pelicula` (`idPel`);

--
-- Indices de la tabla `plataforma_usuario`
--
ALTER TABLE `plataforma_usuario`
  ADD PRIMARY KEY (`idPla`,`idUsu`),
  ADD KEY `fk_plataforma_usuario_usuario` (`idUsu`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsu`),
  ADD UNIQUE KEY `unq_email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `idPel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `plataforma`
--
ALTER TABLE `plataforma`
  MODIFY `idPla` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `plataforma_pelicula`
--
ALTER TABLE `plataforma_pelicula`
  ADD CONSTRAINT `fk_plataforma_pelicula_pelicula` FOREIGN KEY (`idPel`) REFERENCES `pelicula` (`idPel`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_plataforma_pelicula_plataforma` FOREIGN KEY (`idPla`) REFERENCES `plataforma` (`idPla`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `plataforma_usuario`
--
ALTER TABLE `plataforma_usuario`
  ADD CONSTRAINT `fk_plataforma_usuario_plataforma` FOREIGN KEY (`idPla`) REFERENCES `plataforma` (`idPla`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_plataforma_usuario_usuario` FOREIGN KEY (`idUsu`) REFERENCES `usuario` (`idUsu`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
