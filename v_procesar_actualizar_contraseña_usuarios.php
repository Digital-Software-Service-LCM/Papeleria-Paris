<!DOCTYPE html>
<html>

<head>
      
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
      <title></title>
</head>

<body>
<style type="text/css">
  .error {
    color: red;
  }
</style>

</html>
<!--Trae la informacion regstrada en el formulario de cambiar contraseña -->
<?php

$conexion = mysqli_connect("localhost", "id18967970_root", "Software_LCM_2022", "id18967970_papeleria_paris");
mysqli_set_charset($conexion, "utf8");
$usuCodigo = $_POST['usuCodigo'];
$usuConfirmarContraseña = $_POST['usuConfirmarContraseña'];
$usuContraseñaActual =md5($_POST['usuContraseñaActual']);
$usuContraseñaNueva =$_POST['usuContraseñaNueva'];
$usuContraseña = $_POST['usuContraseña'];
/* Valida que la contraseña ingresada sea igual a la que estaba guardada en la base de datos 
y la nueva es igual a la que se confirma*/
if ($usuContraseña == $usuContraseñaActual && $usuContraseñaNueva == $usuConfirmarContraseña){
      $conexion = mysqli_connect("localhost", "id18967970_root", "Software_LCM_2022", "id18967970_papeleria_paris");

$actualizar = "UPDATE usuario SET usuContraseña=md5('$usuContraseñaNueva') WHERE usuCodigo='$usuCodigo'";
$resultado = mysqli_query($conexion, $actualizar);  
}


// mestra los mensajes de error o confirmacion del cambio de contraseña. 
if ($resultado) {
      echo "<script>alert('Se ha cambiado la contraseña correctamente.');window.location='cuenta-vendedor.php';</script>";
    

}else {
      echo "<script>alert('No se pudo actualizar la contraseña.');
           window.history.go(-1);  
    </script>";
}



?>