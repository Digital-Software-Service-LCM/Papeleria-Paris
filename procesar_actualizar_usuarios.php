<!DOCTYPE html>
<html>

<head>
      
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
      <title></title>
</head>

<body>
</body>

</html>
<?php
$conexion = mysqli_connect("localhost", "id18967970_root", "Software_LCM_2022", "id18967970_papeleria_paris");
mysqli_set_charset($conexion, "utf8");
$usuCodigo = $_POST['usuCodigo'];
    $usuNombre = $_POST['usuNombre'];
    $usuCedula = $_POST['usuCedula'];
    $usuTelefono = $_POST['usuTelefono'];
    $usuCorreo = $_POST['usuCorreo'];

// Consulta para actualizar los usuarios
$actualizar = "UPDATE usuario SET usuNombre='$usuNombre', usuCedula='$usuCedula' , usuTelefono='$usuTelefono' , usuCorreo='$usuCorreo' WHERE usuCodigo='$usuCodigo'";

$resultado = mysqli_query($conexion, $actualizar);

// Mensajes de error y confirmacion para la actualizacion del usuario
if ($resultado) {
      echo "<script>alert('Se ha actualizado el usuario correctamente.');window.location='cuenta-administrador.php';</script>";

} else {
      echo "<script>alert('No se pudieron actualizar los datos.');
           window.history.go(-1);  
    </script>";
}
?>