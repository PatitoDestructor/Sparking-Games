<?php
session_start();

if(!isset($_SESSION['idusuario'])){

    echo "<script>
    alert(\"Debes Iniciar Sesion para tener esta funcion.\");
    window.location.href = \"inicia sesion.php\";
    </script>";
}

if(isset($_SESSION['idusuario'])){

    $nombre = $_SESSION['nombrecompleto'];
    $foto = $_SESSION['foto'];
    $perfil = $_SESSION['perfil'];
    $idusuario =$_SESSION['idusuario'];
    
}


//Subir Guia
if($_POST){
    require_once('controlador/conexion.php');

    $titulo = $_POST['titulo'];
    $sinopsis = $_POST['sinopsis'];
    $contenido = $_POST['contenido'];
    $portada = addslashes(file_get_contents($_FILES['portada']['tmp_name']));

    $query = "INSERT INTO guias (titulo, sinopsis, contenido, fotoportada, idusuario) VALUES ('$titulo', '$sinopsis', '$contenido', '$portada', '$idusuario')";
    $resultado = $conexion->query($query);

    if ($resultado) {
        echo "<script>
        alert(\"La guia se ha subido exitosamente.\");
        window.location.href=\"inicio.php\";
        </script>";
    }else{
        echo "<script>
        alert(\"Hubo un error al subir la guia.\");
        window.location.href=\"AgregarGuia.php\";
        </script>";
    }
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Guia || Sparking Games</title>
    <link rel="icon" href="Media/IMG/Logo.png">
    
    <!-- CSS -->
    <link rel="stylesheet" href="CSS/guia.css">
    
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
            </div>
            <div class="btn-mas">
                <label for="btn-mas" class="icon-mas2"><i class="fa-solid fa-plus"></i></label>
            </div>
        </div>

        <!-- Mural -->
        <header class="mural">
            <br><br><br><br><br><br><br>
            <div>
            <h2>Añade una Guia</h2>
            <br>
            <p>Agrega una guia de tu juego favorito y ayuda los demas usuarios   <i class="fas fa-exclamation"></i></p>
            </div>
        </header>

    <!-- Formulario -->
    <section class="seccion">
    <div class="contentBx">
        <div class="formBx">
            <h2>Añade una guia</h2>
            <form action="" id="form" method="POST" enctype="multipart/form-data">

                <div class="inputBx">
                    <span>Titulo</span>
                    <input type="text" id="titulo" name="titulo">
                    <i class="fas fa-check-circle" id="bientitulo"></i>
                    <i class="fas fa-exclamation-circle" id="maltitulo"></i>
                    <small id="mensajetitulo">El campo titulo es obligatorio</small>
                </div>

                <div class="inputBx">
                    <span>Sinopsis</span>
                    <textarea name="sinopsis" id="sinop" cols="30" rows="10" placeholder="Escribe una pequeña sinopsis..." class="sinopsis"></textarea>
                    <i class="fas fa-check-circle" id="biensinop"></i>
                    <i class="fas fa-exclamation-circle" id="malsinop"></i>
                    <small id="mensajesinop">El campo Sinopsis es obligatorio</small>
                </div>

                <div class="inputBx">
                    <span>Contenido</span>
                    <textarea name="contenido" id="contenido" cols="30" rows="10" placeholder="Escribe tu guia."></textarea>
                    <i class="fas fa-check-circle" id="biencontenido"></i>
                    <i class="fas fa-exclamation-circle" id="malcontenido"></i>
                    <small id="mensajecontenido">El Contenido de la guia no es valido.</small>
                </div>

                <div class="inputBx foto">
                    <span>Foto de portada</span>
                    <input type="file" name="portada" id="foto">
                    <i class="fas fa-exclamation-circle" id="malfoto"></i>
                    <small id="mensajefoto">No se ha subido ningun archivo</small>
                </div>
                
                <div id="visorarchivo" class="visor">
                    <!-- Preview de imagen -->
                </div>

                <div class="inputBx">
                    <input type="submit" value="Guardar" id="btnform">
                </div>
            </form>
        </div>
    </div>
            <div class="imgBx">
                <img src="Media/IMG/añadirguia.jpg" alt="">
            </div>
        
    </section>
    <br><br><br>
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

<!-- Validacion-->
<script src="JS/añadirguia.js"></script>
<script src="JS/validarfile.js"></script>

<!-- Menu Desplegable -->
<script src="JS/menudesplegable.js"></script>

</body>
</html>