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
$usuCodigo = $_GET["usuCodigo"];
$usuario = "SELECT * FROM usuario where usuCodigo = '$usuCodigo'";
?>
<html lang="es">

<head>
    
    <title>Actualizar Usuarios</title>
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
        <h1>Actualizar Usuarios</h1>
        <form method="POST" action="procesar_actualizar_usuarios.php"><br>
            <?php $resultado = mysqli_query($conexion, $usuario);
            while ($row = mysqli_fetch_assoc($resultado)) {
            ?>
            <!--trae los datos de usuario segun el codigo -->
                <input type="hidden" value="<?php echo $row["usuCodigo"]; ?>" name="usuCodigo"><br>
                Nombre<br>
                <input type="text" value="<?php echo $row["usuNombre"]; ?>" name="usuNombre"><br>
                Cedula<br>
                <input type="text" value="<?php echo $row["usuCedula"]; ?>" name="usuCedula"><br>
                Telefono<br>
                <input type="text" value="<?php echo $row["usuTelefono"]; ?>" name="usuTelefono"><br>
                Correo<br>
                <input type="text" value="<?php echo $row["usuCorreo"]; ?>" name="usuCorreo"><br>
            <?php }
            mysqli_free_result($resultado); ?>
            <input type="submit" value="Actualizar" class="rainbow-button">
        </form>
    </div>
    <?php 
    include("footer.php");
    ?>


</body>