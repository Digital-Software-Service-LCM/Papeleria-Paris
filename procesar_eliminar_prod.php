<?php
 $conexion = mysqli_connect("localhost", "id18967970_root", "Software_LCM_2022", "id18967970_papeleria_paris");
mysqli_set_charset($conexion, "utf8");
//Trae el codigo del producto
$prodCodigo = $_GET['prodCodigo'];
//Consulta para eliminar el producto    
$eliminar = "DELETE from producto WHERE prodCodigo='$prodCodigo' ";

$resultado=mysqli_query($conexion, $eliminar);
//Mensajes de error o de confirmacion para la eliminacion de un producto
if($resultado) {
    header("location: consultar_prod.php");
    
}else {
    echo "<script>alert('No se pudo eliminar el producto.');
           window.history.go(-1);  
    </script>"; 
}
