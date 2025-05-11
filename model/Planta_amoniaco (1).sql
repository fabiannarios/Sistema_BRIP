-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 22-04-2025 a las 19:47:35
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
-- Base de datos: `Planta_amoniaco`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `complejos_petroquimicos`
--

CREATE TABLE `complejos_petroquimicos` (
  `id_complejo` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `ubicacion` varchar(150) DEFAULT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `complejos_petroquimicos`
--

INSERT INTO `complejos_petroquimicos` (`id_complejo`, `nombre`, `ubicacion`, `descripcion`) VALUES
(1, 'Complejo Petroquímico Hugo Chávez', 'Morón, Estado Carabobo', NULL),
(2, 'Complejo Petroquímico Ana María Campos', 'El Tablazo, Estado Zulia', NULL),
(3, 'Complejo Petroquímico G/D José Antonio Anzoátegui', 'Estado Anzoátegui', NULL),
(4, 'Fertilizantes de Oriente', 'Estado Anzoátegui', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id_equipo` varchar(20) NOT NULL,
  `id_planta` int(11) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  `modelo` varchar(50) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `ubicacion` varchar(100) NOT NULL,
  `estado_actual` enum('rojo','amarillo','verde') DEFAULT 'verde',
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id_equipo`, `id_planta`, `nombre`, `modelo`, `marca`, `ubicacion`, `estado_actual`, `descripcion`) VALUES
('EQ001', 1, 'Motor A1', NULL, NULL, 'Línea 1', 'rojo', NULL),
('EQ002', 1, 'Bomba B2', NULL, NULL, 'Línea 2', 'verde', NULL),
('EQ003', 3, 'Compresor C1', NULL, NULL, 'Línea 1', 'amarillo', NULL),
('EQ004', 4, 'Reactor R1', NULL, NULL, 'Sección 1', 'verde', NULL),
('EQ005', 5, 'Mezclador M1', NULL, NULL, 'Sección 2', 'rojo', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_equipo`
--

CREATE TABLE `estados_equipo` (
  `id_estado` int(11) NOT NULL,
  `id_equipo` varchar(20) DEFAULT NULL,
  `estado` enum('rojo','amarillo','verde') NOT NULL,
  `fecha_cambio` datetime NOT NULL,
  `notas` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etapas_predefinidas`
--

CREATE TABLE `etapas_predefinidas` (
  `id_etapa_predefinida` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `etapas_predefinidas`
--

INSERT INTO `etapas_predefinidas` (`id_etapa_predefinida`, `nombre`, `descripcion`) VALUES
(1, 'Diagnóstico', 'Identificación de la causa raíz del problema'),
(2, 'Solicitud de Repuestos', 'Solicitud de los repuestos necesarios'),
(3, 'Recepción de Repuestos', 'Confirmación de llegada de repuestos'),
(4, 'Reparación Inicial', 'Reparaciones mecánicas o eléctricas iniciales'),
(5, 'Pruebas Preliminares', 'Pruebas iniciales para verificar funcionalidad parcial'),
(6, 'Ajustes Finales', 'Ajustes necesarios tras pruebas preliminares'),
(7, 'Pruebas Finales', 'Pruebas completas para validar operatividad al 100%'),
(8, 'Validación Operativa', 'Confirmación de retorno a estado verde');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `etapas_reparacion`
--

CREATE TABLE `etapas_reparacion` (
  `id_etapa` int(11) NOT NULL,
  `id_reparacion` int(11) DEFAULT NULL,
  `id_etapa_predefinida` int(11) DEFAULT NULL,
  `fecha_inicio` datetime DEFAULT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `porcentaje_completitud` decimal(5,2) DEFAULT 0.00,
  `notas` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_mantenimiento`
--

CREATE TABLE `historial_mantenimiento` (
  `id_mantenimiento` int(11) NOT NULL,
  `id_equipo` varchar(20) DEFAULT NULL,
  `tipo` enum('preventivo','correctivo') NOT NULL,
  `fecha` datetime NOT NULL,
  `descripcion` text NOT NULL,
  `id_responsable` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantas`
--

CREATE TABLE `plantas` (
  `id_planta` int(11) NOT NULL,
  `id_complejo` int(11) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  `codigo` varchar(20) DEFAULT NULL,
  `descripcion` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `plantas`
--

INSERT INTO `plantas` (`id_planta`, `id_complejo`, `nombre`, `codigo`, `descripcion`) VALUES
(1, 1, 'Planta de Amoniaco 1', 'AM-HC01', NULL),
(2, 1, 'Planta de Urea', 'UR-HC01', NULL),
(3, 2, 'Planta de Etileno', 'ET-AMC01', NULL),
(4, 3, 'Planta de Polietileno', 'PE-JAA01', NULL),
(5, 4, 'Planta de Fertilizantes', 'FT-FO01', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reparaciones`
--

CREATE TABLE `reparaciones` (
  `id_reparacion` int(11) NOT NULL,
  `id_equipo` varchar(20) DEFAULT NULL,
  `fecha_deteccion` datetime NOT NULL,
  `descripcion_problema` text NOT NULL,
  `id_responsable` int(11) DEFAULT NULL,
  `fecha_estimada_fin` datetime DEFAULT NULL,
  `fecha_real_fin` datetime DEFAULT NULL,
  `causa_falla` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repuestos`
--

CREATE TABLE `repuestos` (
  `id_repuesto` int(11) NOT NULL,
  `id_reparacion` int(11) DEFAULT NULL,
  `nombre` varchar(100) NOT NULL,
  `estado` enum('en_stock','solicitado','en_transito','recibido') DEFAULT 'solicitado',
  `costo` decimal(10,2) DEFAULT NULL,
  `fecha_solicitud` datetime DEFAULT NULL,
  `fecha_recepcion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsables`
--

CREATE TABLE `responsables` (
  `id_responsable` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `tipo` enum('tecnico','departamento') DEFAULT 'tecnico'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `permisos` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`permisos`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesiones`
--

CREATE TABLE `sesiones` (
  `id_sesion` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `token_sesion` varchar(255) NOT NULL,
  `fecha_inicio` datetime DEFAULT current_timestamp(),
  `fecha_fin` datetime DEFAULT NULL,
  `ip_origen` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `nombre_completo` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT current_timestamp(),
  `activo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `complejos_petroquimicos`
--
ALTER TABLE `complejos_petroquimicos`
  ADD PRIMARY KEY (`id_complejo`);

--
-- Indices de la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD PRIMARY KEY (`id_equipo`),
  ADD KEY `id_planta` (`id_planta`);

--
-- Indices de la tabla `estados_equipo`
--
ALTER TABLE `estados_equipo`
  ADD PRIMARY KEY (`id_estado`),
  ADD KEY `id_equipo` (`id_equipo`);

--
-- Indices de la tabla `etapas_predefinidas`
--
ALTER TABLE `etapas_predefinidas`
  ADD PRIMARY KEY (`id_etapa_predefinida`);

--
-- Indices de la tabla `etapas_reparacion`
--
ALTER TABLE `etapas_reparacion`
  ADD PRIMARY KEY (`id_etapa`),
  ADD KEY `id_reparacion` (`id_reparacion`),
  ADD KEY `id_etapa_predefinida` (`id_etapa_predefinida`);

--
-- Indices de la tabla `historial_mantenimiento`
--
ALTER TABLE `historial_mantenimiento`
  ADD PRIMARY KEY (`id_mantenimiento`),
  ADD KEY `id_equipo` (`id_equipo`),
  ADD KEY `id_responsable` (`id_responsable`);

--
-- Indices de la tabla `plantas`
--
ALTER TABLE `plantas`
  ADD PRIMARY KEY (`id_planta`),
  ADD UNIQUE KEY `codigo` (`codigo`),
  ADD KEY `id_complejo` (`id_complejo`);

--
-- Indices de la tabla `reparaciones`
--
ALTER TABLE `reparaciones`
  ADD PRIMARY KEY (`id_reparacion`),
  ADD KEY `id_equipo` (`id_equipo`),
  ADD KEY `id_responsable` (`id_responsable`);

--
-- Indices de la tabla `repuestos`
--
ALTER TABLE `repuestos`
  ADD PRIMARY KEY (`id_repuesto`),
  ADD KEY `id_reparacion` (`id_reparacion`);

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
  ADD PRIMARY KEY (`id_sesion`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `nombre_usuario` (`nombre_usuario`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `complejos_petroquimicos`
--
ALTER TABLE `complejos_petroquimicos`
  MODIFY `id_complejo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estados_equipo`
--
ALTER TABLE `estados_equipo`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `etapas_reparacion`
--
ALTER TABLE `etapas_reparacion`
  MODIFY `id_etapa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historial_mantenimiento`
--
ALTER TABLE `historial_mantenimiento`
  MODIFY `id_mantenimiento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `plantas`
--
ALTER TABLE `plantas`
  MODIFY `id_planta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `reparaciones`
--
ALTER TABLE `reparaciones`
  MODIFY `id_reparacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `repuestos`
--
ALTER TABLE `repuestos`
  MODIFY `id_repuesto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `responsables`
--
ALTER TABLE `responsables`
  MODIFY `id_responsable` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  MODIFY `id_sesion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `equipos`
--
ALTER TABLE `equipos`
  ADD CONSTRAINT `equipos_ibfk_1` FOREIGN KEY (`id_planta`) REFERENCES `plantas` (`id_planta`);

--
-- Filtros para la tabla `estados_equipo`
--
ALTER TABLE `estados_equipo`
  ADD CONSTRAINT `estados_equipo_ibfk_1` FOREIGN KEY (`id_equipo`) REFERENCES `equipos` (`id_equipo`);

--
-- Filtros para la tabla `etapas_reparacion`
--
ALTER TABLE `etapas_reparacion`
  ADD CONSTRAINT `etapas_reparacion_ibfk_1` FOREIGN KEY (`id_reparacion`) REFERENCES `reparaciones` (`id_reparacion`),
  ADD CONSTRAINT `etapas_reparacion_ibfk_2` FOREIGN KEY (`id_etapa_predefinida`) REFERENCES `etapas_predefinidas` (`id_etapa_predefinida`);

--
-- Filtros para la tabla `historial_mantenimiento`
--
ALTER TABLE `historial_mantenimiento`
  ADD CONSTRAINT `historial_mantenimiento_ibfk_1` FOREIGN KEY (`id_equipo`) REFERENCES `equipos` (`id_equipo`),
  ADD CONSTRAINT `historial_mantenimiento_ibfk_2` FOREIGN KEY (`id_responsable`) REFERENCES `responsables` (`id_responsable`);

--
-- Filtros para la tabla `plantas`
--
ALTER TABLE `plantas`
  ADD CONSTRAINT `plantas_ibfk_1` FOREIGN KEY (`id_complejo`) REFERENCES `complejos_petroquimicos` (`id_complejo`);

--
-- Filtros para la tabla `reparaciones`
--
ALTER TABLE `reparaciones`
  ADD CONSTRAINT `reparaciones_ibfk_1` FOREIGN KEY (`id_equipo`) REFERENCES `equipos` (`id_equipo`),
  ADD CONSTRAINT `reparaciones_ibfk_2` FOREIGN KEY (`id_responsable`) REFERENCES `responsables` (`id_responsable`);

--
-- Filtros para la tabla `repuestos`
--
ALTER TABLE `repuestos`
  ADD CONSTRAINT `repuestos_ibfk_1` FOREIGN KEY (`id_reparacion`) REFERENCES `reparaciones` (`id_reparacion`);

--
-- Filtros para la tabla `sesiones`
--
ALTER TABLE `sesiones`
  ADD CONSTRAINT `sesiones_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
