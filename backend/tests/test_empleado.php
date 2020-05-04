<?php 
require('../empleado.php');
$emp = new empleado();
//de preferencia los nombres y apellidos en mayusculas y sin tildes.
// $id_tipo_empleado = "1"; 
// $id_sucursal = "1"; 
// $nombre = "David";
// $apellido = "Parada";
// $correo = "correo@correo"; 
// $pass = "1234";
// $emp::registrar($id_tipo_empleado, $id_sucursal, $nombre, $apellido, $correo, $pass);

// $correo = "correo@correo"; 
// $pass = "12345";
// $var = $emp::obtenerEmpleadosSesion($correo, $pass);

// if(isset($var[0])){
//     foreach ($var as $key) {
//         echo $key[0]."<br>";
//         echo $key[1]."<br>";
//         echo $key[2]."<br>";
//         echo $key[3]."<br>";
//         echo $key[4]."<br>";
//         echo $key[5]."<br>";
//         echo $key[6];
//     }
// }else{
//     echo "Datos Incorrectos";
// }

// $var = $emp::obtenerEmpleado();
// foreach ($var as $key) {
//     echo $key[0]."<br>";
//     echo $key[1]."<br>";
//     echo $key[2]."<br>";
//     echo $key[3]."<br>";
//     echo $key[4]."<br>";
//     echo $key[5]."<br>";
//     echo $key[6]."<br>";
// }
//aqui practicamente solo pasas el id donde se hara el cambio
// $emp::editarSucursal("4","2");

// $emp::editarTipoEmpleado("4","3");

// $correo = "correo@correo"; 
// $pass = "1234";
// $nuevoPass = "12345";
// $emp::editarPass($correo, $pass, $nuevoPass)
?>