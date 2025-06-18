-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-06-2025 a las 17:34:31
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

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
  `nombre_complejo` varchar(100) CHARACTER SET utf8 NOT NULL,
  `ubicacion_complejo` varchar(200) CHARACTER SET utf8 NOT NULL,
  `descripcion` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `id_equipo` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT 'Identificador unico del equipo',
  `nombre` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT 'Nombre de equipo',
  `id_planta` int(50) NOT NULL,
  `id_proceso` int(11) NOT NULL COMMENT 'donde se encuentra componente dañado',
  `observacion` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT 'Breve descripcion',
  `estado` enum('rojo','amarillo','verde') CHARACTER SET utf8 DEFAULT 'verde' COMMENT 'rojo, amarillo , verde',
  `ultima_revision` date NOT NULL COMMENT 'fecha de ultima revision'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id_equipo`, `nombre`, `id_planta`, `id_proceso`, `observacion`, `estado`, `ultima_revision`) VALUES
(' C04 ', 'Tanque C4 ', 0, 106, 'Disponible', 'verde', '2025-06-07'),
(' C08', 'Intercambiador C8', 0, 106, 'Necesita limpieza', 'amarillo', '2025-06-07'),
(' HD-001 ', 'Reactor de Hidro Desulfuracion', 0, 100, 'En condiciones  ', 'verde', '2024-06-06'),
(' HD-008', 'Válvula de Control', 0, 100, ' Fuga leve ', 'amarillo', '2025-06-06'),
(' M04', 'Compresor M4', 0, 105, 'Disponible', 'verde', '2025-06-07'),
(' PCT-004    ', 'Intercambiador de Calor D      ', 1, 307, 'Disponible', 'verde', '2025-06-08'),
(' R03  ', 'Evaporador R3', 0, 107, 'Averiado', 'rojo', '2025-06-07'),
(' R06', 'Termómetro R6', 0, 107, 'Disponible', 'verde', '2025-06-07'),
(' RS-005', 'Compresor', 0, 102, 'Ruido inusual', 'amarillo', '2025-06-07'),
(' RS-010', 'Bomba de Circulación', 0, 102, 'Necesita mantenimiento preventivo', 'amarillo', '2025-06-07'),
('C01', 'Compresor C1', 0, 106, 'Disponible', 'verde', '2025-06-07'),
('C02', 'Enfriador C2', 0, 106, 'Averiado', 'rojo', '2025-06-07'),
('C03', 'Bomba C3', 0, 106, 'Necesita mantenimiento', 'amarillo', '2025-06-07'),
('C05  ', 'Valvula C5', 0, 106, 'Necesita ajuste ', 'verde', '2025-06-07'),
('C06 ', 'Medidor C6', 0, 106, 'Disponible  ', 'verde', '2025-06-07'),
('C07 ', 'Ventilador C7', 0, 106, 'Disponible ', 'verde', '2025-06-07'),
('C09', 'Filtro C9', 0, 106, 'Averiado  ', 'rojo', '2025-06-07'),
('C10', 'Estructura C10', 0, 106, 'Disponible ', 'verde', '2025-06-07'),
('CAB-001 ', 'Reactor de Conversion', 0, 103, 'En condiciones', 'verde', '2025-06-07'),
('CAB-002', 'Calentador', 0, 103, 'Falla en el piloto de encendido', 'rojo', '2025-06-07'),
('CAB-003', 'Intercambiador de Calor', 0, 103, 'En condiciones', 'verde', '2025-06-07'),
('CAB-004', 'Separador', 0, 103, 'En condiciones', 'verde', '2025-06-07'),
('CAB-005', ' Compresor', 0, 103, 'Presión baja', 'amarillo', '2025-06-07'),
('CAB-006', 'Ventilador', 0, 103, ' Ruidos extraños', 'amarillo', '2025-06-07'),
('CAB-007 ', 'Bomba de Recirculacion', 0, 103, 'En condiciones', 'verde', '2025-06-07'),
('CAB-008', 'Controlador de Temperatura', 0, 103, 'En condiciones', 'verde', '2025-06-07'),
('CAB-009 ', 'Valvula de Seguridad', 0, 103, 'Fuga leve', 'verde', '2025-06-07'),
('CAB-010', 'Sistema de Control', 0, 103, 'En condiciones  ', 'verde', '2025-06-07'),
('CO2-001', 'Compresor CO2 A', 1, 300, 'Disponible', 'verde', '2025-06-08'),
('CO2-002', 'Compresor CO2 B', 1, 300, 'Necesita reparación menor   ', 'amarillo', '2025-06-08'),
('CO2-003', 'Compresor CO2 C', 1, 300, 'Averiado', 'rojo', '2025-06-08'),
('CO2-004', 'Compresor CO2 D', 1, 300, 'Disponible', 'verde', '2025-06-08'),
('CO2-005', 'Compresor CO2 E', 1, 300, 'Disponible', 'verde', '2025-06-08'),
('CON-001    ', 'Evaporador Concentracion A', 1, 306, 'Averiado', 'rojo', '2025-06-08'),
('CON-002    ', 'Evaporador Concentración B     ', 1, 306, 'Disponible         ', 'verde', '2025-06-08'),
('CON-003    ', '| Evaporador Concentración C     ', 1, 306, 'Necesita limpieza', 'amarillo', '2025-06-08'),
('CON-004    ', 'Evaporador Concentración D     ', 1, 306, 'Disponible', 'verde', '2025-06-08'),
('CON-005    ', 'Evaporador Concentración E     ', 1, 306, 'Necesita revisión estructural', 'amarillo', '2025-06-08'),
('GRAN-001', 'Granulador A                   ', 1, 308, 'Disponible', 'verde', '2025-06-09'),
('GRAN-002   ', 'Granulador B                   ', 1, 308, 'Necesita mantenimiento', 'amarillo', '2025-06-09'),
('GRAN-003', 'Granulador C ', 1, 308, 'Averiado', 'rojo', '2025-06-09'),
('GRAN-004   ', 'Granulador D', 1, 308, 'Disponible', 'verde', '2025-06-09'),
('GRAN-005', ' Granulador E', 1, 308, 'Necesita ajuste en válvulas ', 'amarillo', '2025-06-09'),
('HD-002', 'Calentador', 0, 100, 'Falla en el termostato', 'amarillo', '2023-06-08'),
('HD-003 ', 'Separador', 0, 100, 'En condiciones  ', 'verde', '2024-01-03'),
('HD-004 ', 'Compresor', 0, 100, 'Ruido inusua', 'amarillo', '2023-10-20'),
('HD-005', 'iltro de partículas', 0, 100, 'Acumulación de residuos', 'rojo', '2025-06-23'),
('HD-006 ', 'Bomba de Circulación ', 0, 100, 'En condiciones', 'verde', '2025-06-27'),
('HD-007', 'Intercambiador de Calor', 0, 100, 'En condiciones', 'verde', '2025-06-11'),
('HD-009', 'Sistema de Monitoreo', 0, 100, ' En condiciones', 'verde', '2025-06-01'),
('HD-010', 'Tanque de Almacenamiento', 0, 100, 'En condiciones ', 'verde', '2025-06-06'),
('M01', 'Reactor M1', 0, 105, 'Disponible ', 'verde', '2025-06-07'),
('M02', 'Calentador M2', 0, 105, 'Necesita reparación de válvula', 'amarillo', '2025-06-07'),
('M03', 'Intercambiador M3', 0, 105, 'Averiado ', 'rojo', '2025-06-07'),
('M05 ', 'Estructura M5', 0, 105, 'Disponible', 'verde', '2025-06-07'),
('M06', 'Medidor M6', 0, 105, 'Necesita calibración', 'amarillo', '2025-06-07'),
('M07', 'Ventilador M7', 0, 105, 'Disponible ', 'verde', '2025-06-07'),
('M08', 'Tanque M8', 0, 105, 'Averiado', 'rojo', '2025-06-07'),
('M09', 'Filtro M9', 0, 105, 'Disponible', 'verde', '2025-06-07'),
('M10', ' Bomba M10', 0, 105, 'Necesita reemplazo de sello', 'amarillo', '2025-06-07'),
('N2-001     ', 'Compresor Nitrógeno A', 1, 301, 'Disponible', 'verde', '2025-06-08'),
('N2-002', 'Compresor Nitrógeno B', 1, 301, 'Necesita ajuste en valvula', 'amarillo', '2025-06-08'),
('N2-003', 'Compresor Nitrógeno D', 1, 301, 'Disponible', 'verde', '2025-06-08'),
('N2-004', 'Compresor Nitrógeno D          ', 1, 301, ' Disponible ', 'verde', '2025-06-08'),
('N2-005', 'Compresor Nitrógeno E', 1, 301, 'Disponible', 'verde', '2025-06-08'),
('NH3-001', 'Bomba Amoníaco A', 1, 302, 'Disponible', 'verde', '2025-06-08'),
('NH3-002', 'Bomba Amoníaco B', 1, 302, 'Necesita mantenimiento', 'amarillo', '2025-06-08'),
('NH3-003', 'Bomba Amoníaco C', 1, 302, 'Averiada ', 'rojo', '2025-06-08'),
('NH3-004', 'Bomba Amoníaco D', 1, 302, 'Disponible', 'verde', '2025-06-08'),
('NH3-005    ', 'Bomba Amoniaco E               ', 1, 302, ' Disponible', 'verde', '2025-06-08'),
('PCT-001    ', 'Intercambiador de Calor A      ', 1, 307, 'Disponible', 'verde', '2025-06-08'),
('PCT-002    ', 'Intercambiador de Calor B      ', 1, 307, 'Averiado ', 'rojo', '2025-06-08'),
('PCT-003    ', 'Intercambiador de Calor C      ', 1, 307, 'Necesita cambio de tuberías ', 'amarillo', '2025-06-08'),
('PCT-005    ', 'Intercambiador de Calor E      ', 1, 307, 'Necesita ajuste en válvulas ', 'amarillo', '2025-06-08'),
('POLV-001 ', 'Filtro Recuperación A', 1, 310, 'Disponible ', 'verde', '2025-06-09'),
('POLV-002', 'Filtro Recuperación B', 1, 310, 'Averiado', 'rojo', '2025-06-09'),
('POLV-003', 'Filtro Recuperación C', 1, 310, 'Necesita mantenimiento', 'amarillo', '2025-06-09'),
('POLV-004', 'Filtro Recuperación D', 1, 310, 'Disponible   ', 'verde', '2025-06-09'),
('POLV-005', 'Filtro Recuperación E', 1, 310, 'Necesita ajuste en sellos   ', 'amarillo', '2025-06-09'),
('PUR-001    ', 'Filtro Purificación A          ', 1, 305, 'Disponible                  ', 'verde', '2025-06-08'),
('PUR-002    ', 'Filtro Purificación B          ', 1, 305, 'Necesita ajuste en sellos   ', 'amarillo', '2025-06-08'),
('PUR-003    ', 'Filtro Purificación C          ', 1, 305, 'Averiado', 'rojo', '2025-06-08'),
('PUR-004    ', 'Filtro Purificación D          ', 1, 305, 'Disponible', 'verde', '2025-06-08'),
('PUR-005    ', 'Filtro Purificación E          ', 1, 305, 'Necesita mantenimiento      ', 'amarillo', '2025-06-08'),
('R01', 'Compresor R1', 0, 107, 'Disponible', 'verde', '2025-06-07'),
('R02', 'Condensador R2', 0, 107, 'Necesita limpieza', 'amarillo', '2025-06-07'),
('R04 ', 'Bomba R4 ', 0, 107, 'Disponible', 'verde', '2025-06-07'),
('R05', 'Válvula R5', 0, 107, 'Necesita ajuste', 'amarillo', '2025-06-07'),
('R07', 'Intercambiador R7', 0, 107, 'Disponible ', 'verde', '2025-06-07'),
('R08 ', 'Medidor R8', 0, 107, 'Averiado', 'rojo', '2025-06-07'),
('R09', 'Filtro R9', 0, 107, 'Disponible   ', 'verde', '2025-06-07'),
('R10 ', 'Estructura R10', 0, 107, 'Necesita reparación de soldadura', 'amarillo', '2025-06-07'),
('RCO2-001', 'Absorbente de CO2 ', 0, 104, 'En condiciones ', 'verde', '2025-06-07'),
('RCO2-002', 'Columnas de Absorción', 0, 104, 'Fugas menores en las juntas', 'amarillo', '2025-06-07'),
('RCO2-003', 'Compresor', 0, 104, 'En condiciones', 'verde', '2025-06-07'),
('RCO2-004', 'Bomba de Vacío', 0, 104, 'En condiciones', 'verde', '2025-06-07'),
('RCO2-005 ', 'Medidor de Flujo', 0, 104, 'Calibración necesaria ', 'amarillo', '2025-06-07'),
('RCO2-006', 'Sistema de Control', 0, 104, ' En condiciones      ', 'verde', '2025-06-07'),
('RCO2-007', 'Filtro', 0, 104, 'Obstrucción leve', 'amarillo', '2025-06-07'),
('RCO2-008', 'ntercambiador de Calor', 0, 104, 'En condiciones', 'verde', '2025-06-07'),
('RCO2-009', 'Válvula de Seguridad', 0, 104, 'Prueba de operación pendiente', 'amarillo', '2025-06-07'),
('RCO2-010', 'Tanque de almacenamiento', 0, 104, 'En condiciones', 'verde', '2025-06-07'),
('REC-001    ', 'Unidad de Recuperacion A       ', 1, 304, 'Disponible      ', 'verde', '2025-06-08'),
('REC-002    ', 'Unidad de Recuperacion B       ', 1, 304, 'Necesita ajuste en tuberías ', 'amarillo', '2025-06-08'),
('REC-003    ', '| Unidad de Recuperacion C', 1, 304, 'Disponible', 'verde', '2025-06-08'),
('REC-004', 'Unidad de Recuperación C', 1, 304, 'diponible', 'verde', '2025-06-08'),
('REC-005    ', 'Unidad de Recuperación E       ', 1, 304, 'Averiado', 'rojo', '2025-06-08'),
('RG-001', 'Sistema de Reciclo A ', 1, 309, ' Averiado', 'rojo', '2025-06-09'),
('RG-002    ', 'Sistema de Reciclo B', 1, 309, 'Disponible', 'verde', '2025-06-09'),
('RG-003', 'Sistema de Reciclo C', 1, 309, 'Necesita ajuste en tuberías ', 'amarillo', '2025-06-09'),
('RG-004', 'Sistema de Reciclo D', 1, 309, 'Disponible  ', 'verde', '2025-06-09'),
('RG-005', 'Sistema de Reciclo E', 1, 309, 'Necesita revisión estructural ', 'amarillo', '2025-06-09'),
('RP-001', 'Reformador', 0, 101, 'En condiciones', 'verde', '2025-06-06'),
('RP-002', ' Calentador ', 0, 101, 'Termómetro descalibrado', 'amarillo', '2025-06-06'),
('RP-003', 'Intercambiador de Calor', 0, 101, 'En condiciones', 'verde', '2025-06-06'),
('RP-004', 'Separador', 0, 101, 'En condiciones  ', 'verde', '2025-06-06'),
('RP-005', 'Compresor', 0, 101, 'Fuga en la manguera  ', 'rojo', '2025-06-06'),
('RP-006', 'Reacción de Shift', 0, 101, 'En condiciones ', 'verde', '2025-06-06'),
('RP-007', 'Tanque de Almacenamiento', 0, 101, 'En condiciones  ', 'verde', '2025-06-06'),
('RP-008', ' Válvula de Seguridad', 0, 101, ' En condiciones  ', 'verde', '2025-06-06'),
('RP-009', ' Filtro de gas', 0, 101, 'Obstrucción leve  ', 'amarillo', '2025-06-07'),
('RP-010', ' Sistema de Control', 0, 101, 'condiciones', 'verde', '2025-06-07'),
('RS-001', 'Reformador Secundario', 0, 102, 'En condiciones ', 'verde', '2025-06-07'),
('RS-002 ', 'Calentador', 0, 102, 'Falla en el sensor', 'amarillo', '2025-06-07'),
('RS-003', 'Intercambiador de Calor', 0, 102, 'En condiciones', 'verde', '2025-06-07'),
('RS-004', 'Separador', 0, 102, 'En condiciones', 'verde', '2025-06-07'),
('RS-006', 'Tanque de Almacenamiento', 0, 102, 'En condiciones', 'verde', '2025-06-07'),
('RS-007', 'Filtro', 0, 102, ' Obstrucción', 'rojo', '2025-06-07'),
('RS-008', 'Válvula de Control', 0, 102, 'En condiciones ', 'verde', '2025-06-07'),
('RS-009', 'Sistema de Monitoreo', 0, 102, 'falla', 'rojo', '2025-06-07'),
('SYN-001    ', 'Reactor de Síntesis A         ', 1, 303, 'Disponible  ', 'verde', '2025-06-08'),
('SYN-002    ', 'Reactor de Síntesis B         ', 1, 303, 'Necesita revisión de presión ', 'amarillo', '2025-06-08'),
('SYN-003    ', 'Reactor de Síntesis C         ', 1, 303, ' Averiado                    ', 'rojo', '2025-06-08'),
('SYN-004    ', 'Reactor de Síntesis D         ', 1, 303, 'mantenimiento', 'amarillo', '2025-06-08'),
('SYN-005    ', 'Reactor de Síntesis E         ', 1, 303, 'Disponible', 'verde', '2025-06-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE `incidencias` (
  `id_incidencia` int(100) NOT NULL COMMENT 'identificador unico',
  `id_equipo` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT 'relacion con tabla de equipo',
  `id_usuario` varchar(100) CHARACTER SET utf8 NOT NULL,
  `fecha_reporte` date NOT NULL COMMENT 'fecha en la que se regist\r\nro \r\nla incidencia',
  `prioridad` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT 'alta, baja, media',
  `estado_solucion` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT '¿esta resuelta? si/no',
  `observacion` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT 'descripcion de la incidencia',
  `fecha_solucion` date NOT NULL COMMENT 'fecha de resolucion'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `incidencias`
--

INSERT INTO `incidencias` (`id_incidencia`, `id_equipo`, `id_usuario`, `fecha_reporte`, `prioridad`, `estado_solucion`, `observacion`, `fecha_solucion`) VALUES
(14, 'GRAN-003', '30009775 ', '2025-06-10', 'alta', 'en proceso', 'Bloqueo de material en la cámara de granulación, lo que impide el flujo adecuado de urea.', '2025-06-11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento`
--

