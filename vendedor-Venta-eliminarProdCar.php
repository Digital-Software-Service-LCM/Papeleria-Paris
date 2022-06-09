<?php
$index = $_GET["in"];
session_start();

// Eliminar productos de la venta 
if(isset($_SESSION["carrito"])){
    $carrito = $_SESSION["carrito"];
    unset($carrito[$index]);
    $carrito = array_values($carrito);

    $_SESSION["carrito"] = $carrito;

    if(count($carrito) == -1){
        session_unset($carrito);
    }
}

header("location: vendedor-Venta-index.php");
?>
