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
    <title>Sparking Games || Bienvenido</title>
    <link rel="icon" href="Media/IMG/Logo.png">
    
    <!-- CSS -->
    <link rel="stylesheet" href="CSS/Portada.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Stick+No+Bills:wght@200;300;400&display=swap" rel="stylesheet">

    <!-- SweetAlert --> 
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
</head>
<body>
    
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
    </div>



    <section class="banner">
        <div class="banner-content">
            <h1>Bienvenido a Sparking Games</h1>
            <p>Te damos la bienvenida a Sparking Games, un sitio web de guias que te ayudaran a pasar esos videojuegos que tanto te cuesta completar.</p>
            <a href="inicio.php">Ir a Inicio<i class="fas fa-angle-double-right"></i></a>
        </div>
    </section>

     
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

<!-- Menu Desplegable -->
<script src="JS/menudesplegable.js"></script>

</body>
</html>