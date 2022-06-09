<?php
 $conexion = mysqli_connect("localhost", "id18967970_root", "Software_LCM_2022", "id18967970_papeleria_paris");
mysqli_set_charset($conexion, "utf8");
// Obtener codigo de la compra
$compCodigo = $_GET['compCodigo'];
// Consulta para eliminar la compa
$eliminar = "DELETE from compras WHERE compCodigo='$compCodigo' ";

$resultado=mysqli_query($conexion, $eliminar);
// Mensajes de error y de confirmacion para eliminar una compra
if($resultado) {
    header("location: consultar_comp.php");
    
}else {
    echo "<script>alert('No se pudo eliminar la compra.');
           window.history.go(-1);  
    </script>"; 
}
