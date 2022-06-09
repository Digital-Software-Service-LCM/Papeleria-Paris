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
$producto = "SELECT prodCodigo, prodNombre, prodPrecioVenta, prodCantidad, provEmpresa FROM producto as p join proveedores as pv on p.prodProvCodigo = pv.provCodigo";

?>
<html lang="es">

<head>
    
    <title>Consultar Producto</title>
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

<!--trae todos los datos de los productos en una tabla-->
<body style="background-color: #FFB4A7;">
    <div align="center">
        <div class="table-title">
            <h3>Consultar productos</h3>
        </div>
        <div class="container-table-prod">
            <div class="table__title__prod">Productos</div>
            <div class="table__header">Código</div>
            <div class="table__header">Nombre</div>
            <div class="table__header">Precio de Venta</div>
            <div class="table__header">Cantidad</div>
            <div class="table__header">Proveedor</div>
            <div class="table__header">Acciones</div>
            <?php $resultado = mysqli_query($conexion, $producto);
            while ($row = mysqli_fetch_assoc($resultado)) {
            ?>
                <div class="table__item"><?php echo $row["prodCodigo"]; ?></div>
                <div class="table__item"><?php echo $row["prodNombre"]; ?></div>
                <div class="table__item"><?php echo $row["prodPrecioVenta"]; ?></div>
                <div class="table__item"><?php echo $row["prodCantidad"]; ?></div>
                <div class="table__item"><?php echo $row["provEmpresa"]; ?></div>
                <div class="table__item">
                    <!--Guarda el codigo para que a partir d este se pueda eliminar o actualizar el producto-->
                    <a href="actualizar_prod.php?prodCodigo=<?php echo $row["prodCodigo"]; ?>"><i class="fa-solid fa-pencil" id="icon-table-update"></i></a>
                    <a href="procesar_eliminar_prod.php?prodCodigo=<?php echo $row["prodCodigo"]; ?>" class="icon-table-delete"><i class="fa-solid fa-trash-can" id="icon-table-delete"></i></a>
                </div>

            <?php }
            mysqli_free_result($resultado); ?>
        </div>
        <script src="confirmacion.js"></script>
        <?php
    include("footer.php");
    ?>

<style>
/*actualiza la cantidad de columnas de la tabla*/
    .table__title__prod{
    grid-column-start: 1;
    grid-column-end: 7;
}
.container-table-prod {
    grid-template-columns: repeat(6, 1fr);
}
</style>

</body>