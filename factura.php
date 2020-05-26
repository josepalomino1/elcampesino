<!DOCTYPE HTML>
<html>

<head>
    <?php 
        require_once('header.php');
        require_once("materialize/materialize.html");
        require_once('navbar.php');
    ?>
    <meta charset="ISO-8859-1">
    <title>FACTURAS</title>
</head>

<body>
    <div clas="container">
        <form method="post" action="facturas/facturas.php">
        <div class="container row center">
                <h5>DATOS DE LA TIENDA</h5>
                <div class="input-field col s12 m6 l3">
                    <input name="id_factura" type="text" value="1">
                    <label for="id_factura">ID de factura</label>
                </div>
                <div class="input-field col s12 m6 l3">
                    <input type="text" name="fecha_factura" value="<?php echo date("d-m-Y"); ?>" size="15">
                    <label for="fecha_factiura">Fecha emisión de factura</label>
                </div>
                <div class="input-field col s12 m6 l3">
                    <input type="text" name="nombre_tienda" value="Ferretería El Campesino">
                    <label for="nombre_tienda">Nombre</label>
                </div>
                <div class="input-field col s12 m6 l3">
                    <input type="text" name="direccion_tienda" value="Mazatenango, Suchitepéquez">
                    <label for="direccon_tienda">Dirección</label>
                </div>
                <div class="input-field col s12 m6 l3">
                    <input type="text" name="sucursal" value="Mazatengano, Suchitepéquez">
                    <label for="sucursal">Sucursal</label>
                </div>
                <div class="input-field col s12 m6 l3">
                    <input type="text" name="telefono_tienda" value="56214789">
                    <label for="telefono_tienda">Teléfono</label>
                </div>
                <div class="input-field col s12 m6 l3">
                    <input type="text" name="nit_tienda" value="90658043">
                    <label for="nit_tienda">NIT</label>
                </div>
            </div>
            <div class="container row center">
                <h5>DATOS DEL CLIENTE</h5>
                <div class="input-field col s12 m6 l3">
                    <input type="text" name="nombre_cliente" value="Fernando">
                    <label for="nombre_cliente">Nombre</label>
                </div>
                <div class="input-field col s12 m6 l3">
                    <input type="text" name="apellidos_cliente" value="García García">
                    <label for="apellidos_cliente">Apellidos</label>
                </div>
                <div class="input-field col s12 m6 l3">
                    <input type="text" name="telefono_cliente" value="50483992">
                    <label for="telefono_cliente">Teléfono</label>
                </div>
                <div class="input-field col s12 m6 l3">
                    <input type="text" name="nit_cliente" value="44332211N">
                    <label for="nit_cliente">NIT</label>
                </div>
                <div class="input-field col s12 m6 l3">
                    <input type="text" name="direccion_cliente" value="Mazatenango, Suchitepéquez">
                    <label for="direccion_cliente">Dirección</label>
                </div>
            </div>
            <div class="container row center">
                <h5>PRODUCTOS</h5>
               <table class="responsive-table highlight centered">
                    <thead>
                        <tr>
                            <th>Unidades</th>
                            <th>Productos</th>
                            <th>Precio unidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
//Demo de Array de productos simulando extracci�n de datos de una base de datos.
$array_productos = array
(
   "unidades" => array(1, 4, 3), 
   "productos" => array("Zapatos", "Camisetas", "Pantalones"),
   "precio_unidad" => array(20.30, 15, 50)
);
$x = 0;
while($x <= count($array_productos["unidades"]) - 1)
{
   echo 
   "
   <tr>
   <td>".$array_productos["unidades"][$x]."</td>
   <td>".$array_productos["productos"][$x]."</td>
   <td>".$array_productos["precio_unidad"][$x]." </td>
   </tr>
   ";
   $x++;
}
// A continuaci�n se guardan en variables los datos de los productos, separados por comas
// que luego ser�n extra�dos a trav�s de la funci�n explode a la hora de generar la factura
$unidades = implode(",", $array_productos["unidades"]);
$productos = implode(",", $array_productos["productos"]);
$precio_unidad = implode(",", $array_productos["precio_unidad"]);
// A continuaci�n se guardar�n los datos de los productos a trav�s de campos ocultos
?>
                    </tbody>
                </table>
                <div class="input-field col s12 m6 l3">
                    <input type="text" name="gastos_de_envio" value="">
                    <label for="gastos_de_envio">Gastos de envío</label>
                </div>
            </div>
            <input type="hidden" name="unidades" value="<?php echo $unidades; ?>">
            <input type="hidden" name="productos" value="<?php echo $productos; ?>">
            <input type="hidden" name="precio_unidad" value="<?php echo $precio_unidad; ?>">
            <!-- Campo que hace la llamada al script que genera la factura -->
            <input type="hidden" name="generar_factura" value="true">
            <button class="waves-effect waves-light btn" type="submit"><i
                    class="material-icons right">library_books</i>GENERAR
                FACTURA PDF</button>
    </div>
    </form>
    </div>
</body>
<?php
require_once('footer.php');
?>

</html>