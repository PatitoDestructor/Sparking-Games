<?php

session_start();

//Validacion perfiles 
if(!isset($_SESSION['idusuario'])){

    echo "<script>alert(\"Debes Iniciar Sesion para tener esta funcion.\");
    window.location.href = \"inicia sesion.php\";
    </script>";
}

//consulta segun la sesion
if(isset($_SESSION['idusuario'])){

    $nombre = $_SESSION['nombrecompleto'];
    $foto = $_SESSION['foto'];
    $perfil = $_SESSION['perfil'];
    $id = $_SESSION['idusuario'];
    
}

//Consulta guia

require_once('controlador/conexion.php');

$idguia = $_REQUEST['id'];

if(empty($idguia)){
    echo "<script>
            alert('Ocurrio un error al encontrar esta guia');
            window.location.href='Biblioteca.php';
        </script>";
}else{
    $query = mysqli_query($conexion,"SELECT g.idguia, g.titulo, g.sinopsis, g.contenido, g.fotoportada, u.nombrecompleto, u.usuario, u.correo, u.contrasena, u.foto, u.perfil FROM guias g INNER JOIN usuarios u ON g.idusuario = u.idusuario WHERE idguia = '$idguia' ;");

    $resultado = mysqli_num_rows($query);

    //Recorrer array
    $data = mysqli_fetch_array($query);

    //Guia
    $idguia = $data['idguia'];
    $titulo = $data['titulo'];
    $sinopsis = $data['sinopsis'];
    $contenido = $data['contenido'];
    $portada = $data['fotoportada'];

    //Usuario
    $nombrecompleto = $data['nombrecompleto'];
    $user = $data['usuario'];
    $correo = $data['correo'];
    $contrasena = $data['contrasena'];
    $fotoperfil = $data['foto'];
    $perfil2 = $data['perfil'];
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sparking Games || <?php echo $titulo; ?> </title>
    <link rel="icon" href="Media/IMG/Logo.png">
    
    <!-- CSS -->
    <link rel="stylesheet" href="CSS/contenidoGuia.css">
    <link rel="stylesheet" href="CSS/Estilo.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Stick+No+Bills:wght@200;300;400&display=swap" rel="stylesheet">

    <!-- AOS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

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
    <header>
        <img src="data:image/jpg;base64, <?php echo base64_encode($portada)?>" class="bannerh">
        <p class="logoh"><?php echo $titulo; ?></p>
    </header>

    <div class="contenedorG">

        <div class="creador">
            <h1>Presentada por:&nbsp;&nbsp;</h1><img src="data:image/jpg;base64, <?php echo base64_encode($fotoperfil)?>" class="fotoU"><p class="nombrecreador"><?php echo $nombrecompleto; ?></p>
        </div>

        <div class="sinopsis">
        <h1>Sinopsis</h1>
        <p><?php echo $sinopsis; ?></p>
        </div><br><br><br><br><br>

        <div class="contenido">
            <h1>Contenido</h1>
            <p><?php echo $contenido; ?></p>
        </div><br><br>

        <!-- Comentarios -->
        <div id="comentarios">
            <h1>Comentarios</h1>
            <div class="comentario">
                <form action="controlador/comentarios/comentarios.php?id=<?php echo $idguia ?>" method="POST">
                <img src="data:image/jpg;base64, <?php echo base64_encode($foto)?>" class="yocomento">
                <input placeholder="Añade tu comentario aqui" class="input" name="comentario" type="text" id="comentario">
                <button id="btncomentario" type="submit">
                    <div class="svg-wrapper-1">
                    <div class="svg-wrapper">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
                        <path fill="none" d="M0 0h24v24H0z"></path>
                        <path fill="currentColor" d="M1.946 9.315c-.522-.174-.527-.455.01-.634l19.087-6.362c.529-.176.832.12.684.638l-5.454 19.086c-.15.529-.455.547-.679.045L12 14l6-8-8 6-8.054-2.685z"></path>
                        </svg>
                    </div>
                    </div>
                    <span>Enviar</span>
                </button>
            </form>
            </div><br><br><br><br>
            <div class="comunidad" id="comentarios">
                <h3>Comunidad:</h3><br>

                <!-- Consulta comentario -->
                <?php 
                    $query = mysqli_query($conexion,"SELECT c.idcomentario, c.comentario, c.idguia, c.idusuario, u.usuario, u.nombrecompleto, u.foto, u.idusuario FROM comentarios c INNER JOIN usuarios u ON c.idusuario = u.idusuario WHERE c.idguia = '$idguia' ;");
                    $resultado = mysqli_num_rows($query);

                    if($resultado > 0){

                        while ($data = mysqli_fetch_array($query)){
                            $idusuarioC = $data['idusuario'];
                            $usuarioC = $data['usuario'];
                            $fotoC = $data['foto'];
                            $comentarioC = $data['comentario'];
                            $idcomentario = $data['idcomentario'];

                            ?>

                                <div class="comentarioP">
                                    <img src="data:image/jpg;base64, <?php echo base64_encode($fotoC)?>">
                                    <small><?php echo $usuarioC; ?></small>
                                    <p><?php echo $comentarioC; ?></p>
                                    <?php if($idusuarioC == $id || $perfil == "admin"){?>

                                    <div class="botones">
                                        <a href="controlador/comentarios/borrarComentario.php?id=<?php echo $idcomentario; ?>&idguia=<?php echo $idguia; ?>"><i class="fa-solid fa-trash"></i></a>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                </div>

                            <?php
                        }
                    }else{?>
                    
                    <div class="vaciocomentario">
                        <br>
                        <i class="fa-solid fa-face-sad-tear"></i>&nbsp;&nbsp;<small>Aun no hay comentarios en esta guia, animate a comentar</small>
                    </div>

                    <?php    
                    }
        
                ?>
            </div>
        </div>

    </div>
    

    
</div> 

<!-- Footer-->
<br><br><br>
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
            <p>¿Quieres saber mas sobre nosotros y como aportamos al sitio web? <a href="nosotros.php"><b>Ver mas...</b></a></p>
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

<!-- mural-->
<script>
    window.addEventListener("scroll", function(){
        const header = document.querySelector("header");
        header.classList.toggle("animacion", window.scrollY > 0);
    });
</script>

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