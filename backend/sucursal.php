<?php 

require_once 'funciones.php';

class sucursal{
    function __construct() { }
    //esta funcion solo la puede hacer el administrador general.
    function registrar($nombre, $direccion, $numero, $nit){
        $con = conexion("root","1234");
        $consulta = $con->prepare("INSERT INTO sucursal (nombre, direccion, numero, nit) VALUES (:nombre, :direccion, :numero, :nit)");
        $consulta->execute(array(
            ':nombre' => $nombre,
            ':direccion' => $direccion,
            ':numero' => $numero,
            ':nit' => $nit
        ));
    }

    function editar($id_sucursal, $nombre, $direccion, $numero, $nit){
        $con = conexion("root","1234");
        $consulta = $con->prepare("UPDATE sucursal SET nombre=:nombre, direccion=:direccion,  numero=:numero, nit=:nit WHERE id_sucursal=:id_sucursal");
        $consulta->execute(array(
            ':id_sucursal' => $id_sucursal,
            ':nombre' => $nombre,
            ':direccion' => $direccion,
            ':numero' => $numero,
            ':nit' => $nit
        ));
    }
    //ESTA FUNCION SOLO ELIMINA LA SUCURSAL MAS NO LOS DATOS QUE HABIAN EN ESTA SUCURSAL.
    //AUNQUE SIENTO QUE ES MEJOR NO IMPLEMENTARLA, MAS BIEN SOLO EL DE EDITAR. 
    //NO SE QUE DECIS VOS, Y SI SE IMPLEMENTA QUE SOLO EL DUEÑO PUEDA USARLA.
    function eliminar($id_sucursal){
        $con = conexion("root","1234");
        $consulta = $con->prepare("DELETE FROM sucursal WHERE id_sucursal=:id_sucursal");
        $consulta->execute(array(
            ':id_sucursal' => $id_sucursal
        ));
    }

    function ObtenerSucursales(){
        $con = conexion("root","1234");
        $consulta = $con->prepare("SELECT * FROM sucursal");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    function ObtenerSucursal($id){
        $con = conexion("root","1234");
        $consulta = $con->prepare("SELECT * FROM sucursal where id_sucursal = $id");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

}

?>