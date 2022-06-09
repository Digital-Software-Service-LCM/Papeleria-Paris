<?php
// control de sesiones
    session_start();

    if(!isset($_SESSION['usuRol'])){
        header('location: index.php');
    }else{
        if($_SESSION['usuRol'] != 'administrador'){
            header('location: index.php');
        }
    } 


?>
<?php
$conexion = mysqli_connect("localhost", "id18967970_root", "Software_LCM_2022", "id18967970_papeleria_paris");
mysqli_set_charset($conexion, "utf8");
$compras = "SELECT compCodigo, compFecha, compCodigoProducto, compCantidad, compPrecio, compTotal, prodNombre FROM compras as c join producto as p on c.compCodigoProducto = p.prodCodigo";
?>
<html lang="es">

<head>
    
    <title>Consultar Compras</title>
    <link rel="shortcut icon" href="./img/logo-icon.png" type="image/png" />
    <link rel="stylesheet" type="text/css" href="tabla.css">
    <link rel="stylesheet" type="text/css" href="./css/estilos.css">

    <script src="https://kit.fontawesome.com/d7bddb5771.js" crossorigin="anonymous"></script>
</head>
<header class="header">
<?php
    include("menu-admin.php");
    ?>
</header>
 <!--trae todas las compras almacenadas en la base de datos en una tabla -->
<body style="background-color: #FFB4A7;">
    <div align="center">
        <div class="table-title">
            <h3>Consultar compras</h3>
        </div>

        <div class="container-table-comp-vent">

            <div class="table__title__comp__vent">Compras</div>
            <div class="table__header">Código</div>
            <div class="table__header">Fecha</div>
            <div class="table__header">Codigo Producto</div>
            <div class="table__header">Cantidad</div>
            <div class="table__header">Precio</div>
            <div class="table__header">Total</div>
            <div class="table__header">Acciones</div>
            <?php $resultado = mysqli_query($conexion, $compras);
            while ($row = mysqli_fetch_assoc($resultado)) {
            ?>

                <div class="table__item"><?php echo $row["compCodigo"]; ?></div>
                <div class="table__item"><?php echo $row["compFecha"]; ?></div>
                <div class="table__item"><?php echo $row["compCodigoProducto"] ." - " .$row['prodNombre']; ?></div>
                <div class="table__item"><?php echo $row["compCantidad"]; ?></div>
                <div class="table__item"><?php echo $row["compPrecio"]; ?></div>
                <div class="table__item"><?php echo $row["compTotal"]; ?></div>
                <div class="table__item">
                    <!--Guarda el codigo de la compra para la actualizacion o elliminacion de esta-->
                    <a href="actualizar_comp.php?compCodigo=<?php echo $row["compCodigo"]; ?>"><i class="fa-solid fa-pencil" id="icon-table-update"></i></a>
                    <a href="procesar_eliminar_comp.php?compCodigo=<?php echo $row["compCodigo"]; ?>" class="icon-table-delete"><i class="fa-solid fa-trash-can" id="icon-table-delete"></i></a>
                </div>

            <?php }
            mysqli_free_result($resultado); ?>
            
        </div>
        <script src="confirmacion.js"></script>
        <!--crea los inputs para seleccionar la fecha entre las que se genera el reporte-->
<form method="post" class="form-reporte" action="Compra-Reporte.php">
                <table style="width: 80%;">
                    <tr>
                        <th><input type="datetime-local" name="fecha1"></th>
                        <th></th>
                        <th><input type="datetime-local" name="fecha2"></th>
                        <th></th>
                    </tr>
                    <tr>
                </table><br><br> <br><br> <br> 
                <input style="width:80%; border: 2px solid; height: 40px; margin-top:-100px; margin-bottom:-500px;" type="submit" value="Generar Reporte" name="generar_reporte">
            </form>

        
        <?php
    include("footer.php");
    ?>
<style>
/*define la cantidad de columnas de la tabla*/
    .table__title__comp__vent{
    grid-column-start: 1;
    grid-column-end: 8;
}
.container-table-comp-vent {
    grid-template-columns: repeat(7, 1fr);
}
</style>
</body>