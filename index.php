<?php
    session_start();
    require_once("backend/funciones.php");
    require_once("header.php");
    verificar_session();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">


  <title>Inicio</title>
    <?php require_once('materialize/materialize.html'); ?>
</head>
<body>
<?php require_once('navbar.php'); ?>


</body>
<?php require_once('footer.php'); ?>
</html>
