-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-06-2022 a las 18:45:27
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `chatbot_sugerencias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `keyword_fetched`
--

CREATE TABLE `keyword_fetched` (
  `response_id` int(30) NOT NULL,
  `client` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `keyword_fetched`
--

INSERT INTO `keyword_fetched` (`response_id`, `client`) VALUES
(4, '::1'),
(6, '::1'),
(7, '::1'),
(7, '::1'),
(7, '::1'),
(7, '::1'),
(8, '127.0.0.1'),
(8, '127.0.0.1'),
(8, '127.0.0.1'),
(7, '127.0.0.1'),
(8, '127.0.0.1'),
(7, '127.0.0.1'),
(6, '127.0.0.1'),
(8, '127.0.0.1'),
(8, '127.0.0.1'),
(8, '127.0.0.1'),
(8, '127.0.0.1'),
(8, '127.0.0.1'),
(8, '127.0.0.1'),
(7, '127.0.0.1'),
(8, '127.0.0.1'),
(8, '127.0.0.1'),
(7, '127.0.0.1'),
(6, '127.0.0.1'),
(8, '127.0.0.1'),
(7, '127.0.0.1'),
(6, '127.0.0.1'),
(8, '127.0.0.1'),
(7, '127.0.0.1'),
(6, '127.0.0.1'),
(5, '127.0.0.1'),
(8, '127.0.0.1'),
(7, '127.0.0.1'),
(6, '127.0.0.1'),
(5, '127.0.0.1'),
(8, '127.0.0.1'),
(7, '127.0.0.1'),
(6, '127.0.0.1'),
(5, '127.0.0.1'),
(8, '::1'),
(7, '::1'),
(6, '::1'),
(5, '::1'),
(8, '::1'),
(7, '::1'),
(6, '::1'),
(5, '::1'),
(8, '::1'),
(8, '::1'),
(7, '::1'),
(6, '::1'),
(5, '::1'),
(8, '::1'),
(8, '::1'),
(8, '::1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `keyword_list`
--

CREATE TABLE `keyword_list` (
  `response_id` int(30) NOT NULL,
  `keyword` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `keyword_list`
--

INSERT INTO `keyword_list` (`response_id`, `keyword`) VALUES
(4, 'Acabo de reiniciar el dispositivo y solucioné el inconveniente'),
(4, 'Reinicié el teléfono y solucioné el teléfono'),
(8, 'Sin acceso a Internet'),
(8, 'Sin poder acceder a Internet'),
(8, 'No puedo acceder a Internet'),
(8, 'No tengo acceso a Internet'),
(7, '¿No puedes acceder a ninguna página?'),
(7, '¿No tienes acceso a ninguna página?'),
(7, '¿No visualizas ninguna página web?'),
(6, '¿Estás conectad@ por datos móviles?'),
(6, '¿Accedes por datos móviles?'),
(6, '¿Ingresas por datos móviles?'),
(5, 'Ya tiene acceso a Internet'),
(5, 'Ya tengo acceso a Internet');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `response_list`
--

CREATE TABLE `response_list` (
  `id` int(30) NOT NULL,
  `response` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `response_list`
--

INSERT INTO `response_list` (`id`, `response`, `status`, `date_created`, `date_updated`) VALUES
(4, '<p><span style=\"color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" text-align:=\"\" justify;\"=\"\">Acabo de reiniciar el dispositivo y solucioné el inconveniente</span><br></p>', 1, '2022-05-05 14:40:29', '2022-06-19 23:23:56'),
(5, '<p><span style=\"color: rgb(0, 0, 0); font-family: \" open=\"\" sans\",=\"\" arial,=\"\" sans-serif;=\"\" text-align:=\"\" justify;\"=\"\">Gracias por comunicarte con nosotros, nos place mucho haberte ayudado, si tienes algún otro inconveniente, te reenvío el menú inicial nuevamente.</span><br></p>', 1, '2022-05-05 14:41:00', '2022-06-19 23:44:03'),
(6, '<p><font color=\"#000000\">Ya que estás conectad@ por datos móviles, le pido que reinicié el dispositivo y me confirme lo siguiente:</font></p>', 1, '2022-05-05 14:41:36', '2022-06-19 23:39:01'),
(7, '<p>Dado que informas que no puedes acceder a ninguna página, te consulto lo siguiente:</p>', 1, '2022-05-05 15:19:35', '2022-06-19 23:28:35'),
(8, '<p>Como no tienes acceso a Internet, te consulto lo siguiente:</p>', 1, '2022-05-05 15:31:31', '2022-06-19 23:25:57');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suggestion_list`
--

