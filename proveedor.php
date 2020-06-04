<?php
    session_start();
    require_once("backend/proveedor.php");
    $proveedor = new proveedor();
    verificar_session();
    $bandera = false;
    if(isset($_GET['nit'])){
        $var = $proveedor::obtenerProveedor($_GET['nit']);
        if(isset($var[0])){
            $bandera = true;
        }
    }
    if(isset($_POST['buscar'])){
        $var = $proveedor::obtenerProveedor($_POST['nit']);
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
    <?php 
    require_once("header.php"); 
    require_once("materialize/materialize.html"); 
    ?>
</head>

<body>
    <?php require_once("navbar.php"); ?>

    <div class="row container ">
        <form class="col s12" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="row">
                <div class="input-field col s10">
                    <button class="waves-effect waves-teal btn-flat prefix" name="buscar"><i
                            class="material-icons">search</i></button>
                    <input type="text" id="autocomplete-input" class="autocomplete" name="nit">
                    <label for="autocomplete-input">Escriba el nit de un proveedor</label>
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
                    <th>Telefono</th>
                    <th>Telefono 2</th>
                    <th>Nit</th>
                    <th>Direccion</th>
                    <th>---</th>
                    <th></th>

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
                    <td>
                        <a href="editar_proveedor.php?id=<?php echo $key[3]; ?>"
                            class="btn-floating waves-effect light-blue darken-3" name="action"><i
                                class="material-icons">edit</i></a>
                    </td>
                </tr>


                <?php  
                $i++;
                }
               
            ?>
                <?php
    if(isset($_GET['nit'])){ 
        ?>
       <script>
       M.toast({html: 'Cliente agregado', classes: 'rounded'})
       </script> 
    <?php
    }
?>


            </tbody>
        </table>
        <?php  } ?>
    </div>
</body>

</html>