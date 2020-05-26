<?php
if ($_POST["generar_factura"] == "true")
{

//Recibir detalles de factura
$id_factura = $_POST["id_factura"];
$fecha_factura = $_POST["fecha_factura"];

//Recibir los datos de la empresa
$nombre_tienda = $_POST["nombre_tienda"];
$direccion_tienda = $_POST["direccion_tienda"];
$sucursal = $_POST["sucursal"];
$telefono_tienda = $_POST["telefono_tienda"];
$nit_tienda = $_POST["nit_tienda"];

//Recibir los datos del cliente
$nombre_cliente = $_POST["nombre_cliente"];
$apellidos_cliente = $_POST["apellidos_cliente"];
$nit_cliente = $_POST["nit_cliente"];
$telefono_cliente = $_POST["telefono_cliente"];
$direccion_cliente = $_POST["direccion_cliente"];
//Recibir los datos de los productos
$gastos_de_envio = $_POST["gastos_de_envio"];
$unidades = $_POST["unidades"];
$productos = $_POST["productos"];
$precio_unidad = $_POST["precio_unidad"];

//variable que guarda el nombre del archivo PDF
$archivo="factura-$id_factura.pdf";

//Llamada al script fpdf
require('fpdf.php');


$archivo_de_salida=$archivo;

$pdf=new FPDF();  //crea el objeto
$pdf->AddPage();  //a�adimos una p�gina. Origen coordenadas, esquina superior izquierda, posici�n por defeto a 1 cm de los bordes.


//logo de la tienda
//$pdf->Image('../img/LOGO1.png' , 0 ,0, 40 , 40,'PNG', 'http://php-estudios.blogspot.com');

// Encabezado de la factura
$pdf->SetFont('Arial','B',14);
$pdf->Cell(190, 10, utf8_decode("FERRETERÍA EL CAMPESINO"), 0, 2, "C");
$pdf->SetFont('Arial','B',10);
$pdf->MultiCell(190,5, utf8_decode("FACTURA No.: $id_factura"."\n"."Fecha: $fecha_factura"), 0, "C", false);
$pdf->Ln(2);

// Datos de la tienda
$pdf->SetFont('Arial','B',12);
$top_datos=45;
$pdf->SetXY(40, $top_datos);
$pdf->Cell(190, 10, "Datos de la tienda:", 0, 2, "J");
$pdf->SetFont('Arial','',9);
$pdf->MultiCell(190, //posici�n X
5, //posici�n Y
utf8_decode($nombre_tienda."\n".
"Dirección: ".$direccion_tienda."\n".
"Sucursal: ".$sucursal."\n".
"Teléfono: ".$telefono_tienda."\n".
"NIT: ".$nit_tienda),
 0, // bordes 0 = no | 1 = si
 "J", // texto justificado
 false);


// Datos del cliente
$pdf->SetFont('Arial','B',12);
$pdf->SetXY(125, $top_datos);
$pdf->Cell(190, 10, utf8_decode("Datos del cliente:"), 0, 2, "J");
$pdf->SetFont('Arial','',9);
$pdf->MultiCell(
190, //posici�n X
5, //posicion Y
utf8_decode("Nombre: ".$nombre_cliente."\n".
"Apellidos: ".$apellidos_cliente."\n".
"Teléfono: ".$telefono_cliente."\n".
"NIT: ".$nit_cliente."\n".
"Dirección: ".$direccion_cliente),
0, // bordes 0 = no | 1 = si
"J", // texto justificado
false);

//Salto de l�nea
$pdf->Ln(2);

// extracci�n de los datos de los productos a trav�s de la funci�n explode
$e_productos = explode(",", $productos);
$e_unidades = explode(",", $unidades);
$e_precio_unidad = explode(",", $precio_unidad);

//Creaci�n de la tabla de los detalles de los productos productos
$top_productos = 110;
    $pdf->SetXY(45, $top_productos);
    $pdf->Cell(40, 5, 'UNIDADES', 0, 1, 'C');
    $pdf->SetXY(80, $top_productos);
    $pdf->Cell(40, 5, 'DESCRIPCION', 0, 1, 'C');
    $pdf->SetXY(115, $top_productos);
    $pdf->Cell(40, 5, 'PRECIO UNIDAD', 0, 1, 'C');

$precio_subtotal = 0; // variable para almacenar el subtotal
$y = 115; // variable para la posici�n top desde la cual se empezar�n a agregar los datos
$x=0;
while($x <= count($e_productos) - 1)
{
$pdf->SetFont('Arial','',8);

   $pdf->SetXY(45, $y);
    $pdf->Cell(40, 5, $e_unidades[$x], 0, 1, 'C');
    $pdf->SetXY(80, $y);
    $pdf->Cell(40, 5, utf8_decode($e_productos[$x]), 0, 1, 'C');
    $pdf->SetXY(115, $y);
    $pdf->Cell(40, 5, utf8_decode("Q. ".$e_precio_unidad[$x]), 0, 1, 'C');


$precio_subtotal += $e_precio_unidad[$x] * $e_unidades[$x];
$x++;

//C�lculo del total
$total_producto = round($precio_subtotal + $gastos_de_envio, 2);

// aumento del top 5 cm
$y = $y + 5;
}

$pdf->Ln(2);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(190, 5, "Subtotal: Q.".$precio_subtotal, 0, 1, "C");
$pdf->Cell(190, 5, utf8_decode("Gastos de envío: Q.".$gastos_de_envio), 0, 1, "C");
$pdf->Cell(190, 5, "Total: Q.".$total_producto, 0, 1, "C");

$pdf->Output($archivo_de_salida);//cierra el objeto pdf

//Creacion de las cabeceras que generar�n el archivo pdf
header ("Content-Type: application/download");
header ("Content-Disposition: attachment; filename=$archivo");
header("Content-Length: " . filesize("$archivo"));
$fp = fopen($archivo, "r");
fpassthru($fp);
fclose($fp);

//Eliminaci�n del archivo en el servidor
unlink($archivo);
}