CREATE TABLE `suggestion_list` (
  `response_id` int(30) NOT NULL,
  `suggestion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `suggestion_list`
--

INSERT INTO `suggestion_list` (`response_id`, `suggestion`) VALUES
(4, 'Gracias por comunicarte con nosotros que tengas un feliz día'),
(8, '¿No puedes acceder a ninguna página?'),
(8, '¿No te carga una aplicación en específico?'),
(7, '¿Estás conectad@ por Wifi?'),
(7, '¿Estás conectad@ por datos móviles?'),
(6, 'Ya tiene acceso a Internet'),
(6, 'Persiste el fallo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', 'ChatBot Sugerencias ConfiguroWeb'),
(6, 'short_name', 'ChatBot'),
(11, 'logo', 'uploads/logo.png?v=1651712009'),
(13, 'user_avatar', 'uploads/user_avatar.jpg'),
(14, 'cover', 'uploads/cover.png?v=1651712184'),
(15, 'no_answer', 'En el momento no tengo respuestas para tu consulta'),
(16, 'suggestion', '[\"No tengo acceso a Internet\",\"No tengo acceso al correo\",\"No tengo Whatsapp\"]'),
(17, 'welcome_message', '<p>Hola, hola, ¿En qué te puedo ayudar?</p>'),
(18, 'bot_name', 'ChatBot Sugerencias');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `avatar`, `last_login`, `type`, `date_added`, `date_updated`) VALUES
(1, 'Mauricio', 'Sevilla', 'configuroweb', '4b67deeb9aba04a5b54632ad19934f26', 'uploads/avatars/LogoCW.png?v=1649834664', NULL, 1, '2021-01-20 14:02:37', '2022-06-20 21:35:59'),
(4, 'Juan', 'Usuario', 'jusuario', '4b67deeb9aba04a5b54632ad19934f26', 'uploads/avatars/4.png?v=1655821492', NULL, 2, '2022-05-04 14:27:21', '2022-06-21 09:24:52');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `keyword_fetched`
--
ALTER TABLE `keyword_fetched`
  ADD KEY `response_id` (`response_id`);

--
-- Indices de la tabla `keyword_list`
--
ALTER TABLE `keyword_list`
  ADD KEY `response_id` (`response_id`);

--
-- Indices de la tabla `response_list`
--
ALTER TABLE `response_list`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `suggestion_list`
--
ALTER TABLE `suggestion_list`
  ADD KEY `response_id` (`response_id`);

--
-- Indices de la tabla `system_info`
--
ALTER TABLE `system_info`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `response_list`
--
ALTER TABLE `response_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `keyword_fetched`
--
ALTER TABLE `keyword_fetched`
  ADD CONSTRAINT `response_id_fk_kf` FOREIGN KEY (`response_id`) REFERENCES `response_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `keyword_list`
--
ALTER TABLE `keyword_list`
  ADD CONSTRAINT `response_id_fk_kl` FOREIGN KEY (`response_id`) REFERENCES `response_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Filtros para la tabla `suggestion_list`
--
ALTER TABLE `suggestion_list`
  ADD CONSTRAINT `response_id_fk_sl` FOREIGN KEY (`response_id`) REFERENCES `response_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
