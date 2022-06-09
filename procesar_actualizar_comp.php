<?php
 $conexion = mysqli_connect("localhost", "id18967970_root", "Software_LCM_2022", "id18967970_papeleria_paris");
mysqli_set_charset($conexion, "utf8");
$compCodigo = $_POST['compCodigo'];
$compFecha = $_POST['compFecha'];
$compCodigoProducto = $_POST['compCodigoProducto'];
$compCantidad = $_POST['compCantidad'];
$compPrecio = $_POST['compPrecio'];
// $compTotal = $_POST['compTotal'];
$compTotal = $compCantidad * $compPrecio;

// Cosulta para actualizar las compras
$actualizar = "UPDATE compras SET compFecha='$compFecha', compCodigoProducto='$compCodigoProducto', compCantidad='$compCantidad', compPrecio='$compPrecio', compTotal='$compTotal' WHERE compCodigo='$compCodigo'";

$resultado=mysqli_query($conexion, $actualizar);

// Mensajes de error y de confirmacion
if($resultado) {
echo "<script>alert('Se ha actualizado la compra correctamente.');window.location='consultar_comp.php';</script>";

}else {
echo "<script>alert('No se pudieron actualizar los datos.');
     window.history.go(-1);  
</script>"; 
}
