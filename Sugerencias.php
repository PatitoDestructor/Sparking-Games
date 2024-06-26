<?php
session_start();

if(!isset($_SESSION['idusuario'])){
    echo "<script>alert(\"Debes Iniciar Sesion para tener esta funcion.\");
    window.location.href = \"inicia sesion.php\";
    </script>";
}

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
    <title>Sugerencias || Sparking Games</title>
    <link rel="icon" href="Media/IMG/Logo.png">
    
    <!-- CSS -->
    <link rel="stylesheet" href="CSS/Sugerencias.css">
    
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
        <br><br><br><br><br><br><br><br><br><br><br>
        <div class="muralp">
            <h1>SUGIERE<i class="fas fa-exclamation"></i><i class="fas fa-exclamation"></i></h1>
            <p>¿Deseas mandar alguna recomendacion que tengas?<br> Ya sea de las guias, juegos o de la pagina web en general. <br> Te leeremos.&nbsp;<i class="far fa-laugh-beam"></i></p>
        </div>
</header>

<!-- Formulario -->
<div class="contenedorForm">
    <div class="contenidoForm">
        <div class="imagen-box"><br><br><br>
            <img src="Media/IMG/sugerencias4.png" alt="">
        </div>

    <form action="controlador/sugerencias/sugerencias.php" method="post">
        <div class="topic">Envianos un mensaje</div>
        <div class="input-caja">
            <input type="text" name="titulo" required>
            <label for="">Escribe un titulo:</label>
        </div>

        <div class="mensaje-caja">
            <textarea name="mensaje"></textarea>
            <label for="">Escribe tu sugerencia:</label>
        </div>

        <div class="input-caja">
            <button type="submit">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
                <span>Enviar</span>
            </button>
        </div>
    </form>
    </div>
</div>


</div>
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
        <small>&copy; 2022 <b>PipipupuChek</b> - Todos los Derechos Reservados.</small>
    </div>    

</footer>
    
<script src="JS/loader.js"></script>

<!-- Menu Desplegable -->
<script src="JS/menudesplegable.js"></script>

</body>
</html>