CREATE TABLE `mantenimiento` (
  `id_mantenimiento` int(50) NOT NULL COMMENT 'identificador unico',
  `id_repuesto` varchar(100) CHARACTER SET utf8 NOT NULL,
  `id_equipo` varchar(100) CHARACTER SET utf8 DEFAULT NULL COMMENT 'relacionado con la tabla de equipo',
  `tipo_mantenimiento` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT 'correctivo, preventivo o predictivo',
  `id_incidencia` int(100) NOT NULL,
  `estado_anterior` varchar(100) CHARACTER SET utf8 NOT NULL,
  `estado_nuevo` varchar(100) CHARACTER SET utf8 NOT NULL,
  `observacion` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT 'detalle del mantenimiento realizado',
  `fecha_mantenimiento` date NOT NULL COMMENT 'fecha en la que se ejecuto',
  `id_responsable` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT 'persona o equipo encargado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `plantas`
--

CREATE TABLE `plantas` (
  `id_planta` int(50) NOT NULL,
  `nombre_complejo` varchar(100) CHARACTER SET utf8 NOT NULL,
  `nombre_planta` varchar(100) CHARACTER SET utf8 NOT NULL,
  `descripcion` text CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `plantas`
--

INSERT INTO `plantas` (`id_planta`, `nombre_complejo`, `nombre_planta`, `descripcion`) VALUES
(0, 'Complejo Petroquímico Hugo Chávez', 'Amoniaco', 'aaaaaaa'),
(1, 'Complejo Petroquímico Hugo Chávez', 'Urea', 'Planta urea'),
(2, 'Complejo Petroquímico Hugo Chávez', 'Servicios Industriales 2', 'aaaaaaaaaaaaaaaaaaaaaaa'),
(3, 'Complejo Petroquímico Hugo Chávez', 'Fertilizantes', 'aaaaaaaaaaaaaaaa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procesos`
--

CREATE TABLE `procesos` (
  `id_proceso` int(11) NOT NULL,
  `id_planta` int(50) NOT NULL,
  `nombre_proceso` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `procesos`
--

INSERT INTO `procesos` (`id_proceso`, `id_planta`, `nombre_proceso`) VALUES
(100, 0, 'Hidro Desulfuracion'),
(101, 0, 'Reformacion Primaria'),
(102, 0, 'Reforma Secundaria'),
(103, 0, 'Conversion de Alta y Baja Temperatura'),
(104, 0, 'Remocion de CO2'),
(105, 0, 'Metanacion'),
(106, 0, 'Compresion y Sintesis'),
(107, 0, 'Sistema de Refigeracion de Amoniaco (NH3)'),
(200, 2, 'Toma de Agua de Mar y Generador de Hipoclorito (TAM)'),
(201, 2, 'Sistema de Agua de Enfriamiento (AEN)'),
(202, 2, 'Desalinizadora 65 MT3/H (DES)'),
(203, 2, 'Sistema de Agua de Servicio (ADS) y Sistema Contra Incendio (SC2)'),
(204, 2, 'Planta de Agua 106 Fosfatado'),
(205, 2, 'Sistema de Agua Desmineralizada y Fosfatado 103A y 103'),
(206, 2, 'Sistema de Agua Pulida (ALP) Nitrogenado'),
(207, 2, 'Sistema de Generacion de Vapor (SGV)'),
(208, 2, 'Sistema de Gas Natural'),
(209, 2, 'Sistema de Generacion Electrica y Fosfatado'),
(210, 2, 'Sub Estacion Electrica 3'),
(211, 2, 'Aire de Servicio-Nitrogenado'),
(212, 2, 'Aire de Servicio-Fosfatado INST 112 AC4 '),
(213, 2, 'Tanque de Amoniaco/RLC/Envios'),
(300, 1, 'COMPRESION CO2'),
(301, 1, 'COMPRESION DE NITROGENO'),
(302, 1, 'BOMBEO DE AMONIACO (NH3) LIQUIDO'),
(303, 1, 'SECCION DE SINTESIS'),
(304, 1, 'SECCION DE RECUPERACION'),
(305, 1, 'SECCION DE PURIFICACION'),
(306, 1, 'SECCION DE CONSENTRACION'),
(307, 1, 'TRATAMIENTO DE CONDENSADO DE PROCESO -PCT'),
(308, 1, 'SECCION DE GRANULACION'),
(309, 1, 'RECICLO GRANULADOS'),
(310, 1, 'RECUPERACION DE POLVOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repuesto`
--

CREATE TABLE `repuesto` (
  `id_repuesto` varchar(100) CHARACTER SET utf8 NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 NOT NULL,
  `estado` enum('solicitado','en_transito','recibido') CHARACTER SET utf8 NOT NULL,
  `costo` int(11) NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `fecha_recepcion` date NOT NULL,
  `cantidad` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Volcado de datos para la tabla `repuesto`
--

INSERT INTO `repuesto` (`id_repuesto`, `nombre`, `estado`, `costo`, `fecha_solicitud`, `fecha_recepcion`, `cantidad`) VALUES
('123456987456aaa', 'Tarjeta grafica', 'recibido', 120000, '2025-05-25', '2025-05-30', 0),
('nnnnnnn', 'Bomba', 'en_transito', 130000, '2025-06-01', '2025-06-03', 1),
('Ps-qurtda', 'Manivela', 'solicitado', 12500, '2025-05-25', '2025-06-06', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsables`
--

CREATE TABLE `responsables` (
  `id_responsable` varchar(100) CHARACTER SET utf8 NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
  `departamento` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Volcado de datos para la tabla `responsables`
--

INSERT INTO `responsables` (`id_responsable`, `nombre`, `departamento`) VALUES
('30009775', 'Fabianna Rios', 'AIT'),
('30097086', 'miguel', 'ti');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(50) NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT 'supervisor/admin/tecnico',
  `permisos` longtext CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `nombre`, `permisos`) VALUES
(1, 'Trabajador', 'Equisde'),
(2, 'administrador', 'lalalala');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesiones`
--

CREATE TABLE `sesiones` (
  `id_usuario` varchar(100) CHARACTER SET utf8 NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32;

--
-- Volcado de datos para la tabla `sesiones`
--

INSERT INTO `sesiones` (`id_usuario`, `fecha_inicio`, `fecha_fin`) VALUES
('14655764', '2025-06-07 15:16:00', '2025-06-02 13:34:00'),
('30009775', '2025-06-07 23:11:00', '2025-06-04 23:24:00'),
('30097086', '2025-06-07 15:17:00', '2025-05-28 20:37:00'),
('8606676', '2025-06-07 15:17:00', '2025-06-05 07:37:00'),
('admin', '2025-06-10 11:31:00', '2025-05-28 21:15:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT 'identificador unico de usuario',
  `nombre` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT 'nombre completo',
  `id_rol` int(50) NOT NULL COMMENT 'rol del usuario',
  `telefono` int(50) NOT NULL COMMENT '0412-1234567',
  `fecha_creacion` varchar(100) DEFAULT current_timestamp(),
  `activo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `id_rol`, `telefono`, `fecha_creacion`, `activo`) VALUES
('14655764 ', 'edion', 2, 416643618, '2025-05-05 13:33:00', 1),
('30009775 ', 'fabianna', 1, 2147483647, '2025-06-04T23:23', 1),
('30097086 ', 'miguel', 1, 2147483647, '2025-05-08 20:00:00', 1),
('8606676 ', 'fabio', 1, 2147483647, '2025-06-05T07:35', 1),
('admin ', 'admin', 2, 2147483647, '2025-05-26T21:25', 1);

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
  ADD PRIMARY KEY (`id_usuario`);

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
  MODIFY `id_incidencia` int(100) NOT NULL AUTO_INCREMENT COMMENT 'identificador unico', AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  MODIFY `id_mantenimiento` int(50) NOT NULL AUTO_INCREMENT COMMENT 'identificador unico', AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `plantas`
--
ALTER TABLE `plantas`
  MODIFY `id_planta` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `procesos`
--
ALTER TABLE `procesos`
  MODIFY `id_proceso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=311;

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
  ADD CONSTRAINT `equipo_planta` FOREIGN KEY (`id_planta`) REFERENCES `plantas` (`id_planta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `equipo_proceso` FOREIGN KEY (`id_proceso`) REFERENCES `procesos` (`id_proceso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD CONSTRAINT `incidencias_equipo` FOREIGN KEY (`id_equipo`) REFERENCES `equipos` (`id_equipo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `incidencias_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD CONSTRAINT `mantenimiento_equipo` FOREIGN KEY (`id_equipo`) REFERENCES `equipos` (`id_equipo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mantenimiento_incidencia` FOREIGN KEY (`id_incidencia`) REFERENCES `incidencias` (`id_incidencia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mantenimiento_responsable` FOREIGN KEY (`id_responsable`) REFERENCES `responsables` (`id_responsable`) ON DELETE CASCADE ON UPDATE CASCADE,
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
  ADD CONSTRAINT `sesion_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuario_rol` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
