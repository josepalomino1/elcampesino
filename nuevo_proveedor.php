<?php 
        session_start();
        require_once('backend/proveedor.php');
        $mensaje = false;
        $proveedor = new proveedor();
        if(isset($_POST['registrar'])){
            $nit=$_POST['nit'];
            $proveedor::registrar($_POST['nombre'],$_POST['numero'],$_POST['nit'],$_POST['numero2'],$_POST['direccion']);
            header("location: proveedor.php?nit=$nit");
            $mensaje=true;
        }
        
        ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nuevo Proveedor</title>
    <?php require_once("materialize/materialize.html"); 
        require_once('header.php');
        require_once('navbar.php');?>
</head>

<body>
    <div class="container"><br><br><br>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="row">
                <div class="input-field col s12 m6">
                    <input id="nombre" name="nombre" type="text" class="validate">
                    <label for="nombre">Nombre</label>
                </div>
                <div class="input-field col s12 m6">
                    <input id="numero" name="numero" type="tel" class="validate">
                    <label for="numero">Teléfono</label>
                </div>
                <div class="input-field col s12 m6">
                    <input id="numero2" name="numero2" type="tel" class="validate">
                    <label for="numero2">Teléfono 2</label>
                </div>
                <div class="input-field col s12 m6">
                    <input id="nit" type="text" name="nit" class="validate">
                    <label for="nit">NIT</label>
                </div>
                <div class="input-field col s12">
                    <input id="dirección" type="text" name="direccion" class="validate">
                    <label for="dirección">Dirección</label>
                </div>
            </div>
                <div class="right">
                    <button class="btn waves-effect waves-light" type="submit" value="registrar"
                        name="registrar">Ingresar</button>
                    <button href="index.php" class="btn waves-effect red darken-4" type="submit" value="registrar"
                        name="registrar">Cancelar</button>
                </div>
        </form>

    </div>
    <?php
    if(isset($_GET['mensaje'])){ 
        ?>
    <script>
    M.toast({
        html: 'Proveedor ingresado con éxito!',
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