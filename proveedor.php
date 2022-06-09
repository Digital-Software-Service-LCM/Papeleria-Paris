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
// se trae este codigo en esta pagina con el fin de que la venta emergente no se muestre en otra pagina. 
if (isset($_POST['submit'])) {
    $provNombre = $_POST['provNombre'];
    $provApellido = $_POST['provApellido'];
    $provTelefono = $_POST['provTelefono'];
    $provCorreo = $_POST['provCorreo'];
    $provEmpresa = $_POST['provEmpresa'];
}


?>

<!DOCTYPE html>
<html>

<head>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Proveedores</title>
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
    <!--Formulario de registro del proveedor-->
    <div class="formulario-venta">
        <div align="center"><i class="fa-solid fa-handshake" style="font-size: 80px;"></i></div>
        <h1>PROVEEDOR</h1>
        <img src="" alt="">
        <!--El action es usado para que la ventana emergente se muestra en la pagina actual-->
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>"><br>
            <!-- Codigo: <br>
                <input type="text" name="codigo"><br> -->
            Nombre: <br>
            <input type="text" name="provNombre" required><br>
            Apellido: <br>
            <input type="text" name="provApellido" required><br>
            Telefono: <br>
            <input type="text" name="provTelefono" required><br>
            Correo: <br>
            <input type="text" name="provCorreo" required><br>
            Empresa: <br>
            <input type="text" name="provEmpresa" required><br>

            <br>
            <input type="submit" name="submit" class="rainbow-button">
            <?php
            include("proveedor_envi.php"); ?>
        </form>
    </div>
    <?php
    include("footer.php");
    ?>
</body>


</html>