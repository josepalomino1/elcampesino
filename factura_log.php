<?php
//NitClientes
session_start();
require_once("backend/cliente.php");
require_once("backend/venta.php");
require_once("backend/productos.php");
require_once('backend/venta_detalle.php');
require('backend/credito_cliente.php');
$cc = new credito_cliente();
$vd = new venta_detalle();
$venta = new venta();
$producto = new productos();
$cliente = new cliente();
verificar_session();
//obtenerClientes();// para que usas este? 
$bandera=false;
$fecha = date('Y-m-j');
$nuevafecha = strtotime ( '-1 day' , strtotime ( $fecha ) ) ;
$nuevafecha = date ( 'Y-m-j' , $nuevafecha );

    if(isset($_POST['bnit'])){
        
        $var = $cliente::obtenerCliente($_POST['nit']);
     
    
        if(isset($var[0][1])){
            $_SESSION['nombreC']=$var[0][1];
            $_SESSION['apellidoC']=$var[0][2];
            $_SESSION['numeroC']=$var[0][3];
            $_SESSION['nit']=$var[0][4];
            $_SESSION['direccionC']=$var[0][5];
             //se registra la venta--------------------------------------------------------------
            $venta::registrar($_SESSION['id_empleado'],  $_SESSION['nit'], $_POST['id_tipo_venta'], $nuevafecha);
            //----------------------------------------------------------
            
            //se obtiene la ultima venta---------------------------------------------------------
            $var2 = $venta::ultimaVenta();
            //-----------------------------------------------------------------------------------
            $id_tipo_venta = $_POST['id_tipo_venta'];
            if($id_tipo_venta==1){
                $var4 = $vd::totalcarritoventa($_SESSION['id_empleado']);
                $total = $var4[0][0];
                $cc::registrar($var2[0][0],$total);
            }
            //se obtiene los datos del carrito y se ingresan a venta_detalle---------------------
            $var3 = $vd::ver_datos($_SESSION['id_empleado']);
            foreach ($var3 as $key) {
                $vd::registrar($var2[0][0], $key[0], $key[1]);
            }
            //-----------------------------------------------------------------------------------
    
            //se descuentan los productos vendidos.----------------------------------------------
            foreach ($var3 as $key ) {
                $pro = $producto::productoId($key[0]);
                $nueva_cantidad = $pro[0][0] - $key[1];
                $producto::editarExistencias($key[0], $nueva_cantidad);
            }
            //
            
            $bandera=true;
        }
                    
        
    
}
    if($bandera){
        header("location: factura.php");
    }else{
        header("location: nuevo_cliente.php");

    }
    





?>