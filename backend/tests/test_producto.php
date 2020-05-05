<?php 
require('../productos.php');
$pro = new productos();

$id_sucursal = "1"; 
$nombre = "Ventilador"; 
$precio_compra = 2500; 
$precio_venta = 3000; 
$existencia = 25; 
$descripcion = "Ventilador WindMachine con patas";
$pro::registrar($id_sucursal, $nombre, $precio_compra, $precio_venta, $existencia, $descripcion);

$id_sucursal = "1"; 
$nombre = "Ventilador"; 
$precio_compra = 2500; 
$precio_venta = 3500; 
$existencia = 25; 
$descripcion = "Ventilador WindMachine con patas";
$pro::editar($id_sucursal, $nombre, $precio_compra, $precio_venta, $existencia, $descripcion);

$var = $pro::productosSucursal("1");
var_export($var);
// foreach ($var as $key) {
//     echo $key[0];
// }
?>