<?php
// Control de sesiones vendedor 
    session_start();

    if(!isset($_SESSION['usuRol'])){
        header('location: index.php');
    }else{
        if($_SESSION['usuRol'] != 'vendedor'){
            header('location: index.php');
        }
    } 


?>
<!DOCTYPE html>
    <html>

    <head>
      
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="shortcut icon" href="./img/logo-icon.png" type="image/png" />
      <script src="https://kit.fontawesome.com/d7bddb5771.js" crossorigin="anonymous"></script>
      <title>Inicio</title>
      <link rel="stylesheet" type="text/css" href="css/venta-style.css">
      <link rel="stylesheet" type="text/css" href="css/estilos.css">
    </head>
    <header class="header" style="z-index: 200; ">
    <?php
      include("menu-vendedor.php");
    ?>
      
    </header>

    <body>
<!--Opciones que tiene el usuario para realizar en el sistema-->
      <div class="formulario-venta" style="width: 80%; margin-top: 25%;">
        <h1 id="titulo-principal" style="font-size: 50px; font-family: serif; margin-top: -2%;">Bienvenido a la Papeleria Paris</h1>
        <div id="scene" style="margin-top: 25%;">
          <div id="left-zone">
            <ul class="list">
              <li class="item">
                <input type="radio" id="radio_Productos" name="basic_carousel" value="Productos" checked="checked" />
                <label class="Prod" for="radio_Productos">Productos</label>
                <div class="content content_prod"><span class="picto"></span>
                  <a href="vendedor_consultar_prod.php">
                    <h1>Productos</h1>
                    </a>
                  <p> Consultar </p>
                </div>
              </li>
              
              <li class="item">
                <input type="radio" id="radio_Ventas" name="basic_carousel" value="Ventas" />
                <label class="Venta" for="radio_Ventas">Ventas</label>
                <div class="content content_venta"><span class="picto"></span>
                  <a href="vendedor-Venta-index.php">
                    <h1>Ventas</h1>
                  </a>
                  <p>Registrar <br> Consultar: <br> Generar Factura</p>
                </div>
              </li>
            </ul>
          </div>
          <div id="middle-border"></div>
          <div id="right-zone"></div>
        </div>
<!--Imagenes utilizadas en el carrousel-->

        <div class="slider" style="margin-top: 50%; margin-bottom:5%;">
          <div class="slide-track">



            <div class="slide">
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcStvlZZ8h4iFHYC7CRVPyYLxmhMsK3U4RSRpp-nYHE2lRPHoXBKv6PLR1H9xBtTfn_UobI&usqp=CAU" height="100" width="250" alt="" />
            </div>
            <div class="slide">
              <img src="https://www.letrasdeencuentro.es/regalos-para-lectores/images/boligrafos-pelikan.jpg" height="100" width="250" alt="" />
            </div>
            <div class="slide">
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTIzWxeAmPgetx0hJ2NB4QcOlHjG7o-fYBPMfvJ3L0PBU6e4jZa80XVccDOn2Rh-sINLs0&usqp=CAU" height="100" width="250" alt="" />
            </div>
            <div class="slide">
              <img src="http://alianzaestrategicasas.com/wp-content/uploads/2015/08/artesco.png" height="100" width="250" alt="" />
            </div>
            <div class="slide">
              <img src="http://alianzaestrategicasas.com/wp-content/uploads/2015/08/keeper.png" height="100" width="250" alt="" />
            </div>
            <div class="slide">
              <img src="https://wcpanpro.s3.amazonaws.com/Logo_de_Norma.png" height="100" width="250" alt="" />
            </div>
            <div class="slide">
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcStvlZZ8h4iFHYC7CRVPyYLxmhMsK3U4RSRpp-nYHE2lRPHoXBKv6PLR1H9xBtTfn_UobI&usqp=CAU" height="100" width="250" alt="" />
            </div>
            <div class="slide">
              <img src="https://www.letrasdeencuentro.es/regalos-para-lectores/images/boligrafos-pelikan.jpg" height="100" width="250" alt="" />
            </div>
            <div class="slide">
              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTIzWxeAmPgetx0hJ2NB4QcOlHjG7o-fYBPMfvJ3L0PBU6e4jZa80XVccDOn2Rh-sINLs0&usqp=CAU" height="100" width="250" alt="" />
            </div>
            <div class="slide">
              <img src="http://alianzaestrategicasas.com/wp-content/uploads/2015/08/artesco.png" height="100" width="250" alt="" />
            </div>
            <div class="slide">
              <img src="http://alianzaestrategicasas.com/wp-content/uploads/2015/08/keeper.png" height="100" width="250" alt="" />
            </div>
          </div>
        </div>

      </div>
      <?php
    include("vendedor_footer.php");
    ?>
    </body>
   
    <style type="text/css">
 body {
  align-items: center;
  background: #e3e3e3;
  display: flex;
  height: 100vh;
  justify-content: center;
}

