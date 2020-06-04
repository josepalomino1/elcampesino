<?php 
require_once 'funciones.php';

class productos{
    function __construct() { }  

    function registrar($id_sucursal, $nombre, $precio_compra, $precio_venta, $existencia, $descripcion, $marca){
        $con = conexion("root", "1234");
        $consulta = $con->prepare("INSERT INTO productos (id_sucursal, nombre, precio_compra, precio_venta, existencia, descripcion, marca) 
        VALUES ('$id_sucursal', '$nombre', '$precio_compra', '$precio_venta', '$existencia', '$descripcion', '$marca');"); 
        $consulta->execute();
        
    }

    function editar($id_producto, $nombre, $precio_compra, $precio_venta, $existencia, $descripcion, $marca){
        $con = conexion("root","1234");
        $consulta = $con->prepare("UPDATE productos SET nombre='$nombre', precio_compra='$precio_compra', precio_venta='$precio_venta', existencia='$existencia', 
                                descripcion='$descripcion', marca='$marca' WHERE  id_producto=$id_producto");
        $consulta->execute();
    }
    //existencia_Real - $venta = nueva_existencia
    function editarExistencias($id_producto, $existencia){
        $con = conexion("root","1234");
        $consulta = $con->prepare("UPDATE productos SET existencia='$existencia' WHERE  id_producto=$id_producto");
        $consulta->execute();
    }
    
    //busca producto por nombre
    function productoNombre($id_sucursal, $nombre){
        $con = conexion("root","1234");
        if($nombre==""){
            $consulta = $con->prepare("SELECT p.id_producto, p.nombre, p.precio_venta as precio, p.existencia, p.marca, p.descripcion from productos as p
        where p.id_sucursal = :id_sucursal");
        }else{
            $consulta = $con->prepare("SELECT p.id_producto, p.nombre, p.precio_venta as precio, p.existencia, p.marca, p.descripcion from productos as p
        where p.id_sucursal = :id_sucursal and nombre like '%$nombre%' ");
        }
        
        $consulta->execute(array(
            ':id_sucursal' => $id_sucursal
        ));
        $resultado = $consulta->fetchAll();
        return $resultado;
    } 

    function productoId($id){
        $con = conexion("root","1234");
        $consulta = $con->prepare("SELECT existencia FROM productos WHERE id_producto = $id ");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    function productosSucursal($id_sucursal){
        $con = conexion("root","1234");
        $consulta = $con->prepare("SELECT p.id_producto, p.nombre, p.precio_venta as precio, p.existencia, p.marca,  p.descripcion from productos as p
                            where p.id_sucursal =:id_sucursal");
        $consulta->execute(array(
            ':id_sucursal' => $id_sucursal
        ));
        $resultado = $consulta->fetchAll();
        return $resultado;
    } 

    function carrito($id_producto, $nombre, $precio, $descripcion, $marca, $cantidad){
        $con = conexion("root", "1234");
        $consulta = $con->prepare("INSERT INTO carrito (id_producto, nombre, precio, descripcion, marca, cantidad) 
        VALUES ('$id_producto', '$nombre', '$precio, '$descripcion', '$marca', '$cantidad');"); 
        $consulta->execute();
    }


}

?>