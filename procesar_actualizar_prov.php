<?php
 $conexion = mysqli_connect("localhost", "id18967970_root", "Software_LCM_2022", "id18967970_papeleria_paris");
mysqli_set_charset($conexion, "utf8");
      $provCodigo = $_POST['provCodigo'];
      $provNombre = $_POST['provNombre'];
      $provApellido = $_POST['provApellido'];
      $provTelefono = $_POST['provTelefono'];
      $provCorreo = $_POST['provCorreo'];
      $provEmpresa = $_POST['provEmpresa'];
// Consulta para actualizar los proveedores
$actualizar = "UPDATE proveedores SET provNombre='$provNombre', provApellido='$provApellido', provTelefono='$provTelefono', provCorreo='$provCorreo', provEmpresa='$provEmpresa' WHERE provCodigo='$provCodigo'";

$resultado=mysqli_query($conexion, $actualizar);

// Mensajes de error y confirmacion para la actualizacion del proveedor
if($resultado) {
    echo "<script>alert('Se ha actualizado el proveedor correctamente.');window.location='consultar_prov.php';</script>";
    
}else {
    echo "<script>alert('No se pudieron actualizar los datos.');
           window.history.go(-1);  
    </script>"; 
}
