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
$proveedores = "SELECT * FROM proveedores";
?>
<html lang="es">

<head>
    
    <title>Consultar Proveedor</title>
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
<!--Trae todos los proveedores registrados en la base de datos en una tabla. -->
<body style="background-color: #FFB4A7;">
    <div align="center">
        <div class="table-title">
            <h3>Consultar proveedores</h3>
        </div>

        <div class="container-table-prov">
            <div class="table__title__prov">Proveedores</div>
            <div class="table__header">Código</div>
            <div class="table__header">Nombre</div>
            <div class="table__header">Apellido</div>
            <div class="table__header">Telefono</div>
            <div class="table__header">Correo</div>
            <div class="table__header">Empresa</div>
            <div class="table__header">Acciones</div>
            <?php $resultado = mysqli_query($conexion, $proveedores);
            while ($row = mysqli_fetch_assoc($resultado)) {
            ?>
                <div class="table__item"><?php echo $row["provCodigo"]; ?></div>
                <div class="table__item"><?php echo $row["provNombre"]; ?></div>
                <div class="table__item"><?php echo $row["provApellido"]; ?></div>
                <div class="table__item"><?php echo $row["provTelefono"]; ?></div>
                <div class="table__item"><?php echo $row["provCorreo"]; ?></div>
                <div class="table__item"><?php echo $row["provEmpresa"]; ?></div>
                <div class="table__item">
                    <!--Trae el codigo del producto para su actualizacion o eliminacion-->
                    <a href="actualizar_prov.php?provCodigo=<?php echo $row["provCodigo"]; ?>"><i class="fa-solid fa-pencil" id="icon-table-update"></i></a>
                    <a href="procesar_eliminar_prov.php?provCodigo=<?php echo $row["provCodigo"]; ?>" class="icon-table-delete"><i class="fa-solid fa-trash-can" id="icon-table-delete"></i></a>
                </div>
            <?php }
            mysqli_free_result($resultado); ?>
        </div>
        <script src="confirmacion.js"></script>
        <?php
    include("footer.php");
    ?>


</body>