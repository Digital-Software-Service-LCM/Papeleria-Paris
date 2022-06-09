<?php
$conexion = mysqli_connect("localhost", "id18967970_root", "Software_LCM_2022", "id18967970_papeleria_paris");
mysqli_set_charset($conexion, "utf8");
$fecha1 = $_POST['fecha1'];
$fecha2 = $_POST['fecha2'];
$reporteExcel = $conexion->query("SELECT * FROM ventas where venFecha BETWEEN '$fecha1' AND '$fecha2' ORDER BY venCodigo");

//$fechas = $fecha1. " - " .$fecha2;

$reporteExcel1 = $conexion->query("SELECT sum(venTotal)as acumuladoVentas FROM ventas where venFecha BETWEEN '$fecha1' AND '$fecha2' ORDER BY venCodigo") ;

require('pdf/fpdf.php');
class PDF extends FPDF
{
// Encabezado de tabla
function Header()
{
    $this->Image('img/logo.png',73,10,63);
    $this->SetFont('Times','B',20);
    $this->Cell(55);
    $this->Cell(80,60,'Reporte de Venta',0,1,'C');
    $this->SetFont('Times','B',14);
    $this->cell(63,10,'Codigo de Venta',1,0,'C',0);
    $this->cell(63,10,'Fecha',1,0,'C',0);
    $this->cell(63,10,'Precio de Venta',1,1,'C',0);
}
// Parte final del documento
function Footer()
{

    $this->SetY(-15);
    $this->SetFont('Arial','I',8);
    $this->Cell(0,10,'Pagina '.$this->PageNo().' de {nb}',0,0,'C');
    
}
}

$sql = "select * from ventas";
$resultado = $conexion->query($sql);


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

// mostrar campos de la tabla
while($row = $resultado->fetch_assoc()){
    $pdf->cell(63,10,$row['venCodigo'],1,0,'C',0);
    $pdf->cell(63,10,$row['venFecha'],1,0,'C',0);
    $pdf->cell(63,10,$row['venTotal'],1,1,'C',0);
}
// mostrar acumulado de ventas
while($row = $reporteExcel1->fetch_assoc()){
    $pdf->SetFont('Times','B',12);
    $pdf->cell(63,10,'',0,0,'C',0);
    $pdf->cell(63,10,'Acumulado de Ventas:',1,0,'C',0);
    $pdf->cell(63,10,$row['acumuladoVentas'],1,1,'C',0);
}

// $pdf->SetFont('times','B',12);
// $pdf->cell(77);
// $pdf->cell(35,-150,$fechas,0,0,'C',0);


$pdf->Output();
?>
