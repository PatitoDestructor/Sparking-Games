<?php
session_start();

//Validacion perfiles 
if(!isset($_SESSION['idusuario'])){

    echo "<script>alert(\"Debes Iniciar Sesion para tener esta funcion.\");
    window.location.href = \"inicia sesion.php#formulario\";
    </script>";
}

//consulta segun la sesion
if(isset($_SESSION['idusuario'])){

    $nombre = $_SESSION['nombrecompleto'];
    $foto = $_SESSION['foto'];
    $perfil = $_SESSION['perfil'];
    
}

//Consulta guias
require_once('controlador/conexion.php');

$query = mysqli_query($conexion,"SELECT g.idguia, g.titulo, g.sinopsis, g.contenido, g.fotoportada, u.nombrecompleto, u.foto, u.idusuario FROM guias g INNER JOIN usuarios u ON g.idusuario = u.idusuario;");
$resultado = mysqli_num_rows($query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca || Sparking Games</title>
    <link rel="icon" href="Media/IMG/Logo.png">

    <!-- CSS -->
    <link rel="stylesheet" href="CSS/Biblioteca.css">
    
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
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <h2>BIENVENIDO A NUESTRA BIBLIOTECA<i class="fas fa-exclamation"></i><i class="fas fa-exclamation"></i></h2>
            <p>Bienvenido a la Biblioteca de Sparking Games. Podras ver nuestro catalogo de videojuegos que ira atualizando, si no ves tus juegos favoritos puedes recomendarlos... <i class="far fa-smile-wink"></i></p>
            <a href="Sugerencias.php" class="btn">Sugerencias<i class="fas fa-angle-double-right"></i></a>
        </header>


        <!-- Columnas -->
        <div class="noticias">

        <?php
        
        if($resultado > 0){

            while ($data = mysqli_fetch_array($query)){
                $idguia = $data['idguia'];
                $titulo = $data['titulo'];
                $sinopsis = $data['sinopsis'];
                $contenido = $data['contenido'];
                $portada = $data['fotoportada'];
                $creador = $data['nombrecompleto'];
                $fotocreador = $data['foto'];
                $idusuario = $data['idusuario'];
            
        
        
        
        ?>
        
        <div data-aos="zoom-out-up">
            <a href="contenidoGuia.php?id=<?php echo $idguia; ?>"><img src="data:image/jpg;base64, <?php echo base64_encode($portada)?>" class="portadaguia" alt="Noticia1"></a>
            <h3><?php echo $titulo; ?></h3>
            <p><?php echo $sinopsis; ?></p>
            <div class="creator">
            <a href="otrosperfiles.php?id=<?php echo $idusuario; ?>" class="creadordeguia"><img src="data:image/jpg;base64, <?php echo base64_encode($fotocreador)?>" class="fotocreador"> <p class="creador"><?php echo $creador; ?></p></a>
            </div><br>
            <a href="contenidoGuia.php?id=<?php echo $idguia; ?>">Ver mas... <i class="fas fa-angle-double-right"></i></a>
        </div>

        <?php
            }
        }
        ?>
        

        

        </div>

</div>


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

<!-- AOS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>

<!-- Menu Desplegable -->
<script src="JS/menudesplegable.js"></script>

</body>
</html>