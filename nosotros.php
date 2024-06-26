<?php

session_start();

if(isset($_SESSION['idusuario'])){


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
    <title>Nosotros || Sparking Games</title>
    <link rel="icon" href="Media/IMG/Logo.png">
    
    <!-- CSS -->
    <link rel="stylesheet" href="CSS/nosotros.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Stick+No+Bills:wght@200;300;400&display=swap" rel="stylesheet">

    <!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>

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
    <hr><br>


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
        <br><br><br><br><br><br><br><br><br>
    <h2>¿QUIENES SOMOS?</h2>
    <p>¿Estas interesado en quienes somos los creadores de PipipupuChek? <br> Pues aqui encontraras una pequeña biografia de nosotros.</p>
    </header>
    


    <!-- Cartas -->

    <section class="seccion">
        <div class="swiper mySwiper cont">
            <div class="swiper-wrapper contenido">
                
                <!----- Cristian ---->
                <div class="swiper-slide carta">
                    <div class="carta-contenido">
                        <div class="imagen">
                            <img src="Media/IMG/cris1.jpg" alt="">
                        </div>

                        <div class="iredes">
                            <a href="https://www.facebook.com/profile.php?id=100008367040814"><i class="fa-brands fa-facebook"></i></a>
                            <a href=""><i class="fa-brands fa-twitter"></i></a>
                            <a href="https://www.instagram.com/chocolate.amargo0/?fbclid=IwAR1HEqXJMfN6gU2rlN0dMYQA0hGDgY1LvvlVAJAS2A98KcYdxlOjTDWnmFU"><i class="fa-brands fa-instagram"></i></a>
                        </div>

                        <div class="nombre-profesion">
                            <span class="nombre">Cristian Velez</span>
                            <span class="profesion">Aprendiz Sena</span>
                        </div>

                        <div class="estrellas">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>

                        <div class="cboton" id="cris">
                            <button class="sobremi">Sobre Mi</button>
                        </div>
                    </div>
                </div>

                

                <!----- Evelin ----->
                <div class="swiper-slide carta">
                    <div class="carta-contenido">
                        <div class="imagen">
                            <img src="Media/IMG/eve.jpeg" alt="">
                        </div>

                        <div class="iredes">
                            <a href="https://www.facebook.com/evelindaniela.cifuentessuarez"><i class="fa-brands fa-facebook"></i></a>
                            <a href="#"><i class="fa-brands fa-twitter"></i></a>
                            <a href="https://instagram.com/eve_sua15?igshid=YmMyMTA2M2Y="><i class="fa-brands fa-instagram"></i></a>
                        </div>

                        <div class="nombre-profesion">
                            <span class="nombre">Evelin Suárez</span>
                            <span class="profesion">Aprendiz Sena</span>
                        </div>

                        <div class="estrellas">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>

                        <div class="cboton">
                            <button class="sobremi" id="eve">Sobre Mi</button>
                        </div>
                    </div>
                </div>


                <!----- Raul ---->
                <div class="swiper-slide carta">
                    <div class="carta-contenido">
                        <div class="imagen">
                            <img src="Media/IMG/Draul.jpg" alt="">
                        </div>

                        <div class="iredes">
                            <a href="https://www.facebook.com/profile.php?id=100008294193578"><i class="fa-brands fa-facebook"></i></a>
                            <a href=""><i class="fa-brands fa-twitter"></i></a>
                            <a href=""><i class="fa-brands fa-instagram"></i></a>
                        </div>

                        <div class="nombre-profesion">
                            <span class="nombre">Stiven Chavarria</span>
                            <span class="profesion">Aprendiz Sena</span>
                        </div>

                        <div class="estrellas">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>

                        <div class="cboton">
                            <button class="sobremi" id="raul">Sobre Mi</button>
                        </div>
                    </div>
                </div>


                <!----- Daniel ---->
                <div class="swiper-slide carta">
                    <div class="carta-contenido">
                        <div class="imagen">
                            <img src="Media/IMG/el dani.jpeg" alt="">
                        </div>

                        <div class="iredes">
                            <a href="https://www.facebook.com/daniel.henaososa.75"><i class="fa-brands fa-facebook"></i></a>
                            <a href=""><i class="fa-brands fa-twitter"></i></a>
                            <a href="https://instagram.com/daniel_podi?igshid=YmMyMTA2M2Y="><i class="fa-brands fa-instagram"></i></a>
                        </div>

                        <div class="nombre-profesion">
                            <span class="nombre">Daniel Henao</span>
                            <span class="profesion">Aprendiz Sena</span>
                        </div>

                        <div class="estrellas">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>

                        <div class="cboton">
                            <button class="sobremi" id="dan">Sobre Mi</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
        <div class="swiper-pagination"></div>
   
    </section>


</div>

<!-- NOSOTROS -->
<section class="mvision">
<div class="flip">
    <div class="content">
        <div class="front">
            <br><br><br><br>
            <h2>Misión Games</h2>
        </div>
        <div class="back">
            <p>Brindamos un aplicativo web que ofrece apoyo a diferentes usuarios a traves
                de guias que los mismos pueden crear, ayudando asi a la mejora de sus videojuegos favoritos,
                ademas de la interactividad entre estos mismos.
            </p>
        </div>
    </div>
</div>

<div class="flip">
    <div class="content">
        <div class="front">
            <br><br><br><br>
            <h2>Visión Sparking</h2>
        </div>
        <div class="back">
            <p>Sparking Games espera convertise en uno de los aplicativos web, mejorar en todos los aspectos para que 
                cada usuario tenga una experiencia satisfactoria, se espera crear y ayudar al maximo con la interaccion.
            </p>
        </div>
    </div>
</div>

</section>
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><
<!----- Cristian ----->

<div class="modal-container">
    <div class="modal modal-close">
        <i class="fa-brands fa-xbox iconocerrar" id="x"></i><br>
        <img src="Media/IMG/cris1.jpg" alt="" class="crismodal">
        <div class="modal-textos">
            <h2 style="color: rgb(158, 36, 36);">Cristian Velez Bolivar</h2>
            <b style="color: rgb(158, 36, 36);">Edad:</b><p>16 años</p>
            <b style="color: rgb(158, 36, 36);">Nacimiento:</b><p>15/09/2005 Colombia/Medellin</p>
            <b style="color: rgb(158, 36, 36);">Labor:</b><p>Estudiante de Secundaria</p>
            <b style="color: rgb(158, 36, 36);">Color favorito:</b>&nbsp;&nbsp;<i class="fa-solid fa-circle" style="color: red;"></i>
        </div>
    </div>
</div>

<!----- Evelin ----->

<div class="modal-container" id="mdc">
    <div class="modal modal-close" id="md">
        <i class="fa-brands fa-xbox iconocerrar" id="e"></i><br>
        <img src="Media/IMG/eve.jpeg" alt="" class="evelinmodal">
        <div class="modal-textos">
            <h2 style="color: rgb(158, 36, 36);">Evelin Daniela Cifuentes Suarez</h2>
            <b style="color: rgb(158, 36, 36);">Edad:</b><p>16 años</p>
            <b style="color: rgb(158, 36, 36);">Nacimiento:</b><p>28/09/2005 Colombia/Medellin</p>
            <b style="color: rgb(158, 36, 36);">Labor:</b><p>Estudiante de Secundaria</p>
            <b style="color: rgb(158, 36, 36);">Color favorito:</b>&nbsp;&nbsp;<i class="fa-solid fa-circle" style="color: rgb(60, 106, 235);"></i>
        </div>
    </div>
</div>

<!----- Raul ----->

<div class="modal-container" id="modalcr">
    <div class="modal modal-close" id="modalr">
        <i class="fa-brands fa-xbox iconocerrar" id="r"></i><br>
        <img src="Media/IMG/Draul.jpg" alt="" class="raulmodal">
        <div class="modal-textos">
            <h2 style="color: rgb(158, 36, 36);">Raul Stiven Guzman Chavarria</h2>
            <b style="color: rgb(158, 36, 36);">Edad:</b><p>18 años</p>
            <b style="color: rgb(158, 36, 36);">Nacimiento:</b><p>29/04/2004 Colombia/Medellin</p>
            <b style="color: rgb(158, 36, 36);">Labor:</b><p>Estudiante de Secundaria</p>
            <b style="color: rgb(158, 36, 36);">Color favorito:</b>&nbsp;&nbsp;<i class="fa-solid fa-circle" style="color: rgb(3, 64, 231);"></i>
        </div>
    </div>
</div>

<!----- Daniel ----->

<div class="modal-container" id="modalcontd">
    <div class="modal modal-close" id="modaldani">
        <i class="fa-brands fa-xbox iconocerrar" id="d"></i><br>
        <img src="Media/IMG/el dani.jpeg" alt="" class="danielmodal">
        <div class="modal-textos">
            <h2 style="color: rgb(158, 36, 36);">Daniel Steven Henao Sosa</h2>
            <b style="color: rgb(158, 36, 36);">Edad:</b><p>16 años</p>
            <b style="color: rgb(158, 36, 36);">Nacimiento:</b><p>8/07/2005 Colombia/Medellin</p>
            <b style="color: rgb(158, 36, 36);">Labor:</b><p>Estudiante de Secundaria</p>
            <b style="color: rgb(158, 36, 36);">Color favorito:</b>&nbsp;&nbsp;<i class="fa-solid fa-circle" style="color: rgb(156, 25, 231);"></i>
        </div>
    </div>
</div>




<!----- Footer ---->

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
        <small>&copy; 2022 <b>PipipupuChek</b> - Todos los Derechos Reservados.</small>
    </div>    

</footer>


     <!-- Swiper JS -->
     <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

     <!-- Initialize Swiper -->
     <script>
       var swiper = new Swiper(".mySwiper", {
         slidesPerView: 3,
         spaceBetween: 30,
         slidesPerGroup: 3,
         loop: true,
         loopFillGroupWithBlank: true,
         pagination: {
           el: ".swiper-pagination",
           clickable: true,
         },
         navigation: {
           nextEl: ".swiper-button-next",
           prevEl: ".swiper-button-prev",
         },
       });
     </script>

<script src="JS/loader.js"></script>
<script src="JS/nosotros.js"></script>

<!-- Menu Desplegable -->
<script src="JS/menudesplegable.js"></script>

</body>
</html>