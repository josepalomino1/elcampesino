<?php
    session_start();
    $id_empleado = $_SESSION['id_empleado'];
    require_once("backend/venta.php");
    require_once("backend/productos.php");
    require_once('backend/venta_detalle.php');
    $vd = new venta_detalle();
    $venta = new venta();
    $producto = new productos();
    verificar_session();
    $bandera = false;
    $var = null;
   if(isset($_POST['add_carrito'])){
        $id_producto = $_POST['id_producto'];
        
        $nombre = $_POST['nombre_p'];
        $precio = $_POST['precio'];
        $marca = $_POST['marca'];
        $descripcion = $_POST['descripcion'];
        $cantidad = $_POST["cantidad"];
        $id_producto." ".$nombre." ".$marca." \n";
        $cantidad;
        
        $vd::carrito($id_empleado, $id_producto, $nombre, $precio, $marca, $descripcion, $cantidad);
   }
   header("location:ventas.php");  
  
    

?>

