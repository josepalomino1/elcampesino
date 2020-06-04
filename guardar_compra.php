<?php
    session_start();
    $id_empleado = $_SESSION['id_empleado'];
    require_once("backend/venta.php");
    require_once("backend/productos.php");
    require_once('backend/carrito_compra.php');
    $vd = new carrito_compra();
    $venta = new venta();
    $producto = new productos();
    verificar_session();
    $bandera = false;
    $var = null;
    
    //id_Venta, id_producto, cantidad
    if(isset($_POST['agregar'])){
        if (empty($_SESSION["listadecompra"])) {
            $i = 0;
            $_SESSION["listadecompra"][$i] = $_POST['nombre'];
        } else {
            $i = count($_SESSION["listadecompra"]);
            $i++;
            $_SESSION["listadecompra"][$i] = $_POST['nombre'];
        }
        
    }

    if(isset($_GET['borrar'])){
        unset($_SESSION["listadecompra"][$_GET['borrar']]);
        $_SESSION["listadecompra"] = array_values($_SESSION["listadecompra"]);
    }
    //var_dump($carrito);
    $nombre_producto="";
    if(!empty( $_SESSION['nombre_producto'])){
        $nombre_producto=$_SESSION['nombre_producto'];
    }
    if(isset($_POST['buscar'])){
        $nombre_producto=$_POST['nombre'];   
        $_SESSION['nombre_producto']=$nombre_producto;
    }
    
    
     $var = $producto::productoNombre($_SESSION['id_sucursal'],$nombre_producto);
        $bandera = true;

   if(isset($_POST['add_carrito'])){
        $id_producto = $_POST['id_producto'];
        
        $nombre = $_POST['nombre_p'];
        $precio = $_POST['precio'];
        $marca = $_POST['marca'];
        $descripcion = $_POST['descripcion'];
        $cantidad = $_POST["cantidad"];
        $id_producto." ".$nombre." ".$marca." \n";
        $cantidad;
        
        $vd::agregar($id_empleado, $id_producto, $nombre, $precio, $marca, $descripcion, $cantidad);
    }

    if(isset($_POST['add_factura'])){
        echo "hola";
    }
    header("location:compras.php"); 
?>
