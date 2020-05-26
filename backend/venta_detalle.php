<?php 

require_once 'funciones.php';

class venta_detalle{
    //para crear una venta_detalle
    function registrar($id_venta, $id_producto, $cantidad){
        $con = conexion("root","1234");
        $consulta = $con->prepare("INSERT INTO venta_detalle (id_venta, id_producto, cantidad) VALUES (:id_venta, :id_producto,:cantidad)");
        $consulta->execute(array(
            'id_venta' => $id_venta,
            'id_producto' => $id_producto,
            'cantidad' => $cantidad
        ));
    }

    function editar($id_venta_producto, $id_venta, $id_producto, $cantidad){
        $con = conexion("root","1234");
        $consulta = $con->prepare("UPDATE venta_detalle SET id_venta=:id_venta, id_producto=:id_producto, cantidad=:cantidad where id_venta_producto=:id_venta_producto");
        $consulta->execute(array(
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

    function carrito($id_empleado, $id_producto, $nombre_producto, $precio, $marca, $descripcion, $cantidad){
        $con = conexion("root", "1234");
        $consulta = $con->prepare("INSERT INTO carrito (id_empleado, id_producto, nombre_producto, precio, marca, descripcion, cantidad) VALUES (:id_empleado, :id_producto, :nombre_producto, :precio, :marca, :descripcion, :cantidad)"); 
        $consulta->execute(array(
            ':id_empleado' => $id_empleado,
            ':id_producto' => $id_producto,
            ':nombre_producto' => $nombre_producto,
            ':precio' => $precio,
            ':marca' => $marca,
            ':descripcion' => $descripcion,
            ':cantidad' => $cantidad
        ));
    }

    function ver_carrito($id_empleado){
        $con = conexion("root", "1234");
        $consulta = $con->prepare("SELECT id_empleado, id_producto, nombre_producto, precio, marca, descripcion, SUM(cantidad) FROM carrito WHERE id_empleado=$id_empleado group by id_producto");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }
    function vercarrito($id_empleado, $id_producto, $nombre_producto, $precio, $marca, $descripcion, $cantidad){
        $con = conexion("root", "1234");
        $consulta = $con->prepare("SELECT * FROM carrito WHERE id_empleado=:id_empleado");
        $consulta->execute(array(
            'id_empleado' => $id_empleado,
            'id_producto' => $id_producto,
            'nombre_producto' => $nombre_producto,
            'precio' => $precio,
            'marca' => $marca,
            'descripción' => $descripcion,
            'cantidad' => $cantidad
        ));
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

}

?>