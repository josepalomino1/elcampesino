<?php 
require_once 'funciones.php';

class Proveedor{
    function __construct() { }
    //esto es el crud:
    //insertar
    function registrar($nombre, $numero, $nit, $numero2, $direccion){
        
        $con = conexion("root", "1234");
        $consulta = $con->prepare("INSERT INTO proveedor (nombre, numero, nit, numero2, direccion) VALUES (':nombre', ':numero', ':nit', ':numero2', ':direccion')"); 
        $consulta->execute(array(
            ':nombre' => $nombre,
            ':numero' => $numero,
            ':nit' => $nit,
            'numero2'=>$numero2,
            ':direccion' => $direccion
        ));
    }

    //leer
    function obtenerProveedor($nit){
        $con = conexion("root", "1234");
        $consulta = $con->prepare("SELECT * FROM proveedor WHERE nit=:nit");
        $consulta->execute(array(
            ':nit' => $nit
        ));
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    //leer todos
    function obtenerProveedores(){
        $con = conexion("root", "1234");
        $consulta = $con->prepare("SELECT * FROM proveedor");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    //eliminar
    function eliminarProveedor($id_proveedor){
        //primero hace una consulta para guardar los datos del proveedor, para despues mostrar al proveedor que se eliminó
        $con = conexion("root", "1234");
        $consulta = $con->prepare("DELETE FROM proveedor WHERE id_proveedor=:id_proveedor");
        $consulta->execute(array(
            ':id_proveedor' => $id_proveedor
        ));
    }

    //actualizar
    function editarProveedor($nombre, $numero, $nit, $numero2, $direccion, $id_proveedor){
        $con =  conexion("root", "1234");
        $consulta = $con->prepare("UPDATE proveedor SET nombre=:nombre, numero=:numero, nit=:nit, numero2=:numero2, direccion=:direccion WHERE  id_proveedor=:id_proveedor");
        $consulta->execute(array(
            ':id_proveedor' => $id_proveedor,
            ':nombre' => $nombre,
            ':numero' => $numero,
            ':nit' => $nit,
            'numero2'=>$numero2,
            ':direccion' => $direccion
        ));
    }


}


?>