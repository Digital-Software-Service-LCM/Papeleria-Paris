<?php
 $conexion = mysqli_connect("localhost", "id18967970_root", "Software_LCM_2022", "id18967970_papeleria_paris");
mysqli_set_charset($conexion, "utf8");
//Trae el codigo del proveedor
$provCodigo = $_GET['provCodigo'];
//Consulta para eliminar el proveedo
$eliminar = "DELETE from proveedores WHERE provCodigo='$provCodigo' ";

$resultado=mysqli_query($conexion, $eliminar);
//Mensajes de error y confirmacion
if($resultado) {
    header("location: consultar_prov.php");
    
}else {
    echo "<script>alert('No se pudo eliminar el proveedor.');
           window.history.go(-1);  
    </script>"; 
}
