<?php
 $conexion = mysqli_connect("localhost", "id18967970_root", "Software_LCM_2022", "id18967970_papeleria_paris");
mysqli_set_charset($conexion, "utf8");
// Trae el codigo del usuario
$usuCodigo = $_GET['usuCodigo'];
// Actualiza el estado del usuario a inactivo
$inactivar = "UPDATE usuario SET usuEstado='inactivo' WHERE usuCodigo='$usuCodigo'";

$resultado=mysqli_query($conexion, $inactivar);
// Mensaje de error o confirmacion para inactivar un usuario
if($resultado) {
    header("location: consultar_usuarios.php");
    
}else {
    echo "<script>alert('No se pudo inactivar el usuario.');
           window.history.go(-1);  
    </script>"; 
}
