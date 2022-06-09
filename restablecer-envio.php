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
    <div class="container">
        <div class="logo">
            <a href="principal.php"><img src="img/logo.png" class="imagen"></a>
        </div>
    </div>
</header>
<body>
<!--Trae el codigo y el nombre del usuario segun el codigo-->
<?php
$conexion = mysqli_connect("localhost", "id18967970_root", "Software_LCM_2022", "id18967970_papeleria_paris");
mysqli_set_charset($conexion, "utf8");
    $usuCorreo = $_POST['usuCorreo'];
    $consulta="select usuCodigo, usuNombre from usuario WHERE usuCorreo = '$usuCorreo' limit 1"; 
    $resultado = mysqli_query($conexion, $consulta);
    $a = mysqli_fetch_assoc($resultado);
    // var_dump($a);
    if (! $a) {
      echo "<script>alert('No existe ningún usuario asociado a ese correo');
               window.history.go(-1);  
        </script>";
    }

// Crea un clave numerica aleatoria de 8 digitos 
$nueva_clave = rand(10000000, 99999999);
$usuCodigo = $a['usuCodigo'];
// Actualiza en la base de datos la clave, por la que se genera
$actualizacion = "UPDATE usuario set usuContraseña=md5('$nueva_clave') WHERE usuCodigo = '$usuCodigo' limit 1";
$resultado = mysqli_query($conexion, $actualizacion);
?>
<!--Muestra la clave del usuario para que pueda acceder-->
    <div class="formulario-venta" style='margin: -300px 10px 10px 10px;'>
    <h1> <p> Hola <?php echo "$a[usuNombre]";?> </p>
    <p> Su nueva clave de acceso es: <br><br> <code style = 'background: rgb(236, 112, 99); color: #fff; padding: 5px 4px;'> <?php echo "$nueva_clave"; ?> </code></p>
    <a href="index.php" style="font-size: 20px; color:#474544;">Iniciar Sesión</a>
    </h1>
    </div>

<?php
    include("footer.php");
    ?>
</body>

</html>