<!DOCTYPE html>
<html>

<head>
      
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
      <title></title>
</head>

<body>
<!--Define el color de llos mensajes de error a partir de las validaciones de entradas validas.-->
<style type="text/css">
  .error {
    color: red;
  }
</style>

</html>

<?php

$conexion = mysqli_connect("localhost", "id18967970_root", "Software_LCM_2022", "id18967970_papeleria_paris");
mysqli_set_charset($conexion, "utf8");
// trae por el metodo post los campos de la tabla de usuarios para validar la entrada al sistema
$usuCodigo = $_POST['usuCodigo'];
$usuConfirmarContraseña = $_POST['usuConfirmarContraseña'];
$usuContraseñaActual =md5($_POST['usuContraseñaActual']);
$usuContraseñaNueva =$_POST['usuContraseñaNueva'];
$usuContraseña = $_POST['usuContraseña'];
// valida que la contraseña actual coincida con la de la base de datos, y la nueva sea igual a la digitada para su confirmacion. 
if ($usuContraseña == $usuContraseñaActual && $usuContraseñaNueva == $usuConfirmarContraseña){
      $conexion = mysqli_connect("localhost", "id18967970_root", "Software_LCM_2022", "id18967970_papeleria_paris");
// actualiza la contraseña existente por la nueva contraseña ingresada. 
$actualizar = "UPDATE usuario SET usuContraseña=md5('$usuContraseñaNueva') WHERE usuCodigo='$usuCodigo'";
$resultado = mysqli_query($conexion, $actualizar);  
}


// envia el mensaje de confirmacion o error del cambio de la contraseña
if ($resultado) {
      echo "<script>alert('Se ha cambiado la contraseña correctamente.');window.location='cuenta-bodeguero.php';</script>";
    

}else {
      echo "<script>alert('No se pudo actualizar la contraseña.');
           window.history.go(-1);  
    </script>";
}



?>