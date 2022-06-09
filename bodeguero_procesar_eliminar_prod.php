<?php
 $conexion = mysqli_connect("localhost", "id18967970_root", "Software_LCM_2022", "id18967970_papeleria_paris");
mysqli_set_charset($conexion, "utf8");

// elimina el prodiucto segun el codigo
$prodCodigo = $_GET['prodCodigo'];
$eliminar = "DELETE from producto WHERE prodCodigo='$prodCodigo' ";

$resultado=mysqli_query($conexion, $eliminar);
//envia el mensaje de error en caso de fallo o redirecciona nuevamente a la pagina de consulta para su verificacion.
if($resultado) {
    header("location: bodeguero_consultar_prod.php");
    
}else {
    echo "<script>alert('No se pudo eliminar el producto.');
           window.history.go(-1);  
    </script>"; 
}
