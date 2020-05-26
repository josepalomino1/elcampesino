<?php
    session_start();
    require_once("backend/empleado.php");
    $empleado = new empleado();
    
    $carpetaDestino="img/";
    if(isset($_POST['registrar'])){
        if(isset($_FILES["archivo"]) && $_FILES["archivo"]["name"][0])
    {
 
        # recorremos todos los arhivos que se han subido
        for($i=0;$i<count($_FILES["archivo"]["name"]);$i++)
        {
 
            # si es un formato de imagen
            if($_FILES["archivo"]["type"][$i]=="image/jpeg" || $_FILES["archivo"]["type"][$i]=="image/pjpeg" || $_FILES["archivo"]["type"][$i]=="image/gif" || $_FILES["archivo"]["type"][$i]=="image/png")
            {
 
                # si exsite la carpeta o se ha creado
                if(file_exists($carpetaDestino) || @mkdir($carpetaDestino))
                {
                    $origen=$_FILES["archivo"]["tmp_name"][$i];
                    $destino=$carpetaDestino.$_FILES["archivo"]["name"][$i];
                    echo $destino;
                    # movemos el archivo
                    if(@move_uploaded_file($origen, $destino))
                    {
                        $empleado::registrar($_POST['id_tipo_empleado'], $_POST['id_sucursal'], $_POST['nombre'], $_POST['apellido'], $_POST['correo'], $_POST['pass'], $destino);
                    }else{
                        $empleado::registrar($_POST['id_tipo_empleado'], $_POST['id_sucursal'], $_POST['nombre'], $_POST['apellido'], $_POST['correo'], $_POST['pass'], "img/user.png");
                    }
                }
            }else{
                echo "<br>".$_FILES["archivo"]["name"][$i]." - NO es imagen jpg, png o gif";
            }
        }
    }else{
        echo "<br>No se ha subido ninguna imagen";
    }
        //
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nuevo Usuario</title>

    <?php 
        require_once('header.php');
        require_once("materialize/materialize.html");
        require_once('navbar.php');
    ?>

</head>

<body>
    <div class="container"><br><br><br>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" name="inscripcion">
            <div class="row">
                <div class="input-field col s6">
                    <select name="id_tipo_empleado">
                        <option value="" disabled selected>Seleccione tipo de usuario</option>
                        <option value="1">Administrador</option>
                        <option value="2">Contador</option>
                        <option value="3">Vendedor</option>
                        <option value="4">Bodeguero</option>
                    </select>
                    <label>Tipo de usuario</label>
                </div>
                <div class="input-field col s6">
                    <select name="id_sucursal">
                        <option value="" disabled selected>Seleccione sucursal</option>
                        <option value="1">Retalhuleu</option>
                        <option value="2">Mazatenango</option>
                        <option value="3">Coatepeque</option>
                    </select>
                    <label>Sucursal</label>
                </div>
                <div class="input-field col s6">
                    <input name="nombre" type="text" class="validate">
                    <label for="nombre">Nombre</label>
                </div>
                <div class="input-field col s6">
                    <input name="apellido" type="text" class="validate">
                    <label for="apellido">Apellido</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input name="correo" type="email" class="validate">
                    <label for="correo">Correo</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <input name="pass" type="password" class="validate">
                    <label for="pass">Contraseña</label>
                </div>
            </div>
            <div class="file-field input-field">
                <div class="btn">
                    <span><i class="material-icons">add_a_photo</i></span>
                    <input type="file" name="archivo[]">
                </div>
                <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Seleccione su foto de perfil">
                </div>
            </div>

            <button class="btn waves-effect waves-light" type="submit" value="registrar"
                name="registrar">Ingresar</button>
            <button href="index.php" class="btn waves-effect red darken-4" type="submit" value="cancelar"
                name="cancelar">Cancelar</button>
        </form>
    </div>



</body>
<?php
require_once('footer.php');
?>

</html>