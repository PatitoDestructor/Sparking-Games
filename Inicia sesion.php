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
    <title>Inicia sesion || Sparking Games</title>
    <link rel="icon" href="Media/IMG/Logo.png">
    
    <!-- CSS -->
    <link rel="stylesheet" href="CSS/Inicia sesion.css">
    
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
            <br><br><br><br><br><br><br><br>
            <h2>BIENVENIDO DE NUEVO SEÑOR DE LA CENIZA</h2>
            <br>
            <p>Estamos contentos que estes de vuelta Jefe Maestro<i class="fas fa-exclamation"></i></p>
        </header>
        

        <!-- Formulario -->
        <section class="seccion" id="formulario">
            <div class="imgBx">
                <img src="Media/GIF/raiden3.gif" alt="">
            </div>
            <div class="contentBx">
                <div class="formBx">
                    <h2>Iniciar Sesion</h2>
                    <form action="controlador/ingreso/ingresar.php" method="POST">
                        <div class="inputBx">
                            <span>Usuario</span>
                            <input type="text" id="usuario" name="usuario">
                            <i class="fas fa-check-circle" id="bienusuario"></i>
                            <i class="fas fa-exclamation-circle" id="malusuario"></i>
                            <small id="mensajeusuario">El campo Nombre es obligatorio</small>
                        </div>
                        <div class="inputBx">
                            <span>Contraseña</span>
                            <input type="password" id="password-1" name="contrasena">
                            <span id="visible" class="verpass"><i class="fa-solid fa-eye" id="icono"></i></span>
                            <i class="fas fa-check-circle" id="biencontra"></i>
                            <i class="fas fa-exclamation-circle" id="malcontra"></i>
                            <small id="mensajecontra">El campo Contraseña es obligatorio</small>
                        </div>
                        
                        <div class="inputBx">
                            <input type="submit" value="Iniciar" id="btnenviar">
                        </div>
                        <div class="inputBx">
                            <p>¿No tienes una cuenta?<a href="Registrate.php">&nbsp;&nbsp;Crear cuenta</a></p>
                        </div>
                    </form>
                    <h3>Inicia con:</h3>
                    <ul class="sci">
                        <li><i class="fa-brands fa-facebook"></i></li>
                        <li><i class="fa-brands fa-twitter"></i></li>
                        <li><i class="fa-brands fa-instagram"></i></li>
                    </ul>
                </div>
            </div>
        </section>



    </div> 
        <br><br><br>


    <!-- Footer -->
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
    
    <script src="JS/loader.js"></script>
    <script src="JS/sesion.js"></script>

    <!-- Menu Desplegable -->
    <script src="JS/menudesplegable.js"></script>
    </body>
    </html>