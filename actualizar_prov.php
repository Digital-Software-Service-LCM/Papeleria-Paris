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
$provCodigo = $_GET["provCodigo"];
$proveedores = "SELECT * FROM proveedores where provCodigo = '$provCodigo'";
?>
<!DOCTYPE html>
<html>

<head>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Actualizar Proveedor</title>
    <link rel="shortcut icon" href="./img/logo-icon.png" type="image/png" />
    <script src="https://kit.fontawesome.com/d7bddb5771.js" crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
        <div align="center"><i class="fa-solid fa-handshake" style="font-size: 80px;"></i></div>
        <h1>Actualizar Proveedor</h1>
        <img src="" alt="">
        <form method="POST" action="procesar_actualizar_prov.php"><br>
            <?php $resultado = mysqli_query($conexion, $proveedores);
            while ($row = mysqli_fetch_assoc($resultado)) {
            ?>
            <!--trae los datos del proveedor deacuerdo a su codigo-->
                <input type="hidden" value="<?php echo $row["provCodigo"]; ?>" name="provCodigo">
                Nombre: <br>
                <input type="text" value="<?php echo $row["provNombre"]; ?>" name="provNombre"><br>
                Apellido: <br>
                <input type="text" value="<?php echo $row["provApellido"]; ?>" name="provApellido"><br>
                Telefono: <br>
                <input type="text" value="<?php echo $row["provTelefono"]; ?>" name="provTelefono"><br>
                Correo: <br>
                <input type="text" value="<?php echo $row["provCorreo"]; ?>" name="provCorreo"><br>
                Empresa: <br>
                <input type="text" value="<?php echo $row["provEmpresa"]; ?>" name="provEmpresa"><br>

                <br>
            <?php }
            mysqli_free_result($resultado); ?>

            <input type="submit" value="Actualizar" class="rainbow-button">

        </form>
    </div>

    <?php 
    include("footer.php");
    ?>
</body>


</html>