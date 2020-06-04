<?php 
require_once 'funciones.php';
 
class credito_cliente{
    function __construct() { }
    function registrar($id_venta, $por_cobrar){
        $con = conexion("root","1234");
        $consulta = $con->prepare("INSERT INTO credito_cliente (id_venta, por_cobrar) VALUES (:id_venta,:por_cobrar) ");
        $consulta->execute(array(
            'id_venta' => $id_venta,
            'por_cobrar' => $por_cobrar
        ));
    }

    function obtenerCreditos(){
        $con = conexion("root","1234");
        $consulta = $con->prepare("SELECT c.id_cliente, c.nombre, cc.por_cobrar, cc.id_credito
                                from credito_cliente as cc
                                inner join ventas as v on v.id_venta = cc.id_venta
                                inner join cliente as c on c.nit = v.id_cliente
                                where cc.por_cobrar > 0");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado; //lo que se retorne debe de validar si tiene datos, en caso de no tenerlos dar un mensaje que no hay credito por cobrar
    }

    function obtenerCreditoById($id_credito){
        $con = conexion("root","1234");
        $consulta = $con->prepare("SELECT c.nombre, cc.por_cobrar, cc.id_credito, c.id_cliente
                                from credito_cliente as cc
                                inner join ventas as v on v.id_venta = cc.id_venta
                                inner join cliente as c on c.nit = v.id_cliente
                                where cc.id_credito = :id_credito and cc.por_cobrar > 0");
        $consulta->execute(array(
            'id_credito' => $id_credito
        ));
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    function obtenerCreditosCliente($nit){
        $con = conexion("root","1234");
        $consulta = $con->prepare("SELECT c.nombre, cc.por_cobrar, cc.id_credito, c.id_cliente
                                from credito_cliente as cc
                                inner join ventas as v on v.id_venta = cc.id_venta
                                inner join cliente as c on c.nit = v.id_cliente
                                where c.nit = :nit and cc.por_cobrar > 0");
        $consulta->execute(array(
            'nit' => $nit
        ));
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    function editar($id_credito, $por_cobrar){
        $con = conexion("root","1234");
        $consulta = $con->prepare("UPDATE credito_cliente SET por_cobrar=:por_cobrar where id_credito=:id_credito");
        $consulta->execute(array(
            'id_credito' => $id_credito,
            'por_cobrar' => $por_cobrar
        ));
    }


}

?>