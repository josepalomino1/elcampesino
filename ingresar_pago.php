<?php
    session_start();
    require('backend/credito_cliente.php');
    require('backend/pagos_cliente.php');
    $cc = new credito_cliente();
    $pc = new pagos_cliente();
    verificar_session();
    $bandera = false;
    $success = false;
    $mensaje = false;
    

    if(isset($_GET['id'])){
        $var = $cc::obtenerCreditoById($_GET['id']);
        if(isset($var[0])){
            $bandera = true;
        }
        if(isset($_GET['mensaje'])){
            $mensaje = true;
        }
        
    }else{
        if(isset($_POST['cambiar'])){
            $id_credito = $_POST['id_credito'];
            $por_pagar = $_POST['por_cobrar'];
            $monto = $_POST['monto'];
            $nuevo = $por_pagar-$monto;
            $fecha = date("Y.m.d");
            $cc::editar($id_credito,$nuevo);
            $pc::registrar($id_credito, $fecha, $monto);
            $success = true;
            header("location: ingresar_pago.php?id=$id_credito&mensaje=true");
         }
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
    <?php require_once("navbar.php"); 
    if($bandera){
        ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="row container">
            <div class="input-field col s10">
                <input type="hidden" id="autocomplete-input" value="<?php echo $var[0][2] ?>" class="autocomplete"
                    name="id_credito">
            </div>

            <div class="input-field col s10">
                <input type="hidden" id="autocomplete-input" value="<?php echo $var[0][1] ?>" class="autocomplete"
                    name="por_cobrar">
                <input type="text" id="deuda" disabled value="<?php echo $var[0][1] ?>" class="autocomplete"
                    name="por_cobrar">
                <label for="deuda">Deuda</label>
            </div>
            <div class="input-field col s10">
                <input type="number" id="autocomplete-input" class="autocomplete" name="monto">
                <label for="autocomplete-input">Monto a pagar</label>
            </div>

            <div class="input-field col s10">
                <button class="waves-effect waves-light btn right" type="submit" name="cambiar">Pagar</button>
            </div>
        </div>
    </form>

    <?php
    }
    if(isset($_GET['mensaje'])){ 
        ?>
       <script>
       M.toast({html: 'Datos actualizados con exito!', classes: 'rounded'})
       </script> 
    <?php
    }
?>

</body>

</html>