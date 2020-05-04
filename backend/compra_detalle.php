<?php 

require_once 'funciones.php';

class compra_detalle{
    function __construct() { }
    //para crear una compra_detalle
    function registrar($id_compra, $id_producto, $cantidad){
        $con = conexion("root","1234");
        $consulta = $con->prepare("INSERT INTO compra_detalle (id_compra, id_producto, cantidad) VALUES (:id_compra, :id_producto,:cantidad)");
        $consulta->execute(array(
            'id_compra' => $id_compra,
            'id_producto' => $id_producto,
            'cantidad' => $cantidad
        ));
    }


    function editar($id_compra, $id_producto, $cantidad, $id_compra_producto){
        $con = conexion("root","1234");
        $consulta = $con->prepare("UPDATE compra_detalle SET id_compra=:id_compra, id_producto=:id_producto, cantidad=:cantidad where id_compra_producto=:id_compra_producto");
        $consulta->execute(array(
            'id_compra' => $id_compra,
            'id_producto' => $id_producto,
            'cantidad' => $cantidad,
            'id_compra_producto' => $id_compra_producto
        ));
    }

    function eliminar($id_compra_producto){
        //primero hace una consulta para guardar los datos del cliente, para despues mostrar al cliente que se eliminó
        $con = conexion("root", "1234");
        $consulta = $con->prepare("DELETE FROM compra_detalle WHERE id_compra_producto=:id_compra_producto");
        $consulta->execute(array(
            ':id_compra_producto' => $id_compra_producto
        ));
    }

    function ObtenerCompraDetalle($id_compra_producto){
        $con = conexion("root","1234");
        $consulta = $con->prepare("SELECT p.nombre, cd.cantidad
                                from compra_detalle as cd
                                inner join compras as c on c.id_compra = cd.id_compra
                                inner join productos as p on p.id_producto = cd.id_producto
                                where cd.id_compra_producto = :id_compra_producto");
        $consulta->execute(array(
            'id_compra_producto' => $id_compra_producto
        ));
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

}

?>