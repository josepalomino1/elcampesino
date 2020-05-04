<?php 
require_once 'funciones.php';

class empleado {
    function __construct() { }
    
    function registrar($id_tipo_empleado, $id_sucursal, $nombre, $apellido, $correo, $pass){
        $hashed = hash('sha512', $pass);
        $con = conexion("root", "1234");
        $consulta = $con->prepare("INSERT INTO empleado (id_tipo_empleado, id_sucursal, nombre, apellido, correo, pass) VALUES (:id_tipo_empleado, :id_sucursal, :nombre, :apellido, :correo, :pass)");
        $consulta->execute(array(
            ':id_tipo_empleado'=>$id_tipo_empleado,
            ':id_sucursal'=>$id_sucursal,
            ':nombre' => $nombre,
            ':apellido' => $apellido,
            ':correo' => $correo,
            ':pass' => $hashed
        ));
    }

    function obtenerEmpleadosSesion($correo, $pass){
        $hashed = hash('sha512', $pass);
        $con = conexion("root", "1234");
        $consulta = $con->prepare("SELECT * FROM empleado WHERE correo=:correo AND pass=:pass");
        $consulta->execute(array(
            ':correo' => $correo,
            ':pass' => $hashed
        ));
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    function obtenerEmpleado(){
        $con = conexion("root", "1234");
        $consulta = $con->prepare("SELECT * FROM lista_empleado");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    function editarSucursal($id_empleado, $id_sucursal){
        $con = conexion("root", "1234");
        $consulta = $con->prepare("UPDATE empleado set id_sucursal=:id_sucursal WHERE  id_empleado=:id_empleado");
        $consulta->execute(array(
            ':id_empleado' => $id_empleado,
            ':id_sucursal' => $id_sucursal
        ));
    }

    function editarTipoEmpleado($id_empleado, $id_tipo_empleado){
        $con = conexion("root", "1234");
        $consulta = $con->prepare("UPDATE empleado set id_tipo_empleado=:id_tipo_empleado WHERE  id_empleado=:id_empleado");
        $consulta->execute(array(
            ':id_empleado' => $id_empleado,
            ':id_tipo_empleado' => $id_tipo_empleado
        ));
    }



    function editarPass($correo, $pass, $nuevoPass){
        $hashed = hash('sha512', $pass);
        $hashed2 = hash('sha512', $nuevoPass);
        $con = conexion("root", "1234");
        $consulta = $con->prepare("UPDATE empleado set pass=:nuevo WHERE correo=:correo and pass=:pass");
        $consulta->execute(array(
            ':correo' => $correo,
            ':nuevo' => $hashed2,
            ':pass' => $hashed
            
        ));
    }
}

    

?>