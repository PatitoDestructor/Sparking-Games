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
    $id = $_SESSION['idusuario'];
    
}

if($perfil == "usuario"){

    echo "<script>alert(\"No tienes permiso.\");
    window.location.href = \"inicio.php\";
    </script>";

}

require_once('controlador/conexion.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion || Sparking Games</title>
    <link rel="icon" href="Media/IMG/Logo.png">

    <!-- CSS -->
    <link rel="stylesheet" href="CSS/administracion.css">

    
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
        <h2>BIENVENIDO DE NUEVO LORD <?php echo strtoupper($nombre) ?>&nbsp;<i class="fa-solid fa-crown"></i></h2>
        <p>Administra a Sparking Games para que cada dia sea mucho mejor.</p>
    </header><br><br><br>

    <!-- Administrar usuarios-->
    <section id="contenedor">

        <h1><i class="fa-solid fa-users"></i>&nbsp;Lista de usuarios</h1>
        <a href="crearusuario.php" class="btn_new"><button>
            <span></span>
            <span></span>
            <span></span>
            <span></span> Crear Usuario
            </button></a>


        <!-- Buscador-->

        <form action="controlador/gestionartabla/buscarU.php#contenedor" method="GET" class="form_search">
        <div class="search-box">
            <button class="btn-search" type="submit"><i class="fas fa-search"></i></button>
            <input type="text" class="input-search" placeholder="Buscar..." name="busqueda" id="busqueda">
        </div>
        </form>



        <table>
            <tr>
                <th>ID</th>
                <th>Nombre Completo</th>
                <th>Usuario</th>
                <th>Correo</th>
                <th>Contraseña</th>
                <th>Foto</th>
                <th>Perfil</th>
                <th>Acciones</th>
            </tr>

            <?php

            //Paginador
            $sql_registe = mysqli_query($conexion, "SELECT COUNT(*) as total_registros FROM usuarios");
            $result_register = mysqli_fetch_array($sql_registe);
            $total_registro = $result_register['total_registros'];


            $por_pagina = 6;

            if(empty($_GET['pagina'])){
                $pagina = 1;
            }else{
                $pagina = $_GET['pagina'];
            }

            $desde = ($pagina - 1) * $por_pagina;
            $total_paginas = ceil($total_registro / $por_pagina);


            //Consulta
            $query = mysqli_query($conexion,"SELECT * FROM `usuarios` LIMIT $desde,$por_pagina");
            $resultado = mysqli_num_rows($query);

            if($resultado > 0){

                while ($data = mysqli_fetch_array($query)){

            ?>

            <tr>
                <td><?php echo $data['idusuario']; ?></td>
                <td><?php echo $data['nombrecompleto']; ?></td>
                <td><?php echo $data['usuario']; ?></td>
                <td><?php echo $data['correo']; ?></td>
                <td><?php echo $data['contrasena']; ?></td>
                <td><img src="data:image/jpg;base64, <?php echo base64_encode($data['foto'])?>" class="campofoto"></td>
                <td><?php echo $data['perfil']; ?></td>
                <td>

                    <?php if($data['idusuario'] != 1 && $data['idusuario'] != 2 && $data['idusuario'] != 3 && $data['idusuario'] != 4){ ?>
                    <a href="controlador/gestionartabla/editarU.php?id=<?php echo $data['idusuario']; ?>"><button class="link_edit"><i class="fa-solid fa-pen"></i></button></a>

                    <a href="controlador/gestionartabla/borrar.php?id=<?php echo $data['idusuario']; ?>"><button class="link_delete"><i class="fa-solid fa-x"></i></button></a>
                </td>
            </tr>

            <?php
                }

            }

        }
            ?>

        </table>

        <div class="paginador">
            <ul>
                <?php
                    if($pagina != 1){

                    
                ?>
                <li><a href="?pagina=<?php echo 1; ?>"><b>|</b><i class="fa-solid fa-angles-left"></i></a></li>
                <li><a href="?pagina=<?php echo $pagina-1; ?>"><i class="fa-solid fa-angles-left"></i></a></li>
                <?php
                }
                    for ($i=1; $i <= $total_paginas; $i++){

                        if($i == $pagina){
                            echo '<li class="pageSelected">'.$i.'</li>';

                        }else{
                        echo '<li><a href="?pagina='.$i.'">'.$i.'</a></li>';
                        }   
                    }
                
                    if($pagina != $total_paginas){
                ?>

                <li><a href="?pagina=<?php echo $pagina + 1; ?>"><i class="fa-solid fa-angles-right"></i></a></li>
                <li><a href="?pagina=<?php echo $total_paginas; ?>"><i class="fa-solid fa-angles-right"></i><b>|</b></a></li>
                <?php }?>
            </ul>
        </div>


    </section>


<!-- Footer-->
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


<!-- AOS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>

<!-- Menu Desplegable -->
<script src="JS/menudesplegable.js"></script>

</body>
</html>
