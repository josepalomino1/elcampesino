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

            header('location: index.php');
 
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
    <title>loggin</title>
    <?php 
        require_once("materialize/materialize.html");
    ?>
</head>

<body>
    <div class="container"><br><br><br>
        <h4 class="center-align">Inicia Sesión</h4></br></br>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <div class="row">
                <div class="input-field col s6">
                    <i class="material-icons prefix">account_circle</i>
                    <input id="icon_prefix" type="email" name="correo" class="validate">
                    <label for="icon_prefix">Correo</label>

                </div>
                <div class="input-field col s6">
                    <i class="material-icons prefix">lock</i>
                    <input id="icon_lock" type="password" name="pass" class="validate">
                    <label for="icon_lock">Contraseña</label>
                </div>
            </div>
                <button class="btn waves-effect waves-light" type="submit" value="ingresar"
                    name="ingresar">Ingresar</button>
        </form>
        <?php if($alerta){ ?>
        <label for="alert"></label>
        <?php } ?>
    </div>



</body>

</html>