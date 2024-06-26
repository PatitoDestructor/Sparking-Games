<?php

require_once('controlador/conexion.php');

session_start();


if(!isset($_SESSION['idusuario'])){

    echo "<script>alert(\"Debes Iniciar Sesion para tener esta funcion.\");
    window.location.href = \"inicia sesion.php\";
    </script>";
}

if(isset($_SESSION['idusuario'])){


$usuario = $_SESSION['usuario'];
$nombre = $_SESSION['nombrecompleto'];
$foto = $_SESSION['foto'];
$perfil = $_SESSION['perfil'];
$idusuario = $_SESSION['idusuario'];

}

//Consulta
$resultados = mysqli_query($conexion, "SELECT * FROM usuarios WHERE idusuario = $idusuario");
$consulta = mysqli_fetch_array($resultados);


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil || Sparking Games</title>
    <link rel="icon" href="Media/IMG/Logo.png">
    
    <!-- CSS -->
    <link rel="stylesheet" href="CSS/editarperfil.css">
    
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
        <h1>Editar Perfil</h1>
        <p>¿Quieres innovar tu perfil? ¡Pues puedes hacerlo aqui sin ningun tipo de problema!</p>
    </header>
    
    <!-- Formulario -->
    <section class="seccion">
    <div class="contentBx">
        <div class="formBx">
            <h2>Editar Perfil</h2>
            <form action="controlador/editar/editar.php" enctype="multipart/form-data"  id="form" method="POST" >

                <div class="inputBx">
                    <span>Nuevo Nombre Completo</span>
                    <input type="text" id="nombre" name="Nuevonombre" value="<?php echo $consulta['nombrecompleto']; ?>">
                    <i class="fas fa-check-circle" id="biennombre"></i>
                    <i class="fas fa-exclamation-circle" id="malnombre"></i>
                    <small id="mensajenombre">El campo Nombre es obligatorio</small>
                </div>

                <div class="inputBx">
                    <span>Nuevo Usuario</span>
                    <input type="text" id="usuario" name="Nuevousuario" value="<?php echo $consulta['usuario']; ?>">
                    <i class="fas fa-check-circle" id="bienusuario"></i>
                    <i class="fas fa-exclamation-circle" id="malusuario"></i>
                    <small id="mensajeusuario">El campo Usuario es obligatorio</small>
                </div>

                <div class="inputBx">
                    <span>Nueva Contraseña</span>
                    <input type="password" id="password-1" name="Nuevocontrasena">
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
                    <span>Nueva Foto de perfil</span>
                    <input type="file" name="Nuevofoto" id="foto" onchange="return validarFile()">
                    <i class="fas fa-check-circle" id="bienfoto"></i>
                    <i class="fas fa-exclamation-circle" id="malfoto"></i>
                    <small id="mensajefoto">No se ha subido ningun archivo</small>
                </div>

                <div id="visorarchivo">
                    <!-- Preview de imagen -->
                </div>

                <div class="inputBx">
                    <input type="submit" value="Actualizar" id="btnform">
                </div>
            </form>
        </div>
    </div>
            <div class="imgBx">
                <video autoplay muted loop>
                    <source src="Media/VDS/gogetablue2.mp4">
                </video>
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
        <small>&copy; 2022 <b>PipipupuChek</b> - Todos los Derechos Reservados.</small>
    </div>    

</footer>
    
<script src="JS/loader.js"></script>
<script src="JS/editarperfil.js"></script>

<!-- Menu Desplegable -->
<script src="JS/menudesplegable.js"></script>

</body>
</html>