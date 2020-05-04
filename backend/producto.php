<?php 

require_once 'funciones.php';

class producto{
    function __construct() { }
    function registrar($id_sucursal, $nombre, $precio_compra, $precio_venta, $existencia, $descripcion){
        $con = conexion("root","1234");
        $consulta = $con->prepare("INSERT INTO productos (id_sucursal, nombre, precio_compra, precio_venta, existencia, descripcion) 
        VALUES (:id_sucursal, :nombre, :precio_compra, :precio_venta, :existencia, :descripcion)");
        $consula->execute(array(
            ':id_sucursal' => $id_sucursal,
            ':nombre' => $nombre,
            ':precio_compra' => $precio_compra,
            ':precio_venta' => $id_sucursal,
            ':existencia' => $nombre,
            ':descripcion' => $descripcion
        ));
    }

    function editar($id_sucursal, $nombre, $precio_compra, $precio_venta, $existencia, $descripcion){
        $con = conexion("root","1234");
        $consulta = $con->prepare("UPDATE productos SET nombre=:nombre, precio_compra=:precio_compra, 
                                    precio_venta=:precio_venta, existencia=:existencia, descripcion=:descripcion
                                    where id_sucursal=:id_sucursal ");
        $consula->execute(array(
            ':id_sucursal' => $id_sucursal,
            ':nombre' => $nombre,
            ':precio_compra' => $precio_compra,
            ':precio_venta' => $id_sucursal,
            ':existencia' => $nombre,
            ':descripcion' => $descripcion
        ));
    }
    //busca producto por nombre
    function productoNombre($id_sucursal, $nombre){
        $con = conexion("root","1234");
        $consulta = $con->prepare("SELECT p.id_producto, p.nombre, p.precio_venta as precio, p.existencia, p.descripcion from productos as p
        where p.id_sucursal = :id_sucursal and nombre like % :nombre % ");
        $consula->execute(array(
            ':id_sucursal' => $id_sucursal,
            ':nombre' => $nombre
        ));
    }

    function productos($id_sucursal){
        $con = conexion("root","1234");
        $consulta = $con->prepare("SELECT p.id_producto, p.nombre, p.precio_venta as precio, p.existencia, p.descripcion from productos as p
        where p.id_sucursal = :id_sucursal ");
        $consula->execute(array(
            ':id_sucursal' => $id_sucursal,
            ':nombre' => $nombre
        ));
    }


}

?>