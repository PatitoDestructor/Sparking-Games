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
    <title>Registrate || Sparking Games Games</title>
    <link rel="icon" href="Media/IMG/Logo.png">
    
    <!-- CSS -->
    <link rel="stylesheet" href="CSS/registrate.css">
    
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
        <br><br><br><br>
        <h1>REGISTRATE<i class="fas fa-exclamation"></i></h1>
        <p>Bienvenido a Sparking Games. Aquí podrás registrarte y tener varias cualidades nuevas     <i class="fas fa-sign-in-alt"></i></p>
    </header>
    
    <!-- Formulario -->
    <section class="seccion">
    <div class="contentBx">
        <div class="formBx">
            <h2>Registrate</h2>
            <form action="controlador/registrar/registro.php" enctype="multipart/form-data" id="form" method="POST" >

                <div class="inputBx">
                    <span>Nombre Completo</span>
                    <input type="text" id="nombre" name="nombrecompleto">
                    <i class="fas fa-check-circle" id="biennombre"></i>
                    <i class="fas fa-exclamation-circle" id="malnombre"></i>
                    <small id="mensajenombre">El campo Nombre es obligatorio</small>
                </div>

                <div class="inputBx">
                    <span>Usuario</span>
                    <input type="text" id="usuario" name="usuario">
                    <i class="fas fa-check-circle" id="bienusuario"></i>
                    <i class="fas fa-exclamation-circle" id="malusuario"></i>
                    <small id="mensajeusuario">El campo Usuario es obligatorio</small>
                </div>

                <div class="inputBx">
                    <span>Correo Electronico</span>
                    <input type="text" id="correo" name="correo">
                    <i class="fas fa-check-circle" id="biencorreo"></i>
                    <i class="fas fa-exclamation-circle" id="malcorreo"></i>
                    <small id="mensajecorreo">El Correo no es valido. Ejemplo: nombre@dominio.com</small>
                </div>

                <div class="inputBx">
                    <span>Contraseña</span>
                    <input type="password" id="password-1" name="contrasena">
                    <span id="visible" class="verpass"><i class="fa-solid fa-eye" id="icono"></i></span>
                    <i class="fas fa-check-circle contravali" id="biencontra"></i>
                    <i class="fas fa-exclamation-circle" id="contravalired"></i>
                    <small id="mensajecontra">Contraseña no valida. Minimo 8 caracteres, 1 letra mayúscula. <br> No espacios en blanco y 1 caracter especial</small>
                </div>

                <div class="inputBx repetir">
                    <span>Repetir Contraseña</span>
                    <input type="password" id="password-2">
                    <i class="fas fa-check-circle" id="biencontra2"></i>
                    <i class="fas fa-exclamation-circle" id="malcontra2"></i>
                    <small id="mensajecontra2">Las contraseñas deben ser iguales</small>
                </div>

                <div class="inputBx foto">
                    <span>Foto de perfil</span>
                    <input type="file" name="foto" id="foto" onchange="return validararchivo()">
                    <i class="fas fa-check-circle" id="bienfoto"></i>
                    <i class="fas fa-exclamation-circle" id="malfoto"></i>
                    <small id="mensajefoto">No se ha subido ningun archivo</small>
                </div>

                <div id="visorarchivo" class="visor">
                    <!-- Preview de imagen -->
                </div>

                <div class="recuerdame">
                    <div class="cntr">
                        <input checked="" type="checkbox" id="cbx" class="hidden-xs-up">
                        <p class="terminos-text">Aceptar Terminos y Condiciones.</p>
                        <label for="cbx" class="cbx"></label>
                        <small id="mensajecheck">Los terminos deben de ser aceptados</small>
                    </div>
                    <i class="fas fa-exclamation-circle" id="malcheck"></i>
                </div>

                <div class="inputBx">
                    <input type="submit" value="Registrar" id="btnform">
                </div>

                <div class="inputBx">
                    <p>¿Ya tienes una cuenta?<a href="Inicia sesion.php">&nbsp;&nbsp;Iniciar Sesion</a></p>
                </div>
            </form>
        </div>
    </div>
            <div class="imgBx">
                <img src="Media/GIF/raiden5.gif" alt="">
            </div>
        
    </section>


<br><br><br>

</div>


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
        <small>&copy; 2022 <b>Sparking Games</b> - Todos los Derechos Reservados.</small>
    </div>    

</footer>
    
<script src="JS/loader.js"></script>
<script src="JS/registro.js"></script>
<script src="JS/validarfile.js"></script>
<!-- Menu Desplegable -->
<script src="JS/menudesplegable.js"></script>

</body>
</html>