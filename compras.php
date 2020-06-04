<?php
    session_start();
    $id_empleado = $_SESSION['id_empleado'];
    require_once("backend/productos.php");
    require_once('backend/carrito_compra.php');
    $vd = new carrito_compra();
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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Compras</title>
    <?php require_once("materialize/materialize.html"); 
    require_once('header.php');?>
    <script src="https://code.jquery.com/jquery-3.4.1.js"
        integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU=" crossorigin="anonymous"></script>
</head>

<body>
    <?php require_once("navbar.php"); ?>

   

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
                <form class="col s12" action="compras.php" method="POST">
                    <tr>
                        <td><input type="hidden" value="<?php echo $key[0]; ?>" class="validate"
                                name="id_producto"><?php echo $i; ?></td>

                        <td><input type="hidden" value="<?php echo $key[1] ?>" class="validate"
                                name="nombre_p"><?php echo $key[1]; ?></td>
                        <td><input type="hidden" value="<?php echo $key[2]; ?>" class="validate"
                                name="precio"><?php echo "Q. ".$key[2]; ?></td>
                        
                        <td><input type="hidden" value="<?php echo $key[4]; ?>" class="validate"
                                name="marca"><?php echo $key[4]; ?></td>
                        <td><input type="hidden" value="<?php echo $key[5]; ?>" class="validate"
                                name="descripcion"><?php echo $key[5]; ?></td>
                        <td>
                            <input type="number" min="1"  style="width : 50px;" class="validate" name="cantidad" value="1">
                        </td>
                        <td><button name="add_carrito" type="submit" onclick="M.toast({html: 'Agregado!', classes: 'rounded'})"
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
        <div class="fixed-action-btn">
        <a href="precompras.php" class="btn-floating btn-large blue"><i class="material-icons">shopping_cart</i></a>
        </div>
</body>
<?php
require_once('footer.php');
?>

</html>