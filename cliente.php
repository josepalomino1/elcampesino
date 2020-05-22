<?php
    session_start();
    require_once("backend/cliente.php");
    $cliente = new cliente();
    verificar_session();
    $bandera = false;
    if(isset($_POST['buscar'])){
        $var = $cliente::obtenerCliente($_POST['nit']);
        if(isset($var[0])){
            $bandera = true;
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Clientes</title>
    <?php require_once("materialize/materialize.html"); ?>
</head>

<body>
<?php require_once("navbar.php"); ?>

    <div class="row container ">
        <form class="col s12" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="row">
                <div class="input-field col s10">
                    <button class="material-icons right" name="buscar">search</button>
                    <input type="text" id="autocomplete-input" class="autocomplete" name="nit">
                    <label for="autocomplete-input">Escriba el nit de un cliente</label>

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
                    <th>Apellido</th>
                    <th>Telefono</th>
                    <th>Nit</th>
                    <th>Direccion</th>
                    <th>----</th>

                </tr>
            </thead>


            <tbody>
                <?php 
            
                $i = 1;
                foreach ($var as $key) { ?>
                <tr>
                <td><?php echo $key[0]?></td>
                <td><?php echo $key[1]?></td>
                <td><?php  echo $key[2]?></td>
                <td><?php  echo $key[3]?></td>
                <td><?php  echo $key[4]?></td>
                <td><?php  echo $key[5]?></td>
                <td><a href="editar_cliente.php?id=<?php echo $key[4]; ?>" class="btn-floating btn-large
                waves-effect waves-light green"><i class="material-icons">create</i></a></td>

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