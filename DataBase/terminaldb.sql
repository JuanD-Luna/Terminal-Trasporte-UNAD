-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Oct 27, 2025 at 05:39 AM
-- Server version: 8.0.17
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `terminaldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `empresas`
--

CREATE TABLE `empresas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `direccion` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `empresas`
--

INSERT INTO `empresas` (`id`, `nombre`, `telefono`, `correo`, `direccion`) VALUES
(1, 'Expreso Bolivariano', '3201234567', 'info@bolivariano.com', 'Terminal Salitre - Bogotá'),
(2, 'Flota Magdalena', '3109876543', 'contacto@flotamagdalena.com', 'Terminal del Sur - Bogotá'),
(3, 'Copetran', '3001122334', 'servicio@copetran.com', 'Terminal del Norte - Bogotá');

-- --------------------------------------------------------

--
-- Table structure for table `horarios`
--

CREATE TABLE `horarios` (
  `id` int(11) NOT NULL,
  `ruta_id` int(11) NOT NULL,
  `hora_salida` time NOT NULL,
  `hora_llegada` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `horarios`
--

INSERT INTO `horarios` (`id`, `ruta_id`, `hora_salida`, `hora_llegada`) VALUES
(1, 1, '08:00:00', '16:00:00'),
(2, 2, '10:30:00', '19:30:00'),
(3, 3, '07:15:00', '10:15:00');

-- --------------------------------------------------------

--
-- Table structure for table `rutas`
--

CREATE TABLE `rutas` (
  `id` int(11) NOT NULL,
  `origen` varchar(100) DEFAULT NULL,
  `destino` varchar(100) DEFAULT NULL,
  `horario` time DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rutas`
--

INSERT INTO `rutas` (`id`, `origen`, `destino`, `horario`, `precio`) VALUES
(1, 'Bogotá', 'Medellín', '08:00:00', '95000.00'),
(2, 'Bogotá', 'Cali', '10:30:00', '87000.00'),
(3, 'Bogotá', 'Villavicencio', '07:15:00', '45000.00');

-- --------------------------------------------------------

--
-- Table structure for table `tiquetes`
--

CREATE TABLE `tiquetes` (
  `id` int(11) NOT NULL,
  `ruta_id` int(11) NOT NULL,
  `pasajero_nombre` varchar(100) DEFAULT NULL,
  `pasajero_correo` varchar(100) DEFAULT NULL,
  `fecha_viaje` date DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tiquetes`
--

INSERT INTO `tiquetes` (`id`, `ruta_id`, `pasajero_nombre`, `pasajero_correo`, `fecha_viaje`, `cantidad`, `total`) VALUES
(1, 1, 'Juan Pérez', 'juanperez@example.com', '2025-10-30', 2, '190000.00'),
(2, 2, 'María Gómez', 'mariagomez@example.com', '2025-11-01', 1, '87000.00');

-- --------------------------------------------------------

--
-- Table structure for table `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id` int(11) NOT NULL,
  `empresa_id` int(11) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT NULL,
  `placa` varchar(20) DEFAULT NULL,
  `capacidad` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehiculos`
--

INSERT INTO `vehiculos` (`id`, `empresa_id`, `tipo`, `placa`, `capacidad`) VALUES
(1, 1, 'Bus', 'ABC123', 40),
(2, 1, 'Microbus', 'XYZ987', 20),
(3, 2, 'Bus', 'JKL456', 45),
(4, 3, 'Buseta', 'MNO789', 30);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `horarios`
--
ALTER TABLE `horarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ruta_id` (`ruta_id`);

--
-- Indexes for table `rutas`
--
ALTER TABLE `rutas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tiquetes`
--
ALTER TABLE `tiquetes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ruta_id` (`ruta_id`);

--
-- Indexes for table `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `empresa_id` (`empresa_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `horarios`
--
ALTER TABLE `horarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `rutas`
--
ALTER TABLE `rutas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tiquetes`
--
ALTER TABLE `tiquetes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `horarios`
--
ALTER TABLE `horarios`
  ADD CONSTRAINT `horarios_ibfk_1` FOREIGN KEY (`ruta_id`) REFERENCES `rutas` (`id`);

--
-- Constraints for table `tiquetes`
--
ALTER TABLE `tiquetes`
  ADD CONSTRAINT `tiquetes_ibfk_1` FOREIGN KEY (`ruta_id`) REFERENCES `rutas` (`id`);

--
-- Constraints for table `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD CONSTRAINT `vehiculos_ibfk_1` FOREIGN KEY (`empresa_id`) REFERENCES `empresas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
