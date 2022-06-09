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
<?php
// Validacion de campos
$campos = array();
if (isset($_POST['submit'])) {
  if (empty($provNombre)) {
    array_push($campos, "<p class='error'>*Agrega el nombre del proveedor</p>");
  }
  if (strlen($provNombre) > 45) {
    array_push($campos, "<p class='error'>*El nombre del proveedor es muy largo</p>");
  }
  if (is_numeric($provNombre) && preg_match("/[0-9]/", $provNombre)) {
    array_push($campos, "<p class='error'>*El nombre del proveedor no puede contener numeros</p>");
  }
  if (empty($provApellido)) {
    array_push($campos, "<p class='error'>*Agrega el apellido del proveedor</p>");
  }
  if (strlen($provApellido) > 45) {
    array_push($campos, "<p class='error'>*El apellido del proveedor es muy largo</p>");
  }
  if (is_numeric($provApellido) && preg_match("/[0-9]/", $provApellido)) {
    array_push($campos, "<p class='error'>*El apellido del proveedor no puede contener numeros</p>");
  }
  if (empty($provTelefono)) {
    array_push($campos, "<p class='error'>*Agrega el telefono del proveedor</p>");
  }
  if (strlen($provTelefono) > 10) {
    array_push($campos, "<p class='error'>*El telefono del proveedor es muy largo</p>");
  }
  if (!is_numeric($provTelefono) && !preg_match("/[0-9]/", $provTelefono)) {
    array_push($campos, "<p class='error'>*El telefono del proveedor no puede contener letras</p>");
  }
  if (empty($provCorreo)) {
    array_push($campos, "<p class='error'>*Agrega el correo del proveedor </p>");
  }
  if (!filter_var($provCorreo, FILTER_VALIDATE_EMAIL)) {
    array_push($campos, "<p class='error'>*La cuenta de correo no es valida </p>");
  }
  if (empty($provEmpresa)) {
    array_push($campos, "<p class='error'>*Agrega el nombre de la empresa del proveedor</p>");
  }
  if (strlen($provEmpresa) > 45) {
    array_push($campos, "<p class='error'>*El nombre de la empresa es muy larga</p>");
  }
  //Valida la cantdad de campos que cuenten con informacion valida
  if (count($campos) > 0) {
      // Si se encuentra un campo no permitido muestra el mensaje de error.
    echo "<script>
            Swal.fire({
              icon: 'error',
              title: 'Opss...!',
              text: 'No se ha registrado el proveedor.',  
              })
             
    </script>";
    for ($i = 0; $i < count($campos); $i++) {
      echo $campos[$i];
    }
  } else {
      // se realiza la conexion a la base de datos si todos los datos ingresados son validos. 
    $conexion = mysqli_connect("localhost", "id18967970_root", "Software_LCM_2022", "id18967970_papeleria_paris");
    // crea el proveedor
    $insert = "insert into proveedores(provNombre, provApellido,provTelefono,provCorreo, provEmpresa) values ('$_REQUEST[provNombre] ',' $_REQUEST[provApellido] ', '$_REQUEST[provTelefono]',' $_REQUEST[provCorreo]',' $_REQUEST[provEmpresa]')";
    $resultado = mysqli_query($conexion, $insert);
    // Muestra mensaje de confirmacion del registro del proveedor.
    echo "<script>
            Swal.fire({
              icon: 'success',
              title: 'Exitoso...!',
              text: 'Se ha registrado el proveedor.',  
              })
             
    </script>";
  }
}

?>