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
        <!--Menu con las opciones del administrador -->
    <div class="container">
    <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fa-solid fa-bars"></i>
            </label>
        <div class="logo">
          <a href="principal.php"><img src="img/logo.png" class="imagen"></a>
        </div>

        <nav class="menu" style="z-index: 200;">
        
          <ul>
            
            <li><a href="producto.php">Producto <i class="icon-abajo2"></i></a>
              <ul class="submenu">
                <li><a href="consultar_prod.php">
                    Consultar
                  </a></li>
              </ul>
            </li>
            <li><a href="proveedor.php">Proveedor <i class="icon-abajo2"></i></a>
              <ul class="submenu">
                <li><a href="consultar_prov.php">
                    Consultar
                  </a></li>
              </ul>
            </li>
            <li><a href="compras.php">Compras <i class="icon-abajo2"></i></a>
              <ul class="submenu">
                <li><a href="consultar_comp.php">
                    Consultar
                  </a></li>
              </ul>
            </li>
            <li><a href="Venta-index.php">Ventas <i class="icon-abajo2"></i></a>
              <ul class="submenu">
                <li><a href="Venta-ventas.php">
                    Consultar
                  </a></li>
              </ul>
              </li>
              <li><a href="cuenta-administrador.php"><i style="padding: 16px;" class="fa-solid fa-user-large"></i></a>
              <ul class="submenu">
                <li><a href="consultar_usuarios.php">
                    Usuarios
                  </a>
                  
                  <a href="logout.php">
                    Cerrar Sesión
                  </a>
                </li>
              </ul>
              
              </li>
</ul>

        </nav>
      </div>
    </header>

    <body>
    </body></html>