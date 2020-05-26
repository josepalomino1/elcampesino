<?php
    session_start();
    require_once('backend/venta_detalle.php');
    $vd = new venta_detalle();
    verificar_session();
    $var = $vd::ver_carrito($_SESSION['id_empleado']);
?>
<div class="container">
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
<table class="centered highlight">
    <thead>
        <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Marca</th>
            <th>Descripcion</th>
            <th>Cantidad</th>
            <th>----</th>
        </tr>
    </thead>

    <tbody>

        <?php
    $i = 1;
    foreach($var as $key):?>
        <tr>
            <td><?php echo $i; ?></td>
            <td><?php echo $key[2]; ?></td>
            <td><?php echo $key[3]; ?></td>
            <td><?php echo $key[4]; ?></td>
            <td><?php echo $key[5]; ?></td>
            <td><?php echo $key[6]; ?></td>
            <td><button name="add_carrito" type="submit"
                    class="btn-floating waves-effect waves-light red"><i
                        class="material-icons">remove</i></button></td>
        </tr>
        <?php
        $i++;
endforeach;?>

    </tbody>
    
</table>
