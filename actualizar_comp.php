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
$compCodigo = $_GET["compCodigo"];
$compras = "SELECT compCodigo, compFecha, compCodigoProducto, compCantidad, compPrecio, compTotal, prodNombre FROM compras as c join producto as p on c.compCodigoProducto = p.prodCodigo where compCodigo = '$compCodigo'";
?>
<!DOCTYPE html>
<html>

<head>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Actualizar Compra</title>
    <link rel="shortcut icon" href="./img/logo-icon.png" type="image/png" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://kit.fontawesome.com/d7bddb5771.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="css/venta-style.css">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<header class="header">
    <?php
    include("menu-admin.php");
    ?>
</header>

<body>
    <div class="formulario-venta">
        <div align="center"><i class="fa-solid fa-basket-shopping" style="font-size: 80px;"></i></div>
        <h1>Actualizar Compra</h1>
        <form method="POST" action="procesar_actualizar_comp.php"><br>
            <?php $resultado = mysqli_query($conexion, $compras);
            while ($row = mysqli_fetch_assoc($resultado)) {
            ?>
            <!--trae los datos registrados segun el codigo de la compra-->
                <input type="hidden" value="<?php echo $row["compCodigo"]; ?>" name="compCodigo">
                Fecha <br>
                <input type="datetime-local" value="<?php echo $row["compFecha"]; ?>" name="compFecha" required><br>
                Codigo producto <br>
                <select name="compCodigoProducto">
            <option style="color:#FFB4A7;">
                <?php echo $row["compCodigoProducto"] ." - " .$row['prodNombre']; ?>
            </option>

            <?php $conexion = mysqli_connect("localhost", "id18967970_root", "Software_LCM_2022", "id18967970_papeleria_paris");        
            $sql = "SELECT prodCodigo, prodNombre from producto";
            $result = mysqli_query($conexion, $sql) or die ("Error");
            while($rows = mysqli_fetch_array($result)){
            ?>
            <option value="<?php echo $rows['prodCodigo'];?>">
            <?php echo $rows['prodCodigo'] ." - " .$rows['prodNombre'];?>
            </option><?php }?></select><br><br>
                Cantidad <br>
                <input type="text" value="<?php echo $row["compCantidad"]; ?>" name="compCantidad"><br>
                Precio Unitario de Compra  <br>
                <input type="text" value="<?php echo $row["compPrecio"]; ?>" name="compPrecio"><br><br>

            <?php }
            mysqli_free_result($resultado); ?>
            <input type="submit" value="Actualizar" class="rainbow-button">
        </form>
    </div>
    <?php
    include("footer.php");
    ?>
    
</body>
<style>
   option, select{
        background: #FFB4A7;
        padding: 5px;
        width: 100%;
        border: 1px solid #474544;
    }
    </style>

</html>