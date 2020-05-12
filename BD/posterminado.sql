-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.3.12-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para pos
CREATE DATABASE IF NOT EXISTS `pos` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `pos`;

-- Volcando estructura para tabla pos.cliente
CREATE TABLE IF NOT EXISTS `cliente` (
  `id_cliente` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `numero` varchar(9) NOT NULL,
  `nit` varchar(11) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  PRIMARY KEY (`id_cliente`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla pos.cliente: ~3 rows (aproximadamente)
DELETE FROM `cliente`;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` (`id_cliente`, `nombre`, `apellido`, `numero`, `nit`, `direccion`) VALUES
	(1, 'Eswin Alejandro', 'Ixcol', '42893353', '92563014', 'Sanmach'),
	(2, 'Allan', 'Valle Cuyuch', '87654521', '98765413', 'mazatenango'),
	(3, 'Anderson', 'Parada Alvizures', '3134', '432412', 'Tiquisate, Escuintla');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;

-- Volcando estructura para tabla pos.compras
CREATE TABLE IF NOT EXISTS `compras` (
  `id_compra` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_sucursal` tinyint(3) unsigned NOT NULL,
  `id_proveedores` int(10) unsigned NOT NULL,
  `id_tipo_compra_venta` tinyint(3) unsigned NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_compra`),
  KEY `FK_compras_sucursal` (`id_sucursal`),
  KEY `FK_compras_proveedor` (`id_proveedores`),
  KEY `FK_compras_tipo_compra_venta` (`id_tipo_compra_venta`),
  CONSTRAINT `FK_compras_proveedor` FOREIGN KEY (`id_proveedores`) REFERENCES `proveedor` (`id_proveedor`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_compras_sucursal` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursal` (`id_sucursal`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_compras_tipo_compra_venta` FOREIGN KEY (`id_tipo_compra_venta`) REFERENCES `tipo_compra_venta` (`id_tipo`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla pos.compras: ~9 rows (aproximadamente)
DELETE FROM `compras`;
/*!40000 ALTER TABLE `compras` DISABLE KEYS */;
INSERT INTO `compras` (`id_compra`, `id_sucursal`, `id_proveedores`, `id_tipo_compra_venta`, `fecha`) VALUES
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

-- Volcando estructura para tabla pos.compra_detalle
CREATE TABLE IF NOT EXISTS `compra_detalle` (
  `id_compra_producto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_compra` int(10) unsigned NOT NULL,
  `id_producto` int(10) unsigned NOT NULL,
  `cantidad` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_compra_producto`),
  KEY `FK__compras` (`id_compra`),
  KEY `FK__productos` (`id_producto`),
  CONSTRAINT `FK__compras` FOREIGN KEY (`id_compra`) REFERENCES `compras` (`id_compra`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK__productos` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla pos.compra_detalle: ~6 rows (aproximadamente)
DELETE FROM `compra_detalle`;
/*!40000 ALTER TABLE `compra_detalle` DISABLE KEYS */;
INSERT INTO `compra_detalle` (`id_compra_producto`, `id_compra`, `id_producto`, `cantidad`) VALUES
	(1, 1, 5, 4),
	(2, 1, 1, 54),
	(3, 2, 3, 35),
	(4, 2, 1, 4),
	(5, 10, 1, 20),
	(6, 10, 1, 20);
/*!40000 ALTER TABLE `compra_detalle` ENABLE KEYS */;

-- Volcando estructura para tabla pos.credito_cliente
CREATE TABLE IF NOT EXISTS `credito_cliente` (
  `id_credito` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_venta` int(10) unsigned NOT NULL,
  `por_cobrar` decimal(7,2) unsigned NOT NULL,
  PRIMARY KEY (`id_credito`),
  KEY `FK_credito_cliente_ventas` (`id_venta`),
  CONSTRAINT `FK_credito_cliente_ventas` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id_venta`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla pos.credito_cliente: ~3 rows (aproximadamente)
DELETE FROM `credito_cliente`;
/*!40000 ALTER TABLE `credito_cliente` DISABLE KEYS */;
INSERT INTO `credito_cliente` (`id_credito`, `id_venta`, `por_cobrar`) VALUES
	(1, 2, 0.00),
	(2, 1, 5.00),
	(3, 2, 250.00);
/*!40000 ALTER TABLE `credito_cliente` ENABLE KEYS */;

-- Volcando estructura para tabla pos.credito_proveedor
CREATE TABLE IF NOT EXISTS `credito_proveedor` (
  `id_credito` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_compra` int(10) unsigned NOT NULL,
  `por_pagar` decimal(7,2) unsigned NOT NULL,
  PRIMARY KEY (`id_credito`),
  KEY `FK_credito_proveedor_compras` (`id_compra`),
  CONSTRAINT `FK_credito_proveedor_compras` FOREIGN KEY (`id_compra`) REFERENCES `compras` (`id_compra`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla pos.credito_proveedor: ~2 rows (aproximadamente)
DELETE FROM `credito_proveedor`;
/*!40000 ALTER TABLE `credito_proveedor` DISABLE KEYS */;
INSERT INTO `credito_proveedor` (`id_credito`, `id_compra`, `por_pagar`) VALUES
	(1, 2, 0.00),
	(2, 2, 1000.00);
/*!40000 ALTER TABLE `credito_proveedor` ENABLE KEYS */;

-- Volcando estructura para tabla pos.empleado
CREATE TABLE IF NOT EXISTS `empleado` (
  `id_empleado` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_tipo_empleado` tinyint(1) unsigned NOT NULL,
  `id_sucursal` tinyint(1) unsigned NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `pass` varchar(128) NOT NULL,
  PRIMARY KEY (`id_empleado`),
  KEY `FK_empleado_tipo_empleado` (`id_tipo_empleado`),
  KEY `FK_empleado_sucursal` (`id_sucursal`),
  CONSTRAINT `FK_empleado_sucursal` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursal` (`id_sucursal`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_empleado_tipo_empleado` FOREIGN KEY (`id_tipo_empleado`) REFERENCES `tipo_empleado` (`id_tipo_empleado`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla pos.empleado: ~4 rows (aproximadamente)
DELETE FROM `empleado`;
/*!40000 ALTER TABLE `empleado` DISABLE KEYS */;
INSERT INTO `empleado` (`id_empleado`, `id_tipo_empleado`, `id_sucursal`, `nombre`, `apellido`, `correo`, `pass`) VALUES
	(1, 3, 2, 'Gloria ', 'De Alvizures', 'gloria@matisan.com', '12345'),
	(2, 3, 1, 'Ana', 'Valle', 'ana@matisan.com', '1234'),
	(3, 3, 3, 'Luis', 'Pelicó', 'luis@matisan.com', '1234'),
	(4, 3, 2, 'David', 'Parada', 'correo@correo', '3627909a29c31381a071ec27f7c9ca97726182aed29a7ddd2e54353322cfb30abb9e3a6df2ac2c20fe23436311d678564d0c8d305930575f60e2d3d048184d79');
/*!40000 ALTER TABLE `empleado` ENABLE KEYS */;

-- Volcando estructura para vista pos.lista_empleado
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `lista_empleado` (
	`id_sucursal` TINYINT(1) UNSIGNED NOT NULL,
	`nombre` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`apellido` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`correo` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`tipo_emp` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`sucur` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`direccion_sucursal` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;

-- Volcando estructura para tabla pos.pagos_cliente
CREATE TABLE IF NOT EXISTS `pagos_cliente` (
  `id_pagos` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_credito_cliente` int(10) unsigned NOT NULL,
  `fecha` date NOT NULL,
  `pago` decimal(7,2) unsigned NOT NULL,
  PRIMARY KEY (`id_pagos`),
  KEY `FK__credito_cliente` (`id_credito_cliente`),
  CONSTRAINT `FK__credito_cliente` FOREIGN KEY (`id_credito_cliente`) REFERENCES `credito_cliente` (`id_credito`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla pos.pagos_cliente: ~6 rows (aproximadamente)
DELETE FROM `pagos_cliente`;
/*!40000 ALTER TABLE `pagos_cliente` DISABLE KEYS */;
INSERT INTO `pagos_cliente` (`id_pagos`, `id_credito_cliente`, `fecha`, `pago`) VALUES
	(1, 1, '0000-00-00', 10.00),
	(2, 1, '0000-00-00', 5.00),
	(3, 2, '2020-05-04', 10.00),
	(4, 3, '2020-05-04', 5.00),
	(5, 3, '2020-05-05', 4.00),
	(6, 1, '2020-05-04', 1000.00);
/*!40000 ALTER TABLE `pagos_cliente` ENABLE KEYS */;

-- Volcando estructura para tabla pos.pagos_proveedor
CREATE TABLE IF NOT EXISTS `pagos_proveedor` (
  `id_pagos` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_credito_proveedor` int(10) unsigned NOT NULL,
  `fecha` date NOT NULL,
  `pago` decimal(7,2) unsigned NOT NULL,
  PRIMARY KEY (`id_pagos`),
  KEY `FK_pagos_proveedor_credito_proveedor` (`id_credito_proveedor`),
  CONSTRAINT `FK_pagos_proveedor_credito_proveedor` FOREIGN KEY (`id_credito_proveedor`) REFERENCES `credito_proveedor` (`id_credito`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla pos.pagos_proveedor: ~3 rows (aproximadamente)
DELETE FROM `pagos_proveedor`;
/*!40000 ALTER TABLE `pagos_proveedor` DISABLE KEYS */;
INSERT INTO `pagos_proveedor` (`id_pagos`, `id_credito_proveedor`, `fecha`, `pago`) VALUES
	(1, 1, '0000-00-00', 249.00),
	(2, 1, '2020-05-01', 11.00),
	(3, 1, '2020-05-05', 1000.00);
/*!40000 ALTER TABLE `pagos_proveedor` ENABLE KEYS */;

-- Volcando estructura para tabla pos.productos
CREATE TABLE IF NOT EXISTS `productos` (
  `id_producto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_sucursal` tinyint(1) unsigned NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `precio_compra` decimal(7,2) unsigned NOT NULL,
  `precio_venta` decimal(7,2) unsigned NOT NULL,
  `existencia` int(10) unsigned NOT NULL,
  `descripcion` text NOT NULL,
  `marca` varchar(50) NOT NULL,
  PRIMARY KEY (`id_producto`),
  KEY `FK__sucursal` (`id_sucursal`),
  CONSTRAINT `FK__sucursal` FOREIGN KEY (`id_sucursal`) REFERENCES `sucursal` (`id_sucursal`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla pos.productos: ~12 rows (aproximadamente)
DELETE FROM `productos`;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` (`id_producto`, `id_sucursal`, `nombre`, `precio_compra`, `precio_venta`, `existencia`, `descripcion`, `marca`) VALUES
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

-- Volcando estructura para tabla pos.proveedor
CREATE TABLE IF NOT EXISTS `proveedor` (
  `id_proveedor` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `numero` varchar(9) DEFAULT NULL,
  `nit` varchar(11) NOT NULL,
  `numero2` varchar(9) DEFAULT NULL,
  `direccion` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_proveedor`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla pos.proveedor: ~4 rows (aproximadamente)
DELETE FROM `proveedor`;
/*!40000 ALTER TABLE `proveedor` DISABLE KEYS */;
INSERT INTO `proveedor` (`id_proveedor`, `nombre`, `numero`, `nit`, `numero2`, `direccion`) VALUES
	(1, 'Lucia', '987986986', '1', '7897987', '1 av 14 calle zona 1, mazatenango'),
	(2, 'Alexis', '7896876', '2', '8769876', 'zona 1, san antonio'),
	(3, 'Palomino', '34234232', '2341245', '342424', 'San Lucaz'),
	(6, 'ELVIA AGUILAR', '34342345', '342343234', '12434234', 'Tiquisate');
/*!40000 ALTER TABLE `proveedor` ENABLE KEYS */;

-- Volcando estructura para tabla pos.sucursal
CREATE TABLE IF NOT EXISTS `sucursal` (
  `id_sucursal` tinyint(1) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  PRIMARY KEY (`id_sucursal`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla pos.sucursal: ~3 rows (aproximadamente)
DELETE FROM `sucursal`;
/*!40000 ALTER TABLE `sucursal` DISABLE KEYS */;
INSERT INTO `sucursal` (`id_sucursal`, `nombre`, `direccion`) VALUES
	(1, 'El campesino', 'direccion 1'),
	(2, 'El campesino 2', 'direccion 2'),
	(3, 'El campesino 3', 'direccion 3');
/*!40000 ALTER TABLE `sucursal` ENABLE KEYS */;

-- Volcando estructura para tabla pos.tipo_compra_venta
CREATE TABLE IF NOT EXISTS `tipo_compra_venta` (
  `id_tipo` tinyint(1) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(20) NOT NULL,
  PRIMARY KEY (`id_tipo`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla pos.tipo_compra_venta: ~2 rows (aproximadamente)
DELETE FROM `tipo_compra_venta`;
/*!40000 ALTER TABLE `tipo_compra_venta` DISABLE KEYS */;
INSERT INTO `tipo_compra_venta` (`id_tipo`, `tipo`) VALUES
	(1, 'credito'),
	(2, 'contado');
/*!40000 ALTER TABLE `tipo_compra_venta` ENABLE KEYS */;

-- Volcando estructura para tabla pos.tipo_empleado
CREATE TABLE IF NOT EXISTS `tipo_empleado` (
  `id_tipo_empleado` tinyint(1) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tipo_empleado`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla pos.tipo_empleado: ~3 rows (aproximadamente)
DELETE FROM `tipo_empleado`;
/*!40000 ALTER TABLE `tipo_empleado` DISABLE KEYS */;
INSERT INTO `tipo_empleado` (`id_tipo_empleado`, `tipo`) VALUES
	(1, 'Administrador'),
	(2, 'Contador'),
	(3, 'Cajero');
/*!40000 ALTER TABLE `tipo_empleado` ENABLE KEYS */;

-- Volcando estructura para tabla pos.ventas
CREATE TABLE IF NOT EXISTS `ventas` (
  `id_venta` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_empleado` int(10) unsigned NOT NULL,
  `id_cliente` int(10) unsigned NOT NULL,
  `id_tipo_compra_venta` tinyint(1) unsigned NOT NULL,
  `fecha` date NOT NULL,
  PRIMARY KEY (`id_venta`),
  KEY `FK__empleado` (`id_empleado`),
  KEY `FK__cliente` (`id_cliente`),
  KEY `FK__tipo_compra_venta` (`id_tipo_compra_venta`),
  CONSTRAINT `FK__cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK__empleado` FOREIGN KEY (`id_empleado`) REFERENCES `empleado` (`id_empleado`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK__tipo_compra_venta` FOREIGN KEY (`id_tipo_compra_venta`) REFERENCES `tipo_compra_venta` (`id_tipo`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla pos.ventas: ~2 rows (aproximadamente)
DELETE FROM `ventas`;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
INSERT INTO `ventas` (`id_venta`, `id_empleado`, `id_cliente`, `id_tipo_compra_venta`, `fecha`) VALUES
	(1, 1, 1, 2, '2020-04-08'),
	(2, 1, 1, 1, '2020-04-19');
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;

-- Volcando estructura para tabla pos.venta_detalle
CREATE TABLE IF NOT EXISTS `venta_detalle` (
  `id_venta_producto` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_venta` int(10) unsigned NOT NULL,
  `id_producto` int(10) unsigned NOT NULL,
  `cantidad` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id_venta_producto`),
  KEY `FK_venta_producto_ventas` (`id_venta`),
  KEY `FK_venta_producto_productos` (`id_producto`),
  CONSTRAINT `FK_venta_producto_productos` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`) ON DELETE NO ACTION ON UPDATE CASCADE,
  CONSTRAINT `FK_venta_producto_ventas` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id_venta`) ON DELETE NO ACTION ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Volcando datos para la tabla pos.venta_detalle: ~3 rows (aproximadamente)
DELETE FROM `venta_detalle`;
/*!40000 ALTER TABLE `venta_detalle` DISABLE KEYS */;
INSERT INTO `venta_detalle` (`id_venta_producto`, `id_venta`, `id_producto`, `cantidad`) VALUES
	(1, 1, 3, 35),
	(2, 1, 4, 12),
	(3, 2, 3, 3);
/*!40000 ALTER TABLE `venta_detalle` ENABLE KEYS */;

-- Volcando estructura para vista pos.view_compras
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `view_compras` (
	`id_compra` INT(10) UNSIGNED NOT NULL,
	`total` DECIMAL(39,2) NULL,
	`fecha` DATE NOT NULL
) ENGINE=MyISAM;

-- Volcando estructura para vista pos.view_credito_por_sucursal
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `view_credito_por_sucursal` 
) ENGINE=MyISAM;

-- Volcando estructura para vista pos.view_productos_existentes_sventas
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `view_productos_existentes_sventas` (
	`id_producto` INT(10) UNSIGNED NOT NULL,
	`sucursal` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`producto` VARCHAR(50) NOT NULL COLLATE 'latin1_swedish_ci',
	`p.existencia-sum(v.cantidad)` DECIMAL(33,0) NULL,
	`sum(v.cantidad)` DECIMAL(32,0) NULL
) ENGINE=MyISAM;

-- Volcando estructura para vista pos.view_ventas_por_sucursal
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `view_ventas_por_sucursal` 
) ENGINE=MyISAM;

-- Volcando estructura para vista pos.lista_empleado
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `lista_empleado`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `lista_empleado` AS SELECT  e.id_sucursal, e.nombre,  e.apellido,  e.correo, te.tipo as tipo_emp, s.nombre as sucur, s.direccion as direccion_sucursal
FROM empleado as e
inner join tipo_empleado as te on te.id_tipo_empleado = e.id_tipo_empleado
inner join sucursal as s on s.id_sucursal = e.id_sucursal 
order by e.id_sucursal ;

-- Volcando estructura para vista pos.view_compras
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `view_compras`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `view_compras` AS SELECT c.id_compra, sum(d.cantidad*p.precio_compra) as total , c.fecha
 	from compras as c 
	inner join compra_detalle as d on d.id_compra=c.id_compra
	inner join productos as p on p.id_producto=d.id_producto
	group by c.id_compra ;

-- Volcando estructura para vista pos.view_credito_por_sucursal
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `view_credito_por_sucursal`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `view_credito_por_sucursal` AS select v.id_venta, sc.nombre as nombre_sucursal, t.tipo, c.nombre as nombre_cliente, c.apellido, c.nit, c.direccion, vs.fecha, sum(p.precio_venta*v.cantidad) as total 
	from cliente as c 
	inner join ventas as vs on c.id_cliente=vs.id_cliente
	inner join tipo_compra_venta as t on t.id_tipo=vs.id_tipo_compra_venta 
	inner join venta_detalle as v on v.id_venta=vs.id_venta
	inner join productos as p on p.id_producto=v.id_producto
	inner join empleado as e on e.id_empelado=vs.id_empleado
	inner join sucursal as sc on sc.id_sucursal=e.id_sucursal
	group by t.id_tipo ;

-- Volcando estructura para vista pos.view_productos_existentes_sventas
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `view_productos_existentes_sventas`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `view_productos_existentes_sventas` AS SELECT p.id_producto, s.nombre as sucursal,  p.nombre as producto, p.existencia-sum(v.cantidad), sum(v.cantidad)
	from venta_detalle as v 
	inner join productos as p on p.id_producto=v.id_producto
	inner join sucursal as s on s.id_sucursal=p.id_sucursal
	group by p.id_producto ;

-- Volcando estructura para vista pos.view_ventas_por_sucursal
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `view_ventas_por_sucursal`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` VIEW `view_ventas_por_sucursal` AS select s.id_venta, c.nombre as cliente,c.apellido, c.nit,c.direccion, p.nombre as producto, sc.nombre as sucursal, p.precio_venta, v.cantidad, (p.precio_venta*v.cantidad), s.fecha
	from venta_detalle as v
 	inner join productos as p on p.id_producto=v.id_producto 
	inner join ventas as s on s.id_venta=v.id_venta 
	inner join cliente as c on c.id_cliente=s.id_cliente
	inner join empleado as e on e.id_empelado=s.id_empleado
	inner join sucursal as sc on sc.id_sucursal=e.id_sucursal 
	inner join tipo_compra_venta as t on t.id_tipo=s.id_tipo_compra_venta ;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
