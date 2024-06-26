<?php

session_start();

if(isset($_SESSION['idusuario'])){


$usuario = $_SESSION['usuario'];
$nombre = $_SESSION['nombrecompleto'];
$foto = $_SESSION['foto'];
$perfil = $_SESSION['perfil'];

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sparking Games</title>
    <link rel="icon" href="Media/IMG/Logo.png">
    
    <!-- CSS -->
    <link rel="stylesheet" href="CSS/Estilo.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Stick+No+Bills:wght@200;300;400&display=swap" rel="stylesheet">

    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- SweetAlert --> 
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</head>
<body>

        <!-- Loader -->
        <div class="loader" id="loader">
            <div class="spinner">
                <span>L</span>
                <span>O</span>
                <span>A</span>
                <span>D</span>
                <span>I</span>
                <span>N</span>
                <span>G</span>
            </div>
        </div>
    
        <!-- Menu -->
        <div class="contenedor">
        <?php
        
        if(!isset($_SESSION['idusuario'])){
            include('vista/menuinvitado.php');
        }
        elseif($perfil == "usuario"){
            include('vista/menuusuario.php');
        }
        elseif ($perfil == "admin") {
            include('vista/menuadmin.php');
        }

        ?>
        <hr>

        <!-- Social bar -->
        <div class="container">
            <input type="checkbox" id="btn-mas">
            <div class="redes">
                <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                <a href="#"><i class="fa-brands fa-twitter"></i></a>
                <a href="#"><i class="fa-brands fa-instagram"></i></a>
                <a href="#"><i class="fa-brands fa-pinterest-p"></i></a>
                <a href="AgregarGuia.php"><i class="fa-solid fa-folder-plus"></i></a>
            </div>
            <div class="btn-mas">
                <label for="btn-mas" class="icon-mas2"><i class="fa-solid fa-plus"></i></label>
            </div>
        </div>

        <!-- Mural -->
        <header class="mural">
            <h2>BIENVENIDO SEÑOR DE LA CENIZA</h2>
            <p>Bienvenido a Sparking Games, aqui podras mejorar en tus videojuegos favoritos mediante consejos brindados por 4 profesionales. Mejora y derrota a todos tus amigos en la gran cantidad de videojuegos en nuestro catalogo.</p>
            <a href="Biblioteca.php" class="btn">Biblioteca<i class="fas fa-angle-double-right"></i></a>
        </header>

        <!-- Columnas -->
        <div class="noticias" data-aos="zoom-out-up">
            <div>
                <a href=""><img src="Media/IMG/Noticia 1.jpg" alt="Noticia1"></a>
                <h3>Call of Duty III (CoD)</h3>
                <p>Uno de los mejores shooters de la historia, Call of Duty es un juego bastante competitivo como para que seas el peor de tus amigos. Ven y conviertete en ProGamer en esta hermososososa entrega de Call of Duty</p>
                <a href="">Ver mas... <i class="fas fa-angle-double-right"></i></a>
            </div>
        

        <div>
            <a href=""><img src="Media/IMG/Noticia2.jpg" alt="Noticia2"></a>
            <h3>Halo 4</h3>
            <p>Uno de las mejores entregas de la saga Halo. Toma el control de Jefe Maestro (Master Chief) y acaba con la amenaza de los Covenant. En multiplayer derrota a tus amigos y demuestrales quien es el verdadero Jefe Maestro </p>
            <a href="">Ver mas... <i class="fas fa-angle-double-right"></i></a>
        </div>

        <div>
            <a href=""><img src="Media/IMG/Noticia3.jpg" alt="Noticia3"></a>
            <h3>Far Cry 4</h3>
            <p>Explora el territorio enemigo desde arriba en el nuevo buzzer y lánzate en picado al suelo con tu traje alado. Monta en un elefante de seis toneladas y libera toda su fuerza bruta sobre tus enemigos.</p>
            <a href="">Ver mas... <i class="fas fa-angle-double-right"></i></a>
        </div>

        <div>
            <a href=""><img src="Media/IMG/Noticia4.jpg" alt="Noticia4"></a>
            <h3>Uncharted 4</h3>
            <p>Toma el control de Nathan Drake y ayuda a Sam para desenmascarar una conspiración histórica del famoso pirata aventurero Henry Avery y su legendario tesoro.</p>
            <a href="">Ver mas... <i class="fas fa-angle-double-right"></i></a>
        </div>
    


        </div>
    
        <!-- Banner -->
        <section class="banner" data-aos="fade-up" data-aos-anchor-placement="top-bottom">
            <div class="content">
                <h2>Unete Soldado</h2>
                <p>Unete soldao, registrate y haz parte de nuestro batallon. Registrandote tendras funciones adiccionales para que seas el mejor mas comodamente.</p>
                <a href="Registrate.php" class="btn">Registrate <i class="fas fa-angle-double-right"></i></a>
            </div>
        </section>

<!-- Columnas 2 -->
<div class="noticias" data-aos="zoom-out-up">
    <div>
        <a href=""><img src="Media/IMG/Noticia5.jpg" alt="Noticia5"></a>
        <h3>God Of War</h3>
        <p>¿Como piensas partirles el trasero a los dioses del olimpo si sos un manco? Conviertete en un verdadero Kratos y empieza a repartir ostias a los dioses del Olimpo</p>
        <a href="">Ver mas... <i class="fas fa-angle-double-right"></i></a>
    </div>
    

    <div>
        <a href="Guias/residentEvil.php"><img src="Media/IMG/noticia6.jpg" alt="Noticia6"></a>
        <h3>Resident Evil 4</h3>
        <p>Conviertete en Pro y derrota a las plagas con el papucho de Leon S Kennedy y salva a la fastidiosa hija del presidente epicamente</p>
        <a href="Guias/residentEvil.php">Ver mas... <i class="fas fa-angle-double-right"></i></a>
    </div>

    <div>
        <a href=""><img src="Media/IMG/noticia7.jpg" alt="Noticia7"></a>
        <h3>Mortal Kombat</h3>
        <p>No se siente nada bien que tus amigos sean superiores a ti en este grandiosos titulo. Aprende el arte del arriba arriba abajo y se el mejor de tus amigos</p>
        <a href="">Ver mas... <i class="fas fa-angle-double-right"></i></a>
    </div>

    <div>
        <a href=""><img src="Media/IMG/noticia8.jpg" alt="Noticia8"></a>
        <h3>Minecraft</h3>
        <p>¿Encerio eres manco en este grandioso juego? Sin palabras...</p>
        <a href="">Ver mas... <i class="fas fa-angle-double-right"></i></a>
    </div>

        </div>

        <!-- Slider-->
        <div class="slidercont" id="slidercont">

            <ul class="slider">
            <li id="slide1" class="slide1">
                <img src="Media/IMG/slide1.jpg"/>
            </li>
            <li id="slide2" class="slide2">
                <img src="Media/IMG/slide2.jpg"/>
            </li>

            <li id="slide3">
                <img src="Media/IMG/slide3.jpg">
            </li>

            <li id="slide4" class="slide4">
                <img src="Media/IMG/slide5.jpg">
            </li>
            <li id="slide5">
            
                <br><br><br><br>
                <h1>¿No has iniciado sesion?</h1>
                <br><br><br>
                <a href="Inicia sesion.php" class="btn">Inicio de Sesion<i class="fas fa-angle-double-right"></i></a>
            </li>
            </ul>
            
            <ul class="menu">
            <li>
                <a href="#slide1">1</a>
            </li>
            <li>
                <a href="#slide2">2</a>
            </li>
            <li>
                <a href="#slide3">3</a>
            </li>
            <li>
                <a href="#slide4">4</a>
            </li>
            <li>
                <a href="#slide5">5</a>
            </li>
            </ul>
            
        </div>


        <!-- Columnas 3 -->
        <div class="noticias">
            
            <div>
                <a href=""><img src="Media/IMG/noticia13.jpg" alt="noticia13"></a>
                <h3>Red Dead Redemption</h3>
                <p>Toma el control de John Marston y produce el terror en el viejo oeste como todo un capo</p>
                <a href="">Ver mas... <i class="fas fa-angle-double-right"></i></a>
            </div>
        

            <div>
                <a href=""><img src="Media/IMG/noticia14.jpg" alt="Noticia14"></a>
                <h3>Assasins Creed BlackFlag</h3>
                <p>Conviertete en el mejor asesino y pirata de los siete mares. Y en el online demuestrales a tus amigos que solo debe haber un pirata en los 7 mares</p>
                <a href="">Ver mas... <i class="fas fa-angle-double-right"></i></a>
            </div>

            <div>
                <a href=""><img src="Media/IMG/noticia15.jpg" alt="Noticia15"></a>
                <h3>Skyrim</h3>
                <p>No podras explorar tranquilamente el mundo enorme que Skyrim trae para ti si son un manco asi que si juegas esta grandiosa entrega estos consejos te pueden servir</p>
                <a href="">Ver mas... <i class="fas fa-angle-double-right"></i></a>
            </div>

            <div>
                <a href=""><img src="Media/IMG/noticia16.jpg" alt="Noticia16"></a>
                <h3>Grand Theft Auto 5</h3>
                <p>Se el mejor junto a Michael, Franklin y Trevor. Estos consejos te pueden servir</p>
                <a href="">Ver mas... <i class="fas fa-angle-double-right"></i></a>
            </div>

        </div>


        <!-- Banner 2 -->
        <section class="banner2">
            <div class="content2">
                <h2>¿YOU DIED?</h2>
                <p>¿Estas teniendo problemas? Contacta a cualquiera de 4 profesionales por un pequeño precio y se feliz. <br> ¿Ves problemas en la pagina? Avisanos</p>
                <a href="nosotros.php" class="btn">Contactanos <i class="fas fa-angle-double-right"></i></a>
            </div>
        </section>


<hr>

</div>

<!-- Footer-->
<footer class="pie-pagina">
    <div class="grupo-1">
        <div class="box">
            <figure>
                <a href="index.php">
                    <img src="Media/IMG/Logo.png" alt="logo" class="logo">
                </a>
            </figure>
        </div>
        <div class="box">
            <h2>SOBRE NOSOTROS</h2>
            <p>Jovenes emprendedores con objetivos claros y concretos.</p>
            <p>¿Quieres saber mas sobre nosotros y como aportamos al sitio web? <a href="Nosotros.php"><b>Ver mas...</b></a></p>
        </div>
        <div class="box">
            <h2>SIGUENOS</h2>
            <div class="redsocial">
                <a href="" ><i class="fa-brands fa-facebook"></i></a>
                <a href=""><i class="fa-brands fa-instagram"></i></a>
                <a href=""><i class="fa-brands fa-twitter"></i></a>
                <a href=""><i class="fa-brands fa-pinterest"></i></a>
            </div>
        </div>
    </div>
    <div class="grupo-2">
        <small>&copy; 2022 <b>Sparking Games</b> - Todos los Derechos Reservados.</small>
    </div>    

</footer>

<!-- Loader-->
<script src="JS/loader.js"></script>

<!-- AOS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>

<!-- Menu Desplegable -->
<script src="JS/menudesplegable.js"></script>

</body>
</html>