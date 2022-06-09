<?php
$conexion = mysqli_connect("localhost", "id18967970_root", "Software_LCM_2022", "id18967970_papeleria_paris");
mysqli_set_charset($conexion, "utf8");
// $fecha1 = $_POST['fecha1'];
// $fecha2 = $_POST['fecha2'];
$reporteExcel = "SELECT compFecha,prodNombre, prodPrecioVenta, compPrecio, round(prodPrecioVenta - compPrecio) as ganancia FROM producto as p JOIN compras as c on p.prodCodigo = c.compCodigoProducto";

//$fechas = $fecha1. " - " .$fecha2;

// $reporteExcel1 = $conexion->query("SELECT sum(venTotal)as acumuladoVentas FROM ventas where venFecha BETWEEN '$fecha1' AND '$fecha2' ORDER BY venCodigo") ;

require('pdf/fpdf.php');
class PDF extends FPDF
{
    // Encabezado de la tabla
function Header()
{
    $this->Image('img/logo.png',73,10,63);
    $this->SetFont('Times','B',20);
    $this->Cell(55);
    $this->Cell(80,60,'Seguimiento de Precios',0,1,'C');
    $this->SetFont('Times','B',14);
    $this->cell(37,10,'Fecha',1,0,'C',0);
    $this->cell(40,10,'Producto',1,0,'C',0);
    $this->cell(42,10,'Precio de Compra',1,0,'C',0);
    $this->cell(37,10,'Precio de Venta',1,0,'C',0);
    $this->cell(35,10,'Margen Bruto',1,1,'C',0);
}
// Pie de pagina del documento
function Footer()
{

    $this->SetY(-15);
    $this->SetFont('Arial','I',8);
    $this->Cell(0,10,'Pagina '.$this->PageNo().' de {nb}',0,0,'C');
    
}
}

// $sql = "select * from ventas";
$resultado = $conexion->query($reporteExcel);


$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);

// Campos de la tabla
while($row = $resultado->fetch_assoc()){
    $pdf->cell(37,10,$row['compFecha'],1,0,'C',0);
    $pdf->cell(40,10,$row['prodNombre'],1,0,'C',0);
    $pdf->cell(42,10,$row['compPrecio'],1,0,'C',0);
    $pdf->cell(37,10,$row['prodPrecioVenta'],1,0,'C',0);
    $pdf->cell(35,10,$row['ganancia'],1,1,'C',0);
}



$pdf->Output();

?>
