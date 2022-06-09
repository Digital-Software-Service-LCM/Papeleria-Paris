<!DOCTYPE html>
    <html>

    <head>
      
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" href="./img/logo-icon.png" type="image/png" />
      <script src="https://kit.fontawesome.com/d7bddb5771.js" crossorigin="anonymous"></script>
      <title>Inicio</title>
      <!-- <link rel="stylesheet" type="text/css" href="css/venta-style.css"> -->
      <link rel="stylesheet" type="text/css" href="css/estilos.css">
    </head>
    <header class="header" style="z-index: 200; ">
        <!--Menu con las opciones del bodeguero-->
    <div class="container">
    <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fa-solid fa-bars"></i>
            </label>
        <div class="logo">
          <a href="bodeguero_principal.php"><img src="img/logo.png" class="imagen"></a>
        </div>
        <nav class="menu" style="z-index: 200;">
          <ul>
            
            <li><a href="bodeguero_producto.php">Producto <i class="icon-abajo2"></i></a>
              <ul class="submenu">
                <li><a href="bodeguero_consultar_prod.php">
                    Consultar
                  </a></li>
              </ul>
            </li>
            <li><a href="#">Proveedor <i class="icon-abajo2"></i></a>
              <ul class="submenu">
                <li><a href="bodeguero_consultar_prov.php">
                    Consultar
                  </a></li>
              </ul>
            </li>
            <li><a href="bodeguero_compras.php">Compras <i class="icon-abajo2"></i></a>
            </li>
              <li><a href="cuenta-bodeguero.php"><i style="padding: 16px;" class="fa-solid fa-user-large"></i></a>
              <ul class="submenu">
                <li>
                  
                  <a href="logout.php">
                    Cerrar Sesión
                  </a>
                </li>
              </ul>
              
              </li>
        </nav>
      </div>
    </header>

    <body>
    </body></html>