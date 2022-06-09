<?php
// control sesiones administrador
    session_start();

    if(!isset($_SESSION['usuRol'])){
        header('location: index.php');
    }else{
        if($_SESSION['usuRol'] != 'administrador'){
            header('location: index.php');
        }
    } 


?>
<!DOCTYPE html>
<html>
<head>
    
    <title>Consultar Venta</title>
    <link rel="shortcut icon" href="./img/logo-icon.png" type="image/png" />
    <link rel="stylesheet" type="text/css" href="tabla.css">
    <link rel="stylesheet" type="text/css" href="./css/estilos.css">
    <script src="https://kit.fontawesome.com/d7bddb5771.js" crossorigin="anonymous"></script>

</head>
<style>

@import url(https://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100);



    th{
        background: #424865;
        height: 60px;
        font-size: 1.5em;
        color: white;

    }

    tr{
        height: 60px;
        text-align:center;
    }

    body{
        background: #FFB4A7;
    }

    table{
        background: white;
        width: 80%;
        border: solid 3px darkblue;

    }
 .boton-regreso{
     margin-top:10px;
     color: #424865;
 }



    </style>

<?php
// obtener detalles de la venta y mostrar en tabla
require_once "Venta-Data.php";
$idVenta = $_GET["id"];
$d = new Data();

$detalles = $d->getDetalles($idVenta);

echo "<h1>Detalles de venta N° $idVenta </h1>";

echo "<table border='1'>";
    echo "<tr>";
        echo "<th>Codigo</th>";
        echo "<th>Producto</th>";
        echo "<th>Cantidad x Precio</th>";
        echo "<th>SubTotal</th>";
    echo "</tr>";

    $total = 0;
    foreach ($detalles as $det) {
        echo "<tr>";
            echo "<td>".$det->id."</td>";
            echo "<td>".$det->nomProducto."</td>";
            echo "<td>".$det->Cantidad." x $".$det->precio."</td>";
            echo "<td>$".$det->subTotal."</td>";
            $total += $det->subTotal;
        echo "</tr>";
    }
    echo "<tr>";
        echo "<td colspan='3'><b>Total</b></td>";
        echo "<td><b>$$total</b></td>";
    echo "</tr>";
echo "</table>";

echo "<a href='Venta-ventas.php' class='boton-regreso'>Volver a Consultar Ventas</a>";
?>

<?php
        include ("menu-admin.php");
        include ("footer.php");
        ?>

    </body>
</html>

