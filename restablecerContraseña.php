<?php

// Se necesita de este codigo en la pagina para traer los datos del usuario
if (isset($_POST['submit'])) {
    $usuCodigo = $_POST['usuCodigo'];
    $usuRol = $_POST['usuRol'];
    $usuCedula = $_POST['usuCedula'];
    $usuCorreo = $_POST['usuCorreo'];
    $usuContraseña = $_POST['usuContraseña'];
}


?>
<!DOCTYPE html>
<html>

<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="./img/logo-icon.png" type="image/png" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://kit.fontawesome.com/d7bddb5771.js" crossorigin="anonymous"></script>
    <title>Reestablcer contraseña</title>
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
    <!--Formulario donde se ingresa el correo para restablecer la contraseña-->
    <div class="formulario-venta">
        <div align="center"><i class="fa-solid fa-user-large" style="font-size: 80px;"></i></div>
        <h1>RESTABLECER CONTRASEÑA</h1>
        <p style="margin-left: 30%;">Ingrese su correo para restablecer la contraseña</p>
        <form method="POST" action="restablecer-envio.php"><br>
        
            Correo<br>
            <input type="email" name="usuCorreo" required><br>
            <input type="submit" name="submit" class="rainbow-button">
            <a href="index.php" style="margin-left: 43%; color: black;">Iniciar Sesión</a>
            
            <!-- include("rest.php"); -->
        </form>
    </div>
    <?php
    include("footer_inicio.php");
    ?>
</body>

</html>

