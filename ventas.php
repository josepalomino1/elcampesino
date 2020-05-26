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
    if(isset($_POST['buscar'])){
        $var = $producto::productoNombre($_SESSION['id_sucursal'], $_POST['nombre']);
        $bandera = true;
    }

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

    if(isset($_POST['add_factura'])){
        echo "hola";
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ventas</title>
    <?php require_once("materialize/materialize.html"); ?>
    <script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
</head>

<body>
    <?php require_once("navbar.php"); ?>
    <div class="container">
        <?php 
        if(!empty($carrito)){ ?>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th></th>

                </tr>
            </thead>

            <tbody>
                <?php 
            
                $i = 1;
                foreach ($carrito as $key) {?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $key[1]; ?></td>
                    <td><?php echo $key[2]; ?></td>
                    <td><?php echo $key[3]; ?></td>
                    <td><?php echo $key[4]; ?></td>
                    <td><a class="btn-floating btn-large waves-effect waves-light red"><i
                                class="material-icons">delete</i></a></td>
                </tr>


                <?php  
                $i++;
                }
           
            ?>


            </tbody>
            <?php 
        }
    ?>

    </div>



    <div class="row container ">
        <form class="col s12" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="row">
                <div class="input-field col s10">
                    <button class="waves-effect waves-teal btn-flat prefix" name="buscar"><i
                            class="material-icons">search</i></button>
                    <input type="text" id="autocomplete-input" class="autocomplete" name="nombre">
                    <label for="autocomplete-input">Escriba el nombre de un producto</label>

                </div>

            </div>

    </div>
    <div id="recargar" class="row container">

    
    <div class="row container" align="center">
        <button name="add_factura" type="submit" class="btn waves-effect waves-light">Agregar a factura</button></div>
    </form>
    </div>

    <?php if($bandera){ ?>
    <div class="container">
        <table class="centered highlight">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Existencias</th>
                    <th>Marca</th>
                    <th>Descripcion</th>
                    <th>Cantidad</th>
                    <th></th>

                </tr>
            </thead>

            <tbody>
                <?php 
            
            $i = 0;
            foreach ($var as $key) {?>
                <form class="col s12" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                    <tr>
                        <td><input type="hidden" value="<?php echo $key[0]; ?>" class="autocomplete"
                                name="id_producto"><?php echo $i; ?></td>

                        <td><input type="hidden" value="<?php echo $key[1] ?>" class="autocomplete"
                                name="nombre_p"><?php echo $key[1]; ?></td>
                        <td><input type="hidden" value="<?php echo $key[2]; ?>" class="autocomplete"
                                name="precio"><?php echo $key[2]; ?></td>
                        <td><?php echo $key[3]; ?></td>
                        <td><input type="hidden" value="<?php echo $key[4]; ?>" class="autocomplete"
                                name="marca"><?php echo $key[4]; ?></td>
                        <td><input type="hidden" value="<?php echo $key[5]; ?>" class="autocomplete"
                                name="descripcion"><?php echo $key[5]; ?></td>
                        <td>
                            <input type="number" style="width : 50px;" class="autocomplete" name="cantidad">
                        </td>
                        <td><button name="add_carrito" type="submit"
                                class="btn-floating waves-effect waves-light green"><i
                                    class="material-icons">add</i></button></td>
                    </tr>



                </form>
                <?php  
                $i++;
                }
               
            ?>
            </tbody>
        </table>
        <?php  } ?>
    </div>
    </div>
</body>

</html>
<script type="text/javascript">
$(document).ready(function() {
    setInterval(
        function() {
            $('#recargar').load('carrito.php');
        }, 50
    );
});
</script>