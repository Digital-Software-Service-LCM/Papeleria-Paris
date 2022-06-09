<?php
// Permite que la ventana emergente no se emita en una pagina externa
if (isset($_POST['submit'])) {
    $usuRol = $_POST['usuRol'];
    $usuCedula = $_POST['usuCedula'];
    $usuContraseña = md5($_POST['usuContraseña']);
}
?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="./img/logo-icon.png" type="image/png" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://kit.fontawesome.com/d7bddb5771.js" crossorigin="anonymous"></script>
    <title>Usuarios</title>
    <link rel="stylesheet" type="text/css" href="css/venta-style.css">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<header class="header">
    <div class="container">
        <div class="logo">
            <a href="principal.php"><img src="img/logo.png" class="imagen"></a>
        </div>
    </div>
</header>
<body>
    <!--Formulario para el inicio de sesion-->
    <div class="formulario-venta">
        <div align="center"><i class="fa-solid fa-user-large" style="font-size: 80px;"></i></div>
        <h1>LOGIN USUARIO</h1>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"><br>
            Rol<br>
            <select name="usuRol" class="select" required>
                <option value="administrador" class="option">Administrador</option>
                <option value="bodeguero" class="option">Bodeguero</option>
                <option value="vendedor" class="option">Vendedor</option>
            </select><br>
            Cedula<br>
            <input type="text" name="usuCedula" required><br>
            Contraseña<br>
            <input type="password" name="usuContraseña" required><br>
            <input type="submit" name="submit" class="rainbow-button">
            <a href="restablecerContraseña.php" style="margin-left: 38%; color: black;">Restablecer Contraseña</a>
            <?php
            include("Usuario-envio.php"); ?>
        </form>
    </div>
    <?php
    include("footer_inicio.php");
    ?>
</body>
</html>