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
        $consulta = $con->prepare("SELECT id_empleado, id_producto, nombre_producto, precio, marca, descripcion, sum(cantidad) FROM carrito WHERE id_empleado=$id_empleado group by id_producto");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    function ver_datos($id_empleado){
        $con = conexion("root", "1234");
        $consulta = $con->prepare("SELECT id_producto, SUM(cantidad) as cantidad, id_producto FROM carrito WHERE id_empleado=$id_empleado group by id_producto");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    //retorna los datos para hacer la factura!
    function vercarrito($id_empleado){
        $con = conexion("root", "1234");
        $consulta = $con->prepare("SELECT CONCAT(c.nombre_producto,' ',c.marca,' ',c.descripcion) AS nombre_productos, c.precio, sum(c.cantidad) FROM 
        carrito AS c
        WHERE c.id_empleado = $id_empleado
        GROUP BY nombre_productos");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    function totalcarritoventa($id_empleado){
        $con = conexion("root", "1234");
        $consulta = $con->prepare("SELECT SUM(precio) FROM carrito WHERE id_empleado=$id_empleado");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    function eliminar_Fcarrito($id_producto){
        $con = conexion("root", "1234");
        $consulta = $con->prepare("DELETE FROM carrito WHERE id_producto=:id_producto");
        $consulta->execute(array(
            ':id_producto' => $id_producto
        ));
    }

    function vaciar_carrito($id_empleado){
        $con = conexion("root", "1234");
        $consulta = $con->prepare("DELETE FROM carrito WHERE id_empleado=:id_empleado");
        $consulta->execute(array(
            ':id_empleado' => $id_empleado
        ));
    }

}
 
?>