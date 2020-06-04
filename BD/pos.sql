-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.1.36-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win32
-- HeidiSQL Versión:             10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Volcando datos para la tabla pos.carrito: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `carrito` DISABLE KEYS */;
/*!40000 ALTER TABLE `carrito` ENABLE KEYS */;

-- Volcando datos para la tabla pos.cliente: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT IGNORE INTO `cliente` (`id_cliente`, `nombre`, `apellido`, `numero`, `nit`, `direccion`) VALUES
	(1, 'Eswin Alejandro', 'Ixcol Castro', '42893353', '92563014', 'Sanmax'),
	(2, 'Allan', 'Valle Cuyuch', '87654521', '98765413', 'mazatenango'),
	(3, 'Anderson', 'Parada Alvizures', '3134', '432412', 'Tiquisate, Escuintla'),
	(4, 'Anderson', 'Alvizurez', '12345678', '12345687', 'Tiquisate'),
	(6, 'JÃ³se Mario', 'Santizo', '56214789', '90658043', 'San Lucas TolimÃ¡n, SololÃ¡'),
	(7, '', '', '', '', '');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

-- Volcando datos para la tabla pos.compras: ~10 rows (aproximadamente)
/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
INSERT IGNORE INTO `compras` (`id_compra`, `id_sucursal`, `id_proveedores`, `id_tipo_compra_venta`, `fecha`) VALUES
	(1, 1, 2, 2, '2020-03-08'),
	(2, 1, 2, 1, '2020-04-08'),
	(3, 2, 1, 2, '2020-05-03'),
	(4, 2, 1, 1, '2020-05-03'),
	(5, 2, 1, 1, '2020-05-03'),
	(6, 3, 3, 2, '2020-05-03'),
	(8, 3, 3, 1, '2020-05-04'),
	(9, 3, 3, 1, '2020-05-04'),
	(10, 1, 3, 1, '2020-05-04'),
	(11, 3, 3, 1, '2020-05-04');
/*!40000 ALTER TABLE `compras` ENABLE KEYS */;

-- Volcando datos para la tabla pos.compra_detalle: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `compra_detalle` DISABLE KEYS */;
INSERT IGNORE INTO `compra_detalle` (`id_compra_producto`, `id_compra`, `id_producto`, `cantidad`) VALUES
	(1, 1, 5, 4),
	(2, 1, 1, 54),
	(3, 2, 3, 35),
	(4, 2, 1, 4),
	(5, 10, 1, 20),
	(6, 10, 1, 20);
/*!40000 ALTER TABLE `compra_detalle` ENABLE KEYS */;

-- Volcando datos para la tabla pos.credito_cliente: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `credito_cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `credito_cliente` ENABLE KEYS */;

-- Volcando datos para la tabla pos.credito_proveedor: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `credito_proveedor` DISABLE KEYS */;
INSERT IGNORE INTO `credito_proveedor` (`id_credito`, `id_compra`, `por_pagar`) VALUES
	(1, 2, 0.00),
	(2, 2, 1000.00);
/*!40000 ALTER TABLE `credito_proveedor` ENABLE KEYS */;

-- Volcando datos para la tabla pos.empleado: ~13 rows (aproximadamente)
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
INSERT IGNORE INTO `empleado` (`id_empleado`, `id_tipo_empleado`, `id_sucursal`, `nombre`, `apellido`, `correo`, `pass`, `imagen`) VALUES
	(1, 1, 1, 'Jose', 'Palomino', 'jpalomino@matisan.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 'img/jpalomino.jpg'),
	(2, 2, 1, 'Anderson', 'Parada', 'aparada@matisan.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 'img/user.png'),
	(3, 3, 1, 'Allan', 'Valle', 'avalle@matisan.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 'img/user.png'),
	(4, 4, 1, 'Eswin', 'Ixcol', 'eixcol@matisan.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 'img/user.png'),
	(5, 1, 2, 'Gloria', 'de Parada', 'gparada@matisan.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 'img/user.png'),
	(6, 2, 2, 'Maria', 'Diaz', 'mdiaz@matisan.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 'img/user.png'),
	(7, 3, 2, 'Mildred', 'de Ixcol', 'mixcol@matisan.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 'img/user.png'),
	(8, 4, 2, 'Nadie', 'de Valle', 'nvalle@matisan.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 'img/user.png'),
	(9, 1, 3, 'Mario', 'Santizo', 'msantizo@matisan.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 'img/user.png'),
	(10, 2, 3, 'Alejando', 'Magdiel', 'amagdiel@matisan.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 'img/user.png'),
	(11, 3, 3, 'Alexis', 'Alvizurez', 'aalvizurez@matisan.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 'img/user.png'),
	(17, 1, 1, 'Correo', 'Prueba', 'correo@correo', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 'img/user.png'),
	(18, 4, 3, 'Usuario', '1', 'usuario@matisan.com', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79', 'img/LOGO1.png');
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;

-- Volcando datos para la tabla pos.pagos_cliente: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `pagos_cliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `pagos_cliente` ENABLE KEYS */;

