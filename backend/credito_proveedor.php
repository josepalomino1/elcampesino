<?php 
require_once 'funciones.php';
class credito_proveedores{
    function registrar($id_compra, $por_pagar){
        $con = conexion("root","1234");
        $consulta = $con->prepare("INSERT INTO credito_proveedor (id_compra, por_pagar) VALUES (:id_compra,:por_pagar) ");
        $consula->execute(array(
            'id_compra' => $id_compra,
            'por_pagar' => $por_pagar
        ));
    }
    function obtenerCreditos(){
        $con = conexion("root","1234");
        $consula = $con->prepare("SELECT cp.id_credito,p.nombre, c.fecha, cp.por_pagar, p.id_proveedor
                                from credito_proveedor as cp
                                inner join compras as c on c.id_compra = cp.id_compra
                                inner join proveedor as p on p.id_proveedor = c.id_proveedores
                                where por_pagar > 0");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado; //lo que se retorne debe de validar si tiene datos, en caso de no tenerlos dar un mensaje que no hay credito por cobrar
    }

    function obtenerCreditosProveedor($nit){
        $con = conexion("root","1234");
        $consula = $con->prepare("SELECT cp.id_credito, p.nombre, c.fecha, cp.por_pagar
                                from credito_proveedor as cp
                                inner join compras as c on c.id_compra = cp.id_compra
                                inner join proveedor as p on p.id_proveedor = c.id_proveedores
                                where p.nit = 2
                                and cp.por_pagar > 0");
        $consulta->execute(array(
            'nit' => $nit
        ));
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    function editar($id_credito, $por_pagar){
        $con = conexion("root","1234");
        $consulta = $con->prepare("UPDATE credito_proveedor SET por_pagar=:por_pagar where id_credito=:id_credito");
        $consula->execute(array(
            'id_credito' => $id_credito,
            'por_pagar' => $por_pagar
        ));
    }


}

?>