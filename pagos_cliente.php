<?php
    session_start();
    require_once("backend/pagos_cliente.php");
    $pagos_cliente = new pagos_cliente();
    verificar_session();
    $var = null;
    if(isset($_GET['id'])){
        $var = $pagos_cliente::pagosCliente($_GET['id']);
    }else{
        header('location: index.php');
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <?php require_once("materialize/materialize.html"); ?>

</head>

<body>
    <?php require_once("navbar.php"); ?>
    <div class="container">
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Pago</th>
                <th>Id_venta</th>
                <th>Fecha</th>
               

            </tr>
        </thead>

        <tbody>
            <?php 
            
                $i = 1;
                foreach ($var as $key) {?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $key[0]; ?></td>
                <td><?php echo $key[1]; ?></td>
                <td><?php echo $key[2]; ?></td>
                <td><?php echo $key[3]; ?></td>
                <td><?php echo $key[4]; ?></td>
                <td>
                    
                    

                </td>

            </tr>


            <?php  
                $i++;
                }
           
            ?>


        </tbody>
    </table>
    </div>
</body>

</html>