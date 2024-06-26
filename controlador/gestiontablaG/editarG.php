<?php
session_start();

if(!isset($_SESSION['idusuario'])){

    echo "<script>
    alert(\"Debes Iniciar Sesion para tener esta funcion.\");
    window.location.href = \"../../inicia sesion.php\";
    </script>";
}

if(isset($_SESSION['idusuario'])){

    $nombre = $_SESSION['nombrecompleto'];
    $foto = $_SESSION['foto'];
    $perfil = $_SESSION['perfil'];
    $idusuario =$_SESSION['idusuario'];
    
}

//Consulta
require_once('../conexion.php');
$idguia2 = $_REQUEST['id'];

$query = mysqli_query($conexion, "SELECT * FROM `guias` WHERE idguia = $idguia2");

$resultado = mysqli_num_rows($query);

if($resultado > 0){
    while ($data = mysqli_fetch_array($query)){
        
        $titulo = $data['titulo'];
        $sinopsis = $data['sinopsis'];
        $contenido = $data['contenido'];
    }
}else{
    header("Location:../../administracionguia.php");
}


if($_POST){

    $nuevotitulo= $_POST['nuevotitulo'];
    $nuevosinopsis= $_POST['nuevosinopsis'];
    $nuevocontenido = $_POST['nuevocontenido'];
    $nuevoportada = addslashes(file_get_contents($_FILES['nuevoportada']['tmp_name']));
    
    $update = "UPDATE guias SET 
    titulo = '$nuevotitulo',
    sinopsis = '$nuevosinopsis', 
    contenido = '$nuevocontenido',
    fotoportada = '$nuevoportada'
    WHERE idguia = $idguia2";
    
    mysqli_query($conexion, $update);
    
    if($update){
        echo "<script>alert(\"Se han actualizado los datos.\");
        window.location.href = \"../../administracionguia.php\";
        </script>";
    }else{
        echo "<script>alert(\"Hubo un error al actualizar.\");
        window.location.href = \"../../administracionguia.php\";
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
    <title>Editar Guia || Sparking Games</title>
    <link rel="icon" href="../../Media/IMG/Logo.png">
    
    <!-- CSS -->
    <link rel="stylesheet" href="../../CSS/guia.css">
    <link rel="stylesheet" href="../../CSS/menus.css">
    
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
        <nav class="navegador">
            <a href="../../index.php"><img src="../../Media/IMG/Logo.png" alt="Logo" class="nav-logo"></a>
            <ul class="nav-menu">
                <li>
                    <a href="../../inicio.php"><i class="fas fa-home"></i>    Inicio</a>
                </li>
                <li>
                    <a href="../../Biblioteca.php"><i class="fas fa-book"></i>        Biblioteca</a>
                </li>
                <li>
                    <a href="../../AgregarGuia.php"><i class="fa-solid fa-folder-plus"></i>         Subir Guia</a>
                </li>
                <li>
                    <a href="../../Nosotros.php"><i class="fas fa-users"></i>         Nosotros</a>
                </li>
                <li>
                    <a href="../../Sugerencias.php"><i class="fas fa-plus-circle"></i>      Sugerencias</a>
                </li>
                <li>
                    <a href="../../administracion.php"><i class="fa-solid fa-screwdriver-wrench"></i>     Administrar</a>
                </li>

                
            </ul>
            <ul class="nav-menu-icon">
                <li>
                    <img class="fotoperfil" src="data:image/jpg;base64, <?php echo base64_encode($foto)?>">
                </li>
                <li>
                    <a href="#" id="activador"><?php echo $nombre; ?>&nbsp;<i class="fa-solid fa-crown"></i>&nbsp;&nbsp;<i class="fa-solid fa-angle-down"></i></a>
                </li>
                <ul class = "menu-vertical" id="menu">
                    <li><a href="../ingreso/cerrar.php">Cerrar sesion</a></li>
                    <li><a href="../../editarperfil.php">Editar Perfil</a></li>
                </ul>
            </ul>
        </nav>
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


    <!-- Formulario -->
    <section class="seccion">
    <div class="contentBx">
        <div class="formBx">
            <h2>Editar Guia</h2>
            <form action="" id="form" method="POST" enctype="multipart/form-data">

                <div class="inputBx">
                    <span>Titulo</span>
                    <input type="text" id="titulo" name="nuevotitulo" value="<?php echo $titulo; ?>">
                    <i class="fas fa-check-circle" id="bientitulo"></i>
                    <i class="fas fa-exclamation-circle" id="maltitulo"></i>
                    <small id="mensajetitulo">El campo titulo es obligatorio</small>
                </div>

                <div class="inputBx">
                    <span>Sinopsis</span>
                    <textarea name="nuevosinopsis" id="sinop" cols="30" rows="10" placeholder="Escribe una pequeña sinopsis..." class="sinopsis"><?php echo $sinopsis; ?></textarea>
                    <i class="fas fa-check-circle" id="biensinop"></i>
                    <i class="fas fa-exclamation-circle" id="malsinop"></i>
                    <small id="mensajesinop">El campo Sinopsis es obligatorio</small>
                </div>

                <div class="inputBx">
                    <span>Contenido</span>
                    <textarea name="nuevocontenido" id="contenido" cols="30" rows="10" placeholder="Escribe tu guia."><?php echo $contenido; ?></textarea>
                    <i class="fas fa-check-circle" id="biencontenido"></i>
                    <i class="fas fa-exclamation-circle" id="malcontenido"></i>
                    <small id="mensajecontenido">El Contenido de la guia no es valido.</small>
                </div>

                <div class="inputBx foto">
                    <span>Foto de portada</span>
                    <input type="file" name="nuevoportada" id="foto">
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
                <img src="../../media/IMG/editarguia.jpg" alt="">
            </div>
        
    </section>
    <br><br><br>
</div>

<!-- Footer-->
<footer class="pie-pagina">
    <div class="grupo-1">
        <div class="box">
            <figure>
                <a href="../../index.php">
                    <img src="../../Media/IMG/Logo.png" alt="logo" class="logo">
                </a>
            </figure>
        </div>
        <div class="box">
            <h2>SOBRE NOSOTROS</h2>
            <p>Jovenes emprendedores con objetivos claros y concretos.</p>
            <p>¿Quieres saber mas sobre nosotros y como aportamos al sitio web? <a href="../../Nosotros.php"><b>Ver mas...</b></a></p>
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
<script src="../../JS/loader.js"></script>

<!-- Validacion-->
<script src="../../JS/añadirguia.js"></script>
<script src="../../JS/validarfile.js"></script>

<!-- Menu Desplegable -->
<script src="../../JS/menudesplegable.js"></script>

</body>
</html>