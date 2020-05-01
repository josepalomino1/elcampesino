<?php 
require_once 'funciones.php';
class pagos_proveedores{
    function registrar($id_credito_cliente, $pago){
        $con = conexion("root","1234");
        $consulta = $con->prepare("INSERT INTO credito_cliente (id_venta, por_cobrar) VALUES (:id_venta,:por_cobrar) ");
        $consula->execute(array(
            'id_venta' => $id_venta,
            'por_cobrar' => $por_cobrar
        ));
    }
}
?>