-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 21, 2019 at 09:06 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `curso`
--

-- --------------------------------------------------------

--
-- Table structure for table `detalle_factura`
--

CREATE TABLE `detalle_factura` (
  `id` int(11) NOT NULL,
  `id_factura` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `subtotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detalle_factura`
--

INSERT INTO `detalle_factura` (`id`, `id_factura`, `id_producto`, `cantidad`, `subtotal`) VALUES
(1, 11, 1, 1, 5),
(2, 11, 2, 1, 20);

-- --------------------------------------------------------

--
-- Table structure for table `factura`
--

CREATE TABLE `factura` (
  `id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `estado` enum('pagado','cancelado','pendiente') NOT NULL,
  `cliente` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `factura`
--

INSERT INTO `factura` (`id`, `fecha`, `total`, `subtotal`, `estado`, `cliente`) VALUES
(1, '2019-12-21 00:00:00', '25.00', '25.00', 'pendiente', '1'),
(2, '2019-12-21 00:00:00', '25.00', '25.00', 'pendiente', '1'),
(3, '2019-12-21 00:00:00', '25.00', '25.00', 'pendiente', '1'),
(4, '2019-12-21 00:00:00', '25.00', '25.00', 'pendiente', '1'),
(5, '2019-12-21 00:00:00', '25.00', '25.00', 'pendiente', '1'),
(6, '2019-12-21 00:00:00', '25.00', '25.00', 'pendiente', '1'),
(7, '2019-12-21 00:00:00', '25.00', '25.00', 'pendiente', '1'),
(8, '2019-12-21 00:00:00', '25.00', '25.00', 'pendiente', '1'),
(9, '2019-12-21 00:00:00', '25.00', '25.00', 'pendiente', '1'),
(10, '2019-12-21 00:00:00', '25.00', '25.00', 'pendiente', '1'),
(11, '2019-12-21 00:00:00', '25.00', '25.00', 'pendiente', '1');

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `UM` varchar(50) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `UM`, `activo`) VALUES
(1, 'Papa', '5.00', 'kg', 1),
(2, 'Agua', '20.00', 'L', 1),
(3, 'Pollo', '50.00', 'kg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `descripcion`, `activo`, `created`) VALUES
(1, 'Administrador', 'admin', 1, '2019-12-07 12:05:28'),
(3, 'Cliente', 't', 1, '2019-12-14 12:01:28');

-- --------------------------------------------------------

--
-- Table structure for table `url_permisos`
--

CREATE TABLE `url_permisos` (
  `id` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `borrar` tinyint(1) DEFAULT 0,
  `agregar` tinyint(1) DEFAULT 0,
  `ver` tinyint(1) DEFAULT 1,
  `editar` tinyint(1) DEFAULT 0,
  `activo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `url_permisos`
--

INSERT INTO `url_permisos` (`id`, `id_rol`, `borrar`, `agregar`, `ver`, `editar`, `activo`) VALUES
(1, 1, 1, 1, 1, 1, 1),
(4, 3, 0, 0, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1,
  `email` varchar(100) NOT NULL,
  `created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `password`, `activo`, `email`, `created`) VALUES
(1, 'test', 'b59c67bf196a4758191e42f76670ceba', 1, 'prueba@prueba.com1', '2019-12-06 23:26:52'),
(2, 'emmanuel', '0d0de813c1105498e3435dd2fbf7fa26', 0, 'prueba@prueba.com', '2019-12-06 23:27:50'),
(5, 'emmanuel', '0d0de813c1105498e3435dd2fbf7fa26', 0, 'prueba', '2019-12-06 23:38:32'),
(6, 'nuevo', 'd3eb9a9233e52948740d7eb8c3062d14', 1, 'nuevo@nuevo.com', '2019-12-07 11:38:36');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios_roles`
--

CREATE TABLE `usuarios_roles` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios_roles`
--

INSERT INTO `usuarios_roles` (`id`, `id_usuario`, `id_rol`, `activo`) VALUES
(1, 2, 1, 1),
(2, 1, 3, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `url_permisos`
--
ALTER TABLE `url_permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios_roles`
--
ALTER TABLE `usuarios_roles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detalle_factura`
--
ALTER TABLE `detalle_factura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `factura`
--
ALTER TABLE `factura`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `url_permisos`
--
ALTER TABLE `url_permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `usuarios_roles`
--
ALTER TABLE `usuarios_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
