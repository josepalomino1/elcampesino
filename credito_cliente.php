<?php
    session_start();
    require_once("backend/credito_cliente.php");
    $c_cliente = new credito_cliente();
    verificar_session();
    if(isset($_GET['id'])){
        $var = $c_cliente::obtenerCreditosCliente($_GET['id']);
        $nit = $_GET['id'];
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
                    <th>Por Cobrar</th>
                    <th>---</th>
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
                    <td>
                        <a href="ingresar_pago.php?id=<?php echo $key[2];?>" class="btn waves-effect waves-light"
                            name="action">Ingresar pago
                            <i class="material-icons right">monetization_on</i></a>
                           
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