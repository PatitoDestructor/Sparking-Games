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
    $id = $_SESSION['idusuario'];
    
}

if($perfil == "usuario"){

    echo "<script>alert(\"No tienes permiso.\");
    window.location.href = \"../../inicio.php\";
    </script>";

}

require_once('../conexion.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion || Sparking Games</title>
    <link rel="icon" href="../../Media/IMG/Logo.png">

    <!-- CSS -->
    <link rel="stylesheet" href="../../CSS/administracionguia.css">

    <link rel="stylesheet" href="../../CSS/menus.css">

    
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer"/>

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
        
            $busqueda = strtolower($_REQUEST['busqueda']); 
            if(empty($busqueda)){
                header('location: ../../administracionguia.php');
            }

        ?>

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

        <h1><i class="fa-solid fa-book"></i>&nbsp;Lista de guias</h1>
        <a href="../../AgregarGuia.php#contenedor" class="btn_new">Crear Guia</a>


        <!-- Buscador-->

        <form action="" method="GET" class="form_search">
        <div class="search-box">
            <button class="btn-search" type="submit"><i class="fas fa-search"></i></button>
            <input type="text" class="input-search" placeholder="Buscar..." value="<?php echo $busqueda; ?>" name="busqueda" id="busqueda">
        </div>
        </form>



        <table>
            <tr>
                <th>Foto</th>
                <th>ID</th>
                <th>Titulo</th>
                <th>Sinopsis</th>
                <th>Creador</th>
                <th>Acciones</th>
            </tr>

            <?php

            //Paginador
            $sql_registe = mysqli_query($conexion, "SELECT COUNT(*) as total_registros FROM guias g INNER JOIN usuarios u ON g.idusuario = u.idusuario WHERE
                                                                                                        g.idguia LIKE '%$busqueda%' OR
                                                                                                        g.titulo LIKE '%$busqueda%' OR
                                                                                                        g.sinopsis LIKE '%$busqueda%' OR
                                                                                                        g.fotoportada LIKE '%$busqueda%' OR
                                                                                                        u.nombrecompleto LIKE '%$busqueda%'
                                                                                                        ");
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
            $query = mysqli_query($conexion,"SELECT * FROM guias g INNER JOIN usuarios u ON g.idusuario = u.idusuario WHERE
                                                                                                                        g.idguia LIKE '%$busqueda%' OR
                                                                                                                        g.titulo LIKE '%$busqueda%' OR
                                                                                                                        g.sinopsis LIKE '%$busqueda%' OR
                                                                                                                        g.fotoportada LIKE '%$busqueda%' OR
                                                                                                                        u.nombrecompleto LIKE '%$busqueda%'
                                                                                                                        ");

            $resultado = mysqli_num_rows($query);

            if($resultado > 0){

                while ($data = mysqli_fetch_array($query)){

            ?>

            <tr>
                <td><img src="data:image/jpg;base64, <?php echo base64_encode($data['fotoportada'])?>" class="campofoto"></td>
                <td><?php echo $data['idguia']; ?></td>
                <td><?php echo $data['titulo']; ?></td>
                <td><?php echo $data['sinopsis']; ?></td>
                <td><?php echo $data['nombrecompleto']; ?></td>
                <td>

                    <a href="controlador/gestiontablaG/editarG.php?id=<?php echo $data['idguia']; ?>"><button class="link_edit"><i class="fa-solid fa-pen"></i></button></a>

                    <a href="controlador/gestiontablaG/borrarG.php?id=<?php echo $data['idguia']; ?>"><button class="link_delete"><i class="fa-solid fa-x"></i></button></a>
                </td>
            </tr>

            <?php
                }

            }

            ?>

        </table>
        
        <?php
        //Validacion si hay registros
        if($total_registro != 0){


        ?>

        <div class="paginador">
            <ul>
                <?php
                    if($pagina != 1){

                    
                ?>
                <li><a href="?pagina=<?php echo 1; ?>&busqueda=<?php echo$busqueda ?>"><b>|</b><i class="fa-solid fa-angles-left"></i></a></li>
                <li><a href="?pagina=<?php echo $pagina-1; ?>&busqueda=<?php echo$busqueda ?>"><i class="fa-solid fa-angles-left"></i></a></li>
                <?php
                }
                    for ($i=1; $i <= $total_paginas; $i++){

                        if($i == $pagina){
                            echo '<li class="pageSelected">'.$i.'</li>';

                        }else{
                        echo '<li><a href="?pagina='.$i.'&busqueda='.$busqueda.'">'.$i.'</a></li>';
                        }   
                    }
                
                    if($pagina != $total_paginas){
                ?>

                <li><a href="?pagina=<?php echo $pagina + 1; ?>&busqueda=<?php echo$busqueda ?>"><i class="fa-solid fa-angles-right"></i></a></li>
                <li><a href="?pagina=<?php echo $total_paginas; ?>&busqueda=<?php echo$busqueda ?>"><i class="fa-solid fa-angles-right"></i><b>|</b></a></li>
                <?php }?>
            </ul>
        </div>
    <?php }else{?>

        <div class="vacio">
            <p><br><i class="fa-solid fa-triangle-exclamation"></i>&nbsp;Ups, no se ha encontrado ningun registro <i class="fa-solid fa-cloud-xmark"></i></p>
        </div>

    <?php }?>

    </section>


<!-- Footer-->
        </div>
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


<!-- AOS -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>

<!-- Menu Desplegable -->
<script src="JS/menudesplegable.js"></script>

</body>
</html>
