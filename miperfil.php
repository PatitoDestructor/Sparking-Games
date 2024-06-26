<?php

session_start();

//Validacion Sesion
if(!isset($_SESSION['idusuario'])){
    echo "<script>
            alert('Debes Iniciar Sesion para tener esta funcion');
            window.location.href='inicia sesion.php';
        </script>";
}


//Sesion
if(isset($_SESSION['idusuario'])){

$idusuario = $_SESSION['idusuario'];
$user = $_SESSION['usuario'];
$correo = $_SESSION['correo'];
$nombre = $_SESSION['nombrecompleto'];
$foto = $_SESSION['foto'];
$perfil = $_SESSION['perfil'];

}

//Consulta guias
require_once('controlador/conexion.php');

$query = mysqli_query($conexion,"SELECT u.idusuario, u.nombrecompleto, u.usuario, u.correo, u.foto, u.perfil, g.idguia, g.titulo, g.sinopsis, g.fotoportada FROM usuarios u INNER JOIN guias g ON u.idusuario = g.idusuario WHERE u.idusuario = '$idusuario';");

$resultado = mysqli_num_rows($query);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sparking Games || <?php echo $nombre; ?></title>
    <link rel="icon" href="Media/IMG/Logo.png">
    
    <!-- CSS -->
    <link rel="stylesheet" href="CSS/Estilo.css">
    <link rel="stylesheet" href="CSS/menus.css">
    <link rel="stylesheet" href="CSS/miperfil.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Stick+No+Bills:wght@200;300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />


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

        <section class="seccion-perfil-usuario">
        <div class="perfil-usuario-header">
            <div class="perfil-usuario-portada">
                <div class="perfil-usuario-avatar">
                    <img class="imgperfil" src="data:image/jpg;base64, <?php echo base64_encode($foto)?>" alt="img-avatar">
                    <button type="button" class="boton-avatar">
                    <a href="editarperfil.php"><i class="far fa-pencil"></i></a>
                    </button>
                </div>

                <?php if($perfil == "admin"){ ?>
                <button type="button" class="boton-portada">
                <i class="corona fa-solid fa-crown"></i>
                </button>
                <?php
                    } 
                ?>
            </div>
        </div>
        <div class="perfil-usuario-body">
            <div class="perfil-usuario-bio">
                <h3 class="titulo"><?php echo $nombre; ?></h3>
            </div>
            <div class="perfil-usuario-footer">
                <ul class="lista-datos">
                    <li><i class="icono fa-solid fa-user"></i><b>Nombre:</b><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $nombre; ?></li>
                    <li><i class="icono fa-solid fa-user"></i><b> Apodo: </b><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $user; ?></li>
                </ul>
                <ul class="lista-datos">
                    <li><i class="icono fa-solid fa-at"></i><b>Correo:</b><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $correo; ?> </li>
                    <li><i class="icono fa-solid fa-crown"></i><b>Rol:</b><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $perfil; ?></li>
                </ul>
            </div>
        </div>
    </section><br>
    
    <center>
    <h1>Mis Guias</h1><br>
    </center>
    <div class="noticias">

<?php

