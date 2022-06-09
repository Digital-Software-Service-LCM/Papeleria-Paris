<?php
require('pdf/fpdf.php');
$conexion = mysqli_connect("localhost", "id18967970_root", "Software_LCM_2022", "id18967970_papeleria_paris");
mysqli_set_charset($conexion, "utf8");

class PDF extends FPDF
{
function Header()
{
    // define la posicion del logo
    $this->Image('img/logo.png',74,10,63);
    $this->SetFont('Times','B',20);
    $this->Cell(60);
    // define el titulo del reporte 
    $this->Cell(70,60,'Factura de Venta',0,1,'C');
    $this->SetFont('Times','B',14);
    // define el header de la tabla
    $this->cell(25,10,'Codigo',1,0,'C',0);
    $this->cell(55,10,'Nombre',1,0,'C',0);
    $this->cell(40,10,'Precio de Venta',1,0,'C',0);
    $this->cell(35,10,'Cantidad',1,0,'C',0);
    $this->cell(35,10,'Subtotal',1,1,'C',0);
}

function Footer()
{

    $this->SetY(-15);
    $this->SetFont('Arial','I',8);
    $this->Cell(0,10,'Pagina '.$this->PageNo().' de {nb}',0,0,'C');
    
}
}
require_once "Venta-Data.php";
$idVenta = $_GET["id"];
$d = new Data();

$detalles = $d->getDetalles($idVenta);
//$fechas = $conexion->query("select venFecha from ventas where venCodigo = $idVenta");
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
$total = 0;

// Trae el detalle de la venta segun el id
foreach ($detalles as $det) {
        $pdf->cell(25,10,$det->id,1,0,'C',0);
        $pdf->cell(55,10,$det->nomProducto,1,0,'C',0);
        $pdf->cell(40,10,$det->precio,1,0,'C',0);
        $pdf->cell(35,10,$det->Cantidad,1,0,'C',0);
        $pdf->cell(35,10,$det->subTotal,1,0,'C',0);
        $pdf->cell(35,10,$total += $det->subTotal,0,1,'C',0);
            
    }
// Calcula el total de la venta
    $pdf->SetFont('Times','B',12);
    $pdf->cell(35,10,'',0,0,'C',0);
    $pdf->cell(35,10,'',0,0,'C',0);
    $pdf->cell(50,10,'',0,0,'C',0);
    $pdf->cell(35,10,'Total:',1,0,'C',0);
    $pdf->cell(35,10,$total,1,1,'C',0);

// while($row = $fechas->fetch_assoc()){
//     $pdf->cell(190,-190,$row['venFecha'],0,1,'C',0);
// }

$pdf->Output();



?>
