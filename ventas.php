<?php
    session_start();
    require_once("backend/venta.php");
    require_once("backend/productos.php");
    $carrito = array();
    $venta = new venta();
    $producto = new productos();
    verificar_session();
    $bandera = false;
    $var = null;
    if(isset($_GET['id'])){
        array_push($carrito, $_GET['id'] );

    }
    //var_dump($carrito);
    if(isset($_POST['buscar'])){
        $var = $producto::productoNombre($_SESSION['id_sucursal'], $_POST['nombre']);
        $bandera = true;
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
                    <th>----</th>

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
                    <button class="material-icons right" name="buscar">search</button>
                    <input type="text" id="autocomplete-input" class="autocomplete" name="nombre">
                    <label for="autocomplete-input">Escriba el nombre de un producto</label>

                </div>

            </div>
        </form>
    </div>



    <?php if($bandera){ ?>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Existencias</th>
                    <th>Marca</th>
                    <th>Descripcion</th>
                    <th>----</th>

                </tr>
            </thead>

            <tbody>
                <?php 
            
                $i = 1;
                foreach ($var as $key) {?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $key[1]; ?></td>
                    <td><?php echo $key[2]; ?></td>
                    <td><?php echo $key[3]; ?></td>
                    <td><?php echo $key[4]; ?></td>
                    <td><?php echo $key[5]; ?></td>
                    <td><a href="ventas.php?id=<?php echo $key[0]; ?>" class="btn-floating btn-large waves-effect waves-light green"><i
                                class="material-icons">add</i></a></td>
                </tr>
                
                
                <?php  
                $i++;
                }
               
            ?>


            </tbody>
        </table>
        <?php  } ?>
    </div>
</body>

</html>