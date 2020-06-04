<?php
    session_start();
    require_once("backend/cliente.php");
    $cliente = new cliente();
    verificar_session();
    $bandera = false;
    $success = false;

    

    if(isset($_GET['id'])){
        $var = $cliente::obtenerCliente($_GET['id']);
        if(isset($var[0])){
            $bandera = true;
        }
    }else{
        if(isset($_POST['cambiar'])){
            $nit = $_POST['nit'];
            $cliente::editarCliente($_POST['nombre'], $_POST['apellido'], $_POST['telefono'],$_POST['nit'], $_POST['direccion'], $_POST['id_cliente']);
            header("location: editar_cliente.php?id=$nit&mensaje=true");
         }
    }
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php
        require_once("materialize/materialize.html"); 
        require_once("header.php"); 
    
    ?>
</head>
<body>
    <?php require_once("navbar.php"); 
    if($bandera){
        ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="container">
            <div class="input-field col s10">
                <input type="hidden" id="autocomplete-input" value="<?php echo $var[0][0] ?>" class="autocomplete"
                    name="id_cliente">
            </div></br>
            <div class="input-field col s10">
                <input type="text" id="autocomplete-input" value="<?php echo $var[0][1] ?>" class="autocomplete"
                    name="nombre">
                <label for="autocomplete-input">Nombre</label>
            </div>
            <div class="input-field col s10">
                <input type="text" id="autocomplete-input" value="<?php echo $var[0][2] ?>" class="autocomplete"
                    name="apellido">
                <label for="autocomplete-input">Apellido</label>
            </div>
            <div class="input-field col s10">
                <input type="text" id="autocomplete-input" value="<?php echo $var[0][3] ?>" class="autocomplete"
                    name="telefono">
                <label for="autocomplete-input">Telefono</label>
            </div>
            <div class="input-field col s10">
                <input type="text" id="autocomplete-input" value="<?php echo $var[0][4] ?>" class="autocomplete"
                    name="nit">
                <label for="autocomplete-input">Nit</label>

            </div>
            <div class="input-field col s10">
                <input type="text" id="autocomplete-input" value="<?php echo $var[0][5] ?>" class="autocomplete"
                    name="direccion">
                <label for="autocomplete-input">Direccion</label>
            </div>
            <div class="right">
                <button class="btn waves-effect waves-light" type="submit" name="cambiar">Actualizar</button>
                <a href="cliente.php" class="btn waves-effect red darken-4" type="submit" name="cancelar">Cancelar</a>
            </div>
        </div>
    </form>
    <?php
    }
    if(isset($_GET['mensaje'])){ 
        ?>
    <script>
    M.toast({
        html: 'Datos actualizados con exito!',
        classes: 'rounded'
    })
    </script>
    <?php
    }
?>

</body>
<?php
require_once('footer.php');
?>

</html>