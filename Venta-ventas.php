<?php
// Control de sesiones administrador

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
<html lang="es">
<head>
    
    <title>Consultar Venta</title>
    <link rel="shortcut icon" href="./img/logo-icon.png" type="image/png" />
    <link rel="stylesheet" type="text/css" href="tabla.css">
    <link rel="stylesheet" type="text/css" href="./css/estilos.css">
    <script src="https://kit.fontawesome.com/d7bddb5771.js" crossorigin="anonymous"></script>

</head>
<style>

@import url(https://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100);

#titleTable{
        background: #424865;
        color: white;
        height: 60px;

    }

    th{
        height: 60px;
        font-size: 1.5em;
        

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
    form table {
        background: #FFB4A7;
        border: none;
        width: 100%;
        font-size: 10px;
    }
    form table tr th input{
        width: 450px;
    }

#icono{
    color: black;
    text-decoraTION: NONE;
    margin:20px;
}

    </style>

    <body>
        <!--Obtener ventas y Mostrarlas en tabla-->
        <?php
        require_once "Venta-Data.php";

        $d = new Data();

        $ventas = $d->getVentas();
        echo "<h1>Consultar Ventas</h1>";

        echo "<table border='1'>";

        echo "<tr>";
                echo "<th id='titleTable' colspan = 4>Ventas</th>";
            echo "</tr>";

            echo "<tr>";
                echo "<th>Codigo</th>";
                echo "<th>Fecha</th>";
                echo "<th>Total</th>";
                echo "<th>Acción</th>";
            echo "</tr>";

        foreach ($ventas as $v) {
            echo "<tr>";
                echo "<td>".$v->id."</td>";
                echo "<td>".$v->fecha."</td>";
                echo "<td>$".$v->total."</td>";
                echo "<td>";
                    echo "<a href='Venta-detalleVenta.php?id=".$v->id."'><i class='fa-solid fa-eye' id='icono'></i></a>";
                    echo "<a href='factura.php?id=".$v->id."'><i class='fa-solid fa-download' id='icono'></i></a>";
                echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>
         <!--Crear reporte de ventas segun fechas seleccionadas-->
        <form method="post" class="form-reporte" action="Venta-Reporte.php">
                <table style="width: 80%;">
                    <tr>
                        <th><input type="datetime-local" name="fecha1"></th>
                        <th></th>
                        <th><input type="datetime-local" name="fecha2"></th>
                        <th></th>
                    </tr>
                    <tr>
                </table>
                <input style="width:100%; border: 2px solid; height: 40px; margin-top:-100px; margin-bottom:-100px;" type="submit" value="Generar Reporte" name="generar_reporte">
            </form>
        <?php
        include ("menu-admin.php");
        include ("footer.php");
        ?>


    </body>
</html>
