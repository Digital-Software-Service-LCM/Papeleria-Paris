<?php
// creacion clase de productos
class Producto{
    public $id;
    public $nombre;
    public $precio;
    public $stock;
    public $Cantidad;
    public $subTotal;/*precio * Cantidad*/
    public function __toString(){
        return $this->id."-".$this->nombre."-".$this->precio.
        "-".$this->stock."-".$this->Cantidad."-".$this->subTotal;
    }
}
?>