@-webkit-keyframes scroll {
  0% {
    transform: translateX(0);
  }
  100% {
    transform: translateX(calc(-250px * 7));
  }
}

@keyframes scroll {
  0% {
    transform: translateX(0);
  }
  100% {
    transform: translateX(calc(-250px * 7));
  }
}
.slider {
  background: white;
  box-shadow: 0 10px 20px -5px rgba(0, 0, 0, 0.125);
  height: 100px;
  margin: auto;
  overflow: hidden;
  position: relative;
  width: 960px;
  
}

@media screen and (max-width: 1276px){
    .slider {
        width: 800px;
      }
}
@media screen and (max-width: 1236px){
    .slider {
        width: 800px;
      }
      #titulo-principal{
        color: #FFB4A7;
      }
}

@media screen and (max-width: 1096px){
    .slider {
        width: 500px;
      }
}

@media screen and (max-width: 780px){
    .slider {
        width: 400px;
        top: 5px;
      }
}

@media screen and (max-width: 564px){
    .slider {
        width: auto;
        top: 10px;
      }
}

.slider::before, .slider::after {
  background: linear-gradient(to right, white 0%, rgba(255, 255, 255, 0) 100%);
  content: "";
  height: 100px;
  position: absolute;
  width: 200px;
  z-index: 2;
}
.slider::after {
  right: 0;
  top: 0;
  transform: rotateZ(180deg);
}
.slider::before {
  left: 0;
  top: 0;
}
.slider .slide-track {
  -webkit-animation: scroll 40s linear infinite;
          animation: scroll 40s linear infinite;
  display: flex;
  width: calc(250px * 14);
}
.slider .slide {
  height: 100px;
  width: 250px;
}


@-webkit-keyframes slidein {
  0% {
    top: -400px;
    opacity: 0;
  }
  100% {
    opacity: 1;
    top: 0px;
  }
}
@keyframes slidein {
  0% {
    top: -400px;
    opacity: 0;
  }
  100% {
    opacity: 1;
    top: 0px;
  }
}
@-webkit-keyframes slideout {
  0% {
    top: 0;
    opacity: 1;
  }
  100% {
    top: -400px;
    opacity: 0;
  }
}
@keyframes slideout {
  0% {
    top: 0;
    opacity: 1;
  }
  100% {
    top: -400px;
    opacity: 0;
  }
}
body {
  background-image: url(img/fondo.jpg);
  font-family: "Tahoma";
  -moz-user-select: none;
  -webkit-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

body #scene {
  display: flex;
  align-items: center;
  justify-content: left;
  width: 1000px;
  height: 400px;
  position: absolute;
  top: 0;
  bottom: 0;
  left: 0;
  right: 0;
  margin: auto;
  background-color: #fff;
  box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
  overflow: hidden;
}
@media screen and (max-width: 1276px){
    body #scene {
      width: 800px;
      top: 20px;
      }
}

@media screen and (max-width: 1086px){
    body #scene {
      width: 600px;
      top: 30px;
      }
}

@media screen and (max-width: 778px){
    body #scene {
      width: 400px;
      top: 70px;
      }
}

@media screen and (max-width: 564px){
    body #scene {
        width: 350px;
      }
}

@media screen and (max-width: 472px){
    body #scene {
        width: 300px;
      }
}

body #scene #left-zone {
  background: #fff;
  height: 75%;
  flex-grow: 0;
  display: flex;
  width: 350px;
  align-items: center;
  justify-content: left;
}

@media screen and (max-width: 1086px){
  body #scene #left-zone {
      width: 250px;
      }
}

