<?php
// Control de sesiones
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
$prodCodigo = $_GET["prodCodigo"];
// realiza la consulta de los datos necesarios para la actualizacion
$producto = "SELECT prodCodigo, prodNombre, prodPrecioVenta , prodCantidad, prodProvCodigo, provEmpresa, provCodigo FROM producto as p join proveedores as pv  on p.prodProvCodigo = pv.provCodigo where prodCodigo = '$prodCodigo'";
?>
<html lang="es">

<head>
    
    <title>Actualizar Producto</title>
    <link rel="shortcut icon" href="./img/logo-icon.png" type="image/png" />
    <link rel="stylesheet" type="text/css" href="tabla.css">
    <link rel="stylesheet" type="text/css" href="css/venta-style.css">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <script src="https://kit.fontawesome.com/d7bddb5771.js" crossorigin="anonymous"></script>

</head>
<header class="header">
<?php
    include("menu-admin.php");
    ?>
</header>

<body style="background-color: #FFB4A7;">
    <div class="formulario-venta">
        <div align="center"><i class="fa-solid fa-box-open" style="font-size: 80px;"></i></div>
        <h1>Actualizar Producto</h1>
        <form method="POST" action="procesar_actualizar_prod.php"><br>
            <?php $resultado = mysqli_query($conexion, $producto);
            while ($row = mysqli_fetch_assoc($resultado)) {
            ?> 
            <!--trae los datos del producto segun su codigo-->
                <input type="hidden" value="<?php echo $row["prodCodigo"]; ?>" name="prodCodigo">
                Nombre <br>
                <input type="text" value="<?php echo $row["prodNombre"]; ?>" name="prodNombre"><br>
                Precio de Venta<br>
                <input type="text" value="<?php echo $row["prodPrecioVenta"]; ?>" name="prodPrecioVenta"><br>
                Cantidad<br>
                <input type="text" value="<?php echo $row["prodCantidad"]; ?>" name="prodCantidad"><br>
                Proveedor<br>
                
                <select name="prodProvCodigo">
            <option style="color:#FFB4A7;">
                <?php echo $row["prodProvCodigo"] ." - " .$row['provEmpresa']; ?>
            </option>
<!--Trae los proveedores registrados en la base de datos con su codigo-->
            <?php $conexion = mysqli_connect("localhost", "id18967970_root", "Software_LCM_2022", "id18967970_papeleria_paris");           
            $sql = "SELECT provCodigo, provEmpresa From proveedores";
            $result = mysqli_query($conexion, $sql) or die ("Error");
            while($rows = mysqli_fetch_array($result)){
            ?>
            <option value="<?php echo $rows['provCodigo'];?>">
            <?php echo $rows['provCodigo'] ." - " .$rows['provEmpresa'];?>
            </option><?php }?></select><br><br>
            <?php }
            mysqli_free_result($resultado); ?>
            <input type="submit" value="Actualizar" class="rainbow-button">
        </form>
    </div>
    <?php 
    include("footer.php");
    ?>

<style>
   option, select{
        background: #FFB4A7;
        padding: 5px;
        width: 100%;
        border: 1px solid #474544;
    }
    </style>

</body>