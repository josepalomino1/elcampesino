<?php
   session_start();
   require_once('backend/venta_detalle.php');
   $vd = new venta_detalle();
   verificar_session();
   $i = 1;
   if(isset($_POST['quitar'])){
       $vd::eliminar_Fcarrito($_POST['id_producto'],$_SESSION['id_empleado']); 
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
        <form action="factura_log.php" method="post">
            <div class="input-field col s3">
                <button class="waves-effect waves-teal btn-flat prefix" name="bnit"><i
                        class="material-icons">search</i></button>
                <input type="text" id="nit" class="autocomplete" name="nit" value="0">
                <label for="nit">NIT</label>
            </div>
            <div class="input-field col s2">
                    <select name="id_tipo_venta">
                        <option value="2">Contado</option>
                        <option value="1">Crédito</option>
                    </select>
                    <label>Tipo de venta</label>
            </div></br>
            <button href="factura.php" class="btn waves-effect waves-light" type="submit" value="vender"
                name="bnit" >Vender</button>
            <a href="cotizacion.php" class="btn waves-effect green darken-4" type="submit" value="cotizar"
                name="cotizar">Cotización</a>
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
                            <td><?php echo "Q. ". round( $key[3],2); ?></td>
                            <td><?php echo $key[4]; ?></td>
                            <td><?php echo $key[5]; ?></td>
                            <td><?php echo $key[6]; ?></td>
                            <td><button name="quitar" type="submit" class="btn-floating waves-effect waves-light red"><i
                                        class="material-icons">remove</i></button></td>
                                    
                        </tr>
                    </form>
                    <?php
        $i++;
    }?>

                </tbody>

            </table>

        </div>
        <div class="fixed-action-btn">
        <a href="ventas.php" class="btn-floating btn-large blue"><i class="material-icons">add_shopping_cart</i></a>
        </div>
</body>

</html>