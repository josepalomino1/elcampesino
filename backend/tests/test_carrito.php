<?php 
    session_start();

    if(isset($_POST['agregar'])){
        if (empty($_SESSION["listadecompra"])) {
            $i = 0;
            $_SESSION["listadecompra"][$i] = $_POST['nombre'];
        } else {
            $i = count($_SESSION["listadecompra"]);
            $i++;
            $_SESSION["listadecompra"][$i] = $_POST['nombre'];
        }
        
    }

    if(isset($_GET['borrar'])){
        unset($_SESSION["listadecompra"][$_GET['borrar']]);
        $_SESSION["listadecompra"] = array_values($_SESSION["listadecompra"]);
    }

    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <input type="text" name="nombre">
        <button type="submit" name="agregar">Enviar producto</button>
        
    </form>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>nombre</th>
                <th>- - - -</th>
            </tr>
        </thead>
        <tbody>
        <?php  
            $i = 0;
            if(isset($_SESSION["listadecompra"])):
                foreach ($_SESSION["listadecompra"] as $key ):?>
                <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $key ?></td>
                <td> <a href="test_carrito.php?borrar=<?php echo $i; ?>">borrar</a></td>
            <?php $i++;
                endforeach;
            endif;
        ?>
            
                
            </tr>
        </tbody>
    </table>

            <?php 
                var_dump($_SESSION["listadecompra"]);
            ?>
</body>

</html>