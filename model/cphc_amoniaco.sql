-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-05-2025 a las 03:09:26
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cphc_amoniaco`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `complejos_petroquimicos`
--

CREATE TABLE `complejos_petroquimicos` (
  `nombre_complejo` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `ubicacion_complejo` varchar(200) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `complejos_petroquimicos`
--

INSERT INTO `complejos_petroquimicos` (`nombre_complejo`, `ubicacion_complejo`, `descripcion`) VALUES
('Complejo Petroquímico Hugo Chávez', 'Morón - Edo Carabobo - Venezuela', 'El Complejo Petroquímico Hugo Chávez , ubicado en las costas del estado Carabobo, cerca de Morón, es una instalación clave en la industria petroquímica venezolana. Inició sus operaciones en 1956, con una capacidad inicial de 150 mil toneladas métricas anuales (MTMA) de fertilizantes nitrogenados y fosfatados, expandiéndose a 600 MTMA entre 1966 y 1969.\r\nSu producción está enfocada en la manufactura de urea, sulfato de amonio (SAM) y fertilizantes granulados NPK/NP, además de productos intermedios como ácido sulfúrico, fosfórico y amoníaco esenciales para la elaboración de fertilizantes.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id_equipo` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Identificador unico del equipo',
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Nombre de equipo',
  `id_planta` int(50) NOT NULL,
  `id_proceso` int(11) NOT NULL COMMENT 'donde se encuentra componente dañado',
  `observacion` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Breve descripcion',
  `estado` enum('rojo','amarillo','verde') CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT 'verde' COMMENT 'rojo, amarillo , verde',
  `ultima_revision` date NOT NULL COMMENT 'fecha de ultima revision'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id_equipo`, `nombre`, `id_planta`, `id_proceso`, `observacion`, `estado`, `ultima_revision`) VALUES
('30097086 ', 'Compu', 0, 125, 'SOL', 'verde', '2025-05-22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE `incidencias` (
  `id_incidencia` int(100) NOT NULL COMMENT 'identificador unico',
  `id_equipo` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'relacion con tabla de equipo',
  `id_usuario` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `fecha_reporte` date NOT NULL COMMENT 'fecha en la que se regist\r\nro \r\nla incidencia',
  `prioridad` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'alta, baja, media',
  `estado_solucion` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '¿esta resuelta? si/no',
  `observacion` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'descripcion de la incidencia',
  `fecha_solucion` date NOT NULL COMMENT 'fecha de resolucion'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `incidencias`
--

INSERT INTO `incidencias` (`id_incidencia`, `id_equipo`, `id_usuario`, `fecha_reporte`, `prioridad`, `estado_solucion`, `observacion`, `fecha_solucion`) VALUES
(4, '30097086 ', '30097086 ', '2025-05-20', 'verde', 'No', 'Esta malito', '2025-05-21'),
(5, '30097086 ', '14655764 ', '2025-05-20', 'verde', 'No', 'NONONO', '2025-05-21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento`
--

