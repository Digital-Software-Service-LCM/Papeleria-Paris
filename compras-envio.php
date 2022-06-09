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
// valida los datos permitidos a ingresar por cada campo. 
$campos = array();
if (isset($_POST['submit'])) {
  if (empty($compFecha)) {
    array_push($campos, "<p class='error'>*Selecciona una fecha</p>");
  }
  if (empty($compCodigoProducto)) {
    array_push($campos, "<p class='error'>*Agrega el codigo del producto</p>");
  }
  if (!is_numeric($compCodigoProducto) && !preg_match("/[0-9]/", $compCodigoProducto)) {
    array_push($campos, "<p class='error'>*El codigo del producto no puede contener letras</p>");
  }
  if (empty($compCantidad)) {
    array_push($campos, "<p class='error'>*Agrega la cantidad</p>");
  }
  if (!is_numeric($compCantidad) && !preg_match("/[0-9]/", $compCantidad)) {
    array_push($campos, "<p class='error'>*La cantidad no puede contener letras</p>");
  }
  if (!is_numeric($compPrecio) && !preg_match("/[0-9]/", $compPrecio)) {
    array_push($campos, "<p class='error'>*El precio no puede contener letras</p>");
  }
  // si no se cumple con todas las validaciones se envia un mensaje de error
  if (count($campos) > 0) {
    echo "<script>
            Swal.fire({
              icon: 'error',
              title: 'Opss...!',
              text: 'No se ha registrado la compra.',  
              })
             
    </script>";
    for ($i = 0; $i < count($campos); $i++) {
      echo $campos[$i];
    }
  } else {
      // De cumplirse las condiciones se realiza la conexion y se envia el mesa de exito creando el registro.
    $conexion = mysqli_connect("localhost", "id18967970_root", "Software_LCM_2022", "id18967970_papeleria_paris");
    $compTotal = $compCantidad * $compPrecio;
    $insert = "insert into compras(compFecha, compCodigoProducto, compCantidad, compPrecio, compTotal)values('$_REQUEST[compFecha]','$_REQUEST[compCodigoProducto]', '$_REQUEST[compCantidad]', '$_REQUEST[compPrecio]', '$compTotal')";
    $resultado = mysqli_query($conexion, $insert);
    echo "<script>
            Swal.fire({
              icon: 'success',
              title: 'Exitoso...!',
              text: 'Se ha registrado la compra.',  
              })
             
    </script>";

// se actualiza la cantidad vendida con la disponible para el manejo del stock. 
      $update = "update producto set prodCantidad = prodCantidad + $compCantidad where prodCodigo = $compCodigoProducto";



      $resultado1 = mysqli_query($conexion, $update);
    // }
  }
}


?>