@media screen and (max-width: 778px){
  body #scene #left-zone {
      width: 100px;
      

      }      
}

@media screen and (max-width: 564px){
  body #scene #left-zone {
      width: 300px;

      }
    }

body #scene #left-zone .list {
  display: flex;
  list-style: none;
  align-content: stretch;
  flex-direction: column;
  flex-grow: 1;
  margin: 0;
  padding: 0;
}
body #scene #left-zone .list li.item input[type=radio] {
  display: none;
}
body #scene #left-zone .list li.item input[type=radio] ~ label {
  display: block;
  opacity: 0.5;
  height: 50px;
  text-align: center;
  line-height: 50px;
}
body #scene #left-zone .list li.item input[type=radio] ~ label:first-letter {
  text-transform: uppercase;
}
body #scene #left-zone .list li.item input[type=radio] ~ label:hover {
  opacity: 0.75;
  cursor: pointer;
}
body #scene #left-zone .list li.item input[type=radio] ~ label.Prod:before {
  content: " ";
  display: block;
  position: absolute;
  width: 50px;
  height: 50px;
  margin-left: 15px;
  background-image: url("https://static.thenounproject.com/png/1389929-200.png");
  background-position: center;
  background-size: 75% 75%;
  background-repeat: no-repeat;
}
body #scene #left-zone .list li.item input[type=radio] ~ label.Prov:before {
  content: " ";
  display: block;
  position: absolute;
  width: 50px;
  height: 50px;
  margin-left: 15px;
  background-image: url("https://thumbs.dreamstime.com/b/l%C3%ADnea-icono-de-la-ubicaci%C3%B3n-tienda-ejemplo-del-vector-perno-mapa-ingenio-mercado-aislado-en-blanco-con-estilo-esquema-los-gps-133083274.jpg");
  background-position: center;
  background-size: 75% 75%;
  background-repeat: no-repeat;
}
body #scene #left-zone .list li.item input[type=radio] ~ label.compra:before {
  content: " ";
  display: block;
  position: absolute;
  width: 50px;
  height: 50px;
  margin-left: 15px;
  background-image: url("https://static.vecteezy.com/system/resources/previews/002/205/815/large_2x/shopping-cart-icon-free-vector.jpg");
  background-position: center;
  background-size: 75% 75%;
  background-repeat: no-repeat;
}
body #scene #left-zone .list li.item input[type=radio] ~ label.Venta:before {
  content: " ";
  display: block;
  position: absolute;
  width: 50px;
  height: 50px;
  margin-left: 15px;
  background-image: url("https://static.vecteezy.com/system/resources/previews/004/568/635/non_2x/sale-line-icon-vector.jpg");
  background-position: center;
  background-size: 75% 75%;
  background-repeat: no-repeat;
}
body #scene #left-zone .list li.item input[type=radio] ~ .content {
  position: absolute;
  left: 350px;
  top: -400px;
  width: 650px;
  height: 400px;
  -webkit-animation-duration: 0.75s;
          animation-duration: 0.75s;
  -webkit-animation-name: slideout;
          animation-name: slideout;
  -webkit-animation-timing-function: ease-out;
          animation-timing-function: ease-out;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-direction: column;
}

@media screen and (max-width: 1276px){
  body #scene #left-zone .list li.item input[type=radio] ~ .content {
      width: 450px;
      }
}

@media screen and (max-width: 1086px){
  body #scene #left-zone .list li.item input[type=radio] ~ .content {
      width: 200px;
      }
}

@media screen and (max-width: 778px){
  body #scene #left-zone .list li.item input[type=radio] ~ .content {
      width: 30px;
      margin: 0 0 0 -350px;
      }

      body #scene #left-zone .list li.item input[type=radio] ~ .content p {
  color: white;
}

label.Prod{
  color: white;
} 

label.Prov {
  color: white;
} 

label.Venta {
  color: white;
} 

label.compra  {
  color: white;
} 

body #scene #left-zone .list li.item input[type=radio] ~ .content {
      width: 500px;
      }

}

@media screen and (max-width: 564px){

  body #scene #left-zone .list li.item input[type=radio] ~ .content {
      width: 30px;
      margin: 0 0 0 350px;
      }
  

label.Prod{
  color: grey;
} 

label.Prov {
  color: grey;
} 

label.Venta {
  color: grey;
} 

