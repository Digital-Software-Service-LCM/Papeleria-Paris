<?php
require_once "Venta-Data.php";
session_start();

$carrito = $_SESSION["carrito"];
$total = $_SESSION["total"];

$d = new Data();
if ($total != 0){
$d->crearVenta($carrito, $total);

// remover el carrito de compra
unset($_SESSION["carrito"]);
// remover el total
unset($_SESSION["total"]);
// redirigir hacia venta index
echo "<script>alert('Se ha registrado correctamente la venta.');window.location='Venta-index.php';</script>";
}else{
    echo "<script>alert('No se pudo registrar la venta. Ingrese un producto');
    window.history.go(-1);  
</script>"; 
}
?>