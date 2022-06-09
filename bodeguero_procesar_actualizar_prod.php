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
$prodCodigo = $_POST['prodCodigo'];
$prodNombre = $_POST['prodNombre'];
$prodPrecioVenta = $_POST['prodPrecioVenta'];
$prodCantidad = $_POST['prodCantidad'];
$prodProvCodigo = $_POST['prodProvCodigo'];
//actualiza los datos del producto segun los cambios registrados en el formulario.
$actualizar = "UPDATE producto SET prodNombre='$prodNombre', prodPrecioVenta='$prodPrecioVenta', prodCantidad='$prodCantidad', prodProvCodigo='$prodProvCodigo' WHERE prodCodigo='$prodCodigo'";

$resultado = mysqli_query($conexion, $actualizar);

// manda un mensaje de confirmacion o error de la actualizacion del producto.
if ($resultado) {
      echo "<script>alert('Se ha actualizado el producto correctamente.');window.location='bodeguero_consultar_prod.php';</script>";
} else {
      echo "<script>alert('No se pudieron actualizar los datos.');
           window.history.go(-1);  
    </script>";
}
?>