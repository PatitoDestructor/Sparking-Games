<?php
session_start();

if(!isset($_SESSION['idusuario'])){

    echo "<script>alert(\"Debes Iniciar Sesion para tener esta funcion.\");
    window.location.href = \"../../inicia sesion.php\";
    </script>";
}


if(isset($_SESSION['idusuario'])){

    $nombre = $_SESSION['nombrecompleto'];
    $foto = $_SESSION['foto'];
    $perfil = $_SESSION['perfil'];
    
}

if($perfil == "usuario"){

    echo "<script>alert(\"No tienes permiso.\");
    window.location.href = \"../../inicio.php\";
    </script>";

}

//Borrar

require_once('../conexion.php');

if(!empty($_POST)){
    $idusuario2 = $_POST['id'];

    $query_delete = mysqli_query($conexion, "DELETE FROM usuarios WHERE idusuario = $idusuario2");

    if($query_delete){
        echo "<script>alert(\"El usuario ha sido borrado exitosamente.\");
        window.location.href = \"../../administracion.php\";
        </script>";
    }else{
        echo "<script>alert(\"Error al eliminar el usuario .\");
        window.location.href = \"../../administracion.php\";
        </script>";
    }
}

//Validacion Borrar

if(empty($_REQUEST['id']) || $_REQUEST['id'] == "1" || $_REQUEST['id'] == "2" || $_REQUEST['id'] == "3" || $_REQUEST['id'] == "4"){
    header("Location:../../administracion.php");
}else{
    require_once('../conexion.php');

    $idusuario = $_REQUEST['id'];

    $query = mysqli_query($conexion, "SELECT * FROM `usuarios` WHERE idusuario = $idusuario");

    $resultado = mysqli_num_rows($query);

    if($resultado > 0){
        while ($data = mysqli_fetch_array($query)){
            
            $nombre2 = $data['nombrecompleto'];
            $usuario2 = $data['usuario'];
            $correo2 = $data['correo'];
            $foto2 = base64_encode($data['foto']);
            $perfil2 = $data['perfil'];
        }
    }else{
        header("Location:../../administracion.php");
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion || Pipipupuchek</title>
    <link rel="icon" href="../../Media/IMG/Logo.png">

    <!-- CSS -->
    <link rel="stylesheet" href="../../CSS/administracion.css">
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
                <a href="../../AgregarGuia.php"><i class="fa-solid fa-folder-plus"></i></a>
            </div>
            <div class="btn-mas">
                <label for="btn-mas" class="icon-mas2"><i class="fa-solid fa-plus"></i></label>
            </div>
        </div>

    <!-- Confirmacion-->
        <section id="contenedor">
            <div class="data_delete">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <h2>¿Esta seguro de eliminar el siguiente usuario?</h2><br>
                <p>Nombre: <span><?php echo $nombre2; ?></span></p>
                <p>Usuario: <span><?php echo $usuario2; ?></span></p>
                <p>correo: <span><?php echo $correo2; ?></span></p>
                <p>Foto: <br><img class="fotousuario" src="data:image/jpg;base64, <?php echo $foto2;?>"></p>
                <p>Perfil: <span><?php echo $perfil2; ?></span></p><br><br>

                <form action="" method="POST" action="">
                    <input type="hidden" name="id" value="<?php echo $idusuario; ?>">
                    <a href="../../administracion.php" class="btn_cancel">Cancelar</a>
                    <input type="submit" value="Aceptar" class="btn_ok">
                </form>
            
            </div>

        </section>

</div>
    <!-- Footer-->
    <footer class="pie-pagina">
        <div class="grupo-1">
            <div class="box">
                <figure>
                    <a href="index.php">
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
            <small>&copy; 2022 <b>PipipupuChek</b> - Todos los Derechos Reservados.</small>
        </div>    

    </footer>
        

<!-- Loader-->
<script src="../../JS/loader.js"></script>

<!-- AOS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>

<!-- Menu Desplegable -->
<script src="../../JS/menudesplegable.js"></script>

</body>
</html>