label.compra  {
  color: grey;
} 
}



body #scene #left-zone .list li.item input[type=radio] ~ .content.content_prod
 .picto {
  height: 100px;
  width: 100px;
  background-image: url("https://thumbs.dreamstime.com/b/caja-de-l%C3%A1piz-brillante-la-escuela-con-efectos-escritorio-relleno-tales-como-plumas-l%C3%A1pices-tijeras-regla-borlas-concepto-del-149890876.jpg");
  background-position: center;
  background-size: cover;
  background-repeat: no-repeat;
}
body #scene #left-zone .list li.item input[type=radio] ~ .content.content_prod
 h1 {
  color: #00BFFF;
}
body #scene #left-zone .list li.item input[type=radio] ~ .content.content_prov
 .picto {
  height: 100px;
  width: 100px;
  background-position: center;
  background-image: url("https://img.freepik.com/vector-gratis/hombre-lleva-caja-carton_1441-29.jpg");
  background-position: center;
  background-size: cover;
  background-repeat: no-repeat;
}
body #scene #left-zone .list li.item input[type=radio] ~ .content.content_prov
 h1 {
  color: #F5D76E;
}
body #scene #left-zone .list li.item input[type=radio] ~ .content.content_compra
 .picto {
  height: 100px;
  width: 100px;
  background-image: url("https://static.vecteezy.com/system/resources/thumbnails/002/299/042/small/a-set-of-office-and-school-stationery-items-in-the-shopping-cart-vector.jpg");
  background-position: center;
  background-size: cover;
  background-repeat: no-repeat;
}
body #scene #left-zone .list li.item input[type=radio] ~ .content.content_compra
 h1 {
  color: #D64541;
}
body #scene #left-zone .list li.item input[type=radio] ~ .content.content_venta .picto {
  height: 100px;
  width: 100px;
  background-image: url("https://thumbs.dreamstime.com/b/estacionamiento-aislado-en-la-caja-del-l%C3%A1piz-colecci%C3%B3n-recogida-de-material-escolar-y-oficina-pluma-regla-varias-formas-tijeras-165459175.jpg");
  background-position: center;
  background-size: cover;
  background-repeat: no-repeat;
}
body #scene #left-zone .list li.item input[type=radio] ~ .content.content_venta h1 {
  color: #F27935;
}
body #scene #left-zone .list li.item input[type=radio] ~ .content h1:first-letter {
  text-transform: uppercase;
}
body #scene #left-zone .list li.item input[type=radio] ~ .content p {
  max-width: 50%;
  text-align: center;
}
body #scene #left-zone .list li.item input[type=radio]:checked ~ label {
  opacity: 1;
  -webkit-animation: all 1s cubic-bezier(0.455, 0.03, 0.515, 0.955);
          animation: all 1s cubic-bezier(0.455, 0.03, 0.515, 0.955);
}
body #scene #left-zone .list li.item input[type=radio]:checked ~ label.Prod {
  color: #00BFFF;
  border-right: solid 4px #00BFFF;
}
body #scene #left-zone .list li.item input[type=radio]:checked ~ label.Prov {
  color: #F5D76E;
  border-right: solid 4px #F5D76E;
}
body #scene #left-zone .list li.item input[type=radio]:checked ~ label.compra {
  color: #D64541;
  border-right: solid 4px #D64541;
}
body #scene #left-zone .list li.item input[type=radio]:checked ~ label.Venta {
  color: #F27935;
  border-right: solid 4px #F27935;
}
body #scene #left-zone .list li.item input[type=radio]:checked ~ .content {
  -webkit-animation-duration: 0.75s;
          animation-duration: 0.75s;
  -webkit-animation-name: slidein;
          animation-name: slidein;
  -webkit-animation-fill-mode: forwards;
          animation-fill-mode: forwards;
  -webkit-animation-timing-function: cubic-bezier(0.455, 0.03, 0.515, 0.955);
          animation-timing-function: cubic-bezier(0.455, 0.03, 0.515, 0.955);
}
body #scene #middle-border {
  background-color: #eee;
  height: 75%;
  flex-grow: 1;
  max-width: 2px;
  z-index: 0;
}
body #scene #right-zone {
  background: #fff;
  height: 100%;
  flex-grow: 3;
}

</style>

    </html>