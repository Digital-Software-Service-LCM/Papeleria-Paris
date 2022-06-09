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
$usuario = "SELECT * FROM usuario";
?>
<html lang="es">

<head>
    
    <title>Consultar Usuarios</title>
    <link rel="shortcut icon" href="./img/logo-icon.png" type="image/png" />
    <link rel="stylesheet" type="text/css" href="tabla.css">
    <link rel="stylesheet" type="text/css" href="./css/estilos.css">
    <script src="https://kit.fontawesome.com/d7bddb5771.js" crossorigin="anonymous"></script>

    <style>
    /*Define los estilos para la tabla de usuarios*/
    .container-table-usuarios {
        width: 90%;
        background: white;
        margin: 50px auto;
        box-shadow: 0 0 20px #333;
        display: grid;
        grid-auto-rows: 70px;
        border: solid 3px darkblue;
    }

    .container-table-usuarios {
        grid-template-columns: repeat(8, 1fr);
    }

    .table__title__usuarios {
        background: #424865;
        color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        font-weight: bold;
        font-size: 1.9em;
    }

    .table__title__usuarios{
        grid-column-start: 1;
        grid-column-end: 10;
    }
    </style>
</head>
<header class="header">
<?php
      include("menu-admin.php");
    ?>
</header>

<body style="background-color: #FFB4A7;">
    <div align="center">
    
        <div class="table-title">
            <h3>Consulta Usuarios</h3>
            <a href="usuario.php">Registrar Nuevo Usuario</a>
        </div>
        
        <div class="container-table-usuarios">
            <div class="table__title__usuarios">Usuarios</div>
            <div class="table__header">Código</div>
            <div class="table__header">Rol</div>
            <div class="table__header">Nombre</div>
            <div class="table__header">Cedula</div>
            <div class="table__header">Telefono</div>
            <div class="table__header">Correo</div>
            <div class="table__header">Contraseña</div>
            <div class="table__header">Estado</div>
            <div class="table__header">Acciones</div>
            <!--trae los datos de los usuarios en la tabla-->
            <?php $resultado = mysqli_query($conexion, $usuario);
            while ($row = mysqli_fetch_assoc($resultado)) {
            ?>
                <div class="table__item"><?php echo $row["usuCodigo"]; ?></div>
                <div class="table__item"><?php echo $row["usuRol"]; ?></div>
                <div class="table__item"><?php echo $row["usuNombre"]; ?></div>
                <div class="table__item"><?php echo $row["usuCedula"]; ?></div>
                <div class="table__item"><?php echo $row["usuTelefono"]; ?></div>
                <div class="table__item"><?php echo $row["usuCorreo"]; ?></div>
                <div class="table__item"><?php echo $row["usuContraseña"]; ?></div>
                <div class="table__item"><?php echo $row["usuEstado"]; ?></div>
                <div class="table__item">
                    <!-- Le permite inactivar al usuario-->
                    <a href="procesar_inactivar_usuario.php?usuCodigo=<?php echo $row["usuCodigo"]; ?>" class="icon-table-inactive"><i class="fa-solid fa-ban" id="icon-table-delete"></i></a>
                </div>

            <?php }
            mysqli_free_result($resultado); ?>
        </div>
        <script src="confirmacion.js"></script>
        <?php
    include("footer.php");
    ?>



</body>