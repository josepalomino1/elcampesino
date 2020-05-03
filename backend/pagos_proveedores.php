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
        $consulta = $con->prepare("SELECT pp.id_pagos, p.nombre, pp.fecha, pp.pago, cp.por_pagar
                                from pagos_proveedor as pp
                                inner join credito_proveedor as cp on cp.id_credito = pp.id_credito_proveedor
                                inner join compras as c on c.id_compra = cp.id_compra
                                inner join proveedor as p on p.id_proveedor = c.id_proveedores
                                where p.nit = :nit
        ");
        $consula->execute(array(
            ':nit' => $nit
        ));
        $resultado = $consulta->fetchAll();
        return $resultado;
    }
    
    function pagosProveedores(){
        $con = conexion("root","1234");
        $consulta = $con->prepare("SELECT pp.id_pagos, p.nombre, pp.fecha, sum(pp.pago), cp.por_pagar
                                from pagos_proveedor as pp
                                inner join credito_proveedor as cp on cp.id_credito = pp.id_credito_proveedor
                                inner join compras as c on c.id_compra = cp.id_compra
                                inner join proveedor as p on p.id_proveedor = c.id_proveedores
        ");
        $consula->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }


}
?>