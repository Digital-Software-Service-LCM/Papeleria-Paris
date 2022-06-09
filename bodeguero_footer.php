<!DOCTYPE html>
<html lang="es">
<head>
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Footer</title>
</head>
<body>
    <style>

/*Define los estilos del footer*/

header.header{
    width:100%;
    margin-left: -8px;
}
        
footer {
    width: 98.98vw;
    background-color: #555;
    color: #bbb;
    line-height: 0.5;
    margin-bottom: -10%;
    margin-top: 5%;
    margin-left: -8px;
}
footer a {
    text-decoration: none;
    color: #eee;
}
a:hover {
    text-decoration: underline;
}
.ft-title {
    color: #fff;
    font-family: ’Merriweather’, serif;
    font-size: 1.375rem;
    padding-bottom: 0.625rem;
}

body {
    min-height: 100vh;
    flex-direction: column;
}
.container {
    flex: 1;    /* same as flex-grow: 1; */
}
.ft-main {
    height: 150px;
    padding: 0rem;
    display: flex;
    flex-wrap: wrap;
    text-align: center;
    justify-content: center;
}
.ft-main-item {
    padding: 1.25rem;
    min-width: 10.5rem /200px;
}
@media only screen and (min-width: 29.8125rem /477px) {
    .ft-main {
        justify-content: space-around;
    }
}
@media only screen and (min-width: 77.5rem /1240px) {
    .ft-main {
        justify-content: space-evenly;
    }
}

.ft-social {
    padding: 0 1.875rem 1.25rem;
}
.ft-social-list {

    display: flex;
    justify-content: center;
    border-top: 1px #777 solid; 
    padding-top: 1.25rem;
    padding-left: 30px;
    font-size: 1.40rem;

}
.ft-legal {
    padding: 0.9375rem 1.875rem;
    background-color: #333;
}
.ft-legal-list {
    width: 100%;
    display: flex;
    flex-wrap: wrap;
}
        </style>
<footer>
        <!-- Footer - superior -->
        <section class="ft-main">
            <div class="ft-main-item">
                <img src="img/logo-lcm.png" style="width: 180px;">
                <a href="bodeguero_lcm.php" style="text-decoration: none;">
                    <h3>Digital Software Service LCM</h3>
                </a>
        </section>
        <!-- Footer - redes -->
        <section class="ft-social">
            <ul class="ft-social-list">
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i style="margin-left: 50px;" class="fab fa-twitter"></i></a>
                <a href="#"><i style="margin-left: 50px;" class="fab fa-instagram"></i></a>
                <a href="#"><i style="margin-left: 50px;" class="fab fa-youtube"></i></a>
            </ul>


            <!-- Footer legal -->
            <section class="ft-legal">

                <div align="center">&copy; 2022 Copyright LCM.
                </div>
            </section>
    </footer>
</body>
</html>