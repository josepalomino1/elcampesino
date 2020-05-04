<?php 
require('../cliente.php');
$cli = new cliente();


// $var = $cli::obtenerClientes();
// foreach ($var as $key) {
//     echo "id_cliente: ".$key[0]."<br>";
//     echo "nombre: ".$key[1]."<br>";
//     echo "apellido: ".$key[2]."<br>";
//     echo "numero: ".$key[3]."<br>";
//     echo "nit: ".$key[4]."<br>";
//     echo "direccion: ".$key[5]."<br>";
//     echo "<br>";
// }
//-----------------------------------------------------

// $nit = 78431234;
// $var = $cli::obtenerCliente($nit);
// foreach ($var as $key) {
//     echo "id_cliente: ".$key[0]."<br>";
//     echo "nombre: ".$key[1]."<br>";
//     echo "apellido: ".$key[2]."<br>";
//     echo "numero: ".$key[3]."<br>";
//     echo "nit: ".$key[4]."<br>";
//     echo "direccion: ".$key[5]."<br>";
// }
//-----------------------------------------------------

// $nombre = "Ana";
// $apellido = "No recuerdo";
// $numero = "34433423";
// $nit = "134234";
// $direccion = "MAZATE";
// $cli::registrar($nombre, $apellido, $numero, $nit, $direccion);
// $nit = 134234;
// $var = $cli::obtenerCliente($nit);
// foreach ($var as $key) {
//     echo "id_cliente: ".$key[0]."<br>";
//     echo "nombre: ".$key[1]."<br>";
//     echo "apellido: ".$key[2]."<br>";
//     echo "numero: ".$key[3]."<br>";
//     echo "nit: ".$key[4]."<br>";
//     echo "direccion: ".$key[5]."<br>";
// }
//-----------------------------------------------------

// $id_cliente = "4";
// $cli::eliminarCliente($id_cliente);
//-----------------------------------------------------

// $nombre = "Anderson";
// $apellido = "Parada Alvizures";
// $numero = "3134";
// $nit = "432412";
// $direccion = "Tiquisate, Escuintla";
// $var = $cli::obtenerCliente($nit);
// foreach ($var as $key) {
//     echo "Cliente sin editar: <br>";
//     echo "id_cliente: ".$key[0]."<br>";
//     echo "nombre: ".$key[1]."<br>";
//     echo "apellido: ".$key[2]."<br>";
//     echo "numero: ".$key[3]."<br>";
//     echo "nit: ".$key[4]."<br>";
//     echo "direccion: ".$key[5]."<br>";
//     echo "<br> Cliente Editado: <br>";
// }


// $cli::editarCliente($nombre, $apellido, $numero, $nit, $direccion, "3");
// $var = $cli::obtenerCliente($nit);
// foreach ($var as $key) {
//     echo "id_cliente: ".$key[0]."<br>";
//     echo "nombre: ".$key[1]."<br>";
//     echo "apellido: ".$key[2]."<br>";
//     echo "numero: ".$key[3]."<br>";
//     echo "nit: ".$key[4]."<br>";
//     echo "direccion: ".$key[5]."<br>";
// }
?>