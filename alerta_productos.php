<?php 
session_start();
require_once("backend/productos.php");
$producto = new productos();
$productos = $producto::productosSucursal($_SESSION['id_sucursal']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Productos por terminarse</h1>
<table class="centered highlight">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                
                    <th>Existencias</th>
                    <th>Marca</th>
                    <th>Descripcion</th>
                    
                    <th></th>

                </tr>
            </thead>

            <tbody background="red">
                <?php 
            
            $i = 0;
            foreach ($productos as $key) :
            if($key[3] <= 10):?>
                <form class="col s12" action="guardar_venta.php" method="POST">
                    <tr>
                        <td><input type="hidden" value="<?php echo $key[0]; ?>" class="validate"
                                name="id_producto"><?php echo $i; ?></td>

                        <td><input type="hidden" value="<?php echo $key[1] ?>" class="validate"
                                name="nombre_p"><?php echo $key[1]; ?></td>
                        <td><?php  echo $key[3]; ?></td>
                        <td><input type="hidden" value="<?php echo $key[4]; ?>" class="validate"
                                name="marca"><?php echo $key[4]; ?></td>
                        <td><input type="hidden" value="<?php echo $key[5]; ?>" class="validate"
                                name="descripcion"><?php echo $key[5]; ?></td>
                        <td><button name="add_carrito" type="submit"
                                class="btn-floating waves-effect waves-light green"><i
                                    class="material-icons">add</i></button></td>
                    </tr>



                </form>
                <?php  
                $i++;
            endif;
            endforeach;
               
            ?>
            </tbody>
        </table>
    
</body>
</html>