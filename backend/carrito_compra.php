<?php 
require_once 'funciones.php';

class carrito_compra{
    function __construct() { }  
    /*
    
    */ 

    function agregar($id_empleado, $id_producto, $nombre_producto, $precio, $marca, $descripcion, $cantidad){
        $con = conexion("root", "1234");
        $consulta = $con->prepare("INSERT INTO carrito_compra (id_empleado, id_producto, nombre_producto, precio, marca, descripcion, cantidad) VALUES (:id_empleado,:id_producto,:nombre_producto,:precio, :marca, :descripcion, :cantidad)");
        $consulta->execute(array(
            'id_empleado'=>$id_empleado,
            'id_producto'=>$id_producto,
            'nombre_producto'=>$nombre_producto,
            'precio'=>$precio,
            'marca'=>$marca,
            'descripcion'=>$descripcion,
            'cantidad'=>$cantidad


        ));

    }

    function ver_carrito($id_empleado){
        $con = conexion("root", "1234");
        $consulta = $con->prepare("SELECT id_empleado, id_producto, nombre_producto, precio, marca, descripcion, sum(cantidad) FROM carrito_compra WHERE id_empleado=$id_empleado group by id_producto");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    function totalcarritocompra($id_empleado){
        $con = conexion("root", "1234");
        $consulta = $con->prepare("SELECT SUM(precio) FROM carrito_compra WHERE id_empleado=$id_empleado");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    function eliminar_producto($id_producto, $id_empleado){
        $con = conexion("root", "1234");
        $consulta = $con->prepare("DELETE FROM carrito_compra WHERE  id_empleado=:id_empleado AND id_producto=:id_producto");
        $consulta->execute(array(
            'id_producto'=>$id_producto,
            'id_empleado'=>$id_empleado
        ));
    }
    function vaciar_carrito($id_empleado){
        $con = conexion("root", "1234");
        $consulta = $con->prepare("DELETE FROM carrito_compra WHERE id_empleado=:id_empleado");
        $consulta->execute(array(
            ':id_empleado' => $id_empleado
        ));
    }
}