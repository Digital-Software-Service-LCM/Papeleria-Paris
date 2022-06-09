<?php
// agrega la informacion del producto con la cantidad a comprar a la tabla
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
        // hay stock
        array_push($carrito, $p);
        $_SESSION["carrito"] = $carrito;
        header("location: Venta-index.php");
    }else{
        // no hay stock
        header("location: Venta-index.php?m=1");
    }
}else{
    header("location: Venta-index.php?m=2");
}

?>
