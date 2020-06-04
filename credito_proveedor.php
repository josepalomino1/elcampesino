<?php
    session_start();
    require_once("backend/credito_proveedor.php");
    $c_proveedor = new credito_proveedor();
    verificar_session();
    $var = "";
    $mensaje = null;
    $bandera = false;
    
    if(isset($_GET['id'])){
        
        $var = $c_proveedor::obtenerCreditosProveedor($_GET['id']);
        if(isset($var[0][0])){
            $bandera = true;
        }else{
            $mensaje = "No se encontro ningun proveedor con el nit: ".$_GET['id'];
        }

    }else{
        $mensaje = "No se encontro ningun proveedor";
       
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
    <?php if($bandera): ?>
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
                        <a href="ingresar_pago_proveedor.php?id=<?php echo $_GET['id'];?>" class="btn waves-effect waves-light"
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
            <?php endif; ?>
        <?php if($mensaje):  ?>
           <h1><?php echo $mensaje; ?> </h1>
        <?php endif; ?>
    </div>





</body>

</html>