-- Volcando datos para la tabla pos.pagos_proveedor: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `pagos_proveedor` DISABLE KEYS */;
INSERT IGNORE INTO `pagos_proveedor` (`id_pagos`, `id_credito_proveedor`, `fecha`, `pago`) VALUES
	(1, 1, '0000-00-00', 249.00),
	(2, 1, '2020-05-01', 11.00),
	(3, 1, '2020-05-05', 1000.00);
/*!40000 ALTER TABLE `pagos_proveedor` ENABLE KEYS */;

-- Volcando datos para la tabla pos.productos: ~12 rows (aproximadamente)
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT IGNORE INTO `productos` (`id_producto`, `id_sucursal`, `nombre`, `precio_compra`, `precio_venta`, `existencia`, `descripcion`, `marca`) VALUES
	(1, 1, 'martillo', 20.00, 25.00, 31, 'de 40 cm', ''),
	(2, 1, 'mascarilla', 5.00, 5.50, 2, 'solo uso farmaceutico ', ''),
	(3, 2, 'leche', 59.00, 66.00, 150, 'marca famili', ''),
	(4, 2, 'jabón', 2.50, 3.50, 100, 'marca protex', ''),
	(5, 3, 'maiz', 100.00, 130.00, 55, 'importado de  Mexico', ''),
	(6, 3, 'Veneno', 44.00, 54.00, 2, 'para plantación de café', ''),
	(7, 2, 'aceite', 50.00, 60.00, 5, '20w50', 'motul'),
	(8, 1, 'Ventilador', 2500.00, 3000.00, 25, 'Ventilador sin patas', 'WindMachine '),
	(9, 3, 'aceite', 50.00, 60.00, 20, '20w50', 'Motul'),
	(10, 1, 'Ventilador', 2500.00, 3000.00, 25, 'Ventilador con patas', 'WindMachine'),
	(11, 2, 'Ventilador', 2500.00, 3000.00, 25, 'Ventilador con patas', 'WindMachine'),
	(12, 2, 'Ventilador', 2500.00, 3000.00, 25, 'Ventilador con patas', 'BlackMachine');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;

-- Volcando datos para la tabla pos.proveedor: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
INSERT IGNORE INTO `proveedor` (`id_proveedor`, `nombre`, `numero`, `nit`, `numero2`, `direccion`) VALUES
	(1, 'Lucia', '987986986', '1', '7897987', '1 av 14 calle zona 1, mazatenango'),
	(2, 'Alexis', '7896876', '2', '8769876', 'zona 1, san antonio'),
	(3, 'Palomino', '34234232', '2341245', '342424', 'San Lucaz'),
	(6, 'ELVIA AGUILAR', '34342345', '342343234', '12434234', 'Tiquisate'),
	(7, 'Proveedor 1', '1234678', '23548612', '23456789', 'Mazate'),
	(8, 'Proveedor 1', '1234678', '23548612', '23456789', 'Mazate');
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;

-- Volcando datos para la tabla pos.sucursal: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `sucursal` DISABLE KEYS */;
INSERT IGNORE INTO `sucursal` (`id_sucursal`, `nombre`, `direccion`) VALUES
	(1, 'El campesino', 'direccion 1'),
	(2, 'El campesino 2', 'direccion 2'),
	(3, 'El campesino 3', 'direccion 3');
/*!40000 ALTER TABLE `sucursal` ENABLE KEYS */;

-- Volcando datos para la tabla pos.tipo_compra_venta: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_compra_venta` DISABLE KEYS */;
INSERT IGNORE INTO `tipo_compra_venta` (`id_tipo`, `tipo`) VALUES
	(1, 'credito'),
	(2, 'contado');
/*!40000 ALTER TABLE `tipo_compra_venta` ENABLE KEYS */;

-- Volcando datos para la tabla pos.tipo_empleado: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `tipo_empleado` DISABLE KEYS */;
INSERT IGNORE INTO `tipo_empleado` (`id_tipo_empleado`, `tipo`) VALUES
	(1, 'Administrador'),
	(2, 'Contador'),
	(3, 'Cajero'),
	(4, 'Bodeguero');
/*!40000 ALTER TABLE `tipo_empleado` ENABLE KEYS */;

-- Volcando datos para la tabla pos.ventas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;

-- Volcando datos para la tabla pos.venta_detalle: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `venta_detalle` DISABLE KEYS */;
/*!40000 ALTER TABLE `venta_detalle` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
