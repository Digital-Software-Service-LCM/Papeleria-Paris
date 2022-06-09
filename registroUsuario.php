<!DOCTYPE html>
<html>

<head>
  
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <title></title>
</head>

<body>

</body>
<style type="text/css">
  .error {
    color: red;
  }
</style>

</html>
<!--Validacion de los campos-->
<?php
$campos = array();

if (isset($_POST['submit'])) {
  $usuContraseña=password_hash($usuContraseña, PASSWORD_DEFAULT);
  if (empty($usuRol)) {
    array_push($campos, "<p class='error'>*Selecciona tu rol</p>");
  }
  if (empty($usuNombre)) {
    array_push($campos, "<p class='error'>*Agrega el nombre del usuario</p>");
  }
  if (strlen($usuNombre) > 60) {
    array_push($campos, "<p class='error'>*El nombre del usuario es muy largo</p>");
  }
  if (is_numeric($usuNombre) && preg_match("/[0-9]/", $usuNombre)) {
    array_push($campos, "<p class='error'>*El nombre del usuario no puede contener numeros</p>");
  }if (empty($usuCedula)) {
    array_push($campos, "<p class='error'>*Agrega la cedula del proveedor</p>");
  }
  if (strlen($usuCedula) > 10) {
    array_push($campos, "<p class='error'>*La cedula del usuario es muy larga</p>");
  }
  if (!is_numeric($usuCedula) && !preg_match("/[0-9]/", $usuCedula)) {
    array_push($campos, "<p class='error'>*La cedula del usuario no puede contener letras</p>");
  }
  if (empty($usuTelefono)) {
    array_push($campos, "<p class='error'>*Agrega el telefono del usuario</p>");
  }
  if (strlen($usuTelefono) > 10) {
    array_push($campos, "<p class='error'>*El telefono del usuario es muy largo</p>");
  }
  if (!is_numeric($usuTelefono) && !preg_match("/[0-9]/", $usuTelefono)) {
    array_push($campos, "<p class='error'>*El telefono del usuario no puede contener letras</p>");
  }
  if (empty($usuContraseña)) {
    array_push($campos, "<p class='error'>*Agrega tu contraseña</p>");
  }
  if (strlen($usuContraseña) < 8) {
    array_push($campos, "<p class='error'>*La contraseña debe tener mas de 8 digitos</p>");
  }
  // se cuenta los campos que tienen entradas invalidas
  if (count($campos) > 0) {
      // se muestra el mensaje de error al haber un campo que no cumple con las validaciones. 
    echo "<script>
            Swal.fire({
              icon: 'error',
              title: 'Opss...!',
              text: 'No se ha registrado el usuario.',  
              })
             
    </script>";
    for ($i = 0; $i < count($campos); $i++) {
      echo $campos[$i];
    }
  } else {
    //   Registra el usuario 
    $conexion = mysqli_connect("localhost", "id18967970_root", "Software_LCM_2022", "id18967970_papeleria_paris");
    $insert = "insert into usuario(usuRol, usuNombre, usuCedula, usuTelefono, usuCorreo, usuContraseña, usuEstado)values('$_REQUEST[usuRol]', '$_REQUEST[usuNombre]', '$_REQUEST[usuCedula]', '$_REQUEST[usuTelefono]', '$_REQUEST[usuCorreo]', md5('$_REQUEST[usuContraseña]'), '$_REQUEST[usuEstado]')";
    $resultado = mysqli_query($conexion, $insert);
    // muestre el mensaje de confirmacion. 
    echo "<script>
            Swal.fire({
              icon: 'success',
              title: 'Exitoso...!',
              text: 'Se ha registrado el usuario.',  
              })
             
    </script>";
  }
}








/*$usuRol =$_POST['usuRol'];
$usuUsername =$_POST['usuUsername'];
$usuContraseña =$_POST['usuContraseña'];

/*
echo "Papeleria Paris " ."<br>" ."Codigo: $usuRol"."<br>" ."Nombre: $usuUsername"."<br>" ."usuUsername: $usuContraseña";*/
?>