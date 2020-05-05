<?php 
require('../pagos_cliente.php');
$pc = new pagos_cliente();

//-----------------------------------------------------------
// $id_credito_cliente = "1"; 
// $pago = 1000; 
// $fecha = "2020-05-04";//YY-mm-dd
// $pc::registrar($id_credito_cliente, $fecha, $pago);

//-----------------------------------------------------------

//-----------------------------------------------------------
// $var = $pc::pagosClientes();
// foreach ($var as $key) {
//     echo "Nombre: ".$key[0]."<br>";
//     echo "Apellido: ".$key[1]."<br>";
//     echo "Pagos: ".$key[2]."<br>";
//     echo "Venta: ".$key[3]."<br>";
//     echo "Fecha: ".$key[4]."<br>";
// }
//-----------------------------------------------------------

//-----------------------------------------------------------
// $nit = "92563014";
// $var = $pc::pagosCliente($nit);
// foreach ($var as $key) {
//     echo "Nombre: ".$key[0]."<br>";
//     echo "Apellido: ".$key[1]."<br>";
//     echo "Pagos: ".$key[2]."<br>";
//     echo "Venta: ".$key[3]."<br>";
//     echo "Fecha: ".$key[4]."<br>";
// }
//-----------------------------------------------------------

?>