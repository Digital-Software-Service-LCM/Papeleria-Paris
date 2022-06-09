<?php
require_once "Venta-Conexion.php";
require_once "Venta-Producto.php";
require_once "Venta-venta.php";
require_once "Venta-Detalle.php";

class Data{
    private $con;

    public function __construct(){
        $this->con = new Conexion("id18967970_papeleria_paris");
    }
// obtener productos para la opcion venta
    public function getProductos(){
        $productos = array();

        $query = "SELECT * FROM getProductos";

        $this->con->conectar();
        $rs = $this->con->ejecutar($query);

        while($reg = $rs->fetch_array()){
            $p = new Producto();

            $p->id = $reg[0];
            $p->nombre = $reg[1];
            $p->precio = $reg[2];
            $p->stock = $reg[3];

            array_push($productos, $p);
        }

        $this->con->desconectar();

        return $productos;
    }
// traer venta
    public function getVentas(){
        $ventas = array();

        $query = "SELECT * FROM getVentas";

        $this->con->conectar();
        $rs = $this->con->ejecutar($query);

        while($reg = $rs->fetch_array()){
            $v = new Venta();

            $v->id = $reg[0];
            $v->fecha = $reg[1];
            $v->total = $reg[2];

            array_push($ventas, $v);
        }
        $this->con->desconectar();


        return $ventas;
    }
// traer detalle de la venta 
    public function getDetalles($idVenta){
        $query = "CALL getDetalles($idVenta)";

        $detalles = array();
        
        $this->con->conectar();
        $rs = $this->con->ejecutar($query);
        while($reg = $rs->fetch_array()){
            $d = new Detalle();

            $d->id = $reg[0];
            $d->nomProducto = $reg[1];
            $d->Cantidad = $reg[2];
            $d->subTotal = $reg[3];
            $d->precio = $reg[4];

            array_push($detalles, $d);
        }

        $this->con->desconectar();

        return $detalles;
    }
// crear venta
    public function crearVenta($listaProductos, $total){
        $query = "CALL crearVenta($total)";

        $this->con->conectar();
        $this->con->ejecutar($query);

        foreach ($listaProductos as $p) {
            /*
            En el procedimiento crearDetalle, se crea el detalle en la tabla
            intermedia, y además se actualiza el stock en la tabla producto
            */
            $query = "CALL crearDetalle($p->id, $p->Cantidad, $p->subTotal)";

            $this->con->ejecutar($query);
        }
        $this->con->desconectar();
    }
}
?>
