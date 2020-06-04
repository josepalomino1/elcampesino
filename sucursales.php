<?php 
    session_start();
    require_once("backend/sucursal.php");
    verificar_session();
    $sucursal = new sucursal();
    $sucursales = $sucursal::ObtenerSucursales();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        require_once('header.php');
        require_once('materialize/materialize.html');
        require_once('navbar.php');
    ?>
    <title>Document</title>
</head>
<body>
    <div class="container">
        <table class="centered highlight">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Sucursal</th>
                    <th>Direccion</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php 
            $i = 0;
            foreach ($sucursales as $key) :?>
                <tr>
                    <td><?php echo $i; ?></td>

                    <td><?php echo $key[1]; ?></td>

                    <td><?php echo $key[2]; ?></td>


                    <td><a href="editar_sucursal.php?id=<?php echo $key[0];?> "  name="editar" class="btn-floating waves-effect waves-light blue">
                    <i class="material-icons">edit</i>
                    </a></td>
                </tr>
                <?php  
                $i++;
            endforeach;
               
            ?>
            </tbody>
        </table>
    </div>

</body>
<?php
require_once('footer.php');
?>

</html>