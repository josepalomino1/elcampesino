<?php 

require_once 'funciones.php';

class producto{
    //esta funcion solo la puede hacer el administrador general.
    function registrar($nombre, $direccion){
        $con = conexion("root","1234");
        $consulta = $con->prepare("INSERT INTO sucursal (nombre, direccion) VALUES (:nombre, :direccion)");
        $consula->execute(array(
            ':nombre' => $nombre,
            ':direccion' => $direccion
        ));
    }

    function editar($id_sucursal, $nombre, $direccion){
        $con = conexion("root","1234");
        $consulta = $con->prepare("UPDATE sucursal SET nombre=:nombre, direccion=:direccion WHERE id_sucursal=:id_sucursal");
        $consula->execute(array(
            ':id_sucursal' => $id_sucursal,
            ':nombre' => $nombre,
            ':direccion' => $direccion
        ));
    }
    //ESTA FUNCION SOLO ELIMINA LA SUCURSAL MAS NO LOS DATOS QUE HABIAN EN ESTA SUCURSAL.
    //AUNQUE SIENTO QUE ES MEJOR NO IMPLEMENTARLA, MAS BIEN SOLO EL DE EDITAR. 
    //NO SE QUE DECIS VOS
    function eliminar($id_sucursal){
        $con = conexion("root","1234");
        $consulta = $con->prepare("DELETE FROM sucursal WHERE id_sucursal=:id_sucursal");
        $consula->execute(array(
            ':id_sucursal' => $id_sucursal
        ));
    }

    function ObtenerSucursales(){
        $con = conexion("root","1234");
        $consulta = $con->prepare("SELECT * FROM sucursal");
        $consula->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }


}

?>