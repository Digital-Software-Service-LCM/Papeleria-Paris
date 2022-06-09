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
<?php
// se necesita de este codigo para que la ventana emergente no se muestre en una pagina alterna. 
if (isset($_POST['submit'])) {
    $usuRol = $_POST['usuRol'];
    $usuNombre = $_POST['usuNombre'];
    $usuCedula = $_POST['usuCedula'];
    $usuTelefono = $_POST['usuTelefono'];
    $usuCorreo = $_POST['usuCorreo'];
    $usuContraseña = $_POST['usuContraseña'];
    $usuEstado = $_POST['usuEstado'];
}

?>
<!DOCTYPE html>
<html>

<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="./img/logo-icon.png" type="image/png" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://kit.fontawesome.com/d7bddb5771.js" crossorigin="anonymous"></script>
    <title>Registro Usuario</title>
    <link rel="stylesheet" type="text/css" href="css/venta-style.css">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<header class="header">
    <?php include("menu-admin.php");?>
</header>
<body>
    <!--Formulario para la creacion de usuarios-->
    <div class="formulario-venta">
        <div align="center"><i class="fa-solid fa-user-large" style="font-size: 80px;"></i></div>
        <h1>CREACIÓN USUARIO</h1>
        <!--El action se usa para mostrar la ventana emergente en la pagina actual. -->
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"><br>
            Rol<br>
            <select name="usuRol" class="select" required>
                <option value="administrador" class="option">Administrador</option>
                <option value="bodeguero" class="option">Bodeguero</option>
                <option value="vendedor" class="option">Vendedor</option>
            </select><br>
            Nombre<br>
            <input type="text" name="usuNombre" required><br>
            Cedula<br>
            <input type="text" name="usuCedula" required><br>
            Telefono<br>
            <input type="text" name="usuTelefono" required><br>
            Correo<br>
            <input type="email" name="usuCorreo" required><br>
            Contraseña<br>
            <input type="password" name="usuContraseña" required><br>
            Estado<br>
            <select name="usuEstado" class="select" required>
                <option value="activo" class="option">Activo</option>
                <option value="inactivo" class="option">Inactivo</option>
            </select><br>
            <input type="submit" name="submit" class="rainbow-button">
            <!-- <a href="index.php" style="margin-left: 42%; color: black;">Iniciar Sesión</a> -->
            <?php
            include("registroUsuario.php"); ?>
        </form>
    </div>
    <?php
    include("footer.php");
    ?>
</body>

</html>