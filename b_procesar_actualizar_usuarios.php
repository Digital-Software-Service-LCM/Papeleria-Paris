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
//trae por el metodo post los datos del usuario para su actualizacion
$usuCodigo = $_POST['usuCodigo'];
    $usuNombre = $_POST['usuNombre'];
    $usuCedula = $_POST['usuCedula'];
    $usuTelefono = $_POST['usuTelefono'];
    $usuCorreo = $_POST['usuCorreo'];
    $usuEstado = $_POST['usuEstado'];

// actualiza el usuario en la base de datos en base a los cambos realizados en el formulario.
$actualizar = "UPDATE usuario SET usuNombre='$usuNombre', usuCedula='$usuCedula' , usuTelefono='$usuTelefono' , usuCorreo='$usuCorreo', usuCorreo='$usuCorreo', usuEstado='$usuEstado' WHERE usuCodigo='$usuCodigo'";

$resultado = mysqli_query($conexion, $actualizar);

// envia el mensaje confirmacion o error de la actualizacion. 
if ($resultado) {
      echo "<script>alert('Se ha actualizado el usuario correctamente.');window.location='cuenta-bodeguero.php';</script>";

} else {
      echo "<script>alert('No se pudieron actualizar los datos.');
           window.history.go(-1);  
    </script>";

}
?>