if($resultado > 0){

    while ($data = mysqli_fetch_array($query)){
        $titulo = $data['titulo'];
        $sinopsis = $data['sinopsis'];
        $portada = $data['fotoportada'];
        $creador = $data['nombrecompleto'];
        $fotocreador = $data['foto'];
    



?>

<div data-aos="zoom-out-up" class="noticia">
    <a href="#"><img src="data:image/jpg;base64, <?php echo base64_encode($portada)?>" class="portadaguia" alt="Noticia1"></a>
    <h3><?php echo $titulo; ?></h3>
    <p><?php echo $sinopsis; ?></p><br>

    <!-- Boton Editar -->
    <a href="controlador/miperfil/Mieditar.php?id=<?php echo $data['idguia']; ?>">
    <button class="among">
    <svg height="36px" width="36px" viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg">
        <rect fill="#fdd835" y="0" x="0" height="36" width="36"></rect>
        <path d="M38.67,42H11.52C11.27,40.62,11,38.57,11,36c0-5,0-11,0-11s1.44-7.39,3.22-9.59 c1.67-2.06,2.76-3.48,6.78-4.41c3-0.7,7.13-0.23,9,1c2.15,1.42,3.37,6.67,3.81,11.29c1.49-0.3,5.21,0.2,5.5,1.28 C40.89,30.29,39.48,38.31,38.67,42z" fill="#e53935"></path>
        <path d="M39.02,42H11.99c-0.22-2.67-0.48-7.05-0.49-12.72c0.83,4.18,1.63,9.59,6.98,9.79 c3.48,0.12,8.27,0.55,9.83-2.45c1.57-3,3.72-8.95,3.51-15.62c-0.19-5.84-1.75-8.2-2.13-8.7c0.59,0.66,3.74,4.49,4.01,11.7 c0.03,0.83,0.06,1.72,0.08,2.66c4.21-0.15,5.93,1.5,6.07,2.35C40.68,33.85,39.8,38.9,39.02,42z" fill="#b71c1c"></path>
        <path d="M35,27.17c0,3.67-0.28,11.2-0.42,14.83h-2C32.72,38.42,33,30.83,33,27.17 c0-5.54-1.46-12.65-3.55-14.02c-1.65-1.08-5.49-1.48-8.23-0.85c-3.62,0.83-4.57,1.99-6.14,3.92L15,16.32 c-1.31,1.6-2.59,6.92-3,8.96v10.8c0,2.58,0.28,4.61,0.54,5.92H10.5c-0.25-1.41-0.5-3.42-0.5-5.92l0.02-11.09 c0.15-0.77,1.55-7.63,3.43-9.94l0.08-0.09c1.65-2.03,2.96-3.63,7.25-4.61c3.28-0.76,7.67-0.25,9.77,1.13 C33.79,13.6,35,22.23,35,27.17z" fill="#212121"></path>
        <path d="M17.165,17.283c5.217-0.055,9.391,0.283,9,6.011c-0.391,5.728-8.478,5.533-9.391,5.337 c-0.913-0.196-7.826-0.043-7.696-5.337C9.209,18,13.645,17.32,17.165,17.283z" fill="#01579b"></path>
        <path d="M40.739,37.38c-0.28,1.99-0.69,3.53-1.22,4.62h-2.43c0.25-0.19,1.13-1.11,1.67-4.9 c0.57-4-0.23-11.79-0.93-12.78c-0.4-0.4-2.63-0.8-4.37-0.89l0.1-1.99c1.04,0.05,4.53,0.31,5.71,1.49 C40.689,24.36,41.289,33.53,40.739,37.38z" fill="#212121"></path>
        <path d="M10.154,20.201c0.261,2.059-0.196,3.351,2.543,3.546s8.076,1.022,9.402-0.554 c1.326-1.576,1.75-4.365-0.891-5.267C19.336,17.287,12.959,16.251,10.154,20.201z" fill="#81d4fa"></path>
        <path d="M17.615,29.677c-0.502,0-0.873-0.03-1.052-0.069c-0.086-0.019-0.236-0.035-0.434-0.06 c-5.344-0.679-8.053-2.784-8.052-6.255c0.001-2.698,1.17-7.238,8.986-7.32l0.181-0.002c3.444-0.038,6.414-0.068,8.272,1.818 c1.173,1.191,1.712,3,1.647,5.53c-0.044,1.688-0.785,3.147-2.144,4.217C22.785,29.296,19.388,29.677,17.615,29.677z M17.086,17.973 c-7.006,0.074-7.008,4.023-7.008,5.321c-0.001,3.109,3.598,3.926,6.305,4.27c0.273,0.035,0.48,0.063,0.601,0.089 c0.563,0.101,4.68,0.035,6.855-1.732c0.865-0.702,1.299-1.57,1.326-2.653c0.051-1.958-0.301-3.291-1.073-4.075 c-1.262-1.281-3.834-1.255-6.825-1.222L17.086,17.973z" fill="#212121"></path>
        <path d="M15.078,19.043c1.957-0.326,5.122-0.529,4.435,1.304c-0.489,1.304-7.185,2.185-7.185,0.652 C12.328,19.467,15.078,19.043,15.078,19.043z" fill="#e1f5fe"></path>
    </svg>
    <span class="now">Now!</span>
    <span class="play">Editar</span>
    </button>
    </a>

    <!-- Boton eliminar -->
    <a href="controlador/miperfil/Miborrar.php?id=<?php echo $data['idguia']; ?>">
    <button class="tooltip">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20" height="25" width="25">
            <path fill="#6361D9" d="M8.78842 5.03866C8.86656 4.96052 8.97254 4.91663 9.08305 4.91663H11.4164C11.5269 4.91663 11.6329 4.96052 11.711 5.03866C11.7892 5.11681 11.833 5.22279 11.833 5.33329V5.74939H8.66638V5.33329C8.66638 5.22279 8.71028 5.11681 8.78842 5.03866ZM7.16638 5.74939V5.33329C7.16638 4.82496 7.36832 4.33745 7.72776 3.978C8.08721 3.61856 8.57472 3.41663 9.08305 3.41663H11.4164C11.9247 3.41663 12.4122 3.61856 12.7717 3.978C13.1311 4.33745 13.333 4.82496 13.333 5.33329V5.74939H15.5C15.9142 5.74939 16.25 6.08518 16.25 6.49939C16.25 6.9136 15.9142 7.24939 15.5 7.24939H15.0105L14.2492 14.7095C14.2382 15.2023 14.0377 15.6726 13.6883 16.0219C13.3289 16.3814 12.8414 16.5833 12.333 16.5833H8.16638C7.65805 16.5833 7.17054 16.3814 6.81109 16.0219C6.46176 15.6726 6.2612 15.2023 6.25019 14.7095L5.48896 7.24939H5C4.58579 7.24939 4.25 6.9136 4.25 6.49939C4.25 6.08518 4.58579 5.74939 5 5.74939H6.16667H7.16638ZM7.91638 7.24996H12.583H13.5026L12.7536 14.5905C12.751 14.6158 12.7497 14.6412 12.7497 14.6666C12.7497 14.7771 12.7058 14.8831 12.6277 14.9613C12.5495 15.0394 12.4436 15.0833 12.333 15.0833H8.16638C8.05588 15.0833 7.94989 15.0394 7.87175 14.9613C7.79361 14.8831 7.74972 14.7771 7.74972 14.6666C7.74972 14.6412 7.74842 14.6158 7.74584 14.5905L6.99681 7.24996H7.91638Z" clip-rule="evenodd" fill-rule="evenodd"></path>
        </svg>
        <span class="tooltiptext">Borrar</span>
    </button>
    </a>
</div>

<?php
    }
}else{?>
    <div class="vacio">
            <p><br><i class="fa-solid fa-triangle-exclamation"></i>&nbsp;No has subido ninguna guia. Animate a subir una! <i class="fa-solid fa-cloud-xmark"></i></p>
    </div>

<?php
}
?>

</div>
</div><br><br>

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