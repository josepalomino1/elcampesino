<?php 
    session_start();
    require_once("backend/sucursal.php");
    $sucursal = new sucursal();
    if(isset($_GET['id'])){
        $su = $sucursal::ObtenerSucursal($_GET['id']);
    }

    if(isset($_POST['cambiar'])){
        $sucursal::editar($_POST['id'],$_POST['nombre'],$_POST['direccion'],$_POST['numero'],$_POST['nit']);
        $su = $sucursal::ObtenerSucursal($_POST['id']);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar Sucursal</title>
    <?php 
    require_once("header.php"); 
    require_once("materialize/materialize.html"); 
    ?>
</head>

<body>
    <?php require_once("navbar.php"); ?>
    <div class="container row center">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div>
                <input type="hidden" name="id" id="id" value="<?php echo $su[0][0]; ?>">
            </div>
            <div class="input-field col s12 m6">
                <input type="text" name="nombre" id="nombre" value="<?php echo $su[0][1]; ?>">
                <label for="nombre">Nombre</label>
            </div>
            <div class="input-field col s12 m6">
                <input type="text" name="direccion" id="direccion" value="<?php echo $su[0][2]; ?>">
                <label for="direccion">Dirección</label>
            </div>
            <div class="input-field col s12 m6">
                <input type="text" name="numero" id="numero" value="<?php echo $su[0][3]; ?>">
                <label for="numero">Teléfono</label>
            </div>
            <div class="input-field col s12 m6">
                <input type="text" name="nit" id="nit" value="<?php echo $su[0][4]; ?>">
                <label for="nit">NIT</label>
            </div>
            <div class="right">
                <button class="btn waves-effect waves-light" type="submit" name="cambiar">Actualizar</button>
                <a href="sucursales.php" class="btn waves-effect red darken-4" type="submit"
                    name="cancelar">Cancelar</a>
            </div>
        </form>
    </div>
</body>
<?php require_once("footer.php"); ?>

</html>