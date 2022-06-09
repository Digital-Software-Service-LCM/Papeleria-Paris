<?php
// control de sesiones
    session_start();

    if(!isset($_SESSION['usuRol'])){
        header('location: index.php');
    }else{
        if($_SESSION['usuRol'] != 'vendedor'){
            header('location: index.php');
        }
    } 


?>
<?php
$conexion = mysqli_connect("localhost", "id18967970_root", "Software_LCM_2022", "id18967970_papeleria_paris");
mysqli_set_charset($conexion, "utf8");
$usuario = "SELECT * FROM usuario where usuRol = 'vendedor'";
?>
<html lang="es">

<head>
    
    <title>Mi cuenta</title>
    <link rel="shortcut icon" href="./img/logo-icon.png" type="image/png" />
    <link rel="stylesheet" type="text/css" href="tabla.css">
    <link rel="stylesheet" type="text/css" href="css/venta-style.css">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <script src="https://kit.fontawesome.com/d7bddb5771.js" crossorigin="anonymous"></script>

</head>

<style>

  .enlace{
    border: solid black 1px;
    border-radius: 10px;
    background: #ee8f7e;
    margin-left: auto;
    padding: 10px;
    color: black;
  }
  </style>

<header class="header">
<?php
      include("menu-vendedor.php");
    ?>
</header>
<!--Trae la informacion personal y de  acceso del vendedor en un formulario-->
<body style="background-color: #FFB4A7;">
    <div class="formulario-venta">
    <!-- <h1>Mi cuenta</h1> -->
        <div align="center"><i class="fa-solid fa-clipboard-user" style="font-size: 80px;"></i></div>
        <h1>Vendedor</h1>
        
        <?php $resultado = mysqli_query($conexion, $usuario);
            while ($row = mysqli_fetch_assoc($resultado)) {
            ?>
    
    <p> <b>Informacion Personal:</b> </p> <br>
                Nombre:<br>
                <input type="text" value="<?php echo $row["usuNombre"]; ?>" name="usuNombre" disabled><br>
                Cedula:<br>
                <input type="text" value="<?php echo $row["usuCedula"]; ?>" name="usuCedula" disabled><br>
                Telefono:<br>
                <input type="text" value="<?php echo $row["usuTelefono"]; ?>" name="usuTelefono" disabled><br>
                Correo:<br>
                <input type="text" value="<?php echo $row["usuCorreo"]; ?>" name="usuCorreo" disabled><br>
                <!--Dirige al usuario a una pagina que le permite actualizar sus datos-->
                <a href="vendedor_actualizar_usuarios.php?usuCodigo=<?php echo $row["usuCodigo"]; ?>" class="enlace">Actualizar Informacion</i></a>
                <br><br>
                <p> <b> Informacion de acceso: </b> </p>   <br>
                
              Rol: <input type="text" value="<?php echo $row["usuRol"]; ?>" name="usuRol" disabled><br>
              Contraseña: <br>
                <input type="text" value="<?php echo  md5($row["usuContraseña"]); ?>" name="usuContraseña" disabled ><br>
              Estado:<br>
                <input type="text" value="<?php echo $row["usuEstado"]; ?>" name="usuEstado" placeholder="activo o inactivo" disabled><br><br>
                <!--Dirige al usuario a una pagina donde puede cambiar su contraseña-->
                <a href="vendedor_cambiarContraseña.php?usuCodigo=<?php echo $row["usuCodigo"]; ?>" class="enlace">Cambiar Contraseña</i></a><br><br><br>

            <?php }
            mysqli_free_result($resultado); ?>

        </form>
    </div>
    <?php 
    include("vendedor_footer.php");
    ?>


</body>