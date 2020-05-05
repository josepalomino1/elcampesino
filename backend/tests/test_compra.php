<?php 
require('../compra.php');
$com = new compra();


// $id_sucursal="3"; 
// $id_proveedores="3"; 
// $id_tipo_compra_venta="1"; 
// $fecha = "2020-05-04"; //YY-MM-DDdebes de meterlo con ese formato, si no te va a dar error
// $com::registrar($id_sucursal, $id_proveedores, $id_tipo_compra_venta, $fecha);
// $var = $com::obtenerCompras();
// foreach ($var as $key) {
//     echo "id_compra: ".$key[0]."<br>";
//     echo "total: ".$key[1]."<br>";
//     echo "fecha: ".$key[2]."<br>";
// }

// $id_sucursal="1"; 
// $var = $com::obtenerComprasSucursal($id_sucursal);
// foreach ($var as $key) {
//     echo "id_compra: ".$key[0]."<br>";
//     echo "total: ".$key[1]."<br>";
//     echo "fecha: ".$key[2]."<br>";
// }

// $id_proveedores="2"; 
// $var = $com::obtenerComprasProveedor($id_proveedores);

// foreach ($var as $key) {
//     echo "id_compra: ".$key[0]."<br>";
//     echo "total: ".$key[1]."<br>";
//     echo "fecha: ".$key[2]."<br>";
//     echo "Nombre: ".$key[3]."<br>";
//     echo "Direccion: ".$key[4]."<br>";
//  }

// $id_compra = "7";
// $com::eliminar($id_compra);


// $id_sucursal="1"; 
// $id_proveedores="3"; 
// $id_tipo_compra_venta="1"; 
// $fecha = "2020-05-04"; 
// $id_compra = 10;
// $com::editar($id_sucursal, $id_proveedores, $id_tipo_compra_venta, $fecha, $id_compra)

$var = $com::ultimaCompra();
echo $var[0][0];//debes hacerlo asi, porque el primer 0 es del numero de array, y el otro es del dato del array

?>