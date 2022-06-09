<?php
$conexion = mysqli_connect("localhost", "id18967970_root", "Software_LCM_2022", "id18967970_papeleria_paris");
mysqli_set_charset($conexion, "utf8");
$fecha1 = $_POST['fecha1'];
$fecha2 = $_POST['fecha2'];
// realiza la consulta que trae todas las compras registradas entre las fechas seleccionadas
$reporteExcel = $conexion->query("SELECT * FROM compras where compFecha BETWEEN '$fecha1' AND '$fecha2' ORDER BY compCodigo");

//$fechas = $fecha1. " - " .$fecha2;
// Realiza la sumatoria del valor de las compras seleccionadas
$reporteExcel1 = $conexion->query("SELECT sum(compTotal)as acumuladoCompras FROM compras where compFecha BETWEEN '$fecha1' AND '$fecha2' ORDER BY compCodigo") ;

require('pdf/fpdf.php');
class PDF extends FPDF
{
function Header()
{
    //Se define el header de la tabla y el titulo y logo de la parte superior del documento. 
    $this->Image('img/logo.png',73,10,63);
    $this->SetFont('Times','B',20);
    $this->Cell(55);
    $this->Cell(80,60,'Reporte de Compras',0,1,'C');
    $this->SetFont('Times','B',14);
    $this->cell(63,10,'Codigo',1,0,'C',0);
    $this->cell(63,10,'Fecha',1,0,'C',0);
    $this->cell(63,10,'Total Compra',1,1,'C',0);
}

function Footer()
{
// define el numero de la pagina
    $this->SetY(-15);
    $this->SetFont('Arial','I',8);
    $this->Cell(0,10,'Pagina '.$this->PageNo().' de {nb}',0,0,'C');
    
}
}

$sql = "select * from compras";
$resultado = $conexion->query($sql);


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

// trae los datos de las compras y el valor total de estas.
while($row = $resultado->fetch_assoc()){
    $pdf->cell(63,10,$row['compCodigo'],1,0,'C',0);
    $pdf->cell(63,10,$row['compFecha'],1,0,'C',0);
    $pdf->cell(63,10,$row['compTotal'],1,1,'C',0);
}

while($row = $reporteExcel1->fetch_assoc()){
    $pdf->SetFont('Times','B',12);
    $pdf->cell(63,10,'',0,0,'C',0);
    $pdf->cell(63,10,'Acumulado de Compras:',1,0,'C',0);
    $pdf->cell(63,10,$row['acumuladoCompras'],1,1,'C',0);
}

// $pdf->SetFont('times','B',12);
// $pdf->cell(77);
// $pdf->cell(35,-150,$fechas,0,0,'C',0);


$pdf->Output();

?>
