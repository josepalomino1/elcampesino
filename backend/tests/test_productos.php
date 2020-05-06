<?php 
require('../productos.php');
$pro = new productos();
//----------------------------------------------------------------------
// $id_sucursal = "1"; 
// $nombre = "Licuadora"; 
// $precio_compra = 2500; 
// $precio_venta = 3000; 
// $existencia = 25; 
// $descripcion = "licuadora con patas";
// $marca = "WindMachine";
// $pro::registrar($id_sucursal, $nombre, $precio_compra, $precio_venta, $existencia, $descripcion, $marca);
 //----------------------------------------------------------------------

 //----------------------------------------------------------------------
$id_producto = "12"; 
$nombre = "Ventilador"; 
$precio_compra = 2500; 
$precio_venta = 3000; 
$existencia = 25; 
$descripcion = "Ventilador con patas";
$marca = "BlackMachine";
$pro::editar($id_producto, $nombre, $precio_compra, $precio_venta, $existencia, $descripcion, $marca);
//----------------------------------------------------------------------

//----------------------------------------------------------------------
// $var = $pro::productosSucursal("1");
// var_export($var);
//----------------------------------------------------------------------

//----------------------------------------------------------------------
// $var = $pro::productoNombre("2", "acei");
// var_export($var);
// //----------------------------------------------------------------------
?>