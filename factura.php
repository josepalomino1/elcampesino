<?php 
    session_start();
    require_once('backend/venta_detalle.php');
    require_once('backend/venta.php');
    require_once("backend/cliente.php");
    require_once("backend/sucursal.php");
    $cliente = new cliente();
    $vd = new venta_detalle();
    $sucursal = new sucursal();
    
    $sucursales = $sucursal::ObtenerSucursal($_SESSION['id_sucursal']);

    /* require_once('backend/productos.php');
    $producto = new producto();
    $venta = new venta();
    */
    $fac=false;
    if(!empty($_SESSION['nombreC']) || $_SESSION['nombreC']=="" ){
        $nombre = $_SESSION['nombreC'];
        $apellido = $_SESSION['apellidoC'];
        $numero = $_SESSION['numeroC'];
        $nit = $_SESSION['nit'];
        $direccion = $_SESSION['direccionC'];
        $fac=true;
    }
    
    $fecha = date('Y-m-j');
    $nuevafecha = strtotime ( '-1 day' , strtotime ( $fecha ) ) ;
    $nuevafecha = date ( 'j-m-Y' , $nuevafecha );

        $var = $vd::vercarrito($_SESSION['id_empleado']);
    

?>
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
                    <input type="text" class="datepicker" name="fecha_factura" value="<?php echo $nuevafecha; ?>" size="15">
                    <label for="fecha_factiura">Fecha emisión de factura</label>
                </div>
                <div class="input-field col s12 m6 l3">
                    <input type="text" name="nombre_tienda" value="<?php echo $sucursales[0][1]; ?>">
                    <label for="nombre_tienda">Nombre</label>
                </div>
                <div class="input-field col s12 m6 l3">
                    <input type="text" name="nit_tienda" value="<?php echo $sucursales[0][4]; ?>">
                    <label for="nit_tienda">NIT</label>
                </div>
                <div class="input-field col s12 m6 l3">
                    <input type="text" name="telefono_tienda" value="<?php echo $sucursales[0][3]; ?>">
                    <label for="telefono_tienda">Teléfono</label>
                </div>
                <div class="input-field col s12 m6">
                    <input type="text" name="direccion_tienda" value="<?php echo $sucursales[0][2]; ?>">
                    <label for="direccon_tienda">Dirección</label>
                </div>
            </div>
            <div class="container row center">
                <h5>DATOS DEL CLIENTE</h5>
                <div class="input-field col s12 m6 l3">
                    <input type="text" name="nombre_cliente" value="<?php if($fac){echo $nombre;}?>">
                    <label for="nombre_cliente">Nombre</label>
                </div>
                <div class="input-field col s12 m6 l3">
                    <input type="text" name="apellidos_cliente" value="<?php if($fac){echo $apellido;} ?>">
                    <label for="apellidos_cliente">Apellidos</label>
                </div>
                <div class="input-field col s12 m6 l3">
                    <input type="text" name="telefono_cliente" value="<?php if($fac){echo $numero;} ?>">
                    <label for="telefono_cliente">Teléfono</label>
                </div>
                <div class="input-field col s12 m6 l3">
                    <input type="text" name="nit_cliente" value="<?php if($fac){echo $nit;} ?>">
                    <label for="nit_cliente">NIT</label>
                </div>
                <div class="input-field col s12 m6 l3">
                    <input type="text" name="direccion_cliente" value="<?php if($fac){echo $direccion;} ?>">
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
$unidad = array();
$producto = array();
$precio_uni = array();

foreach ($var as $key ) {
    array_push($producto, $key[0]);
    array_push($precio_uni, $key[1]);
    array_push($unidad, $key[2]);
}

$vd::vaciar_carrito($_SESSION['id_empleado']);
$array_productos = array
(
   "unidades" => $unidad, 
   "productos" => $producto,
   "precio_unidad" => $precio_uni
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