CREATE TABLE `mantenimiento` (
  `id_mantenimiento` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'identificador unico',
  `id_repuesto` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_equipo` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'relacionado con la tabla de equipo',
  `tipo_mantenimiento` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'correctivo o preventivo',
  `id_incidencia` int(100) NOT NULL,
  `estado_anterior` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `estado_nuevo` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `observacion` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'detalle del mantenimiento realizado',
  `fecha_mantenimiento` date NOT NULL COMMENT 'fecha en la que se ejecuto',
  `id_responsable` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'persona o equipo encargado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantas`
--

CREATE TABLE `plantas` (
  `id_planta` int(50) NOT NULL,
  `nombre_complejo` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nombre_planta` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `plantas`
--

INSERT INTO `plantas` (`id_planta`, `nombre_complejo`, `nombre_planta`, `descripcion`) VALUES
(0, 'Complejo Petroquímico Hugo Chávez', 'Amoniaco', 'aaaaaaa'),
(1, 'Complejo Petroquímico Hugo Chávez', 'Urea', 'Planta urea');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procesos`
--

CREATE TABLE `procesos` (
  `id_proceso` int(11) NOT NULL,
  `id_planta` int(50) NOT NULL,
  `nombre_proceso` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `estado_proceso` enum('rojo','amarillo','verde') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `procesos`
--

INSERT INTO `procesos` (`id_proceso`, `id_planta`, `nombre_proceso`, `estado_proceso`) VALUES
(125, 0, 'Uno', 'verde'),
(126, 1, 'Dos', 'amarillo'),
(127, 0, 'Tres', 'rojo'),
(128, 1, 'Cuatro', 'rojo'),
(129, 0, 'Cinco', 'verde');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repuesto`
--

CREATE TABLE `repuesto` (
  `id_repuesto` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `estado` enum('solicitado','en_transito','recibido') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `costo` int(11) NOT NULL,
  `fecha_solicitud` datetime NOT NULL,
  `fecha_recepcion` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsables`
--

CREATE TABLE `responsables` (
  `id_responsable` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `departamento` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(50) NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'supervisor/admin/tecnico',
  `permisos` longtext CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre`, `permisos`) VALUES
(1, 'Trabajador', 'Equisde'),
(2, 'administrador', 'lalalala'),
(3, '', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesiones`
--

CREATE TABLE `sesiones` (
  `id_usuario` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'identificador unico de usuario',
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'nombre completo',
  `id_rol` int(50) NOT NULL COMMENT 'rol del usuario',
  `telefono` int(50) NOT NULL COMMENT '0412-1234567',
  `fecha_creacion` varchar(100) DEFAULT current_timestamp(),
  `activo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `id_rol`, `telefono`, `fecha_creacion`, `activo`) VALUES
('14655764 ', 'edion', 2, 416643618, '2025-05-05 13:33:00', 1),
('30097086 ', 'miguel', 1, 2147483647, '2025-05-08 20:00:00', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `complejos_petroquimicos`
--
ALTER TABLE `complejos_petroquimicos`
  ADD PRIMARY KEY (`nombre_complejo`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id_equipo`),
  ADD KEY `equipo_proceso` (`id_proceso`),
  ADD KEY `equipo_planta` (`id_planta`);

--
-- Indices de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD PRIMARY KEY (`id_incidencia`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_equipo` (`id_equipo`);

--
-- Indices de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD PRIMARY KEY (`id_mantenimiento`),
  ADD KEY `id_equipo` (`id_equipo`),
  ADD KEY `mantenimiento_responsable` (`id_responsable`),
  ADD KEY `mantinimiento_repuesto` (`id_repuesto`),
  ADD KEY `mantenimiento_incidencia` (`id_incidencia`);

--
-- Indices de la tabla `plantas`
--
ALTER TABLE `plantas`
  ADD PRIMARY KEY (`id_planta`),
  ADD KEY `nombre_planta` (`nombre_planta`),
  ADD KEY `nombre_complejo` (`nombre_complejo`),
  ADD KEY `nombre_planta_2` (`nombre_planta`);

--
-- Indices de la tabla `procesos`
--
ALTER TABLE `procesos`
  ADD PRIMARY KEY (`id_proceso`),
  ADD KEY `proceso_planta` (`id_planta`);

--
-- Indices de la tabla `repuesto`
--
ALTER TABLE `repuesto`
  ADD PRIMARY KEY (`id_repuesto`);

--
-- Indices de la tabla `responsables`
--
ALTER TABLE `responsables`
  ADD PRIMARY KEY (`id_responsable`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`,`nombre`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  MODIFY `id_incidencia` int(100) NOT NULL AUTO_INCREMENT COMMENT 'identificador unico', AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `plantas`
--
ALTER TABLE `plantas`
  MODIFY `id_planta` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `procesos`
--
ALTER TABLE `procesos`
  MODIFY `id_proceso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `equipo_planta` FOREIGN KEY (`id_planta`) REFERENCES `plantas` (`id_planta`),
  ADD CONSTRAINT `equipo_proceso` FOREIGN KEY (`id_proceso`) REFERENCES `procesos` (`id_proceso`);

--
-- Filtros para la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD CONSTRAINT `incidencias_equipo` FOREIGN KEY (`id_equipo`) REFERENCES `equipos` (`id_equipo`),
  ADD CONSTRAINT `incidencias_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD CONSTRAINT `mantenimiento_equipo` FOREIGN KEY (`id_equipo`) REFERENCES `equipos` (`id_equipo`),
  ADD CONSTRAINT `mantenimiento_incidencia` FOREIGN KEY (`id_incidencia`) REFERENCES `incidencias` (`id_incidencia`),
  ADD CONSTRAINT `mantenimiento_responsable` FOREIGN KEY (`id_responsable`) REFERENCES `responsables` (`id_responsable`),
  ADD CONSTRAINT `mantinimiento_repuesto` FOREIGN KEY (`id_repuesto`) REFERENCES `repuesto` (`id_repuesto`);

--
-- Filtros para la tabla `plantas`
--
ALTER TABLE `plantas`
  ADD CONSTRAINT `planta_complejo` FOREIGN KEY (`nombre_complejo`) REFERENCES `complejos_petroquimicos` (`nombre_complejo`);

--
-- Filtros para la tabla `procesos`
--
ALTER TABLE `procesos`
  ADD CONSTRAINT `proceso_planta` FOREIGN KEY (`id_planta`) REFERENCES `plantas` (`id_planta`);

--
-- Filtros para la tabla `sesiones`
--
ALTER TABLE `sesiones`
  ADD CONSTRAINT `sesion_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuario_rol` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
