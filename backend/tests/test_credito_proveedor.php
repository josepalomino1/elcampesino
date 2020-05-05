<?php 
require('../credito_proveedor.php');
$cp = new credito_proveedor();
//-----------------------------------------------------
// $id_compra = "2";
// $por_pagar = 2000;
// $cp::registrar($id_compra, $por_pagar);
//-----------------------------------------------------

//-----------------------------------------------------
// $var = $cp::obtenerCreditos();
// foreach ($var as $key ) {
//     echo "id_credito: ".$key[0]."<br>";
//     echo "Nombre: ".$key[1]."<br>";
//     echo "Fecha: ".$key[2]."<br>";//es fecha en la que se hizo el credito
//     echo "Por pagar: ".$key[3]."<br>";
//     echo "id_proveedor: ".$key[4]."<br>";
//     echo "<br>";
// }
//-----------------------------------------------------

//-----------------------------------------------------
// $nit = "2";
// $var = $cp::obtenerCreditosProveedor($nit);
// foreach ($var as $key ) {
//     echo "id_credito: ".$key[0]."<br>";
//     echo "Nombre: ".$key[1]."<br>";
//     echo "Fecha: ".$key[2]."<br>";//es fecha en la que se hizo el credito
//     echo "Por pagar: ".$key[3]."<br>";
//     echo "<br>";
// }
//-----------------------------------------------------

//-----------------------------------------------------
// $id_credito = "2"; $por_pagar = 1000;
// $cp::editarPago($id_credito, $por_pagar);
//-----------------------------------------------------


?>