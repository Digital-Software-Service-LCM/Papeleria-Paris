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
  if (empty($prodNombre)) {
    array_push($campos, "<p class='error'>*Agrega el nombre del producto</p>");
  }
  if (strlen($prodNombre) >= 45) {
    array_push($campos, "<p class='error'>*El nombre del producto es muy largo</p>");
  }
  if (empty($prodPrecioVenta)) {
    array_push($campos, "<p class='error'>*Agrega el precio de venta del producto</p>");
  }
  if (!is_numeric($prodPrecioVenta) && !preg_match("/[0-9]/", $prodPrecioVenta)) {
    array_push($campos, "<p class='error'>*El precio de venta del producto no puede contener letras</p>");
  }
  if (empty($prodCantidad)) {
    array_push($campos, "<p class='error'>*Agrega la cantidad del producto</p>");
  }
  if (!is_numeric($prodCantidad) && !preg_match("/[0-9]/", $prodCantidad)) {
    array_push($campos, "<p class='error'>*La cantidad del producto no puede contener letras</p>");
  }
  // Cuenta que todos los campos se hayan ingresados de acuerdo a las validaciones
  if (count($campos) > 0) {
      // envia el mensaje de error en caso de que no se haya cumplido con alguna de las validaciones realizadas
    echo "<script>
            Swal.fire({
              icon: 'error',
              title: 'Opss...!',
              text: 'No se ha registrado el producto.',  
              })
             
    </script>";
    for ($i = 0; $i < count($campos); $i++) {
      echo $campos[$i];
    }
  } else {
      // si los datos ingresados son correctos se realiza la conexion con la base de datos 
    $conexion = mysqli_connect("localhost", "id18967970_root", "Software_LCM_2022", "id18967970_papeleria_paris");
    // Crea producto
    $insert = "insert into producto(prodNombre,prodPrecioVenta,prodCantidad, prodProvCodigo) values('$_REQUEST[prodNombre]', '$_REQUEST[prodPrecioVenta]', '$_REQUEST[prodCantidad]', '$_REQUEST[prodProvCodigo]')";
    $resultado = mysqli_query($conexion, $insert);
    // Muestra mensaje de confirmacion
    echo "<script>
            Swal.fire({
              icon: 'success',
              title: 'Exitoso...!',
              text: 'Se ha registrado el producto.',  
              })
             
    </script>";
  }
}

?>