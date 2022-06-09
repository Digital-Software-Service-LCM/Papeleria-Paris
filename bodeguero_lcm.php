<?php
// control de sesiones 
    session_start();

    if(!isset($_SESSION['usuRol'])){
        header('location: index.php');
    }else{
        if($_SESSION['usuRol'] != 'bodeguero'){
            header('location: index.php');
        }
    } 


?>
<!DOCTYPE html>
<html>

<head>
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Mesa de Ayuda</title>
  <link rel="shortcut icon" href="./img/logo-icon.png" type="image/png" />
  <script src="https://kit.fontawesome.com/d7bddb5771.js" crossorigin="anonymous"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="css/venta-style.css">
  <link rel="stylesheet" type="text/css" href="css/estilos.css">
  <link rel="stylesheet" type="text/css" href="css/estilo2.css">
</head>
<header class="header" style="z-index: 2;">
<?php
    include("menu-bodeguero.php");
    ?>
</header>

<body>
<!--Define la informacion ingresada en el cuadro, y en cada uno de los espacios del carrusel-->
  <div class="container-carousel">
    <h1>Digital Software Service LCM</h1>
    <hr style="width: 80%;"><br>
    <p class="lcm-text">Somos una empresa que se encarga de realizar y/o mejorar sistemas de información por medio de soluciones basadas en nuestro conocimiento técnico que satisfacen las necesidades y requerimientos de nuestros clientes. <br><br>
    Para uso del soporte contáctese con nuestros desarrolladores.</p>
    <div class='wrapper'>
      <div class='carousel'>
        <div class='carousel__item'>
          <div class='carousel__item-head'>
            🐬
          </div>
          <div class='carousel__item-body'>
            <p class='title'>Maria Fernanda Diaz Burgos</p>
            <p>mfdiaz80@misena.edu.co</p>
          </div>
        </div>
        <div class='carousel__item'>
          <div class='carousel__item-head'>
            🦈
          </div>
          <div class='carousel__item-body'>
            <p class='title'>Luisa Milena Diaz Burgos</p>
            <p>lmdiaz9026@misena.edu.co</p>
          </div>
        </div>
        <div class='carousel__item'>
          <div class='carousel__item-head'>
            🐙
          </div>
          <div class='carousel__item-body'>
            <p class='title'>Laura Daniela Sanchez Rojas</p>
            <p>ldsanchez678@misena.edu.co</p>
          </div>
        </div>
        <div class='carousel__item'>
          <div class='carousel__item-head'>
            🐡
          </div>
          <div class='carousel__item-body'>
            <p class='title'>Manuel David Ochoa Buitrago</p>
            <p>mdochoa18@misena.edu.co</p>
          </div>
        </div>
        <div class='carousel__item'>
          <div class='carousel__item-head'>
            🐚
          </div>
          <div class='carousel__item-body'>
            <p class='title'>Digital Software Service LCM</p>
            <p>SIGAP</p>
          </div>
        </div>
        <div class='carousel__item'>
          <div class='carousel__item-head'>
            🐬
          </div>

          <div class='carousel__item-body'>
            <p class='title'>Maria Fernanda Diaz Burgos</p>
            <p>mfdiaz80@misena.edu.co</p>
          </div>
        </div>
        <div class='carousel__item'>
          <div class='carousel__item-head'>
            🦈
          </div>
          <div class='carousel__item-body'>
            <p class='title'>Luisa Milena Diaz Burgos</p>
            <p>lmdiaz9026@misena.edu.co</p>
          </div>
        </div>
        <div class='carousel__item'>
          <div class='carousel__item-head'>
            🐙
          </div>
          <div class='carousel__item-body'>
            <p class='title'>Laura Daniela Sanchez Rojas</p>
            <p>ldsanchez678@misena.edu.co</p>
          </div>
        </div>
        <div class='carousel__item'>
          <div class='carousel__item-head'>
            🐡
          </div>
          <div class='carousel__item-body'>
            <p class='title'>Manuel David Ochoa Buitrago</p>
            <p>mdochoa18@misena.edu.co</p>
          </div>
        </div>



      </div>
    </div>
  </div>

  </div>
  <?php
    include("bodeguero_footer.php");
    ?>

</body>

</html>