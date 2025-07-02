-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-06-2025 a las 01:50:44
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
('Complejo Petroquímico Ana María Campos', 'municipio Miranda, estado Zulia', 'Este complejo tiene una capacidad instalada de 3,5 millones de toneladas métricas anuales (MMTMA) y se especializa en la producción de olefinas, resinas plásticas, vinilos y fertilizantes nitrogenados'),
('Complejo Petroquímico G/D José Antonio Anzoátegui', 'Barcelona y Puerto Píritu - Anzoátegui - Venezuela', 'Este complejo tiene una superficie de 740 hectáreas y alberga diversas plantas industriales, incluyendo producción de metanol, urea y amoníaco'),
('Complejo Petroquímico Hugo Chávez', 'Morón - Edo Carabobo - Venezuela', 'El Complejo Petroquímico Hugo Chávez , ubicado en las costas del estado Carabobo, cerca de Morón, es una instalación clave en la industria petroquímica venezolana. Inició sus operaciones en 1956, con una capacidad inicial de 150 mil toneladas métricas anuales (MTMA) de fertilizantes nitrogenados y fosfatados, expandiéndose a 600 MTMA entre 1966 y 1969.\r\nSu producción está enfocada en la manufactura de urea, sulfato de amonio (SAM) y fertilizantes granulados NPK/NP, además de productos intermedios como ácido sulfúrico, fosfórico y amoníaco esenciales para la elaboración de fertilizantes.'),
('Fertilizantes de Oriente', 'Ubicada en el Complejo Petroquímico José Antonio Anzoátegui, en el estado Anzoátegui.', 'Esta planta produce principalmente urea y otros fertilizantes nitrogenados, y se estima que cubre hasta el 93 % de la demanda nacional para el sector agrícola, con capacidad también para exportación.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE `equipos` (
  `id_equipo` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Identificador unico del equipo',
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'Nombre de equipo',
  `id_planta` int(50) NOT NULL,
  `id_proceso` int(11) NOT NULL COMMENT 'donde se encuentra componente dañado',
  `observacion` longtext CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'Breve descripcion',
  `estado` enum('rojo','amarillo','verde') CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT 'verde' COMMENT 'rojo, amarillo , verde',
  `ultima_revision` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'fecha de ultima revision'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `equipos`
--

INSERT INTO `equipos` (`id_equipo`, `nombre`, `id_planta`, `id_proceso`, `observacion`, `estado`, `ultima_revision`) VALUES
(' C08', 'Intercambiador C8', 0, 106, 'Necesita limpieza', 'amarillo', '2025-06-07'),
(' HD-001 ', 'Reactor de Hidro Desulfuracion', 0, 100, 'En condiciones  ', 'verde', '2024-06-06'),
(' HD-008', 'Válvula de Control', 0, 100, ' Fuga leve ', 'amarillo', '2025-06-06'),
(' M04', 'Compresor M4', 0, 105, 'Disponible', 'verde', '2025-06-07'),
(' R03  ', 'Evaporador R3', 0, 107, 'Averiado', 'rojo', '2025-06-07'),
(' R06', 'Termómetro R6', 0, 107, 'Disponible', 'verde', '2025-06-07'),
(' RS-005', 'Compresor', 0, 102, 'Ruido inusual', 'amarillo', '2025-06-07'),
(' RS-010', 'Bomba de Circulación', 0, 102, 'Necesita mantenimiento preventivo', 'amarillo', '2025-06-07'),
('C01', 'Compresor C1', 0, 106, 'Disponible', 'verde', '2025-06-07'),
('C02', 'Enfriador C2', 0, 106, 'Averiado', 'rojo', '2025-06-07'),
('C03', 'Bomba C3', 0, 106, 'Necesita mantenimiento', 'amarillo', '2025-06-07'),
('C04', 'Tanque C4', 0, 106, 'Disponible', 'rojo', '2025-06-07'),
('C05  ', 'Valvula C5', 0, 106, 'Necesita ajuste ', 'verde', '2025-06-07'),
('C06 ', 'Medidor C6', 0, 106, 'Disponible  ', 'verde', '2025-06-07'),
('C07 ', 'Ventilador C7', 0, 106, 'Disponible ', 'verde', '2025-06-07'),
('C08', 'Intercambiador C8', 0, 106, 'Necesita limpieza', 'rojo', '2025-06-07'),
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
('HD-001', 'Reactor de Hidro Desulfuracion', 0, 100, 'En condiciones', 'rojo', '2024-06-06'),
('HD-002', 'Calentador', 0, 100, 'Falla en el termostato', 'amarillo', '2023-06-08'),
('HD-003 ', 'Separador', 0, 100, 'En condiciones  ', 'verde', '2024-01-03'),
('HD-004 ', 'Compresor', 0, 100, 'Ruido inusua', 'amarillo', '2023-10-20'),
('HD-005', 'iltro de partículas', 0, 100, 'Acumulación de residuos', 'rojo', '2025-06-23'),
('HD-006 ', 'Bomba de Circulación ', 0, 100, 'En condiciones', 'verde', '2025-06-27'),
('HD-007', 'Intercambiador de Calor', 0, 100, 'En condiciones', 'verde', '2025-06-11'),
('HD-008', 'Válvula de Control', 0, 100, 'Fuga leve', 'rojo', '2025-06-06'),
('HD-009', 'Sistema de Monitoreo', 0, 100, ' En condiciones', 'verde', '2025-06-01'),
('HD-010', 'Tanque de Almacenamiento', 0, 100, 'En condiciones ', 'verde', '2025-06-06'),
('M01', 'Reactor M1', 0, 105, 'Disponible ', 'verde', '2025-06-07'),
('M02', 'Calentador M2', 0, 105, 'Necesita reparación de válvula', 'amarillo', '2025-06-07'),
('M03', 'Intercambiador M3', 0, 105, 'Averiado ', 'rojo', '2025-06-07'),
('M04', 'Compresor M4', 0, 105, 'Disponible', 'rojo', '2025-06-07'),
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
('R03', 'Evaporador R3', 0, 107, 'Averiado', 'rojo', '2025-06-07'),
('R04 ', 'Bomba R4 ', 0, 107, 'Disponible', 'verde', '2025-06-07'),
('R05', 'Válvula R5', 0, 107, 'Necesita ajuste', 'amarillo', '2025-06-07'),
('R06', 'Termómetro R6', 0, 107, 'Disponible', 'rojo', '2025-06-07'),
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
('RS-005', 'Compresor', 0, 102, 'Ruido inusual', 'rojo', '2025-06-07'),
('RS-006', 'Tanque de Almacenamiento', 0, 102, 'En condiciones', 'verde', '2025-06-07'),
('RS-007', 'Filtro', 0, 102, ' Obstrucción', 'rojo', '2025-06-07'),
('RS-008', 'Válvula de Control', 0, 102, 'En condiciones ', 'verde', '2025-06-07'),
('RS-009', 'Sistema de Monitoreo', 0, 102, 'falla', 'rojo', '2025-06-07'),
('RS-010', 'Bomba de Circulación', 0, 102, 'Necesita mantenimiento preventivo', 'rojo', '2025-06-07'),
('SI2-ADF103-001', 'Columna de resinas ', 2, 205, 'Saturación de lecho', 'rojo', '2025-06-05'),
('SI2-ADF103-002', 'Bomba de pretratamiento ', 2, 205, 'disponible', 'verde', '2025-06-11'),
('SI2-ADF103-003', 'Medidor de conductividad', 2, 205, 'Señal inestable', 'amarillo', '2025-06-07'),
('SI2-ADF103-004', 'Intercambiador de calor', 2, 205, 'disponible', 'verde', '2025-06-15'),
('SI2-ADF103-005', 'Válvula de retención', 2, 205, 'disponible', 'verde', '2025-06-13'),
('SI2-ADF103-006', 'Filtro de cartucho', 2, 205, 'Obstrucción rápida', 'rojo', '2025-06-03'),
('SI2-ADF103-007', 'Panel de control', 2, 205, 'disponible', 'verde', '2025-06-14'),
('SI2-ADF103-008', 'Sensor de nivel ', 2, 205, 'Lectura fuera de rango', 'amarillo', '2025-06-06'),
('SI2-ADF103-009', 'Bomba de recirculación ', 2, 205, 'disponible', 'verde', '2025-06-12'),
('SI2-ADF103-010', 'Válvula de control ', 2, 205, 'disponible', 'verde', '2025-06-10'),
('SI2-ADF103-011', 'Medidor de presión', 2, 205, 'Caída súbita de presión', 'rojo', '2025-06-04'),
('SI2-ADF103-012', 'Analizador de metales', 2, 205, 'disponible', 'verde', '2025-06-15'),
('SI2-ADF103-013', 'Tubería de succión', 2, 205, 'Corrosión interna', 'amarillo', '2025-06-08'),
('SI2-ADF103-014', 'Válvula proporcional', 2, 205, 'Fuga en sello', 'amarillo', '2025-06-09'),
('SI2-ADF103-015', 'Panel de instrumentación', 2, 205, 'disponible', 'verde', '2025-06-15'),
('SI2-ADS-001', 'Bomba de servicio', 2, 203, 'Ruido excesivo', 'amarillo', '2025-06-06'),
('SI2-ADS-002', 'Tanque de almacenamiento ', 2, 203, 'disponible', 'verde', '2025-06-11'),
('SI2-ADS-003', 'Válvula motorizada ', 2, 203, 'Falla en actuador', 'rojo', '2025-06-04'),
('SI2-ADS-004', 'Panel contra incendio', 2, 203, 'disponible', 'verde', '2025-06-15'),
('SI2-ADS-005', 'Sensor de flujo', 2, 203, 'Lectura nula', 'rojo', '2025-06-02'),
('SI2-ADS-006', 'Red contra incendio', 2, 203, 'disponible', 'verde', '2025-06-12'),
('SI2-ADS-007', 'Medidor de presión', 2, 203, 'disponible', 'verde', '2025-06-10'),
('SI2-ADS-008', 'Bomba jockey ', 2, 203, 'Pérdida de rendimiento', 'amarillo', '2025-06-08'),
('SI2-ADS-009', 'Sensor de nivel ', 2, 203, 'disponible', 'verde', '2025-06-14'),
('SI2-ADS-010', 'Válvula de retención', 2, 203, 'disponible', 'verde', '2025-06-13'),
('SI2-ADS-011', 'Bomba de emergencia', 2, 203, 'Fuga en empaque', 'rojo', '2025-06-05'),
('SI2-ADS-012', 'Alarma de presión', 2, 203, 'Falso disparo', 'amarillo', '2025-06-07'),
('SI2-ADS-013', 'Conexiones rápidas ', 2, 203, 'disponible', 'verde', '2025-06-15'),
('SI2-ADS-014', 'Tubería principal ', 2, 203, ' Vibración', 'amarillo', '2025-06-09'),
('SI2-ADS-015', 'Válvula de alivio', 2, 203, 'disponible', 'verde', '2025-06-12'),
('SI2-AEN-001', 'Bomba de enfriamiento', 2, 201, 'Fuga de refrigerante', 'rojo', '2025-06-03'),
('SI2-AEN-002', 'Torre de enfriamiento', 2, 201, 'Corrosión en relleno', 'amarillo', '2025-06-09'),
('SI2-AEN-003', 'Ventilador axial ', 2, 201, 'disponible', 'verde', '2025-06-12'),
('SI2-AEN-004', 'Intercambiador de placas ', 2, 201, 'Obstrucción de placas', 'amarillo', '2025-06-05'),
('SI2-AEN-005', 'Válvula de control', 2, 201, 'disponible', 'verde', '2025-06-15'),
('SI2-AEN-006', 'Sensor de temperatura ', 2, 201, ' Lectura errática', 'amarillo', '2025-06-07'),
('SI2-AEN-007', 'Bomba de recirculación', 2, 201, 'disponible', 'verde', '2025-06-14'),
('SI2-AEN-008', 'Panel de control', 2, 201, 'Falla en display', 'rojo', '2025-06-08'),
('SI2-AEN-009', 'Filtro de entrada', 2, 201, 'Obstrucción filtrante', 'rojo', '2025-06-11'),
('SI2-AEN-010', 'Manómetro de presión', 2, 201, 'disponible', 'verde', '2025-06-13'),
('SI2-AEN-011', 'Válvula de alivio', 2, 201, ' Liberación prematura', 'amarillo', '2025-06-06'),
('SI2-AEN-012', 'Medidor de caudal', 2, 201, ' Señal intermitente', 'amarillo', '2025-06-10'),
('SI2-AEN-013', 'Bomba recirculación', 2, 201, 'disponible', 'verde', '2025-06-15'),
('SI2-AEN-014', 'Sensor de nivel ', 2, 201, 'Calibración fuera de rango', 'rojo', '2025-06-04'),
('SI2-AEN-015', 'Enfriador de circuito cerrado', 2, 201, 'disponible', 'verde', '2025-06-15'),
('SI2-APL-001', 'Bomba pulida ', 2, 206, 'disponible', 'verde', '2025-06-13'),
('SI2-APL-002', 'Intercambiador de placas', 2, 206, 'Fuga de agua', 'rojo', '2025-06-04'),
('SI2-APL-003', 'Sensor de turbidez', 2, 206, 'disponible', 'verde', '2025-06-15'),
('SI2-APL-004', 'Válvula de control', 2, 206, 'Atasco', 'amarillo', '2025-06-06'),
('SI2-APL-005', 'Medidor de caudal ', 2, 206, 'disponible', 'verde', '2025-06-12'),
('SI2-APL-006', 'Panel de control ', 2, 206, ' Falla en PLC', 'rojo', '2025-06-03'),
('SI2-APL-007', 'Bomba de recirculación', 2, 206, 'disponible', 'verde', '2025-06-14'),
('SI2-APL-008', 'Sensor pH', 2, 206, 'Lectura errática', 'amarillo', '2025-06-08'),
('SI2-APL-009', 'Válvula check ', 2, 206, 'disponible', 'verde', '2025-06-11'),
('SI2-APL-010', 'Filtro de membrana', 2, 206, 'disponible', 'verde', '2025-06-10'),
('SI2-APL-011', 'Analizador de conductividad', 2, 206, 'Señal intermitente', 'amarillo', '2025-06-07'),
('SI2-APL-012', 'Manómetro', 2, 206, 'disponible', 'verde', '2025-06-15'),
('SI2-APL-013', 'Tubería de alta presión', 2, 206, 'Vibración', 'amarillo', '2025-06-09'),
('SI2-APL-014', 'Panel de instrumentos', 2, 206, 'disponible', 'verde', '2025-06-13'),
('SI2-APL-015', 'Válvula de alivio', 2, 206, 'disponible', 'verde', '2025-06-12'),
('SI2-ASF112-001', 'Compresor de aire', 2, 212, 'disponible', 'verde', '2025-06-15'),
('SI2-ASF112-002', 'Secador por adsorción ', 2, 212, 'Saturación de desecante', 'amarillo', '2025-06-07'),
('SI2-ASF112-003', 'Filtro coalescedor ', 2, 212, 'disponible', 'verde', '2025-06-13'),
('SI2-ASF112-004', 'Panel de control ', 2, 212, 'disponible', 'verde', '2025-06-12'),
('SI2-ASF112-005', 'Regulador de presión', 2, 212, 'Falla en actuador', 'rojo', '2025-06-05'),
('SI2-ASF112-006', 'Sensor de humedad ', 2, 212, 'disponible', 'verde', '2025-06-14'),
('SI2-ASF112-007', 'Tanque de almacenamiento ', 2, 212, 'Acumulación de condensado', 'amarillo', '2025-06-08'),
('SI2-ASF112-008', 'Sensor de presión ', 2, 212, 'disponible', 'verde', '2025-06-13'),
('SI2-ASF112-009', 'Válvula de alivio ', 2, 212, 'Disparo por presión falsa', 'rojo', '2025-06-06'),
('SI2-ASF112-010', 'Manómetro ', 2, 212, 'disponible', 'verde', '2025-06-14'),
('SI2-ASF112-011', 'Tubería de distribución ', 2, 212, 'disponible', 'verde', '2025-06-12'),
('SI2-ASF112-012', 'Panel de instrumentos ', 2, 212, 'disponible', 'verde', '2025-06-15'),
('SI2-ASF112-013', 'Filtro de aceite', 2, 212, 'Saturación de elemento', 'amarillo', '2025-06-09'),
('SI2-ASF112-014', 'Regulador de caudal ', 2, 212, 'disponible', 'verde', '2025-06-13'),
('SI2-ASF112-015', 'Válvula neumática ', 2, 212, 'Respuesta lenta', 'amarillo', '2025-06-07'),
('SI2-ASN-001', 'Compresor de aire ', 2, 211, 'disponible', 'verde', '2025-06-13'),
('SI2-ASN-002', 'Secador frigorífico', 2, 211, 'Pérdida de frío', 'amarillo', '2025-06-07'),
('SI2-ASN-003', 'Filtro separador ', 2, 211, 'disponible', 'verde', '2025-06-15'),
('SI2-ASN-004', 'Panel de control', 2, 211, 'no disponible', 'rojo', '2025-06-04'),
('SI2-ASN-005', 'Regulador de presión ', 2, 211, 'disponible', 'verde', '2025-06-14'),
('SI2-ASN-006', 'Medidor de caudal ', 2, 211, 'disponible', 'verde', '2025-06-12'),
('SI2-ASN-007', 'Válvula de retención ', 2, 211, 'disponible', 'verde', '2025-06-10'),
('SI2-ASN-008', 'Sensor de humedad ', 2, 211, 'Lectura errática', 'amarillo', '2025-06-09'),
('SI2-ASN-009', 'Manómetro ', 2, 211, 'disponible', 'verde', '2025-06-11'),
('SI2-ASN-010', 'Tubería principal ', 2, 211, 'disponible', 'verde', '2025-06-13'),
('SI2-ASN-011', 'Filtro de carbón', 2, 211, 'Obstrucción rápida', 'rojo', '2025-06-06'),
('SI2-ASN-012', 'Válvula de alivio', 2, 211, 'disponible', 'verde', '2025-06-15'),
('SI2-ASN-013', 'Panel de instrumentación ', 2, 211, 'disponible', 'verde', '2025-06-14'),
('SI2-ASN-014', 'Bomba de condensado', 2, 211, 'Cavitación', 'amarillo', '2025-06-08'),
('SI2-ASN-015', 'Bomba de condensado', 2, 211, 'disponible', 'verde', '2025-06-12'),
('SI2-DES-001', 'Columna destilación ', 2, 202, 'Pérdida de vacío', 'rojo', '2025-06-02'),
('SI2-DES-002', 'Condensador', 2, 202, 'disponible', 'verde', '2025-06-11'),
('SI2-DES-003', 'Bomba de alimentación', 2, 202, ' Cavitación detectada', 'amarillo', '2025-06-06'),
('SI2-DES-004', 'Válvula de control ', 2, 202, 'disponible', 'verde', '2025-06-15'),
('SI2-DES-005', 'Sensor de nivel', 2, 202, 'Lectura intermitente', 'rojo', '2025-06-05'),
('SI2-DES-006', 'Filtro de malla ', 2, 202, 'disponible', 'verde', '2025-06-09'),
('SI2-DES-007', 'Intercambiador de calor', 2, 202, 'Fuga interna', 'amarillo', '2025-06-08'),
('SI2-DES-008', 'Panel de control ', 2, 202, 'disponible', 'verde', '2025-06-14'),
('SI2-DES-009', 'Medidor de conductividad ', 2, 202, 'Señal fuera de rango', 'amarillo', '2025-06-07'),
('SI2-DES-010', 'Bomba de recirculación', 2, 202, 'disponible', 'verde', '2025-06-13'),
('SI2-DES-011', 'Válvula de alivio', 2, 202, 'disponible', 'verde', '2025-06-12'),
('SI2-DES-012', 'Sensor de presión', 2, 202, 'Oscilaciones de presión', 'rojo', '2025-06-03'),
('SI2-DES-013', 'Compresor de brine ', 2, 202, 'disponible', 'verde', '2025-06-15'),
('SI2-DES-014', 'Tubería de succión', 2, 202, 'Corrosión interna', 'amarillo', '2025-06-04'),
('SI2-DES-015', 'Válvula check ', 2, 202, 'disponible', 'verde', '2025-06-10'),
('SI2-PA106-001', 'Bomba fosfatado', 2, 204, 'Obstrucción interna', 'rojo', '2025-06-03'),
('SI2-PA106-002', 'Filtro de cerámica', 2, 204, 'disponible', 'verde', '2025-06-12'),
('SI2-PA106-003', 'Intercambiador de calor', 2, 204, 'Corrosión en placas', 'amarillo', '2025-06-07'),
('SI2-PA106-004', 'Tanque de mezcla', 2, 204, 'disponible', 'verde', '2025-06-15'),
('SI2-PA106-005', 'Sensor pH ', 2, 204, 'Calibración desfasada', 'rojo', '2025-06-05'),
('SI2-PA106-006', 'Medidor de caudal ', 2, 204, 'disponible', 'verde', '2025-06-11'),
('SI2-PA106-007', 'Válvula de control ', 2, 204, 'disponible', 'verde', '2025-06-10'),
('SI2-PA106-008', 'Panel de control', 2, 204, 'Falla en PLC', 'rojo', '2025-06-04'),
('SI2-PA106-009', 'Bomba de recirculación', 2, 204, 'Cavitación', 'amarillo', '2025-06-09'),
('SI2-PA106-010', 'Sensor de turbidez ', 2, 204, 'disponible', 'verde', '2025-06-14'),
('SI2-PA106-011', 'Válvula de alivio ', 2, 204, 'disponible', 'verde', '2025-06-13'),
('SI2-PA106-012', 'Filtro de membrana', 2, 204, 'Rotura de fibras', 'rojo', '2025-06-02'),
('SI2-PA106-013', 'Analizador de fósforo', 2, 204, 'disponible', 'verde', '2025-06-15'),
('SI2-PA106-014', 'Tubería de distribución', 2, 204, 'Fuga', 'amarillo', '2025-06-06'),
('SI2-PA106-015', 'Válvula check ', 2, 204, 'disponible', 'verde', '2025-06-12'),
('SI2-SEE3-001', 'Transformador de fuerza ', 2, 210, 'disponible', 'verde', '2025-06-15'),
('SI2-SEE3-002', 'Seccionador', 2, 210, 'disponible', 'verde', '2025-06-12'),
('SI2-SEE3-003', 'Interruptor de potencia', 2, 210, 'Falla de apertura', 'rojo', '2025-06-04'),
('SI2-SEE3-004', 'Relé de protección', 2, 210, 'disponible', 'verde', '2025-06-14'),
('SI2-SEE3-005', 'Panel de control', 2, 210, 'Interferencia eléctrica', 'amarillo', '2025-06-08'),
('SI2-SEE3-006', 'Protección diferencial', 2, 210, 'disponible', 'verde', '2025-06-11'),
('SI2-SEE3-007', 'Barra colectora', 2, 210, 'disponible', 'verde', '2025-06-10'),
('SI2-SEE3-008', 'Conexiones de tierra', 2, 210, 'disponible', 'verde', '2025-06-13'),
('SI2-SEE3-009', 'Manómetro de aceite', 2, 210, 'Caída de presión', 'amarillo', '2025-06-06'),
('SI2-SEE3-010', 'Indicador de vacío', 2, 210, 'disponible', 'verde', '2025-06-15'),
('SI2-SEE3-011', 'Protección contra sobretensión', 2, 210, 'Disparo errático', 'amarillo', '2025-06-07'),
('SI2-SEE3-012', 'Panel de instrumentación', 2, 210, 'disponible', 'verde', '2025-06-14'),
('SI2-SEE3-013', 'Sensor de temperatura ', 2, 210, 'disponible', 'verde', '2025-06-09'),
('SI2-SEE3-014', 'Tubería de aceite', 2, 210, 'disponible', 'verde', '2025-06-13'),
('SI2-SEE3-015', 'Filtro de aceite ', 2, 210, 'Obstrucción de filtro', 'rojo', '2025-06-05'),
('SI2-SGEF-001', 'Generador eléctrico', 2, 209, 'disponible', 'verde', '2025-06-14'),
('SI2-SGEF-002', 'Transformador principal ', 2, 209, 'Sobrecalentamiento', 'amarillo', '2025-06-07'),
('SI2-SGEF-003', 'Panel de distribución', 2, 209, 'disponible', 'verde', '2025-06-15'),
('SI2-SGEF-004', 'Interruptor de potencia ', 2, 209, 'disponible', 'verde', '2025-06-12'),
('SI2-SGEF-005', 'Regulador de voltaje ', 2, 209, 'Oscilaciones', 'rojo', '2025-06-05'),
('SI2-SGEF-006', 'Sensor de corriente', 2, 209, 'disponible', 'verde', '2025-06-13'),
('SI2-SGEF-007', 'Conexiones de barra ', 2, 209, 'Flojedad en bornes', 'amarillo', '2025-06-06'),
('SI2-SGEF-008', 'Transformador auxiliar', 2, 209, 'disponible', 'verde', '2025-06-11'),
('SI2-SGEF-009', 'Protección diferencial', 2, 209, 'disponible', 'verde', '2025-06-10'),
('SI2-SGEF-010', 'Panel de control', 2, 209, 'Reinicios espontáneos', 'amarillo', '2025-06-08'),
('SI2-SGEF-011', 'Válvula de refrigeración', 2, 209, 'disponible', 'verde', '2025-06-15'),
('SI2-SGEF-012', 'Circuito de excitación', 2, 209, ' Pérdida de excitación', 'rojo', '2025-06-04'),
('SI2-SGEF-013', 'Manómetro', 2, 209, 'disponible', 'verde', '2025-06-14'),
('SI2-SGEF-014', 'Tubería de aceite', 2, 209, 'Fuga leve', 'amarillo', '2025-06-09'),
('SI2-SGEF-015', 'Panel de instrumentación', 2, 209, 'disponible', 'verde', '2025-06-13'),
('SI2-SGN-001', 'Compresor de gas', 2, 208, 'disponible', 'verde', '2025-06-13'),
('SI2-SGN-002', 'Filtro coalescedor ', 2, 208, 'Obstrucción', 'rojo', '2025-06-05'),
('SI2-SGN-003', 'Medidor de flujo ', 2, 208, 'disponible', 'verde', '2025-06-15'),
('SI2-SGN-004', 'Válvula de seguridad ', 2, 208, 'Liberación fuga', 'amarillo', '2025-06-07'),
('SI2-SGN-005', 'Regulador de presión', 2, 208, 'disponible', 'verde', '2025-06-12'),
('SI2-SGN-006', 'Panel de control ', 2, 208, 'Falla en display', 'rojo', '2025-06-03'),
('SI2-SGN-007', 'Sensor de presión ', 2, 208, 'disponible', 'verde', '2025-06-14'),
('SI2-SGN-008', 'Tubería de suministro', 2, 208, 'Corrosión interna', 'amarillo', '2025-06-08'),
('SI2-SGN-009', 'Manómetro', 2, 208, 'disponible', 'verde', '2025-06-11'),
('SI2-SGN-010', 'Válvula de retención ', 2, 208, 'disponible', 'verde', '2025-06-10'),
('SI2-SGN-011', 'Bomba de alivio ', 2, 208, 'Ruido anómalo', 'amarillo', '2025-06-06'),
('SI2-SGN-012', 'Analizador de H₂S ', 2, 208, 'disponible', 'verde', '2025-06-15'),
('SI2-SGN-013', 'Regulador de vacío', 2, 208, 'Sellos gastados', 'rojo', '2025-06-04'),
('SI2-SGN-014', 'Tubería de descarga ', 2, 208, 'disponible', 'verde', '2025-06-13'),
('SI2-SGN-015', 'Panel de instrumentación', 2, 208, 'disponible', 'verde', '2025-06-12'),
('SI2-SGV-001', 'Caldera de vapor', 2, 207, 'disponible', 'verde', '2025-06-14'),
('SI2-SGV-002', 'Turbina de vapor ', 2, 207, 'Desbalance en rotor', 'amarillo', '2025-06-07'),
('SI2-SGV-003', 'Superheater', 2, 207, 'disponible', 'verde', '2025-06-15'),
('SI2-SGV-004', 'Válvula de vapor', 2, 207, 'Fuga en empaquetadura', 'rojo', '2025-06-04'),
('SI2-SGV-005', 'Separator ', 2, 207, 'disponible', 'verde', '2025-06-12'),
('SI2-SGV-006', 'Panel de control ', 2, 207, 'Falla de PLC', 'rojo', '2025-06-03'),
('SI2-SGV-007', 'Bomba de alimentación ', 2, 207, 'disponible', 'verde', '2025-06-13'),
('SI2-SGV-008', 'Economizer', 2, 207, 'Corrosión', 'amarillo', '2025-06-08'),
('SI2-SGV-009', 'Sensor de presión', 2, 207, 'disponible', 'verde', '2025-06-11'),
('SI2-SGV-010', 'Manómetro', 2, 207, 'disponible', 'verde', '2025-06-10'),
('SI2-SGV-011', 'Válvula de alivio', 2, 207, 'Disparo prematuro', 'amarillo', '2025-06-06'),
('SI2-SGV-012', 'Condensador ', 2, 207, 'disponible', 'verde', '2025-06-15'),
('SI2-SGV-013', 'Medidor de caudal', 2, 207, 'Señal inestable', 'amarillo', '2025-06-09'),
('SI2-SGV-014', 'Tubería de vapor ', 2, 207, 'disponible', 'verde', '2025-06-14'),
('SI2-SGV-015', 'Panel de instrumentos', 2, 207, 'disponible', 'verde', '2025-06-12'),
('SI2-TAM-001', 'Bomba de mar', 2, 200, 'Vibración excesiva en rodamiento', 'amarillo', '2025-06-12'),
('SI2-TAM-002', 'Filtro 200', 2, 200, 'Pérdida de presión alta', 'rojo', '2025-06-05'),
('SI2-TAM-003', 'Medidor de caudal', 2, 200, 'Señal irregular de flujo', 'amarillo', '2025-06-10'),
('SI2-TAM-004', 'Válvula de retención ', 2, 200, 'Fuga en sello', 'rojo', '2025-06-08'),
('SI2-TAM-005', 'Intercambiador de calor', 2, 200, 'Corrosión interna detectada', 'amarillo', '2025-06-11'),
('SI2-TAM-006', 'Analizador de salinidad', 2, 200, 'disponible', 'verde', '2025-06-15'),
('SI2-TAM-007', 'Bomba dosificadora de hipoclorito ', 2, 200, 'Sedimentación en tubería', 'rojo', '2025-06-07'),
('SI2-TAM-008', 'Tanque de hipoclorito 1 ', 2, 200, 'disponible', 'verde', '2025-06-13'),
('SI2-TAM-009', 'Agitador de tanque ', 2, 200, 'Ruido anómalo', 'amarillo', '2025-06-09'),
('SI2-TAM-010', 'Sensor pH ', 2, 200, 'disponible', 'verde', '2025-06-14'),
('SI2-TAM-011', 'Bomba recirculación', 2, 200, 'Caudal bajo', 'amarillo', '2025-06-06'),
('SI2-TAM-012', 'Panel eléctrico ', 2, 200, 'disponible', 'verde', '2025-06-15'),
('SI2-TAM-013', 'Unidad de dosificación', 2, 200, 'Dosificación errática', 'rojo', '2025-06-04'),
('SI2-TAM-014', 'Válvula proporcional ', 2, 200, 'disponible', 'verde', '2025-06-15'),
('SI2-TAM-015', 'Manómetro tifón ', 2, 200, 'Lectura inestable', 'amarillo', '2025-06-10'),
('SI2-TAR-001', 'Tanque de amoníaco ', 2, 213, 'Alta presión no controlada', 'rojo', '2025-06-04'),
('SI2-TAR-002', 'Válvula de alivio ', 2, 213, 'disponible', 'verde', '2025-06-13'),
('SI2-TAR-003', 'Manómetro', 2, 213, 'Lectura fuera de rango', 'amarillo', '2025-06-06'),
('SI2-TAR-004', 'Válvula de corte ', 2, 213, 'disponible', 'verde', '2025-06-14'),
('SI2-TAR-005', 'Tubería de carga ', 2, 213, 'disponible', 'verde', '2025-06-15'),
('SI2-TAR-006', 'Sensor de nivel', 2, 213, 'Falso nivel', 'rojo', '2025-06-03'),
('SI2-TAR-007', 'Panel de control ', 2, 213, 'disponible', 'verde', '2025-06-12'),
('SI2-TAR-008', 'Válvula automática ', 2, 213, 'disponible', 'verde', '2025-06-11'),
('SI2-TAR-009', 'Bomba de trasiego ', 2, 213, 'Vibración intensa', 'amarillo', '2025-06-08'),
('SI2-TAR-010', 'Filtro de línea', 2, 213, 'disponible', 'verde', '2025-06-13'),
('SI2-TAR-011', 'Sistema RLC ', 2, 213, ' Interferencia electromagnética', 'rojo', '2025-06-05'),
('SI2-TAR-012', 'Tubería de descarga ', 2, 213, 'disponible', 'verde', '2025-06-15'),
('SI2-TAR-013', 'Sensor de presión ', 2, 213, 'disponible', 'verde', '2025-06-10'),
('SI2-TAR-014', 'Válvula de seguridad ', 2, 213, 'disponible', 'verde', '2025-06-09'),
('SI2-TAR-015', 'Manómetro digital ', 2, 213, 'Calibración vencida', 'amarillo', '2025-06-07'),
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
  `id_equipo` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'relacion con tabla de equipo',
  `id_usuario` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `fecha_reporte` date NOT NULL COMMENT 'fecha en la que se regist\r\nro \r\nla incidencia',
  `prioridad` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'alta, baja, media',
  `estado_solucion` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT '¿esta resuelta? si/no',
  `observacion` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'descripcion de la incidencia',
  `fecha_solucion` date NOT NULL COMMENT 'fecha de resolucion'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `incidencias`
--

INSERT INTO `incidencias` (`id_incidencia`, `id_equipo`, `id_usuario`, `fecha_reporte`, `prioridad`, `estado_solucion`, `observacion`, `fecha_solucion`) VALUES
(19, 'CO2-005', '30009775     ', '2025-06-27', 'media', 'en proceso', '9879878798', '2025-06-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento`
--

CREATE TABLE `mantenimiento` (
  `id_mantenimiento` int(50) NOT NULL COMMENT 'identificador unico',
  `id_repuesto` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `id_equipo` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL COMMENT 'relacionado con la tabla de equipo',
  `tipo_mantenimiento` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'correctivo, preventivo o predictivo',
  `id_incidencia` int(100) NOT NULL,
  `estado_anterior` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `estado_nuevo` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `observacion` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'detalle del mantenimiento realizado',
  `fecha_mantenimiento` date NOT NULL COMMENT 'fecha en la que se ejecuto',
  `responsable_usuario` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `mantenimiento`
--

INSERT INTO `mantenimiento` (`id_mantenimiento`, `id_repuesto`, `id_equipo`, `tipo_mantenimiento`, `id_incidencia`, `estado_anterior`, `estado_nuevo`, `observacion`, `fecha_mantenimiento`, `responsable_usuario`) VALUES
(29, '12347   ', 'CAB-008', 'correctivo', 19, 'No resuelta', 'no resuelta', 'hhhhhhhhhhhhhhhhhhhhsdasdaas\r\nda\r\nas\r\nasd\r\nda\r\nda\r\ndas\r\nsd\r\naad\r\nads\r\nadsd', '2025-06-28', '30097086    ');

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
(0, 'Complejo Petroquímico Hugo Chávez', 'Amoniaco', 'Capacidad instalada de 600 mil toneladas métricas anuales (MTMA)\r\nSu proceso se basa en la reformación del gas natural, obteniendo hidrógeno para la síntesis de amoníaco'),
(1, 'Complejo Petroquímico Hugo Chávez', 'Urea', 'Destinada principalmente a la industria agrícola, proporcionando fertilizantes nitrogenados esenciales para mejorar la productividad de los suelos.\r\ncapacidad instalada de 1.500 toneladas diarias\r\nSu proceso se basa en la síntesis de amoníaco y dióxido de carbono, obteniendo urea granulada de alta calidad.'),
(2, 'Complejo Petroquímico Hugo Chávez', 'Servicios Industriales 2', 'generación de vapor, suministro de agua desmineralizada, aire comprimido y tratamiento de efluentes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procesos`
--

CREATE TABLE `procesos` (
  `id_proceso` int(11) NOT NULL,
  `id_planta` int(50) NOT NULL,
  `nombre_proceso` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(300, 1, 'Compresion CO2'),
(301, 1, 'Compresion de Nitrogeno'),
(302, 1, 'Bombeo de Amoniaco (NH3) Liquido'),
(303, 1, 'Seccion de Sintesis'),
(304, 1, 'Seccion de Recuperacion'),
(305, 1, 'Seccion de Purificacion'),
(306, 1, 'Seccion de Consentracion'),
(307, 1, 'Tratamiento de Condensado de Proceso - PCT'),
(308, 1, 'Seccion de Granulacion'),
(309, 1, 'Reciclo Granulados'),
(310, 1, 'Recuperacion de Polvos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repuesto`
--

CREATE TABLE `repuesto` (
  `id_repuesto` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `estado` enum('solicitado','en_transito','recibido') CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `costo` int(11) NOT NULL,
  `fecha_solicitud` date NOT NULL,
  `fecha_recepcion` date NOT NULL,
  `cantidad` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_general_ci;

--
-- Volcado de datos para la tabla `repuesto`
--

INSERT INTO `repuesto` (`id_repuesto`, `nombre`, `estado`, `costo`, `fecha_solicitud`, `fecha_recepcion`, `cantidad`) VALUES
('0003', 'Serpentines de intercambio termico', 'recibido', 1300, '2025-06-10', '2025-06-10', 1),
('101010', 'Termopar', 'recibido', 20, '2025-06-18', '2025-06-18', 1),
('1111', 'Valbula', 'recibido', 10, '2025-06-18', '2025-06-18', 1),
('12347   ', 'respuesto de prueba   ', 'recibido', 10, '2025-06-22', '2025-06-22', 1),
('No Aplica', 'No Aplica', 'recibido', 0, '2025-06-17', '2025-06-17', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sesiones`
--

CREATE TABLE `sesiones` (
  `id_usuario` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `fecha_inicio` datetime NOT NULL,
  `fecha_fin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_general_ci;

--
-- Volcado de datos para la tabla `sesiones`
--

INSERT INTO `sesiones` (`id_usuario`, `fecha_inicio`, `fecha_fin`) VALUES
('30009775     ', '2025-06-20 07:08:00', '2025-06-04 23:24:00'),
('30097086', '2025-06-27 19:46:00', '2025-06-27 19:39:00'),
('admin', '2025-06-27 18:31:00', '2025-05-28 21:15:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'identificador unico de usuario',
  `nombre` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL COMMENT 'nombre completo',
  `cargo` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `departamento` varchar(50) NOT NULL,
  `id_planta` int(100) DEFAULT NULL,
  `nombre_complejo` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `telefono` varchar(50) NOT NULL COMMENT '0412-1234567',
  `fecha_creacion` varchar(100) DEFAULT current_timestamp(),
  `activo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `cargo`, `departamento`, `id_planta`, `nombre_complejo`, `telefono`, `fecha_creacion`, `activo`) VALUES
('30009775     ', 'fabianna', 'administrador', '0', 1, 'Complejo Petroquímico Hugo Chávez', '04124507315 ', '2025-06-04T23:23', 1),
('30097086    ', 'Miguel Navarro', 'trabajador', '0', 0, 'Complejo Petroquímico Hugo Chávez', '04127402007   ', '2025-06-27T19:09', 1),
('admin ', 'admin', 'administrador', '0', 0, 'Complejo Petroquímico Hugo Chávez', '2147483647', '2025-05-26T21:25', 1);

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
  ADD KEY `mantinimiento_repuesto` (`id_repuesto`),
  ADD KEY `mantenimiento_incidencia` (`id_incidencia`),
  ADD KEY `mantenimiento_usuario` (`responsable_usuario`);

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
-- Indices de la tabla `sesiones`
--
ALTER TABLE `sesiones`
  ADD PRIMARY KEY (`id_usuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`,`nombre`),
  ADD KEY `usuario_planta` (`id_planta`),
  ADD KEY `nombre_complejo` (`nombre_complejo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  MODIFY `id_incidencia` int(100) NOT NULL AUTO_INCREMENT COMMENT 'identificador unico', AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  MODIFY `id_mantenimiento` int(50) NOT NULL AUTO_INCREMENT COMMENT 'identificador unico', AUTO_INCREMENT=30;

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
  ADD CONSTRAINT `mantenimiento_usuario` FOREIGN KEY (`responsable_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
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
  ADD CONSTRAINT `proceso_planta` FOREIGN KEY (`id_planta`) REFERENCES `plantas` (`id_planta`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `sesiones`
--
ALTER TABLE `sesiones`
  ADD CONSTRAINT `sesion_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuario_planta` FOREIGN KEY (`id_planta`) REFERENCES `plantas` (`id_planta`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`nombre_complejo`) REFERENCES `complejos_petroquimicos` (`nombre_complejo`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
