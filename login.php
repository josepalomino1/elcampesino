<?php 
session_start();
require('backend/empleado.php');
$emp = new empleado();
$alerta = false;
if(isset($_SESSION['id_empleado'])){
    header('location: index.php');
}
if(isset($_POST['ingresar'])){
    $pass = $_POST['pass'];
    $correo = $_POST['correo'];

    $var = $emp::obtenerEmpleadosSesion($correo, $pass);

    if(isset($var[0])){
        foreach ($var as $key) {
            $_SESSION['id_empleado'] = $key[0];
            $_SESSION['id_tipo_empleado'] = $key[1];
            $_SESSION['id_sucursal'] = $key[2];
            $_SESSION['nombre'] = $key[3];
            $_SESSION['apellido'] = $key[4];
            $_SESSION['correo'] = $key[5];
            $_SESSION['imagen'] = $key[7];
           
            header("location: index.php");
        }
    }else{
        $alerta = true;
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>login</title>
    <?php 
        require_once("materialize/materialize.html");
        require_once('header.php');
    ?>
</head>

<body>
    <div class="container">
        <h4 class="center-align">Inicia Sesión</h4></br></br>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="row">
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="icon_prefix" type="email" name="correo" class="validate" required>
                    <label for="icon_prefix">E-mail</label>
                </div>
                <div class="input-field col s12 m6">
                    <i class="material-icons prefix">lock</i>
                    <input id="icon_lock" type="password" name="pass" class="validate" required>
                    <label for="icon_prefix">Contraseña</label>
                </div>
            </div>
            <button class="btn waves-effect waves-light right" type="submit" value="ingresar"
                name="ingresar">Ingresar</button>
        </form>
        <?php if($alerta){ ?>
        <label for="alert"></label>
        <?php } ?>
    </div>
</body>
<?php require_once('footer.php');?>

</html>