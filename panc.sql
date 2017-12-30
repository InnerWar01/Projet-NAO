-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-03-2017 a las 18:01:32
-- Versión del servidor: 5.7.14
-- Versión de PHP: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `panc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `block`
--

CREATE TABLE `block` (
  `Block_id` tinyint(3) NOT NULL,
  `Type_action` varchar(20) NOT NULL,
  `Name_action` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `block`
--

INSERT INTO `block` (`Block_id`, `Type_action`, `Name_action`) VALUES
(1, 'speak', ''),
(2, 'action', 'walkfront'),
(3, 'times', ''),
(4, 'END', ''),
(5, 'wait', ''),
(6, 'bend', 'legs'),
(7, 'bend', 'arms'),
(8, 'action ', 'sitting'),
(9, 'action', 'standing'),
(11, 'action', 'walkback'),
(12, 'reachout', ''),
(13, 'hands', 'open'),
(14, 'hands', 'close');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `exercise`
--

CREATE TABLE `exercise` (
  `Exercise_id` tinyint(3) NOT NULL,
  `Instruction` varchar(255) NOT NULL,
  `Project_id` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `exercise`
--

INSERT INTO `exercise` (`Exercise_id`, `Instruction`, `Project_id`) VALUES
(1, 'Make NAO do 3 squats and say something right after finishing the actions (a squat consists of bending legs and standing up one time).\n\nHint: make sure your robot is standing up before doing squats and waits the end of his action before speaking.', 1),
(2, 'Make NAO walk a few steps forward and ask you to put something in his hands.\nReach out his arms and close his hands.\n\nHint: Make sure he is standing up before walking and make him open his hands before closing them\n', 1),
(3, 'Make NAO bend and reach out his arms 4 times and say “ugh” after each bend. There you have it, NAO weightlifting !\r\n', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `order_block_exercise`
--

CREATE TABLE `order_block_exercise` (
  `Exercise_id` tinyint(3) NOT NULL,
  `Rank` tinyint(3) NOT NULL,
  `Block_id` tinyint(3) NOT NULL,
  `Block_value` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `order_block_exercise`
--

INSERT INTO `order_block_exercise` (`Exercise_id`, `Rank`, `Block_id`, `Block_value`) VALUES
(1, 1, 9, ''),
(1, 2, 3, '3'),
(1, 3, 6, ''),
(1, 4, 9, ''),
(1, 5, 4, ''),
(1, 6, 5, ''),
(1, 7, 1, ''),
(2, 1, 9, ''),
(2, 2, 2, ''),
(2, 3, 1, ''),
(2, 4, 12, ''),
(2, 5, 13, ''),
(2, 6, 14, ''),
(3, 1, 3, '4'),
(3, 2, 7, ''),
(3, 3, 12, ''),
(3, 4, 1, ''),
(3, 5, 4, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project`
--

CREATE TABLE `project` (
  `Project_id` tinyint(3) NOT NULL,
  `Project_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `project`
--

INSERT INTO `project` (`Project_id`, `Project_name`) VALUES
(1, 'Sport');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `state_exercise`
--

CREATE TABLE `state_exercise` (
  `Exercise_id` tinyint(3) NOT NULL,
  `Login` varchar(20) NOT NULL,
  `State` varchar(10) NOT NULL DEFAULT 'incomplete'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `state_exercise`
--

INSERT INTO `state_exercise` (`Exercise_id`, `Login`, `State`) VALUES
(1, 'panc', 'complete'),
(2, 'panc', 'complete'),
(3, 'panc', 'complete');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `Login` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`Login`, `Password`) VALUES
('panc', 'nao');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `block`
--
ALTER TABLE `block`
  ADD PRIMARY KEY (`Block_id`);

--
-- Indices de la tabla `exercise`
--
ALTER TABLE `exercise`
  ADD PRIMARY KEY (`Exercise_id`),
  ADD KEY `Project_id` (`Project_id`);

--
-- Indices de la tabla `order_block_exercise`
--
ALTER TABLE `order_block_exercise`
  ADD PRIMARY KEY (`Exercise_id`,`Rank`),
  ADD KEY `Block_id` (`Block_id`);

--
-- Indices de la tabla `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`Project_id`);

--
-- Indices de la tabla `state_exercise`
--
ALTER TABLE `state_exercise`
  ADD PRIMARY KEY (`Exercise_id`,`Login`),
  ADD KEY `Login` (`Login`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Login`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `block`
--
ALTER TABLE `block`
  MODIFY `Block_id` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `exercise`
--
ALTER TABLE `exercise`
  MODIFY `Exercise_id` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `project`
--
ALTER TABLE `project`
  MODIFY `Project_id` tinyint(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `exercise`
--
ALTER TABLE `exercise`
  ADD CONSTRAINT `exercise_ibfk_1` FOREIGN KEY (`Project_id`) REFERENCES `project` (`Project_id`);

--
-- Filtros para la tabla `order_block_exercise`
--
ALTER TABLE `order_block_exercise`
  ADD CONSTRAINT `order_block_exercise_ibfk_1` FOREIGN KEY (`Exercise_id`) REFERENCES `exercise` (`Exercise_id`),
  ADD CONSTRAINT `order_block_exercise_ibfk_2` FOREIGN KEY (`Block_id`) REFERENCES `block` (`Block_id`);

--
-- Filtros para la tabla `state_exercise`
--
ALTER TABLE `state_exercise`
  ADD CONSTRAINT `state_exercise_ibfk_1` FOREIGN KEY (`Exercise_id`) REFERENCES `exercise` (`Exercise_id`),
  ADD CONSTRAINT `state_exercise_ibfk_2` FOREIGN KEY (`Login`) REFERENCES `user` (`Login`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
