<!DOCTYPE html>

<html>

<head>
    <title>Ventas</title>
</head>
<body>
    <!--Encabezado tabla con los productos para vender-->
    <div class="venta">
        <div align="center"><i class="fa-regular fa-credit-card" style="font-size: 80px;"></i></div>
        <h1>VENTAS</h1>
        <table border='1'>
            <tr>
                <th>Codigo</th>
                <th>Nombre Producto</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Añadir a venta</th>
            </tr>
            <!--Tabla con los productos para vender-->
            <?php
            require_once "Venta-Data.php";

            $d = new Data();

            $productos = $d->getProductos();

            foreach ($productos as $p) {
                echo "<tr>";
                echo "<td>" . $p->id . "</td>";
                echo "<td>" . $p->nombre . "</td>";
                echo "<td>$" . $p->precio . "</td>";
                echo "<td>" . $p->stock . "</td>";
                echo "<td>";
                echo "<form action='Venta-agregar.php' method='post'>";
                echo "<input type='hidden' name='txtId' value='" . $p->id . "'>";
                echo "<input type='hidden' name='txtnombre' value='" . $p->nombre . "'>";
                echo "<input type='hidden' name='txtPrecio' value='" . $p->precio . "'>";
                echo "<input type='hidden' name='txtStock' value='" . $p->stock . "'>";
                echo "<input type='number' name='txtCantidad' placeholder='Cantidad a Vender' required='required'>";
                echo "<input id='boton' type='submit' name='btnAnadir' value='Añadir'>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
            ?>
        </table>
        <!--Mensajes de error-->
        <?php
        if (isset($_GET["m"])) {
            $m = $_GET["m"];

            switch ($m) {
                case "1":
                    echo "<br>* No hay suficientes unidades en stock de este producto.";
                    break;
                case "2":
                    echo "* La cantidad no puede ser un número negativo";
                    break;
            }
        }
        ?>
        <!--Tabla que muestra los productos que se agregan a la venta-->
        <?php
session_start();
        if (isset($_SESSION["carrito"])) {
            $carrito = $_SESSION["carrito"];


            echo "<h1>Listado de Venta</h1>";

            echo "<table border='1'>";
            echo "<tr>";
            echo "<th>Codigo</th>";
            echo "<th>Nombre Producto</th>";
            echo "<th>Precio</th>";
            echo "<th>Stock</th>";
            echo "<th>Cantidad</th>";
            echo "<th>SubTotal</th>";
            echo "<th>Acción</th>";
            echo "</tr>";

            $total = 0;
            $i = 0;
            foreach ($carrito as $p) {
                echo "<tr>";
                echo "<td>" . $p->id . "</td>";
                echo "<td>" . $p->nombre . "</td>";
                echo "<td>$" . $p->precio . "</td>";
                echo "<td>" . $p->stock . "</td>";
                echo "<td>" . $p->Cantidad . "</td>";
                echo "<td>$" . $p->subTotal . "</td>";
                echo "<td>";
                echo "<a href='Venta-eliminarProdCar.php?in=$i'><i class='fa-solid fa-trash-can' id='icono'></a>";
                echo "</td>";
                $total += $p->subTotal;
                $i++;
                echo "</tr>";
            }
            echo "<tr>";
            echo "<td colspan='5'><b>Total:</b></td>";
            echo "<td colspan='2'><b>$$total</b></td>";
            $_SESSION["total"] = $total;
            echo "</tr>";

            echo "<tr>";
            echo "<td colspan='7'>";
            echo "<form action='Venta-generarVenta.php' method='post'>";
            echo "<input type='submit' name='submit' id='boton1' value='Comprar'>";
            echo "</form>";
            echo "</td>";
            echo "</tr>";
            echo "</table>";
        }
        ?>
    </div>
    <?php
    include("menu-admin.php");
    include("footer.php");
    ?>
    <!--control sesiones administrador-->
    <?php

    if(!isset($_SESSION['usuRol'])){
        header('location: index.php');
    }else{
        if($_SESSION['usuRol'] != 'administrador'){
            header('location: index.php');
        }
    } 


?>
    <style>
        body {
            background-image: url(img/fondo.jpg);
        }

        h1 {
            color: #474544;
            font-size: 35px;
            letter-spacing: 7px;
            text-align: center;
        }

        .venta {
            background: #FFB4A7;
            padding: 5%;
            width: 50%;
            height: auto;
            margin: auto;
            margin-top: 200px;


        }

        table {
            width: 100%;
            margin: 0px;
            height: 50%;
            /* margin-bottom: 100px; */
        }

        table tr {
            height: 30px;
            margin: 0px;
            padding: 0px;
        }

        td {
            height: 1px;
            margin: 0px;
            padding: 0px;
        }

        input {
            background: #FFB4A7;
            border: none;
            height: 30px;
            width: 68%
                /* margin-left: 50px; */
        }

        #boton {
            border-left: 1px solid grey;
            width: 30%;
            float: right;
        }

        #boton1 {
            width: 100%;
        }

        #icono {
            margin-left: 40%;
            color: black;
            text-decoraTION: NONE;
        }
    </style>
</body>

</html>