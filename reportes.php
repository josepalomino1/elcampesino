<?php
session_start();
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
    <title>Reportes</title>
</head>

<body>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <div class="container row">
            <div class=" input-field col s3">
                <input type="text" class="datepicker" name="f_inicial" id="f_inicial">
                <label for="f_inicial">Fecha inicial</label>
            </div>
            <div class=" input-field col s3">
                <input type="text" class="datepicker" name="f_final" id="f_final">
                <label for="f_final">Fecha final</label>
            </div>
               </br>             <button class="waves-effect waves-light btn" type="submit"><i
                    class="material-icons right">library_books</i>GENERAR REPORTE</button>
        </div>
    </form>
</body>

</html>