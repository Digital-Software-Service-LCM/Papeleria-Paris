<?php
// control de sesiones
    session_start();

    if(!isset($_SESSION['usuRol'])){
        header('location: index.php');
    }else{
        if($_SESSION['usuRol'] != 'bodeguero'){
            header('location: index.php');
        }
    } 


?>
<?php
// Se incluye este codigo para que la ventana emegente se mostrara en la misma pagina
if (isset($_POST['submit'])) {
    $compFecha = $_POST['compFecha'];
    $compCodigoProducto = $_POST['compCodigoProducto'];
    $compCantidad = $_POST['compCantidad'];
    $compPrecio = $_POST['compPrecio'];
}


?>
<!DOCTYPE html>
<html>
<style>
    option, select{
        background: #FFB4A7;
        padding:5px;
        width: 10000px;
    }
    </style>
<head>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Compras</title>
    <link rel="shortcut icon" href="./img/logo-icon.png" type="image/png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/d7bddb5771.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/venta-style.css">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<header class="header">
<?php
    include("menu-bodeguero.php");
    ?>
</header>

<body>
    <div class="formulario-venta">
        <div align="center"><i class="fa-solid fa-basket-shopping" style="font-size: 80px;"></i></div>
        <h1>COMPRAS </h1>
        <!--El codigo del action no dirige a otra pagina con el fin de que la ventana emergente aparezca en la misma -->
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"><br>
            Fecha <br>
            <input type="datetime-local" name="compFecha" required><br>
            <div id="opciones1">
            Codigo producto <br><br>
            <select name="compCodigoProducto" required style="width:100%">
            <option value=>Seleccione...</option>
            <!--Trae todos los codigos y nombres de los productos registrados en la base de datos-->
            <?php $conexion = mysqli_connect("localhost", "id18967970_root", "Software_LCM_2022", "id18967970_papeleria_paris");
            $sql = "SELECT prodCodigo, prodNombre From producto";
            $result = mysqli_query($conexion, $sql) or die ("Error");
            while($rows = mysqli_fetch_array($result)){
            ?>
            <!--Muestra en una lista el codigo del producto seguido de un guion con el nombre-->
            <option value="<?php echo $rows['prodCodigo'];?>">
            <?php echo $rows['prodCodigo'] ." - " .$rows['prodNombre'];?>
        </option><?php }?></select>
            </div><br>
            
            Cantidad <br>
            <input type="text" name="compCantidad" required><br>
            Precio Unitario de Compra <br>
            <input type="text" name="compPrecio" required><br><br>
            <input type="submit" name="submit" class="rainbow-button">
            <?php
            include("compras-envio.php"); ?>
        </form>
    </div>
    <?php
    include("bodeguero_footer.php");
    ?>
</body>

</html>