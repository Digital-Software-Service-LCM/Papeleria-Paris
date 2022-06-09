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
        <!--Opciones del menu del vendedor-->
    <div class="container">
    <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fa-solid fa-bars"></i>
            </label>
        <div class="logo">
          <a href="vendedor_principal.php"><img src="img/logo.png" class="imagen"></a>
        </div>
        <nav class="menu" style="z-index: 200;">
          <ul>
            
            <li><a href="#">Producto <i class="icon-abajo2"></i></a>
              <ul class="submenu">
                <li><a href="vendedor_consultar_prod.php">
                    Consultar
                  </a></li>
              </ul>
            </li>
            <li><a href="vendedor-Venta-index.php">Ventas <i class="icon-abajo2"></i></a>
              <ul class="submenu">
                <li><a href="vendedor-Venta-ventas.php">
                    Consultar
                  </a></li>
              </ul>
              </li>
              <li><a href="cuenta-vendedor.php"><i style="padding: 16px;" class="fa-solid fa-user-large"></i></a>
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