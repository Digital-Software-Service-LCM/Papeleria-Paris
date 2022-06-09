<?php
// Agregar productos al listado de la venta
require_once "Venta-Data.php";

$p = new Producto();

$p->Cantidad = $_POST["txtCantidad"];

if($p->Cantidad > 0){
    $p->id = $_POST["txtId"];
    $p->nombre = $_POST["txtnombre"];
    $p->precio = $_POST["txtPrecio"];
    $p->stock = $_POST["txtStock"];
    $p->subTotal = $p->precio * $p->Cantidad;

    $d = new Data();
    
    // valida el stock
session_start();
    if(isset($_SESSION["carrito"])){
        $carrito = $_SESSION["carrito"];
    }else{
        $carrito = array();
    }

    $sumaCantidades = 0;
    foreach ($carrito as $pro) {
        if($pro->id == $p->id){
            $sumaCantidades += $pro->Cantidad;
        }
    }

    $sumaCantidades += $p->Cantidad;

    if($p->stock >= $sumaCantidades){
        // da paso a la realizacion de la venta 
        array_push($carrito, $p);
        $_SESSION["carrito"] = $carrito;
        header("location: vendedor-Venta-index.php");
    }else{
        // accion en caso de que no haya stock
        header("location: vendedor-Venta-index.php?m=1");
    }
}else{
    header("location: vendedor-Venta-index.php?m=2");
}

?>
