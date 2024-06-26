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

$idusuario1 = $_REQUEST['id'];

$query = mysqli_query($conexion,"SELECT u.idusuario, u.nombrecompleto, u.usuario, u.correo, u.foto, u.perfil, g.idguia, g.titulo, g.sinopsis, g.fotoportada FROM usuarios u INNER JOIN guias g ON u.idusuario = g.idusuario WHERE u.idusuario = '$idusuario1';");
$queryG = mysqli_query($conexion,"SELECT g.idguia, g.titulo, g.sinopsis, g.contenido, g.fotoportada, u.nombrecompleto, u.usuario, u.correo, u.contrasena, u.foto, u.perfil FROM guias g INNER JOIN usuarios u ON g.idusuario = u.idusuario WHERE g.idusuario = '$idusuario1' ;");
$dataU = mysqli_fetch_array($query);

$nombrecompleto = $dataU['nombrecompleto'];
$usuario1 = $dataU['usuario'];
$correo1 = $dataU['correo'];
$foto1 = $dataU['foto'];
$perfil1 = $dataU['perfil'];

$resultado = mysqli_num_rows($query);

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sparking Games || <?php echo $nombrecompleto; ?></title>
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
                    <img class="imgperfil" src="data:image/jpg;base64, <?php echo base64_encode($foto1)?>" alt="img-avatar">
                </div>

                <?php if($perfil1 == "admin"){ ?>
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
                <h3 class="titulo"><?php echo $nombrecompleto; ?></h3>
            </div>
            <div class="perfil-usuario-footer">
                <ul class="lista-datos">
                    <li><i class="icono fa-solid fa-user"></i><b>Nombre:</b><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $nombrecompleto; ?></li>
                    <li><i class="icono fa-solid fa-user"></i><b> Apodo: </b><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $usuario1; ?></li>
                </ul>
                <ul class="lista-datos">
                    <li><i class="icono fa-solid fa-at"></i><b>Correo:</b><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $correo1; ?> </li>
                    <li><i class="icono fa-solid fa-crown"></i><b>Rol:</b><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $perfil1; ?></li>
                </ul>
            </div>
        </div>
    </section><br>
    
    <center>
    <h1>Guias</h1><br>
    </center>
    <div class="noticias">

<?php

if($resultado > 0){

    while ($data = mysqli_fetch_array($queryG)){
        $idguia = $data['idguia'];
        $titulo = $data['titulo'];
        $sinopsis = $data['sinopsis'];
        $portada = $data['fotoportada'];
        $creador = $data['nombrecompleto'];
        $fotocreador = $data['foto'];
    



?>

<div data-aos="zoom-out-up" class="noticia">
    <a href="contenidoGuia.php?id=<?php echo $idguia; ?>"><img src="data:image/jpg;base64, <?php echo base64_encode($portada)?>" class="portadaguia" alt="Noticia1"></a>
    <h3><?php echo $titulo; ?></h3>
    <p><?php echo $sinopsis; ?></p><br>
    <a href="contenidoGuia.php?id=<?php echo $idguia; ?>">Ver mas... <i class="fas fa-angle-double-right"></i></a>
</div>

<?php
    }
}else{?>
    <div class="vacio">
            <p><br><i class="fa-solid fa-triangle-exclamation"></i>&nbsp;Este usuario no ha subido ninguna guia <i class="fa-solid fa-cloud-xmark"></i></p>
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