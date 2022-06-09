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
// Trae los datos del producto con el fin de evitar que la ventana emergente se emita en otra pagina
if (isset($_POST['submit'])) {
    $prodNombre = $_POST['prodNombre'];
    $prodPrecioVenta = $_POST['prodPrecioVenta'];
    $prodCantidad = $_POST['prodCantidad'];
    $prodProvCodigo = $_POST['prodProvCodigo'];
}
?>
<!DOCTYPE html>
<html>

<head>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Productos</title>
    <link rel="shortcut icon" href="./img/logo-icon.png" type="image/png" />
    <script src="https://kit.fontawesome.com/d7bddb5771.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
        <div align="center"><i class="fa-solid fa-box-open" style="font-size: 80px;"></i></div>
        <h1>PRODUCTOS </h1>
        <!--permite que la ventana emergente se muestre en la misma pagina-->
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"><br>
            Nombre <br>
            <input type="text" name="prodNombre" required><br>
            Precio de Venta<br>
            <input type="text" name="prodPrecioVenta" required><br>
            Cantidad<br>
            <input type="text" name="prodCantidad" required><br>
            <div id="opciones">
            Proveedor <br><br>
            <select name="prodProvCodigo" required>
            <option value=>Seleccione...</option>
            <?php $conexion = mysqli_connect("localhost", "id18967970_root", "Software_LCM_2022", "id18967970_papeleria_paris");
            $sql = "SELECT provCodigo, provEmpresa From proveedores";
            $result = mysqli_query($conexion, $sql) or die ("Error");
            while($rows = mysqli_fetch_array($result)){
            ?>
            <option value="<?php echo $rows['provCodigo'];?>">
            <?php echo $rows['provCodigo'] ." - " .$rows['provEmpresa'];?>
            </option><?php }?></select><br>
        </div><br><br>
            <input type="submit" name="submit" class="rainbow-button">
            <?php
            include("producto-envio.php"); ?>
        </form>
    </div>
    <?php
    include("bodeguero_footer.php");
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