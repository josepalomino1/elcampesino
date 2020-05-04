<?php 
require_once 'funciones.php';

class compra{

    function __construct() { }
    
    function registrar($id_sucursal, $id_proveedores, $id_tipo_compra_venta, $fecha){
        $con = conexion("root", "1234");
        $consulta = $con->prepare("INSERT INTO compras ( id_sucursal, id_proveedores, id_tipo_compra_venta, fecha ) VALUES (:id_sucursal, :id_proveedores, :id_tipo_compra_venta, :fecha)"); 
        $consulta->execute(array(
            ':id_sucursal' => $id_sucursal,
            ':id_proveedores' => $id_proveedores,
            ':id_tipo_compra_venta' => $id_tipo_compra_venta,
            ':fecha' => $fecha
        ));
    }

    //leer
    function obtenerComprasSucursal($id_sucursal){
        $con = conexion("root", "1234");
        $consulta = $con->prepare("SELECT c.id_compra, sum(d.cantidad*p.precio_compra) as total , c.fecha
                                    from compras as c 
                                    inner join compra_detalle as d on d.id_compra=c.id_compra
                                    inner join productos as p on p.id_producto=d.id_producto
                                    where c.id_sucursal = :id_sucursal
                                    group by c.id_compra ");
        $consulta->execute(array(
            ':id_sucursal' => $id_sucursal
        ));
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    function obtenerCompras(){
        $con = conexion("root", "1234");
        $consulta = $con->prepare("SELECT * from view_compras");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    //obtiene todas las compras se se han hecho a un proveedor
    function obtenerComprasProveedor($id_proveedores){
        $con = conexion("root", "1234");
        $consulta = $con->prepare("SELECT c.id_compra, sum(d.cantidad*p.precio_compra) as total , c.fecha,  pv.nombre, pv.direccion
                                    from compras as c 
                                    inner join compra_detalle as d on d.id_compra=c.id_compra
                                    inner join productos as p on p.id_producto=d.id_producto
                                    inner join proveedor as pv on pv.id_proveedor = c.id_proveedores
                                    where c.id_proveedores = :id_proveedores
                                    group by c.id_compra");
        $consulta->execute(array(
            ':id_proveedores' => $id_proveedores
        ));
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    //eliminar
    function eliminar($id_compra){
        //primero hace una consulta para guardar los datos del cliente, para despues mostrar al cliente que se eliminó
        $con = conexion("root", "1234");
        $consulta = $con->prepare("DELETE FROM compras WHERE id_compra=:id_compra");
        $consulta->execute(array(
            ':id_compra' => $id_compra
        ));
    }

    //actualizar
    function editar($id_sucursal, $id_proveedores, $id_tipo_compra_venta, $fecha, $id_compra){
        $con =  conexion("root", "1234");
        $consulta = $con->prepare("UPDATE compras SET id_sucursal=:id_sucursal, id_proveedores=:id_proveedores, id_tipo_compra_venta=:id_tipo_compra_venta, fecha=:fecha WHERE id_compra=:id_compra");
        $consulta->execute(array(
            ':id_sucursal' => $id_sucursal,
            ':id_proveedores' => $id_proveedores,
            ':id_tipo_compra_venta' => $id_tipo_compra_venta,
            ':fecha' => $fecha,
            ':id_compra' => $id_compra,
        ));
    }

    function ultimaCompra(){
        $con = conexion("root","1234");
        $consulta = $con->prepare("SELECT max(id_compra) as comp from compras");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }


}


?>