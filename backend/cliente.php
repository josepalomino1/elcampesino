<?php 
require_once 'funciones.php';

class cliente{
    //esto es el crud:
    //insertar
    function registrar($nombre, $apellido, $numero, $nit, $direccion){
        //el id_cliente es el nit
        $con = conexion("root", "1234");
        $consulta = $con->prepare("INSERT INTO clientes (id_direccion, nombre, apellido, numero, nit, direccion) VALUES (:id_direccion, :nombre, :apellido, :numero, :nit, :direccion)"); 
        $consulta->execute(array(
            ':nombre' => $nombre,
            ':apellido' => $apellido,
            ':numero' => $numero,
            ':nit' => $nit,
            ':direccion' => $direccion
        ));
    }

    //leer
    function obtenerCliente($nit){
        $con = conexion("root", "1234");
        $consulta = $con->prepare("SELECT * FROM cliente WHERE id_cliente=:id_cliente");
        $consulta->execute(array(
            ':id_cliente' => $nit
        ));
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    //leer todos
    function obtenerClientes(){
        $con = conexion("root", "1234");
        $consulta = $con->prepare("SELECT * FROM obtener_clientes");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    //eliminar
    function eliminarCliente($id_cliente){
        //primero hace una consulta para guardar los datos del cliente, para despues mostrar al cliente que se eliminó
        $con = conexion("root", "1234");
        $consulta = $con->prepare("DELETE FROM cliente WHERE id_cliente=:id_cliente");
        $consulta->execute(array(
            ':id_cliente' => $id_cliente
        ));
    }

    //actualizar
    function editarCliente($nombre, $apellido, $numero, $nit, $direccion, $id_cliente){
        $con =  conexion("root", "1234");
        $consulta = $con->prepare("UPDATE cliente SET nombre=:nombre, apellido=:apellido, numero=:numero, nit=:nit, direccion=:direccion WHERE id_cliente=:id_cliente");
        $consulta->execute(array(
            ':nombre' => $nombre ,
            ':apellido' => $apellido ,
            ':numero' => $numero ,
            ':nit' => $nit,
            ':direccion' => $direccion,
            ':id_cliente' => $id_cliente
        ));
    }


}


?>