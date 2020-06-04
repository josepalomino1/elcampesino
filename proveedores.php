<?php
    session_start();
    require_once("backend/proveedor.php");
    $pro = new proveedor();
    verificar_session();
    $var = $pro::obtenerProveedores();
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
                    
                    <th>Telefono(s)</th>
                    <th>Nit</th>
                    <th>Direccion</th>
                    <th>- - - -</th>

                </tr>
            </thead>

            <tbody>
                <?php 
            
                $i = 1;
                foreach ($var as $key) {?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $key[1]; ?></td>
                    <td><?php echo $key[2]."<br>".$key[4]; ?></td>
                    <td><?php echo $key[3]; ?></td>
                    <td><?php echo $key[5]; ?></td>
                    <td>
                        <a href="credito_proveedor.php?id=<?php echo $key[3];?>" class="btn waves-effect waves-light"
                            name="action">Ver Credito
                            <i class="material-icons right">monetization_on</i></a>
                        <a href="pagos_proveedor.php?id=<?php echo $key[3]; ?>" class="btn waves-effect green"
                            name="action">Ver pagos
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