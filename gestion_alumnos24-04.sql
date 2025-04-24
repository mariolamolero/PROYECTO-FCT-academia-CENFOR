-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-04-2025 a las 11:00:43
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestion_alumnos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignaturas`
--

CREATE TABLE `asignaturas` (
  `id_asignatura` int(11) NOT NULL,
  `nombre_asignatura` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asignaturas`
--

INSERT INTO `asignaturas` (`id_asignatura`, `nombre_asignatura`) VALUES
(1, 'matematicas'),
(2, 'fisica'),
(3, 'quimica'),
(4, 'biologia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bloques`
--

CREATE TABLE `bloques` (
  `id_bloque` int(11) NOT NULL,
  `id_asignatura` int(11) NOT NULL,
  `nombre_bloque` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `bloques`
--

INSERT INTO `bloques` (`id_bloque`, `id_asignatura`, `nombre_bloque`) VALUES
(1, 1, 'algebra'),
(2, 1, 'geometria'),
(3, 1, 'estadistica'),
(4, 1, 'probabilidad'),
(9, 2, 'cinematica'),
(10, 2, 'dinamica'),
(11, 3, 'estructura de la materia'),
(12, 3, 'reacciones quimicas'),
(13, 4, 'la celula'),
(14, 4, 'genetica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales`
--

CREATE TABLE `materiales` (
  `id_material` int(11) NOT NULL,
  `id_bloque` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `formato` enum('pdf','video') NOT NULL,
  `ruta_archivo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `centro_estudios` varchar(100) DEFAULT NULL,
  `usuario` varchar(50) NOT NULL,
  `contrasenya` varchar(255) NOT NULL,
  `nivel_usuario` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellidos`, `email`, `telefono`, `centro_estudios`, `usuario`, `contrasenya`, `nivel_usuario`) VALUES
(8, 'g', 'g', 'Goreto8914@gmail.com', '1573', 'g', 'g', '$2y$10$UWqg..RwsR/HmeisktPRjeefkTiwoDDIJHhnnwRGJFPPToqqJ8yXq', 1),
(9, 'a', 'a', 'a@gmail.es', '1', 'a', 'a', '$2y$10$aMOb/OaP4zeSfnCewNe4v.WPj2VECeYJZlCMnf.2gobbuXOzNc92K', 1),
(10, 'b', 'b', 'b@gmail.es', '12', 'bb', 'b', '$2y$10$Vroe6OlurdKIzwecA3whQOCqi/znwK0vxAIlYrROuexzrpyzr8MIG', 1),
(11, 'uno', 'uno', 'uno@gamil.es', '12', 'ies', 'uno', '$2y$10$PheVkwgKXLIm5Z2jgRy8BOUCZ1/557HYPsrJsJq67bsAGuPEIWijO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios_asignaturas`
--

CREATE TABLE `usuarios_asignaturas` (
  `id_usuario` int(11) NOT NULL,
  `id_asignatura` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios_asignaturas`
--

INSERT INTO `usuarios_asignaturas` (`id_usuario`, `id_asignatura`) VALUES
(8, 1),
(9, 1),
(9, 2),
(9, 3),
(10, 1),
(10, 2),
(11, 1),
(11, 4);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  ADD PRIMARY KEY (`id_asignatura`);

--
-- Indices de la tabla `bloques`
--
ALTER TABLE `bloques`
  ADD PRIMARY KEY (`id_bloque`),
  ADD KEY `id_asignatura` (`id_asignatura`);

--
-- Indices de la tabla `materiales`
--
ALTER TABLE `materiales`
  ADD PRIMARY KEY (`id_material`),
  ADD KEY `id_bloque` (`id_bloque`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- Indices de la tabla `usuarios_asignaturas`
--
ALTER TABLE `usuarios_asignaturas`
  ADD PRIMARY KEY (`id_usuario`,`id_asignatura`),
  ADD KEY `id_asignatura` (`id_asignatura`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `asignaturas`
--
ALTER TABLE `asignaturas`
  MODIFY `id_asignatura` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `bloques`
--
ALTER TABLE `bloques`
  MODIFY `id_bloque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `materiales`
--
ALTER TABLE `materiales`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bloques`
--
ALTER TABLE `bloques`
  ADD CONSTRAINT `bloques_ibfk_1` FOREIGN KEY (`id_asignatura`) REFERENCES `asignaturas` (`id_asignatura`) ON DELETE CASCADE;

--
-- Filtros para la tabla `materiales`
--
ALTER TABLE `materiales`
  ADD CONSTRAINT `materiales_ibfk_1` FOREIGN KEY (`id_bloque`) REFERENCES `bloques` (`id_bloque`) ON DELETE CASCADE;

--
-- Filtros para la tabla `usuarios_asignaturas`
--
ALTER TABLE `usuarios_asignaturas`
  ADD CONSTRAINT `usuarios_asignaturas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE,
  ADD CONSTRAINT `usuarios_asignaturas_ibfk_2` FOREIGN KEY (`id_asignatura`) REFERENCES `asignaturas` (`id_asignatura`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
