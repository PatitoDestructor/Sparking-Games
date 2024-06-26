<?php

session_start();

require_once('../conexion.php');

if(isset($_SESSION['idusuario'])){


$nombre = $_SESSION['nombrecompleto'];
$foto = $_SESSION['foto'];
$perfil = $_SESSION['perfil'];

}

//Validacion no registrado
if(!isset($_SESSION['idusuario'])){

    echo "<script>alert(\"Debes Iniciar Sesion para tener esta funcion.\");
    window.location.href = \"inicia sesion.php\";
    </script>";
}

//Validacion no admin
if($perfil == "usuario"){

    echo "<script>alert(\"No tienes permiso.\");
    window.location.href = \"inicio.php\";
    </script>";

}

//Consulta actualizar
if(empty($_REQUEST['id']) || $_REQUEST['id'] == "1" || $_REQUEST['id'] == "2" || $_REQUEST['id'] == "3" || $_REQUEST['id'] == "4"){
    header("Location:../../administracion.php");
}else{
$idusuario = $_REQUEST['id'];

$query = mysqli_query($conexion, "SELECT * FROM `usuarios` WHERE idusuario = $idusuario");

$resultado = mysqli_num_rows($query);

if($resultado > 0){
    while ($data = mysqli_fetch_array($query)){
        
        $nombre2 = $data['nombrecompleto'];
        $usuario2 = $data['usuario'];
        $correo2 = $data['correo'];
        $contraseña2 = $data['contrasena'];
        $foto2 = base64_encode($data['foto']);
        $perfil2 = $data['perfil'];
    }
}else{
    header("Location:../../administracion.php");
}
}

//Actualizar

if($_POST){

$nuevonombre = $_POST['nuevonombre'];
$nuevousuario= $_POST['nuevousuario'];
$nuevocorreo = $_POST['nuevocorreo'];
$nuevocontraseña = $_POST['nuevocontrasena'];
$nuevofoto = addslashes(file_get_contents($_FILES['nuevofoto']['tmp_name']));

$update = "UPDATE usuarios SET 
nombrecompleto = '$nuevonombre',
usuario = '$nuevousuario', 
contrasena = '$nuevocontraseña',
foto = '$nuevofoto'
WHERE idusuario = $idusuario";

mysqli_query($conexion, $update);

if($update){
    echo "<script>alert(\"Se han actualizado los datos.\");
    window.location.href = \"../../administracion.php\";
    </script>";
}else{
    echo "<script>alert(\"Hubo un error al actualizar.\");
    window.location.href = \"../../administracion.php\";
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
    <title>Editar Usuario || Sparking Games Games</title>
    <link rel="icon" href="../../Media/IMG/Logo.png">
    
    <!-- CSS -->
    <link rel="stylesheet" href="../../CSS/registrate.css">
    <link rel="stylesheet" href="../../CSS/menus.css">

    
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
            
    
    <!-- Formulario -->
    <section class="seccion">
    <div class="contentBx">
        <div class="formBx">
            <h2>Editar usuario <br><?php echo $nombre2; ?></h2>
            <form action="" enctype="multipart/form-data"  id="form" method="POST" >

                <div class="inputBx">
                    <span>Nombre Completo</span>
                    <input type="text" id="nombre" name="nuevonombre" value="<?php echo $nombre2; ?>">
                    <i class="fas fa-check-circle" id="biennombre"></i>
                    <i class="fas fa-exclamation-circle" id="malnombre"></i>
                    <small id="mensajenombre">El campo Nombre es obligatorio</small>
                </div>

                <div class="inputBx">
                    <span>Usuario</span>
                    <input type="text" id="usuario" name="nuevousuario"  value="<?php echo $usuario2; ?>">
                    <i class="fas fa-check-circle" id="bienusuario"></i>
                    <i class="fas fa-exclamation-circle" id="malusuario"></i>
                    <small id="mensajeusuario">El campo Usuario es obligatorio</small>
                </div>

                <div class="inputBx">
                    <span>Correo Electronico</span>
                    <input type="text" id="correo" name="nuevocorreo"  value="<?php echo $correo2; ?>">
                    <i class="fas fa-check-circle" id="biencorreo"></i>
                    <i class="fas fa-exclamation-circle" id="malcorreo"></i>
                    <small id="mensajecorreo">El Correo no es valido. Ejemplo: nombre@dominio.com</small>
                </div>

                <div class="inputBx">
                    <span>Contraseña</span>
                    <input type="password" id="password-1" name="nuevocontrasena"  value="<?php echo $contraseña2; ?>">
                    <span id="visible" class="verpass"><i class="fa-solid fa-eye" id="icono"></i></span>
                    <i class="fas fa-check-circle contravali" id="biencontra"></i>
                    <i class="fas fa-exclamation-circle" id="contravalired"></i>
                    <small id="mensajecontra">Contraseña no valida. Minimo 8 caracteres, 1 letra mayúscula. <br> No espacios en blanco y 1 caracter especial</small>
                </div>

                <div class="inputBx repetir">
                    <span>Repetir Contraseña</span>
                    <input type="password" id="password-2"  value="<?php echo $contraseña2; ?>">
                    <i class="fas fa-check-circle" id="biencontra2"></i>
                    <i class="fas fa-exclamation-circle" id="malcontra2"></i>
                    <small id="mensajecontra2">Las contraseñas deben ser iguales</small>
                </div>

                <div class="inputBx foto">
                    <span>Foto de perfil</span>
                    <input type="file" name="nuevofoto" id="foto" onchange="return validararchivo()">
                    <i class="fas fa-check-circle" id="bienfoto"></i>
                    <i class="fas fa-exclamation-circle" id="malfoto"></i>
                    <small id="mensajefoto">No se ha subido ningun archivo</small>
                </div>

                <div id="visorarchivo" class="visor">
                    <!-- Preview de imagen -->
                </div>

                <div class="inputBx">
                    <input type="submit" value="Actualizar" id="btnform">
                </div>

            </form>
        </div>
    </div>
            <div class="imgBx">
                <img src="../../Media/IMG/editarusuario.jpg" alt="">
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
    
<script src="../../JS/loader.js"></script>
<script src="../../JS/crearusuario.js"></script>
<script src="../../JS/validarfile.js"></script>
<!-- Menu Desplegable -->
<script src="../../JS/menudesplegable.js"></script>

</body>
</html>