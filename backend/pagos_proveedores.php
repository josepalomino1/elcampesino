<?php 
require_once 'funciones.php';
class pagos_proveedores{
    
    function registrar($id_credito_proveedor, $pago, $fecha){
        $con = conexion("root","1234");
        $consulta = $con->prepare("INSERT INTO pagos_proveedor (id_credito_proveedor, fecha, pago) VALUES (:id_credito_proveedor,:fecha,:pago) ");
        $consula->execute(array(
            ':id_credito_proveedor' => $id_credito_proveedor,
            ':fecha' => $fecha,
            ':pago' => $pago
        ));
    }

    function pagosProveedor($nit){
        $con = conexion("root","1234");
        $consulta = $con->prepare("SELECT c.nombre as nombre,c.apellido as apellido, pc.pago as pagos, v.id_venta,pc.fecha
                                from pagos_proveedor as pc
                                inner join credito_cliente as cc on cc.id_credito = pc.id_credito_cliente
                                inner join ventas as v on v.id_venta = cc.id_venta
                                inner join cliente as c on c.id_cliente = v.id_cliente
                                where c.nit = :nit");
        $consula->execute(array(
            ':nit' => $nit
        ));
        $resultado = $consulta->fetchAll();
        return $resultado;
    }
    function pagosClientes(){
        $con = conexion("root","1234");
        $consulta = $con->prepare("SELECT c.nombre as nombre,c.apellido as apellido, pc.pago as pagos, v.id_venta,pc.fecha
                                from pagos_proveedor as pc
                                inner join credito_cliente as cc on cc.id_credito = pc.id_credito_cliente
                                inner join ventas as v on v.id_venta = cc.id_venta
                                inner join cliente as c on c.id_cliente = v.id_cliente
        ");
        $consula->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }


}
?>