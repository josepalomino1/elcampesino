<?php
   session_start();
   require_once('backend/carrito_compra.php');
   require_once('backend/proveedor.php');
   require_once('backend/compra.php');
   require_once('backend/compra_detalle.php');
   require('backend/credito_proveedor.php');
    $cp = new credito_proveedor();
   $cd=new compra_detalle();
   $co=new compra();
   $pd=new proveedor();
    $vd = new carrito_compra();
   verificar_session();
    $proveedor="";
    $idProveedor;
    $nit="0";
    
    $id_sucursal=$_SESSION['id_sucursal'];
    $fecha = date('Y-m-j');
    $nuevafecha = strtotime ( '-1 day' , strtotime ( $fecha ) ) ;
    $nuevafecha = date ( 'Y-m-j' , $nuevafecha );

   $i = 1;
   if(isset($_POST['quitar'])){
       $vd::eliminar_producto($_POST['id_producto'],$_SESSION['id_empleado']); 
   }

   if(isset($_POST['btnit'])){
       $nit = $_POST['nit'];
       

       $prov=$pd::obtenerProveedor($nit);

        
            $idProveedor=$key[0][3];
            $proveedor=$key[0][1];
        
   }

   $var = $vd::ver_carrito($_SESSION['id_empleado']);
   if(isset($_POST['bconf'])){
        $nit = $_POST['nit'];
        $tipo_compra = $_POST['id_tipo_venta'];
        $idProveedor = $_POST['idProveedor'];
        //function registrar($id_sucursal, $id_proveedores, $id_tipo_compra_venta, $fecha){
            

            $co::registrar($id_sucursal,$idProveedor,$tipo_compra,$nuevafecha);
            $id_compra = $co::ultimaCompra();

           
            $id_compra = $co::ultimaCompra();
            $id_c=$id_compra[0][0];

            
            if($tipo_compra==1){
                $var4 = $vd::totalcarritocompra($_SESSION['id_empleado']);
                $total = $var4[0][0];
                $cp::registrar($id_c,$total);
            }
        foreach($var as $key){
            $id_producto=$key[1];
            $cant=$key[6];

      
            
            //function registrar($id_compra, $id_producto, $cantidad){
            $cd::registrar($id_c,$id_producto,$cant);

            
        }
        $vd::vaciar_carrito($_SESSION['id_empleado']);

   }
   $var = $vd::ver_carrito($_SESSION['id_empleado']);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
require_once('header.php');
require_once('materialize/materialize.html');
require_once('navbar.php');


    ?>
    <title>Document</title>
</head>

<body>

    <div id="factura" class="row container center-align">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="input-field col s3">
                <button class="waves-effect waves-teal btn-flat prefix" name="btnit"><i
                        class="material-icons">search</i></button>
                <input type="text" id="nit" class="autocomplete" name="nit" value="<?php echo $nit; ?>">
                <label for="nit">NIT</label>
            </div>
            <div class="input-field col s2">
                <select name="id_tipo_venta">
                    <option value="2">Contado</option>
                    <option value="1">Crédito</option>
                </select>
                <label>Tipo de venta</label>

            </div>
            <h4><?php echo $proveedor; ?></h4>
            </br>

            <?php
                if($proveedor!=""){
            ?>
            <input type="hidden" name="idProveedor" value="<?php echo $idProveedor; ?>">
            <button class="btn waves-effect waves-light" value="vender" name="bconf">Confirmar Compra</button>
            <?php
                }
            ?>

        </form>

    </div>
    <div id="recargar" class="row container">

        <div class="container">

            <table class="centered highlight">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Marca</th>
                        <th>Descripcion</th>
                        <th>Cantidad</th>
                        <th></th>
                    </tr>
                </thead>


                <tbody>
                    <?php
 
 foreach($var as $key){?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                        <tr>
                            <td><?php echo $i; ?></td>
                            <input type="hidden" name="id_producto" value="<?php echo $key[1]; ?>">
                            <td><?php echo $key[2]; ?></td>
                            <td><?php echo "Q. ". $key[3]; ?></td>
                            <td><?php echo $key[4]; ?></td>
                            <td><?php echo $key[5]; ?></td>
                            <td><?php echo $key[6]; ?></td>
                            <td><button name="quitar" type="submit" class="btn-floating waves-effect waves-light red"><i
                                        class="material-icons">remove</i></button></td>
                        </tr>
                    </form>
                    <?php
        $i++;
    }

    ?>

                </tbody>

            </table>

        </div>
        <div class="fixed-action-btn">
            <a href="compras.php" class="btn-floating btn-large blue"><i
                    class="material-icons">add_shopping_cart</i></a>
        </div>
</body>

</html>