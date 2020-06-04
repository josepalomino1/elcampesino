<?php 
require_once 'funciones.php';
class pagos_cliente{
    
    function __construct() { }
    
    function registrar($id_credito_cliente, $fecha, $pago){
        $con = conexion("root","1234");
        $consulta = $con->prepare("INSERT INTO pagos_cliente (id_credito_cliente, fecha, pago) VALUES (:id_credito_cliente, :fecha, :pago)");
        $consulta->execute(array(
            ':id_credito_cliente' => $id_credito_cliente, 
            ':fecha' => $fecha, 
            ':pago' => $pago
        ));
    }

    function pagosCliente($nit){
        $con = conexion("root","1234");
        $consulta = $con->prepare("SELECT c.nombre as nombre,c.apellido as apellido, pc.pago as pagos, v.id_venta as iv,pc.fecha
                                from pagos_cliente as pc
                                inner join credito_cliente as cc on cc.id_credito = pc.id_credito_cliente
                                inner join ventas as v on v.id_venta = cc.id_venta
                                inner join cliente as c on c.nit = v.id_cliente
                                
                                where c.nit = :nit
                                ORDER BY iv desc 
                                ");
        $consulta->execute(array(
            ':nit' => $nit
        ));
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    function pagosClientes(){
        $con = conexion("root","1234");
        $consulta = $con->prepare("SELECT c.nombre as nombre,c.apellido as apellido, pc.pago as pagos, v.id_venta,pc.fecha
                                from pagos_cliente as pc
                                inner join credito_cliente as cc on cc.id_credito = pc.id_credito_cliente
                                inner join ventas as v on v.id_venta = cc.id_venta
                                inner join cliente as c on c.nit = v.id_cliente
        ");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }


}
?>