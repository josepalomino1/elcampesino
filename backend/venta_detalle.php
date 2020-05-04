<?php 

require_once 'funciones.php';

class venta_detalle{
    //para crear una venta_detalle
    function registrar($id_venta, $id_producto, $cantidad){
        $con = conexion("root","1234");
        $consula = $con->prepare("INSERT INTO venta_detalle (id_venta, id_producto, cantidad) VALUES (:id_venta, :id_producto,:cantidad)");
        $consulta->execute(array(
            'id_venta' => $id_venta,
            'id_producto' => $id_producto,
            'cantidad' => $cantidad
        ));
    }


    function editar($id_venta_producto, $id_venta, $id_producto, $cantidad){
        $con = conexion("root","1234");
        $consulta = $con->prepare("UPDATE venta_detalle SET id_venta=:id_venta, id_producto=:id_producto, cantidad=:cantidad where id_venta_producto=:id_venta_producto");
        $consula->execute(array(
            'id_venta_producto' => $id_venta_producto,
            'id_venta' => $id_venta,
            'id_producto' => $id_producto,
            'cantidad' => $cantidad
        ));
    }

    function eliminar($id_venta_producto){
        $con = conexion("root", "1234");
        $consulta = $con->prepare("DELETE FROM venta_detalle WHERE id_venta_producto=:id_venta_producto");
        $consulta->execute(array(
            ':id_venta_producto' => $id_venta_producto
        ));
    }

    function existencias($id_sucursal){
        $con = conexion("root","1234");
        $consula = $con->prepare("SELECT p.nombre, cd.cantidad ,c.id_sucursal 
                                from venta_detalle as cd
                                inner join compras as c on c.id_venta = cd.id_venta
                                inner join productos as p on p.id_producto = cd.id_producto
                                where c.id_sucursal = :id_sucursal");
        $consulta->execute(array(
            'id_sucursal' => $id_sucursal
        ));
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

}

?>