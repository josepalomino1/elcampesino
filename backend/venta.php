<?php 
require_once 'funciones.php';
 
class venta{
    function __construct() { }
    //esto es el crud:
    //insertar
    function registrar($id_empleado, $id_cliente, $id_tipo_compra_venta, $fecha){
        //el id_cliente es el nit
        $con = conexion("root", "1234");
        $consulta = $con->prepare("INSERT INTO ventas (id_empleado, id_cliente, id_tipo_compra_venta, fecha) VALUES (:id_empleado, :id_cliente, :id_tipo_compra_venta, :fecha)"); 
        $consulta->execute(array(
            ':id_empleado' => $id_empleado,
            ':id_cliente' => $id_cliente,
            ':id_tipo_compra_venta' => $id_tipo_compra_venta,
            ':fecha' => $fecha
        ));
    }

    //leer
    function obtenerVentasFecha($fecha_inicial, $fecha_final){
        $con = conexion("root", "1234");
        $consulta = $con->prepare("SELECT v.id_venta, concat(c.nombre,' ', c.apellido) as nombre_cliente, 
        concat(e.nombre,' ',e.apellido) as nombre_empleado, tcv.tipo, v.fecha, s.nombre as sucursal
        from ventas as v 
        inner join cliente as c on c.id_cliente = v.id_cliente
        inner join empleado as e on e.id_empleado = v.id_empleado
        inner join tipo_compra_venta as tcv on tcv.id_tipo = v.id_tipo_compra_venta
        inner join sucursal as s on s.id_sucursal = e.id_sucursal
        where (v.fecha between :fecha_inicial and :fecha_final) order by s.id_sucursal");
        $consulta->execute(array(
            ':fecha_inicial' => $fecha_inicial,
            ':fecha_final' => $fecha_final
        ));
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    function obtenerVentasSucursalFecha($id_sucursal, $fecha_inicial, $fecha_final){
        $con = conexion("root", "1234");
        $consulta = $con->prepare("SELECT v.id_venta, concat(c.nombre,' ', c.apellido) as nombre_cliente, 
        concat(e.nombre,' ',e.apellido) as nombre_empleado, tcv.tipo, v.fecha, s.nombre as sucursal
        from ventas as v 
        inner join cliente as c on c.id_cliente = v.id_cliente
        inner join empleado as e on e.id_empleado = v.id_empleado
        inner join tipo_compra_venta as tcv on tcv.id_tipo = v.id_tipo_compra_venta
        inner join sucursal as s on s.id_sucursal = e.id_sucursal
        where (v.fecha between :fecha_inicial and :fecha_final) and s.id_sucursal = :id_sucursal");
        $consulta->execute(array(
            ':fecha_inicial' => $fecha_inicial,
            ':fecha_final' => $fecha_final,
            ':id_sucursal' => $id_sucursal
        ));
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    //eliminar
    function eliminar($id_venta){
        //primero hace una consulta para guardar los datos del cliente, para despues mostrar al cliente que se eliminó
        $con = conexion("root", "1234");
        $consulta = $con->prepare("DELETE FROM ventas WHERE id_venta=:id_venta");
        $consulta->execute(array(
            ':id_venta' => $id_venta
        ));
    }

    function ultimaVenta(){
        $con = conexion("root","1234");
        $consulta = $con->prepare("SELECT max(id_venta) from ventas");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }


}


?>